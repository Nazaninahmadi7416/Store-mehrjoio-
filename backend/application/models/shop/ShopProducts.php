<?php


class ShopProducts extends MY_Model {

	const DB_TABLE='shop_products';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $title; //text
	public $price; //int
	public $discount_percent; //int
	public $max_quantity; //text
	public $images; //text



}




?>