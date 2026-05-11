<?php
/**
 * Role Middleware
 * Validasi user memiliki role yang tepat untuk mengakses resource
 */

class RoleMiddleware
{
    /**
     * Validasi user memiliki role yang diizinkan
     * @param string|array $requiredRoles
     * @return bool
     */
    public static function hasRole($requiredRoles)
    {
        if (!AuthMiddleware::check()) {
            return false;
        }

        $userRole = AuthMiddleware::getRole();
        
        if (is_string($requiredRoles)) {
            return $userRole === $requiredRoles;
        }

        if (is_array($requiredRoles)) {
            return in_array($userRole, $requiredRoles);
        }

        return false;
    }

    /**
     * Redirect jika user tidak memiliki role yang tepat
     * @param string|array $requiredRoles
     * @param string $redirectTo
     * @return void
     */
    public static function requireRole($requiredRoles, $redirectTo = '/')
    {
        if (!self::hasRole($requiredRoles)) {
            header("Location: {$redirectTo}");
            exit;
        }
    }

    /**
     * Cek apakah user adalah admin
     * @return bool
     */
    public static function isAdmin()
    {
        return self::hasRole('admin');
    }

    /**
     * Cek apakah user adalah dosen
     * @return bool
     */
    public static function isDosen()
    {
        return self::hasRole('dosen');
    }

    /**
     * Cek apakah user adalah mahasiswa
     * @return bool
     */
    public static function isMahasiswa()
    {
        return self::hasRole('mahasiswa');
    }
}
