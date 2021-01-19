var showData = '';
if(localStorage.Student){
	let data = JSON.parse(localStorage.Student);
	for (let el in data) {
		showData += `<b>${el}</b>&nbsp:&nbsp${data[el]}<br>`;
	}
}
document.querySelector('#container').innerHTML = showData;