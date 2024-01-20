$(document).ready(function() {
    $(document).on('keyup','input',checkParam);
    $(document).on('change','select',checkParam);
});

function checkParam(){
    var name=$("#regName").val();
    var lastName=$("#regLastName").val();
    var email=$("#regEmail").val();
    var password=$("#regPassword").val();
    var repeatPassword=$("#repeatPassword").val();
    var level=$("#level");
    var key=$("#key").val();
    var button=$("#insertUser")
    var rePassword = /^(?=.*\d)(?=.*[A-zČĆŽŠĐčćžšđ])(?=.*[~!@#$%^&*<>?]).{6,}$/;
    var reName=/^[A-ZČĆŽŠĐ][a-zčćžšđ]{1,14}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{1,14})*$/;
    var reEmail=/^\w+([.-]?[\w\d]+)*@\w+([.-]?[\w]+)*(\.\w{2,4})+$/;

    var status=true;

    if(name == "") {
        status = false;
        error("#regName");

    } else if(!reName.test(name)) {
        status = false;
        error("#regName");
    } else {
        success("#regName");
    }

    if(lastName == "") {
        status = false;
        error("#regLastName");

    } else if(!reName.test(lastName)) {
        status = false;
        error("#regLastName");
    } else {
        success("#regLastName");
    }

    if(password == "") {
        error("#regPassword");
        status = false;
    } else if(!rePassword.test(password)) {
        error("#regPassword");
        status = false;
    } else {
        success("#regPassword");
    }

    if(email == "") {
        status = false;
        error("#regEmail");

    } else if(!reEmail.test(email)) {
        status = false;
        error("#regEmail");
    } else {
        success("#regEmail");
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

    if(level.val()==0){
        status = false;
        error("#level");
    }else{
        success("#level");
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
