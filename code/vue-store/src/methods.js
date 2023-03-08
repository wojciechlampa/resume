import Vue from 'vue'

Vue.mixin({
    methods: {
        cartTotal: function () {
            return Object.values(this.$store.state.cart.products)
                .reduce((total, item) => total + (item.count * item.price), 0);
        },
        removeFromCart: function (item) {
            item = {
                id: item.id,
                name: item.name,
                price: item.price,
                thumbnail: item.thumbnail
            };
            this.$store.dispatch('removeFromCart', item)
        },
        addToCart: function (item) {
            item = {
                id: item.id,
                name: item.name,
                price: item.price,
                thumbnail: item.thumbnail
            };
            this.$store.dispatch('addToCart', item)
        }
    }
});