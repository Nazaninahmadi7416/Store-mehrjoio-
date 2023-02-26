<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Developed by iziapp.ir
class Store extends MY_Controller {

    public function Home(){
     $this->Method(POST);
            // برای پرفروش ترین محصولات
            $this->db->select('ID','img','title');
            $this->db->from('store_product');
            
            // $this->db->where('on_mainPage',1);
            $this->db->limit(6);

            $query_sellproduct = $this->db->get();
            foreach ($query_sellproduct->result() as $value) {
                    $sellproduct[]=array(
                    "ID"=>@$value->ID,
                    "title"=>@$value->title,
                    "short_desc"=>@$value->short_desc,
                    "img"=>$this->imagePath(@$value->img1, 256, 256, PNG),
                );
            }

            //  برای جدیدترین  محصولات
            $this->db->select('ID','img','title');
            $this->db->from('store_product');
            $this->db->where('on_mainPage',1);
            $this->db->order_by("timestamp","ID");
            $this->db->limit(10);
            $query_newproduct = $this->db->get();
            foreach ($query_newproduct->result() as $value) {
              $newproduct[]=array(
                 "ID"=>@$value->ID,
                 "title"=>@$value->title,
                 "img"=>$this->imagePath(@$value->img1, 256, 256, PNG),
                 "desc"=>@$value->desc,
               );
            
            }
            // برای بنر
            $this->db->select('ID','img');
            $this->db->from('store_baner');
            $query_baner = $this->db->get();
            foreach ($query_baner->result() as $value) {
              $baner[]=array(
                 "ID"=>@$value->ID,
                 "img"=>$this->imagePath(@$value->img, 256, 256, PNG),
                 
               );
            
            }

           
             $json['baner']= $baner;
             $json['sellproduct']= $sellproduct;
             $json['newproduct']= $newproduct;
        
             $this->returnJSON($json, 
             $this->responseDialog(200, false, '')
             );
    

    }

