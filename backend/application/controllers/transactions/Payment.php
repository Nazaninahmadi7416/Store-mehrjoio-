<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends MY_Controller
{
    private $callback_url=WEBSITE_BASE_URL.WEBSITE_API_PATH.'tsmv/#gateway#/#hash#';
    
    private $back_button="<div style='text-align:center'><a href='#device_command#'>برگشت به #device#</a></div>";
    private $success_message="تراکنش با موفقیت ثبت گردید<br/>کد پیگیری :‌#refID#";
    private $failed_message="تراکنش با موفقیت انجام نشده است<br/>خطا :‌#status#";
    private $canceled_message="تراکنش توسط کاربر لغو شده است";

    private $device_callback_scripts=array(
        "android" => "javascript:backx()__<script>function backx(){top.location.href='intent:#Intent;action=#package_android#.launchfrombrowser;category=android.intent.category.DEFAULT;category=android.intent.category.BROWSABLE;S.msg_from_browser=purchdone;end';}</script>",
        "ios" => "javascript:backx()__<script>function backx(){top.location.href='#package_ios#://?purchdone';}</script>",
        "web" => "#callback_url#__<script>function backx(){top.location.href='#callback_url#';}</script>",
    );

    public function callGateway($device, $gateway, $hash)
    {
        $this->Method(GET);
        
        //Check Gateway
        $this->db->select('*');
        $this->db->from('transaction_gateways');
        $this->db->where('is_active', 1);
        $this->db->where('title_en', $gateway);
        $this->db->limit(1);
        $query = $this->db->get();
        $Gateway=@$query->result()[0];


        if (intval(@$Gateway->ID)==0) {
            if($gateway=='sample' && PAY_WITH_SAMPLE_GATEWAY==true){
                //No Error For Sample Gateway
            }else{
                echo "<div style='text-align:center; font-family:tahoma'>درگاه پرداخت معتبر نمی باشد</div>";
                exit;
            }
        }

        //Check Transaction
        $this->db->select('*');
        $this->db->from('transaction_manager');
        $this->db->where('expire_date >', 0);
        $this->db->where('expire_date >', Time());
        $this->db->order_by('ID', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $Transaction=@$query->result()[0];

        if (intval(@$Transaction->ID)==0) {
            echo "<div style='text-align:center; font-family:tahoma'>تراکنش معتبر نمی باشد</div>";
            exit;
        }


        //Check Transaction For Previous Successful
        $this->db->select('ID');
        $this->db->from('transaction_manager');
        $this->db->where('order_id', $Transaction->order_id);
        $this->db->where('user_id', $Transaction->user_id);
        $this->db->where('is_successful', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        $TransactionX=@$query->result()[0];


        if (intval(@$TransactionX->ID)>0) {
            echo "<div style='text-align:center; font-family:tahoma'>تراکنش قبلا با موفقیت انجام شده است</div>";
            exit;
        }


        //Update IP and UserAgent
        $this->load->library('user_agent');
        $this->db->query("UPDATE `transaction_manager` SET `device`='$device',`ip`='".$this->input->ip_address()."',`user_agent`='".$this->agent->agent_string()."' WHERE `ID`='".$Transaction->ID."'");
        $Transaction->device=$device;

        //Call Related Function
        $this->{$gateway}($Transaction, $Gateway);
    }
    public function verifyGateway($gateway, $hash)
    {
        $this->Method(GET);

        //Check Gateway
        $this->db->select('*');
        $this->db->from('transaction_gateways');
        $this->db->where('is_active', 1);
        $this->db->where('title_en', $gateway);
        $this->db->limit(1);
        $query = $this->db->get();
        $Gateway=@$query->result()[0];


        if (intval(@$Gateway->ID)==0) {
            echo "<div style='text-align:center; font-family:tahoma'>درگاه پرداخت معتبر نمی باشد</div>";
            exit;
        }

        //Check Transaction
        $this->db->select('*');
        $this->db->from('transaction_manager');
        $this->db->where('expire_date >', 0);
        $this->db->where('expire_date >', Time());
        $this->db->order_by('ID', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $Transaction=@$query->result()[0];

        if (intval(@$Transaction->ID)==0) {
            echo "<div style='text-align:center; font-family:tahoma'>تراکنش معتبر نمی باشد</div>";
            exit;
        }


        //Check Transaction For Previous Successful
        $this->db->select('ID');
        $this->db->from('transaction_manager');
        $this->db->where('order_id', $Transaction->order_id);
        $this->db->where('is_successful', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        $TransactionX=@$query->result()[0];


        if (intval(@$TransactionX->ID)>0) {
            echo "<div style='text-align:center; font-family:tahoma'>تراکنش قبلا با موفقیت انجام شده است</div>";
            exit;
        }


        //Call Related Function
        $this->{$gateway."_verify"}($Transaction, $Gateway);
    }
    private function sample($Transaction, $Gateway)
    {
        if(!PAY_WITH_SAMPLE_GATEWAY){
            echo "<div style='text-align:center; font-family:tahoma'>درگاه پرداخت معتبر نمی باشد</div>";
            exit;
        }

        $Amount = $Transaction->amount; //Amount will be based on Toman  - Required
        $Description = $Transaction->desc;  // Required
        $Email = ''; // Optional
        $Mobile = $Transaction->mobile; // Optional

        $callback_url=str_replace('#gateway#', 'sample', $this->callback_url);
        $callback_url=str_replace('#hash#', $Transaction->hash, $callback_url);

        $CallbackURL = $callback_url;  // Required

        $gateway_desc='تراکنش موفق - کد: 123456';
        $refID='123456';
        $is_successful=1;
        $payment_status='success';
        $gateway_status='success';
        $return_message=str_replace('#refID#', '123456', $this->success_message);
        $Authority='SAMPLE_AUTH';


        //Save Result to Database
        $this->db->query("UPDATE `transaction_manager` SET `gateway_status`='$gateway_status',`gateway_desc`='$gateway_desc',`refID`='$refID',`Authority`='$Authority',`is_successful`='$is_successful' WHERE `ID`='".$Transaction->ID."'");

        $callback_script=$this->device_callback_scripts[$Transaction->device];
        $callback_script=str_replace('#package_android#', ANDROID_APP_PACKAGE_NAME, $callback_script);
        $callback_script=str_replace('#package_ios#', IOS_APP_PACKAGE_NAME, $callback_script);
        $callback_script=str_replace('#callback_url#', $Transaction->callback_url."?status=".$payment_status."&order_id=".$Transaction->order_id, $callback_script);

        $call_arr=explode('__', $callback_script);

        $this->back_button=str_replace('#device_command#', $call_arr[0], $this->back_button);
        if ($Transaction->device=='web') {
            $this->back_button=str_replace('#device#', 'وب سایت', $this->back_button);
        } else {
            $this->back_button=str_replace('#device#', 'اپلیکیشن', $this->back_button);
        }


        if(strlen($Transaction->callback_url_background)>5){
            //Call Callback URL
            // print_r("call Back URL ".$Transaction->callback_url_background."\n");
            // print_r("payment_status ".$payment_status."\n");
            // die();
            $this->util->post_request($Transaction->callback_url_background, "status=$payment_status&amount=$Amount&order_id=".$Transaction->order_id."&token=".$Transaction->token."&transaction_id=".$Transaction->ID."&gateway=sample");
        }

        echo "<div style='text-align:center'>".$return_message."</div>".$this->back_button;
        echo $call_arr[1]."<script>backx();</script>";
   
    
    }
    private function zarinpal($Transaction, $Gateway)
    {
        $MerchantID = $Gateway->MerchantID;  //Required
        $Amount = $Transaction->amount; //Amount will be based on Toman  - Required
        $Description = $Transaction->desc;  // Required
        $Email = ''; // Optional
        $Mobile = $Transaction->mobile; // Optional

        $callback_url=str_replace('#gateway#', $Gateway->title_en, $this->callback_url);
        $callback_url=str_replace('#hash#', $Transaction->hash, $callback_url);

        $CallbackURL = $callback_url;  // Required
    
        // URL also can be ir.zarinpal.com or de.zarinpal.com
        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
    
        $result = $client->PaymentRequest([
            'MerchantID'     => $MerchantID,
            'Amount'         => $Amount,
            'Description'    => $Description,
            'Email'          => $Email,
            'Mobile'         => $Mobile,
            'CallbackURL'    => $CallbackURL,
        ]);
    
        //Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {
            header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
        } else {
            echo 'خطا در درگاه زرین پال<br>'.$result->Status;
        }
    }
    private function zarinpal_verify($Transaction, $Gateway)
    {
        $MerchantID = $Gateway->MerchantID;  //Required
        $Amount = $Transaction->amount; //Amount will be based on Toman  - Required
        $Authority = $this->get('Authority');

        $refID='';
        $gateway_status='';
        $is_successful=0;
        $return_message="";
        $payment_status='';
    
        if ($_GET['Status'] == 'OK') {
            // URL also can be ir.zarinpal.com or de.zarinpal.com
            $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
    
            $result = $client->PaymentVerification([
                'MerchantID'     => $MerchantID,
                'Authority'      => $Authority,
                'Amount'         => $Amount,
            ]);

            
    
            if ($result->Status == 100) {
                $gateway_desc='تراکنش موفق - کد:'.$result->RefID;
                $refID=$result->RefID;
                $payment_status='success';
                $is_successful=1;
                $return_message=str_replace('#refID#', $result->RefID, $this->success_message);
            } else {
                $gateway_desc='تراکنش ناموفق - وضعیت:'.$result->Status;
                $gateway_status=$result->Status;
                //$gateway_status='FAILED';
                $payment_status='failed';
                $return_message=str_replace('#status#', $result->Status, $this->failed_message);
            }
        } else {
            $gateway_desc='کاربر انصراف داده است.';
            $gateway_status='CANCELED';
            $payment_status='canceled';
            $return_message=$this->canceled_message;
        }

        //Save Result to Database
        $this->db->query("UPDATE `transaction_manager` SET `gateway_status`='$gateway_status',`gateway_desc`='$gateway_desc',`refID`='$refID',`Authority`='$Authority',`is_successful`='$is_successful' WHERE `ID`='".$Transaction->ID."'");


        $callback_script=$this->device_callback_scripts[$Transaction->device];
        $callback_script=str_replace('#package_android#', ANDROID_APP_PACKAGE_NAME, $callback_script);
        $callback_script=str_replace('#package_ios#', IOS_APP_PACKAGE_NAME, $callback_script);
        // $callback_script=str_replace('#callback_url#', $Transaction->callback_url, $callback_script);
        $callback_script=str_replace('#callback_url#', $Transaction->callback_url."?status=".$payment_status."&order_id=".$Transaction->order_id, $callback_script);

        $call_arr=explode('__', $callback_script);

        $this->back_button=str_replace('#device_command#', $call_arr[0], $this->back_button);
        if ($Transaction->device=='web') {
            $this->back_button=str_replace('#device#', 'وب سایت', $this->back_button);
        } else {
            $this->back_button=str_replace('#device#', 'اپلیکیشن', $this->back_button);
        }

        if(strlen($Transaction->callback_url_background)>5){
            //Call Callback URL
            $this->util->post_request($Transaction->callback_url_background, "status=$payment_status&amount=$Amount&order_id=".$Transaction->order_id."&token=".$Transaction->token."&transaction_id=".$Transaction->ID."&gateway=".$Gateway->title_en);
        }

        echo "<div style='text-align:center'>".$return_message."</div>".$this->back_button;
        echo $call_arr[1]."<script>backx();</script>";
    }
}
