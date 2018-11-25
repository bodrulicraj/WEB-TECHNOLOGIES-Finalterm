

//JavaScript Function For XMLHttpRequest Generate

function email_validation( email ) {
	
	if ( window.XMLHttpRequest ) {
		xmlhttp = new XMLHttpRequest();		// code for IE7+, Firefox, Chrome, Opera, Safari
	} else {
		xmlhttp=new ActiveXObject( "Microsoft.XMLHTTP" );		// code for IE6, IE5
	}
	
	xmlhttp.onreadystatechange = function() {
		if ( this.readyState == 4 && this.status == 200 ) {
			var res = this.responseText;
			var error = document.getElementById("error2");
			var icon = document.getElementById("icon2");
		
			if( res == 1) {
				error.innerHTML = "Email Already Exist";
				icon.innerHTML = "&#10006";
				icon.style.color = "red";
				icon.style.fontSize = "18px";
				document.signup.email.focus();
				
			} else {
				error.innerHTML = "Email Available";
				error.style.color = "white";
				icon.innerHTML = "&#10004";
				icon.style.color = "#00802b";
				icon.style.fontSize = "17px";
			}
		}
	};
				
	xmlhttp.open( "GET", "search.php?email="+email, true );
	xmlhttp.send();
}

