<?php
/*
= LuxCal event calendar style sheet =

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

header('content-type:text/css');
header("Expires: ".gmdate("D, d M Y H:i:s", (time()+900)) . " GMT");

/* ---- LOAD THEME WITH USER-INTERFACE COLOR DEFINITIONS ---- */
require './lctheme.php';

define("CSS","TRUE");
?>

/* ---- general: site ----- */

* {padding:0; margin:0;}
body, select, td, th {font:<?php echo FONT0?> arial,sans-serif;}
input[type="text"], textarea {padding: 0 0 0 4px; font:<?php echo FONT0?> arial,sans-serif;}
input[type="password"], textarea {padding: 0 0 0 4px; font:<?php echo FONT0?> arial,sans-serif;}
body {background:<?php echo BGND2?>; color:<?php echo TEXT1?>; } /* overflow:hidden;} */
th {background:<?php echo BGND3?>;}
td {
	vertical-align:top;
	 }
input[type="submit"], button {font:<?php echo FONT0?> arial,sans-serif; cursor:pointer;}
input[type="button"], button {font:<?php echo FONT0?> arial,sans-serif; cursor:pointer;}
/* td, th {vertical-align:top;} */
a {color:blue; font-weight:bold; cursor:pointer;}
a.urlembed {font-weight:bold; text-decoration:underline;}
hr {margin:10px 0px; height:2px; border-width:0; color:<?php echo BGND3?>; background:<?php echo BGND3?>;}
p {text-align:justify;}
img {border-style:none;}
select option {padding: 0 0 0 4px;}

h3 {font-size:14px;}
h4 {font-size:13px;}
h5 {font-size:1.0em;}
h6 {font-size:1.0em;}

ul, ol {margin:0 25px;}

.fontS {font-size:<?php echo FONT3 ?>;}

.floatR {float:right;}
.floatL {float:left;}
.floatC {text-align:center; vertical-align:middle; background-color:#DDDDDD; }
.center {margin:auto;}
.spaceL {margin-left:40px;}
.spaceLL {margin-left:15%;}

.point {cursor:pointer;}
.arrow {cursor:default;}
.noButton {border:none; background:none; cursor:pointer; text-decoration:underline;}
.link {cursor:pointer; text-decoration:underline;}
.container {padding:15px 0 25px 0;}
.confirm {width:50%; text-align:center; background:<?php echo BGND7?>;}
.warning {width:50%; text-align:center; background:<?php echo BGND8?>;}
.error {width:50%; text-align:center; background:<?php echo BGND9?>;}
.inputError {background:<?php echo BGND9?>;}
.noMessage {width:50%; text-align:center;}
.warningL {margin:10px 0 10px 15%; width:50%; text-align:center; background:<?php echo BGND9?>;}
.noWarningL {margin:10px 0 10px 15%; width:50%; text-align:center;}
.hilight {margin:10px 0; width:50%; background:<?php echo BGND9?>;}
.flush {position: absolute; left: -100%;}

/* ---- canvas ---- */

div.topBar {padding:0px 20px; font:bold 13px/25px arial,sans-serif; text-shadow:grey 0.2em 0.3em 0.2em; text-align:center; background:<?php echo BGND1?>;}
div.topText {margin:auto; width:95%; line-height:30px;}
div.navBar {clear:both; padding:0px 10px; height:21px; background:<?php echo BGND3?>; border:<?php echo BORD1?>;}
div.endBar {position:relative; left:0; bottom:0; width: 98%; padding:0 1%; font-size:0.8em; background:<?php echo BGND3?>; border:<?php echo BORD1?>;}
div.content {clear:both; padding:3px 26px 0 10px;}
div.contentS {clear:both; padding:3px 10px; font:<?php echo FONT4?> arial,sans-serif;}

div#sideBar {position: absolute; top:45px; right:20px; height:60%; width:170px; padding:4px; border:<?php echo BORD2?>;
 font-size:<?php echo FONT1 ?>; background:<?php echo BGND1 ?>; z-index:20; overflow:hidden; display:none;}
div.upcList {position: absolute; top:30px; bottom:0px; width:100%; overflow:auto;}

div#optPanel {position: absolute; top:45px; left:10px; padding:4px; border:<?php echo BORD2?>;
 font-size:<?php echo FONT1 ?>; background:<?php echo BGND1 ?>; z-index:20; overflow:hidden; display:none;}
table.options th {min-width:110px; cursor:default;}
table.options input,label {cursor:pointer;}
.optList {max-height:250px; overflow:auto;}

