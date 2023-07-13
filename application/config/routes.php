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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['Login'] ['GET'] = 'Auth/loginController/index';
$route['Login'] ['POST'] = 'Auth/loginController/validation';
$route['Register'] ['GET'] = 'Auth/RegisterController/index';
$route['Register'] ['POST'] = 'Auth/RegisterController/register';
// $route['Login']['Post'] = 'Auth/loginController/logout';
$route['dashboard']['GET'] = 'Admin';
$route['error']['GET'] = 'Admin/error404';
$route['users-profile']['GET'] = 'Admin/profile';
$route['users-save']['POST'] = 'Admin/store';


/// Category  Crud Routes ///
// $route['categories']['GET'] = "admin/CategoryController/index";
$route['categories'] ['GET'] = 'adminside/CategoryController/index';
$route['categories-create'] ['GET'] = 'adminside/CategoryController/create';
$route['Create-Category']['POST'] = 'adminside/CategoryController/store';
$route['Edit-category/(:any)']['GET'] = "adminside/CategoryController/edit/$1";
$route['category/update/(:num)']['POST'] = "adminside/CategoryController/update/$1";
$route['delete-category/(:any)']['DELETE'] =  "adminside/CategoryController/delete/$1";
// export///
$route['export-categories']['POST'] = 'adminside/CategoryController/export';
/// Products ////

$route['products']['GET'] = 'adminside/ProductController/index';
$route['products-create']['GET'] = 'adminside/ProductController/create';
$route['products-created']['POST'] = 'adminside/ProductController/store';
$route['products-edit/(:any)']['GET'] = 'adminside/ProductController/edit/$1';
$route['product-update/(:num)']['POST'] ='adminside/ProductController/update/$1';



/// Using ajax crud ///
$route['students-save/store']['POST'] = 'AjaxController/store';
