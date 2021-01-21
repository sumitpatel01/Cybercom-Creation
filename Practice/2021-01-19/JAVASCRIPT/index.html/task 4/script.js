const person = function(name,email,dateOfBirth){
	this.name = name;
	this.email = email;
	this.dateOfBirth = dateOfBirth;
}

function storeData() {
	var x = document.getElementById('name').value;
    var y = document.getElementById('email').value;
    var z = document.getElementById('date').value;
	const Student = new person(x,y,z);
	var studentData = [{name:'sumit',email:'sumitpatel41306@gmail.com',dateOfBirth: '21/10/1999'}];
	studentData.push(Student);
	localStorage.setItem("studentData",JSON.stringify(studentData));
	window.location.href = 'view.html';
};

