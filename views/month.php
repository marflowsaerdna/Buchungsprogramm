<?php
/*
= month view of events =
Config Params: $weeksToShow (Number of weeks to show)


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
	global $evtList, $privs, $showOwner, $showCatName, $showLinkInMV, $eventColor, $xx;
	if (!array_key_exists($date, $evtList)) { return; }
	foreach ($evtList[$date] as $evt) {
		if (($evt['cid'] == 4) || ($evt['cid'] == 3) || ($evt['cid'] == 2)) {  // boat event or reminder ?
			$access = ($privs > 2 or $evt['uid'] == $_SESSION['uid']) ? true : false;
			switch ($evt['mde']) { //multi-day event?
				case 0:
					{
					if (($evt['sti'] == '00:00') && ($evt['eti'] == '23:59'))
						{
							$time = "0-24";
						} else
						$time = ITtoDT($evt['sti']); break; //no
					}
				case 1: $time = (($evt['sti'] != '00:00' and $evt['sti'] != '') ? ITtoDT($evt['sti']).'-' : '<'); break; //first
				case 2: $time = '<->'; break; //in between
				case 3: $time = (($evt['eti'] < '23:59' and $evt['eti'] != '') ? '-'.ITtoDT($evt['eti']) : '>'); //last
			}
			$team = getEventTeam($evt['eid']);
			$popText = getPopText($evt, $team, $time);
			$popClass = ($evt['pri']) ? 'private' : 'normal';
			if ($evt['mde'] or $evt['r_t']) { $popClass .= ' repeat'; }
			echo "\n<div class=\"evtlink point\" style=\"background: transparent;\" onclick=\"eventWin('index.php?xP=11&amp;id=".$evt['eid']."&amp;evDate=".$date."'); return false;\"";
			echo " onmouseover=\"popon('".$popText."', '".$popClass."')\" onmouseout=\"popoff()\">\n";
			echo '<table border="0" width="100%">
					<colgroup>
					<col width="30%">
					<col width="70%">
					</colgroup>
					<tr><td>';
//********** Show Starttime *********************************************************************************************************************************
			$eColor = $evt['uco'] ? 'background:'.$evt['uco'].';' : '';
			switch ($evt['cid']) {
			case 3: {  // boat event ?
				if ($evt['free'] == TRUE) {
					$eColor = ($evt['rco'] ? 'color:'.BLACK.';' : '').'background:'.YELLOW.';';
//					echo '<img src=\"images/point_yellow.png\"/>';
				}
				else {
				    if ( is_array($team['name']) ) {   // this had to be done because of PHP update to 7.2
				        $teamsize = sizeof($team['name']);
				    } else {
				        $teamsize = 0;
				    }
					if (!$evt['pri'] and ($evt['maxteam'] > $teamsize+1)) // event open and max number of teamsize not reached
						$eColor = ($evt['rco'] ? 'color:'.$evt['rco'].';' : '').'background:'.GREEN.';';
//						echo "<img src=\"images/point_green.png\" />";
					else
						$eColor = ($evt['rco'] ? 'color:'.$evt['rco'].';' : '').'background:'.RED.';';
//						echo "<img src=\"images/point_red.png\" />";
				}
			} break;
			case 2: { // reminder
				$eColor = 'color:'.TEXT2.'; '.'background:'.BGND3.';';
			} break;
			}
			echo "<div class=\"evttime\" style=\" $eColor; text-align:center \">";
			echo $time;
			echo "</div>";
			echo "</td>";
				
//********** Show Eventtext *********************************************************************************************************************************
			echo "<td nowrap>";
			switch ($evt['cid']) {
				case 4: {  // Sperrung ?
					
					$eStyle = 'style = "color:black; font-weight:bold; background-image:url(\'images/PNG/RedStripes.PNG\'); background-repeat:repeat;';
								
					echo "<div class=\"evtdesc\"  $eStyle \">";
					echo $evt['rnm'];
					echo "</div>";
				} break;
				case 3: {  // boat event ?
					if ($eventColor) {
						$eColor = ($evt['rco'] ? 'color:'.$evt['rco'].';' : '').($evt['rbg'] ? 'background:'.$evt['rbg'].';' : '');
					} else {
							$eColor = $evt['uco'] ? 'background:'.$evt['uco'].';' : '';
					}
					$eStyle = $eColor ? ' style="'.$eColor.'"' : '';
								
					echo "<div class=\"evtdesc\"  style=\"$eColor ;\">";
					echo $evt['oname'];
					echo "</div>";
				} break;
				case 2: { // reminder
					echo "<div class=\"evtdesc\" >";
					echo $evt['tit'];
					echo "</div>";
				} break;
			}
			echo "</td>";
			if ($showLinkInMV) {
				if (preg_match_all('%(<a\s[^<>]*?)(href="https{0,1}://[^|<>\s]{5,}"[^|<>]*?>[^|<>]*?</a>)%', $evt['des'], $urls, PREG_SET_ORDER)) {
					echo "<div class=\"url\"".$eStyle.">";
					foreach ($urls as $url) {
						echo $url[0]."<br />";
					}
				echo "</div>\n";
				}
			}
			echo '</tr>';
			echo '</table>';
			echo "</div>\n";
		}
	}
}

//sanity check
if (!defined('LCC')) { exit('not permitted (mnth)'); } //lounch via script only

//initialize
$cD = $_SESSION['cD'];
if ($weeksToShow == 0) { //show just one month
	$tfDay = mktime(12, 0, 0, substr($cD,5,2), 1, substr($cD,0,4)); //Unix time of 1st day of the month
	$prevDate = date("Y-m-d", $tfDay - 2 * 604800); //mid prev. month
	$nextDate = date("Y-m-d", $tfDay + 6 * 604800); //mid next month

	/* determine total number of days to show, start date, end date */
	$sOffset = ($weekStart) ? date("N", $tfDay) - 1 : date("w", $tfDay); //offset first day
	$eOffset = date("t", $tfDay) + $sOffset; //offset last day
	$totDays = ($eOffset == 28) ? 28 : (($eOffset > 35) ? 42 : 35);  //4, 5 or 6 weeks

	$st = $tfDay - $sOffset * 86400; //start time
	$et = $st + ($totDays - 1) * 86400; //end time
	$sDate = date("Y-m-d", $st);
	$eDate = date("Y-m-d", $et);
	$header = '<span class="viewhdr">'.makeD($cD,3).'</span>';
} else {
	$tcDate = mktime(12, 0, 0, substr($cD,5,2), substr($cD,8,2), substr($cD,0,4)); //Unix time of cD
	$jumpWeeks = $weeksToShow - intval($weeksToShow*0.5) + 1;
	$prevDate = date("Y-m-d", $tcDate - $jumpWeeks * 604800);
	$nextDate = date("Y-m-d", $tcDate + $jumpWeeks * 604800);

	/* determine total number of days to show, start date, end date */
	$totDays = $weeksToShow * 7;  //number of weeks to show
	$sOffset = ($weekStart) ? date("N", $tcDate) - 1 : date("w", $tcDate); //offset first day
	$st = $tcDate - ($sOffset + 7) * 86400; //start time
	$et = $st + ($totDays - 1) * 86400; //end time
	$sDate = date("Y-m-d", $st);
	$eDate = date("Y-m-d", $et);
	$header = '<span'.($mobile ? '' : ' class="viewhdr"').'>'.makeD($sDate,3).'</span>';
}

