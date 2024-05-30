<?php
//sanity check
if (!defined('LCC')) { exit('not permitted (evf0)'); } //lounch via script only
?>
<form id="event" name="event" method="post" action="index.php?xP=12">
<input type="hidden" name="id" value="<?php echo $eid; ?>" />
<input type="hidden" name="oUid" value="<?php echo $oUid; ?>" />
<input type="hidden" name="evDate" value="<?php echo $evDate; ?>" />
<input type="hidden" name="ada" value="<?php echo $ada; ?>" />
<input type="hidden" name="mda" value="<?php echo $mda; ?>" />
<input type="hidden" name="edr" value="<?php echo $edr; ?>" />
<table class="evtForm">
<tr><td class="floatC">
<?php
$eColor = ($col or $bco) ? " style=\"color:".$col."; background:".$bco.";\"" : "";
echo '<span'.$eColor.'>'.$tit."</span>\n";
echo '</td></tr><tr><td class="floatC">';
if ($r_t > 0) { //repeating event
	echo $xx['evt_is_repeating'];
} else { //multi-day event
	echo $xx['evt_is_multiday'];
}
echo "</td></tr>\n<tr><td class=\"floatC\">";
echo '<br />'.$xx['evt_edit_series_or_occurrence'];
echo "</td></tr>\n</table>\n";
echo "<div class=\"floatC\">\n";
echo '<input type="submit" name="edit_nx" value="'.$xx['evt_edit_series']."\" />&nbsp;&nbsp;&nbsp;\n";
echo '<input type="submit" name="edit_1x" value="'.$xx['evt_edit_occurrence']."\" />\n";
echo "</div>\n";

?>
