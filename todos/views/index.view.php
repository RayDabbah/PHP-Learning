<?php include 'partials/header.php'?>
 <ul id="todoList">
     
    <?php foreach ($tasks as $todo) {
        if (!$todo->completed) {
            echo "<li class=\"incompleteTodo\"><span>   $todo->description</span></li>";
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
 <script src="script.js"></script>
     
<?php include 'partials/footer.php'?>