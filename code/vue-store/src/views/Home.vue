<template>
  <div class="page__home">
    <section-hero/>
    <section-categories/>
    <section-featured-products/>
    <section-description/>
  </div>
</template>

<script>

import SectionHero from "../sections/Hero";
import SectionDescription from "../sections/Description";
import SectionCategories from "../sections/Categories";
import SectionFeaturedProducts from "../sections/FeaturedProducts";

export default {
    components: {
        SectionFeaturedProducts,
        SectionCategories,
        SectionDescription,
        SectionHero
    },
    name: 'views-home'
}
</script>
