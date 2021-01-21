let checkBirthday = function(birthDate){
	let today = new Date();
	let dd = String(today.getDate()).padStart(2, '0');
	let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	let yyyy = today.getFullYear();
	today = yyyy + '-' + mm + '-' + dd;
	if(today === birthDate){
		return true;
	}else{
		return false;
	}
}

const checkUserSession = function () {
	if(sessionStorage.getItem("userArray")){
		return true;
		
	}else{
		return false;
	}
}

if(checkUserSession()){
	var userArray = JSON.parse(sessionStorage.getItem('userArray'));
	
	const userName = document.getElementById('userName');
	const birthDayMessage = document.getElementById('birthDay');

	const userNameValue = userArray['name'];
	userName.textContent = userNameValue;

	if(checkBirthday(userArray['birthDate'])){
		birthDayMessage.innerHTML ='Happy Birthday !';
	}

}else{
	window.location.href = 'Login.html';
}


function logout() {
	alert('You have sucessfully Logout');

	let userArr2 = JSON.parse(localStorage.getItem('userArray'));
	userArr2[userArr['id']]['logOutTime'] = new Date().toLocaleString();
	localStorage.setItem("userArray",JSON.stringify(userArr2));
	sessionStorage.removeItem("userArray");
	window.location.href = 'Login.html';
});
