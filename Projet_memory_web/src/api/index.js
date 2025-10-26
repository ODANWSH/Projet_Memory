// Configuration de l'API
const API_URL = "http://localhost:3000/api";

// Récupérer le token depuis le localStorage
const getToken = () => localStorage.getItem("token");

// Configuration des headers avec authentification
const getHeaders = () => ({
  "Content-Type": "application/json",
  Authorization: `Bearer ${getToken()}`,
});

// Gestion des erreurs
const handleResponse = async (response) => {
  if (!response.ok) {
    const error = await response.json();
    throw new Error(error.message || "Erreur serveur");
  }
  return response.json();
};

// === AUTHENTIFICATION ===
export const authAPI = {
  login: async (email_utilisateur, mot_de_passe) => {
    const response = await fetch(`${API_URL}/utilisateurs/login`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ email_utilisateur, mot_de_passe }),
    });
    const data = await handleResponse(response);
    if (data.token) {
      localStorage.setItem("token", data.token);
      localStorage.setItem("user", JSON.stringify(data.user));
    }
    return data;
  },

  register: async (userData) => {
    const response = await fetch(`${API_URL}/utilisateurs/register`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(userData),
    });
    return handleResponse(response);
  },

  logout: () => {
    localStorage.removeItem("token");
    localStorage.removeItem("user");
  },

  getCurrentUser: () => {
    const user = localStorage.getItem("user");
    return user ? JSON.parse(user) : null;
  },
};

