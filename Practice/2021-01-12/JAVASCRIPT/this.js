// console.log(this)

// function calculateAge(year){
//     console.log(2020 - year);
//     console.log(this);
// }

// calculateAge(1999);

var john={
    name : 'john',
    yearOfBirth : 1990,
    calculateAge: function(){
        console.log(this);
        console.log(2020 - this.yearOfBirth);

        // function innerFunction(){
        //     console.log(this);
        // }
        // innerFunction();
    }
}

john.calculateAge();

var mike = {
    name : 'mike',
    yearOfBirth : 1984,
}

mike.calculateAge = john.calculateAge;
mike.calculateAge();