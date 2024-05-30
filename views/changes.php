<?php
/*
= view calendar changes (added / edited / deleted events) since specified date =

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

function usortEvt($a, $b) { return strcmp(strval($a['sts']+1).$a['sda'].str_pad($a['sti'],5).$a['seq'], strval($b['sts']+1).$b['sda'].str_pad($b['sti'],5).$b['seq']); }

function showGrid(&$events, $date) {
	global $privs, $wkDays, $showOwner, $showCatName, $eventColor, $xx;
	usort($events, 'uSortEvt');
	foreach ($events as $evt) {
		switch ($evt['r_t']) { //make repeat text
			case 0: $repeat = ''; break;
			case 1: $repeat = $xx['evt_repeat'].' '.$xx['evt_interval1_'.$evt['r_i']].' '.$xx['evt_period1_'.$evt['r_p']]; break;
			case 2: $repeat = $xx['evt_repeat_on'].' '.$xx['evt_interval2_'.$evt['r_i']].' '.$wkDays[$evt['r_p']].' '.$xx['evt_of_the_month'];
		}
		if ($evt['r_t'] > 0 and $evt['r_u']) {
			$repeat .= ' '.$xx['evt_until'].' '.IDtoDD($evt['r_u']);
		}
		
		$access = ($privs > 2 or $evt['uid'] == $_SESSION['uid']) ? true : false;
		echo "<table><tr>";
		echo "<td class=\"lMarginCh\">";
		echo ($evt['sts'] < 0) ? $xx['chg_deleted'] : ($evt['mda'] > $evt['ada'] ? $xx['chg_edited'] : $xx['chg_added']);
		echo "</td><td>";
		echo IDtoDD($evt['sda']);
		if ($evt['sti']) echo " @ ".ITtoDT($evt['sti']);
		if ($evt['eda'] or $evt['eti']) echo " -";
		if ($evt['eda']) echo " ".IDtoDD($evt['eda']);
		if ($evt['eda'] and $evt['eti']) echo " @";
		if ($evt['eti']) echo " ".ITtoDT($evt['eti']);
		echo ($evt['sti'] == "" and $evt['eti'] == "") ? " ".$xx['vws_all_day'] : '';
		if ($repeat) { echo ". ".$repeat; }
		if ($eventColor) {
			$eColor = ($evt['rco'] ? 'color:'.$evt['rco'].';' : '').($evt['rbg'] ? 'background:'.$evt['rbg'].';' : '');
		} else {
			$eColor = $evt['uco'] ? 'background:'.$evt['uco'].';' : '';
		}
		$eStyle = $eColor ? ' style="'.$eColor.'"' : '';
		echo "<h6><span class=\"point\"".$eStyle." onclick=\"eventWin('index.php?xP=11&amp;id=".$evt['eid']."&amp;evDate=".$date."'); return false\">".
			stripslashes($evt['tit'])."</span></h6>\n";
		if ($evt['ven']) { echo $xx['vws_venue'].": ".$evt['ven']."<br />\n"; }
		if ($evt['des']) { echo $evt['des']."<br />\n"; }
		if ($showCatName) { echo $xx['evt_resource'].": ".$evt['cnm']."<br />\n"; }
		if ($evt['not'] >= 0 and $access) { echo "# ".$xx['chg_notify'].": ".$evt['not']." ".$xx['chg_days']." #<br />\n"; }
		if ($showOwner) {
			echo $xx['evt_owner'].": ".$evt['una'];
			if ($evt['mda'] and $evt['edr']) { echo " - ".$xx['vws_edited'].": ".$evt['edr']."<br />\n"; }
		}
		echo "</td></tr></table><br />\n";
	}
}

function grabChanges($sDate) { //query db for changes since $sDate
	global $evtList, $admin;
	
	//set filter
	$filter = '';
	if (count($_SESSION['cU']) > 0 and $_SESSION['cU'][0] != 0) {
		$filter .= " AND e.user_id IN (".implode(",",$_SESSION['cU']).")";
	}
	if (count($_SESSION['cC']) > 0 and $_SESSION['cC'][0] != 0) {
		$filter .= " AND e.resource_id IN (".implode(",",$_SESSION['cC']).")";
	}
	if ($_SESSION['uid'] == 1) { $filter .= " AND c.public = 1"; }
	
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
		e.event_id AS eid,
		e.title AS tit,
		e.venue AS ven,
		e.owner_id AS uid,
		e.editor AS edr,
		e.description AS des,
		e.private AS pri,
		c.name AS cnm,
		c.sequence AS seq,
		c.color AS cco,
		c.background AS cbg,
		u.firstname AS fina,
		u.familyname AS fana,
	u.color AS uco
	FROM [db]events e
	INNER JOIN [db]resources c ON c.resource_id = e.resource_id
	INNER JOIN [db]users u ON u.user_id = e.owner_id
	WHERE ((e.a_date != '9999-01-01' AND e.a_date != '9999-00-00' AND e.a_date >= '$sDate')
	 or (e.m_date != '9999-01-01' AND e.m_date != '9999-00-00' AND e.m_date >= '$sDate'))".$filter;
	$rSet = dbquery($q);

	//process events
	while ($row = mysqli_fetch_assoc($rSet)) {
		if (!$row['pri'] or ($row['uid'] == $_SESSION['uid']) or $admin) { //private: only for current user + admin
			$event['sda'] = $row['sda'];
			$event['eda'] = ($row['eda'][0] != '9') ? $row['eda'] : "";
			if (($row['sti'] == "00:00") and ($row['eti'] == "23:59")) {
				$event['sti'] = $event['eti'] = ""; //all day: start/end time = ""
			} else {
				$event['sti'] = $row['sti'];
				$event['eti'] = ($row['eti'][0] != '9') ? $row['eti'] : ""; //no end time = ""
			}
			$event['r_t'] = $row['r_t'];
			$event['r_i'] = $row['r_i'];
			$event['r_p'] = $row['r_p'];
			$event['r_u'] = ($row['r_u'][0] != '9') ? $row['r_u'] : "";
			$event['not'] = $row['rem'];
			$event['ada'] = $row['ada'];
			$event['mda'] = ($row['mda'][0] != '9') ? $row['mda'] : "";
			$event['sts'] = $row['sts'];
			$event['eid'] = $row['eid'];
			$event['tit'] = stripslashes($row['tit']);
			$event['ven'] = stripslashes($row['ven']);
			$event['uid'] = $row['uid'];
			$event['edr'] = stripslashes($row['edr']);
			$event['des'] = stripslashes($row['des']);
			$event['cnm'] = stripslashes($row['cnm']);
			$event['seq'] = str_pad($row['seq'],2,"0",STR_PAD_LEFT);
			$event['uco'] = $row['uco'];
			$event['cco'] = $row['cco'];
			$event['cbg'] = $row['cbg'];
			$event['una'] = stripslashes($row['fina']).' '.stripslashes($row['fana']);
			$modDate = max($event['ada'],$event['mda']);
			$evtList[$modDate][] = $event;
		}
	}
	ksort($evtList);
}

//sanity check
if (!defined('LCC')) { exit('not permitted (chgs)'); } //lounch via script only

//main program
$evtList = array();
$fromD = (isset($_POST['fromD'])) ? DDtoID($_POST['fromD']) : date('Y-m-d');
$fromD = min($fromD, date('Y-m-d'));

grabChanges($fromD); //query db for changes

//display header
echo "<div class=\"headCh\">\n";
if (!$mobile) {
	echo '<button class="floatR noprintx" onclick="printNice(\'noprintx\')">'.$xx['vws_print']."</button>\n";
}
echo "<form method=\"post\" id=\"selectD\" name=\"selectD\" action=\"index.php\">\n";
echo $xx['chg_from_date'].': ';
echo '<input type="text" name="fromD" id="fromD" value="'.IDtoDD($fromD)."\" size='10' />\n";
echo '<button title="'.$xx['chg_select_date']."\" onclick=\"dPicker(0,'selectD','fromD'); return false;\">&larr;</button>\n";
echo "</form>\n";
echo "</div>\n";

//display changes
echo '<div'.($mobile ? '' : ' class="scrollBoxCh"').">\n";
echo '<div class="eventBg">'."\n";
if ($fromD != date('Y-m-d')) {
	echo '<h4>',makeD($fromD,2)," - ",makeD(date('Y-m-d'),2),'</h4>'."\n<br />\n";
}
if ($evtList) {
	foreach($evtList as $date => &$events) {
		echo "<br /><h6>".$xx['chg_changed_on']." ".makeD($date,6)."</h6><br />\n";
		showGrid($events,$date);
	}
} else {
	echo "<br />".$xx['chg_no_changes']."<br />";
}
echo "</div><br />";
echo "</div>";
?>
