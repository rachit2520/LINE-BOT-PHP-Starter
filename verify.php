<?php
$proxy = "velodrome.usefixie.com:80";
$proxyauth = "fixie:cE0Sp7eA5dM9Jgi";
$access_token = 'KRrnY2u6LoCMruxgWPt3EjnTUmgStpmhERTg4WBnh07GeEvfvjc76MtNdyS6bUvfKs5lnJ8P01NnYZ5OoJXW+leoaKO/Vd8ENTK8K1k957ekkFCyDjMQH8yz46eL/OlpJ6qEgc4ft/KNERkAo7lwVgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v2/oauth/verify';

//$url = 'https://www.passinwallet.com';

$headers = array('Content-Type: application/x-www-form-urlencoded');
$data = [
    'access_token' => $access_token
];
$post = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;