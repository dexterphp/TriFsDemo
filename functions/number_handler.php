<?php
if (isset($_POST['api']) && !empty($_POST['api']) && $_POST['api'] == 1) {
    if (isset($_POST['client_secret']) && !empty($_POST['client_secret']) &&
        $_POST['client_secret'] == '5%3B4Sn741ch%21e%402SMl4%3D%40M5-%3E%3E%28_o0T' &&
        isset($_POST['code']) && !empty($_POST['code']) && $_POST['code'] == 'T6x%2FgSeXiMa%2Bzjb') {
        //OK
        GOTO API;
    } else {
        $error['msg'] = 'Not allowed !';
        $error['output'] = 'error';

        echo json_encode($error);
        exit();
    }
}

if (!(isset($_POST['action']) && !empty($_POST['action']))) {
    exit();
}

API:

$error = array();

if ($_POST['action'] == 'formatMobileNumber') {

    if (isset($_POST['m_num']) && !empty($_POST['m_num'])) {
        // Remove whitespacer. trim can be used too
        $mobile_number = str_replace(' ', '', $_POST['m_num']);
    } else {
        exit();
    }

    if (strlen($mobile_number) != 13) {
        exit();
    }

    // Must be numeric value
    (is_numeric($mobile_number) ? $mobile_number : $error[] = 'mobile number must be numeric');

    // Validating only for SLOVENIA
    (substr($mobile_number, 0, 5) == '00386' ? $mobile_number : $error[] = 'mobile number must contain 
																																																																												country prefix 00 386. It\'s 
																																																																												only available in Slovenia!');
    //If no errors process mobile number
    if (sizeof($error) == 0) {

        include 'numberBL.php';

        $init_phone_checker = new \ThirdFrameStudios\phoneChecker\PhoneNumberChecker();

        $ok['msg'] = $init_phone_checker->convertNumber(substr($mobile_number, 5, 13));
        $ok['output'] = 'ok';

        echo json_encode($ok);
    } else {

        $error['msg'] = $error;
        $error['output'] = 'error';

        echo json_encode($error);
    }

    exit();
}
