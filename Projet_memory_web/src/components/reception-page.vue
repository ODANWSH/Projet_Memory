<template>
  <div class="header">
    <Header />
    <main>
      <h1>Bienvenue sur la page de réception</h1>
    </main>
  </div>
</template>

<script setup>
import Header from "./header.vue";
import { onMounted } from "vue";

onMounted(() => {
  document.body.style.backgroundColor = "white";
});
</script>

<style scoped>
main {
  padding: 2rem;
  text-align: center;
}
</style>
