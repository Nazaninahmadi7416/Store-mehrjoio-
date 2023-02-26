<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends MY_Controller
{


    public function checkCron(){

        //Task 1 : Delete Expired User Files
        $this->deleteExpiredFiles();

        //Task 2 : Check Expired Tokens
        $this->checkExpiredTokens();

    }

    private function deleteExpiredFiles(){
        $this->db->select('ID,download_hash,user_id');
        $this->db->from('product_download_requests');
        $this->db->where('expire_date <=', Time());
        $this->db->where('delete_date', 0);
        $this->db->limit(20);
        $check_query = ($this->db->get())->result();

        $idz="";

        foreach ($check_query as $download_request) {
            $idz.='`ID`='.$download_request->ID." OR ";
            @unlink(USER_FILES_DOWNLOAD_FOLDER.'usr_'.$download_request->user_id.'/'.$download_request->download_hash.'.zip');
        }
        if(strlen($idz)>2){
            $update_query="update `product_download_requests` set `delete_date`='".Time()."' where ".Trim($idz, ' OR ');
            $this->db->query($update_query);
            echo "Task1 : DONE\n";
        }else{
            echo "Task1 : Nothing to DELETE\n";
        }
    }

    private function checkExpiredTokens(){
        $this->db->select('ID');
        $this->db->from('user_tokens');
        $this->db->where('expire_date <=', Time());
        $this->db->where('is_expired', 0);
        $this->db->limit(20);
        $check_query = ($this->db->get())->result();

        $idz="";

        foreach ($check_query as $token) {
            $idz.='`ID`='.$token->ID." OR ";
        }
        if(strlen($idz)>2){
            $update_query="update `user_tokens` set `is_expired`='1' where ".Trim($idz, ' OR ');
            $this->db->query($update_query);
            echo "Task2 : DONE\n";
        }else{
            echo "Task2 : Nothing to EXPIRE\n";
        }
    }

}

?>