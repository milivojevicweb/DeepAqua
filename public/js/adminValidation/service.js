$(document).ready(function() {
    $(document).on('keyup','input',checkService);
    $(document).on('change','#profilePhoto',checkService);
});


function checkService(){
    var profilePhoto=$('#profilePhoto').val();
    var name=$('#serviceName').val();
    var text=$('#serviceText').val();
    var price=$('#servicePrice').val();
    var button=$("#submit");
    var reText=/[a-z]/;
    var rePrice=/[a-z]/;

    valid=true;

    if(profilePhoto == "") {
        valid = false;
        error("#imageButton");
    }else {
        success("#imageButton");

    }


    if(name == "") {
        valid = false;
        error("#serviceName");

    }else if(!reText.test(name)) {
        valid = false;
        error("#serviceName");
    }else {
        success("#serviceName");
    }

    if(text == "") {
        valid = false;
        error("#serviceText");
    }else if(!reText.test(text)) {
        valid = false;
        error("#serviceText");
    }else {
        success("#serviceText");
    }

    if(price == "") {
        valid = false;
        error("#servicePrice");
    }else if(!rePrice.test(price)) {
        valid = false;
        error("#servicePrice");
    }else {
        success("#servicePrice");
    }


    if(valid==false){
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
