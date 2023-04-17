<?php

//Carregar estilos e scripts
function carregar_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());

    // CUSTOM CSS
    // wp_enqueue_style('customCss', get_stylesheet_directory_uri() . '/assets/css/compressed/custom.min.css', false, false, 'all');

    // BOOTSTRAP
    // wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', false, '5.0.2', 'all');

    // SPLIDE
    // wp_enqueue_style('splideCss', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', array(), null);


    // BOOTSTRAP
    // wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array(), '1.0.0', true);

    // CUSTOM JS
    // wp_enqueue_script('customJs', get_stylesheet_directory_uri() . '/vendor/js/custom.js', array(), '1.0', true);

    // SPLIDE
    // wp_enqueue_script('splidejs', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'carregar_scripts');


//CHAMANDO SPLIDE
function splide()
{
    if (is_page_template('index.php')) :
?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                var editorials_slide = new Splide('#editorials_slide', {
                    arrows: true,
                    gap: '2rem',
                    perPage: 3,
                    breakpoints: {
                        991: {
                            perPage: 2,
                        },
                        767: {
                            perPage: 1,
                        },
                    },
                }).mount();

                var content_slide = new Splide('#content_slide', {
                    arrows: true,
                    gap: '2rem',
                    perPage: 3,
                    breakpoints: {
                        991: {
                            perPage: 2,
                        },
                        767: {
                            perPage: 1,
                        },
                    },
                }).mount();

                var gallery_slide = new Splide('#gallery_slide', {
                    arrows: true,
                    perPage: 3,
                    gap: '2rem',
                    breakpoints: {
                        1199: {
                            perPage: 2,
                        },
                        767: {
                            perPage: 1,
                        },
                    },
                }).mount();

                var services_slide = new Splide('#services_slide', {
                    arrows: true,
                    perPage: 3,
                    gap: '2rem',
                    breakpoints: {
                        991: {
                            perPage: 2,
                        },
                        767: {
                            perPage: 1,
                        },
                    },
                }).mount();
            });
        </script>
    <?php
    endif;

    if (is_single()) :
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                var other_posts = new Splide('#other_posts', {
                    arrows: true,
                    gap: '2rem',
                    perPage: 3,
                    breakpoints: {
                        991: {
                            perPage: 2,
                        },
                        767: {
                            perPage: 1,
                        },
                    },
                }).mount();
            });
        </script>
    <?php
    endif;

    if (is_page_template('editoria.php')) :
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var category_content_slide = new Splide('#category_content_slide', {
                    arrows: true,
                    gap: '2rem',
                    perPage: 3,
                    breakpoints: {
                        991: {
                            perPage: 2,
                        },
                        767: {
                            perPage: 1,
                        },
                    },
                }).mount();
            });
        </script>
<?php
    endif;
}
add_action('wp_footer', 'splide');


add_theme_support('post-thumbnails', array(
    'post',
    'page',
    'custom-post-type-name',
));
