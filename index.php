<?php

/**
 * Template Name: Home
 * Author: Black Beans
 */

get_header();
$home = get_stylesheet_directory_uri();
?>

<!-- BANNER HERO -->
<section id="hero">
    <div class="container-lg px-0 px-lg-4">
        <div id="carouselHero" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4500">

            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $args = array(
                'posts_per_page' => 4,
                'paged' => $paged,
            );

            $query = new WP_Query($args);
            ?>

            <?php if ($query->have_posts()) : $i = 0; ?>
                <div class="carousel-indicators">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="<?= $i ?>" class="<?php echo ($i == 0)  ? 'active' : ''; ?>"></button>
                    <?php $i++;
                    endwhile; ?>
                </div>
            <?php endif; ?>

            <?php if ($query->have_posts()) : $i = 0;
            ?>
                <div class="carousel-inner">
                    <?php while ($query->have_posts()) :
                        $images = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail-hero');
                        $query->the_post(); ?>

                        <div class="carousel-item <?php echo ($i == 0)  ? 'active' : ''; ?>">
                            <img loading="lazy" src="<?php echo $images ?>" class="d-block w-100 img-fluid" alt="Banner Principal" style="max-height: 498px;">
                            <div class="carousel-caption container d-flex flex-column justify-content-center ">
                                <h1 class="h3 m-0 fw-bold d-block mb-4 lh-base w-50">
                                    <?php the_title(); ?>
                                </h1>
                                <button class="btn-content btn px-4 py-2" style="width: fit-content;">
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="h5" target="_blank">ver conteúdo</a>
                                </button>
                            </div>
                        </div>

                    <?php $i++;
                    endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- SEARCH CONTENT -->
<section id="search_content">
    <div class="container px-4">
        <?php get_search_form(); ?>
    </div>
</section>

