<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function ($app) {

    // ========================================
    // ROUTE D'ACCUEIL - Documentation API
    // ========================================
    
    $app->get('/', function (Request $request, Response $response) {
        $routes = [
            'message' => 'Bienvenue sur l\'API Projet Memory',
            'version' => '1.0',
            'endpoints' => [
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
                    'POST /utilisateurs/{id_utilisateur}/notifications/{id_notification}' => 'Associe une notification à un utilisateur'
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
    // ROUTES EQUIPE
    // ========================================
    
    // GET - Liste toutes les équipes
    $app->get('/equipes', function (Request $request, Response $response) {
        $equipes = $this->get('db')->table('Equipe')->get();
        $response->getBody()->write($equipes->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère une équipe par ID
    $app->get('/equipes/{id}', function (Request $request, Response $response, array $args) {
        $equipe = $this->get('db')->table('Equipe')->where('id_equipe', $args['id'])->first();
        if (!$equipe) {
            $response->getBody()->write(json_encode(['error' => 'Equipe non trouvée']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($equipe));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // POST - Crée une nouvelle équipe
    $app->post('/equipes', function (Request $request, Response $response) {
        $data = $request->getParsedBody();
        $id = $this->get('db')->table('Equipe')->insertGetId([
            'nom_equipe' => $data['nom_equipe']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Equipe créée']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // PUT - Met à jour une équipe
    $app->put('/equipes/{id}', function (Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $updated = $this->get('db')->table('Equipe')->where('id_equipe', $args['id'])->update([
            'nom_equipe' => $data['nom_equipe']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Equipe mise à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // DELETE - Supprime une équipe
    $app->delete('/equipes/{id}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('Equipe')->where('id_equipe', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Equipe supprimée']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES UTILISATEUR
    // ========================================
    
    // GET - Liste tous les utilisateurs
    $app->get('/utilisateurs', function (Request $request, Response $response) {
        $users = $this->get('db')->table('Utilisateur')->get();
        $response->getBody()->write($users->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère un utilisateur par ID
    $app->get('/utilisateurs/{id}', function (Request $request, Response $response, array $args) {
        $user = $this->get('db')->table('Utilisateur')->where('id_utilisateur', $args['id'])->first();
        if (!$user) {
            $response->getBody()->write(json_encode(['error' => 'Utilisateur non trouvé']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($user));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // POST - Crée un nouvel utilisateur
    $app->post('/utilisateurs', function (Request $request, Response $response) {
        $data = $request->getParsedBody();
        
        if (!isset($data['nom_utilisateur']) || !isset($data['prenom_utilisateur']) || !isset($data['email_utilisateur']) || !isset($data['mot_de_passe'])) {
            $response->getBody()->write(json_encode(['error' => 'Données manquantes. Champs requis: nom_utilisateur, prenom_utilisateur, email_utilisateur, mot_de_passe']));
            return $response->withStatus(400)->withHeader('Content-Type', 'application/json');
        }
        
        $existing = $this->get('db')->table('Utilisateur')
            ->where('email_utilisateur', $data['email_utilisateur'])
            ->first();
        
        if ($existing) {
            $response->getBody()->write(json_encode(['error' => 'Email déjà utilisé']));
            return $response->withStatus(409)->withHeader('Content-Type', 'application/json');
        }

        $hashedPassword = password_hash($data['mot_de_passe'], PASSWORD_BCRYPT);
        
        $id = $this->get('db')->table('Utilisateur')->insertGetId([
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

    // PUT - Met à jour un utilisateur
    $app->put('/utilisateurs/{id}', function (Request $request, Response $response, array $args) {
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
        $this->get('db')->table('Utilisateur')->where('id_utilisateur', $args['id'])->update($updateData);
        $response->getBody()->write(json_encode(['message' => 'Utilisateur mis à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // DELETE - Supprime un utilisateur
    $app->delete('/utilisateurs/{id}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('Utilisateur')->where('id_utilisateur', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Utilisateur supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES PROJET
    // ========================================
    
    // GET - Liste tous les projets
    $app->get('/projets', function (Request $request, Response $response) {
        $projets = $this->get('db')->table('Projet')->get();
        $response->getBody()->write($projets->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère un projet par ID
    $app->get('/projets/{id}', function (Request $request, Response $response, array $args) {
        $projet = $this->get('db')->table('Projet')->where('id_projet', $args['id'])->first();
        if (!$projet) {
            $response->getBody()->write(json_encode(['error' => 'Projet non trouvé']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($projet));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère tous les projets d'un utilisateur
    $app->get('/utilisateurs/{id}/projets', function (Request $request, Response $response, array $args) {
        $projets = $this->get('db')->table('Projet')
            ->where('Utilisateur_id_utilisateur', $args['id'])
            ->get();
        $response->getBody()->write($projets->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // POST - Crée un nouveau projet
    $app->post('/projets', function (Request $request, Response $response) {
        $data = $request->getParsedBody();
        $id = $this->get('db')->table('Projet')->insertGetId([
            'titre_projet' => $data['titre_projet'],
            'etat_projet' => $data['etat_projet'],
            'description_projet' => $data['description_projet'],
            'date_creation_projet' => date('Y-m-d H:i:s'),
            'Utilisateur_id_utilisateur' => $data['Utilisateur_id_utilisateur']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Projet créé']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // PUT - Met à jour un projet
    $app->put('/projets/{id}', function (Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $this->get('db')->table('Projet')->where('id_projet', $args['id'])->update([
            'titre_projet' => $data['titre_projet'],
            'etat_projet' => $data['etat_projet'],
            'description_projet' => $data['description_projet']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Projet mis à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // DELETE - Supprime un projet
    $app->delete('/projets/{id}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('Projet')->where('id_projet', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Projet supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES NOTE
    // ========================================
    
    // GET - Liste toutes les notes
    $app->get('/notes', function (Request $request, Response $response) {
        $notes = $this->get('db')->table('Note')->get();
        $response->getBody()->write($notes->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère une note par ID
    $app->get('/notes/{id}', function (Request $request, Response $response, array $args) {
        $note = $this->get('db')->table('Note')->where('id_Note', $args['id'])->first();
        if (!$note) {
            $response->getBody()->write(json_encode(['error' => 'Note non trouvée']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($note));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère toutes les notes d'un projet
    $app->get('/projets/{id}/notes', function (Request $request, Response $response, array $args) {
        $notes = $this->get('db')->table('Note')
            ->where('Projet_id_projet', $args['id'])
            ->get();
        $response->getBody()->write($notes->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // POST - Crée une nouvelle note
    $app->post('/notes', function (Request $request, Response $response) {
        $data = $request->getParsedBody();
        $id = $this->get('db')->table('Note')->insertGetId([
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

    // PUT - Met à jour une note
    $app->put('/notes/{id}', function (Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $this->get('db')->table('Note')->where('id_Note', $args['id'])->update([
            'titre_note' => $data['titre_note'],
            'etat_note' => $data['etat_note'],
            'description_note' => $data['description_note']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Note mise à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // DELETE - Supprime une note
    $app->delete('/notes/{id}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('Note')->where('id_Note', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Note supprimée']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES COMMENTAIRE
    // ========================================
    
    // GET - Liste tous les commentaires
    $app->get('/commentaires', function (Request $request, Response $response) {
        $commentaires = $this->get('db')->table('Commentaire')->get();
        $response->getBody()->write($commentaires->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère tous les commentaires d'une note
    $app->get('/notes/{id}/commentaires', function (Request $request, Response $response, array $args) {
        $commentaires = $this->get('db')->table('Commentaire')
            ->where('Note_id_Note', $args['id'])
            ->get();
        $response->getBody()->write($commentaires->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // POST - Crée un nouveau commentaire
    $app->post('/commentaires', function (Request $request, Response $response) {
        $data = $request->getParsedBody();
        $id = $this->get('db')->table('Commentaire')->insertGetId([
            'contenu_commentaire' => $data['contenu_commentaire'],
            'date_commentaire' => date('Y-m-d H:i:s'),
            'Utilisateur_id_utilisateur' => $data['Utilisateur_id_utilisateur'],
            'Note_id_Note' => $data['Note_id_Note']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Commentaire créé']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // PUT - Met à jour un commentaire
    $app->put('/commentaires/{id}', function (Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $this->get('db')->table('Commentaire')->where('id_Commentaires', $args['id'])->update([
            'contenu_commentaire' => $data['contenu_commentaire']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Commentaire mis à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // DELETE - Supprime un commentaire
    $app->delete('/commentaires/{id}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('Commentaire')->where('id_Commentaires', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Commentaire supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES COMPETENCE
    // ========================================
    
    // GET - Liste toutes les compétences
    $app->get('/competences', function (Request $request, Response $response) {
        $competences = $this->get('db')->table('Competence')->get();
        $response->getBody()->write($competences->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère une compétence par ID
    $app->get('/competences/{id}', function (Request $request, Response $response, array $args) {
        $competence = $this->get('db')->table('Competence')->where('id_Competence', $args['id'])->first();
        if (!$competence) {
            $response->getBody()->write(json_encode(['error' => 'Compétence non trouvée']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($competence));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // POST - Crée une nouvelle compétence
    $app->post('/competences', function (Request $request, Response $response) {
        $data = $request->getParsedBody();
        $id = $this->get('db')->table('Competence')->insertGetId([
            'nom_competence' => $data['nom_competence']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Compétence créée']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // PUT - Met à jour une compétence
    $app->put('/competences/{id}', function (Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $this->get('db')->table('Competence')->where('id_Competence', $args['id'])->update([
            'nom_competence' => $data['nom_competence']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Compétence mise à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // DELETE - Supprime une compétence
    $app->delete('/competences/{id}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('Competence')->where('id_Competence', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Compétence supprimée']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES COULEUR
    // ========================================
    
    // GET - Liste toutes les couleurs
    $app->get('/couleurs', function (Request $request, Response $response) {
        $couleurs = $this->get('db')->table('Couleur')->get();
        $response->getBody()->write($couleurs->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère une couleur par ID
    $app->get('/couleurs/{id}', function (Request $request, Response $response, array $args) {
        $couleur = $this->get('db')->table('Couleur')->where('id_couleur', $args['id'])->first();
        if (!$couleur) {
            $response->getBody()->write(json_encode(['error' => 'Couleur non trouvée']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($couleur));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // POST - Crée une nouvelle couleur
    $app->post('/couleurs', function (Request $request, Response $response) {
        $data = $request->getParsedBody();
        $id = $this->get('db')->table('Couleur')->insertGetId([
            'code_hexa' => $data['code_hexa']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Couleur créée']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // PUT - Met à jour une couleur
    $app->put('/couleurs/{id}', function (Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $this->get('db')->table('Couleur')->where('id_couleur', $args['id'])->update([
            'code_hexa' => $data['code_hexa']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Couleur mise à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // DELETE - Supprime une couleur
    $app->delete('/couleurs/{id}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('Couleur')->where('id_couleur', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Couleur supprimée']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES TYPE_FICHIER
    // ========================================
    
    // GET - Liste tous les types de fichier
    $app->get('/types-fichier', function (Request $request, Response $response) {
        $types = $this->get('db')->table('Type_fichier')->get();
        $response->getBody()->write($types->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère un type de fichier par ID
    $app->get('/types-fichier/{id}', function (Request $request, Response $response, array $args) {
        $type = $this->get('db')->table('Type_fichier')->where('id_type_fichier', $args['id'])->first();
        if (!$type) {
            $response->getBody()->write(json_encode(['error' => 'Type de fichier non trouvé']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($type));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // POST - Crée un nouveau type de fichier
    $app->post('/types-fichier', function (Request $request, Response $response) {
        $data = $request->getParsedBody();
        $id = $this->get('db')->table('Type_fichier')->insertGetId([
            'nom_type_fichier' => $data['nom_type_fichier']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Type de fichier créé']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // PUT - Met à jour un type de fichier
    $app->put('/types-fichier/{id}', function (Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $this->get('db')->table('Type_fichier')->where('id_type_fichier', $args['id'])->update([
            'nom_type_fichier' => $data['nom_type_fichier']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Type de fichier mis à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // DELETE - Supprime un type de fichier
    $app->delete('/types-fichier/{id}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('Type_fichier')->where('id_type_fichier', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Type de fichier supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES DOCUMENT
    // ========================================
    
    // GET - Liste tous les documents
    $app->get('/documents', function (Request $request, Response $response) {
        $documents = $this->get('db')->table('Document')->get();
        $response->getBody()->write($documents->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère tous les documents d'une note
    $app->get('/notes/{id}/documents', function (Request $request, Response $response, array $args) {
        $documents = $this->get('db')->table('Document')
            ->where('Note_id_Note', $args['id'])
            ->get();
        $response->getBody()->write($documents->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // POST - Crée un nouveau document
    $app->post('/documents', function (Request $request, Response $response) {
        $data = $request->getParsedBody();
        $id = $this->get('db')->table('Document')->insertGetId([
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

    // DELETE - Supprime un document
    $app->delete('/documents/{id}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('Document')->where('id_Document', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Document supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES NOTIFICATION
    // ========================================
    
    // GET - Liste toutes les notifications
    $app->get('/notifications', function (Request $request, Response $response) {
        $notifications = $this->get('db')->table('Notification')->get();
        $response->getBody()->write($notifications->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère toutes les notifications d'un utilisateur
    $app->get('/utilisateurs/{id}/notifications', function (Request $request, Response $response, array $args) {
        $notifications = $this->get('db')->table('UtilisateurNotification')
            ->join('Notification', 'UtilisateurNotification.Notification_id_Notification', '=', 'Notification.id_Notification')
            ->where('UtilisateurNotification.Utilisateur_id_Utilisateur', $args['id'])
            ->select('Notification.*', 'UtilisateurNotification.date_lecture')
            ->get();
        $response->getBody()->write($notifications->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // POST - Crée une nouvelle notification
    $app->post('/notifications', function (Request $request, Response $response) {
        $data = $request->getParsedBody();
        $id = $this->get('db')->table('Notification')->insertGetId([
            'message' => $data['message'],
            'date_notification' => date('Y-m-d H:i:s')
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Notification créée']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // DELETE - Supprime une notification
    $app->delete('/notifications/{id}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('Notification')->where('id_Notification', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Notification supprimée']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES ROLE
    // ========================================
    
    // GET - Liste tous les rôles
    $app->get('/roles', function (Request $request, Response $response) {
        $roles = $this->get('db')->table('Role')->get();
        $response->getBody()->write($roles->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère un rôle par ID
    $app->get('/roles/{id}', function (Request $request, Response $response, array $args) {
        $role = $this->get('db')->table('Role')->where('id_role', $args['id'])->first();
        if (!$role) {
            $response->getBody()->write(json_encode(['error' => 'Rôle non trouvé']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($role));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // POST - Crée un nouveau rôle
    $app->post('/roles', function (Request $request, Response $response) {
        $data = $request->getParsedBody();
        $id = $this->get('db')->table('Role')->insertGetId([
            'nom_role' => $data['nom_role']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Rôle créé']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // PUT - Met à jour un rôle
    $app->put('/roles/{id}', function (Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $this->get('db')->table('Role')->where('id_role', $args['id'])->update([
            'nom_role' => $data['nom_role']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Rôle mis à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // DELETE - Supprime un rôle
    $app->delete('/roles/{id}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('Role')->where('id_role', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Rôle supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES TAG
    // ========================================
    
    // GET - Liste tous les tags
    $app->get('/tags', function (Request $request, Response $response) {
        $tags = $this->get('db')->table('Tag')->get();
        $response->getBody()->write($tags->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère un tag par ID
    $app->get('/tags/{id}', function (Request $request, Response $response, array $args) {
        $tag = $this->get('db')->table('Tag')->where('id_tag', $args['id'])->first();
        if (!$tag) {
            $response->getBody()->write(json_encode(['error' => 'Tag non trouvé']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($tag));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère tous les tags d'un utilisateur
    $app->get('/utilisateurs/{id}/tags', function (Request $request, Response $response, array $args) {
        $tags = $this->get('db')->table('Tag')
            ->where('Utilisateur_id_Utilisateur', $args['id'])
            ->get();
        $response->getBody()->write($tags->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // POST - Crée un nouveau tag
    $app->post('/tags', function (Request $request, Response $response) {
        $data = $request->getParsedBody();
        $id = $this->get('db')->table('Tag')->insertGetId([
            'titre_tag' => $data['titre_tag'],
            'Couleur_id_Couleur' => $data['Couleur_id_Couleur'],
            'Utilisateur_id_Utilisateur' => $data['Utilisateur_id_Utilisateur']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Tag créé']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // PUT - Met à jour un tag
    $app->put('/tags/{id}', function (Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $this->get('db')->table('Tag')->where('id_tag', $args['id'])->update([
            'titre_tag' => $data['titre_tag'],
            'Couleur_id_Couleur' => $data['Couleur_id_Couleur']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Tag mis à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // DELETE - Supprime un tag
    $app->delete('/tags/{id}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('Tag')->where('id_tag', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Tag supprimé']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES TACHE
    // ========================================
    
    // GET - Liste toutes les tâches
    $app->get('/taches', function (Request $request, Response $response) {
        $taches = $this->get('db')->table('Tache')->get();
        $response->getBody()->write($taches->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // GET - Récupère toutes les tâches d'un projet
    $app->get('/projets/{id}/taches', function (Request $request, Response $response, array $args) {
        $taches = $this->get('db')->table('Tache')
            ->where('Projet_id_projet', $args['id'])
            ->get();
        $response->getBody()->write($taches->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    });

    // POST - Crée une nouvelle tâche
    $app->post('/taches', function (Request $request, Response $response) {
        $data = $request->getParsedBody();
        $id = $this->get('db')->table('Tache')->insertGetId([
            'titre_tache' => $data['titre_tache'],
            'description_tache' => $data['description_tache'],
            'etat_tache' => $data['etat_tache'],
            'Projet_id_projet' => $data['Projet_id_projet']
        ]);
        $response->getBody()->write(json_encode(['id' => $id, 'message' => 'Tâche créée']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // PUT - Met à jour une tâche
    $app->put('/taches/{id}', function (Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $this->get('db')->table('Tache')->where('id_tache', $args['id'])->update([
            'titre_tache' => $data['titre_tache'],
            'description_tache' => $data['description_tache'],
            'etat_tache' => $data['etat_tache']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Tâche mise à jour']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // DELETE - Supprime une tâche
    $app->delete('/taches/{id}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('Tache')->where('id_tache', $args['id'])->delete();
        $response->getBody()->write(json_encode(['message' => 'Tâche supprimée']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // ========================================
    // ROUTES ASSOCIATIONS (Tables de liaison)
    // ========================================

    // Associer un utilisateur à un projet
    $app->post('/projets/{id_projet}/utilisateurs/{id_utilisateur}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('ProjetUtilisateur')->insert([
            'Projet_id_Projet' => $args['id_projet'],
            'Utilisateur_id_Utilisateur' => $args['id_utilisateur']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Utilisateur associé au projet']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer un utilisateur d'un projet
    $app->delete('/projets/{id_projet}/utilisateurs/{id_utilisateur}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('ProjetUtilisateur')
            ->where('Projet_id_Projet', $args['id_projet'])
            ->where('Utilisateur_id_Utilisateur', $args['id_utilisateur'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Utilisateur retiré du projet']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer un tag à un projet
    $app->post('/projets/{id_projet}/tags/{id_tag}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('ProjetTag')->insert([
            'Projet_id_projet' => $args['id_projet'],
            'Tag_id_tag' => $args['id_tag']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Tag associé au projet']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer un tag d'un projet
    $app->delete('/projets/{id_projet}/tags/{id_tag}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('ProjetTag')
            ->where('Projet_id_projet', $args['id_projet'])
            ->where('Tag_id_tag', $args['id_tag'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Tag retiré du projet']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer un tag à une note
    $app->post('/notes/{id_note}/tags/{id_tag}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('TagNote')->insert([
            'Note_id_Note' => $args['id_note'],
            'Tag_id_tag' => $args['id_tag']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Tag associé à la note']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer un tag d'une note
    $app->delete('/notes/{id_note}/tags/{id_tag}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('TagNote')
            ->where('Note_id_Note', $args['id_note'])
            ->where('Tag_id_tag', $args['id_tag'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Tag retiré de la note']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer une compétence à un utilisateur
    $app->post('/utilisateurs/{id_utilisateur}/competences/{id_competence}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('UtilisateurCompetence')->insert([
            'Utilisateur_id_Utilisateur' => $args['id_utilisateur'],
            'Competence_id_Competence' => $args['id_competence']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Compétence associée à l\'utilisateur']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer une compétence d'un utilisateur
    $app->delete('/utilisateurs/{id_utilisateur}/competences/{id_competence}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('UtilisateurCompetence')
            ->where('Utilisateur_id_Utilisateur', $args['id_utilisateur'])
            ->where('Competence_id_Competence', $args['id_competence'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Compétence retirée de l\'utilisateur']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer un rôle à un utilisateur
    $app->post('/utilisateurs/{id_utilisateur}/roles/{id_role}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('RoleUtilisateur')->insert([
            'Utilisateur_id_Utilisateur' => $args['id_utilisateur'],
            'Role_id_Role' => $args['id_role']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Rôle associé à l\'utilisateur']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer un rôle d'un utilisateur
    $app->delete('/utilisateurs/{id_utilisateur}/roles/{id_role}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('RoleUtilisateur')
            ->where('Utilisateur_id_Utilisateur', $args['id_utilisateur'])
            ->where('Role_id_Role', $args['id_role'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Rôle retiré de l\'utilisateur']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer un utilisateur à une tâche
    $app->post('/taches/{id_tache}/utilisateurs/{id_utilisateur}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('UtilisateurTache')->insert([
            'Tache_id_tache' => $args['id_tache'],
            'Utilisateur_id_utilisateur' => $args['id_utilisateur']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Utilisateur associé à la tâche']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer un utilisateur d'une tâche
    $app->delete('/taches/{id_tache}/utilisateurs/{id_utilisateur}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('UtilisateurTache')
            ->where('Tache_id_tache', $args['id_tache'])
            ->where('Utilisateur_id_utilisateur', $args['id_utilisateur'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Utilisateur retiré de la tâche']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer un utilisateur à une note
    $app->post('/notes/{id_note}/utilisateurs/{id_utilisateur}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('NoteUtilisateur')->insert([
            'Note_id_Note' => $args['id_note'],
            'Utilisateur_id_Utilisateur' => $args['id_utilisateur']
        ]);
        $response->getBody()->write(json_encode(['message' => 'Utilisateur associé à la note']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

    // Retirer un utilisateur d'une note
    $app->delete('/notes/{id_note}/utilisateurs/{id_utilisateur}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('NoteUtilisateur')
            ->where('Note_id_Note', $args['id_note'])
            ->where('Utilisateur_id_Utilisateur', $args['id_utilisateur'])
            ->delete();
        $response->getBody()->write(json_encode(['message' => 'Utilisateur retiré de la note']));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Associer une notification à un utilisateur
    $app->post('/utilisateurs/{id_utilisateur}/notifications/{id_notification}', function (Request $request, Response $response, array $args) {
        $this->get('db')->table('UtilisateurNotification')->insert([
            'Utilisateur_id_Utilisateur' => $args['id_utilisateur'],
            'Notification_id_Notification' => $args['id_notification'],
            'date_lecture' => date('Y-m-d H:i:s')
        ]);
        $response->getBody()->write(json_encode(['message' => 'Notification associée à l\'utilisateur']));
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    });

};

