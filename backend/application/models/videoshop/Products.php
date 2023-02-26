<?php


class Products extends MY_Model {

	const DB_TABLE='vshop_products';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $image; //text
	public $title1; //text
	public $title2; //text
	public $price; //int
	public $total_sells; //int
	public $first_sells; //int
	public $total_hours; //int
	public $desc; //text
	public $is_published; //int
	public $admin_id; //int
}




?>