<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuManager {

    private $menus=array();

    public function __construct(){

        //Panel Menus

        $this->menus['dashboard']= array(

                "title" => "داشبورد",
                "show_in_menu" => true,
                "function_name" => "dashboardLoader"
        );

//////////////////////////////////////////////////////
//مدیریت اسلایدر صفحه اصلی
$this->menus['managers-slider']= array(

        "title" => "مدیریت اسلایدر",
        "show_in_menu" => true,
        "function_name" => "managersSliderLoader"

);

$this->menus['new-slider-store']= array(

        "title" => "اسلایدر جدید " ,
        "show_in_menu" => false,
        "function_name" => "newSliderStore"

);

$this->menus['add_update_slider']= array(

        "title" => "ویرایش اسلایدر",
        "show_in_menu" => false,
        "function_name" => "updateSliderStore"

);
//مدیریت بنر صفحه اصلی
$this->menus['managers-Baner']= array(

        "title" => "مدیریت بنر",
        "show_in_menu" => true,
        "function_name" => "managersBanerLoader"

);

$this->menus['new-Baner-store']= array(

        "title" => "اسلایدر جدید " ,
        "show_in_menu" => false,
        "function_name" => "newBanerStore"

);

$this->menus['add_update_Baner']= array(

        "title" => "ویرایش اسلایدر",
        "show_in_menu" => false,
        "function_name" => "updateBanerStore"

);

//مدیریت دسته بندی
$this->menus['managers-menu-cat']= array(

        "title" => "مدیریت دسته بندی",

        "show_in_menu" => true,

        "function_name" => "managersMenuCatLoader"

);
$this->menus['new-cat-store']= array(

        "title" => " ایجاد دسته جدید",

        "show_in_menu" => false,

        "function_name" => "newCatStore"

);

//مدیریت محصولات
$this->menus['managers-product']= array(

        "title" => " مدیریت محصولات ",

        "show_in_menu" => true,

        "function_name" => "managersProductLoader"

);

$this->menus['new-product']= array(

        "title" => " ایجاد  محصول جدید",

        "show_in_menu" => false,

        "function_name" => "newProductStore"

);

$this->menus['product-details']=array(
        "title" => "جزییات پروژه",
        "show_in_menu" => true,
        "function_name" => "productDetails"
);

$this->menus['managers-users-app']= array(

        "title" => "مدیریت  کاربران اپلیکیشن",

        "show_in_menu" => true,

        "function_name" => "managersUserAppLoader"

);
////////////////////////////////////////////////////////////////////
// $this->menus['managers-menu-cat']= array(

//         "title" => "مدیریت دسته بندی",

//         "show_in_menu" => true,

//         "function_name" => "managersMenuCatLoader"

// );



// $this->menus['new-menu-cat-visha']= array(

//         "title" => " ایجاد دسته جدید",

//         "show_in_menu" => false,

//         "function_name" => "newMenuCatVisha"

// );





// $this->menus['managers-menu-sub-cat']= array(

//         "title" => "مدیریت زیر منو ها ",

//         "show_in_menu" => true,

//         "function_name" => "managersMenuSubCatLoader"

// );



// $this->menus['new-menu-sub-cat-visha']= array(

//         "title" => " ایجاد زیر منو جدید",

//         "show_in_menu" => false,

//         "function_name" => "newMenuSubCatVisha"

// );





// $this->menus['managers-color']= array(

//         "title" => "مدیریت  رنگ ها ",

//         "show_in_menu" => true,

//         "function_name" => "managersColorLoader"

// );



// $this->menus['new-color-product']= array(

//         "title" => " ایجاد  رنگ جدید",

//         "show_in_menu" => false,

//         "function_name" => "newColorVisha");



// $this->menus['managers-gender']= array(

//         "title" => "مدیریت   نوع جنس کالا ",

//         "show_in_menu" => true,

//         "function_name" => "managersGenderLoader"

// );
// $this->menus['new-gender-product']= array(

//         "title" => " ایجاد  جنس جدید",

//         "show_in_menu" => false,

//         "function_name" => "newGenderVisha"

// );



// $this->menus['managers-design-details']= array(

//         "title" => "مدیریت جزییات طرح ",

//         "show_in_menu" => true,

//         "function_name" => "managersDesignDetails"

// );
// $this->menus['new-design-details']= array(

//         "title" => " ایجاد طرح جدید",

//         "show_in_menu" => false,

//         "function_name" => "newDesignDetailsVisha"

// );

// $this->menus['managers-product-used']= array(

//         "title" => "مورد استفاده در",

//         "show_in_menu" => true,

//         "function_name" => "managersProductUsed"

// );
// $this->menus['new-product-used']= array(

//         "title" => " ایجاد طرح جدید",

//         "show_in_menu" => false,

//         "function_name" => "newProductUsed"

// );


// // $this->menus['managers-product']= array(

// //         "title" => " مدیریت محصولات ",

// //         "show_in_menu" => true,

// //         "function_name" => "managersProductLoader"

// // );

// // $this->menus['new-product']= array(

// //         "title" => " ایجاد  محصول جدید",

// //         "show_in_menu" => false,

// //         "function_name" => "newProductVisha"

// // );



// $this->menus['managers-article']= array(

//         "title" => " مدیریت مجله ",

//         "show_in_menu" => true,

//         "function_name" => "managersArticleLoader"

// );

// $this->menus['new-article']= array(

//         "title" => " ایجاد  مقاله جدید",

//         "show_in_menu" => false,

//         "function_name" => "newArticleVisha"

// );

// $this->menus['managers-order']= array(

//         "title" => "مدیریت سفارشات",

//         "show_in_menu" => true,

//         "function_name" => "managersOrder"

// );

// $this->menus['view-order']= array(

//         "title" => "مشاهده جزییات سفارش",

//         "show_in_menu" => false,

//         "function_name" => "viewOrder"

// );


// $this->menus['managers-gift']= array(

//         "title" => "مدیریت کادوپیچ",

//         "show_in_menu" => true,

//         "function_name" => "managersGift"

// );

// $this->menus['new-gift-visha']= array(

//         "title" => " کادوپیچ جدید",

//         "show_in_menu" => false,

//         "function_name" => "newGiftVisha"

// );



// $this->menus['managers-banner-home']= array(

//         "title" => "مدیریت  بنر های صفحه اصلی",

//         "show_in_menu" => true,

//         "function_name" => "managersBannerHome"

// );

// $this->menus['edit-banner-visha']= array(

//         "title" => "ویرایش بنر",

//         "show_in_menu" => false,

//         "function_name" => "editBannerVisha"

// );


// $this->menus['managers-vocher']= array(

//         "title" => "مدیریت کد تخفیف",

//         "show_in_menu" => true,

//         "function_name" => "managersVocher"

// );

// $this->menus['new-vocher-visha']= array(

//         "title" => " تخفیف جدید",

//         "show_in_menu" => false,

//         "function_name" => "newVocherVisha"

// );

// $this->menus['managers-sell']= array(

//         "title" => "گزارش فروش ",

//         "show_in_menu" => true,

//         "function_name" => "managersSell"

// );

// $this->menus['managers-zarin']= array(

//         "title" => "زرین پال",

//         "show_in_menu" => true,

//         "function_name" => "managerszarin"

// );









// $this->menus['managers-portal']= array(

//         "title" => "مدیران سامانه",

//         "show_in_menu" => true,

//         "function_name" => "managersPortalLoader"

// );









// $this->menus['new-manager-lab']= array(

//         "title" => "ثبت مدیر جدید",

//         "show_in_menu" => false,

//         "function_name" => "newManagerLab"

// );





// $this->menus['setting-api']= array(

//         "title" => "تنظیمات API",

//         "show_in_menu" => true,

//         "function_name" => "apiLoader"

// );





// $this->menus['update-about-lab']= array(

//         "title" => "درباره ما",

//         "show_in_menu" => false,

//         "function_name" => "updateaboutLab"

// );





// $this->menus['add-update-contactus-setting-lab']= array(

//         "title" => "تماس با ما",

//         "show_in_menu" => false,

//         "function_name" => "updatecontactusLab"

// );



// $this->menus['add-update-adv-setting']= array(

//         "title" => "راهنما",

//         "show_in_menu" => false,

//         "function_name" => "updateadvLab"

// );





////////////////////////////////////////////////////



     





        if (!DISABLE_PORTAL_FILE_UPLOAD) {

            $this->menus['file-manager']= array(

                "title" => "مدیریت فایل ها",

                "show_in_menu" => true,

                "function_name" => "fileManager"

        );

        }





        

    }



    public function getMenu(){

        return $this->menus;

    }



}





?>