<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileUploader extends MY_Portal
{


    public function fileUploaderManager(){

        if(DISABLE_PORTAL_FILE_UPLOAD){
            die("Disabled Feature");
        }

        $this->Method(POST);
        $Admin=$this->checkToken(REQUIRED);

        $new_file_name=$Admin->ID."_".md5(Time());
        
        $config['upload_path'] = PORTAL_FILE_UPLOAD_DIR;
        $config['allowed_types'] = PORTAL_FILE_UPLOAD_VALID_TYPES;
        $config['max_size']     = PORTAL_FILE_UPLOAD_MAX_SIZE;
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
            $FileManager->file_path=PORTAL_FILE_UPLOAD_DIR;
            $FileManager->file_type=$file_type;
            $FileManager->file_size=$file_size;
            $FileManager->admin_id=$Admin->ID;
            $FileManager->user_id=0;
            $FileManager->save();
            
            $file_id = $this->db->insert_id();



            $json["file_id"]=$file_id;
            $json["file_name"]=$file_name;
            $json["file_path"]=PORTAL_FILE_UPLOAD_DIR;
            $json["file_name_org"]=$file_name_original;
            $json["full_url"]=$this->filePath($file_name);


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
            $this->responseDialog($status, '', $showDialog, $this->uploadError($message))
        );


    }

    public function imageUploaderManager(){

        if(DISABLE_PORTAL_IMAGE_UPLOAD){
            die("Disabled Feature");
        }

        $this->Method(POST);
        $Admin=$this->checkToken(REQUIRED);

        $new_file_name=$Admin->ID."_".md5(Time());
        
        $config['upload_path'] = PORTAL_IMAGE_UPLOAD_DIR;
        $config['allowed_types'] = PORTAL_IMAGE_UPLOAD_VALID_TYPES;
        $config['max_size']     = PORTAL_IMAGE_UPLOAD_MAX_SIZE;
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
            $FileManager->file_path=PORTAL_IMAGE_UPLOAD_DIR;
            $FileManager->file_type=$file_type;
            $FileManager->file_size=$file_size;
            $FileManager->admin_id=$Admin->ID;
            $FileManager->user_id=0;
            $FileManager->save();
            
            $file_id = $this->db->insert_id();



            $json["file_id"]=$file_id;
            $json["file_name"]=$file_name;
            $json["file_path"]=PORTAL_IMAGE_UPLOAD_DIR;
            $json["file_name_org"]=$file_name_original;
            $json["full_url"]=$this->imagePath($file_name, 256, 256, PNG);


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
            $this->responseDialog($status, '', $showDialog, $this->uploadError($message))
        );


    }

    public function deleteFile(){

        if(DISABLE_PORTAL_IMAGE_UPLOAD && DISABLE_PORTAL_FILE_UPLOAD){
            die("Disabled Feature");
        }

        $this->Method(POST);
        $Admin=$this->checkToken(REQUIRED);

        $file_name=$this->post('file_name');
        if(strlen($file_name)<2){
            $file_name=$this->get('file_name', REQUIRED, TEXT);
        }

        $this->load->model('FileManager');

        $FileManager = new FileManager();
        $FileManager->loadByMultiField(array('file_name' => $file_name, 'admin_id' => $Admin->ID));

        if(intval(@$FileManager->ID)==0){
            $this->returnError(403, '', true, 'امکان حذف فایل مورد نظر وجود ندارد.');
        }

        //Delete File
        @unlink($FileManager->file_path.$FileManager->file_name);

        //Delete Database Record
        $FileManager->delete();
        $redirect_url='';
        if(strlen($_GET['file_name'])>2){
            $redirect_url='ajax_refresh';
        }
        $this->returnJSON(true, 
            $this->responseDialog(200, $redirect_url, true, 'حذف با موفقیت انجام گردید')
        );




    }

    function uploadError($error){

        $upload_errors=array(
            "The filetype you are attempting to upload is not allowed." => "فایل ارسالی مجاز نمی باشد.",
            "You did not select a file to upload." => "هیچ فایلی برای آپلود انتخاب نشده است"
        );
        if(is_null(@$upload_errors[$error])){
            return $error;
        }else{
            return $upload_errors[$error];
        }
    }

}

?>