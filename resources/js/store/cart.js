export default {
    namespaced: true,
    state() {
        return {
            cart: [],
        };
    },
    mutations: {
        emptyCart(state) {
            return state.cart = [];
        },
        removeCartItemByID(state, itemID) {
            const index = state.cart.findIndex(element => {
                return element.id === itemID;
            });

            if (index > -1) {
                return state.cart.splice(index, 1);
            }
        },
        setCart(state, payload) {
            const index = state.cart.findIndex(element => {
                return element.id === payload.id;
            });
            if (index < 0) {
                return state.cart.push(payload);
            } else {
                state.cart.splice(index, 1);
            }
        },
    },
    getters: {
        getCart(state) {
            return state.cart;
        }
    },
};
