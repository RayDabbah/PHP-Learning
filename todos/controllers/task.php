<?php

$app['database']->addTask('todos', $_POST['description'], $_POST['completed']);
header('Location: /');