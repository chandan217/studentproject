<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    /**
     * @Route("/teacher", name="app_teacher")
     */
    public function index(): Response
    {
        $user = $this->get('security.token_storage')->getToken();
        //dump($user);
        //die();
        if(is_null($user) == 1){
            // get the login error if there is one
        $error = '';
        // last username entered by the user
        $lastUsername = '';
        return $this->redirect('/');
        } else {
            $usercurrent = $this->get('security.token_storage')->getToken()->getUser();
        }
        return $this->render('teacher/attendance.html.twig', [
            'controller_name' => 'TeacherController',
        ]);
    }
}
