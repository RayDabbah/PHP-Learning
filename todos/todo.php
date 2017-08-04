<?php
class ToDos
{

    protected $description;
    protected $completed = false;
    public function __construct($description)
    {
        $this->description = $description;
    }
    public function isComplete()
    {
        return $this->completed;
    }
    public function complete()
    {
        $this->completed = true;
    }
}
$tasks = new ToDos('Go to Sleep');
$task = [
    'toDo' => 'vacuum',
    'assignedTo' => 'נחום',
    'due by' => 'Thursday',
    'isDone' => true,
    'enjoyable' => true
];
var_dump($tasks);
$tasks->complete();
$tasks->isComplete();
var_dump($tasks);