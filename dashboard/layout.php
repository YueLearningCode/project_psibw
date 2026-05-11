<?php
/**
 * Dashboard Layout Template
 * Layout utama untuk semua role yang menggabungkan navbar, sidebar, dan content
 */

session_start();

// Check authentication
require_once __DIR__ . '/../dashboard/autoload.php';
AuthMiddleware::requireLogin();

$userRole = AuthMiddleware::getRole();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?= $pageTitle ?? 'Dashboard - PSIBW LMS' ?></title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet"/>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    
    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="../../../asset/css/dashboard.css">
    
    <!-- Additional Styles -->
    <?php if (isset($additionalStyles)): ?>
        <?php foreach ($additionalStyles as $style): ?>
            <link rel="stylesheet" href="<?= $style ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            display: flex;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <!-- Include Sidebar -->
    <?php include __DIR__ . '/components/sidebar.php'; ?>

    <!-- Main Content Wrapper -->
    <div class="main">
        <!-- Include Navbar -->
        <?php include __DIR__ . '/components/navbar.php'; ?>

        <!-- Page Content -->
        <main class="content">
            <?php if (isset($content)): ?>
                <?= $content ?>
            <?php endif; ?>
        </main>
    </div>

    <!-- Floating Action Button -->
    <button style="position:fixed;bottom:24px;right:24px;width:44px;height:44px;border-radius:50%;
        background:var(--green);color:#fff;border:none;font-size:17px;cursor:pointer;
        display:flex;align-items:center;justify-content:center;box-shadow:0 4px 16px rgba(26,122,94,0.35);z-index:999;">
        <i class="fa-solid fa-gear"></i>
    </button>

    <!-- Scripts -->
    <script src="../../../asset/js/dashboard.js"></script>
    
    <!-- Additional Scripts -->
    <?php if (isset($additionalScripts)): ?>
        <?php foreach ($additionalScripts as $script): ?>
            <script src="<?= $script ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
