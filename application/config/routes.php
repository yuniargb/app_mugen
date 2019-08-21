<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'C_Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['kor'] = 'c_kategory';
$route['takor'] = 'c_kategory/add/$1';
$route['eddkor/(:any)'] = 'c_kategory/edit/$1';
$route['addkor'] = 'c_kategory/addpost';
$route['edkor'] = 'c_kategory/editpost';
$route['hakor'] = 'c_kategory/remove';
