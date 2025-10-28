<?php

return function ($request, $handler) {
    // Démarrer la session si elle n'est pas déjà démarrée
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    return $handler->handle($request);
};