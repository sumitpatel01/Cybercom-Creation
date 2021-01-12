// objects and property

var john = {
    firstName : 'john',
    lastName : 'smith',
    birthYear : 1990,
    family : ['jane', 'mark','bob', 'emily'],
    job : 'teacher',
    ismarried : false,
    calcAge: function(){
        this.age = 2020 - this.birthYear;
        return this.age;
    }
};

// console.log(john.firstName);
// console.log(john['lastName']);
var x = 'birthYear';
// console.log(john[x]);

john.job = 'designer';
john['isMarried'] = true;
// console.log(john);

var jane = new Object();
jane.name = 'jane';
jane.birthYear = 1969;
jane.lastName = 'smith';
// console.log(jane);

// object and methods
john.calcAge();
// john.age = john.calcAge();
// console.log(john.calcAge());
console.log(john);