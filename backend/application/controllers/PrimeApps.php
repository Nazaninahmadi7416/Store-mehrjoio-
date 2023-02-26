<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrimeApps extends MY_Controller {

	public function index()
	{
        $this->returnJSON(array(
            "name"=>"Prime Apps API",
            "version"=>"1.0",
        ), 
            $this->responseDialog(200, false, '')
        );
    }
    

}
