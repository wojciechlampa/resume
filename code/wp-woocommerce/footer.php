</main>
<footer id="main-footer">
    <section class="footer-newsletter-section">
        <div class="row">
            <div class="small-12 medium-12 large-10 large-offset-1 column">
                <div class="row row-in">
                    <div class="shrink column column-icon align-self-middle">
                        <i class="fa fa-newspaper-o"></i>
                    </div>
                    <div class="column column-left column-title-text align-self-middle">
                        <h3>Newsletter</h3>
                        <p>Zapisz sie do naszego newslettera, a oprocz informacji o nowosciach uzyskaj kod na 10% znizki
                            w naszym sklepie online</p>
                    </div>
                    <div class="small-12 large-5 column column-right column-newsletter-form">

                        <div class="tnp tnp-subscription">
                            <form method="post" action=""
                                  onsubmit="return newsletter_check(this)">

                                <input type="hidden" name="nlang" value="">
                                <div class="row row-in-in">
                                    <div class="column column-input">
                                        <div class="tnp-field tnp-field-email">
                                            <input class="tnp-email" type="email" name="ne" required
                                                   placeholder="Adres email...">
                                        </div>
                                    </div>
                                    <div class="shrink column column-submit">
                                        <div class="tnp-field tnp-field-button">
                                            <button class="tnp-submit btn btn-big btn-brown" type="submit">Odbierz
                                                kupon
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-in-in">
                                    <div class="column small-12 column-privacy-policy">
                                        <div class="tnp-field tnp-field-privacy">
                                            <label>
                                                <input type="checkbox" name="ny" required class="tnp-privacy">
                                                <span class="terms">Zapisując się akceptuję <a
                                                            href="<?php echo esc_url(home_url('/polityka-prywatnosci')) ?>">politykę prywatności</a></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row row-border">
        <div class="small-12 medium-12 large-12 column column-border">
            <div class="border-line"></div>
        </div>
    </div>
    <section class="footer-columns-section">
        <div class="row">
            <div class="small-12 medium-6 large-3 column column-first column-company">

            </div>
            <div class="small-12 medium-6 large-3 large-push-6 column column-fourth column-social">
                <div class="row row-in row-first">
                    <div class="small-12 medium-12 large-12 column column-in column-in-publish">
                        <p class="top-paragraph">Gdzie publikujemy:</p>
                        <a href="" class="a-facebook btn btn-social">
                            <i class="fa fa-facebook"></i> <span>facebook</span>
                        </a>
                        <a href="" class="a-pinterest btn btn-social">
                            <i class="fa fa-pinterest"></i> <span>pinterest</span>
                        </a>
                        <a href="" class="a-youtube btn btn-social">
                            <i class="fa fa-youtube"></i> <span>youtube</span>
                        </a>
                        <a href="" class="a-instagram btn btn-social">
                            <i class="fa fa-instagram"></i> <span>instagram</span>
                        </a>
                    </div>
                    <div class="small-12 medium-12 large-12 column column-in column-in-sell">
                        <p class="top-paragraph">Gdzie sprzedajemy:</p>
                        <a href="" class="a-allegro btn btn-social">
                            <i class="fa fa-shopping-bag"></i> <span>allegro</span>
                        </a>
                        <a href="" class="a-pakamera btn btn-social">
                            <i class="fa fa-pakamera"></i> <span>pakamera</span>
                        </a>
                        <a href="" class="a-etsy btn btn-social">
                            <i class="fa fa-etsy"></i> <span>etsy</span>
                        </a>
                        <a href="" class="a-ebay btn btn-social">
                            <i class="fa fa-ebay"></i> <span>ebay</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="small-12 medium-6 large-3 large-pull-3 column column-second column-nav">
                <h4>Nawigacja</h4>
                <?php
                wp_nav_menu(array(
                        'theme_location' => 'footer-menu-primary',
                        'container' => false,
                        'menu_class' => 'footer-menu-primary',
                        'menu_id' => 'footer-menu-primary',
                    )
                );
                ?>
            </div>
            <div class="small-12 medium-6 large-3 large-pull-3 column column-third column-categories">
                <h4>Kategorie</h4>
                <?php
                wp_nav_menu(array(
                        'theme_location' => 'footer-menu-secondary',
                        'container' => false,
                        'menu_class' => 'footer-menu-secondary',
                        'menu_id' => 'footer-menu-secondary',
                    )
                );
                ?>
            </div>
        </div>
    </section>
    <div class="row row-border">
        <div class="small-12 medium-12 large-12 column column-border">
            <div class="border-line"></div>
        </div>
    </div>
    <section class="footer-copyright-section">
        <div class="row">
            <div class="large-12 column column-copyright">
                <p>© <?php echo date('Y'); ?> <a
                            href="<?php echo esc_url(home_url()); ?>"><?php echo get_bloginfo('name'); ?></a> Wszystkie
                    prawa zastrzeżone.</p>
            </div>
        </div>
    </section>
    <?php wp_footer(); ?>
</footer>