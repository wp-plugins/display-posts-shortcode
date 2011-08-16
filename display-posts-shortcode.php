<?php
/**
 * Plugin Name: Display Posts Shortcode
 * Plugin URI: http://www.billerickson.net/shortcode-to-display-posts/
 * Description: Display a listing of posts using the [display-posts] shortcode
 * Version: 0.1.4
 * Author: Bill Erickson
 * Author URI: http://www.billerickson.net
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume 
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package Display Posts
 * @version 0.1.4
 * @author Bill Erickson <bill@billerickson.net>
 * @copyright Copyright (c) 2011, Bill Erickson
 * @link http://www.billerickson.net/shortcode-to-display-posts/
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
// Create the shortcode
add_shortcode('display-posts', 'be_display_posts_shortcode');
function be_display_posts_shortcode($atts) {

	extract( shortcode_atts( array(
		'post_type' => 'post',
		'tag' => '',
		'category' => '',
		'posts_per_page' => '10',
		'order' => 'DESC',
		'orderby' => 'date',
		'include_date' => false,
		'include_excerpt' => false,
		'image_size' => false,
	), $atts ) );
	
	$args = array(
		'post_type' => $post_type,
		'tag' => $tag,
		'category_name' => $category,
		'posts_per_page' => $posts_per_page,
		'order' => $order,
		'orderby' => $orderby,
	);
	
	$return = '';
	$listing = new WP_Query($args);
	if ( $listing->have_posts() ):
		$return .= '<ul class="display-posts-listing">';
		while ( $listing->have_posts() ): $listing->the_post(); global $post;
			$return .= '<li>';
			if ($image_size) $return .= '<a href="'. get_permalink() .'">'. get_the_post_thumbnail($post->ID, $image_size).'</a> ';
			$return .= '<a href="'. get_permalink() .'">'. get_the_title() .'</a>';
			if ($include_date) $return .= ' ('. get_the_date('n/j/Y') .')';
			if ($include_excerpt) $return .= ' - ' . get_the_excerpt();
			$return .= '</li>';
		endwhile;
		
		$return .= '</ul>';
	endif; wp_reset_query();
	
	if (!empty($return)) return $return;
}
?>