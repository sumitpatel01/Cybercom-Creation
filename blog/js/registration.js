function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

function validateForm() {

    var prefix = document.getElementById('prefix');
    var firstName = document.getElementById('fname');
    var lastName = document.getElementById('lname');
    var email = document.getElementById('email');
    var phone = document.getElementById('phone');
    var password = document.getElementById('password');
    var cpassword = document.getElementById('cpassword');
    var information = document.getElementById('information');
    var agree = document.getElementById('agree');


    var fnameErr = passErr = infoErr = prefixErr = lnameErr = emailErr =  phoneErr = agreeErr = cpassErr = true;

    if(prefix.value == "select") {
        printError("prefixErr", "Please select your prefix");
    } else {
        printError("prefixErr", "");
        prefixErr = false;
    }
    
    if(firstName.value == "") {
        printError("fnameErr", "Please enter your name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(firstName.value) === false) {
            printError("fnameErr", "Please enter a valid name");
        } else {
            printError("fnameErr", "");
            nameErr = false;
        }
    }

    if(lastName.value == "") {
        printError("lnameErr", "Please enter your name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(lastName.value) === false) {
            printError("lnameErr", "Please enter a valid name");
        } else {
            printError("lnameErr", "");
            nameErr = false;
        }
    }

    if(email.value == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email.value) === false) {
            printError("emailErr", "Please enter a valid email addresss");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }

    if(phone.value == "") {
        printError("phoneErr", "Please enter your mobile number");
    } else {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(phone.value) === false) {
            printError("phoneErr", "Please enter a valid 10 digit mobile number");
        } else{
            printError("phoneErr", "");
            phoneErr = false;
        }
    }

    if( password.value == "" ) {
        printError("passErr", "please enter password");
    } else if (password.value.length < 8) {
        printError("passErr", "password must be 8 charactor");
    } else {
        printError("passErr", "");
            passErr = false;
    }

    if( cpassword.value == "" ) {
        printError("cpassErr", "please enter password again! ");
    } else if (password.value !== cpassword.value) {
        printError("cpassErr", "password and confirm password should be same");
    } else {
        printError("cpassErr", "");
            cpassErr = false;
    }

    if(information.value == '') {
        printError("infoErr", "Please enter your information");
    } else {
        printError("infoErr", "");
        infoErr = false;
    }



    if (!agree.checked) {
        printError("agreeErr", "select terms & conditions");
    } else {
        printError("agreeErr", "");
        agreeErr = false;
    }



    if((fnameErr || passErr || infoErr || prefixErr || cpassErr || emailErr ||lnameErr || agreeErr  || phoneErr) == true) {
        return false;
    
     } else {
        
         alert(dataPreview);

        return true;
     }

}