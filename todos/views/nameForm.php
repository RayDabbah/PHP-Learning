<?php include 'partials/header.php' ?>

<h1>
    Enter your name.
</h1>
<p id="loginMessage">
    Already a member? 
</p>
<a href="#" id="login">
    Click here to log in
</a>
<form id="newUserForm" action="/name"  method="POST">
<label for="username">Name:</label>
<input id="username" type="text" name="username"><br>
<label for="email">Email: </label>
<input id="email" type="email" name="email" value="<?php if(isset($error)){echo $_POST['email'];} ?>"><br>
<label for="password">Password: </label>
<input id="password" type="password" name="password" ><br>
<label for="Confirmpassword">Confirm Password: </label>
<input id="Confirmpassword" type="password" name="Confirmpassword"><br>
<p id="error"></p>
<input type="submit">
</form>

<script src="formScript.js"></script>
<?php include 'partials/footer.php' ?>