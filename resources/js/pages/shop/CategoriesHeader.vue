<template>
    <div>
        <button class="btn btn_tertiary text-white btn-inverse fs-4 py-1 px-3 d-flex align-items-center mb-4 fw-bold" role="button" @click="shown = !shown">
            Категории
            <i :class="!shown ? 'bi-list' : 'bi-x-lg'" class="bi ps-1 text-white"></i>
        </button>
        <div v-if="productsCategories.length > 0">
            <ul id="shop_categories" v-show="shown">
                <li class="mb-2 me-2">
                    <button class="d-block btn_tertiary" @click="handleClickEvent(null)">
                        Всички
                    </button>
                </li>
                <li class="mb-2 me-2" v-for="category in productsCategories" :key="category.id">
                    <button class="d-block btn_tertiary text-capitalize" @click="handleClickEvent(category.id)">
                        {{ category.name }}
                    </button>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import {onMounted, ref} from "vue";
import axios from "axios";

export default {
    name: "CategoriesHeader",
    setup(_, {emit}) {
        const productsCategories = ref([]);
        const DATA_API = '/api/products/categories'
        const shown = ref(false);

        onMounted(() => {
            axios.get(DATA_API).then((res) => {
                if (res.status === 200) {
                    productsCategories.value = res.data;
                }
            }).catch(e => console.log(e, 'Could not fetch categories'));
        });


        function handleClickEvent(value) {
            shown.value = false;
            emit('changeUri', value)
        }

        return {
            handleClickEvent,
            productsCategories,
            shown
        }
    }
}
</script>

<style lang="scss" scoped>
ul#shop_categories {
    @media screen and (max-width: 991px) {
        display: grid;
        grid-template-columns: 1fr;
        gap: 5px;
        width: 100%;
        li,button {
            width: 100%;
            white-space: nowrap;
        }
    }
}
</style>
