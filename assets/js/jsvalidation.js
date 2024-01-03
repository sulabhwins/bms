function validateForm() {
var name = document.getElementById('name').value;
var email = document.getElementById('email').value;
var phone = document.getElementById('phone').value;
var password = document.getElementById('password').value;
var namePattern = /^[A-Z][A-Za-z\s]+$/;
var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
var phonePattern = /^[1-9][0-9]{9}$/;
var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{}|;':",.<>?\/])[A-Za-z\d!@#$%^&*()_+\-=\[\]{}|;':",.<>?\/]{6,}$/;
document.getElementById('nameError').innerHTML = '';
document.getElementById('emailError').innerHTML = '';
document.getElementById('phoneError').innerHTML = '';
document.getElementById('passwordError').innerHTML = '';

if (!namePattern.test(name)) {
    document.getElementById('nameError').innerHTML = 'Please enter a valid name.';
    return false;
}
if (!emailRegex.test(email)) {
    document.getElementById('emailError').innerHTML = 'Please enter a valid email address.';
    return false;
}
if (!phonePattern.test(phone)) {
    document.getElementById('phoneError').innerHTML = 'Please enter a valid Phone Number.';
    return false;
}
if (!passwordRegex.test(password)) {
    document.getElementById('passwordError').innerHTML = 'Please enter a valid Password.';
    return false;
}
return true;
}