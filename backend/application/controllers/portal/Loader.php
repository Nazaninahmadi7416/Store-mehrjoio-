<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

defined('BASEPATH') OR exit('No direct script access allowed');


//Section Types
define('SECTION_FORM', 'form');
define('SECTION_LIST', 'list');
define('SECTION_GRID', 'grid');
define('SECTION_GRID_BTN', 'grid_btn');


//Form Fields
define('INPUT', 'input');
define('INPUT_READONLY', 'input_readonly');
define('HIDDEN', 'hidden');
define('TEXTAREA', 'textarea');
define('EDITOR', 'editor');
define('CHECKBOX', 'checkbox');
define('IMAGEUPLOAD', 'imageupload');
define('FILEUPLOAD', 'fileupload');
define('JSON', 'json');
define('DROPDOWN', 'dropdown');
define('DROPDOWN_MULTI', 'dropdown_multi');
define('SUBMIT_BUTTON', 'submit_button');
define('HTML', 'html_raw');
define('LINK', 'link');
define('GRID_3_12', 'grid_3_12');
define('GRID_4_12', 'grid_4_12');


include_once('application/controllers/portal/SectionManager.php');
include_once('application/controllers/portal/Menus.php');

class Loader extends MY_Portal
{

    private $SectionManager;
    private $MenuManager;

    public function pageLoader($page){
        //Check Valid Page Request

        $MenuManager = new MenuManager();
        $valid_pages=$MenuManager->getMenu();

        //Check Token
        $this->checkToken();

        if(strlen(@$valid_pages[$page]['title'])==0){
            $this->returnError(403, 'dashboard', true, 'صفحه درخواستی معتبر نمی باشد.');
        }else{
            $this->SectionManager=new SectionManager();
            $this->{$valid_pages[$page]['function_name']}();
        }

    }

    //Use this function to rename or update menu titles dynamicly
    public function dynamicMenuVariables($url, $title){

        if($url=='support-tickets'){
            $unread_tickets=$this->getTotalCount('support_tickets', array('status'=>'0','parent_id'=>'0'));
            $title .= " ($unread_tickets)";
        }

        return $title;
    }

