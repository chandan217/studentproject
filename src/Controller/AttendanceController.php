<?php

namespace App\Controller;

use App\Entity\AddClass;
use App\Entity\Attendance;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttendanceController extends AbstractController
{
    /**
     * @Route("/attendance", name="app_attendance")
     */
   
     public function attendance(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $attendance= new Attendance();
        $AttendanceForm = $this->createForm(AttendanceType::class, $attendance);
        $AttendanceForm->handleRequest($request);
        $data=$this->getDoctrine()->getRepository(Attendance::class)->findAll();
        return $this->render('teacher/attendance.html.twig', ['form'=>$AttendanceForm->createView(), 'data'=> $data]);
    }
}
