<?php
function wpb_search_filter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','wpb_search_filter');

add_theme_support( 'post-thumbnails' ); 

//Adding style.css
function upl_enqueue_styles() {
    wp_enqueue_style('style.css', get_template_directory_uri( ) . "/style.css" );
}
add_action('wp_enqueue_scripts', 'upl_enqueue_styles');

//Logo image
$header_defaults = array(
	'default-image'          => get_template_directory_uri() . '/img/logo.png',
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => false,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $header_defaults );

// Add Favicon
function favicon() {
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_template_directory_uri().'/favicon.ico" />';
}
add_action('wp_head', 'favicon');

// Add menu
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

// Add option to push class to menu item
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// Add sidebar support
function my_custom_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Sidebar', 'umowypodlupa' ),
            'id' => 'custom-side-bar',
            'description' => __( 'Custom Sidebar', 'umowypodlupa' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'my_custom_sidebar' );

// customiser extra image option
function your_theme_customizer_setting($wp_customize) {
// add a setting 
    $wp_customize->add_setting('your_theme_footer_logo');
// Add a control to upload the hover logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'your_theme_footer_logo', array(
        'label' => 'Upload Footer Logo',
        'section' => 'header_image', //this is the section where the custom-logo from WordPress is
        'settings' => 'your_theme_footer_logo',
        'priority' => 8 // show it just below the custom-logo
    )));
}

add_action('customize_register', 'your_theme_customizer_setting');

// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $breadcrums_id      = 'breadcrumb';
    $breadcrums_class   = 'breadcrumb bg-transparent px-0 m-0 pt-4';
    $home_title         = 'Strona główna';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
        // Build the breadcrums
		echo "<nav aria-label='breadcrumb'>";
        echo '<ol id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
        // Home page
        echo '<li class="breadcrumb-item item-home"><a class="text-white bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) 
		{
            echo '<li class="breadcrumb-item item-current item-archive"><strong class="text-secondary bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
        } 
		else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) 
		{
            // If post is a custom post type
            $post_type = get_post_type();
            // If it is a custom post type display name and link
            if($post_type != 'post') 
			{
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li class="breadcrumb-item item-cat item-custom-post-type-' . $post_type . '"><a class="text-white bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
            }
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="breadcrumb-item item-current item-archive"><strong class="text-secondary bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
        }
		else if ( is_single() ) 
		{
            // If post is a custom post type
            $post_type = get_post_type();
            // If it is a custom post type display name and link
            if($post_type != 'post') 
			{
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li class="breadcrumb-item item-cat item-custom-post-type-' . $post_type . '"><a class="text-white bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
            }
            // Get post category info
            $category = get_the_category();
            if(!empty($category)) 
			{
                // Get last category post is in
                $last_category = end($category);
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="breadcrumb-item item-cat">'.$parents.'</li>';
                }
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;               
            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong class="text-secondary bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                echo '<li class="breadcrumb-item item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="text-white bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong class="text-secondary bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            } else {
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong class="text-secondary bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            }
              
        } else if ( is_category() ) {
            // Category page
            echo '<li class="breadcrumb-item item-current item-cat"><strong class="text-secondary bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
        } else if ( is_page() ) {
            // Standard page
            if( $post->post_parent ){
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                // Get parents in the right order
                $anc = array_reverse($anc);
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="breadcrumb-item item-parent item-parent-' . $ancestor . '"><a class="text-white bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }
                // Display parent pages
                echo $parents;
                // Current page
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
            } else {
                // Just display current page if not parents
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong class="text-secondary bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
            }
               
        } else if ( is_tag() ) {
            // Tag page
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="breadcrumb-item item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="text-secondary bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
            // Day archive
               
            // Year link
            echo '<li class="breadcrumb-item item-year item-year-' . get_the_time('Y') . '"><a class="text-white bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
               
            // Month link
            echo '<li class="breadcrumb-item item-month item-month-' . get_the_time('m') . '"><a class="text-white bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
               
            // Day display
            echo '<li class="breadcrumb-item item-current item-' . get_the_time('j') . '"><strong class="text-secondary bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="breadcrumb-item item-year item-year-' . get_the_time('Y') . '"><a class="text-white bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
               
            // Month display
            echo '<li class="breadcrumb-item item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
            // Display year archive
            echo '<li class="breadcrumb-item item-current item-current-' . get_the_time('Y') . '"><strong class="text-secondary bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
            // Auhor archive
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
            // Display author name
            echo '<li class="breadcrumb-item item-current item-current-' . $userdata->user_nicename . '"><strong class="text-secondary bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
            // Paginated archives
            echo '<li class="breadcrumb-item item-current item-current-' . get_query_var('paged') . '"><strong class="text-secondary bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
            // Search results page
            echo '<li class="breadcrumb-item item-current item-current-' . get_search_query() . '"><strong class="text-secondary bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
        echo '</ol></nav>';
    }
}