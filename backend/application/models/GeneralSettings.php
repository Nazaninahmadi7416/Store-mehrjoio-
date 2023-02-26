<?php


class GeneralSettings extends MY_Model {

	const DB_TABLE='general_settings';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $total_sells_amount; //int
	public $total_users_amount; //int
	public $total_tickets_amount; //int
	public $total_replies_amount; //int
	public $total_payments_amount; //int



}




?>