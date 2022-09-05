<template>
    <div id="product-singleton" v-if="item">
        <div class="container-xxl">
            <div class="back">
                <router-link to="/shop" class="d-inline-flex align-items-center text_tertiary my-1 p-3">
                    <i class="bi bi-arrow-left me-3"></i>
                    Назад към магазина
                </router-link>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1 class="my-4 px-3 fw-light heading" style="font-size: 3rem">{{ item.title }}</h1>
                </div>
                <div class="col-lg-6">
                    <div class="left section p-3">
                        <img
                            class="img-fluid"
                            :src="`/storage/products/${item.image_big}`"
                            alt="Product"
                        />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right section p-3">
                        <h1 class="price text_secondary underlined">{{ item.price }} BGN</h1>
                        <div class="aditional-details mt-5">
                            <ul>
                                <li class="text_fourtriary">
                                    <span class="me-3">Каталожен номер:</span>
                                    <span>{{ item.id + '0'.repeat(2) }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex mt-5 align-items-center w-100">
                            <form @submit.prevent="submitFormHandler" id="buy_now" class="form">
                                <input
                                    type="number"
                                    min="1"
                                    max="10"
                                    name="number"
                                    id="number"
                                    v-model="cartItemAmount"
                                    :class="{'disabled-class': isAddedInCart}"
                                    required
                                />
                                <button type="submit" class="btn_tertiary btn-inverse ms-3">
                                    {{ (isAddedInCart) ? 'Премахни от ' : 'Добави в ' }}кошницата
                                </button>
                            </form>
                        </div>
                        <p class="text_fourtriary mt-5">
                            {{ item.desc }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 p-3">
                    <div class="bottom section"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 text-center min-vh-100" v-else>
        <div class="container-xxl">
            <h1 class="">Зареждане...</h1>
            <!--            <router-link class="d-inline-block mt-5 btn_secondary" to="/">-->
            <!--                Към начална страница-->
            <!--            </router-link>-->
        </div>
    </div>
</template>
<script>
import {useStore} from 'vuex'
import {computed, ref, onMounted} from "vue";
import axios from "axios";

export default {
    props: {
        id: {
            required: true
        }
    },
    setup(props) {
        const store = useStore();
        const cartItemAmount = ref(1);
        const item = ref(null)

        onMounted(() => {
            axios.get(`/api/products/single/${props.id}`).then((res) => {
                if (res.status === 200) {
                    item.value = res.data;
                }
            }).catch(e => console.log('Could not fetch products', e));
        });

        let itemsFromSession;
        let currentProduct;

        if (
            JSON.parse(sessionStorage.getItem('cart')) !== null &&
            JSON.parse(sessionStorage.getItem('cart')).length > 0
        ) {
            itemsFromSession = JSON.parse(sessionStorage.getItem('cart')).Cart.cart;

            currentProduct = itemsFromSession.find(el => {
                return el.id === parseInt(props.id);
            });

            cartItemAmount.value = currentProduct.amount;
        }

        const cart = computed(() => {
            return store.getters["Cart/getCart"];
        });

        const isAddedInCart = computed(() => {
            return cart.value.some(el => el.id === parseInt(props.id));
        })


        function submitFormHandler() {
            item.value['amount'] = cartItemAmount.value;
            store.commit("Cart/setCart", item.value);
        }

        return {
            submitFormHandler,
            item,
            cartItemAmount,
            isAddedInCart,
        };
    },
};
</script>
<style lang="scss" scoped>
//TODO: fix BS 5 grid column classes (e.g. col-xs-12 @deprecated)....
h1 {
    margin: 0;
}

.price {
    font-size: 3.5rem;
}

form {
    input#number {
        border: 4px solid #798a8a;
        border-radius: 0;
        padding: 1rem 2rem;
        background-color: transparent;
        color: white;
        outline: 0;
        user-select: none;
    }
}

.aditional-details {
    ul {
        display: flex;
        flex-direction: column;

        li {
            display: inline-block;
        }
    }
}

.underlined {
    &::after {
        background-color: #798a8a;
        height: 1px;
        left: 0;
        transform: translateX(0);
    }
}

.section {

    &.bottom {
        margin-top: 1rem;
    }
}
</style>
