<?php
/**
 * Router.php - Simple routing system for API requests
 */

class Router {
    private $routes = [];
    private $currentPath;

    public function __construct() {
        $this->currentPath = $this->getPath();
    }

    /**
     * Get the current request path
     */
    private function getPath() {
        $path = isset($_GET['path']) ? trim($_GET['path'], '/') : '';
        return $path ?: 'home';
    }

    /**
     * Register a route
     * @param string $path - Route path (e.g., 'api/login')
     * @param string $method - HTTP method (GET, POST, etc.)
     * @param callable $callback - Function to handle the route
     */
    public function route($path, $method, $callback) {
        $this->routes[] = [
            'path' => trim($path, '/'),
            'method' => strtoupper($method),
            'callback' => $callback
        ];
    }

    /**
     * Dispatch the request to the appropriate handler
     */
    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $this->currentPath;

        foreach ($this->routes as $route) {
            if ($route['path'] === $path && $route['method'] === $method) {
                call_user_func($route['callback']);
                return;
            }
        }

        // If no route found
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'message' => 'Route not found: ' . $path
        ]);
    }
}
