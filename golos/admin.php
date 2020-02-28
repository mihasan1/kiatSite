<?
// EPoll 3.1
// Скрипт для создания неограниченого количества опросов посетителей
//
// Автор скрипта: Egorix (http://egorix.net.ru)
//
include("conf.php");
include("func.php");
check($polldata,$pollcfg,$passfile);
$do=$_GET['do'];
if (isset($_POST['pass'])){
$_GET['pass']=md5($_POST['pass']);
}
if (!login($_GET['pass'],$passfile)){
$pc=false;
if (isset($_POST['pass'])){
$error="Ви ввели невірний пароль";
}else{
$error="Вам необхідно авторизуватися";
}
}else{
$pc=true;
if (isset($_POST['pass'])){
$error="Ви вдало увійшли";
}
}
if ($pc){
// ~~~~~~~~~START~~~~~~~~~~~
// STATISTIC
if($do=="stat"){
if(isset($_GET['name'])){
$dat=file($pollcfg);
for($i=0;$i<sizeof($dat);$i++){
$data=explode("|::|",$dat[$i]);
if($data[0]==$_GET['name']){
$find=true;
$n=$i;
break;
}
}
if($find){
$stat=true;
}else{
$error="Опитування не знайдено!";
$stat=false;
}
}
}
// ADD
if($do=="add" && isset($_GET['name'])){
//Check1
if($_GET['name']!="" && $_GET['question']!="" && $_GET['num']!=""){
if(is_numeric($_GET['num'])){
$dat=file($polldata);
for($i=0;$i<sizeof($dat);$i++){
$data=explode("|::|",$dat[$i]);
if($data[0]==$_GET['name']){
$ex=true;
break;
}
}
if(!$ex){
$addp=1;
$error="Перший крок успішно пройдений!";
}else{
$addp=0;
$error="Опитування з ім'ям <b>".$_GET['name']."</b> вже існує! Виберіть інше ім'я!";
}
}else{
$addp=0;
$error="Задайте правильне значення кількості варіантів відповіді!";
}
}else{
$addp=0;
$error="Всі форми повинні бути заповнені!";
}
if(isset($_GET['a1'])){
//Check2
for($i=0;$i<$_GET['num'];$i++){
$il=$i+1;
if($_GET['a'.$il]==""){
$non=true;
}
}
if(!$non){
//add
$_GET['question']=stripslashes($_GET['question']);
$_GET['question']=ereg_replace("\"","&quot;",$_GET['question']);
$dat1=file($polldata);
$dat2=file($pollcfg);
$str1=$_GET['name']."|::|";
$str2=$_GET['name']."|::|".$_GET['question']."|::|";
for($i=0;$i<$_GET['num'];$i++){
$il=$i+1;
$str1=$str1."0|::|";
$str2=$str2.$_GET['a'.$il]."|::|";
}
$str1=$str1.tdate($datechar)."|::|\n";
$str2=$str2."\n";
$fh1=fopen($polldata,"a");
$fh2=fopen($pollcfg,"a");
$wr1=fwrite($fh1,$str1,strlen($str1));
$wr2=fwrite($fh2,$str2,strlen($str2));
fclose($fh1);
fclose($fh2);
if($wr1 && $wr2){
$addp=2;
$error="Опитування <b>".$_GET['name']."</b> Створене!";
}else{
$addp=0;
$error="Помилка запису у файл!";
}
}else{
$addp="1";
$error="Всі форми повинні бути заповнені!";
}
}
}
// DELETE
if($do=="del" && isset($_GET['name'])){
$dat1=file($polldata);
$dat2=file($pollcfg);
$fh1=fopen($polldata,"w");
$fh2=fopen($pollcfg,"w");
for($i=0;$i<sizeof($dat1);$i++){
$data1=explode("|::|",$dat1[$i]);
if($data1[0]==$_GET['name']){
$ex=true;
$dat1[$i]="";
$dat2[$i]="";
}
$wr1=fwrite($fh1,$dat1[$i],strlen($dat1[$i]));
$wr2=fwrite($fh2,$dat2[$i],strlen($dat2[$i]));
}
fclose($fh1);
fclose($fh2);
if($ex){
$del=true;
$error="Опрос - <b>".$_GET['name']."</b> удалён!";
}else{
$del=false;
$error="Опитування не знайдено!";
}
}
// CHANGE PASSWORD
if($do=="cp" && isset($_GET['npass'])){
$dat[]=file($passfile);
$data=explode("|::|",$dat[0]);
$fh=fopen($passfile,"w");
fclose($fh);
$data[0]=md5($_GET['npass']);
for($i=0;$i<sizeof($data);$i++){
$fh=fopen($passfile,"a");
$string=$data[$i]."|::|";
fwrite($fh,$string,strlen($string));
fclose($fh);
}
$error="Ви змінили свій пароль на \"".$_GET['npass']."\"";
$_GET['pass']=md5($_GET['npass']);
$cpok=true;
}
// ~~~~~~~~~~END~~~~~~~~~~~~
setcookie("epoll_admin_lastvisit",tdate("-"),time()+60*60*24*365);
}
?>
<html>
<head>
<title>EPOLL SYSTEM v3.1 | ADMIN PANEL</title>
<style>
<!--
body{background:#FFFFFF;color:#000000;font-family:verdana;font-size:9pt;}
a:link{color:#0000AA;text-decoration:none;}
a:active{color:red;text-decoration:none;}
a:visited{color:#0000AA;text-decoration:none;}
a:hover{color:red;text-decoration:none;}
.main{color:#000000;font-family:verdana;font-size:9pt;}
.sm{font-size:8pt;}
.error{font-size:8pt;color:red;}
.button{font-family:verdana;font-size:8pt;font-weight:600;width:150;border:#000000 1px Solid;background-color:#C0C0C0;margin-top:3;}
input {border:#000000 1px Solid; background-color:#E9E9E9;font-family:verdana;font-size:8pt;}
-->
</style>
</head>
<body top-margin="0" left-margin="0" right-margin="0">
<table style="margin-top:0;margin-bottom:4;" width="600" bgcolor="#000066" cellpadding="0" cellspacing="0" border="0" align="center"><tr><td>
<table align="center" width="600" cellspacing="1" cellpadding="1" border="0" class="main">
<tr><td bgcolor="#cccccc" align="center" class="main">
<h3 style="margin-top:1;margin-bottom:1;">EPOLL SYSTEM v3.1</h3>
</td></tr>
</table>
</td></tr>
</table>
<table width="600" bgcolor="#000066" cellpadding="0" cellspacing="0" border="0" align="center"><tr><td>
<table align="center" width="600" cellspacing="1" cellpadding="1" border="0" class="main">
<?
if($error!=""){
?>
<tr><td bgcolor="#cccccc" align="center" class="error">
<?
print$error;
?>
</td></tr>
<?
}
if(!$pc){
?>
<tr><td align="center" bgcolor="#d5d5d5">
<form method="post" style="margin-top:5;margin-bottom:5;">
<input type="password" name="pass" style="width:150;"><br>
<input type="submit" value="Войти" class="button">
</form>
</td></tr>
<?
}else{
?>
<tr><td align="center" bgcolor="#d5d5d5" class="sm">
<a href="?pass=<?print$_GET['pass'];?>">Информация</a><br>
<a href="?do=stat&pass=<?print$_GET['pass'];?>">Статистика опитувань</a><br>
<a href="?do=add&pass=<?print$_GET['pass'];?>">Створити нове опитування</a><br>
<a href="?do=del&pass=<?print$_GET['pass'];?>">Видалити опитування</a><br>
<a href="?do=cp&pass=<?print$_GET['pass'];?>">Змінити пароль</a><br>
<a href="?">Вихід</a><br>
</td></tr>
<?
if ($do!="add" && $do!="del" && $do!="stat" && $do!="cp"){
?>
<tr><td align="left" bgcolor="#d5d5d5" class="sm">
<div align="center"><b>Загальна інформація:</b></div>
<div align="left" style="margin-left:25;margin-top:4;margin-bottom:4;">
<?
if(isset($_COOKIE['epoll_admin_lastvisit'])){
print "Ваше последнее посещение: ".$_COOKIE['epoll_admin_lastvisit']."<br><br>";
}
$dat=file($polldata);
$num=count($dat);
print "Усього опитувань: ".$num."<br>";
?>
</div><br>
<div align="center"><b>Право на авторство:</b></div>
<div align="left" style="margin-left:25;margin-top:4;margin-bottom:4;">
Автор скрипта: <b><?print$script_owner;?></b><br>
E-mail: <?print$owner_email;?><br>
ICQ: <?print$owner_icq;?><br>
Сайт: <a href="<?print$owner_website;?>" target="_blank"><?print$owner_website;?></a>
</div><br>
</td></tr>
<?
}if($do=="stat"){
if(!$stat){
?>
<tr><td align="left" bgcolor="#d5d5d5" class="sm">
<div align="center" class="main"><b>Статистика опитувань</b></div>
</td></tr>
<tr><td align="center" bgcolor="#AAAAAA" class="sm">
<table bgcolor="#000066" cellpadding="0" cellspacing="0" border="0" align="center"><tr><td>
<table align="center" width="590" cellspacing="1" cellpadding="1" border="0" class="sm">
<?
$dat=file($pollcfg);
if(sizeof($dat)!=0){
for($i=0;$i<sizeof($dat);$i++){
$data=explode("|::|",$dat[$i]);
print "<tr class=\"sm\"><td align=center width=\"20%\" bgcolor=#d5d5d5><a href=\"?do=stat&pass=".$_GET['pass']."&name=".$data[0]."\" title=\"Дивитися статистику\"><b>".$data[0]."</b></a></td><td align=left width=\"80%\" bgcolor=#d5d5d5>".$data[1]."</td></tr>";
}
}else{
print "<tr class=\"sm\"><td align=center width=\"100%\" bgcolor=#d5d5d5>Ви не створили жодного опитування!</td></tr>";
}
?>
</table>
</td></tr>
</table>
</td></tr>
<?
}else{
?>
<tr><td align="left" bgcolor="#d5d5d5" class="sm">
<div align="center" class="main"><b>Статистика опитувань - <?print$_GET['name'];?></b></div>
<div align="left" style="margin-left:25;margin-top:4;margin-bottom:4;">
<br>
<?
$dat1=file($polldata);
$dat2=file($pollcfg);
$data1=explode("|::|",$dat1[$n]);
$num=0;
for($i=1;$i<sizeof($data1)-2;$i++){
$num=$num+1;
$a1[$i-1]=$data1[$i];
}
$all=0;
for($i=0;$i<$num;$i++){
$all=$all+$a1[$i];
}
$last=$data1[$num+1];
$data2=explode("|::|",$dat2[$n]);
for($i=2;$i<sizeof($data2)-1;$i++){
$a2[$i-2]=$data2[$i];
}
$question=$data2[1];
$question=stripslashes($question);
print "<div align=left><b>Питання:</b> ".$question."</div><br>";
if($all!=0){
for($i=0;$i<$num;$i++){
$apr[$i]=round(($a1[$i]/$all)*100)."%";
if(round(($a1[$i]/$all)*100)==0){
$apr[$i]=round(($a1[$i]/$all)*100,2)."%";
}
}
for($i=0;$i<$num;$i++){
$il=$i+1;
print "<div align=left class=text><u>Варіант відповіді №".$il.":</u> ".$a2[$i]." - <b>".$apr[$i]."</b> ( ".$a1[$i]." )</div>";
}
print "<br><div align=left><b>Всього голосів:</b> ".$all."</div>";
print "<div align=left><b>Останній голос відданий:</b> ".$last."</div><br>";
}else{
print "Ще ніхто не проголосував!";
print "<div align=left>Дата створення опитування: ".$last."</div><br>";
}
?>
<br>
<div align="center"><b><a href="?do=stat&pass=<?print$_GET['pass'];?>"><<< Повернутися назад</a></b></div>
</div><br>
</td></tr>
<?
}}
if($do=="add"){
if($addp==0 || $addp==""){
?>
<tr><td align="left" bgcolor="#d5d5d5" class="sm">
<div align="center"><b>Створення опитування (Крок 1):</b></div>
<div align="left" style="margin-left:25;margin-top:4;margin-bottom:4;">
<form method="get" style="margin-top:5;margin-bottom:5;">
Унікальне ім'я голосування:<br>
(Максимум 10 символів) (Використовуйте тільки латинські літери)<br>
<input type="text" name="name" size="15" maxlength="10"><br>
Питання голосування:<br>
<input type="text" name="question" size="45"><br>
Кількість варіантів відповідей:<br>
(Не більше 99-и) (Рекомендовано: менше 15 штук)<br>
<input type="text" name="num" size="5" maxlength="2"><br>
<input type="hidden" name="pass" value="<?print$_GET['pass'];?>">
<input type="hidden" name="do" value="add">
<input type="submit" value="Далі" class="button">
</form>
</div><br>
</td></tr>
<?
}elseif($addp==1){
?>
<tr><td align="left" bgcolor="#d5d5d5" class="sm">
<div align="center"><b>Створення опитування (Крок 2):</b></div>
<div align="left" style="margin-left:25;margin-top:4;margin-bottom:4;">
<form method="get" style="margin-top:5;margin-bottom:5;">
<?
$_GET['question']=stripslashes($_GET['question']);
$_GET['question']=ereg_replace("\"","&quot;",$_GET['question']);
?>
<b><?print$_GET['name'];?></b> - <?print$_GET['question'];?><br>
<br>
Можливі варіанти відповідей:<br>
<?
for($i=0;$i<$_GET['num'];$i++){
$il=$i+1;
print "<input type=\"text\" name=\"a".$il."\" size=\"45\"><br>";
}
?>
<input type="hidden" name="pass" value="<?print$_GET['pass'];?>">
<input type="hidden" name="do" value="add">
<input type="hidden" name="question" value="<?print$_GET['question'];?>">
<input type="hidden" name="num" value="<?print$_GET['num'];?>">
<input type="hidden" name="name" value="<?print$_GET['name'];?>">
<input type="submit" value="Створити опитування" class="button">
</form>
<br>
<div align="center"><b><a href="?do=add&pass=<?print$_GET['pass'];?>"><<< Повернутися назад</a></b></div>
</div><br>
</td></tr>
<?
}elseif($addp==2){
?>
<tr><td align="left" bgcolor="#d5d5d5" class="sm">
<div align="center"><b><a href="?do=add&pass=<?print$_GET['pass'];?>"><<< Повернутися назад</a></b></div>
</td></tr>
<?
}}
if($do=="del"){
if(!$del){
?>
<tr><td align="left" bgcolor="#d5d5d5" class="sm">
<div align="center" class="main"><b>Удаление опросов</b></div>
</td></tr>
<tr><td align="center" bgcolor="#AAAAAA" class="sm">
<table bgcolor="#000066" cellpadding="0" cellspacing="0" border="0" align="center"><tr><td>
<table align="center" width="590" cellspacing="1" cellpadding="1" border="0" class="sm">
<?
$dat=file($pollcfg);
if(sizeof($dat)!=0){
for($i=0;$i<sizeof($dat);$i++){
$data=explode("|::|",$dat[$i]);
print "<tr class=\"sm\"><td align=center width=\"20%\" bgcolor=#d5d5d5><a href=\"?do=del&pass=".$_GET['pass']."&name=".$data[0]."\" title=\"Видалити це опитування\"><b>".$data[0]."</b></a></td><td align=left width=\"80%\" bgcolor=#d5d5d5>".$data[1]."</td></tr>";
}
}else{
print "<tr class=\"sm\"><td align=center width=\"100%\" bgcolor=#d5d5d5>Ви не створили жодного опитування!</td></tr>";
}
?>
</table>
</td></tr>
</table>
</td></tr>
<?
}else{
?>
<tr><td align="left" bgcolor="#d5d5d5" class="sm">
<div align="center"><b><a href="?do=del&pass=<?print$_GET['pass'];?>"><<< Повернутися назад</a></b></div>
</td></tr>
<?
}}
if($do=="cp"){
if(!$cpok){
if(is_writeable($passfile)){
?>
<tr><td align="left" bgcolor="#d5d5d5" class="sm">
<div align="center"><b>Зміна пароля</b></div>
<div align="left" style="margin-left:25;margin-top:4;margin-bottom:4;">
<form method="get" style="margin-top:5;margin-bottom:5;">
Новий пароль:<br>
<input type="text" name="npass" size="20" value="<?print$ed_name;?>"><br>
<input type="hidden" name="pass" value="<?print$_GET['pass'];?>">
<input type="hidden" name="do" value="cp">
<input type="submit" value="Змінити">
</form>
</div><br>
</td></tr>
<?
}else{
?>
<tr><td align="left" bgcolor="#d5d5d5" class="sm">
<div align="center"><b>Ви не можете змінити пароль (Права доступу до файлу <b><?print$passfile;?></b> не дозволяють запис!)</b>!</div>
</td></tr>
<?
}
}else{
?>
<tr><td align="left" bgcolor="#d5d5d5" class="sm">
<div align="center"><b><a href="?do=cp&pass=<?print$_GET['pass'];?>"><<< Повернутися назад</a></b></div>
</td></tr>
<?
}}

}
?>
</table>
</td></tr>
</table>
<table style="margin-top:4;margin-bottom:0;" width="600" bgcolor="#000066" cellpadding="0" cellspacing="0" border="0" align="center"><tr><td>
<table align="center" width="600" cellspacing="1" cellpadding="1" border="0" class="main">
<tr><td align="center" bgcolor="#cccccc" class="sm"><a href="http://egorix.net.ru" target="_blank">Powered by Egorix</a></td></tr>
</table>
</td></tr>
</table>
</body>
</html>
