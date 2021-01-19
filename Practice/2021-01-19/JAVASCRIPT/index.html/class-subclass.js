// es5

var person5 = function(name,yearOfBirth,job){
    this.name = name;
    this.yearOfBirth = yearOfBirth;
    this.job = job;
}

person5.prototype.calculateAge = function(){
    var age = new Date().getFullYear() -this.yearOfBirth;
        console.log(age);

  var jemish = new person5('jemish',1998,'developer');      

  var Athelete5 = function (name,yearOfBirth,job,olympicGames,medals){
      person5.call(this,name,yearOfBirth,job);
      this.olympicGames = olympicGames;
      this.medals = medals
  }

  Athelete5.prototype = Object.create(person5.prototype);

  Athelete5.prototype.wonMedal = function () {
      this.medals++;
      console.log(this.medals);
  }

  var jemishAthlete5 = new('jemish',1998,'speaker',3,10);

  jemishAthlete5.calculateAge();
  jemishAthlete5.wonMedal();

// es6

class person6{
    constructor(name,yearOfBirth,job){
        this.name = name;
        this.yearOfBirth = yearOfBirth;
        this.job = job;
    }

    calculateAge(){
        var age = new Date().getFullYear() -this.yearOfBirth;
        console.log(age);
    }
     
    static greeting(){
        console.log("hey there!");
    }
}

// create instanceof person6
const smit = new person6('smit', 1999 ,'developer');

person6.greeting();

// extends class from person6
class Athlete6 extends person6{
    constructor(name,yearOfBirth,job,olympicGames,medals){
        // inherit from the super class
        super(name,yearOfBirth,job);
        this.olympicGames = olympicGames;
        this.medals = medals;
    }

    // defined method in this class
    wonMedal(){
        this.medals++;
        console.log(this.medals);

    }
}

// create instance of the Athlete6
const  smitAthlete6 = new Athlete6('smit', 1999 ,'runner',4,11);

smitAthlete6.wonMedal();
smitAthlete6.calculateAge();