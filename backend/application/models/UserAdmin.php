<?php


class UserAdmin extends MY_Model {

	const DB_TABLE='pme_portal_admins';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $fullname; //text
	public $mobile; //text
	public $email; //text
	public $password; //text
	public $level; //int

}




?>