<template>
    <section class="section__hero">
        <img class="section__hero_image" src="../assets/HERO.jpg" alt="">
        <div class="grid-container full-height">
            <div class="grid-x full-height">
                <div class="cell align-self-middle">
                    <div class="section__hero_text">
                        <div class="section__hero_text_above">Aenean consectetur, eros non vestibulum imperdiet</div>
                        <h1 class="section__hero_text_title">Nulla purus tristique sem, non mollis dolor enim</h1>
                        <router-link class="btn btn--normal btn--white" v-bind:to="'shop/mens'">Class aptent</router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'section-hero'
    }
</script>

<style lang="scss">
    @import "../styles/sections/hero";
</style>