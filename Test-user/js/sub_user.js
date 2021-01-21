const checkUserSession = function () {
	if(sessionStorage.getItem("user_details")){
		return true;
		
	}else{
		return false;
	}
}

if(checkUserSession()){
	var userArr = JSON.parse(sessionStorage.getItem('user_details'));
	
	const userName = document.getElementById('userName');
	const logout = document.getElementById('logout');

	const userNameValue = userArr['name'];
	userName.textContent = userNameValue;

}else{
	window.location.href = 'Login.html';
}


logout.addEventListener('click',function() {
	alert('You have sucessfully Logout');
	//userArr['logOutTime'] = new Date().toLocaleString();
	sessionStorage.removeItem("user_details");
	window.location.href = 'Login.html';
});