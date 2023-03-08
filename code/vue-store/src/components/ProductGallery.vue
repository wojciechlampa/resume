<template>
    <div class="component__product_gallery">
            <img class="component__product_gallery_image" v-bind:src="require(`@/assets/${thumbnail}`)" alt="">
        <template v-if="gallery.length > 0">
            <div class="component__product_gallery_thumbnails">
                <ul>
                    <li v-for="(photo, index) in gallery" v-bind:key="index">
                        <img class="component__product_gallery_image" v-bind:src="require(`@/assets/${photo}`)" alt="">
                    </li>
                </ul>
            </div>
        </template>
    </div>
</template>

<script>
    export default {
        name: 'component-productgallery',
        props: [
            'thumbnail',
            'gallery'
        ]
    }
</script>

<style lang="scss">
    @import './../styles/components/productgallery';
</style>