<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowAttendanceController extends AbstractController
{
    /**
     * @Route("/show_attendance", name="app_showattendance")
     */
    public function index(): Response
    {
        return $this->render('show_attendance/index.html.twig', [
            'controller_name' => 'ShowAttendanceController',
        ]);
    }
}
