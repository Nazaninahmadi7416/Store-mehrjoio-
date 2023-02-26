<?php


class WebPages extends MY_Model {

	const DB_TABLE='web_pages';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $title; //text
	public $url_slug; //text
	public $meta_title; //text
	public $meta_desc; //text
	public $content; //text
	public $is_visible; //int
	public $date_created; //text




}




?>