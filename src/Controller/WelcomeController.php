<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="welcomes")
     */
    public function index()
    {
        return $this->render('welcome/index.html.twig', [
            'controller_name' => 'WelcomeController',
        ]);

    }

    /**
     * @Route("/hello1", name="pagina_inicial1")
     */
    public function hello1(Request $request){
    	$name = $request->query->get('name','cursos'); // variables por get
		return $this->render('hello_page.html.twig', 
			[
              'nombre' => $name, //paso de variables
            ]
        );    	
    }

     /**
     * @Route("/hello/{nombre}", name="pagina_inicial", defaults={"nombre" = ""},requirements={"nombre"="[A-Za-z]+"})
     * @param string $nombre
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function hello(String $nombre){
		return $this->render('hello_page.html.twig', 
			[
              'nombre' => $nombre, //paso de variables
            ]
        );    	
    }
}
