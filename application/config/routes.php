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
$route['default_controller'] = 'home';
$route['produk/(:any)'] = 'home/productpage/$1';
$route['produks/(:num)'] = 'home/productview/$1';
$route['produks'] = 'home/productview';
$route['checkoutjemput'] = 'cart_oto/checkout';
$route['checkoutantar'] = 'cart_oto/checkoutantar';
$route['suksesjemput'] = 'cart_oto/checkout_recordjemput'; 
$route['suksesantar'] = 'cart_oto/checkout_recordantar'; 
$route['cart'] = 'cart_oto' ;
$route['logincustomer'] = 'home/login' ;
$route['cariproduk'] = 'home/searchproducts';
$route['cariproduk/(:any)'] = 'home/searchproducts/$1';
$route['tentang'] = 'home/tentang';
$route['kontak'] = 'home/kontak';
$route['caraorder'] = 'home/caraorder';
$route['register'] = 'home/register';
$route['gaslur'] = 'admin/login';
$route['produktidakditemukan'] = 'home/searchnotfound';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
