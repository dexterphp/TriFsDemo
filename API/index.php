<?php include 'api.php'; ?>

<form method="post">
MSISDN:<sup>0038631505037</sup> <input type="text" name="msisdn" value="<?=$msisdn?>">
<input type="submit" value="Check">
</form>


<div style="margin-top: 50px;width:100%;border:1px dashed grey;font-family: consolas;font-size: 12px;">

function reservationAPI($params){<br />
	   &nbsp;&nbsp;&nbsp;&nbsp;$url = 'http://devel.e-resitve.si/3fs/functions/number_handler.php';<br />
	<br />
	   &nbsp;&nbsp;&nbsp;&nbsp;$security_params = array('api' => urlencode('1'),<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 'client_secret' => urlencode('5;4Sn741ch!e@2SMl4=@M5->>(_o0T'), // 5;4Sn741ch!e@2SMl4=@M5->>(_o0T<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 'code' => urlencode('T6x/gSeXiMa+zjb')); //T6x/gSeXiMa+zjb<br />
	<br />
	   &nbsp;&nbsp;&nbsp;&nbsp;$all_data = array_merge($security_params,$params);<br />
<br />
	   &nbsp;&nbsp;&nbsp;&nbsp;//open connection<br />
    &nbsp;&nbsp;&nbsp;&nbsp;$ch = curl_init();<br />
    &nbsp;&nbsp;&nbsp;&nbsp;curl_setopt($ch,CURLOPT_URL, $url);<br />
    &nbsp;&nbsp;&nbsp;&nbsp;curl_setopt($ch,CURLOPT_HEADER, false);<br />
    &nbsp;&nbsp;&nbsp;&nbsp;curl_setopt($ch,CURLOPT_POST, true);<br />
    &nbsp;&nbsp;&nbsp;&nbsp;curl_setopt($ch,CURLOPT_POSTFIELDS, $all_data);<br />
    &nbsp;&nbsp;&nbsp;&nbsp;curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);<br />
	<br />
	   &nbsp;&nbsp;&nbsp;&nbsp;//execute post<br />
    &nbsp;&nbsp;&nbsp;&nbsp;$result = curl_exec($ch);<br />
 <br />
    &nbsp;&nbsp;&nbsp;&nbsp;$formated_nr = json_decode($result,true);<br />
    &nbsp;&nbsp;&nbsp;&nbsp;echo "< h1>".$formated_nr['msg']."< /h1>";<br />
	<br />
    &nbsp;&nbsp;&nbsp;&nbsp;//close connection<br />
    &nbsp;&nbsp;&nbsp;&nbsp;curl_close($ch);<br />
}

<br /><br />
//CALL<br />
reservationAPI(array('action'=>'formatMobileNumber',
																					'm_num'=>'0038631505037'));
</div>