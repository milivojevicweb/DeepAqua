$(document).ready(function() {
    $(document).on('keyup','input',checkParam);
});

function checkParam(){
    var name=$("#name").val();
    var lastName=$("#lastName").val();
    var email=$("#email").val();
    var password=$("#password").val();
    var repeatPassword=$("#repeatPassword").val();
    var key=$("#key").val();
    var button=$("#submit")
    var rePassword = /^(?=.*\d)(?=.*[A-zČĆŽŠĐčćžšđ])(?=.*[~!@#$%^&*<>?]).{6,}$/;
    var reName=/^[A-ZČĆŽŠĐ][a-zčćžšđ]{1,14}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{1,14})*$/;
    var reEmail=/^\w+([.-]?[\w\d]+)*@\w+([.-]?[\w]+)*(\.\w{2,4})+$/;

    var status=true;

    if(name == "") {
        status = false;
        error("#name");

    } else if(!reName.test(name)) {
        status = false;
        error("#name");
    } else {
        success("#name");
    }

    if(lastName == "") {
        status = false;
        error("#lastName");

    } else if(!reName.test(lastName)) {
        status = false;
        error("#lastName");
    } else {
        success("#lastName");
    }

    if(password == "") {
        error("#password");
        status = false;
    } else if(!rePassword.test(password)) {
        error("#password");
        status = false;
    } else {
        success("#password");
    }

    if(email == "") {
        status = false;
        error("#email");

    } else if(!reEmail.test(email)) {
        status = false;
        error("#email");
    } else {
        success("#email");
    }


    if(repeatPassword == "" || repeatPassword!=password) {
        status = false;
        error("#repeatPassword");
    } else if(!rePassword.test(repeatPassword) || repeatPassword!=password) {
        status = false;
        error("#repeatPassword");
    } else if(rePassword.test(repeatPassword) && repeatPassword==password){
        success("#repeatPassword");
    }

    if(key == "") {
        status = false;
        error("#key");
    } else {
        success("#key");
    }

    if(status==false){
        $(button).prop( "disabled", true );
        $(button).addClass("buttonDisable");
    }else{
        $(button).prop( "disabled", false );
        $(button).removeClass("buttonDisable");
    }



}

function error(name){
    $(name).addClass("errorReg");
    $(name).removeClass("successReg");
}

function success(name){
    $(name).removeClass("errorReg");
    $(name).addClass("successReg");
}
