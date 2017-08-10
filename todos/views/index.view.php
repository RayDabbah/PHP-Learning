<?php include 'partials/header.php'?>
 <ul>
     
    <?php foreach ($tasks as $todo) {
        if (!$todo->completed) {
            echo "<li>   $todo->description</li>";
        }
        else {
            echo "<li class=\"linethrough\"><span class=\"crossedout\">   $todo->description</span></li>";
        }
    }
    ?>
       
            
    
 </ul>   
 <ul class="userlist">
     
    <?php foreach ($users as $user) : ?>
       <li><?= "$user->username can be reached at <br>  $user->email"; ?></li>
    
       <?php endforeach; ?>
       
    
    
 </ul>   
 
<?php include 'partials/footer.php'?>