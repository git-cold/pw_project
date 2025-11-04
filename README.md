# TP 1 Symfony

## Partie 2

2. Testez la route suivante http://localhost:8000 . Que constatez-vous ? Quelle est l’URL à taper pour voir l’exécution de la méthode index de MainController ? `/index`

3. Testez les routes /bonjour et /bonjour?nom=John ? `$_GET["nom"]`

4. Modifiez votre code pour que à la place de X s’affiche le prénom passé en paramètre. Au fait, lorsque l’on appelle une URL directement dans le navigateur, de quelle méthode HTTP s’agit-il ? `GET`

## Partie 3

2. Testez à nouveau la route. Que constatez-vous ? `la route bonjour/John fonctionne`

4. Testez la route /bonjour . Que se passe t il ? `Elle ne marche plus`

7. Testez la route /bonjour/35 ? Que constatez vous ? `On a 35 à la place de X`

9. Retapez la route suivante /bonjour/35 ? Que constatez-vous ? `La route n'existe pas`

10. Comment faire pour restreindre l’appel de cette route à un appel en méthode GET ? `methods: ['GET']`

## Partie 5

Testez la commande suivante `php bin/console debug:router`. A quoi sert-elle ? `Lister les routes`