<template>
    <div id="product-singleton">
        <div class="container-xxl">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left section p-3">
                        <img
                            class="img-fluid"
                            src="https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-28-copyright.jpg"
                            alt="Product"
                        />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right section p-3">
                        <h1 class="price text_secondary underlined">24.99 BGN</h1>
                        <p class="text_fourtriary mt-5">
                            Tame your flyaways, add shine and smooth your hair with this
                            luxurious spray. Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                            occaecat cupidatat non proident.
                        </p>
                        <div class="d-flex mt-5 align-items-center w-100">
                            <form @submit.prevent="submitFormHandler" id="buy_now" class="form">
                                <input
                                    type="number"
                                    min="1"
                                    max="10"
                                    name="number"
                                    id="number"
                                    value="1"
                                    required
                                />
                                <button type="submit" class="btn_tertiary btn-inverse ms-3">
                                    Добави в кошницата
                                </button>
                            </form>
                        </div>
                        <div class="aditional-details mt-5">
                            <ul>
                                <li class="text_fourtriary">
                                    <span class="text-white me-3">Номер:</span>25087055
                                </li>
                                <li class="text_fourtriary">
                                    <span class="text-white me-3">Категория:</span>Дамска
                                    козметика
                                </li>
                                <li class="text_fourtriary">
                                    <span class="text-white me-3">Тагове:</span>Дамска козметика
                                </li>
                            </ul>
                        </div>
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
</template>
<script>
import {useStore} from 'vuex'

export default {
    props: ["id"],
    setup() {
        const store = useStore();

        function submitFormHandler() {
            store.commit("Cart/setCart", {id: 2, name: 'Tst product from COmmit'});
        }

        return {
            submitFormHandler,
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
    //temp
    outline: 2px solid red;

    &.bottom {
        margin-top: 1rem;
    }
}
</style>
