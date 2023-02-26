<?php


class TicketsFull extends MY_Model {

	const DB_TABLE='support_tickets';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $title; //text
	public $content; //text
	public $product_id; //int
	public $product_type; //text
	public $order_id; //int
	public $user_id; //int
	public $parent_id; //int
	public $attachments; //text
	public $status; //text
	public $is_read_by_user; //text
	public $is_read_by_admin; //text
	public $date_created; //date
	public $date_updated; //date


}




?>