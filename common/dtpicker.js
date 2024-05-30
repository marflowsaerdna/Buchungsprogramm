/* -- Date / Time Picker -- */

//Common functions

function $(element) {
  return document.getElementById(element);
}

function createDiv(divId, x, y) {;
	//If not present, create picker div
	if (!$(divId)) {
		var newNode = document.createElement("div");
		newNode.setAttribute("id", divId);
		newNode.setAttribute("style", "visibility: hidden;");
		document.body.appendChild(newNode);
	}
 	//move div to x,y and toggle visibility
	var xpDiv = $(divId);
	xpDiv.className = divId; 
	xpDiv.style.position = "absolute";
	xpDiv.style.left = x + "px";
	xpDiv.style.top = y + "px";
	xpDiv.style.visibility = (xpDiv.style.visibility == "visible" ? "hidden" : "visible");
	xpDiv.style.display = (xpDiv.style.display == "block" ? "none" : "block");
	xpDiv.style.zIndex = 1000;
	return(xpDiv);
}


//Date Picker

var formName, dateFieldId, clearButton;
 
//vars dFormat, dSepar, time24, wStart, dpMonths, dpWkdays, dpClear and dpToday must be defined outside dtpicker.js !

function dPicker(cB,form,dateFieldId1,dateFieldId2) {

	var dateField1 = $(dateFieldId1);
	var dateField2 = (dateFieldId2) ? $(dateFieldId2) : "";
	dateFieldId = dateFieldId1;
	formName = form;
	clearButton = cB;

	//compute dpicker coordinates (beneath dateField1)
	var x = dateField1.offsetLeft;
	var y = dateField1.offsetTop + dateField1.offsetHeight;
	//deal with elements inside tables and such
	var parent = dateField1;
	while (parent.offsetParent) {
		parent = parent.offsetParent;
		x += parent.offsetLeft;
		y += parent.offsetTop + 2;
	}

	//If not present, create dpDiv, move it to x,y and toggle visibility
	var dpDiv = createDiv("dpDiv", x, y);

	//get working date from dateField 1 or 2
	var dateString;
	var dt;
	var dtArray;
 
	if (dateField1.value) {
		dateString = dateField1.value;
	} else if (dateField2) {
		dateString = dateField2.value;
	}
	if (dateString) {
		dtArray = dateString.split(/[.\-/]/);
		switch(dFormat) {
		case 1: //dd mm yyyy
			dt = new Date(parseInt(dtArray[2], 10), parseInt(dtArray[1], 10) - 1, parseInt(dtArray[0], 10));
			break;
		case 2: //mm dd yyyy
			dt = new Date(parseInt(dtArray[2], 10), parseInt(dtArray[0], 10) - 1, parseInt(dtArray[1], 10));
			break;
		case 3: //yyyy mm dd
			dt = new Date(parseInt(dtArray[0], 10), parseInt(dtArray[1], 10) - 1, parseInt(dtArray[2], 10));
		}
	} else {
		dt = new Date();
	}
	refreshDP(dt.getFullYear(), dt.getMonth(), dt.getDate());
}

