export default {
    namespaced: true,
    state() {
        return {
            shopItems: [
                {
                    id: 11,
                    title: 'TEst',
                    image: 'https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-24-copyright-150x150.jpg',
                    price: '123',
                    desc: 'no desc for now'
                },
                {
                    id: 12,
                    title: 'TEst 1',
                    image: 'https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-24-copyright-150x150.jpg',
                    price: '9',
                    desc: 'no desc for now'
                },
                {
                    id: 31,
                    title: 'TEst 2',
                    image: 'https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-24-copyright-150x150.jpg',
                    price: '53',
                    desc: 'no desc for now'
                },
                {
                    id: 14,
                    title: 'TEst 3',
                    image: 'https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-24-copyright-150x150.jpg',
                    price: '23',
                    desc: 'no desc for now'
                },
                {
                    id: 15,
                    title: 'TEst 3',
                    image: 'https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-24-copyright-150x150.jpg',
                    price: '23',
                    desc: 'no desc for now'
                },
                {
                    id: 6,
                    title: 'TEst 3',
                    image: 'https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-24-copyright-150x150.jpg',
                    price: '23',
                    desc: 'no desc for now'
                },
                {
                    id: 7,
                    title: 'TEst 3',
                    image: 'https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-24-copyright-150x150.jpg',
                    price: '23',
                    desc: 'no desc for now'
                },
                {
                    id: 8,
                    title: 'TEst 3',
                    image: 'https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-24-copyright-150x150.jpg',
                    price: '23',
                    desc: 'no desc for now'
                },
            ]
        }
    },
    getters: {
        getShopItems(state) {
            return state.shopItems;
        },
        getShopItemsByID(state) {
            return (id) => {
                return state.shopItems.find(e => e.id === id);
            }
        }
    },
    mutations: {},
    actions: {}
};
