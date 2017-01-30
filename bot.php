<?php
$access_token = 'omDVoUcZhQUaJ9yvbNc0Z4XMGVz6n6KPx0rAosG7DEPQMr9NPgZ67M1QYGDeYzU4lBux+IBkb5NxzUztcK4OW3y6/8177cuivSaPOnpbhbyhhQzCZeab0I97nZtre5t9n00sU+DjQALJSqufPDyfiAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
