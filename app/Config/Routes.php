<?php 

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Home;
use App\Controllers\News;
use App\Controllers\Pages;
use App\Controllers\Ajax;
use App\Controllers\Apis;
use App\Controllers\Cricketers; // ✅ Added Cricketers Controller

// ✅ Homepage Route
$routes->get('/', 'Home::index');

// ✅ Routes for Cricketer Reviews
$routes->get('news', 'News::index'); // List all cricketers
$routes->get('news/new', 'News::new'); // ✅ Show the "Add Cricketer" form
$routes->post('news/create', 'News::create'); // ✅ Process form submission
$routes->get('news/(:segment)', 'News::show/$1'); // ✅ Show a specific cricketer profile

// ✅ Routes for Cricketer Categories
$routes->get('top-batsmen', 'Cricketers::topBatsmen');
$routes->get('legendary-bowlers', 'Cricketers::legendaryBowlers');
$routes->get('all-rounders', 'Cricketers::allRounders');
$routes->get('emerging-stars', 'Cricketers::emergingStars');

// ✅ Routes for Cricket Achievements
$routes->get('world-cup-winners', 'Cricketers::worldCupWinners'); // ✅ Route for World Cup Winners
$routes->get('ipl-champions', 'Cricketers::iplChampions'); // ✅ Route for IPL Champions
$routes->get('most-centuries', 'Cricketers::mostCenturies'); // ✅ Route for Most Centuries

// ✅ Route for AJAX Requests
$routes->get('ajax/get/(:segment)', 'Ajax::get/$1');

// ✅ Pages Routes
$routes->get('pages', 'Pages::index');
$routes->get('(:segment)', 'Pages::view/$1'); // Catch-all for pages
