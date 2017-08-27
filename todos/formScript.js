var logIn = document.getElementById('login');
var newUserForm = document.getElementById('newUserForm');
var loginMessage = document.getElementById('loginMessage');
var toggle = false;
var pass = document.getElementById('password');
var confirmPass = document.getElementById('Confirmpassword');
var errorMess = document.getElementById('error');
newUserForm.addEventListener('submit', (e) => {
    if (pass.value != confirmPass.value) {
        errorMess.style.color = 'red';
        errorMess.textContent = 'Passwords do not match!';
        e.preventDefault();
    }
})


logIn.addEventListener('click', ()=>{
    if(!toggle){
        newUserForm.action = '/login';
        loginMessage.textContent = 'New guest? ';
        logIn.textContent = 'Click here to sign up!';
        toggle = true;
    }else{
        newUserForm.action = '/name';
        loginMessage.textContent = 'Already a member?';
        logIn.textContent = 'Click here to log in';
        toggle = false;
    }
})