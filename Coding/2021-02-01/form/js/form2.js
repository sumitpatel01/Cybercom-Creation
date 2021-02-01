function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

function validateForm() {

    console.log('H');

    var username = document.getElementById('name');
    var password = document.getElementById('password');
    var address = document.getElementById('address');
    var games = [];
    var checkboxes = document.getElementsByName('games[]');
    var gender = document.getElementsByName('gender');
    var date = document.getElementById('date');
    var month = document.getElementById('month');
    var year = document.getElementById('year');
    var marital = document.getElementsByName('user');

    console.log(gender.value);
    console.log(marital.value);
    console.log(date.value);
    console.log(month.value);


    for(var i=0; i < checkboxes.length; i++) {
        if(checkboxes[i].checked) {
            games.push(checkboxes[i].value);
        }
    }

    var nameErr = passErr = addErr = genderErr = maritalErr = dobErr= true;

    if(username.value == "") {
        printError("nameErr", "Please enter your name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(username.value) === false) {
            printError("nameErr", "Please enter a valid name");
        } else {
            printError("nameErr", "");
            nameErr = false;
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

    if(address.value == '') {
        printError("addErr", "Please enter your address");
    } else {
        printError("addErr", "");
        addErr = false;
    }

    if(gender.value == "") {
        printError("genderErr", "Please select your gender");
    } else {
        printError("genderErr", "");
        genderErr = false;
    }

    if(marital.value == "Select") {
        printError("maritalErr", "Please select your age");
    } else {
        printError("maritalErr", "");
        maritalErr = false;
    }


    if(date.value == "select"|| month.value == "select" || year.value == "select") {
        printError("dobErr", "Please select your date of birth");
    } else {
        printError("dobErr", "");
        dobErr = false;
    }
    
    if((nameErr || passErr || addErr || genderErr || dobErr || maritalErr) == true) {
        return false;
     } else {
         // Creating a string from input data for preview
         var dataPreview = "You've entered the following details: \n" +
                           "Full Name: " + username.value + "\n" +
                           "password: " + password.value + "\n" +
                           "DOB: " + date.value +"-"+ month.value + "-"+ year.value + "\n" +
                           "address: " + address.value + "\n" +
                           "gender: " + gender.value + "\n" +
                           "marital status: " + marital.value + "\n";

         if(games.length) {
             dataPreview += "games: " + games.join(", ");
         }
         // Display input data in a dialog box before submitting the form
         alert(dataPreview);
     }

}