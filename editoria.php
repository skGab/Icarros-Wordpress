<?php

/**
 * Template Name: Editoria
 * Author: Black Beans
 */

get_header();
$home = get_stylesheet_directory_uri();

function descricao($editoria)
{
    if ($editoria == 'mobilidade') echo 'para todos que se movem';
    if ($editoria == 'negócios') echo 'ajuda para comprar e vender';
    if ($editoria == 'você e seu carro') echo 'manutenção e dicas de cuidado';
    if ($editoria == 'na garagem') echo 'novidades do setor e avaliações';
    if ($editoria == 'na estrada') echo 'historias  e experiências sobre rodas';
    if ($editoria == 'institucional') echo 'estudos de mercado, dados e releses';
    if ($editoria == 'icarros') echo 'novidades do setor e avaliações';
}

function categoria($editoria)
{
    if ($editoria == 'negócios') return 'negocios';
    if ($editoria == 'intitucional') return 'intitucional';
    if ($editoria == 'mobilidade') return 'mobilidade';
    if ($editoria == 'você e seu carro') return 'voce-e-seu-carro';
    if ($editoria == 'na garagem') return 'na-garagem';
    if ($editoria == 'na estrada') return 'na-estrada';
    if ($editoria == 'icarros') return 'icarros';
}
?>

<!-- CATEGORY -->
<section id="category" class="mt-5">
    <div class="container px-4 px-lg-0">
        <div class="row">
            <div class="col">
                <div class="bg py-4 px-4 text-white">
                    <h1 class="m-0 fw-bold"><?= the_title() ?></h1>
                    <p class="m-0"><?php descricao(get_the_title()) ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- RECENT CONTENT -->
<section id="recent_content">
    <div class="container px-4">

        <?php
        $cat = categoria(get_the_title());

        $page = get_query_var('paged') ? get_query_var('paged') : 1;

        $args = array(
            'paged' => $page,
            'category_name' => $cat,
            'orderby'    =>  'date',
            'order'      =>  'desc',
            'posts_per_page'     =>  9,
        );

        $query = new WP_Query($args);
        ?>


        <div class="row d-lg-none">
            <div class="col">
                <h2 class="fw-bold mb-4">Últimos conteúdos do manual icarros</h2>

                <div id="category_content_slide" class="splide">
                    <div class="splide__track">

                        <?php if ($query->have_posts()) :  $i = 0  ?>
                            <ul class="splide__list">

                                <?php while ($query->have_posts()) :
                                    $resumo = get_the_excerpt();
                                    $resumo = substr($resumo, 0, 60);
                                    $resumo_cortado = substr($resumo, 0, strrpos($resumo, ' '));
                                    $categorias = get_the_category();

                                    $image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail-recentes');

                                    $query->the_post(); ?>

                                    <li class="splide__slide <?php echo ($i == 0) ? 'd-none' : '' ?>">
                                        <div class="card w-100 h-100 p-2">
                                            <img src="<?php echo esc_url($image) ?>" class="tumb img-fluid position-absolute w-100 h-100" alt="Post Tumb">

                                            <div class="card-body text-white d-flex flex-column justify-content-between">
                                                <span class="px-2"><?php echo $categorias[0]->name ?></span>
                                                <div>
                                                    <h3 class="card-text h6 lh-base"><?php echo $resumo_cortado . '...' ?></h3>
                                                    <button class="btn p-0">
                                                        <a href="<?php echo esc_url(get_permalink()); ?>" class="h6">ver matéria
                                                            <img loading="lazy" src="<?= $home; ?>/assets/icons/arrow-right-white.png" class="img-fluid" alt="Icone seta direita">
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                <?php $i++;
                                endwhile;
                                wp_reset_postdata(); ?>
                            </ul>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <?php if ($query->have_posts()) : $i = 0  ?>
            <div class="row d-none d-lg-flex">
                <h2 class="fw-bold mb-4">últimos conteúdos do manual icarros</h2>

                <?php while ($query->have_posts()) :
                    $resumo = get_the_excerpt();
                    $resumo = substr($resumo, 0, 60);
                    $resumo_cortado = substr($resumo, 0, strrpos($resumo, ' '));
                    $categorias = get_the_category();

                    $image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail-recentes');

                    $query->the_post(); ?>

                    <div class="col-4 mb-4 <?php echo ($i == 0) ?  'd-none' : ''; ?>">
                        <div class="card p-2">
                            <img src="<?php echo esc_url($image) ?>" class="tumb img-fluid position-absolute h-100" alt="Post Tumb">

                            <div class="card-body text-white d-flex flex-column justify-content-between">
                                <span class="px-2"><?php echo $categorias[0]->name ?></span>
                                <div>
                                    <h3 class="card-text h6 lh-base"><?php echo $resumo_cortado . '...' ?></h3>
                                    <button class="btn p-0">
                                        <a href="<?php echo esc_url(get_permalink()); ?>" class="h6">ver matéria
                                            <img loading="lazy" src="<?= $home; ?>/assets/icons/arrow-right-white.png" class="img-fluid" alt="Icone seta direita">
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php $i++;
                endwhile;
                wp_reset_postdata(); ?>

                <!-- PAGINATION -->
                <?php if ($query->max_num_pages > 1) : ?>
                    <div class="col-12  justify-content-center mt-3">
                        <?php

                        $max = intval($query->max_num_pages);

                        if ($paged >= 1) {
                            $links[] = $paged;
                        }

                        if ($paged >= 3) {
                            $links[] = $paged - 1;
                            $links[] = $paged - 2;
                        }

                        if (($paged + 2) <= $max) {
                            $links[] = $paged + 2;
                            $links[] = $paged + 1;
                        }

                        echo '<nav><ul class="pagination p-0 d-flex mb-0 align-items-center justify-content-center gap-2">' . "\n";

                        if (!in_array(1, $links)) {
                            $class = 1 == $paged ? 'active' : '';

                            if (get_previous_posts_page_link()) {
                                printf('<li class="page-item"><a class="page-link prev text-dark" href="%s" aria-label="Previous"><span aria-hidden="true"><i class="fas fa-chevron-left align-middle"></i></span><span class="sr-only">Anterior</span></a></li>' . "\n", get_previous_posts_page_link());
                            }

                            printf('<li class="page-item %s"><a href="%s" class="page-link text-dark">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

                            if (!in_array(2, $links))
                                echo '<li>…</li>';
                        }

                        sort($links);
                        foreach ((array) $links as $link) {
                            $class = $paged == $link ? 'active' : '';
                            printf('<li class="page-item %s"><a href="%s" class="page-link text-dark">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
                        }

                        if (!in_array($max, $links)) {
                            if (!in_array($max - 1, $links)) {
                                echo '<li>…</li>' . "\n";
                            }

                            $class = $paged == $max ? 'active' : '';
                            printf('<li class="page-item %s"><a href="%s" class="page-link text-dark">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);

                            if (get_next_posts_page_link()) {
                                printf('<li class="page-item"><a class="page-link next text-dark" href="%s" aria-label="Next"><span aria-hidden="true"><i class="fas fa-chevron-right align-middle"></i></span><span class="sr-only">Próximo</span></a></li>' . "\n", get_next_posts_page_link());
                            }
                        }

                        echo '</ul></nav>';

                        ?>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

    </div>
</section>

<?php
get_footer();
?>