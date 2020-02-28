<?php

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  Путь к скрипту CuteNews
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
$path = ".";

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  Проверка на register_globals = off
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
error_reporting (E_ALL ^ E_NOTICE);
if(!$PHP_SELF){
if($HTTP_POST_VARS)   {extract($HTTP_POST_VARS, EXTR_PREFIX_SAME, "post_");}
if($HTTP_GET_VARS)    {extract($HTTP_GET_VARS, EXTR_PREFIX_SAME, "get_");}
if($HTTP_COOKIE_VARS) {extract($HTTP_COOKIE_VARS, EXTR_PREFIX_SAME, "cookie_");}
if($HTTP_ENV_VARS)    {extract($HTTP_ENV_VARS, EXTR_PREFIX_SAME, "env_");}}
if($PHP_SELF == "")   { $PHP_SELF = $HTTP_SERVER_VARS[PHP_SELF]; }
?>
<html><head>
<meta content="text/html; charset=windows-1251" http-equiv=Content-Type>
<title>Пример работы скрипта CuteNews</title>
<style>
<!--
a { color: #003366; text-decoration: none; }
a:link { color: #003366; text-decoration: none; }
a:visited { color: #003366; text-decoration: none; }
a:active { color: #54622d;  }
a:hover { color: #54622d;  }
body { background: #fff; }
body,td,tr { font-family: verdana, arial, sans-serif; color: #000; font-size: 11; font-weight: normal;}
.banner { font-family: verdana, arial, sans-serif; color: #fff; font-size: x-large; font-weight: bold; border-left:1px solid #fff; border-right: 1px solid #fff; border-top: 1px solid #fff; background: #003366; padding: 5px; }
.description { font-family: verdana, arial, sans-serif; font-size: x-small; font-weight: bold; }
ins { margin: 0px; text-decoration: none; font-style: italic; }
blockquote { margin: 0px; margin-left: 10px; }
//-->
</style></head>
<body>
<div align="center">
<center>
<table border=0 width=700 cellspacing=0 cellpadding=0><tr><td class=banner>Ваш заголовок<br><span class=description>описание сайта</span></td></tr><tr><td>&nbsp;</center>

<table border=0 width=100% cellspacing=0 cellpadding=6><tr><td width=180 valign=top style="border-right: 2px dotted #000;"><table border=0 width=93% cellspacing=0 cellpadding=0><tr>

<td width=100% style="border-top: 1 solid #000; border-bottom: 1 solid #000" bgcolor=#F3F4F5 height=26><p align=left>&nbsp;<b><font color=#003366>Панель навигации</font></b></p></td></tr>

<tr><td width=100%>&nbsp;</td></tr>
<tr><td width=100%>&nbsp;<a href=?>Главная страница</a></td></tr>
<tr><td width=100%>&nbsp;<a href=?do=archives>Архивы</a></td></tr>
<tr><td width=100%>&nbsp;</td></tr>
<tr><td width=100% style="border-top: 1 solid #000; border-bottom: 1 solid #000" bgcolor=#F3F4F5 height=26>
<p align=left>&nbsp;<font color=#003366><b>Быстрый поиск</b></font></p>
</td></tr>

<tr><td width=100%></td></tr>
<tr>
<!-- Форма поиска -->
<form method=post>
<td width=100% align=center>&nbsp;<br><input type=text name=story size=14><input type=hidden name=do value=search>&nbsp;<input type=submit value=OK></td></form>
<!-- Конец формы поиска -->
</tr>
<tr><td width=100%>&nbsp;</td></tr>
<tr>

<td width=100% style="border-top: 1 solid #000000; border-bottom: 1 solid #000000" bgcolor=#F3F4F5 height=26><p align=left>&nbsp;<font color=#003366><b>Ссылки</b></font></p></td></tr><tr>

<td width=100%>&nbsp;</td></tr>

<tr><td width=100%>&nbsp;<a href=http://cutephp.com target=_blank>CutePHP Scripts</a></td></tr>

<tr><td width=100%>&nbsp;<a href=http://news.google.com target=_blank>Google News</a></td></tr>

<tr><td width=100%>&nbsp;<a href=http://mozilla.org target=_blank>Mozilla.org</a></td></tr>

<tr><td width=100%>&nbsp;<a href=http://ultra-music.com target=_blank>Ultra-Music</a></td></tr>

</table>

<p align=center></center></td><td width=520 valign=top align=center><table border=0 width=453 cellspacing=1 cellpadding=3><tr><td width=441>

<?PHP

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  Выбираем, что инклудить
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

if($do == "search" or $dosearch == "yes")
{
$subaction = "search";
$dosearch = "yes";
include("$path/search.php");
}

elseif($do == "archives")
{
$number = "5";
include("$path/show_archives.php");
}

else{ 
$number = "5";
include("$path/show_news.php"); }
?>

</td></tr></table></td></tr></table></td></tr>

</table><br><br><center>
<table border=0 width=700 style="border-top: 1px dotted #000000;"><tr><td>

<div style="float: right; padding: 2px;">
<div style="background-color: red; color: white; width: 20px; line-height: 14px; font-size: 11px; font-family: arial;"><a href="rss.php" target="_blank" style="color: white; font-weight: bold">&nbsp;RSS&nbsp;</a></div></div>
<?
echo"<div style='font-size: 9px; text-transform: uppercase; padding: 4px;' align=center>Powered by <a style='font-size: 9px' href=\"http://cute.ultra-music.com/\" target=_blank>$config_version_name $config_version_id</a> &copy; 2004 (Original by <a style='font-size: 9px' href=\"http://cutephp.com/\" target=_blank>CutePHP</a>)</div></td></tr></table></body></html>";
?>