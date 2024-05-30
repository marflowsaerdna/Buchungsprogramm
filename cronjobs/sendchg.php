<?php
/*
= Send email notification of calendar changes (added / edited / deleted events) =

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

-------------------------------------------------------------------
 This script depends on and is executed via the file lcalcron.php.
 See lcalcron.php header for details.
-------------------------------------------------------------------

This file is part of the LuxCal Web Calendar.

------- THIS SCRIPT USES THE FOLLOWING CONFIG.PHP PARAMETERS --------
$chgEmailList : list with email destinations separated by semicolons
$chgNofDays : number of days to look back for calendar changes
$calendarTitle : The calendar title is used in the notification email
$calendarUrl : The calendar URL is used in the notification email
---------------------------------------------------------------------
*/

$emlStyle = "background:#FFFFDD; color:#000099; font:12px arial, sans-serif;"; //email body style definition

function sortEvt($a, $b) { return strcmp(strval($a['sts']+1).str_pad($a['sti'],5).$a['seq'], strval($b['sts']+1).str_pad($b['sti'],5).$b['seq']); }

function grabChanges($sDate) { //query db for changes since $sDate
	global $evtList;
	
	//retrieve events
	$q =
	"SELECT
		e.s_date AS sda,
		e.e_date AS eda,
		DATE_FORMAT(e.s_time,'%H:%i') AS sti,
		DATE_FORMAT(e.e_time,'%H:%i') AS eti,
		e.r_type AS r_t,
		e.r_interval AS r_i,
		e.r_period AS r_p,
		e.r_until AS r_u,
		e.notify AS rem,
		e.a_date AS ada,
		e.m_date AS mda,
		e.status AS sts,
		e.title AS tit,
		e.venue AS ven,
		e.editor AS edr,
		e.description AS des,
		c.sequence AS seq,
		r.color AS rco,
		r.background AS rbg,
		u.user_name AS una,
		u.color AS uco
	FROM [db]events e
	INNER JOIN [db]categories c ON c.category_id = e.resource_id
	INNER JOIN [db]resources r ON r.resource_id = e.resource_id
	INNER JOIN [db]users u ON u.user_id = e.owner_id
	WHERE ((e.a_date != '9999-01-01' AND e.a_date != '9999-00-00' AND e.a_date >= '$sDate')
	 or (e.m_date != '9999-01-01' AND e.m_date != '9999-00-00' AND e.m_date >= '$sDate'))";
	$rSet = dbquery($q);

	//process events
	while ($row = mysqli_fetch_assoc($rSet)) {
		$event['sda'] = $row['sda'];
		$event['eda'] = ($row['eda'][0] != '9') ? $row['eda'] : "";
		if (($row['sti'] == "00:00") and ($row['eti'] == "23:59")) {
			$event['sti'] = $event['eti'] = ""; //all day: start/end time = ""
		} else {
			$event['sti'] = $row['sti'];
			$event['eti'] = ($row['eti'][0] != "9") ? $row['eti'] : ""; //no end time = ""
		}
		$event['r_t'] = $row['r_t'];
		$event['r_i'] = $row['r_i'];
		$event['r_p'] = $row['r_p'];
		$event['r_u'] = ($row['r_u'][0] != '9') ? $row['r_u'] : "";
		$event['not'] = $row['rem'];
		$event['ada'] = $row['ada'];
		$event['mda'] = ($row['mda'][0] != '9') ? $row['mda'] : "";
		$event['sts'] = $row['sts'];
		$event['tit'] = stripslashes(strip_tags($row['tit']));
		$event['ven'] = stripslashes($row['ven']);
		$event['edr'] = stripslashes($row['edr']);
		$event['des'] = stripslashes($row['des']);
		$event['seq'] = str_pad($row['seq'],2,"0",STR_PAD_LEFT);
		$event['uco'] = $row['uco'];
		$event['rco'] = $row['rco'];
		$event['rbg'] = $row['rbg'];
		$event['una'] = stripslashes($row['una']);
		$modDate = max($event['ada'],$event['mda']);
		$evtList[$modDate][] = $event;
	}
	krsort($evtList); //sort on change date
	foreach ($evtList as &$events) { //sort event list per change date
		usort($events, 'sortEvt');
	}
}

