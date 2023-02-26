<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Developed by iziapp.ir
class Yer extends MY_Controller {

    public function delitecats(){
        $this->Method(POST);

        $id=$this->post('id');
        // $token=$this->post('token');


        $this->db->select('ID,parent_id');
        $this->db->from('yer_all_cats');
        $this->db->where('parent_id',$id);
        $this->db->order_by("ID");
        $querycat = $this->db->get();
        // die($this->db->last_query());

        foreach ($querycat->result() as $value) {
              //  print_r("id = ".@$value->ID);
              //  die();
          $this->checkSubCat(@$value->ID,$id,$id);

        // $this->db->select('parent_id','ID','title',);
        // $this->db->from('yer_all_cats');
        // $this->db->where('yer_all_cats.parent_id',$value->ID);
        // $this->db->order_by("ID");
        // $querysubcat = $this->db->get();
        //        $result=$querycat->result()[0];
        //        if(intval(@$result->ID)>0){
                
        //        }
          
        }
        // $this->db->query("DELETE FROM `yer_all_cats` WHERE `parent_id`='".$id."'");
        // $this->db->query("DELETE FROM `yer_all_cats` WHERE `ID`='".$id."'");
        // $json['status']=200;
        //   $this->returnJSON($json, 
        //   $this->responseDialog(200, false, '')
        //   );
        }


        public function checkSubCat($id,$parent_id,$main_parent){
          $this->db->select('parent_id,ID,title');
          $this->db->from('yer_all_cats');
          $this->db->where('yer_all_cats.parent_id',$id);
          $this->db->order_by("ID");
          $querysubcat = $this->db->get();
          // die($this->db->last_query());
    
                 $result=@$querysubcat->result()[0];
                //  print_r("id = ".@$result->ID);
                //  die();
                 if(intval(@$result->ID)>0){
                  foreach ($querysubcat->result() as $value) {
                    $this->checkSubCat(@$value->ID,$id,$main_parent);
                  }
                 }else {
                  $this->db->query("DELETE FROM `yer_all_cats` WHERE `ID`='".$id."'");

                  print_r("title deleted ".@$id."\n");
                //  print_r("id = ".@$parent_id);
                //  die();
                if($parent_id==$id){
                  $this->checkSubCat(@$main_parent,$parent_id,$main_parent);
                }else{
                  $this->checkSubCat(@$parent_id,$parent_id,$main_parent);
                }
               
               
                 }
        }
    }

?>