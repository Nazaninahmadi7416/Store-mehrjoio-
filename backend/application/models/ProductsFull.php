<?php


class ProductsFull extends MY_Model {

	const DB_TABLE='prime_products';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $title; //text
	public $url_slug; //text
	public $price; //text
	public $free_support_time; //int
	public $free_call_time; //int
	public $support_renew_price; //int
	public $cover_image; //text
	public $images; //text
	public $video; //text
	public $excluded_addons; //text
	public $version; //float
	public $short_desc; //text
	public $description; //text
	public $money_desc; //text
	public $facilities_desc; //text
	public $support_desc; //text
	public $has_addons; //text
	public $sells_amount; //int
	public $first_sell_amount; //int
	public $meta_title; //text
	public $meta_tag; //text
	public $meta_desc; //text
	public $badge_text; //text
	public $promote_index; //int
	public $is_published; //int
	public $date_created; //date
	public $dated_updated; //date



}




?>