<?php 

namespace ThirdFrameStudios\phoneCheckerAPI;

function reservationAPI($params)
{
    $url = 'http://devel.e-resitve.si/3fs/functions/number_handler.php';

    $security_params = array(
    'api' => urlencode('1'),
    'client_secret' => urlencode('5;4Sn741ch!e@2SMl4=@M5->>(_o0T'), // 5;4Sn741ch!e@2SMl4=@M5->>(_o0T
    'code' => urlencode('T6x/gSeXiMa+zjb')); //T6x/gSeXiMa+zjb

    $all_data = array_merge($security_params, $params);

    //open connection
    $chinit = curl_init();
    curl_setopt($chinit, CURLOPT_URL, $url);
    curl_setopt($chinit, CURLOPT_HEADER, false);
    curl_setopt($chinit, CURLOPT_POST, true);
    curl_setopt($chinit, CURLOPT_POSTFIELDS, $all_data);
    curl_setopt($chinit, CURLOPT_RETURNTRANSFER, 1);

    //execute post
    $result = curl_exec($chinit);

    $formated_nr = json_decode($result, true);
    echo "<hr /><h1>".$formated_nr['msg']."</h1><hr />";

    //close connection
    curl_close($chinit);
}

$msisdn = '';
if (isset($_GET['msisdn']) && !empty($_GET['msisdn']) && strlen($_GET['msisdn']) == 13) {
    $msisdn = $_GET['msisdn'];
}
if (isset($_POST['msisdn']) && !empty($_POST['msisdn']) && strlen($_POST['msisdn']) == 13) {
    $msisdn = $_POST['msisdn'];
}

if (!empty($msisdn)) {
    reservationAPI(array('action'=>'formatMobileNumber','m_num'=>$msisdn));
}
