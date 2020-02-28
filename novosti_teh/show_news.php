<?PHP

error_reporting (E_ALL ^ E_NOTICE);

$cutepath =  __FILE__;
$cutepath = preg_replace( "'\\\show_news\.php'", "", $cutepath);
$cutepath = preg_replace( "'/show_news\.php'", "", $cutepath);

if ( $_GET['cutepath'] != NULL ) { echo "Доступ отклонен!"; } else {

require_once("$cutepath/inc/functions.inc.php");
require_once("$cutepath/data/config.php");

//----------------------------------
// Check if we are included by PATH
//----------------------------------
if($HTTP_SERVER_VARS["HTTP_ACCEPT"] or $HTTP_SERVER_VARS["HTTP_ACCEPT_CHARSET"] or $HTTP_SERVER_VARS["HTTP_ACCEPT_ENCODING"] or $HTTP_SERVER_VARS["HTTP_CONNECTION"]){ /* do nothing */ }
elseif(eregi("show_news.php", $PHP_SELF)){
die("<h4>CuteNews обнаружил, что Вы подключаете show_news.php, используя URL файла.<br>Вы должны подключать его, используя ПУТЬ к show_news.php</h4><br>Например:<br>
так <font color=red>НЕПРАВИЛЬНО</font> :&nbsp;&nbsp; &lt;?PHP include(\"http://yoursite.com/cutenews/show_news.php\"); ?&gt;<br>
так <font color=green>ПРАВИЛЬНО</font>:&nbsp;&nbsp; &lt;?PHP include(\"cutenews/show_news.php\"); ?&gt;<br>
<br><BR>// <font size=2>Если вы считаете, что это сообщение не должно показываться, откройте файл show_news.php и удалите его!</font>");
}
//----------------------------------
// End of the check
//----------------------------------

if(!isset($subaction) or $subaction == ""){ $subaction = $POST["subaction"]; }

if(!isset($template) or $template == "" or strtolower($template) == "default"){ require_once("$cutepath/data/Default.tpl"); }
else{
if(file_exists("$cutepath/data/${template}.tpl")){ require_once("$cutepath/data/${template}.tpl"); }
else{ die("Ошибка!<br>Шаблон <b>".htmlspecialchars($template)."</b> не существует! Проверьте правильность написания!"); }
}

// Prepare requested categories
if(eregi("[a-z]", $category)){
die("<b><b>Ошибка!</b><br>CuteNews обнаружил, что Вы используете \$category = \"$category\"; но Вы должны называть их в соответствии с <b>ID</b>, а не по имени!<br>Например:<br><blockquote>&lt;?PHP<br>\$category = \"1\";<br>include(\"path/to/show_news.php\");<br>?&gt;</blockquote>");
}
$category = preg_replace("/ /", "", $category);
$tmp_cats_arr = explode(",", $category);
foreach($tmp_cats_arr as $key=>$value){
    if($value != ""){ $requested_cats[$value] = TRUE; }
}

if($archive == ""){
    $news_file = "$cutepath/data/news.txt";
    $comm_file = "$cutepath/data/comments.txt";
}else{
    $news_file = "$cutepath/data/archives/$archive.news.arch";
    $comm_file = "$cutepath/data/archives/$archive.comments.arch";
}

$allow_add_comment         = FALSE;
$allow_full_story          = FALSE;
$allow_active_news         = FALSE;
$allow_comments            = FALSE;

//<<<------------ Detarime what user want to do
if( $CN_HALT != TRUE and $static != TRUE and ($subaction == "showcomments" or $subaction == "showfull" or $subaction == "addcomment") and ((!isset($category) or $category == "") or $requested_cats[$ucat] == TRUE) ){
    if($subaction == "addcomment"){ $allow_add_comment    = TRUE; $allow_comments = TRUE; }
    if($subaction == "showcomments") $allow_comments = TRUE;
    if(($subaction == "showcomments" or $allow_comments == TRUE) and $config_show_full_with_comments == "yes") $allow_full_story = TRUE;
    if($subaction == "showfull") $allow_full_story = TRUE;
    if($subaction == "showfull" and $config_show_comments_with_full == "yes") $allow_comments = TRUE;

}
else{
    if($config_reverse_active == "yes"){ $reverse = TRUE; }
    $allow_active_news = TRUE;
}
//----------->>> Detarime what user want to do

require("$cutepath/inc/shows.inc.php");
    if($_GET['archive'] and $_GET['archive'] != ''){ $archive = $_GET['archive']; } // stupid fix ?
unset($static, $template, $requested_cats, $category, $catid, $cat,$reverse, $in_use, $archives_arr, $number, $no_prev, $no_next, $i, $showed, $prev, $used_archives);
}
?>
<!-- Powered by CuteNews | http://cutephp.com/ -->