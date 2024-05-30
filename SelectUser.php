<?php
//get config and tools
require './config.php';
require './common/toolbox.php';




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
       "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Tabellen&uuml;berschrift / Tabellenunterschrift definieren</title>

</head>
<form id="event" name="event" method="post" action="index.php?xP=12">

Dies ist die Seite zum Auswählen!

<?php
$uid=3;
$exceptions[0] = 5;

		echo '<select name="uid" id="uid">'."\n";
			userMenu($uid);
		echo '</select>'."\n";

echo '&nbsp;&nbsp;<button onClick="javascript:self.close()">'.$xx["evt_close"]."</button>\n";
?>
</form>