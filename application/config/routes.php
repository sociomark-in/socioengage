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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Dashboard';

$route['login'] = 'pages/login';
$route['logout'] = 'auth/logout';

$route['api-auth-login'] = 'auth/login';
$route['api-auth-register'] = 'auth/register';

$route['api-event-register'] = 'EventsController/api_event_register';
$route['event/(:any)/check-in/(:any)'] = 'EventsController/check_in_verify/$1/$2';

$route['register'] = 'dashboard/register';

$route[''] = 'dashboard/index';
$route['menu'] = 'dashboard/menu_master';
$route['menu/categories'] = 'dashboard/categories_all';
$route['menu/category/(:any)/menu-items'] = 'dashboard/menu_items/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
