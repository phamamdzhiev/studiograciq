<!-- THE OLD CONCEPT WITH SEPARATE PAGE FOR DELIVERY, KEEP HERE FOR REFERENCE -->


<!--<template>-->
<!--    <div class="container">-->
<!--        <div v-if="cartItems.length" class="mt-5">-->
<!--            <h1 class="mb-5 d-flex align-items-center">-->
<!--                <i class="bi bi-cart-fill fs-1 me-3"></i>-->
<!--                Доставка-->
<!--            </h1>-->
<!--            <OrderFrom :cart-items="cartItems"/>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--import OrderFrom from "../cart/OrderFrom";-->
<!--import {computed} from "vue";-->
<!--import {useStore} from "vuex";-->

<!--export default {-->
<!--    name: "DeliveryPage",-->
<!--    components: {-->
<!--        OrderFrom-->
<!--    },-->
<!--    setup() {-->
<!--        const store = useStore();-->

<!--        const cartItems = computed(() => {-->
<!--            return store.getters['Cart/getCart'];-->
<!--        });-->

<!--        return {cartItems}-->
<!--    }-->
<!--}-->
<!--</script>-->

<!--<style scoped>-->

<!--</style>-->
