<template>
    <div class="section-divider"></div>
</template>

<script>
export default {
    name: "SectionDivider"
}
</script>

<style lang="scss" scoped>
.section-divider {
    margin: 6rem auto;
    width: 100px;
    height: 1px;
    background-color: #798a8a;

    @media screen and (max-width: 992px) {
        width: 40%
    }

}
</style>
