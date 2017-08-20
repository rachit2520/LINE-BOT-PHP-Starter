<?php
require 'vendor/autoload.php';
$proxy = "velodrome.usefixie.com:80";
$proxyauth = "fixie:cE0Sp7eA5dM9Jgi";
$Channel_Access_Token = 'KRrnY2u6LoCMruxgWPt3EjnTUmgStpmhERTg4WBnh07GeEvfvjc76MtNdyS6bUvfKs5lnJ8P01NnYZ5OoJXW+leoaKO/Vd8ENTK8K1k957ekkFCyDjMQH8yz46eL/OlpJ6qEgc4ft/KNERkAo7lwVgdB04t89/1O/w1cDnyilFU=';
$Channel_Secret = '398582946851eea5be12139edf49577b';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			// $url = 'https://api.line.me/v2/bot/message/reply';
			// $data = [
			// 	'replyToken' => $replyToken,
			// 	'messages' => [$messages],
			// ];
			// $post = json_encode($data);
			// $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			// $ch = curl_init($url);
            // curl_setopt($ch, CURLOPT_PROXY, $proxy);
            // curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
			// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			// $result = curl_exec($ch);
			// curl_close($ch);
			// echo $result . "\r\n";

            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $Channel_Secret]);

            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
            $response = $bot->replyMessage($replyToken, $textMessageBuilder);

            echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
		}
	}
}
echo "OK";