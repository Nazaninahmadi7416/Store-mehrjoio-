<?php


class Tickets extends MY_Model {

	const DB_TABLE='support_tickets';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $title; //text
	public $status; //int
	public $is_read_by_user; //int
	public $is_read_by_admin; //int
	public $product_type; //text
	public $date_created; //date
	public $date_updated; //date


}




?>