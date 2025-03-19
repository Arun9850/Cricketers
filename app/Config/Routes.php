<?php 

use CodeIgniter\Router\RouteCollection;
use App\Controllers\News;
use App\Controllers\Pages;
use App\Controllers\Ajax;
use App\Controllers\Apis;

// ✅ Homepage Route
$routes->get('/', 'Home::index');

// ✅ Routes for Cricketer Reviews
$routes->get('news', 'News::index'); // List all cricketers
$routes->get('news/new', 'News::new'); // ✅ Show the "Add Cricketer" form
$routes->post('news/create', 'News::create'); // ✅ Process form submission
$routes->get('news/(:segment)', 'News::show/$1'); // ✅ Show a specific cricketer profile

// ✅ Route for AJAX Requests
$routes->get('ajax/get/(:segment)', 'Ajax::get/$1');

// ✅ Pages Routes
$routes->get('pages', 'Pages::index');
$routes->get('(:segment)', 'Pages::view'); // Catch-all for pages
