<template>
    <div id="header_cart">
        <router-link to="/cart">
            <i class="bi bi-cart-fill fs-2"></i>
            <div id="badge" v-if="getCartItems.length > 0">
                {{ (getCartItems.length < 99) ? getCartItems.length : '99' }}
            </div>
        </router-link>
    </div>
</template>

<script>
import {computed} from "vue";
import {useStore} from "vuex";

export default {
    name: "Cart",
    setup() {
        const store = useStore();

        const getCartItems = computed(() => {
            return store.getters['Cart/getCart'];
        });

        return {
            getCartItems,
        }
    }
}
</script>

<style scoped>
#header_cart {
    position: relative;
}

#badge {
    position: absolute;
    top: 0;
    left: 100%;
    transform: translate(-50%, -50%);
    width: 17px;
    height: 17px;
    border-radius: 50%;
    background-color: #9e49a3;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-weight: bold;
    font-size: 10px;
}
</style>
