<?php


class Admins extends MY_Model {

	const DB_TABLE='pme_portal_admins';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $fullname; //text
	public $username; //text
	public $password; //text
	public $email; //text
	public $mobile; //text
	public $level; //int
	public $is_blocked; //int



}




?>