    public function getMain(){

        $mainJson=array(
            ["id"=>1,
            "title"=>"پرفروش ترین محصولات",
             "type"=>"1",
             "action"=>"#productlist",
             "img"=>"",
             "slider"=>array(),
             "list"=>array(
                [
                    "id"=>1,
                    "title"=>"خربزه مشهدی",
                    "img"=>"https://s6.uupload.ir/files/download_u1tq.jpg",
                    "price"=>400000,
                    "count"=>2000,
                    "desc"=>"از نزیت هایخربزه مشهدی این است که شما جیش تان میگیرد"

                ],
                [
                    "id"=>2,
                    "title"=>"خربزه مشهدی",
                    "img"=>"https://s6.uupload.ir/files/download_u1tq.jpg",
                    "price"=>400000,
                    "count"=>2000,
                    "desc"=>"از نزیت هایخربزه مشهدی این است که شما جیش تان میگیرد"

                ],
                [
                    "id"=>3,
                    "title"=>"خربزه مشهدی",
                    "img"=>"https://s6.uupload.ir/files/download_u1tq.jpg",
                    "price"=>400000,
                    "count"=>2000,
                    "desc"=>"از نزیت هایخربزه مشهدی این است که شما جیش تان میگیرد"

                ],
                [
                    "id"=>4,
                    "title"=>"خربزه مشهدی",
                    "img"=>"https://s6.uupload.ir/files/download_u1tq.jpg",
                    "price"=>400000,
                    "count"=>2000,
                    "desc"=>"از نزیت هایخربزه مشهدی این است که شما جیش تان میگیرد"

                ],                [
                    "id"=>5,
                    "title"=>"خربزه مشهدی",
                    "img"=>"https://s6.uupload.ir/files/download_u1tq.jpg",
                    "price"=>400000,
                    "count"=>2000,
                    "desc"=>"از نزیت هایخربزه مشهدی این است که شما جیش تان میگیرد"

                ],
             )
        
        ],
        ["id"=>2,
        "title"=>"بنر",
         "type"=>"2",
         "action"=>"#productlist",
         "slider"=>array(),
         "img"=>"https://s6.uupload.ir/files/gruntowa-uprawa-arbuza2780_x8cj.jpg",
         "list"=>array(
            [
                "id"=>1,
                "title"=>"خربزه مشهدی",
                "img"=>"https://s6.uupload.ir/files/download_u1tq.jpg",
                "price"=>400000,
                "count"=>2000,
                "desc"=>""

            ],
         )
    
    ],
    ["id"=>1,
    "title"=>"بی گردن ترین محصولات",
     "type"=>"1",
     "action"=>"#productlist",
     "img"=>"",
     "slider"=>array(),
     "list"=>array(
        [
            "id"=>1,
            "title"=>"خربزه مشهدی",
            "img"=>"https://s6.uupload.ir/files/download_u1tq.jpg",
            "price"=>400000,
            "count"=>2000,
            "desc"=>"از نزیت هایخربزه مشهدی این است که شما جیش تان میگیرد"

        ],
        [
            "id"=>2,
            "title"=>"خربزه مشهدی",
            "img"=>"https://s6.uupload.ir/files/download_u1tq.jpg",
            "price"=>400000,
            "count"=>2000,
            "desc"=>"از نزیت هایخربزه مشهدی این است که شما جیش تان میگیرد"

        ],
        [
            "id"=>3,
            "title"=>"خربزه مشهدی",
            "img"=>"https://s6.uupload.ir/files/download_u1tq.jpg",
            "price"=>400000,
            "count"=>2000,
            "desc"=>"از نزیت هایخربزه مشهدی این است که شما جیش تان میگیرد"

        ],
        [
            "id"=>4,
            "title"=>"خربزه مشهدی",
            "img"=>"https://s6.uupload.ir/files/download_u1tq.jpg",
            "price"=>400000,
            "count"=>2000,
            "desc"=>"از نزیت هایخربزه مشهدی این است که شما جیش تان میگیرد"

        ],                [
            "id"=>5,
            "title"=>"خربزه مشهدی",
            "img"=>"https://s6.uupload.ir/files/download_u1tq.jpg",
            "price"=>400000,
            "count"=>2000,
            "desc"=>"از نزیت هایخربزه مشهدی این است که شما جیش تان میگیرد"

        ],
     )

],
["id"=>3,
"title"=>"پرفروش ترین محصولات",
 "type"=>"3",
 "action"=>"#productlist",
 "img"=>"",
 "slider"=>array(
    [
        "id"=>1,
        "title"=>"عنوان اسلایدر ",
        "img"=>"https://s6.uupload.ir/files/gruntowa-uprawa-arbuza2780_x8cj.jpg",
        "action"=>"#opencat&id=5",

    ],
    [
        "id"=>2,
        "title"=>"عنوان اسلایدر ",
        "img"=>"https://s6.uupload.ir/files/gruntowa-uprawa-arbuza2780_x8cj.jpg",
        "action"=>"#opencat&id=5",

    ],
    [
        "id"=>3,
        "title"=>"عنوان اسلایدر ",
        "img"=>"https://s6.uupload.ir/files/gruntowa-uprawa-arbuza2780_x8cj.jpg",
        "action"=>"#opencat&id=5",

    ],
    [
        "id"=>4,
        "title"=>"عنوان اسلایدر ",
        "img"=>"https://s6.uupload.ir/files/gruntowa-uprawa-arbuza2780_x8cj.jpg",
        "action"=>"#opencat&id=5",

    ],
 ),
 "list"=>array()

   ],

        
        );


        $json=$mainJson;
        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );
    }
   //صفحه اصلی
   public function getMaine(){
    $this->Method(POST);
    $total_count=$this->getTotalCount('store_product');

    //برای اسلادر جدید ترین ها
    $this->db->select('*');
    $this->db->from('store_product');
    $this->db->order_by("timestamp","desc_short");
    $this->db->limit(12, (intval($page)-1)*12);
    $query_newproduct = $this->db->get();
    foreach ($query_newproduct ->result() as $value) {
      
            $newproduct_list[]=array(
            "ID"=>@$value->ID,
            "title"=>@$value->title,
            "price"=>@$value->price,
            "img"=>$this->imagePath(@$value->img1, 256, 256, PNG),
            "desc_short"=>@$value->desc_short,
           
        
        );


    }

    $response= array(
        'status' => "200",
        'show_dialog' => false,
        'message' => "",
        'positive_btn' => 'OK',
        'negative_btn' => 'Cancel',
        'positive_url' => "",
        'can_dismiss' => ""
    );

      $json['response']=$response;
      $json['newproduct_list']=$newproduct_list;
      //   $json['total_count']=$total_count;
     // $json['content']=$content;


     $this->returnJSON($json, 
     $this->responseDialog(200, false, '')
     );
  }

  // لیست محصولات
  public function productList(){
    $this->Method(POST);
    $total_count=$this->getTotalCount('store_product');

    // $page = $this->post('page', REQUIRED, TEXT); 
    // if($page==0){
    //     $page=1;
    // }

    $this->db->select('*');
    $this->db->from('store_product');
    // $this->db->limit(12, (intval($page)-1)*12);
    // $this->db->order_by("timestamp","desc");
    $query_product = $this->db->get();
    foreach ($query_product->result() as $value) {
      
            $product_list[]=array(
            "ID"=>@$value->ID,
            "title"=>@$value->title,
            "price"=>@$value->price,
            "img1"=>$this->imagePath(@$value->img1, 256, 256, PNG),
            "desc_short"=>@$value->desc_short,
           
        
        );


    }

    $response= array(
        'status' => "200",
        'show_dialog' => false,
        'message' => "",
        'positive_btn' => 'OK',
        'negative_btn' => 'Cancel',
        'positive_url' => "",
        'can_dismiss' => ""
    );

      $json['response']=$response;
      $json['product_list']=$product_list;
      $json['total_count']=$total_count;
     // $json['content']=$content;


     $this->returnJSON($json, 
     $this->responseDialog(200, false, '')
     );
  }
   
 //جزییات محصول
 public function productDetail(){
        
    $this->Method(POST);
    // $token = $this->post('token', REQUIRED, TEXT); 
    $product_id = $this->post('product_id', REQUIRED, TEXT); 

    $this->db->select('*');
    $this->db->from('store_product');
    $this->db->where('ID',$product_id);
    // $this->db->limit(10);
    // $detail_taavoni=array();
    // $ads_list=array();

    $query_product = $this->db->get();
    $result_product=@$query_product->result()[0];
    // die($this->db->last_query());
    if(intval(@$result_product->ID)>0){
        $detail_product=array(
            "ID"=>@$result_product->ID,
            "title"=>@$result_product->title,
            "rate"=>@$result_product->rate,
            "img1"=>$this->imagePath(@$result_product->img1, 256, 256, PNG),
            "img2"=>$this->imagePath(@$result_product->img2, 256, 256, PNG),
            "img3"=>$this->imagePath(@$result_product->img3, 256, 256, PNG),
            "img4"=>$this->imagePath(@$result_product->img4, 256, 256, PNG),
            "desc_short"=>@$result_product->desc_short,);
    }
    $response= array(
        'status' => "200",
        'show_dialog' => false,
        'message' => "",
        'positive_btn' => 'OK',
        'negative_btn' => 'Cancel',
        'positive_url' => "",
        'can_dismiss' => ""
    );

    $json['response']=$response;
    $json['detail_product']=$detail_product;
  
    $this->returnJSON($json, 
    $this->responseDialog(200, false, '')
    );




}
// for addbasket
public function addBasket(){
        
    $this->Method(POST);
    $token=$this->post('token');
    $User=$this->checkToken(REQUIRED);
    $p_id=$this->post('p_id');

   
    $query = $this->db->get();
    $list=$query->result()[0];
    $basket_arr=explode(',', $list->p_id);
    foreach ($basket_arr as $value) {
       

        $basket=array(
            'p_id' =>$value,
            'user_id' =>$User->ID,
            'timestamps'=>Time(),
        );
        $this->db->insert('user_basket', $basket); 
    }
    $this->returnJSON($json, 
    $this->responseDialog(200, false, '')
    );
}

