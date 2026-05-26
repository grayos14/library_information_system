<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/dashboard', 'DashboardController::index');

$routes->get('/list/books', 'BookController::index');
$routes->get('/list/books/table', 'BookController::ajaxTable');
$routes->get('/ajax/create/book', 'BookController::ajaxCreate');
$routes->get('/ajax/edit/book/(:num)', 'BookController::ajaxEdit/$1');
$routes->post('/create/book', 'BookController::store');
$routes->post('/update/book', 'BookController::update');
$routes->post('/delete/book/(:num)', 'BookController::delete/$1');


$routes->get('/list/members', 'MemberController::index');
$routes->get('/list/members/table', 'MemberController::ajaxTable');
$routes->get('/ajax/create/member', 'MemberController::ajaxCreate');
$routes->get('/ajax/edit/member/(:num)', 'MemberController::ajaxEdit/$1');
$routes->post('/create/member', 'MemberController::store');
$routes->post('/update/member', 'MemberController::update');
$routes->post('/delete/member/(:num)', 'MemberController::delete/$1');

$routes->get('/list/transactions', 'PeminjamanController::index');
$routes->get('/list/transactions/table', 'PeminjamanController::ajaxTable');
$routes->get('/ajax/create/transaction', 'PeminjamanController::ajaxCreate');
$routes->get('/ajax/edit/transaction/(:num)', 'PeminjamanController::ajaxEdit/$1');
$routes->post('/create/transaction', 'PeminjamanController::store');
$routes->post('/update/transaction', 'PeminjamanController::update');
$routes->post('/delete/transaction/(:num)', 'PeminjamanController::delete/$1');

$routes->get('/list/pengembalian', 'PengembalianController::index');
$routes->get('/list/pengembalian/table', 'PengembalianController::ajaxTable');
$routes->get('/ajax/create/pengembalian', 'PengembalianController::ajaxCreate');
$routes->get('/ajax/edit/pengembalian/(:num)', 'PengembalianController::ajaxEdit/$1');
$routes->post('/create/pengembalian', 'PengembalianController::store');
$routes->post('/update/pengembalian', 'PengembalianController::update');
$routes->post('/delete/pengembalian/(:num)', 'PengembalianController::delete/$1');
