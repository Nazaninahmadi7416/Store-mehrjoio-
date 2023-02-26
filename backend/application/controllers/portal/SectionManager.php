<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class SectionManager {

    private $sections_list=array();
    private $form_data=array();
    private $form_config=array();
    private $grid_data=array();
    private $grid_btn_data=array();
    private $list_data=array();
    private $page_title='';


    public function add($title, $type, $form_data=null, $data, $total_count=0){
        //Reset Array Helpers
        $this->form_data=array();
        $this->grid_data=array();
        $this->list_data=array();
        $this->grid_btn_data=array();

        $this->sections_list[]=array(
            'title' => $title,
            'type' => $type,
            'form_data' => $form_data,
            'data' => $data,
            'total_count' => $total_count,
        );
    }

    public function configForm($action, $method){
        $this->form_config=array(
            'action' => $action,
            'method' => $method
        );
    }

    public function pageConfig($title){
        $this->page_title=$title;
    }

    public function addFormField($title, $name, $value, $type, $default_value){
        $this->form_data[]=array(
            "title" => $title,
            "name" => $name,
            "value" => $value,
            "type" => $type,
            "default_value" => $default_value
        );
    }

    public function addSeperator(){
        $this->form_data[]=array(
            "title" => '<hr>',
            "name" => '',
            "value" => '',
            "type" => 'html_raw',
            "default_value" => ''
        );
    }
    

    public function addGrid($title, $data){
        $this->grid_data[]=array(
            "title" => $title,
            "data" => $data
        );
    }

    public function addGridButton($title, $url){
        $this->grid_btn_data[]=array(
            "title" => $title,
            "url" => $url
        );
    }

    public function addListHeader($array){
        $this->list_data[]=array(
            "data" => $array,
            "type" => 'list-header',
            "buttons" => null,
        );
    }

    public function addList($array, $buttons=null){
        $this->list_data[]=array(
            "data" => $array,
            "type" => 'list-data',
            "buttons" => $buttons,
        );
    }

    public function grid_btn_data(){
        return $this->grid_btn_data;
    }

    public function grid_data(){
        return $this->grid_data;
    }

    public function list_data(){
        return $this->list_data;
    }

    public function form_data(){
        return array(
            'config' => $this->form_config,
            'form_data' => $this->form_data,
        );
    }

    public function output(){
        return array(
            'title' => $this->page_title,
            'sections' => $this->sections_list
        );
    }

}


?>