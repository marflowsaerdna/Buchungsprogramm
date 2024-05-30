<?php
/*
= upcoming events view =
Config Params: $upcomingDays (number of days tolook ahead)


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
function retrieveCount($from, $to, $rselected)
{
	// fetch all user ids
	$users = dbGetUsers(2, ' and privs > 1');
	
	// for every user count all events where user is responsible if private or not
	$idx = 0;
	if ($rselected != 0)
		$filter = "and e.resource_id = ".$rselected;
	while (isset($users[$idx]['user_id']))
	{
		$q= "SELECT count(*) from [db]events e
		inner join [db]resources r on e.resource_id = r.resource_id
		where e.category_id = 3 ".$filter." and e.owner_id = ".$users[$idx]['user_id'].
		" and e.status = 0 and e.private != 1 and e.free = 0 and r.teamsize_max > 1
		and e.s_date >= \"".$from."\" and e.s_date <= \"".$to."\"";    // green events
		$rSet = dbquery($q);
		if ($row=mysqli_fetch_assoc($rSet)) {
			$users[$idx]['green'] = $row['count(*)'];
		}
		$q= "SELECT count(*) from [db]events e
		inner join [db]resources r on e.resource_id = r.resource_id
		where e.category_id = 3 ".$filter." and e.owner_id = ".$users[$idx]['user_id'].
		" and e.status = 0 and e.free = 0 and (e.private = 1 or r.teamsize_max = 1)
		and e.s_date >= \"".$from."\" and e.s_date <= \"".$to."\"";    // red events
		$rSet = dbquery($q);
		if ($row=mysqli_fetch_assoc($rSet)) {
			$users[$idx]['red'] = $row['count(*)'];
		}
		$q= "SELECT count(*) from [db]events e
		where e.category_id = 3 ".$filter." and e.owner_id = ".$users[$idx]['user_id']." and e.status = 0 and e.free = 1
		and e.s_date >= \"".$from."\" and e.s_date <= \"".$to."\"";		// yellow events
		$rSet = dbquery($q);
		if ($row=mysqli_fetch_assoc($rSet)) {
			$users[$idx]['yellow'] = $row['count(*)'];
		}
		$idx++;
	}
	// sort array by green counts
	foreach($users as $c=>$key) {
        $sort_green[] = $key['green'];
        $sort_yellow[] = $key['yellow'];
    }
    array_multisort($sort_green, SORT_DESC, $sort_yellow, SORT_DESC, $users);
    return $users;
}


//sanity check
if (!defined('LCC')) { exit('not permitted (hisc)'); } //lounch via script only

//initialize
$cD = $_SESSION['cD'];
$eTime = mktime(0,0,0,substr($cD,5,2),substr($cD,8,2),substr($cD,0,4)) + (($upcomingDays-1) * 86400); //Unix time of end date
$toD = (isset($_POST['toD'])) ? DDtoID($_POST['toD']) : date("Y-m-d", $eTime);
$fromD = (isset($_POST['fromD'])) ? DDtoID($_POST['fromD']) : date('Y-m-d');
$rselected = (isset($_POST['rselected'])) ? $_POST['rselected'] : 0;

$ranking = retrieveCount($fromD, $toD, $rselected);   // 0 --> all selected

//display header
echo "<div class=\"headUp noprint\">\n";
if (!$mobile) {
	echo '<button class="floatR noprintx" onclick="printNice(\'noprintx\');">'.$xx["vws_print_all"]."</button>\n";
}
// echo '<h5>Stand: ',makeD($today,2),'</h5>'."\n<br />\n";
echo "<form method=\"post\" id=\"selectD\" name=\"selectD\" action=\"index.php\">\n";
echo $xx['chg_from_date'].': ';
echo '<input type="text" name="fromD" id="fromD" value="'.IDtoDD($fromD)."\" size='10' />\n";
echo '<button title="'.$xx['chg_select_date']."\" onclick=\"dPicker(0,'selectD','fromD'); return false;\">&larr;</button>\n";

echo $xx['chg_to_date'].': ';
echo '<input type="text" name="toD" id="toD" value="'.IDtoDD($toD)."\" size='10' />\n";
echo '<button title="'.$xx['chg_select_date']."\" onclick=\"dPicker(0,'selectD','toD'); return false;\">&larr;</button>\n";

echo $xx['evt_resource'].': ';
$q = "SELECT r.* FROM [db]resources r  WHERE r.status >= 0 AND resource_id != 0 ORDER BY r.resource_id";
$rSet = dbquery($q);
if ($rSet !== false) {
	if (mysqli_num_rows($rSet) > 0 ) {
		echo "<select name='rselected' id='rselected' onChange='submit( );'>\n";
		$idx = 0;
		echo "<option value=\"0\" ";
		if ($rselected == $idx)
			echo " selected";
		echo " length=150px> alle </option>\n";
		while ($row=mysqli_fetch_assoc($rSet)) {
			$idx++;
			$selected = ($selRes == $row["resource_id"]) ? " selected=\"selected\"" : "";
			$resStyle = ($row["color"]!="") ? " style=\"color: ".$row["color"]."; background: ".$row["background"].";\"" : "";
			echo "<option ";
			if ($rselected == $idx)
				echo " selected";
			echo " value=\"".$row["resource_id"]."\"".$resStyle.$selected." length=150px>".stripslashes($row["name"])." </option>\n";
		}
		echo "</select> \n";
	}
}


echo "</form>\n";

echo "</div>\n";

//Display ranking
echo '<div'.($mobile ? '' : ' class="scrollBoxUp"').">\n";
echo '<div class="eventBg">'."\n";
echo "Highscore der 'sozialen Schiffsführer'<br>";
echo "Gezählt wird die Anzahl der eingestellten Termine, die zum Mitfahren freigegeben wurden";
echo "<table><tr><td class=\"lMarginUp\"></tr>";
	$platz=1;
	$score = -1;
	foreach($ranking as $rank) {
		echo "<tr>";
		if ($score != $rank['green']) {
			$score = $rank['green'];
			echo "<td><b>".$platz.". Platz: </b></td>";
			$platz++;
		}
		else 
		{
			echo "<td></td>";
		}
		echo "<td><b>".$rank['name']."</b></td>";
		echo "<td><img src=\"images/point_green.png\"/></td>";
		echo "<td>".$rank['green']." Fahrten</td>\n";
		echo "<td><img src=\"images/point_yellow.png\"/></td>";
		echo "<td>".$rank['yellow']." Fahrten</td>\n";
		echo "<td><img src=\"images/point_red.png\"/></td>";
		echo "<td>".$rank['red']." Fahrten</td>\n";
		echo "</tr>\n";
		echo "<tr><td></td><td></td>\n";
	}

echo "</table>";
echo "</div>\n</div>\n";
?>
