Goal => Student Plateforme for Homework submition
========================

Introduction 
--------------
Le projet a été développer avec Symfony 3.4 

Voici un détails de l'arborescence afin de trouver les fichiers désiré

| Dossier  | Rôle |
| ------------- | ------------- |
| app | Stocke les configurations, traductions,  Template, …  |
| bin  | Stocke les scripts exécutables.  |
| src  | Stocke le code de notre application.  |
| tests  | Stocke la liste des tests unitaires et fonctionnels..  |
| var	  | Stocke les logs, les caches et les sessions générés par notre application.|
| vendor  | Stocke les bundles tiers utilisés dans notre application.  |
| web  | les fichiers "publics" de notre application app.php, app_dev.php,  robots.txt, Css, Js, images, fonts, …  |
| app\Ressources	  | Stocke les fichiers Templates commun, les Templates d’exception, tout fichier commun.  |
| app\config	  | Stocke les configurations, paramétrages,  services, routes de tous nos environnements.  |
| app\DoctrineMigrations	  | Stocke les migrations doctrines pour la gestion des changements de la base de données via DoctrineMigrationsBundle  |
| App\translations	  | Stocke tous les fichiers de traduction de l'application  |
| src\AppBundle\Command	  | Stocke toutes les tâches et  routines à exécuter.  |
| src\AppBundle\Controller	  | Stocke tous les Controllers de traitement des requêtes http.  |
| src\AppBundle\DataFixtures	  | Stocke les jeux données  afin d'avoir des données pour le fonctionnement de l'application.  |
| src\AppBundle\Entity	  | Stocke les déclarations des différentes entités doctrine.  |
| src\AppBundle\Repository	  | Stocke toute les requêtes doctrines  ou SQL sur la base de données|
| src\AppBundle\Listener	  | Stocke les Listeners qui permettent  d’écouter des évènements et exécuter des tâches en fonction.  |
| src\AppBundle\Model	  | Stocke tous nos models de données sans la persistance doctrine afin d’être indépendant.  |
| src\AppBundle\Form		  | Stock les différents formulaires de l’application.|
| src\AppBundle\Manager |  Stocke le code métier à utiliser dans les Controllers.|
| src\AppBundle\Ressources		  | 	Stocke les fichiers config, vues, images et tous les fichiers  nécessaires au fonctionnement de la vue. |
| src\AppBundle\Twig		  | Stocke les extensions Twig personnel.|
| src\AppBundle\Utils	  |  Stocke les traitements personnels de l’application (méthode de césure, ..).|



[1]:  https://symfony.com/doc/3.4/setup.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[7]:  https://symfony.com/doc/3.4/doctrine.html
[8]:  https://symfony.com/doc/3.4/templating.html
[9]:  https://symfony.com/doc/3.4/security.html
[10]: https://symfony.com/doc/3.4/email.html
[11]: https://symfony.com/doc/3.4/logging.html
[13]: https://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html
[14]: https://symfony.com/doc/current/setup/built_in_web_server.html
[15]: https://symfony.com/doc/current/setup.html
