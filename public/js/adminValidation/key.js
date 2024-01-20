$(document).ready(function() {
    $(document).on('keyup','input',checkParam);
});

function checkParam(){
    var key=$("#key").val();
    var reText=/[a-z]/;
    var button=$("#insertKey");
    var status=true;

    if(key == "") {
        status = false;
        error("#key");

    } else if(!reText.test(key)) {
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
