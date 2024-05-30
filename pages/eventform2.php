<?php
//sanity check
if (!defined('LCC')) { exit('not permitted (evf2)'); } //lounch via script only

?>
<form id="event" name="event" method="post"  action="index.php?xP=12" >

<input type="hidden" name="id" value="<?php echo $eid; ?>" />
<?php /* <input type="hidden" name="oUid" value="<?php echo $oUid; ?>" /> */ ?>
<input type="hidden" name="oid" value="<?php echo $oid; ?>" />
<input type="hidden" name="mode" value="<?php echo $mode; ?>" />
<input type="hidden" name="evDate" value="<?php echo $evDate; ?>" />
<input type="hidden" name="xda" value="<?php echo $xda; ?>" />
<input type="hidden" name="editN" value="<?php echo $editN; ?>" />
<input type="hidden" name="ada" value="<?php echo $ada; ?>" />
<input type="hidden" name="mda" value="<?php echo $mda; ?>" />
<input type="hidden" name="edr" value="<?php echo $edr; ?>" />
<input type="hidden" name="refresh" value="true" />


<?php
for ($i=0;$i<10;$i++)
{
	$idx = "Member".$i;
//	if (ISSET($_POST[$idx])) {$team[$i] = $_POST[$idx];}
	echo '<input type="hidden" name="Member'.$i.'" value="'.$team['name'][$i].'" />';
}
// preset time selection checks and visibility
$hidden = $alldaychk = $morningchk = $afternoonchk = "";
if ($daybooking == "allday") {
	$hidden = " style=\"visibility: hidden;\"";
	$alldaychk = "checked";
}
if ($daybooking == "morning") {
	$morningchk = "checked";
}
if ($daybooking == "afternoon") {
	$afternoonchk = "checked";
}
if ($daybooking == "evening") {
	$eveningchk = "checked";
}
if ($daybooking == "miworeg") {
	$miworegchk = "checked";
}

/*
$time = new DateTime('0-1-0 00:00');
echo '<table class="tpik"><tbody>';
for ($line = 0;  $line < 24; $line++) {
	echo '<tr>';
	for ($col = 0; $col < 4; $col++) {
		echo '<td>';
		$timestring = $time->format('H:i');
		$i = $line*4+$col;
		if ($bookedTime[$i] == '1') {
			echo '<b>'.$timestring.'</b>';
		}
		else {
			echo $timestring;
		}
		$time->modify('+15 min');
		echo '</td>';	
	}
	echo '</tr>';
}
echo '</tbody>';
echo '</table>';
*/
?>
<table class="evtForm">
	<col width='80px'><col width='100px'><col width='10px'><col width='10px'><col width='100px'><col width='10px'><col width='10px'>
	<?php
//	if ($admin) {   // Bestmaenner & admin sehen Menuauswahl fuer Kategorie
	if ($privs > 2) {   // Bestmaenner & admin sehen Menuauswahl fuer Kategorie
		echo '<tr><td>'.$xx['evt_category'].': </td>';
		echo '<td><select name="catid" id="catid" onChange="submit( );">';
			catMenu($catid);
		echo '</select>'."\n";
		echo "</td>\n";
		echo "<td colspan=\"3\"><button title=\"send email\" onclick=\"openWin('index.php?xP=98&from=".$eml_Info['from']."&to=".$eml_Info['to']."&subject=".$eml_Info['subj']."','600','400');\">@ Rundmail @</button>\n";
		echo "</td>\n</tr>\n";
		echo '<tr><td colspan="6"><hr /></td></tr>'."\n";
	}
?>
	
	<tr>
		<td><?php echo $xx['evt_title'];?>:</td>
		<td colspan="5"><input type="text" name="tit" id="tit" style="width:100%" value="<?php echo $tit; ?>" /></td>
	</tr>
<!-- 	<tr>
		<td><?php echo $xx['evt_owner'];?>:</td>
		<td colspan="2"><input type="hidden" name="ven" id="ven" style="width:100%" value="<?php echo $ven; ?>" /></td>
	</tr>  -->
 	<tr>
