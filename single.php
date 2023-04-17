<?php

$home = get_stylesheet_directory_uri();
// wpb_set_post_views(get_the_ID());

get_header();

//$imagem = get_the_post_thumbnail_url(get_the_ID(),'full');
$cats = get_the_category();
$id_autor = get_the_author_meta('ID');
/*$cats_names = array();
foreach ($cats as $cat) {
  $cats_names[] = $cat->name;
  $lista_cats = implode(', ', $cats_names);
}*/
?>

<!-- BANNER HERO -->
<section id="banner_hero" class="position-relative d-flex align-items-center justify-content-center">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post();

            $banner = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail-hero');
        ?>
            <img src="<?php echo $banner ?>" class="position-absolute h-100 mx-auto" alt="Banner do Post">

            <div class="container px-4">
                <div class="row">
                    <div class="col d-flex align-items-center px-md-5">
                        <h1 class="fw-bold text-white lh-base"> <?php the_title(); ?></h1>
                    </div>
                </div>
            </div>

        <?php endwhile ?>
    <?php endif ?>

</section>

<!-- MAIN CONTENT -->
<section id="main_content">
    <div class="container px-4">
        <div class="row mb-5 justify-content-between">
            <!-- POST CONTENT -->
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();
                ?>
                    <div id="post_content" class="col-12 col-lg-8 mb-5 mb-lg-0">
                        <?php the_content(); ?>
                    </div>

                <?php endwhile ?>
            <?php endif ?>

            <!-- SIDEBAR -->
            <aside id="sidebar" class="col-12 col-lg-3">
                <!-- SOCIAL -->
                <div id="social" class="row mb-5">
                    <div class="col-12 col-lg-12">
                        <h2 class="fw-bold mb-4 d-lg-none">compartilhar nas redes:</h2>
                        <h2 class="fw-bold mb-4 h3 d-none d-lg-block">compartilhar nas redes:</h2>

                        <figure class="d-flex justify-content-between align-items-center mb-0 border border-dark px-4 py-3" style="border-radius: 12px;">
                            <a href="#" target="_blank">
                                <img loading="lazy" src="<?= $home ?>/assets/icons/whatsapp.png" class="img-fluid" alt="Icone Whatsapp">
                            </a>
                            <a href="#" target="_blank">
                                <img loading="lazy" src="<?= $home ?>/assets/icons/instagram.png" class="img-fluid" alt="Icone Instagram">
                            </a>
                            <a href="#" target="_blank">
                                <img loading="lazy" src="<?= $home ?>/assets/icons/twitter.png" class="img-fluid" alt="Icone Twitter">
                            </a>
                            <a href="#" target="_blank">
                                <img loading="lazy" src="<?= $home ?>/assets/icons/facebook.png" class="img-fluid" alt="Icone Facebook">
                            </a>
                            <a href="#" target="_blank">
                                <img loading="lazy" src="<?= $home ?>/assets/icons/share.png" class="img-fluid" alt="Icone Compartilhar">
                            </a>
                        </figure>
                    </div>
                </div>

                <!-- CTA -->
                <div id="cta" class="row">
                    <div class="col-12 col-lg-12 mx-auto">
                        <div class="card py-3">
                            <div class="card-body text-center">
                                <figure>
                                    <img loading="lazy" src="<?= $home ?>/assets/images/cta-logo.webp" class="img-fluid" alt="Icarros Logo">
                                </figure>
                                <p class="card-text fw-bold text-white border border-2 rounded-top  mx-auto p-3">
                                    por aqui você faz tudo: <br>
                                    compra, vende e financia
                                </p>
                                <figure>
                                    <img loading="lazy" src="<?= $home ?>/assets/images/cta-img.webp" class="img-fluid" alt="Imagem CTA">
                                </figure>
                                <a href="https://www.icarros.com.br/principal/index.jsp" target="_blank" class="btn fw-bold px-4 py-2">acesse o site
                                    <img loading="lazy" src="<?= $home ?>/assets/icons/arrow-right.png" width="20px" class="img-fluid" alt="Seta para direita">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        <div class="line row d-none d-lg-block">
            <div class="container my-5">
                <div class="col border"></div>
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

                <div id="other_posts" class="splide">
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
                                            <img src="<?php echo esc_url($images2) ?>" class="tumb img-fluid position-absolute  w-100 h-100" alt="Post Tumb">

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


<!-- EDITORIALS -->
<section id="editorials_single">
    <div class="container px-4">
        <div class="row flex-wrap">
            <h2 class="fw-bold mb-3">conheça nossas editorias:</h2>

            <div class="col-6">
                <ul class="d-flex flex-column flex-md-row p-0 m-0 justify-content-xxl-between align-items-md-center flex-md-wrap gap-4">
                    <a href="/mobilidade">
                        <li class="px-4 py-3 text-white fw-bold">mobilidade</li>
                    </a>
                    <a href="/negocios">
                        <li class="px-4 py-3 text-white fw-bold">negócios</li>
                    </a>
                    <a href="/voce-e-seu-carro">
                        <li class="px-4 py-3 text-white fw-bold">você e seu carro</li>
                    </a>
                </ul>
            </div>

            <div class="col-6">
                <ul class="d-flex flex-column flex-md-row p-0 m-0 justify-content-xxl-between align-items-md-center flex-md-wrap gap-4">
                    <a href="/na-garagem">
                        <li class="px-4 py-3 text-white fw-bold">na garagem</li>
                    </a>
                    <a href="/na-estrada">
                        <li class="px-4 py-3 text-white fw-bold">na estrada</li>
                    </a>
                    <a href="/institucional">
                        <li class="px-4 py-3 text-white fw-bold">institucional</li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>