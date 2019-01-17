<template>
    <div class="grid-x grid-margin-x">

            <div class="cell small-12 medium-12 large-6 component__article_cell" v-for="index in 8" :key="index">
                <a class="component__article">

                    <div class="component__article_arrow">
                        <font-awesome-icon icon="angle-right"/>
                    </div>
                    <div class="component__article_title">
                        Nulla porttitor accumsan tincidunt. Nulla quis lorem ut libero malesuada feugiat.
                    </div>
                    <div class="component__article_readmore">
                        Read more
                    </div>
                </a>
            </div>

    </div>
</template>

<script>
	export default {
		data: function () {
			return {}
		},
		name: 'component-article',
	}
</script>

<style lang="scss">
</style>
