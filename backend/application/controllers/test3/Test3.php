<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Developed by iziapp.ir
class Test3 extends MY_Controller {

    public function joinexampletest3(){
        $this->Method(POST);
  
        //Get Device Information
  
        $mobile = $this->post('mobile'); 
        $city = $this->post('city'); 
        $search_query = $this->post('query'); 
  
      //     //    get Menu 
      $this->db->select('khane_city.ID,khane_city.title as ptitle,khane_city.state_id,
      khanedan_ads.ID ,khanedan_ads.user_id,khanedan_ads.city,khanedan_ads.metrics_based_price');
      $this->db->from('khanedan_ads');
      $this->db->join('khane_city', 'khanedan_ads.city = khane_city.state_id','left');
      $this->db->where('khanedan_ads.city',$city);
      $this->db->where('khanedan_ads.metrics_based_price>',500000000);
      $this->db->where('khanedan_ads.metrics_based_price<',100000000);
      // $this->db->or_where('is_mobile_verified',1);
      // $this->db->where('is_mobile_verified',1);
      // $this->db->like('fullname',$search_query);
    //   $this->db->order_by("ID", "asc");
      $queryuser = $this->db->get();
      // die($this->db->last_query());
      $user=@$queryuser->result()[0];
  
  
      // $testjson[]=array(
        
      //   "key"=>"value",
      //   "key1"=>"value",
      //   "key2"=>"value",
      //   "key3"=>"value",
      // );
  
      // $testjson[]=array(
        
      //   "key"=>"value",
      //   "key1"=>"value",
      //   "key2"=>"value",
      //   "key3"=>"value",
      // );
  
        // $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');
  
        $json['result']=$user;
       
    
        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );
  // 
      }

