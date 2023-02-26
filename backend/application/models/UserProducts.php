<?php


class UserProducts extends MY_Model {

	const DB_TABLE='user_products';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $call_time; //int
	public $call_time_used; //int
	public $product_id; //int
	public $last_downloaded_version; //int
	public $order_id; //int
	public $addons; //text
	public $user_id; //int
	public $support_expire_date; //int
	public $purchase_date; //int



}




?>