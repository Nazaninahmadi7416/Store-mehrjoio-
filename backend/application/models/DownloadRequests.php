<?php


class DownloadRequests extends MY_Model {

	const DB_TABLE='product_download_requests';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $product_id; //int
	public $org_product_id; //int
	public $product_file_id; //int
	public $download_hash; //text
	public $user_id; //int
	public $expire_date; //int
	public $delete_date; //int



}




?>