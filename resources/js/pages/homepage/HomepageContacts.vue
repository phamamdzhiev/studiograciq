<template>
  <div class="section-wrapper my-5" id="homepageContacts">
    <div class="contacts-singleton text-center p-5">
      <h1>Локация</h1>
      <h3 class="text_fourtriary py-4">
        <span class="d-block"> ул. Стоян Попов №8 </span>
        <span class="d-block"> гр. Пещера </span>
      </h3>
      <a
        href="https://goo.gl/maps/1Bm3DzHKc4eHLhgh9"
        target="_blank"
        class="d-inline-block fw-bold text_tertiary"
        >Виж на картата</a
      >
    </div>
    <div class="contacts-singleton text-center p-5">
      <h1>Контакти</h1>
      <h3 class="text_fourtriary py-4">
        <span class="d-block"> 0878741978 </span>
        <span class="d-block"> Faceboock: </span>
        <span class="d-block"> INstagram: </span>
      </h3>
      <a href="tel:+35914543548" class="d-inline-block fw-bold text_tertiary"
        >Запази час</a>
    </div>
    <div class="contacts-singleton text-center p-5">
      <h1>Работно време</h1>
      <h3 class="text_fourtriary py-4">
        <span class="d-block"> Пон-събота: 09.00ч - 19.00ч </span>
        <span class="d-block"> Неделя: почивен ден </span>
      </h3>
      <router-link to="/" class="d-inline-block fw-bold text_tertiary"
        >Вижграфик</router-link
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "HomepageContacts",
  props: ["title"],
};
</script>

<style lang="scss" scoped>
#homepageContacts {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 20px;
  @media screen and (max-width: 992px) {
    grid-template-columns: 1fr 1fr;
  }
  @media screen and (max-width: 576px) {
    grid-template-columns: 1fr;
  }
}

.contacts-singleton {
  display: flex;
  flex-flow: column nowrap;
  justify-content: space-evenly;
  background-color: #1d2223;
}
</style>
