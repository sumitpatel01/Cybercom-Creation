var person = function(name,email,password,dateOfBirth){
	this.name = name;
    this.email = email;
    this.password = password
    this.dob = dateOfBirth;
    this.age = 23;
}

function storeData() {
    var arrayAdmin = [];
	var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var dob = document.getElementById('date').value;

    if(localStorage.getItem('arrayAdmin'))
	{
		arrayAdmin = JSON.parse(localStorage.getItem('arrayAdmin'));
    }
    
    var user = new person(name,email,password,dob);
    arrayAdmin.push(user);
	localStorage.setItem("arrayAdmin",JSON.stringify(arrayAdmin));
    
    var showUserData = '';
    if(localStorage.arrayAdmin){
    let data = JSON.parse(localStorage.arrayAdmin);
    
	for (let el in data) {
		showUserData += `<tr style= 'border : 1px solid black;'><td style= 'border : 1px solid black;'>${data[el].name}</td><td>${data[el].email}<td>${data[el].password}</td><td>${data[el].dob}</td><td>${data[el].age}</td><td><a onclick="updateData(this)">Edit</a><a  onclick="deleteData(this)">delete</a></td></tr></thead>`;
	}
}
document.querySelector('#table').innerHTML = "<table style= 'border : 1px solid black;'><thead><tr><td><b>Name</td><td><b>Email</td><td><b>Password</td><td><b>Birthdate</td><td><b>Age</td><td><b>Action</td></tr></thead><tbody>" + showUserData;
};

function updateData(data){
    document.getElementById(addUser).innerHTML = "Update User";
    console.log('hi');
}