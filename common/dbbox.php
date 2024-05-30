<?php
//Database querying

function dbquery($q) {
	global $dbPrefix, $link;
	$q = str_replace ("[db]", $dbPrefix, $q) ; //add database prefix
//	echo "\n<br>DB-Abfrage =".$q."<br> \n";

	$rSet = mysqli_query($link, $q);
	if ($rSet === false) {
		$result = mysqli_error($link);
		file_put_contents("logs/mysql.log", date(DATE_ATOM)."\nScript name: ".$_SERVER['PHP_SELF']."\nMySQL error: ".$result."\nQuery string: $q\n\n" , FILE_APPEND); exit;
	}
	return $rSet;
}

function dbGetBriefings($uid, $rid)
{
	$dat="";
	$q= "SELECT * FROM [db]users_resources WHERE user_id = $uid AND resource_id = $rid";
	$rSet = dbquery($q);
	$row=mysqli_fetch_assoc($rSet);
	return ($row != null);
}
function dbGetBSP_date($uid)
{
	$dat="";
	$q= "SELECT BSP_date FROM [db]users WHERE user_id = $uid AND status > -1";
	$rSet = dbquery($q);
	$row=mysqli_fetch_assoc($rSet);
	return ($row['BSP_date']);
}
function checkEinweisung($uid, $resid)
{
	$dat="";
	$q= "SELECT * FROM [db]users_resources WHERE user_id = $uid AND resource_id = $resid";
	$rSet = dbquery($q);
	$row=mysqli_fetch_assoc($rSet);
	return ($row);
}
function dbGetUsers($exclude, $filter = '')
{
	$q= 'SELECT * FROM [db]users WHERE status=\'active\' and user_id > '.$exclude.$filter;
	$i=0;
	$rSet = dbquery($q);
	if ($rSet !== false) {
		while ($row=mysqli_fetch_assoc($rSet)) {
			$usr_lst[$i]['user_id'] = $row['user_id'];
			$usr_lst[$i]['color'] = $row['color'];
			$usr_lst[$i]['BSP_date'] = IDtoDD($row['BSP_date']);
			$usr_lst[$i]['background'] = $row['background'];
			$usr_lst[$i++]['name'] = $row['firstname']." ".$row['familyname'];
		}
	}
	return $usr_lst;
}

function dbGetResources()
{
	$q= 'SELECT * FROM [db]resources WHERE status=\'active\' ORDER BY sequence';
	$i=0;
	$rSet = dbquery($q);
	if ($rSet !== false) {
		while ($row=mysqli_fetch_assoc($rSet)) {
			$res_lst[$i]['resource_id'] = $row['resource_id'];
			$res_lst[$i++]['name'] = $row['name'];
		}
	}
	return $res_lst;
}
function dbGetCatName($catid)
{
	$q= "SELECT * FROM [db]categories WHERE status='active' AND category_id = $catid";
	$rSet = dbquery($q);
	if ($rSet !== false) {
		if ($row=mysqli_fetch_assoc($rSet))
			$catname = $row['name'];
		}
	return $catname;
}
function dbGetResName($resid)
{
	$q= "SELECT * FROM [db]resources WHERE status='active' AND resource_id = $resid";
	$rSet = dbquery($q);
	if ($rSet !== false) {
		if ($row=mysqli_fetch_assoc($rSet))
		$resname = $row['name'];
	}
	return $resname;
}

function decodeEmailFromIds($from)
{
	$eml_ids = explode(",", $from);
	$eml_lst = "";
	foreach ($eml_ids as $id) {
		$rSet = dbquery("SELECT email FROM [db]users WHERE user_id = $id");
		if ($rSet !== false) {
			while ($row=mysqli_fetch_assoc($rSet)) {
				$eml_lst .= ';'.$row['email'];
			}
		}
	}
	return $eml_lst;
}

function getEventEmlSndRcv($eid)
{
	// build link information in the way &from=(owner_eml)&to=(eml_adresses)&subject=(evt_info)
	$eml_Info = '&from='.getEventOwnerEmail($eid);
	$eml_Info .= '&to='.getEventTeamEmail($eid);
	return $eml_Info;
}

