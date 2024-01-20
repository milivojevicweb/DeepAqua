$(document).ready(function() {
    $(document).on('keyup','input',checkService);
    $(document).on('change','#profilePhoto',checkService);
});


function checkService(){
    var profilePhoto=$('#profilePhoto').val();
    var text=$('#galleryName').val();
    var button=$("#submit");
    var reText=/[a-z]/;

    valid=true;

    if(profilePhoto == "") {
        valid = false;
        error("#imageButton");
    }else {
        success("#imageButton");

    }


    if(text == "") {
        valid = false;
        error("#galleryName");
    }else if(!reText.test(text)) {
        valid = false;
        error("#galleryName");
    }else {
        success("#galleryName");
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
