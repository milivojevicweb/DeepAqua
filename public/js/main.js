$(document).ready(function(){
    window.onscroll = function() {scrollFunction()};
    currentYear();

})

function scrollFunction() {

    if(220<document.body.scrollTop||200<document.documentElement.scrollTop){
        document.querySelector("header").style.position="fixed";
        document.querySelector("header").style.backgroundColor="#090909";
        document.querySelector("header").style.boxShadow="0 0 10px rgba(0,0,0,.8)";
        document.querySelector("header").style.marginTop="0px"
        document.querySelector("header").style.padding="9px 0px 2px 0px";
        document.querySelector("#headerLinks").style.marginTop="1px";
        document.querySelector("#logo img").style.width="60px";

    }else{
        document.querySelector("header").style.position="absolute";
        document.querySelector("header").style.backgroundColor="transparent";
        document.querySelector("header").style.boxShadow="none";
        document.querySelector("header").style.marginTop="35px"
        document.querySelector("header").style.padding="0px";
        document.querySelector("#headerLinks").style.marginTop="0px";
        if ($(window).width() < 960) {
            document.querySelector("#logo img").style.width="75px";
        }else{
            document.querySelector("#logo img").style.width="85px";
        }

    }

}

$(window).scroll(function(){
    var skrolovano = $(this).scrollTop();
    if(skrolovano > 700){
    $('#scrollToTop').fadeIn();
    } else {
    $('#scrollToTop').fadeOut();
    }
});

$('#scrollToTop').click(function(){
    $('html').animate({scrollTop: 0}, 2000);
});

function currentYear(){
    var date= new Date();
    var year=date.getFullYear();
    $("#year").html(year);
}
