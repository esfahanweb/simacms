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


$route['admin/(:any)/(:any)'] = "$1/$2";
$route['admin/discounts/add'] = "discounts/add";
$route['admin/discounts/edit/(:num)'] = "discounts/edit/index/$1";
$route['admin/discounts/delete/(:num)'] = "discounts/delete/index/$1";

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

$route['admin/categories/show'] = "categories/admin/show";
$route['admin/categories/add'] = "categories/admin/add";
$route['admin/categories/edit/(:num)'] = "categories/admin/edit/index/$1";
$route['admin/categories/delete/(:num)'] = "categories/admin/delete/index/$1";



$route['admin/groups/show'] = "groups/show";
$route['admin/groups/add'] = "groups/add";
$route['admin/groups/edit/(:num)'] = "groups/edit/index/$1";
$route['admin/groups/delete/(:num)'] = "groups/delete/index/$1";

$route['admin/admins/show_roles'] = "admin_admins/show_roles";
$route['admin/admins/add_roles'] = "admin_admins/add_roles";
$route['admin/admins/edit_roles/(:num)'] = "admin_admins/edit_roles/index/$1";
$route['admin/admins/delete_roles/(:num)'] = "admin_admins/delete_roles/index/$1";

$route['admin/admins/show_perms'] = "admin_admins/show_perms";
$route['admin/admins/add_perms'] = "admin_admins/add_perms";
$route['admin/admins/edit_perms/(:num)'] = "admin_admins/edit_perms/index/$1";
$route['admin/admins/delete_perms/(:num)'] = "admin_admins/delete_perms/index/$1";




//
$route['admin/ibsng/add_account'] = "admin_ibsng/add_account";
$route['admin/ibsng/main_settings'] = "admin_ibsng/main_settings";
$route['admin/ibsng/show_online_users'] = "admin_ibsng/show_online_users";

$route['admin/ibsng/show_groups'] = "admin_ibsng/show_groups";
$route['admin/ibsng/edit_groups/(:num)'] = "admin_ibsng/edit_groups/index/$1";



$route['admin/admins/show'] = "admins/show";
$route['admin/admins/add'] = "admins/add";
$route['admin/admins/edit/(:num)'] = "admins/edit/index/$1";
$route['admin/admins/delete/(:num)'] = "admins/delete/index/$1";

$route['admin/users/settings'] = "users/settings";
$route['admin/users/show'] = "users/show";
$route['admin/users/add'] = "users/add";
$route['admin/users/edit/(:num)'] = "users/edit/index/$1";
$route['admin/users/delete/(:num)'] = "users/delete/index/$1";

$route['admin/users/show_roles'] = "admin_users/show_roles";
$route['admin/users/add_roles'] = "admin_users/add_roles";
$route['admin/users/edit_roles/(:num)'] = "admin_users/edit_roles/index/$1";
$route['admin/users/delete_roles/(:num)'] = "admin_users/delete_roles/index/$1";

$route['admin/posts/show'] = "posts/show";
$route['admin/posts/add'] = "posts/add";
$route['admin/posts/edit/(:num)'] = "posts/edit/index/$1";
$route['admin/posts/delete/(:num)'] = "posts/delete/index/$1";

$route['admin/emails/send'] = "emails/send";

$route['admin/emails/show'] = "emails/show";
$route['admin/emails/add'] = "emails/add";
$route['admin/emails/edit/(:num)'] = "emails/edit/index/$1";
$route['admin/emails/delete/(:num)'] = "emails/delete/index/$1";


$route['admin/gateways/show'] = "gateways/show";
$route['admin/gateways/add'] = "gateways/add";
$route['admin/gateways/edit/(:num)'] = "gateways/edit/index/$1";
$route['admin/gateways/delete/(:num)'] = "gateways/delete/index/$1";
/* End of file routes.php */
/* Location: ./application/config/routes.php */