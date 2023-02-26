<?php


class ProductFiles extends MY_Model {

	const DB_TABLE='prime_product_files';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $product_id; //text
	public $version; //text
	public $description; //text
	public $file; //text
	public $downloads_amount; //int


}




?>