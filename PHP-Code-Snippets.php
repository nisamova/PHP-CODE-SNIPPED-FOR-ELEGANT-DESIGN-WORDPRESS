<?php
/*
=== Example of Child_theme function.php Feb 2018-Nazokat Isamova
*/
function dc_enqueue_styles_ikat_house() {
	wp_enqueue_style( 'divi-parent', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'divi-parent' ) );
}
add_action( 'wp_enqueue_scripts', 'dc_enqueue_styles_ikat_house' );
/*===FOR ELEGANT ARCHIVE DISPLAY (displays your archive monthly, shows past 10 month and current year*/
function wpb_limit_archives_ikat() { 
 
$my_archives = wp_get_archives(array(
    'type'=>'monthly', 
    'limit'=>10,
    'echo'=>0
));
     
return $my_archives; 
 } 
 /*===Short Code for "wpb_limit_archives_ikat" function====(note:you can change the shortcode name and function name*/
add_shortcode('wpb_custom_archives', 'wpb_limit_archives_ikat'); 
add_filter('widget_text', 'do_shortcode'); 
/*==========BREAK===========*/
/* FOR CPT */
function wpb_limit_archives_ikat_articles() { 
 
    $my_archives_ikat_articles = wp_get_archives(array(
        'type'=>'monthly', 
        'limit'=>10,
        'post_type'=>'articles',
        'echo'=>0
    ));
    return $my_archives_ikat_articles; 
     } 
/*====Adding Short Code===*/
    add_shortcode('wpb_custom_archives_articles', 'wpb_limit_archives_ikat_articles'); 
/*==========BREAK===========*/
/*===USER CONTROLLED FOR UPLOAD SIZE=== */
function increase_upload_size_limit($limit){
	if(!current_user_can('manage_options')){
		$limit = 225280; /* this is up to 220KB file-size-control the size of image for SEO */
	}
	return $limit;
	}
add_filter('upload_size_limit_ikat_house','increase_upload_size_limit');