    //Menu & Dashboard
    public function getMenu(){
        $MenuManager = new MenuManager();
        $valid_pages=$MenuManager->getMenu();
        $menus=array();
        foreach ($valid_pages as $key => $value) {
            if($value['show_in_menu']==true){
                $menus[]=array(
                    "title" => $this->dynamicMenuVariables($key, $value['title']),
                    "url" => $key,
                );
            }
        }

        $admin_info=array(
            'fullname' => 'مدیریت',
            'desc' => 'مدیر سایت',
            'image' => 'http://placeimg.com/280/155/tech',
            'profile_image' => 'http://placeimg.com/256/256/tech',
        );

        $redirect_url='';
        $this->returnJSON(array('menus' => $menus, 'admin_info' => $admin_info), 
            $this->responseDialog(200, $redirect_url, false, '')
        ); 
    }
    private function dashboardLoader(){

        //Page Title
        $this->SectionManager->pageConfig('خوش آمدید');

        //--------------------------------------------------

                // Statistics Grid
        $total_users=$this->getTotalCount('prime_users');

        //Today Sell
        $this->db->select("DATE_FORMAT(date_created, '%Y-%m-%d')");
        $this->db->select_sum('final_price');
        $this->db->from('prime_orders');
        $this->db->where("DATE(date_created)=CURDATE()");
        $this->db->where("status=1");
        $query = $this->db->get();
        $data=$query->result();
        // die($this->db->last_query());
        $today_sell=0;
        foreach ($query->result() as $value) {
            $today_sell=$today_sell+intval(@$value->final_price);
        }
     

        // //Yesterday Sell
        $this->db->select("DATE_FORMAT(date_created, '%Y-%m-%d')");
        $this->db->select_sum('final_price');
        $this->db->from('prime_orders');
        $this->db->where("DATE(date_created)=SUBDATE(CURDATE(),1)");
        $this->db->where("status=1");
        $query = $this->db->get();
        $data=$query->result();
        // $yesterday_sell=intval(@$data[0]->amount);
        $yesterday_sell=0;
        foreach ($query->result() as $value) {
            $yesterday_sell=$yesterday_sell+intval(@$value->final_price);
        }

        // //This Month Sell
        $this->db->select_sum('final_price');
        $this->db->from('prime_orders');
        $this->db->where("MONTH(date_created) = MONTH(CURRENT_DATE())");
        $this->db->where("status=1");
        $query = $this->db->get();
        $data=$query->result();
        // $this_month_sell=intval(@$data[0]->amount);
        $this_month_sell=0;
        foreach ($query->result() as $value) {
            $this_month_sell=$this_month_sell+intval(@$value->final_price);
        }

        //Last Month Sell
        $this->db->select_sum('final_price');
        $this->db->from('prime_orders');
        $this->db->where("MONTH(date_created) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)");
        $this->db->where("status=1");
        $query = $this->db->get();
        $data=$query->result();
        // $last_month_sell=intval(@$data[0]->amount);
        $last_month_sell=0;
        foreach ($query->result() as $value) {
            $last_month_sell=$last_month_sell+intval(@$value->final_price);
        }
        // //This Year Sell
        // $this->db->select_sum('amount');
        // $this->db->from('order_logs');
        // $this->db->where("YEAR(date_created) = YEAR(CURRENT_DATE)");
        // $this->db->where("bank_result=0");
        // $query = $this->db->get();
        // $data=$query->result();
        // $this_year_sell=intval(@$data[0]->amount);

        //Users Stats
        $this->SectionManager->addGrid('کاربران عضو', number_format($total_users));

        //Sells Stats (Today)
        $this->SectionManager->addGrid('فروش امروز', number_format($today_sell)." تومان");

        //Sells Stats (Yesterday)
        $this->SectionManager->addGrid('فروش دیروز', number_format($yesterday_sell)." تومان");

        // //Sells Stats (This Month)
        $this->SectionManager->addGrid('فروش این ماه', number_format($this_month_sell)." تومان");

        // //Sells Stats (Last Month)
        $this->SectionManager->addGrid('فروش ماه گذشته', number_format($last_month_sell)." تومان");

        // //Sells Stats (This Year)
        // $this->SectionManager->addGrid('فروش امسال', number_format($this_year_sell)." تومان");


        $this->SectionManager->add('خلاصه آمار', SECTION_GRID, null, $this->SectionManager->grid_data(), null);




        $redirect_url='';
        $this->returnJSON($this->SectionManager->output(), 
            $this->responseDialog(200, $redirect_url, false, '')
        ); 
        
        

    }
    /////////////////////////////////////////store
    private function managersSliderLoader(){
        $page=intval(@$this->get('store_slider'));
        if($page==0){
            $page=1;
        }
        $total_count=$this->getTotalCount('store_slider');
             
        //Page Title
        $this->SectionManager->pageConfig('مدیریت اسلایدر');
        $edit_id=intval($this->get('id'));
        $this->SectionManager->addGridButton('ثبت اسلایدر جدید', 'new-slider-store');
        $this->SectionManager->add('دکمه های مدیریت', SECTION_GRID_BTN,
         null, $this->SectionManager->grid_btn_data(), null);
        $this->SectionManager->addListHeader(array('ID','عنوان اسلایدر','تصویر','لینک'));
        $this->db->select('*');
        $this->db->from('store_slider');
        $this->db->order_by("ID","DESC");
        $query = $this->db->get();

        foreach ($query->result() as $value) {
                $this->SectionManager->addList(array($value->ID,$value->title,"<img src='".$this->imagePath(@$value->img, 256, 256, PNG)."' style='max-width:150px;max-height:300px' />",$value->url),
                array(array('ویرایش','new-Baner-store?id='.$value->ID),
                array('حذف','ajax:<api>action/delete-slider-store?delete_id='.$value->ID),
                ));
            
     
        }
       

        $this->SectionManager->add('اسلایدرها', SECTION_LIST, $this->SectionManager->form_data(),
         $this->SectionManager->list_data(), $total_count);

 
        $redirect_url='';
        $this->returnJSON($this->SectionManager->output(), 
            $this->responseDialog(200, $redirect_url, false, '')
        ); 


    }
    //for slider
    private function newSliderStore(){
        

        //Page Title
        $this->SectionManager->pageConfig('ایجاداسلایدرجدید');
        $this->SectionManager->addGridButton('برگشت', 'managers-slider');
        $this->SectionManager->add('دکمه های مدیریت', SECTION_GRID_BTN, null, $this->SectionManager->grid_btn_data(), null);
        $edit_id=intval($this->get('id'));
         
        $this->db->select('*');
        $this->db->from('store_slider');
        $this->db->where('ID',$edit_id);
        $query = $this->db->get();
        $value=@$query->result()[0];


        //Page Title
            if($edit_id>0){
                $this->SectionManager->configForm('action/add-update-slider', 'POST');
                $pageTitle='ویرایش اسلایدر ';
            }else{
                $pageTitle='ایجاد اسلایدر جدید';
                $this->SectionManager->configForm('action/add-new-slider', 'POST');
            }
    
  

        $this->SectionManager->pageConfig($pageTitle);
        $this->SectionManager->addFormField('', 'edit_id', $edit_id, HIDDEN, '');
        if($edit_id<=0)
        $this->SectionManager->addFormField('', 'expiredate', (24*60*60)+Time(), HIDDEN, '');
        $this->SectionManager->addFormField('عنوان اسلایدر', 'title',@$value->title, INPUT, '');
        $this->SectionManager->addSeperator();
        $this->SectionManager->addFormField('url', 'url',@$value->url, INPUT, '');
        $this->SectionManager->addSeperator();
        $this->SectionManager->addFormField('عکس', 'img', @$value->img.",".$this->imagePath(@$value->img, 256, 256, PNG), IMAGEUPLOAD, '');
        $this->SectionManager->addSeperator();
        $this->SectionManager->addFormField('ذخیره اطلاعات', 'submit', '', SUBMIT_BUTTON, '');
        $this->SectionManager->add($pageTitle, SECTION_FORM, $this->SectionManager->form_data(), null, 0);

      
        $redirect_url='';
        $this->returnJSON($this->SectionManager->output(), 
            $this->responseDialog(200, $redirect_url, false, '')
        );

  }


