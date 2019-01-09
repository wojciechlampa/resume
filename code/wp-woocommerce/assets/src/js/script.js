(function ($) {

    function homeSlider() {
        var slider = $('.banners-slider-section');

        slider.slick({
            adaptiveHeight: true,
            arrows: false
        });
    }

    function productsSlider() {
        var slider = $('.products-slider');
        var products = slider.find('.small-product');

        if (products.length > 4) {
            slider.slick({
                dots: false,
                arrows: true,
                infinite: true,
                speed: 800,
                slidesToShow: 4,
                slidesToScroll: 4,
                prevArrow: '<button class="slick-prev"><i class="fa fa-caret-left"></i></button>',
                nextArrow: '<button class="slick-next"><i class="fa fa-caret-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 1280,
                        settings: {
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            autoplay: true,
                            autoplaySpeed: 5000,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            })
        }
    }

    function mobileMenu() {
        var menu = $('section.header-nav-section .column-nav .column-in-nav');
        var button = $('section.header-nav-section .btn-hamburger');
        var buttonClose = menu.find('.btn-close');

        button.click(function () {
            if (menu.hasClass('opened')) {
                menu.removeClass('opened');
                button.removeClass('opened');
            } else {
                menu.addClass('opened');
                button.addClass('opened');
            }
        });

        buttonClose.click(function () {
            menu.removeClass('opened');
            button.removeClass('opened');
        })
    }

    function minicartButton() {
        var button = $('section.header-nav-section .column-in-cart .btn-mini-cart');
        var minicart = $('section.header-nav-section .column-in-cart .cart-inner');
        var body = $('body');
        var widget = $('.widget_shopping_cart');

        if (widget.length === 0) {
            return;
        }

        button.click(function () {
            if (minicart.is(':hidden')) {
                button.addClass('active');
                minicart.addClass('active');
                minicart.fadeIn('100');
            } else {
                button.removeClass('active');
                minicart.removeClass('active');
                minicart.fadeOut('100');
            }
        });

        body.click(function (e) {
            var target = $(e.target);

            if (!(target.is(button) || target.is(button.find('*')) || target.is(minicart) || target.is(minicart.find('*')))) {
                button.removeClass('active');
                minicart.removeClass('active');
                minicart.fadeOut('100');
            }

        });
    }

    function lightboxSingleProduct() {
        lightbox.option({
            'albumLabel': 'Zdjęcie %1 z %2'
        })
    }

    function singleProductGallery() {
        var gallery = $('#product-gallery-slider');
        var galleryAsNav = $('#product-gallery-slider-as-nav');

        gallery.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            infinite: false
        });

        galleryAsNav.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            asNavFor: gallery,
            dots: false,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-up"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-down"></i></button>',
            focusOnSelect: true,
            vertical: true,
            verticalSwiping: true
        });
    }

    function smoothScrollAnchorProductTabs() {
        var anchor = $('.scroll-to-product-tabs');
        var tabs = $('#product-details-tabs');

        anchor.click(function () {
            $('html, body').animate({
                scrollTop: tabs.offset().top
            }, 500);
        })
    }

    function hideMessageSection() {
        var section = $('.woocommerce-message-section');

        if (section.length) {
            setTimeout(function () {
                section.slideUp();
            }, 5000)
        }

        $(document).on('click', '.woocommerce-message-section .message-inner .close', function () {
            $(this).closest('section').slideUp();
        });
    }

    function collapseCouponCodeCart() {
        $(document).on('click', 'section.cart-form-section .column-totals .inner .coupon span.label', function () {
            console.log($(this));
            var block = $(this).parent().find('.coupon-inner');
            var button = $(this);

            if (block.is(':visible')) {
                block.slideUp();
                button.removeClass('opened');
            } else {
                block.slideDown();
                button.addClass('opened');
            }
        });
    }

    $(document).foundation();

    $(document).ready(homeSlider());
    $(document).ready(productsSlider());
    $(document).ready(mobileMenu());
    $(document).ready(minicartButton());
    $(document).ready(lightboxSingleProduct());
    $(document).ready(singleProductGallery());
    $(document).ready(smoothScrollAnchorProductTabs());
    $(document).ready(hideMessageSection());
    $(document).ready(collapseCouponCodeCart());

})(jQuery);