<?php 
	if ($catid != 4) {
		echo ('<td>');
		if ($catid == 3)   // boat event
			echo $xx['evt_skipper'];
		else
			echo $xx['evt_owner'];
		if ($privs > 2){ // not Sperrung
			echo '<td><select name="oid" id="oid" onChange="submit( );">'."\n";
			ownerMenu($oid);
			echo '</select></td>'."\n";
		}
		else {
			echo "<td><input type=\"text\" name=\"own\" id=\"own\" style=\"width:100%\" value=\" $owner_name \" /></td>";
		}
	echo ('/<td>');
	}
	$daysToEvent = (strtotime($evDate.' 00:00') - strtotime($_SESSION['cD'].' 00:00'))/60/60/24;
	if (($catid == 3) && (($privs > 2) || (($privs > 1) && ($daysToEvent < 7)))) {    // condition for 'freeing': Admin or event schedule < 1wk
		echo '<td></td><td colspan="2"><input type="checkbox" name="free" value="true"'.($free ? " checked=\"checked\" /> " : " /> ").$xx['evt_free_event']."</td>\n";
}
		
		echo "<td>";
	echo "</tr>";

	if (($catid == 3)||($catid == 4)){  // boat event or out of order
		echo '<tr>';
		echo '<td>'.$xx['evt_resource'].':</td>';
		echo '<td>';
		resMenu($resid);
		echo '</td>';
	}
	if ($catid == 3) { // Boat event
		if ($_SESSION['uid'] != 1) {
			echo '<td></td><td colspan="2"><input type="checkbox" name="pri" value="yes"'.($pri ? " checked=\"checked\" /> " : " /> ").$xx['evt_private_event']."</td>\n"; 
		} else {
			$pri = true;
		}
	}
	echo '</tr>';
  // Member selection
	if (($maxteam > 1) && ($catid == 3))
	{
		echo '<tr>';
		echo '<td>'.$xx['evt_teammember'].':<br><br>';
			if ($eid > 0) { // not, if event is just initiated
				echo "<button title=\"send email\" onclick=\"openWin('index.php?xP=98&from=".$eml_Info['from']."&to=".$eml_Info['to']."&subject=".$eml_Info['subj']."','600','400');\">@Rundmail@</button>\n";
		}
		echo '</td>';
		echo '<td>';
		echo '<select class="uSelect" name="Mitfahrer" size="'.$maxteam.'" >';
		if ( is_array($team['name']) ) {   // this had to be done because of PHP update to 7.2
		    $teamsize = sizeof($team['name']);
		} else {
		    $teamsize = 0;
		}
		for ($i=0;$i<$teamsize; $i++)
	    {
	    	if ($team['name'][$i] != "")
		    	echo '<option>'.$team['name'][$i].'</Option>';
	    }
		echo '</select>';
		echo '</td>';
		echo '<td><input type="submit" name="team_increase" value="einladen">&nbsp;&nbsp;&nbsp;';
		echo '<input type="submit" name="team_reduce" value="ausladen">&nbsp;&nbsp;&nbsp;';
		if ($eid > 0) { // not, if event is just initiated
			echo '<br><br><br>';
		}
		echo '</td>';
		echo '<td>';
		echo '<select class="uSelect" name="Benutzer" size="'.$maxteam.'" >';
	    for ($i=0;$i<count($usergroup); $i++)
	    {
	    	if ($usergroup[$i] != $owner_name)
	    		echo '<option>'.$usergroup[$i].'</Option>';
	    }
		echo '</select>';
		echo '</td>';
		echo '</tr>';
	}
?>
	
	<tr>
	<td><?php echo $xx['evt_description']; ?>:</td>
	<td colspan="5">
		<textarea name="des" id="des" rows="3" style="width:100%"><?php echo str_replace( "<br />", "\n", $des); ?></textarea>
		<div class="fontS">( <?php echo $xx['evt_url_format']; ?> )</div>
	</td>
	</tr>
<?php
	echo '<tr><td colspan="6"><hr /></td></tr>';
//	echo '<tr><td></td><td></td><td colspan="2"><input type="checkbox" onclick="hide_times(this);" name="ald" value="all" '.$checked.'>'.$xx['evt_all_day']."\n".'</td></tr>';
	echo '<tr><td></td><td></td><td colspan="3">';
    echo '</td></tr>';
	echo '<tr><td></td>';
	echo "<td colspan=\"5\"><input type=\"radio\" name=\"daybooking\" value=\"allday\" onclick=\"set_daybooking(2); \" $alldaychk >ganztags ";
	echo "<input type=\"radio\" name=\"daybooking\" value=\"morning\" onclick=\"set_daybooking(0); \" $morningchk >vormittag (bis 14:00) ";
	echo "<input type=\"radio\" name=\"daybooking\" value=\"afternoon\" onclick=\"set_daybooking(1); \" $afternoonchk >nachmittag (ab 14:00) </td></tr>";
