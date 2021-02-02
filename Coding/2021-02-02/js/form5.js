function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}


function validate(){
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;


    var emailErr ,passErr = true;


    if(email == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }

    if( password== "" ) {
        printError("passErr", "please enter password");
    } else if (password.length < 8) {
        printError("passErr", "password must be 8 charactor");
    } else {
        printError("passErr", "");
            passErr = false;
    }

    if((emailErr || passErr) == true) {
        return false;
     } else {
         // Creating a string from input data for preview
         var dataPreview = "You've entered the following details: \n" +
                           "Full Name: " + email+ "\n" +
                           "password: " + password + "\n" 
                           
         // Display input data in a dialog box before submitting the form
         alert(dataPreview);
     }
}