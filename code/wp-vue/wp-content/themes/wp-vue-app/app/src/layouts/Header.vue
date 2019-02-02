<template>
    <header class="header">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell auto header__celllogo align-self-middle">
                    <router-link to="/" class="header__logo">
                        <img class="header__logo_img" src="/wp-content/themes/gc-starter/app/src/assets/logo.svg"
                             alt="">
                    </router-link>
                </div>
                <div class="cell small-12 medium-5 header__cellcall">
                    <div class="header__call">
                        <div class="header__call_person">
                            <img class="header__call_person_image"
                                 src="/wp-content/themes/gc-starter/app/src/assets/call-person.jpg" alt="">
                        </div>
                        <div class="header__call_details">
                            <div class="header__call_details_area">
                                <div class="grid-x">
                                    <div class="cell auto header__call_details_area_cellarealabel">
                                        <div class="header__call_details_area_label">
                                            Your area rep
                                        </div>
                                    </div>
                                    <div class="cell auto header__call_details_area_cellareaswitch">
                                        <div class="header__call_details_area_switch">
                                            <button class="header__call_details_area_switch_button" type="button"
                                                    v-on:click="areaMenuSwitch">
                                                Change area
                                            </button>
                                            <template v-if="areaMenu">
                                                <ul class="header__call_details_area_switch_menu">
                                                    <li v-for="(island, index) in islands" v-if="index !== 'default'"
                                                        v-bind:class="[currentLocation == index ? 'active' : '' ]">
                                                        <button type="button"
                                                                class="header__call_details_area_switch_menu_link"
                                                                v-on:click="switchLocation(index, island)">
                                                            {{index | capitalizeString}}
                                                        </button>
                                                    </li>
                                                </ul>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                                <div class="header__call_details_area_number">
                                    <a v-bind:href="currentPhoneNumber | toTelLink">{{currentPhoneNumber}}</a>
                                </div>
                                <div class="header__call_details_area_name">
                                    Call Lani
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
	import {mapState, mapActions} from 'vuex'

	export default {
		data: function () {
			return {
				areaMenu: false
			}
		},
		name: 'layout-header',
		methods: {
			...mapActions([
				'loadIslands'
			]),
			areaMenuSwitch: function () {
				this.areaMenu = !this.areaMenu;
			},
			switchLocation: function (index, island) {
				this.$store.dispatch('switchLocation', {
					island: index,
					phone: island.phone
				});
			}
		},
		computed: {
			...mapState([
				'islands',
				'currentLocation',
				'currentPhoneNumber'
			])
		},
		created() {
			this.loadIslands();
		}
	}
</script>

<style lang="scss">
    @import '../styles/components/header';
</style>
