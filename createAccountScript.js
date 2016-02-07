function updateLength(field, output) {
	var curr_length = document.getElementById(field).value.length;
	var field_mLen = document.getElementById(field).maxLength;
	document.getElementById(output).innerHTML = curr_length + '/' + field_mLen;
}

function comparePass(field, field2, output) {
    pass1 = document.getElementById(field).value;
    pass2 = document.getElementById(field2).value;
    if (pass1 == pass2) {
        update_css_class(field2, 2);
		document.getElementById(output).innerHTML = "Password match";
        isValid = 1;
    } else {
        update_css_class(field2, 1);
		document.getElementById(output).innerHTML = "Password does not match";
        isValid = 0;
    }
    return isValid;
}

function isEmpty(field) {
    length = document.getElementById(field).value.length;
    if (field != null || field != '') {
        update_css_class(field, 2);
        isValid = 1;
    } else {
        update_css_class(field, 1);
        isValid = 0;
    }
    return isValid;
}

function update_css_class(field, class_index) {
    if (class_index == 1) {
        class_s = 'wrong';
    } else if (class_index == 2) {
        class_s = 'correct';
    }
    document.getElementById(field).className = class_s;
}

// not working properly
function finalValidate(field1, output) {
    checkName = isEmpty('username');
	
    errorList = '';
    if (!(checkName)) {
        errorList += 'Login is too short<br />';
    }
    if (!(checkPass)) {
        errorList += 'Password is too short<br />';
    }
	if (!(checkMatch)) {
		errorList += 'Passwords do not match<br />';
	}
    if (errorList) {
        document.getElementById(output).innerHTML = errorList;
        return false;
    } else {
		return true;
	}
}




