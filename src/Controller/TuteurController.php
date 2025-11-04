<?php

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class TuteurController {
  private array $tuteurs = [
      [
          'id' => 1,
          'nom' => 'Johnson',
          'prenom' => 'Paul',
          'entreprise' => 'Acme',
          'email' => 'paul.johnson@acme.com',
          'telephone' => '06 00 00 00 01',
          'etudiants' => [
              ['nom' => 'Martin', 'prenom' => 'Léa', 'sujet' => 'Détection d’anomalies sur flux bancaires'],
              ['nom' => 'Durand', 'prenom' => 'Noah', 'sujet' => 'Dashboard risques crédit']
          ]
      ],
      [
          'id' => 2,
          'nom' => 'Walberg',
          'prenom' => 'Mark',
          'entreprise' => 'Globex',
          'email' => 'mark.walberg@globex.com',
          'telephone' => '06 00 00 00 02',
          'etudiants' => []
      ]
  ];

  #[Route('/app_tuteur')]
  public function index(Request $request, Environment $twig): Response {
    $html = $twig->render('tuteur_index.html.twig');
    return new Response($html); 
  }

  #[Route('/app_tuteur/tuteurs')]
  public function tuteurs(Request $request, Environment $twig): Response {
    $html = $twig->render('tuteur_tuteurs.html.twig', ["tuteurs" => $this->tuteurs]);
    return new Response($html); 
  }

  #[Route('/app_tuteur/etudiants')]
  public function etudiants(Request $request, Environment $twig): Response {
    $etudiants = [];
    foreach ($this->tuteurs as $tuteur) {
      foreach ($tuteur["etudiants"] as $etudiant) {
        $etudiants[] = $etudiant;
      }
    }
    $html = $twig->render('tuteur_etudiants.html.twig', ["etudiants" => $etudiants]);
    return new Response($html); 
  }

  #[Route('/app_tuteur/sujets')]
  public function sujets(Request $request, Environment $twig): Response {
      $sujets = [];

      foreach ($this->tuteurs as $tuteur) {
          foreach ($tuteur["etudiants"] as $etudiant) {
              $sujets[] = $etudiant["sujet"]; // clé "sujet" au singulier
          }
      }

      $html = $twig->render('tuteur_sujets.html.twig', ["sujets" => $sujets]);
      return new Response($html); 
  }

}
