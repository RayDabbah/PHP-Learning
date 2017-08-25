<?php include 'partials/header.php' ?>

<h1>Enter your name.</h1>
<form id="newUserForm" action="/name"  method="POST">
<label for="username">Name:</label>
<input id="username" type="text" name="username"><br>
<label for="email">Email: </label>
<input id="email" type="email" name="email"><br>
<label for="password">Password: </label>
<input id="password" type="password" name="password"><br>
<label for="Confirmpassword">Confirm Password: </label>
<input id="Confirmpassword" type="password" name="Confirmpassword"><br>
<p id="error"></p>
<input type="submit">
</form>
<script>
    var pass = document.getElementById('password');
var confirmPass = document.getElementById('Confirmpassword');
var newUserForm = document.getElementById('newUserForm') ;
var errorMess = document.getElementById('error')
newUserForm.addEventListener('submit', (e)=>{
    if(pass.value != confirmPass.value){
        errorMess.textContent = 'Passwords do not match!';
        e.preventDefault();
        }
})

</script>
<?php include 'partials/footer.php' ?>