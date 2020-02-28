<?PHP
$skin_prefix = "";
$skin_menu = <<<HTML
<table cellpadding=8 cellspacing=4 border=0>
<tr><td><a class=nav href="$PHP_SELF?mod=main">Статистика</a></td><td>|</td>
<td><a class=nav href="$PHP_SELF?mod=addnews&action=addnews" accesskey=a>Добавить</a></td><td>|</td>
<td><a class=nav href="$PHP_SELF?mod=editnews&action=list">Редактировать</a></td><td>|</td>
<td><a class=nav href="$PHP_SELF?mod=options&action=options">Настройки</a></td><td>|</td>
<td><a class=nav href="$PHP_SELF?mod=about&action=about">Помощь</a></td><td>|</td>
<td><a class=nav href="$PHP_SELF?action=logout">Выход</a></td></tr>
</table>
HTML;
$skin_header = <<<HTML
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<meta http-equiv=content-type content="text/html; charset=windows-1251">
<title>$config_home_title - управление сайтом</title>
<link href="skins/default.css" rel="stylesheet" type="text/css" media="screen" />
<script type=text/javascript src=skins/cute.js></script>
</head>
<body>
<center>
<table border=0 cellspacing=0 cellpadding=2>
<tr><td class=bborder bgcolor=#FFFFFF style="-moz-border-radius: .8em .8em .8em .8em;">
<table border=0 cellpadding=0 cellspacing=0 bgcolor=#ffffff width=745>
<tr><td bgcolor=#FFFFFF>&nbsp;</td></tr>
<tr><td bgcolor=#000000><img src=skins/images/blank.gif width=1 height=1></td></tr>
<tr><td bgcolor=#F7F6F4 >{menu}</td></tr>
<tr><td bgcolor=#000000><img src=skins/images/blank.gif width=1 height=1></td></tr>
<tr><td bgcolor=#FFFFFF><img src=skins/images/blank.gif width=1 height=5></td></tr>
<tr><td>
</center>
<table border=0 cellpading=0 cellspacing=0 width=100% height=100%>
<td width=13% height=55%>
<p align=center><br /><img border=0 src="skins/images/{image-name}.gif">
<td width=87% height=20%><div class=header>{header-text}</div>
<tr><td width=13% height=26%><td width=87% height=46%>
HTML;
$skin_footer = <<<HTML
<img border=0 height=10 src=skins/images/blank.gif></tr></table>
</td></tr></table>
</td></tr></table><br />
<center>{copyrights}</body></html>
HTML;
?>