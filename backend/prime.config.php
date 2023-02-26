<?php
    date_default_timezone_set('Asia/Tehran');


    //Product Config
    define('DEBUG_MODE', true);
    define('PAY_WITH_SAMPLE_GATEWAY', true);
    define('USER_CAN_ADD_CREDIT', true);
    // define('WEBSITE_BASE_URL', 'http://vishascarf.com/api/backend/');
    define('WEBSITE_BASE_URL', 'http://store.yerbyer.com/backend/');
    define('WEBSITE_FRONT_URL', 'http://store.yerbyer.com/');
    define('WEBSITE_API_PATH', 'api/v1/');
    define('USER_FILES_DOWNLOAD_FOLDER', './user_products_files/');
    define('MYSQL_HOST', 'localhost');
    define('MYSQL_USERNAME', 'yerbyer_store');
    define('MYSQL_PASSWORD', 'b;+q+Y;xF]A(');
    define('MYSQL_DATABASE', 'yerbyer_store');
    define('PASSWORD_HASH', '_+2bx8bx8b38b6x32863v237@#$');
    define('DOWNLOAD_FILE_LINK_EXPIRE_TIME', 1); //Days
    define('USER_TOKENS_EXPIRE_TIME', 30); //Days


//     define('DB_NAME', 'dbkishpara');

// /** MySQL database username */
// define('DB_USER', 'userkishpara');

// /** MySQL database password */
// define('DB_PASSWORD', 'AS#($!ad5f');

    //Portal Config
    define('PORTAL_URL_PATH', 'admin-api/');
    define('PORTAL_PASSWORD_HASH', 'o284b723947b203x4b927x342b@#$');


    //Under Cunstruction Mode
    define('ENABLE_CUNSTRUCTION_MODE', false);
    define('CUNSTRUCTION_MESSAGE', 'سرویس موقتا در دسترس نمی باشد.');


    //SMS Config
    define('APP_NAME', '');
    define('SMS_API', '');


    //File Upload
    define('DISABLE_FILE_UPLOAD', false);
    define('FILE_UPLOAD_DIR', './p_uploads_dir/');
    define('FILE_UPLOAD_VALID_TYPES', 'gif|jpg|png|zip|rar|apk|jpeg|ipa');
    define('FILE_UPLOAD_MAX_SIZE', '10000');


    //Image Upload
    define('DISABLE_IMAGE_UPLOAD', false);
    define('IMAGE_UPLOAD_DIR', './p_images_dir/');
    define('IMAGE_UPLOAD_VALID_TYPES', 'gif|jpg|png');
    define('IMAGE_UPLOAD_MAX_SIZE', '10000');


    //Mobile App Config
    define('IOS_APP_PACKAGE_NAME', 'com.parto.winbin');
    define('ANDROID_APP_PACKAGE_NAME', 'com.app.android');


    //Shop APP Config
    define('SHOW_SLIDESHOW_ON_MAINPAGE', true);
    define('SHOW_LATEST_ON_MAINPAGE', true);
    define('SHOW_SPECIAL_ON_MAINPAGE', true);
    define('SHOW_BEST_SELL_ON_MAINPAGE', true);


    //Portal File Upload
    define('DISABLE_PORTAL_FILE_UPLOAD', false);
    define('PORTAL_FILE_UPLOAD_DIR', './p_uploads_dir/');
    define('PORTAL_FILE_UPLOAD_VALID_TYPES', 'gif|jpg|png|zip|rar|apk|jpeg|ipa|mp4|vtt|application/zip|pdf|text/html');
    define('PORTAL_FILE_UPLOAD_MAX_SIZE', '1000000000');


    //Portal Image Upload
    define('DISABLE_PORTAL_IMAGE_UPLOAD', false);
    define('PORTAL_IMAGE_UPLOAD_DIR', './p_uploads_dir/');
    define('PORTAL_IMAGE_UPLOAD_VALID_TYPES', 'gif|jpg|png|jpeg|bmp');
    define('PORTAL_IMAGE_UPLOAD_MAX_SIZE', '1000000000');
?>