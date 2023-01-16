var mybutton = document.getElementById("myBtn");

window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        mybutton.style.transform = "scale(1)";
    } else {
        mybutton.style.transform = "scale(0)";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

window.addEventListener("load", function() {
    const loader = document.querySelector(".loader");
    loader.className += " hidden";
});