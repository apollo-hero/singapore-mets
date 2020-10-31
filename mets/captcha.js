/*################ Developed By: Sanjoy Ganguly ######################*/
if(window.ActiveXObject) {
	try {
		var oHTTP = new ActiveXObject("Msxml2.XMLHTTP");
	} catch(e) {
		var oHTTP = new ActiveXObject("Microsoft.XMLHTTP");
	}
} else {
	var oHTTP = new XMLHttpRequest();
}


function refreshCaptcha(){
	
	callPage('ajax_captcha.php');	
	return false;
}

function callPage(page) {
	oHTTP.open("GET", page, true);
	oHTTP.onreadystatechange=function() {
		if (oHTTP.readyState==4) {
			var getValue=oHTTP.responseText;											
			document.getElementById('cap_code').value = getValue;			
		}
	}
	oHTTP.send(null);
}

function Reload() {
	var f = document.getElementById('iframe1');
	f.src = f.src;
}