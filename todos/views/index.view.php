<?php include 'partials/header.php' ?>
<div class="flex">
 <ul id="todoList">
    <?php if (empty($tasks)) {
                echo '<li>Your Todos will go here.</li>';
        };
        foreach ($tasks as $todo) : ?>
    <form class="deleteTodo" action="/delete" method="POST">
             <?php if (!$todo->completed) : ?>
                       <li class="incompleteTodo">
                                <img class="delete" src="delete-basket.png">
                                <span>
                                        <?= $todo->description ?>
                                </span>
                
              <?php  else : ?>
                        <li class="linethrough">
                                <img class="delete" src="delete-basket.png">
                                <span class="crossedout">
                                        <?= $todo->description ?>
                                </span>
                <?php endif; ?>
                <img class="pen" src="pen.png">
        </li>
                
              <input type="hidden" name="description" value=" <?= $todo->description ?>">
              <input class="completed" type="hidden" name="completed" value=" <?= $todo->completed ?>">
              <input type="hidden" name="id" value=" <?= $todo->id ?>">
                </form>
        <?php endforeach; ?>
        
       
            
    
 </ul>   
 <form id="todoForm" action="/task" method="POST">
                <textarea name="description" id="desc" placeholder="Enter your Todo here!" cols="30" rows="10"></textarea>
        <p>Completed? </p>
        <label class="radioLabel" for="false">No </label>
                <input type="radio" id="false" name="completed" value="0" checked="checked"><br>
        <label class="radioLabel" for="true">Yes </label>
                <input type="radio" id="true" name="completed" value="1"><br>
                <div class="flex">
                        <input type="submit" id="submit" value="Add your Todo!">
                        <input id="reset" value="Cancel" type="reset">
                </div>
 </form>
</div>

 <script type="text/babel" src="script.js"></script>
<?php include 'partials/footer.php' ?>