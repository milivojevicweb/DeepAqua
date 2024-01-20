$(document).ready(function() {
    $(document).on('keyup','input',checkParam);
    $(document).on('change','select',checkParam);
});

function checkParam(){
    var name=$("#regName").val();
    var lastName=$("#regLastName").val();
    var email=$("#regEmail").val();
    var level=$("#level");
    var button=$("#editUser")
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

    if(email == "") {
        status = false;
        error("#regEmail");

    } else if(!reEmail.test(email)) {
        status = false;
        error("#regEmail");
    } else {
        success("#regEmail");
    }

    if(level.val()==0){
        status = false;
        error("#level");
    }else{
        success("#level");
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
