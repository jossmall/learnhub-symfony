<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use App\Repository\EnrollmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        EnrollmentRepository $repository,
        CourseRepository $courseRepository,
        Request $request
    ): Response
    {
        $enrollments = $repository->findAll();

        $totalEnrollments = count($enrollments);
        $totalEnrollmentsConfirmed = 0;

        foreach ($enrollments as $enrollment) {
            if ($enrollment->getStatus() === 'Confirmada') {
                $totalEnrollmentsConfirmed++;
            }
        }

        $allCourses = $courseRepository->findAll();
        $totalCourses = count($allCourses);

        $nivel = $request->query->get('nivel');

        if ($nivel) {
            $courses = $courseRepository->findBy([
                'level' => $nivel
            ]);
        } else {
            $courses = $allCourses;
        }

        return $this->render('home/index.html.twig', [
            'message' => 'Catálogo de cursos',
            'total_courses' => $totalCourses,
            'total_enrollments' => $totalEnrollments,
            'total_enrollments_confirmed' => $totalEnrollmentsConfirmed,
            'courses' => $courses,
            'nivel' => $nivel,
        ]);
    }

    #[Route('/curso/{slug}', name: 'course_detail')]
    public function detail(
        string $slug,
        CourseRepository $courseRepository
    ): Response
    {
        $course = $courseRepository->findOneBy([
            'slug' => $slug
        ]);

        if (!$course) {
            throw $this->createNotFoundException('Curso no encontrado');
        }

        return $this->render('home/detail.html.twig', [
            'course' => $course,
        ]);
    }
}
