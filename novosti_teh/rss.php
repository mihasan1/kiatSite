<?php
include'data/config.php';
header('Content-type: text/xml');
echo<<<XML
<?xml version="1.0" encoding="windows-1251"?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
<channel>
<title>$config_home_title</title>
<link>$config_http_home_url</link>
<language>ru</language>
<description>$config_home_title</description>
<generator>$config_version_name $config_version_id</generator>
XML;

$template= "rss";
$number= "5";
include('show_news.php');

echo'</channel></rss>';
?>