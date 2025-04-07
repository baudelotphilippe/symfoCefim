<?php

namespace App\Controller;

use App\Form\ContactType;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

final class GlobalController extends AbstractController
{
    #[Route('/', name: 'app_global')]
    public function index(): Response
    {
        return $this->render('global/index.html.twig', [
            'h1' => "Ma page d'accueil",
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, LoggerInterface $logger): Response
    {
        
        $logger->info("page contact new");

         $form = $this->createForm(ContactType::class);

         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
            $infos=$form->getData();
            dd($infos);

         }

        return $this->render('global/contact.html.twig', [
            'h1' => 'Nous contacter',
            'form' =>$form
        ]);
    }

    #[Route('/a-propos', name: 'app_aPropos')]
    public function aPropos(): Response
    {
        $etapes = [
            ["year" => 1978, "event" => "Création de la discothèque"],
            ["year" => 1985, "event" => "Première rénovation et agrandissement"],
            ["year" => 1992, "event" => "Introduction des premières soirées à thème"],
            ["year" => 2000, "event" => "Modernisation du son et des lumières"],
            ["year" => 2005, "event" => "Collaboration avec DJs internationaux"],
            ["year" => 2010, "event" => "Ouverture d’un espace VIP"],
            ["year" => 2015, "event" => "Lancement d’une application mobile pour réservations"],
            ["year" => 2020, "event" => "Mise en place d’un service de streaming de DJ sets"],
            ["year" => 2023, "event" => "Expansion avec une nouvelle discothèque dans une autre ville"],
            ["year" => 2025, "event" => "Création d’un label musical pour promouvoir de nouveaux artistes"]
        ];
        return $this->render('global/aPropos.html.twig', [
            'etapes' => $etapes,
        ]);
    }
}
