<?php
$access_token = 'KRrnY2u6LoCMruxgWPt3EjnTUmgStpmhERTg4WBnh07GeEvfvjc76MtNdyS6bUvfKs5lnJ8P01NnYZ5OoJXW+leoaKO/Vd8ENTK8K1k957ekkFCyDjMQH8yz46eL/OlpJ6qEgc4ft/KNERkAo7lwVgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;