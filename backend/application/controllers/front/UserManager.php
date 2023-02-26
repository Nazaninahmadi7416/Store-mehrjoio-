<?php
defined('BASEPATH') or exit('No direct script access allowed');


class UserManager extends MY_Controller
{
    public function userAuthenticationWithMobile(){
        $this->db->cache_off();
        //Check User Signup feature enabled or not
        if(boolval(@USER_REGISTRATION_AND_LOGIN_WITH_MOBILE)==false){
            $this->returnError(403, true, "User Registration with Mobile&Password is disabled");
        }
        $this->Method(POST);
        $this->load->model('UserTokens');
        $mobile=$this->post('mobile', REQUIRED, TEXT);
        // $name=$this->post('name', REQUIRED, TEXT);
        $login_code=$this->post('login_code');
        $hashCode=$this->post('hashCode');
       
        $tokencookie=$this->post('token');
        


        //Check Login Code
        if(strlen($login_code)>2){
            $this->db->select('ID,last_sms_send,isBlocked,account_id,block_reason,verification_code,fullname,mobile');
            $this->db->from('prime_users');
            $this->db->where('mobile', $mobile);
            $this->db->limit(1);
            $query = $this->db->get();
            $User=$query->result();
    
            if (count($User)>0) {
                $User = $User[0];

                if($User->verification_code!=$login_code){
                    $this->returnError(403, true, 'Invalid Verification Code!');
                }else{

                        if (intval(@$User->ID)>0 && !boolval(@$User->isBlocked)) {
                            //Valid Login
                            $UserTokens = new UserTokens();

                            //Create New Token
                            $token=md5(Time()."_".$User->account_id);

                            $UserTokens->account_id=$User->account_id;
                            $UserTokens->token=$token;
                            $UserTokens->ip=$this->input->ip_address();
                            $UserTokens->browser=$this->input->user_agent();
                            $UserTokens->is_expired=0;
                            $UserTokens->expire_date=Time()+(USER_TOKENS_EXPIRE_TIME*24*60*60);
                            // $UserTokens->save();
                            $ips=$this->input->ip_address();
                            $browsers=$this->input->user_agent();
                            $expire_date= Time()+(USER_TOKENS_EXPIRE_TIME*24*60*60);
                            $account_ids= $User->account_id;
                            $items = strval($ips);
                            $itemss = strval($browsers);
                            $tokens = strval($token);

                            // print_r($itemss);
                            // die();
                                     //insert user token
                                $data=array(
                                    "account_id" => $User->account_id,
                                    "token"=> $token,
                                    "ip"=> $this->input->ip_address(),
                                    "browser"=> $this->input->user_agent(),
                                    "is_expired"=> 0,
                                    "expire_date"=> Time()+(USER_TOKENS_EXPIRE_TIME*24*60*60),);

                                // $this->db->query("INSERT ");
                                $this->db->query("INSERT INTO `user_tokens`( `token`, `account_id`, `expire_date`, `is_expired`, `ip`, `browser`, `device`) 
                                VALUES ('$tokens',$account_ids,$expire_date,0,'$items', '$itemss','test')");
                                // $this->db->insert('user_tokens',$data);
                                // print_r("test");
                                // die();
                        }
                        
                        //Set Mobile is Verified on Users Row
                        $data=array(
                            "is_mobile_verified" => 1
                        );
                        $this->db->where('mobile', $mobile);
                        $this->db->update('prime_users', $data);

                        $json['auth']=array(
                            'is_login_valid'=> ($User->ID > 0 && !$User->isBlocked),
                            'is_mobile_verfied' => true,
                            'token' => @$token,
                            'user' => @$User,

                        );
                        // if(intval($User->block_reason)>0){
                        //     $block_reason=$User->block_reason;
                        // }else{
                        //     $block_reason="";
                        // }
                        $this->returnJSON(
                            $json,
                            $this->responseDialog(200, boolval($User->isBlocked), $User->block_reason)
                        );
                        exit;
                }

            }else{
                $this->returnError(403, true, 'Invalid User!');
            }
        }


        //Check Mobile Existence
        $this->db->select('ID,last_sms_send,isBlocked,block_reason');
        $this->db->from('prime_users');
        $this->db->where('mobile', $mobile);
        $this->db->limit(1);
        $query = $this->db->get();
        $User=$query->result();

      

        if(count($User)>0){

            $User = $User[0];
       
            //Login

            //Reject if SMS Sent in last 60 Seconds
            if (Time()-$User->last_sms_send<60) {
                $remaining_time=Time()-$User->last_sms_send;
                $this->returnError(403, true, "لطفا برای ارسال دوباره پیامک $remaining_time ثانیه دیگر تلاش کنید");
            }

            $random_number=rand(111111, 999999);
            // $random_number=123456;

            $data=array(
                "verification_code" => $random_number,
                "last_sms_send" => Time()
            );
            $this->db->where('mobile', $mobile);
            $this->db->update('prime_users', $data);
            $this->smsmanager->sendVerificationSMS($mobile, $random_number,$hashCode,$name);

            $json=array(
                'result' => 'done',
              
                        );
            if(intval($User->block_reason)>0){
                $block_reason=$User->block_reason;
            }else{
                $block_reason="";
            }
            $this->returnJSON(
                $json,
                $this->responseDialog(200, boolval($User->isBlocked), $block_reason)
            );
    
        }else {
            //Signup

            $fullname=$this->post('fullname');
            if(strlen(@$fullname)==0){
                $fullname="username";
            }


            $random_number=rand(111111, 999999);
            // $random_number=123456;

            $data=array(
                "verification_code" => $random_number,
                "last_sms_send" => Time(),
                "mobile" => $mobile,
                "fullname" => $fullname,
                "account_id" => $this->generateAccountID()
            );
            $this->db->insert('prime_users', $data);

            $code="ae8706638208fd356343cdf18e7957ab";
            $this->smsmanager->sendVerificationSMS($mobile, $random_number,$code);

            $json=array('result' => 'done',
            
        );
            $this->returnJSON(
                $json,
                $this->responseDialog(200, false, "")
            );
        

        }


    }

    // public function userAuthentication(){

    //     $this->Method(POST);
    //     $this->load->model('Users');
    //     $this->load->model('UserTokens');

    //     $mobile=$this->post('mobile', REQUIRED, MOBILE);
    //     $password=$this->post('password', REQUIRED, PASSWORD);
        

    //     $token='';

    //     $Users=new Users();
    //     $Users->login($mobile, $this->util->password_hash($password));

    //     if ($Users->ID>0 && !$Users->isBlocked) {
    //         //Valid Login
    //         $UserTokens = new UserTokens();

    //         //Delete Previous Tokens
    //         //$UserTokens->deleteBy(array('account_id'=>$Users->account_id));


    //         //Create New Token
    //         $token=md5(Time()."_".$Users->account_id);

    //         $UserTokens->account_id=$Users->account_id;
    //         $UserTokens->token=$token;
    //         $UserTokens->ip=$this->input->ip_address();
    //         $UserTokens->browser=$this->input->user_agent();
    //         $UserTokens->is_expired=0;
    //         $UserTokens->expire_date=Time()+(USER_TOKENS_EXPIRE_TIME*24*60*60);
    //         $UserTokens->save();
    //     }



    //     $json['auth']=array(
    //         'is_login_valid'=> ($Users->ID > 0 && !$Users->isBlocked),
    //         'is_mobile_verfied' => boolval($Users->is_mobile_verified),
    //         'token' => $token,
    //     );

    //     $this->returnJSON(
    //         $json,
    //         $this->responseDialog(200, boolval($Users->isBlocked), $Users->block_reason)
    //     );
    // }


    // public function userAuthentication()
    // {
    //     //Check User Signup feature enabled or not
    //     if(boolval(@USER_REGISTRATION_AND_LOGIN_WITH_MOBILE_PASSWORD)==false){
    //         $this->returnError(403, true, "User Registration with Mobile&Password is disabled");
    //     }
    //     $this->Method(POST);
    //     $this->load->model('Users');
    //     $this->load->model('UserTokens');
        

    //     $mobile=$this->post('mobile', REQUIRED, MOBILE);
    //     $password=$this->post('password', REQUIRED, PASSWORD);
        

    //     $token='';


    //     $Users=new Users();
    //     $Users->login($mobile, $this->util->password_hash($password));

    //     if (intval(@$Users->ID)>0 && !boolval(@$Users->isBlocked)) {
    //         //Valid Login
    //         $UserTokens = new UserTokens();

    //         //Delete Previous Tokens
    //         //$UserTokens->deleteBy(array('account_id'=>$Users->account_id));


    //         //Create New Token
    //         $token=md5(Time()."_".$Users->account_id);

    //         $UserTokens->account_id=$Users->account_id;
    //         $UserTokens->token=$token;
    //         $UserTokens->ip=$this->input->ip_address();
    //         $UserTokens->browser=$this->input->user_agent();
    //         $UserTokens->is_expired=0;
    //         $UserTokens->expire_date=Time()+(USER_TOKENS_EXPIRE_TIME*24*60*60);
    //         $UserTokens->save();
    //     }



    //     $json['auth']=array(
    //         'is_login_valid'=> ($Users->ID > 0 && !$Users->isBlocked),
    //         'is_mobile_verfied' => boolval($Users->is_mobile_verified),
    //         'token' => @$token,
    //     );

    //     $this->returnJSON(
    //         $json,
    //         $this->responseDialog(200, boolval($Users->isBlocked), $Users->block_reason)
    //     );
    // }


    // public function updateFullName(){
    //          $this->Method(POST);
    //     $token=$this->post('token', REQUIRED, TEXT);
    //     $name=$this->post('name', REQUIRED, TEXT);
    //     $User=$this->checkToken(REQUIRED);

    //     $data=array(
    //         "fullname" => $name,
    //     );
    //     $this->db->where('ID', $User->ID);
    //     $this->db->update('prime_users', $data);


    //     $json=array('result' => 'done');
    //     $this->returnJSON(
    //         $json,
    //         $this->responseDialog(200, false, "")
    //     );



    // }

    // public function userAuthenticationWithMobile(){
    //     //Check User Signup feature enabled or not
    //     if(boolval(@USER_REGISTRATION_AND_LOGIN_WITH_MOBILE)==false){
    //         $this->returnError(403, true, "User Registration with Mobile&Password is disabled");
    //     }
    //     $this->Method(POST);
    //     $this->load->model('UserTokens');


    //     $mobile=$this->post('mobile', REQUIRED, MOBILE);
    //     $login_code=$this->post('login_code');
    //     $tokencookie=$this->post('token');
        


    //     //Check Login Code
    //     if(strlen($login_code)>2){
    //         $this->db->select('ID,last_sms_send,isBlocked,account_id,block_reason,verification_code');
    //         $this->db->from('prime_users');
    //         $this->db->where('mobile', $mobile);
    //         $this->db->limit(1);
    //         $query = $this->db->get();
    //         $User=$query->result();
    
    //         if (count($User)>0) {
    //             $User = $User[0];

    //             if($User->verification_code!=$login_code){
    //                 $this->returnError(403, true, 'Invalid Verification Code!');
    //             }else{

    //                     if (intval(@$User->ID)>0 && !boolval(@$User->isBlocked)) {
    //                         //Valid Login
    //                         $UserTokens = new UserTokens();

    //                         //Create New Token
    //                         $token=md5(Time()."_".$User->account_id);

    //                         $UserTokens->account_id=$User->account_id;
    //                         $UserTokens->token=$token;
    //                         $UserTokens->ip=$this->input->ip_address();
    //                         $UserTokens->browser=$this->input->user_agent();
    //                         $UserTokens->is_expired=0;
    //                         $UserTokens->expire_date=Time()+(USER_TOKENS_EXPIRE_TIME*24*60*60);
    //                         $UserTokens->save();
    //                     }

    //                     //Set Mobile is Verified on Users Row
    //                     $data=array(
    //                         "is_mobile_verified" => 1
    //                     );
    //                     $this->db->where('mobile', $mobile);
    //                     $this->db->update('prime_users', $data);


    //                     //Update Basket 
    //                     $datatest=array(
    //                         "token_cookie" => "",
    //                         "is_cookie" => "0",
    //                         "user_id" => $User->ID,
    //                     );
    //                     $this->db->where('token_cookie', $tokencookie);
    //                     $this->db->update('user_products', $datatest);
                        


    //                     $json['auth']=array(
    //                         'is_login_valid'=> ($User->ID > 0 && !$User->isBlocked),
    //                         'is_mobile_verfied' => true,
    //                         'token' => @$token,
    //                     );

    //                     $this->returnJSON(
    //                         $json,
    //                         $this->responseDialog(200, boolval($User->isBlocked), $User->block_reason)
    //                     );
    //                     exit;
    //             }

    //         }else{
    //             $this->returnError(403, true, 'Invalid User!');
    //         }
    //     }


    //     //Check Mobile Existence
    //     $this->db->select('ID,last_sms_send,isBlocked,block_reason');
    //     $this->db->from('prime_users');
    //     $this->db->where('mobile', $mobile);
    //     $this->db->limit(1);
    //     $query = $this->db->get();
    //     $User=$query->result();

      

    //     if(count($User)>0){

    //         $User = $User[0];
       
    //         //Login

    //         //Reject if SMS Sent in last 60 Seconds
    //         if (Time()-$User->last_sms_send<60) {
    //             $remaining_time=Time()-$User->last_sms_send;
    //             $this->returnError(403, true, "لطفا برای ارسال دوباره پیامک $remaining_time ثانیه دیگر تلاش کنید");
    //         }

    //         $random_number=rand(111111, 999999);
    //         // $random_number=123456;

    //         $data=array(
    //             "verification_code" => $random_number,
    //             "last_sms_send" => Time()
    //         );
    //         $this->db->where('mobile', $mobile);
    //         $this->db->update('prime_users', $data);
            

    //        $test= $this->smsmanager->sendVerificationSMS($mobile, $random_number);

            

    //         $json=array(
    //             'result' => 'done',
    //             'smsCode' => $test,
    //         );

    //         $this->returnJSON(
    //             $json,
    //             $this->responseDialog(200, boolval($User->isBlocked), $User->block_reason)
    //         );
    //     }else {
    //         //Signup
    //         $fullname="test";
    //         $fullname=$this->post('fullname');
    //         // $fullname=$this->post('fullname', REQUIRED, TEXT);


    //         $random_number=rand(111111, 999999);
    //         // $random_number=123456;

    //         $data=array(
    //             "verification_code" => $random_number,
    //             "last_sms_send" => Time(),
    //             "mobile" => $mobile,
    //             "fullname" => $fullname,
    //             "account_id" => $this->generateAccountID()
    //         );
    //         $this->db->insert('prime_users', $data);


    //         $this->smsmanager->sendVerificationSMS($mobile, $random_number);

    //         $json=array('result' => 'done',
    //         'smsCode' => $random_number,
    //     );
    //         $this->returnJSON(
    //             $json,
    //             $this->responseDialog(200, false, "")
    //         );

    //     }


    // }

    // public function userSignup()
    // {
    //     //Check User Signup feature enabled or not
    //     if(boolval(@USER_REGISTRATION_AND_LOGIN_WITH_MOBILE_PASSWORD)==false){
    //         $this->returnError(403, true, "User Registration with Mobile&Password is disabled");
    //     }


    //     $this->Method(POST);
    //     $this->load->model('Users');

    //     $status=200;
    //     $showDialog=false;
    //     $message='';

    //     $fullname=$this->post('fullname', REQUIRED, TEXT);
    //     $mobile=$this->post('mobile', REQUIRED, MOBILE);
    //     $email=$this->post('email');
    //     $password=$this->post('password', REQUIRED, PASSWORD);
    //     $agreement_accept=$this->post('agreement_accept', REQUIRED, NUMBER);


    //     $Users = new Users();
    //     $Users->loadByField('mobile', $mobile);

    //     if (intval($Users->ID)>0) {
    //         $status=403;
    //         $showDialog=true;
    //         $message='شماره موبایل وارد شده در سامانه وجود دارد.';
    //     }
    //     if (strlen($email)>4) {
    //         $email=$this->post('email', REQUIRED, EMAIL);

    //         $Users = new Users();
    //         $Users->loadByField('email', $email);

    //         if (intval($Users->ID)>0) {
    //             $status=403;
    //             $showDialog=true;
    //             $message='ایمیل وارد شده در سامانه وجود دارد.';
    //         }
    //     }

    //     if ($status==200) {
    //         //Create User Account
    //         $Users = new Users();
    //         $Users->fullname=$fullname;
    //         $Users->account_id=$this->generateAccountID();
    //         $Users->email=$email;
    //         $Users->credit=0;
    //         $Users->mobile=$mobile;
    //         $Users->password=$this->util->password_hash($password);
    //         $Users->is_mobile_verified=false;
    //         $Users->agreement_accept=1;
    //         $Users->agreement_accept_date=Time();

    //         $Users->save();

    //         $json['success']=true;
    //     } else {
    //         $json['success']=false;
    //     }

    //     $this->returnJSON(
    //         $json,
    //         $this->responseDialog($status, $showDialog, $message)
    //     );
    // }

    // public function sendVerificationSMS()
    // {
    //     $this->Method(POST);
    //     $User=$this->checkToken(REQUIRED);

    //     //Check User
    //     if ($User->is_mobile_verified!=0) {
    //         $this->returnError(403, true, 'شماره تلفن همراه شما فعال شده است.');
    //     }

    //     //Reject if SMS Sent in last 60 Seconds
    //     if (Time()-$User->last_sms_send<60) {
    //         $remaining_time=Time()-$User->last_sms_send;
    //         $this->returnError(403, true, "لطفا برای ارسال دوباره پیامک $remaining_time ثانیه دیگر تلاش کنید");
    //     }


    //     //Send SMS
    //     // $random_number=rand(111111, 999999);
    //     $random_number=123456;
        
    //     $User->verification_code=$random_number;
    //     $User->last_sms_send=Time();
    //     $User->save();

    //     $this->smsmanager->sendVerificationSMS($User->mobile, $random_number);


    //     $json=array(
    //         'sms_code'=> true
    //     );

    //     $this->returnJSON(
    //         $json,
    //         $this->responseDialog(200, boolval($User->isBlocked), $User->block_reason)
    // );
    // }

    // public function verifyMobile()
    // {
    //     $this->Method(POST);
    //     $this->load->model('UsersLight');

    //     $activation_code=$this->post('activation_code', REQUIRED, NUMBER);

    //     //Check Token
    //     $User=$this->checkToken(REQUIRED);

    //     $status=200;
    //     $message='';
    //     $showDialog=false;


    //     //Check ActivationCode
    //     if ($User->verification_code==$activation_code) {
    //         $User->verification_code=0;
    //         $User->is_mobile_verified=1;
    //         $User->last_sms_send=Time();
    //         $User->save();
    //     } else {
    //         $status=403;
    //         $message='کد وارد شده معتبر نمی باشد';
    //         $showDialog=true;
    //     }

    //     $this->returnJSON(
    //         null,
    //         $this->responseDialog($status, $showDialog, $message)
    //     );
    // }

    // public function resetPasswordRequest()
    // {
    //     //change_password

    //     $this->Method(POST);
    //     $mobile=$this->post("mobile", REQUIRED, TEXT);
    //     $this->load->model('UsersLight');

    //     $User = new UsersLight();
    //     $User->loadByMultiField(array('mobile' => $mobile));

    //     //Check User
    //     if (intval(@$User->ID)==0) {
    //         $this->returnError(403, true, 'شماره همراه وارد شده معتبر نمی باشد.');
    //     }
    //     if ($User->isBlocked==1) {
    //         $this->returnError(403, true, 'اکانت درخواستی مسدود شده است.');
    //     }

    //     //Reject if SMS Sent in last 60 Seconds
    //     if (Time()-$User->last_sms_send<60) {
    //         $remaining_time=Time()-$User->last_sms_send;
    //         $this->returnError(403, true, "لطفا برای ارسال دوباره پیامک $remaining_time ثانیه دیگر تلاش کنید");
    //     }


    //     //Send SMS
    //     // $random_number=rand(111111, 999999);
    //     $random_number=123456;
        
    //     $User->verification_code=$random_number;
    //     $User->last_sms_send=Time();
    //     $User->save();

    //     $this->smsmanager->sendForgotPasswordSMS($User->mobile, $random_number);


    //     $json=array(
    //         'sms_code'=> true
    //     );

    //     $this->returnJSON(
    //         $json,
    //         $this->responseDialog(200, boolval($User->isBlocked), $User->block_reason)
    // );
    // }

    // public function changePassword()
    // {
    //     //change_password

    //     $this->Method(POST);
    //     $current_password=$this->post("current_password");
    //     if(strlen($current_password)==0){
    //         $sms_verify_code=$this->post("sms_verify_code", REQUIRED, TEXT);
    //         $mobile=$this->post("mobile", REQUIRED, TEXT);
    //     }
    //     $new_password=$this->post("new_password", REQUIRED, TEXT);

    //     if (strlen($new_password)<5) {
    //         $this->returnError(403, true, 'رمز عبور انتخابی باید حداقل ۵ کاراکتر باشد');
    //     }

    //     $this->load->model('UsersLight');


    //     if(strlen($current_password)>0){

    //         //Change Password with Current Password
    //         $User = $this->checkToken(REQUIRED);

    //         $UserX = new UsersLight();
    //         $UserX->loadByMultiField(array('ID'=>$User->ID, 'password'=>$this->util->password_hash($current_password)));

    //         if(intval(@$UserX->ID)==0){
    //             $this->returnError(403, true, "رمز عبور فعلی صحیح نمی باشد.");
    //         }


    //         $UserX->password=$this->util->password_hash($new_password);
    //         $UserX->save();

    //         $json=array('success' => true);

    //         $this->returnJSON(
    //                 $json,
    //                 $this->responseDialog(200, true, 'تغییر رمز عبور با موفقیت انجام شد.')
    //             );
    //             exit;

    //     }

    //     $User = new UsersLight();
    //     $User->loadByField('mobile', $mobile);

    //     if (intval(@$User->ID)==0) {
    //         $this->returnError(403, true, 'اطلاعات وارد شده معتبر نمی باشد.');
    //     }

    //     if (Time()-$User->last_sms_send>(7*60)) {
    //         $this->returnError(403, true, 'درخواست ارسالی منقضی شده است.');
    //     }

    //     if ($sms_verify_code!=$User->verification_code) {
    //         $this->returnError(403, true, 'کد پیامکی معتبر نمی باشد.');
    //     }

    //     $User->password=$this->util->password_hash($new_password);
    //     $User->save();

    //     $json=array('success' => true);

    //     $this->returnJSON(
    //             $json,
    //             $this->responseDialog(200, boolval($User->isBlocked), $User->block_reason)
    //         );
    // }

    // public function logout()
    // {
    //     //change_password

    //     $this->Method(POST);
    //     $token=$this->post("token", REQUIRED, TEXT);

    //     $this->db->query("update `user_tokens` set `is_logout`='1',`logout_date`=CURDATE() where `token`='$token'");

    //     $json=array('success' => true);

    //     $this->returnJSON(
    //             $json,
    //             $this->responseDialog(200, false, '')
    //         );
    // }

    // public function addressManager()
    // {
    //     $this->Method(POST);

    //     $User=$this->checkToken(REQUIRED);

    //     $action=$this->post('action', REQUIRED, TEXT);
    //     $title=$this->post('title', TEXT);
    //     $address=$this->post('address', TEXT);
    //     $lat=$this->post('lat');
    //     $lng=$this->post('lng');
    //     $phone=$this->post('phone');
    //     $mobile=$this->post('mobile');
    //     if ($action=='edit' || $action=='delete') {
    //         $edit_id=$this->post('address_id', REQUIRED, NUMBER);
    //     }


    //     if ($action=='add' || $action=='edit') {
    //         $this->load->model("UserAddress");
    //         $UserAddress = new UserAddress();

    //         if ($action=='edit') {
    //             $UserAddress->loadByMultiField(array('user_id' => $User->ID, 'ID' => $edit_id));
    //         }

    //         if (intval(@$UserAddress->ID)==0 && $action=='edit') {
    //             $this->returnError(404, true, 'آدرس درخواستی معتبر نمی باشد.');
    //             exit;
    //         }
    //         $UserAddress->title=$title;
    //         $UserAddress->address=$address;
    //         $UserAddress->lat=$lat;
    //         $UserAddress->lng=$lng;
    //         $UserAddress->phone=$phone;
    //         $UserAddress->mobile=$mobile;
    //         $UserAddress->user_id=$User->ID;
    //         $UserAddress->save();

            
    //         $this->returnJSON(
    //             null,
    //             $this->responseDialog(200, false, '')
    //         );
    //         exit;
    //     }

    //     if ($action=='delete') {
    //         $this->load->model("UserAddress");
    //         $UserAddress = new UserAddress();
    //         @$UserAddress->deleteByMultipleField(array('user_id' => $User->ID, 'ID' => $edit_id));

    //         $this->returnJSON(
    //             null,
    //             $this->responseDialog(200, false, '')
    //         );
    //         exit;
    //     }

    //     if ($action=='list') {
    //         $this->db->select('*');
    //         $this->db->from('user_addresses');
    //         $this->db->where('user_id', $User->ID);
    //         $this->db->limit(20);
    //         $this->db->order_by('ID', 'DESC');
    //         $query = $this->db->get();
    //         $Addresses=$query->result();

    //         $this->returnJSON(
    //             array('addresses' => $Addresses),
    //             $this->responseDialog(200, false, '')
    //         );
    //         exit;
    //     }


    //     $this->returnJSON(
    //         array('addresses' => $Addresses),
    //         $this->responseDialog(200, false, '')
    //     );
    // }

    // public function userInfo()
    // {
    //     $this->Method(POST);

    //     $User=$this->checkToken(REQUIRED);
    //     $action=$this->post('action', REQUIRED, TEXT);

    //     if ($action=='get') {
    //         $this->db->select('ID,fullname,account_id,mobile,is_mobile_verified,credit,email');
    //         $this->db->from('prime_users');
    //         $this->db->where('ID', $User->ID);
    //         $this->db->limit(1);
    //         $query = $this->db->get();
    //         $User=$query->result()[0];


    //         $this->returnJSON(
    //             array('info' => $User),
    //             $this->responseDialog(200, false, '')
    //         );
    
    //         exit;
    //     }

    //     if ($action=='update') {
    //         $fullname=$this->post("fullname", REQUIRED, TEXT);
    //         $this->db->query("UPDATE `prime_users` SET `fullname`='$fullname' WHERE `ID`=".$User->ID);

    //         $this->returnJSON(
    //             null,
    //             $this->responseDialog(200, false, '')
    //         );
    
    //         exit;
    //     }
    // }
    // public function addCredit($device, $token, $amount)
    // {

    //     $User = $this->checkToken(REQUIRED, CUSTOM, $token);

    //     if (intval($amount)==0) {
    //         $this->returnError(403, true, 'Amount is not Valid');
    //     }

    //     if (USER_CAN_ADD_CREDIT==false) {
    //         $this->returnError(403, true, 'Adding Credit Is Blocked');
    //     }

    //     $callback_background=str_replace(':8080', '', WEBSITE_BASE_URL).WEBSITE_API_PATH."chargeCredit?hash=".md5($token.$amount."2s34ib7239s4723");
    //     $callback=WEBSITE_FRONT_URL."cart?return_from_gateway=yes";

            
    //     if (PAY_WITH_SAMPLE_GATEWAY) {
    //         $gateway_type=GATEWAY_SAMPLE;
    //     } else {
    //         $gateway_type=GATEWAY_ZARINPAL;
    //     }
        
    //     $payment_url=$this->getPaymentURL($token, $gateway_type, Time(), $User->ID, $amount, 'افزایش اعتبار', ANDROID_APP_PACKAGE_NAME, $device, '', $callback_background);
    //     $this->load->helper('url');
    //     redirect($payment_url);

    // }

    // public function chargeCredit()
    // {

    //     if (USER_CAN_ADD_CREDIT==false) {
    //         $this->returnError(403, true, 'Adding Credit Is Blocked');
    //     }

    //     $this->Method(POST);
    //     $User=$this->checkToken(REQUIRED);

    //     $hash = $this->get('hash', REQUIRED, TEXT);
    //     $status = $this->post('status'); //success,failed,canceled
    //     $amount = $this->post('amount', REQUIRED, NUMBER);
    //     $order_id = $this->post('order_id', REQUIRED, NUMBER);
    //     $token = $this->post('token', REQUIRED, TEXT);
    //     $transaction_id = $this->post('transaction_id', REQUIRED, NUMBER);
    //     $gateway = $this->post('gateway', REQUIRED, TEXT);

    //     //Validate Transaction
    //     $Transition=$this->getTransaction(0, $transaction_id, $User->ID);

    //     if ($Transition['is_valid_transaction']==false) {
    //         $this->returnError(404, true, 'تراکنش معتبر نمی باشد');
    //     }

    //     if ($hash!=md5($token.$amount."2s34ib7239s4723")) {
    //         $this->returnError(403, true, 'Invalid Hash');
    //     }

    //     $ts_amount=$Transition['amount'];
    //     $ts_user_id=$Transition['user_id'];
    //     $is_order_delivered=$Transition['is_order_delivered'];


    //     if ($ts_amount!=$amount) {
    //         $this->returnError(403, true, 'Invalid Amount');
    //     }
    //     if ($is_order_delivered==0) {
    //         if ($Transition['is_successful']) {

    //             //Successful Payment
    //             $this->db->query("UPDATE `prime_users` SET `credit`=`credit`+$ts_amount WHERE `ID`='".$User->ID."'");
    //             $this->deliverTransactionOrder($transaction_id);
    //         } else {

    //             //Failed Payment

    //         }
    //     }
    // }






}
