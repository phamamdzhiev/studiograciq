<template>
    <div id="top-bar-header">
        <div class="container-fluid">
            <HeaderContacts/>
        </div>
    </div>
</template>

<script>
import HeaderContacts from "./HeaderContacts";

export default {
    name: "TopBarHeader",
    components: {
        HeaderContacts
    }
}
</script>

<style scoped>
#top-bar-header {
    width: 100%;
    border-bottom: 1px solid #9e49a3;
}
</style>
