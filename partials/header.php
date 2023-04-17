<?php
$home = get_stylesheet_directory_uri();
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="description" content=""> -->
    <link rel="shortcut icon" href="<?= $home; ?>/assets/icons/fav_icon.svg" type="image/x-icon">
    <title><?php wp_title(); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- SPLIDE SLIDE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/css/splide.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/js/splide.min.js"></script>

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="<?= $home ?>/assets/css/compressed/custom.min.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- HEADER -->
    <header class="border-bottom mb-lg-5">
        <!-- <nav id="yellow_nav" class="navbar navbar-expand-lg navbar-light d-none d-lg-block">
            <div class="container justify-content-end px-4">
                <ul class="m-0 p-0 d-flex gap-3 text-white text-decoration-underline small">
                    <li><a href="">quem somos</a></li>
                    <li><a href="">ajuda</a> </li>
                    <li><a href="">fale conosco</a> </li>
                </ul>
            </div>
        </nav> -->

        <nav class="navbar navbar-expand-lg navbar-light p-lg-0">
            <div class="container px-4">
                <figure class="mb-0 navbar-brand p-lg-0">
                    <a href="/">
                        <img src="<?= $home; ?>/assets/images/logo_manual.svg" width="115px" class="img-fluid d-none d-lg-block" alt="Logo Icarros">
                        <img src="<?= $home; ?>/assets/images/logo_manual.svg" width="90px" class="img-fluid d-lg-none" alt="Logo Icarros">
                    </a>
                </figure>

                <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="<?= $home; ?>/assets/icons/menu-hamburguer.png" class="img-fluid" alt="Menu Hamburguer">
                </button>

                <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 align-items-end">
                        <li class="nav-item px-2 px-lg-0 py-lg-3">
                            <a class="nav-link" href="/mobilidade">mobilidade</a>
                        </li>
                        <li class="nav-item px-2 px-lg-0 py-lg-3">
                            <a class="nav-link" href="/negocios">negócios</a>
                        </li>
                        <li class="nav-item px-2 px-lg-0 py-lg-3">
                            <a class="nav-link" href="/vc-e-seu-carro">você e seu carro</a>
                        </li>
                        <li class="nav-item px-2 px-lg-0 py-lg-3">
                            <a class="nav-link" href="/na-garagem">na garagem</a>
                        </li>
                        <li class="nav-item px-2 px-lg-0 py-lg-3">
                            <a class="nav-link" href="/na-estrada">na estrada</a>
                        </li>
                        <li class="nav-item px-2 px-lg-0 py-lg-3">
                            <a class="nav-link" href="/institucional">institucional</a>
                        </li>
                        <li class="nav-item px-2 px-lg-0 py-lg-3">
                            <a class="nav-link" href="/icarros">icarros</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- MAIN -->
    <main>