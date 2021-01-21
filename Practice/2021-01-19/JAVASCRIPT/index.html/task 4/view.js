var showData = '';
if(localStorage.studentData){
	let data = JSON.parse(localStorage.studentData);
	console.log(data);
	for (let el in data) {
		console.log(el);
			showData += `<b>Name</b>&nbsp:&nbsp${data[el].name}<br><b>E-mail</b>&nbsp:&nbsp${data[el].email}<br><b>DOB</b>&nbsp:&nbsp${data[el].dateOfBirth}<br>`;
	}
}
document.querySelector('#container').innerHTML = showData;