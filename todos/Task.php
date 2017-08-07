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