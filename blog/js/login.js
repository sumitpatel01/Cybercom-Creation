function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

function validateForm() {

    var email = document.getElementById('email');
    var password = document.getElementById('password');


    var passErr = emailErr = true;


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



    if( password.value == "" ) {
        printError("passErr", "please enter password");
    } else if (password.value.length < 8) {
        printError("passErr", "password must be 8 charactor");
    } else {
        printError("passErr", "");
            passErr = false;
    }

    

    
    
    if((emailErr || passErr) == true) {
        return false;
        
     } else {
        return true;
     }

}