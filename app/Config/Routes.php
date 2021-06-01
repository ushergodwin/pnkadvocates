<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\EcController;
use App\Controllers\VoteController;

$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('practice-areas', 'Home::practiceAreas');
$routes->get('practice/intellectual-property', 'Home::intellectualPropertyLaw');
$routes->get('practice/energy-law', 'Home::energyLaw');
$routes->get('practice/commercial-law', 'Home::commercialLaw');
$routes->get('practice/litigation-and-arbitration', 'Home::litigationAndArbitration');
$routes->get('practice/oil-and-gas-law', 'Home::oilAndGasLaw');
$routes->get('practice/real-estate-and-conveyancing', 'Home::realEstateAndConveyancing');
$routes->get('practice/tax-advisory', 'Home::taxAdvisory');
$routes->get('contacts', 'Home::contactUs');
$routes->add('send', 'Home::sendMessage');
$routes->get('legal-team', 'Home::legalTeam');
$routes->get('about-firm', 'Home::about');
$routes->get('privacy-policy', 'Home::privacyPolicy');
//$routes->add('vote/candidate/(:any)', 'VoteController::candidate/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
