<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importer extends MY_Controller {


    public function vidImporter(){
        $dir    = 'import_video';
        $files = scandir($dir);
        //print_r($files);
        $products=array();
        $num=0;

        foreach ($files as $key => $value) {
            if(strlen($value)>2){
                $sections=array();
                $files_sections = scandir($dir."/".$value);
                $num_section=1;
                natsort($files_sections);
                foreach ($files_sections as $value_section) {
                    $cleanKey=" ";

                    if (strlen($value_section)>2) {

                        $videos=array();
                        $files_videos = scandir($dir."/".$value."/".$value_section);
                        $num_videos=1;
                        //natsort($files_videos);
                        foreach ($files_videos as $video) {
                            if (strlen($video)>2) {
                                if(intval($cleanKey[0])!=intval($video[0])){
                                    $cleanKey=$video[0]."-".substr($video, 3);
                                    $cleanKey=str_replace('.mp4', '', $cleanKey);
                                    $cleanKey=str_replace('.pdf', '', $cleanKey);
                                    $cleanKey=str_replace('.html', '', $cleanKey);
                                    $cleanKey=str_replace('.vtt', '', $cleanKey);
                                }
                                
                                $videos[$cleanKey][]=$video;
                            }
                        }
                        $videos[$cleanKey]=$this->clearDuplication($videos[$cleanKey]);
                        $sections[$num_section]=array("title" => $value_section, "files" => $videos);
                    }
                    $num_section++;
                }

                $products[$num]=array('title' => $value, 'sections' => $sections);
            }

            $num++;
        }

        echo "<pre>";
            print_r($products);
        echo "</pre>";

        $this->importVideosToDb($products);


        }

        private function clearDuplication($array){
            $arr=array();
            foreach ($array as $key => $value) {
                $keyx=Trim(substr($value, 3));
                $arr[$keyx]=$value;
            }

            return $arr;
        }

        public function passGenerator(){
            if(DEBUG_MODE==false){
                die("InvalidRequest");
            }

            //Generate Password
            $password=$this->util->randomString(8);

            $passwordx=md5($password.PORTAL_PASSWORD_HASH);

            $data=array('password' => $passwordx);
            $this->db->where('username', 'admin');
            $this->db->update('pme_portal_admins', $data);
            echo "password : $password<br>";



            //Generate Password
            $password=$this->util->randomString(8);
            $passwordx=md5($password.PORTAL_PASSWORD_HASH);


            $data=array('password' => $passwordx);
            $this->db->where('username', 'partodesign');
            $this->db->update('pme_portal_admins', $data);
            echo "password : $password<br>";



        }

        private function importVideosToDb($products){

        }

}
?>