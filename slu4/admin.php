<?
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include("config.inc.php");
?>
<html>
<head>
<title>DesignTheory RT :: Модуль администрирования v.1.0</title>
<meta http-equiv="content-type" content="text/html; charset=windows-1251">
<meta http-equiv="Pragma" content="no-cache">
<style>
input {font-family: Georgia; font-size: 11px; background-color: #eeeeee; border: 1 solid #000000; height:17px; }
select {font-family: Georgia; font-size: 12px; background-color: #eeeeee; border: 1 solid #000000; }
textarea {font-family: Times New Roman, Sans-Serif; font-size: 12px; background-color: #eeeeee; border: 1 solid #000000; }
table {border: 1 solid #c0c0c0; font-family: Georgia; font-size: 12px;}
.radio { border: 0px}
.contact_form {BORDER-RIGHT: #000000 2px solid; BORDER-TOP: #000000 1px solid; FONT-SIZE: 11px; MARGIN-BOTTOM: 1px; BORDER-LEFT: #000000 1px solid; COLOR: #ff5000; BORDER-BOTTOM: #000000 2px solid; FONT-FAMILY: Verdana,Tahoma,Arial; BACKGROUND-COLOR: #e0e0e0}
.form_button {BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; FONT-SIZE: 11px; MARGIN-BOTTOM: 1px; BORDER-LEFT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid; FONT-FAMILY: Verdana,Tahoma,Arial; BACKGROUND-COLOR: #cccccc}
body, p, td {font-family:Verdana, Times; font-size: 11px; color:#000000;
text-align:justify; scrollbar-base-color: #999999; scrollbar-arrow-color: #000000;
scrollbar-highlight-color: #e0e0e0; scrollbar-shadow-color: #e0e0e0; scrollbar-face-color: #999999;
scrollbar-track-color: #c0c0c0; }
a:link {text-decoration: none; color:#ff5000;font-weight:normal}
a:hover {text-decoration:none; color:#ffff00}
a:visited {text-decoration:underline; color:#aa7777}
.bb1 { BORDER-BOTTOM: #c0c0c0 1px solid; BORDER-TOP: #c0c0c0 1px solid; }
-->
</style>
<script>
function popup(url)
{
bb=window.open(url,'popup','toolbar=0,location=0,directories=0,status=0,menubar=0, scrollbars=0,resizable=0,width=300,height=150,top=0,left=50');
}
</script>
</head>

<body bgcolor="#e0e0e0">

<?
#<a href=\"javascript:popup('?a=edit&p=$i&up=$user_pass');\">
function listt($filename)
{
global $filename,$user_pass;
$data=file("$filename");
if (!empty($data[0])){
$k=sizeof($data);
echo "<input name=k type=hidden value=$k>";
for($i=0;$i<$k;$i++){
$n = $i+1;
print "<tr><td width=10 bgcolor=#cccccc><center>".$n."</font></b></td><td bgcolor=#e0e0e0>&nbsp;$data[$i]</td><td width=5><img scr='' width=5 height=1></td><td width=50 bgcolor=#cccccc><a href=\"javascript: if (confirm ('Удалить фразу? Вы уверены?')) window.location.href='?a=del&p=$i&up=$user_pass'\"><img src=del.gif width=13 height=13 border=0 alt='Удалить'></a>
&nbsp;&nbsp;<a href=\"?a=edit&p=$i&up=$user_pass#edit\"><img src=edit.gif width=15 height=15 border=0 alt='Редактировать'></a></td></tr>";
}
}
}
function cut($string)
{
$string = str_replace("\r","",$string);
$string = str_replace("\\\"","\"",$string);
$string = str_replace("\n","",$string);
return ($string);
}


if (!isset($up) || $up != "$user_pass") {
echo ("
<center><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
       <form action=\"admin.php\" method=\"post\">
         Пароль: <input type=\"password\" name=\"up\"><br><br>
         <input type=\"submit\" name=\"login\" style=\"width: 170px\">
</center>
");
}
else { ?>

<center>
<table width="600" border="0" height="20" bgcolor=#cccccc cellspacing="0" cellpadding="0" style="BORDER-BOTTOM: #f0f0f0 1px solid;BORDER-right: #e0e0e0 1px solid;BORDER-top: 0px solid;">
<? if (!isset($conf)): ?>
<tr>
<td width=150 bgcolor="#f0f0f0" style="BORDER-TOP: #c0c0c0 1px solid;"><a href="?up=<? echo $user_pass; ?>" style="text-decoration:none;"><center>Редактирование</center></a></td>
<td width=130 class="bb1" style="BORDER-LEFT: #c0c0c0 1px solid;"><a href="?conf=&up=<? echo $user_pass; ?>" style="text-decoration:none;"><center>Настройка</center></a></td>
<td width=130 class="bb1" style="BORDER-LEFT: #c0c0c0 1px solid;"><a href="index.php" style="text-decoration:none;" target="_view"><center>Просмотр</center></a></td>
<td width=130 class="bb1" style="BORDER-LEFT: #c0c0c0 1px solid;"><a href="readme.html" style="text-decoration:none;" target="_view"><center>Помощь</center></a></td>
<td style="BORDER-LEFT: #c0c0c0 1px solid; BORDER-BOTTOM: #c0c0c0 1px solid;" bgcolor="#e0e0e0">&nbsp;</td>
</tr>
<? endif; ?>
<? if (isset($conf)): ?>
<tr>
<td width=150 class="bb1" style="BORDER-LEFT: #c0c0c0 1px solid;"><a href="?up=<? echo $user_pass; ?>" style="text-decoration:none;"><center>Редактирование</center></a></td>
<td width=130 bgcolor="#f0f0f0" style="BORDER-TOP: #c0c0c0 1px solid;"><a href="?conf=&up=<? echo $user_pass; ?>" style="text-decoration:none;"><center>Настройка</center></a></td>
<td width=130 class="bb1" style="BORDER-LEFT: #c0c0c0 1px solid;"><a href="index.php" style="text-decoration:none;" target="_view"><center>Просмотр</center></a></td>
<td style="BORDER-LEFT: #c0c0c0 1px solid; BORDER-BOTTOM: #c0c0c0 1px solid;" bgcolor="#e0e0e0">&nbsp;</td>
</tr>
<? endif; ?>
</table>
</center>
<?

// Шаблоны
$add_h = "
<center>
<table width=\"600\" border=\"0\" bgcolor=#f0f0f0 style=\"border-bottom: 1 solid #c0c0c0;border-top: 0 solid;\">
<tr>
<td width=\"40\">&nbsp;</td>
<td align=\"\" valign=\"top\" width=\"300\">
<br>
<h3>Добавить фразу:</h3>
<form action=\"admin.php\" method=\"post\">
<input style=\"width: 200px;\" name=add_text type=text value=\"\" class=contact_form>
<input type=hidden name=up value=$user_pass>
<input type=submit name=add value=\"Добавить\" class=form_button onmouseover=\"this.style.backgroundcolor='#E8E8FF';\" onmouseout=\"this.style.backgroundcolor='#cccccc';\">
<br><br>
</form>
<table width=\"500\" border=\"0\" style=\"border:0\">
";

$add_f = "</table>&nbsp;<br></td>
</tr>
</table>
</center>
";

$edit_h = "<center>
<table width=\"600\" border=\"0\" style=\"border-top:0px;\" bgcolor=#eeeeee><a name=\"edit\"></a>
<tr>
<td width=\"30\">&nbsp;</td>
<td align=\"\" valign=\"top\" width=\"300\"><br>";
?>

<?
if (isset($a) && $a == "del" && isset($p)):
// Удаление фразы_начало
$data=file("$filename");
$k=sizeof($data);
$str = "";
$s1 = $p;
$m1 = array_slice($data,0,$s1);
$m2 = array_slice($data,$s1+1);
$m = array_merge_recursive ($m1,$m2);
for ($i=0;$i<sizeof($m);$i++)
{
$str .= $m[$i];
}
$fp=fopen("$filename","w+");
fputs($fp,$str);
fclose($fp);
echo "<meta HTTP-EQUIV=\"Refresh\" content=\"0; URL=?up=$user_pass\">
<br><br><br>
<center>
Фраза была успешно удалена.<br>
<a href=\"?user_p=$user_pass\">Нажмите сюда.</a>
</center>";

// Удаление фразы_конец

// Добавление фразы_начало

elseif (isset($add)):
$data=file("$filename"); $ok = 0;
for ($i = 0; $i<sizeof($data);$i++) {
$data[$i] = str_replace("\r","",$data[$i]);
$data[$i] = str_replace("\n","",$data[$i]);
$data[$i] = str_replace(" ","",$data[$i]);
$at = $add_text; $at = str_replace(" ","",$at);
$check = $data[$i];
if ($check == $at): $ok = 1; endif;
}

if (!empty($add_text) && $ok == "0"):
echo $add_h;
$gstr =cut($add_text)."\r\n";
$fp=fopen("$filename","a+");
fputs($fp,$gstr);
echo "<center><h3>Фраза добавлена!</h3></center>";
fclose($fp);
echo listt($filename);
echo $add_f;
else:
echo $add_h;
echo listt($filename);
echo $add_f;
endif;

// Добавление фразы_конец

// Редактирование фразы_начало
elseif (isset($a) && $a == "edit"):
$str = "";
$data=file("$filename");
if (!empty($data[0])):
$k=sizeof($data);
if (isset($save) && !empty($e_text)):
for($i=0;$i<$k;$i++){
$data[$i] = str_replace("\r","*",$data[$i]);
$data[$i] = str_replace("\n","*",$data[$i]);
if ($i == $p):
$e_text = str_replace("&#34;","\"",$e_text);
$str = $str.$e_text."*";
else:
$str = $str.$data[$i]."*";
endif;
}
$str = str_replace("**","",$str);
$str = str_replace("\\\"","\"",$str);
$str = str_replace("*","\r\n",$str);
$fp=fopen("$filename","w+");
fputs($fp,$str);
fclose($fp);
$data=file("$filename");
$data[$p] = str_replace("\"","&#34;",$data[$p]);
$data[$p] = str_replace("**","",$data[$p]);
echo $add_h;
echo listt($filename);
echo $add_f;
echo $edit_h;
echo "<h3>Редактирование:</h3>
<form action=\"admin.php?a=edit&p=$p&up=$user_pass#edit\" method=\"post\">
<input type=hidden name=up value=$user_pass>
Текст вашей фразы:<br>
<input style=\"width: 300px;\" name=e_text type=text value=\"$data[$p]\" class=contact_form><br>
<input type=submit name=save value=\"Изменить\" class=form_button>
</form>";
echo "<font color=red><b>Изменения внесены.</b></font><br><br>";
else:
$data[$p] = str_replace("\"","&#34;",$data[$p]);
echo $add_h;
echo listt($filename);
echo $add_f;
echo $edit_h;
echo "<h3>Редактирование:</h3>
<form action=\"admin.php?a=edit&p=$p&up=$user_pass#edit\" method=\"post\">
<input type=hidden name=up value=$user_pass>
Текст вашей фразы:<br>
<input style=\"width: 400px;\" name=e_text type=text value=\"$data[$p]\" class=contact_form><br>
<input type=submit name=save value=\"Изменить\" class=form_button><br><br>
</form>";
endif;
echo "</td></tr></table></center>";
endif;
// Редактирование фразы_Конец

else:
// Выводим содержимое файла
if(!isset($conf)):
echo $add_h;
echo listt($filename);
echo $add_f;
else:

// Изменение настроек и параметров скрипта (config.inc.php)
$conf_view = "
<center>
<table width=\"600\" border=\"0\" bgcolor=#f0f0f0 style=\"border-bottom: 1 solid #c0c0c0;border-top: 0 solid;\">
<tr>
<td width=\"40\">&nbsp;</td>
<td align=\"\" valign=\"top\" width=\"300\">
<br>
<h3>Изменение параметров:</h3>
<hr>
<form action=\"admin.php?conf=\" method=\"post\">Техн. настройки:<br><br>
<table border=0 style=\"border: 0px solid;\"><tr><td>
<input style=\"width: 200px;\" name=fn type=text value=\"$filename\" class=contact_form>&nbsp;&nbsp;Файл с базой<br><br>
<input style=\"width: 200px;\" name=u_pass type=text value=\"$user_pass\" class=contact_form>&nbsp;&nbsp;Пароль<br><br>Оформление:<Br><br>
<input style=\"width: 200px;\" name=hr type=text value=\"$header\" class=contact_form>&nbsp;&nbsp; Верхняя часть<br><br>
<input style=\"width: 200px;\" name=fr type=text value=\"$footer\" class=contact_form>&nbsp;&nbsp;Нижняя часть<br><br>
<input type=hidden name=up value=$user_pass></td><td width=20>&nbsp;</td><td><br><br><br><br><br></td></tr>
</table>
<hr>
<input type=submit name=conf_save value=\"Сохранить изменения\" class=form_button onmouseover=\"this.style.backgroundcolor='#E8E8FF';\" onmouseout=\"this.style.backgroundcolor='#cccccc';\">
<br><br>
</form>

<table width=\"500\" border=\"0\" style=\"border:0\">
";


if (isset($conf_save)):
if (!empty($u_pass) && !empty($fn)):
$fr = str_replace("\\\"","",$fr);$hr = str_replace("\\\"","",$hr);
$fr = str_replace("\\\'","",$fr);$hr = str_replace("\\\'","",$hr);

$str="<?\r\n";
$str.="\$header = \"$hr\";\r\n";
$str.="\$footer = \"$fr\";\r\n";
$str.="\$user_pass = \"$u_pass\";\r\n";
$str.="\$filename = \"$fn\";\r\n";
$str.="?>";
$fr = str_replace("\"","\'",$fr);

$write=fopen("config.inc.php","w") or die("<p class=error>Не могу открыть файл config.inc.php</p>");
flock($write,2);
fputs($write,$str);
flock($write,3);
fclose($write);

echo "
<center>
<table width=\"600\" border=\"0\" bgcolor=#f0f0f0 style=\"border-bottom: 1 solid #c0c0c0;border-top: 0 solid;\">
<tr>
<td width=\"40\">&nbsp;</td>
<td align=\"\" valign=\"top\" width=\"300\">
<br>
<h3>Изменение параметров:</h3>
<hr>
<form action=\"admin.php?conf=\" method=\"post\">Техн. настройки:<br><br>
<table border=0 style=\"border: 0px solid;\"><tr><td>
<input style=\"width: 200px;\" name=fn type=text value=\"$fn\" class=contact_form>&nbsp;&nbsp;Файл с базой<br><br>
<input style=\"width: 200px;\" name=u_pass type=text value=\"$u_pass\" class=contact_form>&nbsp;&nbsp;Пароль<br><br>Оформление:<Br><br>
<input style=\"width: 200px;\" name=hr type=text value=\"$hr\" class=contact_form>&nbsp;&nbsp; Верхняя часть<br><br>
<input style=\"width: 200px;\" name=fr type=text value=\"$fr\" class=contact_form>&nbsp;&nbsp;Нижняя часть<br><br>
<input type=hidden name=up value=$u_pass></td><td width=20>&nbsp;</td><td><br><br><br><br><br></td></tr>
</table>
<hr>
<input type=submit name=conf_save value=\"Сохранить изменения\" class=form_button onmouseover=\"this.style.backgroundcolor='#E8E8FF';\" onmouseout=\"this.style.backgroundcolor='#cccccc';\">
<br><br>
</form>
<table width=\"500\" border=\"0\" style=\"border:0\">

";
else:
echo $conf_view;
endif;
else:
echo $conf_view;
endif;

echo "</table>&nbsp;<br></td>
</tr>
</table><br><br>
";
if (isset($hr)):
echo "
<div style=\"background:#ffffff;width:500px;\">
$hr Вид вашей фразы $fr<br>
</div></center>
";
else:
echo "
<div style=\"background:#ffffff;width:500px;\">
$header Вид вашей фразы $footer<br>
</div></center>
";
endif;

endif;
endif;
}
?>
<p>&nbsp;</p>
</body>
</html>