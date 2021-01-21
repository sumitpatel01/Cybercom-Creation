var person = function(name,email,password,dateOfBirth){
	this.name = name;
    this.email = email;
    this.password = password
    this.dob = dateOfBirth;
    this.age = 23;

}

var checkBirthday = function(birthDate){
	var birthdayPerson = birthDate.map((el) =>{
		let today = new Date();
		let dd = String(today.getDate()).padStart(2, '0');
		let mm = String(today.getMonth() + 1).padStart(2, '0');
		let yyyy = today.getFullYear();
		today = yyyy + '-' + mm + '-' + dd;
		if(today === el){
			return true;
		}else{
			return false;
		}
	});
	return birthdayPerson;
}

var adminSessionCheck = function () {
	if(sessionStorage.getItem("admin")){
		return true;
		
	}else{
		return false;
	}
}

function logout(){
    alert('You have sucessfully Logout');
	sessionStorage.removeItem("admin");
    window.location.href = 'Login.html';
}

function storeData() {
    var arrayUsers = [];
	var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var dob = document.getElementById('date').value;

    if(localStorage.getItem('arrayUsers'))
	{
		arrayUsers = JSON.parse(localStorage.getItem('arrayUsers'));
    }
    
    var user = new person(name,email,password,dob);
    arrayUsers.push(user);
	localStorage.setItem("arrayUsers",JSON.stringify(arrayUsers));
    
    var showUserData = '';
    if(localStorage.arrayUsers){
    let data = JSON.parse(localStorage.arrayUsers);
    
	for (let el in data) {
		showUserData += `<tr style= 'border : 1px solid black;'><td style= 'border : 1px solid black;'>${data[el].name}</td><td>${data[el].email}<td>${data[el].password}</td><td>${data[el].dob}</td><td>${data[el].age}</td><td><input type="button" id="edit" value="Edit" class="edit" onclick="edit_row(${el})"><input type="button" id="delete" value="delete" class="delete" onclick="delete_row(${el})"></td></tr></thead>`;
        
        }
    }
    document.querySelector('#table').innerHTML = "<table style= 'border : 1px solid black;'><thead><tr><td><b>Name</td><td><b>Email</td><td><b>Password</td><td><b>Birthdate</td><td><b>Age</td><td><b>Action</td></tr></thead><tbody>" + showUserData;   
}
;

function delete_row(id){
    console.log(arrayUsers);
    arrayUsers.splice(id, 1);
    localStorage.setItem("arrayUsers",JSON.stringify(arrayUsers));
    alert('User Delete Sucessfully');
    window.location.href = 'User.html';
}
function edit_row(id){

}