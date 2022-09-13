<template>
    <div class="shop-item-singleton text-center p-4">
        <router-link :to="`/product/${id}`">
            <img :src="`/storage/products/${image}`"
                 class="img-fluid mb-4"
                 alt="Product item image"
            />
            <h4 class="text-uppercase fw-bold">{{brand}}</h4>
            <h3 class="item-heading fw-light my-3">{{name}}</h3>
            <p class="fw-bold text_secondary" id="price">{{price}} лв.</p>
        </router-link>
    </div>
</template>

<script>
export default {
    name: "ProductItemSingleton",
    props: ['image', 'name', 'desc', 'price', 'id', 'brand']
}
</script>

<style lang="scss" scoped>
.shop-item-singleton {
    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
    background-color: #1d2223;

    //.item-heading {
    //    font-size: 2.6rem;
    //    @media screen and (max-width: 1024px) {
    //        font-size: 2.2rem;
    //    }
    //}

    p#price {
        font-size: 2.2rem;
        @media screen and (max-width: 1024px) {
            font-size: 1.8rem;
        }
    }
}
</style>
