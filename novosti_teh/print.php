<?
$path = ".";
include_once("$path/inc/langdate.php");
error_reporting (E_ALL ^ E_NOTICE);
if(!$PHP_SELF){
if($HTTP_POST_VARS)   {extract($HTTP_POST_VARS, EXTR_PREFIX_SAME, "post_");}
if($HTTP_GET_VARS)    {extract($HTTP_GET_VARS, EXTR_PREFIX_SAME, "get_");}
if($HTTP_COOKIE_VARS) {extract($HTTP_COOKIE_VARS, EXTR_PREFIX_SAME, "cookie_");}
if($HTTP_ENV_VARS)    {extract($HTTP_ENV_VARS, EXTR_PREFIX_SAME, "env_");}}
if($PHP_SELF == "")   { $PHP_SELF = $HTTP_SERVER_VARS[PHP_SELF]; }

$number = "1";
$template = "Print";
include("$path/show_news.php");
?>