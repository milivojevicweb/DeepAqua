$(document).ready(function() {
    $(document).on('keyup','input,textarea',checkContact);
});

function checkContact(){
    var name=$('#nameLastName').val();
    var email=$('#email').val();
    var text=$('#contactTextarea').val();
    var button=$("#sendMessage")

    var reName=/^[A-ZŽŠĐČĆ][a-zžšđčć]{1,30}\s[A-ZŽŠĐČĆ][a-zžšđčć]{1,30}$/;
    var reEmail=/^\w+([.-]?[\w\d]+)*@\w+([.-]?[\w]+)*(\.\w{2,4})+$/;

    var status=true;

    if(text == "") {
      status = false;
      error("#contactTextarea");
    } else {
      success("#contactTextarea");

    }

    if(name == "") {
      status = false;
        error("#nameLastName");

    } else if(!reName.test(name)) {
      status = false;
        error("#nameLastName");
    } else {
        success("#nameLastName");
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


