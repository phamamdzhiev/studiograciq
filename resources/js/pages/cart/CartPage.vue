<template>
    <div class="container">
        <div v-if="cartItems.length" class="table-responsive ">
            <table class="table table-dark table-striped text-center align-middle">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Продукт</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Тотал</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in cartItems" :key="item.id">
                    <th>
                        <button class="btn_tertiary" type="button" @click="removeItem(item.id)">X</button>
                    </th>
                    <td>{{ item.title }}</td>
                    <td>{{ item.price }} BGN</td>
                    <td>{{ item.amount }} бр.</td>
                    <td>{{ item.price * item.amount }} BGN</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center min-vh-100" v-else>
            <h1 class="mt-5">Количката е празна!</h1>
            <router-link to="/shop" class="d-inline-block btn_secondary mt-3">Към магазина</router-link>
        </div>
    </div>
</template>

<script>
import {useStore} from "vuex";
import {computed} from "vue";

export default {
    name: "CartPage",
    setup() {
        const store = useStore();

        const cartItems = computed(() => {
            return store.getters['Cart/getCart'];
        });

        function removeItem(itemID) {
            store.commit('Cart/removeCartItemByID', itemID);
        }

        return {
            removeItem,
            cartItems
        }
    }

}
</script>

<style scoped>

</style>
