<?php
//Duong dan den thu muc chua ung dung
defined('APPLICATION_PATH')
	|| define('APPLICATION_PATH', 
			  realpath(dirname(__FILE__) . '/application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV',
              (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
                                         : 'developer'));
			  
//Nap duong dan den cac thu vien se su dung trong ung dung
set_include_path(implode(PATH_SEPARATOR, array(
    dirname(__FILE__) . '/library',
    get_include_path(),
)));
//mail
define('EMAIL_INFO', 'info@decode.com.vn');
define('EMAIL_INFO_PASSWORD', '123456789');
//http
define('HTTP_BASE', 'http://decode.loc/');                                    
//Duong dan den thu muc /public
define('PUBLIC_PATH', realpath(dirname(__FILE__) . '/public'));
//Duong dan den thu muc /templates
define('TEMPLATE_PATH', PUBLIC_PATH . '/templates');

//Duong dan den thu muc /templates
define('TEMPLATE_URL', '/public/templates');

//Duong dan den thu muc /templates/default
define('DEFAULT_TEMPLATE_URL', '/public/templates/default/default');

//Duong dan den thu muc /templates/admin
define('ADMIN_TEMPLATE_URL', '/public/templates/default/admin');

//duong dan den tem plate mac dinh
define('DEFAULT_TEMPLATE', TEMPLATE_PATH . "/default/default");

//Ngon ngu mac dinh
define('DEFAULT_LANGUAGES', 'vi');

//Số ban ghi trên 1 trang mac dinh
define('ITEM_COUNT_PER_PAGE', 4);

//Số trang hiển thị khi phân trang
define('PAGE_RANGE', 3);

//Module default
define('DEAULT_MODULE', 'default');

//Duong dan den thu muc /upload
define('UPLOAD_URL', 'public/upload/');

//price code
$prive_code = array(
    'OFF_PEAK' => 'off-preak',
    'EVENING' => 'evening',
    'WEEKEND' => 'weekend');
define('PRICE_CODE', serialize($prive_code));
//time
define('TIME_PRICE', '17:00');

//option group code
//general settings
define('GLOBAL_MENU_TOP', 'GLOBAL_MENU_TOP');
define('GLOBAL_LOGO', 'GLOBAL_LOGO');
//home page
define('HOME_BANNER', 'HOME_BANNER');
define('HOME_VIDEO', 'HOME_VIDEO');
define('HOME_DECODE', 'HOME_DECODE');
//the games
define('GAMES_SLIDESHOW_IMG', 'GAMES_SLIDESHOW_IMG');
define('GAMES_RULE', 'GAMES_RULE');
//contact
define('CONTACT_EMAIL', 'CONTACT_EMAIL');
define('CONTACT_PHONE', 'CONTACT_PHONE');
define('CONTACT_ADDRESS', 'CONTACT_ADDRESS');
define('CONTACT_FACEBOOK', 'CONTACT_FACEBOOK');