  //for Baner
   private function managersBanerLoader(){
    $page=intval(@$this->get('store_baner'));
    if($page==0){
        $page=1;
    }
    $total_count=$this->getTotalCount('store_baner');
         
    //Page Title
    $this->SectionManager->pageConfig('مدیریت بنر');
    $edit_id=intval($this->get('id'));
    $this->SectionManager->addGridButton('ثبت بنر جدید', 'new-Baner-store');
    $this->SectionManager->add('دکمه های مدیریت', SECTION_GRID_BTN,
     null, $this->SectionManager->grid_btn_data(), null);
    $this->SectionManager->addListHeader(array('ID','تصویر'));
    $this->db->select('*');
    $this->db->from('store_baner');
    $this->db->order_by("ID","DESC");
    $query = $this->db->get();

    foreach ($query->result() as $value) {
            $this->SectionManager->addList(array($value->ID,"<img src='".$this->imagePath(@$value->img, 256, 256, PNG)."' style='max-width:150px;max-height:300px' />",),
            array(array('ویرایش','new-Baner-store?id='.$value->ID),
            array('حذف','ajax:<api>action/delete-Baner-store?delete_id='.$value->ID),
            ));
        
 
    }
   

    $this->SectionManager->add('بنرها', SECTION_LIST, $this->SectionManager->form_data(),
     $this->SectionManager->list_data(), $total_count);


    $redirect_url='';
    $this->returnJSON($this->SectionManager->output(), 
        $this->responseDialog(200, $redirect_url, false, '')
    ); 


  }
  //for NewBaner
  private function newBanerStore(){
    

    //Page Title
    $this->SectionManager->pageConfig('ایجاد بنر جدید');
    $this->SectionManager->addGridButton('برگشت', 'managers-Baner');
    $this->SectionManager->add('دکمه های مدیریت', SECTION_GRID_BTN, null, $this->SectionManager->grid_btn_data(), null);
    $edit_id=intval($this->get('id'));
     
    $this->db->select('*');
    $this->db->from('store_baner');
    $this->db->where('ID',$edit_id);
    $query = $this->db->get();
    $value=@$query->result()[0];


    //Page Title
        if($edit_id>0){
            $this->SectionManager->configForm('action/add-update-Baner', 'POST');
            $pageTitle='ویرایش بنر ';
        }else{
            $pageTitle='ایجاد بنر جدید';
            $this->SectionManager->configForm('action/new-Baner-store', 'POST');
        }



    $this->SectionManager->pageConfig($pageTitle);
    $this->SectionManager->addFormField('', 'edit_id', $edit_id, HIDDEN, '');
    if($edit_id>=0)
    $this->SectionManager->addFormField('', 'expiredate', (24*60*60)+Time(), HIDDEN, '');
    // $this->SectionManager->addFormField('عنوان اسلایدر', 'title',@$value->title, INPUT, '');
    // $this->SectionManager->addSeperator();
    // $this->SectionManager->addFormField('url', 'url',@$value->url, INPUT, '');
    // $this->SectionManager->addSeperator();
    $this->SectionManager->addFormField('عکس', 'img', @$value->img.",".$this->imagePath(@$value->img, 256, 256, PNG), IMAGEUPLOAD, '');
    $this->SectionManager->addSeperator();
    $this->SectionManager->addFormField('ذخیره اطلاعات', 'submit', '', SUBMIT_BUTTON, '');
    $this->SectionManager->add($pageTitle, SECTION_FORM, $this->SectionManager->form_data(), null, 0);

  
    $redirect_url='';
    $this->returnJSON($this->SectionManager->output(), 
        $this->responseDialog(200, $redirect_url, false, '')
    );

 }
 //برای مدیریت دسته یندی
 private function managersMenuCatLoader(){


    $page=intval(@$this->get('store_cat'));
    if($page==0){
        $page=1;
    }
    $total_count=$this->getTotalCount('store_cat');
         
    //Page Title
    $this->SectionManager->pageConfig('مدیریت  دسته بندی');
    $edit_id=intval($this->get('id'));
    $this->SectionManager->addGridButton('ثبت دسته جدید', 'new-cat-store');
    $this->SectionManager->add('دکمه های مدیریت', SECTION_GRID_BTN,null, $this->SectionManager->grid_btn_data(), null);
    $this->SectionManager->addListHeader(array('ID','عنوان','نوع دسته','عکس'));
    $this->db->select('*');
    $this->db->from('store_cat');
    $this->db->order_by("ID","DESC");
    $query_similar = $this->db->get();
    foreach ($query_similar->result() as $value) {

       


        $result_value="";
                if(intval(@$value->parent_id)>0){
                    $this->db->select('*');
                    $this->db->from('store_cat');
                    $this->db->where('ID',@$value->parent_id);
                    $this->db->order_by("ID","DESC");
                    $query_similar = $this->db->get();
                    $result_cat=@$query_similar->result()[0];
                    $result_value=@$result_cat->title;
                }else{
                    $result_value="دسته اصلی"; 
                }

                if(strlen(@$value->img1)>0){ // you can check your condition here.
                    $img1="<img src=".$this->imagePath(@$value->img1, 256, 256, PNG)."'style='max-width:100px;max-height:100px' />";
                }else{
                    $img1="";
                }
            $this->SectionManager->addList(array(@$value->ID,@$value->title,@$result_value."",$img1),
            array(array('ویرایش','new-cat-yer?id='.$value->ID),
            array('حذف','ajax:<api>action/delete-cat-store?delete_id='.$value->ID),
            ));
    }
   
    $this->SectionManager->add('دسته بندی', SECTION_LIST, $this->SectionManager->form_data(),
     $this->SectionManager->list_data(), $total_count);
    $redirect_url='';
    $this->returnJSON($this->SectionManager->output(), 
        $this->responseDialog(200, $redirect_url, false, '')
    ); 


 }
 private function newCatStore(){
        
    $this->db->cache_off();
    //Page Title
    $this->SectionManager->pageConfig('ایجاد  دسته جدید');
    $this->SectionManager->addGridButton('برگشت', 'managers-cat-yer');
    $this->SectionManager->add('دکمه های مدیریت', SECTION_GRID_BTN, null, $this->SectionManager->grid_btn_data(), null);


    $edit_id=intval($this->get('id'));
    $this->db->select('*');
    $this->db->from('store_cat');
    $this->db->where('ID',$edit_id);
    $query = $this->db->get();
    $value=@$query->result()[0];


    //Page Title
        if($edit_id>0){
            $this->SectionManager->configForm('action/add-update-cat', 'POST');
            $pageTitle='ویرایش فیلد ';
        }else{
            $pageTitle='ایجاد فیلد جدید';
            $this->SectionManager->configForm('action/add-new-cat', 'POST');
        }

                   //Get cat
                   $this->db->select('ID,title,parent_id');
                   $this->db->from('store_cat');
                   $this->db->order_by("ID","DESC");
                   $query_similar = $this->db->get();
                   $arraycat[]=array();
                   $arraycat[0]="دسته اصلی";

                   foreach ($query_similar->result() as $values) {
                           $arraycat[$values->ID]=$values->title;
                      
                   }

    $this->SectionManager->pageConfig($pageTitle);
    $this->SectionManager->addFormField('', 'edit_id', $edit_id, HIDDEN, '');
    $this->SectionManager->addFormField('عنوان دسته', 'title',@$value->title, INPUT, '');
    $this->SectionManager->addSeperator();
    $this->SectionManager->addFormField(' انتخاب دسته اصلی', 'parent_id',@$value->parent_id, DROPDOWN, $arraycat);
    $this->SectionManager->addSeperator();
    $this->SectionManager->addSeperator();
    $this->SectionManager->addFormField('عکس', 'img1', @$value->img1.",".$this->imagePath(@$value->img1, 256, 256, PNG), IMAGEUPLOAD, '');
    $this->SectionManager->addSeperator();
    // $this->SectionManager->addFormField('عکس', 'img2', @$value->img2.",".$this->imagePath(@$value->img2, 256, 256, PNG), IMAGEUPLOAD, '');
    // $this->SectionManager->addSeperator();
    // $this->SectionManager->addFormField('عکس', 'img3', @$value->img3.",".$this->imagePath(@$value->img3, 256, 256, PNG), IMAGEUPLOAD, '');
    // $this->SectionManager->addSeperator();
    // $this->SectionManager->addFormField('عکس', 'img4', @$value->img4.",".$this->imagePath(@$value->img4, 256, 256, PNG), IMAGEUPLOAD, '');
    // $this->SectionManager->addSeperator();
    $this->SectionManager->addFormField('ذخیره اطلاعات', 'submit', '', SUBMIT_BUTTON, '');
    $this->SectionManager->add($pageTitle, SECTION_FORM, $this->SectionManager->form_data(), null, 0);

  
    $redirect_url='';
    $this->returnJSON($this->SectionManager->output(), 
        $this->responseDialog(200, $redirect_url, false, '')
    );

 }

