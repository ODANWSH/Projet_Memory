<template>
  <header class="header">
    <div class="title">
      <h1>{{ title }}</h1>
    </div>
    <button type="submit" class="logo-button">
      <img src="../assets/logo_memory.png" alt="Logo" class="logo" />
    </button>
    <div class="search-bar">
      <input type="text" />
      <button type="submit">
        <img
          width="50"
          height="60"
          src="https://img.icons8.com/pastel-glyph/100/FFFFFF/search--v1.png"
          alt="search--v1"
        />
      </button>
    </div>
    <div class="profil">
      <button type="submit">
        <img
          width="50"
          height="60"
          src="https://img.icons8.com/fluency-systems-regular/100/690030/guest-male.png"
          alt="guest-male"
        />
      </button>
    </div>
  </header>
</template>

<script setup>
import { computed } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();

const routeTitles = {
  home: "Accueil",
  notes: "Notes",
  projets: "Projets",
  profil: " profil",
};

const title = computed(() => routeTitles[route.name] || "Page");
</script>

<style scoped>
.title {
  color: white;
  margin-top: -50px;
  margin-left: 40px;
  text-align: left;
  font-size: 36px;
  white-space: nowrap;
  width: 500px;
}

.header {
  width: 100vw;
  height: 95px;
  display: flex;
  background: #ff584a;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.logo {
  height: 70px;
  object-fit: contain;
}

.logo-button {
  background: none;
  border: none;
  cursor: pointer;
  margin-left: 20px;
  display: flex;
  align-items: center;
}

.search-bar {
  position: relative;
  display: flex;
  align-items: center;
}

.search-bar input {
  background-color: #690030;
  border-radius: 30px;
  width: 420px;
  height: 65px;
  margin-left: 115px;
  margin-top: 5px;
  border: none;
  color: white;
  font-size: 34px;
  padding-right: 60px;
}

.search-bar button {
  position: absolute;
  right: 100px;
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  cursor: pointer;
  padding: 0;
  margin: 0;
  margin-right: -90px;
}

.profil button {
  margin-top: 15px;
  margin-left: 10px;
  background: none;
  border: none;
  cursor: pointer;
}
</style>
