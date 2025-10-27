# 🧠 Projet Memory - Application de Gestion de la Mémoire Organisationnelle

Application web complète de gestion de projets, notes, tâches et collaboration d'équipe.

## 📋 Table des matières

- [Vue d'ensemble](#vue-densemble)
- [Technologies](#technologies)
- [Installation](#installation)
- [Démarrage rapide](#démarrage-rapide)
- [Documentation](#documentation)
- [Structure du projet](#structure-du-projet)
- [API](#api)
- [Contribution](#contribution)

## 🎯 Vue d'ensemble

Projet Memory est une plateforme collaborative permettant de :

- ✅ Gérer des projets et leurs états
- ✅ Créer et organiser des notes
- ✅ Assigner et suivre des tâches
- ✅ Collaborer en équipe
- ✅ Taguer et catégoriser le contenu
- ✅ Recevoir des notifications
- ✅ Gérer les compétences et rôles

## 🚀 Technologies

### Frontend

- **Vue.js 3** - Framework JavaScript progressif
- **Vue Router** - Routage SPA
- **Vite** - Build tool ultra-rapide

### Backend

- **Node.js** - Runtime JavaScript
- **Express** - Framework web minimaliste
- **MySQL** - Base de données relationnelle
- **JWT** - Authentification par tokens
- **bcryptjs** - Sécurité des mots de passe

## 📦 Installation

### Prérequis

- Node.js (v16+)
- MySQL (v8+)
- npm ou yarn

### 1. Cloner le projet

```bash
git clone [URL_DU_REPO]
cd Projet_memory_web
```

### 2. Installer les dépendances

```bash
npm install
```

### 3. Configurer la base de données

#### Créer la base de données

```bash
mysql -u root -p < Conception/bdd.sql
```

#### Charger les données de test (optionnel)

```bash
mysql -u root -p < Conception/init_data.sql
```

### 4. Configurer les variables d'environnement

```bash
cp .env.example .env
```

Puis éditer `.env` avec vos paramètres :

```env
DB_HOST=localhost
DB_USER=root
DB_PASSWORD=votre_mot_de_passe
DB_NAME=Projet_memory
DB_PORT=3306

JWT_SECRET=votre_secret_securise
JWT_EXPIRE=7d

PORT=3000
NODE_ENV=development
```

## 🏃 Démarrage rapide

### Développement

#### Terminal 1 - Backend (API)

```bash
npm run server:dev
```

Le serveur API sera disponible sur http://localhost:3000

#### Terminal 2 - Frontend

```bash
npm run dev
```

L'application web sera disponible sur http://localhost:5173

### Production

```bash
# Build du frontend
npm run build

# Démarrer le serveur API
npm run server
```

## 📚 Documentation

- **[API_README.md](API_README.md)** - Documentation complète de l'API REST
- **[INSTALLATION_API.md](INSTALLATION_API.md)** - Guide d'installation détaillé
- **[RECAP_API.md](RECAP_API.md)** - Récapitulatif de l'architecture

## 📁 Structure du projet

```
Projet_memory_web/
├── Conception/                    # Conception et modèles
│   ├── bdd.sql                   # Schéma de la base de données
│   ├── init_data.sql             # Données de test
│   ├── mcd.drawio                # Modèle conceptuel
│   ├── mld.mwb                   # Modèle logique
│   └── diagrammes...
│
├── server/                        # Backend API
│   ├── config/                   # Configuration
│   ├── controllers/              # Logique métier
│   ├── routes/                   # Définition des routes
│   ├── middleware/               # Middlewares (auth, etc.)
│   ├── index.js                  # Point d'entrée
│   └── test.js                   # Tests
│
├── src/                          # Frontend Vue.js
│   ├── api/                      # Client API
│   ├── assets/                   # Assets statiques
│   ├── components/               # Composants Vue
│   ├── router/                   # Configuration du routeur
│   ├── App.vue                   # Composant racine
│   └── main.js                   # Point d'entrée
│
├── public/                       # Fichiers publics
├── .env                          # Variables d'environnement (git ignored)
├── .env.example                  # Template de configuration
├── package.json                  # Dépendances npm
├── vite.config.js               # Configuration Vite
└── README.md                    # Ce fichier
```

## 🔌 API

### Endpoints principaux

```
POST   /api/utilisateurs/login           # Connexion
POST   /api/utilisateurs/register        # Inscription
GET    /api/projets                      # Liste des projets
POST   /api/projets                      # Créer un projet
GET    /api/notes                        # Liste des notes
POST   /api/notes                        # Créer une note
GET    /api/taches                       # Liste des tâches
POST   /api/taches                       # Créer une tâche
...et 70+ autres endpoints
```

Voir **[API_README.md](API_README.md)** pour la documentation complète.

### Utilisation de l'API

```javascript
import { authAPI, projetAPI } from "@/api";

// Connexion
const { token, user } = await authAPI.login("email@example.com", "password");

// Récupérer les projets
const projets = await projetAPI.getAll();

// Créer un projet
await projetAPI.create({
  titre_projet: "Mon projet",
  etat_projet: "Non commencée",
  description_projet: "Description",
  Utilisateur_id_utilisateur: user.id_utilisateur,
});
```

## 🧪 Tests

### Tester l'API

```bash
node server/test.js
```

### Avec Postman

Importer la collection : `Projet_Memory_API.postman_collection.json`

## 🗄️ Base de données

### Schéma

Le projet utilise 21 tables interconnectées :

- **13 tables principales** : Utilisateur, Equipe, Projet, Note, Commentaire, Tache, Tag, Competence, Couleur, Document, Type_fichier, Notification, Role
- **8 tables de liaison** : Relations many-to-many

### Modèle conceptuel

Voir `Conception/mcd.drawio` et `Conception/mld.mwb`

## 🔐 Sécurité

- ✅ Authentification JWT
- ✅ Mots de passe hashés avec bcrypt
- ✅ Variables d'environnement sécurisées
- ✅ Validation des données
- ✅ Protection CORS configurée

## 📝 Scripts disponibles

```bash
npm run dev              # Démarrer le frontend (Vite)
npm run build            # Build du frontend
npm run preview          # Preview du build
npm run server           # Démarrer l'API (production)
npm run server:dev       # Démarrer l'API (développement)
```

## 🤝 Contribution

1. Créer une branche feature (`git checkout -b feature/AmazingFeature`)
2. Commit les changements (`git commit -m 'Add AmazingFeature'`)
3. Push vers la branche (`git push origin feature/AmazingFeature`)
4. Ouvrir une Pull Request

## 📄 Licence

Projet privé - IBM

## 👥 Équipe

Développé pour IBM

## 🆘 Support

Pour toute question :

1. Consulter la documentation dans `/docs`
2. Vérifier les fichiers README
3. Contacter l'équipe de développement

## 🎉 Fonctionnalités à venir

- [ ] Upload de fichiers
- [ ] Notifications temps réel (WebSockets)
- [ ] Recherche avancée
- [ ] Filtres et tri
- [ ] Export de données
- [ ] Mode hors ligne
- [ ] Application mobile

---

**Bon développement ! 🚀**
