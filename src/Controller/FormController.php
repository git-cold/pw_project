<?php

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class FormController {
  private array $tuteurs = [
      ['nom' => 'Johnson', 'prenom' => 'Paul'],
      ['nom' => 'Walberg', 'prenom' => 'Mark']
  ];

  #[Route('/hello/{name}')]
  public function hello(Request $request, Environment $twig): Response {
    $name = $request->get('name', 'Inconnu');

    $html = $twig->render('form_hello.html.twig', [
        'prenom' => strtoupper($name)
    ]);

    return new Response($html); 
  }

  #[Route('/liste')]
  public function liste(Request $request, Environment $twig): Response {
    $html = $twig->render('form_tuteurs.html.twig', [ 'tuteurs' => $this->tuteurs ]);

    return new Response($html); 
  }

  #[Route('/search_tuteur', name: 'search_tuteur_get', methods: ['GET'])]
  public function search(Request $request, Environment $twig): Response {
    $html = $twig->render('form_search_tuteur.html.twig');
    return new Response($html); 
  }

  #[Route('/search_tuteur', name: 'search_tuteur_post', methods: ['POST'])]
  public function search_post(Request $request, Environment $twig): Response {
    $name = $request->get('search', null);

    $tuteur = null;
    foreach ($this->tuteurs as $t) {
        if (strcasecmp($t['nom'], $name) === 0) {
            $tuteur = $t;
            break;
        }
    }

    if ($tuteur == null) {
      $html = $twig->render('form_no_tuteur.html.twig');
    } else {
      $html = $twig->render('form_tuteur.html.twig', [ 'tuteur' => $tuteur ]);
    }

    return new Response($html); 
  }
}
