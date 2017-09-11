<?php include 'partials/header.php' ?>

<h1 id="header">
    Sign up
</h1>
<div id="switchMethod">
    <p id="loginMessage">
        Already a member? 
    </p>
    <a href="#" id="login">
        Click here to log in
    </a>
</div>
<form id="newUserForm" action="/signup"  method="POST">
<label for="username">Name:</label>
<input id="username" type="text" tabindex="1" name="username"><br>
<label for="email">Email: </label>
<input id="email" type="email" name="email" tabindex="2" value="<?php if(isset($error)){echo $_POST['email'];} ?>"><br>
<label for="password">Password: </label>
<input id="password" type="password" name="password" tabindex="3"><br>
<label for="Confirmpassword">Confirm Password: </label>
<input id="Confirmpassword" type="password" name="Confirmpassword"><br>
<p id="error">
<?= isset($message) ? $message : ''; ?>
</p>
<input type="submit" value="Welcome!!">
</form>

<script src="formScript.js"></script>
<?php include 'partials/footer.php' ?>