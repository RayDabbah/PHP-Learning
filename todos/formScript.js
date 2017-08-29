var logIn = document.getElementById('login');
var newUserForm = document.getElementById('newUserForm');
var loginMessage = document.getElementById('loginMessage');
var pass = document.getElementById('password');
var confirmPass = document.getElementById('Confirmpassword');
var errorMess = document.getElementById('error');
var confirmPassLabel = document.querySelector('label[for=Confirmpassword]');
var header = document.getElementById('header');
var submit = document.querySelector('input[type=submit]');
var toggle = false;

// Make sure that password confirm is the same as password

newUserForm.addEventListener('submit', (e) => {
    if (pass.value != confirmPass.value && !toggle) {
        errorMess.textContent = 'Passwords do not match!';
        e.preventDefault();
    }
})

// Toggle form for new and returning users

logIn.addEventListener('click', () => {
    if (!toggle) {
        header.textContent = 'Welcome back! Please enter your login information!';
        newUserForm.action = '/login';
        loginMessage.textContent = 'New guest? ';
        logIn.textContent = 'Click here to sign up!';
        confirmPass.type = 'hidden';
        confirmPass.value = pass.value;
        confirmPassLabel.style.display = 'none';
        errorMess.textContent = '';
        toggle = true;
    } else {
        confirmPass.value = '';
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

// Toggle submit disabled depending on whether the correct fields are filled out

submit.disabled = true;
newUserForm.addEventListener('input', listenerFunction);
login.addEventListener('click', listenerFunction);


function enableSubmit() {
    return Array.from(document.querySelectorAll('input')).every(input => {
        // console.log(input.value);
        return input.value;
    });
}

function listenerFunction() {
    // enableSubmit();
    if (toggle) confirmPass.value = pass.value;
    enableSubmit() ? submit.disabled = false : submit.disabled = true;
}
