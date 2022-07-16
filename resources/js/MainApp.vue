<template>
  <Header />
  <router-view />
  <Footer/>
</template>

<script>
import Header from "./components/includes/header/Header";
import Footer from "./components/Footer";

export default {
  name: "MainApp",
  components: {
    Header,
    Footer
  },
};
</script>

<style scoped>
</style>
