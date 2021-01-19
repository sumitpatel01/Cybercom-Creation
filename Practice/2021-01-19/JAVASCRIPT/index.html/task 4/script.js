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
	localStorage.setItem("Student",JSON.stringify(Student));
	window.location.href = 'view.html';
};

