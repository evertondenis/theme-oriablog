<?php get_header(); ?>

<div class="row">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
            <div class="col-md-8">
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </div>
        
        <?php endwhile; else: ?>
            <div class="col-md-8">
                <p><?php _e('Desculpe, não há posts a exibir.'); ?></p>
            </div>
        <?php endif; ?>
        
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
    </div>
</div>

<?php get_footer(); ?>