<?php
/**
 * Unified Dashboard
 * Single file for all roles with conditional rendering
 */

require_once '../config/config.php';

// Check if user is logged in
if (!isset($_COOKIE['user']) && !isset($_SESSION['user'])) {
    header('Location: /');
    exit;
}

// Get user data from localStorage (sent via JavaScript) or session
$user = null;

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    // You may need to parse user from a header or query parameter if using localStorage
    // For now, we'll redirect if no session
    header('Location: /');
    exit;
}

$role = $user['role'] ?? null;

// Validate role
$allowedRoles = ['admin', 'dosen', 'mahasiswa'];
if (!in_array($role, $allowedRoles)) {
    header('Location: /');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?php echo ucfirst($role); ?></title>
    <link rel="stylesheet" href="../asset/css/main.css">
</head>
<body>
    <div class="container">
        <!-- Navbar (shown for all roles, content varies) -->
        <nav class="navbar">
            <div class="navbar-brand">PSIBW Dashboard</div>
            <div class="navbar-user">
                <span class="user-role"><?php echo strtoupper($role); ?></span>
                <span class="username"><?php echo htmlspecialchars($user['username']); ?></span>
                <button onclick="logout()" class="btn-logout">Logout</button>
            </div>
        </nav>

        <!-- Main Content Area -->
        <div class="dashboard-layout">
            <!-- Sidebar (different per role) -->
            <aside class="sidebar">
                <?php if ($role === 'admin'): ?>
                    <!-- Admin Menu -->
                    <ul class="menu">
                        <li><a href="#dashboard">Dashboard</a></li>
                        <li><a href="#users">Manage Users</a></li>
                        <li><a href="#courses">Manage Courses</a></li>
                        <li><a href="#reports">Reports</a></li>
                        <li><a href="#settings">Settings</a></li>
                    </ul>

                <?php elseif ($role === 'dosen'): ?>
                    <!-- Dosen (Instructor) Menu -->
                    <ul class="menu">
                        <li><a href="#dashboard">Dashboard</a></li>
                        <li><a href="#courses">My Courses</a></li>
                        <li><a href="#students">My Students</a></li>
                        <li><a href="#assignments">Assignments</a></li>
                        <li><a href="#grades">Grades</a></li>
                    </ul>

                <?php elseif ($role === 'mahasiswa'): ?>
                    <!-- Mahasiswa (Student) Menu -->
                    <ul class="menu">
                        <li><a href="#dashboard">Dashboard</a></li>
                        <li><a href="#courses">My Courses</a></li>
                        <li><a href="#assignments">Assignments</a></li>
                        <li><a href="#grades">My Grades</a></li>
                        <li><a href="#profile">Profile</a></li>
                    </ul>
                <?php endif; ?>
            </aside>

            <!-- Main Content -->
            <main class="content">
                <?php if ($role === 'admin'): ?>
                    <!-- Admin Dashboard Content -->
                    <div class="page-header">
                        <h1>Admin Dashboard</h1>
                        <p>Welcome, Admin. You have full system access.</p>
                    </div>

                    <div class="dashboard-grid">
                        <div class="card">
                            <h3>Total Users</h3>
                            <p class="stat">1,250</p>
                        </div>
                        <div class="card">
                            <h3>Active Courses</h3>
                            <p class="stat">45</p>
                        </div>
                        <div class="card">
                            <h3>System Health</h3>
                            <p class="stat">✓ Good</p>
                        </div>
                    </div>

                    <section class="admin-section">
                        <h2>Recent Activity</h2>
                        <p>Admin section: Full access to all system features</p>
                    </section>

                <?php elseif ($role === 'dosen'): ?>
                    <!-- Dosen Dashboard Content -->
                    <div class="page-header">
                        <h1>Dosen Dashboard</h1>
                        <p>Welcome, <?php echo htmlspecialchars($user['username']); ?>. Manage your courses here.</p>
                    </div>

                    <div class="dashboard-grid">
                        <div class="card">
                            <h3>My Courses</h3>
                            <p class="stat">5</p>
                        </div>
                        <div class="card">
                            <h3>Total Students</h3>
                            <p class="stat">187</p>
                        </div>
                        <div class="card">
                            <h3>Pending Tasks</h3>
                            <p class="stat">12</p>
                        </div>
                    </div>

                    <section class="dosen-section">
                        <h2>Your Courses</h2>
                        <p>Dosen section: Manage courses, assignments, and student grades</p>
                        <ul>
                            <li>Web Development 101</li>
                            <li>Database Design</li>
                            <li>Software Engineering</li>
                        </ul>
                    </section>

                <?php elseif ($role === 'mahasiswa'): ?>
                    <!-- Mahasiswa Dashboard Content -->
                    <div class="page-header">
                        <h1>Mahasiswa Dashboard</h1>
                        <p>Welcome, <?php echo htmlspecialchars($user['username']); ?>. Check your courses and grades.</p>
                    </div>

                    <div class="dashboard-grid">
                        <div class="card">
                            <h3>Enrolled Courses</h3>
                            <p class="stat">6</p>
                        </div>
                        <div class="card">
                            <h3>Average Grade</h3>
                            <p class="stat">3.65</p>
                        </div>
                        <div class="card">
                            <h3>Due Assignments</h3>
                            <p class="stat">3</p>
                        </div>
                    </div>

                    <section class="mahasiswa-section">
                        <h2>Your Courses</h2>
                        <p>Mahasiswa section: View courses, submit assignments, and check grades</p>
                        <ul>
                            <li>Web Development 101</li>
                            <li>Database Design</li>
                            <li>Algorithm & Data Structure</li>
                        </ul>
                    </section>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <script>
        // Get user data from localStorage
        const user = JSON.parse(localStorage.getItem('user'));
        
        if (!user) {
            window.location.href = '/';
        }

        function logout() {
            fetch('api/logout.php', {
                method: 'POST'
            }).then(() => {
                localStorage.removeItem('user');
                window.location.href = '/';
            });
        }
    </script>
</body>
</html>
