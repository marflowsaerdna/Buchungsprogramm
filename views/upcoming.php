<?php
/*
= Highscore =

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

function showGrid(&$events) {
	global $privs, $showOwner, $showCatName, $eventColor, $xx, $date;

	echo "<tr><td><h6>".makeD($date,6)."</h6>\n";
	echo "</td>";
	
		foreach ($events as $evt) {
			
			if ($eventColor) {
				$eColor = ($evt['rco'] ? 'color:'.$evt['rco'].';' : '').($evt['rbg'] ? 'background:'.$evt['rbg'].';' : '');
			} else {
				$eColor = $evt['uco'] ? 'background:'.$evt['uco'].';' : '';
			}
			$eStyle = $eColor ? ' style="font-style:italic; '.$eColor.'"' : '';
				
			if ($evt['cnm'] == 'Feiertag') {
				echo "<td><h6><span style=\"font-style:italic\"  onclick=\"eventWin('index.php?xP=11&amp;id=".$evt['eid']."&amp;evDate=".$date."'); return false\">".$evt['tit']."</span></h6>\n";
				echo "</td></tr>";
			}
			else
			{
				echo "<td></td><td></td></tr>";
				echo "<td align=\"right\">";
				if ($evt['sti'] == "00:00" and $evt['eti'] == "23:59") {
					echo $xx['vws_all_day']."    </td>";
				} else {
					echo ITtoDT($evt['sti']);
					echo ($evt['eti']) ? " - ".ITtoDT($evt['eti']).'    </td>' : '</td>';
				}
				
				echo "<td><h6><span class=\"point\" onclick=\"eventWin('index.php?xP=11&amp;id=".$evt['eid']."&amp;evDate=".$date."'); return false\">";
				if ($evt['cnm'] == 'Bootsausfahrt') {
					if ($evt['free'])
					echo "<img src=\"images/point_yellow.png\"/>";
				else {
				    if ( is_array($team['name']) ) {   // this had to be done because of PHP update to 7.2
				        $teamsize = sizeof($team['name']);
				    } else {
				        $teamsize = 0;
				    }
					if (!$evt['pri'] and ($evt['maxteam'] > $teamsize+1)) // event open and max number of teamsize not reached
						echo "<img src=\"images/point_green.png\" />";
					else
						echo "<img src=\"images/point_red.png\" />";
				}
			}
				echo $evt['tit']."</span></h6></td>\n";
				echo "<td>\n";
				if ($evt['cnm'] == 'Bootsausfahrt') {
					echo "<span ".$eStyle.">".$evt['rnm']."</span></td>\n"; 
					echo "</td></tr><td></td><td>";
					echo $xx['evt_skipper'].": ".$evt['oname']."</td>";
					$team = getEventTeam($evt['eid']);
					if (count($team))
						echo "<tr><td></td><td colspan=\"2\">Team: ".(implode(", ",$team['name']))."</td>";
				}
//				if ($evt['mda'] and $evt['edr']) { echo $xx['evt_lastedit'].": ".$evt['edr']."<br />\n"; }
//				}
			}
		echo "</tr>\n";
		}
}

//sanity check
if (!defined('LCC')) { exit('not permitted (hiscore)'); } //lounch via script only

//initialize
$cD = $_SESSION['cD'];
$eTime = mktime(0,0,0,substr($cD,5,2),substr($cD,8,2),substr($cD,0,4)) + (($upcomingDays-1) * 86400); //Unix time of end date
$toD = (isset($_POST['toD'])) ? DDtoID($_POST['toD']) : date("Y-m-d", $eTime);
$fromD = (isset($_POST['fromD'])) ? DDtoID($_POST['fromD']) : date('Y-m-d');

retrieve($fromD, $toD);

//display header
echo "<div class=\"headCh noprint\">\n";
if (!$mobile) {
	echo '<button class="floatR noprintx" onclick="printNice(\'noprintx\');">'.$xx["vws_print_all"]."</button>\n";
	echo '<span class="floatR">&nbsp;&nbsp;</span>'."\n";
	echo '<button class="floatR" onclick="printNice(\'noprint\');">'.$xx["vws_print_today"]."</button>\n";
}
// echo '<h5>',makeD($cD,2)," - ",makeD($eDate,2),'</h5>'."\n<br />\n";

echo "<form method=\"post\" id=\"selectD\" name=\"selectD\" action=\"index.php\">\n";
echo $xx['chg_from_date'].': ';
echo '<input type="text" name="fromD" id="fromD" value="'.IDtoDD($fromD)."\" size='10' />\n";
echo '<button title="'.$xx['chg_select_date']."\" onclick=\"dPicker(0,'selectD','fromD'); return false;\">&larr;</button>\n";

echo $xx['chg_to_date'].': ';
echo '<input type="text" name="toD" id="toD" value="'.IDtoDD($toD)."\" size='10' />\n";
echo '<button title="'.$xx['chg_select_date']."\" onclick=\"dPicker(0,'selectD','toD'); return false;\">&larr;</button>\n";

echo "</form>\n";
echo "</div>\n";


//retrieve events
echo '<div'.($mobile ? '' : ' class="scrollBoxUp"').">\n";
echo '<div class="eventBg">'."\n";
if ($evtList) {
	echo "<table><tr><td class=\"lMarginUp\"></tr>";
	foreach($evtList as $date => &$events) {
		if ($date > $cD) { echo "<div class=\"noprint\">\n"; $nopSet = true; }
			showGrid($events);
		if ($date > $cD) { echo "</div>\n"; $nopSet = true; }
	}
} else {
	echo $xx['none']."\n";
}
echo "</table>";
echo "</div>\n</div>\n";
?>
