<template>
    <div class="price-singleton py-4">
        <span class="me-3"> {{ title }} </span>
        <span class="text_secondary fw-bold"> {{ price }} лв.</span>
    </div>
</template>
<script>
export default {
    name: "PriceSingleton",
    props: ['title', 'price'],
    setup() {
    },
};
</script>
<style lang="scss" scoped>
.price-singleton {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-flow: row nowrap;
    width: 100%;
    border-bottom: 2px dotted #3b4146;
    @media screen and (max-width: 991px) {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>
