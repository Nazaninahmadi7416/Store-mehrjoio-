<?php


class AdminTokens extends MY_Model {

	const DB_TABLE='pme_admin_tokens';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $token; //text
	public $admin_id; //int
	public $expire_date; //int
	public $is_expired; //text
	public $ip; //text
	public $browser; //text
	public $device; //text



}




?>