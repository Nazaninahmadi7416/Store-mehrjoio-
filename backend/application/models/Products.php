<?php


class Products extends MY_Model {

	const DB_TABLE='prime_products';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $title; //text
	public $url_slug; //text
	public $price; //text
	public $free_support_time; //int
	public $free_call_time; //int
	public $cover_image; //text
	public $short_desc; //text
	public $desctiption; //text
	public $version; //int
	public $first_sell_amount; //int
	public $sells_amount; //int


}




?>