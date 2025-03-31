<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Home;
use App\Controllers\News;
use App\Controllers\Pages;
use App\Controllers\Ajax;
use App\Controllers\Apis;
use App\Controllers\Cricketers;
use App\Controllers\LiveCricket;
use App\Controllers\CricketController;

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// ✅ Homepage
$routes->get('/', 'Home::index');

// ✅ News Routes
$routes->get('news', 'News::index');
$routes->get('news/new', 'News::new');
$routes->post('news/create', 'News::create');
$routes->get('news/t20i-results', 'News::t20iResults');
$routes->get('news/(:segment)', 'News::show/$1'); // ✅ slug-based view

// ✅ Cricketer Category Pages
$routes->get('top-batsmen', 'Cricketers::topBatsmen');
$routes->get('legendary-bowlers', 'Cricketers::legendaryBowlers');
$routes->get('all-rounders', 'Cricketers::allRounders');
$routes->get('emerging-stars', 'Cricketers::emergingStars');
$routes->get('world-cup-winners', 'Cricketers::worldCupWinners');
$routes->get('ipl-champions', 'Cricketers::iplChampions');
$routes->get('most-centuries', 'Cricketers::mostCenturies');

// ✅ AJAX Routes
$routes->get('ajax/cricketers', 'Ajax::getAllCricketers');
$routes->get('ajax/get/(:segment)', 'Ajax::get/$1');
$routes->get('ajax/cricketer/(:segment)', 'Ajax::getCricketer/$1');
$routes->get('ajax/search', 'Ajax::search');
$routes->post('ajax/add', 'Ajax::addCricketer'); // ✅ Fixed duplicate

// ✅ Static Pages
$routes->get('pages', 'Pages::index');
$routes->get('contact', 'Pages::contact');

// ✅ Cricket & Live Matches
$routes->get('cricket', 'CricketController::index');
$routes->get('live-matches', 'LiveCricket::index');
$routes->get('cricbuzz', 'LiveCricket::cricbuzz');
$routes->get('cricbuzz/commentary/(:any)', 'LiveCricket::commentary/$1');

// ✅ Catch-all route — MUST BE LAST!
$routes->get('(:segment)', 'Pages::view');
