
// loops and iteration

// for

for (let i = 0; i < 10; i++) {
    //  console.log(i);
}

var john = [ 'john', 'smith', 1990, 'designer', false, 'blue'];

// console.log(john[1]);

for(var i = 0 ; i < john.length ; i++ ) {
    // console.log(john[i]);
}

// while loop

var i = 0;
while(i < john.length){
    // console.log(john[i]);
    i++;
}

// continue
for (let i = 0; i < 10; i++) {
    if(typeof john[i] !== 'string')
    continue;
    // console.log(john[i]);
}

// break
for (let i = 0; i < 10; i++) {
    if(typeof john[i] !== 'string')
    break;
    // console.log(john[i]);
}

// backward loop

for (let i = john.length - 1; i >= 0; i--) {
    console.log(john[i]);
    
}

