<?php // src/Controller/ProductController.php
namespace App\Controller;

use App\Entity\Employee;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployeeController extends AbstractController
{
    #[Route('task/new.html.twig', name: 'employee_show')]
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $databaseEmployees = $doctrine->getRepository(Employee::class)->findAll();

        if (!$databaseEmployees) {
            throw $this->createNotFoundException(
                'No employees found '.$id
            );
        }

        return $this->render('task/new.html.twig', ['Employee' => $databaseEmployees]);
    }
}

?>