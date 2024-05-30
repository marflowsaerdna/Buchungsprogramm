function openWin (url,windowW,windowH) {

	var window_top = 100;
	var window_left = screen.width-windowW-40;
	var newWindow = window.open(url,'helpWindow','height=' + windowH +',width=' + windowW + ',top=' + window_top + ',left=' + window_left + ', scrollbars');
	return newWindow;
}

function eventWin (url,windowH) {
	if (typeof windowH != 'number') windowH = 200;
	var windowW = 460;
	var window_top = 100;
	var window_left = (screen.width-2*windowW)/2;
	var newWindow = window.open(url,'eventWindow','height=' + windowH +',width=' + windowW + ',top=' + window_top + ',left=' + window_left + ', resizable=yes, scrollbars=1');
	return newWindow;
}

function jumpMenu(myList) {
	var gotoUrl = myList.options[myList.selectedIndex].value;
	if (gotoUrl != '#') { window.location.href = gotoUrl; }
	return false;
}

function check1(boxName,checked) { //check 1 of N checkboxes
	var chBoxes = document.getElementsByName(boxName);
	for (var i=(chBoxes.length-1);i >= 0;i--) {
		chBoxes[i].checked = false;
	}
	checked.checked = true;
}

function checkA(boxName,checked) { //check "all" of N checkboxes
	var chBoxes = document.getElementsByName(boxName+'[]');
	for (var i=(chBoxes.length-1);i >= 0;i--) {
		chBoxes[i].checked = false;
	}
	document.getElementById(boxName+'0').checked = true;
}

function checkN(boxName,checked) { //check any of N checkboxes
	var chBoxes = document.getElementsByName(boxName+'[]');
	var check = false;
	for (var i=(chBoxes.length-1);i >= 0;i--) {
		if (chBoxes[i].checked) { check = true; }
	}
	document.getElementById(boxName+'0').checked = (check == true) ? false : true;
}

function show(elem,formName) { //display/hide element; if form & hide: submit
	var overlay = document.getElementById(elem);
	overlay.style.display = (overlay.style.display == "block") ? "none" : "block";
	if (formName && overlay.style.display == "none") { document.forms[formName].submit(); }
}

function printNice(clname) {
	var re = new RegExp(clname);
	var els = document.getElementsByTagName("*");
	for (var i=(els.length-1);i >= 0;i--) {
		if (els[i].className!='point') { els[i].style.backgroundColor = "#FFFFFF"; }
		if (re.test(els[i].className)) { els[i].style.display = "none"; }
	}
	window.print();
	alert("Print ready"); //wait until printed
	window.location.reload()
}


//dragme

var xdif, ydif, obj=null, objParent;

function mouseMove(e) {
	if (!e) var e = window.event; //if ie
  if (obj) { //object is not null
    objParent.style.left = e.clientX - xdif + "px";
    objParent.style.top  = e.clientY - ydif + "px";
    return false;
  }
}

function mouseSelect(e) {
	if (!e) e = window.event; //if ie
  obj = (!e.target) ? e.srcElement : e.target; //ie || nn6
	if (obj.className == "dragme") {
		objParent = obj.parentNode;
		xdif = e.clientX - objParent.offsetLeft; //mouse-X - parent-L
		ydif = e.clientY - objParent.offsetTop;
		document.onmousemove=mouseMove;
		return false;
	}
}
document.onmousedown=mouseSelect;
document.onmouseup=new Function("obj=null");