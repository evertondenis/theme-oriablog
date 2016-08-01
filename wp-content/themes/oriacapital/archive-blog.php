<?php include('header-blog.php'); ?>
<div id="container-blog" class="blog-padding-top">
	<div class="row">
		<?php //the_breadcrumb(); ?>
	</div>

	<div class="row">
		<div class="container no-padding">

			<!-- artigos -->
			<div class="col-left">
				<div class="row archive-post">
					<?php
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

					$newsArgs = array( 'post_type' => 'blog',
										'paged' => $paged
										);

					$newsLoop = new WP_Query( $newsArgs );

					if( $newsLoop->have_posts() ) :
						$foo = 1;
					
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
							<?php if($foo == 2) : ?>
								<div class="col-md-12 text-center">
									<section class="cta">
										<?php
										global $post;
										$args = array(
												'posts_per_page' => 1,
												'post_type' => 'ctas',
												'post_status' => 'publish',
												'orderby' => rand
												);
										$ctaPost = get_posts( $args );
										foreach( $ctaPost as $post ) : setup_postdata($post); ?>
											<?php the_content(); ?>
										<?php endforeach; ?>
									</section>
								</div>
							<?php endif; ?>
						<?php $foo++; endwhile; ?>
					<?php else:  ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
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