function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}


function validateForm () {

    var firstName = document.getElementById('fname');
    var lastName = document.getElementById('fname');
    var password = document.getElementById('password');
    var confirmPassword = document.getElementById('cpassword');
    var date = document.getElementById('date');
    var month = document.getElementById('month');
    var year = document.getElementById('year');
    var country = document.getElementById('country');
    var gender = document.getElementsByName('gender');
    var phone = document.getElementById('phone');
    var email = document.getElementById('email');
    var agree = document.getElementById('agree');

    var nameErr = lnameErr = cpassErr= passErr = addErr = ageErr = genderErr = dobErr = fileErr= agreeErr =  true;

    if(firstName.value == "") {
        printError("nameErr", "Please enter your name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(firstName.value) === false) {
            printError("nameErr", "Please enter a valid name");
        } else {
            printError("nameErr", "");
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
            lnameErr = false;
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

    if( confirmPassword.value == "" ) {
        printError("cpassErr", "please enter password again! ");
    } else if (password.value !== confirmPassword.value) {
        printError("cpassErr", "password and confirm password should be same");
    } else {
        printError("cpassErr", "");
            cpassErr = false;
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

    console.log('hello');

    if(country.value == "select") {
        printError("countryErr", "Please select your country");
    } else {
        printError("countryErr", "");
        countryErr = false;
    }

    if(date.value == "select"|| month.value == "select" || year.value == "select") {
        printError("dobErr", "Please select your date of birth");
    } else {
        printError("dobErr", "");
        dobErr = false;
    }

    if(!gender[0].checked && !gender[1].checked) {
        printError("genderErr", "Please select your gender");
    } else {
        printError("genderErr", "");
        genderErr = false;
    }

    if (!agree.checked) {
        printError("agreeErr", "select terms & conditions");
    } else {
        printError("agreeErr", "");
        agreeErr = false;
    }

    if((nameErr || passErr || emailErr || lnameErr || dobErr || genderErr || cpassErr || countryErr || phoneErr || agreeErr) == true) {
        return false;
     } else {
         // Creating a string from input data for preview
        //  var dataPreview = "You've entered the following details: \n" +
        //                    "First Name: " + firstName.value + "\n" +
        //                    "last Name: " + lastName.value + "\n" +
        //                    "DOB: " + date.value +"-"+ month.value + "-"+ year.value + "\n" +
        //                    "country: " + country.value + "\n" +
        //                    "gender: " + gender.value + "\n" +
        //                    "email: " + email.value + "\n" +
        //                    "phone: " + phone.value + "\n" +
        //                    "password: " + password.value + "\n" +
        //                    "confirm password: " + confirmPassword.value + "\n" ;

        //  // Display input data in a dialog box before submitting the form
        //  alert(dataPreview);

        return true;
     }

    
}