//	echo "<tr><td></td><td colspan=\"2\"><input type=\"radio\" name=\"daybooking\" value=\"evening\" onclick=\"set_daybooking(3); \" $eveningchk >abends (ab 18:00)</td>";
	echo "<tr><td><td colspan=\"5\"><input type=\"radio\" name=\"daybooking\" value=\"miworeg\" onclick=\"set_daybooking(3); \" $miworegchk >Mittwochsregatta (ab 18:00)</td></tr>";
	?>
	<tr>
		<td><?php echo $xx['evt_start_date'];?>:</td>
		<td><input type="text" name="sda" id="sda" value="<?php echo $sda; ?>" size="8" /><button title="<?php echo $xx['evt_select_date']; ?>" onclick="dPicker(0,'nill','sda','eda'); return false;">&larr;</button></td>
		<td colspan="3" id="dTimeS"<?php echo $hidden; ?>><input type="text" name="sti" id="sti" value="<?php echo $sti; ?>" size="6" />
		<button title="<?php echo $xx['evt_select_time']; ?>" onclick="JavaScript:stiPicker('sti','eti','<?php echo $bookedTime;?>'); return false;">&larr;</button></td>
	</tr>
	<tr>
		<td><?php echo $xx['evt_end_date'];?>:</td>
		<td><input type="text" name="eda" id="eda" value="<?php echo $eda; ?>" size="8" /><button title="<?php echo $xx['evt_select_date']; ?>" onclick="dPicker(1,'nill','eda','sda');return false;">&larr;</button></td>
		<td colspan="3" id="dTimeE"<?php echo $hidden; ?>><input type="text" name="eti" id="eti" value="<?php echo $eti; ?>" size="6" />
		<button title="<?php echo $xx['evt_select_time']; ?>" onclick="JavaScript:etiPicker('sti','eti','<?php echo $bookedTime;?>'); return false;">&larr;</button></td>
	</tr>
<?php 
	if ($crept) {
		echo '<tr>';
		echo '<td colspan="5">';
		echo $repTxt.' <button onclick="show(\'repBox\'); return false;" name="add_exe">'.$xx['evt_change'].'</button><br />';
		echo '</td>';
		echo '</tr>';
	}
/*
	<tr><td colspan="6"><hr /></td></tr>
	<tr>
			<td colspan="3">
			<?php
			echo '<input type="checkbox" name="non" value="yes"'. ($non ? " checked=\"checked\" /> " : " /> ").$xx['evt_now_and_or'];
			echo '<input type="text" name="not" maxlength="2" style="width:20px" value="'.$not.'" /> '.$xx['evt_days_before_event'];
			 ?>
		</td>
	</tr>
	<tr>
		<td colspan="6">
			<input type="text" name="nml" id="nml" style="width:100%" value="<?php echo $nml; ?>" />
			<div class="fontS">(<?php echo $xx['evt_notify_eml_list']; ?>)</div>
		</td>
	</tr>
*/
	echo '<tr><td colspan="6"><hr /></td></tr>'."\n";   // horizontal line
	echo '<tr><td colspan="6">';
	if ($mda and $edr) { echo ' - '.$xx['evt_lastedit'].": ".$edr; }
	echo "</td>\n</tr>\n";
?>
</table>

<div class='repBox' id='repBox'>
	<div class="floatC"><b><?php echo $xx['evt_set_repeat']; ?></b><hr /></div>
	<div>
		<?php	
		echo '<input type="radio" name="r_t" id="r_t" value="0" '.(!$r_t ? 'checked="checked" /> ' : '/> ').$xx['evt_no_repeat'];
		echo '<br />';
		echo '<input type="radio" name="r_t" id="r_t" value="1" '.($r_t == "1" ? 'checked="checked" /> ' : '/> ').$xx['evt_repeat'];
