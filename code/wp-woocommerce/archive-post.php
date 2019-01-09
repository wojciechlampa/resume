<article class="single-post-archive">
    <?php

    global $post;
    $post_id = $post->ID;

    $num_comments = get_comments_number();

    if (comments_open()) {
        if ($num_comments == 0) {
            $comments = __('0 komentarzy');
        } elseif ($num_comments == 1) {
            $comments = __('1 komentarz');
        } elseif ($num_comments > 1 && $num_comments < 5) {
            $comments = $num_comments . __(' komentarze');
        } else {
            $comments = $num_comments . __(' komentarzy');
        }
        $write_comments = '<a href="' . get_comments_link() . '">' . $comments . '</a>';
    }

    ?>
    <div class="row">
        <div class="small-12 medium-5 large-5 column column-thumbnail-date">
            <div class="thumbnail">
                <div class="date-year">
                    <div class="outer">
                        <div class="date"><?php echo get_the_date('d / m') ?></div>
                        <div class="year"><?php echo get_the_date('Y') ?></div>
                    </div>
                </div>
                <a class="thumbnail-link" href="<?php echo get_permalink() ?>">
                    <img src="<?php echo get_the_post_thumbnail_url($post_id, 'image-370-210') ?>"
                         alt="<?php echo get_the_title() ?> - <?php echo get_bloginfo('name') ?>">
                </a>
            </div>
        </div>
        <div class="small-12 medium-7 large-7 column column-details align-self-middle">
            <h2 class="title">
                <a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a>
            </h2>
            <div class="excerpt"><?php echo wp_trim_words(get_the_excerpt(), 50) ?></div>
            <div class="read-more">
                <a href="<?php echo get_permalink() ?>" class="btn btn-text btn-orange">Czytaj więcej <i
                            class="fa fa-file-text"></i></a>
            </div>
        </div>
    </div>
</article>