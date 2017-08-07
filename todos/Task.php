<?php
    class Task{
        public $description;
        public $completed;
        function complete(){
          if(! $completed) {
              return $completed = true;
          }
        }
    }

     class User{
        public $username;
        public $email;
        public $password;
    }