function refreshDP(year, month, day) {
	var thisDay = new Date();
	var today = thisDay.getFullYear()+("0"+(thisDay.getMonth()+1)).slice(-2)+("0"+thisDay.getDate()).slice(-2);
 
	if (year > 0) {
		thisDay = new Date(year, month, 1);
	} else {
		year = thisDay.getFullYear();
		month = thisDay.getMonth();
		day = thisDay.getDate();
		thisDay.setDate(1);
	}
 
	var TD = "<td class='dpTD' onMouseOut='this.className=\"dpTD\";' onMouseOver='this.className=\"dpTDHover\";' "; //leave open
	var html = "<table class='dpTable' cols=7>\n<tr>";
	html += "<td>" + getButtonCode(year, month, -1, "&lt;") + "</td>\n";
	html += "<td class='dpTitle' colspan=5>" + dpMonths[month] + " " + year + "</td>\n";
	html += "<td>" + getButtonCode(year, month, 1, "&gt;") + "</td>\n</tr>\n";

 	html += "<tr>";
  for(i = wStart; i < wStart+7; i++) {
		html += "<th>" + dpWkdays[i] + "</th>\n";
	}
	html += "</tr>\n<tr>";
  for (i = (thisDay.getDay() + 6 + (1-wStart)) % 7; i > 0; i--) { html += "<td></td>\n"; }
 	do {
		dayNum = thisDay.getDate();
		dateString = year + ("0"+(month+1)).slice(-2) + ("0"+dayNum).slice(-2); //yyyymmdd
		TD_onclick = " onclick=\"updateDateField('" + dateString + "');\">";
		html += TD + TD_onclick + (dayNum == day ? "<div class='dpHilight'>" + dayNum + "</div>" : dayNum) + "</td>\n";
    if ((thisDay.getDay() + 6 + (1-wStart)) % 7 == 6) html += "</tr>\n<tr>"; //if EndOfWeek, start new row
		thisDay.setDate(dayNum + 1); //increment the day
	} while (thisDay.getDate() > 1)
  for (i = (thisDay.getDay() + 6 + (1-wStart)) % 7; i < 7; i++) { html += "<td class=out></td>\n"; }
	html += "</tr>\n<tr><td colspan=7>";
  html += "<button class='dpButton' onClick=\"updateDateField('"+today+"');\"> "+dpToday+" </button> ";
	if (clearButton != 0) {
		html += "<button class='dpButton' onClick='updateDateField();'> "+dpClear+" </button>";
	}
  html += "</td>\n</tr>\n</table>\n";
 	$("dpDiv").innerHTML = html;
}

function getButtonCode(year, month, offset, label) {
	var newM = (month + 12 + offset) % 12;
	var newY = (Math.abs(newM - month) > 1) ? year + offset : year;
	return "<button class='dpButton' onClick='refreshDP(" + newY + "," + newM + ");'>" + label + "</button>";
}

function updateDateField(yyyymmdd) {
	var dateField = $(dateFieldId);
	var dpDiv = $("dpDiv");
	if (yyyymmdd) {
		switch(dFormat) {
		case 1: //dd mm yyyy
			dateString = yyyymmdd.substr(6,2) + dSepar + yyyymmdd.substr(4,2) + dSepar + yyyymmdd.substr(0,4);
			break;
		case 2: //mm dd yyyy
			dateString = yyyymmdd.substr(4,2) + dSepar + yyyymmdd.substr(6,2) + dSepar + yyyymmdd.substr(0,4);
			break;
		case 3: //yyyy mm dd
			dateString = yyyymmdd.substr(0,4) + dSepar + yyyymmdd.substr(4,2) + dSepar + yyyymmdd.substr(6,2);
		}
		dateField.value = dateString;
		if (formName != "nill") document.forms[formName].submit();
	} else {
		dateField.value = '';
	}
	dpDiv.style.visibility = "hidden";
	dpDiv.style.display = "none";
}


//Time Picker

