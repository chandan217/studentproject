<?php

namespace App\Controller;

use App\Entity\AddClass;
use App\Entity\AddStudent;
use App\Form\StudentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddStudentController extends AbstractController
{
    /**
     * @Route("/add_student", name="app_addstudent")
     */
    public function add_student(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $addstudent= new AddStudent();
        $StudentForm = $this->createForm(StudentType::class, $addstudent);
        $StudentForm->handleRequest($request);
        $data=$this->getDoctrine()->getRepository(AddStudent::class)->findAll();
        if($StudentForm->isSubmitted() && $StudentForm->isValid()){
            $em->persist($addstudent);
            $em->flush();
            return $this->render('add_student/index.html.twig', ['form'=>$StudentForm->createView(), 'data'=> $data]);
        }
        return $this->render('add_student/index.html.twig', ['form'=>$StudentForm->createView(), 'data'=> $data]);
    }

    /**
     * @Route("/updatestudent/{id}", name="updatestudent")
     */
    public function update(Request $request, $id)
    {
     $em = $this->getDoctrine()->getManager();
     $addstudent= $this->getDoctrine()->getRepository(AddStudent::class)->find($id);

     $StudentForm = $this->createForm(StudentType::class, $addstudent);
     $StudentForm->handleRequest($request);

     if($StudentForm->isSubmitted() && $StudentForm->isValid()){
         $em->persist($addstudent);
         $em->flush();
         return $this->redirectToRoute('app_addstudent');
     }
     return $this->render('add_student/update.html.twig', ['form'=>$StudentForm->createView(),'addstudent'=> $addstudent]);
    }

       /**
     * @Route("/deletestudent/{id}", name="deletestudent")
     */
    public function delete($id)
    {
       $data= $this->getDoctrine()->getRepository(AddStudent::class)->find($id);
       $em = $this->getDoctrine()->getManager();
       $em->remove($data);
       $em->flush();
       return($this->redirectToRoute('app_addstudent'));
    }

}
