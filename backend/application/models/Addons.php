<?php


class Addons extends MY_Model {

	const DB_TABLE='prime_product_addons';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $title; //text
	public $price; //int
	public $image; //text
	public $order_limit; //int
	public $description; //text
	public $questions; //text



}




?>