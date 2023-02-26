<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePage extends MY_Controller {

    public function getIndex(){
        $this->Method(POST);
        $this->load->model('Products');
        $this->load->model('BlogPosts');
        $this->load->model('PageInfo');
        

        //Get Promoted Product
        $Products=new Products();
        $Products->loadPromotedProduct();

        $promoted["title"]=$Products->title;
        $promoted["url_slug"]=$Products->url_slug;
        $promoted["short_desc"]=$Products->short_desc;
        $promoted["description"]=$Products->desctiption;
        $promoted["sells_amount"]=$Products->sells_amount+$Products->first_sell_amount;
        $promoted["free_support_time"]=$Products->free_support_time;
        $promoted["cover_image"]=$this->imagePath($Products->cover_image, 357, 280, JPG);

        $json["promoted"]=$promoted;


        //Get Latest Products
        $productsFromDB=$this->Products->get(9, 0, array('is_published'=>1));
        $lastProducts=array();
        foreach ($productsFromDB as $Products) {
            $lastProducts[]=array(
                'title' => $Products->title,
                'url_slug' => $Products->url_slug,
                'short_desc' => $Products->short_desc,
                'sells_amount' => $Products->sells_amount+$Products->first_sell_amount,
                'cover_image' => $this->imagePath($Products->cover_image, 355, 173, JPG)
            );
        }

        $json["latest"]=$lastProducts;


        //Blog Posts
        $blogPostsFromDB=$this->BlogPosts->get(4, 0, array('is_published'=>1));
        $lastBlogPosts=array();
        foreach ($blogPostsFromDB as $BlogPosts) {
            $blogPost[]=array(
                'title' => $BlogPosts->title,
                'url_slug' => $BlogPosts->url_slug,
                'image' => $this->imagePath($BlogPosts->image, 258, 159, JPG),
                'sells_amount' => $Products->sells_amount+$Products->first_sell_amount,
                'short_content' => $BlogPosts->short_content            );
        }

        $json["blog"]=$lastProducts;


        //Get Page Info
        $PageInfo = new PageInfo();
        $PageInfo->loadByField('key', 'homepage');
        $json["info"]=json_decode($PageInfo->data);


        $this->returnJSON($json, 
            $this->responseDialog(200, false, '')
        );
    }


    public function getInfo(){
        $this->Method(POST);

        $User=$this->checkToken(REQUIRED);

        $this->load->model('UserInfo');
        $this->load->model('ShoppingCart');

        //Get User Info
        $UserInfo = new UserInfo();
        $UserInfo->load($User->ID);

        //Get ShoppingCart Info
        $ShoppingCart=$this->ShoppingCart->count(array('user_id', $User->ID));


        $json["info"]=array(
            "fullname" => $UserInfo->fullname,
            "credit" => $UserInfo->credit,
            "shopping_cart" => $ShoppingCart
        );

        $this->returnJSON($json, 
        $this->responseDialog(200, false, '')
    );

    }


}
