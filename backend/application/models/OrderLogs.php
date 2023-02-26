<?php


class OrderLogs extends MY_Model {

	const DB_TABLE='order_logs';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $product_id; //int
	public $product_type; //text
	public $amount; //int
	public $discount_code; //text
	public $discount_amount; //int
	public $bank_au; //text
	public $bank_result; //int
	public $user_id; //int
	public $date_created; //int



}




?>