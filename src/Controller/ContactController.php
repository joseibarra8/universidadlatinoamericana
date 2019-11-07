<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $respu)
    {

       //echo "<pre>";
       //print_r($respu);
       //echo "</pre>";
       $form = $this->createForm(ContactType::class);
       $form->handleRequest($respu); //método para detectar cuando se ha enviado el formulario

       if($form->isSubmitted() && $form->isValid()){
       	 $contactFormData = $form->getData();
       	 dump($contactFormData);
       }

       return $this->render('contact/index.html.twig', [
           'our_form' => $form->createView(),
       ]);
    }
}
