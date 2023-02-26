<?php
// Developed by iziapp.ir

    //Field Types
    define('REQUIRED', '1');

    define('TEXT', '1');
    define('NUMBER', '2');
    define('MOBILE', '3');
    define('PASSWORD', '4');
    define('EMAIL', '5');
    
    //Input Types
    define('POST', '1');
    define('GET', '2');
    define('CUSTOM', '4');

    //Image Types
    define('JPG', 1);
    define('PNG', 1);

    //TICKET PRODUCTS TYPE
    define('PRODUCT', 'PRIME_PRODUCTS');
    define('ADDON', 'PRIME_PRODUCTS_ADDONS');
    define('CALL_REQUEST', 'PRIME_CALL_REQUEST');
    
    define('dl_hash', '');

    //Include PORTAL Class
    include_once('application/core/MY_Portal.php');


    //Payment Transactions
    define('GATEWAY_SAMPLE', '-1');
    define('GATEWAY_RANDOM', '0');
    define('GATEWAY_ZARINPAL', '1');
    define('GATEWAY_MELLAT', '2');
    define('GATEWAY_PASARGAD', '3');

    define('GATEWAY_DEVICE_DYNAMIC', '#device#');
    define('GATEWAY_DEVICE_ANDROID', 'android');
    define('GATEWAY_DEVICE_IOS', 'ios');
    define('GATEWAY_DEVICE_WEBSITE', 'web');



class MY_Controller extends CI_Controller
{


    public function setCookie($key, $value, $days=1){
        setcookie($key, $value, time() + (86400 * $days), "/");
    }


    //Payment Transaction Manager (Return Pay Online URL)
    public function getPaymentURL($token, $gateway, $order_id, $mobile, $amount, $desc,
     $package_name, $device, $callback_url, $callback_background='')
    {

        //Check Transaction For Previous Successful
        $this->db->select('ID');
        $this->db->from('transaction_manager');
        $this->db->where('order_id', $order_id);
        $this->db->where('is_successful', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        $Transaction=@$query->result()[0];

        if (intval(@$Transaction->ID)==1) {
            $this->returnError(403, true, 'تراکنش قبلا با موفقیت انجام شده است.');
            exit;
        }

        //Check Token
        $User=$this->checkToken(REQUIRED, CUSTOM, $token);



        //Cancle Previos Payment Requests For This Order
        $this->db->query("UPDATE `transaction_manager` SET `expire_date`=0 WHERE `order_id`='$order_id'");

        if ($gateway>=0) {

        //Check Gateway
            $this->db->select('ID,title,title_en');
            $this->db->from('transaction_gateways');
            $this->db->where('is_active', 1);
            if ($gateway>0) {
                $this->db->where('gateway_id', $gateway);
            } else {
                //Select Random Gateway
                $this->db->order_by('rand()');
            }
            $this->db->limit(1);
            $query = $this->db->get();
            $GatewayX=@$query->result()[0];

            if (intval(@$GatewayX->ID)==0) {
                $this->returnError(403, true, 'درگاه پرداخت معتبر نمی باشد');
            }

            $gateway_title_en = $GatewayX->title_en;
        }else{
            if(PAY_WITH_SAMPLE_GATEWAY!=true){
                $this->returnError(403, true, 'امکان استفاده از درگاه آزمایشی وجود ندارد');
            }

            $gateway_title_en="sample";
        }

        //Generate & Save New Request
        $payment_hash=md5(Time()."_".rand(1, 999999999));
        $data = array(
            'hash' => $payment_hash,
            'gateway' => $gateway,
            'order_id' => $order_id,
            'mobile' => $mobile,
            'amount' => $amount,
            'user_id' => $User->ID,
            'desc' => $desc,
            'token' => $token,
            'callback_url' => $callback_url,
            'callback_url_background' => $callback_background,
            'expire_date' => Time()+(20*60),
            'package_name' => $package_name,
        );
        $this->db->insert('transaction_manager', $data);

        $payment_url=WEBSITE_BASE_URL.WEBSITE_API_PATH.'tsm/'.$device.'/'.$gateway_title_en.'/'.$payment_hash;
        return $payment_url;
    }
    public function getTransaction($order_id, $transition_id=0, $user_id){
        //Check Transaction For Previous Successful
        $this->db->select('ID,is_successful,order_id,is_order_delivered,deliver_date,gateway,amount,user_id,package_name,device,date_created');
        $this->db->from('transaction_manager');
        if($transition_id>0){
            $this->db->where('ID', $transition_id);
            $this->db->where('user_id', $user_id);
        }else{
            $this->db->where('order_id', $order_id);
            $this->db->where('user_id', $user_id);
        }
        $this->db->order_by('ID', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $Transaction=@$query->result()[0];


        $result=array(
            "is_valid_transaction" => false,
            "is_successful" => false,
            "is_order_delivered" => false,
            "deliver_date" => 0,
            "gateway" => null,
            "order_id" => 0,
            "amount" => 0,
            "user_id" => 0,
            "package_name" => null,
            "device" => null,
            "date_created" => 0,
        );

        if(intval(@$Transaction->ID)>0){
            $result['is_valid_transaction']=true;
            $result['is_successful']=boolval($Transaction->is_successful);
            $result['is_order_delivered']=($Transaction->is_order_delivered);
            $result['deliver_date']=($Transaction->deliver_date);
            $result['gateway']=$Transaction->gateway;
            $result['amount']=$Transaction->amount;
            $result['user_id']=$Transaction->user_id;
            $result['order_id']=$Transaction->order_id;
            $result['package_name']=$Transaction->package_name;
            $result['device']=$Transaction->device;
            $result['date_created']=strtotime($Transaction->date_created);
        }

        return $result;
    }
    public function deliverTransactionOrder($transaction_id){
        $this->db->query("UPDATE `transaction_manager` SET `is_order_delivered`=1, `deliver_date`='".Time()."' WHERE `ID`='$transaction_id'");
    }




    public function ticketStatusManager($status)
    {
        $ticket_statuses = array(
            0 => array('در انتظار پاسخ', '#990200'),
            1 => array('در حال بررسی', '#0052ce'),
            2 => array('پاسخ داده شده', '#0c9900'),
            3 => array('بسته شده', '#515151')
        );
        return $ticket_statuses[$status];
    }

    public function english($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];
    
        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);
    
        return $englishNumbersOnly;
    }

