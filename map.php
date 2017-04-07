<?php

//v2.1: Properly decodes JSON using PHP's inbuilt functions
//v2: now returns time since I last checked in to Google Latitude.

$info = file_get_contents("http://www.google.com/latitude/apps/badge/api?user=bingoppp&type=json");

$latitude=json_decode($info,true);
$place=$latitude["features"]["0"]["properties"]["reverseGeocode"];
$timestamp=$latitude["features"]["0"]["properties"]["timeStamp"];

echo "I was last seen in: $place (".getRelativeTime($timestamp).")";

function plural($num) {
    if ($num != 1)
        return "s";
}

function getRelativeTime($date) {
    $diff = time() - $date;
    if ($diff<60)
        return $diff . " second" . plural($diff) . " ago";
    $diff = round($diff/60);
    if ($diff<60)
        return $diff . " minute" . plural($diff) . " ago";
    $diff = round($diff/60);
    if ($diff<24)
        return $diff . " hour" . plural($diff) . " ago";
    $diff = round($diff/24);
    if ($diff<7)
        return $diff . " day" . plural($diff) . " ago";
    $diff = round($diff/7);
    if ($diff<4)
        return $diff . " week" . plural($diff) . " ago";
    return "on " . date("F j, Y", strtotime($date));
}
?>