.footLB {font:italic bold 1.1em arial,sans-serif; color:#0033FF;}
.footLR {font:italic bold 1.1em arial,sans-serif; color:#AA0066;}
.dragme {background:<?php echo BGND3?>; margin-top:2px; cursor:move;}

/* ---- all pages ----- */
.scroll {overflow:auto;}
.scrollBoxYe {position:absolute; left:0; top:70px; right:0; bottom:35px; padding:0 10px; overflow:auto;}
/* .scrollBoxMo, .scrollBoxWe, .scrollBoxDa {position:absolute left:0; top:140px; right:0; bottom:35px; padding:0 10px; overflow-y:scroll;} */
.scrollBoxMo, .scrollBoxWe, .scrollBoxDa {position:absolute left:0; top:140px; right:0; bottom:35px; padding:0 0px; overflow:auto;}*/
.scrollBoxUp, .scrollBoxCh {position:absolute; left:0; top:125px; right:0; bottom:35px; padding:0 10px; overflow:auto;}
.scrollBoxSe {position:absolute; left:8%; top:140px; right:0; bottom:70px; padding:0 10px; overflow:auto;}
.scrollBoxAd {position:absolute; left:8%; top:140px; right:0; bottom:35px; padding:0 10px; overflow:auto;}

table.mgrid {width:100%;}
table.mgrid td.holder{vertical-align:top; width:16%; padding:24px;}
/* table.grid .thead  { rowspan:2 } */
table.grid {width:100%; border-collapse:collapse; table-layout:fixed; }
table.grid .wkColY {width:25px;}
table.grid .wkColM {width:25px;}
table.grid .dcol {border:<?php echo BORD1?>; width:16%; height:28px; vertical-align:middle; }
table.grid tr.monthWeek {height:120px;}
table.grid tr.yearWeek {height:40px;}
table.grid tr.miniWeek {height:28px;}
table.grid th { overflow:hidden; }
table.grid td { overflow:hidden; }
table.grid td.we0 {border:<?php echo BORD1?>; background:<?php echo BGNDD?>;}
table.grid td.we1 {border:<?php echo BORD1?>; background:<?php echo BGNDE?>;}
table.grid td.wd0 {border:<?php echo BORD1?>; background:<?php echo BGNDB?>;}
table.grid td.wd1 {border:<?php echo BORD1?>; background:<?php echo BGNDC?>;}
table.grid td.out {border:<?php echo BORD1?>; background:<?php echo BGNDF?>;}
table.grid td.hol {border:<?php echo BORD1?>; background:<?php echo BGNDF?>;}
table.grid td.blank {background:<?php echo BGND2?>;}
table.grid td.today {border:<?php echo BORD3?>;}

table.evtForm {width:100%; padding:5px; margin:1px 1px 10px 1px; border-spacing:4px; background:<?php echo BGNDB?> ;}

	
.viewhdr {display:inline-block; min-width:350px;}

/* -- view: year/month -- */

.square {
	float:left;
	width:8px;
	height:8px;
	border:<?php echo BORD1?>;
}

.miniSquare {
	float:left;
	width:5px;
	height:5px;
	border:<?php echo BORD1?>;
}

.event {
	padding:0 2px;
	margin-top:2px;
	display:block;
}

.url {
	padding:0 2px;
	cursor:pointer;
	display:block;
}

.dom {
	text-align:right;
}

.dom a {
	display:block;
	width:100%;
}

.dom a:hover {
	background:<?php echo BGND2?>;
}

.firstDom {
	background:<?php echo BGND3?>;
}

.wnr {
	border:<?php echo BORD1?>;
	vertical-align:middle;
	background:<?php echo BGNDA?>;
	text-align:center;
}

.spacer {
	display:inline-block;
	width: 100px;
}


/* -- view: week/day/dw_functions -- */

var {
	display:block;
	border-bottom:<?php echo BORD1?>;
	color:<?php echo TEXT2?>;
}

.day ul {
	margin:5px;
	padding:0px 15px;
}

.timeCell {
	border-bottom:<?php echo BORD1?>;
	text-align:center;
	color:<?php echo TEXT2?>;
}

/*
	padding:5px 4px;

*/
.evttime {
	background:<?php echo BGND3?>;
/*	background:-moz-linear-gradient(top,<?php echo BGND3?> 0%,#f56778 100%);
	background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,<?php echo BGND3?>),color-stop(100%,#f56778));
	background:-webkit-linear-gradient(top,<?php echo BGND3?> 0%,#f56778 100%);
	background:-o-linear-gradient(top,<?php echo BGND3?> 0%,#f56778 100%);
	background:-ms-linear-gradient(top,<?php echo BGND3?> 0%,#f56778 100%);
	background:linear-gradient(top,<?php echo BGND3?> 0%,#f56778 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo BGND3?>',endColorstr='#f78096',GradientType=0);
*/
	text-align:middle;
	color:<?php echo TEXT1?>;
	width:3em;
	height:1.2em;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border:<?php echo BORD1?> 
}

.evtdesc {
	horizontal-align:left;
	text-align:left;
	width:97%;
	height:1.2em;
 	border-radius:3px; 
	-moz-border-radius:3px; 
	-webkit-border-radius:3px;
	border:<?php echo BORD1?>; 
	white-space:nowrap;
}

.evtlink {
	width:100%;
	height:1.5em;
}


.timeFrame {
	position:relative;
}

.timeh {
	width:50px;
	border:<?php echo BORD1?>; 
}

.timex {
	width:50px;
	border:<?php echo BORD1?>; 
	background:<?php echo BGNDA?>;
}

.dates {
	position:absolute;
	left:0px;
	top:0px;
	width:100%;
}

.evtBox {
	position:absolute;
	border:<?php echo BORD1?>;
	border-radius:5px;
		-moz-border-radius:3px;
		-webkit-border-radius:3px;
	
	z-index:1;
	overflow:hidden;
}

.dayh {
	margin:-1px;
	border:<?php echo BORD1?>; 
	border-collapse:collapse;
}

.day {background:<?php echo BGNDB?>;}


/* -- view: upcoming / changes -- */

.eventBg {
	width:80%;
	background:<?php echo BGND1?>;
	margin:0 40px;
	padding:10px;
}

.headCh, .headUp {
	width:80%;
	margin:20px 40px 0 40px;
}

.lMarginUp {width:150px;}
.lMarginCh {width:100px;}


/* -- add/edit event -- */

div.repBox {
	position:absolute;
	left:40px; bottom:120px;
	width:360px;
	padding:10px;
	border:<?php echo BORD1?>;
	background:<?php echo BGND5?>;
	z-index:20;
	display:none;
}

/* ---- admin pages ----- */

.error {background:<?php echo BGND9?>;}

.sideBar {
	width:300px;
	border:<?php echo BORD1?>;
	background:<?php echo BGND4?>;
	margin:0 10px 10px 0;
	padding:5px;
}

.labelFix {
	width:300px;
	cursor:default;
	text-align: right;
	padding:0 6px 0 0;
}

.fieldBoxFix {
	width:100%;
	margin:10px 0;
	padding:15px;
	border:1px solid #888888;
	background:<?php echo BGND1?>;
}

.label {
	cursor:default;
	text-align: right;
	padding:0 6px 0 0;
}

.fieldBox {
	vertical-align:middle;
	margin:10px 0;
	padding:15px;
	border:1px solid #888888;
	background:<?php echo BGND1?>;
}

.saveSettings {position:absolute; left:15%; bottom:35px;}

/* ---- log in ----- */

.loginBox {
	vertical-align:middle;
	width:280px;
	padding:0 30px 30px 30px;
	border:1px solid #888888;
	background:<?php echo BGND1?>;
}

.legend {
	vertical-align:bottom;
	float:left;
	margin:-26px 0 0 0;
	font-weight:bold;
	background:<?php echo BGND1?>;
}

.legendI {
	float:left;
	margin:-6px 0 0 0;
	font-weight:bold;
	background:<?php echo BGND1?>;
}

/* ---- Onmouseover popup Styles (poptext.js) ---- */

#htmlPop{
	position:absolute;
	width:150px;
	padding:4px;
	border-radius: 5px;
	box-shadow: 5px 5px 5px #888;
	visibility:hidden;
	z-index:10;
}

.normal {border:<?php echo BORD1?>; background:<?php echo BGNDH?>;}
.private {border:<?php echo BORD1?>; background:<?php echo BGNDI?>;}
.repeat {border:<?php echo BORD4?>;}

/* ---- User selectbox Styles ----- */
.uSelect {
	width:130px;
	font:12px arial,sans-serif;
	color:#505050;
	border:1px solid <?php echo TEXT3?>;
}

/* ---- Date Picker Styles ----- */

.dpTable {
	width:150px;
	font:12px arial,sans-serif;
	text-align:center;
	color:#505050;
	background:<?php echo BGND1?>;
	border:2px outset white;
}

.dpTable th {
	background:<?php echo BGND3?>;
	color:<?php echo TEXT1?>;
}

.dpTD {
	border:1px solid <?php echo BGND1?>;
}

.dpTDHover {
	border:1px solid #888888;
	cursor:pointer;
	color:red;
}

.dpHilight {
	border:1px solid #888888;
	color:red;
	font-weight:bold;
}

.dpTitle {
	font:bold 12px arial,sans-serif;
	color:<?php echo TEXT1?>;
}

.dpButton {
	font:bold 10px arial,sans-serif;
	color:<?php echo TEXT1?>;
	background:<?php echo BGND2?>;
	cursor:pointer;
}

/* ---- Time Picker Styles ----- */

.tpFrame {
	width:120px;
	overflow:hidden;
	font:9px/10px arial,sans-serif;
	text-align:center;
	color:silver;
	background:#F2F2F2;
	border:1px solid #AAAAAA;
}

.tpSel {
	color:#FFFFFF;
	}

.tpUnSel {
	color:#E0E0E0;
	}

.tpAM {background:#EEFFFF;}
.tpPM {background:#FFCCEE;}
.tpEM {background:#DDFFDD;}

.tpPick:hover {
	background:#A0A0A0;
	color:red;
}

.tpPick {
	color:black;
}

/* ---- Color Picker Styles ----- */

.cpDiv {
	width:156px;
	height:128px;
	overflow:auto;
	background:#DDDDDD;
	border:1px solid #666666;
}
.cpCell {
	cursor:pointer;
	width:12px;
	height:12px;
}

/* ---------- table for resources and users ---------*/
table.etable {
    overflow: auto;
    width: 360px;   
    text-align:left;
	margin: 10px 0px 0px; 
    border-spacing: 1px; }

table.etable thead th {
	background: url(../images/bg_th.gif) left;
	height: 20px;
	color: #FFFFFF;
	font-size: 0.8em;
	font-family: Arial;
	font-weight: bold;
	padding: 0px 3px;
	margin: 10px 0px 0px; }

table.etable tbody tr {	
	background: #f9ecaa;
	text-align:right;
	 }

table.etable tbody tr.odd {	background: #f0f0f0; }

table.etable tbody th {
	background-position: 5px;
	padding-left: 10px; 
	text-align:left; }

table.etable tbody tr.odd th {
	background: url(./images/arrow_grey.gif) left center no-repeat;
	background-position: 5px;
	padding-left: 10px !important; }

table.etable tbody th, table.etable tbody td {
	font-size: 0.5em;
	line-height: 1.2em;
	font-family: Arial, Helvetica, sans-serif;
	padding: 5px 3px;
	white-space:nowrap; }

table.etable tbody a {
	color: #000000;
	font-weight: bold;
	text-decoration: none; }

table.etable tbody a:hover {
	color: #ffffff;
	text-decoration: underline; }

table.etable tbody tr:hover th {
	background: #800000 url(images/arrow_red.gif) left center no-repeat;
	background-position: 5px;
	color: #ffffff; }

table.etable tbody tr.odd:hover th {
	background: #000000 url(images/arrow_black.gif) left center no-repeat;
	background-position: 5px;
	color: #ffffff; }

table.etable tbody tr:hover th a, table.etable tbody tr.odd:hover th a	{
		 color: #ffffff; }

table.etable tbody tr:hover td, table.etable tbody tr:hover td a, table.etable tbody tr.odd:hover td,  table.etable tbody tr.odd:hover td a {
	background: #800000;
	color: #ffffff;	 }

table.etable tbody tr.odd:hover td, table.etable tbody tr.odd:hover td a{
	background: #000000;
	color: #ffffff;	 }

table.etable thead th {
	background: url(../images/bg_footer.gif) left;
	height: 20px;
	color: #FFFFFF;
	font-size: 0.8em;
	font-family: Arial;
	font-weight: bold;
	padding: 0px 3px;
	margin: 10px 0px 0px; }

	/* ---------- table for event popups ---------*/
table.evpop {
	width: 300px;
	border-spacing: 1px; }

table.evpop thead {
	text-align: center;
	background: #333333 url(../images/bg_th.gif) left;
	height: 20px;
	color: #FFFFFF;
	font-size: 1.2em;
	font-family: Arial;
	padding: 3px 3px;
	margin: 10px 0px 0px; }

table.evpop thead tr td {
	vertical-align: middle;
	font-weight: bold; }
	
table.evpop tbody tr {	
	background: #f9ecaa; }

table.evpop tbody th {
	background: url(./images/arrow_white.gif) left center no-repeat;
	background-position: 5px;
	padding-left: 10px !important; }

table.evpop tbody th, table.etable tbody td {
	font-size: 0.8em;
	line-height: 1.2em;
	font-family: Arial, Helvetica, sans-serif;
	color: #000000;
	padding: 5px 3px;
	text-align: center;
	white-space:nowrap; }

table.evpop tbody a {
	color: #000000;
	font-weight: bold;
	text-decoration: none; }

table.evpop tbody a:hover {
	color: #ffffff;
	text-decoration: underline; }

table.evpop tfoot tr td {
	height: 20px;
	padding: 3px 3px;
	text-align: center;
	margin: 10px 0px 0px;
	background: #555555 url(../images/bg_footer.gif) left;
	font-size: 1.2em;
	color: #ffffff;
	vertical-align: middle;
	font-weight: bold;
	}
	
		/* ---------- table for timepicker window ---------*/
table.tpik {
	width: 120px;
	border-spacing: 1px; }

table.tpik thead {
	text-align: center;
	background: #333333 url(../images/bg_th.gif) left;
	height: 20px;
	color: #FFFFFF;
	font-size: 1.2em;
	font-family: Arial;
	padding: 3px 3px;
	margin: 10px 0px 0px; }

table.tpik thead tr td {
	vertical-align: middle;
	font-weight: bold; }
	
table.tpik tbody tr {	
	background: #f9ecaa; }

table.tpik tbody th {
	background: url(./images/arrow_white.gif) left center no-repeat;
	background-position: 5px;
	padding-left: 1px !important; }

table.tpik tbody th, table.tpik tbody td {
	font-size: 0.7em;
	line-height: 1.0em;
	font-family: Arial, Helvetica, sans-serif;
	color: #000000;
	padding: 1px 1px;
	text-align: center;
	white-space:nowrap; }

table.tpik tbody a {
	color: #000000;
	font-weight: bold;
	text-decoration: none; }

table.tpik tbody a:hover {
	color: #ffffff;
	text-decoration: underline; }

table.tpik tfoot tr td {
	height: 20px;
	padding: 3px 3px;
	text-align: center;
	margin: 10px 0px 0px;
	background: #555555 url(../images/bg_footer.gif) left;
	font-size: 1.2em;
	color: #ffffff;
	vertical-align: middle;
	font-weight: bold;
	}
	
div.tableContainer {
	clear: both;
	height: 300px;
	overflow: auto;
	width: 369px 
}

/* define width of table. Add 16px to width for scrollbar.           */

/* set table header to a fixed position. WinIE 6.x only                                       */
/* In WinIE 6.x, any element with a position property set to relative and is a child of       */
/* an element that has an overflow property set, the relative value translates into fixed.    */
/* Ex: parent element DIV with a class of tableContainer has an overflow property set to auto */
thead.fixedHeader tr {
	position: relative
}

/* make the TH elements pretty */
thead.fixedHeader th {
	background: #C96;
	border-left: 1px solid #EB8;
	border-right: 1px solid #B74;
	border-top: 1px solid #EB8;
	font-weight: normal;
	padding: 4px 3px;
	text-align: left
}

/* make the A elements pretty. makes for nice clickable headers                */
thead.fixedHeader a, thead.fixedHeader a:link, thead.fixedHeader a:visited {
	color: #FFF;
	display: block;
	text-decoration: none;
	width: 100%
}

/* make the A elements pretty. makes for nice clickable headers                */
/* WARNING: swapping the background on hover may cause problems in WinIE 6.x   */
thead.fixedHeader a:hover {
	color: #FFF;
	display: block;
	text-decoration: underline;
	width: 100%
}

/* make TD elements pretty. Provide alternating classes for striping the table */
/* http://www.alistapart.com/articles/zebratables/                             */
tbody.scrollContent td, tbody.scrollContent tr.normalRow td {
	background: #FFF;
	border-bottom: none;
	border-left: none;
	border-right: 1px solid #CCC;
	border-top: 1px solid #DDD;
	padding: 2px 3px 3px 4px
}

tbody.scrollContent tr.alternateRow td {
	background: #EEE;
	border-bottom: none;
	border-left: none;
	border-right: 1px solid #CCC;
	border-top: 1px solid #DDD;
	padding: 2px 3px 3px 4px
}


	