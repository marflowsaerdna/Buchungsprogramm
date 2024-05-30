<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Selectboxtest</title>
<title>Test</title>
<script type="text/javascript">
function Loeschen (direction) {
	if (direction == 'rechts')
	{
		document.Testform.GemAuswahl.options[document.Testform.GemAuswahl.length] = document.Testform.ObstAuswahl.options[document.Testform.ObstAuswahl.options.selectedIndex];
		document.Testform.ObstAuswahl.options[document.Testform.ObstAuswahl.options.selectedIndex] = null;
	}
	if (direction == 'links')
	{
		document.Testform.ObstAuswahl.options[document.Testform.ObstAuswahl.length] = document.Testform.GemAuswahl.options[document.Testform.GemAuswahl.options.selectedIndex];
		document.Testform.GemAuswahl.options[document.Testform.GemAuswahl.options.selectedIndex] = null;
	}
}
function TransferOptionElements (srcEl, dstEl) {

		dstEl.options[dstEl.length] = srcEl.options[srcEl.options.selectedIndex];
		srcEl.options[srcEl.options.selectedIndex] = null;
}
</script>
</head><body>
<form name="Testform" action="">
<select name="ObstAuswahl" size="8">
<option>Obst 1</option>
<option>Obst 2</option>
<option>Obst 3</option>
<option>Obst 4</option>
<option>Obst 5</option>
</select>

<select name="GemAuswahl" size="8">
<option>Gemüse 1</option>
<option>Gemüse 2</option>
<option>Gemüse 3</option>
<option>Gemüse 4</option>
<option>Gemüse 5</option>
</select>
<br>

<input type="button" value="-->" onclick="Loeschen('rechts')">
<input type="button" value="<--" onclick="Loeschen('links')">
<br><br>
<select name="ObstAuswahl2" size="8">
<option>Obst 1</option>
<option>Obst 2</option>
<option>Obst 3</option>
<option>Obst 4</option>
<option>Obst 5</option>
</select>

<select name="GemAuswahl2" size="8">
<option>Gemüse 1</option>
<option>Gemüse 2</option>
<option>Gemüse 3</option>
<option>Gemüse 4</option>
<option>Gemüse 5</option>
</select>
<br>

<input type="button" value="-->" onclick="TransferOptionElements( document.Testform.ObstAuswahl2, document.Testform.GemAuswahl2 )">
<input type="button" value="<--" onclick="TransferOptionElements( document.Testform.GemAuswahl2, document.Testform.ObstAuswahl2 )">

</form>
</body></html>