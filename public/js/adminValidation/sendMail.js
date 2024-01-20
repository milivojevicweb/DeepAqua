$(document).ready(function() {
    $(document).on('keyup','input,textarea',checkParam);
    editor.editing.view.document.on( 'keydown',checkParam);

});

function checkParam(){
    var subject=$("#subject").val();
    var text=editor.getData();
    var email=$("#email").val();
    var reEmail=/^\w+([.-]?[\w\d]+)*@\w+([.-]?[\w]+)*(\.\w{2,4})+$/;
    var reText=/[a-z]/;
    var status=true;
    var button=$("#sendButton");

    if(subject == "") {
        status = false;
        error("#subject");

    } else if(!reText.test(subject)) {
        status = false;
        error("#subject");
    } else {
        success("#subject");
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

    if(text==""){
        status = false;
        error(".ck.ck-editor__main>.ck-editor__editable:not(.ck-focused)");
    }else{
        success(".ck.ck-editor__main>.ck-editor__editable:not(.ck-focused)");
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
