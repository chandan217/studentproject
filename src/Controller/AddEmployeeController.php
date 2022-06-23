<?php

namespace App\Controller;

use App\Entity\AddEmployee;
use App\Form\EmployeeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Routing\Annotation\Route;

class AddEmployeeController extends AbstractController
{
    /**
     * @Route("/add_employee", name="app_addemployee")
     */

    public function add_employee(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $addemployee= new AddEmployee();

        $EmployeeForm = $this->createForm(EmployeeType::class, $addemployee);
        $EmployeeForm->handleRequest($request);

        $data=$this->getDoctrine()->getRepository(AddEmployee::class)->findAll();

        if($EmployeeForm->isSubmitted() && $EmployeeForm->isValid()){
            $em->persist($addemployee);
            $em->flush();
            return $this->render('security/add_employee.html.twig', ['form'=>$EmployeeForm->createView(), 'data'=> $data]);
        }

        
        return $this->render('security/add_employee.html.twig', ['form'=>$EmployeeForm->createView(), 'data'=> $data]);
    }

/**
     * @Route("/update/{id}", name="update")
     */
       public function update(Request $request, $id)
       {
        $em = $this->getDoctrine()->getManager();
        $addemployee= $this->getDoctrine()->getRepository(AddEmployee::class)->find($id);

        $EmployeeForm = $this->createForm(EmployeeType::class, $addemployee);
        $EmployeeForm->handleRequest($request);

        if($EmployeeForm->isSubmitted() && $EmployeeForm->isValid()){
            $em->persist($addemployee);
            $em->flush();
            return $this->redirectToRoute('app_addemployee');
        }
        return $this->render('security/update.html.twig', ['form'=>$EmployeeForm->createView(),'addemployee'=> $addemployee]);
       }

       /**
     * @Route("/delete/{id}", name="delete")
     */
        public function delete($id)
        {
           $data= $this->getDoctrine()->getRepository(AddEmployee::class)->find($id);
           $em = $this->getDoctrine()->getManager();
           $em->remove($data);
           $em->flush();
           return($this->redirectToRoute('app_addemployee'));
        }

}
