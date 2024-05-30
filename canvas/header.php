<?php
/*
= Header for LuxCal event calendar pages =

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.

The LuxCal Web Calendar is free software: you can redistribute it and/or modify it under 
the terms of the GNU General Public License as published by the Free Software Foundation, 
either version 3 of the License, or (at your option) any later version.

The LuxCal Web Calendar is distributed in the hope that it will be useful, but WITHOUT 
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A 
PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with the LuxCal 
Web Calendar. If not, see <http://www.gnu.org/licenses/>.
*/

//sanity check
if (!defined('LCC')) { exit('not permitted (hder)'); } //lounch via script only

//initialize
if ($mobile) { $weekNumber = 0; } //if mobile, gain width
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de-DE" xml:lang="de-DE">
<head>
<title><?php echo $calendarTitle; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="LuxCal web calendar - a LuxSoft product" />
<meta name="keywords" content="LuxSoft, LuxCal, LuxCal web calendar" />
<meta name="author" content="Roel Buining" />
<meta name="robots" content="nofollow" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="shortcut icon" href="lcal.ico" />
<?php
echo '<link rel="canonical" href="'.$calendarUrl.'" />'."\n";
if ($privs > 0) {
	echo '<link rel="alternate" type="application/rss+xml" title="LuxCal RSS Feed" href="'.$calendarUrl.'rssfeed.php" />'."\n";
}
?>

<?php
/* ---- LOAD THEME WITH USER-INTERFACE COLOR DEFINITIONS ---- */
require './css/lctheme.php';
define("CSS","TRUE");
?>
<link rel="stylesheet" type="text/css" href="css/css.php" />
<script type="text/javascript">
<?php //used by dtpicker.js
echo 'var dFormat = ',$dateFormat,';
var dSepar = "',$dateSep,'";
var time24 = ',$time24,';
var wStart = ',$weekStart,';
var dpToday = "',$xx["hdr_today"],'";
var dpClear = "',$xx["hdr_clear"],'";
var dpMonths = new Array("',implode('","',$months),'");
var dpWkdays = new Array("',implode('","',$wkDays_m),'");
var dwTimeSlot = ',$dwTimeSlot,';'."\n"; //used by dw_functions.php
?>
</script>
<script type="text/javascript" src="common/dtpicker.js"></script>
<script type="text/javascript" src="common/cpicker.js"></script>
<script type="text/javascript" src="common/poptext.js"></script>
<script type="text/javascript" src="common/general.js"></script>
</head>
<body>
<?php
echo "<div class=\"topBar\">\n";
if (!$mobile) {
	echo '<span class="floatL">'.$calendarTitle.'</span>'.makeD(date("Y-m-d"),6).'<span class="floatR">'.$uname.'</span>'."\n";
} else {
	echo $uname."\n";
}
echo "</div>\n";
echo "<div class=\"navBar\">\n";

echo "<div class=\"floatL\">\n";

// Views menu
echo $xx['hdr_view'].":";
echo '<select title="'.$xx["hdr_view"].'" name="cP" onchange="jumpMenu(this)">'."\n";
echo '<option value="index.php?cP=1"'.($cP == "1" ? ' selected="selected">' : '>').$xx["hdr_year"]."</option>\n";
echo '<option value="index.php?cP=2"'.($cP == "2" ? ' selected="selected">' : '>').$xx["hdr_month"]."</option>\n";
echo '<option value="index.php?cP=3"'.($cP == "3" ? ' selected="selected">' : '>').$xx["hdr_week"]."</option>\n";
echo '<option value="index.php?cP=4"'.($cP == "4" ? ' selected="selected">' : '>').$xx["hdr_day"]."</option>\n";
echo '<option value="index.php?cP=5"'.($cP == "5" ? ' selected="selected">' : '>').$xx["hdr_upcoming"]."</option>\n";
if ($privs > 1)  // event admins
	echo '<option value="index.php?cP=6"'.($cP == "6" ? ' selected="selected">' : '>').$xx["hdr_changes"]."</option>\n";
echo '<option value="index.php?cP=7"'.($cP == "7" ? ' selected="selected">' : '>')."Highscore</option>\n";
echo "</select> \n";

// date selection
echo '<input type="text" name="newD" id="newD" value="'.IDtoDD($_SESSION['cD'])."\" size='7' />\n";
echo '<button title="'.$xx["hdr_select_date"]."\" onclick=\"dPicker(0,'gotoD','newD'); return false;\">&larr;</button>\n";

echo "</div>\r";   // FloatL

