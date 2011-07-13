=== Display Posts Shortcode ===
Contributors: billerickson
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=AEDKVR5B4TDWN
Tags: shortcode, pages, posts, page, query, display, list
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: 0.1

Display a listing of posts using the [display-posts] shortcode

== Description ==

The *Display Posts Shortcode* was written to allow users to easily display listings of posts without knowing PHP or editing template files.

Add the shortcode in a post or page, and use the arguments to query based on tag and/or category, limit the number of posts displayed, and sort the results. I’ve also added an extra condition, include_date, which will place the date at the end of the post.

See the [WordPress Codex](http://codex.wordpress.org/Class_Reference/WP_Query) for information on using the arguments.

=Examples=

[listing tag="advanced" posts_per_page="20"]
This will list the 20 most recent posts with the tag “Advanced”.

[listing category="must-read" posts_per_page="-1" include_date="true" order="ASC" orderby="title"]
This will list every post in the Must Read category, in alphabetical order, with the date appended to the end.

=Arguments=
* tag
* category
* posts_per_page
* order
* orderby
* include_date


== Installation ==

1. Upload `display-posts-shortcode` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the *Plugins* menu in WordPress.
1. Add the shortcode to a post or page. 


== Changelog ==

**Version 0.1.1**

* Fix spacing issue in plugin

**Version 0.1**

* This is version 0.1.  Everything's new!

