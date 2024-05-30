<?php
/*
= year view of events =
Config Params:
- $colsToShow (number of months to show in one row)
- $rowsToShow (Number of rows of $colsToShow months)


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

function showGrid($date) {
	global $evtList, $privs, $showOwner, $showCatName, $eventColor, $xx;
	if (!array_key_exists($date, $evtList)) { return; }
	foreach ($evtList[$date] as $evt) {
		if ($evt['cid'] == 3) {			// boat event ?	
			$access = ($privs > 2 or $evt['uid'] == $_SESSION['uid']) ? true : false;
			if ($evt['sti']) { $evt['sti'] = ITtoDT($evt['sti']); }
			$team = getEventTeam($evt['eid']);
			$popText = getPopText($evt, $team, $time);
			$popClass = ($evt['pri']) ? 'private' : 'normal';
			if ($evt['mde'] or $evt['r_t']) { $popClass .= ' repeat'; }
			echo "\n<div class=\"square point\"";
			if ($eventColor) {
				if ($evt['rbg']) { echo " style=\"background:".$evt['rbg'].";\""; }
			} else {
				if ($evt['uco']) { echo " style=\"background:".$evt['uco'].";\""; }
			}
			echo " onclick=\"eventWin('index.php?xP=11&amp;id=".$evt['eid']."&amp;evDate=".$date."'); return false\"";
			echo " onmouseover=\"popon('".$popText."', '".$popClass."')\" onmouseout=\"popoff()\">&nbsp;</div>\n";
		}
	}
}

//sanity check
if (!defined('LCC')) { exit('not permitted (yesr)'); } //lounch via script only

//initialize
$cD = $_SESSION['cD'];
if ($yearStart) { //start with month $yearStart
	$m = $yearStart;
	$y = (intval(substr($cD, 5, 2)) >= $m) ? intval(substr($cD, 0, 4)) : intval(substr($cD, 0, 4)) - 1;
	$prevDate = date( "Y-m-d", mktime( 0, 0, 0, $m, 1, $y-1 ) );
	$nextDate = date( "Y-m-d", mktime( 0, 0, 0, $m, 1, $y+1 ) );

	/* set the start date and end date of the period to show */
	$fromM = $m; //start month
	$tillM = $fromM + 12; //month following end month
} else { //use current date to determine start month
	$m = substr($cD, 5, 2);
	$y = substr($cD, 0, 4);
	$jumpRows = $rowsToShow - intval($rowsToShow*0.5);
	$prevDate = date( "Y-m-d", mktime( 0, 0, 0, $m-$colsToShow*$jumpRows, 1, $y ) );
	$nextDate = date( "Y-m-d", mktime( 0, 0, 0, $m+$colsToShow*$jumpRows, 1, $y ) );

	/* set the start date and end date of the period to show */
	$fromM = $m - ($m-1)%$colsToShow; //start month
	$tillM = $fromM + $colsToShow * $rowsToShow; //month following end month
}
$sDate = date("Y-m-d", mktime( 0, 0, 0, $fromM, 1, $y )); //start date
$eDate = date("Y-m-d", mktime( 0, 0, 0, $tillM, 0, $y )); //end date

retrieve($sDate,$eDate); //retrieve events

/* display header */
$header = '<span'.($mobile ? '' : ' class="viewhdr"').'>'.makeD($sDate,3)." - ".makeD($eDate,3).'</span>';
echo '<h1 class="floatC"><a href="index.php?cD=',$prevDate,'"><img src="images/left.png" valign="middle" alt="back" /></a><sup>',$header,'</sup><a href="index.php?cD=',$nextDate,'"><img src="images/right.png" valign="middle" alt="forward" /></a></h4>'."\n";
echo '<br>';

/* display calendar */
echo '<div'.($mobile ? '' : ' class="scrollBoxYe"').">\n";
echo '<table class="mgrid">'."\n";
$cm = $fromM; //current month
for($p=0;$p<$rowsToShow;$p++){ //number of rows to show
	echo '<tr>';
	for($q=0;$q<$colsToShow;$q++){ //# of months per row
		echo '<td class="holder">';

		/* collect month info */
		$timeDay1 = mktime( 0, 0, 0, $cm, 1, $y ); //Unix time of month
		$day1 = date( "Y-m-d", $timeDay1 );
		$thisM = substr($day1,5,2);
		$thisY = substr($day1,0,4);
		$sOffset = ($weekStart) ? date("N", $timeDay1) - 1 : date("w", $timeDay1); //offset first day
		$eOffset = date( "t", $timeDay1 ) + $sOffset; //offset last day
		$daysToShow = ($eOffset == 28) ? 28 : (($eOffset > 35) ? 42 : 35);  //4, 5 or 6 weeks

		/* display month header */
		echo '<h5 class="floatC"><a href="index.php?cP=2&amp;cD=',$day1,'" title="'.$xx["vws_view_month"].'">',makeD($day1,3),"</a></h5>\n";
		echo '<table class="grid">'."\n"; 
		if ($weekNumber) { echo '<col class="wkColY" />'; } //add week # column
		echo '<col span="7" class="dcol" />'."\n";
		echo "<tr>\n";
		if ($weekNumber) { echo '<th>'.$xx["vws_wk"].'</th>'; } //week # hdr
		for ($x = $weekStart; $x < ($weekStart+7); $x++) echo '<th>', $wkDays_s[$x], '</th>'; //week days
		echo "</tr>\n";

		/* display month */
		for ( $i = 0; $i < $daysToShow; $i++ ) {
			$curTime = mktime( 0, 0, 0, $thisM, $i-$sOffset +1, $thisY );
			$curDate = date("Y-m-d", $curTime);
			if ($i%7 == 0) { //new week
				echo '<tr class="yearWeek">';
				if ($weekNumber) { //display week nr
					echo '<td class="wnr"><a href="index.php?cP=3&amp;cD=',$curDate,'" title="'.$xx["vws_view_week"].'">'.date("W", $curTime + 86400)."</a></td>\n";
				}
			}
			if ($i >= $sOffset and $i < $eOffset) { //day in month
				echo (((date("N", $curTime) > 5) || (getEventHoliday($curDate) != '')) ? '<td class="we0' : '<td class="wd0');
				echo (($curDate == date("Y-m-d")) ? ' today">' : '">');
				$day = ltrim(substr($curDate, 8, 2),"0");
				$dayHead = ($privs > 1) ? "<a onclick=\"eventWin('index.php?xP=10&amp;evDate=".$curDate."');\" title=\"".$xx["vws_add_event"]."\">".$day."</a>" : $day;
				echo "<div class=\"dom\">".$dayHead."</div>";
				showGrid($curDate);
			} else {
				echo '<td class="blank">';
			}
			echo "</td>\n";
			if ( $i%7 == 6) { echo "</tr>\n"; } //if last day of week, wrap to left
		}
		echo "</table>\n";
		echo "</td>\n";
		$cm++;
	}
	echo "</tr>\n";
}
echo "</table>\n";
echo "</div>\n";
?>
