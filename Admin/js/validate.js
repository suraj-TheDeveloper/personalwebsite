function validatepassword(){
    var Password = document.getElementById('Password');
    var Confirm = document.getElementById('ConfirmPassword');

    var regex = /^[a-zA-Z0-9#@!%&_)(]{10,}$/gm;
    if(Password.match(regex) && Confirm.match(Password)){
        document.getElementById("password").innerHTML = "Ok";
        document.getElementById("confirm").innerHTML = "Matched";
        return true;
    } else {
        document.getElementById("password").innerHTML = "Password should be min 10 chars including special chars";
        document.getElementById("confirm").innerHTML = "Passwords Does not match";
        return false;
    }
}
