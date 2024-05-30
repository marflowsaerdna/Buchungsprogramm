<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de-DE" xml:lang="de-DE">
<head>
<title>WvfCal - WVF Schiffe Buchungskalender</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="LuxCal web calendar - a LuxSoft product" />
<meta name="keywords" content="LuxSoft, LuxCal, LuxCal web calendar" />
<meta name="author" content="Roel Buining" />
<meta name="robots" content="nofollow" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="shortcut icon" href="lcal.ico" />
<link rel="canonical" href="http://weisserhai.net16.net/WvfCal/" />
<link rel="alternate" type="application/rss+xml" title="LuxCal RSS Feed" href="http://weisserhai.net16.net/WvfCal/rssfeed.php" />
<link rel="stylesheet" type="text/css" href="css/css.php" />
<script type="text/javascript">
var dFormat = 1;
var dSepar = ".";
var time24 = 1;
var wStart = 1;
var dpToday = "Heute";
var dpClear = "L&ouml;schen";
var dpMonths = new Array("Januar","Februar","M&auml;rz","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember");
var dpWkdays = new Array("So","Mo","Di","Mi","Do","Fr","Sa","So");
var dwTimeSlot = 60;
</script>

<script type="text/javascript" src="common/dtpicker.js"></script>
<script type="text/javascript" src="common/cpicker.js"></script>
<script type="text/javascript" src="common/poptext.js"></script>
<script type="text/javascript" src="common/general.js"></script>
</head>

<body>
<div class="topBar">
<span class="floatL">WvfCal - WVF Schiffe Buchungskalender</span>Mittwoch 25 Januar 2012<span class="floatR">admin</span>
</div>

<div class="navBar noprintx">
<div class="floatR">
<select title="Administrator Funktion ausw&auml;hlen" name="views" onchange="jumpMenu(this)">
<option value="#">Administration&nbsp;</option>
<option value="index.php?cP=90">Einstellungen</option>
<option value="index.php?cP=91">Resourcen</option>
<option value="index.php?cP=92">Kategorien</option>
<option value="index.php?cP=99" selected="selected">Einweisungen</option>
<option value="index.php?cP=93">Benutzer</option>
<option value="index.php?cP=94">Datenbank</option>

<option value="index.php?cP=95">iCal Import</option>
<option value="index.php?cP=96">iCal Export</option>
<option value="index.php?cP=97">CSV Import</option>
<option value="index.php?cP=2">Zur&uuml;ck zum Kalender</option>
</select> 
<button title="Seitenleiste anzeigen" onclick="show('sideBar')">&nbsp;&equiv;&nbsp;</button>
<button title="Termin hinzuf&uuml;gen" onclick="eventWin('index.php?xP=10');">&nbsp;+&nbsp;</button>
<button title="Hilfe" onclick="openWin('doc/WvfCal_UserManual.docx','600','400');">&nbsp;?&nbsp;</button>
<button title="send email" onclick="openWin('index.php?xP=98&from=admin@weisserhai.net16.net','600','400');">&nbsp;@&nbsp;</button>

<a href="index.php?cP=20&amp;log_out=y">Ausloggen</a>
<button title="" onclick="javascript:window.open('http://weisserhai.net16.net/flyspray/?project=2&do=authenticate&user_name=admin&password=admin&return_to=index.php?project=2&do=roadmap') ">Feedback zum Buchungssystem</button>
</div>
<div class="floatL">
<button title="Einstellungen anzeigen" onclick="show('optPanel','optMenu')">Einstellungen</button>&nbsp;</div>
<form method="post" id="gotoD" name="gotoD" action="index.php">
<input type="text" name="newD" id="newD" value="25.01.2012" size='7' />
<button title="Datum ausw&uml;hlen" onclick="dPicker(0,'gotoD','newD'); return false;">&larr;</button>
</form>
<div id='optPanel'>
<h4 class="floatC">bitte ausw&auml;hlen und 'Einstellungen' anklicken</h4>
<form name="optMenu" method="post" action="index.php">

<table class="options">
<tr>
<th title="Ansicht ausw&auml;hlen">Ansicht</th>
</tr>
<tr>
<td><div class="optList">
<input type="checkbox" id="cP1" name="cP" value="1" onclick="check1('cP',this);" /><label for="cP1"> Jahr</label><br />
<input type="checkbox" id="cP2" name="cP" value="2" onclick="check1('cP',this);" /><label for="cP2"> Monat</label><br />
<input type="checkbox" id="cP3" name="cP" value="3" onclick="check1('cP',this);" /><label for="cP3"> Woche</label><br />
<input type="checkbox" id="cP4" name="cP" value="4" onclick="check1('cP',this);" /><label for="cP4"> Tag</label><br />

