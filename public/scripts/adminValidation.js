function validateForm(){
    if (nameValidation() && detailValidation()){
        return true;
    }
    else{
        return false;
    }
}

function nameValidation(){
    var pattern = /^([a-zA-Z]{1,})/
    var name = document.getElementById('postTitle').value;
    if (pattern.test(name)){
        document.getElementById('titleText').innerHTML = '';
        return true;
    }
    else {
        document.getElementById('titleText').innerHTML = 'Invalid Name';
        return false;
    }
}
function detailValidation(){
    var pattern = /.{10,}/
    var name = document.getElementById('editor').value;
    if (pattern.test(name)){
        document.getElementById('editorText').innerHTML = '';
        return true;
    }
    else {
        document.getElementById('editorText').innerHTML = 'Text should be atleast 50 characters';
        return false;
    }
}