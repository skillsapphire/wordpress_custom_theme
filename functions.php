<?php
    require_once('bs4navwalker.php');

    function wpct_assets_css(){
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_enqueue_style('style', get_stylesheet_uri());
    }
    add_action('wp_enqueue_scripts', 'wpct_assets_css');

    function wpct_assets_scripts() {
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.bundle.min.js', array( 'jquery' ) );
      }
    add_action( 'wp_enqueue_scripts', 'wpct_assets_scripts');

    register_nav_menus( [ 'primary' => __( 'Primary Menu' ) ] );




// array of filters (field key => field name)
$GLOBALS['my_query_filters'] = array( 
	'field_1'	=> 'first_name', 
	'field_2'	=> 'last_name'
);


// action
add_action('pre_get_posts', 'my_pre_get_posts', 10, 1);

function my_pre_get_posts( $query ) {
	
	// bail early if is in admin
	if( is_admin() ) return;
	
	
	// bail early if not main query
	// - allows custom code / plugins to continue working
	if( !$query->is_main_query() ) return;
	
	
	// get meta query
	$meta_query = $query->get('meta_query');

	
	// loop over filters
	foreach( $GLOBALS['my_query_filters'] as $key => $name ) {
		
		// continue if not found in url
		if( empty($_GET[ $name ]) ) {
			
			continue;
			
		}
		
		
		// get the value for this filter
		// eg: http://www.website.com/events?city=melbourne,sydney
		$value = explode(',', $_GET[ $name ]);
		
		
		// append meta query
    	$meta_query[] = array(
            'key'		=> $name,
            'value'		=> $value,
            'compare'	=> 'IN',
        );
        
	} 
	
	
	// update meta query
	$query->set('meta_query', $meta_query);

}







    // Numbered Pagination logic
if ( !function_exists( 'wpct_pagination' ) ) {
	//https://www.wpexplorer.com/pagination-wordpress-theme/
	function wpct_pagination() {
		
		$prev_arrow = is_rtl() ? '→' : '←';
		$next_arrow = is_rtl() ? '←' : '→';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
	
}
?>