echo "<div class=\"floatR\">\n";
if ($privs > 0) {
	//rights
//	if ($admin and !$mobile) {
	if ($admin) {
		//admin functions
		echo '<select title="'.$xx["hdr_select_admin_functions"].'" name="views" onchange="jumpMenu(this)">'."\n";
		echo '<option value="#">'.$xx["hdr_admin"]."&nbsp;</option>\n";
		echo '<option value="index.php?cP=90"'.($cP == "90" ? ' selected="selected">' : '>').$xx["hdr_settings"]."</option>\n";
		echo '<option value="index.php?cP=91"'.($cP == "91" ? ' selected="selected">' : '>').$xx["hdr_resources"]."</option>\n";
		echo '<option value="index.php?cP=92"'.($cP == "92" ? ' selected="selected">' : '>').$xx["hdr_categories"]."</option>\n";
		echo '<option value="index.php?cP=99"'.($cP == "99" ? ' selected="selected">' : '>').$xx["hdr_briefings"]."</option>\n";
		echo '<option value="index.php?cP=93"'.($cP == "93" ? ' selected="selected">' : '>').$xx["hdr_users"]."</option>\n";
		echo '<option value="index.php?cP=94"'.($cP == "94" ? ' selected="selected">' : '>').$xx["hdr_database"]."</option>\n";
		echo '<option value="index.php?cP=95"'.($cP == "95" ? ' selected="selected">' : '>').$xx["hdr_import_ics"]."</option>\n";
		echo '<option value="index.php?cP=96"'.($cP == "96" ? ' selected="selected">' : '>').$xx["hdr_export_ics"]."</option>\n";
		echo '<option value="index.php?cP=97"'.($cP == "97" ? ' selected="selected">' : '>').$xx["hdr_import_csv"]."</option>\n";
		echo '<option value="index.php?cP=2">'.$xx["hdr_calendar"]."</option>\n";
		echo "</select> \n";
	}
}
// Help pages
echo '<select title="Hilfe" name="help" onchange="jumpMenu(this)">'."\n";
    echo '<option value="#">'."Hilfe</option>\n";
    echo '<option value="doc/WvfCal_UserManual.pdf"'.">Buchungsprogramm</option>\n";
    echo '<option value="https://www.wvfischbach.de/images/intern/pdf/2022_Nutzungsordnung_Vereins-Segelboote.pdf"'.">Nutzungsordnung/Preise</option>\n";
    echo '<option value="https://www.wvfischbach.de/images/intern/pdf/2022_Bestleute_Vereins-Segelboote.pdf"'.">Zuständigkeiten</option>\n";
    echo '<option value="https://www.wvfischbach.de/images/intern/pdf/2022_Infos_Vereins-Segelboote.pdf"'.">Bootsinfos</option>\n";
    echo '<option value="doc/aufbauanleitung3 laserx.pdf"'.">Anleitung Laser</option>\n";

echo "</select> \n";


if ($privs > 0) {	//rights

	if ($privs > 1) { //post rights
		echo '<button title="'.$xx["hdr_add_event"]."\" onclick=\"eventWin('index.php?xP=10');\">&nbsp;+&nbsp;</button>\n";
	}
	
	echo "<button title=\"send email\" onclick=\"openWin('index.php?xP=98\&amp;from=$umail\&amp;to=$amail','600','400');\">Feedback @</button>\n";
	if ($_SESSION['uid'] == 1) { //public user
		echo "<button title=\"".$xx['hdr_log_in']."\" onclick=\"location.href='index.php?".session_id()."&cP=20'\">".$xx["hdr_log_in"]."</button>\n";
	}
	else
	{ //known user
		echo '<button title="'.$xx["hdr_log_out"]."\" onclick=\"location.href='index.php?cP=20\&amp;log_out=y'\">".$xx["hdr_log_out"]."</button>\n";
	}
}

if ($admin) {
		echo "<button title=\"".$xx['hdr_feedback']."\" ";
		echo "onclick=\"javascript:window.open('http://weisserhai.net16.net/flyspray/?project=2&do=authenticate&user_name=$uname&password=$uname&return_to=index.php?project=2&do=roadmap') \">Flyspray</button>\n";
}

echo "</div>\n";  // FloatR

echo "</div>\n";  // NavBar


echo "<div class=\"content\">\n";
/*
if ($privs > 0 and !$mobile) { //view rights
	//make side bar with upcoming events
	echo "<div id='sideBar'><a class='floatR' href=\"javascript:show('sideBar')\"><img src=\"images/close.png\" alt=\"close\" /></a><h5 class='dragme'>".$xx['title_upcoming']."</h5>\n";
	echo "<div class='upcList'>\n";

	$curD = $_SESSION['cD'];
	$eTime = mktime(0,0,0,substr($curD,5,2),substr($curD,8,2),substr($curD,0,4)) + (($upcomingDays-1) * 86400); //Unix time of end date
	$eDate = date("Y-m-d", $eTime);

	retrieve($curD, $eDate);

 //display upcoming events
	if ($evtList) {
		foreach($evtList as $date => &$events) {
			echo "<h6>".makeD($date,6)."</h6>\n";
			foreach ($events as $evt) {
				if ($privs > 2 or $evt['uid'] == $_SESSION['uid']) { //has access
					$onClick = " class=\"point\" onclick=\"x=eventWin('index.php?xP=11&amp;id=".$evt['eid']."'); x.focus(); return false\"";
				} else {
					$onClick = "";
				}
				if ($eventColor) {
					$eColor = ($evt['rco'] ? 'color:'.$evt['rco'].';' : '').($evt['rbg'] ? 'background:'.$evt['rbg'].';' : '');
				} else {
					$eColor = ($evt['uco'] ? 'background:'.$evt['uco'].';' : '');
				}
				$eStyle = $eColor ? ' style="'.$eColor.'"' : '';
				echo ($evt['sti'] == "" and $evt['eti'] == "") ? $xx['vws_all_day'] : ITtoDT($evt['sti']);
				if ($evt['eti']) echo " - ".ITtoDT($evt['eti']);
				echo '<p'.$onClick.$eStyle.'>&nbsp;&nbsp;'.$evt['tit']."</p><br />\n";
			}
		}
	} else {
		echo $xx['none']."\n";
	}
	echo "</div>\n</div>\n";
}
*/
if ($pageTitle) echo '<br /><h3 class="spaceLL">'.$pageTitle.'</h3>'."\n";
?>