// for deliteBasket
public function deleteBasket(){
    $this->Method(POST);

    $user_id=$this->post('user_id');
    $id=$this->post('id');
    $token=$this->post('token');

    $this->db->query("DELETE FROM `user_basket` WHERE `user_id`='".$id."' AND `token`='".$token."'");


    $json['status']=200;


    $this->returnJSON($json, 
    $this->responseDialog(200, false, '')
    );
}
//for list basket
public function getbasketlist(){
    $this->Method(POST);


    $token=$this->post('token');
    $User=$this->checkToken(REQUIRED);
        

    /// userbasket && product

    $this->db->select('user_basket.ID,user_basket.product_id
        ,user_products.number,visha_product.title,visha_product.price
        ,visha_product.img1,user_products.color
        ,visha_product.available_in_stock,user_products.number
        ,visha_product.newprice,visha_product.percent_offer,user_products.giftwrapping
        ,visha_product.ID as product_id,user_products.gift_id,user_products.giftwrapping
        ,visha_product.img2,visha_product.img3,visha_product.img4,visha_product.img5
        ,visha_product.img6,visha_product.img7,visha_product.img8,visha_product.img9,visha_product.color_id_img1
        ,visha_product.color_id_img2,visha_product.color_id_img3,visha_product.color_id_img4
        ,visha_product.color_id_img5,visha_product.color_id_img6
        ,visha_product.color_id_img7,visha_product.color_id_img8,visha_product.color_id_img9');
        $this->db->from('user_products');
        $this->db->join('visha_product', 'user_products.product_id = visha_product.ID','left');
        $this->db->where('user_product',$User->ID);
}
//برای آپدیت ورژن
public function checkUpdate(){
    $this->Method(POST);
    $version_code = $this->post('version_code'); 
    $minversion=1;
    // $force_update
    if(intval(@$version_code)<$minversion){
      // $this->versionUpdateUrl();
      $update=array(
        "has_update"=> true,
        "update_url"=>"",
        "force_update"=>true
      );
    }else{
      $update=array(
        "has_update"=> false,
        "update_url"=>"",
        "force_update"=>false
    );
    }


    $json['update']=$update;

    $this->returnJSON($json, 
    $this->responseDialog(200, false, '')
    );

  }

// برای درگاه پرداخت

public function testpayment(){

    $link=$this->getPayUrl("4d70cb152230b08aeffbd2965db2a6a6","5","23","5",'web',"10000","1","09194320992","1","3");

    $json['status']=200;
    $json['link']=$link;
    $this->returnJSON($json, 
    $this->responseDialog(200, false, '')
    );

}
public function getPaymentDtl(){

    $token=$this->post('token');
    $id=$this->post('id');

    $this->db->select('price,ID');
    $this->db->from('store_product');
    $this->db->where('ID',$id);
    $this->db->limit(1);
   
    // $detail_taavoni=array();
    // $ads_list=array();

    $query_product = $this->db->get();
    $result_product=@$query_product->result()[0];
    // die($this->db->last_query());
    $price=$result_product->price;

    $link=$this->getPayUrl($token,$id,"23","5",'web',$price,"1","09194320992","1","3");

    $json['status']=200;
    $json['link']=$link;
    $this->returnJSON($json, 
    $this->responseDialog(200, false, '')
    );
}


public function getPayUrl($token,$product_id,$color_ids,$count_product,$os,$final_price,$addreessidz,$mobile,$gift_id,$vocher){
       
    $url= $this->payment($token,$product_id,$color_ids,$count_product,$os,$final_price,$addreessidz,$mobile,$gift_id,$vocher);
    return  $url;
    // $this->load->helper('url');
    // redirect($url) ;
}



public function payment($token,$product_ids,$color_ids,$count_product
,$os,$final_price,$addreess_idz,$mobile,$gift_ids,$vocher){

        // $token="5001bf197db0b0123f090eb573056348";
    // Get price product
    // $this->db->select('*');
    // $this->db->from('iziapp_product');
    // $this->db->where('ID',$product_id);
    // $query = $this->db->get();
    // $product=@$query->result()[0];

    // //   die($this->db->last_query());

    // if(intval($product->ID)>0)
    // $final_price=$product->price;
    // else  $this->returnError(404, true, 'تراکنش معتبر نمی باشد');

    //Generate Order
    // $data = array(
    //     'status' => 0 ,
    //     'final_price' => $final_price ,
    //     'user_id' => 0 ,
    //     'token' => $token ,
    //     'ad_id' => $product_id ,
    //     'product_idz' => $product_id ,
    //     'time'	=>  Time() ,
    //  );
    if(strlen($token)>0)
    $User=$this->checkToken(REQUIRED);
    $data = array(
        'status' => 0 ,
        'final_price' => $final_price ,
        'user_id' => 2,
        'token' => 'ihjgtrvcty7ij8' ,
        'ad_id' => "5" ,
        'product_idz' => "5" ,
        'color_ids' => "5" ,
        'count_product' => "10" ,
        'addreess_idz' => "1" ,
        
        'time'	=>  Time() ,
     );
     $this->db->insert('prime_orders', $data); 
     $order_id = $this->db->insert_id();


     //Save OrderID in Cookie
    $this->setCookie('_order_id', $order_id);


    $callback_background=str_replace(':8080', '', WEBSITE_BASE_URL).WEBSITE_API_PATH."visha/savePurchase";
    $callback="https://yerbyer.com/Home/login"."/pay/callback";
        
    if(PAY_WITH_SAMPLE_GATEWAY){
        $gateway_type=GATEWAY_SAMPLE;
    }else{
        $gateway_type=GATEWAY_ZARINPAL;
    }
    $payment_url="";
    if($os=="react-android")
    $payment_url=$this->getPaymentURL($token, $gateway_type, $order_id,$mobile, $final_price, 'شماره فاکتور '.$order_id, '', GATEWAY_DEVICE_ANDROID, $callback, $callback_background);
    else if($os=="react-ios")
    $payment_url=$this->getPaymentURL($token, $gateway_type, $order_id,$mobile, $final_price, 'شماره فاکتور '.$order_id, '', GATEWAY_DEVICE_IOS, $callback, $callback_background);
    else if($os=="android")
    $payment_url=$this->getPaymentURL($token, $gateway_type, $order_id,$mobile, $final_price, 'شماره فاکتور '.$order_id, '', GATEWAY_DEVICE_ANDROID, $callback, $callback_background);
    else if($os=="web")
    $payment_url=$this->getPaymentURL($token, $gateway_type, $order_id,$mobile, $final_price, 'شماره فاکتور '.$order_id, '', GATEWAY_DEVICE_WEBSITE, $callback, $callback_background);

   
    return $payment_url;


}

public function testOrder(){

    $this->db->select('ID,product_idz,transaction_id');
    $this->db->from('prime_orders');
    $this->db->where('transaction_id',678);
     $query = $this->db->get();
     $list=$query->result()[0];
    // print_r("final_price ".$list->product_idz);
    // die();

    $order_arr=explode(',', $list->product_idz);
    foreach ($order_arr as $value) 
        {
            $data = array( 
                'purchase_date'	=>  Time() , 
            );
            $this->db->where('ID',$value);
            $this->db->where('user_id', 26);
            $this->db->update('user_products', $data);
            // print_r("value".$value."\n");
           
        }
        die($this->db->last_query());
        die();
}

public function savePurchase(){

    $this->Method(POST);
    $User=$this->checkToken(REQUIRED);

    $status = $this->post('status'); //success,failed,canceled
    $amount = $this->post('amount', REQUIRED, NUMBER);
    $order_id = $this->post('order_id', REQUIRED, NUMBER);
    $token = $this->post('token', REQUIRED, TEXT);
    $transaction_id = $this->post('transaction_id', REQUIRED, NUMBER);
    $gateway = $this->post('gateway', REQUIRED, TEXT);

    //Validate Transaction
    $Transition=$this->getTransaction(0, $transaction_id, $User->ID);
  
    if ($Transition['is_valid_transaction']==false) {
        $this->returnError(404, true, 'تراکنش معتبر نمی باشد');
    }

    $ts_amount=$Transition['amount'];
    $ts_user_id=$Transition['user_id'];
    $ts_order_id=$Transition['order_id'];
    $is_order_delivered=$Transition['is_order_delivered'];
    // log_message('error', 'data :   ==> '.$User->ID." transaction_id ==> ".$Transition);
    //Update Order



    if ($ts_amount!=$amount) {
        $this->returnError(403, true, 'Invalid Amount');
    }
    if ($is_order_delivered==0) {
        if ($Transition['is_successful']) {
            //Successful Payment
            $this->deliverTransactionOrder($transaction_id);
  
            $order_status=1;
        } else {
            //Failed Payment
            $order_status=3;
        }

    }

    $data = array( 
        'status'	=>  $order_status , 
        'transaction_id'	=>  $transaction_id , 
        'status_product'	=>  1 , 
        'time'	=>  Time() , 
    );
    $this->db->where('ID', $order_id);
    $this->db->update('prime_orders', $data);

    if($order_status==1){
        $this->sendSmsForUser($User->mobile);
        $this->saveOrder($transaction_id,$User);
    }
   
}

public function sendSmsForUser($number){
            $curl = curl_init();
            $str="کاربر گرامی به شماره".$number."با تشکر از خرید شما ";
            $message= "".$str;
            $message=urlencode(trim($message));
            
    $urltest='http://payamland.ir//getCustomer.aspx?mobile='.$number.'&message='.$message.'&senderNumber=50004080303030&username=msgadmin20447&pass=16643&code=10769';
    curl_setopt_array($curl, array(
    CURLOPT_URL =>$urltest ,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Cookie: ASP.NET_SessionId=1ptf0zaaasuaqbwcirzc3tc4'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
}

public function saveOrder($transaction_id,$User){

     // Get price product
     $this->db->select('ID,product_idz,transaction_id');
     $this->db->from('prime_orders');
     $this->db->where('transaction_id',$transaction_id);
      $query = $this->db->get();
      $list=$query->result()[0];
     // print_r("final_price ".$list->product_idz);
     // die();

     $order_arr=explode(',', $list->product_idz);
     foreach ($order_arr as $value) 
         {
             $data = array( 
                 'purchase_date'	=>  Time() , 
             );
             $this->db->where('ID',$value);
             $this->db->where('user_id', $User->ID);
             $this->db->update('user_products', $data);
         }
        // $this->db->query("UPDATE `user_products` SET `purchase_date` = `1234567`. WHERE `ID`=.$User->ID AND `ID`=.$User->ID" );
}

   

   
    // برای اسلایدر صفحه اصلی
    public function generateSlides(){
        $this->Method(GET);
        $this->db->select('ID,image,url,title_slider');
        $this->db->from('');
        $this->db->order_by("ID", "desc");
        $queryslider = $this->db->get();
            $slider=array();
            foreach ($queryslider->result() as $value) {
                $slider[]=array(
                    'ID' => @$value->ID,
                    'title'=>@$value->title_slider,
                    'image'=>$this->imagePath(@$value->image, 256, 256, PNG),
                    'url'=>@$value->url,
                );
            }

            $json['slider']=$slider;

            $this->returnJSON($json, 
            $this->responseDialog(200, false, '')
            );

 }
 
    



}
?>