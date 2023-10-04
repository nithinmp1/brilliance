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
// Load default conrtoller when have only currency from multilanguage
$route['^(\w{2})$'] = $route['default_controller'];

/*
// Template Routes
$route['template/imgs/(:any)'] = "Loader/templateCssImage/$1";
$route['templatecss/imgs/(:any)'] = "Loader/templateCssImage/$1";
$route['templatecss/(:any)'] = "Loader/templateCss/$1";
$route['templatejs/(:any)'] = "Loader/templateJs/$1";

// Login Public Users Page
$route['(\w{2})/login'] = "Users/login";

// Register Public Users Page
$route['register'] = "Users/register";
$route['(\w{2})/register'] = "Users/register";

// Users Profiles Public Users Page
$route['myaccount'] = "Users/myaccount";
$route['myaccount/(:num)'] = "Users/myaccount/$1";
$route['(\w{2})/myaccount'] = "Users/myaccount";
$route['(\w{2})/myaccount/(:num)'] = "Users/myaccount/$2";

// Logout Profiles Public Users Page
$route['logout'] = "User/logout";
// Confirm link
// Site Multilanguage
$route['^(\w{2})/(.*)$'] = '$2';
*/


$route['login'] = "user/index";
$route['logout'] = "user/logout";
$route['dashboard'] = "user/dashboard";
$route['result'] = "home/result";

/*
 * Admin Controllers Routes
 */

$route['admin'] = "user";
$route['admin/Dashboard'] = "admin/Home/index";
$route['stream'] = "admin/home/stream";
$route['stream/(:any)'] = "admin/home/stream";
$route['branch'] = "admin/home/branch";
$route['branch/(:any)'] = "admin/home/branch";
$route['access-management'] = "admin/home/accessManagement";
$route['access-management/(:any)'] = "admin/home/accessManagement";
$route['staff'] = "admin/home/staff";
$route['staff/(:any)'] = "admin/home/staff";
$route['students'] = "admin/home/students";
$route['students/(:any)'] = "admin/home/students";
$route['course'] = "admin/home/course";
$route['course/(:any)'] = "admin/home/course";
$route['enqury-managment'] = "admin/home/enquryManagment";
$route['enqury-managment/(:any)'] = "admin/home/enquryManagment";

$route['students-bulk'] = "admin/home/students/bulkAdd";
$route['academic-bulk'] = "admin/home/acadamic/bulkAdd";
$route['academic'] = "admin/home/acadamic";
$route['questions'] = "admin/home/question";
$route['questions/(:any)'] = "admin/home/question";
$route['questions/(:any)/(:any)'] = "admin/home/question";
$route['Quiz-Master'] = "admin/home/QuizMaster";
$route['quiz/(:any)'] = "admin/home/QuizMaster";
$route['quiz-request/(:any)'] = "admin/home/QuizMaster";
// $route['user/profile/(:num)/(:any)'] = 'UserController/profile/$1/$2';
/*
  | -------------------------------------------------------------------------
  | Sample REST API Routes
  | -------------------------------------------------------------------------
 */

$route['api/(\w{2})/login']['post'] = 'Api/Account/login/$1';

$route['api/(\w{2})/questions']['get'] = 'Api/Questions/index/$1';
$route['api/(\w{2})/quiz']['get'] = 'Api/Questions/quiz/$1';
$route['get-otp']['post'] = "Api/Account/getOtp";
$route['check-otp']['post'] = "Api/Account/checkOtp";
$route['api/(\w{2})/quiz-result']['post'] = "Api/Account/quizResult";




$route['api/products/(\w{2})/get'] = 'Api/Products/all/$1';
$route['api/product/(\w{2})/(:num)/get'] = 'Api/Products/one/$1/$2';
$route['api/product/set'] = 'Api/Products/set';
$route['api/product/(\w{2})/delete'] = 'Api/Products/productDel/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
