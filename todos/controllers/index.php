<?php
$tasks = $app['database']->selectAll('todos', 'Task');

require 'views/index.view.php';