<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Developed by iziapp.ir
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'primeapps';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$api_url_path=WEBSITE_API_PATH;

//User Auth (User Manager)
$route[$api_url_path.'authentication'] = "front/UserManager/userAuthentication";
$route[$api_url_path.'signup'] = "front/UserManager/userSignup"; 
$route[$api_url_path.'sendVerificationSMS'] = "front/UserManager/sendVerificationSMS"; 
$route[$api_url_path.'sendForgotSMS'] = "front/UserManager/resetPasswordRequest"; 
$route[$api_url_path.'resetPasswordRequest'] = "front/UserManager/changePassword"; 
$route[$api_url_path.'verifyMobile'] = "front/UserManager/verifyMobile"; 
$route[$api_url_path.'logoutUser'] = "front/UserManager/logout"; 
$route[$api_url_path.'addressManager'] = "front/UserManager/addressManager"; 
$route[$api_url_path.'userInfo'] = "front/UserManager/userInfo"; 
$route[$api_url_path.'addCredit/(:any)/(:any)/(:num)'] = "front/UserManager/addCredit/$1/$2/$3"; 
$route[$api_url_path.'chargeCredit'] = "front/UserManager/chargeCredit"; 
$route[$api_url_path.'authentication-mobile'] = "front/UserManager/userAuthenticationWithMobile";

//Pages
$route[$api_url_path.'index'] = "front/HomePage/getIndex"; //Index
$route[$api_url_path.'info'] = "front/HomePage/getInfo"; //Get User Info
$route[$api_url_path.'products/(:num)'] = "front/ProductsManager/listOfProducts/$1"; 
$route[$api_url_path.'get-related-products'] = "front/ProductsManager/relatedProducts"; 
$route[$api_url_path.'get-product'] = "front/ProductsManager/getProductDetail"; 
$route[$api_url_path.'page'] = "front/Pages/loadPage"; 
$route[$api_url_path.'website'] = "front/Pages/getWebsiteInfo"; 

//Cart
$route[$api_url_path.'cart'] = "front/Cart/listOfCart"; 
$route[$api_url_path.'cartManager'] = "front/Cart/cartManager";

//Control Panel
$route[$api_url_path.'myproducts'] = "front/ControlPanel/listUserProducts";
$route[$api_url_path.'ticketmanager'] = "front/ControlPanel/ticketManager";
$route[$api_url_path.'download-request'] = "front/ControlPanel/downloadRequest";
$route['download/files/(:num)/(:any)'] = "front/ControlPanel/downloadFile/$1/$2"; 


//Uploader
$route[$api_url_path.'file-uploader'] = "uploader/FileUploader/fileUploaderManager";

//Cron
$route[$api_url_path.'cron'] = "front/Cron/checkCron";


//Portal
$route[PORTAL_URL_PATH.'login'] = "portal/Login/adminLogin";
$route[PORTAL_URL_PATH.'page/(:any)'] = "portal/Loader/pageLoader/$1";
$route[PORTAL_URL_PATH.'action/(:any)'] = "portal/Actions/actionLoader/$1";
$route[PORTAL_URL_PATH.'getMenu'] = "portal/Loader/getMenu";
$route[PORTAL_URL_PATH.'file-uploader'] = "portal/FileUploader/fileUploaderManager";
$route[PORTAL_URL_PATH.'image-uploader'] = "portal/FileUploader/imageUploaderManager";
$route[PORTAL_URL_PATH.'delete-file'] = "portal/FileUploader/deleteFile";




//Transactions
$route[$api_url_path.'tsm/(:any)/(:any)/(:any)'] = "transactions/Payment/callGateway/$1/$2/$3";
$route[$api_url_path.'tsmv/(:any)/(:any)'] = "transactions/Payment/verifyGateway/$1/$2";

//Importer
$route[$api_url_path.'importer'] = "importer/Importer/vidImporter";
$route[$api_url_path.'passGenerator'] = "importer/Importer/passGenerator";

// //LAB API
// $route[$api_url_path.'lab/getValueType'] = "lab/Lab/getValueType";
// $route[$api_url_path.'lab/addTest'] = "lab/Lab/addTest";
// $route[$api_url_path.'lab/getArticle'] = "lab/Lab/getArticle";
// $route[$api_url_path.'lab/myTest'] = "lab/Lab/myTest";
// $route[$api_url_path.'lab/getTestReference'] = "lab/Lab/getTestReference";

