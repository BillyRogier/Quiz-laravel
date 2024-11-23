# QUIZ APP

## Desciption du développement

### Ordre

 - Initialisation du projet laravel
 - Créer les model et migration de Question, Answer et User
 - Paramétrer le .env
 - Lancement des migrations
 - Créer les controllers puis les views et les routes

### Items

 - CRUD Question et answer
 - Register et login avec le model User

## Installation

`git clone https://github.com/BillyRogier/Quiz-laravel.git`
`cd Quiz-laravel`
`composer install`
`npm install`

Configurer votre .env

Puis lancer les migrations

`php artisan migrate`

Et enfin lancer le serveur

`php artisan serve`

Vous pouvez également lancer cette commande pour générer l'utilisateur `test@example.com` avec le mdp `root`

`php artisan db:seed`