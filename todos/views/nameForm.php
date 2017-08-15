<?php include 'partials/header.php'?>

<h1>Enter your name.</h1>
<form action="/name"  method="POST">
<label for="username">Name:</label>
<input id="username" type="text" name="username"><br>
<label for="email">Email: </label>
<input id="email" type="email" name="email"><br>
<label for="password">Password: </label>
<input id="password" type="password" name="password"><br>
<input type="submit">
</form>

<?php include 'partials/footer.php'?>