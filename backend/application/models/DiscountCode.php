<?php


class DiscountCode extends MY_Model {

	const DB_TABLE='discount_codes';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $title; //text
	public $discount_code; //text
	public $usage_limit; //int
	public $used_amount; //int
	public $max_amount; //int
	public $discount_percent; //int
	public $expire_date; //int



}




?>