<input type="checkbox" id="cP5" name="cP" value="5" onclick="check1('cP',this);" /><label for="cP5"> Anstehend</label><br />
<input type="checkbox" id="cP6" name="cP" value="6" onclick="check1('cP',this);" /><label for="cP6"> &Auml;nderungen</label>
</div></td>
</tr>
</table>
</form>
</div>
</div>
<div class="content">
<div id='sideBar'><a class='floatR' href="javascript:show('sideBar')"><img src="images/close.png" alt="close" /></a><h5 class='dragme'>Anstehende Termine</h5>
<div class='upcList'>
<h6>Mittwoch 25 Januar 2012</h6>

01:00 - 23:45<p class="point" onclick="x=eventWin('index.php?xP=11&amp;id=136'); x.focus(); return false" style="color:#000000;background:#FF9000;">&nbsp;&nbsp;Test11</p><br />
<h6>Donnerstag 26 Januar 2012</h6>
00:00 - 23:59<p class="point" onclick="x=eventWin('index.php?xP=11&amp;id=132'); x.focus(); return false" style="color:#000000;background:#FF9000;">&nbsp;&nbsp;Template</p><br />
<h6>Freitag 27 Januar 2012</h6>
00:00 - 23:59<p class="point" onclick="x=eventWin('index.php?xP=11&amp;id=131'); x.focus(); return false" style="color:#000000;background:#FF9000;">&nbsp;&nbsp;Test8</p><br />
<h6>Samstag 28 Januar 2012</h6>
00:00 - 23:59<p class="point" onclick="x=eventWin('index.php?xP=11&amp;id=131'); x.focus(); return false" style="color:#000000;background:#FF9000;">&nbsp;&nbsp;Test8</p><br />

<h6>Sonntag 29 Januar 2012</h6>
00:00 - 23:59<p class="point" onclick="x=eventWin('index.php?xP=11&amp;id=131'); x.focus(); return false" style="color:#000000;background:#FF9000;">&nbsp;&nbsp;Test8</p><br />
<h6>Dienstag 31 Januar 2012</h6>
13:00 - 18:00<p class="point" onclick="x=eventWin('index.php?xP=11&amp;id=141'); x.focus(); return false" style="color:#000000;background:#FF9000;">&nbsp;&nbsp;Seehasenkorso</p><br />
</div>
</div>
<br /><h3 class="spaceLL">Einweisungen bearbeiten</h3>
<form action="index.php" method="post" name="briefing">
<input type="hidden" name="cmsg" value="" />
<input type="hidden" name="emsg" value="" />

<input type="hidden" name="wmsg" value="" />
<div class="scrollBoxTab">
<table class="fieldBox">
<tr>
<td class="legend">&nbsp;Einweisungsmatrix&nbsp;</td>
</tr>
<tr>
<td>
<table class="etable">
<thead>
<tr>
<th>&nbsp;#&nbsp;</th>
<th width="120px">Benutzername</th>
<th>&nbsp;Weisser Hai</th>

<th>&nbsp;Lucky Ducky</th>
<th>&nbsp;Laser</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td  align=center style="background-color: #C0E0D0;">Andreas Wolfram</td>
<td><input type="checkbox" name="brf_3_1" checked="checked"></input></td> 
<td><input type="checkbox" name="brf_3_4" checked="checked"></input></td> 
<td><input type="checkbox" name="brf_3_2" checked="checked"></input></td> 
</tr>
<tr>

<td>2</td>
<td  align=center style="background-color: #BBFFBB;">Stefan Leben</td>
<td><input type="checkbox" name="brf_5_1" checked="checked"></input></td> 
<td><input type="checkbox" name="brf_5_4" checked="checked"></input></td> 
<td><input type="checkbox" name="brf_5_2" ></input></td> 
</tr>
<tr>
<td>3</td>
<td  align=center style="background-color: #BBFFBB;">Gudula Dieckmann</td>
<td><input type="checkbox" name="brf_6_1" ></input></td> 
<td><input type="checkbox" name="brf_6_4" ></input></td> 
<td><input type="checkbox" name="brf_6_2" ></input></td> 
</tr>

<tr>
<td>4</td>
<td  align=center style="background-color: #BBFFBB;">Ralf Jakob</td>
<td><input type="checkbox" name="brf_7_1" checked="checked"></input></td> 
<td><input type="checkbox" name="brf_7_4" ></input></td> 
<td><input type="checkbox" name="brf_7_2" ></input></td> 
</tr>
<tr>
<td>5</td>
<td  align=center style="background-color: #BBFFBB;">Heidi Galle</td>
<td><input type="checkbox" name="brf_8_1" ></input></td> 
<td><input type="checkbox" name="brf_8_4" ></input></td> 
<td><input type="checkbox" name="brf_8_2" ></input></td> 

