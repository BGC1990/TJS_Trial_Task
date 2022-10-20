<?php // src/Entity/Task.php
namespace App\Entity;

class FormEmployee
{
    protected $first_name;
    protected $last_name;

    public function getFirst_Name(): string
    {
        return $this->first_name;
    }

    public function setTask(string $task): void
    {
        $this->task = $task;
    }

    public function getDueDate(): ?\DateTime
    {
        return $this->dueDate;
    }

    public function setDueDate(?\DateTime $dueDate): void
    {
        $this->dueDate = $dueDate;
    }
}

?>