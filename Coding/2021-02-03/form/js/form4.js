function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}


function validate(){
    var username = document.getElementById('name').value;
    var email = document.getElementById('email').value;    
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('message').value;



    var emailErr ,nameErr , subjectErr, messageErr = true;


    if(username == "") {
        printError("nameErr", "Please enter your name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(username) === false) {
            printError("nameErr", "Please enter a valid name");
        } else {
            printError("nameErr", "");
            nameErr = false;
        }
    }

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

    if(subject == "") {
        printError("subjectErr", "Please enter your subject");
    } else {
        printError("subjectErr", "");
        subjectErr = false;
    }

    if( message == "" ) {
        printError("messageErr", "please enter message");
    } else {
        printError("messageErr", "");
            messageErr = false;
    }

    if((emailErr || nameErr || subjectErr || messageErr) == true) {
        return false;
     } else {
         // Creating a string from input data for preview
         var dataPreview = "You've entered the following details: \n" +
                           "Full Name: " + username+ "\n" +
                           "subject: " + subject+ "\n" +
                           "message: " + message+ "\n" +
                           "email: " + email + "\n" 
                           
         // Display input data in a dialog box before submitting the form
         alert(dataPreview);
     }
}