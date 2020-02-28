<?PHP
$skin_prefix = "";
$skin_menu = <<<HTML
<a class=nav href="$PHP_SELF?mod=main">Статистика</a></td><td>|</td>
<td><a class=nav href="$PHP_SELF?mod=addnews&action=addnews">Добавить</a></td><td>|</td>
<td><a class=nav href="$PHP_SELF?mod=editnews&action=list">Редактировать</a></td><td>|</td>
<td><a class=nav href="$PHP_SELF?mod=options&action=options">Настройки</a></td><td>|</td>
<td><a class=nav href="$PHP_SELF?mod=about&action=about">Помощь</a></td><td>|</td>
<td><a class=nav href="$PHP_SELF?action=logout">Выход</a>
HTML;
$skin_header = <<<HTML
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<meta http-equiv=content-type content="text/html; charset=windows-1251">
<title>$config_home_title - управление сайтом</title>
<link href="skins/simple.css" rel="stylesheet" type="text/css" media="screen" />
<script type=text/javascript src=skins/cute.js></script>
</head>
<body>
<center>
<table border=0 cellspacing=0 cellpadding=2>
<tr><td class=bborder>
<table border=0 cellpadding=0 cellspacing=0 width=685>
<tr><td bgcolor=#F7F6F4 align=center height=24 class=main>
<table cellpadding=5 cellspacing=0 border=0>
<tr><td>{menu}</td></tr></table></td></tr>
<tr><td height=19>
</center>
<table border=0 cellpading=0 cellspacing=15 width=100% height=100%><tr><td width=100% height=100%>
HTML;
$skin_footer = <<<HTML
</tr></table></td></tr>
<tr><td bgcolor=#F7F6F4 height=24 align=center class=copyrights>{copyrights}</td></tr>
</center>
</table>
</td></tr></table>&nbsp;
</body></html>
HTML;
?>