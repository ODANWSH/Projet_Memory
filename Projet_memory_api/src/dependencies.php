<?php

use Illuminate\Database\Capsule\Manager as Capsule;

return function ($app) {
    $container = $app->getContainer();
    $settings = require __DIR__ . '/settings.php';

    $capsule = new Capsule;
    $capsule->addConnection($settings['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    $container->set('db', function () use ($capsule) {
        return $capsule;
    });
};
