const API_URL = "http://localhost:8000"; // Définir l'URL de base

class Users {
  constructor() {
    this.apiUrl = API_URL;
  }

  async login(email, password) {
    try {
      const response = await fetch(`${this.apiUrl}/login`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        credentials: "include", // Important pour envoyer les cookies de session
        body: JSON.stringify({
          email: email,
          password: password,
        }),
      });

      if (!response.ok) {
        const errorData = await response.json();
        throw new Error(errorData.error || "Erreur lors de la connexion");
      }

      const data = await response.json();
      return data;
    } catch (error) {
      console.error("Erreur lors de la connexion :", error);
      throw error;
    }
  }

  async register(name, firstname, email, password) {
    try {
      const response = await fetch(`${this.apiUrl}/register`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        credentials: "include",
        body: JSON.stringify({
          nom_utilisateur: name,
          prenom_utilisateur: firstname,
          email_utilisateur: email,
          mot_de_passe: password,
        }),
      });

      if (!response.ok) {
        const error = await response.json();
        throw new Error(error.error || "Erreur d'inscription");
      }

      const data = await response.json();
      return data;
    } catch (error) {
      console.error("Erreur lors de l'inscription :", error);
      throw error;
    }
  }

  async logout() {
    try {
      const response = await fetch(`${this.apiUrl}/logout`, {
        method: "POST",
        credentials: "include",
      });

      if (!response.ok) {
        throw new Error("Erreur lors de la déconnexion");
      }

      window.location.href = "/login";
    } catch (error) {
      console.error("Erreur lors de la déconnexion :", error);
      throw error;
    }
  }

  async checkSession() {
    try {
      const response = await fetch(`${this.apiUrl}/check-session`, {
        credentials: "include",
      });

      const data = await response.json();
      return data.authenticated ? data.user : null;
    } catch (error) {
      console.error("Erreur lors de la vérification de session :", error);
      return null;
    }
  }

  // Faire une requête authentifiée
  async authenticatedFetch(url, options = {}) {
    const response = await fetch(url, {
      ...options,
      credentials: "include", // Envoyer automatiquement les cookies de session
      headers: {
        "Content-Type": "application/json",
        ...options.headers,
      },
    });

    if (response.status === 401) {
      window.location.href = "/login";
      throw new Error("Session expirée");
    }

    return response;
  }
}

const authService = new Users();
export default authService;
