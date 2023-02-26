<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Developed by iziapp.ir
class Complementary extends MY_Controller {

    public function getHome(){
        $this->Method(POST);
      //برای جدید ترین ها

        $this->db->select('');
        $this->db->from('');
        $query_the_newest = $this->db->get();
        // $result_product_used=@$query_product_used->result();
        $the_newest=array();
        foreach ($query_the_newest->result() as $value) {
            $the_newest[]=array(
                
                // 'metrics_based_price'=>@$value->metrics_based_price,
                // 'city'=>@$value->city,
            );
        
          }
          // برای پرفروش ترینا
          $this->db->select('');
          $this->db->from('');
          $query_best_seller = $this->db->get();
          // $result_product_used=@$query_product_used->result();
          $best_seller=array();
          foreach ($query_best_seller->result() as $value) {
              $best_seller[]=array(
                  
                //   'metrics_based_price'=>@$value->metrics_based_price,
                //   'city'=>@$value->city,
              );
          
            }

           // برای اسلایدر صفحه اصلی
           $this->db->select('');
           $this->db->from('');
           $query_sport_supplement = $this->db->get();
           // $result_product_used=@$query_product_used->result();
           $sport_supplement=array();
           foreach ($query_sport_supplement->result() as $value) {
               $sport_supplement[]=array(
                   
                 //   'metrics_based_price'=>@$value->metrics_based_price,
                 //   'city'=>@$value->city,
               );
           
             }

       
    
          $json['the_newest']=$the_newest;
          $json['best_seller']=$best_seller;
         
         
      
          $this->returnJSON($json, 
          $this->responseDialog(200, false, '')
          );
        }
    }

?>
