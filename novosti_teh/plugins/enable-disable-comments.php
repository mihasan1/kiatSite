<?php

/*
Plugin Name: Enable/Disable Comments
Plugin URI: http://cutenews.ru/1096102755/
Description: Возможность включения/отключения комментариев для каждой отдельной новости.
Version: 2.0
Required Framework: 1.1.5
Application: CuteNews
Author: &#216;ivind Hoel
Author URI: http://appelsinjuice.org/
*/

define('EDC_COMMENTS_XFIELD','comments');
define('EDC_DEFAULT_VALUE','on');

add_action('edit-advanced-options','edc_checkbox');
add_action('new-advanced-options','edc_checkbox');
add_action('new-save-entry','edc_save');
add_action('edit-save-entry','edc_save');
add_filter('news-show-comments','edc_comments'); 
add_filter('news-entry','edc_display');

function edc_getsavedvalue($item_db = FALSE, $old_db_arr = FALSE, $added_time = FALSE) {
	global $endiscomments;
	if ($added_time) {
		if ($endiscomments != "on") {
			$endiscomments = "off";
			}
		}
	elseif ($item_db) {
		$news_id = $item_db[0];
		$xfields = new XfieldsData();
		$endiscomments = $xfields->fetch($news_id, EDC_COMMENTS_XFIELD);
		}
	elseif ($old_db_arr) {
		if ($endiscomments != "on") {
			$endiscomments = "off";
			}
		}
	if (!$endiscomments) { $endiscomments = EDC_DEFAULT_VALUE; }
	$return = array(
		allow => $endiscomments,
		added => $added_time,
		edit => $old_db_arr[0],
		);
	return $return;
}

function edc_checkbox($hook) {
	global $added_time;
	global $item_db;
	$value = edc_getsavedvalue($item_db, "", $added_time);
	if ($value[allow] == "on") { $checked = "checked=\"checked\""; }
		
	return "
	<tr><td> </td>
	<td><table border=0 cellpading=0 cellspacing=0><tr><td><input type=\"checkbox\" id=\"endiscomments\" name=\"endiscomments\" value=\"on\" $checked style='border: 0' /> <label for=\"endiscomments\">Разрешить комментарии?</label></table></td></tr>";
}

function edc_save() {
	global $added_time;
	global $old_db_arr;
	global $item_db;
	$allow = edc_getsavedvalue("", $old_db_arr, $added_time);
	$xfields = new XfieldsData();
	if ($allow[added]) { $news_id = $allow[added]; } 
	else { $news_id = $allow[edit]; } 
	if ($allow[edit] && $item_db[0] != $old_db_arr[0]) {
		$news_id = $item_db[0];
		$xfields = new XfieldsData();
		$xfields->delete($news_id);
		$xfields->save();
		$news_id = $allow[edit];
		}
	$xfields->set($allow[allow], $news_id, EDC_COMMENTS_XFIELD);
	$xfields->save();
}

function edc_display($output, $hook) {
	global $news_arr, $allow_full_story, $allow_active_news;
	$allow = edc_getsavedvalue($news_arr, "", "");

	if ($allow[allow] == "on" and $allow_active_news) { $output = preg_replace("'\[comheader\](.*?)\[/comheader\]'", "\\1", $output); }
	elseif ($allow_active_news) { $output = preg_replace("'\[comheader\](.*?)\[/comheader\]'", "", $output);	}

	if ($allow[allow] == "on" and $allow_full_story) { $output = preg_replace("'\[comheader\](.*?)\[/comheader\]'", "\\1", $output); }
	elseif ($allow_full_story) { $output = preg_replace("'\[comheader\](.*?)\[/comheader\]'", "", $output);	}
	elseif ($allow[allow] == "on" and $allow_active_news) {	return $output;	}
	else { $output = preg_replace("'\[com-link\](.*?)\[/com-link\]'i", "", $output); }
	return $output;
}

function edc_comments($allowcomments) {
	global $news_arr;
	$allow = edc_getsavedvalue($news_arr, "", "");
	if ($allow[allow] == "on") {
		return $allowcomments;
		}
	else { 
		return FALSE; 
		}
}
?>