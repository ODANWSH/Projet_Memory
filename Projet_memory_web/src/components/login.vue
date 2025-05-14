<script setup lang="ts">
import router from "./router";
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
        <button type="submit">Connexion</button>
      </div>
    </form>
    <div class="link">
      <router-link to="/register" class="link">
        Pas de compte ? Ça se passe par là !
      </router-link>
    </div>
  </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");

.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color: #ff584a;
  font-family: "Inter", sans-serif;
}

.logo img {
  margin-top: 30px;
  margin-left: 140px;
  margin-bottom: 30px;
  width: 330px;
  height: 262px;
}

.form-group input {
  width: 600px;
  height: 120px;
  border-radius: 30px;
  padding: 10px;
  margin-top: 50px;
  background-color: #690030;
  text-align: center;
  font-size: 64px;
  color: white;
}

.form-group input::placeholder {
  color: white;
}

.form-group button {
  width: 420px;
  height: 115px;
  padding: 10px;
  margin-top: 80px;
  background-color: #690030;
  color: white;
  font-size: 64px;
  border-radius: 30px;
  cursor: pointer;
  margin-left: 105px;
}

.link {
  margin-top: 15px;
}

.link a {
  color: white;
  font-size: 40px;
}
</style>