// Visha Api 
$route[$api_url_path.'visha/generateSlides'] = "visha/Visha/generateSlides";
$route[$api_url_path.'visha/generateHeaderMenu'] = "visha/Visha/generateHeaderMenu";
$route[$api_url_path.'visha/getListProductHome'] = "visha/Visha/getListProductHome";
$route[$api_url_path.'visha/getBasketTest'] = "visha/Visha/getBasketTest";
$route[$api_url_path.'visha/basketUser'] = "visha/Visha/basketUser";
$route[$api_url_path.'visha/getListArticle'] = "visha/Visha/getListArticle";
$route[$api_url_path.'visha/getDetailArticle'] = "visha/Visha/getDetailArticle";
$route[$api_url_path.'visha/getDetailProduct'] = "visha/Visha/getDetailProduct";
$route[$api_url_path.'visha/addOrderMember'] = "visha/Visha/addOrderMember";
$route[$api_url_path.'visha/addressUser'] = "visha/Visha/addressUser";
$route[$api_url_path.'visha/getDetailAddress'] = "visha/Visha/getDetailAddress";
$route[$api_url_path.'visha/getListAddress'] = "visha/Visha/getListAddress";
$route[$api_url_path.'visha/getUrl'] = "visha/Visha/getUrl";
$route[$api_url_path.'visha/getUser'] = "visha/Visha/getUser";
$route[$api_url_path.'visha/updateUser'] = "visha/Visha/updateUser";
$route[$api_url_path.'visha/searchProduct'] = "visha/Visha/searchProduct";
$route[$api_url_path.'visha/getFilterType'] = "visha/Visha/getFilterType";
$route[$api_url_path.'visha/savePurchase'] = "visha/Visha/savePurchase";
$route[$api_url_path.'visha/getOrderUser'] = "visha/Visha/getOrderUser";
$route[$api_url_path.'visha/getDetailOrder'] = "visha/Visha/getDetailOrder";
$route[$api_url_path.'visha/testOrder'] = "visha/Visha/testOrder";
$route[$api_url_path.'visha/addNews'] = "visha/Visha/addNews";
$route[$api_url_path.'visha/addfavorite'] = "visha/Visha/addfavorite";
$route[$api_url_path.'visha/deletefavorite'] = "visha/Visha/deletefavorite";
$route[$api_url_path.'visha/getfavorite'] = "visha/Visha/getfavorite";
$route[$api_url_path.'visha/addviewvishaproduct'] = "visha/Visha/addviewvishaproduct";
$route[$api_url_path.'visha/deleteviewvisha'] = "visha/Visha/deleteviewvisha";
$route[$api_url_path.'visha/getviewvisha'] = "visha/Visha/getviewvisha";
$route[$api_url_path.'visha/getFile'] = "visha/Visha/getFile";
$route[$api_url_path.'visha/downloadFile'] = "visha/Visha/downloadFile";
$route[$api_url_path.'visha/getState'] = "visha/Visha/getState";
$route[$api_url_path.'visha/returnMoney'] = "visha/Visha/returnMoney";
$route[$api_url_path.'visha/testHome'] = "visha/Visha/testHome";
$route[$api_url_path.'test3/joinexampletest3'] = "test3/Test3/joinexampletest3";
$route[$api_url_path.'test3/examplejsonresult3'] = "test3/Test3/examplejsonresult3";
$route[$api_url_path.'yer/delitecats'] = "yer/Yer/delitecats";
$route[$api_url_path.'store/getMain'] = "store/Store/getMain";
$route[$api_url_path.'store/Home'] = "store/Store/Home";
$route[$api_url_path.'store/addBasket'] = "store/Store/addBasket";
$route[$api_url_path.'store/productList'] = "store/Store/productList";
$route[$api_url_path.'store/productDetail'] = "store/Store/productDetail";
$route[$api_url_path.'store/testpayment'] = "store/Store/testpayment";
$route[$api_url_path.'store/getPaymentDtl'] = "store/Store/getPaymentDtl";
$route[$api_url_path.'store/checkUpdate'] = "store/Store/checkUpdate";
// $route[$api_url_path.'visha/export-xsl/(:any)'] = "visha/Visha/getFile/$1";
