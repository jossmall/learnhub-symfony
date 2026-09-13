<?php

namespace App\Controller;

use App\Entity\Course;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/courses', name: 'api_courses_')]
final class ApiCoursesController extends AbstractController
{
    #[Route('/', name: 'list', methods: ['GET'])]
    public function index(
        EntityManagerInterface $em,
        Request $request
    ): JsonResponse
    {
        $level = $request->query->get('nivel');

        if ($level === 'Basico') {
            $courses = $em->getRepository(Course::class)->findBy([
                'level' => 'Basico'
            ]);
        } elseif ($level === 'Medio') {
            $courses = $em->getRepository(Course::class)->findBy([
                'level' => 'Medio'
            ]);
        } elseif ($level === 'Avanzado') {
            $courses = $em->getRepository(Course::class)->findBy([
                'level' => 'Avanzado'
            ]);
        } else {
            $courses = $em->getRepository(Course::class)->findAll();
        }

        $data = [];

        foreach ($courses as $course) {
            $data[] = [
                'id' => $course->getId(),
                'Titulo' => $course->getTitle(),
                'Profesor' => $course->getTeacher(),
                'Categoria' => $course->getCategory()->getName(),
                'Nivel' => $course->getLevel(),
                'Matriculas' => count($course->getEnrollments()),
            ];
        }

        return new JsonResponse($data);
    }
}
