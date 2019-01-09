<?php global $product ?>
<div class="small-12 medium-8 large-8 column column-details">
    <table class="details-tabs" data-deep-link="true" data-update-history="true" data-tabs
           id="product-details-tabs">
        <thead>
        <tr>
            <th class="tabs-title is-active">
                <a href="#opis" aria-selected="true"><i class="fa fa-list"></i> Opis</a>
            </th>
            <th class="tabs-title">
                <a href="#opinie"><i class="fa fa-comments"></i>
                    Opinie <?php if ($product->get_review_count() > 0) echo '(' . $product->get_review_count() . ')' ?>
                </a>
            </th>
            <th class="tabs-title">
                <a href="#dostawa-platnosc"><i class="fa fa-truck"></i> Dostawa i płatność</a>
            </th>
            <th class="tabs-title">
                <a href="#zapytaj"><i class="fa fa-envelope"></i> Zapytaj</a>
            </th>
        </tr>
        </thead>
    </table>

    <div class="details-tabs-content" data-tabs-content="product-details-tabs">
        <div class="tabs-panel is-active" id="opis">
            <div class="product-description">
                <?php echo apply_filters('the_content', $product->get_description()) ?>
            </div>
            <table class="details-table">
                <tbody>
                <tr>
                    <td>Nazwa:</td>
                    <td><?php echo $product->get_name() ?></td>
                </tr>
                <tr>
                    <td>Kategoria:</td>
                    <td>
                        <?php $product_cat = get_term($product->get_category_ids()[0], 'product_cat') ?>
                        <a href="<?php echo get_term_link($product_cat->term_id, 'product_cat') ?>">
                            <span class="product-category"><?php echo $product_cat->name ?></span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Kolekcja:</td>
                    <td>
                        <?php $terms = get_the_terms($product->get_id(), 'kolekcja');
                        foreach ($terms as $term) {
                            $term_link = get_term_link($term, 'kolekcja');
                            echo '<a href="' . $term_link . '">' . $term->name . '</a>';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Wymiary:</td>
                    <td><?php echo $product->get_dimensions() ?></td>
                </tr>
                <tr>
                    <td>Waga:</td>
                    <td><?php echo $product->get_weight() ?> kg</td>
                </tr>
                <?php

                $attributes = $product->get_attributes();

                foreach ($attributes as $attribute) {
                    $name = $attribute->get_name();

                    $terms = wp_get_post_terms($product->get_id(), $name, 'all');
                    $tax = $terms[0]->taxonomy;
                    $tax_object = get_taxonomy($tax);

                    if (isset ($tax_object->labels->singular_name)) {
                        $tax_label = $tax_object->labels->singular_name;
                    } elseif (isset($tax_object->label)) {
                        $tax_label = $tax_object->label;
                        if (0 === strpos($tax_label, 'Product ')) {
                            $tax_label = substr($tax_label, 8);
                        }
                    }

                    $out = '<tr>';
                    $out .= '<td>' . esc_html($tax_label) . ': </td> ';
                    $out .= '<td>';
                    $tax_terms = array();

                    foreach ($terms as $term) {
                        $single_term = esc_html($term->name);
                        array_push($tax_terms, $single_term);
                    }

                    $out .= implode(', ', $tax_terms);
                    $out .= '</span></td>';
                    echo $out;
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="tabs-panel" id="opinie">
            <?php comments_template('woocommerce/single-product-reviews') ?>
        </div>
        <div class="tabs-panel" id="dostawa-platnosc">
            <h4>Płatności</h4>
            <p>Suspendisse ante ligula, faucibus sed augue laoreet, finibus scelerisque dui.</p>
            <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/payments.jpg" alt="">
            <h4>Dostawa</h4>
            <p>Suspendisse ante ligula, faucibus sed augue laoreet, finibus scelerisque dui.</p>
            <table class="details-table">
                <thead>
                <tr>
                    <th></th>
                    <th>Płatność online</th>
                    <th>Płatność pobraniowo</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Do 500 zł</td>
                    <td align="center">15 zł</td>
                    <td align="center">0</td>
                </tr>
                <tr>
                    <td>Powyżej 500zł</td>
                    <td align="center">30 zł</td>
                    <td align="center">15 zł</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="tabs-panel" id="zapytaj">
            <div class="form-box">
                <h4>Zapytaj o produkt</h4>
                <p>Suspendisse ante ligula, faucibus sed augue laoreet, finibus scelerisque dui. Morbi
                    turpis
                    felis, ornare a metus at, auctor interdum justo. Etiam eget turpis placerat, rhoncus
                    tellus
                    eu, finibus neque. Praesent at lorem sed nisi scelerisque pretium. Ut tincidunt vehicula
                    metus, et feugiat ligula faucibus quis.</p>
                <?php echo do_shortcode('[contact-form-7 id="168"]') ?>
            </div>
        </div>
    </div>
</div>