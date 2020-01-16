var boxLogin = document.getElementById('box-login');
var boxRegis = document.getElementById('box-register');

window.onscroll = function() {scrollFunction()};
window.onclick = function(event) {
    if (event.target == boxLogin) {
        boxLogin.style.display = "none";
    }

    if (event.target == boxRegis) {
        boxRegis.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}



function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// when the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}