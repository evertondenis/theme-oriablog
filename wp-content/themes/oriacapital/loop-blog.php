<!-- O loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

	<!-- Container do artigo -->	
	<div class="artigo-container">
		
		<!-- Título do post -->
		<h1>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php //echo get_post_type() ?>
		</h1>
		
		<!-- Data -->
		<?php the_date(); ?>
		<!-- Autor -->
		<?php the_author(); ?>

		<!-- Categoria -->
		<?php
		$taxonomy = 'blog_category';
		$terms = get_terms( $taxonomy, '' );
		// print_r($terms);

		if ( $terms ) {
				foreach($terms as $term) {
					echo '<a href="' . esc_attr(get_term_link($term, $taxonomy)) . '">' . $term->name.'</a>';
				}
		}
		?>
		
		<?php if ( is_single() || is_page() ): ?>
			<!-- Conteúdo do post -->
			<?php the_content(); ?>
			<?php the_tags(); ?>
		<?php else: ?>
			<!-- Resumo do post -->
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>">continuar lendo</a>
		<?php endif; ?>
		
		<?php comments_template(); ?>
		
		<?php
		// Custom posts mais recentes
		// if ( is_single() ) {
		// 	// A consulta
		// 	$the_query = new WP_Query( array(
		// 		'post_type' => 'blog',
		// 		'post__not_in' => array( get_the_ID() ),
		// 		'posts_per_page' => 5
		// 	) );

		// 	// O loop
		// 	if ( $the_query->have_posts() ) {
		// 		echo '<ul>';
		// 		while ( $the_query->have_posts() ) {
		// 			$the_query->the_post();
		// 			echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
		// 		}
		// 		echo '</ul>';
		// 	} else {
		// 		// Nada encontrado
		// 	}
		// 	/* Restaura a consulta original */
		// 	wp_reset_postdata();
		// } // Custom posts mais recentes - is_single
		?>
		
	</div>
	
<?php endwhile; ?>
<?php endif; // Loop ?>
