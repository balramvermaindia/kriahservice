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
$route['default_controller'] = 'kriah';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* dashboard routing */
$route['dashboard'] = 'kriah/index';
// orders routing
$route['orders'] = 'order/all_orders';
$route['new-order'] = 'order/new_order';
$route['edit-order/(:num)'] = 'order/edit_order/$1';
$route['order/(:any)'] = 'order/view_order/$1';
$route['delete-order'] = 'order/delete_order';
// coaches routing
$route['coaches'] = 'coach/all_coaches';
$route['new-coach'] = 'coach/new_coach';
$route['edit-coach/(:num)'] = 'coach/edit_coach/$1';
$route['delete-coach'] = 'coach/delete_coach';
$route['check-email'] = 'coach/check_email';
// user authentication routing
$route['login'] = 'user/login'; 
$route['logout'] = 'user/logout'; 
$route['forget-password'] = 'user/forgot_password'; 
$route['reset-password'] = 'user/reset_password'; 
$route['change-password'] = 'user/edit_password'; 

$route['users'] = 'user/all_users';
$route['new-user'] = 'user/new_user';
$route['edit-user/(:num)'] = 'user/edit_user/$1';
$route['delete-user'] = 'user/delete_user';
$route['check-email-user'] = 'user/check_email';

// Agencies routing
$route['agencies'] = 'kriah/all_agencies';
$route['new-agency'] = 'kriah/new_agency';
$route['edit-agency/(:num)'] = 'kriah/edit_agency/$1';
$route['check-agencyUser-email'] = 'kriah/check_email';
$route['delete-agency'] = 'kriah/delete_agency';
$route['manage-agency-users/(:num)'] = 'kriah/all_agency_users/$1';
$route['new-agency-user/(:num)'] = 'kriah/new_agency_user/$1';
$route['delete-agency-user'] = 'kriah/delete_agency_user';
$route['edit-agency-user/(:num)/(:num)'] = 'kriah/edit_agency_user/$1/$1';

// reports routing
$route['reports'] = 'report/index';
$route['agenda-details'] = 'report/agenda_details';
$route['activity-log'] = 'report/activity_log';
$route['doi-sign-in'] = 'report/doi_sign_in';
$route['principal-signature'] = 'report/principal_signature';
$route['session-invoice-coach'] = 'report/session_invoice_coach';
$route['session-invoice-scholastic'] = 'report/session_invoice_scholastic';

