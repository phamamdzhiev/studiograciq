export const commonData = {
    namespaced: true,
    state() {
        return {
            navigationLinks: []
        }
    },
    getters: {
        GET_LINKS(state) {
            return state.navigationLinks;
        }
    },
    mutations: {
        increment(state) {
            state.count++
        }
    }
};
