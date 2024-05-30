<?php
/*
= LuxCal mini calendar - one month =

© Copyright 2011 LuxSoft - www.LuxSoft.eu
config params:
 $calendarTitle
 $timeZone
 $hn, $un, $pw and $db (database credentials)
 $language
 $weekStart (0: Sunday, 1: Monday)
 $miniCalPost (event posting 0: disabled, 1: enabled)

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

function showGrid($date) {
	global $evtList, $miniCalPost, $xx;
	if (!array_key_exists($date, $evtList)) { return; }
	foreach ($evtList[$date] as &$evt) {
		if ($evt['sti']) { $evt['sti'] = ITtoDT($evt['sti']); }
		$popText = "<div class=\"fontS\"><b>".$evt['sti'].($evt['eti'] ? " - ".ITtoDT($evt['eti'])." " : " ").$evt['tit']."</b>";
		if ($evt['ven']) { $popText .= "<br />".$evt['ven']; }
		if ($evt['des']) { $popText .= "<br />".$evt['des']; }
		if ($evt['not'] >= 0 and $miniCalPost) { $popText .= "<br />".$xx['vws_notify'].": ".$evt['not']." ".$xx['vws_days']; }
		$popText = htmlspecialchars(addslashes($popText.'</div>'));
		$popClass = 'normal';
		if ($evt['mde'] or $evt['r_t']) { $popClass .= ' repeat'; }
		echo "\n<div class=\"miniSquare point\"";
		if ($evt['cbg']) { echo " style=\"background:".$evt['cbg'].";\""; }
		echo " onclick=\"x=eventWin('index.php?xP=13&amp;id=".$evt['eid']."'); x.focus(); return false\"";
		echo " onmouseover=\"popon('".$popText."', '".$popClass."', 20)\" onmouseout=\"popoff()\">&nbsp;</div>\n";
	}
}

//sanity check
if (isset($_GET['oM']) and !preg_match('%^(-\d{1,2}|\d{0,2})$%', $_GET['oM'])) { exit('not permitted (lcmi)'); } //invalid argument

//initialize
require './config.php';
require './common/toolbox.php';

error_reporting(E_ALL ^ E_WARNING); //errors, no warnings, AW 2019 PHP2.2 
//error_reporting(E_ALL ^ E_NOTICE); //errors, no notices
//error_reporting(E_ALL); //errors and notices - test line

//set time zone
date_default_timezone_set($timeZone);

//proxies: don't cache
header("Cache-control: private");

//establish database connection
$link = mysqliconnect($hn, $un, $pw) or die ("Could not connect to database, check database credentials in config.php");
if (!mysqliselect_db($db,$link)) die ("Could not select database $db");

//set language
require './lang/ui-'.strtolower($language).'.php';

//set session params
$_SESSION['uid'] = 1; //public access
$_SESSION['cC'] = array(0); //all resources

//get event retrieve function
require './common/retrieve.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $calendarTitle; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="LuxCal mini web calendar - a LuxSoft product" />
<meta name="author" content="Roel Buining" />
<meta name="robots" content="nofollow" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="canonical" href="<?php echo $calendarUrl; ?>" />
<link rel="stylesheet" type="text/css" href="css/css.php" />
<script type="text/javascript" src="common/poptext.js"></script>
<script type="text/javascript" src="common/general.js"></script>
</head>

<body  onload="parent.setHeight(document.body.scrollHeight);">
<?php
$offM = isset($_GET['oM']) ? $_GET['oM'] : 0; //offset Month
$timeD1 = mktime( 12, 0, 0, date('n')+$offM, 1, date('Y') ); //time 1st day
$dateD1 = date("Y-m-d", $timeD1); //date 1st day
$curM = date( "n", $timeD1 );
$curY = date( "Y", $timeD1 );
$sOffset = ($weekStart) ? date("N", $timeD1) - 1 : date("w", $timeD1); //offset first day
$eOffset = date( "t", $timeD1 ) + $sOffset; //offset last day
$daysToShow = ($eOffset == 28) ? 28 : (($eOffset > 35) ? 42 : 35);  //4, 5 or 6 weeks
$sDate = date("Y-m-d", $timeD1 - ($sOffset * 86400)); //start date in 1st week
$eDate = date("Y-m-d", $timeD1 + ($daysToShow - $sOffset - 1) * 86400); //end date in last week

retrieve($sDate,$eDate); //retrieve events

/* prepare month table */
echo '<div class="floatC fontS">'.$xx['vws_click_for_full']."</div>\n";
echo '<h6 class="floatC"><a href="'.htmlentities($_SERVER['PHP_SELF']).'?oM=',$offM-1,'" title="'.$xx['vws_prev_month'].'">'.'<<'.'</a>&nbsp;&nbsp;&nbsp;<a href="index.php?cP=2&amp;cD=',$dateD1,'" title="'.$xx['vws_view_full'].'" target="_blank">',makeD($dateD1,3,false),'</a>&nbsp;&nbsp;&nbsp;<a href="'.htmlentities($_SERVER['PHP_SELF']).'?oM=',$offM+1,'" title="'.$xx['vws_next_month'].'">'.'>>'."</a></h6>\n";
echo '<table class="grid">';
echo '<tr>';
for ($x = $weekStart; $x < ($weekStart+7); $x++) echo '<th class="dcol">'.$wkDays_s[$x].'</th>';
echo "</tr>\n";

/* display month */
for ( $i = 0; $i < $daysToShow; $i++ ) {
	$curTime = mktime( 0, 0, 0, $curM, $i-$sOffset +1, $curY );
	$curDate = date("Y-m-d", $curTime);
	if ($i%7 == 0) { //new week
		echo '<tr class="miniWeek">';
	}
	$dow = ($i < $sOffset or $i >= $eOffset) ? 'class="out' : ((date("N", $curTime) > 5) ? 'class="we0' : 'class="wd0');
	$dow .= ($curDate == date("Y-m-d")) ? ' today"' : '"';
	$day = ltrim(substr($curDate, 8, 2),"0");
	$dayHead = ($miniCalPost) ? "<a onclick=\"x=eventWin('index.php?xP=10&amp;evDate=".$curDate."'); x.focus()\" title=\"".$xx['vws_add_event']."\">".$day."</a>" : $day;
	echo "<td ".$dow."><div class=\"dom\">".$dayHead."</div>";
	showGrid($curDate);
	echo "</td>\n";
	if ( $i%7 == 6) { echo "</tr>\n"; } //if last day of week, wrap to left
}
echo '<tr><th colspan="7" class="fontS"><a class="floatL" href="'.$calendarUrl.'rssfeed.php" title="RSS feeds" target="_blank" />&nbsp;&nbsp;RSS</a>'."\n";
if ($offM != 0) { echo '<a class="floatC" href="'.htmlentities($_SERVER['PHP_SELF']).'?oM=0" title="'.$xx['vws_back_to_today'].'">'.$xx['vws_today']."</a>\n"; }
echo '<span class="floatR"><a href="http://www.luxsoft.eu" target="_blank"><b><i><font color=\'#0033FF\'>Lux</font><font color=\'#AA0066\'>Soft</font></i></b></a><span title="V'.$LCC.'">&nbsp;&nbsp;</span></span></th></tr>';
echo '</table>';
?>
</body>
</html>
