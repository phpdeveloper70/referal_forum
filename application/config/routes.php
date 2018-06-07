<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'welcome';
/* start routes for admin */
$route['admin'] = 'admin/admin/index';
$route['admin/dashboard'] = 'admin/admin/dashboard';
$route['admin/change_password'] = 'admin/admin/change_password';
$route['admin/logout'] = 'admin/admin/logout';
/* end routs for admin */


/* start front route */
$route['deals'] = 'welcome/all_deals';
$route['deal/(:any)/(:num)'] = 'welcome/deal/$1/$2';
$route['membership-plans'] = 'welcome/membership_plan';
$route['how-it-works'] = 'welcome/how_it_works';
$route['privacy-policy'] = 'welcome/privacy_policy';
//$route['forum'] = 'forum/index/';
$route['topics/(:any)'] = 'forums/listing/$1';
$route['topic/(:any)/(:any)'] = 'forums/detail/$1/$2';
/* end front route */

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
