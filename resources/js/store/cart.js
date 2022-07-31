export default {
    namespaced: true,
    state() {
        return {
            cart: [],
        };
    },
    mutations: {
        setCart(state, payload) {
            return state.cart.push(payload);
        },
    },
    getters: {
        getCart(state) {
            return state.cart;
        },
    },
};
