<?php

namespace App\Controller;

use App\Form\ModificarUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;

class ModificaUserController extends AbstractController
{
    /**
     * @Route("/modificauser", name="modifica_user")
     */
    public function index(Request $respu,EntityManagerInterface $em)
    {
       
       $id = $respu->query->get('variable');//LEER PARAMETROS DE CONSULTA
       $repository = $em->getRepository(Usuario::class)->find($id);
       dump($repository);
   
       $form = $this->createForm(ModificarUserType::class);
       $form->handleRequest($respu); //método para detectar cuando se ha enviado el formulario

       if($form->isSubmitted() && $form->isValid()){
          $userData = $form->getData();
          dump($userData);
       }

        return $this->render('modifica_user/index.html.twig', [
            'our_form' => $form->createView(),
            'entity' => $repository
        ]);
    }
}
