<?php
echo 'OK';

$token = '8715259740:AAH1S2Sb4wZdTVpdkJP-l6gUS2Rftz-z18g';
$website = 'https://api.telegram.org/bot'.$token;

$input = file_get_contents('php://input');
$update = json_decode($input, true);

$chatId = $update['message']['chat']['id'];
$message = $update['message']['text'];

$url = "$website/sendMessage";
$data = [ 
    "chat_id" => $chatId,
    "text" => "Recibí: " . $message
];
file_get_contents($url . "?" . http_build_query($data));

?>