 //برای مدیریت محصولات
 private function managersProductLoader(){

    $page=intval(@$this->get('store_product'));
    if($page==0){
        $page=1;
    }
    $total_count=$this->getTotalCount('store_product');
    $filter=$this->get('query');

    // Filter Section
    $this->SectionManager->configForm('action/redirect', 'POST');
    $this->SectionManager->addFormField('', 'action', "managers-product", HIDDEN, '');
    $this->SectionManager->addFormField(' جستجو بر اساس کد محصول', 'query',@$filter, INPUT, '');
    $this->SectionManager->addSeperator();
    $this->SectionManager->addFormField('جستجو', 'submit', '', SUBMIT_BUTTON, '');
    $this->SectionManager->add("", SECTION_FORM, $this->SectionManager->form_data(), null, 0);
         
    //Page Title
    $this->SectionManager->pageConfig('مدیریت محصولات');

    $edit_id=intval($this->get('id'));
    $img2=intval($this->get('img2'));

    $this->SectionManager->addGridButton('ثبت  محصول جدید ', 'new-product');
    $this->SectionManager->add('دکمه های مدیریت', SECTION_GRID_BTN,null, $this->SectionManager->grid_btn_data(), null);$this->SectionManager->addListHeader(array('عنوان ','کد محصول','قیمت تومان','عکس محصول1','  عکس محصول2',));

    $this->db->select('*');
    $this->db->from('store_product');
    $this->db->order_by("ID","DESC");
    if(strlen(@$filter)>0){
        $this->db->where("ID",$filter); 
    }

    
    $query_similar = $this->db->get();

    foreach ($query_similar->result() as $value) {
        if(strlen(@$value->img2)>0){ // you can check your condition here.
            $img2="<img src='".$this->imagePath(@$value->img2, 256, 256, PNG)."'style='max-width:100px;max-height:100px' />";
        }else{
            $img2="";
        }
            $this->SectionManager->addList(array(@$value->title,@$value->ID,@$value->price,"<img src='".$this->imagePath(@$value->img1, 256, 256, PNG)."'style='max-width:100px;max-height:100px' />",$img2),
            array(array('ویرایش','new-product?id='.$value->ID),
         
            array('حذف','ajax:<api>action/delete-product-store?delete_id='.$value->ID),
            ));
        
 
    }
    
   

    $this->SectionManager->add('محصولات', SECTION_LIST, $this->SectionManager->form_data(),
     $this->SectionManager->list_data(), $total_count);


    $redirect_url='';
    $this->returnJSON($this->SectionManager->output(), 
    $this->responseDialog(200, $redirect_url, false, '')
    ); 


 }

