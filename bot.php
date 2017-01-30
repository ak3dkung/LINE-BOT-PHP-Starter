<?php
$access_token = 'omDVoUcZhQUaJ9yvbNc0Z4XMGVz6n6KPx0rAosG7DEPQMr9NPgZ67M1QYGDeYzU4lBux+IBkb5NxzUztcK4OW3y6/8177cuivSaPOnpbhbyhhQzCZeab0I97nZtre5t9n00sU+DjQALJSqufPDyfiAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);

foreach ($events['events'] as $event) {
	$replyToken = $event['replyToken'];	
	$messages = "ทดสอบ";
	
	// Make a POST Request to Messaging API to reply to sender
	$url = 'https://api.line.me/v2/bot/message/reply';
	$data = [
		'replyToken' => $replyToken,
		'messages' => [$messages],
	];
	$post = json_encode($data);
	$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);

	echo $result . "\r\n";
}

echo "OK";
?>
