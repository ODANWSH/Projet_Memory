<template>
  <div class="popup-overlay">
    <div class="popup">
      <div class="popup-text" v-html="title"></div>
      <button
        v-if="type === 'success'"
        class="popup-btn"
        @click="$router.push('/')"
      >
        Se connecter
      </button>
      <button v-else class="popup-btn" @click="$emit('close')">Fermer</button>
    </div>
  </div>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
  type: String,
});
const emit = defineEmits(["close"]);

const title = computed(() => {
  switch (props.type) {
    case "success":
      return `Votre compte a été créé avec succès.<br />
                Utilisez votre mail en tant qu’identifiant et <br />
                votre mot de passe pour vous connecter.`;
    case "error":
      return `Vos mots de passe ne correspondent pas.<br />
                Veuillez réessayer.`;
    case "empty":
      return `Veuillez remplir tous les champs.`;
    default:
      return "Message inconnu.";
  }
});
</script>

<style scoped>
.popup-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: rgba(0, 0, 0, 0.5);
  z-index: 9999;
  display: flex;
  justify-content: center;
  align-items: center;
}

.popup {
  width: 1375px;
  height: 470px;
  background: #690030;
  border-radius: 30px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.popup-text {
  font-size: 64px;
  text-align: center;
  margin-bottom: 50px;
  color: white;
}

.popup-btn {
  padding: 18px 48px;
  font-size: 1.2rem;
  background: #ff584a;
  color: #fff;
  border: none;
  border-radius: 30px;
  cursor: pointer;
  text-decoration: none;
  font-size: 48px;
}

.popup-btn:hover {
  background: #fa311f;
}
</style>
