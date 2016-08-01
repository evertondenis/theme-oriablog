<?php
// Links Uteis
// https://digwp.com/2011/05/loops/

// Wordpress Active
add_theme_support( 'post-thumbnails' ); 




require_once('wp_bootstrap_navwalker.php');

add_image_size( 'thumb-post', 320, 220, true );
add_image_size( 'img-post', 650, 440, true );
add_image_size( 'thumb-post-sidebar', 90, 90, true );

function scripts_do_template() {
    wp_register_script('bootstrap', get_template_directory_uri().'/assets/lib/bootstrap/3.3.6/js/bootstrap.min.js#asyncload', array('jquery'), '', true);
    // wp_enqueue_style( 'style-oria', get_template_directory_uri() . '/assets/css/oria.css',false,'1.0','all');
    wp_register_script('scripts', get_template_directory_uri().'/assets/js/scripts.js#asyncload', array(), '', true );

    wp_enqueue_script('style-oria');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('scripts');
}

add_action('wp_enqueue_scripts', 'scripts_do_template');
add_action( 'after_setup_theme', 'wpt_setup' );

function wpt_setup() {  
    register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
    oria_theme_support();
    images_sizes();
}

function oria_theme_support() {
    add_theme_support( 'post-thumbnails', array( 'post', 'page', 'blog' ));
    add_theme_support( 'post-formats', array( 'quote', 'gallery','video', 'audio', 'comments' ) );
}

