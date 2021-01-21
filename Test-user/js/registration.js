function validateform(){  
   
    var name = document.forms["registrationForm"]["namel"].value;              
    var email = document.forms["registrationForm"]["email"].value;    
    var password = document.forms["registrationForm"]["password"].value;  
    var confirmpassword= document.forms["registrationForm"]["confirm_password"].value;  

    console.log(name)

    if (name == "")                                   
    { 
      document.getElementById('name_alert').innerHTML="** please enter a name.";
        return false; 
    } 

    if (email == "")                                   
    { 
      document.getElementById('password_alert').innerHTML="** please enter an email address.";
        return false; 
    } 
    if (password == "" )                                   
    { 
      document.getElementById('confirm_alert').innerHTML="** please enter an password";
        return false; 
    } 
    if (confirmpassword == "")                                   
    { 
      
      document.getElementById('confirm_alert').innerHTML="** please enter an password";
        return false; 
    } 

   
    if (email.indexOf("@") < 0)                 
    {   
        document.getElementById('email_alert').innerHTML="** Please enter a valid e-mail address."; 
        return false; 
    } 

    if (email.lastIndexOf(".") < email.length-2)                 
    { 
        document.getElementById('email_alert').innerHTML ="** Please enter a valid e-mail address.";  
        return false; 
    }

    document.getElementById('pass1').innerHTML="";


    if (password.length<6)                        
    { 
        document.getElementById('pass2').innerHTML="** Password must contain 6 characters"; 
        return false; 
    }
    document.getElementById('pass2').innerHTML="";


    if (password.value!=confirmpassword.value)                        
    { 
        document.getElementById('pass3').innerHTML="** Password and confirmpassword must be same"; 
        return false; 
    }
    document.getElementById('success').innerHTML="form valid"; 
    alert("form valid");
}
   
    
