<?php

/*
Plugin Name: Prospective Posting
Plugin URI: http://cutenews.ru/1096104099/
Description: Вывод новостей с наступлением выбранной даты (публикации на будущее).
Version: 0.1
Required Framework: 1.1.4
Application: CuteNews
Author: &#216;ivind Hoel
Author URI: http://appelsinjuice.org/
*/

//add_action('edit-advanced-options','pp_dateinput');
//add_action('new-advanced-options','pp_dateinput');
//add_action('new-save-entry','edc_save');
//add_action('edit-save-entry','edc_save');
add_filter('news-loop','pp_loop');


function pp_loop() {
	global $news_arr;
	global $config_date_adjust;
	$nowtime = time() + ($config_date_adjust * 60);
	if ($nowtime <= $news_arr[0]) { 
		$modifier = "skip";
		}
	return $modifier;
}

?>