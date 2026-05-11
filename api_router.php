<?php
/**
 * Main application entry point
 * This file handles all routing to keep URLs clean and hide folder structure
 */

header('Content-Type: application/json');

require_once 'api/Router.php';
require_once 'config/config.php';

$router = new Router();

// Define your routes here
// route(path, method, callback)

$router->route('Login', 'POST', function() {
    require_once 'index.php';
});

// $router->route('api/register', 'POST', function() {
//     require_once 'api/register.php';
// });

$router->route('api/logout', 'POST', function() {
    require_once 'api/logout.php';
});

// User routes
// $router->route('api/profile', 'GET', function() {
//     require_once 'api/profile.php';
// });

// ════════════════ DASHBOARD ROUTES ════════════════

// Admin Dashboard
$router->route('dashboard/admin/', 'GET', function() {
    require_once 'dashboard/views/admin/index.php';
});

// Dosen Dashboard
$router->route('dashboard/dosen/', 'GET', function() {
    require_once 'dashboard/views/dosen/index.php';
});

// Mahasiswa Dashboard
$router->route('dashboard/mahasiswa/', 'GET', function() {
    require_once 'dashboard/views/mahasiswa/index.php';
});

// Dispatch the request
$router->dispatch();
