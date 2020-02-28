<?php
error_reporting (E_ALL ^ E_NOTICE);
header("Content-type: text/html; charset=windows-1251");
require_once("./inc/functions.inc.php");
if ( $_GET['cutepath'] != NULL ) { echo "Доступ отклонен!"; } else {

//#################

$PHP_SELF                    = "index.php";
$cutepath                    = ".";
$config_path_image_upload    = "./data/upimages";

$config_use_cookies          = TRUE;  // Use Cookies When Checking Authorization
$config_use_sessions         = FALSE;  // Use Sessions When Checking Authorization
$config_check_referer	     = FALSE; // Set to TRUE for more security

//#################

// Start plugin hack
include('./inc/plugins.php');
LoadActivePlugins();
// End plugin hack

$Timer = new microTimer;
$Timer->start();

// Check if CuteNews is not installed
$all_users_db = file("./data/users.db.php");
$check_users = $all_users_db;
$check_users[1] = trim($check_users[1]);
$check_users[2] = trim($check_users[2]);
if((!$check_users[2] or $check_users[2] == "") and (!$check_users[1] or $check_users[1] == "")){
    if(!file_exists("./inc/install.mdu")){ die('<h2>Ошибка!</h2>CuteNews обнаружил, что в системе не зарегистрировано ни одного пользователя и Вы пытаетесь запустить установочный модуль.<br />Однако модуль (<b>./inc/install.mdu</b>) не может быть загружен! Попытайтесь обновоить модуль на сервере.'); }
    require("./inc/install.mdu");
    die();
}

require_once("./data/config.php");
if(isset($config_skin) and $config_skin != "" and file_exists("./skins/${config_skin}.skin.php")){
    require_once("./skins/${config_skin}.skin.php");
}else{
    $using_safe_skin = true;
    require_once("./skins/default.skin.php");
}

b64dck();
if($config_use_sessions){
@session_start();
@header("Cache-control: private");
}

if($action == "logout")
{
    setcookie("md5_password","");
    setcookie("username","");
    setcookie("login_referer","");

    if($config_use_sessions){
        @session_destroy();
        @session_unset();
        setcookie(session_name(),"");
    }
    msg("info", "Выход", "Теперь вы вышли, <a href=\"index.php\">войти снова</a><br><br>");
}


$is_loged_in = FALSE;
$cookie_logged = FALSE;
$session_logged = FALSE;
$temp_arr = explode("?", $HTTP_REFERER);
$HTTP_REFERER = $temp_arr[0];
if(substr($HTTP_REFERER, -1) == "/"){ $HTTP_REFERER.= "index.php"; }

// Check if The User is Identified

if($config_use_cookies == TRUE){
/* Login Authorization using COOKIES */

if(isset($username))
{
    if(isset($HTTP_COOKIE_VARS["md5_password"])){ $cmd5_password = $HTTP_COOKIE_VARS["md5_password"]; }
    elseif(isset($_COOKIE["md5_password"])){ $cmd5_password = $_COOKIE["md5_password"]; }
    else{ $cmd5_password = md5($password); }

    if(check_login($username, $cmd5_password))
    {
        $cookie_logged = TRUE;
        setcookie("lastusername", $username, time()+1012324305);
        setcookie("username", $username);
        setcookie("md5_password", $cmd5_password);

    }else{
        $result = "<font color=red>Неправильное имя пользователя или пароль!</font>";
        $cookie_logged = FALSE;
   }
}
/* END Login Authorization using COOKIES */
}

if($config_use_sessions == TRUE){
/* Login Authorization using SESSIONS */
    if(isset($HTTP_X_FORWARDED_FOR)){ $ip = $HTTP_X_FORWARDED_FOR; }
    elseif(isset($HTTP_CLIENT_IP))    { $ip = $HTTP_CLIENT_IP; }
    if($ip == "")                    { $ip = $REMOTE_ADDR; }
    if($ip == "")                    { $ip = "not detected";}

if($action == "dologin")
{
    $md5_password = md5($password);
    if(check_login($username, $md5_password)){
        $session_logged = TRUE;

        @session_register('username');
        @session_register('md5_password');
        @session_register('ip');
        @session_register('login_referer');

        $_SESSION['username']        = "$username";
        $_SESSION['md5_password']    = "$md5_password";
        $_SESSION['ip']              = "$ip";
        $_SESSION['login_referer']   = "$HTTP_REFERER";

    }else{
        $result = "<font color=red>Неправильное имя пользователя и/или пароль!</font>";
        $session_logged = FALSE;
    }
}elseif(isset($_SESSION['username'])){ // Check the if member is using valid username/password
    if(check_login($_SESSION['username'], $_SESSION['md5_password'])){
        if($_SESSION['ip'] != $ip){ $session_logged = FALSE; $result = "The IP in the session doesn not match with your IP"; }
        else{ $session_logged = TRUE; }
    }else{
        $result = "<font color=red>Неправильное имя пользователя и/или пароль!</font>";
        $session_logged = FALSE;
    }
}

if(!$username){ $username = $_SESSION['username']; }
/* END Login Authorization using SESSIONS */
}

###########################

if($session_logged == TRUE or $cookie_logged == TRUE){
    if($action == 'dologin'){
    //-------------------------------------------
    // Modify the Last Login Date of the user
    //-------------------------------------------
    $old_users_db    = $all_users_db;
    $modified_users = fopen("./data/users.db.php", "w");
    foreach($old_users_db as $old_users_db_line){
       $old_users_db_arr = explode("|", $old_users_db_line);
        if($member_db[0] != $old_users_db_arr[0]){
            fwrite($modified_users, "$old_users_db_line");
        }else{
            fwrite($modified_users, "$old_users_db_arr[0]|$old_users_db_arr[1]|$old_users_db_arr[2]|$old_users_db_arr[3]|$old_users_db_arr[4]|$old_users_db_arr[5]|$old_users_db_arr[6]|$old_users_db_arr[7]|$old_users_db_arr[8]|".time()."||\n");
        }
    }
    fclose($modified_users);
    }

    $is_loged_in = TRUE;
}

###########################

// If User is Not Logged In, Display The Login Page
if($is_loged_in == FALSE)
{
    if($config_use_sessions){
        @session_destroy();
        @session_unset();
    }
    setcookie("username","");
    setcookie("password","");
    setcookie("md5_password","");
    setcookie("login_referer","");
    echoheader("user","Зарегистрированным пользователям:");

    echo "
    <table border=0 cellspacing=0 cellpadding=1>
     <form  name=login action=\"$PHP_SELF\" method=post>
      <tr>
       <td width=80>Имя: </td>
       <td><input tabindex=1 type=text name=username value='$lastusername' style=\"width:134\"></td>
      </tr>
      <tr>
       <td>Пароль: </td>
       <td><input type=password name=password style=\"width:134\"></td>
      </tr>
      <tr>
       <td></td>
       <td ><input accesskey=\"s\" type=submit style=\"width:134; background-color: #F3F3F3;\" value='      Вход...      '></td>
      </tr>
      <tr>
       <td align=center colspan=3>$result</td>
      </tr>
     <input type=hidden name=action value=dologin>
     </form>
    </table>";

   echofooter();
}
elseif($is_loged_in == TRUE)
{

//----------------------------------
// Check Referer
//----------------------------------
if($config_check_referer == TRUE){
    $self = $_SERVER["SCRIPT_NAME"];
    if($self == ""){ $self = $_SERVER["REDIRECT_URL"]; }
    if($self == ""){ $self = "index.php"; }

    if(!eregi("$self",$HTTP_REFERER) and $HTTP_REFERER != ""){
        die("<h2 style=\"color: #000000; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12pt;\">Извините, но доступ к системе отклонен!</h2><span style=\"color: #000000; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8pt;\">Попробуйте сначала <a href=\"?action=logout\" style=\"color: #446488; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8pt;\">выйти</a> из системы и после снова зайти!<br>Отключите проверку безопасности, измените \$config_check_referer в файле index.php на значение FALSE");
    }
}
// ********************************************************************************
// Include System Module
// ********************************************************************************
if($HTTP_SERVER_VARS['QUERY_STRING'] == "debug"){ debug(); }

							//name of mod   //access
    $system_modules = array('addnews'      => 'user',
                            'editnews'     => 'user',
                            'main'         => 'user',
                            'options'      => 'user',
                            'images'       => 'user',
                            'editusers'    => 'admin',
                            'editcomments' => 'admin',
                            'tools'        => 'admin',
                            'ipban'        => 'admin',
                            'about'        => 'user',
                            'preview'      => 'user',
                            'categories'   => 'admin',
                            'massactions'  => 'user',
                            'help'         => 'user',
                            'snr'          => 'admin',
                            'xfields'      => 'any',
							'debug'		   => 'admin',
                            );


    if($mod == ""){ require("./inc/main.mdu"); }
    elseif( $system_modules[$mod] )
    {
        if($system_modules[$mod] == "user"){ require("./inc/". $mod . ".mdu"); }
        elseif($system_modules[$mod] == "admin" and $member_db[1] == 1){ require("./inc/". $mod . ".mdu"); }
        elseif($system_modules[$mod] == "admin" and $member_db[1] != 1){ msg("error", "Доступ отклонен", "Только администратор имеет доступ к этому модулю!"); exit;}
        elseif($system_modules[$mod] == "any") {require("./inc/{$mod}.mdu");}
        else{ die("Доступ к модулю имеют <b>user</b> или <b>admin</b>."); }
    }
    else{ die("$mod неверный модуль!"); }
}
echo"
<!-- Страница сгенерирована за ".$Timer->stop()." сек. -->";
}
?>