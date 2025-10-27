<?php

use Slim\Factory\AppFactory;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';

// Créer le container PHP-DI
$container = new Container();
AppFactory::setContainer($container);

// Créer l'application Slim
$app = AppFactory::create();

// Ajouter les middlewares (important pour Slim 4)
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

// Charger les dépendances
$dependencies = require __DIR__ . '/../src/dependencies.php';
$dependencies($app);

// Charger les routes
$routes = require __DIR__ . '/../src/routes.php';
$routes($app);

// Lancer l'application
$app->run();
