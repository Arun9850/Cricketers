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

// ✅ Homepage Route
$routes->get('/', 'Home::index');

// ✅ News Routes
$routes->get('news', 'News::index');
$routes->get('news/new', 'News::new');
$routes->post('news/create', 'News::create');
$routes->get('news/(:segment)', 'News::show/$1');

// ✅ Cricketer Routes
$routes->get('top-batsmen', 'Cricketers::topBatsmen');
$routes->get('legendary-bowlers', 'Cricketers::legendaryBowlers');
$routes->get('all-rounders', 'Cricketers::allRounders');
$routes->get('emerging-stars', 'Cricketers::emergingStars');
$routes->get('world-cup-winners', 'Cricketers::worldCupWinners');
$routes->get('ipl-champions', 'Cricketers::iplChampions');
$routes->get('most-centuries', 'Cricketers::mostCenturies');

// ✅ AJAX Routes
$routes->get('ajax/get/(:segment)', 'Ajax::get/$1');
$routes->get('ajax/cricketers', 'Ajax::getAllCricketers');
$routes->get('ajax/cricketer/(:segment)', 'Ajax::getCricketer/$1');
$routes->get('ajax/search', 'Ajax::search'); // ✅ NEW: Autocomplete search route

// ✅ Static Pages
$routes->get('pages', 'Pages::index');
$routes->get('contact', 'Pages::contact');

// ✅ Cricket Routes
$routes->get('cricket', 'CricketController::index');
$routes->get('live-matches', 'LiveCricket::index');
$routes->get('news/t20i-results', 'News::t20iResults');

// ✅ Cricbuzz Routes
$routes->get('cricbuzz', 'LiveCricket::cricbuzz');
$routes->get('cricbuzz/commentary/(:any)', 'LiveCricket::commentary/$1');

// ✅ Catch-all route — must go LAST!
$routes->get('(:segment)', 'Pages::view');
