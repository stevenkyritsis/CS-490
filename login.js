//User validation
var email = document.forms['form']['uname'];
var passwd = document.forms['form']['passwd'];

var email_error = document.getElementById('uname_error');
var passwd_error = document.getElementById('passwd_error');

function validated(){
    let name = document.forms["form"]["uname"].value;
    let pass = document.forms["form"]["passwd"].value;
    if (name == "") {
        alert("Username must be filled out");
        return false;
    }
    
    if (name == "student" && pass == "password"){
        location.replace("/student.html");
        //return true;
    }
    else if (name == "teacher" && pass == "password"){
        location.replace("/teacher.html");
        //return true;
        log("true");
        console("message");
    }
    else{
        alert("Error! Incorrect username or password!");
        return false;
    }
}