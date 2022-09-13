<template>
    <div>
        <div class="d-flex align-items-center mb-4 fw-bold text_tertiary" role="button" @click="shown = !shown">
            Категории
            <i :class="!shown ? 'bi-arrow-down-short' : 'bi-arrow-up-short'" class="bi ps-1 text_tertiary"></i>
        </div>
        <template v-if="productsCategories.length > 0">
            <ul id="shop_categories" v-show="shown">
                <li>
                    <button class="d-block mb-3 btn_tertiary" @click="handleClickEvent(null)">
                        Всички
                    </button>
                </li>
                <li v-for="category in productsCategories" :key="category.id">
                    <button class="d-block mb-3 btn_tertiary text-capitalize" @click="handleClickEvent(category.id)">
                        {{ category.name }}
                    </button>
                </li>
            </ul>
        </template>
    </div>
</template>

<script>
import {onMounted, ref} from "vue";
import axios from "axios";

export default {
    name: "CategoriesHeader",
    setup(props, {emit}) {
        const productsCategories = ref([]);
        const DATA_API = '/api/products/categories'
        const shown = ref(false);

        onMounted(() => {
            axios.get(DATA_API).then((res) => {
                if (res.status === 200) {
                    productsCategories.value = res.data;
                }
            })
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
