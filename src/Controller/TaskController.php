<?php
// src/Controller/TaskController.php
namespace App\Controller;

use App\Entity\Employee;
use App\Entity\FormEmployee;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Type\TaskType;
use Doctrine\Persistence\ManagerRegistry;

class TaskController extends AbstractController
{
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        // creates a task object and initializes some data for this example
       // $FormEmployee = new FormEmployee();
       // $FormEmployee->setFirst_Name('');
       // $FormEmployee->setLast_Name('');

        $form = $this->createForm(TaskType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            
            $employee = new Employee();
            $employee->setFirstName($data['first_name']);
            $employee->setLastName($data['last_name']);
            $dob = $data['date_of_birth'];
            $dobStringValue = date('d-m-Y', $dob);
            $dobReconverted = \DateTime::createFromFormat('d-m-Y', $dobStringValue);
            $employee->setDob($dobReconverted);
            $employee->setEmail($data['email_address']);
            $entityManager->persist($employee);
            $entityManager->flush();
        }

        return $this->renderForm('task/new.html.twig', [
            'form' => $form,
        ]);
    }
}


?>