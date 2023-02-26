<?php


class ShopCat extends MY_Model {

	const DB_TABLE='shop_cats';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $parent_id; //int
	public $title; //text
	public $image; //text
	public $order; //int



}




?>