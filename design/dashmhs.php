<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Mahasiswa — AkademikApp</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Segoe UI',sans-serif;background:#f4f6f8;display:flex;height:100vh;overflow:hidden}
.sidebar{width:168px;min-width:168px;background:#1a7a5e;display:flex;flex-direction:column;height:100vh;padding-bottom:12px}
.logo{padding:16px 14px 14px;display:flex;align-items:center;gap:8px;border-bottom:1px solid rgba(255,255,255,0.15)}
.logo-icon{width:28px;height:28px;border-radius:8px;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center}
.logo-icon i{color:#fff;font-size:15px}
.logo-text{font-size:13px;font-weight:700;color:#fff}
.role-badge{margin:10px 10px 0;background:rgba(255,255,255,0.15);border-radius:8px;padding:8px 10px;display:flex;align-items:center;gap:8px}
.role-badge i{font-size:16px;color:rgba(255,255,255,0.8)}
.role-name{font-size:12px;font-weight:600;color:#fff}
.role-sub{font-size:10px;color:rgba(255,255,255,0.6)}
.sec-label{padding:14px 12px 4px;font-size:10px;font-weight:700;color:rgba(255,255,255,0.5);letter-spacing:.08em;text-transform:uppercase}
.nav-item{display:flex;align-items:center;gap:8px;padding:9px 12px;margin:1px 6px;border-radius:8px;cursor:pointer;color:rgba(255,255,255,0.75);font-size:12.5px;transition:background .15s;text-decoration:none}
.nav-item:hover{background:rgba(255,255,255,0.12);color:#fff}
.nav-item.active{background:rgba(255,255,255,0.2);color:#fff;font-weight:600}
.nav-item i{font-size:16px;opacity:.85}
.nav-item.active i{opacity:1}
.nav-bottom{margin-top:auto;border-top:1px solid rgba(255,255,255,0.15);padding:10px 6px 0}
.right-wrap{flex:1;display:flex;flex-direction:column;overflow:hidden}
.topnav{background:#fff;border-bottom:1px solid #e8e8e8;padding:10px 24px;display:flex;align-items:center;justify-content:space-between}
.search-wrap{display:flex;align-items:center;gap:8px;background:#f4f6f8;border:1px solid #e0e0e0;border-radius:8px;padding:7px 14px;width:260px}
.search-wrap input{border:none;background:transparent;font-size:13px;color:#333;outline:none;width:100%}
.search-wrap i{font-size:15px;color:#bbb}
.topnav-right{display:flex;align-items:center;gap:10px}
.tnav-btn{width:32px;height:32px;border-radius:8px;background:#f4f6f8;border:1px solid #e8e8e8;display:flex;align-items:center;justify-content:center;cursor:pointer;position:relative}
.tnav-btn i{font-size:16px;color:#666}
.notif-dot{position:absolute;top:5px;right:5px;width:7px;height:7px;background:#e24b4a;border-radius:50%;border:1.5px solid #fff}
.avatar-top{width:32px;height:32px;border-radius:50%;background:#1a7a5e;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#fff;cursor:pointer}
.main{flex:1;overflow-y:auto;background:#f4f6f8;padding:24px 28px}
.page-head{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:22px}
.page-title{font-size:20px;font-weight:700;color:#1a1a1a}
.page-sub{font-size:13px;color:#888;margin-top:3px}
.greeting-badge{display:flex;align-items:center;gap:8px;background:#fff;border:1px solid #ececec;border-radius:10px;padding:10px 16px}
.greeting-badge i{font-size:20px;color:#1a7a5e}
.g-name{font-size:13px;font-weight:600;color:#1a1a1a}
.g-sub{font-size:11px;color:#888}
.stats-row{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:22px}
.stat-card{background:#fff;border-radius:12px;padding:16px 18px;border:1px solid #ececec;display:flex;align-items:center;gap:14px}
.stat-icon{width:44px;height:44px;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.si-green{background:#e8f5f0}.si-green i{color:#1a7a5e}
.si-blue{background:#e6f1fb}.si-blue i{color:#185FA5}
.si-amber{background:#faeeda}.si-amber i{color:#854F0B}
.si-purple{background:#EEEDFE}.si-purple i{color:#3C3489}
.stat-icon i{font-size:22px}
.stat-label{font-size:12px;color:#888;margin-bottom:4px}
.stat-val{font-size:22px;font-weight:700;color:#1a1a1a}
.row2{display:grid;grid-template-columns:1fr 1.8fr;gap:16px;margin-bottom:18px}
.card{background:#fff;border-radius:12px;border:1px solid #ececec;overflow:hidden}
.card-header{display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid #f0f0f0}
.card-title{font-size:14px;font-weight:700;color:#1a1a1a}
.card-link{font-size:12px;color:#1a7a5e;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:4px;text-decoration:none}
.profil-card{background:#fff;border-radius:12px;border:1px solid #ececec;padding:20px;display:flex;flex-direction:column;align-items:center;gap:10px}
.profil-avatar{width:64px;height:64px;border-radius:50%;background:#1a7a5e;display:flex;align-items:center;justify-content:center;font-size:22px;font-weight:700;color:#fff}
.profil-name{font-size:15px;font-weight:700;color:#1a1a1a;text-align:center}
.profil-nim{font-size:12px;color:#888}
.profil-prodi{font-size:12px;font-weight:600;color:#1a7a5e;background:#e8f5f0;padding:3px 12px;border-radius:20px}
.profil-row{width:100%;display:flex;flex-direction:column;gap:8px;margin-top:6px}
.profil-field{display:flex;align-items:center;gap:8px;font-size:12px;color:#555}
.profil-field i{font-size:15px;color:#1a7a5e}
.btn-profil{width:100%;margin-top:4px;padding:9px;border-radius:8px;border:1.5px solid #1a7a5e;background:#fff;color:#1a7a5e;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:6px;text-decoration:none}
.btn-profil:hover{background:#e8f5f0}
.jadwal-item{display:flex;align-items:center;gap:12px;padding:12px 18px;border-bottom:1px solid #f5f5f3}
.jadwal-item:last-child{border-bottom:none}
.jadwal-item:hover{background:#fafafa}
.jadwal-hari{width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.jh-b{background:#e6f1fb}.jh-b i{color:#185FA5;font-size:18px}
.jh-g{background:#e8f5f0}.jh-g i{color:#1a7a5e;font-size:18px}
.jh-p{background:#EEEDFE}.jh-p i{color:#3C3489;font-size:18px}
.jadwal-info{flex:1}
.j-matkul{font-size:13px;font-weight:600;color:#1a1a1a}
.j-detail{font-size:11px;color:#888;margin-top:2px}
.j-time{font-size:12px;font-weight:600;color:#555;white-space:nowrap}
.j-room{font-size:11px;color:#888;text-align:right;margin-top:2px}
.row3{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.notif-item{display:flex;align-items:flex-start;gap:10px;padding:12px 18px;border-bottom:1px solid #f5f5f3}
.notif-item:last-child{border-bottom:none}
.notif-item:hover{background:#fafafa}
.notif-icon{width:34px;height:34px;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px}
.ni-green{background:#e8f5f0}.ni-green i{color:#1a7a5e;font-size:16px}
.ni-blue{background:#e6f1fb}.ni-blue i{color:#185FA5;font-size:16px}
.ni-amber{background:#faeeda}.ni-amber i{color:#854F0B;font-size:16px}
.notif-text{flex:1}
.n-title{font-size:13px;font-weight:600;color:#1a1a1a}
.n-sub{font-size:11px;color:#888;margin-top:2px}
.n-time{font-size:10px;color:#bbb;margin-top:4px}
.unread-dot{width:7px;height:7px;background:#1a7a5e;border-radius:50%;margin-top:6px;flex-shrink:0}
.nilai-item{display:flex;align-items:center;gap:12px;padding:12px 18px;border-bottom:1px solid #f5f5f3}
.nilai-item:last-child{border-bottom:none}
.nilai-item:hover{background:#fafafa}
.nilai-ico{width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.nilai-info{flex:1}
.n-mk{font-size:13px;font-weight:600;color:#1a1a1a}
.n-dosen{font-size:11px;color:#888;margin-top:2px}
.n-grade{font-size:20px;font-weight:700}
.pill{display:inline-flex;align-items:center;font-size:10px;padding:2px 7px;border-radius:20px;font-weight:600}
.pill-a{background:#e8f5f0;color:#0F6E56}
.pill-b{background:#e6f1fb;color:#185FA5}
.pill-warn{background:#faeeda;color:#854F0B}
::-webkit-scrollbar{width:5px}::-webkit-scrollbar-track{background:transparent}::-webkit-scrollbar-thumb{background:#d0d0d0;border-radius:10px}
</style>
</head>
<body>
<aside class="sidebar">
  <div class="logo">
    <div class="logo-icon"><i class="ti ti-school"></i></div>
    <span class="logo-text">AkademikApp</span>
  </div>
  <div class="role-badge">
    <i class="ti ti-user-student"></i>
    <div><div class="role-name">Mahasiswa</div><div class="role-sub">Reza Firmansyah</div></div>
  </div>
  <div class="sec-label">Menu</div>
  <a href="dashboard.html" class="nav-item active"><i class="ti ti-layout-dashboard"></i> Dashboard</a>
  <a href="jadwal.html" class="nav-item"><i class="ti ti-calendar-week"></i> Jadwal Kuliah</a>
  <a href="nilai.html" class="nav-item"><i class="ti ti-file-certificate"></i> Nilai &amp; Transkrip</a>
  <a href="krs.html" class="nav-item"><i class="ti ti-notes"></i> KRS</a>
  <a href="absensi.html" class="nav-item"><i class="ti ti-clipboard-list"></i> Absensi</a>
  <a href="tagihan.html" class="nav-item"><i class="ti ti-receipt"></i> Tagihan &amp; Pembayaran</a>
  <div class="sec-label">Akun</div>
  <div class="nav-bottom">
    <a href="profil.html" class="nav-item"><i class="ti ti-user-circle"></i> Profil Saya</a>
    <a href="ganti-password.html" class="nav-item"><i class="ti ti-lock"></i> Ganti Password</a>
    <a href="login.html" class="nav-item" style="color:rgba(255,255,255,0.6)"><i class="ti ti-logout"></i> Logout</a>
  </div>
</aside>

<div class="right-wrap">
  <div class="topnav">
    <div class="search-wrap"><i class="ti ti-search"></i><input type="text" placeholder="Cari matakuliah, jadwal..."></div>
    <div class="topnav-right">
      <div class="tnav-btn"><i class="ti ti-moon"></i></div>
      <div class="tnav-btn"><i class="ti ti-bell"></i><span class="notif-dot"></span></div>
      <div class="tnav-btn"><i class="ti ti-settings"></i></div>
      <div class="avatar-top">RF</div>
    </div>
  </div>
  <main class="main">
    <div class="page-head">
      <div>
        <div class="page-title">Selamat Datang, Reza 👋</div>
        <div class="page-sub">Semester Ganjil 2024/2025 — Teknik Informatika</div>
      </div>
      <div class="greeting-badge">
        <i class="ti ti-calendar-event"></i>
        <div><div class="g-name">Senin, 8 Mei 2026</div><div class="g-sub">3 jadwal kuliah hari ini</div></div>
      </div>
    </div>

    <div class="stats-row">
      <div class="stat-card"><div class="stat-icon si-green"><i class="ti ti-books"></i></div><div><div class="stat-label">SKS Diambil</div><div class="stat-val">20</div></div></div>
      <div class="stat-card"><div class="stat-icon si-blue"><i class="ti ti-chart-line"></i></div><div><div class="stat-label">IPK Saat Ini</div><div class="stat-val">3.72</div></div></div>
      <div class="stat-card"><div class="stat-icon si-amber"><i class="ti ti-alert-triangle"></i></div><div><div class="stat-label">Tagihan Aktif</div><div class="stat-val">1</div></div></div>
      <div class="stat-card"><div class="stat-icon si-purple"><i class="ti ti-percentage"></i></div><div><div class="stat-label">Kehadiran</div><div class="stat-val">91%</div></div></div>
    </div>

    <div class="row2" style="margin-bottom:18px">
      <div class="profil-card">
        <div class="profil-avatar">RF</div>
        <div class="profil-name">Reza Firmansyah</div>
        <div class="profil-nim">NIM 22101088</div>
        <div class="profil-prodi">Teknik Informatika</div>
        <div class="profil-row">
          <div class="profil-field"><i class="ti ti-mail"></i> reza@kampus.ac.id</div>
          <div class="profil-field"><i class="ti ti-calendar"></i> Angkatan 2022</div>
          <div class="profil-field"><i class="ti ti-user-check"></i> PA: Dr. Budi Santoso</div>
        </div>
        <a href="profil.html" class="btn-profil"><i class="ti ti-edit"></i> Edit Profil</a>
      </div>
      <div class="card">
        <div class="card-header">
          <span class="card-title">Jadwal Kuliah Hari Ini</span>
          <a href="jadwal.html" class="card-link">Lihat Semua <i class="ti ti-arrow-right" style="font-size:12px"></i></a>
        </div>
        <div class="jadwal-item">
          <div class="jadwal-hari jh-b"><i class="ti ti-math-function"></i></div>
          <div class="jadwal-info"><div class="j-matkul">Kalkulus II</div><div class="j-detail">Dr. Rina Kusuma · Sem 2 · TI</div></div>
          <div style="text-align:right"><div class="j-time">07.30 – 10.00</div><div class="j-room">Gd B – R.201</div></div>
        </div>
        <div class="jadwal-item">
          <div class="jadwal-hari jh-g"><i class="ti ti-code"></i></div>
          <div class="jadwal-info"><div class="j-matkul">Algoritma &amp; Pemrograman</div><div class="j-detail">Dr. Budi Santoso · Sem 1 · TI</div></div>
          <div style="text-align:right"><div class="j-time">10.00 – 12.30</div><div class="j-room">Lab A-101</div></div>
        </div>
        <div class="jadwal-item">
          <div class="jadwal-hari jh-p"><i class="ti ti-network"></i></div>
          <div class="jadwal-info"><div class="j-matkul">Jaringan Komputer</div><div class="j-detail">Dr. Hendra Wijaya · Sem 3 · TI</div></div>
          <div style="text-align:right"><div class="j-time">13.00 – 15.30</div><div class="j-room">Lab A-104</div></div>
        </div>
      </div>
    </div>

    <div class="row3">
      <div class="card">
        <div class="card-header"><span class="card-title">Nilai Terbaru</span><a href="nilai.html" class="card-link">Lihat Semua <i class="ti ti-arrow-right" style="font-size:12px"></i></a></div>
        <div class="nilai-item">
          <div class="nilai-ico si-green"><i class="ti ti-star" style="font-size:18px;color:#1a7a5e"></i></div>
          <div class="nilai-info"><div class="n-mk">Algoritma &amp; Pemrograman</div><div class="n-dosen">Dr. Budi Santoso · Sem 1</div></div>
          <div style="text-align:right"><div class="n-grade" style="color:#1a7a5e">A</div><span class="pill pill-a">4.00</span></div>
        </div>
        <div class="nilai-item">
          <div class="nilai-ico si-blue"><i class="ti ti-star-half" style="font-size:18px;color:#185FA5"></i></div>
          <div class="nilai-info"><div class="n-mk">Kalkulus I</div><div class="n-dosen">Dr. Rina Kusuma · Sem 1</div></div>
          <div style="text-align:right"><div class="n-grade" style="color:#185FA5">B+</div><span class="pill pill-b">3.50</span></div>
        </div>
        <div class="nilai-item">
          <div class="nilai-ico si-amber"><i class="ti ti-clock" style="font-size:18px;color:#854F0B"></i></div>
          <div class="nilai-info"><div class="n-mk">Basis Data</div><div class="n-dosen">Dr. Hendra Wijaya · Sem 2</div></div>
          <div style="text-align:right"><div style="font-size:12px;color:#888;margin-bottom:4px">Proses</div><span class="pill pill-warn">Belum</span></div>
        </div>
      </div>
      <div class="card">
        <div class="card-header"><span class="card-title">Notifikasi</span><span class="card-link">Tandai Baca</span></div>
        <div class="notif-item">
          <div class="notif-icon ni-amber"><i class="ti ti-alert-circle"></i></div>
          <div class="notif-text"><div class="n-title">Batas Pembayaran UKT</div><div class="n-sub">Jatuh tempo 15 Mei 2026 — segera bayar</div><div class="n-time">2 jam yang lalu</div></div>
          <div class="unread-dot"></div>
        </div>
        <div class="notif-item">
          <div class="notif-icon ni-blue"><i class="ti ti-file-check"></i></div>
          <div class="notif-text"><div class="n-title">KRS Disetujui</div><div class="n-sub">KRS Semester Ganjil 24/25 dikonfirmasi</div><div class="n-time">1 hari yang lalu</div></div>
          <div class="unread-dot"></div>
        </div>
        <div class="notif-item">
          <div class="notif-icon ni-green"><i class="ti ti-check"></i></div>
          <div class="notif-text"><div class="n-title">Nilai Masuk</div><div class="n-sub">Algoritma &amp; Pemrograman — nilai A</div><div class="n-time">2 hari yang lalu</div></div>
        </div>
        <div class="notif-item">
          <div class="notif-icon ni-amber"><i class="ti ti-calendar-x"></i></div>
          <div class="notif-text"><div class="n-title">Kelas Ditiadakan</div><div class="n-sub">Rabu 15 Mei — libur nasional</div><div class="n-time">2 hari yang lalu</div></div>
        </div>
      </div>
    </div>
  </main>
</div>
</body>
</html>