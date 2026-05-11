<?php
/**
 * Permission Helper
 * Helper functions untuk permission checking & user utilities
 */

class PermissionHelper
{
    /**
     * Check permission untuk mengakses resource
     * @param string $action (create, read, update, delete)
     * @param string $resource (users, reports, grades, etc)
     * @return bool
     */
    public static function can($action, $resource)
    {
        $userRole = AuthMiddleware::getRole();

        $permissions = [
            'admin' => [
                'users' => ['create', 'read', 'update', 'delete'],
                'reports' => ['create', 'read', 'update', 'delete'],
                'dosen' => ['create', 'read', 'update', 'delete'],
                'mahasiswa' => ['create', 'read', 'update', 'delete'],
                'matkul' => ['create', 'read', 'update', 'delete'],
                'jadwal' => ['create', 'read', 'update', 'delete'],
            ],
            'dosen' => [
                'grades' => ['create', 'read', 'update'],
                'attendance' => ['create', 'read', 'update'],
                'schedule' => ['read'],
                'profile' => ['read', 'update'],
                'classes' => ['read'],
            ],
            'mahasiswa' => [
                'grades' => ['read'],
                'attendance' => ['read'],
                'schedule' => ['read'],
                'profile' => ['read', 'update'],
                'krs' => ['create', 'read'],
                'courses' => ['read'],
                'bills' => ['read'],
            ],
        ];

        if (!isset($permissions[$userRole])) {
            return false;
        }

        if (!isset($permissions[$userRole][$resource])) {
            return false;
        }

        return in_array($action, $permissions[$userRole][$resource]);
    }

    /**
     * Redirect jika tidak memiliki permission
     * @param string $action
     * @param string $resource
     * @return void
     */
    public static function requirePermission($action, $resource, $redirectTo = '/')
    {
        if (!self::can($action, $resource)) {
            header("Location: {$redirectTo}");
            exit;
        }
    }

    /**
     * Get user dashboard URL berdasarkan role
     * @return string
     */
    public static function getDashboardUrl()
    {
        $role = AuthMiddleware::getRole();
        return "/dashboard/{$role}/";
    }

    /**
     * Get user friendly name
     * @return string
     */
    public static function getUserDisplayName()
    {
        $user = AuthMiddleware::getUser();
        return $user['username'] ?? 'User';
    }

    /**
     * Check if user is authorized untuk mengakses halaman tertentu
     * @param string $page
     * @return bool
     */
    public static function canAccessPage($page)
    {
        $userRole = AuthMiddleware::getRole();
        
        // Admin bisa akses semua halaman
        if ($userRole === 'admin') {
            return true;
        }

        // Dosen
        if ($userRole === 'dosen') {
            $allowedPages = ['profile', 'classes', 'grades', 'attendance', 'schedule'];
            return in_array($page, $allowedPages);
        }

        // Mahasiswa
        if ($userRole === 'mahasiswa') {
            $allowedPages = ['profile', 'courses', 'krs', 'grades', 'attendance', 'schedule', 'bills'];
            return in_array($page, $allowedPages);
        }

        return false;
    }
}
