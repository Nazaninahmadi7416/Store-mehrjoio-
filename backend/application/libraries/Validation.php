<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validation
{
    public function check($data, $input, $type)
    {
        switch ($type) {
                        
                        case 1:
                                //TEXT
                                $this->validateText($data, $input);
                        break;

                        case 2:
                                //NUMBER
                                $this->validateNumber($data, $input);
                        break;

                        case 3:
                                //Mobile
                                $this->validateMobile($data, $input);
                        break;

                        case 4:
                                //PASSWORD
                                $this->validatePassword($data, $input);
                        break;

                        case 5:
                                //EMAIL
                                $this->validateEmail($data, $input);
                        break;
                        
                        default:
                                return true;
                        break;
                }
    }
    public function validateText($data, $input)
    {
        $data=Trim($data);
        if (strlen($data)<1) {
                $this->returnError($input);
        }
    }
    public function validateNumber($data, $input)
    {
        $data=Trim($data);
        if (intval($data)==0) {
                $this->returnError($input);
        }
    }
    public function validateMobile($data, $input)
    {
        $data=Trim($data);
        if (!preg_match('/\A09+\d{9}\z/', $data)) {
                $this->returnError($input);
        }
    }
    public function validatePassword($data, $input)
    {
        $data=Trim($data);
        if (strlen($data)<6) {
                $this->returnError($input);
        }
    }
    public function validateEmail($data, $input)
    {
        $data=Trim($data);
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
                $this->returnError($input);
        }
    }
    private function returnError($name)
    {
        header('Content-Type: application/json');
        echo json_encode(array(
            'data' => null,
            'response' => array(
                'status' => 403,
                'show_dialog' => true,
                'message' => "$name is empty or invalid!",
                'positive_btn' => 'OK',
                'negative_btn' => 'Cancel',
                'positive_url' => '',
                'can_dismiss' => true
            )
        ));
        exit;

    }
}