<!-- EDITORIALS -->
<section id="editorials">
    <div class="container px-4">
        <div class="row d-lg-none">
            <div class="col">
                <h2 class="fw-bold mb-3 mb-lg-4">busque por assuntos no manual icarros</h2>

                <div id="editorials_slide" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="card w-100 h-100 p-2">
                                    <a href="/mobilidade" class="card-body">
                                        <img loading="lazy" src="<?= $home; ?>/assets/icons/place.png" class="img-fluid mb-5" alt="Icone Localização">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="info">
                                                <h3 class="card-title mb-1 h5 text-dark">mobilidade</h3>
                                                <h4 class="card-text text-secondary h6">para todos que se movem</h4>
                                            </div>
                                            <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="card w-100 h-100 p-2">
                                    <a href="/negocios" class="card-body">
                                        <img loading="lazy" src="<?= $home; ?>/assets/icons/bussiness-icon.png" class="img-fluid mb-5" alt="Icone Negocios">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="info">
                                                <h3 class="card-title mb-1 h5 text-dark">negócios</h3>
                                                <h4 class="card-text text-secondary h6">ajuda para comprar e vender</h4>
                                            </div>
                                            <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="card w-100 h-100 p-2">
                                    <a href="/vc-e-seu-carro" class="card-body">
                                        <img loading="lazy" src="<?= $home; ?>/assets/icons/manuntance-icon.png" class="img-fluid mb-5" alt="Icone Manutenção">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="info">
                                                <h3 class="card-title mb-1 h5 text-dark">você e seu carro</h3>
                                                <h4 class="card-text text-secondary h6">manutenção e dicas de cuidado</h4>
                                            </div>
                                            <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="card w-100 h-100 p-2">
                                    <a href="na-garagem" class="card-body">
                                        <img loading="lazy" src="<?= $home; ?>/assets/icons/insuranceAuto.png" class="img-fluid mb-5" alt="Icone Carro">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="info">
                                                <h3 class="card-title mb-1 h5 text-dark">na garagem</h3>
                                                <h4 class="card-text text-secondary h6">novidades do setor e avaliações</h4>
                                            </div>
                                            <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="card w-100 h-100 p-2">
                                    <a href="/na-estrada" class="card-body">
                                        <img loading="lazy" src="<?= $home; ?>/assets/icons/web-icon.png" class="img-fluid mb-5" alt="Icone Globo">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="info">
                                                <h3 class="card-title mb-1 h5 text-dark">na estrada</h3>
                                                <h4 class="card-text text-secondary h6">histórias e experiências sobre rodas</h4>
                                            </div>
                                            <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="card w-100 h-100 p-2">
                                    <a href="/institucional" class="card-body">
                                        <img loading="lazy" src="<?= $home; ?>/assets/icons/person-icon.png" class="img-fluid mb-5" alt="Icone Pessoa">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="info">
                                                <h3 class="card-title mb-1 h5 text-dark">institucional</h3>
                                                <h4 class="card-text text-secondary h6">estudos de mercado, dados e releses</h4>
                                            </div>
                                            <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row d-none d-lg-flex">
            <h2 class="fw-bold mb-3 mb-lg-4">busque por assuntos no manual icarros</h2>

            <div class="col-4 mb-4">
                <div class="card w-100 h-100 p-2">
                    <a href="/mobilidade" class="card-body">
                        <img loading="lazy" src="<?= $home; ?>/assets/icons/place.png" class="img-fluid mb-5" alt="Icone Localização">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="info">
                                <h3 class="card-title mb-1 h5 text-dark">mobilidade</h3>
                                <h4 class="card-text text-secondary h6">para todos que se movem</h4>
                            </div>
                            <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 mb-4">
                <div class="card w-100 h-100 p-2">
                    <a href="/negocios" class="card-body">
                        <img loading="lazy" src="<?= $home; ?>/assets/icons/bussiness-icon.png" class="img-fluid mb-5" alt="Icone Negocios">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="info">
                                <h3 class="card-title mb-1 h5 text-dark">negócios</h3>
                                <h4 class="card-text text-secondary h6">ajuda para comprar e vender</h4>
                            </div>
                            <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 mb-4">
                <div class="card w-100 h-100 p-2">
                    <a href="/vc-e-seu-carro" class="card-body">
                        <img loading="lazy" src="<?= $home; ?>/assets/icons/manuntance-icon.png" class="img-fluid mb-5" alt="Icone Manutenção">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="info">
                                <h3 class="card-title mb-1 h5 text-dark">você e seu carro</h3>
                                <h4 class="card-text text-secondary h6">manutenção e dicas de cuidado</h4>
                            </div>
                            <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 mb-4">
                <div class="card w-100 h-100 p-2">
                    <a href="/na-garagem" class="card-body">
                        <img loading="lazy" src="<?= $home; ?>/assets/icons/insuranceAuto.png" class="img-fluid mb-5" alt="Icone Carro">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="info">
                                <h3 class="card-title mb-1 h5 text-dark">na garagem</h3>
                                <h4 class="card-text text-secondary h6">novidades do setor e avaliações</h4>
                            </div>
                            <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 mb-4">
                <div class="card w-100 h-100 p-2">
                    <a href="/na-estrada" class="card-body">
                        <img loading="lazy" src="<?= $home; ?>/assets/icons/web-icon.png" class="img-fluid mb-5" alt="Icone Globo">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="info">
                                <h3 class="card-title mb-1 h5 text-dark">na estrada</h3>
                                <h4 class="card-text text-secondary h6">histórias e experiências sobre rodas</h4>
                            </div>
                            <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 mb-4">
                <div class="card w-100 h-100 p-2">
                    <a href="/institucional" class="card-body">
                        <img loading="lazy" src="<?= $home; ?>/assets/icons/person-icon.png" class="img-fluid mb-5" alt="Icone Pessoa">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="info">
                                <h3 class="card-title mb-1 h5 text-dark">institucional</h3>
                                <h4 class="card-text text-secondary h6">estudos de mercado, dados e releses</h4>
                            </div>
                            <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- RECENT CONTENT -->
