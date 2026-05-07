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
    --sidebar-bg: #ffffff;
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
    color: #000000;
    font-weight: 700;
    font-size: 17px;
    letter-spacing: -0.3px;
  }

  .sidebar-logo-icon {
    width: 32px; height: 32px;
    background: #000000;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
  }

  .sidebar-logo-icon svg { width: 18px; height: 18px; }

  .sidebar-section-label {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: rgba(0, 0, 0, 0.5);
    padding: 14px 18px 6px;
  }

  .sidebar-item {
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 9px 18px;
    color: rgba(0, 0, 0, 0.75);
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
        <circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/>
      </svg>
    </div>
    NiceDash
  </div>

  <div class="sidebar-section-label">Dashboards</div>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-chart-bar"></i> Analytics</a>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-cart-shopping"></i> eCommerce</a>
  <a class="sidebar-item active" href="#"><i class="fa-solid fa-layer-group"></i> Modern</a>
  <a class="sidebar-item" href="#"><i class="fa-regular fa-file"></i> Front Pages <i class="fa-solid fa-chevron-right chevron"></i></a>

  <div class="sidebar-section-label">Apps</div>
  <a class="sidebar-item" href="#"><i class="fa-regular fa-comment-dots"></i> Chat</a>
  <a class="sidebar-item" href="#"><i class="fa-regular fa-calendar"></i> Calendar</a>
  <a class="sidebar-item" href="#"><i class="fa-regular fa-envelope"></i> Email</a>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-table-columns"></i> Kanban</a>
  <a class="sidebar-item" href="#"><i class="fa-regular fa-user-circle"></i> User Profile <span class="badge">New</span> <i class="fa-solid fa-chevron-right chevron"></i></a>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-bag-shopping"></i> Ecommerce <span class="badge">New</span> <i class="fa-solid fa-chevron-right chevron"></i></a>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-address-book"></i> Contacts</a>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-graduation-cap"></i> Courses</a>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-users"></i> Employee</a>
  <a class="sidebar-item" href="#"><i class="fa-regular fa-note-sticky"></i> Notes</a>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-ticket"></i> Tickets</a>
  <a class="sidebar-item" href="#"><i class="fa-brands fa-whatsapp"></i> ContactsApp</a>
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

    <!-- Page header -->
    <div class="page-header">
      <h1>Good Morning Cameron ☀️</h1>
      <div class="page-header-right">
        <button class="nav-icon-btn"><i class="fa-solid fa-rotate"></i></button>
        <select class="year-select">
          <option>2026</option>
          <option>2025</option>
        </select>
        <button class="btn-download"><i class="fa-solid fa-download"></i> Download</button>
      </div>
    </div>

    <!-- Alert banner -->
    <div class="alert-banner">
      <div class="alert-banner-left">
        <div class="alert-tag">
          <span class="alert-dot"></span>
          Update &bull; Nov 25th, 2024
        </div>
        <div class="alert-msg">Sales revenue increased <span>40%</span> in 1 week</div>
      </div>
      <button class="btn-view-orders">View all orders <i class="fa-solid fa-arrow-right"></i></button>
    </div>

    <!-- Row 1: Total Sales + Total Assets -->
    <div class="grid-row grid-2-1">

      <!-- Total Sales -->
      <div class="card">
        <div class="sales-card-header">
          <div>
            <div class="card-title">Total Sales</div>
            <div class="sales-main-amount">
              $12,450.00
              <span class="badge-up">+22%</span>
              <span style="font-size:13px;color:var(--muted);font-weight:400;">compared to last year</span>
            </div>
          </div>
          <select class="sales-year-select"><option>2026</option><option>2025</option></select>
        </div>

        <div class="sales-breakdown">
          <div class="sales-row">
            <div class="sales-row-label">
              <i class="fa-solid fa-globe" style="color:var(--green);font-size:13px;"></i>
              Online store
            </div>
            <div class="sales-row-amount">$8,750.00 <span class="badge-up">+10%</span></div>
          </div>
          <div class="sales-row">
            <div class="sales-row-label">
              <i class="fa-solid fa-store" style="color:var(--muted);font-size:13px;"></i>
              Offline store
            </div>
            <div class="sales-row-amount">$3,700.00 <span class="badge-down">-5%</span></div>
          </div>
        </div>

        <!-- SVG Area Chart -->
        <div class="chart-area">
          <svg class="chart-svg" viewBox="0 0 600 120" preserveAspectRatio="none">
            <defs>
              <linearGradient id="chartGrad" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#1a7a5e" stop-opacity="0.25"/>
                <stop offset="100%" stop-color="#1a7a5e" stop-opacity="0.02"/>
              </linearGradient>
            </defs>
            <!-- bars background -->
            <rect x="10"  y="30" width="70" height="80" rx="5" fill="#e8f5f0"/>
            <rect x="100" y="20" width="70" height="90" rx="5" fill="#e8f5f0"/>
            <rect x="190" y="35" width="70" height="75" rx="5" fill="#e8f5f0"/>
            <rect x="280" y="25" width="70" height="85" rx="5" fill="#e8f5f0"/>
            <rect x="370" y="40" width="70" height="70" rx="5" fill="#e8f5f0"/>
            <rect x="460" y="50" width="70" height="60" rx="5" fill="#e8f5f0"/>
            <!-- line -->
            <path d="M45,35 C90,28 135,22 185,38 C235,54 280,30 325,32 C370,34 415,45 460,55 C505,65 545,60 580,52"
                  stroke="#1a7a5e" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
            <!-- area fill -->
            <path d="M45,35 C90,28 135,22 185,38 C235,54 280,30 325,32 C370,34 415,45 460,55 C505,65 545,60 580,52 L580,110 L45,110 Z"
                  fill="url(#chartGrad)"/>
          </svg>
          <div class="chart-labels">
            <span></span><span>Jun</span><span></span><span>Jul</span>
          </div>
        </div>
      </div>

      <!-- Total Assets -->
      <div class="card">
        <div class="card-title">Total Assets</div>
        <div class="assets-grid">
          <div class="asset-item green">
            <div>
              <div class="asset-label">Employees</div>
              <div class="asset-value">96</div>
            </div>
            <i class="fa-solid fa-user-group asset-icon"></i>
          </div>
          <div class="asset-item purple">
            <div>
              <div class="asset-label">Projects</div>
              <div class="asset-value">356</div>
            </div>
            <i class="fa-solid fa-folder asset-icon"></i>
          </div>
          <div class="asset-item gray">
            <div>
              <div class="asset-label">Clients</div>
              <div class="asset-value">3,650</div>
            </div>
            <i class="fa-solid fa-briefcase asset-icon"></i>
          </div>
          <div class="asset-item yellow">
            <div>
              <div class="asset-label">Payroll</div>
              <div class="asset-value">356</div>
            </div>
            <i class="fa-solid fa-dollar-sign asset-icon"></i>
          </div>
          <div class="asset-item pink" style="grid-column: 2;">
            <div>
              <div class="asset-label">Events</div>
              <div class="asset-value">356</div>
            </div>
            <i class="fa-regular fa-bookmark asset-icon"></i>
          </div>
        </div>
      </div>

    </div><!-- /grid-row -->

    <!-- Row 2: Three stat cards -->
    <div class="grid-row grid-3">

      <!-- Total Sales stat -->
      <div class="card stat-card">
        <div class="stat-label">Total Sales</div>
        <div class="stat-amount">$45,320.75</div>
        <div class="stat-change">
          <span style="color:#16a34a;font-weight:600;">+$1,470</span>
          <span class="badge-up">+18%</span>
        </div>
        <div class="stat-chart" style="margin-top:14px;">
          <?php
            $bars = [45,60,40,75,55,80,65,90,70,85,60,75,50,88,72];
            $max = max($bars);
            $colors = ['#1a7a5e','#155f49','#1a7a5e','#0f4a38','#1a7a5e'];
            foreach($bars as $i => $h):
              $pct = round($h/$max*100);
              $col = $colors[$i % count($colors)];
          ?>
          <div class="bar" style="height:<?= $pct ?>%;background:<?= $col ?>;"></div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Total Profit -->
      <div class="card stat-card">
        <div class="stat-label">Total Profit</div>
        <div class="stat-amount">$18,260.50</div>
        <div class="stat-change">
          <span style="color:var(--red);font-weight:600;">-$680</span>
          <span class="badge-up">+14%</span>
        </div>
        <div class="stat-chart" style="margin-top:14px;">
          <?php
            $bars2 = [30,55,42,80,60,90,70,50,85,65,78,55,88,70,95];
            $max2 = max($bars2);
            foreach($bars2 as $h2):
              $pct2 = round($h2/$max2*100);
          ?>
          <div class="bar" style="height:<?= $pct2 ?>%;background:#4ade80;"></div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Advertising Costs -->
      <div class="card stat-card">
        <div class="stat-label">Advertising costs</div>
        <div class="stat-amount">$45,320.75</div>
        <div class="stat-change">
          <span style="color:#16a34a;font-weight:600;">+$1,470</span>
          <span class="badge-up">+18%</span>
        </div>
        <div style="margin-top:14px;">
          <svg class="mini-line" viewBox="0 0 200 50" preserveAspectRatio="none">
            <path d="M0,35 C20,20 40,40 60,25 C80,10 100,35 120,28 C140,21 160,38 180,20 C190,14 196,18 200,15"
                  stroke="#ef4444" stroke-width="2" fill="none" stroke-linecap="round"/>
          </svg>
        </div>
      </div>

    </div><!-- /grid-row -->

    <!-- Row 3: Top Projects + Total Assets table -->
    <div class="grid-row grid-2-1">

      <!-- Top Projects -->
      <div class="card">
        <div class="section-header">
          <div class="section-title">Top Projects</div>
          <a class="section-link">View all →</a>
        </div>
        <table class="project-table">
          <thead>
            <tr>
              <th>Project Name</th>
              <th>Status</th>
              <th>Budget</th>
              <th>Progress</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $projects = [
                ['Alpha Dashboard','active','$12,400','82'],
                ['Mobile App v3','pending','$8,200','45'],
                ['CRM Rebuild','review','$22,000','67'],
                ['Landing Page','active','$4,500','91'],
                ['API Integration','closed','$6,800','100'],
              ];
              $statuses = ['active'=>'status-active','pending'=>'status-pending','review'=>'status-review','closed'=>'status-closed'];
              foreach($projects as $p):
            ?>
            <tr>
              <td>
                <div class="proj-name"><?= $p[0] ?></div>
                <div class="proj-sub">Updated 2d ago</div>
              </td>
              <td>
                <span class="status-badge <?= $statuses[$p[1]] ?>">
                  <?= ucfirst($p[1]) ?>
                </span>
              </td>
              <td style="font-weight:600;"><?= $p[2] ?></td>
              <td>
                <div style="display:flex;align-items:center;gap:8px;">
                  <div class="progress-bar-wrap">
                    <div class="progress-fill" style="width:<?= $p[3] ?>%;"></div>
                  </div>
                  <span style="font-size:12px;color:var(--muted);"><?= $p[3] ?>%</span>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Total Assets (right col) -->
      <div class="card assets-table-card">
        <div class="section-header">
          <div class="section-title">Total Assets</div>
          <a class="section-link">See all →</a>
        </div>
        <?php
          $assets = [
            ['💰','Cash','Liquid','$24,000','+5%','#dcfce7','#16a34a'],
            ['🏢','Real Estate','Property','$180,000','+2%','#e0e7ff','#3730a3'],
            ['📊','Stocks','Equity','$45,000','+18%','#fef9c3','#a16207'],
            ['🪙','Crypto','Digital','$8,200','-3%','#fee2e2','#dc2626'],
            ['🚗','Vehicles','Fixed','$32,000','+0%','#f1f5f9','#475569'],
          ];
          foreach($assets as $a):
        ?>
        <div class="asset-row-item">
          <div class="asset-row-left">
            <div class="asset-thumb" style="background:<?= $a[5] ?>20;"><?= $a[0] ?></div>
            <div>
              <div class="asset-name"><?= $a[1] ?></div>
              <div class="asset-type"><?= $a[2] ?></div>
            </div>
          </div>
          <div style="text-align:right;">
            <div class="asset-val"><?= $a[3] ?></div>
            <div class="asset-chg" style="color:<?= $a[6] ?>;font-weight:600;"><?= $a[4] ?></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div><!-- /grid-row -->

  </main>
</div><!-- /.main -->

<!-- Floating gear -->
<button style="position:fixed;bottom:24px;right:24px;width:44px;height:44px;border-radius:50%;
  background:var(--green);color:#fff;border:none;font-size:17px;cursor:pointer;
  display:flex;align-items:center;justify-content:center;box-shadow:0 4px 16px rgba(26,122,94,0.35);z-index:999;">
  <i class="fa-solid fa-gear"></i>
</button>

</body>
</html>