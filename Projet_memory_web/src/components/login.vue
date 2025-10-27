<script setup>
import router from "../router";
import { onMounted } from "vue";

onMounted(() => {
  document.body.style.backgroundColor = "#ff584a";
});
</script>

<template>
  <div class="container">
    <div class="logo">
      <img src="/src/assets/logo_memory.png" alt="Logo" />
    </div>
    <form>
      <div class="form-group username">
        <input type="text" placeholder="Identifiant" required />
      </div>
      <div class="form-group">
        <input type="password" placeholder="Mot de passe" required />
      </div>
      <div class="form-group">
        <router-link to="/Accueil">
          <button type="submit">Connexion</button>
        </router-link>
      </div>
    </form>
    <div class="link">
      <router-link to="/register" class="link">
        Pas de compte ? Ça se passe par là !
      </router-link>
    </div>
  </div>
</template>

<style scoped>
.container .logo img {
  margin-top: 30px;
  margin-left: 145px;
  margin-bottom: 30px;
  width: 330px;
  height: 262px;
}

.container .form-group input {
  width: 600px;
  height: 120px;
  border-radius: 30px;
  padding: 10px;
  margin-top: 50px;
  margin-left: 10px;
  border: none;
  text-align: center;
  font-size: 40px;
}

.container .form-group button {
  background-color: #690030;
  color: white;
  border: none;
  border-radius: 30px;
  width: 600px;
  height: 120px;
  margin-top: 50px;
  margin-left: 10px;
  font-size: 40px;
  cursor: pointer;
}

.container .form-group button:hover {
  background-color: #4a001f;
}

.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 50px;
}

.link {
  margin-top: 30px;
  color: white;
  text-decoration: none;
  font-size: 40px;
}
</style>