 private function newProductStore(){

           //Page Title
           $this->SectionManager->pageConfig('ایجاد  محصول جدید');
           $this->SectionManager->addGridButton('برگشت', 'managers-product');
           $this->SectionManager->add('دکمه های مدیریت', SECTION_GRID_BTN, null, $this->SectionManager->grid_btn_data(), null);

           
           $edit_id=intval($this->get('id'));
        
             $this->db->select('*');
             $this->db->from('store_product');
             $this->db->where('ID',$edit_id);
        
           $query = $this->db->get();
           $valueproduct=@$query->result()[0];

        //    die($this->db->last_query());
               if($edit_id>0){
                   $this->SectionManager->configForm('action/add-update-product', 'POST');
                   $pageTitle='ویرایش محصول ';
               }else{
                   $pageTitle='ایجاد محصول جدید';
                   $this->SectionManager->configForm('action/add-new-product', 'POST');
               }
               if ($img2 = null) {
                echo 'You are spending the first half of the month'; 
            }
               $this->db->select('*');
               $this->db->from('store_cat');
               $this->db->order_by("ID","DESC");
               $query_similar = $this->db->get();
               $arrayType[]=array();
               $arrayType[0]=array();
                 foreach ($query_similar->result() as $values) {
                       $arrayType[$values->ID]=$values->title;
               }
                  
           $this->SectionManager->pageConfig($pageTitle);
           $this->SectionManager->addFormField('', 'edit_id', $edit_id, HIDDEN, '');
         //   if($edit_id<=0)
         //   $this->SectionManager->addFormField('', 'expiredate', (24*60*60)+Time(), HIDDEN, '');
           $this->SectionManager->addFormField('عنوان محصول', 'title',@$valueproduct->productname, INPUT, '');
           $this->SectionManager->addSeperator();
           $this->SectionManager->addFormField(' انتخاب دسته ', 'cat_id',@$valueproduct->cat_id, DROPDOWN, $arrayType);
           $this->SectionManager->addSeperator();
           $this->SectionManager->addFormField(' قیمت (تومان)', 'price',@$valueproduct->price, INPUT, '');
           $this->SectionManager->addSeperator();
           $this->SectionManager->addFormField('توضیحات کوتاه', 'short_desc',@$valueproduct->short_desc, TEXTAREA, '');
           $this->SectionManager->addSeperator();
           $this->SectionManager->addFormField('توضیحات ', 'desc',@$valueproduct->desc, TEXTAREA, '');
           $this->SectionManager->addSeperator();
           $this->SectionManager->addFormField('1عکس', 'img1', @$valueproduct->img1.",".$this->imagePath(@$valueproduct->img1, 256, 256, PNG), IMAGEUPLOAD, '');
           $this->SectionManager->addSeperator();
           $this->SectionManager->addFormField('عکس2', 'img2', @$valueproduct->img2.",".$this->imagePath(@$valueproduct->img2, 256, 256, PNG), IMAGEUPLOAD, '');
           $this->SectionManager->addSeperator();
           $this->SectionManager->addFormField('3عکس', 'img3', @$valueproduct->img3.",".$this->imagePath(@$valueproduct->img3, 256, 256, PNG), IMAGEUPLOAD, '');
           $this->SectionManager->addSeperator();
           $this->SectionManager->addFormField('4عکس', 'img4', @$valueproduct->img4.",".$this->imagePath(@$valueproduct->img4, 256, 256, PNG), IMAGEUPLOAD, '');
           $this->SectionManager->addSeperator();        
           $this->SectionManager->addFormField('ذخیره اطلاعات', 'submit', '', SUBMIT_BUTTON, '');
           $this->SectionManager->add($pageTitle, SECTION_FORM, $this->SectionManager->form_data(), null, 0);
   
           $redirect_url='';
           $this->returnJSON($this->SectionManager->output(), 
               $this->responseDialog(200, $redirect_url, false, '')
           );

 }

