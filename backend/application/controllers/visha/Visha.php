<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Developed by iziapp.ir
class Visha extends MY_Controller {


    public function getValueType(){
        $this->Method(POST);

          //Get Device Information


        //     //    get city 
        // $this->db->select('ID,title');
        // $this->db->from('lab_city');
        // $this->db->order_by("ID", "desc");
        // $querycity = $this->db->get();
    
        //     $city=array();
            
        //     foreach ($querycity->result() as $value) {
        //         $city[]=array(
        //             'ID' => @$value->ID,
        //             'title'=>@$value->title,
        //         );
        //     }
        //        //get time reserve 
        // $this->db->select('ID,title');
        // $this->db->from('lab_timetest');
        // $this->db->order_by("ID", "desc");
        // $queryreserve = $this->db->get();
    
        //     $reserve=array();
            
        //     foreach ($queryreserve->result() as $value) {
        //         $reserve[]=array(
        //             'ID' => @$value->ID,
        //             'title'=>@$value->title,
        //         );
        //     }
        //        //get lab_labname 
        // $this->db->select('ID,title');
        // $this->db->from('lab_labname');
        // $this->db->order_by("ID", "desc");
        // $querylabname = $this->db->get();
    
        //     $labname=array();
            
        //     foreach ($querylabname->result() as $value) {
        //         $labname[]=array(
        //             'ID' => @$value->ID,
        //             'title'=>@$value->title,
        //         );
        //     }
    


        //                  //get sex 
        // $this->db->select('ID,title');
        // $this->db->from('lab_sex');
        // $this->db->order_by("ID", "desc");
        // $querysex = $this->db->get();
    
        //     $sex=array();
            
        //     foreach ($querysex->result() as $value) {
        //         $sex[]=array(
        //             'ID' => @$value->ID,
        //             'title'=>@$value->title,
        //         );
        //     }
        //                  //get type test 
        // $this->db->select('ID,title');
        // $this->db->from('lab_type_test');
        // $this->db->order_by("ID", "desc");
        // $querytypetest = $this->db->get();
    
        //     $typetest=array();
            
        //     foreach ($querytypetest->result() as $value) {
        //         $typetest[]=array(
        //             'ID' => @$value->ID,
        //             'title'=>@$value->title,
        //         );
        //     }



        //                          //get lab_insurance 
        // $this->db->select('ID,title');
        // $this->db->from('lab_insurance');
        // $this->db->order_by("ID", "desc");
        // $querinsurance = $this->db->get();
    
        //     $insuranc=array();
            
        //     foreach ($querinsurance->result() as $value) {
        //         $insurance[]=array(
        //             'ID' => @$value->ID,
        //             'title'=>@$value->title,
        //         );
        //     }

        // //       //get about 
        // $this->db->select('user_login,user_pass');
        // $this->db->from('wp_users');
        // $querysetting = $this->db->get();
        // $resultsetting = $querysetting->result()[0];


        $json['user_pass']=200;
   

        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );

    }


    public function getFile(){

        require_once(APPPATH.'controllers/portal/php-export-data.class.php');
        $id=intval($this->get('id'));
        $this->db->select('ID,status_product,status,final_price,time');
        $this->db->from('prime_orders');
        // $this->db->where('form_id',$form_id);
        $this->db->order_by("ID","ASC");
        $query = $this->db->get();
        $formresult=$query->result();

        $exporter = new ExportDataExcel('browser', "vishareport".date('Ymd').'sell.xls');
        $exporter->initialize();
        $exporter->addRow(array("شماره فاکتور"," قیمت ","زمان خرید","زمان"));
        foreach($formresult as $value){
            $time=$this->jdf->full_date(@$value->time)."";
            $exporter->addRow(array(trim(@$value->ID.""),trim(@$value->final_price.""),trim(@$time.""),trim($time."")));
            // $exporter->addRow(array(trim($value->ID.""),trim($value->final_price.""),trim(@$time.""),trim($time."")));
        }
    

        $exporter->finalize();
        exit;
    }

    public function downloadFile(){
                // file handler
        $file = fopen(dirname(__FILE__) . '/test.png', 'w');
        // cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://shortpixel.com/img/robot_lookleft_wink_big.png');
        // set cURL options
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // set file handler option
        curl_setopt($ch, CURLOPT_FILE, $file);
        // execute cURL
        curl_exec($ch);
        // close cURL
        curl_close($ch);
        // close file
        fclose($file);
    }

  public  function cleanData(&$str)
    {
      $str = preg_replace("/\t/", "\\t", $str);
      $str = preg_replace("/\r?\n/", "\\n", $str);
      if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }

    public function generateSlides(){
            $this->Method(GET);
            $this->db->select('ID,image,url,title_slider');
            $this->db->from('visha_slider');
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


    public function generateHeaderMenu(){


        $this->Method(GET);

        //Get Device Information
  
  
      //     //    get Menu 
      $this->db->select('ID,title,image');
      $this->db->from('visha_cat');
      $this->db->order_by("ID", "asc");
      $querycat = $this->db->get();
  
          $cat=array();
          
          foreach ($querycat->result() as $value) {
            $this->db->select('ID,title');
            $this->db->from('visha_menu_cat');
            $this->db->where('cat_id',@$value->ID);
            $this->db->order_by("ID", "asc");
            $querysubcat = $this->db->get();
            $subcat=array();
            foreach ($querysubcat->result() as $values) {
                $this->db->select('ID,title');
                $this->db->from('visha_menu_sub_cat');
                $this->db->where('menu_cat_id',@$values->ID);
                $this->db->order_by("ID", "asc");
                $querymenusubcat = $this->db->get();
                $menusubcat=array();
                foreach ($querymenusubcat->result() as $values1) {
                            $menusubcat[]=array(
                                @$values1->title=> @$values1->ID, 
                            );
                }
                $subcat[]=array(
                    @$values->title=>$menusubcat,
                );
            }
              $cat[]=array(
                  'ID' => @$value->ID,
                  'title'=>@$value->title,
                  'image'=>$this->imagePath(@$value->image, 256, 256, PNG),
                  'menu'=>@$subcat,
                 
              );
         
          }
  
          
          $json['result']=$cat;
     
  
          $this->returnJSON($json, 
          $this->responseDialog(200, false, '')
          );
    }


    public function getFilterType(){
        $this->Method(GET);


        $this->db->select('ID,code_color,title');
        $this->db->from('visha_product_color');
        $this->db->order_by("ID", "desc");
           $querycolor = $this->db->get();
            $color=array();
            foreach ($querycolor->result() as $value) {
                $color[]=array(
                    'ID' => @$value->ID,
                    'title'=>@$value->title,
                    'code_color'=>@$value->code_color,
                );
            }


            $this->db->select('ID,title');
            $this->db->from('visha_menu_sub_cat');
            $query_cat = $this->db->get();
            $result_cat=@$query_cat->result();
            $cat=array();
            foreach ($query_cat->result() as $value) {
                $cat[]=array(
                    'ID' => @$value->ID,
                    'title'=>@$value->title,
                );
            }

            $this->db->select('ID,title');
            $this->db->from('visha_gender');
            $query_gender = $this->db->get();
            $result_gender=@$query_gender->result();
            $gender=array();
            foreach ($query_gender->result() as $value) {
                $gender[]=array(
                    'ID' => @$value->ID,
                    'title'=>@$value->title,
                );
            }
    

            $this->db->select('ID,title');
            $this->db->from('visha_product_used');
            $query_product_used = $this->db->get();
            $result_product_used=@$query_product_used->result();
            $product_used=array();
            foreach ($query_product_used->result() as $value) {
                $product_used[]=array(
                    'ID' => @$value->ID,
                    'title'=>@$value->title,
                );
            }
    
            $arrayseason=array(
                "بهار"=>"بهار",
                "تابستان"=>"تابستان",
                "پاییز"=>"پاییز",
                "زمستان"=>"زمستان",


               );

        $json['color']=$color;
        $json['cat']=$cat;
        $json['gender']=$gender;
        $json['product_used']=$product_used;
        $json['season']=$arrayseason;
       
    
        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );

    }
  

    public function getState(){

        $this->Method(GET);
        // $this->db->select('ID,title');
        // $this->db->from('visha_product_used');
        // $query_product_used = $this->db->get();
        // $result_product_used=@$query_product_used->result();
        // $product_used=array();
        // foreach ($query_product_used->result() as $value) {
        //     $product_used[]=array(
        //         'ID' => @$value->ID,
        //         'title'=>@$value->title,
        //     );
        // }

        $state[]=array(
                "ID"=>"1",
                "title"=>"تهران",
           );
           $state[]=array(
            "ID"=>"2",
            "title"=>"مشهد",
       );
       $state[]=array(
        "ID"=>"3",
        "title"=>"اصفهان",
   );

    $json['state']=$state;
    
    $this->returnJSON($json, 
    $this->responseDialog(200, false, '')
    );
    }



    public function testHome(){
        $this->db->select('*');
        $this->db->from('visha_home_banner');
        // $this->db->join('visha_menu_sub_cat', 'visha_product.menu_sub_cat_id = visha_menu_sub_cat.ID','left');
        // $this->db->join('visha_menu_cat', 'visha_menu_sub_cat.menu_cat_id = visha_menu_cat.ID','left');
        // $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');
        // $this->db->where('visha_cat.ID',1);
        // $this->db->where('visha_menu_sub_cat.ID',1);
        // $this->db->order_by("ID", "desc");
        $queryhomebanner = $this->db->get();
            $items=array();
            
            foreach ($queryhomebanner->result() as $value) {
                $content[]=array(
                    "title"=>@$value->title,
                    "image"=>@$value->image,
                    "path"=>@$value->path,
                    "type"=>@$value->type,
                    "id"=> "optional"
                );
            }
            $json['content']=@$content[0]['type'];
    
    $this->returnJSON($json, 
    $this->responseDialog(200, false, '')
    );
    }


    public function getListProductHome(){



        $this->db->select('*');
        $this->db->from('visha_home_banner');
        $queryhomebanner = $this->db->get();
            
            foreach ($queryhomebanner->result() as $value) {
                $contents[]=array(
                    "title"=>@$value->title,
                    "image"=>@$value->image,
                    "path"=>@$value->path,
                    "type"=>@$value->type,
                    "url_link"=>@$value->url_link,
                    "id"=> "optional"
                );
            }


        $this->db->select('visha_product.ID,visha_product.img1,visha_product.img2,visha_product.price,visha_product.title,visha_product.menu_sub_cat_id,visha_product.product_color,visha_product.percent_offer,visha_product.newprice');
        $this->db->from('visha_product');
        $this->db->join('visha_menu_sub_cat', 'visha_product.menu_sub_cat_id = visha_menu_sub_cat.ID','left');
        $this->db->join('visha_menu_cat', 'visha_menu_sub_cat.menu_cat_id = visha_menu_cat.ID','left');
        $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');
        $this->db->where('visha_cat.ID',1);
        $this->db->where('visha_menu_sub_cat.ID',1);
        $this->db->order_by("ID", "desc");
        $queryshal = $this->db->get();
        // die($this->db->last_query());
            $shal=array();
            $color=array();
            $items=array();
            
            foreach ($queryshal->result() as $value) {
                $str= explode(",",@$value->product_color);
                    $this->db->select('ID,title,code_color');
                    $this->db->from('visha_product_color');
                    $this->db->where('ID',$str[0]);
                    $this->db->order_by("ID", "desc");
                    $this->db->limit(1);
                    $query = $this->db->get();
                    $result=@$query->result()[0];
                    $colors=array(
                        "id"=>$result->ID,
                        "code_color"=>@$result->code_color,
                        "title"=>@$result->title,
                    );
                $shal[]=array(
                    'ID' => @$value->ID,
                    'title'=>@$value->title,
                    'image1'=>$this->imagePath(@$value->img1, 256, 256, PNG),
                    'image2'=>$this->imagePath(@$value->img2, 256, 256, PNG),
                    'price'=>@$value->price,
                    'newprice'=>@$value->newprice,
                    'percent'=>@$value->percent_offer,
                    'colors'=>@$colors,
                );
            }
            $banner=array(
                "image"=>"http://vishascarf.ir/webapi/backend/p_uploads_dir/10_f9f7e63aad3911376c9b2f154e0a4ac3.jpg",
                "url_link"=>"http://vishascarf.com/cats/1"
            );
            $content=array(
                "title"=>"شال مجلسی",
                "id"=> "1",
                "products"=>$shal,
             
            );
            // "banner"=>$banner
         

            $items[]=array(
                "type"=> "cat_products",
                "content"=>$content,
          
            );

            // $content=array(
            //     "title"=>"VISHA",
            //     "image"=>"http://vishascarf.ir/webapi/backend/p_uploads_dir/10_042fd6a9bd003d741f986caba2fb785c.jpg",
            //     "path"=>"http://vishascarf.ir/webapi/backend/p_uploads_dir/visha1.mp4",
            //     "id"=> "optional"
            // );

            $items[]=array(
                "type"=> @$contents[0]['type'],
                "content"=>$contents[0]
            );






            $this->db->select('visha_product.ID,visha_product.img1,visha_product.img2,visha_product.price,visha_product.title,visha_product.menu_sub_cat_id');
            $this->db->from('visha_product');
            $this->db->join('visha_menu_sub_cat', 'visha_product.menu_sub_cat_id = visha_menu_sub_cat.ID','left');
            $this->db->join('visha_menu_cat', 'visha_menu_sub_cat.menu_cat_id = visha_menu_cat.ID','left');
            $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');
            $this->db->where('visha_cat.ID',1);
            $this->db->where('visha_menu_sub_cat.ID',2);
            $this->db->order_by("ID", "desc");
            $queryrosari = $this->db->get();
            // die($this->db->last_query());
                $rosari=array();
                
                foreach ($queryrosari->result() as $values) {
                    $str= explode(",",@$value->product_color);
                    $this->db->select('ID,title,code_color');
                    $this->db->from('visha_product_color');
                    $this->db->where('ID',$str[0]);
                    $this->db->order_by("ID", "desc");
                    $this->db->limit(1);
                    $query = $this->db->get();
                    $result=@$query->result()[0];
                    $colors=array(
                        "id"=>$result->ID,
                        "code_color"=>@$result->code_color,
                        "title"=>@$result->title,
                    );
                    $rosari[]=array(
                        'ID' => @$values->ID,
                        'title'=>@$values->title,
                        'image1'=>$this->imagePath(@$values->img1, 256, 256, PNG),
                        'image2'=>$this->imagePath(@$values->img2, 256, 256, PNG),
                        'price'=>@$values->price,
                        'colors'=>@$colors,
                    );
                }

                //type: video|image
                // "image"=>"http://vishascarf.ir/webapi/backend/p_uploads_dir/10_042fd6a9bd003d741f986caba2fb785c.jpg",
                // $banner=array(
                //     "image"=>"http://vishascarf.ir/webapi/backend/p_uploads_dir/10_042fd6a9bd003d741f986caba2fb785c.jpg",
                //     "url_link"=>"http://vishascarf.ir/webapi/backend/p_uploads_dir/visha3.mp4",
                //     "type"=>"video",
                // );
                
            $content=array(
                "title"=>"شال تابستانه",
                "id"=> "2",
                "products"=>$rosari,
                "banner"=>$contents[1],
            );

       

            $items[]=array(
                "type"=> "cat_products",
                "content"=>$content,
           
            );


            // $content=array(
            //     "title"=>"VISHA",
            //     "image"=>"http://vishascarf.ir/webapi/backend/p_uploads_dir/10_042fd6a9bd003d741f986caba2fb785c.jpg",
            //     "path"=>"http://vishascarf.ir/webapi/backend/p_uploads_dir/visha2.mp4",
            //     "id"=> "optional"
            // );

            $items[]=array(
                "type"=> @$contents[2]['type'],
                "content"=>$contents[2],
            );



            
            $this->db->select('visha_product.ID,visha_product.img1,visha_product.img2,visha_product.price,visha_product.title,visha_product.menu_sub_cat_id');
            $this->db->from('visha_product');
            $this->db->join('visha_menu_sub_cat', 'visha_product.menu_sub_cat_id = visha_menu_sub_cat.ID','left');
            $this->db->join('visha_menu_cat', 'visha_menu_sub_cat.menu_cat_id = visha_menu_cat.ID','left');
            $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');
            $this->db->where('visha_cat.ID',2);
            $this->db->where('visha_menu_sub_cat.ID',6);
            $this->db->order_by("ID", "desc");
            $queryrosariabrisham = $this->db->get();
            // die($this->db->last_query());
                $rosariabrisham=array();
                
                foreach ($queryrosariabrisham->result() as $values) {
                    $str= explode(",",@$value->product_color);
                    $this->db->select('ID,title,code_color');
                    $this->db->from('visha_product_color');
                    $this->db->where('ID',$str[0]);
                    $this->db->order_by("ID", "desc");
                    $this->db->limit(1);
                    $query = $this->db->get();
                    $result=@$query->result()[0];
                    $colors=array(
                        "id"=>$result->ID,
                        "code_color"=>@$result->code_color,
                        "title"=>@$result->title,
                    );
                    $rosariabrisham[]=array(
                        'ID' => @$values->ID,
                        'title'=>@$values->title,
                        'image1'=>$this->imagePath(@$values->img1, 256, 256, PNG),
                        'image2'=>$this->imagePath(@$values->img2, 256, 256, PNG),
                        'price'=>@$values->price,
                        'colors'=>@$colors,
                    );
                }

                $content=array(
                    "title"=>"روسری ابریشم",
                    "id"=> "6",
                    "products"=>$rosariabrisham
                );
    
                $items[]=array(
                    "type"=> "cat_products",
                    "content"=>$content
                );



                $this->db->select('visha_product.ID,visha_product.img1,visha_product.img2,visha_product.price,visha_product.title,visha_product.menu_sub_cat_id');
                $this->db->from('visha_product');
                $this->db->join('visha_menu_sub_cat', 'visha_product.menu_sub_cat_id = visha_menu_sub_cat.ID','left');
                $this->db->join('visha_menu_cat', 'visha_menu_sub_cat.menu_cat_id = visha_menu_cat.ID','left');
                $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');
                $this->db->where('visha_cat.ID',1);
                $this->db->where('visha_menu_sub_cat.ID',4);
                $this->db->order_by("ID", "desc");
                $queryshalpaieze = $this->db->get();
                // die($this->db->last_query());
                    $shalpaiieze=array();
                    
                    foreach ($queryshalpaieze->result() as $values) {
                        $str= explode(",",@$value->product_color);
                        $this->db->select('ID,title,code_color');
                        $this->db->from('visha_product_color');
                        $this->db->where('ID',$str[0]);
                        $this->db->order_by("ID", "desc");
                        $this->db->limit(1);
                        $query = $this->db->get();
                        $result=@$query->result()[0];
                        $colors=array(
                            "id"=>$result->ID,
                            "code_color"=>@$result->code_color,
                            "title"=>@$result->title,
                        );
                        $shalpaiieze[]=array(
                            'ID' => @$values->ID,
                            'title'=>@$values->title,
                            'image1'=>$this->imagePath(@$values->img1, 256, 256, PNG),
                            'image2'=>$this->imagePath(@$values->img2, 256, 256, PNG),
                            'price'=>@$values->price,
                            'colors'=>@$colors,
                        );
                    }
    
                    $content=array(
                        "title"=>"شال پاییزه",
                        "id"=> "4",
                        "products"=>$shalpaiieze
                    );
        
                    $items[]=array(
                        "type"=> "cat_products",
                        "content"=>$content
                    );


                       
            $this->db->select('visha_product.ID,visha_product.img1,visha_product.img2,visha_product.price,visha_product.title,visha_product.menu_sub_cat_id');
            $this->db->from('visha_product');
            $this->db->join('visha_menu_sub_cat', 'visha_product.menu_sub_cat_id = visha_menu_sub_cat.ID','left');
            $this->db->join('visha_menu_cat', 'visha_menu_sub_cat.menu_cat_id = visha_menu_cat.ID','left');
            $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');
            $this->db->where('visha_cat.ID',2);
            $this->db->where('visha_menu_sub_cat.ID',7);
            $this->db->order_by("ID", "desc");
            $querytabestane = $this->db->get();
            // die($this->db->last_query());
                $tabestane=array();
                
                foreach ($querytabestane->result() as $values) {
                    $str= explode(",",@$value->product_color);
                    $this->db->select('ID,title,code_color');
                    $this->db->from('visha_product_color');
                    $this->db->where('ID',$str[0]);
                    $this->db->order_by("ID", "desc");
                    $this->db->limit(1);
                    $query = $this->db->get();
                    $result=@$query->result()[0];
                    $colors=array(
                        "id"=>$result->ID,
                        "code_color"=>@$result->code_color,
                        "title"=>@$result->title,
                    );
                    $tabestane[]=array(
                        'ID' => @$values->ID,
                        'title'=>@$values->title,
                        'image1'=>$this->imagePath(@$values->img1, 256, 256, PNG),
                        'image2'=>$this->imagePath(@$values->img2, 256, 256, PNG),
                        'price'=>@$values->price,
                        'colors'=>@$colors,
                    );
                }

                // $content=array(
                //     "title"=>"روسری تابستانه",
                //     "id"=> "7",
                //     "products"=>$tabestane
                // );
    
                // $items[]=array(
                //     "type"=> "cat_products",
                //     "content"=>$content
                // );

                $content=array(
                    "title"=>"Test Baner",
                    "path"=>"http://vishascarf.ir/webapi/backend/p_uploads_dir/10_1b343c66ef005c8464caa1fe6db39aa8.jpg",
                    "id"=> "optional"
                );
    
                $items[]=array(
                    "type"=> @$contents[3]['type'],
                    "content"=>$contents[3]
                );
                       
     
    

                       
            $this->db->select('visha_product.ID,visha_product.img1,visha_product.img2,visha_product.price,visha_product.title,visha_product.menu_sub_cat_id');
            $this->db->from('visha_product');
            $this->db->join('visha_menu_sub_cat', 'visha_product.menu_sub_cat_id = visha_menu_sub_cat.ID','left');
            $this->db->join('visha_menu_cat', 'visha_menu_sub_cat.menu_cat_id = visha_menu_cat.ID','left');
            $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');
            $this->db->where('visha_cat.ID',2);
            $this->db->where('visha_menu_sub_cat.ID',8);
            $this->db->order_by("ID", "desc");
            $queryrosaripaieze = $this->db->get();
            // die($this->db->last_query());
                $rosaripaiieze=array();
                
                foreach ($queryrosaripaieze->result() as $values) {
                    $str= explode(",",@$value->product_color);
                    $this->db->select('ID,title,code_color');
                    $this->db->from('visha_product_color');
                    $this->db->where('ID',$str[0]);
                    $this->db->order_by("ID", "desc");
                    $this->db->limit(1);
                    $query = $this->db->get();
                    $result=@$query->result()[0];
                    $colors=array(
                        "id"=>$result->ID,
                        "code_color"=>@$result->code_color,
                        "title"=>@$result->title,
                    );
                    $rosaripaiieze[]=array(
                        'ID' => @$values->ID,
                        'title'=>@$values->title,
                        'image1'=>$this->imagePath(@$values->img1, 256, 256, PNG),
                        'image2'=>$this->imagePath(@$values->img2, 256, 256, PNG),
                        'price'=>@$values->price,
                        'colors'=>@$colors,
                    );
                }

                $content=array(
                    "title"=>"روسری پاییزه",
                    "id"=> "8",
                    "products"=>$rosaripaiieze
                );
    
                $items[]=array(
                    "type"=> "cat_products",
                    "content"=>$content
                );
    
            
            // $json['rosari']=$rosari;
            // $json['shal']=$shal;
            $json['items']=$items;
       
    
            $this->returnJSON($json, 
            $this->responseDialog(200, false, '')
            );

    }




    public function searchProduct(){
        $this->Method(GET);
            // type 1 پرفروش ترین  type 2  گران ترین  type 3 ارزان ترین
        $type = $this->get('sort'); 
        $search_query = $this->get('query'); 
        $page = $this->get('page'); 
        $color = $this->get('color'); 
        $season = $this->get('season'); 
        $type_design = $this->get('style'); 
        $cat = $this->get('cat'); 
        $product_used = $this->get('product_used'); 


        if($page==0||strlen($page)==0)
        $page==1;




        $this->db->select('visha_product.ID,visha_product.img1,visha_product.img2,visha_product.price,visha_product.title,visha_product.menu_sub_cat_id,visha_product.title,visha_product.product_color,visha_product.season,visha_product.type_design,visha_product.product_used');
        $this->db->from('visha_product');
        $this->db->join('visha_menu_sub_cat', 'visha_product.menu_sub_cat_id = visha_menu_sub_cat.ID','left');
        $this->db->join('visha_menu_cat', 'visha_menu_sub_cat.menu_cat_id = visha_menu_cat.ID','left');
        $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');
        if(strlen($search_query)>1)
        $this->db->like('visha_product.title', $search_query,'both');
        if(strlen($color)>0)
        $this->db->like('visha_product.product_color', $color,'both');
        if(strlen($season)>0)
        $this->db->like('visha_product.season', $season,'both');
        if(strlen($type_design)>0)
        $this->db->like('visha_product.type_design', $type_design,'both');
        if(strlen($cat)>0)
        $this->db->where('visha_product.menu_sub_cat_id', $cat);
        if(strlen($product_used)>0)
        $this->db->where('visha_product.product_used', $product_used);
        if($type==2)
        $this->db->order_by("visha_product.price", "desc");
        if($type==3)
        $this->db->order_by("visha_product.price", "asc");
        // $this->db->limit(15,(intval($page)-1)*15);
        $this->db->limit(15);
        $querysearch = $this->db->get();
        $count= $querysearch->num_rows();
        // die($this->db->last_query());
            $resultsearch=array();
            
            foreach ($querysearch->result() as $value) {
              if(intval(@$value->date)>0)
               $time=$this->jdf->full_date(@$value->date)."";
                $resultsearch[]=array(
                    'ID' => @$value->ID,
                    'title'=>@$value->title,
                    'image1'=>$this->imagePath(@$value->img1, 256, 256, PNG),
                    'image2'=>$this->imagePath(@$value->img2, 256, 256, PNG),
                    'price'=>@$value->price,
                );
            }


            $data=array(
                "season"=>$season,
                "type"=>$type,
                "cat"=>$cat,
                "product_used"=>$product_used,

            );

            // $data2=array(
            //     "color"=>"1234444",
            //     "product_used"=>$product_used,

            // );
        // print_r("cat ".@$data->cat);
        // print_r(@$data);
        // die();

            $total_count=$this->getTotalCountSearch('visha_product',$search_query,$color,$type_design,$data);
            // $total_count=$this->getTotalCount('visha_product', array('product_color'=>$color));
            
            $json['result']=$resultsearch;
            $json['count']=$total_count;
       
    
            $this->returnJSON($json, 
            $this->responseDialog(200, false, '')
            );



    }


    public function getDetailProduct(){


        $this->Method(POST);
        $productID=$this->post('productID', REQUIRED, TEXT);
        $tokenuser=$this->post('token', REQUIRED, TEXT);

        $this->db->select('visha_product.ID,visha_product.img1,visha_product.img2,visha_product.img3,visha_product.img4,visha_product.img5,visha_product.img6,visha_product.img7,visha_product.img8
        ,visha_product.img9,visha_product.price,visha_product.title
        ,visha_product.available_in_stock,visha_product.menu_sub_cat_id
        ,visha_product.short_desc,visha_product.product_color
        ,visha_product.percent_offer,visha_product.newprice,visha_product.product_used,visha_product.product_desc
        ,visha_product.type_design,visha_product.product_design_details
        ,visha_cat.ID as catId,visha_product.dimensions,visha_cat.title as titlecat,visha_product.color_id_img1
        ,visha_product.color_id_img2,visha_product.color_id_img3,visha_product.color_id_img4,visha_product.color_id_img5,visha_product.color_id_img6
        ,visha_product.color_id_img7,visha_product.color_id_img8,visha_product.color_id_img9,visha_menu_sub_cat.title as titlesubcat');
        $this->db->from('visha_product');
        $this->db->join('visha_menu_sub_cat', 'visha_product.menu_sub_cat_id = visha_menu_sub_cat.ID','left');
        $this->db->join('visha_menu_cat', 'visha_menu_sub_cat.menu_cat_id = visha_menu_cat.ID','left');
        $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');
        $this->db->where('visha_product.ID',@$productID);
        $this->db->order_by("ID", "desc");
        $queryproduct = $this->db->get();
        $productlist=$queryproduct->result()[0];

        $this->addviewvishaproduct($productID,$tokenuser);
        $subcat=$productlist->menu_sub_cat_id;
        $catId=$productlist->catId;


        $colors=array();
        $str= explode(",",@$productlist->product_color);
        // foreach($str as $valuesub){
        //     $this->db->select('ID,title,code_color');
        //     $this->db->from('visha_product_color');
        //     $this->db->where('ID',$valuesub);
        //     $this->db->order_by("ID", "desc");
        //     $this->db->limit(1);
        //     $query = $this->db->get();
        //     $result=@$query->result()[0];
        //     $colornew=@$result->code_color;
        //     $colornew= str_replace("#","",$colornew);
        //     $colornew="#".$colornew;
        //     $colors[]=array(
        //         "id"=>$result->ID,
        //         "code_color"=>@$colornew,
        //         "title"=>@$result->title,
        //     );
        //    }
        
        //    visha_gift_type

        $this->db->select('ID,image,title,price');
        $this->db->from('visha_gift_type');
        $this->db->order_by("ID", "desc");
           $querygift = $this->db->get();
            $gift_type=array();
            foreach ($querygift->result() as $value) {
                $gift_type[]=array(
                    'ID' => @$value->ID,
                    'title'=>@$value->title,
                    'price'=>@$value->price,
                    'image'=>$this->imagePath(@$value->image, 256, 256, PNG),
                );
            }
     
  
    
            $product=array();
            $image2=array();
            $image3=array();
            $image4=array();
            $image5=array();
            $image6=array();
            $image7=array();
            $image8=array();
            $image9=array();

            if(strlen($productlist->img2)>0){
                $this->db->select('ID,title,code_color');
                $this->db->from('visha_product_color');
                $this->db->where('ID',$productlist->color_id_img2);
                $this->db->order_by("ID", "desc");
                $this->db->limit(1);
                $query = $this->db->get();
                $result=@$query->result()[0];
                $color2=@$result->code_color;
                $color2= str_replace("#","",$color2);
                $color2="#".$color2;
                $image2=array(
                    "image"=>$this->imagePath(@$productlist->img2, 256, 256, PNG),
                    "id"=>$result->ID,
                    "code_color"=>@$color2,
                    "title"=>@$result->title,
                );
                $colors[]=array(
                    "id"=>$result->ID,
                    "code_color"=>@$result->code_color,
                    "title"=>@$result->title,
                );
            }
        
            if(strlen($productlist->img3)>0){
                $this->db->select('ID,title,code_color');
                $this->db->from('visha_product_color');
                $this->db->where('ID',$productlist->color_id_img3);
                $this->db->order_by("ID", "desc");
                $this->db->limit(1);
                $query = $this->db->get();
                $result=@$query->result()[0];
                $color3=@$result->code_color;
                $color3= str_replace("#","",$color3);
                $color3="#".$color3;
                $image3=array(
                    "image"=>$this->imagePath(@$productlist->img3, 256, 256, PNG),
                    "id"=>@$result->ID,
                    "code_color"=>@$color3,
                    "title"=>@$result->title,
                );
                $colors[]=array(
                    "id"=>$result->ID,
                    "code_color"=>@$result->code_color,
                    "title"=>@$result->title,
                );
            }
            if(strlen($productlist->img4)>0){
                $this->db->select('ID,title,code_color');
                $this->db->from('visha_product_color');
                $this->db->where('ID',$productlist->color_id_img4);
                $this->db->order_by("ID", "desc");
                $this->db->limit(1);
                $query = $this->db->get();
                $result=@$query->result()[0];
                $color4=@$result->code_color;
                $color4= str_replace("#","",$color4);
                $color4="#".$color4;
                $image4=array(
                    "image"=>$this->imagePath(@$productlist->img4, 256, 256, PNG),
                    "id"=>$result->ID,
                    "code_color"=>@$color4,
                    "title"=>@$result->title,
                );
                $colors[]=array(
                    "id"=>$result->ID,
                    "code_color"=>@$result->code_color,
                    "title"=>@$result->title,
                );
                
            }
           
            if(strlen($productlist->img5)>0){
                $this->db->select('ID,title,code_color');
                $this->db->from('visha_product_color');
                $this->db->where('ID',$productlist->color_id_img5);
                $this->db->order_by("ID", "desc");
                $this->db->limit(1);
                $query = $this->db->get();
                $result=@$query->result()[0];
                $color5=@$result->code_color;
                $color5= str_replace("#","",$color5);
                $color5="#".$color5;
                $image5=array(
                    "image"=>$this->imagePath(@$productlist->img5, 256, 256, PNG),
                    "id"=>$result->ID,
                    "code_color"=>@$color5,
                    "title"=>@$result->title,
                );
                $colors[]=array(
                    "id"=>$result->ID,
                    "code_color"=>@$result->code_color,
                    "title"=>@$result->title,
                );
                
            }
         
            if(strlen($productlist->img6)>0){
                $this->db->select('ID,title,code_color');
                $this->db->from('visha_product_color');
                $this->db->where('ID',$productlist->color_id_img6);
                $this->db->order_by("ID", "desc");
                $this->db->limit(1);
                $query = $this->db->get();
                $result=@$query->result()[0];
                $color6=@$result->code_color;
                $color6= str_replace("#","",$color6);
                $color6="#".$color6;
                $image6=array(
                    "image"=>$this->imagePath(@$productlist->img6, 256, 256, PNG),
                    "id"=>$result->ID,
                    "code_color"=>@$color6,
                    "title"=>@$result->title,
                );
                $colors[]=array(
                    "id"=>$result->ID,
                    "code_color"=>@$result->code_color,
                    "title"=>@$result->title,
                );
               
            }
        
            if(strlen($productlist->img7)>0){
                $this->db->select('ID,title,code_color');
                $this->db->from('visha_product_color');
                $this->db->where('ID',$productlist->color_id_img7);
                $this->db->order_by("ID", "desc");
                $this->db->limit(1);
                $query = $this->db->get();
                $result=@$query->result()[0];
                $color7=@$result->code_color;
                $color7= str_replace("#","",$color7);
                $color7="#".$color7;
                $image7=array(
                    "image"=>$this->imagePath(@$productlist->img7, 256, 256, PNG),
                    "id"=>$result->ID,
                    "code_color"=>@color7,
                    "title"=>@$result->title,
                );
                $colors[]=array(
                    "id"=>$result->ID,
                    "code_color"=>@$result->code_color,
                    "title"=>@$result->title,
                );
            }
 
            if(strlen($productlist->img8)>0){
                $this->db->select('ID,title,code_color');
                $this->db->from('visha_product_color');
                $this->db->where('ID',$productlist->color_id_img8);
                $this->db->order_by("ID", "desc");
                $this->db->limit(1);
                $query = $this->db->get();
                $result=@$query->result()[0];
                $color8=@$result->code_color;
                $color8= str_replace("#","",$color8);
                $color8="#".$color8;
                $image8=array(
                    "image"=>$this->imagePath(@$productlist->img8, 256, 256, PNG),
                    "id"=>$result->ID,
                    "code_color"=>@$color8,
                    "title"=>@$result->title,
                );
                $colors[]=array(
                    "id"=>$result->ID,
                    "code_color"=>@$result->code_color,
                    "title"=>@$result->title,
                );
            }
          
            if(strlen($productlist->img9)>0){
                $this->db->select('ID,title,code_color');
                $this->db->from('visha_product_color');
                $this->db->where('ID',$productlist->color_id_img9);
                $this->db->order_by("ID", "desc");
                $this->db->limit(1);
                $query = $this->db->get();
                $result=@$query->result()[0];
                $color9=@$result->code_color;
                $color9= str_replace("#","",$color9);
                $color9="#".$color9;
                $image9=array(
                    "image"=>$this->imagePath(@$productlist->img9, 256, 256, PNG),
                    "id"=>$result->ID,
                    "code_color"=>@color9,
                    "title"=>@$result->title,
                );
                $colors[]=array(
                    "id"=>$result->ID,
                    "code_color"=>@$result->code_color,
                    "title"=>@$result->title,
                );
               
            }

            if(strlen($productlist->img1)>0){
                $this->db->select('ID,title,code_color');
                $this->db->from('visha_product_color');
                $this->db->where('ID',$productlist->color_id_img1);
                $this->db->order_by("ID", "desc");
                $this->db->limit(1);
                $query = $this->db->get();
                $result=@$query->result()[0];
                $color1=@$result->code_color;
                $color1= str_replace("#","",$color1);
                $color1="#".$color1;
                $image1=array(
                    "image"=>$this->imagePath(@$productlist->img1, 256, 256, PNG),
                    "id"=>@$result->ID,
                    "code_color"=>@$color1,
                    "title"=>@$result->title,
                );
                $colors[]=array(
                    "id"=>$result->ID,
                    "code_color"=>@$result->code_color,
                    "title"=>@$result->title,
                );
               
            }
            

            $newprice=0;
            $percent=0;
            if($productlist->newprice>0){
                $newprice=$productlist->newprice;
                $percent=$productlist->percent_offer;
            }


            $htmltest="<html><head></head>
            <body>
              <p>".$productlist->product_used."</p>
              <p>".$productlist->type_design."</p>
              <p>".$productlist->product_design_details."</p>
            </body>
            </html>";
            $htmltest = str_replace("\n", "", $htmltest);
            // trim($htmltest,"Hed!")
            $attribute=array();
            // $attribute[]=".".$productlist->product_used.$productlist->type_design.$productlist->product_design_details;
            $attribute[]=$productlist->product_used;
            $attribute[]=$productlist->type_design;
            $attribute[]=$productlist->product_design_details;
  
            $product=array(
              'ID' => @$productlist->ID,
              'title'=>@$productlist->title,
              'image1'=>$image1,
              'image2'=>$image2,
              'image3'=>$image3,
              'image4'=>$image4,
              'image5'=>$image5,
              'image6'=>$image6,
              'image7'=>$image7,
              'image8'=>$image8,
              'image9'=>$image9,
              'short_desc'=>@$productlist->short_desc,
              'available_in_stock'=>@$productlist->available_in_stock,
              'price'=>@$productlist->price,
              'newprice'=>@$newprice,
              'percent'=>@$percent,
              'product_color'=>@$colors,
              'product_desc'=>@$productlist->product_desc,
              'technical_specifications'=>@$htmltest,
              'attribute'=>$attribute,
              'dimension'=>@$productlist->dimensions,
              'cat'=>@$productlist->titlecat,
              'subcat'=>@$productlist->titlesubcat,
          );


                             
          $this->db->select('visha_product.ID,visha_product.img1,visha_product.img2,visha_product.price,visha_product.title,visha_product.menu_sub_cat_id,visha_product.product_color');
          $this->db->from('visha_product');
          $this->db->join('visha_menu_sub_cat', 'visha_product.menu_sub_cat_id = visha_menu_sub_cat.ID','left');
          $this->db->join('visha_menu_cat', 'visha_menu_sub_cat.menu_cat_id = visha_menu_cat.ID','left');
          $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');
          $this->db->where('visha_cat.ID',$catId);
          $this->db->where('visha_menu_sub_cat.ID',$subcat);
          $this->db->limit(8);
          $this->db->order_by("ID", "desc");
          $querytabestane = $this->db->get();
        //   die($this->db->last_query());
              $tabestane=array();
              
              foreach ($querytabestane->result() as $values) {
                  $str= explode(",",@$values->product_color);
                //   print_r("test color ".$str);
                //   die();
                  $this->db->select('ID,title,code_color');
                  $this->db->from('visha_product_color');
                  $this->db->where('ID',$str[0]);
                  $this->db->order_by("ID", "desc");
                  $this->db->limit(1);
                  $query = $this->db->get();
                  $result=@$query->result()[0];
                  $colors=array(
                      "id"=>$result->ID,
                      "code_color"=>@$result->code_color,
                      "title"=>@$result->title,
                  );
                  $tabestane[]=array(
                      'ID' => @$values->ID,
                      'title'=>@$values->title,
                      'image1'=>$this->imagePath(@$values->img1, 256, 256, PNG),
                      'image2'=>$this->imagePath(@$values->img2, 256, 256, PNG),
                      'price'=>@$values->price,
                      'colors'=>@$colors,
                  );
              }




        $json['product']=$product;
        $json['gift_type']=$gift_type;
        $json['product_similar']=$tabestane;
   

        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );
    }


    public function returnMoney(){
        $this->Method(POST);

        $token=$this->post('token');
        $faktor_code=$this->post('faktor_code');
        $User=$this->checkToken(REQUIRED);

        $this->db->select('ID,delivery_time,user_id');
        $this->db->from('prime_orders');
        $this->db->where('ID',$faktor_code);
        $this->db->where('user_id',$User->ID);
        $this->db->limit(1);
        $query = $this->db->get();
        $result=@$query->result()[0];


        $now = Time(); // or your date as well
        $your_date = $result->delivery_time;
        $datediff = $now - $your_date;
        $mode=round($datediff / (60 * 60 * 24));
          // print_r($datediff."\n");
          // print_r(round($datediff / (60 * 60 * 24))."");
          // die();
    
        if( $mode>2){
            $this->returnError(403, true, 'امکان عودت کالا  دیر تر از 2 روز نمی باشد.');
        }else{
            $data = array(
                'is_return_money' => 1,
               
            );
            $this->db->where('ID', $faktor_code);
            $this->db->update('prime_orders', $data);
        }
// delivery_time


        $json['status']=200;
        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );

    }


    public function getBasketTest(){
        $this->Method(POST);

        $token=$this->post('token');
        $is_cookie=$this->post('is_cookie');
        $vocher=$this->post('vocher');
      
        if(strlen($token)>0 && $is_cookie=="0"){
            $User=$this->checkToken(REQUIRED);
        }
   
       



        $this->db->select('user_products.ID,user_products.product_id
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
        if($is_cookie=="0"){
            $this->db->where('user_products.user_id',$User->ID);    
        }
     
        else
        $this->db->where('user_products.token_cookie',$token);
        $this->db->where('user_products.purchase_date',0);
        $this->db->order_by("ID", "desc");
        $querybasket = $this->db->get();
        // die($this->db->last_query());
            $basket=array();
            $finlaprice=0;
            $product_ids="";
            $color_ids="";
            $number=0;
            $newprice="";
            $count_product=0;
            $gift_ids="0";
            $final_price_product=0;
            $final_price_gift=0;
            foreach ($querybasket->result() as $value) {
                $number=@$value->number;
                $newprice=@$value->newprice;
                // if($newprice>0){
                //     $finlaprice=$finlaprice+(@$value->newprice*$number);
                // }else{
                //     $finlaprice=$finlaprice+(@$value->price*$number);
                // }
                if($newprice>0){
                    $finlaprice=$finlaprice+(@$value->newprice*$number);
                    $final_price_product=$final_price_product+(@$value->newprice*$number);
                }else{
                    $finlaprice=$finlaprice+(@$value->price*$number);
                    $final_price_product=$final_price_product+(@$value->price*$number);
                }
          
                $product_ids=$product_ids.",".@$value->ID;
                $color_ids=$color_ids.",".@$value->color;
                $count_product=$count_product.",".@$value->number;

                if(intval(@$value->gift_id)>0&&@$value->giftwrapping=="on"){
                    $this->db->select('ID,image,title,price');
                    $this->db->from('visha_gift_type');
                    $this->db->where('ID', $value->gift_id);
                    $querygift = $this->db->get();
                    $resultgift = $querygift->result()[0];
                    $final_price_gift=$final_price_gift+intval(@$resultgift->price);
                    $finlaprice=$finlaprice+intval(@$resultgift->price);
                }

                if(intval(@$value->gift_id)>0)
                $gift_ids=$gift_ids.",".@$value->gift_id;
                else{
                    $gift_ids=$gift_ids.","."0";
                }

                $this->db->select('ID,title,code_color');
                $this->db->from('visha_product_color');
                $this->db->where('ID',@$value->color);
                $query = $this->db->get();
                $result=@$query->result()[0];

                $colors=array(
                    "ID"=>@$result->ID,
                    "title"=>@$result->title,
                    "code_color"=>@$result->code_color,
                );


                $imagep="";
                if(intval(@$value->color)==intval(@$value->color_id_img1)){
                    $imagep=  $this->imagePath(@$value->img1, 256, 256, PNG);
                }else if(intval(@$value->color)==intval(@$value->color_id_img2)){
                    $imagep=  $this->imagePath(@$value->img2, 256, 256, PNG);
                }else if(intval(@$value->color)==intval(@$value->color_id_img3)){
                    $imagep=  $this->imagePath(@$value->img3, 256, 256, PNG);
                }else if(intval(@$value->color)==intval(@$value->color_id_img4)){
                    $imagep=  $this->imagePath(@$value->img4, 256, 256, PNG);
                }else if(intval(@$value->color)==intval(@$value->color_id_img5)){
                    $imagep=  $this->imagePath(@$value->img5, 256, 256, PNG);
                }else if(intval(@$value->color)==intval(@$value->color_id_img6)){
                    $imagep=  $this->imagePath(@$value->img6, 256, 256, PNG);
                }else if(intval(@$value->color)==intval(@$value->color_id_img7)){
                    $imagep=  $this->imagePath(@$value->img7, 256, 256, PNG);
                }else if(intval(@$value->color)==intval(@$value->color_id_img8)){
                    $imagep=  $this->imagePath(@$value->img8, 256, 256, PNG);
                }else if(intval(@$value->color)==intval(@$value->color_id_img9)){
                    $imagep=  $this->imagePath(@$value->img9, 256, 256, PNG);
                }


                $basket[]=array(
                    'ID' => @$value->ID,
                    'product_id' => @$value->product_id,
                    'title'=>@$value->title,
                    'image'=>@$imagep,
                    'number'=>@$value->number,
                    'price'=>@$value->price,
                    'percent_offer'=>@$value->percent_offer,
                    'newprice'=>@$value->newprice,
                    'color'=>@$colors,
                    'available_in_stock'=>@$value->available_in_stock,
                    'giftwrapping'=>@$value->giftwrapping,
                    'gift_id'=>@$value->gift_id,
                    'imagep'=>@$imagep,
                    'color111'=>@$value->color,
                    'color_id_img1'=>@$value->color_id_img1,
                );
            }

            // print_r($product_ids);
            // die();
            $address=array();
            if(strlen($token)>0&& $is_cookie=="0"){
                
            $this->db->select('ID,address,phone,mobile,title,city');
            $this->db->from('user_addresses');
            $this->db->where('user_id',$User->ID);
            $this->db->order_by("ID", "desc");
               $queryaddress = $this->db->get();
               
                foreach ($queryaddress->result() as $value) {
                    $address[]=array(
                        'ID' => @$value->ID,
                        'address'=>@$value->address,
                        'phone'=>@$value->phone,
                        'mobile'=>@$value->mobile,
                        'title'=>@$value->title,
                        'city'=>@$value->city,
                    );
                }
            }

            $this->db->select('ID,title,price,image');
            $this->db->from('visha_gift_type');
            // $this->db->where('user_id',$User->ID);
            $this->db->order_by("ID", "desc");
            $querygift = $this->db->get();
               
                foreach ($querygift->result() as $value) {
                    $array_gift[]=array(
                        'ID' => @$value->ID,
                        'title'=>@$value->title,
                        'price'=>@$value->price,
                        'image'=>$this->imagePath(@$value->image, 256, 256, PNG),
                    );
                }

                $vocherpercent="";
                if(strlen(@$vocher)>0){
                    $this->db->select('ID,title,percent,price');
                    $this->db->from('visha_vochers');
                    $this->db->where('title',@$vocher);
                    $queryvocher = $this->db->get();
                    $resultvpcher=@$queryvocher->result()[0];
                    if(intval(@$resultvpcher->ID)>0){
                        $this->db->select('ID');
                        $this->db->from('visha_vocher_log');
                        $this->db->where('user_id',@$User->ID);
                        $this->db->where('vocher_id',@$vocher);
                        $queryvocherlog = $this->db->get();
                        $resultlog=@$queryvocherlog->result()[0];
                        if(intval(@$resultlog->ID)>0){
                            $this->returnError(403, true, 'شما قبلا از این کد  تخفیف استفاده کرده اید.');
                        }else{
                            if(intval(@$resultvpcher->ID)>0){
                                $vocherpercent=$resultvpcher->percent;
                                $finlaprice=$finlaprice-$pricevocher;
                            }
                        }
                   
                    }
                    else{
                        $this->returnError(403, true, 'کد تخفیف وارد شده صحیح نمی باشد.');
                    }
                  
                }

            $link="";
            // if(strlen($token)>0&& $is_cookie=="0")
            // $link=$this->getPayUrl($token,$product_ids,$color_ids,$count_product,'web',$finlaprice,"6");
            $json['basket']=$basket;
            $json['finlaprice']=$finlaprice;
            $json['final_price_product']=$final_price_product;
            $json['final_price_gift']=$final_price_gift;
            $json['address']=$address;
            $json['linkpay']=$link;
            $json['gift_type']=$array_gift;
            $json['vocherpercent']=$vocherpercent;
    
            $this->returnJSON($json, 
            $this->responseDialog(200, false, '')
            );
       
    }




    public function addNews(){
        
        $this->Method(POST);
        $emial=$this->post('email');

        $data = array(
            'email' => $emial ,
         ); 

         $this->db->insert('newsletters', $data); 
        //  $order_id = $this->db->insert_id();

        $json['status']=200;
        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );


    }


    public function updateUser(){
        
        $this->Method(POST);

        $token=$this->post('token');
        $username=$this->post('username');
        $User=$this->checkToken(REQUIRED);

            if(strlen($username)==0)
        $this->returnError(403, true, 'Invalid username');




        
        $data = array(
            'fullname' => $username ,
           
         ); 

             $this->db->where('ID', $User->ID);
             $this->db->update('prime_users', $data);   


        $json['status']=200;
        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );

    }

    public function getUrl(){


        $this->Method(POST);
        $vocher="";
        $token=$this->post('token');
        $product_idz=$this->post('product_idz');
        $finlaprice=$this->post('finlaprice');
        $addreess_idz=$this->post('addreess_idz');
        $count_product=$this->post('count_product');
        $color_ids=$this->post('color_ids');
        $vocher=$this->post('vocher');
        if(strlen($token)>0)
        $User=$this->checkToken(REQUIRED);
        

        $this->db->select('user_products.ID,user_products.product_id
        ,user_products.number,visha_product.title,visha_product.price
        ,visha_product.img1,user_products.color
        ,visha_product.available_in_stock,user_products.number
        ,visha_product.newprice,visha_product.percent_offer,user_products.giftwrapping,visha_product.ID as product_id,user_products.gift_id');
        $this->db->from('user_products');
        $this->db->join('visha_product', 'user_products.product_id = visha_product.ID','left');
         $this->db->where('user_products.user_id',$User->ID);    
        $this->db->where('user_products.purchase_date',0);
        $this->db->order_by("ID", "desc");
        $querybasket = $this->db->get();
        // die($this->db->last_query());
            $basket=array();
            $finlaprice=0;
            $product_ids="";
            $color_ids="";
            $number=0;
            $newprice="";
            $count_product=0;
            $gift_ids="0";
            $final_price_product=0;
            $final_price_gift=0;
            foreach ($querybasket->result() as $value) {
                $number=@$value->number;
                $newprice=@$value->newprice;
                if($newprice>0){
                    $finlaprice=$finlaprice+(@$value->newprice*$number);
                    $final_price_product=$final_price_product+(@$value->newprice*$number);
                }else{
                    $finlaprice=$finlaprice+(@$value->price*$number);
                    $final_price_product=$final_price_product+(@$value->price*$number);
                }


                if(intval(@$value->gift_id)>0){
                    $this->db->select('ID,image,title,price');
                    $this->db->from('visha_gift_type');
                    $this->db->where('ID', $value->gift_id);
                    $querygift = $this->db->get();
                    $resultgift = $querygift->result()[0];
                    $final_price_gift=$final_price_gift+intval(@$resultgift->price);
                    $finlaprice=$finlaprice+intval(@$resultgift->price);
                }
                $product_ids=$product_ids.",".@$value->ID;
                $color_ids=$color_ids.",".@$value->color;
                $count_product=$count_product.",".@$value->number;
                if(intval(@$value->gift_id)>0)
                $gift_ids=$gift_ids.",".@$value->gift_id;
                else{
                    $gift_ids=$gift_ids.","."0";
                }
              
            }

            $vocherpercent="";
            if(strlen(@$vocher)>0){
                $this->db->select('ID,title,percent,price');
                $this->db->from('visha_vochers');
                $this->db->where('title',@$vocher);
                $queryvocher = $this->db->get();
                $resultvpcher=@$queryvocher->result()[0];
                $pricevocher=intval($resultvpcher->price);
                    if(intval(@$resultvpcher->ID)>0){
                        $vocherpercent=$resultvpcher->percent;
                        $finlaprice=$finlaprice-$pricevocher;
                    }
                    $data = array(
                        'timestamp' => Time() ,
                        'vocher_id' => $vocher ,
                        'user_id' => $User->ID ,
                     ); 
         
             $this->db->insert('visha_vocher_log', $data); 

            }

            // print_r("gift ".$final_price_gift."\n");
            // print_r("final_price_product ".$final_price_product."\n");
            // print_r("final_price_product ".$finlaprice."\n");
            // print_r("gift_ids ".$gift_ids."\n");
            // die();

            $link="";
            $link=$this->getPayUrl($token,$product_ids,$color_ids,$count_product,'web',$finlaprice,$addreess_idz,$User->mobile,$gift_ids,$vocher);
        // $link=$this->getPayUrl($token,$product_idz,$color_ids,$count_product,'web',$finlaprice,$addreess_idz);
        // $link=$this->getPayUrl($token,$product_idz,'web',$finlaprice,$addreess_idz);
        // $link="20000";
        $json['linkpay']=$link;
        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );

    }


    public function getUser(){
        $this->Method(POST);

        $token=$this->post('token');
        if(strlen($token)>0)
        $User=$this->checkToken(REQUIRED);

        $userr=array(
            'ID' => @$User->ID,
            'fullname'=>@$User->fullname,
            'mobile'=>@$User->mobile,
        );


        $json['user']=$userr;
        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );
    }


    public function addressUser(){
        $this->Method(POST);

        $token=$this->post('token');
        if(strlen($token)>0)
        $User=$this->checkToken(REQUIRED);

        $action=$this->post('action');
        $address=$this->post('address');
        $phone=$this->post('phone');
        $mobile=$this->post('mobile');
        $title=$this->post('title');
        $state=$this->post('state');
        $city=$this->post('city');
        $id=$this->post('id');


      
            //Generate Order
           
               $data = array(
                   'address' => $address ,
                   'phone' => $phone ,
                   'mobile' => $mobile ,
                   'title' => $title ,
                   'state' => $state ,
                   'city' => $city ,
                   'user_id' => @$User->ID ,
                ); 
    
                if($action=="1"){
        $this->db->insert('user_addresses', $data); 
        $order_id = $this->db->insert_id();
                }else{
                    $this->db->where('ID', $id);
                    $this->db->update('user_addresses', $data);   
                }
   
       //  //Save OrderID in Cookie
       // $this->setCookie('_order_id', $order_id);

       



        $json['status']=200;
       
    
        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );
    }
    

    public function getDetailAddress(){
        $this->Method(POST);
        $id=$this->post('id');


        $this->db->select('ID,address,phone,mobile,title,city,state');
        $this->db->from('user_addresses');
        $this->db->where('ID',$id);
        $query = $this->db->get();
        $result=@$query->result()[0];


        $address=array(
            'ID' => @$result->ID,
            'address'=>@$result->address,
            'phone'=>@$result->phone,
            'mobile'=>@$result->mobile,
            'title'=>@$result->mobile,
            'city'=>@$result->city,
            'state'=>@$result->states,
        );

        $json['address']=$address;
       
    
        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );
        
    }

    public function editBasket(){
           // action 0 delete action 1 add 
           $this->Method(POST);

           $token=$this->post('token');
           $productID=$this->post('productID');
           $number=$this->post('number');
           $color=$this->post('color');
           $codeposti=$this->post('codeposti');
           $city=$this->post('city');
           $state=$this->post('state');
           $edit_id=$this->post('edit_id');
           $action=$this->post('action');
           $giftwrapping=$this->post('giftwrapping');
           $gift_id=$this->post('gift_id');
           $is_cookie=$this->post('is_cookie');
           if(strlen($token)>0 && $is_cookie=="0")
           $User=$this->checkToken(REQUIRED);


           $data = array(
            'number' => $number ,
            'color' => $color ,
            'giftwrapping' => $giftwrapping ,
            'gift_id' => $gift_id ,
         );
         $this->db->where('ID', $edit_id);
         $this->db->update('user_products', $data);

         $json['statud']=200;
   

         $this->returnJSON($json, 
         $this->responseDialog(200, false, '')
         );

    }

    public function basketUser(){


        // action 0 delete action 1 add 
       // $action=="2" update
        $this->Method(POST);

        $token=$this->post('token');
        $productID=$this->post('productID');
        $number=$this->post('number');
        $color=$this->post('color');
        $codeposti=$this->post('codeposti');
        $city=$this->post('city');
        $state=$this->post('state');
        $edit_id=$this->post('edit_id');
        $action=$this->post('action');
        $giftwrapping=$this->post('giftwrapping');
        $gift_id=$this->post('gift_id');
        $is_cookie=$this->post('is_cookie');
        if(strlen($token)>0 && $is_cookie=="0")
        $User=$this->checkToken(REQUIRED);


        $this->db->select('user_products.ID,user_products.product_id,user_products.user_id
        ,user_products.token_cookie
        ,visha_product.price,user_products.purchase_date,user_products.color');
        $this->db->from('user_products');
        $this->db->join('visha_product', 'user_products.product_id = visha_product.ID','left');
        if(strlen($token)>0 && $is_cookie=="0")
        $this->db->where('user_products.user_id',$User->ID);
        $this->db->where('user_products.product_id',$productID);
        if(strlen($token)>0 && $is_cookie=="1")
        $this->db->where('token_cookie',$token);
        $this->db->where('color',$color);
        $this->db->order_by("ID", "desc");
           $queryaddress = $this->db->get();
          $result=@$queryaddress->result()[0];
        //   die($this->db->last_query());
            // if(@$result->ID>0&& ($action=="1"||$action=="0")&& @$result->purchase_date==0 ){
            //     $this->returnError(404, true, 'این محصول قبلا در سبد خرید شما ثبت شده است !');
            // }

            $this->db->select('ID,price');
            $this->db->from('visha_product');
            $this->db->where('ID',@$productID);
            $this->db->order_by("ID", "desc");
            $queryp = $this->db->get();
            $plist=@$queryp->result()[0];
            // && intval(@$result->color)==$color

        if($action=="1"){
             //Generate Order
             // is_cookie =0 userId 
             if(@$result->ID>0&& ($action=="1"||$action=="0")&& @$result->purchase_date==0 ){

                $data = array(
                    'number' => $number ,
                    'color' => $color ,
                    'giftwrapping' => $giftwrapping ,
                    'gift_id' => $gift_id ,
                    'number' => $number ,
                 );
                 $this->db->where('ID', $result->ID);
                 $this->db->update('user_products', $data);
            }else{
                if($is_cookie=="0"){
                    $data = array(
              
                        'product_id' => $productID ,
                        'number' => $number ,
                        'color' => $color ,
                        'user_id' => $User->ID ,
                        'giftwrapping' => $giftwrapping ,
                        'gift_id' => $gift_id ,
                        'price' => $plist->price ,
                        'timestamps'	=>  Time() ,
                     );
                 }else{
                      // is_cookie =1 svae basket in cookie 
                    $data = array(
                        'product_id' => $productID ,
                        'number' => $number ,
                        'color' => $color ,
                        'token_cookie' => $token ,
                        'giftwrapping' => $giftwrapping ,
                        'gift_id' => $gift_id ,
                        'price' => $plist->price ,
                        'is_cookie' => 1 ,
                        'timestamps'	=>  Time() ,
                     ); 
                 }
         
             $this->db->insert('user_products', $data); 
             $order_id = $this->db->insert_id();
        
            }
            
    
        //  //Save OrderID in Cookie
        // $this->setCookie('_order_id', $order_id);

        }else if($action=="2"){
            $data = array(
            'number' => $number ,
            'color' => $color ,
            'giftwrapping' => $giftwrapping ,
            'gift_id' => $gift_id ,
         );
         $this->db->where('ID', $edit_id);
         $this->db->update('user_products', $data);
         
        }
        
        elseif($action=="3"){
            if($is_cookie=="0"){
            $this->db->query("DELETE FROM `user_products` WHERE `ID`='".$productID."' AND `user_id`='".$User->ID."'");
            }else{
            $this->db->query("DELETE FROM `user_products` WHERE `ID`='".$productID."' AND `token_cookie`='".$token."'");
            }
        }


           
        $json['statud']=200;
   

        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );

    }


    public function getListAddress(){


        $this->Method(POST);

        $token=$this->post('token');
        if(strlen($token)>0)
        $User=$this->checkToken(REQUIRED);
        
        $this->db->select('ID,address,phone,mobile,title,city');
        $this->db->from('user_addresses');
        $this->db->where('user_id',@$User->ID);
        $this->db->order_by("ID", "desc");
           $queryaddress = $this->db->get();
            $address=array();
            foreach ($queryaddress->result() as $value) {
                $address[]=array(
                    'ID' => @$value->ID,
                    'address'=>@$value->address,
                    'phone'=>@$value->phone,
                    'mobile'=>@$value->mobile,
                    'title'=>@$value->title,
                    'city'=>@$value->city,
                );
            }
     
        $json['address']=$address;
   

        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );

    }

 

    public function getListArticle(){
        $this->Method(GET);

        //Get Device Information
  
  
      //         get Article 
      $this->db->select('ID,title,image,short_desc,date,comment,views');
      $this->db->from('visha_article');
      $this->db->order_by("ID", "desc");
      $queryarticle = $this->db->get();
  
          $article=array();
          
          foreach ($queryarticle->result() as $value) {
            if(intval(@$value->date)>0)
            $time=$this->jdf->full_date(@$value->date)."";
              $article[]=array(
                  'ID' => @$value->ID,
                  'title'=>@$value->title,
                  'image'=>$this->imagePath(@$value->image, 180, 124, PNG),
                  'short_desc'=>@$value->short_desc,
                  'date'=>@$time,
                  'comment'=>@$value->comment,
                  'views'=>@$value->views,
              );
          }
  
          
          $json['article']=$article;
     
  
          $this->returnJSON($json, 
          $this->responseDialog(200, false, '')
          );
    }


    public function getDetailArticle(){
        $this->Method(GET);

        $idarticle = $this->get('ID', REQUIRED, TEXT); 
  
  
      //         get Article 
      $this->db->select('ID,title,image,short_desc,date,desc_article');
      $this->db->from('visha_article');
      $this->db->where('ID',@$idarticle);
      $this->db->order_by("ID", "desc");
      $queryarticle = $this->db->get();
      $articlelist=$queryarticle->result()[0];
  
          $article=array();
          

          $article=array(
            'ID' => @$articlelist->ID,
            'title'=>@$articlelist->title,
            'image'=>$this->imagePath(@$articlelist->image, 256, 256, PNG),
            'short_desc'=>@$articlelist->short_desc,
            'desc_article'=>@$articlelist->desc_article,
            'date'=>@$articlelist->date,
            'views'=>@$articlelist->views,
            'comment'=>@$articlelist->comment,
        );
  
          
          $json['article']=$article;
     
  
          $this->returnJSON($json, 
          $this->responseDialog(200, false, '')
          );

    }




    public function addOrderMember(){
        // iziapp_order_member

     
            $link=$this->getPayUrl("token",5,'web',24);
          
            $json['status']=200;
            $json['link']=$link;
            $this->returnJSON($json, 
            $this->responseDialog(200, false, '')
            );
    }


    public function getOrderUser(){
        $this->Method(POST);

        $token=$this->post('token');
        if(strlen($token)>0)
        $User=$this->checkToken(REQUIRED);
        $this->db->select('ID,status,final_price,status_product,product_idz,gift_ids,time,is_return_money,delivery_time');
        $this->db->from('prime_orders');
        $this->db->where('user_id',$User->ID);
        $this->db->where('status',1);
        $this->db->order_by("ID", "desc");
        $queryorder = $this->db->get();
        // die($this->db->last_query());
            $order=array();
            foreach ($queryorder->result() as $value) {
                        if(@$value->status_product==1){
                            $statusproduct="در حال بررسی ";
                        }else if(@$value->status_product==2){
                            $statusproduct="تحویل انبار شده";
                        }else if(@$value->status_product==3){
                            $statusproduct="تحویل  شده";
                        }
                        if(intval(@$value->is_return_money)==1){
                            $statusproduct="سفارش عودت داده شده است";
                        }



                    //// check return product

                    $now = Time(); // or your date as well
                    $your_date = $value->delivery_time;
                    $datediff = $now - $your_date;
                    $mode=round($datediff / (60 * 60 * 24));
                
                    if( $mode>2){
                        $can_return_money="0";
                    }else{
                        $can_return_money="1";
                    }

                    if(intval(@$value->is_return_money)==1){
                        $can_return_money="0";
                    }


                        $order_arr=explode(',', $value->product_idz);
                        $order_arr_gift=explode(',', $value->gift_ids);
                        $data=array();
                        foreach ($order_arr as $values) {
                                    if(strlen($values)>0){
                                        $this->db->select('visha_product.ID,visha_product.img1,visha_product.title
                                        ,visha_product.product_color,visha_product.product_used,visha_product.product_desc
                                        ,visha_product.type_design,visha_product.product_design_details,user_products.gift_id
                                        ,user_products.giftwrapping');
                                        $this->db->from('user_products');
                                        $this->db->join('visha_product', 'user_products.product_id = visha_product.ID','left');
                                        $this->db->where('user_products.ID',@$values);
                                        $this->db->order_by("ID", "desc");
                                        $queryproduct = $this->db->get();
                                        $productlist=$queryproduct->result()[0];
            
                                        $data[]=array(
                                            'ID' => @$productlist->ID,
                                            'title'=>@$productlist->title,
                                            'image1'=>$this->imagePath(@$productlist->img1, 256, 256, PNG),
                                            'giftwrapping'=>@$productlist->giftwrapping,
                                            'gift_id'=>@$productlist->gift_id,
                                        );
            
                                    }
                        }
                $time=$this->jdf->full_date(@$value->time)."";
                $order[]=array(
                    'ID' => @$value->ID,
                    'status'=>@$value->status,
                    'is_return_money'=>@$value->is_return_money,
                    'can_return_money'=>@$can_return_money,
                    'final_price'=>@$value->final_price,
                    'status_product'=>@$statusproduct,
                    'product'=>@$data,
                    'purchase_date'=>@$time,
                       
               
                );
            }
     
        $json['order']=$order;
   

        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );

    }

    public function addfavorite(){
        $this->Method(POST);

        $token=$this->post('token');
        $product_id=$this->post('product_id');
        $this->db->select('ID,token,product_id');
        $this->db->from('visha_favorite');
        $this->db->where('token',@$token);
        $this->db->where('product_id',@$product_id);
        $queryf = $this->db->get();
        $favoritep=@$queryf->result()[0];
            if(@$favoritep->ID>0){
                    // print_r("test");
                    // die();
            }else{
                $data = array(
                    'product_id' => $product_id ,
                    'token' => $token ,
                    'timestamp'	=>  Time() ,
                 );
                 $this->db->insert('visha_favorite', $data); 
            }
      


        $json['status']=200;
   

        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );
    }

    public function addviewvishaproduct($product_id,$token){
        $this->Method(POST);

        // $token=$this->post('token');
        // $product_id=$this->post('product_id');
        $this->db->select('ID,token,product_id');
        $this->db->from('visha_view_product');
        $this->db->where('token',@$token);
        $this->db->where('product_id',@$product_id);
        $queryf = $this->db->get();
        $favoritep=@$queryf->result()[0];
            if(@$favoritep->ID>0){
                    // print_r("test");
                    // die();
            }else{
                $data = array(
                    'product_id' => $product_id ,
                    'token' => $token ,
                    'timestamp'	=>  Time() ,
                 );
                 $this->db->insert('visha_view_product', $data); 
            }
      


        // $json['status']=200;
   

        // $this->returnJSON($json, 
        // $this->responseDialog(200, false, '')
        // );
    }


    public function deletefavorite(){
        $this->Method(POST);

        // $token=$this->post('token');
        // $product_id=$this->post('product_id');
        $id=$this->post('id');
        $token=$this->post('token');
        $this->db->query("DELETE FROM `visha_favorite` WHERE `product_id`='".$id."' AND `token`='".$token."'");


        $json['status']=200;
   

        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );
    }

    public function deleteviewvisha(){
        $this->Method(POST);

        // $token=$this->post('token');
        // $product_id=$this->post('product_id');
        $token=$this->post('token');
        $this->db->query("DELETE FROM `visha_view_product` WHERE `token`='".$token."'");
        $json['status']=200;
   

        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );
    }


    public function getfavorite(){
        $this->Method(POST);
        $token=$this->post('token');

        $this->db->select('visha_product.ID,visha_product.img1,visha_product.img2,visha_product.img3,visha_product.img4,visha_product.img5,visha_product.img6,visha_product.img7,visha_product.img8
        ,visha_product.img9,visha_product.price,visha_product.title
        ,visha_product.available_in_stock,visha_product.menu_sub_cat_id
        ,visha_product.short_desc,visha_product.product_color
        ,visha_product.percent_offer,visha_product.newprice,visha_product.product_used,visha_product.product_desc
        ,visha_product.type_design,visha_product.product_design_details,visha_favorite.product_id');
        $this->db->from('visha_product');
        $this->db->join('visha_menu_sub_cat', 'visha_product.menu_sub_cat_id = visha_menu_sub_cat.ID','left');
        $this->db->join('visha_menu_cat', 'visha_menu_sub_cat.menu_cat_id = visha_menu_cat.ID','left');
        $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');
        $this->db->join('visha_favorite', 'visha_favorite.product_id = visha_product.ID','left');
        $this->db->where('visha_favorite.token',@$token);
        $queryproduct = $this->db->get();
        $productlist=$queryproduct->result();
    
        $favorite=array();
        foreach ($queryproduct->result() as $value) {
            $str= explode(",",@$value->product_color);
            $this->db->select('ID,title,code_color');
            $this->db->from('visha_product_color');
            $this->db->where('ID',$str[0]);
            $this->db->order_by("ID", "desc");
            $this->db->limit(1);
            $query = $this->db->get();
            $result=@$query->result()[0];
            // die($this->db->last_query());
            $colors=array(
                "id"=>@$result->ID,
                "code_color"=>@$result->code_color,
                "title"=>@$result->title,
            );
            $favorite[]=array(
                "ID"=>@$value->ID,
                "title"=>@$value->title,
                "price"=>@$value->price,
                "colors"=>@$colors,
                "image1"=>$this->imagePath(@$value->img1, 256, 256, PNG),
            );
        }


        $json['favorite']= $favorite;
   

        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );

    }


    public function getviewvisha(){
        $this->Method(POST);
        $token=$this->post('token');

        $this->db->select('visha_product.ID,visha_product.img1,visha_product.img2,visha_product.img3,visha_product.img4,visha_product.img5,visha_product.img6,visha_product.img7,visha_product.img8
        ,visha_product.img9,visha_product.price,visha_product.title
        ,visha_product.available_in_stock,visha_product.menu_sub_cat_id
        ,visha_product.short_desc,visha_product.product_color
        ,visha_product.percent_offer,visha_product.newprice,visha_product.product_used,visha_product.product_desc
        ,visha_product.type_design,visha_product.product_design_details,visha_view_product.product_id');
        $this->db->from('visha_product');
        $this->db->join('visha_menu_sub_cat', 'visha_product.menu_sub_cat_id = visha_menu_sub_cat.ID','left');
        $this->db->join('visha_menu_cat', 'visha_menu_sub_cat.menu_cat_id = visha_menu_cat.ID','left');
        $this->db->join('visha_cat', 'visha_menu_cat.cat_id = visha_cat.ID','left');
        $this->db->join('visha_view_product', 'visha_view_product.product_id = visha_product.ID','left');
        $this->db->where('visha_view_product.token',@$token);
        $this->db->order_by("visha_view_product.timestamp", "desc");
        $this->db->limit(8);
        $queryproduct = $this->db->get();
        $productlist=$queryproduct->result();
        $favorite=array();
        foreach ($queryproduct->result() as $value) {
            $str= explode(",",@$value->product_color);
            $this->db->select('ID,title,code_color');
            $this->db->from('visha_product_color');
            $this->db->where('ID',$str[0]);
            $this->db->order_by("ID", "desc");
            $this->db->limit(1);
            $query = $this->db->get();
            $result=@$query->result()[0];
            $colors=array(
                "id"=>$result->ID,
                "code_color"=>@$result->code_color,
                "title"=>@$result->title,
            );
            $favorite[]=array(
                "ID"=>@$value->ID,
                "title"=>@$value->title,
                "price"=>@$value->price,
                "colors"=>@$colors,
                "image1"=>$this->imagePath(@$value->img1, 256, 256, PNG),
            );
        }


        $json['viewvisha']= $favorite;
   

        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );

    }

    public function getDetailOrder(){

        $this->Method(POST);

        $token=$this->post('token');
        $id=$this->post('id');
        if(strlen($token)>0)
        $User=$this->checkToken(REQUIRED);
        
        $this->db->select('prime_orders.ID,prime_orders.status,prime_orders.final_price,prime_orders.product_idz
        ,prime_orders.color_ids,prime_orders.status_product,prime_orders.addreess_idz,user_addresses.address
        ,user_addresses.title,user_addresses.mobile,user_addresses.state,user_addresses.city,prime_orders.time,prime_orders.count_product,
        ,prime_orders.is_return_money,prime_orders.delivery_time');
        $this->db->from('prime_orders');
        $this->db->join('user_addresses', 'prime_orders.addreess_idz = user_addresses.ID','left');
        $this->db->where('prime_orders.user_id',$User->ID);
        $this->db->where('prime_orders.ID',$id);
        $this->db->order_by("prime_orders.ID", "desc");
           $queryorder = $this->db->get();
           $order=$queryorder->result()[0];
        //    die($this->db->last_query());
           $order_detail=array();

           $addreess=array(
               "title"=>@$order->title,
               "address"=>@$order->address,
               "mobile"=>@$order->mobile,
               "state"=>@$order->state,
               "city"=>@$order->city,

           );

           
 
       


            $order_arr=explode(',', $order->product_idz);
            $order_arr_color=explode(',', $order->color_ids);
            $order_arr_count_product=explode(',', $order->count_product);
            $data=array();
            foreach ($order_arr as $value) {
                        if(strlen($value)>0){
                            $this->db->select('visha_product.ID,visha_product.img1,visha_product.season,visha_product.title
                            ,visha_product.product_color,visha_product.product_used,visha_product.product_desc
                            ,visha_product.type_design,visha_product.product_design_details
                            ,user_products.price as pprice,user_products.number,user_products.giftwrapping');
                            $this->db->from('user_products');
                            $this->db->join('visha_product', 'user_products.product_id = visha_product.ID','left');
                            $this->db->where('user_products.ID',@$value);
                            $this->db->order_by("ID", "desc");
                            $queryproduct = $this->db->get();
                            $productlist=$queryproduct->result()[0];
                         
                            $data[]=array(
                                'ID' => @$productlist->ID,
                                'title'=>@$productlist->title,
                                'price'=>@$productlist->pprice,
                                'season'=>@$productlist->season,
                                'number'=>@$productlist->number,
                                'giftwrapping'=>@$productlist->giftwrapping,
                                'color'=>"",
                                'image1'=>$this->imagePath(@$productlist->img1, 256, 256, PNG),
                            );

                        }
            }

            $order_arr_color=explode(',', $order->color_ids);
            $i=0;
            foreach ($order_arr_color as $value) {
                if(strlen($value)>0){
                $this->db->select('ID,title,code_color');
                $this->db->from('visha_product_color');
                $this->db->where('ID',@$value);
                $query = $this->db->get();
                $result=@$query->result()[0];

                $colors=array(
                    "ID"=>@$result->ID,
                    "title"=>@$result->title,
                    "code_color"=>@$result->code_color,
                );
                $data[$i]['color']=$colors;
                $i++;
            }
            }

                //// check return product

                $now = Time(); // or your date as well
                $your_date = $order->delivery_time;
                $datediff = $now - $your_date;
                $mode=round($datediff / (60 * 60 * 24));
            
                if( $mode>2){
                    $can_return_money="0";
                }else{
                    $can_return_money="1";
                }

                if(intval(@$order->is_return_money)==1){
                    $can_return_money="0";
                }

                // if(intval($your_date)==0){

                // }



            if(@$order->status_product==1){
                $statusproduct="تایید پرداخت ";
            }else if(@$order->status_product==2){
                $statusproduct="تحویل انبار شده";
            }else if(@$order->status_product==3){
                $statusproduct="تحویل  شده";
            }

            if(intval(@$value->is_return_money)==1){
                $statusproduct="سفارش عودت داده شده است";
            }
            $order_detail=array(
                'ID' => @$order->ID,
                'status_order'=>@$statusproduct,
                'final_price'=>@$order->final_price,
                'status'=>@$order->status,
                'addreess'=>@$addreess,
                'products'=>@$data,
                'is_return_money'=>@$order->is_return_money,
                'can_return_money'=>@$can_return_money,
                'date'=>$this->jdf->full_date(@$order->time)."",
            );
        
     
        $json['data']=$order_detail;
   

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
            'user_id' => $User->ID ,
            'token' => $token ,
            'ad_id' => $product_ids ,
            'product_idz' => $product_ids ,
            'color_ids' => $color_ids ,
            'count_product' => $count_product ,
            'addreess_idz' => $addreess_idz ,
            'vocher' => $vocher ,
            'gift_ids' => $gift_ids ,
            'time'	=>  Time() ,
         );
         $this->db->insert('prime_orders', $data); 
         $order_id = $this->db->insert_id();
    
    
         //Save OrderID in Cookie
        $this->setCookie('_order_id', $order_id);

    
        $callback_background=str_replace(':8080', '', WEBSITE_BASE_URL).WEBSITE_API_PATH."visha/savePurchase";
        $callback=WEBSITE_FRONT_URL."/pay/callback";
            
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

    





        }


?>