echo 		'<select name="ri1" id="ri1">';
echo 		'<option value="1" '.($ri1 == "1" ? ' selected="selected">' : '>').$xx['evt_interval1_1'].';</option>';
echo 		'<option value="2" '.($ri1 == "2" ? ' selected="selected">' : '>').$xx['evt_interval1_2'].';</option>';
echo 		'<option value="3" '.($ri1 == "3" ? ' selected="selected">' : '>').$xx['evt_interval1_3'].';</option>';
echo 		'<option value="4" '.($ri1 == "4" ? ' selected="selected">' : '>').$xx['evt_interval1_4'].';</option>';
echo 		'<option value="5" '.($ri1 == "5" ? ' selected="selected">' : '>').$xx['evt_interval1_5'].';</option>';
echo 		'<option value="6" '.($ri1 == "6" ? ' selected="selected">' : '>').$xx['evt_interval1_6'].';</option>';
echo 	'</select>';
echo 	'<select name="rp1" id="rp1">';
echo 		'<option value="1" '.($rp1 == "1" ? ' selected="selected">' : '>').$xx['evt_period1_1'].';</option>';
echo 		'<option value="2" '.($rp1 == "2" ? ' selected="selected">' : '>').$xx['evt_period1_2'].';</option>';
echo 		'<option value="3" '.($rp1 == "3" ? ' selected="selected">' : '>').$xx['evt_period1_3'].';</option>';
echo 		'<option value="4" '.($rp1 == "4" ? ' selected="selected">' : '>').$xx['evt_period1_4'].';</option>';
echo 	'</select>';
echo 	'*)<br />';
echo 		'<input type="radio" name="r_t" id="r_t" value="2" '.($r_t == "2" ? 'checked="checked" /> ' : '/> ').$xx['evt_repeat_on'];
echo 		'<select name="ri2" id="ri2">';
echo 		'<option value="1" '.($ri2 == "1" ? ' selected="selected">' : '>').$xx['evt_interval2_1'].';</option>';
echo 		'<option value="2" '.($ri2 == "2" ? ' selected="selected">' : '>').$xx['evt_interval2_2'].';</option>';
echo 		'<option value="3" '.($ri2 == "3" ? ' selected="selected">' : '>').$xx['evt_interval2_3'].';</option>';
echo 		'<option value="4" '.($ri2 == "4" ? ' selected="selected">' : '>').$xx['evt_interval2_4'].';</option>';
echo 		'<option value="5" '.($ri2 == "5" ? ' selected="selected">' : '>').$xx['evt_interval2_5'].';</option>';
echo 		'</select>';
echo 		'<select name="rp2" id="rp2">';
echo 		'<option value="1" '.($rp2 == "1" ? ' selected="selected">' : '>').$wkDays[1].';</option>';
echo 		'<option value="2" '.($rp2 == "2" ? ' selected="selected">' : '>').$wkDays[2].';</option>';
echo 		'<option value="3" '.($rp2 == "3" ? ' selected="selected">' : '>').$wkDays[3].';</option>';
echo 		'<option value="4" '.($rp2 == "4" ? ' selected="selected">' : '>').$wkDays[4].';</option>';
echo 		'<option value="5" '.($rp2 == "5" ? ' selected="selected">' : '>').$wkDays[5].';</option>';
echo 		'<option value="6" '.($rp2 == "6" ? ' selected="selected">' : '>').$wkDays[6].';</option>';
echo 		'<option value="7" '.($rp2 == "7" ? ' selected="selected">' : '>').$wkDays[7].';</option>';
echo 		'</select>';
		echo $xx['evt_of_the_month'];?>
		 *)<br /><br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*) <?php echo $xx['evt_until'];?>
		<input type="text" name="rul" id="rul" value="<?php echo $rul; ?>" size="8" />
		<button title="<?php echo $xx['evt_select_date']; ?>" onclick="dPicker(1,'nill','rul','sda'); return false;">&larr;</button>
		(<?php echo $xx['evt_blank_no_end'];?>)
	</div>
	<div class="floatC"><hr /><input type="submit" name="refresh" value="<?php echo $xx['evt_set']; ?>" /></div>
</div>
<?php
echo "<div class=\"floatC\">\n";
if ($mode == "add" or $mode == "add_exe") {
	echo '<input type="submit" name="add_exe_cls" value="'.$xx['evt_add'].'" />';
} else {
	echo '<input type="submit" name="upd_exe_cls" value="'.$xx['evt_save_close'].'" />';
	echo '&nbsp;&nbsp;<input type="submit" name="upd_exe" value="'.$xx['evt_save'].'" />';
//	echo '&nbsp;&nbsp;<input type="submit" name="add_exe" value="'.$xx['evt_clone'].'" />';       AW-no cloning possible
	echo '&nbsp;&nbsp;<input type="submit" name="del_exe" value="'.$xx['evt_delete'].'" />';
}
echo '&nbsp;&nbsp;<button onClick="javascript:self.close()">'.$xx["evt_close"]."</button>\n";
echo "</div>\n";

?>
</form>