 private function managersUserAppLoader(){


    $page=intval(@$this->get('prime_users'));
    if($page==0){
        $page=1;
    }
    $total_count=$this->getTotalCount('prime_users');
    $filter_type_ads=@$this->get('type');


    $filter=$this->get('query');

    // Filter Section
    $this->SectionManager->configForm('action/redirect', 'POST');
    $this->SectionManager->addFormField('', 'action', "managers-ads", HIDDEN, '');
    $this->SectionManager->addFormField('جستجو بر اساس    کد کاربر', 'query',@$filter, INPUT, '');
    $this->SectionManager->addSeperator();
    $this->SectionManager->addFormField('جستجو', 'submit', '', SUBMIT_BUTTON, '');
    $this->SectionManager->add("", SECTION_FORM, $this->SectionManager->form_data(), null, 0);


    //Page Title
    $this->SectionManager->pageConfig('مدیریت  اگهی ها');
    $edit_id=intval($this->get('id'));
    // $this->SectionManager->addGridButton('ثبت اگهی جدید', 'new-khanedan-ads');
    // $this->SectionManager->addGridButton('اگهی های منتشر نشده', 'new-khanedan-ads');
    // $this->SectionManager->addGridButton('اگهی های منتشر نشده', 'managers-ads?type=1');
    // $this->SectionManager->addGridButton('اگهی های منتشر شده', 'managers-ads?type=2');
    // $this->SectionManager->addGridButton('همه اگهی ها', 'managers-ads?type=all');
    $this->SectionManager->add('دکمه های مدیریت', SECTION_GRID_BTN,
    null, $this->SectionManager->grid_btn_data(), null);
    $this->SectionManager->addListHeader(array('کد کاربر',' شماره تماس',' کد فعال سازی','  نوع کاربر'));

    $this->db->select('ID,mobile,verification_code,is_amlak');
    $this->db->from('prime_users');
    if(intval(@$filter_type_ads)>0){
        $this->db->where('ID',@$filter_type_ads);
    }
    $this->db->order_by("ID","DESC");
    $query_similar = $this->db->get();
    // die($this->db->last_query());

    foreach ($query_similar->result() as $value) {
                if(intval(@$value->is_amlak)==0){
                    $status_user="کاربرعادی";
                }else{
                    $status_user="مشاور املاک";
                }

            $this->SectionManager->addList(array(@$value->ID,@$value->mobile,@$value->verification_code,$status_user),
            array(
            array('ارتقاع کاربر','ajax:<api>action/upgrade-user-khanedan?user_id='.$value->ID.'&status='.@$value->is_amlak),
        
            ));
        

    }


    $this->SectionManager->add('لیست کاربر ها', SECTION_LIST, $this->SectionManager->form_data(),
    $this->SectionManager->list_data(), $total_count);

    $redirect_url='';
    $this->returnJSON($this->SectionManager->output(), 
        $this->responseDialog(200, $redirect_url, false, '')
    );
}

    




