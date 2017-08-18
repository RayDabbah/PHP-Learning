<?php
class PageController
{

    public function home()
    {
        $tasks = App::get('database')->selectAll('todos', 'Task');

         views('index.view', compact('tasks'));
    }

    public function about()
    {
         views('about');
    }
    public function form()
    {
         views('nameForm');

    }
    public function names()
    {
        $users = App::get('database')->selectAll('users', 'User');
         views('names', ['users'=> $users]);
    }
    public function name()
    {
        App::get('database')->addUser('users', $_POST[username], $_POST[email], $_POST[password]);
        header('Location: /names');
    }
    public function contact()
    {
         views('contact');
    }
    public function task()
    {
        App::get('database')->addTask('todos', $_POST['description'], $_POST['completed']);
        header('Location: /');
    }
}