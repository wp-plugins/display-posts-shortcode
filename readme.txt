=== Display Posts Shortcode ===
Contributors: billerickson
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MQKRBRFVRUV8C
Tags: shortcode, pages, posts, page, query, display, list
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: 1.6

Display a listing of posts using the [display-posts] shortcode

== Description ==

The *Display Posts Shortcode* was written to allow users to easily display listings of posts without knowing PHP or editing template files.

Add the shortcode in a post or page, and use the arguments to query based on tag, category, post type, and many other possibilities (see the Arguments). I've also added some extra options to display something more than just the title: include_date, include_excerpt, and image_size.

See the [WordPress Codex](http://codex.wordpress.org/Class_Reference/WP_Query) for information on using the arguments.

The image_size can be set to thumbnail, medium, large (all controlled from Settings > Reading), or a [custom image size](http://codex.wordpress.org/Function_Reference/add_image_size).

= Examples =

[display-posts tag="advanced" posts_per_page="20"]
This will list the 20 most recent posts with the tag *Advanced*.

[display-posts tag="advanced" image_size="thumbnail"]
This will list the 10 most recent posts tagged *Advanced* and display a post image using the *Thumbnail* size. 

[display-posts category="must-read" posts_per_page="-1" include_date="true" order="ASC" orderby="title"]
This will list every post in the Must Read category, in alphabetical order, with the date appended to the end.

[display-posts taxonomy="color" tax_term="blue" include_excerpt="true"]
This will display the title and excerpt of the 10 most recent posts marked "blue" in the custom taxonomy "color".

[display-posts wrapper="ol"]
This will display posts as an ordered list. Options are ul for unordered lists (default), ol for ordered lists, or div for divs.

= Arguments =

* tag
* category
* posts_per_page
* order
* orderby
* include_date
* include_excerpt
* image_size
* post_type
* post_parent
* taxonomy
* tax_term
* tax_operator
* wrapper

= Further Customizaion =

`display_posts_shortcode_output`
For customizing the output of individual posts.
Example: https://gist.github.com/1175575#file_display_posts_shortcode_output.php

`display_posts_shortcode_wrapper_open` 
`display_posts_shortcode_wrapper_close`
For customizing the outer markup of the whole listing. By default it is a `ul` but
can be changed to `ol` or `div` using the 'wrapper' attribute, or by using this filter.
Example: https://gist.github.com/1270278

== Installation ==

1. Upload `display-posts-shortcode` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the *Plugins* menu in WordPress.
1. Add the shortcode to a post or page. 


== Changelog ==

**Version 1.6**
* Added `post_parent` where you can specify a parent by ID, or you can say `post_parent=current` and it will use the current page's ID.
* Added `wrapper` where you can decide if the posts are an unordered list, ordered list, or div's
* Added support for multiple taxonomy terms (comma separated) and taxonomy operator (IN, NOT IN, or AND).

**Version 1.5**
* For the sake of clarity I'm changing version numbers. No feature changes

**Version 0.1.5**
* Added a filter (display_posts_shortcode_output) so you can modify the output of individual posts however you like.

**Version 0.1.4**

* Added post_type, taxonomy, tax_term, and include_excerpt
* Added classes to each part of the listing (image, title, date, excerpt) to make it easier to change the look using CSS

**Version 0.1.3**

* Updated Readme

**Version 0.1.2**

* Added image_size option

**Version 0.1.1**

* Fix spacing issue in plugin

**Version 0.1**

* This is version 0.1.  Everything's new!

