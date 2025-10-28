<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function ($app, $capsule) {

    // ========================================
    // ROUTE D'ACCUEIL - Documentation API
    // ========================================
    
    $app->get('/', function (Request $request, Response $response) {
        $routes = [
            'message' => 'Bienvenue sur l\'API Projet Memory',
            'version' => '1.0',
            'endpoints' => [
                'Authentification' => [
                    'POST /login' => 'Connexion utilisateur',
                    'POST /register' => 'Inscription utilisateur',
                    'POST /logout' => 'Déconnexion utilisateur',
                    'GET /check-session' => 'Vérifier si l\'utilisateur est connecté'
                ],
                'Équipes' => [
                    'GET /equipes' => 'Liste toutes les équipes',
                    'GET /equipes/{id}' => 'Récupère une équipe par ID',
                    'POST /equipes' => 'Crée une nouvelle équipe',
                    'PUT /equipes/{id}' => 'Met à jour une équipe',
                    'DELETE /equipes/{id}' => 'Supprime une équipe'
                ],
                'Utilisateurs' => [
                    'GET /utilisateurs' => 'Liste tous les utilisateurs',
                    'GET /utilisateurs/{id}' => 'Récupère un utilisateur par ID',
                    'GET /utilisateurs/{id}/projets' => 'Récupère tous les projets d\'un utilisateur',
                    'GET /utilisateurs/{id}/tags' => 'Récupère tous les tags d\'un utilisateur',
                    'GET /utilisateurs/{id}/notifications' => 'Récupère toutes les notifications d\'un utilisateur',
                    'POST /utilisateurs' => 'Crée un nouvel utilisateur',
                    'PUT /utilisateurs/{id}' => 'Met à jour un utilisateur',
                    'DELETE /utilisateurs/{id}' => 'Supprime un utilisateur',
                    'POST /utilisateurs/{id_utilisateur}/competences/{id_competence}' => 'Associe une compétence à un utilisateur',
                    'DELETE /utilisateurs/{id_utilisateur}/competences/{id_competence}' => 'Retire une compétence d\'un utilisateur',
                    'POST /utilisateurs/{id_utilisateur}/roles/{id_role}' => 'Associe un rôle à un utilisateur',
                    'DELETE /utilisateurs/{id_utilisateur}/roles/{id_role}' => 'Retire un rôle d\'un utilisateur',
                    'POST /utilisateurs/{id_utilisateur}/notifications/{id_notification}' => 'Associe une notification à un utilisateur',
                ],
                'Projets' => [
                    'GET /projets' => 'Liste tous les projets',
                    'GET /projets/{id}' => 'Récupère un projet par ID',
                    'GET /projets/{id}/notes' => 'Récupère toutes les notes d\'un projet',
                    'GET /projets/{id}/taches' => 'Récupère toutes les tâches d\'un projet',
                    'POST /projets' => 'Crée un nouveau projet',
                    'PUT /projets/{id}' => 'Met à jour un projet',
                    'DELETE /projets/{id}' => 'Supprime un projet',
                    'POST /projets/{id_projet}/utilisateurs/{id_utilisateur}' => 'Associe un utilisateur à un projet',
                    'DELETE /projets/{id_projet}/utilisateurs/{id_utilisateur}' => 'Retire un utilisateur d\'un projet',
                    'POST /projets/{id_projet}/tags/{id_tag}' => 'Associe un tag à un projet',
                    'DELETE /projets/{id_projet}/tags/{id_tag}' => 'Retire un tag d\'un projet'
                ],
                'Notes' => [
                    'GET /notes' => 'Liste toutes les notes',
                    'GET /notes/{id}' => 'Récupère une note par ID',
                    'GET /notes/{id}/commentaires' => 'Récupère tous les commentaires d\'une note',
                    'GET /notes/{id}/documents' => 'Récupère tous les documents d\'une note',
                    'POST /notes' => 'Crée une nouvelle note',
                    'PUT /notes/{id}' => 'Met à jour une note',
                    'DELETE /notes/{id}' => 'Supprime une note',
                    'POST /notes/{id_note}/utilisateurs/{id_utilisateur}' => 'Associe un utilisateur à une note',
                    'DELETE /notes/{id_note}/utilisateurs/{id_utilisateur}' => 'Retire un utilisateur d\'une note',
                    'POST /notes/{id_note}/tags/{id_tag}' => 'Associe un tag à une note',
                    'DELETE /notes/{id_note}/tags/{id_tag}' => 'Retire un tag d\'une note'
                ],
                'Commentaires' => [
                    'GET /commentaires' => 'Liste tous les commentaires',
                    'POST /commentaires' => 'Crée un nouveau commentaire',
                    'PUT /commentaires/{id}' => 'Met à jour un commentaire',
                    'DELETE /commentaires/{id}' => 'Supprime un commentaire'
                ],
                'Compétences' => [
                    'GET /competences' => 'Liste toutes les compétences',
                    'GET /competences/{id}' => 'Récupère une compétence par ID',
                    'POST /competences' => 'Crée une nouvelle compétence',
                    'PUT /competences/{id}' => 'Met à jour une compétence',
                    'DELETE /competences/{id}' => 'Supprime une compétence'
                ],
                'Couleurs' => [
                    'GET /couleurs' => 'Liste toutes les couleurs',
                    'GET /couleurs/{id}' => 'Récupère une couleur par ID',
                    'POST /couleurs' => 'Crée une nouvelle couleur',
                    'PUT /couleurs/{id}' => 'Met à jour une couleur',
                    'DELETE /couleurs/{id}' => 'Supprime une couleur'
                ],
                'Types de fichier' => [
                    'GET /types-fichier' => 'Liste tous les types de fichier',
                    'GET /types-fichier/{id}' => 'Récupère un type de fichier par ID',
                    'POST /types-fichier' => 'Crée un nouveau type de fichier',
                    'PUT /types-fichier/{id}' => 'Met à jour un type de fichier',
                    'DELETE /types-fichier/{id}' => 'Supprime un type de fichier'
                ],
                'Documents' => [
                    'GET /documents' => 'Liste tous les documents',
                    'POST /documents' => 'Crée un nouveau document',
                    'DELETE /documents/{id}' => 'Supprime un document'
                ],
                'Notifications' => [
                    'GET /notifications' => 'Liste toutes les notifications',
                    'POST /notifications' => 'Crée une nouvelle notification',
                    'DELETE /notifications/{id}' => 'Supprime une notification'
                ],
                'Rôles' => [
                    'GET /roles' => 'Liste tous les rôles',
                    'GET /roles/{id}' => 'Récupère un rôle par ID',
                    'POST /roles' => 'Crée un nouveau rôle',
                    'PUT /roles/{id}' => 'Met à jour un rôle',
                    'DELETE /roles/{id}' => 'Supprime un rôle'
                ],
                'Tags' => [
                    'GET /tags' => 'Liste tous les tags',
                    'GET /tags/{id}' => 'Récupère un tag par ID',
                    'POST /tags' => 'Crée un nouveau tag',
                    'PUT /tags/{id}' => 'Met à jour un tag',
                    'DELETE /tags/{id}' => 'Supprime un tag'
                ],
                'Tâches' => [
                    'GET /taches' => 'Liste toutes les tâches',
                    'POST /taches' => 'Crée une nouvelle tâche',
                    'PUT /taches/{id}' => 'Met à jour une tâche',
                    'DELETE /taches/{id}' => 'Supprime une tâche',
                    'POST /taches/{id_tache}/utilisateurs/{id_utilisateur}' => 'Associe un utilisateur à une tâche',
                    'DELETE /taches/{id_tache}/utilisateurs/{id_utilisateur}' => 'Retire un utilisateur d\'une tâche'
                ]
            ]
        ];
        
        $response->getBody()->write(json_encode($routes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return $response->withHeader('Content-Type', 'application/json; charset=utf-8');
    });

    // ========================================
    // ROUTES AUTHENTIFICATION
    // ========================================
    
    $app->post('/login', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        
        if (!isset($data['email']) || !isset($data['password'])) {
            $response->getBody()->write(json_encode(['error' => 'Email et mot de passe requis']));
            return $response->withStatus(400)->withHeader('Content-Type', 'application/json');
        }
        
        $user = $capsule->table('Utilisateur')
            ->where('email_utilisateur', $data['email'])
            ->first();
        
        if (!$user) {
            $response->getBody()->write(json_encode(['error' => 'Email ou mot de passe incorrect']));
            return $response->withStatus(401)->withHeader('Content-Type', 'application/json');
        }
        
        if (!password_verify($data['password'], $user->mot_de_passe)) {
            $response->getBody()->write(json_encode(['error' => 'Email ou mot de passe incorrect']));
            return $response->withStatus(401)->withHeader('Content-Type', 'application/json');
        }
        
        $_SESSION['user_id'] = $user->id_utilisateur;
        $_SESSION['user_email'] = $user->email_utilisateur;
        $_SESSION['user_nom'] = $user->nom_utilisateur;
        $_SESSION['user_prenom'] = $user->prenom_utilisateur;
        $_SESSION['est_interne'] = $user->est_interne;
        $_SESSION['logged_in'] = true;
        
        $response->getBody()->write(json_encode([
            'message' => 'Connexion réussie',
            'user' => [
                'id' => $user->id_utilisateur,
                'nom' => $user->nom_utilisateur,
                'prenom' => $user->prenom_utilisateur,
                'email' => $user->email_utilisateur,
                'est_interne' => $user->est_interne
            ]
        ]));
        
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    });
    
    $app->post('/register', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        
        if (!isset($data['nom_utilisateur']) || !isset($data['prenom_utilisateur']) || 
            !isset($data['email_utilisateur']) || !isset($data['mot_de_passe'])) {
            $response->getBody()->write(json_encode(['error' => 'Tous les champs sont requis']));
            return $response->withStatus(400)->withHeader('Content-Type', 'application/json');
        }
        
        $existing = $capsule->table('Utilisateur')
            ->where('email_utilisateur', $data['email_utilisateur'])
            ->first();
        
        if ($existing) {
            $response->getBody()->write(json_encode(['error' => 'Cet email est déjà utilisé']));
            return $response->withStatus(409)->withHeader('Content-Type', 'application/json');
        }
        
        $hashedPassword = password_hash($data['mot_de_passe'], PASSWORD_BCRYPT);
        
        $userId = $capsule->table('Utilisateur')->insertGetId([
            'nom_utilisateur' => $data['nom_utilisateur'],
            'prenom_utilisateur' => $data['prenom_utilisateur'],
            'email_utilisateur' => $data['email_utilisateur'],
            'mot_de_passe' => $hashedPassword,
            'est_interne' => $data['est_interne'] ?? true,
            'Equipe_id_equipe' => $data['Equipe_id_equipe'] ?? null
        ]);
        
        $_SESSION['user_id'] = $userId;
        $_SESSION['user_email'] = $data['email_utilisateur'];
        $_SESSION['user_nom'] = $data['nom_utilisateur'];
        $_SESSION['user_prenom'] = $data['prenom_utilisateur'];
        $_SESSION['logged_in'] = true;
        
        $response->getBody()->write(json_encode([
            'message' => 'Inscription réussie',
            'user' => [
                'id' => $userId,
                'nom' => $data['nom_utilisateur'],
                'prenom' => $data['prenom_utilisateur'],
                'email' => $data['email_utilisateur']
            ]
        ]));
        
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });
    
    $app->post('/logout', function (Request $request, Response $response) {
        session_destroy();
        $response->getBody()->write(json_encode(['message' => 'Déconnexion réussie']));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    });
    
    $app->get('/check-session', function (Request $request, Response $response) {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $response->getBody()->write(json_encode([
                'authenticated' => true,
                'user' => [
                    'id' => $_SESSION['user_id'],
                    'nom' => $_SESSION['user_nom'],
                    'prenom' => $_SESSION['user_prenom'],
                    'email' => $_SESSION['user_email'],
                    'est_interne' => $_SESSION['est_interne'] ?? null
                ]
            ]));
        } else {
            $response->getBody()->write(json_encode(['authenticated' => false]));
        }
        
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES EQUIPE
    // ========================================
    
    $app->get('/equipes', function (Request $request, Response $response) use ($capsule) {
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            $response->getBody()->write(json_encode(['error' => 'Non authentifié']));
            return $response->withStatus(401)->withHeader('Content-Type', 'application/json');
        }
        
        $equipes = $capsule->table('Equipe')->get();
        $response->getBody()->write(json_encode($equipes));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/equipes/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $equipe = $capsule->table('Equipe')->where('id_equipe', $args['id'])->first();
        if (!$equipe) {
            $response->getBody()->write(json_encode(['error' => 'Equipe non trouvée']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($equipe));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/equipes', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        $id = $capsule->table('Equipe')->insertGetId([
            'nom_equipe' => $data['nom_equipe']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Equipe créée']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    $app->put('/equipes/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $data = $request->getParsedBody();
        $capsule->table('Equipe')->where('id_equipe', $args['id'])->update([
            'nom_equipe' => $data['nom_equipe']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Equipe mise à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/equipes/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('Equipe')->where('id_equipe', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Equipe supprimée']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES UTILISATEUR
    // ========================================
    
    $app->get('/utilisateurs', function (Request $request, Response $response) use ($capsule) {
        $users = $capsule->table('Utilisateur')->get();
        $response->getBody()->write($users->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/utilisateurs/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $user = $capsule->table('Utilisateur')->where('id_utilisateur', $args['id'])->first();
        if (!$user) {
            $response->getBody()->write(json_encode(['error' => 'Utilisateur non trouvé']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($user));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/utilisateurs', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        
        if (!isset($data['nom_utilisateur']) || !isset($data['prenom_utilisateur']) || !isset($data['email_utilisateur']) || !isset($data['mot_de_passe'])) {
            $response->getBody()->write(json_encode(['error' => 'Données manquantes']));
            return $response->withStatus(400)->withHeader('Content-Type', 'application/json');
        }
        
        $existing = $capsule->table('Utilisateur')
            ->where('email_utilisateur', $data['email_utilisateur'])
            ->first();
        
        if ($existing) {
            $response->getBody()->write(json_encode(['error' => 'Email déjà utilisé']));
            return $response->withStatus(409)->withHeader('Content-Type', 'application/json');
        }

        $hashedPassword = password_hash($data['mot_de_passe'], PASSWORD_BCRYPT);
        
        $id = $capsule->table('Utilisateur')->insertGetId([
            'nom_utilisateur' => $data['nom_utilisateur'],
            'prenom_utilisateur' => $data['prenom_utilisateur'],
            'email_utilisateur' => $data['email_utilisateur'],
            'mot_de_passe' => $hashedPassword,
            'est_interne' => $data['est_interne'] ?? true,
            'Equipe_id_equipe' => $data['Equipe_id_equipe'] ?? null
        ]);
        
        $response->getBody()->write(json_encode([
            'message' => 'Utilisateur créé avec succès',
            'id' => $id
        ]));
        
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    $app->put('/utilisateurs/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $data = $request->getParsedBody();
        $updateData = [
            'nom_utilisateur' => $data['nom_utilisateur'],
            'prenom_utilisateur' => $data['prenom_utilisateur'],
            'email_utilisateur' => $data['email_utilisateur'],
            'est_interne' => $data['est_interne'],
            'Equipe_id_equipe' => $data['Equipe_id_equipe']
        ];
        if (isset($data['mot_de_passe'])) {
            $updateData['mot_de_passe'] = password_hash($data['mot_de_passe'], PASSWORD_DEFAULT);
        }
        $capsule->table('Utilisateur')->where('id_utilisateur', $args['id'])->update($updateData);
        $response->getBody()->write(json_encode(['message' => 'Utilisateur mis à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/utilisateurs/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('Utilisateur')->where('id_utilisateur', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Utilisateur supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES PROJET
    // ========================================
    
    $app->get('/projets', function (Request $request, Response $response) use ($capsule) {
        $projets = $capsule->table('Projet')->get();
        $response->getBody()->write($projets->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/projets/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $projet = $capsule->table('Projet')->where('id_projet', $args['id'])->first();
        if (!$projet) {
            $response->getBody()->write(json_encode(['error' => 'Projet non trouvé']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($projet));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/utilisateurs/{id}/projets', function (Request $request, Response $response, array $args) use ($capsule) {
        $projets = $capsule->table('Projet')
            ->where('Utilisateur_id_utilisateur', $args['id'])
            ->get();
        $response->getBody()->write($projets->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/projets', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        $id = $capsule->table('Projet')->insertGetId([
            'titre_projet' => $data['titre_projet'],
            'etat_projet' => $data['etat_projet'],
            'description_projet' => $data['description_projet'],
            'date_creation_projet' => date('Y-m-d H:i:s'),
            'Utilisateur_id_utilisateur' => $data['Utilisateur_id_utilisateur']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Projet créé']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    $app->put('/projets/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $data = $request->getParsedBody();
        $capsule->table('Projet')->where('id_projet', $args['id'])->update([
            'titre_projet' => $data['titre_projet'],
            'etat_projet' => $data['etat_projet'],
            'description_projet' => $data['description_projet']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Projet mis à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/projets/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('Projet')->where('id_projet', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Projet supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES NOTE
    // ========================================
    
    $app->get('/notes', function (Request $request, Response $response) use ($capsule) {
        $notes = $capsule->table('Note')->get();
        $response->getBody()->write($notes->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/notes/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $note = $capsule->table('Note')->where('id_Note', $args['id'])->first();
        if (!$note) {
            $response->getBody()->write(json_encode(['error' => 'Note non trouvée']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($note));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/projets/{id}/notes', function (Request $request, Response $response, array $args) use ($capsule) {
        $notes = $capsule->table('Note')
            ->where('Projet_id_projet', $args['id'])
            ->get();
        $response->getBody()->write($notes->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/notes', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        $id = $capsule->table('Note')->insertGetId([
            'titre_note' => $data['titre_note'],
            'etat_note' => $data['etat_note'],
            'description_note' => $data['description_note'],
            'date_creation_note' => date('Y-m-d H:i:s'),
            'Utilisateur_id_utilisateur' => $data['Utilisateur_id_utilisateur'],
            'Projet_id_projet' => $data['Projet_id_projet']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Note créée']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    $app->put('/notes/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $data = $request->getParsedBody();
        $capsule->table('Note')->where('id_Note', $args['id'])->update([
            'titre_note' => $data['titre_note'],
            'etat_note' => $data['etat_note'],
            'description_note' => $data['description_note']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Note mise à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/notes/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('Note')->where('id_Note', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Note supprimée']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES COMMENTAIRE
    // ========================================
    
    $app->get('/commentaires', function (Request $request, Response $response) use ($capsule) {
        $commentaires = $capsule->table('Commentaire')->get();
        $response->getBody()->write($commentaires->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/notes/{id}/commentaires', function (Request $request, Response $response, array $args) use ($capsule) {
        $commentaires = $capsule->table('Commentaire')
            ->where('Note_id_Note', $args['id'])
            ->get();
        $response->getBody()->write($commentaires->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/commentaires', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        $id = $capsule->table('Commentaire')->insertGetId([
            'contenu_commentaire' => $data['contenu_commentaire'],
            'date_commentaire' => date('Y-m-d H:i:s'),
            'Utilisateur_id_utilisateur' => $data['Utilisateur_id_utilisateur'],
            'Note_id_Note' => $data['Note_id_Note']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Commentaire créé']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    $app->put('/commentaires/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $data = $request->getParsedBody();
        $capsule->table('Commentaire')->where('id_Commentaires', $args['id'])->update([
            'contenu_commentaire' => $data['contenu_commentaire']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Commentaire mis à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/commentaires/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('Commentaire')->where('id_Commentaires', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Commentaire supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES COMPETENCE
    // ========================================
    
    $app->get('/competences', function (Request $request, Response $response) use ($capsule) {
        $competences = $capsule->table('Competence')->get();
        $response->getBody()->write($competences->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/competences/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $competence = $capsule->table('Competence')->where('id_Competence', $args['id'])->first();
        if (!$competence) {
            $response->getBody()->write(json_encode(['error' => 'Compétence non trouvée']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($competence));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/competences', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        $id = $capsule->table('Competence')->insertGetId([
            'nom_competence' => $data['nom_competence']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Compétence créée']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    $app->put('/competences/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $data = $request->getParsedBody();
        $capsule->table('Competence')->where('id_Competence', $args['id'])->update([
            'nom_competence' => $data['nom_competence']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Compétence mise à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/competences/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('Competence')->where('id_Competence', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Compétence supprimée']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES COULEUR
    // ========================================
    
    $app->get('/couleurs', function (Request $request, Response $response) use ($capsule) {
        $couleurs = $capsule->table('Couleur')->get();
        $response->getBody()->write($couleurs->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/couleurs/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $couleur = $capsule->table('Couleur')->where('id_couleur', $args['id'])->first();
        if (!$couleur) {
            $response->getBody()->write(json_encode(['error' => 'Couleur non trouvée']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($couleur));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/couleurs', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        $id = $capsule->table('Couleur')->insertGetId([
            'code_hexa' => $data['code_hexa']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Couleur créée']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    $app->put('/couleurs/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $data = $request->getParsedBody();
        $capsule->table('Couleur')->where('id_couleur', $args['id'])->update([
            'code_hexa' => $data['code_hexa']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Couleur mise à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/couleurs/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('Couleur')->where('id_couleur', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Couleur supprimée']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES TYPE_FICHIER
    // ========================================
    
    $app->get('/types-fichier', function (Request $request, Response $response) use ($capsule) {
        $types = $capsule->table('Type_fichier')->get();
        $response->getBody()->write($types->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/types-fichier/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $type = $capsule->table('Type_fichier')->where('id_type_fichier', $args['id'])->first();
        if (!$type) {
            $response->getBody()->write(json_encode(['error' => 'Type de fichier non trouvé']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($type));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/types-fichier', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        $id = $capsule->table('Type_fichier')->insertGetId([
            'nom_type_fichier' => $data['nom_type_fichier']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Type de fichier créé']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    $app->put('/types-fichier/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $data = $request->getParsedBody();
        $capsule->table('Type_fichier')->where('id_type_fichier', $args['id'])->update([
            'nom_type_fichier' => $data['nom_type_fichier']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Type de fichier mis à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/types-fichier/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('Type_fichier')->where('id_type_fichier', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Type de fichier supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES DOCUMENT
    // ========================================
    
    $app->get('/documents', function (Request $request, Response $response) use ($capsule) {
        $documents = $capsule->table('Document')->get();
        $response->getBody()->write($documents->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/notes/{id}/documents', function (Request $request, Response $response, array $args) use ($capsule) {
        $documents = $capsule->table('Document')
            ->where('Note_id_Note', $args['id'])
            ->get();
        $response->getBody()->write($documents->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/documents', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        $id = $capsule->table('Document')->insertGetId([
            'nom_fichier' => $data['nom_fichier'],
            'taille_fichier' => $data['taille_fichier'],
            'chemin_fichier' => $data['chemin_fichier'],
            'date_ajout' => date('Y-m-d H:i:s'),
            'Note_id_Note' => $data['Note_id_Note'],
            'Type_fichier_id_type_fichier' => $data['Type_fichier_id_type_fichier']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Document créé']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/documents/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('Document')->where('id_Document', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Document supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES NOTIFICATION
    // ========================================
    
    $app->get('/notifications', function (Request $request, Response $response) use ($capsule) {
        $notifications = $capsule->table('Notification')->get();
        $response->getBody()->write($notifications->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/utilisateurs/{id}/notifications', function (Request $request, Response $response, array $args) use ($capsule) {
        $notifications = $capsule->table('UtilisateurNotification')
            ->join('Notification', 'UtilisateurNotification.Notification_id_Notification', '=', 'Notification.id_Notification')
            ->where('UtilisateurNotification.Utilisateur_id_Utilisateur', $args['id'])
            ->select('Notification.*', 'UtilisateurNotification.date_lecture')
            ->get();
        $response->getBody()->write($notifications->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/notifications', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        $id = $capsule->table('Notification')->insertGetId([
            'message' => $data['message'],
            'date_notification' => date('Y-m-d H:i:s')
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Notification créée']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/notifications/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('Notification')->where('id_Notification', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Notification supprimée']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES ROLE
    // ========================================
    
    $app->get('/roles', function (Request $request, Response $response) use ($capsule) {
        $roles = $capsule->table('Role')->get();
        $response->getBody()->write($roles->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/roles/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $role = $capsule->table('Role')->where('id_role', $args['id'])->first();
        if (!$role) {
            $response->getBody()->write(json_encode(['error' => 'Rôle non trouvé']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($role));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/roles', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        $id = $capsule->table('Role')->insertGetId([
            'nom_role' => $data['nom_role']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Rôle créé']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    $app->put('/roles/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $data = $request->getParsedBody();
        $capsule->table('Role')->where('id_role', $args['id'])->update([
            'nom_role' => $data['nom_role']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Rôle mis à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/roles/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('Role')->where('id_role', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Rôle supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES TAG
    // ========================================
    
    $app->get('/tags', function (Request $request, Response $response) use ($capsule) {
        $tags = $capsule->table('Tag')->get();
        $response->getBody()->write($tags->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/tags/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $tag = $capsule->table('Tag')->where('id_tag', $args['id'])->first();
        if (!$tag) {
            $response->getBody()->write(json_encode(['error' => 'Tag non trouvé']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($tag));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/utilisateurs/{id}/tags', function (Request $request, Response $response, array $args) use ($capsule) {
        $tags = $capsule->table('Tag')
            ->where('Utilisateur_id_Utilisateur', $args['id'])
            ->get();
        $response->getBody()->write($tags->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/tags', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        $id = $capsule->table('Tag')->insertGetId([
            'titre_tag' => $data['titre_tag'],
            'Couleur_id_Couleur' => $data['Couleur_id_Couleur'],
            'Utilisateur_id_Utilisateur' => $data['Utilisateur_id_Utilisateur']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Tag créé']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    $app->put('/tags/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $data = $request->getParsedBody();
        $capsule->table('Tag')->where('id_tag', $args['id'])->update([
            'titre_tag' => $data['titre_tag'],
            'Couleur_id_Couleur' => $data['Couleur_id_Couleur']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Tag mis à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/tags/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('Tag')->where('id_tag', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Tag supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES TACHE
    // ========================================
    
    $app->get('/taches', function (Request $request, Response $response) use ($capsule) {
        $taches = $capsule->table('Tache')->get();
        $response->getBody()->write($taches->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/projets/{id}/taches', function (Request $request, Response $response, array $args) use ($capsule) {
        $taches = $capsule->table('Tache')
            ->where('Projet_id_projet', $args['id'])
            ->get();
        $response->getBody()->write($taches->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/taches', function (Request $request, Response $response) use ($capsule) {
        $data = $request->getParsedBody();
        $id = $capsule->table('Tache')->insertGetId([
            'titre_tache' => $data['titre_tache'],
            'description_tache' => $data['description_tache'],
            'etat_tache' => $data['etat_tache'],
            'Projet_id_projet' => $data['Projet_id_projet']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Tâche créée']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    $app->put('/taches/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $data = $request->getParsedBody();
        $capsule->table('Tache')->where('id_tache', $args['id'])->update([
            'titre_tache' => $data['titre_tache'],
            'description_tache' => $data['description_tache'],
            'etat_tache' => $data['etat_tache']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Tâche mise à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/taches/{id}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('Tache')->where('id_tache', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Tâche supprimée']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES ASSOCIATIONS (Tables de liaison)
    // ========================================

    // Associer un utilisateur à un projet
    $app->post('/projets/{id_projet}/utilisateurs/{id_utilisateur}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('ProjetUtilisateur')->insert([
            'Projet_id_Projet' => $args['id_projet'],
            'Utilisateur_id_Utilisateur' => $args['id_utilisateur']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Utilisateur associé au projet']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer un utilisateur d'un projet
    $app->delete('/projets/{id_projet}/utilisateurs/{id_utilisateur}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('ProjetUtilisateur')
            ->where('Projet_id_Projet', $args['id_projet'])
            ->where('Utilisateur_id_Utilisateur', $args['id_utilisateur'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Utilisateur retiré du projet']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer un tag à un projet
    $app->post('/projets/{id_projet}/tags/{id_tag}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('ProjetTag')->insert([
            'Projet_id_projet' => $args['id_projet'],
            'Tag_id_tag' => $args['id_tag']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Tag associé au projet']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer un tag d'un projet
    $app->delete('/projets/{id_projet}/tags/{id_tag}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('ProjetTag')
            ->where('Projet_id_projet', $args['id_projet'])
            ->where('Tag_id_tag', $args['id_tag'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Tag retiré du projet']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer un tag à une note
    $app->post('/notes/{id_note}/tags/{id_tag}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('TagNote')->insert([
            'Note_id_Note' => $args['id_note'],
            'Tag_id_tag' => $args['id_tag']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Tag associé à la note']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer un tag d'une note
    $app->delete('/notes/{id_note}/tags/{id_tag}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('TagNote')
            ->where('Note_id_Note', $args['id_note'])
            ->where('Tag_id_tag', $args['id_tag'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Tag retiré de la note']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer une compétence à un utilisateur
    $app->post('/utilisateurs/{id_utilisateur}/competences/{id_competence}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('UtilisateurCompetence')->insert([
            'Utilisateur_id_Utilisateur' => $args['id_utilisateur'],
            'Competence_id_Competence' => $args['id_competence']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Compétence associée à l\'utilisateur']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer une compétence d'un utilisateur
    $app->delete('/utilisateurs/{id_utilisateur}/competences/{id_competence}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('UtilisateurCompetence')
            ->where('Utilisateur_id_Utilisateur', $args['id_utilisateur'])
            ->where('Competence_id_Competence', $args['id_competence'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Compétence retirée de l\'utilisateur']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer un rôle à un utilisateur
    $app->post('/utilisateurs/{id_utilisateur}/roles/{id_role}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('RoleUtilisateur')->insert([
            'Utilisateur_id_Utilisateur' => $args['id_utilisateur'],
            'Role_id_Role' => $args['id_role']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Rôle associé à l\'utilisateur']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer un rôle d'un utilisateur
    $app->delete('/utilisateurs/{id_utilisateur}/roles/{id_role}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('RoleUtilisateur')
            ->where('Utilisateur_id_Utilisateur', $args['id_utilisateur'])
            ->where('Role_id_Role', $args['id_role'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Rôle retiré de l\'utilisateur']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer un utilisateur à une tâche
    $app->post('/taches/{id_tache}/utilisateurs/{id_utilisateur}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('UtilisateurTache')->insert([
            'Tache_id_tache' => $args['id_tache'],
            'Utilisateur_id_utilisateur' => $args['id_utilisateur']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Utilisateur associé à la tâche']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer un utilisateur d'une tâche
    $app->delete('/taches/{id_tache}/utilisateurs/{id_utilisateur}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('UtilisateurTache')
            ->where('Tache_id_tache', $args['id_tache'])
            ->where('Utilisateur_id_utilisateur', $args['id_utilisateur'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Utilisateur retiré de la tâche']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer un utilisateur à une note
    $app->post('/notes/{id_note}/utilisateurs/{id_utilisateur}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('NoteUtilisateur')->insert([
            'Note_id_Note' => $args['id_note'],
            'Utilisateur_id_Utilisateur' => $args['id_utilisateur']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Utilisateur associé à la note']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer un utilisateur d'une note
    $app->delete('/notes/{id_note}/utilisateurs/{id_utilisateur}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('NoteUtilisateur')
            ->where('Note_id_Note', $args['id_note'])
            ->where('Utilisateur_id_Utilisateur', $args['id_utilisateur'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Utilisateur retiré de la note']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer une notification à un utilisateur
    $app->post('/utilisateurs/{id_utilisateur}/notifications/{id_notification}', function (Request $request, Response $response, array $args) use ($capsule) {
        $capsule->table('UtilisateurNotification')->insert([
            'Utilisateur_id_Utilisateur' => $args['id_utilisateur'],
            'Notification_id_Notification' => $args['id_notification'],
            'date_lecture' => null
        ]);
        $response->getBody()->write(json_encode(['message' => 'Notification associée à l\'utilisateur']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

};

