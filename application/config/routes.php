<?php
defined('BASEPATH') or exit('No direct script access allowed');



/*========== User Route ==========*/
/*========== Sys Route ==========*/

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/*========== Admins Route ==========*/

$route["admin/dashboard"] = "admin/DashboardController/index";

$route["admin/news"]["GET"] = "admin/NewsController/index";
$route["admin/news/(:any)"]["GET"] = "admin/NewsController/show/$1";
$route["admin/news/create"]["GET"] = "admin/NewsController/create";
$route["admin/news/store"]["POST"] = "admin/NewsController/store";
$route["admin/news/(:any)/edit"]["GET"] = "admin/NewsController/edit/$1";
$route["admin/news/(:any)/update"]["POST"] = "admin/NewsController/update/$1";
$route["admin/news/(:any)/delete"]["POST"] = "admin/NewsController/delete/$1";

$route["admin/advertising"]["GET"] = "admin/AdvertisingController/index";
$route["admin/advertising/(:any)"]["GET"] = "admin/AdvertisingController/show/$1";
$route["admin/advertising/create"]["GET"] = "admin/AdvertisingController/create";
$route["admin/advertising/store"]["POST"] = "admin/AdvertisingController/store";
$route["admin/advertising/(:any)/edit"]["GET"] = "admin/AdvertisingController/edit/$1";
$route["admin/advertising/(:any)/update"]["POST"] = "admin/AdvertisingController/update/$1";
$route["admin/advertising/(:any)/delete"]["POST"] = "admin/AdvertisingController/delete/$1";




// /* /*EXAMPLE REST API ROUTING PLEASE USE THIS IT!!! */

// $route["category"]["POST"] = "Controller/store"; // Action: Создание новой категории
// $route["category/(:num)/update"]["POST"] = "Controller/update/$1"; // Action: Обновление категории через POST
// $route["category/(:num)/edit"]["GET"] = "Controller/edit/$1"; // Форма отображения: Форма редактирования категории
// $route["category/(:num)/delete"]["POST"] = "Controller/destroy/$1"; // Action: Удаление категории через POST



$route["admin/advertising"] = "";





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









