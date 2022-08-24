// import axios from "axios";
//
// export default {
//     namespaced: true,
//     state() {
//         return {
//             shopItems: []
//         }
//     },
//     getters: {
//         getShopItems(state) {
//             return state.shopItems;
//         },
//         getShopItemsByID(state) {
//             return (id) => {
//                 return state.shopItems.find(e => e.id === id);
//             }
//         }
//     },
//     mutations: {},
//     actions: {
//         setShopItems({state}) {
//             // axios.get('/api/products/all').then((res) => {
//             //     if (res.status === 200) {
//             //         state.shopItems = res.data;
//             //     }
//             // }).catch(e => console.log('Could not fetch products', e));
//         },
//         setShopItem({state}, id) {
//             axios.get(`/api/products/single/${id}`).then((res) => {
//                 if (res.status === 200) {
//                     state.shopItems = [res.data];
//                 }
//             }).catch(e => console.log('Could not fetch products', e));
//         }
//     }
// };
