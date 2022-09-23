<template>
    <div id="order-form-wrapper" class="container text-black p-5">
        <h3 v-if="errorMessage" class="mb-5 text-danger">
            {{errorMessage}}
        </h3>
        <FormKit
            type="form"
            id="order-form"
            submit-label=""
            incomplete-message="Моля, попълнете формата коректно"
            :actions="false"
            @submit="submitHandler"
        >
            <div class="d-grid">
                <div>
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
                        validation="required|email"
                    />
                    <div v-if="shipping === '2' || shipping === '3'"
                    >
                        <FormKit
                            type="text"
                            name="street"
                            :label="shipping === '2' ? 'Адрес на клиента' : 'Адрес на офис на Еконт'"
                            validation="required"
                        />
                        <FormKit
                            type="text"
                            name="city"
                            label="Град"
                            validation="required"
                        />
                        <FormKit
                            type="text"
                            name="region"
                            label="Област"
                            validation="required"
                        />
                        <FormKit
                            type="text"
                            name="postal_code"
                            label="Пощенски код"
                            validation="required"
                        />
                    </div>
                </div>
                <div>
                    <label class="formkit-label">Доставка</label>
                    <FormKit
                        type="radio"
                        name="shipping"
                        v-model="shipping"
                        :options="{
                  '1': 'Взимане от салона - ул. Стоян Попов 8, гр. Пещера',
                  '2': 'Доставка с ЕКОНТ до адрес (+ 7 лв.)',
                  '3': 'Доставка с ЕКОНТ до oфис (+ 5 лв.)',
                }"
                        validation="required"
                    />
                </div>
            </div>
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
import {useRouter} from "vue-router";
import axios from "axios"
import {useStore} from "vuex";

export default {
    name: "OrderFrom",
    props: ['cartItems'],
    setup(props) {
        const shipping = ref(null);
        const router = useRouter();
        const store = useStore();
        const errorMessage = ref(null);

        async function submitHandler(orderData) {
            const cartItems = props.cartItems.map(e => {
                return {
                    id: e.id,
                    amount: e.amount
                }
            });

            const formData = {
                orderData,
                cartItems
            }

            try {
                const res = await axios.post('api/order/create', formData);
                if (res.status === 200) {
                    store.commit('Cart/emptyCart');
                    await router.replace('/thanks');
                }
            } catch (e) {
                console.log('Cannot proceed with checkout', e);
                errorMessage.value = 'Оопс! Нещо се обърка, моля опитайте отново!';
            }
        }

        return {
            shipping,
            submitHandler,
            errorMessage
        }
    }
}
</script>

<style lang="scss" scoped>
.d-grid {
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    @media screen and (max-width: 992px) {
        gap: 0;
        grid-template-columns: 1fr;
    }
}

#order-form-wrapper {
    border-radius: 4px;
    background-color: #192123;
    /*max-width: 500px;*/
    margin: auto;
}

</style>
