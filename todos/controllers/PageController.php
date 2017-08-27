<?php
class PageController
{

    public function home()
    {
        if(empty($_SESSION))
        {
           return header('Location: /form');
        };
        $tasks = App::get('database')->selectAll('todos', 'Task');
        // die(var_dump($tasks));
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
        views('names', ['users' => $users]);
    }
    public function name()
    {
        if ($_POST['Confirmpassword'] != $_POST['password']) {
        // die(var_dump($_POST));
            return header('Location: /form');
        }
        App::get('database')->addUser('users', $_POST['username'], $_POST['email'], $_POST['password']);
        $newUser = App::get('database')->findUser('User', 'users', $_POST['username'], $_POST['email'], $_POST['password']);
        $_SESSION['username'] = $newUser[0]->username;
        $_SESSION['email'] = $newUser[0]->email;
        $_SESSION['id'] = $newUser[0]->id;
        // die(var_dump($_SESSION));
        header('Location: /');
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
    public function delete()
    {
        App::get('database')->delete('todos', $_POST['id']);
        header('Location: /');
    }
    public function update()
    {
        App::get('database')->updateTask('todos', $_POST['description'], $_POST['completed'], $_POST['id']);
        header('Location: /');
    }
    public function logOut()
    {
        session_destroy();
        header('Location:' . $_SERVER["HTTP_REFERER"]);
    }
    public function login()
    {
        $returningUser = App::get('database')->findUser('User', 'users', $_POST['username'], $_POST['email'], $_POST['password']);
        $_SESSION['username'] = $returningUser[0]->username;
        $_SESSION['email'] = $returningUser[0]->email;
        $_SESSION['id'] = $returningUser[0]->id;
       isset($_SERVER["HTTP_REFERER"]) ? header('Location:' . $_SERVER["HTTP_REFERER"]) : header('Location: /');
    }
}