function makeGrid(&$events) {
	global $emlStyle, $showOwner, $eventColor, $xx;

	$changeList = '';
	foreach ($events as $evt) {
		switch ($evt['r_t']) { //make repeat text
			case 0: $repeat = ''; break;
			case 1: $repeat = ' '.$xx['evt_repeat'].' '.$xx['evt_interval1_'.$evt['r_i']].' '.$xx['evt_period1_'.$evt['r_p']]; break;
			case 2: $repeat = ' '.$xx['evt_repeat_on'].' '.$xx['evt_interval2_'.$evt['r_i']].' '.$wkDays[$evt['r_p']].' '.$xx['evt_of_the_month'];
		}
		if ($evt['r_t'] > 0 and $evt['r_u']) {
			$repeat .= ' '.$xx['evt_until'].' '.IDtoDD($evt['r_u']);
		}
		if ($eventColor) {
			$eColor = ($evt['rco'] ? 'color:'.$evt['rco'].';' : '').($evt['rbg'] ? 'background:'.$evt['rbg'].';' : '');
		} else {
			$eColor = $evt['uco'] ? 'background:'.$evt['uco'].';' : '';
		}
		$eStyle = $eColor ? ' style="'.$eColor.'"' : '';
		$changeList .= "<table><tr><td width=\"100px\">";
		$changeList .= ($evt['sts'] < 0) ? $xx['chg_deleted'] : ($evt['mda'] > $evt['ada'] ? $xx['chg_edited'] : $xx['chg_added']);
		$changeList .= "&nbsp;&nbsp;&nbsp;&nbsp;</td><td>";
		$changeList .= "<span".$eStyle.'><b>'.$evt['tit']."</b></span><br />\n";
		$changeList .= IDtoDD($evt['sda']);
		if ($evt['sti']) $changeList .= ' @ '.ITtoDT($evt['sti']);
		if ($evt['eda'] or $evt['eti']) $changeList .= ' -';
		if ($evt['eda']) $changeList .= ' '.IDtoDD($evt['eda']);
		if ($evt['eda'] and $evt['eti']) $changeList .= ' @';
		if ($evt['eti']) $changeList .= ' '.ITtoDT($evt['eti']);
		$changeList .= (($evt['sti'] == '' and $evt['eti'] == '') ? ' '.$xx['vws_all_day'] : '').$repeat."<br />";
		if ($evt['ven']) { $changeList .= $xx['vws_venue'].': '.$evt['ven']."<br />\n"; }
		if ($evt['des']) { $changeList .= $evt['des']."<br />\n"; }
		if ($evt['not'] >= 0) { $changeList .= '# '.$xx['chg_notify'].': '.$evt['not'].' '.$xx['chg_days']." #<br />\n"; }
		if ($showOwner) {
			$changeList .= $xx['vws_owner'].": ".$evt['una'];
			if ($evt['mda'] and $evt['edr']) { $changeList .= " - ".$xx['vws_edited'].": ".$evt['edr']."<br />\n"; }
		}
		$changeList .= "</td></tr></table><br />\n";
	}
	return $changeList;
}

function sendEmail($msgText) { //send email(s) with calendar changes
	global $chgEmailList, $period, $xx, $calendarTitle, $calendarEmail, $sentTo;

	$headers = 'MIME-Version: 1.0'."\n".'Content-type: text/html; charset=utf-8'."\n".'From: '.$calendarEmail;
	$subject = $calendarTitle." - ".$xx["chg_changes"].": ".$period;
	if ($chgEmailList) { //email address(es) to notify
		if (wvfcal_email('', '', '', $chgEmailList, $subject, $msgText, $headers, "chg_email.php",'')) {
			$sentTo .= str_replace("@","[at]",$chgEmailList)."\n";
		}
	}
}


//main program

//sanity check
if (!defined('LCC')) { exit('not permitted (schg)'); } //lounch via script only

//initialize
$evtList = array();
$sentTo = "";
$toDay = mktime(0, 0, 0); //Unix time of today
$fromD = date("Y-m-d", $toDay - $chgNofDays * 86400); //start date
$emlText =
"<html>
<head>\n<title>".$calendarTitle." mailer</title>
<style type='text/css'>
body, p, table {".$emlStyle."}
h5 {font-size:13px;}
td {vertical-align:top;}
</style>
</head>
<body>
";

grabChanges($fromD); //query db for changes

$period = ($fromD != date('Y-m-d')) ? makeD($fromD,2)." - ".makeD(date('Y-m-d'),2) : makeD(date('Y-m-d'),2);

$changes = 0;
foreach($evtList as $chDate => &$events) {
	$emltext .= '<h5>'.$xx['chg_changed_on'].' '.makeD($chDate,6)."</h5>\n";
	$emlText .= makeGrid($events);
	$changes += count($events);
}
if (!$changes) {
	$emlText .= '<p>'.$xx['chg_no_changes']."</p>\n";
}
$emlText .=
"<p><a href=\"".$calendarUrl."\">".$xx['evt_open_calendar']."</a></p>
</body>
</html>
";
sendEmail($emlText);

$summary = "-- ".$ax['sch_sum_title']." --\n";
$summary .= ($changes) ? $ax['sch_nr_changes_last']." ".$chgNofDays." ".$ax['sch_days'].": ".$changes."\n" : $ax['sch_no_changes_last']." ".$chgNofDays." ".$ax['sch_days'].".\n";
$summary .= ($sentTo) ? $ax['sch_report_sent_to'].":\n".$sentTo : $ax['sch_no_report_sent'].".\n";
?>
