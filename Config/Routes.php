<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Kalkulator subskrypcji
$routes->get('kalkulator',                  'Auth::index');
$routes->post('kalkulator/login',           'Auth::send');
$routes->get('kalkulator/auth/(:segment)',  'Auth::verify/$1');
$routes->get('kalkulator/logout',           'Auth::logout');

$routes->get('kalkulator/profile',          'Profile::index');
$routes->post('kalkulator/profile/add',     'Profile::add');
$routes->post('kalkulator/profile/update',  'Profile::update');
$routes->post('kalkulator/profile/delete',  'Profile::delete');

$routes->get('kalkulator/api/services',     'Services::search');
$routes->get('kalkulator/serwis/(:segment)','Services::show/$1');

$routes->get('kalkulator/admin',            'Admin::index');
$routes->post('kalkulator/admin/verify/(:num)', 'Admin::verify/$1');
$routes->post('kalkulator/admin/merge/(:num)',  'Admin::merge/$1');
