import Vue from 'vue';

Vue.filter('capitalizeString', value => {
		if (!value) return '';
		value = value.toString();
		return value.charAt(0).toUpperCase() + value.slice(1)
});

Vue.filter('toTelLink', value => {
		if (!value) return '';
		value = 'tel:' + value.replace(/\W/, '');
		return value;
});