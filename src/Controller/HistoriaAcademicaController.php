<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HistoriaAcademicaController extends AbstractController
{
    /**
     * @Route("/historia", name="historia_academica")
     */
    public function index()
    {
        return $this->render('historia_academica/index.html.twig');
    }
}
