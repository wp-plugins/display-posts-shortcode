=== Display Posts Shortcode ===
Contributors: billerickson
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=AEDKVR5B4TDWN
Tags: shortcode, pages, posts, page, query, display, list
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: 0.1.4

Display a listing of posts using the [display-posts] shortcode

== Description ==

The *Display Posts Shortcode* was written to allow users to easily display listings of posts without knowing PHP or editing template files.

Add the shortcode in a post or page, and use the arguments to query based on tag and/or category, limit the number of posts displayed, and sort the results. I've also added an extra condition, include_date, which will place the date at the end of the post, and image_size, which will add a thumbnail.

See the [WordPress Codex](http://codex.wordpress.org/Class_Reference/WP_Query) for information on using the arguments.

The image_size can be set to thumbnail, medium, large (all controlled from Settings > Reading), or a [custom image size](http://codex.wordpress.org/Function_Reference/add_image_size).

= Examples =

[display-posts tag="advanced" posts_per_page="20"]
This will list the 20 most recent posts with the tag *Advanced*.

[display-posts tag="advanced" image_size="thumbnail"]
This will list the 10 most recent posts tagged *Advanced* and display a post image using the *Thumbnail* size. 

[display-posts category="must-read" posts_per_page="-1" include_date="true" order="ASC" orderby="title"]
This will list every post in the Must Read category, in alphabetical order, with the date appended to the end.

= Arguments =

* post_type
* tag
* category
* posts_per_page
* order
* orderby
* include_date
* image_size
* include_excerpt


== Installation ==

1. Upload `display-posts-shortcode` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the *Plugins* menu in WordPress.
1. Add the shortcode to a post or page. 


== Changelog ==

**Version 0.1.4**

* Added post_type and include_excerpt

**Version 0.1.3**

* Updated Readme

**Version 0.1.2**

* Added image_size option

**Version 0.1.1**

* Fix spacing issue in plugin

**Version 0.1**

* This is version 0.1.  Everything's new!

