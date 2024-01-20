$(document).ready(function() {
    $(document).on('keyup','input,textarea',checklogin);
});

function checklogin(){
    var email=$('#email').val();
    var password = $('#password').val();
    var button=$("#loginButton")

    var reEmail=/^\w+([.-]?[\w\d]+)*@\w+([.-]?[\w]+)*(\.\w{2,4})+$/;
    var rePassword = /^(?=.*\d)(?=.*[A-zČĆŽŠĐčćžšđ])(?=.*[~!@#$%^&*<>?]).{6,}$/;
    var status=true;


    if(email == "") {
      status = false;
        error("#email");

    } else if(!reEmail.test(email)) {
      status = false;
        error("#email");
    } else {
        success("#email");
    }

    if(password == "") {
        status = false;
          error("#password");

      } else if(!rePassword.test(password)) {
        status = false;
          error("#password");
      } else {
          success("#password");
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


function successData(){
    $("#info").html("<div id='notification' class='notificationColorGreen'>Successfully!</div>");
    setTimeout(function() {
        $("#notification").hide(500);
    }, 3000);
}