<section id="recent_content">
    <div class="container px-4">
        <div class="row">
            <div class="col">
                <h2 class="fw-bold mb-3  mb-lg-4">conteúdos recentes</h2>
                <?php
                $page = get_query_var('paged') ? get_query_var('paged') : 1;

                $args2 = array(
                    'post_type'  =>  'post',
                    'orderby'    =>  'date',
                    'order'      =>  'desc',
                    'posts_per_page'     =>  8,
                    'page'       =>  $page,
                );

                $query2 = new WP_Query($args2);
                ?>

                <div id="content_slide" class="splide">
                    <div class="splide__track">

                        <?php if ($query2->have_posts()) :  ?>
                            <ul class="splide__list">

                                <?php while ($query2->have_posts()) :
                                    $resumo = get_the_excerpt();
                                    $resumo = substr($resumo, 0, 60);
                                    $resumo_cortado = substr($resumo, 0, strrpos($resumo, ' '));
                                    $categorias = get_the_category();

                                    $images2 = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail-recentes');

                                    $query2->the_post(); ?>
                                    <li class="splide__slide">
                                        <div class="card w-100 h-100 p-2">
                                            <img src="<?php echo esc_url($images2) ?>" class="tumb img-fluid position-absolute w-100 h-100" alt="Post Tumb">

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
                                <?php
                                endwhile;
                                wp_reset_postdata(); ?>

                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section id="cta">
    <div class="container px-4">
        <div class="row">
            <div class="col mx-auto">
                <div class="card w-100 py-3 py-lg-0">
                    <div class="card-body text-center d-lg-flex align-items-center justify-content-around py-lg-0 px-xl-5 gap-3">
                        <figure class="logo mb-lg-0">
                            <img loading="lazy" src="<?= $home; ?>/assets/images/cta-logo.webp" class="img-fluid" alt="Icarros Logo">
                        </figure>

                        <p class="card-text fw-bold text-white border border-2 rounded-top  mx-auto p-3 d-lg-none">
                            Por aqui você faz tudo: <br>
                            compra, vende e financia
                        </p>

                        <div class="d-none d-lg-flex flex-column py-3">
                            <span class="text-white fw-bold mb-2">
                                <img loading="lazy" src="<?= $home; ?>/assets/icons/lupa-cta.svg" class="img-fluid" alt="Icone Lupa">
                                carro econômico para
                            </span>
                            <strong class="h2 bg-white py-3 px-3 px-xxl-4 fw-bold mb-1 d-none d-xxl-block">VIAJAR COM OS AMIGOS</strong>
                            <strong class="h5 bg-white py-3 px-3 px-xxl-4 fw-bold mb-1 d-xxl-none">VIAJAR COM OS AMIGOS</strong>
                        </div>

                        <figure class="car mb-lg-0 align-self-end">
                            <img loading="lazy" src="<?= $home; ?>/assets/images/cta-img.webp" class="img-fluid" alt="Imagem CTA">
                        </figure>

                        <a href="https://www.icarros.com.br/principal/index.jsp" target="_blank" class="btn fw-bold px-4 px-lg-3 py-2" style="min-width: 189px;">acesse o site
                            <img loading="lazy" src="<?= $home; ?>/assets/icons/arrow-right.png" width="20px" class="img-fluid" alt="Seta para direita">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GALLERY -->
<section id="gallery">
    <div class="container px-4">
        <div class="row">
            <div class="col">
                <div id="gallery_slide" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list justify-content-between">
                            <li class="splide__slide">
                                <div class="card w-100 h-100 ">
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="card w-100 h-100 ">
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="card w-100 h-100">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section id="services">
    <div class="container px-4">
        <div class="row">
            <div class="col">

                <h2 class="fw-bold mb-3 mb-lg-4">produtos e serviços do icarros</h2>

                <div id="services_slide" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list justify-content-between">
                            <li class="splide__slide">
                                <div class="card w-100 h-100 p-2 justify-content-center">
                                    <a href="https://www.icarros.com.br/comprar" target="_blank">
                                        <div class="card-body d-flex flex-column justify-content-between align-items-start">
                                            <img loading="lazy" src="<?= $home; ?>/assets/icons/service-icon.png" class="img-fluid mb-4" alt="Icone Serviço">
                                            <div class="d-flex align-items-center justify-content-between w-100">
                                                <div class="info">
                                                    <h3 class="card-title mb-1 h6 text-dark">comprar</h3>
                                                    <h4 class="card-tex text-secondary small">acesse e confira</h4>
                                                </div>
                                                <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="card w-100 h-100 p-2 justify-content-center">
                                    <a href="https://www.icarros.com.br/vender/index.jsp" target="_blank">
                                        <div class="card-body d-flex flex-column justify-content-between align-items-start">
                                            <img loading="lazy" src="<?= $home; ?>/assets/icons/finance-icon.png" class="img-fluid mb-4" alt="Icone Finanças">
                                            <div class="d-flex align-items-center justify-content-between w-100">
                                                <div class="info">
                                                    <h3 class="card-title mb-1 h6 text-dark">vender</h3>
                                                    <h4 class="card-tex text-secondary small">acesse e confira</h4>
                                                </div>
                                                <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="card w-100 h-100 p-2 justify-content-center">
                                    <a href="https://www.icarros.com.br/simulacao/" target="_blank">
                                        <div class="card-body d-flex flex-column justify-content-between align-items-start">
                                            <img loading="lazy" src="<?= $home; ?>/assets/icons/sell-icon.png" class="img-fluid mb-4" alt="Icone Venda">
                                            <div class="d-flex align-items-center justify-content-between w-100">
                                                <div class="info">
                                                    <h3 class="card-title mb-1 h6 text-dark">conheça os tipos de financiamento com o icarros</h3>
                                                    <h4 class="card-tex text-secondary small">opções de financiamento e simulações</h4>
                                                </div>
                                                <img src="<?= $home; ?>/assets/icons/arrow-right.png" class="img-fluid" alt="Seta para direita">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>