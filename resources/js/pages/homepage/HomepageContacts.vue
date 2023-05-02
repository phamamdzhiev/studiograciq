<template>
    <div class="section-wrapper my-5" id="homepageContacts">
        <div class="contacts-singleton text-center p-5">
            <h1>Локация</h1>
            <h3 class="text_fourtriary py-4">
                <span class="d-block"> {{ $ADDRESS_STREET_CONST }}</span>
                <span class="d-block"> {{ $ADDRESS_CITY_CONST }} </span>
            </h3>
            <a
                href="https://goo.gl/maps/KuiTdiCH93d8QXuf7"
                target="_blank"
                class="d-inline-block fw-bold text_tertiary"
            >Виж на картата</a
            >
        </div>
        <div class="contacts-singleton text-center p-5">
            <h1>Контакти</h1>
            <div class="py-4 d-flex flex-column align-items-start mx-auto mw-mc">
                <h3 class="text_fourtriary">
                    <i class="bi bi-telephone-fill"></i>
                    <a :href="`tel:${$MOBILE_CONST}`" class="ps-2 text_fourtriary">
                        {{ $MOBILE_CONST_HR }}
                    </a>
                </h3>
                <h3 class="text_fourtriary">
                    <i class="bi bi-facebook"></i>
                    <a target="_blank" :href="$FACEBOOK" class="ps-2 text_fourtriary">Facebook</a>
                </h3>
                <h3 class="text_fourtriary">
                    <i class="bi bi-instagram"></i>
                    <a target="_blank" :href="$INSTAGRAM" class="ps-2 text_fourtriary">Instagram</a>
                </h3>
            </div>
            <a :href="`tel:${$MOBILE_CONST}`" class="d-inline-block fw-bold text_tertiary"
            >Запази час</a>
        </div>
        <div class="contacts-singleton text-center p-5">
            <h1>Работно време</h1>
            <h3 class="text_fourtriary py-4">
                <span class="d-block"> Пон-събота: 11.00ч - 19.00ч </span>
                <span class="d-block"> Неделя: почивен ден </span>
            </h3>
            <router-link to="/appointments" class="d-inline-block fw-bold text_tertiary"
            >Виж график
            </router-link
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

.mw-mc {
    max-width: max-content;
}
</style>
