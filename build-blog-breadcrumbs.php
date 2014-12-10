<?php
/* 
Plugin Name: Build Blog Breadcrumbs
Plugin URI: http://thecodeisclear.in
Version: 0.1
Author: Ramesh Vishveshwar
Description: Builds a breadcrumb trail on single posts page. 
*/
add_filter('the_content', 'tcic_add_breadcrumbs');

function tcic_add_breadcrumbs( $content ) {

	/* Check if single post is displayed */
	if ( is_single() ) {
	    $separator = ' : ';
		$category = get_the_category();
		$breadcrumb = '<!-- Start of BBB -->';
		$breadcrumb = '<div class="tcic_breadcrumb" style="border: 1px solid #a1a1a1; border-radius: 3px; padding: 5px 5px; font-size: 0.66em; text-transform: uppercase;"><a href="'. get_home_url() .'" title="Home">Home</a>' . $separator;
		// Default uses the first category which could be a sub-category
		if($category[0]){
			$breadcrumb .= '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>' . $separator;
		}
		$breadcrumb = $breadcrumb . get_the_title() . '</div> <!-- End of BBB -->';
	}
	return $breadcrumb . $content;
	
}
  
?>
