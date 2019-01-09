<?php get_header() ?>
<article class="single-post-inner">
    <div class="row">
        <div class="small-12 large-10 large-offset-1 column column-thumbnail-date">
            <div class="thumbnail">
                <div class="date-year">
                    <div class="outer">
                        <div class="date"><?php echo get_the_date('d / m') ?></div>
                        <div class="year"><?php echo get_the_date('Y') ?></div>
                    </div>
                </div>
                <div class="thumbnail">
                    <img src="<?php echo get_the_post_thumbnail_url($post_id, 'image-970-370') ?>"
                         alt="<?php echo get_the_title() ?> - <?php echo get_bloginfo('name') ?>">
                </div>
            </div>
        </div>
        <div class="small-12 large-10 large-offset-1 column column-details">
            <h2 class="title">
                <?php echo get_the_title() ?>
            </h2>
            <div class="content"><?php the_content() ?></div>
            <div class="share">
                <?php echo do_shortcode('[addtoany]') ?>
            </div>
        </div>
        <div class="small-12 large-10 large-offset-1 column column-comments">
        </div>
    </div>
</article>
<?php get_footer() ?>
