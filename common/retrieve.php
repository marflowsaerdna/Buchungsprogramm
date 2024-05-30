<?php
/*
= retrieves events from db function =
Queries database for a specified period and dumps events into arrays
Input params: start date, end date (in 2010-04-28 format)

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
if (!defined('LCC')) { exit('not permitted (rtrv)'); } //lounch via script only

function getEventHoliday($date)
{
	global $evtList, $admin, $xx;
	$retwert = '';
	if (!isset($evtList[$date]))
		return $retwert;
	
	foreach($evtList[$date] as $evt) {
		if ($evt['cid'] == 1)
				if ($admin) {
				$retwert .= '<a onclick="eventWin(\'index.php?xP=11&amp;id='.$evt['eid'].'&amp;evDate='.$date.'\')" title="'.$xx['evt_edit'].'">'.$evt['tit'].'</a>';			
			}
			else {
				$retwert .= ' '.$evt['tit'];
			}
	}
	return $retwert;
}


function getEventReminder($date)
{
	global $evtList, $admin, $xx;
	$retwert = '';
	if (!isset($evtList[$date]))
		return $retwert;
	
	foreach($evtList[$date] as $evt) {
		if ($evt['cid'] == 2) {
			if ($admin) {
				$retwert .= '<a onclick="eventWin(\'index.php?xP=11&amp;id='.$evt['eid'].'&amp;evDate='.$date.'\')" title="'.$xx['evt_edit'].'">'.$evt['tit'].'</a>';			
				}
			else {
				$retwert .= ' '.$evt['tit'];
			}
			$retwert .= "<br>";
		}
	}
	return $retwert;
}

function sortEvt($a, $b) { return strcmp(str_pad($a['sti'],5).$a['seq'], str_pad($b['sti'],5).$b['seq']); }

//main function
function retrieve($start,$end,$filter='') {
	global $admin, $evtList;

	$evtList = array(); //init event list

	//set filter
	if (!$filter) {
		if (count($_SESSION['cU']) > 0 and $_SESSION['cU'][0] != 0) {
			$filter .= " AND e.owner_id IN (".implode(",",$_SESSION['cU']).")";
		}
		if (count($_SESSION['cC']) > 0 and $_SESSION['cC'][0] != 0) {
			$filter .= " AND e.resource_id IN (".implode(",",$_SESSION['cC']).")";
		}
		if ($_SESSION['uid'] == 1) { $filter .= " AND c.public = 1"; }
	}

	/* retrieve events between $start and $end */
	$q0 =
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
		e.event_id AS eid,
		e.title AS tit,
		e.resource_id AS rid,
		e.category_id AS cid,
		e.venue AS ven,
		e.owner_id AS uid,
		e.editor AS edr,
		e.description AS des,
		e.private AS pri,
		e.free AS free,
		e.x_dates AS xda,
		c.category_id AS cid,
		c.name AS cnm,
		r.name AS rnm,
		r.teamsize_min AS minteam,
		r.teamsize_max AS maxteam,
		r.color AS rco,
		r.background AS rbg,
	c.sequence AS seq,
		c.rpeat AS rpt,
		u.user_name AS una,
		u.firstname AS firstname,
		u.familyname AS familyname,
		u.phone AS phone,
		u.color AS uco
	FROM [db]events e
	INNER JOIN [db]categories c ON c.category_id = e.category_id
	INNER JOIN [db]resources r ON r.resource_id = e.resource_id
	INNER JOIN [db]users u ON u.user_id = e.owner_id
	WHERE e.status >= 0".$filter;
	
	//process non-recurring events
	
	$q1 = $q0."
		AND e.r_type = 0
		AND ((e.s_date <= '$end') AND (IF(e.e_date != '9999-00-00', e.e_date, e.s_date) >= '$start') )
	ORDER BY
		e.s_date, e.s_time, c.sequence";
	
	$rSet = dbquery($q1);
	
