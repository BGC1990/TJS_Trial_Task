<?php
// src/Controller/TaskController.php
namespace App\Controller;

use App\Entity\FormEmployee;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Type\TaskType;

class TaskController extends AbstractController
{
    public function new(): Response
    {
        // creates a task object and initializes some data for this example
        $FormEmployee = new FormEmployee();
        $FormEmployee->setFirst_Name('First Name');
        $FormEmployee->setLast_Name('Last Name');

        $form = $this->createForm(TaskType::class, $FormEmployee);

        return $this->renderForm('task/new.html.twig', [
            'form' => $form,
        ]);
    }
}


?>