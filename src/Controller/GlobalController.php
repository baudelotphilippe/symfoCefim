<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GlobalController extends AbstractController
{
    #[Route('/', name: 'app_global')]
    public function index(): Response
    {
        return $this->render('global/index.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('global/contact.html.twig', [
            'controller_name' => 'contact',
        ]);
    }

    #[Route('/a-propos', name: 'app_aPropos')]
    public function aPropos(): Response
    {
        return $this->render('global/aPropos.html.twig', [
            'controller_name' => 'aPropos',
        ]);
    }
}
