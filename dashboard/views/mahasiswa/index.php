<?php
/**
 * Mahasiswa Dashboard
 */

require_once __DIR__ . '/../../autoload.php';
require_once __DIR__ . '/../../../config/config.php';

// Middleware
RoleMiddleware::requireRole('mahasiswa');

$pageTitle = 'Mahasiswa Dashboard - PSIBW LMS';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?= $pageTitle ?></title>
    
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link rel="stylesheet" href="../../../asset/css/dashboard.css">
    
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
    <?php include __DIR__ . '/../../components/sidebar.php'; ?>

    <div class="main">
        <?php include __DIR__ . '/../../components/navbar.php'; ?>

        <main class="content">
            <div class="page-header">
                <h1>Mahasiswa Dashboard 🎯</h1>
                <div class="page-header-right">
                    <button class="nav-icon-btn"><i class="fa-solid fa-rotate"></i></button>
                    <select class="year-select">
                        <option>Semester Ganjil 2026</option>
                        <option>Semester Genap 2025</option>
                    </select>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid-row grid-3">
                <div class="card stat-card">
                    <div class="stat-label">IPK Saat Ini</div>
                    <div class="stat-amount">3.75</div>
                    <div class="stat-change">
                        <span style="color:#16a34a;font-weight:600;">Sangat Baik</span>
                    </div>
                </div>

                <div class="card stat-card">
                    <div class="stat-label">Kursus Aktif</div>
                    <div class="stat-amount">6</div>
                    <div class="stat-change">
                        <span style="color:#8a8f9c;">Semester ini</span>
                    </div>
                </div>

                <div class="card stat-card">
                    <div class="stat-label">Tugas Pending</div>
                    <div class="stat-amount">3</div>
                    <div class="stat-change">
                        <span style="color:#dc2626;font-weight:600;">Deadline minggu ini</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card">
                <div class="section-header">
                    <div class="section-title">Quick Actions</div>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 12px; margin-top: 16px;">
                    <button class="btn-action" onclick="location.href='/dashboard/mahasiswa/courses'">
                        <i class="fa-solid fa-book" style="font-size:18px;"></i>
                        <span>Kursus</span>
                    </button>
                    <button class="btn-action" onclick="location.href='/dashboard/mahasiswa/krs'">
                        <i class="fa-solid fa-pen-fancy" style="font-size:18px;"></i>
                        <span>KRS</span>
                    </button>
                    <button class="btn-action" onclick="location.href='/dashboard/mahasiswa/grades'">
                        <i class="fa-solid fa-star" style="font-size:18px;"></i>
                        <span>Nilai</span>
                    </button>
                    <button class="btn-action" onclick="location.href='/dashboard/mahasiswa/bills'">
                        <i class="fa-solid fa-receipt" style="font-size:18px;"></i>
                        <span>Tagihan</span>
                    </button>
                </div>
            </div>

            <p style="text-align: center; color: var(--muted); margin-top: 32px; font-size: 12px;">
                Mahasiswa Dashboard • PSIBW Learning Management System
            </p>
        </main>
    </div>

    <button style="position:fixed;bottom:24px;right:24px;width:44px;height:44px;border-radius:50%;
        background:var(--green);color:#fff;border:none;font-size:17px;cursor:pointer;
        display:flex;align-items:center;justify-content:center;box-shadow:0 4px 16px rgba(26,122,94,0.35);z-index:999;">
        <i class="fa-solid fa-gear"></i>
    </button>

    <script src="../../../asset/js/dashboard.js"></script>
    <script>
        // Set active menu
        document.querySelectorAll('.sidebar-item').forEach(item => {
            item.classList.remove('active');
        });
        document.querySelector('a[href="/dashboard/mahasiswa/"]')?.classList.add('active');
    </script>

    <style>
        .btn-action {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--white);
            cursor: pointer;
            transition: all 0.15s;
            font-size: 13px;
            font-weight: 500;
            color: var(--text);
        }

        .btn-action:hover {
            background: var(--green-light);
            border-color: var(--green);
            color: var(--green);
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
        }

        .section-link {
            font-size: 13px;
            color: var(--green);
            font-weight: 500;
            cursor: pointer;
        }
    </style>
</body>
</html>