</tr>
<tr>
<td>6</td>
<td  align=center style="background-color: #FF77FF;">Petra Feucht</td>
<td><input type="checkbox" name="brf_9_1" ></input></td> 
<td><input type="checkbox" name="brf_9_4" ></input></td> 
<td><input type="checkbox" name="brf_9_2" ></input></td> 
</tr>
<tr>
<td>7</td>
<td  align=center style="background-color: #BBFFBB;">Phillip Ries</td>
<td><input type="checkbox" name="brf_10_1" ></input></td> 
<td><input type="checkbox" name="brf_10_4" ></input></td> 

<td><input type="checkbox" name="brf_10_2" ></input></td> 
</tr>
<tr>
<td>8</td>
<td  align=center style="background-color: #BBFFBB;">Oliver Haller</td>
<td><input type="checkbox" name="brf_11_1" ></input></td> 
<td><input type="checkbox" name="brf_11_4" ></input></td> 
<td><input type="checkbox" name="brf_11_2" ></input></td> 
</tr>
<tr>
<td>9</td>
<td  align=center style="background-color: #FF77FF;">Nikol Just</td>
<td><input type="checkbox" name="brf_12_1" ></input></td> 

<td><input type="checkbox" name="brf_12_4" ></input></td> 
<td><input type="checkbox" name="brf_12_2" ></input></td> 
</tr>
<tr>
<td>10</td>
<td  align=center style="background-color: #99FF99;">Karin Lenk</td>
<td><input type="checkbox" name="brf_13_1" ></input></td> 
<td><input type="checkbox" name="brf_13_4" ></input></td> 
<td><input type="checkbox" name="brf_13_2" ></input></td> 
</tr>
<tr>
<td>11</td>
<td  align=center >Mal nach dem Scroll schauen</td>

</tr>
<tr>
<td>13</td>
<td  align=center >Mal nach dem Scroll schauen</td>
</tr>
<tr>
<td>15</td>
<td  align=center >Mal nach dem Scroll schauen</td>
</tr>
<tr>
<td>17</td>
<td  align=center >Mal nach dem Scroll schauen</td>

</tr>
<tr>
<td>19</td>
<td  align=center >Mal nach dem Scroll schauen</td>
</tr>
<tr>
<td>21</td>
<td  align=center >Mal nach dem Scroll schauen</td>
</tr>
<tr>
<td>23</td>
<td  align=center >Mal nach dem Scroll schauen</td>

</tr>
<tr>
<td>25</td>
<td  align=center >Mal nach dem Scroll schauen</td>
</tr>
<tr>
<td>27</td>
<td  align=center >Mal nach dem Scroll schauen</td>
</tr>
<tr>
<td>29</td>
<td  align=center >Mal nach dem Scroll schauen</td>

</tr>
<tr>
<td>31</td>
<td  align=center >Mal nach dem Scroll schauen</td>
</tr>
<tr>
<td>33</td>
<td  align=center >Mal nach dem Scroll schauen</td>
</tr>
<tr>
<td>35</td>
<td  align=center >Mal nach dem Scroll schauen</td>

</tr>
<tr>
<td>37</td>
<td  align=center >Mal nach dem Scroll schauen</td>
</tr>
<tr>
<td>39</td>
<td  align=center >Mal nach dem Scroll schauen</td>
</tr>
<tr>
<td>41</td>
<td  align=center >Mal nach dem Scroll schauen</td>

</tr>
<tr>
<td>43</td>
<td  align=center >Mal nach dem Scroll schauen</td>
</tr>
<tr>
<td>45</td>
<td  align=center >Mal nach dem Scroll schauen</td>
</tr>
<tr>
<td>47</td>
<td  align=center >Mal nach dem Scroll schauen</td>

</tr>
<tr>
<td>49</td>
<td  align=center >Mal nach dem Scroll schauen</td>
</tr>
</tbody>
</table>
</td></tr>
</table>
</div>
<input type="submit" name="save" value="Speichern" />
&nbsp;&nbsp;<button onclick="javascript:self.close()">Schließen</button>
</form>
</div>

<div class="endBar noprintx">
<span class="floatR"><a href="http://www.luxsoft.eu"><span title="V2.5.3">p</span>owered by AndreasW and <span class="footLB">Lux</span><span class="footLR">Soft</span></a></span>
<span  class="floatL"><a href="http://weisserhai.net16.net/WvfCal/rssfeed.php" title="RSS feeds" target="_blank">RSS</a></span>
</div></body></html>