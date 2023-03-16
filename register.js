
function check(){
    let adno1 = document.getElementById("adNo").value;
    let user1 = document.getElementById("user").value;
    let pass = document.getElementById("psw").value;
    let cnfpass = document.getElementById("repsw").value;
    if (adno1 == "" || user1 == "") {
        alert("All the fields must be filled");
        return false;
    }
    if(pass != cnfpass){
        alert("Password and Confirm Password are mismatched");
        return false;
    }
}
function myFunction() {
    var x = document.getElementById("psw");
    if (x.type === "password") {
        x.type = "text";
    }
    else {
        x.type = "password";
    }
}



