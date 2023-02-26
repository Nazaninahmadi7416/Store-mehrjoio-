<?php


class Users extends MY_Model {

	const DB_TABLE='prime_users';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $account_id; //int
	public $fullname; //text
	public $mobile; //text
	public $is_mobile_verified; //text
	public $credit; //text
	public $email; //text
	public $password; //text
	public $products_amount; //text
	public $payment_amount; //text
	public $isBlocked; //int
	public $agreement_accept; //int
	public $agreement_accept_date; //int
	public $block_reason; //text
	public $date_joined; //date
	public $date_updated; //date



}




?>