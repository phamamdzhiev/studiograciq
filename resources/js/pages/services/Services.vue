<template>
    <div id="services">
        <PageBanner title="Всички услуги"
                    image="https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-31-dark-copyright.jpg"/>

        <div class="section-wrapper my-5" id="pricelist">
            <div class="container-xxl">
                <div id="pricelist-container" class="px-4 py-5">
                    <h1 class="text-center mb-5">Ценоразпис</h1>
                    <div v-if="isLoading">
                       <h2 class="text-center"> Зареждане ...</h2>
                    </div>
                    <div class="d-grid" v-else-if="prices.length > 0">
                        <template v-for="price in prices" :key="price.id">
                            <PriceSingleton
                                :title="price.name"
                                :price="price.price"
                            />
                        </template>
                    </div>
                    <div v-else>
                        <h2 class="text-center">Няма добавени услуги</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import PriceSingleton from "./PriceSingleton";
import SectionDivider from "../../components/SectionDivider";
import PageBanner from "../../components/PageBanner";
import axios from "axios";
import {onMounted, ref} from "vue";

export default {
    name: "Services",
    components: {
        PriceSingleton,
        SectionDivider,
        PageBanner
    },
    setup() {
        const prices = ref([]);
        const isLoading = ref(false);

        function getServices() {
            isLoading.value = true;
            axios.get('api/services').then(res => {
                isLoading.value = false;
                if (res.status === 200) {
                    return prices.value = res.data;
                }
            }).catch(e => {
                isLoading.value = false;
                return console.log('Could not fetch services', e)
            })
        }

        onMounted(() => {
            getServices();
        })

        return {
            isLoading,
            prices
        }
    },
};
</script>
<style lang="scss" scoped>
#pricelist-container {
    background-color: #1d2223;
}

.d-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0 30px;
    @media screen and (max-width: 992px) {
        grid-template-columns: 1fr;
    }
}

</style>
