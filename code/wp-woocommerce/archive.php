<div class="row">
    <div class="small-12 large-10 large-offset-1 column column-left column-posts">
        <?php if (have_posts()) : ?>
            <?php
            global $wp_query;
            $queried_object = get_queried_object();
            $max_pages = $wp_query->max_num_pages;
            while (have_posts()) : the_post();
                get_template_part('archive-post');
            endwhile;
        endif;
        ?>
        <?php if ($wp_query->max_num_pages > 1) :
            get_template_part('archive-pagination');
        endif ?>
    </div>
</div>