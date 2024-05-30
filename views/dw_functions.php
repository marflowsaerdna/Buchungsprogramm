<?php
/*
 = General functions used by Week and Day view modules =


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
if (!defined('LCC')) { exit('not permitted (dwfu)'); } //lounch via script only

function showGrid($date) {
	global $privs, $evtList, $startHour, $dwTimeSlot, $dwTsHeight, $showOwner, $showCatName, $eventColor, $xx;
	$start_H = $startHour ? $startHour : 0;
	$start_M = $startHour ? 0 : $dwTimeSlot;
	$thM = ($start_H * 60) + $start_M; //threshold in minutes
	if (!array_key_exists($date, $evtList)) { return; }   // if no event, nothing to do
	//hereafter: M = in nbr of mins
	$DayOffsPx = 1 * $dwTsHeight;
	foreach ($evtList[$date] as $eIx => $evt) {
		if ($evt['cid'] == 3 ) {  // Boat event
			if (($evt['sti'] == "") and ($evt['eti'] == "")) { //all day (takes up 1 slot at the top)
				$st[] = 0;  //start time
				$et[] = $dwTimeSlot; //end time
			} else {
				$stM = substr($evt['sti'],0,2) * 60 + intval(substr($evt['sti'],3,2)); //start time
				$st[] = ($stM < $thM) ? 0 : $stM - $thM + $dwTimeSlot; //start time < threshold in mins
				if ($evt['eti'] == "" or $evt['eti'] == $evt['sti']) {
					$et[] = end($st) + $dwTimeSlot;
				} else {
					$etM = substr($evt['eti'],0,2) * 60 + intval(substr($evt['eti'],3,2)); //end time
					$et[] = ($etM <= $thM) ? $dwTimeSlot : $etM - $thM + $dwTimeSlot; //end time < threshold in mins
				}
			}
			$evIx[] = $eIx; //event index in $evtList[$date]
		}
	}
	$sEmpty[0][0] = 00;
	$eEmpty[0][0] = 1440; //24 x 60
	$indent = 0;
	if ($st){
		foreach ($st as $i => $stM) {
			//i: index stM: start time in mins
			$found = false;
			foreach ($sEmpty as $k => $v) {
				foreach ($sEmpty[$k] as $kk => $sE) {
					if (($stM >= $sE) && ($et[$i] <= $eEmpty[$k][$kk])) {
						$sEmpty[$k][] = $et[$i]; //end in mins
						$eEmpty[$k][] = $eEmpty[$k][$kk];
						$eEmpty[$k][$kk] = $stM; //start in mins
						$sFill[$k][] = $stM;
						$eIndx[$k][] = $evIx[$i];
						$found = true;
						break 2;
					}
				}
			}
			if (!$found) {
				$indent++;
				$sEmpty[$indent][0] = 0;
				$sEmpty[$indent][1] = $et[$i];
				$eEmpty[$indent][0] = $stM;
				$eEmpty[$indent][1] = 1440; //24 x 60
				$sFill[$indent][0] = $stM;
				$eIndx[$indent][0] = $evIx[$i];
			}
		}
	}
	$width = round(100 / ($indent+1),1);
	if ($sFill) {
		foreach ($sFill as $k => $v) {
			//1 min = 1px
			$left = $width * $k;
			foreach ($sFill[$k] as $kk => $stM) {
				//start time in mins
				$eHeight = $sEmpty[$k][$kk + 1] - $stM; //height in mins
				$StPx = $DayOffsPx + round($stM * $dwTsHeight / $dwTimeSlot) - 1; //scale start time in px
				$eHghtPx = round($eHeight * $dwTsHeight / $dwTimeSlot) - 1; //scale height in px
				$i = $eIndx[$k][$kk];
				$evt = &$evtList[$date][$i];
				$access = ($privs > 2 or $evt['uid'] == $_SESSION['uid']) ? true : false;
				$time = ($evt['sti']) ? ITtoDT($evt['sti']) : "";
				$team = getEventTeam($evt['eid']);
				$popText = getPopText($evt, $team, $time);
				$popClass = ($evt['pri']) ? 'private' : 'normal';
				if ($evt['mde'] or $evt['r_t']) {
					$popClass .= ' repeat';
				}
				echo "\n<div class=\"evtBox point\" style=\"top:".$StPx."px; left:".$left."%; height:".$eHghtPx."px; width:".strval($width-1)."%;";
				if ($eventColor) {
					echo ($evt['rco'] ? 'color:'.$evt['rco'].';' : ''), ($evt['rbg'] ? 'background:'.$evt['rbg'].';"' : 'background:#FFFFFF;"');
				} else {
					echo $evt['uco'] ? 'background:'.$evt['uco'].';"' : 'background:#FFFFFF;"';
				}
				echo " onclick=\"eventWin('index.php?xP=11&amp;id=".$evt['eid']."&amp;evDate=".$date."'); return false\"";
				echo " onmouseover=\"popon('".$popText."', '".$popClass."')\" onmouseout=\"popoff()\">".$evt['tit']."</div>\n";
			}
		}
	}
}

function showHours() {
	global $startHour, $dwTimeSlot, $dwTsHeight, $xx;
	//build day
	$tsHeight = $dwTsHeight -1;
	echo "<div class=\"timeFrame\">\n";
	echo "<div class=\"timeCell\" style=\"height:".$tsHeight."px;\">".$xx["vws_all_day"]."</div>\n";
	$i = $startHour ? $startHour : 0;
	$j = $dwTimeSlot ? $dwTimeSlot : 0;
	$sdatetime = new DateTime('0-0-0'.$startHour);
	while ($sdatetime->format('d')!= '1') {
		echo "<div class=\"timeCell\" style=\"height:".$tsHeight."px;\">".$sdatetime->format('H:i')."</div>\n";
		$sdatetime->modify('+'.$j.' min');
	}
	echo "</div>\n";
}

function showDay($sDate,$caption="") {
	global $startHour, $dwTimeSlot, $dwTsHeight, $xx;

	//build day
	$tsHeight = $dwTsHeight -1;
	echo "<div class=\"timeFrame\">\n";
	echo "<var style=\"height:".$tsHeight."px;\" id=\"t00:00:".$sDate."\">".$caption."</var>\n";
	$i = $startHour ? $startHour : 0;
	$j = $startHour ? 0 : $dwTimeSlot;
	while ($i < 24) {
		echo "<var style=\"height:".$tsHeight."px;\" id=\"t".str_pad($i,2,"0",STR_PAD_LEFT).":".str_pad($j,2,"0",STR_PAD_LEFT).":".$sDate."\"></var>\n";
		$j = ($j + $dwTimeSlot)%60;
		if ($j == 0) { $i++; }
	}
	echo "<div class=\"dates\">\n";
	showGrid($sDate);
	echo "</div>";
	echo "</div>\n";
}

function getTimeToEvent($event_id)
{
	
}

if ($privs > 1) {
?>
<script type="text/javascript">
//drag time functions
window.onload = dragTime;
var start, end, color, draggedEls=new Array();

function dragTime() {
	var x = new Array();
	x = document.getElementsByTagName("var");
	color = x[0].style.backgroundColor;
	for (var i = (x.length - 1);i >= 0;i--) {
		x[i].onmousedown = starttime;
		x[i].onmouseover = dragtime;
		x[i].onmouseup = endtime;
	}
}

function starttime() {
	start = end = this.id;
	this.style.backgroundColor = "#cccccc";
	draggedEls.push(this); //remember colored elements
}

function dragtime() {
	if (start) {
		if (this.id < end) {
			document.getElementById(end).style.backgroundColor=color;
		} else {
			this.style.backgroundColor = "#cccccc";
			draggedEls.push(this); //remember colored elements
		}
		end = this.id;
	}
}

function endtime() {
	var hrs,mins,win,sdate,stime,etime;
	var x = new Array;
	if (end >= start) {
		sdate = start.substr(7);
		stime = start.substr(1,2) + ":" + start.substr(4,2);
		hrs = parseInt(end.substr(1,2),10);
		mins = (parseInt(end.substr(4,2),10) + dwTimeSlot)%60;
		if (mins == 0) { hrs++; }
		if (hrs == 24) { hrs--; mins = 59; }
		etime = String("0" + hrs).slice(-2) + ":" + String("0" + mins).slice(-2);
		win = eventWin('index.php?xP=10&evDate=' + sdate + '&evTimeS=' + stime + '&evTimeE=' + etime);
		for (var i = (draggedEls.length - 1);i >= 0;i--) {
			draggedEls[i].style.backgroundColor = color;
		}
	}
	start = end = null;
}
</script>
<?php
}
?>
