<?php
echo 'OK';

$token = '8715259740:AAH1S2Sb4wZdTVpdkJP-l6gUS2Rftz-z18g';
$website = 'https://api.telegram.org/bot'.$token;

$input = file_get_contents('php://input');
$update = json_decode($input, true);

$chatId = $update['message']['chat']['id'];
$message = $update['message']['text'];

switch ($message) {
    case '/start':
        $response = "¡Hola! Soy tu bot de Telegram. ¿En qué puedo ayudarte?";
        break;
    case '/help':
        $response = "Puedes usar los siguientes comandos:\n/start - Iniciar el bot\n/help - Mostrar esta ayuda";
        break;
    default:
        $response = "Lo siento, no entiendo ese comando. Escribe /help para ver los comandos disponibles.";
}

$url = "$website/sendMessage";
$data = [ 
    "chat_id" => $chatId,
    "text" => $response
];
file_get_contents($url . "?" . http_build_query($data));

?>
