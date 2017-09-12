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
const allInputs = Array.from(document.querySelectorAll('input'));
var logInInputs;
var requiredInputs;
allInputs[0].focus();
// Make sure that password confirm is the same as password

newUserForm.addEventListener('submit', e => {
    if (pass.value != confirmPass.value && !toggle) {
        errorMess.textContent = 'Passwords do not match!';
        e.preventDefault();
    }
})

// Toggle form for new and returning users

toggleLogin(window.location.pathname === '/login');

logIn.addEventListener('click', () => {
    errorMess.textContent = '';
if(allInputs.slice(0, -1).every(input => !input.value)) allInputs[0].focus();
    toggleLogin(!toggle);
});


function toggleLogin(switchFormType) {
    if (switchFormType) {
        header.textContent = 'Welcome back! Please enter your login information!';
        newUserForm.action = '/login';
        loginMessage.textContent = 'New guest? ';
        logIn.textContent = 'Click here to sign up!';
        confirmPass.type = 'hidden';
        confirmPassLabel.style.display = 'none';
        logInInputs = allInputs.filter(field => field.type !== 'hidden');
        toggle = true;
    } else {
        header.textContent = 'Sign up';
        newUserForm.action = '/signup';
        loginMessage.textContent = 'Already a member?';
        logIn.textContent = 'Click here to log in';
        confirmPass.type = 'password';
        confirmPassLabel.style.display = 'block';
        logInInputs = '';
        toggle = false;
    }
}

// Toggle submit disabled depending on whether the correct fields are filled out

submit.disabled = true;
newUserForm.addEventListener('input', listenerFunction);
newUserForm.addEventListener('input', () => submit.disabled = false);
login.addEventListener('click', listenerFunction);

function enableSubmit() {
    return requiredInputs.every(input => {
        return input.value;
    });
}

function listenerFunction() {
    requiredInputs = logInInputs || allInputs;
    if (enableSubmit()) {
        newUserForm.removeEventListener('submit', noSubmit);
    } else {
        disableSubmit();
    }
}

function disableSubmit() {
    newUserForm.addEventListener('submit', noSubmit)
}
function noSubmit(e) {
    e.preventDefault();
}
