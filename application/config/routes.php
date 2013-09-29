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

$route['user/profiles/show'] = "users/user/profiles/show";
$route['user/profiles/register'] = "users/user/profiles/add";

$route['users/([a-z]+)/edit'] = "users/user/$1/edit";

# users module
$route['admin/users/([a-z]+)/summary/(:num)'] = "users/admin/$1/summary/$2";
$route['admin/users/([a-z]+)/edit/(:num)'] = "users/admin/$1/edit/$2";
$route['admin/users/([a-z]+)/delete/(:num)'] = "users/admin/$1/delete/$2";
$route['admin/users/([a-z]+)/add'] = "users/admin/$1/add";
$route['admin/users/([a-z]+)/show'] = "users/admin/$1/show";
$route['admin/users/([a-z]+)/services/(:num)'] = "users/admin/$1/services/$2";
$route['admin/users/([a-z]+)/invoices/(:num)'] = "users/admin/$1/invoices/$2";

# news module
$route['admin/news/([a-z]+)/summary/(:num)'] = "news/admin/$1/summary/$2";
$route['admin/news/([a-z]+)/edit/(:num)'] = "news/admin/$1/edit/$2";
$route['admin/news/([a-z]+)/delete/(:num)'] = "news/admin/$1/delete/$2";
$route['admin/news/([a-z]+)/add'] = "news/admin/$1/add";
$route['admin/news/([a-z]+)/show'] = "news/admin/$1/show";
$route['admin/news/([a-z]+)/services/(:num)'] = "news/admin/$1/services/$2";
$route['admin/news/([a-z]+)/invoices/(:num)'] = "news/admin/$1/invoices/$2";

# emails module
$route['admin/emails/([a-z]+)/edit/(:num)'] = "emails/admin/$1/edit/$2";
$route['admin/emails/([a-z]+)/([a-z]+)'] = "emails/admin/$1/$2";

$route['admin/([a-z]+)/([a-z]+)'] = "$1/admin/$2";
$route['admin/(:any)/(:any)/(:num)'] = "$1/admin/$2/index/$3";

$route['admin/prices/products/(:num)'] = "prices/index/products/$1";



$route['admin/modules/show'] = "modules/show";
$route['admin/modules/summary/(:any)'] = "modules/summary/index/$1";

$route['login'] = "site_users/login";
$route['logout'] = "site_users/logout";
$route['register'] = "site_users/register";
$route['Userarea/details'] = "site_users/details";

$route['categories/(:num)/(:any)'] = "categories/user/index/$1/$2";

$route['posts/(:num)/(:any)'] = "site_posts/posts/index/$1/$2";


//
$route['admin/credits/payment'] = "admin_credits/payment";
$route['admin/credits/zarinpal/request/(:num)'] = "admin_credits/zarinpal/request/$1";
$route['admin/credits/zarinpal/verify/(:num)'] = "admin_credits/zarinpal/verify/$1";
//



$route['admin'] = "admin/admin";

$route['admin/login'] = "admin/login";
$route['admin/logout'] = "admin/logout";

$route['admin/settings/main'] = "admin_settings/main";

$route['admin/credits/add'] = "admin_credits/add";
$route['admin/credits/add/verify'] = "admin_credits/add/verify";









//



/* End of file routes.php */
/* Location: ./application/config/routes.php */