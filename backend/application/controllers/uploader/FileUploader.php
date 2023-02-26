<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileUploader extends MY_Controller
{


    public function fileUploaderManager(){

        if(DISABLE_FILE_UPLOAD){
            die("Disabled Feature");
        }

        $this->Method(POST);
        $User=$this->checkToken(REQUIRED);

        $new_file_name=$User->ID."_".md5(Time());
        
        $config['upload_path'] = FILE_UPLOAD_DIR;
        $config['allowed_types'] = FILE_UPLOAD_VALID_TYPES;
        $config['max_size']     = FILE_UPLOAD_MAX_SIZE;
        $config['file_name']     = $new_file_name;

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if($this->upload->do_upload('file_upload')){

            $this->load->model('FileManager');

            $file_size=$this->upload->data('file_size');
            $file_type=$this->upload->data('file_type');
            $file_name=$this->upload->data('file_name');
            $file_name_original=$this->upload->client_name;

            $FileManager = new FileManager();
            $FileManager->file_name=$file_name;
            $FileManager->original_file_name=$file_name_original;
            $FileManager->file_path=FILE_UPLOAD_DIR;
            $FileManager->file_type=$file_type;
            $FileManager->file_size=$file_size;
            $FileManager->user_id=$User->ID;
            $FileManager->admin_id=0;
            $FileManager->save();

            $file_id = $this->db->insert_id();


            $json["file_id"]=$file_id;
            $json["file_name"]=$file_name;
            $json["file_path"]=PORTAL_FILE_UPLOAD_DIR;
            $json["file_name_org"]=$file_name_original;

            $status=200;
            $showDialog=false;
            $message='';

        }else{
            $json["file_name"]=null;
            $json["file_path"]=null;
            $json["file_name_org"]=null;

            $status=403;
            $showDialog=true;
            $message=$this->upload->display_errors('','');

        }



        $this->returnJSON($json, 
            $this->responseDialog($status, $showDialog, $this->uploadError($message))
        );


    }

    function uploadError($error){

        $upload_errors=array(
            "The filetype you are attempting to upload is not allowed." => "فایل ارسالی مجاز نمی باشد."
        );

        if(is_null(@$upload_errors[$error])){
            return $error;
        }else{
            return $upload_errors[$error];
        }
    }

}

?>