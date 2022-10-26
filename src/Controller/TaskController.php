<?php
// src/Controller/TaskController.php
namespace App\Controller;

use App\Entity\Employee;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Type\TaskType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EmployeeRepository;

class TaskController extends AbstractController
{
    #[Route('/task')]
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
            $employee->setDob($data['date_of_birth']);
            $employee->setEmail($data['email_address']);
            $entityManager->persist($employee);
            $entityManager->flush();
        }
        if ($form->isSubmitted() && $form->isValid() == false)
        {
            $this->addFlash(
                'notice',
                'Invalid submission, details not saved'
            );
        }

        return $this->renderForm('task/new.html.twig', [
            'form' => $form,
        ]);

    }

    #[Route('/task')]
    public function show(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Employee::class);
        $employees = $repository->findall();

        // if (!$databaseEmployees) {
        //     throw $this->createNotFoundException(
        //         'No employees found '
        //     );
        // }
        return $this->render('task/list.twig', ['employees' => $employees]);
    }
}


?>