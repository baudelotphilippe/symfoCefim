<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Service\EtapeService;
use App\Service\WelcomeService;
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
        
        // $logger->info("page contact new");

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
    public function aPropos(EtapeService $etape_service): Response
    {
      $etapes=$etape_service->getEtapes();
        return $this->render('global/aPropos.html.twig', [
            'etapes' => $etapes,
        ]);
    }

    #[Route('/api/etapes')]
    public function apiEtapes(EtapeService $etape_service) :Response
    {
        return $this->json($etape_service);
    }
}
