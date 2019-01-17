<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="theme-color" content="#f9bd15">
    <?php wp_head(); ?>
    <script>
        window.Promise || document.write('<script src="//cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.0.0/polyfill.min.js"><\/script>')
    </script>
</head>
<body>
    <div id="app">
    </div>
    <noscript>
        <style>
            .no-script {
                display: flex;
                flex-flow: column wrap;
                height: 100vh;
                width: 100vw;
                background-color: #f0f0f0;
                font-family: Arial, sans-serif;
                justify-content: center;
                align-items: center;
            }
            .header__logo {
                font-size: 30px;
            }
        </style>
        <div class="no-script">
            <p>This site requires JavaScript. Please try adjusting your settings or using a different browser.</p>
        </div>
    </noscript>
    <?php wp_footer(); ?>
</body>
</html>
