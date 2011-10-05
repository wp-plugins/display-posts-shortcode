<?php
/**
 * Plugin Name: Display Posts Shortcode
 * Plugin URI: http://www.billerickson.net/shortcode-to-display-posts/
 * Description: Display a listing of posts using the [display-posts] shortcode
 * Version: 1.5
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
 * @version 1.5
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
		'post_parent' => false,
		'tag' => '',
		'category' => '',
		'posts_per_page' => '10',
		'order' => 'DESC',
		'orderby' => 'date',
		'include_date' => false,
		'include_excerpt' => false,
		'image_size' => false,
		'taxonomy' => false,
		'tax_term' => false,
	), $atts ) );
	
	$args = array(
		'post_type' => $post_type,
		'tag' => $tag,
		'category_name' => $category,
		'posts_per_page' => $posts_per_page,
		'order' => $order,
		'orderby' => $orderby,
	);
	
	if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
		$tax_args = array(
			'tax_query' => array(
				array(
					'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $tax_term
				)
			)
		);
		$args = array_merge( $args, $tax_args );
	}
	
	if( $post_parent ) {
		if( 'current' == $post_parent ) {
			global $post;
			$post_parent = $post->ID;
		}
		$args['post_parent'] = $post_parent;
	}
	
	$return = '';
	$listing = new WP_Query($args);
	if ( $listing->have_posts() ):
		$return .= '<ul class="display-posts-listing">';
		while ( $listing->have_posts() ): $listing->the_post(); global $post;
			
			if ( $image_size && has_post_thumbnail() )  $image = '<a class="image" href="'. get_permalink() .'">'. get_the_post_thumbnail($post->ID, $image_size).'</a> ';
			else $image = '';
				
			$title = '<a class="title" href="'. get_permalink() .'">'. get_the_title() .'</a>';
			
			if ($include_date) $date = ' <span class="date">('. get_the_date('n/j/Y') .')</span>';
			else $date = '';
			
			if ($include_excerpt) $excerpt = ' - <span class="excerpt">' . get_the_excerpt() . '</span>';
			else $excerpt = '';
			
			$output = '<li>' . $image . $title . $date . $excerpt . '</li>';
			
			$return .= apply_filters( 'display_posts_shortcode_output', $output, $atts, $image, $title, $date, $excerpt );
			
		endwhile;
		
		$return .= '</ul>';
	endif; wp_reset_query();
	
	if (!empty($return)) return $return;
}
?>