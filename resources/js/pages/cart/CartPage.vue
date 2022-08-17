<template>
    <div class="container">
        <div v-if="cartItems.length" class="mt-5">
            <h1 class="mb-5 d-flex align-items-center">
                <i class="bi bi-cart-fill fs-1 me-3"></i>
                Количка
            </h1>
            <div class="table-responsive mt-5">
                <table class="table table-dark table-striped text-center align-middle">
                    <thead>
                    <tr>
                        <th scope="col">Продукт</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Тотал</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in cartItems" :key="item.id">
                        <td class="product_title">
                            <router-link :to="`/product/${item.id}`">
                                {{ item.name }}
                            </router-link>
                        </td>
                        <td>{{ item.price }} BGN</td>
                        <td>{{ item.amount }} бр.</td>
                        <td>{{ item.price * item.amount }} BGN</td>
                        <th>
                            <button class="btn" type="button" @click="removeItem(item.id)">
                                <i class="bi bi-x text_tertiary fs-1"></i>
                            </button>
                        </th>
                    </tr>
                    </tbody>
                </table>

            </div>
            <div class="total">
                <button @click="showModal = true" type="button" class="btn_tertiary mt-5 d-flex align-items-center">
                    <i class="bi bi-bag-check-fill fs-1 me-3"></i>
                    Направи поръчка - {{ grandTotal }} BGN
                </button>
            </div>
            <vue-final-modal v-model="showModal" :ssr="false" classes="modal-container">
                <OrderFrom :cart-items="cartItems" />
            </vue-final-modal>
        </div>
        <div class="text-center min-vh-100" v-else>
            <h1 class="mt-5">Количката е празна!</h1>
            <router-link to="/shop" class="d-inline-block btn_secondary mt-3">Към магазина</router-link>
        </div>
    </div>
</template>

<script>
import {useStore} from "vuex";
import {computed, ref} from "vue";
import {VueFinalModal} from "vue-final-modal";
import OrderFrom from "./OrderFrom";

export default {
    name: "CartPage",
    components: {
        VueFinalModal,
        OrderFrom
    },
    setup() {
        const store = useStore();
        const showModal = ref(false);

        const cartItems = computed(() => {
            return store.getters['Cart/getCart'];
        });

        const grandTotal = computed(() => {
            let total = 0;
            cartItems.value.map((el) => {
                const price = parseInt(el.price);
                const amount = parseInt(el.amount);

                total += price * amount;
            })
            return total;
        });

        function removeItem(itemID) {
            store.commit('Cart/removeCartItemByID', itemID);
        }

        return {
            removeItem,
            cartItems,
            grandTotal,
            showModal
        }
    }

}
</script>

<style lang="scss" scoped>
::v-deep .modal-container {
    margin-top: 3rem;
    //display: flex;
    //justify-content: center;
    //align-items: center;
    @media screen and (max-width: 576px) {
        margin-top: 0;
    }
}

.table {
    thead {
        th {
            background-color: #659498;
            padding: 15px;
        }
    }

    td.product_title {
        a {
            &:hover {
                color: #659498;
            }
        }
    }
}

.btn {
    i {
        transition: transform 250ms ease-in;
    }

    &:hover {
        i {
            transform: scale(1.1);
        }
    }
}
</style>