      public function examplejsonresult3(){
        $this->Method(POST);
      
      $this->db->select('metrics_based_price,city');
      $this->db->from('khanedan_ads');
      $query_product_used = $this->db->get();
      // $result_product_used=@$query_product_used->result();
      $product_used=array();
      foreach ($query_product_used->result() as $value) {
          $product_used[]=array(
              
              'metrics_based_price'=>@$value->metrics_based_price,
              'city'=>@$value->city,
          );
      
        }
  
        $this->db->select('metrics_based_price,city');
        $this->db->from('khanedan_ads');
        $query_product_used_sogra = $this->db->get();
        // $result_product_used=@$query_product_used->result();
        $product_used_sogra=array();
        foreach ($query_product_used_sogra->result() as $value) {
            $product_used_sogra[]=array(
                
                'metrics_based_price'=>@$value->metrics_based_price,
                'city'=>@$value->city,
            );
        
          }
     
  
        $json['aghdas']=$product_used;
        $json['sogra']=$product_used;
       
       
       
    
        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );
      }
                 
                 
      public function searchvisha3(){
        $this->Method(POST);
      
        $search_query = $this->post('query'); 
        $metr = $this->post('metr'); 
        $price = $this->post('price'); 
        $date = $this->post('date'); 
       
        



        $this->db->select('khanedan_ads.ID,khanedan_ads.desc_ads,khanedan_ads.metr,khanedan_ads.title,khanedan_ads.price,khanedan_ads.date,khanedan_ads.search_query');
       
        if(strlen($search_query)>0)
        $this->db->like('khanedan_ads.title', $search_query,'both');

        if(strlen($search_query)>0)
        $this->db->like('khanedan_ads.desc_ads', $search_query,'both');

        if(strlen($metr)>0)
        $this->db->where('khanedan_ads.metr>', $metr);

        if(strlen($price)>0)
        $this->db->where('khanedan_ads.price', $price);

        if(strlen($date)>0)
        $this->db->like('khanedan_ads.date', $date,'both');
        
       

            $json['result']=$
            $json['count']=$
       
    
            $this->returnJSON($json, 
            $this->responseDialog(200, false, '')
            );



    }



    public function testvisha2(){
        $this->Method(GET);

        //Get Device Information
        $mobile = $this->get('mobile'); 
        $search_query = $this->get('query'); 
  
      //     //    get Menu 
      $this->db->select('fullname,mobile');
      $this->db->from('prime_users');
      $this->db->where('mobile',$mobile);
      $this->db->or_where('is_mobile_verified',1);
      // $this->db->where('is_mobile_verified',1);
      $this->db->like('fullname',$search_query);
    //   $this->db->order_by("ID", "asc");
      $queryuser = $this->db->get();
      $user=@$queryuser->result()[0];
      // die($this->db->last_query());
        // $user=array();
    //   foreach ($querycat->result() as $value) {
    //     $user[]=array(
    //         "mobile"=> @$value->mobile, 
    //     );
    //   }
  
        //   $cat=array();
          
        //   foreach ($querycat->result() as $value) {
        //     $this->db->select('ID,title');
        //     $this->db->from('visha_menu_cat');
        //     $this->db->where('cat_id',@$value->ID);
        //     $this->db->order_by("ID", "asc");
        //     $querysubcat = $this->db->get();
        //     $subcat=array();
        //     foreach ($querysubcat->result() as $values) {
        //         $this->db->select('ID,title');
        //         $this->db->from('visha_menu_sub_cat');
        //         $this->db->where('menu_cat_id',@$values->ID);
        //         $this->db->order_by("ID", "asc");
        //         $querymenusubcat = $this->db->get();
        //         $menusubcat=array();
        //         foreach ($querymenusubcat->result() as $values1) {
        //                     $menusubcat[]=array(
        //                         @$values1->title=> @$values1->ID, 
        //                     );
        //         }
        //         $subcat[]=array(
        //             @$values->title=>$menusubcat,
        //         );
        //     }
        //       $cat[]=array(
        //           'ID' => @$value->ID,
        //           'title'=>@$value->title,
        //           'image'=>$this->imagePath(@$value->image, 256, 256, PNG),
        //           'menu'=>@$subcat,
                 
        //       );
         
        //   }
  
          
          $json['result']=$user;
     
  
          $this->returnJSON($json, 
          $this->responseDialog(200, false, '')
          );


    }

    public function joinexample(){
      $this->Method(POST);

      //Get Device Information
      $mobile = $this->post('mobile'); 
      $search_query = $this->post('query'); 

    //     //    get Menu 
    $this->db->select('prime_users.fullname,prime_users.mobile as pmobile,prime_users.credit,
    yer_property.user_id,yer_property.price,yer_property.	req_id');
    $this->db->from('yer_property');
    $this->db->join('prime_users', 'yer_property.user_id = prime_users.ID','left');
    $this->db->where('yer_property.mobile',$mobile);
    // $this->db->or_where('is_mobile_verified',1);
    // $this->db->where('is_mobile_verified',1);
    // $this->db->like('fullname',$search_query);
  //   $this->db->order_by("ID", "asc");
    $queryuser = $this->db->get();
    die($this->db->last_query());
    $user=@$queryuser->result()[0];

      // $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');

      $json['result']=$user;
     
  
      $this->returnJSON($json, 
      $this->responseDialog(200, false, '')
      );
// 
    }

    public function joinexample2(){
      $this->Method(POST);

      //Get Device Information
      $mobile = $this->post('mobile'); 
      $search_query = $this->post('query'); 

    //     //    get Menu 
    $this->db->select('yer_countries.ID,yer_countries.title as ptitle,yer_countries.timestamp,
    yer_property.country_id,yer_property.price,yer_property.	req_id');
    $this->db->from('yer_property');
    $this->db->join('yer_countries', 'yer_property.country_id = yer_countries.ID','left');
    $this->db->where('yer_property.mobile',$mobile);
    // $this->db->or_where('is_mobile_verified',1);
    // $this->db->where('is_mobile_verified',1);
    // $this->db->like('fullname',$search_query);
  //   $this->db->order_by("ID", "asc");
    $queryuser = $this->db->get();
    die($this->db->last_query());
    $user=@$queryuser->result()[0];

      // $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');

      $json['result']=$user;
     
  
      $this->returnJSON($json, 
      $this->responseDialog(200, false, '')
      );
// 
    }

    public function joinexample3(){
      $this->Method(POST);

      //Get Device Information
      $mobile = $this->post('mobile'); 
      $search_query = $this->post('query'); 

    //     //    get Menu 
    $this->db->select('khane_city.ID,khane_city.title as ptitle,khane_city.state_id,
    yer_property.city_id,yer_property.price,yer_property.	req_id');
    $this->db->from('yer_property');
    $this->db->join('khane_city', 'yer_property.city_id = khane_city.ID','left');
    $this->db->where('yer_property.mobile',$mobile);
    // $this->db->or_where('is_mobile_verified',1);
    // $this->db->where('is_mobile_verified',1);
    // $this->db->like('fullname',$search_query);
  //   $this->db->order_by("ID", "asc");
    $queryuser = $this->db->get();
    die($this->db->last_query());
    $user=@$queryuser->result()[0];

      // $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');

      $json['result']=$user;
     
  
      $this->returnJSON($json, 
      $this->responseDialog(200, false, '')
      );
// 

    }

    // for exampel 2


    public function joinexample4(){
      $this->Method(POST);

      //Get Device Information

      $mobile = $this->post('mobile'); 
      $city = $this->post('city_id'); 
      $search_query = $this->post('query'); 

    //     //    get Menu 
    $this->db->select('khane_city.ID,khane_city.title as ptitle,khane_city.state_id,
    yer_property.state_id,yer_property.price,yer_property.	req_id');
    $this->db->from('yer_property');
    $this->db->join('khane_city', 'yer_property.city_id = khane_city.ID','left');
    $this->db->where('yer_property.city_id',$city);
    // $this->db->or_where('is_mobile_verified',1);
    // $this->db->where('is_mobile_verified',1);
    // $this->db->like('fullname',$search_query);
  //   $this->db->order_by("ID", "asc");
    $queryuser = $this->db->get();
    die($this->db->last_query());
    $user=@$queryuser->result()[0];

      // $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');

      $json['result']=$user;
     
  
      $this->returnJSON($json, 
      $this->responseDialog(200, false, '')
      );
// 
    }

    // for exampel 1

    public function joinexample5(){
      $this->Method(POST);

      //Get Device Information
      $mobile = $this->post('mobile'); 
      $search_query = $this->post('query'); 

    //     //    get Menu 
    $this->db->select('prime_users.ID,prime_users.fullname as pfullname,prime_users.mobile,
    yer_property.ID,yer_property.user_id,yer_property.	mobile');
    $this->db->from('yer_property');
    $this->db->join('prime_users', 'yer_property.mobile = prime_users.ID','left');
    $this->db->where('yer_property.mobile',$mobile);
    // $this->db->or_where('is_mobile_verified',1);
    // $this->db->where('is_mobile_verified',1);
    // $this->db->like('fullname',$search_query);
  //   $this->db->order_by("ID", "asc");
    $queryuser = $this->db->get();
    die($this->db->last_query());
    $user=@$queryuser->result()[0];

      // $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');

      $json['result']=$user;
     
  
      $this->returnJSON($json, 
      $this->responseDialog(200, false, '')
      );
// 
    }

    // for exampel 3

    

    // public function examplejsonresult(){
    //   $this->Method(POST);
    
    // $this->db->select('ID,title');
    // $this->db->from('khane_city');
    // $query_product_used = $this->db->get();
    // $result_product_used=@$query_product_used->result();
    // $product_used=array();
    // foreach ($query_product_used->result() as $value) {
    //     $product_used[]=array(
    //         'ID' => @$value->ID,
    //         'title'=>@$value->title,
    //     );
    
    //   }


    // $this->db->select('ID,name');
    // $this->db->from('yer_property');
    // $query_product_soghra = $this->db->get();
    // $result_product_soghra=@$query_product_soghra->result();
    // $product_soghra=array();
    // foreach ($query_product_soghra->result() as $value) {
    //     $product_soghra[]=array(
    //         'ID' => @$value->ID,
    //         'name'=>@$value->name,
    //     );
    
    //   }

    //   $json['aghdas']=$product_used;
    //   $json['soghra']=$product_soghra;
     
  
    //   $this->returnJSON($json, 
    //   $this->responseDialog(200, false, '')
    //   );
    // }




        }


?>
