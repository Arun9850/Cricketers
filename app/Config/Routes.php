<?php 

use CodeIgniter\Router\RouteCollection;
use App\Controllers\News;
use App\Controllers\Pages;
use App\Controllers\Ajax;
use App\Controllers\Apis;


$routes->get('/', 'Home::index');  
$routes->get('news', 'News::index');
$routes->get('news/(:segment)', 'News::show/$1');
$routes->get('ajax/get/(:segment)', 'Ajax::get/$1');
$routes->get('news/new', 'News::new');
$routes->post('news/create', 'News::create'); 
$routes->get('pages', 'Pages::index');
$routes->get('(:segment)', 'Pages::view');
