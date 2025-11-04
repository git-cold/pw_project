<?php
namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MainController {
  #[Route('/index')]
  public function index(): Response { return new Response('<html><body>Votre première page</body></html>'); }

  #[Route('/bonjour/{nom}', defaults: ['nom' => 'Inconnu'], requirements: ['nom' => '[A-Za-z]+'], methods: ['GET'])]
  public function indexbis(Request $request): Response {
    $nom = $request->get('nom', 'Inconnu');
    return new Response('Bonjour ' . $nom); 
  }

  #[Route('/calcul/{nb}', requirements: ['nb' => '(0|[1-9]\d?|100)'], methods: ['GET'])]
  public function indexter(Request $request): Response {
    $nb = $request->get('nb', 0);
    return new Response('Number ' . $nb); 
  }
}