//echo "single count: ".mysqlinum_rows($rSet)." \n"; //TEST
	while ($row = mysqli_fetch_assoc($rSet)) {
//(aw)		if (!$row['pri'] or ($row['uid'] == $_SESSION['uid']) or $admin) { //private: only for current user + admin
			$eEnd = ($row['eda'][0] != '9') ? $row['eda'] : $row['sda'];
			processEvent(max($start,$row['sda']), min($end,$eEnd), $row['sda'], $eEnd, $row);
//(aw)		}
	}

	//process recurring events

	$q1 = $q0."
		AND e.r_type > 0
		AND e.s_date <= '$end'
		AND e.r_until >= '$start'
	ORDER BY
		c.sequence, e.s_date, e.s_time";
	$rSet = dbquery($q1);
	
//	echo "recurring count: ".mysqlinum_rows($rSet)." \n"; //TEST
	
	while ($row = mysqli_fetch_assoc($rSet)) {
		if (!$row['pri'] or ($row['uid'] == $_SESSION['uid']) or $admin) { //private: only for current user + admin
			$dDif = ($row['eda'][0] != '9') ? intval((strtotime($row['eda']) - strtotime($row['sda'])) / 86400) : 0; //delta start date - end date
			$eStart = $row['sda'];
			if ($row['rpt'] > 0) { //cat repeat overrides
				$row['r_t'] = $row['r_i'] = 1;
				$row['r_p'] = $row['rpt'];
				$row['r_u'] = '9999-00-00';
			} elseif ($row['r_t'] == 2) {
				$nxtD = nextRdate($eStart,$row['r_t'],$row['r_i'],$row['r_p'],0); //goto 1st occurence of xth <dayname> in current month
				$eStart = ($nxtD < $eStart) ? nextRdate($eStart,$row['r_t'],$row['r_i'],$row['r_p'],1) : $nxtD;
			}
			$eEnd = date("Y-m-d", mktime(12, 0, 0, substr($eStart,5,2), substr($eStart,8,2)+$dDif, substr($eStart,0,4)));
			while ($eStart <= min($end, $row['r_u']) and $row['r_u'] >= $start) {
				if ($eEnd >= $start) { //hit
					processEvent(max($start,$eStart), min($end,$eEnd), $eStart, $eEnd, $row);
				}
				$eStart = nextRdate($eStart,$row['r_t'],$row['r_i'],$row['r_p'],1);
				$eEnd = date("Y-m-d", mktime(12, 0, 0, substr($eStart,5,2), substr($eStart,8,2)+$dDif, substr($eStart,0,4)));
			}
		}
	}
	//sort the event list per date
	ksort($evtList);
	foreach ($evtList as &$events) {
		usort($events, 'sortEvt');
	}
}