    //File Manager
    private function fileManager(){

        if(DISABLE_PORTAL_FILE_UPLOAD){
            die("Inactive Feature");
        }

        //Page Title
        $this->SectionManager->pageConfig('مدیریت فایل');

        //Upload New File
        $this->SectionManager->addFormField('فایل', 'file', '', FILEUPLOAD, '');
        $this->SectionManager->configForm('#', 'POST');
        $this->SectionManager->add('آپلود فایل', SECTION_FORM, $this->SectionManager->form_data(), null, 0);



        //List of Files    
        $page=intval(@$this->get('page'));

        if($page==0){
            $page=1;
        }
       

        //Get Data From DB
        $this->db->select('ID,file_name,original_file_name,file_path,file_type,file_size,date');
        $this->db->from('file_manager');
        $this->db->order_by("ID", "desc");
        $this->db->limit(20, (($page-1)*20));
        $query = $this->db->get();
        $products=$query->result();


        $total_count=$this->getTotalCount('file_manager');
        $this->SectionManager->configForm('', 'POST');
        //Get Products From Database
        $this->SectionManager->addListHeader(array('#','فایل','نام فایل','نوع','حجم','تاریخ'));


        foreach ($products as $product) {
            $this->SectionManager->addList(array($product->ID, $product->file_name, $product->original_file_name, $product->file_type, $this->util->size($product->file_size), $this->jdf->full_date(strtotime($product->date))), array(array('مشاهده',$this->filePath($product->file_name, $product->file_path)),array('حذف','ajax:<api>delete-file?file_name='.$product->file_name)));
        }


        $this->SectionManager->add('مدیریت فایل ها', SECTION_LIST, $this->SectionManager->form_data(), $this->SectionManager->list_data(), $total_count);

 
        $redirect_url='';
        $this->returnJSON($this->SectionManager->output(), 
            $this->responseDialog(200, $redirect_url, false, '')
        ); 
    }

  


}

?>