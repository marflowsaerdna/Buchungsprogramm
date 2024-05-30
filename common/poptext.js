//text box popup
//© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

var offsetx=-60; //x offset of box
var offsety=16; //y offset of box
var maxTextLen=80; //default max text length in box
var popobj;

function popon(puContent, puClass, puMaxChar){
	var i, lines, popDiv, maxBoxWidth = "auto", maxTextLen = 60;
	if (typeof puMaxChar == 'number') maxTextLen = puMaxChar;
	lines = puContent.split("<br />") //split on <br />
	for (i in lines) {
		if (lines[i].replace(/(<([^>]+)>)/ig,"").length > maxTextLen) maxBoxWidth = (5 * maxTextLen) + "px";
	}
	if (!document.getElementById("htmlPop")) { //box object not yet existing
		popDiv = document.createElement("div");
		popDiv.setAttribute("id", "htmlPop");
		document.body.appendChild(popDiv);
	}
	popobj = document.getElementById("htmlPop");
	popobj.style.width = maxBoxWidth;
	popobj.className = puClass;
	popobj.innerHTML = puContent;
	popobj.style.visibility = "visible";
	document.onmousemove = positionpop;
	return false;
}

function popoff(){
	popobj.style.visibility = "hidden";
	document.onmousemove = null;
}

function positionpop(e){
	var mouseX = (!e) ? event.clientX : e.clientX; //mouse pos relative to window
	var mouseY = (!e) ? event.clientY : e.clientY;
	var curX = (!e) ? mouseX+document.documentElement.scrollLeft : e.pageX; //mouse pos relative to document
	var curY = (!e) ? mouseY+document.documentElement.scrollTop : e.pageY;
	var rightedge = (!window.innerWidth) ? document.documentElement.clientWidth : window.innerWidth-20 //window edge
	var bottomedge = (!window.innerHeight) ? document.documentElement.clientHeight : window.innerHeight-10

	if (rightedge-mouseX-offsetx < popobj.offsetWidth) { //if the box hits the right edge
		popobj.style.left = rightedge-popobj.offsetWidth-5+"px"; //don't move it
	} else {
		popobj.style.left = (curX<(-offsetx)) ? "5px" : curX+offsetx+"px"; //don't move it : move it with mouse
	}
	if (bottomedge-mouseY-offsety < popobj.offsetHeight) { //if the box hits the bottom edge
		popobj.style.top = curY-popobj.offsetHeight-(offsety/2)+"px"; //move it up
	} else {
		popobj.style.top = curY+offsety+"px"; //move it with mouse
	}
}