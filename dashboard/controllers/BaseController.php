<?php
/**
 * Base Controller
 * Shared controller logic untuk semua role-specific controllers
 */

abstract class BaseController
{
    protected $conn;
    protected $userRole;
    protected $userId;
    protected $userName;

    public function __construct($connection = null)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Authenticate
        AuthMiddleware::requireLogin();

        $this->conn = $connection;
        $this->userRole = AuthMiddleware::getRole();
        $user = AuthMiddleware::getUser();
        $this->userId = $user['ni'] ?? null;
        $this->userName = $user['username'] ?? null;
    }

    /**
     * Render view dengan data
     * @param string $view Path ke view file
     * @param array $data Data yang akan di-pass ke view
     */
    protected function view($view, $data = [])
    {
        // Extract data agar bisa digunakan sebagai variable di view
        extract($data);
        
        // Include view file
        include $view;
    }

    /**
     * Send JSON response
     * @param array $data
     * @param int $statusCode
     */
    protected function json($data, $statusCode = 200)
    {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
        exit;
    }

    /**
     * Get database connection
     */
    protected function getConnection()
    {
        return $this->conn;
    }

    /**
     * Redirect ke URL
     * @param string $url
     */
    protected function redirect($url)
    {
        header("Location: {$url}");
        exit;
    }

    /**
     * Check permission
     * @param string $action
     * @param string $resource
     * @return bool
     */
    protected function can($action, $resource)
    {
        return PermissionHelper::can($action, $resource);
    }

    /**
     * Require permission
     * @param string $action
     * @param string $resource
     */
    protected function requirePermission($action, $resource)
    {
        PermissionHelper::requirePermission($action, $resource, '/');
    }
}
