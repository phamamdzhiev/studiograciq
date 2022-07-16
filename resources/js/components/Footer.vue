<template>
  <footer class="text-center p-5">
    <div class="container-xxl">
      <router-link to="/">
        <img
          class="img-fluid py-4 px-1"
          width="100"
          src="/storage/assets/logo-transparent.png"
          alt="Brand Logo"
        />
      </router-link>
      <p id="copywrite">
        Студио Грация | Дамяна Стайкова &copy; {{ getYear }}. Всички права запазени.
      </p>
    </div>
  </footer>
</template>
<script>
export default {
  name: "Footer",
  computed: {
    getYear: () => {
      const dt = new Date();
      return dt.getFullYear();
    },
  },
};
</script>
<style lang="scss" scoped>
p#copywrite {
  font-size: 1.2rem;
  margin-top: 1rem;
}
</style>