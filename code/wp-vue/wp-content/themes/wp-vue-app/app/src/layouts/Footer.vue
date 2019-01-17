<template>
    <footer class="footer">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell footer__cellcopyright">
                    <div class="footer__copyright">© {{year}} Zephyr - Cheap Hurricane Insurance</div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
	export default {
		name: 'layout-footer',
		computed: {
			year() {
				return new Date().getFullYear();
			}
		}
	}
</script>

<style lang="scss">
    @import '../styles/components/footer';
</style>
