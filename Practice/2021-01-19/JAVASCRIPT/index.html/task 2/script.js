var obj = function(name,age,email,telephoneNumber){
    this.name = name;
    this.age = age;
    this.email = email;
    this.telephoneNumber = telephoneNumber;
}

var smit = new obj('smit',20,'smit@gmail.com',8849364239);
var sumit = new obj('sumit',21,'sumit@gmail.com',8849364239);
var jemish = new obj('jemish',22,'jemish@gmail.com',8849364239);
var jinay = new obj('jinay',21,'jinay@gmail.com',8849364239);

console.log(smit);


// store object in localstorage
localStorage.setItem('smit', JSON.stringify(smit));

var array=[smit,sumit,jemish,jinay];

// store array in local storage
localStorage.setItem("array", JSON.stringify(array));


document.write("<table><thead><tr><td><b>Name</td><td><b>Age</td><td><b>E-mail</td><td><b>Phone Number</td></tr></thead><tbody>");

for(let i = 0; i < array.length; i++) {

        document.write(`<tr><td><b>${array[i].name}</td><td><b>${array[i].age}</td><td><b>${array[i].email}</td><td><b>${array[i].telephoneNumber}</td></tr><br>`);
    }


document.write("</tbody></table>");

