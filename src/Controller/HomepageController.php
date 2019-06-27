<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\DocumentoDummy;

class HomepageController extends Controller
{
    /**
     * @Route("/home", name="app_homepage")
     */
    public function index(): Response
    {
        $documentos = $this->getDoctrine()->getRepository(DocumentoDummy::class)->findAll();
        return $this->render('home.html.twig', ['documentos' => $documentos]);
    }
}
