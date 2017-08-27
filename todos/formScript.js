var logIn = document.getElementById('login');
var newUserForm = document.getElementById('newUserForm');
var loginMessage = document.getElementById('loginMessage');
var toggle = false;
var pass = document.getElementById('password');
var confirmPass = document.getElementById('Confirmpassword');
var errorMess = document.getElementById('error');
var confirmPassLabel = document.querySelector('label[for=Confirmpassword]');
var header = document.getElementById('header');

newUserForm.addEventListener('submit', (e) => {
    if (pass.value != confirmPass.value) {
        errorMess.style.color = 'red';
        errorMess.textContent = 'Passwords do not match!';
        e.preventDefault();
    }
})


logIn.addEventListener('click', ()=>{
    if(!toggle){
        header.textContent = 'Welcome back! Please enter your login information!';
        newUserForm.action = '/login';
        loginMessage.textContent = 'New guest? ';
        logIn.textContent = 'Click here to sign up!';
        confirmPass.style.display = 'none';
        confirmPassLabel.style.display = 'none';
        toggle = true;
    }else{
        header.textContent = 'Welcome! Please create an account to join!';
        newUserForm.action = '/signup';
        loginMessage.textContent = 'Already a member?';
        logIn.textContent = 'Click here to log in';
        confirmPass.style.display = 'block';
        confirmPassLabel.style.display = 'block';
        toggle = false;
    }
})