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
    var marital = document.getElementsByName('marital');
    var agree = document.getElementById('agree');


    for(var i=0; i < checkboxes.length; i++) {
        if(checkboxes[i].checked) {
            games.push(checkboxes[i].value);
        }
    }

    var nameErr = passErr = addErr = genderErr = maritalErr = gameErr =  dobErr = agreeErr = true;

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

    if(!gender[0].checked && !gender[1].checked) {
        printError("genderErr", "Please select your gender");
    } else {
        printError("genderErr", "");
        genderErr = false;
    }

    if(!marital[0].checked && !marital[1].checked) {
        printError("maritalErr", "Please select your marital status");
    } else {
        printError("maritalErr", "");
        maritalErr = false;
    }

    if(games.length == 0) {
        printError("gameErr", "Please select game");
    } else {
        printError("gameErr", "");
        gameErr = false;
    }


    if(date.value == "select"|| month.value == "select" || year.value == "select") {
        printError("dobErr", "Please select your date of birth");
    } else {
        printError("dobErr", "");
        dobErr = false;
    }

    if (!agree.checked) {
        printError("agreeErr", "select terms & conditions");
    } else {
        printError("agreeErr", "");
        agreeErr = false;
    }
    
    if((nameErr || passErr || addErr || genderErr || dobErr || maritalErr || gameErr || agreeErr) == true) {
        return false;
     } else {
         // Creating a string from input data for preview
        //  var dataPreview = "You've entered the following details: \n" +
        //                    "Full Name: " + username.value + "\n" +
        //                    "password: " + password.value + "\n" +
        //                    "DOB: " + date.value +"-"+ month.value + "-"+ year.value + "\n" +
        //                    "address: " + address.value + "\n" +
        //                    "gender: " + gender.value + "\n" +
        //                    "marital status: " + marital.value + "\n";

        //  if(games.length) {
        //      dataPreview += "games: " + games.join(", ");
        //  }
        //  // Display input data in a dialog box before submitting the form
        //  alert(dataPreview);

        return true;
     }

}