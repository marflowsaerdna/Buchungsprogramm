<?php
/*
= week view of events =


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
if (!defined('LCC')) { exit('not permitted (week)'); } //lounch via script only

//initialize
require './views/dw_functions.php';

$cD = $_SESSION['cD'];
$d = substr($cD,8,2);
$m = substr($cD,5,2);
$y = substr($cD,0,4);
$day_of_week = ($weekStart) ? date("N", mktime(0,0,0,$m,$d,$y))-1 : date("w", mktime(0,0,0,$m,$d,$y)); //Monday - Sunday : Sunday - Saturday
$sDow = $d-$day_of_week; //first day of week
$sDayOfWk = date("Y-m-d", mktime(0,0,0,$m,$sDow,$y));
$eDayOfWk = date("Y-m-d", mktime(0,0,0,$m,$sDow+6,$y));
$sDoLastW = date("Y-m-d", mktime(0,0,0,$m,$sDow-7,$y));
$sDoNextW = date("Y-m-d", mktime(0,0,0,$m,$sDow+7,$y));

retrieve($sDayOfWk,$sDoNextW);     // readout all events between viewed timeframe

/* display header */
$weekNr = $weekNumber ? ' ('.$xx["vws_wk"].' '.date('W', mktime(0,0,0,$m,$sDow+1,$y)).')' : '';
$header = '&nbsp;<span'.($mobile ? '' : ' class="viewhdr"').'>'.makeD($sDayOfWk,1).' - '.makeD($eDayOfWk,2).$weekNr.'</span>&nbsp;';
echo '<h1 class="floatC"><a href="index.php?cD=',$sDoLastW,'"><img src="images/left.png" valign="middle" alt="back" /></a><sup>',$header,'</sup><a href="index.php?cD=',$sDoNextW,'"><img src="images/right.png" valign="middle" alt="forward" /></a></h4>'."\n";
/* display day headers */
echo '<table class="grid">'."\n";
echo '<tr><th class="timeh">'.$xx["vws_time"]."</th>\n";
for ($i=0;$i<7;$i++) {
	$sDate = date("Y-m-d", mktime(0,0,0,$m,$sDow+$i,$y));
	echo '<th class="dcol"><a href="index.php?cP=4&amp;cD='.$sDate.'" title="'.$xx["vws_view_day"].'">'.makeD($sDate,($mobile ? 1 : 5),'m3')."</a>";
	if ($holiday = getEventHoliday($sDate))
		echo "<br>".$holiday;
	echo "</th> \n";
}
echo "</tr>\n</table>";

/* display days */
echo '<div'.($mobile ? '' : ' class="scrollBoxWe"').">\n";
echo '<table class="grid">'."\n";
echo '<tr><td class="timex">'."\n";
showHours();
echo "</td>\n";
for ($i=0;$i<7;$i++) {
	$dformat = "wd0"; $idate = mktime(0,0,0,$m,$sDow+$i,$y);
	$events = getEventReminder(date("Y-m-d", $idate));
	if ($holiday = getEventHoliday(date("Y-m-d", $idate)))      // public holiday,
		$dformat = "we0";
	if (date("N", mktime(0,0,0,$m,$sDow+$i,$y)) > 5)
		$dformat = "we0";
	$dow = "<td class=\"dcol ".$dformat; //week end or week day
	echo $dow.((date("Y-m-d", mktime(0,0,0,$m,$sDow+$i,$y)) == date("Y-m-d")) ? ' today"' : '"').">\n";
	showDay(date("Y-m-d", mktime(0,0,0,$m,$sDow+$i,$y)),$events);
	echo "</td>\n";
}
echo "</tr>\n</table>\n";
echo "</div>\n";
?>