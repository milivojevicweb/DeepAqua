$(document).ready(function() {
    $(document).on('keyup','.reset',checkResetPassword);
    $(document).on('keyup','.forgot',checkForgotPassword);
});

function checkResetPassword(){
    var password=$("#passwordReset").val();
    var repeatPassword=$("#passwordResetRepeat").val();
    var button=$("#resetPasswordButton")
    var rePassword = /^(?=.*\d)(?=.*[A-zČĆŽŠĐčćžšđ])(?=.*[~!@#$%^&*<>?]).{6,}$/;

    var status=true;

    if(password == "") {
        error("#passwordReset");
        status = false;
    } else if(!rePassword.test(password)) {
        error("#passwordReset");
        status = false;
    } else {
        success("#passwordReset");
    }

    if(repeatPassword == "" || repeatPassword!=password) {
        status = false;
        error("#passwordResetRepeat");
    } else if(!rePassword.test(repeatPassword) || repeatPassword!=password) {
        status = false;
        error("#passwordResetRepeat");
    } else if(rePassword.test(repeatPassword) && repeatPassword==password){
        success("#passwordResetRepeat");
    }

    if(status==false){
        $(button).prop( "disabled", true );
        $(button).addClass("buttonDisable");
    }else{
        $(button).prop( "disabled", false );
        $(button).removeClass("buttonDisable");
    }


}

function checkForgotPassword(){
    var email=$("#forgotEmail").val();
    var button=$("#forogtButton")
    var reEmail=/^\w+([.-]?[\w\d]+)*@\w+([.-]?[\w]+)*(\.\w{2,4})+$/;

    var status=true;

    if(email == "") {
        status = false;
        error("#forgotEmail");

    } else if(!reEmail.test(email)) {
        status = false;
        error("#forgotEmail");
    } else {
        success("#forgotEmail");
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

