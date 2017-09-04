<?php include 'partials/header.php' ?>
<div class="flex">
 <ul id="todoList">
 </ul>   
 <div id="todoForm" action="/task" method="POST">
                <textarea name="description" id="desc" placeholder="Enter your Todo here!" cols="40" rows="10"></textarea>
        <p>Completed? </p>
        <label class="radioLabel" for="false">No </label>
                <input type="radio" id="false" name="completed" value="0" checked="checked"><br>
        <label class="radioLabel" for="true">Yes </label>
                <input type="radio" id="true" name="completed" value="1"><br>
                <div class="flex">
                        <input type="submit" id="submit" value="Add your Todo!">
                        <input id="reset" value="Cancel" type="reset">
                </div>
 </div>
</div>
 <script src="script.js"></script>
<?php include 'partials/footer.php' ?>