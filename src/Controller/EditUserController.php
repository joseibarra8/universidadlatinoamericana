<?php

namespace App\Controller;

use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UsuarioRepository;
use Doctrine\ORM\EntityManagerInterface;//Permite guardar y recuperar datos de la base de datos
class EditUserController extends AbstractController
{
    /**
     * @Route("/edituser", name="edit_user")
     */
    public function index(Request $request,UsuarioRepository $datosuser,EntityManagerInterface $recuperadatosDB)
    {
    	$repository = $recuperadatosDB->getRepository(Usuario::class);
    	$q = $request->query->get('q');//LEER PARAMETROS DE CONSULTA
    	$queryBuilder = $repository->findAllPublishedOrderedByNewest($q);

        return $this->render('edit_user/index.html.twig', [
            'usuarios' => $queryBuilder,
        ]);
    }
}
