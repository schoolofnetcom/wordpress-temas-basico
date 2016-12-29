=== AMS Single Post Template Selector ===
Contributors: manojsv
Tags: template selector, post template selector, post template, template, custom template, post template, custom template for post, custom template, post from template, posts, templates, custom post template, single post templates, wordpress post template, wp post template, wp custom template for post, wordpress custom template for post, apply template for post, apply template for wordpress post
Requires at least: 3.1
Donate link: https://www.paypal.me/manojsv
Tested up to: 4.7
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin allows you to choose different template for individual post.

== Description ==

This plugin allows you to choose different template for individual post, for the purpose of single post view, by selecting previously created post template from the provided drop-down list in the post edit screen.

The plugin will replace the default template (single.php) with selected template for the post you applied the new template.

To create a post template, write an opening PHP comment at the top of the file that states the template’s name.

<code>
<?php
/*
Post Template - Name: Template Name
*/
?>
</code>

**Please Note:** Post template name ussage: "Post Template - Name:".

== Installation ==

1. Install AMS Single Post Template Selector either via the WordPress.org plugin directory, or by uploading the files to your server.
2. Activate the plugin.
3. That's it. You're ready to go! 

Once you activated the plugin, create a post template in your theme's folder and go to Posts > Add New screen in your admin dashboard.

On the right hand side top you’ll see Post Template Selector template drop-down list.  This is where you are able to access your post templates.

== Screenshots ==

1. In post edit screen screenshot-1.jpg.
2. Template naming screenshot-2.jpg.

== Frequently Asked Questions ==

= How do I create new Post Templates? =

To create a post template, create a php file in theme's folder, write an opening PHP comment at the top of the file that states the template’s name.

<code>
<?php
/*
Post Template - Name: Template Name
*/
?>
</code>
PS: Post templates use: "Post Template - Name:".

= How do I use the Post Templates I created? =

Go to Posts > Add New screen in your admin dashboard.
On the right hand side top you’ll see Post Template Selector template drop-down list.
This is where you are able to access your post templates.

= Can I include this plugin in my theme for distribution without any cost? =

Yes. Of course.

= I have a question that wasn't covered in the FAQ. How can I reach you? =

Please email me at: <manojmar2012@gmail.com>.

Bug reports are, of course, appreciated and cost you nothing.
I will try to make sure bugs are fixed ASAP.

== Changelog ==

= Version 1.0 =
* First Release