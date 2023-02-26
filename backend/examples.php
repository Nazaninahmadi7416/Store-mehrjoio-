<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//Section Types
define('SECTION_FORM', 'form');
define('SECTION_LIST', 'list');
define('SECTION_GRID', 'grid');
define('SECTION_GRID_BTN', 'grid_btn');


//Form Fields
define('INPUT', 'input');
define('TEXTAREA', 'textarea');
define('EDITOR', 'editor');
define('CHECKBOX', 'checkbox');
define('IMAGEUPLOAD', 'imageupload');
define('FILEUPLOAD', 'fileupload');
define('DROPDOWN', 'dropdown');
define('DROPDOWN_MULTI', 'dropdown_multi');
define('SUBMIT_BUTTON', 'submit_button');
define('HTML', 'html_raw');
define('LINK', 'link');
define('GRID_3_12', 'grid_3_12');
define('GRID_4_12', 'grid_4_12');


//URL DYNAMIC : back, refresh, ajax_refresh, ajax:url


include_once('application/controllers/portal/SectionManager.php');
include_once('application/controllers/portal/Menus.php');

class Loader extends MY_Portal
{

    private $SectionManager;
    private $MenuManager;

    public function pageLoader($page){
        //Check Valid Page Request

        $MenuManager = new MenuManager();
        $valid_pages=$MenuManager->getMenu();

        //Check Token
        $this->checkToken();

        if(strlen(@$valid_pages[$page]['title'])==0){
            $this->returnError(403, 'dashboard', true, 'صفحه درخواستی معتبر نمی باشد.');
        }else{
            $this->SectionManager=new SectionManager();
            $this->{$valid_pages[$page]['function_name']}();
        }

    }

