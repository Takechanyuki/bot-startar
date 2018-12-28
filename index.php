<?php

require_once __DIR__ . ':/app/.heroku/php/lib/php';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(getenv
('CHANNEL_ACCESS_TOKEN'));

$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => getnev(
  'CHANNEL_SECRET')]);

$signature = $_SERVER['HTTP_' . \LINE\LINEBot\Constant\HTTPHeader
::LINE_SIGNATURE];

$events = $bot->parseEventRequest(file_get_contents('php://input'),
$signature);

foreach ($events as $event){
  $bot->replyText($event->getReplyToken(), 'TextMessage');
}

?>
