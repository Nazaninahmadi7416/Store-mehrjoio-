<?php


class ShopOrders extends MY_Model {

	const DB_TABLE='shop_orders';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $user_id; //int
	public $total_price; //int
	public $payment_status; //int
	public $bank_result; //text
	public $bank_au; //text
	public $message; //text
	public $address; //text



}




?>