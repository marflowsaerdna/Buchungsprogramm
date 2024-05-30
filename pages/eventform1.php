<?php
//sanity check
if (!defined('LCC')) { exit('not permitted (evf1)'); } //lounch via script only


// exit('eventform1 wurde aufgerufen');

echo '<form id="event" name="event" method="post" action="index.php?xP=12">';
echo '<input type="hidden" name="id" value="'.$eid.'" />';
echo '<input type="hidden" name="oUid" value="'.$oUid.'" />';
echo '<input type="hidden" name="evDate" value="'.$evDate.'" />';
echo '<input type="hidden" name="ada" value="'.$ada.'" />';
echo '<input type="hidden" name="mda" value="'.$mda.'" />';
echo '<input type="hidden" name="edr" value="'.$edr.'" />';
echo '<input type="hidden" name="mode" value="show" />';



echo '<table class="evtForm">';
echo '<col width="80px" /><col width="100px" /><col width="110px" /><col />';
echo '<tr>';
echo 	'<td>'.$xx['evt_title'].':</td>';
			$eColor = ($col or $bco) ? " style=\"color:".$col."; background:".$bco.";\"" : "";
echo 		'<td colspan="3"><span'.$eColor.'>'.$tit."</span></td>\n";
echo 	'</tr>';
echo	'<tr>';
echo 	'<td>'.$xx['evt_resource'].':</td>';
echo 	'<td>'.$rname.'</td>';
echo	'<td>'.($pri ? $xx['evt_private_event'] : "").'</td>';
echo 	'</tr>';
echo 	'<tr>';
echo	'<td>'.$xx['evt_owner'].':</td><td>'.$owner_name.'</td><td>'.$owner_tel.'</td>';
echo	'</tr>';
echo	'<tr>';
echo	'<td>Team:</td>';
		$add_enable = $delete_enable = false;
		
		if ( is_array($team['name']) ) {   // this had to be done because of PHP update to 7.2
		    
		    $teamsize = sizeof($team['name']);
		    
		} else {
		    
		    $teamsize = 0;
		    
		}
		
		for ($i=0; $i<$teamsize; $i++)
		{
			echo '<td>'.$team['name'][$i].'</td><td>'.$team['phone'][$i].'</td>';
				if (strcmp($team['name'][$i], $user_name) == 0) {
					$delete_enable = TRUE;
				}
			echo '</tr><tr><td></td>';
		}
echo	'</tr><tr>';
		if (($maxteam-1 > $teamsize) && ($delete_enable==false) && !$pri && ($oUid != 1))
			$add_enable = true;
echo	'</tr>';
echo 	'<tr>';
echo	'<td>'.$xx['evt_description'].':</td>';
echo	'<td colspan="3">'.$des.'</td>';
echo	'</tr>';
echo	'<tr><td colspan="4"><hr /></td></tr>';
echo	'<tr>';
echo	'<td>'.$xx['evt_date_time'].':</td>';
echo	'<td colspan="3">';
		echo $sda.' '.($ald ? $xx['evt_all_day'] : $sti);
		if ($eda or $eti) { echo ' -'; }
		if ($eda) { echo ' '.$eda; }
		if ($eti) { echo ' '.$eti; }
echo	'</td>';
echo  '</tr>';

if ($r_t) {
	echo '<tr><td colspan="4">'.$repTxt."<br /></td></tr>\n";
}
if ($not != "" and ($privs > 2 or $uid == $_SESSION['uid'])) { //has rights to see email list
	echo '<tr><td colspan="4"><hr /></td></tr>'."\n";
	echo "<tr>\n";
	echo '<td>'.$xx['evt_notify'].":</td>\n";
	echo '<td colspan="3">'.$not.' '.$xx['evt_days_before_event']."</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo '<td colspan="4">'.$nml."</td>\n";
	echo "</tr>\n";
}
if ($showOwner) {
	echo '<tr><td colspan="4"><hr /></td></tr>'."\n";
	echo "<tr>\n";
	echo '<td colspan="4">'.$xx['evt_owner'].': '.$own;
	if ($mda and $edr) { echo ' - '.$xx['evt_lastedit'].": ".$edr; }
	echo "</td>\n</tr>\n";
}

echo '</table>';

$disable = $rights ? '' : ' disabled="disabled"';
echo "<div class=\"floatC\">\n";
echo '<input type="submit"'.$disable.' name="edit" value="'.$xx['evt_edit']."\" />&nbsp;&nbsp;&nbsp;\n";

if (!$free)
{
	if ($add_enable == true) {
		echo '<input type="submit" name="team_add_member" value="'.$xx['evt_join'].'">&nbsp;&nbsp;&nbsp;';
	}
	if ($delete_enable == true) {
		echo '<input type="submit" name="team_del_member" value="'.$xx['evt_leave'].'">&nbsp;&nbsp;&nbsp;';
	}
}
else {
	if ($privs >= 2) // only users are enabled  to takeover events
		echo '<input type="submit" name="evt_takeover" value="'.$xx['evt_takeover'].'">&nbsp;&nbsp;&nbsp;';
}
echo '<button onClick="javascript:self.close()">'.$xx["evt_close"]."</button>\n";

echo "</div>\n";
