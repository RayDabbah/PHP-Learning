<?php
class PageController
{

    public function home()
    {
        $tasks = App::get('database')->selectAll('todos', 'Task');

        require 'views/index.view.php';
    }

    public function about()
    {
        require 'views/about.php';
    }
    public function form()
    {
        require 'views/nameForm.php';

    }
    public function name()
    {
        App::get('database')->addUser('users', $_POST[username], $_POST[email], $_POST[password]);
        $users = App::get('database')->selectAll('users', 'User');
        require 'views/name.php';
    }
    public function contact()
    {
        require 'views/contact.php';
    }
    public function task()
    {
        App::get('database')->addTask('todos', $_POST['description'], $_POST['completed']);
        header('Location: /');
    }
}