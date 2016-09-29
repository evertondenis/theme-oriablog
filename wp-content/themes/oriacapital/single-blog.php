<?php include('header-pages.php'); ?>
<?php edit_post_link(); ?>
<div id="container-blog-page" class="blog-padding-top">
    <div class="container">
        <div class="crumbs"><?php the_breadcrumb(); ?></div>
    </div>

    <div class="row">
        <div class="container no-padding">

            <!-- artigos -->
            <div class="col-left">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <section>
                    <article>
                        <header>
                            
                            <h1>
                                <p class="title-categoria"><?php echo get_the_term_list( $post->ID, 'category', '', ' '); ?></p>
                                <?php the_title();?>
                            </h1>
                        </header>
                        <div class="row">
                            <?php if(has_post_thumbnail()) : ?>
                            <figure class="tb-featured-image"><?php echo get_the_post_thumbnail( $post_id, 'img-post' ); ?><img class="ico-img" src="<?php bloginfo('template_url');?>/images/ico-image.png" alt=""></figure>
                            <?php endif;?>
                        </div>

                        <div class="row padding-content">
                            <span class="tb-post-time"><time datetime="<?php the_time('Y-m-d g:i') ?>"> <?php the_time('j') ?> de <?php the_time('F') ?> de <?php the_time('Y') ?></time></span>
                            <?php the_content();?>
                        </div>

                    </article>
                </section>
                <section>
                    <div class="div-social" style="padding-top: 20px;background-color: #ededed; height: 60px;">
                        <h2 style="float: left;margin-top: -5px;margin-right: 50px;">Compartilhe:</h2>
                        <!-- Posicione esta tag no cabeçalho ou imediatamente antes da tag de fechamento do corpo. -->
                        <script src="https://apis.google.com/js/platform.js" async defer>
                          {lang: 'pt-BR'}
                        </script>

                        <!-- Posicione esta tag onde você deseja que o botão +1 apareça. -->
                        <div class="g-plusone" data-size="medium" data-annotation="none" style="float: left;margin-right: 10px;"></div>
                        <div class="lin" style="float: left;margin-right: 10px;">
                            <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                            <script type="IN/Share" data-counter="right"></script>
                        </div>
                        <div class="fb-share-button" style="float: left;margin-right: 10px;" data-href="<?php the_permalink() ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Compartilhar</a></div>
                        
                        <div style="float: left;margin-right: 10px;">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-via="">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                        </div>

                    </div>
                </section>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="div-tags">
                                <?php the_tags(); ?>
                                <!-- <div class="div-comments">
                                    <?php 
                                    $args = array('post_id' => $post->ID, 'count' => true); $comments = get_comments($args);
                                    if (!$comments) {
                                        echo "NENHUM COMENTÁRIO";
                                    } elseif ($comments == 1) {
                                        echo $comments . " COMENTÁRIO";
                                    } else {
                                        echo $comments . " COMENTÁRIOS";
                                    }
                                    ?>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <?php endwhile; else: ?>
                    <p><?php _e('Desculpe, essa página não existe.'); ?></p>
                    <?php endif; ?>
                

                <div class="row"><h2>POSTS RELACIONADOS</h2></div>
                <div class="row archive-post">
                    <?php
                    $newsArgs = array( 'post_type' => 'blog',
                                        'posts_per_page' => 2,
                                        'orderby' => rand);

                    $newsLoop = new WP_Query( $newsArgs );

                    if( $newsLoop->have_posts() ) :
                    
                        while ( $newsLoop->have_posts() ) : $newsLoop->the_post(); ?>
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
                    <?php endif; ?>
                </div>
                <div class="row"><?php comments_template( '/comments.php' ); ?></div>
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