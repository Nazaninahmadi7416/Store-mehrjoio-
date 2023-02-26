<?php


class UsersLight extends MY_Model {

	const DB_TABLE='prime_users';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $account_id; //int
	public $last_sms_send; //int
	public $verification_code; //int
	public $mobile; //text
	public $is_mobile_verified; //text

}




?>