// hoisting
function calculateAge(year){
    console.log(2020 - year);
}

calculateAge(1999);

// retirement(1999);

var retirement = function(year){
    console.log(65 - (2020-year));
}

retirement(1999);

// variables

var age =21;
console.log(age);

function foo(){
    console.log(age);
    var age =65;
    console.log(age);
}
foo();
console.log(age);