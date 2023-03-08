<template>
    <section class="section__categories">
        <div class="grid-container full-height">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6">
                    <div class="section__categories_box">
                        <router-link v-bind:to="{name: 'shop', params: {slug: 'mens'}}">
                            <img class="section__categories_box_image" src="./../assets/MENS.jpg" alt="">
                            <div class="grid-x">
                                <div class="cell align-self-middle">
                                    <div class="section__categories_box_text">
                                        <div class="section__categories_box_text_label">watches</div>
                                        <div class="section__categories_box_text_name">Mens</div>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
                <div class="cell small-12 medium-6">
                    <div class="section__categories_box">
                        <router-link v-bind:to="{name: 'shop', params: {slug: 'womens'}}">
                            <img class="section__categories_box_image" src="./../assets/WOMENS.jpg" alt="">
                            <div class="grid-x">
                                <div class="cell align-self-middle">
                                    <div class="section__categories_box_text">
                                        <div class="section__categories_box_text_label">watches</div>
                                        <div class="section__categories_box_text_name">Womens</div>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'section-categories'

    }
</script>

<style lang="scss">
    @import "../styles/sections/categories";
</style>