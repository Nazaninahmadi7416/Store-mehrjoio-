<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Developed by prime-apps.org
class Porseshapp extends MY_Controller {


    public function home(){

        $this->Method(POST);

        //Get File Information
        $filename=$this->post('filename', REQUIRED, TEXT);
        $this->load->helper('file');
        $string = read_file('http://porseshapp.com/api/v2/backend/p_uploads_dir/'.$filename);


    


            if($this->checkFile($filename)){
                $forms=json_decode($string);
                foreach(@$forms->forms as $value){
                    $token=@$forms->token;
                
                    $form_id= $this->insertForm($value,$token);
                        $gift=0;
                      foreach(@$value->steps as $values){
                          $gift=intval($gift)+intval(@$values->gift);
                          foreach(@$values->items as $dataform){
                                  $this->insertLevel($dataform,@$values->number,$form_id);
                          }
                          $json_gift[]=array(
                                "gift"=>@$values->gift,
                                "number"=>@$values->number,
                          );
                      }
                      $this->updateScore($gift,$form_id,$json_gift);
                  }
            }else $this->returnError(403, true, 'فایل مورد نظر یافت نشد');
       
      
        
   
        $json['status']=200;

        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
        );


    }


    private function checkFile($filename){

        $this->db->select('ID,file_name');
        $this->db->from('file_manager');
        $this->db->where("file_name",$filename);
        $this->db->limit(1);
        $query = $this->db->get();
        $value=@$query->result()[0];

        if(intval(@$value->ID)>0){
                return true;}
                else return false;

    }


    private function insertForm($value,$token){
        $User=$this->checkToken(REQUIRED, CUSTOM, $token);
    
        $dataform = array(
            'form_name' => $value->form_name ,
            'form_hash' => $value->form_hash ,
            'last_update' => $value->created_date ,
            'date_created' => $value->created_date ,
            'username' => $User->fullname ,
            'user_id' => $User->ID ,
         );
         $this->db->insert('porsesh_form', $dataform); 
         return  $form_id = $this->db->insert_id();
        

    }

    private function insertLevel($data,$level_id,$form_id){
        $datalevel = array(
            'level_id' => $level_id ,
            'form_id' => $form_id ,
            'q' => $data->question ,
            'answer' => $data->answer ,
            'time' => Time() ,
         );
         $this->db->insert('porsesh_data', $datalevel); 

    }

    private function updateScore($gift,$form_id,$json){
        $jsonencode=json_encode($json);
        $datascore = array(
            'score' => $gift ,
            'gift_json' => $jsonencode ,
         );
         $this->db->where('ID',$form_id);
         $this->db->update('porsesh_form', $datascore); 

    }

          public function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

    public function getFile($form_id){

        
        // die("form id".$form_id);
        require_once(APPPATH.'controllers/portal/php-export-data.class.php');
        // $id=intval($this->get('id'));


        $id=intval($this->get('id'));
        $this->db->select('ID,form_id,level_id,q,answer,gift_amount');
        $this->db->from('porsesh_data');
        $this->db->where('form_id',$form_id);
        $this->db->order_by("ID","ASC");
        $query = $this->db->get();
        $formresult=$query->result();

        $exporter = new ExportDataExcel('browser', Time()."paymentform".'.xml');
        $exporter->initialize();
        $exporter->addRow(array("شماره","نام فرم","سوال","جواب"));
        foreach($formresult as $value){
            $question=$value->q;
            $answer= $value->answer;
            $form_id= $value->form_id;
         
            $exporter->addRow(array(trim($value->ID.""),trim($form_id.""),trim($question.""),trim($answer."")));
        }
    

$exporter->finalize();
exit;
    }



}


?>