function getAllUsersEmail()
{
	$q= 'SELECT DISTINCT email	FROM [db]users WHERE status=\'active\' and user_id > 1 and email NOT LIKE \'Gast%\'';
	$rSet = dbquery($q);

	if ($rSet !== false) {
		$i=0;
		while (	$row = mysqli_fetch_assoc($rSet))
		{
			if ($i!=0)
			$emailString .= ',';
			$emailString .= $row['email'];
			$i++;
		}
	}
	return $emailString;
}

function getAdminEmail()
{
	global $link;
	$q= 'SELECT email	FROM [db]users WHERE user_name=\'admin\'';
	$rSet = dbquery($q);

	if ($rSet !== false) {
		while (	$row = mysqli_fetch_assoc($rSet))
		{
			$emailString = $row['email'];
		}
	}
	return $emailString;
}

function getEventTeamEmail($evId)
{
	$emailstring = "";
	$team = getEventTeam($evId);
	if (!isset($team['email'])) return $emailString;
	foreach ($team['email'] as $eml)
	{
		$emailString .= $eml.",";
	}
	return $emailString;
}

function getEventOwnerEmail($evId)
{
	$q= 'SELECT e.owner_id, u.email FROM [db]events e INNER JOIN [db]users u ON u.user_id = e.owner_id WHERE e.event_id = '.$evId;
	$rSet = dbquery($q);

	if ($rSet !== false) {
		if (	$row = mysqli_fetch_assoc($rSet))
		{
			$emailString = $row['email'];
		}
	}
	return $emailString;
}

function getEventEmlInfo($eid)
{
	$q= "SELECT e.* FROM [db]events e
	WHERE e.event_id = ".$eid;
	$rSet = dbquery($q);
	$eml = array();
	
	if ($rSet !== false) {
		if (	$row = mysqli_fetch_assoc($rSet))
		{
			$eml['from']= getEventOwnerEmail($eid);
			$eml['subj'] = dbGetCatName($row['category_id']).": ";
				
			switch ($row['category_id']) {
				case 02:		// Event
					{
						$eml['subj'] .= $row['title']." am ".idToDD($row['s_date'])." um ".ITtoDT($row['s_time'])." Uhr";
						break;
					}
				case 01:		// Holiday
					{
						break;
					}
				case 03:		// Boat Event
					{
						$eml['subj'] .= dbGetResName($row['resource_id'])." am ".idToDD($row['s_date'])." um ".ITtoDT($row['s_time'])." Uhr";
						$eml['to'] = getEventTeamEmail($eid);
						break;
					}
			}
			
//			getEventOwnerEmail($eid);
//			$row['oid']String = $row['name'].' am '.$row['s_date'].' um '.$row['s_time'].'-'.$row['e_time'];
		}
	}
	return $eml;
	
}

function getEventTeam($evId)
{
	global $link;
	$q= 'SELECT eu.*, u.firstname, u.familyname, u.user_id, u.email, u.phone FROM [db]event_users eu	INNER JOIN [db]users u ON u.user_id = eu.user_id WHERE eu.event_id = '.$evId;
	$rSet = dbquery($q);
	$team = array();
	if ($rSet !== false) {
		$i=0;
		while (	$row = mysqli_fetch_assoc($rSet))
		{
			$team['user_id'][$i] = $row['user_id'];
			$team['name'][$i] = $row['firstname']." ".$row['familyname'];
			$team['email'][$i] = $row['email'];
			$team['phone'][$i] = $row['phone'];
			$i++;
		}
	}
	return $team;
}

function getAllUserNames($firstId) {
	$userNames = array(0);
	$i = $idx = 0;
	$rSet = dbquery("SELECT user_id, user_name, firstname, familyname FROM [db]users WHERE status='active' AND user_id > $firstId ORDER BY firstname");
	if ($rSet !== false) {
		while ($row=mysqli_fetch_assoc($rSet)) {
			$userNames[$idx++] = $row['firstname']." ".$row['familyname'];
			$i++;
		}
		return $userNames;
	}
}

function dbGetUserId($Name) {
	$uName = explode( ' ', $Name );;
	$rSet = dbquery("SELECT * FROM [db]users WHERE status='active' AND firstname='$uName[0]' AND familyname='$uName[1]'");
	if ($rSet !== false) {
		if ($row=mysqli_fetch_assoc($rSet)) {
			$idx = $row['user_id'];
			return $idx;
		}
	}
}

?>