    public function get($input, $is_required=0, $type=0)
    {
        if ($is_required==1) {
            $this->validation->check($this->english($this->input->get($input)), $input, $type);
        }
        return Trim($this->english($this->input->get($input)));
    }
    public function post($input, $is_required=0, $type=0)
    {
        if ($is_required==1) {
            $this->validation->check($this->english($this->input->post($input)), $input, $type);
        }
        return Trim($this->english($this->input->post($input)));
    }


    public function returnJSON($object, $dialog=null)
    {
        header('Content-Type: application/json');
        echo json_encode(array(
            'data' => $object,
            'response' => $dialog
        ));
    }

    public function isAddonQuestionAnswered($addonData, $addonID)
    {
        foreach (json_decode($addonData) as $data) {
            if ($data->addonID==$addonID) {
                return $data;
                break;
            }
        }
        return false;
    }

    public function generateAccountID()
    {
        $this->load->model('Users');

        $account_id=rand(10000000000, 99999999999);

        $Users = new Users();
        $Users->loadByField('account_id', $account_id);

        if (intval($Users->ID)>0) {
            return generateAccountID();
        } else {
            return $account_id;
        }
    }

    public function checkToken($is_required=0, $method=1, $token='')
    {
        if ($method==1) {
            $method='post';
        } elseif ($method==3) {
            //Header Check
        } elseif ($method==4) {
            $method='custom';
        } else {
            $method='get';
        }
        if ($method=='get' || $method=='post') {
            $token=Trim($this->input->$method("token"));
        } elseif ($method='custom') {
            $token=Trim($token);
        }
        $tokenHasError=false;
        $tokenIsValid=false;

        if ($is_required==1 && strlen($token)<5) {
            $tokenHasError=true;
        }

        if ($tokenHasError==false) {
            $this->load->model('UserTokens');

            $UserTokens=new UserTokens();
            $UserTokens->loadByMultiField(array("token" => $token, "is_expired" => 0, "is_logout" => 0));

            if (intval($UserTokens->ID)==0) {
                $tokenHasError=true;
            } else {
                $tokenIsValid=true;
            }
        }
        if ($tokenIsValid) {
            $this->load->model('UsersLight');

            $User=new UsersLight();
            $User->loadByField('account_id', $UserTokens->account_id);
            return $User;
        }

        if ($tokenHasError && $is_required==1) {
            $this->returnError(403, true, 'Invalid Token');
            exit;
        }
    }

    public function imagePath($filename, $width, $height=null, $type=PNG, $path=PORTAL_FILE_UPLOAD_DIR)
    {
        //$filename="https://placeimg.com/$width/$height/tech";
        $filename=WEBSITE_BASE_URL.str_replace('./', '', $path).$filename;
        return $filename;
    }

