<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Actions extends MY_Portal

{

    public function actionLoader($page)

    {



        //Valid Actions

        $actions=array(
          ///////////////////////////////////////////store
          "add-new-slider",
          "add-update-slider",
          "delete-slider-store",

          "new-Baner-store",
          "add-update-Baner",
          "delete-Baner-store",
          "add-update-product",
          "add-new-product",
          "delete-product-store",
          "delete-cat-store",
          "add-new-cat",
          "add-update-cat",
          ///////////////////////////////////////
            "redirect",
            "prime-new-product",
            "prime-new-addon",
            "add-new-product-file",
            "save-video-product-data",
            "save-video-section-data",
            "save-video-section-video-data",
            "add-user-portal",
            "add-update-user-portal",
            "add-update-about-setting",
            "add-update-contactus-setting",
            "add-update-adv-setting",
            "add-update-instagram-setting",
            "add-update-telegram-setting",
            "add-update-insurance-portal",
            "add-insurance-portal",
            "add-update-lab-portal",
            "add-lab-portal",
            "delete-time-reserve",
            "add-update-time-reserve-portal",
            "delete-cat-article",
            "add-update-cat-article-portal",
            "add-cat-article-portal",
            "delete-article",
            "add-update-article-portal",
            "add-article-portal",
            "add-time-reserve-portal",
            // "add-new-slider", //for store
            // "add-new-menu-cat",//fore store
            "add-update-menu-cat",//fore store 
            "delete-menu-cat-visha",//for store
            "add-new-menu-sub-cat",
            "add-update-menu-sub-cat",
            "delete-menu-sub-cat-visha",
            "add-new-color",
            "add-update-color",
            "delete-color-product-visha",
            // "add-new-product",//for store
            // "add-update-product",//for store
            // "delete-product-visha",//for store
            "add-new-article",
            "add-update-article",
            "delete-article-visha",
            "add-new-gender",
            "delete-gender-product-visha",
            "add-update-gender",
            "delete-design-details-product-visha",
            "add-new-design-details",
            "add-update-design-details",
            "delete-product-used-product-visha",
            "add-new-product-used",
            "add-update-product-used",
            "update-order-status-visha",
            // "delete-slider-visha",//fore store
            // "add-update-slider",//for store
            "add-new-gift",
            "add-update-gift",
            "delete-gift-visha",
            "add-new-vocher",
            "add-update-vocher",
            "add-update-banner-home",

        



        );





        //Check Token

        $this->checkToken();



        if (!in_array($page, $actions)) {

            $this->returnError(403, 'dashboard', true, 'صفحه درخواستی معتبر نمی باشد.');

        } else {

            $page=str_replace('-', '_', $page);

            $page=strtolower($page);

            $this->{$page}();

        }

    }

    private function redirect(){

        $action=$this->post('action', REQUIRED, TEXT);

        $data_arr=$_POST;

        $qu="";



        unset($data_arr['action']);



        foreach ($data_arr as $key => $value) {

            $qu.="$key=$value&";

        }

        $qu=Trim($qu, '&');



        $redirect_url=$action."?".$qu;



        $this->returnJSON(

            null,

            $this->responseDialog(200, $redirect_url, false, '')

        );



    }
     ////////////////////////////////////store
     private function add_new_slider(){

        $redirect_url='';

        $fields='img,url,title';
        $img_name=$this->post('img',REQUIRED,TEXT);
        $url_slider=$this->post('url',REQUIRED,TEXT);
        $title_slider=$this->post('title',REQUIRED,TEXT);
        //Generate Query
        $query=$this->generateQuery($fields, POST, 'insert');
        $this->db->query("INSERT INTO `store_slider` ".$query);
   
        $message=  " اسلایدر " . " باموفقیت ثبت شد  ";
        $this->returnJSON(
        null,
        $this->responseDialog(200, $redirect_url, true, $message)
        );
   
   


     }

    private function add_update_slider(){

        $redirect_url='back';
        $fields='img,url,title';
        $img_name=$this->post('img',REQUIRED,TEXT);
        $url_slider=$this->post('url',REQUIRED,TEXT);
        $title_slider=$this->post('title',REQUIRED,TEXT);
        $edit_id=$this->post('edit_id');
          //Generate Query
          $query=$this->generateQuery($fields, POST, 'update');
          $this->db->query("UPDATE `store_slider` SET ".$query." WHERE `ID`='".$edit_id."'");
          $message=  "   " ." باموفقیت به روز رسانی شد  ";
          $this->returnJSON(
              null,
              $this->responseDialog(200, $redirect_url, true, $message)
          );
    }
    private function delete_slider_store(){
        $edit_id=intval($this->post('edit_id'));
        $delete_id=intval($this->get('delete_id'));
        if($delete_id>0){
            $delete_q=$this->db->query("DELETE FROM `store_slider` WHERE `ID`='".$delete_id."'");
            $message=" با موفقیت حذف گردید.";
            $redirect_url='ajax_refresh';
            $this->returnJSON(
                null,
                $this->responseDialog(200, $redirect_url, true, $message)
            );

        }

    }

    ///برای وقتی که بنر جدید اضافه میکنیم
    private function new_Baner_store(){

        $redirect_url='back';

        $fields='img';
        $img_name=$this->post('img',REQUIRED,TEXT);
       
       
        //Generate Query
        $query=$this->generateQuery($fields, POST, 'insert');
        $this->db->query("INSERT INTO `store_baner` ".$query);
   
        $message=  " اسلایدر " . " باموفقیت ثبت شد  ";
        $this->returnJSON(
        null,
        $this->responseDialog(200, $redirect_url, true, $message)
        );
   
   


     }

    private function add_update_Baner(){

        $redirect_url='back';

        $fields='img,';
        $img=$this->post('img',REQUIRED,TEXT);
       
        $edit_id=$this->post('edit_id');
          //Generate Query
          $query=$this->generateQuery($fields, POST, 'update');
          $this->db->query("UPDATE `store_baner` SET ".$query." WHERE `ID`='".$edit_id."'");
          $message=  "   " ." باموفقیت به روز رسانی شد  ";
          $this->returnJSON(
              null,
              $this->responseDialog(200, $redirect_url, true, $message)
          );
    }
    private function delete_Baner_store(){
        $edit_id=intval($this->post('edit_id'));
        $delete_id=intval($this->get('delete_id'));
        if($delete_id>= 0){
            $delete_q=$this->db->query("DELETE FROM `store_baner` WHERE `ID`='".$delete_id."'");
            $message=" با موفقیت حذف گردید.";
            $redirect_url='ajax_refresh';
            $this->returnJSON(
                null,
                $this->responseDialog(200, $redirect_url, true, $message)
            );

        }

    }
    
    //برای دسته بندی وقتی دسته جدید ایجاد میکنیم

    private function add_new_cat(){

        $redirect_url='back';
        $fields='title,parent_id,img1';
        $parent_id=$this->post('parent_id',REQUIRED,TEXT);
        $title=$this->post('title',REQUIRED,TEXT);
        $img1=$this->post('img1',REQUIRED,TEXT);
          //Generate Query

         $query=$this->generateQuery($fields, POST, 'insert');

         $this->db->query("INSERT INTO `store_cat` ".$query);

        

         $message=  "   " . " باموفقیت ثبت شد  ";

         $this->returnJSON(

         null,

         $this->responseDialog(200, $redirect_url, true, $message)

        );

    }
    private function add_update_cat(){
        $redirect_url='';



        $fields='title,parent_id';

        $edit_id=$this->post('edit_id');

      

          //Generate Query

          $query=$this->generateQuery($fields, POST, 'update');

          $this->db->query("UPDATE `store_cat` SET ".$query." WHERE `ID`='".$edit_id."'");



          $message=  "   " ." باموفقیت به روز رسانی شد  ";

          $this->returnJSON(

              null,

              $this->responseDialog(200, $redirect_url, true, $message)

          );

    }
    private function delete_cat_store(){



            $edit_id=intval($this->post('edit_id'));

         $delete_id=intval($this->get('delete_id'));

         if($delete_id>0){

         $delete_q=$this->db->query("DELETE FROM `store_cat` WHERE `ID`='".$delete_id."'");

         $message=" با موفقیت حذف گردید.";

         $redirect_url='ajax_refresh';





         $this->returnJSON(

           null,

           $this->responseDialog(200, $redirect_url, true, $message)

       );

   }



}
        //برای مدیریت محصولات

        private function add_new_product(){

            $redirect_url='back';

            $fields='title,price,img1,img2,img3,img4,cat_id';

            $price=$this->post('price',REQUIRED,NUMBER);
            $title=$this->post('title',REQUIRED,TEXT);
            $img1=$this->post('img1',REQUIRED,TEXT);
            $img2=$this->post('img2');
            $img3=$this->post('img3');
            $img4=$this->post('img4');
            $cat_id=$this->post('cat_id');
            // $ID=$this->post('ID',REQUIRED,TEXT);

            $query=$this->generateQuery($fields, POST, 'insert');

            $this->db->query("INSERT INTO `store_product` ".$query);

        

            $message=  "   " . " باموفقیت ثبت شد  ";

            $this->returnJSON(

            null,

            $this->responseDialog(200, $redirect_url, true, $message)

        );
        
        }
        private function add_update_product(){

            $redirect_url='back';

       

             $fields='title,price,img1,img2,img3,img4,cat_id,desc,short_desc';

             $edit_id=$this->post('edit_id');

          

             //Generate Query

             $query=$this->generateQuery($fields, POST, 'update');

             $this->db->query("UPDATE `store_product` SET ".$query." WHERE `ID`='".$edit_id."'");

   

             $message=  "   " ." باموفقیت به روز رسانی شد  ";

             $this->returnJSON(

                 null,

                 $this->responseDialog(200, $redirect_url, true, $message)

             );

        }
        private function delete_product_store(){

            $edit_id=intval($this->post('edit_id'));

            $delete_id=intval($this->get('delete_id'));

            if($delete_id>0){

                $delete_q=$this->db->query("DELETE FROM `store_product` WHERE `ID`='".$delete_id."'");

                $message=" با موفقیت حذف گردید.";

                $redirect_url='ajax_refresh';

    

    

                $this->returnJSON(

                    null,

                    $this->responseDialog(200, $redirect_url, true, $message)

                );

            }

        }
    ////////////////////////////////////////////////////////////////////////////////////////////////////







        private function update_api(){

            $telegram=$this->post('telegram');

            $instagram=$this->post('instagram');



            $data = array(

                'telegram' => $telegram,

                'instagram' => $instagram,

            );

             $this->db->update('lab_setting', $data);





                $redirect_url='ajax_refresh';

                $message="API با موفقیت ثبت شد.";

                $this->returnJSON(

                    null,

                    $this->responseDialog(200, $redirect_url, true, $message)

                );

        }





        private function add_user_portal(){



            $redirect_url='';

            $this->load->model('UserAdmin');

    

            $password=$this->post('password');

            $fullname=$this->post('fullname');

            $mobile=$this->post('mobile');

            $username=$this->post('username');

            $email=$this->post('email');



              $Users = new UserAdmin();

              $Users->fullname=$fullname;

              $Users->username=$username;

              $Users->email=$email;

              $Users->mobile=$mobile;

              $Users->level=3;

              $Users->password=$this->util->password_hash_portal($password);

    

              $Users->save();

    

    

            $message=  " کاربر  " .(string)$fullname. " باموفقیت ثبت شد  ";

            $this->returnJSON(

                null,

                $this->responseDialog(200, $redirect_url, true, $message)

            );







        }



        private function add_update_user_portal(){

            $redirect_url='';



            $edit_id=$this->post('edit_id');

            $fullname=$this->post('fullname');

            $mobile=$this->post('mobile');

            $email=$this->post('email');

            $username=$this->post('username');

            $password=$this->post('password');

        

            $edit_id=$this->post('edit_id');

    

            if(strlen($password)>0){

                $passwords=$this->util->password_hash_portal($password);

                    $data = array(

                        'fullname' => $fullname,

                        'mobile' => $mobile,

                        'username' => $mobile,

                        'email' => $mobile,

                        'password' => $passwords,

                );

            }else{

                $data = array(

                    'fullname' => $fullname,

                    'mobile' => $mobile,

                    'username' => $username,

                    'email' => $email,

            );

            }

            

             $this->db->where('ID', $edit_id);

             $this->db->update('pme_portal_admins', $data);

    

              $message=  " کاربر  " .(string)$fullname. " باموفقیت به روز رسانی شد  ";

              $this->returnJSON(

                  null,

                  $this->responseDialog(200, $redirect_url, true, $message)

              );

        }

        

        private function add_update_about_setting(){

            $aboutus=$this->post('aboutus');

        

            $data = array(

                'aboutus' => $aboutus,);

             $this->db->update('lab_setting', $data);



            

                $redirect_url='ajax_refresh';

                $message="درباره ما با موفقیت ثبت شد.";

                $this->returnJSON(

                    null,

                    $this->responseDialog(200, $redirect_url, true, $message)

                );

            

        }



        private function add_update_contactus_setting(){

            $contactus=$this->post('contactus');

        

            $data = array(

                'contactus' => $contactus,);

             $this->db->update('lab_setting', $data);



            

                $redirect_url='ajax_refresh';

                $message="تماس با ما با موفقیت ثبت شد.";

                $this->returnJSON(

                    null,

                    $this->responseDialog(200, $redirect_url, true, $message)

                );

            

        }



        private function add_update_adv_setting(){

            $adv=$this->post('adv');

        

            $data = array(

                'adv' => $adv,);

             $this->db->update('lab_setting', $data);



            

                $redirect_url='ajax_refresh';

                $message="تبلیغات با موفقیت ثبت شد.";

                $this->returnJSON(

                    null,

                    $this->responseDialog(200, $redirect_url, true, $message)

                );

            

        }



    ///////////////////////////////////////////////////////////////////////////////////////////////////



}

