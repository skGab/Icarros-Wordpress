<!-- <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url('/'); ?>">
  <div class="form-group position-relative mb-0">
    <label class="screen-reader-text" for="s"><?php echo __('Search for:'); ?></label>
    <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control border border-primary rounded-pill bg-white" placeholder="Digite sua busca" />
    <input type="submit" id="searchsubmit" class="btn btn-link text-dark fas fa-search px-2" value="" />
  </div>
</form> -->


<?php
$home = get_stylesheet_directory_uri();
?>


<form role="search" method="get" id="searchform" class="searchform row" action="<?php echo home_url('/'); ?>">
  <div class="col-12 col-lg-8 mb-3">

    <div class="input-group p-3 align-items-center justify-content-between gap-sm-3">
      <img loading="lazy" src="<?= $home; ?>/assets/icons/lupa.png" class="img-fluid" alt="Icone Lupa">
      <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="border-0 w-75 p-0 m-0 flex-sm-grow-1" placeholder="digite o conteúdo que você procura" aria-label="Search">
      <img loading="lazy" src="<?= $home; ?>/assets/icons/circulo.png" class="img-fluid align-self-end" alt="Icone Circulo">
    </div>

  </div>

  <div class="col-12 col-lg-4">

    <button id="searchsubmit" type="submit" value="" class="btn w-100 p-3 d-flex align-items-center justify-content-between text-white">
      <span class="fw-bold h6 m-0">ver notícias</span>
      <img loading="lazy" src="<?= $home; ?>/assets/icons/arrow-right-white.png" class="img-fluid" alt="Icone seta direita">
    </button>

  </div>
</form>