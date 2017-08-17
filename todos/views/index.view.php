<?php include 'partials/header.php' ?>
 <ul id="todoList">
     
    <?php foreach ($tasks as $todo) {
                if (!$todo->completed) {
                        echo "<li class=\"incompleteTodo\"><img class=\"delete\" src=\"delete-basket.png\"><span>      $todo->description</span></li>";
                }
                else {
                        echo "<li class=\"linethrough\"><img class=\"delete\" src=\"delete-basket.png\"><span class=\"crossedout\">      $todo->description</span></li>";
                }
        }
        ?>
       
            
    
 </ul>   
 <form action="/task" method="POST">
 <h1>
 Enter your new Todo Item here: <br>
 </h1>
<label for="desc">Description:  </label>
 <input type="text" id="desc" name="description">
 <p>Completed? </p>
 <label class="radioLabel" for="false">No </label>
 <input type="radio" id="false" name="completed" value="0" checked="checked"><br>
 <label class="radioLabel" for="true">Yes </label>
 <input type="radio" id="true" name="completed" value="1"><br>
 <input type="submit" value="Add your Todo!">
 </form>
 <script src="script.js"></script>
<?php include 'partials/footer.php' ?>