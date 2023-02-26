<?php


class MY_Portal extends CI_Controller
{
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

    public function price_helper($price)
    {
        return number_format($price)." تومان";
    }

    public function ticket_status_helper($status)
    {
        switch ($status) {
                case 0:
                return '<div style="color:red">در انتظار پاسخ</div>';
                break;

                case 1:
                return '<div style="color:blue">در حال  بررسی</div>';
                break;

                case 2:
                return '<div style="color:orange">پاسخ داده شده</div>';
                break;

                case 3:
                return '<div style="color:grey">بسته شده</div>';
                break;

                default:
                return '<div style="color:orange">نامشخص</div>';
                break;
        }
    }

    public function is_published_helper($is_published)
    {
        switch ($is_published) {
            case 0:
                return '<div style="color:grey">منتشر نشده</div>';
                break;

                case 1:
                return '<div style="color:green">منتشر شده</div>';
                break;
            
                default:
                return '<div style="color:orange">نامشخص</div>';
                break;
        }
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

    public function getTotalCountQuery($query)
    {
        $query=explode('FROM', $query);
        $query="SELECT COUNT(*) FROM ".$query[1];
        $query=explode('LIMIT', $query);
        $query=$query[0];
        $queryx=$this->db->query($query);
        $result = $queryx->row_array();
        $total_count = $result['COUNT(*)'];

        return $total_count;
    }

    public function getSum($table, $field, $where=array(), $search_method="where")
    {
        $this->db->select_sum($field);
        $this->db->from($table);
        foreach ($where as $key => $value) {
            $this->db->{$search_method}($key, $value);
        }
        $this->db->get();
    }

    public function getROW($ID, $table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('ID', $ID);
        $query = $this->db->get();
        return @$query->result()[0];
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


    public function generateQuery($fields, $method=1, $type='insert')
    {
        $final_query="";
        $q_section1="";
        $q_section2="";
        $update_q="";


        $fields_arr=explode(',', Trim($fields, ','));

        $method_func='';
        if ($method==1) {
            $method_func='post';
        } else {
            $method_func='post';
        }

        foreach ($fields_arr as $field) {
            $clean_field=explode('{', $field);
            $clean_field=$clean_field[0];

            $key=$field;
            $value=@$this->{$method_func}($clean_field);
        
            if (is_array($value)) {

            //Multiple Array
                $value=implode(',', $value);
                $q_section1.="`$key`,";
                $q_section2.="'".$value."',";
                $update_q.="`$key`='$value', ";
            } elseif (strpos($key, '{')>0) {

            //Multiple Data
                $field_arr=explode('{', Trim($key, '}'));
                $key=$field_arr[0];
                $value_comma_arr=explode('+', $field_arr[1]);

                $q_section1.="`$key`,";
                $data_val="";

                foreach ($value_comma_arr as $valuex) {
                    $value=@$this->{$method_func}($valuex);
                    $data_val.=$value.",";
                }
                $q_section2.="'".Trim($data_val)."',";
                $update_q.="`$key`='".Trim($data_val)."', ";
            } else {
                //Normal Text/Int
                $q_section1.="`$key`,";
                $q_section2.="'".$value."',";
                $update_q.="`$key`='$value', ";
            }
        }
        if ($type=='insert') {
            $final_query="(".Trim($q_section1, ',').") VALUES (".Trim($q_section2, ',').")";
        } else {
            $final_query=Trim($update_q, ', ');
        }

        return $final_query;
    }


    public function returnJSON($object, $dialog=null)
    {
        header('Content-Type: application/json');
        echo json_encode(array(
        'data' => $object,
        'response' => $dialog
    ));
    }

    public function checkToken($is_required=1, $method=3)
    {
        if ($method==1) {
            $method='post';
        } elseif ($method==3) {
            $method='header';
        } else {
            $method='get';
        }

        if ($method=='header') {
            $header_data=$this->input->request_headers();
            $token=Trim($header_data["Token"]);
        } else {
            $token=Trim($this->input->$method("token"));
        }
        //die('token:'.$token);
        $tokenHasError=false;
        $tokenIsValid=false;

        if ($is_required==1 && strlen($token)<5) {
            $tokenHasError=true;
        }

        if ($is_required==1 && $tokenHasError==false) {
            $this->load->model('portal/AdminTokens');

            $AdminTokens=new AdminTokens();
            $AdminTokens->loadByMultiField(array("token" => $token, "is_expired" => 0));

            if (intval($AdminTokens->ID)==0) {
                $tokenHasError=true;
            } else {
                $tokenIsValid=true;
            }
        }

        if ($tokenIsValid) {
            $this->load->model('portal/Admins');

            $Admins=new Admins();
            $Admins->loadByField('ID', $AdminTokens->admin_id);
            return $Admins;
        }

        if ($tokenHasError && $is_required==1) {
            $this->returnError(403, 'login', true, 'Invalid Token');
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

    public function returnError($status, $redirect_url, $showDialog, $message)
    {
        //http_response_code($status);
        echo $this->returnJSON(null, $this->responseDialog($status, $redirect_url, $showDialog, $message));
        exit;
    }

    public function responseDialog($status, $redirect_url, $showDialog, $message='', $url='', $can_dismiss=true)
    {
        return array(
        'status' => $status,
        'redirect_url' => $redirect_url,
        'show_dialog' => $showDialog,
        'message' => $message,
        'positive_btn' => 'OK',
        'negative_btn' => 'Cancel',
        'positive_url' => $url,
        'can_dismiss' => $can_dismiss
    );
    }
}
