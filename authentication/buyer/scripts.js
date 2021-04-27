var freelancerForm = document.getElementById('freelancerForm');
var clientForm = document.getElementById('clientForm');

window.onload = function() {
	clientForm.value = "";
	freelancerForm.value = "";
}

var client = document.getElementById('Client');

client.addEventListener('click', function() {
        this.classList.toggle('active');
	if (clientForm.value === "" || clientForm.value === "false")
		clientForm.value = "true";	
	else
		clientForm.value = "false";
});

var freelancer = document.getElementById('Freelancer');

freelancer.addEventListener('click', function() {
        this.classList.toggle('active');
	if (freelancerForm.value === "" || freelancerForm.value === "false")
		freelancerForm.value = "true";
	else
		freelancerForm.value = "false";
});

const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function (e) {
    	// toggle the type attribute
    	const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    	password.setAttribute('type', type);
    	// toggle the eye slash icon
	this.classList.toggle('fa-eye-slash');
});

/*
$(document).ready(function() {
    console.log("test");
    $("#daftar-form").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.
    
        var form = $(this);
        
        $.ajax({
               type: "POST",
               url: 'http://jobdesktop.com:8080/api/contacts',
               data: form.serialize(), // serializes the form's elements.
               success: function (data) {
                   window.location.href = "https://jobdesktop.com/dashboard";
                },
                error: function (data) {
                        console.log('An error occurred.');
                        console.log(data);
                }
             });
    
        
    });
})
*/
