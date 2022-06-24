<?php

namespace App\Controller;

use App\Entity\AddClass;
use App\Form\ClassType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddClassController extends AbstractController
{
    /**
     * @Route("/addclass", name="app_addclass")
     */
    public function add_class(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $addclass= new AddClass();
        $ClassForm = $this->createForm(ClassType::class, $addclass);
        $ClassForm->handleRequest($request);

        $data=$this->getDoctrine()->getRepository(AddClass::class)->findAll();

        if($ClassForm->isSubmitted() && $ClassForm->isValid()){
            $em->persist($addclass);
            $em->flush();
            return $this->render('add_class/index.html.twig', ['form'=>$ClassForm->createView(), 'data'=> $data]);
        }
        return $this->render('add_class/index.html.twig', ['form'=>$ClassForm->createView(), 'data'=> $data]);           
    }

/**
     * @Route("/updateclass/{id}", name="updateclass")
     */
    public function update(Request $request, $id)
    {
     $em = $this->getDoctrine()->getManager();
     $addclass= $this->getDoctrine()->getRepository(AddClass::class)->find($id);

     $ClassForm = $this->createForm(ClassType::class, $addclass);
     $ClassForm->handleRequest($request);

     if($ClassForm->isSubmitted() && $ClassForm->isValid()){
         $em->persist($addclass);
         $em->flush();
         return $this->redirectToRoute('app_addclass');
     }
     return $this->render('add_class/update.html.twig', ['form'=>$ClassForm->createView(),'addclass'=> $addclass]);
    }

      /**
     * @Route("/deleteclass/{id}", name="deleteclass")
     */
    public function delete($id)
    {
       $data= $this->getDoctrine()->getRepository(AddClass::class)->find($id);
       $em = $this->getDoctrine()->getManager();
       $em->remove($data);
       $em->flush();
       return($this->redirectToRoute('app_addclass'));
    }
}
