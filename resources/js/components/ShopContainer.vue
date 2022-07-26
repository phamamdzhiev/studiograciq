<template>
    <div class="shop-item-singleton text-center p-4">
        <router-link :to="`/product/${Math.floor(Math.random() * 10)}`">
            <img src="https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-24-copyright-150x150.jpg"
                 class="img-fluid mb-4"
                 alt="Product item image"
            />
            <h1 class="item-heading fw-light">Маска за коса</h1>
            <p class="my-3 text_fourtriary">НЯкъв дъми тест</p>
            <p class="fw-bold text_secondary mt-5" id="price">$ 42.52</p>
        </router-link>
    </div>
</template>

<script>
export default {
    name: "ShopContainer"
}
</script>

<style lang="scss" scoped>
.shop-item-singleton {
    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
    background-color: #1d2223;

    .item-heading {
        font-size: 2.6rem;
        @media screen and (max-width: 1024px) {
            font-size: 2.2rem;
        }
    }

    p#price {
        font-size: 2.2rem;
        @media screen and (max-width: 1024px) {
            font-size: 1.8rem;
        }
    }
}
</style>
