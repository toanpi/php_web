<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';

$route['change/(:any)'] = "same_method/convert/$1";

/* Client route */
$route['gioi-thieu'] = 'articles/index';
$route['gioi-thieu/(:any)-(:num)'] = 'articles/index/$2';
$route['about'] = 'articles/index';
$route['about/(:any)-(:num)'] = 'articles/index/$2';

$route['ho-tro'] = 'articles/support';
$route['ho-tro/(:any)-(:num)'] = 'articles/support/$2';
$route['support'] = 'articles/support';
$route['support/(:any)-(:num)'] = 'articles/support/$2';

$route['huong-dan-mua-hang'] = 'articles/shopping_guide';
$route['shopping-guide'] = 'articles/shopping_guide';

$route['tin-tuc'] = 'articles/news';
$route['tin-tuc/(:num)'] = 'articles/news/$1';
$route['nhom-tin/(:any)-(:num)'] = 'articles/group_news/$2';
$route['nhom-tin/(:any)-(:num)/(:num)'] = 'articles/group_news/$2/$3';
$route['tin-tuc/(:any)-(:num)'] = 'articles/details_news/$2';
$route['news'] = 'articles/news';
$route['news/(:num)'] = 'articles/news/$1';
$route['group-news/(:any)-(:num)'] = 'articles/group_news/$2';
$route['group-news/(:any)-(:num)/(:num)'] = 'articles/group_news/$2/$3';
$route['news/(:any)-(:num)'] = 'articles/details_news/$2';

$route['san-pham'] = 'item/index';
$route['products'] = 'item/index';
$route['mua-hang'] = 'item/purchase';
$route['purchase'] = 'item/purchase';

$route['danh-muc-san-pham/(:any)-(:num)'] = 'item/catalog/$2';
$route['product-catalog/(:any)-(:num)'] = 'item/catalog/$2';

$route['phan-mem/(:any)-(:num)'] = 'item/software/$2';
$route['software/(:any)-(:num)'] = 'item/software/$2';

$route['version/(:any)-(:num)'] = 'item/version/$2';
$route['upload-file'] = 'item/upload_file';

$route['download'] = 'other/download';
$route['download/(:num)'] = 'other/download/$2';


$route['lien-he'] = 'other/index';
$route['lien-he/(:num)'] = 'other/index/$1';
$route['contact'] = 'other/index';
$route['contact/(:num)'] = 'other/index/$1';
$route['send-mess'] = 'other/send_mess';

$route['add-to-cart/(:num)/(:num)'] = 'cart/add_single/$1/$2';
$route['your-cart'] = 'cart/index';
$route['your-cart/(:num)'] = 'cart/index/$1';
$route['update-cart'] = 'cart/update';
$route['cancel'] = 'cart/remove_cart';
$route['payment'] = 'cart/payment';
$route['payment/(:num)'] = 'cart/payment/$1';

$route['payment-paypal'] = 'cart/payment_paypal';
$route['payment-paypal/(:num)'] = 'cart/payment_paypal/$1';

$route['finish-cart'] = 'cart/finish_cart';
$route['finish-cart-paypal'] = 'cart/finish_cart_paypal';

$route['register'] = 'users/register';
$route['save-register'] = 'users/save_register';


$route['login'] = 'users/login';
$route['login/(:num)'] = 'users/login/$1';
$route['check-login'] = 'users/check_login';
$route['check-login-step'] = 'users/check_login_step';
$route['logout'] = 'users/logout';
$route['forgot-password'] = 'users/forget_pass';
$route['forgot-password/(:num)'] = 'users/forget_pass/$1';
$route['get-pass'] = 'users/get_pass';
$route['reset-pass/(:any)'] = 'users/reset_pass/$1';
$route['update-pass'] = 'users/update_pass';

$route['my-account/(:num)'] = 'users/my_account/$1';
$route['edit-account/(:num)'] = 'users/edit_info/$1';
$route['edit-account/(:num)/(:num)'] = 'users/edit_info/$1/$2';
$route['update-register'] = 'users/update_register';

$route['status-payment/(:num)'] = 'cart/load_page/$1';
$route['cancel-payment/(:num)'] = 'cart/cancel_payment/$1';

/* Admin route */
$route[URL_ADMIN] = 'admin_login/index';
$route['kiem-tra-dang-nhap-quan-tri'] = 'admin_login/validate_login';
$route['quen-mat-khau-quan-tri'] = 'admin_login/lost_pass';
$route['quen-mat-khau-quan-tri/(:any)'] = 'admin_login/lost_pass/$1';
$route['khoi-phuc-mat-khau-quan-tri'] = 'admin_login/reset_pass';


/* End of file routes.php */
/* Location: ./application/config/routes.php */