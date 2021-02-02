function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

function validateForm() {

    var username = document.getElementById('name');
    var password = document.getElementById('password');
    var address = document.getElementById('address');
    var games = [];
    var checkboxes = document.getElementsByName('games[]');
    var genders = document.getElementsByName('gender');
    var age = document.getElementById('age');
    var file = document.getElementById('file');
    var allowedExtensions =  /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    

    for(var i=0; i < checkboxes.length; i++) {
        if(checkboxes[i].checked) {
            games.push(checkboxes[i].value);
        }
    }

    var nameErr = passErr = addErr = ageErr = genderErr = fileErr = gameErr= true;

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

    if(!genders[0].checked && !genders[1].checked) {
        printError("genderErr", "Please select your gender");
    } else {
        printError("genderErr", "");
        genderErr = false;
    }

    if(age.value == "select") {
        printError("ageErr", "Please select your age");
    } else {
        printError("ageErr", "");
        ageErr = false;
    }

    if (file.value) {
        var fsize = file.files.item(0).size;
        var filesize = Math.round((fsize / 1024));
    }
    if(file.value == '') {
        printError("fileErr", "Please choose your file");
    } else if(!allowedExtensions.exec(file.value)) {
        printError("fileErr", "Invalid file type");
    } else if (filesize > 1024) {
        printError("fileErr", "File too big, please select a file lesser than 1 mb");
    } else {
        printError("fileErr", "");
        fileErr = false;
    }

    if(games.length == 0) {
        printError("gameErr", "Please select game");
    } else {
        printError("gameErr", "");
        gameErr = false;
    }

    
    if((nameErr || passErr || addErr || ageErr || genderErr  || fileErr || gameErr) == true) {
        return false;
     } else {
         // Creating a string from input data for preview
        //  var dataPreview = "You've entered the following details: \n" +
        //                    "Full Name: " + username.value + "\n" +
        //                    "password: " + password.value + "\n" +
        //                    "address: " + address.value + "\n" +
        //                    "gender: " + gender.value + "\n" +
        //                    "age: " + age.value + "\n";
        //  if(games.length) {
        //      dataPreview += "games: " + games.join(", ");
        //  }
        //  // Display input data in a dialog box before submitting the form
        //  alert(dataPreview);
         return true;
     }

}