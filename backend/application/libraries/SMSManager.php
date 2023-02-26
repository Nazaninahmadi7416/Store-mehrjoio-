<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SMSManager
{
    public function sendVerificationSMS($receptor,$verification_num,$hashCode,$name)
    {

        $curl = curl_init();
        $postfields=array('receptor' => $receptor,'sender' => '10001000440004','message' =>$name. '<#> Code: '.$verification_num."کد تایید فروشگاه".$hashCode);
        $curl = curl_init();

      curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.kavenegar.com/v1/556647784C446344572B5672766D784D527267346F4E7453716178316462384D4B5634434650766E6C31773D/sms/send.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postfields,
         ));
    
       $response = curl_exec($curl);
    
      curl_close($curl);
    }

    


    // public function sendForgotPasswordSMS($number, $code)
    // {
    //     $params = array('api' => SMS_API, 'number' => $number, 'mode' => 'khadamati', 'type' => 'change_password', 'app_name' => APP_NAME, 'code' => $code);

    //     $curl_options = array(
    //         CURLOPT_URL => $this->service_api,
    //         CURLOPT_POST => true,
    //         CURLOPT_POSTFIELDS => http_build_query($params),
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_HEADER => false
    //     );

    //     $curl = curl_init();
    //     curl_setopt_array($curl, $curl_options);
    //     $result = curl_exec($curl);
    //     curl_close($curl);
    //     //die($result);

    //     return $result;
    // }
}
