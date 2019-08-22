<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'C_Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Back-End
// Menu Kategori Back-End
$route['kor/(:any)'] = 'c_kategory/kats/$1';
$route['takor'] = 'c_kategory/add/$1';
$route['eddkor/(:any)'] = 'c_kategory/edit/$1';
$route['addkor'] = 'c_kategory/addpost';
$route['edkor'] = 'c_kategory/editpost';
$route['hakor'] = 'c_kategory/remove';
$route['datak'] = 'c_kategory/ajax_list';
// Menu Warna Back-End
$route['war/(:any)'] = 'c_warna/kats/$1';
$route['tawar'] = 'c_warna/add';
$route['eddwar/(:any)'] = 'c_warna/edit/$1';
$route['addwar'] = 'c_warna/addpost';
$route['edwar'] = 'c_warna/editpost';
$route['hawar'] = 'c_warna/remove';
$route['dawar'] = 'c_warna/ajax_list';
// Menu Size Back-End
$route['siz/(:any)'] = 'c_size/kats/$1';
$route['tasiz'] = 'c_size/add';
$route['eddsiz/(:any)'] = 'c_size/edit/$1';
$route['addsiz'] = 'c_size/addpost';
$route['edsiz'] = 'c_size/editpost';
$route['hasiz'] = 'c_size/remove';
$route['dasiz'] = 'c_size/ajax_list';