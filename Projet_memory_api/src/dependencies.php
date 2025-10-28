<?php

use Illuminate\Database\Capsule\Manager as Capsule;

return function () {
    $settings = require __DIR__ . '/settings.php';

    $capsule = new Capsule;
    $capsule->addConnection($settings['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};
