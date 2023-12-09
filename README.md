# rtpay
Use RTPAY Bank Portal (Curl PHP example)

# Step ONE
First Step => Need To Create Transaction

for that need to Send Some Param To RTPAY with header authorization = $api -> url :'https://api.rtpay.ir/ipgNext'

param = [
'amount' : 'TOMAN' ->INT,
'callBack' : 'Url' ->Url,
'resNum' : 'String' ->Uinqe,
'sing' : 'hashString'
];

$str = 'amount#callBack#resNum';
sing = hash_hmac('sha256', $str, $secretKey);


# Step TWO
get response array

'code' : 200
'data' : [
            'Amount' => ,
            'finalAmount' => ,
            'resNum' => ,
            'tokenUrl' => ,          
            ];

If Code == 200 Send User to IPG with tokenUrl param
$link = ['data']['tokenUrl'];


# Step THREE
Get the user result of IPG with GET METHODE AND Verify
param are 
$_GET [resNum]
$_GET [Status]
$_GET [Amount]

if Status is OK (Status == OK) Send Param To RTPAY with header authorization = $api -> url :'https://api.rtpay.ir/verify' 
$str = 'amount#resNum';
sing = hash_hmac('sha256', $str, $secretKey);
param = [
'amount' : 'TOMAN' ->INT,
'resNum' : 'String' ->Uinqe,
'sing' : 'hashString'
];


# Last Step
Check the result
if tx is Ok AND verify the response is

 $r = ['code' => '200', 'mes' => 'The transaction was Verify', 'data' => [
                'Amount' => ,
                'finalAmount' => ,
                'resNum' => ,
                'trackNum' => ,
                'cardPay' => ,
                'date' => ,
                'time' => ,
             ]];
             




            