    public function getMenu(){
        $MenuManager = new MenuManager();
        $valid_pages=$MenuManager->getMenu();
        $menus=array();
        foreach ($valid_pages as $key => $value) {
            if($value['show_in_menu']==true){
                $menus[]=array(
                    "title" => $value['title'],
                    "url" => $key,
                );
            }
        }

        $admin_info=array(
            'fullname' => 'مسعود بنی مهد',
            'desc' => 'مدیر سایت',
            'image' => 'http://placeimg.com/280/155/tech',
            'profile_image' => 'http://placeimg.com/256/256/tech',
        );

        $redirect_url='';
        $this->returnJSON(array('menus' => $menus, 'admin_info' => $admin_info), 
            $this->responseDialog(200, $redirect_url, false, '')
        ); 
    }
    private function dashboardLoader(){

        //Page Title
        $this->SectionManager->pageConfig('داشبورد');

        //--------------------------------------------------
        //Statistics Grid

        //Users Stats
        $this->SectionManager->addGrid('کاربران عضو', number_format(1600));

        //Sells Stats (Today)
        $this->SectionManager->addGrid('فروش امروز', number_format(146000)." تومان");

        //Sells Stats (Yesterday)
        $this->SectionManager->addGrid('فروش دیروز', number_format(289500)." تومان");

        //Sells Stats (This Month)
        $this->SectionManager->addGrid('فروش این ماه', number_format(9825000)." تومان");

        //Sells Stats (Last Month)
        $this->SectionManager->addGrid('فروش ماه گذشته', number_format(5900000)." تومان");


        $this->SectionManager->add('خلاصه آمار', SECTION_GRID, null, $this->SectionManager->grid_data(), null);


        //--------------------------------------------------
        //Last Users
        $total_count=0;

        $this->SectionManager->configForm('action.php', 'POST');

        //Get Users From Database
        $this->SectionManager->addListHeader(array('کد کاربر','کد اکانت','نام و نام خانوادگی','موبایل','ایمیل','تاریخ عضویت'));
        $this->SectionManager->addList(array(rand(1000,9999),rand(111111111111111,999999999999999),'مسعود بنی مهد','09122769683','masoudx@gmail.com','۲۶ خرداد ۱۳۹۸'), array(array('ویرایش','edituser?id=65'),array('حذف','deleteuser?id=65')));
        $this->SectionManager->addList(array(rand(1000,9999),rand(111111111111111,999999999999999),'مسعود بنی مهد','09122769683','masoudx@gmail.com','۲۶ خرداد ۱۳۹۸'), array(array('ویرایش','edituser?id=65'),array('حذف','deleteuser?id=65')));
        $this->SectionManager->addList(array(rand(1000,9999),rand(111111111111111,999999999999999),'مسعود بنی مهد','09122769683','masoudx@gmail.com','۲۶ خرداد ۱۳۹۸'), array(array('ویرایش','edituser?id=65'),array('حذف','deleteuser?id=65')));
        $this->SectionManager->addList(array(rand(1000,9999),rand(111111111111111,999999999999999),'مسعود بنی مهد','09122769683','masoudx@gmail.com','۲۶ خرداد ۱۳۹۸'), array(array('ویرایش','edituser?id=65'),array('حذف','deleteuser?id=65')));
        $this->SectionManager->addList(array(rand(1000,9999),rand(111111111111111,999999999999999),'مسعود بنی مهد','09122769683','masoudx@gmail.com','۲۶ خرداد ۱۳۹۸'), array(array('ویرایش','edituser?id=65'),array('حذف','deleteuser?id=65')));
        $this->SectionManager->addList(array(rand(1000,9999),rand(111111111111111,999999999999999),'مسعود بنی مهد','09122769683','masoudx@gmail.com','۲۶ خرداد ۱۳۹۸'), array(array('ویرایش','edituser?id=65'),array('حذف','deleteuser?id=65')));
        $this->SectionManager->addList(array(rand(1000,9999),rand(111111111111111,999999999999999),'مسعود بنی مهد','09122769683','masoudx@gmail.com','۲۶ خرداد ۱۳۹۸'), array(array('ویرایش','edituser?id=65'),array('حذف','deleteuser?id=65')));
        $this->SectionManager->addList(array(rand(1000,9999),rand(111111111111111,999999999999999),'مسعود بنی مهد','09122769683','masoudx@gmail.com','۲۶ خرداد ۱۳۹۸'), array(array('ویرایش','edituser?id=65'),array('حذف','deleteuser?id=65')));
        $this->SectionManager->addList(array(rand(1000,9999),rand(111111111111111,999999999999999),'مسعود بنی مهد','09122769683','masoudx@gmail.com','۲۶ خرداد ۱۳۹۸'), array(array('ویرایش','edituser?id=65'),array('حذف','deleteuser?id=65')));
        $this->SectionManager->addList(array(rand(1000,9999),rand(111111111111111,999999999999999),'مسعود بنی مهد','09122769683','masoudx@gmail.com','۲۶ خرداد ۱۳۹۸'), array(array('ویرایش','edituser?id=65'),array('حذف','deleteuser?id=65')));

        $this->SectionManager->add('آخرین کاربران', SECTION_LIST, $this->SectionManager->form_data(), $this->SectionManager->list_data(), $total_count);

        $redirect_url='';
        $this->returnJSON($this->SectionManager->output(), 
            $this->responseDialog(200, $redirect_url, false, '')
        ); 
        
        

    }
    private function productsManager(){
       
        //Page Title
        $this->SectionManager->pageConfig('مدیریت محصولات');

        //Add Grid Buttons
        $this->SectionManager->addGridButton('ثبت محصول جدید', 'new-product');
        $this->SectionManager->addGridButton('محصولات منتشر نشده', 'products-manager?filter_is_published=0');

        $this->SectionManager->add('دکمه های مدیریت', SECTION_GRID_BTN, null, $this->SectionManager->grid_btn_data(), null);

        $total_count=68;
        $this->SectionManager->configForm('action.php', 'POST');
        //Get Products From Database
        $this->SectionManager->addListHeader(array('کد محصول','عنوان محصول','قیمت','وضعیت','تاریخ ثبت','مدیریت'));
        $this->SectionManager->addList(array(rand(1000,9999),rand(111111111111111,999999999999999),'مسعود بنی مهد','09122769683','masoudx@gmail.com','۲۶ خرداد ۱۳۹۸'), array(array('ویرایش','edituser?id=65'),array('حذف','deleteuser?id=65')));

        $this->SectionManager->add('محصولات', SECTION_LIST, $this->SectionManager->form_data(), $this->SectionManager->list_data(), $total_count);

 
        $redirect_url='';
        $this->returnJSON($this->SectionManager->output(), 
            $this->responseDialog(200, $redirect_url, false, '')
        ); 
        
    }
    private function newProduct(){

        //Page Title
        $this->SectionManager->pageConfig('درج محصول جدید');

        $this->SectionManager->configForm('action/new-product', 'POST');

        $this->SectionManager->addFormField('عنوان محصول', 'title', '', INPUT, '');
        $this->SectionManager->addFormField('عنوان محصول', 'title', '', HIDDEN, '');
        $this->SectionManager->addFormField('قیمت محصول', 'price', '', INPUT, '');
        $this->SectionManager->addFormField('توضیحات محصول', 'title', '', TEXTAREA, '');
        // $this->SectionManager->addFormField('توضیحات کامل', 'editor', '', EDITOR, '');
        $this->SectionManager->addFormField('منتشر شود؟', 'title', '', CHECKBOX, '');
        $this->SectionManager->addFormField('عکس محصول', 'image', '', IMAGEUPLOAD, '');
        $this->SectionManager->addFormField('فایل محصول', 'file', '', FILEUPLOAD, '');
        $this->SectionManager->addFormField('دسته بندی', 'category', 'دوم', DROPDOWN, array('گزینه اول'=>'اول','دوم'=>'گزینه دوم','سوم'=>'گزینه سوم'));
        $this->SectionManager->addFormField('قیمت محصول', 'subcat', 'دوم,سوم', DROPDOWN_MULTI, array('گزینه اول'=>'اول','دوم'=>'گزینه دوم','سوم'=>'گزینه سوم'));
        $this->SectionManager->addFormField('ذخیره اطلاعات', 'submit', '', SUBMIT_BUTTON, '');
        $this->SectionManager->addFormField('توضیحات فرم', '', '', HTML, '');

        $this->SectionManager->add('ثبت محصول جدید', SECTION_FORM, $this->SectionManager->form_data(), null, 0);


 
        $redirect_url='';
        $this->returnJSON($this->SectionManager->output(), 
            $this->responseDialog(200, $redirect_url, false, '')
        ); 


    }

}

?>