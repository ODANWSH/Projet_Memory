<template>
  <div class="container">
    <div class="arrow-left">
      <router-link to="/" class="link">
        <button type="button">
          <img
            width="100"
            height="100"
            src="https://img.icons8.com/ios/50/left--v1.png"
            alt="left"
          />
        </button>
      </router-link>
    </div>

    <div class="logo">
      <img src="/src/assets/logo_memory.png" alt="Logo" />
    </div>

    <form class="register-form">
      <div class="form-group">
        <input type="text" id="name" placeholder="Nom" required />
      </div>
      <div class="form-group">
        <input type="text" id="firstname" placeholder="Prénom" required />
      </div>
      <div class="form-group">
        <input type="text" id="mail" placeholder="Mail" required />
      </div>
      <div class="form-group">
        <input
          type="password"
          id="password"
          placeholder="Mot de passe"
          required
        />
      </div>
      <div class="form-group">
        <input
          type="password"
          id="confirm-password"
          placeholder="Entrez à nouveau votre mot de passe"
          required
        />
      </div>
      <div class="form-group">
        <button type="submit" @click.prevent="register">Envoyer !</button>
      </div>
    </form>
    <Popup v-if="showPopup" :type="popupType" @close="closePopup" />
  </div>
</template>

<script setup>
import { ref } from "vue";
import { onMounted } from "vue";
import Popup from "./pop-up-register.vue";

const showPopup = ref(false);
const popupType = ref("");

function register() {
  const name = document.getElementById("name").value;
  const firstname = document.getElementById("firstname").value;
  const mail = document.getElementById("mail").value;
  const password = document.getElementById("password").value;
  const confirm = document.getElementById("confirm-password").value;

  if (!name || !firstname || !mail || !password || !confirm) {
    popupType.value = "empty";
    showPopup.value = true;
  } else {
    popupType.value = password === confirm ? "success" : "error";
    showPopup.value = true;
  }
}

function closePopup() {
  showPopup.value = false;
}

onMounted(() => {
  document.body.style.backgroundColor = "#ff584a";
});
</script>

<style scoped>
.logo img {
  margin-top: 30px;
  margin-left: 120px;
  margin-bottom: 30px;
  width: 250px;
  height: 200px;
}

.form-group input {
  width: 465px;
  height: 90px;
  border-radius: 30px;
  padding: 10px;
  margin-top: 10px;
  background-color: #690030;
  text-align: left;
  font-size: 48px;
  color: white;
}

.form-group input::placeholder {
  color: white;
}

.form-group button {
  width: 370px;
  height: 90px;
  padding: 10px;
  margin-top: 30px;
  background-color: #690030;
  color: white;
  font-size: 48px;
  border-radius: 30px;
  cursor: pointer;
  margin-left: 65px;
  text-align: center;
}
.form-group button:hover {
  background-color: #900041;
}

.form-group {
  align-items: left;
}

.arrow-left button {
  text-align: left;
  cursor: pointer;
  background-color: transparent;
  border: none;
  position: absolute;
  left: 20px;
  top: 20px;
}
</style>
