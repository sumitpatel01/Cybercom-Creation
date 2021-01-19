// es5

// this is a function constructor
var person5 = function(name,yearOfBirth,job){
    this.name = name;
    this.yearOfBirth = yearOfBirth;
    this.job = job;
}


// adding mehtod to person5 
person5.prototype.calculateAge = function(){
    var age = new Date().getFullYear() -this.yearOfBirth;
        console.log(age);

        // create object of person5
var jemish = new person5('jemish',1998,'developer');      

  // es6

//   declared class and give basic property in constructor
class person6{
    constructor(name,yearOfBirth,job){
        this.name = name;
        this.yearOfBirth = yearOfBirth;
        this.job = job;
    }

    // method in class
    calculateAge(){
        var age = new Date().getFullYear() -this.yearOfBirth;
        console.log(age);
    }
     
    // static method
    static greeting(){
        console.log("hey there!");
    }
}

const smit = new person6('smit', 1999 ,'developer');

person6.greeting();