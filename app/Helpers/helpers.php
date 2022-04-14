<?php

if (! function_exists('sendCodeOTP')){
    function sendCodeOTP(int $code, $phone){
//        https://api.codebazan.ir/sms/api.php?type=sms&apikey=[APIKEY]&code=1234&phone=09119604828
        $response = json_decode(file_get_contents('https://api.codebazan.ir/sms/api.php?type=sms&apikey=' . env('codeBazanOTP') . '&code=' . $code . '&phone=' . $phone));
        if (isset($response->result)){
            if(isset($response->result->code)){
                if($response->result->code == 200){
                    return true;
                }else {
                    return false;
                }
            }else {
                return false;
            }
        } else {
            return false;
        }
        return false;
    }
}
