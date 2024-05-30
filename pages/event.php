<?php
/*
= LuxCal user management page =

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
?>


<script type="text/javascript">

function hide_times(t) {
	if (t.checked) {
		document.getElementById("dTimeS").style.visibility = "hidden";
		document.getElementById("dTimeE").style.visibility = "hidden";
	} else {
		document.getElementById("dTimeS").style.visibility = "visible";
		document.getElementById("dTimeE").style.visibility = "visible";
		t.form.start_time.value = t.form.end_time.value = "";
	}
}

function set_daybooking(t) {
	if (t == 2) {
		document.getElementById("dTimeS").style.visibility = "hidden";
		document.getElementById("dTimeE").style.visibility = "hidden";
		document.event.sti.value = "00:00";
		document.event.eti.value = "23:59";
	}
	if (t == 0) {
		document.getElementById("dTimeS").style.visibility = "visible";
		document.getElementById("dTimeE").style.visibility = "visible";
		document.event.sti.value = "00:00";
		document.event.eti.value = "14:00";
	}
	if (t == 1) {
		document.getElementById("dTimeS").style.visibility = "visible";
		document.getElementById("dTimeE").style.visibility = "visible";
		document.event.sti.value = "14:00";
		document.event.eti.value = "23:59";
	}
	if (t == 3) {
		document.getElementById("dTimeS").style.visibility = "visible";
		document.getElementById("dTimeE").style.visibility = "visible";
		document.event.sti.value = "18:00";
		document.event.eti.value = "23:59";
	}
}
	
function set_times_2(t) {
	if (t.checked) {
		document.getElementById("dTimeS").style.visibility = "visible";
		document.getElementById("dTimeE").style.visibility = "visible";
		t.form.start_time.value = t.form.end_time.value = "";
	}
}

</script>

<?php
function catMenu($selCat) {
	global $privs;
	$where = ' WHERE status >= 0'.($_SESSION['uid'] == 1 ? " AND public > 0" : "");
	$rSet = dbquery("SELECT category_id, name, color, background FROM [db]categories".$where." ORDER BY sequence");
	if ($rSet !== false) {
		while ($row=mysqli_fetch_assoc($rSet)) {
			$selected = ($selCat == $row["category_id"]) ? " selected=\"selected\"" : "";
			$catStyle = ($row["color"]!="") ? " style=\"color: ".$row["color"]."; background: ".$row["background"].";\"" : "";
			echo "<option value=\"".$row["category_id"]."\"".$catStyle.$selected." length=150px>".stripslashes($row["name"])." </option>\n";
		}
	}
}

function resMenu($selRes) {
	global $oid, $resid;
	$where = ' WHERE r.status >= 0';
	if ($oid == 1) {  // public
		$where .= " AND public > 0";
		unset($BSP_date);
		$q     = "SELECT r.* FROM [db]resources r ".$where." ORDER BY r.sequence";
	}
	if ($oid == 2) {  // admin
		$BSP_date = '1999-99-99';
		$where .= " AND resource_id != 0";
		$q     = "SELECT r.* FROM [db]resources r ".$where." ORDER BY r.sequence";
	}
	if ($oid > 2) { // normal user
		$BSP_date = dbGetBSP_date($oid);
		$where = "INNER JOIN [db]users_resources ru ON r.resource_id = ru.resource_id INNER JOIN [db]users u ON ru.user_id = u.user_id".$where." AND ru.user_id=".$oid." ";
		$q     = "SELECT r.*, u.BSP_date FROM [db]resources r ".$where." ORDER BY r.sequence";
	}
	if ($BSP_date != '0000-00-00' and $BSP_date)
	{
		$rSet = dbquery($q);
		if ($rSet !== false) {
			if (mysqli_num_rows($rSet) > 0 ) {
				echo "<select name='resid' id='resid' onChange='submit( );'>\n";
				while ($row=mysqli_fetch_assoc($rSet)) {
					$selected = ($selRes == $row["resource_id"]) ? " selected=\"selected\"" : "";
					$resStyle = ($row["color"]!="") ? " style=\"color: ".$row["color"]."; background: ".$row["background"].";\"" : "";
					echo "<option value=\"".$row["resource_id"]."\"".$resStyle.$selected." length=150px>".stripslashes($row["name"])." </option>\n";
				}
				echo "</select> \n";
			}
			else {
				echo "<b>Keine Einweisungen vorhanden, keine Buchung möglich !</b>\n";			
				$resid = 0;
			}
		}
	}
	else 
	{
		echo "<br><b>Kein BSP hinterlegt, keine Buchung möglich !</b>\n";
		$resid = 0;
	}
}

function userMenu($selUser) {
	global $userEml;
	$rSet = dbquery("SELECT * FROM [db]users WHERE status='active' ORDER BY familyname");   // hier kommen noch die Einweisungen rein
	if ($rSet !== false) {
		while ($row=mysqli_fetch_assoc($rSet)) {
			if (!$key = array_search($row["user_id"], $exceptions))
			{
				$selected = ($selUser == $row["user_id"]) ? " selected=\"selected\"" : "";
				$name = $row["firstname"]." ".$row["familyname"];
				echo "<option value=\"".$row["user_id"]."\"".$selected.">".stripslashes($name)."</option>\n";
			}
		}
	}
}

function ownerMenu($selOwner) {
	global $userEml;
	$rSet = dbquery("SELECT * FROM [db]users WHERE status='active' AND privs >= 2 ORDER BY familyname");   // hier kommen noch die Einweisungen rein
	if ($rSet !== false) {
		while ($row=mysqli_fetch_assoc($rSet)) {
//			if (!$key = array_search($row["user_id"], $exceptions))
//			{
				$selected = ($selOwner == $row["user_id"]) ? " selected=\"selected\"" : "";
				$name = $row["firstname"]." ".$row["familyname"];
				echo "<option value=\"".$row["user_id"]."\"".$selected.">".stripslashes($name)."</option>\n";
//			}
		}
	}
}

function notifyNow($noteText) { //notify added/edited/deleted event
	global $xx, $calendarEmail, $calendarTitle, $calendarUrl, $team, $edr, $mda, $owner_name, $owner_tel, $nml, $tit, $cid, $resid, $sda, $ven, $desX, $sda, $eda, $sti, $eti, $r_t, $ald, $repTxt;
	
	$emlStyle = "background:#FFFFDD; color:#000099; font:12px arial, sans-serif;"; //email body style definition
	
	//get resource
	$rSet = dbquery("SELECT name, color, background FROM [db]resources WHERE resource_id = $resid");
	$row = mysqli_fetch_assoc($rSet);
	
	//compose email message
	$dateTime = $sda;
	if ($sti) $dateTime .= " @ ".$sti;
	if ($eda or $eti) $dateTime .= " -";
	if ($eda) $dateTime .= " ".$eda;
	if ($eda and $eti) $dateTime .= " @";
	if ($eti) $dateTime .= " ".$eti;
	$dateTime .= ($ald == "all" ? " ".$xx["evt_all_day"] : "").($r_t > 0 ? " (".$repTxt.")" : "");
	$subject = $row['name']." ".$dateTime.": ".$noteText;
	$style = ($row["color"] or $row["background"]) ? " style=\"color: ".$row["color"]."; background: ".$row["background"].";\"" : "";
	$message = "
<html>
<head>\n<title>".$calendarTitle." ".$xx['evt_mailer']."</title>
<style type='text/css'>
body, p, table {".$emlStyle."}
td {vertical-align:top;}
</style>
</head>
<body>
<p><b>".$noteText.":<b></p>
<table>
	<tr><td colspan=\"4\"><hr /></td></tr>
	<tr><td>".$xx['evt_title'].":</td><td></td><td><b><span".$style.">".$tit."</span></b></td></tr>
	<tr><td>".$xx['evt_resource'].":</td><td></td><td>".stripslashes($row["name"])."</td></tr>
	<tr><td>".$xx['evt_date_time'].":</td><td></td><td>".$dateTime."</td></tr>
	<tr><td>".$xx['evt_venue'].":</td><td></td><td>".(($ven) ? $ven : "- -")."</td></tr>
	<tr><td>".$xx['evt_skipper'].":</td><td></td><td><b>".$owner_name."</b></td><td><b>".$owner_tel."</b></td></tr>";
	
	foreach ($team['name'] as $member)
	{
		if ($member == $team['name'][0])
		$message .= "<tr><td>Team:</td>";
		$message .=  "<td></td><td>$member</td><td></td></tr><tr><td></td>";
	}
$message .="	<tr><td>".$xx['evt_description'].":</td><td colspan = \"2\">".(($desX) ? $desX : "- -")."</td></tr>
<tr><td colspan=\"4\"><hr /></td></tr>
<tr><td colspan=\"4\">Letzte Änderung durchgeführt durch $edr am ".date("d.m.y H:i")."</td></tr>
</table>
<p>".$xx['eml_msg_footer']."</p>
</body>
</html>
";
	$headers = 'MIME-Version: 1.0'."\n".'Content-type: text/html; charset=iso-8859-1'."\n".'From: '.$calendarEmail;
	//send emails
	if ($_SESSION['notify']) { //email address(es) to notify
		if (!wvfcal_email('', $_SESSION['notify'], "CC", "BCC", $subject, $message, $headers, "notify_email.php", null))
			$eMsg = "Benachrichtigungs-Email nicht verschickt!";
		unset($_SESSION['notify']);
	}
}

//sanity check
if (!defined('LCC') or
//		(isset($_REQUEST['id']) and !preg_match('%^\d{1,8}$%', $_REQUEST['id'])) or
		(!empty($_REQUEST['evDate']) and !preg_match('%^\d{2,4}-\d{2}-\d{2,4}$%', $_REQUEST['evDate'])) or
		(!empty($_REQUEST['evTimeS']) and !preg_match('%^\d{2}:\d{2}$%', $_REQUEST['evTimeS'])) or
		(!empty($_REQUEST['evTimeE']) and !preg_match('%^\d{2}:\d{2}$%', $_REQUEST['evTimeE'])) or
		(isset($_GET['mode']) and !preg_match('%^(add|show|edit|showMini)$%', $_GET['mode']))
	) { exit('not permitted (evnt)'); }
		

//init mode
$mode = isset($_POST['mode']) ? $_POST['mode'] : $_GET['mode']; //show | edit | add | showMini
if (isset($_POST['refresh'])) {
	$refresh =  true;
} else {
	$refresh = false;
}
	$close = false;
	if     (isset($_POST['add_exe_cls'])) { $mode = 'add_exe'; $close = true; }
	elseif (isset($_POST['add_exe'])) { $mode = 'add_exe'; }
	elseif (isset($_POST['upd_exe_cls'])) { $mode = 'upd_exe'; $close = true; }
	elseif (isset($_POST['upd_exe'])) { $mode = 'upd_exe'; }
	elseif (isset($_POST['updt_exe_cls'])) { $mode = 'updt_exe'; $close = true; }
	elseif (isset($_POST['updt_exe'])) { $mode = 'updt_exe'; }
	elseif (isset($_POST['del_exe_cls'])) { $mode = 'del_exe'; $close = true; }
	elseif (isset($_POST['del_exe'])) { $mode = 'del_exe'; }

$editN = (isset($_POST['editN'])) ? $_POST['editN'] : 0;
if (isset($_POST['edit_nx'])) { $editN = 2; } //edit series
if (isset($_POST['edit_1x'])) { $editN = 1; } //edit occurence

$evDate = isset($_REQUEST['evDate']) ? $_REQUEST['evDate'] : '';
$eid = isset($_REQUEST['id']) ? $_REQUEST['id'] : -1;
$eMsg = $wMsg = $cMsg = NULL;

// retrieve user info
$uid = $_SESSION['uid'];
$rSet = dbquery("SELECT * FROM [db]users WHERE user_id = $uid" );
if (!$rSet) echo "Database Error.";
else {
	$row = mysqli_fetch_assoc($rSet);
	$user = $row['user_name'];
	$user_name = $row['firstname']." ".$row['familyname'];
	$user_tel = $row['phone'];
}

if (isset($_POST['team_del_member'])) {
	$ed =IDtoDD($evDate);
		$sql = 'DELETE FROM [db]event_users WHERE event_id = '.$eid.' and user_id = '.$uid; //  .' and event_date = "'.$ed.'"';
		($result = dbquery($sql)) ?  $cMsg = $user_name." ".$xx['evt_member_deleted'] : $eMsg = $xx['db_error']." SQL=".$sql; //add to events table
		$edr = $user_name;
		$non = true;
		echo "\n<script type=\"text/javascript\">self.opener.location.reload(true);</script>\n";
}
// current user joins the eventteam
if (isset($_POST['team_add_member'])) {
		$sql = "INSERT INTO [db]event_users (user_id, event_id, event_date) VALUES ('$uid', '$eid', 'IDtoDD($evDate)')";
		($result = dbquery($sql)) ?  $cMsg = $user_name." ".$xx['evt_member_added'] : $eMsg = $xx['db_error']." SQL=".$sql;//add to events table
		$edr = $user_name;
		$non = true;
		echo "\n<script type=\"text/javascript\">self.opener.location.reload(true);</script>\n";
}


//init event data
	if (($mode == 'show' or $mode == 'showmini' or $mode == 'edit') and !$refresh)
	{
				$rSet = dbquery("
				SELECT e.*, c.name AS cat_name, c.rpeat AS cat_rept, r.name AS res_name, r.color, r.background, u.user_name, u.firstname, u.familyname, u.phone
				FROM [db]events e
				INNER JOIN [db]categories c ON c.category_id = e.category_id
				INNER JOIN [db]resources r ON r.resource_id = e.resource_id
				INNER JOIN [db]users u ON u.user_id = e.owner_id
				WHERE e.event_id = $eid");
			$row = mysqli_fetch_assoc($rSet);
			$tit = htmlspecialchars(stripslashes($row['title']));
			$ven = htmlspecialchars(stripslashes($row['venue']));
			$des = stripslashes($row['description']);
			$resid = $row['resource_id'];
			$catid = $row['category_id'];
			$oid = $row['owner_id'];
			$cname = $row['cat_name'];
			$crept = $row['cat_rept'];
			if ($privs > 2) 
			{
				// Superuser, all rights
				$rights = 2;	// edit all items
			}
			else
			{
				if ($oid == $uid)	// user is owner of event
				{
					$rights = 2;	// edit all items
				}
				else
				{
					if ($privs > 2)
					$rights = 1;		// only possible to enter/leave team
					else
					$rights = 0;
				}
			}
//			$rights = ($privs > 2 or $uid == $_SESSION['uid'] or ($mode == "showMini" and $miniCalPost)) ? 1 : 0; //edit rights
			$hlink = '%<a\s[^<>]*?href="(https{0,1}://[^|<>\s]{5,})"[^|<>]*?>([^|<>]*?)</a>\s*%';
			if (($mode != 'show' and $mode != 'showMini') or ($oneStepEdit and $rights)) {
//				$des = preg_replace_callback($hlink,create_function('$m','return $m[1].(substr($m[2],0,7)!="http://"?" [".$m[2]."] ":" ");'),$des);
			    $des = preg_replace_callback($hlink, function() { return $m[1].(substr($m[2],0,7)!="http://"?" [".$m[2]."] ":" ");}, $des);
			}
			$nml = ($row['not_mail']) ? $row["not_mail"] : $umail;
			$pri = $row['private'];
			$free = $row['free'];
			if ($editN == 1) {
				$sda = IDtoDD($evDate);
				$eda = "";
				$r_t = 0;
			} else {
				$sda = IDtoDD($row['s_date']);
				$eda = ($row['e_date'][0] != "9") ? IDtoDD($row['e_date']) : "";
				$r_t = $row['r_type'];
			}
			$xda = $row['x_dates'];
			$sti = ITtoDT(substr($row['s_time'],0,5));
			$eti = ($row['e_time'][0] != "9") ? ITtoDT(substr($row['e_time'],0,5)) : "";
			if (($sti == "00:00") && ($eti == "23:59"))
				$daybooking = 'allday';
			if (($sti == "00:00") && ($eti == "14:00"))
				$daybooking = 'morning';
			if (($sti == "14:00") && ($eti == "23:59"))
				$daybooking = 'afternoon';
			if (($sti == "18:00") && ($eti == "23:59"))
				$daybooking = 'evening';
			$ri1 = $ri2 = $rp1 = $rp2 = 0;
			if ($r_t == 1) {
				$ri1 = $row['r_interval'];
				$rp1 = $row['r_period'];
			} elseif ($r_t == 2) {
				$ri2 = $row['r_interval'];
				$rp2 = $row['r_period'];
			}
			$rul = ($row['r_until'][0] != "9") ? IDtoDD($row['r_until']) : "";
			$not = $row['notify'];
			$ada = $row['a_date'];
			$mda = $row['m_date'][0] != '9' ? $row['m_date'] : "";
			if (!$edr)
				$edr = stripslashes($row['editor']);
			$rname = stripslashes($row['res_name']);
			$col = $row['color'];
			$bco = $row['background'];
			$own = stripslashes($row['user_name']);
			$owner_name = $row['firstname']." ".$row['familyname'];
			$owner_tel = $row['phone'];
			$team = getEventTeam($eid);
	}
	else
	{		$tit = isset($_POST['tit']) ? htmlspecialchars(strip_tags(trim($_POST['tit']),'<b><i><u><s><center>')) : "";
			$ven = isset($_POST['ven']) ? htmlspecialchars(strip_tags(trim($_POST['ven']),'<b><i><u><s><center>')) : "";
			$des = isset($_POST['des']) ? strip_tags(trim($_POST['des']),'<a><b><i><u><s>') : "";
			$oid = isset($_POST['oid']) ? $_POST['oid'] : (isset($_POST['oUid']) ? $_POST['oUid'] : $_SESSION['uid']);
			$nml = isset($_POST['nml']) ? $_POST['nml'] : $umail;
			$pri = isset($_POST['pri']) ? ($_POST['pri'] == 'yes' ? 1 : 0) : 0;
			$free = isset($_POST['free']) ? ($_POST['free'] == 'true' ? 1 : 0) : 0;
			$sda = isset($_POST['sda']) ? $_POST['sda'] : "";
			$eda = isset($_POST['eda']) ? $_POST['eda'] : "";
			$xda = isset($_POST['xda']) ? $_POST['xda'] : "";
			$catid = isset($_POST['catid']) ? $_POST['catid'] : 3;
			$resid = isset($_POST['resid']) ? $_POST['resid'] : 1;
			if (($catid != 3) && ($catid != 4)) {$resid = 15;}
			if (isset($_POST['Member0'])) { $team['name'][0] = $_POST['Member0'];} else {unset($team['name'][0]);}
			if (isset($_POST['Member1'])) { $team['name'][1] = $_POST['Member1'];} else {unset($team['name'][1]);}
			if (isset($_POST['Member2'])) { $team['name'][2] = $_POST['Member2'];} else {unset($team['name'][2]);}
			if (isset($_POST['Member3'])) { $team['name'][3] = $_POST['Member3'];} else {unset($team['name'][3]);}
			if (isset($_POST['Member4'])) { $team['name'][4] = $_POST['Member4'];} else {unset($team['name'][4]);}
			if (isset($_POST['Member5'])) { $team['name'][5] = $_POST['Member5'];} else {unset($team['name'][5]);}
			if (isset($_POST['Member6'])) { $team['name'][6] = $_POST['Member6'];} else {unset($team['name'][6]);}
			if (isset($_POST['Member7'])) { $team['name'][7] = $_POST['Member7'];} else {unset($team['name'][7]);}
			if (isset($_POST['Member8'])) { $team['name'][8] = $_POST['Member8'];} else {unset($team['name'][8]);}
			if (isset($_POST['Member9'])) { $team['name'][9] = $_POST['Member9'];} else {unset($team['name'][9]);}
			// user was added to event
			if (isset($_POST['team_increase'])) {
				$team['name'] = addString($team['name'], $_POST['Benutzer']);
			}
			// user was removed from event
			if (isset($_POST['team_reduce'])) {
				$team['name'] = removeString($team['name'], $_POST['Mitfahrer']);
			}

			$sti = isset($_POST['sti']) ? $_POST['sti'] : "";
			$eti = isset($_POST['eti']) ? $_POST['eti'] : "";
			$r_t = isset($_POST['r_t']) ? $_POST['r_t'] : 0;
			$ri1 = isset($_POST['ri1']) ? $_POST['ri1'] : 0;
			$rp1 = isset($_POST['rp1']) ? $_POST['rp1'] : 0;
			$ri2 = isset($_POST['ri2']) ? $_POST['ri2'] : 0;
			$rp2 = isset($_POST['rp2']) ? $_POST['rp2'] : 0;
			$rul = isset($_POST['rul']) ? $_POST['rul'] : "";
			$not = isset($_POST['not']) ? $_POST['not'] : -1;
			$ada = isset($_POST['ada']) ? $_POST['ada'] : "";
			$mda = isset($_POST['mda']) ? $_POST['mda'] : "";
			$edr = isset($_POST['edr']) ? $_POST['edr'] : "";
			$daybooking = isset($_POST['daybooking']) ? $_POST['daybooking'] : "";
//			$uid = $_SESSION['uid'];
			$memberAction = isset($_POST['memberAction']) ? $_POST['memberAction'] : "";
			// retrieve category info
			$rSet = dbquery("SELECT * FROM [db]categories WHERE category_id = $catid" );
			if (!$rSet) echo "Database Error.";
			else {
				$row = mysqli_fetch_assoc($rSet);
				$crept = $row['rpeat'];
				$cname = $row['name'];
			}
			// retrieve user info
			$rSet = dbquery("SELECT * FROM [db]users WHERE user_id = $oid" );
			if (!$rSet) echo "Database Error.";
			else {
				$row = mysqli_fetch_assoc($rSet);
				$own = $row['user_name'];
				$owner_name = $row['firstname']." ".$row['familyname'];
				$owner_tel = $row['phone'];
			}
	}

	// current user takes over event
	if (isset($_POST['evt_takeover'])) {
		$oid = $uid;
		$owner_name = $user_name;
		$owner_tel = $user_tel;
		$free = 0;
		$i = array_search($owner_name, $team['name']);
		if ($i !== false) {
			array_splice($team['name'],$i, 1);
			array_splice($team['user_id'],$i, 1);
			array_splice($team['user_email'],$i, 1);
		}
		 $mode = "upd_exe";
	}
	
// retrieve event owner info
// collect already included persons
		
$maxteam = GetTeamsize($resid); 
$userlist = getAllUserNames(2);
// AW prevent from being null
if ( is_array($team['name']) ) {   // this had to be done because of PHP update to 7.2
    $imax = sizeof($team['name']);
} else {
    $imax = 0;
}
for ($i=0 ; $i<=$imax;$i++) {
	if ($team['name'][$i]== "") {
		unset ( $team['user_id'][$i] );
		unset ( $team['name'][$i] );
		unset ( $team['email'][$i] );
	}
}
if ($team) {
	$exclude = $team;
}
else {
	$exclude['name'][0] = "";
}
array_push($exclude['name'], $owner_name, "Administrator");
$usergroup = array_diff ( $userlist, $exclude['name'] );
$usergroup = array_values($usergroup);


if (($mode == "show" or $mode == "showMini") and $oneStepEdit and $rights)  //1-step edit
	$mode="edit";


$oUid = isset($_POST['oUid']) ? $_POST['oUid'] : $uid; 				//remember original user ID

//make repeat text
switch ($r_t) {
	case 0: $repTxt = $xx['evt_no_repeat']; break;
	case 1: $repTxt = $xx['evt_repeat'].' '.$xx['evt_interval1_'.$ri1].' '.$xx['evt_period1_'.$rp1]; break;
	case 2: $repTxt = $xx['evt_repeat_on'].' '.$xx['evt_interval2_'.$ri2].' '.$wkDays[$rp2].' '.$xx['evt_of_the_month'];
}
if ($r_t > 0 and $rul) {
	$repTxt .= ' '.$xx['evt_until'].' '.$rul;
}

if ($mode == "add" and !$refresh) { //add event - preset date/times if available
	if (isset($_REQUEST['evDate'])) { $sda = IDtoDD($_REQUEST['evDate']); }
	if (isset($_REQUEST['evTimeS'])) { $sti = ITtoDT($_REQUEST['evTimeS']); }
	if (isset($_REQUEST['evTimeE'])) { $eti = ITtoDT($_REQUEST['evTimeE']); }
}

//all day event?
// $ald = isset($_POST['ald']) ? $_POST['ald'] : "";
// if (DTtoIT($sti) == "00:00" and DTtoIT($eti) == "23:59") { $ald = 'all'; }
// if ($daybooking == 'allday') { $sti = $eti = ""; }

//add/update event
if ($mode == "add_exe" or $mode == "upd_exe") {
	
//validate input fields
	$bspdate = dbGetBSP_date($oid);
	$desX = str_replace( array("\r\n", "\n", "\r"), "<br />", $des); //convert crlf to <br />
	$hlink='%((https{0,1}://[^.|<>\s]{2,}|www)\.[^.<>\s]{2,}\.[^<>\s\[]{2,})\s*(\[([^<>]*?)\]){0,1}%';
//	$desX = preg_replace_callback($hlink,create_function('$m','return \'<a class="link" href="http://\'.$m[1].\'" target="_blank">\'.(isset($m[4])?$m[4]:$m[1].\'\').\'</a> \';'),$desX); //create html links
	$desX = preg_replace_callback($hlink, function() {'return \'<a class="link" href="http://\'.$m[1].\'" target="_blank">\'.(isset($m[4])?$m[4]:$m[1].\'\').\'</a> \';';}, $desX); // create html links
	$desX = str_replace("http://http","http",$desX);
	while (true) {
		if (($resid == 0) && $catid == 3) {$eMsg .= $xx['evt_no_resource']."<br />"; break; }
		if ((!$admin) && ($catid == 3) && (!checkEinweisung($oid, $resid))) {$eMsg .= "Keine Einweisung vorhanden, Buchung nicht möglich!<br />"; break; }
		if ($catid == 3){
			if (checkResourceBooked($sda, $sti, $eda, $eti, $resid, $eid)) { $eMsg .= $xx['evt_resource_not_available'].'<br>'; break; }
			if (count($team['name']) > ($maxteam-1)) { $wMsg .= $xx['evt_capacity_exceed'].'<br>'; }
		}
		if (!$tit) { $eMsg .= $xx['evt_no_title']."<br />"; }
		if ( !$admin && ($bspdate == 000-00-00))  { $eMsg .= "Für ".$owner_name." ist kein BSP hinterlegt - keine Buchung möglich!"; break; }
		if (array_search($owner_name, $team['name'])) {   $eMsg .= 'Schiffsführer kann nicht gleichzeitig Mitfahrer sein<br>'; break; }
		if ($sda) {
			$sdate = DDtoID($sda);
			if (($sdate >= '2013-12-31')&&($privs < 2)) { $eMsg .= "Für 2014 können noch keine Termine gebucht werden!"; break; }    // AW
			if (!$sdate) { $eMsg .= $xx['evt_bad_date'].": ".$sda."<br />"; break; }
		} else { $eMsg .= $xx['evt_no_start_date']."<br />"; break; }
		if ($eda and $eda != $sda) {
			$edate = DDtoID($eda);
			if (!$edate) {
				$eMsg .= $xx['evt_bad_date'].": ".$eda."<br />"; break;
			} elseif ($edate < $sdate) {
				$eMsg .= $xx['evt_end_before_start_date']."<br />"; break;
			}
			$diffdays = (strtotime($edate) - strtotime($sdate))/(24*3600);  // event durance in days
			if (($diffdays >= 5) && !$admin) { $eMsg .= "Zeitraum zu lange - Maximale Buchungsdauer 5 Tage!"; break; }
		} else { $edate = "9999-00-00"; }
		if ($ald == "all") {
			$stime = "00:00";
			$etime = "23:59";
		} else {
			if ($sti)
			{
				$stime = DTtoIT($sti);
				if (!$stime) { $eMsg .= $xx['evt_bad_time'].": ".$sti."<br />"; break; }
				$nowtime = time();
				$time14h = strtotime($sdate)+14*3600;
//				if ($privs < 3)
//				{
//					if (($catid == 3) && ($stime >= "17:00") && ($nowtime <= $time14h) && ($daybooking != "miworeg"))        ** sollte die Buchung vor 1500 verhindern - wird gelöscht
//					{
//						$eMsg .= "Feierabendtermin erst ab 15:00 desselben Tages buchbar!<br />"; break;
//					}
//				}
			}
			else
			{
				$eMsg .= $xx['evt_no_start_time']."<br />"; break;
			}
			if ($eti) {
				$etime = DTtoIT($eti);
				if (!$etime) {
					$eMsg .= $xx['evt_bad_time'].": ".$eti."<br />"; break;
				} elseif (($edate[0] == '9' or $edate == $sdate) and $etime < $stime) {
					$eMsg .= $xx['evt_end_before_start_time']."<br />"; break;
				}
				if ($stime == $etime and $edate[0] == '9') { $etime = '99:00'; }
			} else {
				$etime = ($edate[0] != '9') ? '23:59' : '99:00';
			}
		}
		if ($r_t > 0 and $rul) {
			$runtil = DDtoID($rul);
			if (!$runtil) {
				$eMsg .= $xx['evt_bad_rdate'].": ".$rul."<br />";
			} elseif ($runtil < $sdate) {
				$eMsg .= $xx['evt_until_before_start_date']."<br />";
			}
		} else {
			$runtil = "9999-00-00";
		}
// no notify function (AW)		if ($not == '-' or $not == "") {
//			$not = -1;
//		} elseif (!ctype_digit($not)) {
//			$eMsg .= $xx['evt_not_days_invalid']."<br />";
//		} elseif ($not >= 0 and $sdate > date("Y-m-d") and $sdate <= date("Y-m-d",time() + 86400 * $not)) {
//			$wMsg .= $xx['evt_not_in_past']."<br />";
//		}
		if ((($not >= 0 and $sdate > date("Y-m-d")) or $non) and strlen($nml) < 5) {
			$eMsg .= $xx['evt_eml_list_missing']."<br />";
		}
		if (strlen($nml) > 255) { $eMsg .= $xx['evt_eml_list_too_long']."<br />"; }
		break;
	}
}

//update database
if (($mode == "add_exe" or $mode == "upd_exe") and !$eMsg) { //no errors
	$titEsc = mysqli_real_escape_string($link, htmlspecialchars_decode($tit));
	$venEsc = mysqli_real_escape_string($link, htmlspecialchars_decode($ven));
	$desEsc = mysqli_real_escape_string($link, htmlspecialchars_decode($des));

	//if owner changed, default not_mail = owner email
	if ($uid != $oUid) {
		$rSet = dbquery("SELECT email FROM [db]users WHERE user_id = $uid");
		if ($rSet !== false) {
			$row=mysqli_fetch_assoc($rSet);
			$nml = $row['email'];
		}
		$oUid = $uid; //set original user ID to current user
	}

	//set repeat params
	$r_i = $r_t == 1 ? $ri1 : ($r_t == 2 ? $ri2 : 0);
	$r_p = $r_t == 1 ? $rp1 : ($r_t == 2 ? $rp2 : 0);
	//update tables
	$edr = $user_name;
	if ($mode == "add_exe") { //add new event
		$q = "INSERT INTO [db]events (title, venue, description, private, free, category_id, resource_id, owner_id, not_mail, s_date, e_date, s_time, e_time, r_type, r_interval, r_period, r_until, notify, a_date, m_date, editor) VALUES ('$titEsc', '$venEsc', '$desEsc', $pri, $free, $catid, $resid, $oid, '$nml', '$sdate', '$edate', '$stime', '$etime', $r_t, $r_i, $r_p, '$runtil', $not, '".date("Y-m-d")."', '".date("Y-m-d")."', '$edr')";
		$result = dbquery($q); //add to events table
		$eid =mysqli_insert_id($link); //set id to new event
		$cMsg .= $xx['evt_confirm_added'];
		$non = true;
	} else { //update event
		$mda = date("Y-m-d");
		if ($editN != 1) { //update the series
//			$q = "UPDATE [db]events
//			SET title = '$titEsc', venue = '$venEsc', description = '$desEsc', private = $pri, free = $free, resource_id = $resid, owner_id = $uid, not_mail = '$nml', editor = '$edr', s_date = '$sdate', e_date = '$edate', s_time = '$stime', e_time = '$etime', r_type = $r_t, r_interval = $r_i, r_period = $r_p, r_until = '$runtil', notify = $not, m_date = '$mda'
//			WHERE event_id = $eid";
			$q = "UPDATE [db]events
			SET owner_id = $oid, title = '$titEsc', venue = '$venEsc', description = '$desEsc', private = $pri, free = $free, resource_id = $resid, not_mail = '$nml', editor = '$edr', s_date = '$sdate', e_date = '$edate', s_time = '$stime', e_time = '$etime', r_type = $r_t, r_interval = $r_i, r_period = $r_p, r_until = '$runtil', notify = $not, m_date = '$mda'
			WHERE event_id = $eid";
			$result = dbquery($q); //update events table
		} else { //update 1 occurrence
			$xda .= ';'.$evDate;
			$result = dbquery("UPDATE [db]events SET x_dates = '$xda', editor = '$edr', m_date = '$mda' WHERE event_id = $eid"); //exclude date from series
			$q = "INSERT INTO [db]events (title, venue, description, private, free, category_id, resource_id, owner_id, not_mail, s_date, e_date, s_time, e_time, r_type, r_interval, r_period, r_until, notify, a_date) VALUES ('$titEsc', '$venEsc', '$desEsc', $pri, $free, $catid, $resid, $uid, '$nml', '$sdate', '$edate', '$stime', '$etime', $r_t, $r_i, $r_p, '$runtil', $not, '".date("Y-m-d")."')";
			$result = dbquery($q); //add new event
			$eid =mysqli_insert_id($link); //set id to new event
			$editN = 0;
		}
		// delete potentially existing event_user connections
	    $sql = 'DELETE FROM [db]event_users WHERE event_id = '.$eid;
		$result = dbquery($sql); //update events table
		$cMsg .= $xx['evt_confirm_saved'];
		$non = true;
		
	}
	// insert event_user connections
	foreach ($team['name'] as $member)	{
		$splitname = preg_split('/ /',$member);
		$q= 'SELECT * FROM [db]users WHERE user_id > 2 AND firstname = "'.$splitname[0].'" AND familyname="'.$splitname[1].'"';
		$rSet = dbquery($q);
		if ($rSet !== false) {
			$row = mysqli_fetch_assoc($rSet);
			if ($row) {
				$uid = stripslashes($row['user_id']);
				$q = "INSERT INTO [db]event_users (user_id, event_id, event_date) VALUES ('$uid', '$eid', '$sdate')";
				$result = dbquery($q); //add to events table
			}
		}
	}
	
	//reload calendar view and close event window 
	echo "\n<script type=\"text/javascript\">self.opener.location.reload(true);</script>\n";
	if ($close) {
		echo "\n<script type=\"text/javascript\">self.close();</script>\n";
	} else {
		$mode = "edit"; //don't close window
	}
}

//delete event
if ($mode == "del_exe") {
	while (true) {
		if (!$admin && ($evDate < date("Y-m-d"))) // event date in the past ?
		{
			$eMsg = $xx['evt_past_not_deleteable']; break;
		}
		$d_now    = new DateTime(date("Y-m-d"));
		$d_evt    = new DateTime($evDate);
		$d_now->modify('+3 days');
		if (!$admin && ($d_now > $d_evt))
		{
			$eMsg = $xx['evt_cancel_overdue']; break;		
		}
		
		if ($editN != 1) {
			$result = dbquery("UPDATE [db]events SET status = -1, editor = '$edr', m_date = '".date("Y-m-d")."' WHERE event_id = $eid");
		} else {
			$xda .= ';'.$evDate;
			$result = dbquery("UPDATE [db]events SET x_dates = '$xda', editor = '$edr', m_date = '".date("Y-m-d")." WHERE event_id = $eid"); //exclude date from series
			$editN = 0;
		}
		// delete potentially existing event_user connections
//		$sql = 'DELETE FROM [db]event_users WHERE event_id = '.$eid;
//		$result = dbquery($sql); //update events table
		$cMsg = $xx['evt_confirm_deleted'];
		
		// notify all team members
		$non = true;
		//reload calendar view and close event window 
		echo "\n<script type=\"text/javascript\">self.opener.location.reload(true);</script>\n";
		if ($close) {
			echo "\n<script type=\"text/javascript\">self.close();</script>\n";
		} else {
			$mode = "add"; //don't close window
		}
		break;
	}
}

$bookedTime = getBookedTime($sda, $resid, $eid);

if ($not == -1) { $not = ""; }

if ($eMsg) echo "<p class=\"center error\">".$eMsg."</p>\n";
if ($wMsg) echo "<p class=\"center warning\">".$wMsg."</p>\n";
if ($cMsg) echo "<p class=\"center confirm\">".$cMsg."</p>\n";
// $team = getEventTeam($eid, $evDate);

// Look for notify Adresses
$emlAdr = getEventTeamEmail($eid).",".getEventOwnerEmail($eid);
setNotifyAdresses($emlAdr);   // OR operation with already existing Adresses

$eml_Info = getEventEmlInfo($eid);

//Notify now
if ($non) { notifyNow($cMsg); };

if ($mode == "show" or $mode == "showMini") {
	require './pages/eventform1.php';
} else {
	if (($r_t > 0 or $sda < $eda) and $editN == 0 and !$refresh and !$eMsg and !$cMsg) {
		require './pages/eventform0.php'; //ask series or occurence
	} else {
		require './pages/eventform2.php';
		echo '<script type="text/javascript">document.getElementById("tit").focus();</script>';
	}
}
?>
