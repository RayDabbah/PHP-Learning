<?php
$tasks = App::get('database')->selectAll('todos', 'Task');

require 'views/index.view.php';