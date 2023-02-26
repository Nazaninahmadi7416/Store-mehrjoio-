<?php

class UserAddress extends MY_Model {

	const DB_TABLE='user_addresses';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $title; //text
	public $address; //text
	public $lat; //text
	public $lng; //text
	public $phone; //text
	public $mobile; //text
	public $user_id; //int

}




?>