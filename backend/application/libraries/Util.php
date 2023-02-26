<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Util {
        public function password_hash($password)
        {
			return md5($password.PASSWORD_HASH);
        }

        public function password_hash_portal($password)
        {      
			return md5($password.PORTAL_PASSWORD_HASH);
        }

        public function getPercent($number, $percent){
                return round(($percent / 100) * $number);
        }
        public function minusPercent($number, $percent){
                return ($number - $this->getPercent($number, $percent));
        }
        public function addPercent($number, $percent){
                return ($number + $this->getPercent($number, $percent));
        }
        public function size($bytes){
                $decimals=2;
                $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
                $factor = floor((strlen($bytes) - 1) / 3);
                return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor]; 
        }
        public function randomString($len=6){
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $result = '';
            for ($i = 0; $i < $len; $i++) {
                $result .= $characters[mt_rand(0, strlen($characters))];
            }
            return $result;
        }

        public function post_request($url, $params){
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $params,
                CURLOPT_HTTPHEADER => array(
                    "Accept: */*",
                    "Cache-Control: no-cache",
                    "Connection: keep-alive",
                    "User-Agent: ".$_SERVER['HTTP_USER_AGENT'],
                    "accept-encoding: gzip, deflate",
                    "cache-control: no-cache",
                ),
                ));
        
                $response = curl_exec($curl);
                $err = curl_error($curl);
        
                curl_close($curl);
        
                if ($err) {
                    return "cURL Error #:" . $err;
                } else {
                    return $response;
                }
        }
}