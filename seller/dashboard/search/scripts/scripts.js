document.querySelectorAll(".txtb input").forEach(function (item) {
    item.addEventListener("focus", function(){
        this.classList.add("focus");
    });
});

document.querySelectorAll(".txtb input").forEach(function (i) {
    i.addEventListener("blur", function(){
        if (this.value == "")
            this.classList.remove("focus");
    });
});

var head = document.getElementById("navbar");
var navbarButtons = document.getElementsByClassName("navbar-buttons");
window.onscroll = function () { 
    if (window.scrollY >= 80 ) {
        head.style.backgroundColor = "white";
        head.style.boxShadow = '0 2.5px 10px rgba(0, 0, 0, 0.2)';
	head.style.borderBottom = "0";
	for (var i = 0; i < navbarButtons.length; i++) {
		navbarButtons[i].style.setProperty('color', '#1d1d1d', 'important');
		console.log(navbarButtons);
	}
    } 
    else {
        head.style.backgroundColor = "transparent";
        head.style.boxShadow = 'none';
	head.style.borderBottom = "1px solid #888";
 	for (var i = 0; i < navbarButtons.length; i++) {
		navbarButtons[i].style.setProperty('color', '#fafafa', 'important');
	}   
    }
};

var togglePassword = document.getElementById('togglePassword');
var password = document.getElementById('password');

togglePassword.addEventListener('click', function (e) {
    	// toggle the type attribute
    	var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    	password.setAttribute('type', type);
    	// toggle the eye slash icon
	this.classList.toggle('fa-eye-slash');
});

