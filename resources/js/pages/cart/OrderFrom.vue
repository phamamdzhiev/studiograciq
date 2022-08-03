<template>
    <div id="order-form-wrapper" class="container text-black p-5">
        <FormKit
            type="form"
            id="registration-example"
            submit-label="Register"
Ф            :actions="false"
            #default="{ value }"
        >
            <FormKit
                type="text"
                name="name"
                label="Име"
                validation="required"
            />
            <FormKit
                type="text"
                name="email"
                label="Имейл"
                validation="email"
            />
            <FormKit
                type="text"
                name="mobile"
                label="Мобилен номер"
                validation="required"
            />
            <FormKit
                type="text"
                name="mobile"
                label="Адрес за доставка"
                validation="required"
                help="Доставката се извършва от куриерска фирма ЕКОНТ"
            />
            <FormKit
                type="submit"
                label="Register"
            />
        </FormKit>
    </div>
</template>

<script>
export default {
    name: "OrderFrom"
}
</script>

<style scoped>
#order-form-wrapper {
    border-radius: 4px;
    background-color: #9e49a3;
}
</style>