//
//Process (multi-day) events and save event data
//
function processEvent($from, $till, $eStart, $eEnd, &$row) {
	global $evtList;
	// AW prevent from being null
	if (!$row['xda'])
	{
	    $row['xda'] = '';
	}
	$sTs = mktime(12, 0, 0, substr($from,5,2), substr($from,8,2), substr($from,0,4));
	$eTs = mktime(14, 0, 0, substr($till,5,2), substr($till,8,2), substr($till,0,4));
	for($i=$sTs;$i<=$eTs;$i+=86400) { //increment 1 day
		$curD = date("Y-m-d", $i);
		if (strpos($row['xda'], $curD) === false) { //no exceptions
			$curdm = substr($curD,5);
			if ($row['eda'][0] != '9' and $row['sda'] < $row['eda']) { //multi-day event
			//mde -> 0:no, 1:first, 2:in between ,3:last day
				$evt['mde'] = ($curdm == substr($eStart,5)) ? 1 : (($curdm == substr($eEnd,5)) ? 3 : 2);
				$evt['sti'] = ($evt['mde'] == 1) ? $row['sti'] : '00:00';
				$evt['eti'] = ($evt['mde'] == 3) ? $row['eti'] : '23:59';
			} else { //single day event
				$evt['mde'] = 0;
				$evt['sti'] = $row['sti'];
				$evt['eti'] = ($row['eti'][0] != '9') ? $row['eti'] : ''; //no end time = ''
			}
// (aw)			if (($row['sti'] == "00:00") and ($row['eti'] == "23:59")) {
// (aw)				$evt['sti'] = $evt['eti'] = ''; //all day: start/end time = ''
//			}
			$evt['sda'] = $row['sda']; //used by iCal export
			$evt['eda'] = $row['eda']; //used by iCal export
			$evt['r_t'] = $row['r_t'];
			$evt['r_i'] = $row['r_i'];
			$evt['r_p'] = $row['r_p'];
			$evt['r_u'] = $row['r_u'];
			$evt['not'] = $row['rem'];
			$evt['ada'] = ($row['ada'][0] != '9') ? $row['ada'] : '';
			$evt['mda'] = ($row['mda'][0] != '9') ? $row['mda'] : '';
			$evt['eid'] = $row['eid'];
			$evt['tit'] = stripslashes($row['tit']);
			$evt['rid'] = $row['rid'];
			$evt['ven'] = stripslashes($row['ven']);
			$evt['uid'] = $row['uid'];
			$evt['edr'] = stripslashes($row['edr']);
			$evt['des'] = stripslashes($row['des']);
			$evt['pri'] = $row['pri'];
			$evt['free'] = $row['free'];
			$evt['cid'] = $row['cid'];
			$evt['cnm'] = stripslashes($row['cnm']);
			$evt['rnm'] = stripslashes($row['rnm']);
			$evt['seq'] = str_pad($row['seq'],2,"0",STR_PAD_LEFT);
			$evt['uco'] = $row['uco'];
			$evt['rco'] = $row['rco'];
			$evt['rbg'] = $row['rbg'];
			$evt['maxteam'] = $row['maxteam'];
			$evt['minteam'] = $row['minteam'];
			$evt['una'] = stripslashes($row['una']);
			$evt['oname'] = stripslashes($row['firstname']).' '.stripslashes($row['familyname']);
			$evt['phone'] = $row['phone'];
			$evt['team'] = getEventTeam($evt['eid']);
			$evtList[$curD][] = $evt;
		}
	}
}

//
//Compute next event start date
//
function nextRdate($curD, $rT, $rI, $rP, $i) {
	if($rT == 1) { //repeat xth day, week, month, year
		switch ($rP) { //period
		case 1: //day
			$nxtD = date("Y-m-d", mktime(12, 0, 0, substr($curD,5,2), substr($curD,8,2)+$rI, substr($curD,0,4))); break;
		case 2: //week
			$nxtD = date("Y-m-d", (mktime(12, 0, 0, substr($curD,5,2), substr($curD,8,2), substr($curD,0,4)) + ($rI * 604800))); break;
		case 3: //month
			$nxtD = date("Y-m-d", mktime(12, 0, 0, substr($curD,5,2)+$rI, substr($curD,8,2), substr($curD,0,4))); break;
		case 4: //year
			$nxtD = date("Y-m-d", mktime(12, 0, 0, substr($curD,5,2), substr($curD,8,2), substr($curD,0,4)+$rI));
		}
	} else { //repeat on the xth <dayname> of the month
		$day1Ts = mktime(12, 0, 0, substr($curD,5,2)+$i, 1, substr($curD,0,4));
		$dowDif = $rP - date('N',$day1Ts); //day of week difference
		$offset = $dowDif + 7 * $rI;
		if ($dowDif >= 0) { $offset -= 7; }
		if ($offset >= date('t',$day1Ts)) { $offset -= 7; }
		$nxtD = date("Y-m-d", $day1Ts + (86400 * $offset));
	}
	return $nxtD;
}
?>