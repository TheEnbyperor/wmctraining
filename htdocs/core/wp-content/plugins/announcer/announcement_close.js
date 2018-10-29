// Close Announcement box with cookie.

//Author : Aakash Chakravarthy (www.aakashweb.com)
//Email : aakash.19493@gmail.com

var expDate = new Date();
expDate.setDate(expDate.getDate()+365);

function toggleGetCookie(tgId)
{
	var nameEQ = 'toggle-' + tgId + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0){ 
			return c.substring(nameEQ.length,c.length);
		}
	}
}

function toggleInitiliaze(tgName){
	if(toggleGetCookie(tgName) == 'hide'){
		toggleHide(tgName);
	}else{
		 toggleShow(tgName);
	}
}

function toggleToggle(tgId)
{
	if(toggleGetCookie(tgId) == null || toggleGetCookie(tgId) == 'show'){
		toggleHide(tgId);
	}else{
		toggleShow(tgId);
	}
}


function toggleShow(tgId)
{
	document.cookie = "toggle-" + tgId +"=show; expires=" + expDate.toGMTString()+"; path=/";
	document.getElementById(tgId).style.display = 'block';
}

function toggleHide(tgId)
{
	document.cookie = "toggle-" + tgId + "=hide; expires=" + expDate.toGMTString()+"; path=/";
	document.getElementById(tgId).style.display = 'none';
}