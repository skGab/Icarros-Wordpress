<?php
$home = get_stylesheet_directory_uri();

$args_breadcrumbs = array(
  'wrap_before' => '<nav class="text-dark small font-weight-600">',
  'delimiter' => '<i class="fas fa-chevron-right text-gray px-3"></i>'
);

get_header('institucional');

global $query_string;
wp_parse_str($query_string, $search_query);
?>

<!-- <section>
  <div class="breadcrumbs container-fluid px-4">
    <div class="row">
      <div class="col-12">
        <nav class="text-gray small font-weight-600 mb-0">
          <span class="text-dark">resultados de pesquisa para: "<?php echo get_search_query(); ?>"</span>
        </nav>
      </div>
    </div>
  </div>
</section> -->

<section>
  <div class="container pt-md-5 pt-4 pb-5">
    <div class="row text-md-left text-center">
      <div class="col-12 px-md-5 px-4">
        <h1 class="fw-bold text-dark mb-0">resultados de pesquisa para: "<?php echo get_search_query(); ?>"</h1>
      </div>
    </div>
  </div>
</section>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//$search_query['post_type'] = 'page';

$pags = $search_query;

$search = new WP_Query($search_query);
?>

<section>
  <div class="container">
    <div class="row px-4">
      <div class="col-12">
        <?php if ($search->have_posts()) : ?>
          <div class="row">

            <?php if (get_post_type() == 'page') {
              echo '<h2 class="h3 fw-bold mb-5 d-none">Páginas</h2>';
            } else {
              echo '<h2 class="h3 fw-bold mb-5 d-none">Produtos</h2>';
            } ?>


            <?php while ($search->have_posts()) : $search->the_post();
              $total_posts = $search->found_posts;
              /*if (get_post_type() == 'post') {
            $imagem = get_the_post_thumbnail_url(get_the_ID(),'thumbnail-blog');
          } else {
            $imagem = get_the_post_thumbnail_url(get_the_ID(),'servicos');
          }*/
              $imagem = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail-blog');
              $desc_yoast = YoastSEO()->meta->for_post(get_the_ID())->description;
              if ($desc_yoast) {
                $resumo = $desc_yoast;
              } else {
                $resumo = get_the_excerpt();
              }
              $resumo = substr($resumo, 0, 100);
              $resumo_cortado = substr($resumo, 0, strrpos($resumo, ' '));
            ?>
              <div class="col-lg-3 col-md-4 px-4 mb-5 <?php echo ('post' === get_post_type() ? 'd-flex justify-content-between flex-column' : '') ?> ">
                <?php if ($imagem) : ?>
                  <a href="<?php echo esc_url(get_permalink()); ?>" class="d-block mb-3"><img class="img-fluid" src="<?php echo $imagem; ?>" alt="Post tumb"></a>
                <?php endif; ?>
                <a href="<?php echo esc_url(get_permalink()); ?>" class="text-dark">
                  <h2 class="fw-bold h4 mb-3"><?php the_title(); ?></h2>
                </a>
                <p class="text-gray font-weight-500 mb-4"><?php echo $resumo_cortado . '...'; ?></p>
                <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-dark fw-bold px-3">Saiba mais</a>
              </div>
            <?php endwhile;
            wp_reset_postdata();
            ?>
          </div>
        <?php else : ?>
          <div class="text-center p-5">
            <h2>Nenhum resultado encontrado.</h2>
          </div>
        <?php endif; ?>
        <div class="row py-5">

          <style>
            .page-item.active .page-link {
              background-color: #dd6100;
              color: #fff !important;
            }
          </style>

          <?php
          if ($search->max_num_pages > 1) {

            $max = intval($search->max_num_pages);

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

            echo '<nav><ul class="pagination mb-0 align-items-center gap-2">' . "\n";

            if (!in_array(1, $links)) {
              $class = 1 == $paged ? 'active' : '';

              if (get_previous_posts_page_link()) {
                printf('<li class="page-item"><a class="page-link border-0 text-dark prev fw-bold" href="%s" aria-label="Previous"><span aria-hidden="true"><i class="fas fa-chevron-left align-middle"></i></span><span class="sr-only">Anterior</span></a></li>' . "\n", get_previous_posts_page_link());
              }

              printf('<li class="page-item %s"><a href="%s" class="page-link border-0 text-dark fw-bold rounded-circle">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

              if (!in_array(2, $links))
                echo '<li>…</li>';
            }

            sort($links);
            foreach ((array) $links as $link) {
              $class = $paged == $link ? 'active' : '';
              printf('<li class="page-item %s"><a href="%s" class="page-link border-0 text-dark fw-bold rounded-circle">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
            }

            if (!in_array($max, $links)) {
              if (!in_array($max - 1, $links)) {
                echo '<li>…</li>' . "\n";
              }

              $class = $paged == $max ? 'active' : '';
              printf('<li class="page-item %s"><a href="%s" class="page-link border-0 text-dark fw-bold rounded-circle">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);

              if (get_next_posts_page_link()) {
                printf('<li class="page-item"><a class="page-link border-0 text-dark next fw-bold" href="%s" aria-label="Next"><span aria-hidden="true"><i class="fas fa-chevron-right align-middle"></i></span><span class="sr-only">Próximo</span></a></li>' . "\n", get_next_posts_page_link());
              }
            }

            echo '</ul></nav>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>


<?php
get_footer();
?>