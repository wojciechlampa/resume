<template>
    <div class="component__filter component__filter--search">
        <form action="" v-on:submit.prevent>
            <input type="text" placeholder="Search products..." v-on:keyup="updateFilterKeyword">
        </form>
    </div>
</template>

<script>
    export default {
        name: 'component-filtersearch',
        methods: {
            updateFilterKeyword: function ($event) {
                this.$store.dispatch('updateFilterKeyword', $event.target.value)
            }
        }
    }
</script>

<style lang="scss">

</style>