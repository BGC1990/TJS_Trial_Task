<?php // src/Entity/FormEmployee.php
namespace App\Entity;

class FormEmployee
{
    public $first_name;
    public $last_name;

    public function getFirst_Name(): string
    {
        return $this->first_name;
    }

    public function setFirst_Name(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setLast_Name(string $last_name): void
    {
        $this->last_name = $last_name;
    }
}

?>