<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Dashboard';

$route['login'] = 'oauth/AuthenticationController/login';
$route['logout'] = 'oauth/AuthenticationController/logout';
$route["api/v2/oauth/sign-in"] = "oauth/AuthenticationController/signin";

$route['api-auth-login'] = 'auth/login';
$route['api-auth-register'] = 'auth/register';

$route["api/v2/blogs/category/add"] = "BlogsController/api_category_insert";
$route["api/v2/blogs/tag/add"] = "BlogsController/api_tag_insert";
$route["api/v2/blogs/tags/add"] = "BlogsController/api_tag_insert";
$route["api/v2/blogs/category/get"] = "BlogsController/api_category_get";
// $route["api/v2/blogs/category/add"] = "";

$route['register'] = 'dashboard/register';

$route['/'] = 'dashboard/index';

/* Blogs */
$route['posts/all-blogs'] = 'BlogsController/home';
$route['posts/blogs/new'] = 'BlogsController/new_post';
$route['posts/blog/(:any)'] = 'BlogsController/preview/$1';
$route['posts/blog/(:any)/edit'] = 'BlogsController/edit/$1';
$route['posts/blogs/all-categories'] = 'BlogsController/categories';

$route['posts/blogs/comments'] = 'BlogsController/comments';
$route['posts/blog/(:any)/comments'] = 'BlogsController/blog_comments/$1';

/* PR Articles */
$route['posts/all-articles'] = 'PRController/home';
$route['posts/pr/new'] = 'PRController/new_post';
$route['posts/pr/(:any)/edit'] = 'PRController/edit/$1';

$route['posts/pr/all-categories'] = 'PRController/categories';


/* Locations */
$route['locations'] = 'LocationsController/home';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

