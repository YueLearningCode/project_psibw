<?php
/**
 * Authentication Middleware
 * Validasi user sudah login dan memiliki session yang valid
 */

class AuthMiddleware
{
    /**
     * Check if user is authenticated
     * @param array $allowedRoles Optional - specific roles yang diizinkan
     * @return bool
     */
    public static function check($allowedRoles = [])
    {
        // Start session jika belum
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Cek session
        if (!isset($_SESSION['users']) || empty($_SESSION['users'])) {
            return false;
        }

        $user = $_SESSION['users'];

        // Validasi struktur session
        if (!isset($user['ni']) || !isset($user['role'])) {
            return false;
        }

        // Jika ada role restriction
        if (!empty($allowedRoles) && !in_array($user['role'], $allowedRoles)) {
            return false;
        }

        return true;
    }

    /**
     * Redirect to login jika tidak authenticated
     * @param array $allowedRoles
     * @return void
     */
    public static function requireLogin($allowedRoles = [])
    {
        if (!self::check($allowedRoles)) {
            header('Location: /');
            exit;
        }
    }

    /**
     * Get current user data
     * @return array|null
     */
    public static function getUser()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return $_SESSION['users'] ?? null;
    }

    /**
     * Get user role
     * @return string|null
     */
    public static function getRole()
    {
        $user = self::getUser();
        return $user['role'] ?? null;
    }
}
