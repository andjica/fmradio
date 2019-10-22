document.getElementById('sendMessageButton').addEventListener('click',function(e){



    let mail = document.getElementById('tbEmail');
    let regMail = /^[\w\-.+_%]+@[\w\.\-]+\.[A-Za-z0-9]{2,}$/;
    let mistakeMail = document.getElementById('email-miss');

    let password = document.getElementById('tbPassword');
    let regPassword =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
    let mistakePassword = document.getElementById('pass-miss');

    let errors = [];



    //checking Email
    if(!regMail.test(mail.value)){

        mistakeMail.innerHTML="Your email is not in right format";
        mistakeMail.style.color="red";
        errors.push('Los mail');
    }
    else
    {
        mistakeMail.innerHTML="Vas email je u dobrom formatu";
        mistakeMail.style.color="blue";

    }

    //checking Password 
    if(!regPassword.test(password.value)){

        mistakePassword.innerHTML="Password is not correct";
        mistakePassword.style.color="red";
        errors.push('Los password');
    }
    else
    {
        mistakePassword.innerHTML="Vas password je u dobrom formatu";
        mistakePassword.style.color="blue";
    }

 

    

    if(errors.length!=0){

        e.preventDefault();
    }






});