<?php

$url = 'https://api.rtpay.ir/ipgNext';

$amount = 5000; ///Toman
$callBack = 'http://localhost/Api/verify.php';
$resNum = rand(100,99999);////MUST Be Uniq
$str = $amount.'#'.$callBack .'#'.$resNum;
$secretKey = '*****';////Get from Your RTPAY panel
$sing = hash_hmac('sha256', $str, $secretKey);

$data =[
'amount' => $amount,
'callBack' => $callBack,
'resNum' => $resNum,
'sign' => $sing
];
$apiKey = '************************************************************';////Get from Your RTPAY panel
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $getTokenUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 45,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => ($data),
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "authorization: " . $apiKey,
            "cache-control: no-cache",       
        ),
            )
    );
    $r = curl_exec( $curl );
    $r = json_decode($r,true);	
	if($r['code'] == '200'){		
		$link = $r['data']['tokenUrl'];	
		echo '<a href="'.$link.'" > Click </a>';	
		
	}
