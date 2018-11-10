<?php
require_once('./line_class.php');
$channelAccessToken = '7OAXEGKCXcbp2h3CqxMOSZi7dJDcUXwfMSQrIEHwXaIbGQQBxaugsBvshUamKEc/0q4EvJ+uVOKGHnEbspyl4XJXLB06P+2c3U96SFDtRsW54GSm01TYHssubAdfc580hGls9dG6qx7lZ/fUCoFgPAdB04t89/1O/w1cDnyilFU='; //Channel access token
$channelSecret = '763df8066f26b739477921c706fdc585';//Channel secret
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$replyToken = $client->parseEvents()[0]['replyToken'];
$message 	= $client->parseEvents()[0]['message'];
$msg_type = $message['type'];
$botname = "KerangAjaib"; //Nama bot

function send($input, $rt){
    $send = array(
        'replyToken' => $rt,
        'messages' => array(
            array(
                'type' => 'text',					
                'text' => $input
            )
        )
    );
    return($send);
}

function jawabs(){
    $list_jwb = array(
		'Ya',
		'Tidak',
		'Bisa jadi',
		'Mungkin',
		'Tentu tidak',
		'Coba tanya lagi'
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}

if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'apakah') {
        $balas = send(jawabs(), $replyToken);
    } else {}
} else {}

if(isset($balas)){
    $client->replyMessage($balas); 
    $result =  json_encode($balas);
    file_put_contents($botname.'.json',$result);
}
