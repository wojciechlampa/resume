import Vue from 'vue';

Vue.filter('price', value => {
    return '$' + value + '.00'
});

Vue.filter('toUppercase', value => {
    return value.charAt(0).toUpperCase() + value.slice(1);
});

Vue.filter('camelToString', value => {
    return value.replace( /([A-Z])/g, " $1" ).toLowerCase();
});

