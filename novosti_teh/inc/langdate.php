<?php
////////////
// Config
$langdateweekdays = array("Неділя","Понеділок","Вівторок","Середа","Четвер","П'ятниця","Субота");
$langdateshortweekdays = array("не","пн","вт","ср","чт","пт","сб");
$langdatemonths = array("січня","лютого","березня","квітня","травня","червня","липня","серпня","вересня","жовтня","листопада","грудня");
$langdateshortmonths = array("січня","лютого","березня","квітня","травня","червня","липня","серпня","вересня","жовтня","листопада","грудня");

////////////
// Set config to date safe values
foreach ($langdateweekdays as $langdatename => $langdatevalue)
  $langdateweekdays[$langdatename] = preg_replace("/./", "\\\\\\0", $langdatevalue);
foreach ($langdateshortweekdays as $langdatename => $langdatevalue)
  $langdateshortweekdays[$langdatename] = preg_replace("/./", "\\\\\\0", $langdatevalue);
foreach ($langdatemonths as $langdatename => $langdatevalue)
  $langdatemonths[$langdatename] = preg_replace("/./", "\\\\\\0", $langdatevalue);
foreach ($langdateshortmonths as $langdatename => $langdatevalue)
  $langdateshortmonths[$langdatename] = preg_replace("/./", "\\\\\\0", $langdatevalue);

////////////
// Declare the function
function langdate($langdateformat, $langdatetimestamp){
  global $langdateshortweekdays, $langdatemonths, $langdateweekdays, $langdateshortmonths;
  $langdateformat = preg_replace("/(?<!\\\\)D/", $langdateshortweekdays[date("w", $langdatetimestamp)], $langdateformat);
  $langdateformat = preg_replace("/(?<!\\\\)F/", $langdatemonths[date("n", $langdatetimestamp) - 1], $langdateformat);
  $langdateformat = preg_replace("/(?<!\\\\)l/", $langdateweekdays[date("w", $langdatetimestamp)], $langdateformat);
  $langdateformat = preg_replace("/(?<!\\\\)M/", $langdateshortmonths[date("n", $langdatetimestamp) - 1], $langdateformat);

  return date($langdateformat, $langdatetimestamp);
}
?>