retrieve($sDate,$eDate);

/* display header*/
echo '<h1 class="floatC"><a href="index.php?cD=',$prevDate,'"><img src="images/left.png" alt="back" /></a><sup>',$header,'</sup><a href="index.php?cD=',$nextDate,'"><img src="images/right.png" alt="forward" /></a></h1>'."\n";

/* display days*/
echo '<table class="grid">'."\n";
if ($weekNumber) { echo '<col class="wkColM" />'; } //add week # column
echo '<col span="7" class="dcol" />'."\n";
echo "<tr style=\"height: 28\">\n";
if ($weekNumber) { echo '<th class="dcol" >'.$xx["vws_wk"].'</th>'; } //week # hdr
for ($x = $weekStart; $x < ($weekStart+7); $x++) echo '<th class="dcol" >'.$wkDays[$x]."</th>"; //week days
echo '</tr>'."\n";
echo '</table>'."\n";

/* display calendar */
echo '<div'.($mobile ? '' : ' class="scrollBoxMo"').">\n";
echo '<table class="grid">'."\n";
if ($weekNumber) { 	echo '<col class="wkColM" />'; } //add week # column
echo '<col span="7" class="dcol" />'."\n";

/* build grid */
for ($i = 0; $i < $totDays; $i++) {
	$curTime = $st + $i * 86400;
	$curDate = date("Y-m-d", $curTime);
	$curM = ltrim(substr($curDate, 5, 2),"0");
	$curD = ltrim(substr($curDate, 8, 2),"0");
	if ($i%7 == 0) { //new week
		echo '<tr class="monthWeek">';
		if ($weekNumber) { //display week nr
			echo '<td class="wnr"><a href="index.php?cP=3&amp;cD=',$curDate,'" title="'.$xx["vws_view_week"].'">'.date("W", $curTime + 86400)."</a></td>\n";
		}
	}
// First Line of day grid, show reminders, holidays and dayOfMonth
// If Admin, each of them pointing to the corresponding event, only dayOfMonth click opens new event
// if normal, click on first line opens new event
			// reminder ?	
			if ($weeksToShow == 0) {
				$dayHead ='';
				if ($i < $sOffset or $i >= $eOffset) { $dow = 'class="out'; }   // not actual month
				else {															// actual month
// reminders in grid					$dayHead .= getEventReminder($curDate).' ';
					if ($holiday = getEventHoliday($curDate)) {					// public holiday, 
							$dow = 'class="we0';
							$dayHead .= $holiday.' ';
						}
					else {
						if (date("N", $curTime) > 5) {							// weekend
							$dow = 'class="we0';
						}
						else {
							$dow = 'class="wd0';								// weekday
						}
					}
				}
				$day = ($i == 0 or $curD == "1") ? makeD($curDate,1) : $curD;
			} else {
				$dow = (date("N", $curTime) > 5) ? 'class="we'.strval($curM%2) : 'class="wd'.strval($curM%2); //alternate color per month
				$day = $curD.$curM == "11" ? makeD($curDate,2) : (($i == 0 or $curD == "1") ? makeD($curDate,1) : $curD);
				if ($i == 0 or $curD == "1" or $curD.$curM == "11") {  $day = '<span class="firstDom">&nbsp;'.$day.'&nbsp;</span>'; }
			}
	$dow .= ($curDate == date("Y-m-d")) ? ' today"' : '"';
	$day = ($privs > 1) ? "<a onclick=\"eventWin('index.php?xP=10&amp;evDate=".$curDate."');\" title=\"".$xx["vws_add_event"]."\">".$day."</a>" : $day;
	echo "<td ".$dow."><div class=\"dom\">".$dayHead.$day."</div>\n";
	showGrid($curDate);
//end 1.
//2. Code needed for single month without days before and after
/*
	if ($weeksToShow != 0 or ($i >= $sOffset and $i < $eOffset)) { //not one month or day inside
		$daySuffix = ($weeksToShow == 0) ? '0' : strval($curM%2);
		echo (date("N", $curTime) > 5) ? '<td class="we'.$daySuffix : '<td class="wd'.$daySuffix; //alternate color per month
		echo (($curDate == date("Y-m-d")) ? ' today">' : '">');
		if ($weeksToShow != 0) {
			$day = $curD.$curM == "11" ? makeD($curDate,2) : (($i == 0 or $curD == "1") ? makeD($curDate,1) : makeD($curDate,1,'m3'));
			if ($i == 0 or $curD == "1" or $curD.$curM == "11") {  $day = '<span class="firstDom">&nbsp;'.$day.'&nbsp;</span>'; }
		} else {
			$day = ($curD == "1") ? makeD($curDate,1) : $curD;
		}
		$dayHead = ($privs > 1) ? "<a onclick=\"eventWin('index.php?xP=10&amp;evDate=".$curDate."');\" title=\"".$xx["vws_add_event"]."\">".$day."</a>" : $day;
		echo "<div class=\"dom\">".$dayHead."</div>\n";
		showGrid($curDate);
	} else { //one month and day outside
		echo '<td class="blank">';
	}
*/
//end 2.
	echo "</td>\n";
	if ($i%7 == 6) { echo "</tr>\n"; } //if last day of week, wrap to left
}
echo "</table>\n";
echo "</div>\n";
?>
