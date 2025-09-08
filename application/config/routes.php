<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['product'] = 'home/product';
$route['aboutus'] = 'home/about';
$route['blog'] = 'home/blog';
$route['blog/(:any)'] = 'blog/detail/$1'; 
$route['categories/(:any)'] = 'home/categories/$1'; 
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
