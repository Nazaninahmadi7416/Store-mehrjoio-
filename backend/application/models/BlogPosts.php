<?php


class BlogPosts extends MY_Model {

	const DB_TABLE='blog_posts';
	const DB_TABLE_PK='ID';

	public $ID; //int
	public $title; //text
	public $url_slug; //text
	public $image; //text
	public $short_content; //text



}




?>