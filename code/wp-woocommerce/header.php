<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <section class="header-social-section">
        <div class="row">
            <div class="shrink column column-social align-self-middle">
                <a href="" class="a-facebook btn btn-social btn-two-lines">
                    <i class="fa fa-facebook"></i>
                    <span>
                        <i>Sprawdź naszą stronę na</i>
                        <strong>facebook</strong>
                    </span>
                </a>
                <a href="" class="a-allegro btn btn-social btn-two-lines">
                    <i class="fa fa-shopping-bag"></i>
                    <span>
                        <i>Sprawdź nasze aukcje na</i>
                        <strong>allegro</strong>
                    </span>
                </a>
            </div>
            <div class="column column-ticker align-self-middle show-for-large">
                <span class="ticker-text">Powyżej 400zł przesyłka gratis!</span>
            </div>
            <div class="column column-account align-self-middle">
                <a href="<?php echo esc_url(home_url('/moje-konto')) ?>" class="a-sign-in"><i
                            class="fa fa-unlock-alt"></i><span>Logowanie</span></a>
            </div>
        </div>
    </section>
    <div class="border">
        <div class="row">
            <div class="small-12 medium-12 large-12 column column-border">
                <span class="border-line medium"></span>
            </div>
        </div>
    </div>
    <section class="header-nav-section">
        <div class="row">
            <div class="medium-12 large-4 column column-logo align-self-middle">
                <a href="<?php echo esc_url(home_url()); ?>" class="a-logo" id="a-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/logo.svg"
                         alt="<?php echo get_bloginfo('name') ?> - <?php echo get_bloginfo('description') ?>">
                </a>
            </div>
            <div class="small-shrink medium-12 large-8 column column-nav">
                <div class="row row-in">
                    <div class="column column-in column-in-nav">
                        <button class="btn btn-close">
                            <i class="fa fa-close"></i>
                        </button>
                        <div class="row row-in-top">
                            <div class="shrink column column-in column-in-menu-primary align-self-middle">
                                <?php
                                wp_nav_menu(array(
                                        'theme_location' => 'header-menu-primary',
                                        'container' => false,
                                        'menu_class' => 'header-menu-primary',
                                        'menu_id' => 'header-menu-primary',
                                    )
                                );
                                ?>
                            </div>
                            <div class="column column-in column-in-search show-for-medium">
                                <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                                    <input name="s" id="s" type="text" placeholder="Szukaj...">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="border-line"></div>
                        <div class="row row-in-bottom">
                            <div class="small-12 medium-12 large-12 column column-in column-in-menu-secondary">
                                <?php
                                wp_nav_menu(array(
                                        'theme_location' => 'header-menu-secondary',
                                        'container' => false,
                                        'menu_class' => 'header-menu-secondary',
                                        'menu_id' => 'header-menu-secondary',
                                    )
                                );
                                ?>
                            </div>
                            <div class="small-12 medium-12 large-12 column column-in column-in-search column-in-search-mobile hide-for-medium">
                                <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                                    <input name="s" id="s" type="text" placeholder="Szukaj...">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="column hide-for-medium align-self-middle">
                        <button class="btn btn-hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <div class="shrink column column-in column-in-cart">
                        <div class="cart-button">
                            <button class="btn btn-mini-cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="basket-value"
                                      id="basket-value"><?php echo WC()->cart->get_cart_total() ?></span>
                                <span class="basket-amount"><?php cart_totals_count() ?></span>
                            </button>
                        </div>
                        <div class="cart-inner">
                            <?php the_widget('WC_Widget_Cart', ''); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if (!is_front_page()): ?>
    <section class="header-breadcrumbs-section">
        <div class="row">
            <div class="small-12 medium-12 large-12 column column-breadcrumbs">
                <div class="border-line"></div>
                <div class="inner">
                    <h1 class="header-title" id="header-title">
                        <?php if (is_archive()) { ?>
                            <?php woocommerce_page_title() ?>
                        <?php } elseif (is_category() || is_home()) { ?>
                            <?php echo get_the_title( get_option('page_for_posts', true) ); ?>
                        <?php } else { ?>
                        <?php echo get_the_title(); ?>
                        <?php } ?>
                    </h1>
                    <?php custom_woocommerce_breadcrumb() ?>
                </div>
                <div class="border-line"></div>
            </div>
        </div>
    </section>
    <?php endif; ?>
</header>
<main id="content">
<?php do_action('woocommerce_before_single_product'); ?>