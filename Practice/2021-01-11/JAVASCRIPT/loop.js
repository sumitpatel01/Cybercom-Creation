var firstName = "john";
var civilStatus = "single";
var age = 16;

if (civilStatus === "married") {
   console.log(firstName + "is married"); 
}else{
    console.log(firstName + " ")
}

if (age < 13) {
    console,log(firstName + ' is a boy');   
} else if(age >= 13 && age < 20) {
    console.log(firstName + ' is a teenager');   
} else if(age >= 20 && age < 30) {
    console.log(firstName + ' is a young man');   
} else{
    console.log(firstName + ' is a man');
}

// ternary operatot and switch statement
age >=18 ? console.log(firstName + ' is a man') : console.log(firstName + ' is a man');