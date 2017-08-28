var logIn = document.getElementById('login');
var newUserForm = document.getElementById('newUserForm');
var loginMessage = document.getElementById('loginMessage');
var toggle = false;
var pass = document.getElementById('password');
var confirmPass = document.getElementById('Confirmpassword');
var errorMess = document.getElementById('error');
var confirmPassLabel = document.querySelector('label[for=Confirmpassword]');
var header = document.getElementById('header');
var submit = document.querySelector('input[type=submit]');
newUserForm.addEventListener('submit', (e) => {
    if (pass.value != confirmPass.value && !toggle) {
        errorMess.textContent = 'Passwords do not match!';
        e.preventDefault();
    }
})


logIn.addEventListener('click', () => {
    if (!toggle) {
        header.textContent = 'Welcome back! Please enter your login information!';
        newUserForm.action = '/login';
        loginMessage.textContent = 'New guest? ';
        logIn.textContent = 'Click here to sign up!';
        confirmPass.type = 'hidden';
        confirmPassLabel.style.display = 'none';
        errorMess.textContent = '';
        toggle = true;
    } else {
        header.textContent = 'Sign up';
        newUserForm.action = '/signup';
        loginMessage.textContent = 'Already a member?';
        logIn.textContent = 'Click here to log in';
        confirmPass.type = 'password';
        confirmPassLabel.style.display = 'block';
        errorMess.textContent = '';
        toggle = false;
    }
})
// console.log(document.querySelectorAll('input'));
submit.disabled = true;
newUserForm.addEventListener('input', () => {
    // enableSubmit();
    if (toggle) confirmPass.value = pass.value;
    enableSubmit() ? submit.disabled = false : submit.disabled = true;
});

function enableSubmit() {
    return Array.from(document.querySelectorAll('input')).every(input => {
        // console.log(input.value);
        return input.value;
    });
}

