<?php
$file = file_get_contents('https://www.islamicfinder.org/prayer-times/?cityGeoId=1261481&calculationMethod=3&juristicMethod=1&hijriDateAdjustment=0&fajrAngle=18.0&ishaAngle=18.0&autoLocationSettings=true&dhuharTimeAfterZawal=1&maghribTimeAfterSunset=1&dayLightAdjustment=0&startDate=&endDate=&language=en');

$shalat = json_decode(json_encode((array)simplexml_load_string($file)),1);

echo "<table class=prayer-times border=0>";
echo "<tr><td colspan=2>".$shalat['hijri'];

echo "<tr><td>Fajr <td>".date("g:i a", strtotime("$shalat[fajr] am"));


$dhuhr = date("H", strtotime($shalat['dhuhr']));

if($dhuhr=11) {
echo "<tr><td>Sunrise <td>".date("g:i a", strtotime("$shalat[dhuhr] am"));	
}
if($dhuhr=12) {
echo "<tr><td>Dhuhr <td>".date("g:i a", strtotime("$shalat[dhuhr] pm"));	
}

echo "<tr><td>Ashr <td>".date("g:i a", strtotime("$shalat[asr] pm"));
echo "<tr><td>Maghrib <td>".date("g:i a", strtotime("$shalat[maghrib] pm"));
echo "<tr><td>Isha <td>".date("g:i a", strtotime("$shalat[isha] pm"));
echo "</table>";

?>