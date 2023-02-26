<?php


class ShopProductFull extends MY_Model {

	const DB_TABLE='shop_products';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $admin_id; //int
	public $title; //text
	public $description; //text
	public $details_json; //text
	public $price; //text
	public $discount_percent; //int
	public $max_quantity; //int
	public $images; //text
	public $cat; //int
	public $is_special; //int
	public $total_sell_amount; //int
	public $total_sell_price; //int
	public $is_published; //int



}




?>