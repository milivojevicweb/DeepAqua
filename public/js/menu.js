$(document).ready(function(){
    $(document).on("click","#hamburger",openNav);
    $(document).on("click",".closebtn",closeNav);
})

function openNav() {
    document.getElementById("myNav").style.width = "100%";
    document.getElementById("myNav").style.display = "block";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
