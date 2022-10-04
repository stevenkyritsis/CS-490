//User validation
var email = document.forms['form']['uname'];
var passwd = document.forms['form']['passwd'];

function validated(){
    let name = document.forms["form"]["uname"].value;
    let pass = document.forms["form"]["passwd"].value;
    if (name == "") {
        alert("Username must be filled out");
        return false;
    }
    
    if (name == "student" && pass == "password"){
        location.href = "/student.html";
        //return true;
    }
    else if (name == "teacher" && pass == "password"){
        location.href = "/teacher.html";
        //return true;
        log("true");
        console("message");
    }
    else{
        alert("Error! Incorrect username or password!");
        return false;
    }
}