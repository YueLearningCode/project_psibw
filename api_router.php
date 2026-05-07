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

// Unified dashboard for all roles
$router->route('dashboard/', 'GET', function() {
    require_once 'public/dashboard.php';
});

// Dispatch the request
$router->dispatch();
