<?php

/*
Plugin Name:	Disable All Comments
Plugin URI:		http://cutenews.ru/1096102091/
Description:	Полное отключение комментариев.
Version:		1.0
Required Framework: 1.1.4
Application: CuteNews
Author: David Carrington
Author URI: http://www.brandedthoughts.co.uk
*/

add_filter('news-show-comments','disable_all_comments', 5000);
add_filter('news-entry','dac_display');
add_filter('news-allow-comment','disable_all_comments',5000);

function disable_all_comments($allow, $h) {
	return false;
}

function dac_display($entry, $h) {
	return preg_replace('{\[com-link\].*?\[/com-link\]}i', '', $entry);
}

?>