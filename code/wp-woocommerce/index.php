<?php get_header() ?>
<?php while (have_posts()): the_post(); ?>
    <?php if (!empty(get_the_content())): ?>
        <section class="the-content-inner">
            <div class="row">
                <div class="column small-12 column-content-inner">
                    <?php the_content() ?>
                </div>
            </div>
        </section>
    <?php endif ?>
    <?php ACF_sections() ?>
<?php endwhile; ?>
<?php get_footer() ?>
