<?php
$botToken = 'BOT_TOKEN';
$telegram_host="https://api.telegram.org/bot".$botToken;
$chat_id=[CHAT_ID];
unset($argv[0]);

$notificationtype = isset($argv[1]) ? $argv[1] : 'none' ;
$servicedesc = isset($argv[2]) ? $argv[2] : 'none' ;
$hostalias = isset($argv[3]) ? $argv[3] : 'none' ;
$hostaddress = isset($argv[4]) ? $argv[4] : 'none' ;
$servicestate = isset($argv[5]) ? $argv[5] : 'none' ;
$longdatetime = isset($argv[6]) ? $argv[6] : 'none' ;
$serviceoutput = isset($argv[7]) ? $argv[7] : 'none' ;

$text = '*Services - '.$notificationtype.'*' . PHP_EOL .
		'Host: ' . $hostalias . PHP_EOL .
		'ip address: ' . $hostaddress . PHP_EOL .
		'Date: ' . $longdatetime . PHP_EOL .
		'Service States: ' . $servicestate . PHP_EOL .
		'Desc: ' . $servicedesc . PHP_EOL .
		'Output: *' . $serviceoutput . '*' . PHP_EOL;

$params=[
    'chat_id'=>$chat_id,
    'text'=>$text,
    'parse_mode'=>'HTML',
];
@file_get_contents($telegram_host.'/sendMessage?'.http_build_query($params));
exit();
?>