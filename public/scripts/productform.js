function submitForm(){
    if(validId() && validName() && validCategory() && validDescription()){
        return true;
    } 
    else{
        return false;
    }
}

function validId(){
    var pattern = /^PD([0-9]{3})/i;
    var name = document.getElementById('pid').value;
    if (pattern.test(name)){
        document.getElementById('pidv').innerHTML = '';
        return true;
    }
    else {
        document.getElementById('pidv').innerHTML = 'Invalid Id';
        return false;
    }
}

function validCategory(){
    var pattern = /^CT([0-9]{3})/i;
    var name = document.getElementById('pcname').value;
    if (pattern.test(name)){
        document.getElementById('pcnamev').innerHTML = '';
        return true;
    }
    else {
        document.getElementById('pcnamev').innerHTML = 'Invalid Id';
        return false;
    }
}

function validName(){
    var pattern = /^([a-zA-Z]{1,})/
    var name = document.getElementById('pname').value;
    if (pattern.test(name)){
        document.getElementById('pnamev').innerHTML = '';
        return true;
    }
    else {
        document.getElementById('pnamev').innerHTML = 'Invalid Name';
        return false;
    }
}



function validDescription(){
    var pattern = /^[a-zA-z0-9 ]{50,}$/m;
    var input = document.getElementById("pmessageArea").value;
    if(! pattern.test(input)){
        document.getElementById("pmessageAreav").innerHTML = "Description should be 50 characters long";
        return false;
    }
    else{
        document.getElementById("pmessageAreav").innerHTML = "";
        return true;
    }
}

document.getElementById("pid").addEventListener("keyup", validId)
document.getElementById("pcname").addEventListener("keyup", validCategory)
document.getElementById("pmessageArea").addEventListener("keyup", validDescription)
document.getElementById("pname").addEventListener("keyup", validName)



document.getElementById("admin_form").addEventListener("submit", submitForm)