// === UTILISATEURS ===
export const utilisateurAPI = {
  getAll: async () => {
    const response = await fetch(`${API_URL}/utilisateurs`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getById: async (id) => {
    const response = await fetch(`${API_URL}/utilisateurs/${id}`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  update: async (id, data) => {
    const response = await fetch(`${API_URL}/utilisateurs/${id}`, {
      method: "PUT",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },

  delete: async (id) => {
    const response = await fetch(`${API_URL}/utilisateurs/${id}`, {
      method: "DELETE",
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getCompetences: async (id) => {
    const response = await fetch(`${API_URL}/utilisateurs/${id}/competences`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getRoles: async (id) => {
    const response = await fetch(`${API_URL}/utilisateurs/${id}/roles`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },
};

// === ÉQUIPES ===
export const equipeAPI = {
  getAll: async () => {
    const response = await fetch(`${API_URL}/equipes`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getById: async (id) => {
    const response = await fetch(`${API_URL}/equipes/${id}`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  create: async (data) => {
    const response = await fetch(`${API_URL}/equipes`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },

  update: async (id, data) => {
    const response = await fetch(`${API_URL}/equipes/${id}`, {
      method: "PUT",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },

  delete: async (id) => {
    const response = await fetch(`${API_URL}/equipes/${id}`, {
      method: "DELETE",
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getMembres: async (id) => {
    const response = await fetch(`${API_URL}/equipes/${id}/membres`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },
};

// === PROJETS ===
export const projetAPI = {
  getAll: async () => {
    const response = await fetch(`${API_URL}/projets`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getById: async (id) => {
    const response = await fetch(`${API_URL}/projets/${id}`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  create: async (data) => {
    const response = await fetch(`${API_URL}/projets`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },

  update: async (id, data) => {
    const response = await fetch(`${API_URL}/projets/${id}`, {
      method: "PUT",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },

  delete: async (id) => {
    const response = await fetch(`${API_URL}/projets/${id}`, {
      method: "DELETE",
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getUtilisateurs: async (id) => {
    const response = await fetch(`${API_URL}/projets/${id}/utilisateurs`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  addUtilisateur: async (id, utilisateur_id) => {
    const response = await fetch(`${API_URL}/projets/${id}/utilisateurs`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify({ utilisateur_id }),
    });
    return handleResponse(response);
  },

  removeUtilisateur: async (id, utilisateur_id) => {
    const response = await fetch(`${API_URL}/projets/${id}/utilisateurs`, {
      method: "DELETE",
      headers: getHeaders(),
      body: JSON.stringify({ utilisateur_id }),
    });
    return handleResponse(response);
  },

  getTags: async (id) => {
    const response = await fetch(`${API_URL}/projets/${id}/tags`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getTaches: async (id) => {
    const response = await fetch(`${API_URL}/projets/${id}/taches`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getNotes: async (id) => {
    const response = await fetch(`${API_URL}/projets/${id}/notes`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },
};

// === NOTES ===
export const noteAPI = {
  getAll: async () => {
    const response = await fetch(`${API_URL}/notes`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getById: async (id) => {
    const response = await fetch(`${API_URL}/notes/${id}`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  create: async (data) => {
    const response = await fetch(`${API_URL}/notes`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },

  update: async (id, data) => {
    const response = await fetch(`${API_URL}/notes/${id}`, {
      method: "PUT",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },

  delete: async (id) => {
    const response = await fetch(`${API_URL}/notes/${id}`, {
      method: "DELETE",
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getCommentaires: async (id) => {
    const response = await fetch(`${API_URL}/notes/${id}/commentaires`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getDocuments: async (id) => {
    const response = await fetch(`${API_URL}/notes/${id}/documents`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getTags: async (id) => {
    const response = await fetch(`${API_URL}/notes/${id}/tags`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  addUtilisateur: async (id, utilisateur_id) => {
    const response = await fetch(`${API_URL}/notes/${id}/utilisateurs`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify({ utilisateur_id }),
    });
    return handleResponse(response);
  },
};

// === COMMENTAIRES ===
export const commentaireAPI = {
  getAll: async () => {
    const response = await fetch(`${API_URL}/commentaires`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  create: async (data) => {
    const response = await fetch(`${API_URL}/commentaires`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },

  update: async (id, data) => {
    const response = await fetch(`${API_URL}/commentaires/${id}`, {
      method: "PUT",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },

  delete: async (id) => {
    const response = await fetch(`${API_URL}/commentaires/${id}`, {
      method: "DELETE",
      headers: getHeaders(),
    });
    return handleResponse(response);
  },
};

// === TÂCHES ===
export const tacheAPI = {
  getAll: async () => {
    const response = await fetch(`${API_URL}/taches`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getById: async (id) => {
    const response = await fetch(`${API_URL}/taches/${id}`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  create: async (data) => {
    const response = await fetch(`${API_URL}/taches`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },

  update: async (id, data) => {
    const response = await fetch(`${API_URL}/taches/${id}`, {
      method: "PUT",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },

  delete: async (id) => {
    const response = await fetch(`${API_URL}/taches/${id}`, {
      method: "DELETE",
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getUtilisateurs: async (id) => {
    const response = await fetch(`${API_URL}/taches/${id}/utilisateurs`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  assignUtilisateur: async (id, utilisateur_id) => {
    const response = await fetch(`${API_URL}/taches/${id}/utilisateurs`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify({ utilisateur_id }),
    });
    return handleResponse(response);
  },

  removeUtilisateur: async (id, utilisateur_id) => {
    const response = await fetch(`${API_URL}/taches/${id}/utilisateurs`, {
      method: "DELETE",
      headers: getHeaders(),
      body: JSON.stringify({ utilisateur_id }),
    });
    return handleResponse(response);
  },
};

// === TAGS ===
export const tagAPI = {
  getAll: async () => {
    const response = await fetch(`${API_URL}/tags`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  create: async (data) => {
    const response = await fetch(`${API_URL}/tags`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },

  update: async (id, data) => {
    const response = await fetch(`${API_URL}/tags/${id}`, {
      method: "PUT",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },

  delete: async (id) => {
    const response = await fetch(`${API_URL}/tags/${id}`, {
      method: "DELETE",
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  addToNote: async (id, note_id) => {
    const response = await fetch(`${API_URL}/tags/${id}/notes`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify({ note_id }),
    });
    return handleResponse(response);
  },

  addToProjet: async (id, projet_id) => {
    const response = await fetch(`${API_URL}/tags/${id}/projets`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify({ projet_id }),
    });
    return handleResponse(response);
  },
};

// === NOTIFICATIONS ===
export const notificationAPI = {
  getAll: async () => {
    const response = await fetch(`${API_URL}/notifications`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  getByUser: async (utilisateur_id) => {
    const response = await fetch(
      `${API_URL}/notifications/user/${utilisateur_id}`,
      {
        headers: getHeaders(),
      }
    );
    return handleResponse(response);
  },

  markAsRead: async (id, utilisateur_id) => {
    const response = await fetch(`${API_URL}/notifications/${id}/read`, {
      method: "PUT",
      headers: getHeaders(),
      body: JSON.stringify({ utilisateur_id }),
    });
    return handleResponse(response);
  },

  send: async (utilisateur_id, message) => {
    const response = await fetch(`${API_URL}/notifications/send`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify({ utilisateur_id, message }),
    });
    return handleResponse(response);
  },
};

// === AUTRES RESSOURCES ===
export const competenceAPI = {
  getAll: async () => {
    const response = await fetch(`${API_URL}/competences`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },
};

export const couleurAPI = {
  getAll: async () => {
    const response = await fetch(`${API_URL}/couleurs`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },
};

export const documentAPI = {
  getAll: async () => {
    const response = await fetch(`${API_URL}/documents`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },

  create: async (data) => {
    const response = await fetch(`${API_URL}/documents`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify(data),
    });
    return handleResponse(response);
  },
};

export const roleAPI = {
  getAll: async () => {
    const response = await fetch(`${API_URL}/roles`, {
      headers: getHeaders(),
    });
    return handleResponse(response);
  },
};
