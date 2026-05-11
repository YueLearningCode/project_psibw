<?php
/**
 * Sidebar Component
 * Shared sidebar untuk semua role
 * Konten menu akan disesuaikan berdasarkan role di CSS/JS
 */
?>

<!-- ════════════════ SIDEBAR ════════════════ -->
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="sidebar-logo-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="#1a7a5e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/>
      </svg>
    </div>
    PSIBW LMS
  </div>

  <?php 
    $userRole = $_SESSION['users']['role'] ?? 'mahasiswa';
  ?>

  <!-- ADMIN MENU -->
  <?php if($userRole === 'admin'): ?>
    <div class="sidebar-section-label">Dashboards</div>
    <a class="sidebar-item" href="/dashboard/admin/"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
    <a class="sidebar-item" href="/dashboard/admin/users"><i class="fa-solid fa-users"></i> Manajemen Pengguna</a>
    <a class="sidebar-item" href="/dashboard/admin/reports"><i class="fa-solid fa-file-lines"></i> Laporan</a>

    <div class="sidebar-section-label">Data Master</div>
    <a class="sidebar-item" href="/dashboard/admin/dosen"><i class="fa-solid fa-chalkboard-user"></i> Data Dosen</a>
    <a class="sidebar-item" href="/dashboard/admin/mahasiswa"><i class="fa-solid fa-graduation-cap"></i> Data Mahasiswa</a>
    <a class="sidebar-item" href="/dashboard/admin/matkul"><i class="fa-solid fa-book"></i> Mata Kuliah</a>
    <a class="sidebar-item" href="/dashboard/admin/jadwal"><i class="fa-solid fa-calendar"></i> Jadwal</a>
  
  <!-- DOSEN MENU -->
  <?php elseif($userRole === 'dosen'): ?>
    <div class="sidebar-section-label">Dashboard</div>
    <a class="sidebar-item" href="/dashboard/dosen/"><i class="fa-solid fa-chart-line"></i> Dashboard</a>

    <div class="sidebar-section-label">Pengajaran</div>
    <a class="sidebar-item" href="/dashboard/dosen/classes"><i class="fa-solid fa-chalkboard"></i> Kelas Saya</a>
    <a class="sidebar-item" href="/dashboard/dosen/grades"><i class="fa-solid fa-star"></i> Input Nilai</a>
    <a class="sidebar-item" href="/dashboard/dosen/attendance"><i class="fa-solid fa-clipboard-list"></i> Absensi</a>
    <a class="sidebar-item" href="/dashboard/dosen/schedule"><i class="fa-solid fa-calendar"></i> Jadwal</a>

    <div class="sidebar-section-label">Profil</div>
    <a class="sidebar-item" href="/dashboard/dosen/profile"><i class="fa-solid fa-user"></i> Profil</a>

  <!-- MAHASISWA MENU -->
  <?php else: ?>
    <div class="sidebar-section-label">Dashboard</div>
    <a class="sidebar-item" href="/dashboard/mahasiswa/"><i class="fa-solid fa-chart-line"></i> Dashboard</a>

    <div class="sidebar-section-label">Akademik</div>
    <a class="sidebar-item" href="/dashboard/mahasiswa/courses"><i class="fa-solid fa-book"></i> Daftar Kursus</a>
    <a class="sidebar-item" href="/dashboard/mahasiswa/krs"><i class="fa-solid fa-pen-fancy"></i> KRS</a>
    <a class="sidebar-item" href="/dashboard/mahasiswa/grades"><i class="fa-solid fa-star"></i> Nilai</a>
    <a class="sidebar-item" href="/dashboard/mahasiswa/attendance"><i class="fa-solid fa-clipboard-list"></i> Absensi</a>
    <a class="sidebar-item" href="/dashboard/mahasiswa/schedule"><i class="fa-solid fa-calendar"></i> Jadwal</a>

    <div class="sidebar-section-label">Keuangan</div>
    <a class="sidebar-item" href="/dashboard/mahasiswa/bills"><i class="fa-solid fa-receipt"></i> Tagihan</a>

    <div class="sidebar-section-label">Profil</div>
    <a class="sidebar-item" href="/dashboard/mahasiswa/profile"><i class="fa-solid fa-user"></i> Profil</a>
  <?php endif; ?>
</aside>
