<div class="row row-in row-pagination">
    <div class="small-12 medium-12 large-12 column column-pagination">
        <div class="blog-pagination">
            <?php $pagination = array(
                'end_size' => 1,
                'mid_size' => 3,
                'prev_next' => false,
                'total' => $wp_query->max_num_pages
            ) ?>
            <ul>
                <li class="prev page-numbers">
                    <?php
                    if (get_previous_posts_link('', $wp_query->max_num_pages)) {
                        previous_posts_link('<i class="fa fa-angle-left"></i> Poprzednie', $wp_query->max_num_pages);
                    } else {
                        echo '<span class="disabled"><i class="fa fa-angle-left"></i> Poprzednie</span>';
                    } ?>
                </li>
                <li class="numbers number-nav">
                    <?php echo paginate_links($pagination) ?>
                </li>
                <li class="next page-numbers">
                    <?php
                    if (get_next_posts_link('', $wp_query->max_num_pages)) {
                        next_posts_link('Następne <i class="fa fa-angle-right"></i>', $wp_query->max_num_pages);
                    } else {
                        echo '<span class="disabled">Następne <i class="fa fa-angle-right"></i></span>';
                    }; ?>
                </li>
            </ul>
        </div>
    </div>
</div>