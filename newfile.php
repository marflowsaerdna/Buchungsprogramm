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

function TransferOptionElements (srcEl, dstEl) {

		dstEl.options[dstEl.length] = srcEl.options[srcEl.options.selectedIndex];
		srcEl.options[srcEl.options.selectedIndex] = null;
		if(dstEl.length >0)
		 document.event.Member0.value = document.event.Mitfahrer.options[0].value;
		if(dstEl.length >1)
		document.event.Member1.value = document.event.Mitfahrer.options[1].value;
		if(dstEl.length >2)
		document.event.Member2.value = document.event.Mitfahrer.options[2].value;
		if(dstEl.length >3)
		document.event.Member3.value = document.event.Mitfahrer.options[3].value;
		if(dstEl.length >4)
		document.event.Member4.value = document.event.Mitfahrer.options[4].value;
		if(dstEl.length >5)
		document.event.Member5.value = document.event.Mitfahrer.options[5].value;
		if(dstEl.length >6)
		document.event.Member6.value = document.event.Mitfahrer.options[6].value;
		if(dstEl.length >7)
		document.event.Member7.value = document.event.Mitfahrer.options[7].value;
}

</script>

<?php
function resMenu($selRes) {
	$where = ' WHERE status >= 0'.($_SESSION['uid'] == 1 ? " AND public > 0" : "");
	$rSet = dbquery("SELECT resource_id, name, color, background FROM [db]resources".$where." ORDER BY sequence");
	if ($rSet !== false) {
		while ($row=mysqli_fetch_assoc($rSet)) {
			$selected = ($selRes == $row["resource_id"]) ? " selected=\"selected\"" : "";
			$resStyle = ($row["color"]!="") ? " style=\"color: ".$row["color"]."; background: ".$row["background"].";\"" : "";
			echo "<option value=\"".$row["resource_id"]."\"".$resStyle.$selected.">".stripslashes($row["name"])." </option>\n";
		}
	}
}

function getUserNames() {
	$userNames = array(0);
	$i = 0;
	$rSet = dbquery("SELECT user_id, user_name, firstname, familyname FROM [db]users WHERE status=\'active\' AND firstname != '' ORDER BY user_name");
	if ($rSet !== false) {
		while ($row=mysqli_fetch_assoc($rSet)) {
			$userNames[$i++] = $row['firstname']." ".$row['familyname'];
		}
		return $userNames;
	}
}


