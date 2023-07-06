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
$route['default_controller'] = 'front';

/* For Administrator */
$route['page/(:any)'] = 'Pages/view/$a';
$route['orders/(:any)'] = 'Orders/view/$a';
$route['admin-orders/insert_final_doc'] = 'Orders/insert_final_doc';
$route['services/faqs/(:any)'] = 'faqs/list/$a';
$route['services/benefits/(:any)'] = 'benefits/list/$a';
$route['services/process_durations/(:any)'] = 'process_durations/list/$a';
$route['ongoing-work'] = 'Partner/ongoing_work';
$route['forgot-password'] = 'Forgot_password/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* For Front */
$route['about'] = 'Front/about';
$route['all-companies'] = 'Front/all_companies';
$route['thank-you'] = 'Register/thank_you';
$route['activate/(:any)'] = 'Register/activate_account/$a';
$route['apply-service/(:any)'] = 'Front/apply_service/$a';
$route['payment-cancel'] = 'Front/payment_cancel';
$route['payment-success'] = 'Front/payment_success';
$route['payment-notify'] = 'Front/payment_notify';
$route['service/(:any)'] = 'Front/service/$a';
$route['privacy-policy'] = 'Front/privacy_policy';
$route['all-property'] = 'Front/allproperty';
$route['property-detail/(.+)'] = 'Front/propertydetail/$b';
$route['local-information'] = 'Front/localinformation';
$route['management-services'] = 'Front/managementservices';
$route['partner-with-us'] = 'Front/partner_with_us';
$route['refund-policy'] = 'Front/refund_policy';
$route['terms-conditions'] = 'Front/terms_conditions';
$route['registration-services'] = 'Front/registration_services';
$route['professional-services'] = 'Front/professional_services';
$route['audit-returns'] = 'Front/audit_returns';
$route['articles'] = 'Front/articles';
$route['articles/constant/(:any)'] = 'Front/user_articles/$a';
$route['article/(:any)'] = 'Front/article/$a';
$route['contact-us'] = 'Front/contact';
$route['gst'] = 'Front/gst';
$route['consultants'] = 'Front/consultants';
$route['consultant/detail/(.+)'] = 'Front/consultant_detail/$a';
$route['company-detail/(.+)'] = 'Front/company_detail/$a';
