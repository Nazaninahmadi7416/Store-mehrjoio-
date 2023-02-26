<?php


class FileManager extends MY_Model {

	const DB_TABLE='file_manager';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $file_name; //text
	public $original_file_name; //text
	public $file_path; //text
	public $file_type; //text
	public $file_size; //float
	public $user_id; //int
	public $admin_id; //int



}




?>