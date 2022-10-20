<?php // src/Entity/FormEmployee.php
namespace App\Entity;
use DateTimeInterface;

class FormEmployee
{
    public $first_name;
    public $last_name;
    public $date_of_birth;
    public $email_address;

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

    public function getDate_Of_Birth(): string
    {
        return $this->date_of_birth;
    }

    public function setDate_Of_Birth(string $date_of_birth): void
    {
        $this->date_of_birth = date("d/m/Y", strtotime($date_of_birth));
    }

    public function getEmail_Address() : string
    {
        return $this->email_address;
    }

    public function setEmail_Address(string $email_address): void
    {
        $this->email_address = $email_address;
    }
}

?>