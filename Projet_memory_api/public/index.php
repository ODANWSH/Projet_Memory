<?php

use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

session_start();

// Initialiser la base de données
$capsule = (require __DIR__ . '/../src/dependencies.php')();

// Créer l'application Slim
$app = AppFactory::create();

// Ajouter le middleware de routage
$app->addRoutingMiddleware();

// Ajouter le middleware de session
$sessionMiddleware = require __DIR__ . '/../src/Middleware/session.php';
$app->add($sessionMiddleware);

// Ajouter le middleware d'erreur
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Charger les routes (passer $capsule)
$routes = require __DIR__ . '/../src/routes.php';
$routes($app, $capsule);

// Lancer l'application
$app->run();
