<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>WvfCal - WVF Schiffe Buchungskalender</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="lcal.ico" />
<link rel="stylesheet" type="text/css" href="css/css.php" />
</head>
<script type="text/javascript">
var dFormat = 1;
var dSepar = ".";
var time24 = 1;
var tstep = 15;
var wStart = 1;
var dpToday = "Heute";
var dpClear = "Löschen";
var dpMonths = new Array("Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember");
var dpWkdays = new Array("So","Mo","Di","Mi","Do","Fr","Sa","So");


function eKiwi() {
	alert('blabla');
fenster = window.open("pages/eventform3.php","PopUp","width=100,height=100,menubar=no,toolbar=yes,scrollbars=no,status=no,resizable=yes,location=no,hotkeys=no")
}

function jsVar(phpVar)
{
	alert('alert JSVAR');
}

</script>
<script type="text/javascript" src="common/dtpicker.js"></script>

<form id="test2" name="test2" method="post" action="test2.php">

<a href="JavaScript:eKiwi()">Hier der Linktext!</a><!-- Hier wird deine Seite definiert! -->
<?php 
$big_test = "000000000000000000000000000000000000111111111111000001111111111100000000111111111111111100000000";
$tstring = json_encode($big_test);
$arrstring = '[Hallo]';  //json_encode($big_test);
echo '<br>'.$tstring.'<br><br><br><br><br><br><br><br>';
echo '<br><input type="text" name="sti" id="sti" value="<select>" size="8" />';
echo '<button onclick="JavaScript:stiPicker(\'sti\',\'eti\',\''.$big_test.'\'); return false;">stiPicker</button>'; //<!-- Hier wird deine Seite definiert! -->

echo '<br><input type="text" name="eti" id="eti" value="<select>" size="8" />';
echo '<button onclick="JavaScript:etiPicker(\'sti\',\'eti\',\''.$big_test.'\'); return false;">etiPicker</button>'; //<!-- Hier wird deine Seite definiert! -->

?>
</form>
</html>
