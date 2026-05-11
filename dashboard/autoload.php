<?php
/**
 * Dashboard Autoloader
 * Meload semua class yang diperlukan
 */

// Load middleware
require_once __DIR__ . '/middleware/AuthMiddleware.php';
require_once __DIR__ . '/middleware/RoleMiddleware.php';

// Load helpers
require_once __DIR__ . '/helpers/PermissionHelper.php';

// Load controllers
require_once __DIR__ . '/controllers/BaseController.php';

// Spl autoloader untuk controllers & models yang custom
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    
    return false;
});