function userMenu($selUser) {
	global $userEml;
	$rSet = dbquery("SELECT user_id, user_name FROM [db]users WHERE status=\'active\' ORDER BY user_name");
	if ($rSet !== false) {
		while ($row=mysqli_fetch_assoc($rSet)) {
			if (!$key = array_search($row["user_id"], $exceptions))
			{
				$selected = ($selUser == $row["user_id"]) ? " selected=\"selected\"" : "";
				echo "<option value=\"".$row["user_id"]."\"".$selected.">".stripslashes($row["user_name"])."</option>\n";
			}
		}
	}
}
function notifyNow($what) { //notify added/edited/deleted event
	global $xx, $calendarEmail, $calendarTitle, $calendarUrl, $nml, $tit, $cid, $sda, $ven, $desX, $sda, $eda, $sti, $eti, $r_t, $ald, $repTxt;
	
	$emlStyle = "background:#FFFFDD; color:#000099; font:12px arial, sans-serif;"; //email body style definition
	
	//get resource
	$rSet = dbquery("SELECT name, color, background FROM [db]resources WHERE resource_id = $rid");
	$row = mysqli_fetch_assoc($rSet);
	
	//compose email message
	$noteText = $what == 'add_exe' ? $xx['evt_event_added'] : ($what == 'upd_exe' ? $xx['evt_event_edited'] : $xx['evt_event_deleted']);
	$dateTime = $sda;
	if ($sti) $dateTime .= " @ ".$sti;
	if ($eda or $eti) $dateTime .= " -";
	if ($eda) $dateTime .= " ".$eda;
	if ($eda and $eti) $dateTime .= " @";
	if ($eti) $dateTime .= " ".$eti;
	$dateTime .= ($ald == "all" ? " ".$xx["evt_all_day"] : "").($r_t > 0 ? " (".$repTxt.")" : "");
	$subject = $calendarTitle." - ".$noteText.": ".$tit;
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
<p>".$calendarTitle." ".$xx['evt_mailer']." ".IDtoDD(date("Y-m-d"))."</p>
<p>".$noteText.":</p>
<table>
	<tr><td>".$xx['evt_title'].":</td><td><b><span".$style.">".$tit."</span></b></td></tr>
	<tr><td>".$xx['evt_resource'].":</td><td>".stripslashes($row["name"])."</td></tr>
	<tr><td>".$xx['evt_date_time'].":</td><td>".$dateTime."</td></tr>
	<tr><td>".$xx['evt_venue'].":</td><td>".(($ven) ? $ven : "- -")."</td></tr>
	<tr><td>".$xx['evt_description'].":</td><td>".(($desX) ? $desX : "- -")."</td></tr>
</table>
<p><a href=\"".$calendarUrl."\">".$xx['evt_open_calendar']."</a></p>
</body>
</html>
";
	$headers = 'MIME-Version: 1.0'."\n".'Content-type: text/html; charset=utf-8'."\n".'From: '.$calendarEmail;
	//send emails
	if ($nml) { //email address(es) to notify
		$notList = explode(";", $nml);
		foreach ($notList as $emlAorL) {
			$emlList = array();
			if (strpos($emlAorL, '@')) { //email address
				$emlList[] = $emlAorL;
			} else { //email list
				if (file_exists("emlists/$emlAorL.txt")) {
					$emlList = file("emlists/$emlAorL.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
				}
			}
			foreach ($emlList as $emlAddress) {
				if (preg_match("/^\D\w*?(\.{0,1}(\w|-)+?){0,2}@((\w|-){2,}\.){1,2}\D{2,4}$/", $emlAddress)) { //valid email address
					mail($emlAddress, $subject, $message, $headers);
				}
			}
		}
	}
}

//sanity check
if (!defined('LCC') or
		(isset($_REQUEST['id']) and !preg_match('%^\d{1,8}$%', $_REQUEST['id'])) or
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
	$close = false;
	if     (isset($_POST['add_exe_cls'])) { $mode = 'add_exe'; $close = true; }
	elseif (isset($_POST['add_exe'])) { $mode = 'add_exe'; }
	elseif (isset($_POST['upd_exe_cls'])) { $mode = 'upd_exe'; $close = true; }
	elseif (isset($_POST['upd_exe'])) { $mode = 'upd_exe'; }
	elseif (isset($_POST['del_exe_cls'])) { $mode = 'del_exe'; $close = true; }
	elseif (isset($_POST['del_exe'])) { $mode = 'del_exe'; }
}

$editN = (isset($_POST['editN'])) ? $_POST['editN'] : 0;
if (isset($_POST['edit_nx'])) { $editN = 2; } //edit series
if (isset($_POST['edit_1x'])) { $editN = 1; } //edit occurence

$evDate = isset($_REQUEST['evDate']) ? $_REQUEST['evDate'] : '';
$eid = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
$eMsg = $wMsg = $cMsg = NULL;

// retrieve event owner info
$uid = $_SESSION['uid'];

//init event data

if (($mode == 'show' or $mode == 'showMini' or $mode == 'edit') and !$refresh) { //show/edit event
	$rSet = dbquery("
		SELECT e.*, c.name, c.color, c.background, u.user_name, u.firstname, u.familyname
		FROM [db]events e
		INNER JOIN [db]resources c ON c.resource_id = e.resource_id
		INNER JOIN [db]users u ON u.user_id = e.owner_id
		WHERE e.event_id = $eid");
	$row = mysqli_fetch_assoc($rSet);
	$tit = htmlspecialchars(stripslashes($row['title']));
	$ven = htmlspecialchars(stripslashes($row['venue']));
	$des = stripslashes($row['description']);
	$rid = $row['resource_id'];
	$oid = $row['owner_id'];
	$rights = ($privs > 2 or $uid == $_SESSION['uid'] or ($mode == "showMini" and $miniCalPost)) ? 1 : 0; //edit rights
	$link = '%<a\s[^<>]*?href="(https{0,1}://[^|<>\s]{5,})"[^|<>]*?>([^|<>]*?)</a>\s*%';
	if (($mode != 'show' and $mode != 'showMini') or ($oneStepEdit and $rights)) {
		$des = preg_replace_callback($link,create_function('$m','return $m[1].(substr($m[2],0,7)!="http://"?" [".$m[2]."] ":" ");'),$des);
	}
	$nml = ($row['not_mail']) ? $row["not_mail"] : $umail;
	$pri = $row['private'];
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
	$edr = stripslashes($row['editor']);
	$cnm = stripslashes($row['name']);
	$col = $row['color'];
	$bco = $row['background'];
	$own = stripslashes($row['user_name']);
	$owner_name = $row['firstname']." ".$row['familyname'];
	
// ************** Readout Team Members ************************
//	if ($mode == 'edit')   // during edit no update from database
//	{
		$rSet = dbquery("
		SELECT eu.*, u.firstname, u.familyname
		FROM [db]event_users eu
		INNER JOIN [db]users u ON u.user_id = eu.user_id
		WHERE eu.event_id = $eid");
	
		if ($rSet !== false) {
		$i=0;
		while (	$row = mysqli_fetch_assoc($rSet))
		{
			$team[$i] = $row['firstname']." ".$row['familyname'];
			$i++;
		}
	}
// ************** / Readout Team Members ************************
	
} else { //add
	$tit = isset($_POST['tit']) ? htmlspecialchars(strip_tags(trim($_POST['tit']),'<b><i><u><s><center>')) : "";
	$ven = isset($_POST['ven']) ? htmlspecialchars(strip_tags(trim($_POST['ven']),'<b><i><u><s><center>')) : "";
	$des = isset($_POST['des']) ? htmlspecialchars(strip_tags(trim($_POST['des']),'<a><b><i><u><s>')) : "";
	$rid = isset($_POST['rid']) ? $_POST['rid'] : 1;
	$uid = isset($_POST['uid']) ? $_POST['uid'] : (isset($_POST['oUid']) ? $_POST['oUid'] : $_SESSION['uid']);
	$nml = isset($_POST['nml']) ? $_POST['nml'] : $umail;
	$pri = isset($_POST['pri']) ? ($_POST['pri'] == 'yes' ? 1 : 0) : 0;
	$sda = isset($_POST['sda']) ? $_POST['sda'] : "";
	$eda = isset($_POST['eda']) ? $_POST['eda'] : "";
	$xda = isset($_POST['xda']) ? $_POST['xda'] : "";
//	$resid = isset($_POST['resid']) ? $_POST['resid'] : 0;
	$team[0] = isset($_POST['Member0']) ? $_POST['Member0'] : "";
	$team[1] = isset($_POST['Member1']) ? $_POST['Member1'] : "";
	$team[2] = isset($_POST['Member2']) ? $_POST['Member2'] : "";
	$team[3] = isset($_POST['Member3']) ? $_POST['Member3'] : "";
	$team[4] = isset($_POST['Member4']) ? $_POST['Member4'] : "";
	$team[5] = isset($_POST['Member5']) ? $_POST['Member5'] : "";
	$team[6] = isset($_POST['Member6']) ? $_POST['Member6'] : "";
	$team[7] = isset($_POST['Member7']) ? $_POST['Member7'] : "";
	$team[8] = isset($_POST['Member8']) ? $_POST['Member8'] : "";
	$team[9] = isset($_POST['Member9']) ? $_POST['Member9'] : "";
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
}
?>
