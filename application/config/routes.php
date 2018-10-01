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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'home';



//Admin
$route['dashboard'] 	= 'dashboard/auth/admin';
$route['dashboard/admin/forgot'] 	= 'dashboard/auth/forgot/admin';

//franchise
$route['dashboard/franchise'] 	= 'dashboard/auth/franchise';
$route['dashboard/franchise/forgot'] 	= 'dashboard/auth/forgot/franchise';

//Manager
$route['dashboard/sitemanager'] 	= 'dashboard/auth/sitemanager';
$route['dashboard/sitemanager/forgot'] 	= 'dashboard/auth/forgot/sitemanager';

//distributor
$route['dashboard/distributor'] 	= 'dashboard/auth/distributor';
$route['dashboard/distributor/forgot'] 	= 'dashboard/auth/forgot/distributor';

/*
//Admin
$route['dashboard/admin/login'] 	= 'dashboard/auth/login/admin';
$route['dashboard/admin/forgot'] 	= 'dashboard/auth/forgot/admin';

//franchise
$route['dashboard/franchise/login'] 	= 'dashboard/auth/login/franchise';
$route['dashboard/franchise/forgot'] 	= 'dashboard/auth/forgot/franchise';

//distributor
$route['dashboard/distributor/login'] 	= 'dashboard/auth/login/distributor';
$route['dashboard/distributor/forgot'] 	= 'dashboard/auth/forgot/distributor';

//sitemanager
$route['dashboard/sitemanager/login'] 	= 'dashboard/auth/login/sitemanager';
$route['dashboard/sitemanager/forgot'] 	= 'dashboard/auth/forgot/sitemanager';

*/

$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
