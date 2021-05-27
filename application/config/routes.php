<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 $route['default_controller'] = 'Admin';
 $route['kal'] = 'site_controller/Site_views';
 $route['Admin'] = 'Admin';
 $route['hi'] = 'Function_control';
 $route['api'] = 'Api';
 $route['Excel'] = 'Excel';
 $route['Excel/import'] = 'Excel/import';
 $route['api_fetch_data'] = 'api_fetch_data';
 $route['login'] = 'Admin';
//  $route['login1'] = 'Site_login';
 $route['login/(:any)'] = 'Main/$1';
  $route['contact']="Main/pages/contact";
 $route['pages/(:any)']="Main/pages/$1";
  $route['services/(:any)']="Main/services/$1";
//  $route['login1/(:any)'] = 'Site_login/$1';
 $route['translate_uri_dashes'] = FALSE;
?>