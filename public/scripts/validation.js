function validateEmail(){
    var pattern = /^.+[@]{1}.+[\.]{1}.{2,}$/;
    var input = document.getElementById("email").value;
    if(! pattern.test(input)){
        document.getElementById("emailValidator").innerHTML = "Invalid Email";
        return false
        // alert("jkj");
        
    }
    else{
        document.getElementById("emailValidator").innerHTML = "";
        return true
       
    }
}

function submitForm(){
    // console.log(validateEmail())
    if(validateEmail()){
       location.reload()
    }
    else{
        document.getElementById("emailValidator").innerHTML = "Invalid Email";
    }
}

document.getElementById("email").addEventListener("keyup", validateEmail)
document.getElementById("submit-contact-form").addEventListener("click", submitForm)


