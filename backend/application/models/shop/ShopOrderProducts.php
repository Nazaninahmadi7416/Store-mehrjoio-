<?php


class ShopOrderProducts extends MY_Model {

	const DB_TABLE='shop_order_products';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $product_id; //int
	public $product_title; //text
	public $quantity; //int
	public $lottory_code; //text
	public $price; //int
	public $total_price; //int
	public $user_id; //text
	public $order_id; //text



}




?>