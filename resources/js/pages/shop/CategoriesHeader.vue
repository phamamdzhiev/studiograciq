<template>
    <div>
        <ul v-if="productsCategories.length > 0">
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

        onMounted(() => {
            axios.get(DATA_API).then((res) => {
                if (res.status === 200) {
                    productsCategories.value = res.data;
                }
            })
        });


        function handleClickEvent(value) {
            emit('changeUri', value)
        }

        return {
            handleClickEvent,
            productsCategories
        }
    }
}
</script>

<style scoped>

</style>
