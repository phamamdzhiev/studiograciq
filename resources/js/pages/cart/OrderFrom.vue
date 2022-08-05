<template>
    <div id="order-form-wrapper" class="container text-black p-5">
        <FormKit
            type="form"
            id="order-form"
            submit-label=""
            incomplete-message="Моля, попълнете формата коректно"
            :actions="false"
            @submit="submitHandler"
        >
            <FormKit
                type="text"
                name="name"
                label="Име"
                validation="required"
            />
            <FormKit
                type="text"
                name="mobile"
                label="Мобилен номер"
                validation="required|number"
            />
            <FormKit
                type="text"
                name="email"
                label="Имейл"
                validation="email"
            />
            <FormKit
                type="radio"
                name="shipping"
                v-model="shipping"
                :options="{
                  '1': 'Взимане от салона - ул. Стоян Попов 8, гр. Пещера',
                  '2': 'Доставка до адрес (+ 7 BGN)',
                  '3': 'Доставка до oфис (+ 5 BGN)',
                }"
                validation="required"
            />
            <FormKit
                v-if="shipping === '2' || shipping === '3'"
                type="text"
                name="address"
                :label="shipping === '2' ? 'Адрес на клиента' : 'Адрес на офис на Еконт'"
                validation="required"
                help="Доставката се извършва от куриерска фирма Еконт"
            />
            <FormKit
                type="submit"
                label="Поръчай"
                input-class="$reset btn_tertiary"
            />
            <p>
                <small class="text-white">* Всички поръчки се изпращат с наложен платеж</small>
            </p>
        </FormKit>
    </div>
</template>

<script>
import {ref} from "vue";

export default {
    name: "OrderFrom",
    setup() {
        const shipping = ref(null);

        function submitHandler() {
            alert(222)
        }

        return {
            shipping,
            submitHandler
        }
    }
}
</script>

<style scoped>
#order-form-wrapper {
    border-radius: 4px;
    background-color: #192123;
    max-width: 500px;
    margin: auto;
}

</style>
