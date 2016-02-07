function loginFunction() {
	var url = "login.html";
	window.open(url);
}

function createAccountFunction() {
	var url2 = "createAccount.html";
	window.open(url2);
}

function textFilled(username, password) {
	if (username != null && password != null) {
		var url = "https://www.google.ca/";
		window.open(url);
	}
	
		
}

function updateLength(field, output) {
	var curr_length = document.getElementById(field).value.length;
	var field_mLen = document.getElementById(field).maxLength;
	document.getElementById(output).innerHTML = curr_length + '/' + field_mLen;
}

function checkTextField(field) {
    if (field.value == '')
        alert("Field is empty");
}