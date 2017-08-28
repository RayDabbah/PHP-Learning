<?php include 'partials/header.php' ?>

<h1>
    <?php if(!empty($_SESSION['username']))
    {
    echo 'Welcome ' . ucwords($_SESSION['username']).'!';
    }
    ?>
</h1>
<ul class="userlist">
     
    <?php foreach ($users as $user) : ?>
       <li><?= "$user->username can be reached at <br>    $user->email"; ?></li>
    
       <?php endforeach; ?>
       
    
    
 </ul>   
 
 


<?php include 'partials/footer.php' ?>