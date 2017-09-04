<?php
class PageController
{

    public function home()
    {
        if (empty($_SESSION))
            {
            return header('Location: /form');
        };
        // $tasks = App::get('database')->selectUsersTasks('todos', 'Task', $_SESSION['id']);
        views('index.view', compact('tasks'));
    }

    public function about()
    {
        views('about');
    }
    public function form()
    {
        if (!empty($_SESSION))
            {
            return header('Location: /');
        };
        views('nameForm');

    }
    public function names()
    {
        $users = App::get('database')->selectAll('users', 'User');
        views('names', ['users' => $users]);
    }
    public function signup()
    {
        if ($_POST['Confirmpassword'] != $_POST['password']) {
            return header('Location: /form');
        }
        $message;
        foreach ($_POST as $field => $input)
            {
            if (empty($input)) {
                $message .= ucwords($field) . ' cannot be empty.<br>' . "\n";
            }
        }
        $test = App::get('database')->verifyUser('User', 'users', $_POST['username'], $_POST['email']);
        if (!empty($test)) {
            $message = 'That username or email was already taken. If that was you please click the login button to log on.';
        }
        if (isset($message))
            {
            return views('nameForm', ['message' => $message]);
        }
        App::get('database')->addUser('users', $_POST['username'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT));
        $this->login();
    }
    public function contact()
    {
        views('contact');
    }
    public function task()
    {
        App::get('database')->addTask('todos', $_POST['description'], $_POST['completed'], $_SESSION['id']);
        header('Location: /');
    }
    public function delete()
    {
        App::get('database')->delete('todos', $_POST['id']);
        $this->ajax();
    }
    public function update()
    {
        App::get('database')->updateTask('todos', $_POST['description'], $_POST['completed'], $_POST['id']);
        $this->ajax();
    }
    public function logOut()
    {
        session_destroy();
        header('Location:' . $_SERVER["HTTP_REFERER"]);
    }
    public function login()
    {
        $returningUser = App::get('database')->findUser('User', 'users', $_POST['username'], $_POST['email']);
        $passwordTest = password_verify($_POST['password'], $returningUser[0]->password);
        // die(var_dump($returningUser));
        if (isset($returningUser) && $passwordTest)
            {
            $_SESSION['username'] = $returningUser[0]->username;
            $_SESSION['email'] = $returningUser[0]->email;
            $_SESSION['id'] = $returningUser[0]->id;
            return header('Location: /');
        }
        else
            {
            $message = 'Username or password are incorrect. Please try again.';
            return views('nameForm', ['message' => $message]);
        }
    }
    public function ajax()
    {
        $tasks = App::get('database')->selectUsersTasks('todos', 'Task', $_SESSION['id']);
        echo json_encode($tasks);
    }
}
