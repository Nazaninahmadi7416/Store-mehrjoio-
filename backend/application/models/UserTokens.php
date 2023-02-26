<?php


class UserTokens extends MY_Model {

	const DB_TABLE='user_tokens';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $account_id; //int
	public $token; //text
	public $ip; //text
	public $browser; //text
	public $is_expired; //int
	public $expire_date; //int




}




?>