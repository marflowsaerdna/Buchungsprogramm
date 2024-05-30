<?php

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
       "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Tabellen&uuml;berschrift / Tabellenunterschrift definieren</title>
</head>

<style type="text/css">

table.myt {
	width: 450px;
	border-spacing: 1px; }

table.myt thead th {
	background: url(images/bg_th.gif) left;
	height: 21px;
	color: #50EE50;
	font-size: 0.8em;
	font-family: Arial;
	font-weight: bold;
	padding: 0px 7px;
	margin: 10px 0px 0px;
	text-align: left; }

table.myt tbody tr {	background: #f9ecaa; }

table.myt tbody tr.odd {	background: #f0f0f0; }

table.myt tbody th {
	background: url(images/arrow_white.gif) left center no-repeat;
	background-position: 5px;
	padding-left: 40px !important; }

table.myt tbody tr.odd th {
	background: url(images/arrow_grey.gif) left center no-repeat;
	background-position: 5px;
	padding-left: 40px !important; }

table.myt tbody th, table.myt tbody td {
	font-size: 0.8em;
	line-height: 1.4em;
	font-family: Arial, Helvetica, sans-serif;
	color: #000000;
	padding: 10px 7px;
	text-align: left; }

table.myt tbody a {
	color: #000000;
	font-weight: bold;
	text-decoration: none; }

table.myt tbody a:hover {
	color: #ffffff;
	text-decoration: underline; }

table.myt tbody tr:hover th {
	background: #800000 url(images/arrow_red.gif) left center no-repeat;
	background-position: 5px;
	color: #ffffff; }

table.myt tbody tr.odd:hover th {
	background: #000000 url(images/arrow_black.gif) left center no-repeat;
	background-position: 5px;
	color: #ffffff; }

table.myt tbody tr:hover th a, table.myt tbody tr.odd:hover th a	{
		 color: #ffffff; }

table.myt tbody tr:hover td, table.myt tbody tr:hover td a, table.myt tbody tr.odd:hover td,  table.myt tbody tr.odd:hover td a {
	background: #800000;
	color: #ffffff;	 }

table.myt tbody tr.odd:hover td, table.myt tbody tr.odd:hover td a{
	background: #000000;
	color: #ffffff;	 }

table.myt tfoot td {
	height: 21px;
	padding: 0px 7px;
	margin: 10px 0px 0px;
	background: #55ffff url(images/bg_footer.gif) left;
	font-size: 0.8em;
	color: #ffff55;
	}

.mittig  { vertical-align:bottom; background-color:#DDDDDD; }

</style>

<body>
<table>
  <caption>Ohne CSS style</caption>
  <thead>
  <tr>
    <th>Berlin</th>
    <th>Hamburg</th>
    <th>M&uuml;nchen</th>
  </tr>
  </thead>
  <tfoot>
    <tr>
    <td><i>Friedrichshafen</i></td>
    <td><i>Lindau</i></td>
    <td><i>Überlingen</i></td>
  </tr>
  </tfoot>
  
  <tbody>
  <tr>
    <td>Milj&ouml;h</td>
    <td>Kiez</td>
    <td>Bierdampf</td>
  </tr>
  <tr>
    <td>&Auml;pfel</td>
    <td>Birnen</td>
    <td>Mandarinen</td>
  </tr>
  <tr>
    <td>Buletten</td>
    <td>Frikadellen</td>
    <td>Fleischpflanzerl</td>
  </tr>
  </tbody>
</table>

<br><br><br><br>

<table class="myt">
  <caption>MIT CSS style class</caption>
  <thead>
  <tr>
    <th>Berlin</th>
    <th>Hamburg</th>
    <th>M&uuml;nchen</th>
  </tr>
  </thead>
  <tfoot>
    <tr>
    <td><i>Friedrichshafen</i></td>
    <td><i>Lindau</i></td>
    <td><i>Überlingen</i></td>
  </tr>
  </tfoot>
  
  <tbody>
  <tr>
    <td>Milj&ouml;h</td>
    <td>Kiez</td>
    <td>Bierdampf</td>
  </tr>
  <tr>
    <td>&Auml;pfel</td>
    <td>Birnen</td>
    <td>Orangen</td>
  </tr>
  <tr>
    <td>Buletten</td>
    <td>Frikadellen</td>
    <td>Fleischpflanzerl</td>
  </tr>
  </tbody>
</table>



<table border="1" ><tr height=100px>
<th><h2>
<a href="index.php"><img src="images/left.png" align="middle" alt="back"></a><sub>Dies ist der mittige Text</sub><a href="index.php"><img src="images/right.png" align="middle" alt="forward"></a>
</h2></th></tr></table>

<div style="width:100%; border:thin solid gray; padding:5px">
  <a href="index.htm">Homepage</a>
  <a href="index.php">PHP</a>
  
</div>
<?php 

		$filter = " AND c.public = 1";
		$start = "2012-06-01";
		$end = "2012-07-01";
/* retrieve events between $start and $end */
$q0 =
	"SELECT
		e.s_date AS sda,
		e.e_date AS eda,
		DATE_FORMAT(e.s_time,'%H:%i') AS sti,
		DATE_FORMAT(e.e_time,'%H:%i') AS eti,
		e.r_type AS r_t,
		e.r_interval AS r_i,
		e.r_period AS r_p,
		e.r_until AS r_u,
		e.notify AS rem,
		e.a_date AS ada,
		e.m_date AS mda,
		e.event_id AS eid,
		e.title AS tit,
		e.resource_id AS rid,
		e.category_id AS cid,
		e.venue AS ven,
		e.owner_id AS uid,
		e.editor AS edr,
		e.description AS des,
		e.private AS pri,
		e.free AS free,
		e.x_dates AS xda,
		c.category_id AS cid,
		c.name AS cnm,
		r.name AS rnm,
		r.teamsize_min AS minteam,
		r.teamsize_max AS maxteam,
		r.color AS rco,
		r.background AS rbg,
	c.sequence AS seq,
		c.rpeat AS rpt,
		u.user_name AS una,
		u.firstname AS firstname,
		u.familyname AS familyname,
		u.phone AS phone,
		u.color AS uco
	FROM [db]events e
	INNER JOIN [db]categories c ON c.category_id = e.category_id
	INNER JOIN [db]resources r ON r.resource_id = e.resource_id
	INNER JOIN [db]users u ON u.user_id = e.owner_id
	WHERE e.status >= 0".$filter;

//process non-recurring events

$q1 = $q0."
		AND c.rpeat = 0
		AND e.r_type = 0
		AND ((e.s_date <= '$end') AND (IF(e.e_date != '9999-00-00', e.e_date, e.s_date) >= '$start') )
	ORDER BY
		e.s_date";
echo "\n\nLEN=".strlen($q1)."   Q1=".$q1;


$q1 = $q0."
		AND (c.rpeat > 0 OR e.r_type > 0)
		AND e.s_date <= '$end'
		AND e.r_until >= '$start'
	ORDER BY
		e.s_date";

echo "\n\nLEN=".strlen($q1)."   Q1=".$q1;


?>


</body>
</html>