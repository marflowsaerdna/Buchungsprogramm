<?php
/*
= check calendar for email reminders to be send =

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

---------------------------------------------------------------------
| This script depends on and is executed via the file lcalcron.php. |
| See lcalcron.php header for details.                              |
---------------------------------------------------------------------

This file is part of the LuxCal Web Calendar.

The LuxCal Web Calendar is free software: you can redistribute it and/or modify it under 
the terms of the GNU General Public License as published by the Free Software Foundation, 
either version 3 of the License, or (at your option) any later version.

The LuxCal Web Calendar is distributed in the hope that it will be useful, but WITHOUT 
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A 
PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with the LuxCal 
Web Calendar. If not, see <http://www.gnu.org/licenses/>.

------------ THIS SCRIPT USES THE FOLLOWING CONFIG.PHP PARAMETERS -------
| $calendarEmail : Email source ("from") for notification messages      |
| $calendarTitle : The calendar title is part of the notification email |
| $calendarUrl   : The calendar URL is used in the notification email   |
-------------------------------------------------------------------------
*/

$emlStyle = "background:#FFFFDD; color:#000099; font:12px arial, sans-serif;"; //email body style definition

//
//Send email notification
//
function notify($eventId, $sDate, $eDate, $sTime, $eTime) {
global $emlStyle, $count, $calendarTitle, $calendarUrl, $calendarEmail, $mailSent, $ax, $daysDue, $todayD00;

	$q =
	"SELECT
		e.title,
		e.venue,
		e.description,
		e.not_mail,
		c.name,
		c.color,
		c.background
	FROM [db]events e
	INNER JOIN [db]resources c ON c.resource_id = e.resource_id
	WHERE e.event_id = $eventId";
	$event = dbquery($q); //retrieve event data
	if (!$event) { exit; }
	if (mysqlinum_rows($event) == 0) { exit; }
	$row = mysqli_fetch_assoc($event);
	//compose email message
	$eventT = ($eTime[0] < "9") ? (($sTime == "00:00" and $eTime == "23:59") ? $ax["not_all_day"] : ITtoDT($sTime)." - ".ITtoDT($eTime)) : ITtoDT($sTime);
	$subject = $calendarTitle." - ".$ax["not_due_in"]." ".$daysDue." ".$ax["not_days"].": ".stripslashes($row["title"]);
	$style = ($row["color"] or $row["background"]) ? " style=\"color: ".$row["color"]."; background: ".$row["background"].";\"" : "";
	$message = "
<html>
<head>\n<title>".$calendarTitle." ".$ax["not_mailer"]."</title>
<style type='text/css'>
body, p, table {".$emlStyle."}
td {vertical-align:top;}
</style>
</head>
<body>
<p>".$calendarTitle." ".$ax["not_mailer"]." ".IDtoDD($todayD00)."</p>
<p>".$ax["not_event_due_in"]." ".$daysDue." ".$ax["not_days"].":</p>
<table>
	<tr><td>".$ax['not_title'].":</td><td><b><span".$style.">".stripslashes($row["title"])."</span></b></td></tr>
	<tr><td>".$ax['not_resource'].":</td><td>".stripslashes($row["name"])."</td></tr>
	<tr><td>".$ax['not_date_time'].":</td><td>".IDtoDD($sDate)." @ ".$eventT."</td></tr>
	<tr><td>".$ax['not_venue'].":</td><td>".(($row["venue"]) ? stripslashes($row["venue"]) : "- -")."</td></tr>
	<tr><td>".$ax['not_description'].":</td><td>".(($row["description"]) ? stripslashes($row["description"]) : "- -")."</td></tr>
</table>
<p><a href=\"".$calendarUrl."\">".$ax['not_open_calendar']."</a></p>
</body>
</html>
";
	$headers = 'MIME-Version: 1.0'."\n".'Content-type: text/html; charset=utf-8'."\n".'From: '.$calendarEmail;
	//send emails
	if ($row["not_mail"]) { //email address(es) to notify
		$notList = explode(";", $row["not_mail"]);
		foreach ($notList as $emlAorL) {
			$emlList = array();
			if (strpos($emlAorL, '@')) { //email address
				$emlList[] = $emlAorL;
			} else { //email list
				if (file_exists("emlists/$emlAorL.txt")) {
					$emlList = file("emlists/$emlAorL.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
				}
			}
			foreach ($emlList as $emlAddress) {
				if (preg_match("/^\D\w*?(\.{0,1}(\w|-)+?){0,2}@((\w|-){2,}\.){1,2}\D{2,4}$/", $emlAddress)) { //valid email address
					if (wvfcal_email('', $emlAddress, $subject, $message, $headers, "notify_email.php")) {
						$mailSent .= ++$count.'. '.str_replace("@","[at]",$emlAddress).' - '.$ax['not_subject'].': '.$subject."\n";
					}
				}
			}
		}
	}
}

//
//Compute next event start date for recurring event
//
function nextRdate($curD, $rT, $rI, $rP, $i) {
	if($rT == 1) { //repeat xth day, week, month, year
		switch ($rP) { //period
		case 1: //day
			$nxtD = date("Y-m-d", mktime(12, 0, 0, substr($curD,5,2), substr($curD,8,2)+$rI, substr($curD,0,4)));
       break;
		case 2: //week
			$nxtD = date("Y-m-d", (mktime(12, 0, 0, substr($curD,5,2), substr($curD,8,2), substr($curD,0,4)) + ($rI * 604800)));
       break;
		case 3: //month
			$nxtD = date("Y-m-d", mktime(12, 0, 0, substr($curD,5,2)+$rI, substr($curD,8,2), substr($curD,0,4)));
       break;
		case 4: //year
			$nxtD = date("Y-m-d", mktime(12, 0, 0, substr($curD,5,2), substr($curD,8,2), substr($curD,0,4)+$rI));
		}
	} else { //repeat on the xth <dayname> of the month
		$day1Ts = mktime(12, 0, 0, substr($curD,5,2)+$i, 1, substr($curD,0,4));
		$dowDif = $rP - date('N',$day1Ts); //day of week difference
		$offset = $dowDif + 7 * $rI;
		if ($dowDif >= 0) { $offset -= 7; }
		if ($offset > date('t',$day1Ts)) { $offset -= 7; }
		$nxtD = date("Y-m-d", $day1Ts + (86400 * $offset));
	}
	return $nxtD;
}


//main program

//sanity check
if (!defined('LCC')) { exit('not permitted (ntfy)'); } //lounch via script only

//initialize
$todayT = mktime(12,0,0); //12:00
$todayD00 = date("Y-m-d", $todayT); //today
$todayD30 = date("Y-m-d", $todayT + 2592000); //today + 30 days
$count = 0;
$mailSent = "";

//
//process non-recurring events (select events due in next 30 days with "notify" set)
//
$q =
 "SELECT
		event_id,
		s_date,
		e_date,
		s_time,
		e_time,
		notify
	FROM [db]events
	WHERE
		status >= 0
		AND notify >= 0
		AND r_type = 0
		AND s_date >= '$todayD00'
		AND s_date <= '$todayD30'";
$rSet = dbquery($q);
if (!$rSet) { exit; }
while ($rowD = mysqli_fetch_assoc($rSet)) { //date fields
	$daysDue = round((mktime(12,0,0,substr($rowD["s_date"],5,2),substr($rowD["s_date"],8,2),substr($rowD["s_date"],0,4)) - $todayT) / 86400);
	if ($daysDue == $rowD["notify"] or $rowD["s_date"] == $todayD00) { //notify
		notify($rowD["event_id"], $rowD["s_date"], $rowD["e_date"], substr($rowD["s_time"],0,5), substr($rowD["e_time"],0,5)); //send email for event_id
	}
}
//
//process recurring events - select events that could be due in next 30 days with "notify" set
//
$q =
	"SELECT
		event_id,
		s_date,
		e_date,
		x_dates,
		s_time,
		e_time,
		notify,
		r_type,
		r_interval,
		r_period,
		r_until
	FROM [db]events
	WHERE
		status >= 0
		AND notify >= 0
		AND r_type > 0
		AND r_until >= '$todayD00'
		AND s_date <= '$todayD30'";
$rSet = dbquery($q);
if (!$rSet) { exit; }
while ($rowD = mysqli_fetch_assoc($rSet)) { //date fields
	$eDueD = ($rowD[s_date] < $todayD00 and !($rowD[r_type] == 1 and $rowD[r_period] == 2)) ? strval(intval(substr($todayD00,0,4))-1).substr($rowD[s_date],4) : $rowD[s_date]; //year insignificant
	if ($rowD[r_type] == 2) {
		$nxtD = nextRdate($eDueD,$rowD[r_type],$rowD[r_interval],$rowD[r_period],0); //goto 1st occurence of xth <dayname> in current month
		$eDueD = ($nxtD < $eDueD) ? nextRdate($eDueD,$rowD[r_type],$rowD[r_interval],$rowD[r_period],1) : $nxtD;
	}
	while ($eDueD <= min($todayD30, $rowD[r_until]) and $rowD[r_until] >= $todayD00) {
		if ($eDueD >= $todayD00 and strpos($rowD['x_dates'], $eDueD) === false) { //within date range and no exceptions
			$daysDue = round((mktime(12,0,0,substr($eDueD,5,2),substr($eDueD,8,2),substr($eDueD,0,4)) - $todayT) / 86400);
			if ($daysDue == $rowD["notify"] or $eDueD == $todayD00) { //notify
				notify($rowD["event_id"], $eDueD, $rowD["e_date"], substr($rowD["s_time"],0,5), substr($rowD["e_time"],0,5)); //send email for event_id
			}
			break;
		}
		$eDueD = nextRdate($eDueD,$rowD[r_type],$rowD[r_interval],$rowD[r_period],1);
	}
}

$summary = "-- ".$ax['not_sum_title']." --\n";
$summary .= (strlen($mailSent) > 0) ? $ax['not_not_sent_to'].":\n".$mailSent : $ax['not_no_not_dates_due'].".\n";
?>
