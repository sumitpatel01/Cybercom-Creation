
var email = document.getElementById('email');
var password = document.getElementById('password');
var adminRecord = [];



function register(){
    window.location.href = 'registration.html'
}

function login(){
    if(localStorage.getItem("admin")){
		adminRecord = JSON.parse(localStorage.getItem('admin'));

		let admin_email = email.value;
        let admin_password = password.value;
        
        console.log("success")

		for (let el in adminRecord) {

			if (admin_email === adminRecord[el].email) {
				if(admin_password === adminRecord[el].password){
					sessionStorage.setItem("admin",JSON.stringify(adminRecord));
					window.location.href = 'Dashboard.html';
                }
                else{
                    alert("not registered");
                }
            }
            else{
                alert("not registered");
            }
        }

    }
}



