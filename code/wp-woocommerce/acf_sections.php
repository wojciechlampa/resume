<?php
function ACF_sections()
{
    if (have_rows('sections')):
        while (have_rows('sections')) : the_row();

            if (get_row_layout() == 'col_2_x_6_categories_blocks'): ?>

                <section class="product-categories-section">
                    <div class="row row-top">
                        <div class="small-12 medium-12 large-12 column column-title">
                            <h3><?php the_sub_field('title') ?></h3>
                            <p><?php the_sub_field('subtitle') ?></p>
                        </div>
                    </div>
                    <div class="row row-bottom">

                        <?php

                        $taxonomy = 'product_cat';
                        $orderby = 'name';
                        $show_count = 0;
                        $pad_counts = 0;
                        $hierarchical = 1;
                        $title = '';
                        $empty = 0;

                        $args = array(
                            'taxonomy' => $taxonomy,
                            'orderby' => $orderby,
                            'show_count' => $show_count,
                            'pad_counts' => $pad_counts,
                            'hierarchical' => $hierarchical,
                            'title_li' => $title,
                            'hide_empty' => $empty
                        );
                        $all_categories = get_categories($args);
                        foreach ($all_categories as $cat) {

                            $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
                            $image = wp_get_attachment_image_url($thumbnail_id, 'image-170-170');
                            $cat_id = $cat->term_id;

                            ?>

                            <div class="small-6 medium-4 large-2 column column-category">
                                <a href="<?php echo get_term_link($cat_id, 'product_cat') ?>">
                                    <img src="<?php echo $image ?>" alt="">
                                    <span><?php echo $cat->name ?></span>
                                </a>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                </section>

            <?php endif;

            if (get_row_layout() == 'col_3_x_4_product_image_title_data_carousel'): ?>

                <section class="featured-products-section">
                    <div class="row row-top">
                        <div class="large-12 column column-title">
                            <h3><?php the_sub_field('title') ?></h3>
                            <p><?php the_sub_field('subtitle') ?></p>
                        </div>
                    </div>
                    <div class="row row-bottom">
                        <div class="small-12 medium-12 large-12 column column-slider">
                            <div class="row products-slider">
                                <?php if (have_rows('products')): ?>
                                    <?php while (have_rows('products')) : the_row() ?>
                                        <?php include(locate_template('templates/small-product.php', false, false)); ?>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <?php
                                    $args = array(
                                            'post_type' => 'product',
                                            'posts_per_page' => 8,
                                            'orderby' => 'post_date',
                                            'order' => 'DESC'
                                    );
                                    $products_query = new WP_Query($args);

                                    while ($products_query->have_posts()) :
                                        $products_query->the_post();
                                        include(locate_template('templates/small-product.php', false, false));
                                    endwhile;
                                    ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>

            <?php endif;

            if (get_row_layout() == 'col_4_x_3_single_news'): ?>

                <section class="news-blocks-section">
                    <div class="row row-top">
                        <div class="large-12 column column-title">
                            <h3><?php the_sub_field('title') ?></h3>
                            <p><?php the_sub_field('subtitle') ?></p>
                        </div>
                    </div>
                    <div class="row row-bottom">
                        <?php
                        $posts_count = count(get_sub_field('posts'));
                        if ($posts_count == 1) {
                            $column_classes = 'small-12 medium-12 large-12';
                        } elseif ($posts_count == 2) {
                            $column_classes = 'small-12 medium-6 large-6';
                        } else {
                            $column_classes = 'small-12 medium-12 large-4';
                        }
                        ?>

                        <?php if (have_rows('posts')): ?>
                            <?php while (have_rows('posts')) : the_row() ?>
                                <?php $post_id = get_sub_field('post')->ID ?>
                                <div class="<?php echo $column_classes ?> column column-article">
                                    <div class="row row-in">
                                        <div class="medium-shrink large-6 column column-left column-image">
                                            <div class="inner">
                                                <div class="date-year">
                                                    <div class="outer">
                                                        <div class="date"><?php echo get_the_date('d / m') ?></div>
                                                        <div class="year"><?php echo get_the_date('Y') ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?php echo get_permalink($post_id) ?>">
                                                <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/lamp4.jpg"
                                                     alt="<?php echo get_bloginfo('name') ?> - <?php echo get_the_title($post_id) ?>">
                                            </a>
                                        </div>
                                        <div class="large-6 column column-right column-text">
                                            <a href="<?php echo get_permalink($post_id) ?>">
                                                <h4><?php echo get_the_title($post_id) ?></h4>
                                            </a>
                                            <p><?php echo wp_trim_words(get_the_excerpt($post_id), '22') ?></p>
                                            <a href="<?php echo get_permalink($post_id) ?>" class="btn btn-text btn-read-more">Czytaj więcej <i
                                                        class="fa fa-file-text"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </section>

            <?php endif;

            if (get_row_layout() == 'col_6_x_2_banner_title_paragraph_button_background'): ?>

                <section class="two-banners-section">
                    <div class="row row-border">
                        <div class="small-12 medium-12 large-12 column column-border">
                            <div class="border-line"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 medium-12 large-6 column column-left column-banner">
                            <?php if (have_rows('banner_1')): ?>
                                <?php while (have_rows('banner_1')) : the_row() ?>
                                    <div class="inner">
                                        <div class="shadow"></div>
                                        <div class="shadow-left"></div>
                                        <img src="<?php echo get_sub_field('photo')['sizes']['image-570-280'] ?>"
                                             alt="<?php the_sub_field('title') ?>">
                                        <div class="text">
                                            <h3><?php the_sub_field('title') ?></h3>
                                            <p><?php the_sub_field('paragraph') ?></p>
                                            <a href="<?php the_sub_field('button_link') ?>"
                                               class="btn btn-big btn-brown"><?php the_sub_field('button_text') ?></a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <div class="small-12 medium-12 large-6 column column-right column-banner">
                            <?php if (have_rows('banner_2')): ?>
                                <?php while (have_rows('banner_2')) : the_row() ?>
                                    <div class="inner">
                                        <div class="shadow"></div>
                                        <div class="shadow-left"></div>
                                        <img src="<?php echo get_sub_field('image')['sizes']['image-570-280'] ?>"
                                             alt="<?php the_sub_field('title') ?>">
                                        <div class="text">
                                            <h3><?php the_sub_field('title') ?></h3>
                                            <p><?php the_sub_field('paragraph') ?></p>
                                            <a href="<?php the_sub_field('button_link') ?>"
                                               class="btn btn-big btn-brown"><?php the_sub_field('button_text') ?></a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row row-border">
                        <div class="small-12 medium-12 large-12 column column-border">
                            <div class="border-line"></div>
                        </div>
                    </div>
                </section>

            <?php endif;

            if (get_row_layout() == 'col_12_banner_title_description_button_background'): ?>

                <section class="single-banner-section">
                    <div class="row row-border">
                        <div class="small-12 medium-12 large-12 column column-border">
                            <div class="border-line"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 column">
                            <div class="inner">
                                <div class="shadow"></div>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/banner3.jpg"
                                     alt="">
                                <div class="text">
                                    <h2><?php the_sub_field('title') ?></h2>
                                    <p><?php the_sub_field('description') ?></p>
                                    <a href="<?php the_sub_field('button_link') ?>"
                                       class="btn btn-big btn-brown"><?php the_sub_field('button_text') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-border">
                        <div class="small-12 medium-12 large-12 column column-border">
                            <div class="border-line"></div>
                        </div>
                    </div>
                </section>

            <?php endif;

            if (get_row_layout() == 'col_12_banner_slider'): ?>

                <section class="main-slider-section">
                    <div class="row">
                        <div class="small-12 medium-12 large-12 column column-slider">
                            <div class="banners-slider-section">
                                <?php if (have_rows('slider')): ?>
                                    <?php while (have_rows('slider')) : the_row() ?>
                                        <div class="slide">
                                            <div class="row">
                                                <div class="small-12 medium-12 large-6 column column-left column-photo">
                                                    <img src="<?php echo get_sub_field('image')['sizes']['image-570-500'] ?>"
                                                         alt="<?php echo get_bloginfo('name') ?> - <?php the_sub_field('title') ?>">
                                                </div>
                                                <div class="small-12 medium-12 large-6 column column-right column-text">
                                                    <div class="inner">
                                                        <div class="row row-in full-height">
                                                            <div class="small-12 medium-12 large-12 column column-in column-text-in align-self-middle">
                                                                <span class="text-small"><?php the_sub_field('above_title') ?></span>
                                                                <h2 class="text-title"><?php the_sub_field('title') ?></h2>
                                                                <p class="text-paragraph"><?php the_sub_field('paragraph') ?></p>
                                                                <a href="<?php the_sub_field('button_link') ?>"
                                                                   class="btn btn-big btn-brown"><?php the_sub_field('button_text') ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>

            <?php endif;

            if (get_row_layout() == 'col_12_content'): ?>

                <section class="col-12-content-section">
                    <div class="row">
                        <div class="small-12 medium-12 large-12 column column-content">
                            <?php the_sub_field('content') ?>
                        </div>
                    </div>
                </section>

            <?php endif;

            if (get_row_layout() == 'col_6_contact_details_col_6_form'): ?>

                <section class="col-6-contact-details-col-6-form-section">
                    <div class="row">
                        <div class="small-12 medium-6 large-4 column column-contact-details">
                            <div class="contact-details">
                                <h4 class="title"><?php the_sub_field('details_title') ?></h4>
                                <ul>
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        <span class="info"><?php echo get_sub_field('details')['address'] ?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        <span class="info"><?php echo get_sub_field('details')['phone'] ?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"></i>
                                        <span class="info"><?php echo get_sub_field('details')['email'] ?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar-o"></i>
                                        <span class="info"><?php echo get_sub_field('details')['opening_hours'] ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="payment-details">
                                <h4 class="title"><?php the_sub_field('payment_title') ?></h4>
                                <ul>
                                    <li>
                                        <i class="fa fa-address-book"></i>
                                        <span class="info"><?php echo get_sub_field('payment')['name'] ?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-bank"></i>
                                        <span class="info"><?php echo get_sub_field('payment')['bank'] ?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-credit-card"></i>
                                        <span class="info"><?php echo get_sub_field('payment')['account'] ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="small-12 medium-6 large-8 column column-form">
                            <div class="inner">
                                <div class="description"><?php echo get_sub_field('form_description') ?></div>
                                <?php echo do_shortcode('[contact-form-7 id="' . get_sub_field('form') . '"]') ?>
                            </div>
                        </div>
                    </div>
                </section>

            <?php endif;

            if (get_row_layout() == 'pixel_line'): ?>

                <section class="pixel-line-section">
                    <div class="row">
                        <div class="small-12 medium-12 large-12 column column-line">
                            <span class="line"></span>
                        </div>
                    </div>
                </section>

            <?php endif;

        endwhile;
    endif;
}