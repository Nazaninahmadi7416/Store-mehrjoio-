<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller
{


    public function loadPage(){

        $this->Method(POST);

        $url_slug=$this->post('url_slug', REQUIRED, TEXT);

        $this->load->model('WebPages');
        $WebPages = new WebPages();
        $WebPages->loadByMultiField(array('url_slug'=>$url_slug, 'is_visible'=>1));

        $json=$WebPages;
        

        $this->returnJSON($json, 
            $this->responseDialog(200, false, '')
        );

    }

    public function getWebsiteInfo(){

        $this->Method(POST);

        $this->load->model('WebPageTitles');
        $this->load->model('GeneralSettings');

        //Get Footer Links
        $footerLinks=$this->WebPageTitles->get(20, 0, array('is_visible'=>'1', 'show_in_footer'=>'1'));
        $links=array();

        foreach ($footerLinks as $Link) {
            
            $links[]=array(
                'title' => $Link->title,
                'url_slug' => $Link->url_slug
            );

        }

        $json['footer_links']=$links;

        //Get HomePage Info
        $GeneralSettings = new GeneralSettings();
        $GeneralSettings->load(1);

        unset($GeneralSettings->ID);

        $json['stats']=$GeneralSettings;


        $this->returnJSON($json, 
            $this->responseDialog(200, false, '')
        );

    }


}

?>