    public function filePath($filename, $path=PORTAL_FILE_UPLOAD_DIR)
    {
        $filename=WEBSITE_BASE_URL.str_replace('./', '', $path).$filename;
        return $filename;
    }


    public function getProduct($product_id)
    {
        if (intval($product_id)>0) {
            $this->load->model('Products');
            $Products = new Products();
            $Products->load($product_id);

            //Check Existance
            if (intval($Products->ID)==0) {
                $this->returnError(404, true, 'Product Not Found');
            }

            return $Products;
        }
    }

    public function checkDiscount($token, $discount_code, $total_amount, $user_id)
    {
        $result=null;
        if (strlen($discount_code)>1) {
            $this->load->model('DiscountCode');

            $result=new \stdClass();
            $result->is_discount_valid=false;
            $result->discount_title='';
            $result->discount_amount=0;
            $result->used_by_user=false;

            $DiscountCode= new DiscountCode();
            $DiscountCode->loadByField('discount_code', $discount_code);

            if (intval($DiscountCode->ID)>0) {
                if ($DiscountCode->used_amount<$DiscountCode->usage_limit && $DiscountCode->expire_date>Time()) {

                    //Check User used it or not
                    $this->load->model('OrderLogs');

                    $OrderLogs = new OrderLogs();
                    $OrderLogs->loadByMultiField(array('user_id'=>$user_id, 'discount_code'=>$discount_code));
                    if (intval($OrderLogs->ID)>0) {
                        $result->used_by_user=true;
                    } else {

                        //Calc Discount
                        $amount_by_percent=$this->util->getPercent($total_amount, $DiscountCode->discount_percent);
                        if ($amount_by_percent>$DiscountCode->max_amount) {
                            $amount_by_percent=$DiscountCode->max_amount;
                        }

                        $result->is_discount_valid=true;
                        $result->discount_title=$DiscountCode->title;
                        $result->discount_amount=intval($amount_by_percent);
                    }
                }
            }
        }

        return $result;
    }
    public function getTotalCountSearch($table,$search_query,$data2,$type_design,$data)
    {

        // print_r(@$data['product_used']);
        // die();

        $this->db->select('ID');
        $this->db->from($table);
        if(strlen(@$data['cat'])>0)
        $this->db->where('visha_product.menu_sub_cat_id', @$data['cat']);
        if(strlen(@$data['product_used'])>0)
        $this->db->where('visha_product.product_used', @$data['product_used']);
        if(strlen($search_query)>1)
        $this->db->like('visha_product.title', $search_query,'both');
        if(strlen(@$color)>0)
        $this->db->like('visha_product.product_color', $color,'both');
        if(strlen(@$data->season)>0)
        $this->db->like('visha_product.season', $season,'both');
        if(strlen($type_design)>0)
        $this->db->like('visha_product.type_design', $type_design,'both');
        if(@$data->type==2)
        $this->db->order_by("visha_product.price", "desc");
        if(@$data->type==3)
        $this->db->order_by("visha_product.price", "asc");
  
        // foreach ($where as $key => $value) {
        //     $this->db->{$search_method}($key, $value);
        // }
        $total_count = $this->db->count_all_results();

        return $total_count;
    }
    public function getTotalCount($table, $where=array(), $search_method="where")
    {
        $this->db->select('ID');
        $this->db->from($table);
        foreach ($where as $key => $value) {
            $this->db->{$search_method}($key, $value);
        }
        $total_count = $this->db->count_all_results();

        return $total_count;
    }

    public function Method($method)
    {
        if (ENABLE_CUNSTRUCTION_MODE) {
            $this->returnError(200, true, CUNSTRUCTION_MESSAGE);
            exit;
        }
        switch ($method) {
            case 1:
                $mt="post";
                break;
            case 2:
                $mt="get";
                break;

        }

        if ($this->input->method()!=$mt) {
            header("HTTP/1.0 405 Method Not Allowed");
            echo "Method Not Allowed";
            exit();
        }
    }

    public function returnError($status, $showDialog, $message)
    {
        //http_response_code($status);
        echo $this->returnJSON(null, $this->responseDialog($status, $showDialog, $message));
        exit;
    }

    public function responseDialog($status, $showDialog, $message, $url='', $can_dismiss=true)
    {
        return array(
            'status' => $status,
            'show_dialog' => $showDialog,
            'message' => $message,
            'positive_btn' => 'OK',
            'negative_btn' => 'Cancel',
            'positive_url' => $url,
            'can_dismiss' => $can_dismiss
        );
    }
}