function images_sizes() {
    add_image_size( 'team', 225, 345, true );
}

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'before_title' => '<h3>',
        'after_title' => '</h3>',
        'before_widget' => '<div class="row"><div class="col-md-12"><div class="content">',
        'after_widget' => '</div></div></div>',
        ));

    register_sidebar( array(
        'name' => 'Footer Sidebar 1',
        'id' => 'footer-sidebar-1',
        'description' => 'Appears in the footer area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ) );

    register_sidebar( array(
        'name' => 'Footer Sidebar 2',
        'id' => 'footer-sidebar-2',
        'description' => 'Appears in the footer area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ) );

    register_sidebar( array(
        'name' => 'Footer Sidebar 3',
        'id' => 'footer-sidebar-3',
        'description' => 'Appears in the footer area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ) );

    register_sidebar( array(
        'name' => 'Footer Sidebar 4',
        'id' => 'footer-sidebar-4',
        'description' => 'Appears in the footer area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ) );

    register_sidebar(array(
        'name' => 'Coluna lateral Blog',
        'id' => 'sidebar-blog',
        'description' => 'Coluna lateral para o blog',
        'before_title' => '<div class="content"><h3>',
        'after_title' => '</h3>',
        'before_widget' => '<div class="row"><div class="col-md-12">',
        'after_widget' => '</div></div></div>',
        ));
}


/**
 * --------------------------------------------------------------
 * BLOG
 * --------------------------------------------------------------
 */

function registra_posts_blog() {
    $labels = array(
        'name'               => 'Posts',
        'singular_name'      => 'Blog',
        'menu_name'          => 'Blog',
        'name_admin_bar'     => 'Blog',
        'add_new'            => 'Novo post',
        'add_new_item'       => 'Novo',
        'new_item'           => 'Novo',
        'edit_item'          => 'Editar',
        'view_item'          => 'Visualizar',
        'all_items'          => 'Posts',
        'search_items'       => 'Encontrar',
        'parent_item_colon'  => '',
        'not_found'          => 'Nada encontrado.',
        'not_found_in_trash' => 'Nada encontrado.',
        );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'rewrite' => array('slug' => 'blog'),
        'can_export' => true,
        'supports' => array(
            'title', 
            'editor', 
            'author', 
            'thumbnail',  
            'excerpt', 
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'post-formats'
            ),
        'has_archive' => true,
        'taxonomies' => array('category', 'post_tag', 'comments')
        );

    $cta_labels = array(
        'name'               => 'CTAs',
        'singular_name'      => 'CTA',
        'menu_name'          => 'CTA',
        'name_admin_bar'     => 'CTA',
        'add_new'            => 'Novo CTA',
        'add_new_item'       => 'Novo',
        'new_item'           => 'Novo',
        'edit_item'          => 'Editar',
        'view_item'          => 'Visualizar',
        'all_items'          => 'CTAs',
        'search_items'       => 'Encontrar',
        'parent_item_colon'  => '',
        'not_found'          => 'Nada encontrado.',
        'not_found_in_trash' => 'Nada encontrado.',
        );

    $cta_args = array(
        'labels'             => $cta_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'rewrite' => array('slug' => 'ctas'),
        'can_export' => true,
        'supports' => array(
            'title', 
            'editor', 
            'author', 
            'thumbnail',  
            'excerpt', 
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'post-formats'
            ),
        'has_archive' => true,
        'taxonomies' => array('category', 'post_tag', 'comments')
        );    
    
    flush_rewrite_rules();
    register_post_type( 'blog', $args );
    register_post_type( 'ctas', $cta_args );
    flush_rewrite_rules();
}
add_action( 'init', 'registra_posts_blog' );
add_theme_support( 'post-thumbnails', array('post', 'ctas', 'blog', 'custom-type'));

function get_tag_id_by_name($tag_name) {
    global $wpdb;
    $tag_ID = $wpdb->get_var("SELECT * FROM ".$wpdb->terms." WHERE  `name` =  '".$tag_name."'");
    
    return $tag_ID;
}


/* END BLOG */


/**
 * --------------------------------------------------------------
 * PAGINATION
 * --------------------------------------------------------------
 */

function pagination($pages = '') {
    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if(!$pages) {
            $pages = 1;
        }
    }

    if(1 != $pages) {
        // echo "<span>Page ".$paged." of ".$pages."</span>";
        if($paged > 1) echo "<a href='".get_pagenum_link($paged - 1)."' class=\"btn btn-primary btn-lg\"><i class=\"fa fa-chevron-left pagination-icon-r\" aria-hidden=\"true\"></i> Anterior";

        for ($i=1; $i <= $pages; $i++) {
            if (1 != $pages) {
                echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }

        if ($paged < $pages ) echo "<a href=\"".get_pagenum_link($paged + 1)."\" class=\"btn-primary btn-lg\">Próximo <i class=\"fa fa-chevron-right pagination-icon-l\" aria-hidden=\"true\"></i></a>";
    }
}

/* END PAGINATION */

/**
 * --------------------------------------------------------------
 * BREADCRUMB BLOG
 * --------------------------------------------------------------
 */

function the_breadcrumb() {
    echo '<ul>';
    if (!is_home()) {
        echo '<li><a href="';
        echo '/blog';
        echo '" class="border-bottom-a">';
        echo 'Blog';
        echo "</a></li>";
        if (is_category() || is_single()) {
            echo '<li>/</li>';
            echo '<li>';
            the_category(' </li><li> ');
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}

/**
 * --------------------------------------------------------------
 * POSTS MAIS VISUALIZADOS
 * --------------------------------------------------------------
 */

class Realty_Widget extends WP_Widget{
    function __construct() {
        parent::__construct(
        'realty_widget', // Base ID
        'Posts + vistos', // Name
        array('description' => __( 'Displays your latest listings. Outputs the post thumbnail, title and date per listing'))
        );
    }

    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $numberOfListings = $instance['numberOfListings'];
        echo $before_widget;
        if ( $title ) {
            echo $before_title . $title . $after_title;
        }
        $this->getRealtyListings($numberOfListings);
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
        return $instance;
    }

    function form($instance) {
        if( $instance) {
            $title = esc_attr($instance['title']);
            $numberOfListings = esc_attr($instance['numberOfListings']);
        } else {
            $title = '';
            $numberOfListings = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'realty_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php _e('Number of Listings:', 'realty_widget'); ?></label>
            <select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
                <?php for($x=1;$x<=10;$x++): ?>
                <option <?php echo $x == $numberOfListings ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
            <?php endfor;?>
        </select>
    </p>
    <?php
}

    function getRealtyListings($numberOfListings) { //html
        global $post;
        add_image_size( 'realty_widget_size', 90, 51, false );
        $listings = new WP_Query();
        $listings->query('post_type=blog&posts_per_page=' . $numberOfListings );
        if($listings->found_posts > 0) {
            echo '<ul class="realty_widget">';
            while ($listings->have_posts()) {
                $listings->the_post();
                $image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'realty_widget_size') : '<div class="noThumb"></div>';
                $listItem = '<li><a href="' . get_permalink() . '" title="' . get_the_title() . '">' . $image . '</a>';
                $listItem .= '<a href="' . get_permalink() . '">';
                $listItem .= get_the_title() . '</a>';
                $listItem .= '<span>' . get_the_date() . '</span></li>';
                echo $listItem;
            }
            echo '</ul>';
            wp_reset_postdata();
        }else{
            echo '<p style="padding:25px;">No listing found</p>';
        }
    }


} //end class Realty_Widget
function register_realty_widget() {
    register_widget('Realty_Widget');
}

add_action('widgets_init', 'register_realty_widget');

/* END POSTS MAIS VISUALIZADOS */