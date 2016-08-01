<?php include('header-blog.php'); ?>
<div id="container-blog-page" class="blog-padding-top">
  <div class="row">
    <div class="container no-padding">
        <div class="col-left">
          <header class="tb-seartch-title">
            <h3 class="tb-title-1"><?php printf( __( 'Resultado da busca por: %s', 'blog' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
          </header>

          

          <div class="row archive-post">
          <?php if ( have_posts() ) : ?>
          <?php while(have_posts()) : the_post(); ?>
            <?php if(has_post_thumbnail()) : $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-post' ); endif; ?>
            <div class="col-md-6">
            
              <section>
                <div class="content" style="height: 550px;">
                  <div class="container-imagem">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"><img class="ico-img" src="<?php bloginfo('template_url');?>/images/ico-image.png" alt=""></a>
                  </div>
                  <div class="conteudo">
                    <p class="title-categoria"><?php echo get_the_term_list( $post->ID, 'category', '', ' '); ?></p>
                    <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                    <p><?php the_excerpt(); ?></p>
                    
                  </div>
                </div>
                <div class="continuar-lendo">
                  <a class="btn btn-primary btn-lg" href="<?php the_permalink() ?>" title="Continuar lendo: <?php the_title(); ?>"><span>Continuar Lendo</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
              </section>
            </div>
            <?php endwhile; ?>
              <?php else : ?>
              <header class="tb-seartch-title">
                <h3 class="tb-title-1"><?php printf( __( 'Nenhum artigo encontrado com o termo: %s', 'blog' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
              </header>
            <?php endif; wp_reset_query();?>
          </div>
          <div class="row text-center">
            <div class="pagination">
              <?php if (function_exists("pagination")) {
                  pagination($additional_loop->max_num_pages);
              } ?>
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="col-right">
            <aside class="sidebar">
                <?php include('sidebar-blog.php'); ?>
            </aside>
        </div>
    </div>
  </div>     
</div>
<?php include('footer-blog.php'); ?>