<?php
if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'theme_setup' ) ) :
  function theme_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
  }
endif;
add_action( 'after_setup_theme', 'theme_setup' );

/* Register menu */
    function register_my_menu() {
      register_nav_menu('desktop-header-menu',__( 'Desktop Header Menu' ));
      register_nav_menu('mobile-header-menu',__( 'Mobile Header Menu' ));
      register_nav_menu('footer-menu',__( 'Footer menu' ));
    }
    add_action( 'init', 'register_my_menu' );
/* Register menu end */

//Disable Gutenburg Editor
    add_filter('use_block_editor_for_post', '__return_false', 10);
//Disable Gutenburg Editor end

// support SVG
    function cc_mime_types($mimes) {
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');
// support SVG end

/* Convert to WEBP URL*/
    function webpUrl($url) {
      if($url && strpos($url, 'uploads') !== false){
        $url = str_replace("uploads","uploads-webpc/uploads", $url);
        $url = $url . '.webp';
      }
      return $url;
    }
/* Convert to WEBP URL end*/

/* custom option page with ACF */
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title'    => 'Theme General Settings',
            'menu_title'    => 'Theme Settings',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
        acf_add_options_sub_page(array(
            'page_title'    => 'Theme Header Settings',
            'menu_title'    => 'Header',
            'parent_slug'   => 'theme-general-settings',
        ));
        acf_add_options_sub_page(array(
            'page_title'    => 'Theme Footer Settings',
            'menu_title'    => 'Footer',
            'parent_slug'   => 'theme-general-settings',
        ));
        acf_add_options_sub_page(array(
            'page_title'    => '404 page Settings',
            'menu_title'    => '404 page',
            'parent_slug'   => 'theme-general-settings',
        )); 
    }
/* custom option page with ACF end */

/* Enqueue scripts and styles.*/
function theme_scripts() {
    wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style('plugin', get_template_directory_uri() . '/assets/css/plugins.min.css');
    wp_enqueue_style('app-min', get_template_directory_uri() . '/assets/css/app.min.css');
    wp_enqueue_style('icon-min', get_template_directory_uri() . '/assets/css/icon.min.css');
    wp_enqueue_style('ie-min', get_template_directory_uri() . '/assets/css/ie.min.css');
    wp_enqueue_style('custom', get_template_directory_uri() . '/assets/css/custom.css');
    wp_style_add_data( 'theme-style', 'rtl', 'replace' );

    wp_enqueue_script( 'theme-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'theme-plugins', get_template_directory_uri() . '/assets/js/plugins.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'theme-app', get_template_directory_uri() . '/assets/js/app.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'theme-forms', get_template_directory_uri() . '/assets/js/forms.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'theme-custom-js', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );
    // wp_enqueue_script( 'video-player', get_template_directory_uri() . '/js/custom-player.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets//js/custom.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

// custom functions
    require get_template_directory() . '/includes/custom.php';
    require get_template_directory() . '/includes/cpt/course.php';
    require get_template_directory() . '/includes/cpt/teacher.php';
    require get_template_directory() . '/includes/cpt/blog.php';
    require get_template_directory() . '/includes/cpt/jobs.php';
    require get_template_directory() . '/includes/image-sizes.php';
// custom functions end

// CPT
    // require get_template_directory() . '/includes/cpt/faq.php';
// CPT end


// add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {
    if ( is_front_page() ) {
        $classes[] = 'newhomepage-banner';
    }
    // else if ( is_page_template( 'page-contact.php' ) ) {
    //     $classes[] = 'contact-page';
    // }
    // else if ( is_page_template( 'page-portfolio.php' ) ) {
    //   $classes[] = 'portfolio-page';
    // }
    return $classes;
}
?>

<?php 
/*
 ==================
 Ajax Search
======================	 
*/
// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetch(){

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
        success: function(data) {
            jQuery('#datafetch').html( data );
        }
    });

}
</script>

<?php
}

// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => array('page','post','courses','blogs','jobs') ) );
    if( $the_query->have_posts() ) :
        echo '<ul>';
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

            <li><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></li>

        <?php endwhile;
       echo '</ul>';
        wp_reset_postdata();  
    endif;

    die();
}
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );