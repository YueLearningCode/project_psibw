<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>NiceDash – Modern Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --sidebar-w: 220px;
    --navbar-h: 60px;
    --green: #1a7a5e;
    --green-dark: #155f49;
    --green-light: #e8f5f0;
    --green-accent: #c6f135;
    --bg: #f4f5f7;
    --white: #ffffff;
    --text: #1a1d23;
    --muted: #8a8f9c;
    --border: #e8eaed;
    --card-radius: 16px;
    --sidebar-bg: #1a7a5e;
    --red: #ef4444;
    --yellow: #f59e0b;
  }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    display: flex;
    min-height: 100vh;
  }

  /* ─── SIDEBAR ─── */
  .sidebar {
    width: var(--sidebar-w);
    min-height: 100vh;
    background: var(--sidebar-bg);
    display: flex;
    flex-direction: column;
    position: fixed;
    left: 0; top: 0;
    z-index: 100;
    overflow-y: auto;
  }

  .sidebar-logo {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 20px 18px 16px;
    color: #fff;
    font-weight: 700;
    font-size: 17px;
    letter-spacing: -0.3px;
  }

  .sidebar-logo-icon {
    width: 32px; height: 32px;
    background: #fff;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
  }

  .sidebar-logo-icon svg { width: 18px; height: 18px; }

  .sidebar-section-label {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.5);
    padding: 14px 18px 6px;
  }

  .sidebar-item {
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 9px 18px;
    color: rgba(255,255,255,0.75);
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    border-radius: 10px;
    margin: 1px 8px;
    transition: background 0.15s, color 0.15s;
    text-decoration: none;
  }

  .sidebar-item:hover { background: rgba(255,255,255,0.12); color: #fff; }

  .sidebar-item.active {
    background: rgba(255,255,255,0.18);
    color: #fff;
  }

  .sidebar-item i {
    width: 18px; text-align: center;
    font-size: 14px;
    opacity: 0.85;
  }

  .sidebar-item .badge {
    margin-left: auto;
    background: rgba(255,255,255,0.2);
    color: #fff;
    font-size: 10px;
    font-weight: 600;
    padding: 2px 7px;
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.25);
  }

  .sidebar-item .chevron {
    margin-left: auto;
    font-size: 11px;
    opacity: 0.6;
  }

  /* ─── MAIN ─── */
  .main {
    margin-left: var(--sidebar-w);
    flex: 1;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  /* ─── NAVBAR ─── */
  .navbar {
    height: var(--navbar-h);
    background: var(--white);
    display: flex;
    align-items: center;
    padding: 0 28px;
    gap: 14px;
    position: sticky; top: 0;
    z-index: 90;
    border-bottom: 1px solid var(--border);
  }

  .navbar-search {
    flex: 1;
    max-width: 320px;
    display: flex;
    align-items: center;
    gap: 9px;
    background: var(--bg);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 0 14px;
    height: 38px;
  }

  .navbar-search input {
    border: none; background: transparent;
    font-family: inherit; font-size: 13.5px;
    color: var(--text); width: 100%; outline: none;
  }

  .navbar-search input::placeholder { color: var(--muted); }

  .navbar-right {
    margin-left: auto;
    display: flex; align-items: center; gap: 6px;
  }

  .nav-icon-btn {
    width: 36px; height: 36px;
    border: none; background: transparent;
    border-radius: 50%; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    color: var(--muted); font-size: 15px;
    position: relative; transition: background 0.15s;
  }

  .nav-icon-btn:hover { background: var(--bg); }

  .nav-dot {
    width: 8px; height: 8px;
    background: var(--red);
    border-radius: 50%;
    border: 2px solid #fff;
    position: absolute; top: 3px; right: 3px;
  }

  .nav-avatar {
    width: 34px; height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-weight: 700; font-size: 13px;
    cursor: pointer; margin-left: 4px;
  }

  /* ─── CONTENT ─── */
  .content {
    flex: 1;
    padding: 28px;
    display: flex;
    flex-direction: column;
    gap: 22px;
  }

  /* ─── PAGE HEADER ─── */
  .page-header {
    display: flex; align-items: center; justify-content: space-between;
  }

  .page-header h1 {
    font-size: 22px; font-weight: 700; letter-spacing: -0.3px;
  }

  .page-header-right {
    display: flex; align-items: center; gap: 10px;
  }

  .year-select {
    display: flex; align-items: center; gap: 7px;
    border: 1px solid var(--border);
    background: var(--white);
    border-radius: 10px;
    padding: 7px 14px;
    font-family: inherit; font-size: 14px;
    font-weight: 500; cursor: pointer; outline: none;
    color: var(--text);
  }

  .btn-download {
    display: flex; align-items: center; gap: 8px;
    background: var(--green-accent);
    color: #1a1d23;
    border: none; border-radius: 10px;
    padding: 8px 18px; font-family: inherit;
    font-size: 14px; font-weight: 600;
    cursor: pointer; transition: opacity 0.15s;
  }

  .btn-download:hover { opacity: 0.88; }

  /* ─── ALERT BANNER ─── */
  .alert-banner {
    background: var(--green-dark);
    border-radius: var(--card-radius);
    padding: 18px 24px;
    display: flex; align-items: center; justify-content: space-between;
  }

  .alert-banner-left { display: flex; flex-direction: column; gap: 4px; }

  .alert-tag {
    display: flex; align-items: center; gap: 8px;
    font-size: 12px; font-weight: 500; color: rgba(255,255,255,0.7);
  }

  .alert-dot {
    width: 8px; height: 8px;
    background: var(--red); border-radius: 50%;
  }

  .alert-msg {
    font-size: 15px; font-weight: 600; color: #fff;
  }

  .alert-msg span { color: var(--green-accent); }

  .btn-view-orders {
    background: var(--green-accent);
    color: #1a1d23;
    border: none; border-radius: 10px;
    padding: 9px 20px; font-family: inherit;
    font-size: 13.5px; font-weight: 600;
    cursor: pointer; white-space: nowrap;
    display: flex; align-items: center; gap: 7px;
  }

  /* ─── GRID ROW ─── */
  .grid-row {
    display: grid;
    gap: 20px;
  }

  .grid-2-1 { grid-template-columns: 1.6fr 1fr; }
  .grid-3 { grid-template-columns: repeat(3, 1fr); }

  /* ─── CARD ─── */
  .card {
    background: var(--white);
    border-radius: var(--card-radius);
    padding: 22px;
    border: 1px solid var(--border);
  }

  .card-title {
    font-size: 13px; font-weight: 600; color: var(--muted);
    text-transform: uppercase; letter-spacing: 0.5px;
    margin-bottom: 10px;
  }

  /* ─── TOTAL SALES CARD ─── */
  .sales-card-header {
    display: flex; align-items: flex-start; justify-content: space-between;
  }

  .sales-main-amount {
    font-size: 28px; font-weight: 700; letter-spacing: -0.5px;
    display: flex; align-items: center; gap: 10px;
  }

  .badge-up {
    background: #dcfce7; color: #16a34a;
    font-size: 11px; font-weight: 600;
    padding: 2px 8px; border-radius: 20px;
  }

  .badge-down {
    background: #fee2e2; color: #dc2626;
    font-size: 11px; font-weight: 600;
    padding: 2px 8px; border-radius: 20px;
  }

  .sales-compare {
    font-size: 12px; color: var(--muted); margin-top: 4px;
  }

  .sales-year-select {
    border: 1px solid var(--border); background: var(--white);
    border-radius: 8px; padding: 5px 10px;
    font-family: inherit; font-size: 13px; color: var(--text);
    outline: none; cursor: pointer;
  }

  .sales-breakdown {
    margin-top: 16px; display: flex; flex-direction: column; gap: 10px;
  }

  .sales-row {
    display: flex; align-items: center; justify-content: space-between;
    font-size: 14px; color: var(--muted);
    border-bottom: 1px dashed var(--border); padding-bottom: 10px;
  }

  .sales-row:last-child { border-bottom: none; padding-bottom: 0; }

  .sales-row-label { display: flex; align-items: center; gap: 8px; }

  .sales-row-amount { font-weight: 600; color: var(--text); display: flex; align-items: center; gap: 7px; }

  /* ─── CHART ─── */
  .chart-area {
    margin-top: 18px;
    height: 130px;
    position: relative;
  }

  .chart-svg { width: 100%; height: 100%; }

  .chart-labels {
    display: flex; justify-content: space-between;
    font-size: 11px; color: var(--muted);
    margin-top: 6px; padding: 0 4px;
  }

  /* ─── TOTAL ASSETS CARD ─── */
  .assets-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-top: 4px;
  }

  .asset-item {
    border-radius: 12px;
    padding: 16px;
    display: flex; align-items: flex-start; justify-content: space-between;
  }

  .asset-item.green  { background: #e8f5f0; }
  .asset-item.purple { background: #f0edff; }
  .asset-item.gray   { background: #f0f2f5; }
  .asset-item.yellow { background: #fffbeb; }
  .asset-item.pink   { background: #fff0f3; }

  .asset-label { font-size: 13px; color: var(--muted); margin-bottom: 8px; font-weight: 500; }
  .asset-value { font-size: 22px; font-weight: 700; color: var(--text); }

  .asset-icon { font-size: 18px; opacity: 0.55; }
  .asset-item.green  .asset-icon { color: var(--green); }
  .asset-item.purple .asset-icon { color: #7c3aed; }
  .asset-item.gray   .asset-icon { color: #4b5563; }
  .asset-item.yellow .asset-icon { color: var(--yellow); }
  .asset-item.pink   .asset-icon { color: #e11d48; }

  /* ─── BOTTOM STAT CARDS ─── */
  .stat-card { display: flex; flex-direction: column; gap: 10px; }

  .stat-top { display: flex; align-items: flex-start; justify-content: space-between; }

  .stat-label { font-size: 12px; color: var(--muted); font-weight: 500; }

  .stat-amount { font-size: 24px; font-weight: 700; letter-spacing: -0.4px; margin-top: 4px; }

  .stat-change { display: flex; align-items: center; gap: 8px; font-size: 12px; color: var(--muted); margin-top: 2px; }

  .stat-chart { flex: 1; display: flex; align-items: flex-end; gap: 3px; }

  .bar {
    flex: 1; border-radius: 3px 3px 0 0;
    min-height: 6px;
    transition: opacity 0.2s;
  }

  .bar:hover { opacity: 0.7; }

  /* ─── MINI LINE CHART ─── */
  .mini-line { width: 100%; height: 50px; }

  /* ─── TOP PROJECTS SECTION ─── */
  .section-header {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 16px;
  }

  .section-title { font-size: 16px; font-weight: 700; }

  .section-link { font-size: 13px; color: var(--green); font-weight: 500; cursor: pointer; }

  .project-table { width: 100%; border-collapse: collapse; }

  .project-table th {
    font-size: 11px; color: var(--muted); font-weight: 600;
    text-align: left; padding: 8px 0; text-transform: uppercase;
    letter-spacing: 0.4px; border-bottom: 1px solid var(--border);
  }

  .project-table td {
    padding: 12px 0; font-size: 14px;
    border-bottom: 1px solid var(--border);
    vertical-align: middle;
  }

  .project-table tr:last-child td { border-bottom: none; }

  .proj-name { font-weight: 600; }
  .proj-sub  { font-size: 12px; color: var(--muted); }

  .status-badge {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 12px; font-weight: 600;
    padding: 3px 10px; border-radius: 20px;
  }

  .status-active   { background: #dcfce7; color: #16a34a; }
  .status-pending  { background: #fef9c3; color: #a16207; }
  .status-review   { background: #e0e7ff; color: #3730a3; }
  .status-closed   { background: #f1f5f9; color: #475569; }

  .progress-bar-wrap {
    width: 90px; height: 6px;
    background: var(--border); border-radius: 10px; overflow: hidden;
  }

  .progress-fill { height: 100%; border-radius: 10px; background: var(--green); }

  /* ─── ASSETS TABLE ─── */
  .assets-table-card { }

  .asset-row-item {
    display: flex; align-items: center; justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid var(--border);
  }

  .asset-row-item:last-child { border-bottom: none; }

  .asset-row-left { display: flex; align-items: center; gap: 12px; }

  .asset-thumb {
    width: 38px; height: 38px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 17px;
  }

  .asset-name { font-size: 14px; font-weight: 600; }
  .asset-type { font-size: 12px; color: var(--muted); }
  .asset-val  { font-size: 14px; font-weight: 700; }
  .asset-chg  { font-size: 12px; color: var(--muted); text-align: right; }

  /* scrollbar */
  ::-webkit-scrollbar { width: 5px; }
  ::-webkit-scrollbar-track { background: transparent; }
  ::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.15); border-radius: 10px; }
</style>
</head>
<body>

<!-- ════════════════ SIDEBAR ════════════════ -->
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="sidebar-logo-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="#1a7a5e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/>
      </svg>
    </div>
    AkademikApp
  </div>

  <div class="sidebar-section-label">Menu Utama</div>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-gauge"></i> Dashboard</a>
  <a class="sidebar-item active" href="#"><i class="fa-solid fa-user-graduate"></i> Data Mahasiswa</a>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-chalkboard-user"></i> Data Dosen</a>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-book-open"></i> Data Matkul</a>

  <div class="sidebar-section-label">Akademik</div>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-person-chalkboard"></i> Pengampu MK</a>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-calendar-days"></i> Jadwal Kuliah</a>

  <div class="sidebar-section-label">Akun</div>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-key"></i> Ganti Password</a>
  <a class="sidebar-item" href="#" style="margin-top:auto;color:rgba(255,180,180,0.85);">
    <i class="fa-solid fa-right-from-bracket"></i> Logout
  </a>
</aside>

<!-- ════════════════ MAIN ════════════════ -->
<div class="main">

  <!-- NAVBAR -->
  <nav class="navbar">
    <button class="nav-icon-btn"><i class="fa-solid fa-sidebar"></i></button>

    <div class="navbar-search">
      <i class="fa-solid fa-magnifying-glass" style="color:var(--muted);font-size:13px;"></i>
      <input type="text" placeholder="Search...">
    </div>

    <div class="navbar-right">
      <button class="nav-icon-btn"><i class="fa-regular fa-moon"></i></button>
      <button class="nav-icon-btn">
        <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect width="20" height="4.67" fill="#012169"/>
          <rect y="4.67" width="20" height="4.67" fill="#C8102E"/>
          <rect y="9.33" width="20" height="4.67" fill="#012169"/>
          <rect y="1.5" width="20" height="1.5" fill="#C8102E"/>
          <rect y="6" width="20" height="2" fill="#fff"/>
          <rect y="11" width="20" height="1.5" fill="#C8102E"/>
        </svg>
      </button>
      <button class="nav-icon-btn" style="position:relative;">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="nav-dot"></span>
      </button>
      <button class="nav-icon-btn" style="position:relative;">
        <i class="fa-regular fa-bell"></i>
        <span class="nav-dot" style="background:#f59e0b;"></span>
      </button>
      <button class="nav-icon-btn"><i class="fa-solid fa-gear"></i></button>
      <div class="nav-avatar">C</div>
    </div>
  </nav>

  <!-- CONTENT -->
  <main class="content">

    <!-- Page Header -->
    <div class="page-header">
      <div>
        <h1>Data Mahasiswa</h1>
        <p style="font-size:13px;color:var(--muted);margin-top:3px;">Manajemen data seluruh mahasiswa terdaftar</p>
      </div>
      <div class="page-header-right">
        <button class="btn-download" onclick="document.getElementById('modalTambah').style.display='flex'">
          <i class="fa-solid fa-plus"></i> Tambah Mahasiswa
        </button>
      </div>
    </div>

    <!-- Stat Cards -->
    <div class="grid-row grid-3" style="grid-template-columns:repeat(4,1fr);">

      <div class="card" style="display:flex;align-items:center;gap:16px;">
        <div style="width:48px;height:48px;border-radius:14px;background:#e8f5f0;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <i class="fa-solid fa-users" style="color:var(--green);font-size:20px;"></i>
        </div>
        <div>
          <div style="font-size:12px;color:var(--muted);font-weight:500;">Total Mahasiswa</div>
          <div style="font-size:26px;font-weight:700;letter-spacing:-0.5px;">1.248</div>
        </div>
      </div>

      <div class="card" style="display:flex;align-items:center;gap:16px;">
        <div style="width:48px;height:48px;border-radius:14px;background:#dcfce7;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <i class="fa-solid fa-user-check" style="color:#16a34a;font-size:20px;"></i>
        </div>
        <div>
          <div style="font-size:12px;color:var(--muted);font-weight:500;">Mahasiswa Aktif</div>
          <div style="font-size:26px;font-weight:700;letter-spacing:-0.5px;">1.102</div>
        </div>
      </div>

      <div class="card" style="display:flex;align-items:center;gap:16px;">
        <div style="width:48px;height:48px;border-radius:14px;background:#fef9c3;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <i class="fa-solid fa-user-clock" style="color:#a16207;font-size:20px;"></i>
        </div>
        <div>
          <div style="font-size:12px;color:var(--muted);font-weight:500;">Mahasiswa Cuti</div>
          <div style="font-size:26px;font-weight:700;letter-spacing:-0.5px;">86</div>
        </div>
      </div>

      <div class="card" style="display:flex;align-items:center;gap:16px;">
        <div style="width:48px;height:48px;border-radius:14px;background:#fee2e2;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <i class="fa-solid fa-user-xmark" style="color:#dc2626;font-size:20px;"></i>
        </div>
        <div>
          <div style="font-size:12px;color:var(--muted);font-weight:500;">Tidak Aktif / DO</div>
          <div style="font-size:26px;font-weight:700;letter-spacing:-0.5px;">60</div>
        </div>
      </div>

    </div>

    <!-- Table Card -->
    <div class="card" style="padding:0;overflow:hidden;">

      <!-- Table Toolbar -->
      <div style="display:flex;align-items:center;justify-content:space-between;padding:18px 22px;border-bottom:1px solid var(--border);flex-wrap:wrap;gap:12px;">
        <div style="font-size:16px;font-weight:700;">Daftar Mahasiswa</div>
        <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;">

          <!-- Search -->
          <div style="display:flex;align-items:center;gap:8px;background:var(--bg);border:1px solid var(--border);border-radius:9px;padding:0 12px;height:36px;">
            <i class="fa-solid fa-magnifying-glass" style="color:var(--muted);font-size:12px;"></i>
            <input type="text" placeholder="Cari mahasiswa..." style="border:none;background:transparent;font-family:inherit;font-size:13px;outline:none;width:180px;color:var(--text);">
          </div>

          <!-- Filter Prodi -->
          <select style="border:1px solid var(--border);background:var(--white);border-radius:9px;padding:0 12px;height:36px;font-family:inherit;font-size:13px;color:var(--text);outline:none;cursor:pointer;">
            <option value="">Semua Prodi</option>
            <option>Teknik Informatika</option>
            <option>Sistem Informasi</option>
            <option>Teknik Elektro</option>
            <option>Manajemen</option>
          </select>

          <!-- Filter Angkatan -->
          <select style="border:1px solid var(--border);background:var(--white);border-radius:9px;padding:0 12px;height:36px;font-family:inherit;font-size:13px;color:var(--text);outline:none;cursor:pointer;">
            <option value="">Semua Angkatan</option>
            <option>2026</option>
            <option>2025</option>
            <option>2024</option>
            <option>2023</option>
            <option>2022</option>
          </select>

          <!-- Export -->
          <button class="btn-download" style="height:36px;padding:0 14px;font-size:13px;">
            <i class="fa-solid fa-file-export"></i> Export
          </button>

        </div>
      </div>

      <!-- Table -->
      <div style="overflow-x:auto;">
        <table style="width:100%;border-collapse:collapse;">
          <thead>
            <tr style="background:#f9fafb;">
              <th style="padding:11px 22px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">No</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">NIM</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">Nama Mahasiswa</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">Program Studi</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">Angkatan</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">Semester</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">No. HP</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">Status</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:center;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $mahasiswa = [
                ['22101001','Andi Pratama','Teknik Informatika','2022','7','081234567890','Aktif'],
                ['22101002','Sari Dewi Lestari','Sistem Informasi','2022','7','081234567891','Aktif'],
                ['23101001','Budi Santoso','Teknik Informatika','2023','5','081234567892','Aktif'],
                ['23101002','Rina Fitriani','Manajemen','2023','5','081234567893','Cuti'],
                ['24101001','Doni Kurniawan','Teknik Elektro','2024','3','081234567894','Aktif'],
                ['24101002','Mega Wulandari','Sistem Informasi','2024','3','081234567895','Aktif'],
                ['25101001','Fajar Nugroho','Teknik Informatika','2025','1','081234567896','Aktif'],
                ['22101003','Hendra Setiawan','Manajemen','2022','7','081234567897','DO'],
                ['23101003','Indah Permata','Teknik Elektro','2023','5','081234567898','Aktif'],
                ['25101002','Lusi Rahayu','Sistem Informasi','2025','1','081234567899','Aktif'],
              ];

              $status_class = [
                'Aktif' => 'status-active',
                'Cuti'  => 'status-pending',
                'DO'    => 'status-closed',
              ];

              $initials_bg = ['#e8f5f0','#e0e7ff','#fef9c3','#fee2e2','#f0edff','#e0f2fe','#fce7f3','#f0fdf4','#fff7ed','#f1f5f9'];
              $initials_color = ['#1a7a5e','#3730a3','#a16207','#dc2626','#7c3aed','#0369a1','#be185d','#16a34a','#c2410c','#475569'];

              foreach($mahasiswa as $i => $m):
                $init = strtoupper(substr($m[1],0,1));
                $bg   = $initials_bg[$i % count($initials_bg)];
                $col  = $initials_color[$i % count($initials_color)];
            ?>
            <tr style="border-bottom:1px solid var(--border);transition:background 0.12s;" onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background=''">
              <td style="padding:13px 22px;font-size:13px;color:var(--muted);"><?= $i+1 ?></td>
              <td style="padding:13px 16px;">
                <span style="font-size:13px;font-weight:600;font-family:'DM Mono',monospace;color:var(--green);"><?= $m[0] ?></span>
              </td>
              <td style="padding:13px 16px;">
                <div style="display:flex;align-items:center;gap:10px;">
                  <div style="width:34px;height:34px;border-radius:50%;background:<?= $bg ?>;color:<?= $col ?>;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:13px;flex-shrink:0;"><?= $init ?></div>
                  <div>
                    <div style="font-size:14px;font-weight:600;"><?= $m[1] ?></div>
                    <div style="font-size:11px;color:var(--muted);"><?= strtolower(str_replace(' ','.', $m[1])) ?>@kampus.ac.id</div>
                  </div>
                </div>
              </td>
              <td style="padding:13px 16px;font-size:13px;"><?= $m[2] ?></td>
              <td style="padding:13px 16px;font-size:13px;font-weight:600;"><?= $m[3] ?></td>
              <td style="padding:13px 16px;">
                <span style="font-size:13px;font-weight:600;background:var(--green-light);color:var(--green);padding:2px 10px;border-radius:20px;">Sem <?= $m[4] ?></span>
              </td>
              <td style="padding:13px 16px;font-size:13px;color:var(--muted);"><?= $m[5] ?></td>
              <td style="padding:13px 16px;">
                <span class="status-badge <?= $status_class[$m[6]] ?? 'status-active' ?>"><?= $m[6] ?></span>
              </td>
              <td style="padding:13px 16px;">
                <div style="display:flex;align-items:center;justify-content:center;gap:6px;">
                  <button title="Detail" style="width:30px;height:30px;border:none;border-radius:8px;background:#e0e7ff;color:#3730a3;cursor:pointer;font-size:12px;display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                  <button title="Edit" style="width:30px;height:30px;border:none;border-radius:8px;background:#e8f5f0;color:var(--green);cursor:pointer;font-size:12px;display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa-pen"></i>
                  </button>
                  <button title="Hapus" style="width:30px;height:30px;border:none;border-radius:8px;background:#fee2e2;color:#dc2626;cursor:pointer;font-size:12px;display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div style="display:flex;align-items:center;justify-content:space-between;padding:14px 22px;border-top:1px solid var(--border);">
        <div style="font-size:13px;color:var(--muted);">Menampilkan <strong>1–10</strong> dari <strong>1.248</strong> mahasiswa</div>
        <div style="display:flex;gap:6px;">
          <?php foreach(['‹','1','2','3','...','125','›'] as $p): ?>
          <button style="min-width:32px;height:32px;border:1px solid <?= $p==='1' ? 'var(--green)' : 'var(--border)' ?>;background:<?= $p==='1' ? 'var(--green)' : 'var(--white)' ?>;color:<?= $p==='1' ? '#fff' : 'var(--text)' ?>;border-radius:8px;font-family:inherit;font-size:13px;font-weight:<?= $p==='1' ? '600' : '400' ?>;cursor:pointer;padding:0 8px;">
            <?= $p ?>
          </button>
          <?php endforeach; ?>
        </div>
      </div>

    </div><!-- /table card -->

  </main>

  <!-- ══ MODAL TAMBAH MAHASISWA ══ -->
  <div id="modalTambah" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.4);z-index:999;align-items:center;justify-content:center;padding:20px;">
    <div style="background:#fff;border-radius:20px;width:100%;max-width:600px;max-height:90vh;overflow-y:auto;box-shadow:0 20px 60px rgba(0,0,0,0.15);">

      <div style="display:flex;align-items:center;justify-content:space-between;padding:22px 24px;border-bottom:1px solid var(--border);">
        <div style="font-size:17px;font-weight:700;">Tambah Mahasiswa Baru</div>
        <button onclick="document.getElementById('modalTambah').style.display='none'" style="width:32px;height:32px;border:none;background:var(--bg);border-radius:50%;cursor:pointer;font-size:15px;color:var(--muted);">✕</button>
      </div>

      <div style="padding:24px;display:grid;grid-template-columns:1fr 1fr;gap:16px;">

        <?php
          $fields = [
            ['NIM','nim','text','22101001','full'],
            ['Nama Lengkap','nama','text','contoh: Budi Santoso','full'],
            ['Jenis Kelamin','jk','select',''],
            ['Tempat Lahir','tmpat_lahir','text','contoh: Pekanbaru'],
            ['Tanggal Lahir','tgl_lahir','date',''],
            ['Angkatan','angkatan','number','2025'],
            ['Semester','semester','number','1'],
            ['Program Studi','prodi','select',''],
            ['No. HP','no_hp','text','08xxxxxxxxxx'],
            ['Email','email','email','contoh@kampus.ac.id'],
            ['Alamat','alamat','text','Alamat lengkap','full'],
            ['Status','status','select',''],
          ];
          foreach($fields as $f):
            $isFullWidth = isset($f[4]) && $f[4]==='full';
        ?>
        <div style="<?= $isFullWidth ? 'grid-column:1/-1;' : '' ?>display:flex;flex-direction:column;gap:6px;">
          <label style="font-size:12px;font-weight:600;color:var(--muted);text-transform:uppercase;letter-spacing:0.4px;"><?= $f[0] ?></label>
          <?php if($f[2]==='select'): ?>
          <select name="<?= $f[1] ?>" style="border:1px solid var(--border);border-radius:10px;padding:9px 12px;font-family:inherit;font-size:14px;color:var(--text);outline:none;background:#fff;">
            <?php if($f[1]==='jk'): ?>
              <option value="">-- Pilih --</option>
              <option>Laki-laki</option>
              <option>Perempuan</option>
            <?php elseif($f[1]==='prodi'): ?>
              <option value="">-- Pilih Prodi --</option>
              <option>Teknik Informatika</option>
              <option>Sistem Informasi</option>
              <option>Teknik Elektro</option>
              <option>Manajemen</option>
            <?php elseif($f[1]==='status'): ?>
              <option>Aktif</option>
              <option>Cuti</option>
              <option>DO</option>
            <?php endif; ?>
          </select>
          <?php else: ?>
          <input type="<?= $f[2] ?>" name="<?= $f[1] ?>" placeholder="<?= $f[3] ?? '' ?>"
            style="border:1px solid var(--border);border-radius:10px;padding:9px 12px;font-family:inherit;font-size:14px;color:var(--text);outline:none;"
            onfocus="this.style.borderColor='var(--green)'" onblur="this.style.borderColor='var(--border)'">
          <?php endif; ?>
        </div>
        <?php endforeach; ?>

      </div>

      <div style="display:flex;gap:10px;justify-content:flex-end;padding:16px 24px;border-top:1px solid var(--border);">
        <button onclick="document.getElementById('modalTambah').style.display='none'"
          style="padding:9px 22px;border:1px solid var(--border);border-radius:10px;background:#fff;font-family:inherit;font-size:14px;font-weight:500;cursor:pointer;color:var(--muted);">
          Batal
        </button>
        <button class="btn-download" style="padding:9px 22px;">
          <i class="fa-solid fa-save"></i> Simpan Data
        </button>
      </div>

    </div>
  </div>
</div><!-- /.main -->

<!-- Floating gear -->
<button style="position:fixed;bottom:24px;right:24px;width:44px;height:44px;border-radius:50%;
  background:var(--green);color:#fff;border:none;font-size:17px;cursor:pointer;
  display:flex;align-items:center;justify-content:center;box-shadow:0 4px 16px rgba(26,122,94,0.35);z-index:999;">
  <i class="fa-solid fa-gear"></i>
</button>

</body>
</html>