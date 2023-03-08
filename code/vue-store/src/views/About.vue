<template>
  <div class="page__about">
    <section-description/>
  </div>
</template>

<script>

    import SectionDescription from "../sections/Description";

    export default {
        components: {
            SectionDescription
        },
        name: 'views-about'
    }
</script>

<style lang="scss">
  @import './../styles/views/about';
</style>