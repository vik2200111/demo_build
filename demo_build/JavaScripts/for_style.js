const menu = document.getElementById("top");
const logo = document.getElementById("logo");
const bars = document.getElementById("main-bar");
const title = document.getElementById("title");

window.onscroll = function(e){
    if(window.scrollY>0){
        menu.classList.add("top__scrolled");
        logo.src = "/resources/logos/logo.png";
        bars.style.backgroundColor = "black";
        title.style.color = "#000";
    }
    else{
        menu.classList.remove("top__scrolled");
        logo.src = "/resources/logos/logo-white.png";
        title.style.color = "#fff";
        bars.style.backgroundColor = "#fff";
    }
}