
<?php
 
// Configuración del bot de Telegram
// Define el token del bot y construye la URL base del API de Telegram
$token = '8715259740:AAH1S2Sb4wZdTVpdkJP-l6gUS2Rftz-z18g';
$website = 'https://api.telegram.org/bot'.$token;
 
// Obtiene los datos del webhook enviados por Telegram
$input = file_get_contents('php://input');
$update = json_decode($input, true);
 
$chatId = $update['message']['chat']['id'];
// Extrae la información del mensaje recibido
$message = $update['message']['text'];
 
// Determina la respuesta según el mensaje recibido
// Utiliza un switch para manejar diferentes comandos y consultas
switch ($message) {
    case '/start':
        $response = "¡Hola! Soy un bot de Telegram para la Semana 3 de Automatización. ¿En qué puedo ayudarte?";
        break;
    case '¿Que hora es?':
        $response = "La hora actual es: " . date('H:i:s');
        break;
    case '¿Que día es?':
        $response = "El día de hoy es: " . date('d/m/Y');
        break;
    case 'Say my name':
        $response = "Heisenberg";
        break;
    default:
        $response = "Lo siento, no entiendo ese comando. Escribe /help para ver los comandos disponibles.";
}
 
// Envía la respuesta de vuelta al usuario mediante el API de Telegram
// Construye la solicitud al endpoint sendMessage y envía el mensaje
$url = "$website/sendMessage";
$data = [ 
    "chat_id" => $chatId,
    "text" => $response
];
file_get_contents($url . "?" . http_build_query($data));
 
?>
