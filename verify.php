<?php

if(!isset($_GET['resNum'],$_GET['Status'])){
	/////Param Not recive
	die();
	
}


$status = $_GET['Status'];

if( $status == 'OK'){
	//////OK	
	$resNum = $_GET['resNum'];
	$Amount = $_GET['Amount'];
	$getTokenUrl = 'https://api.rtpay.ir/verify';
	$str = $Amount.'#'.$resNum;
	$secretKey = '*********';
	$sing = hash_hmac('sha256', $str, $secretKey);

	$data =[
	'resNum' => $resNum,
	'sign' => $sing,
	'amount' => $Amount,
	];
	$apiKey = '***********************************************';
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
		///Is Verify AND your turn
	}
	
}