function stiPicker(stimeFieldId, etimeFieldId, phpTimeAvailable) {

	var timeField = $(stimeFieldId);
	var enablestr = phpTimeAvailable.split("");
	var hhmm;
	

	//compute tpicker coordinates (beneath timeField)
	var x = timeField.offsetLeft + timeField.offsetWidth + 22;
	var y = timeField.offsetTop - 95;
 
	//deal with elements inside tables and such
	var parent = timeField;
	while (parent.offsetParent) {
		parent = parent.offsetParent;
		x += parent.offsetLeft;
		y += parent.offsetTop ;
	}
	//If not present, create tpDiv, move it to x,y and toggle visibility
	var tpDiv = createDiv("tpDiv", x, y);

 	//draw the timepicker table; the timeField object will receive the time
	var html='<div class="tpFrame">';
	if (time24 == 0) { html += '- AM -'; }
	for (var i=0;i<24;i++){
		if (i==7) { html += '<div class="tpAM">'; }
		if (i==12 && time24 == 0) { html += '- PM -'; }
		if (i==12) { html += '<div class="tpPM">'; }
		if (i==18) { html += '<div class="tpEM">'; }
		for (var j=0;j<60;j += 15) {
			if (time24 == 0) {
				hh = i;
				ampm = (hh < 12) ? "AM" : "PM";
				if (hh >= 13) { hh -= 12; }
				hhmm1 = String(hh) + ":" + String("0" + j).slice(-2) + ampm;
				hhmm2 = String("0" + hh).slice(-2) + ":" + String("0" + j).slice(-2);
			} else {
				hhmm1 = hhmm2 = String("0" + i).slice(-2) + ":" + String("0" + j).slice(-2)
			}
			if (enablestr[(i*4)+(j/15)] == "0")   // not yet booked
			{
				html += '<a class="tpPick" href="#" onClick="updateTimeField(\''+stimeFieldId+'\', \''+hhmm1+'\');">'+hhmm2+'</a>';
			}
			else {
				html +=	String(hhmm2);
			}
			if (j<45) { html += '&nbsp;&nbsp;'; }
		}
		html += (i==11 || i==17 || i==23) ? '</div>' : '<br />';
	}
	html += '</div>';

	tpDiv.innerHTML = html;
}
function etiPicker(stimeFieldId, etimeFieldId, phpTimeAvailable) {

	var stimeField = $(stimeFieldId);
	var timeField = $(etimeFieldId);
	var enablestr = phpTimeAvailable.split("");
	var hhmm;

	//compute tpicker coordinates (beneath timeField)
	var x = timeField.offsetLeft + timeField.offsetWidth + 22;
	var y = timeField.offsetTop - 95;
 
	//deal with elements inside tables and such
	var parent = timeField;
	while (parent.offsetParent) {
		parent = parent.offsetParent;
		x += parent.offsetLeft;
		y += parent.offsetTop ;
	}
	
	// calculate reachable indexes of available time
	var hmin = stimeField.value.split(":");
	var startindex = hmin[0] * 4 + hmin[1]/15;     					// sti sets the starting index
	var resttime = phpTimeAvailable.slice(startindex, 24*4);			// remaining string
	var rti = resttime.search("1");
	if (rti != -1)
		var endindex = startindex + resttime.search("1");
	else
		var endindex = 24*4;

	//If not present, create tpDiv, move it to x,y and toggle visibility
	var tpDiv = createDiv("tpDiv", x, y);

 	//draw the timepicker table; the timeField object will receive the time
	var html='<div class="tpFrame">';
	if (time24 == 0) { html += '- AM -'; }
	for (var i=0;i<24;i++){
		if (i==7) { html += '<div class="tpAM">'; }
		if (i==12 && time24 == 0) { html += '- PM -'; }
		if (i==12) { html += '<div class="tpPM">'; }
		if (i==18) { html += '<div class="tpEM">'; }
		for (var j=0;j<60;j += 15) {
			if (time24 == 0) {
				hh = i;
				ampm = (hh < 12) ? "AM" : "PM";
				if (hh >= 13) { hh -= 12; }
				hhmm1 = String(hh) + ":" + String("0" + j).slice(-2) + ampm;
				hhmm2 = String("0" + hh).slice(-2) + ":" + String("0" + j).slice(-2);
			} else {
				hhmm1 = hhmm2 = String("0" + i).slice(-2) + ":" + String("0" + j).slice(-2)
			}
			var index = (i*4)+(j/15);
			if ((index > startindex) && (index <= endindex))  // not yet booked
			{
				html += '<a class="tpPick" href="#" onClick="updateTimeField(\''+etimeFieldId+'\', \''+hhmm1+'\');">'+hhmm2+'</a>';
			}
			else {
				html +=	String(hhmm2);
			}
			if (j<45) { html += '&nbsp;&nbsp;'; }
		}
		html += (i==11 || i==17 || i==23) ? '</div>' : '<br />';
	}
	html += '</div>';

	tpDiv.innerHTML = html;
}
function updateTimeField(timeFieldId, timeString) {
	var timeField = $(timeFieldId);
	if (timeString) { timeField.value = timeString; }
	var tpDiv = $("tpDiv");
	tpDiv.style.visibility = "hidden";
	tpDiv.style.display = "none";
	timeField.focus();
}
