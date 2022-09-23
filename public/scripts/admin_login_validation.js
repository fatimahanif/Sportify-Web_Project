function submitForm(){
    if(validuser() && validPass()){
        return true;
    } 
    else{
        return false;
    }
}

function validuser(){
    var pattern = /^([a-zA-Z]{1,})/
    var name = document.getElementById('userName').value;
    if (pattern.test(name)){
        document.getElementById('userValid').innerHTML = '';
        return true;
    }
    else {
        document.getElementById('userValid').innerHTML = 'Invalid Username';
        return false;
    }
}

function validPass(){
    var pattern = /(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}/g
    var name = document.getElementById('password').value;
    if (pattern.test(name)){
        document.getElementById('passValid').innerHTML = '';
        return true;
    }
    else {
        document.getElementById('passValid').innerHTML = 'Invalid Password';
        return false;
    }
}

document.getElementById("userName").addEventListener("keyup", validuser)
document.getElementById("password").addEventListener("keyup", validPass)
document.getElementById("admin_form").addEventListener("submit", submitForm)
