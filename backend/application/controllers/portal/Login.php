<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Access-Control-Allow-Origin: *');


class Login extends MY_Portal
{


    public function adminLogin(){

        $this->Method(POST);

        $username=$this->post('username', REQUIRED, TEXT);
        $password=$this->post('password', REQUIRED, TEXT);

        $this->load->model('portal/Admins');
        $this->load->model('portal/AdminTokens');

        $password=md5($password.PORTAL_PASSWORD_HASH);

        $LoginCheck=new Admins();
        $LoginCheck->loadByMultiField(array('username' => $username, 'password' => $password));


        if(intval($LoginCheck->ID)>0){
            
            //Valid Login
            $redirect_url='dashboard';

            if ($LoginCheck->is_blocked==0) {
                //Generate Token
                $token=md5(rand(1, 99999999).Time());
                $AdminTokens = new AdminTokens();
                $AdminTokens->token = $token;
                $AdminTokens->admin_id = $LoginCheck->ID;
                $AdminTokens->expire_date = Time()+(2*24*60*60);
                $AdminTokens->is_expired = 0;
                $AdminTokens->ip = $this->input->ip_address();
                $AdminTokens->browser = $this->input->user_agent();
                $AdminTokens->device = '';
                $AdminTokens->save();
            }


            $json['auth']=array(
                'is_block'=> boolval($LoginCheck->is_blocked),
                'is_login_valid'=> ($LoginCheck->ID > 0 && !$LoginCheck->is_blocked),
                'token' => $token,
            );

        }else{

            //Invalid Login
            $redirect_url='';


            $json['auth']=array(
                'is_block'=> false,
                'is_login_valid'=> false,
                'token' => '',
            );

        }

        $this->returnJSON($json, 
            $this->responseDialog(200, $redirect_url, false, '')
        );
    }
}
?>