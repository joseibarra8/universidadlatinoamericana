<?php

namespace App\Controller;

use App\Form\UsuarioRegistroType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;

class RegistraUsuarioController extends AbstractController
{
    /**
     * @Route("/registra-usuario", name="registra_usuario")
     */
    public function index(Request $respu,EntityManagerInterface $em)
    {

       $form = $this->createForm(UsuarioRegistroType::class);
       $form->handleRequest($respu); //método para detectar cuando se ha enviado el formulario

       if($form->isSubmitted() && $form->isValid()){
       	 $userData = $form->getData();
         
         $user = new Usuario();
         $user->setNombre($userData['nombre']);
         $user->setApellidoPaterno($userData['apellidoPaterno']);
         $user->setApellidoMaterno($userData['apellidoMaterno']);
         $user->setCorreo($userData['correo']);
         $user->setUsername($userData['nombreUsuario']);
         $user->setPassword('');
         $user->setRol($userData['rol']);
         $user->setStatus(1);
       
       	
         $em->persist($user);
         $em->flush();
         $this->addFlash('success', 'Usuario creado!');
         return $this->redirectToRoute('registra_usuario');
       	 dump($userData);
       }

       return $this->render('registra_usuario/index.html.twig', [
           'our_form' => $form->createView(),
       ]);
    }
}
