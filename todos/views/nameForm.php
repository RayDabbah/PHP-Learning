<?php include 'partials/header.php'?>
<h1>
<?php if($_POST): ?>
<?= "Hello $_POST[name]!"; ?>
<?php else : ?>
<?= 'Enter your name.'; endif?>
</h1>
<form action="/name"  method="POST">
<input type="text" name="name"><br>
<input type="submit">
</form>

<?php include 'partials/footer.php'?>