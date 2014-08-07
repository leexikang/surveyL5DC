var usernameEmpty = false;
var validateUsername = false;
var validatePassword = false;
var emptyPassword = false;
var validateEmail = false;


window.onload = initPage;

function initPage(){
	
	document.getElementById("username").onblur = checkUsername;
	document.getElementById("password2").onblur = checkPassword;
	document.getElementById("signupBtn").disabled = true;
	
	}

function checkUsername(){
	

	userRequest = createRequest();
	if(userRequest == null){
		alert("can't create request. Try again.");
	}else{
		var username = document.getElementById("username").value;
		if(username.length == 0){
		var errorMessage1 = "Please enter username";
		changeTextNode(errorMessage1);
       	usernameEmpty = false;
		}
		if( username != null){

			usernameEmpty = true;
			document.getElementById("username").className = "min";
			clearErrorText();
		}
		signupStatus();
		url = "checkUsername.php?username="+escape(username);
		userRequest.onreadystatechange = showUsernameStatus;
		userRequest.open("GET", url, true);
		userRequest.send(null);
	}
}

function showUsernameStatus(){

	if(userRequest.readyState == 4){
		if(userRequest.status == 200){
			if(userRequest.responseText == "okay"){
				validateUsername = true;
				document.getElementById("username").className = "";
				clearErrorText();

			}else{
				var errorMessage = "Username has been taken.";
				changeTextNode(errorMessage);
				document.getElementById("username").focus();
				document.getElementById("username").className = "errorForm";
				validateUsername = false;

			}
			signupStatus();
		}
	}
}

function checkPassword(){
	var password1 = document.getElementById("password1").value;
	var password2 = document.getElementById("password2").value;
	if(password1.length == 0 ){
		emptyPassword = false;
	}else{
		emptyPassword = true;
	}
	signupStatus();
	if(password1 == password2){
		validatePassword = true;
		document.getElementById("password1").className = "";
		clearErrorText();
	}else{
		validatePassword = false;
		document.getElementById("password1").focus();
        document.getElementById("password1").select();
        document.getElementById("password1").className = "errorForm";

		var errorMessage = "Passwords are not match";
		changeTextNode(errorMessage);
	}
	signupStatus();
}



function changeTextNode(errorText){

	var errorNode = document.getElementById("errorMessage");
	while(errorNode.firstChild){
		errorNode.removeChild(errorNode.firstChild);
	}
	var text = document.createTextNode(errorText);
	errorNode.appendChild(text);
	}

function clearErrorText(){
	var errorNode = document.getElementById("errorMessage");
	while(errorNode.firstChild){
		errorNode.removeChild(errorNode.firstChild);
	}
}
function signupStatus(){
	if(validateUsername && validatePassword && usernameEmpty && emptyPassword){
		document.getElementById("signupBtn").disabled = false;
	}else{
		document.getElementById("signupBtn").disabled = true;
	}
}	