<template>
    <main class="page__media">
        <div class="grid-container">
            <div class="grid-x">
                <div class="column small-12 page__media_celltext">
                    <div class="page__media_content" v-html="media.content.rendered"></div>
                    <router-link v-bind:to="{ name: 'home' }" class="btn btn--normal btn--light-blue">Go to homepage</router-link>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
    import axios from 'axios'

	export default {
		name: 'page-media',
        data: function () {
            return {
            	media: {
            		content: {
            			rendered: ''
                    }
                }
            }
		},
        created() {
			this.loadMedia();
        },
		methods: {
			loadMedia: function () {
				axios
					.get('/wp-json/wp/v2/pages?slug=media')
					.then(r => r.data)
					.then((response) => {
						console.log(response);
						this.media = response[0];
					});
			}
		}
	}
</script>

<style lang="scss">
    @import '../styles/components/media';
</style>
