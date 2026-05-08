<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jadwal Saya - AkademikApp</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
  *{box-sizing:border-box;margin:0;padding:0}
  body{font-family:'Segoe UI',sans-serif;background:#f4f6f8;display:flex;height:100vh;overflow:hidden}
  .sidebar{width:160px;min-width:160px;background:#1a7a5e;display:flex;flex-direction:column;height:100vh;padding-bottom:12px}
  .logo{padding:16px 16px 14px;display:flex;align-items:center;gap:8px;border-bottom:1px solid rgba(255,255,255,0.15)}
  .logo-icon{width:28px;height:28px;border-radius:8px;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center}
  .logo-icon i{color:#fff;font-size:15px}
  .logo-text{font-size:13px;font-weight:700;color:#fff}
  .role-badge{margin:10px 12px 0;background:rgba(255,255,255,0.15);border-radius:8px;padding:8px 10px;display:flex;align-items:center;gap:8px}
  .role-badge i{font-size:16px;color:rgba(255,255,255,0.8)}
  .role-name{font-size:12px;font-weight:600;color:#fff}
  .role-sub{font-size:10px;color:rgba(255,255,255,0.6)}
  .sec-label{padding:14px 14px 4px;font-size:10px;font-weight:700;color:rgba(255,255,255,0.5);letter-spacing:.08em;text-transform:uppercase}
  .nav-item{display:flex;align-items:center;gap:8px;padding:9px 14px;margin:1px 8px;border-radius:8px;cursor:pointer;color:rgba(255,255,255,0.75);font-size:12.5px;transition:background .15s;text-decoration:none}
  .nav-item:hover{background:rgba(255,255,255,0.12);color:#fff}
  .nav-item.active{background:rgba(255,255,255,0.2);color:#fff;font-weight:600}
  .nav-item i{font-size:16px;opacity:.85}
  .nav-item.active i{opacity:1}
  .nav-bottom{margin-top:auto;border-top:1px solid rgba(255,255,255,0.15);padding:10px 8px 0}
  .right-wrap{flex:1;display:flex;flex-direction:column;overflow:hidden}
  .topnav{background:#fff;border-bottom:1px solid #e8e8e8;padding:10px 24px;display:flex;align-items:center;justify-content:space-between}
  .search-wrap{display:flex;align-items:center;gap:8px;background:#f4f6f8;border:1px solid #e0e0e0;border-radius:8px;padding:7px 14px;width:280px}
  .search-wrap input{border:none;background:transparent;font-size:13px;color:#333;outline:none;width:100%}
  .search-wrap i{font-size:15px;color:#bbb}
  .topnav-right{display:flex;align-items:center;gap:10px}
  .tnav-btn{width:32px;height:32px;border-radius:8px;background:#f4f6f8;border:1px solid #e8e8e8;display:flex;align-items:center;justify-content:center;cursor:pointer}
  .tnav-btn i{font-size:16px;color:#666}
  .avatar-top{width:32px;height:32px;border-radius:50%;background:#1a7a5e;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#fff}
  .main{flex:1;overflow-y:auto;background:#f4f6f8;padding:24px 28px}
  .page-head{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:22px}
  .page-title{font-size:20px;font-weight:700;color:#1a1a1a}
  .page-sub{font-size:13px;color:#888;margin-top:3px}
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
  .card{background:#fff;border-radius:12px;border:1px solid #ececec;overflow:hidden;margin-bottom:16px}
  .card-header{display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid #f0f0f0}
  .card-title{font-size:14px;font-weight:700;color:#1a1a1a}
  .hari-label{font-size:13px;font-weight:700;color:#1a7a5e;padding:12px 18px 6px;background:#f9f9f7;border-bottom:1px solid #f0f0f0}
  .jadwal-item{display:flex;align-items:center;gap:14px;padding:14px 18px;border-bottom:1px solid #f5f5f3}
  .jadwal-item:last-child{border-bottom:none}
  .jadwal-item:hover{background:#fafafa}
  .jadwal-hari{width:46px;height:46px;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
  .jh-sen{background:#e6f1fb}.jh-sel{background:#e8f5f0}
  .jh-rab{background:#faeeda}.jh-kam{background:#EEEDFE}.jh-jum{background:#fbeaf0}
  .jh-sen i{color:#185FA5}.jh-sel i{color:#1a7a5e}
  .jh-rab i{color:#854F0B}.jh-kam i{color:#3C3489}.jh-jum i{color:#993556}
  .jh-icon{font-size:20px}
  .jadwal-info{flex:1}
  .j-matkul{font-size:14px;font-weight:700;color:#1a1a1a}
  .j-kode{font-size:11px;color:#aaa;margin-top:1px}
  .j-detail{font-size:12px;color:#888;margin-top:4px;display:flex;gap:12px}
  .j-detail span{display:flex;align-items:center;gap:4px}
  .j-detail i{font-size:13px;color:#bbb}
  .j-right{text-align:right}
  .j-time{font-size:13px;font-weight:700;color:#1a1a1a}
  .j-room{font-size:12px;color:#888;margin-top:3px}
  .j-room i{font-size:12px}
  .sks-badge{display:inline-block;padding:2px 10px;border-radius:20px;font-size:11px;font-weight:600;margin-top:4px}
  .sks-3{background:#e6f1fb;color:#185FA5}
  .status-pill{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:600;padding:3px 8px;border-radius:20px}
  .s-aktif{background:#e8f5f0;color:#1a7a5e}
  .s-libur{background:#faeeda;color:#854F0B}
  .dot{width:5px;height:5px;border-radius:50%}
  .d-aktif{background:#1a7a5e}.d-libur{background:#854F0B}
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
    <i class="ti ti-user-check"></i>
    <div><div class="role-name">Dosen</div><div class="role-sub">Dr. Budi Santoso</div></div>
  </div>
  <div class="sec-label">Menu</div>
  <a href="dashboard.html" class="nav-item"><i class="ti ti-layout-dashboard"></i> Dashboard</a>
  <a href="jadwal.html" class="nav-item active"><i class="ti ti-calendar"></i> Jadwal Saya</a>
  <a href="mahasiswa.html" class="nav-item"><i class="ti ti-users"></i> Mahasiswa</a>
  <a href="nilai.html" class="nav-item"><i class="ti ti-clipboard-check"></i> Input Nilai</a>
  <div class="sec-label">Akun</div>
  <div class="nav-bottom">
    <a href="profil.html" class="nav-item"><i class="ti ti-user-circle"></i> Profil Saya</a>
    <a href="#" class="nav-item"><i class="ti ti-lock"></i> Ganti Password</a>
    <a href="#" class="nav-item" style="color:rgba(255,255,255,0.6)"><i class="ti ti-logout"></i> Logout</a>
  </div>
</aside>

<div class="right-wrap">
  <div class="topnav">
    <div class="search-wrap"><i class="ti ti-search"></i><input type="text" placeholder="Cari jadwal..."></div>
    <div class="topnav-right">
      <div class="tnav-btn"><i class="ti ti-moon"></i></div>
      <div class="tnav-btn"><i class="ti ti-bell"></i></div>
      <div class="tnav-btn"><i class="ti ti-settings"></i></div>
      <div class="avatar-top">BS</div>
    </div>
  </div>
  <main class="main">
    <div class="page-head">
      <div><div class="page-title">Jadwal Mengajar Saya</div><div class="page-sub">Semester Ganjil 2024/2025 — 3 Matakuliah</div></div>
      <select style="font-size:13px;padding:9px 14px;border-radius:8px;border:1px solid #e0e0e0;background:#fff;outline:none;color:#333">
        <option>Semester Ganjil 2024/2025</option>
        <option>Semester Genap 2023/2024</option>
      </select>
    </div>

    <div class="stats-row">
      <div class="stat-card"><div class="stat-icon si-green"><i class="ti ti-chalkboard"></i></div><div><div class="stat-label">Matkul Diampu</div><div class="stat-val">3</div></div></div>
      <div class="stat-card"><div class="stat-icon si-blue"><i class="ti ti-clock"></i></div><div><div class="stat-label">Total SKS</div><div class="stat-val">9</div></div></div>
      <div class="stat-card"><div class="stat-icon si-amber"><i class="ti ti-calendar-week"></i></div><div><div class="stat-label">Pertemuan/Minggu</div><div class="stat-val">3</div></div></div>
      <div class="stat-card"><div class="stat-icon si-purple"><i class="ti ti-users"></i></div><div><div class="stat-label">Total Mahasiswa</div><div class="stat-val">87</div></div></div>
    </div>

    <div class="card">
      <div class="card-header"><span class="card-title">Jadwal Mingguan</span></div>

      <div class="hari-label">📅 Senin</div>
      <div class="jadwal-item">
        <div class="jadwal-hari jh-sen"><i class="jh-icon ti ti-book"></i></div>
        <div class="jadwal-info">
          <div class="j-matkul">Algoritma &amp; Pemrograman</div>
          <div class="j-kode">MK-001</div>
          <div class="j-detail">
            <span><i class="ti ti-users"></i> 30 Mahasiswa</span>
            <span><i class="ti ti-school"></i> Semester 1</span>
            <span><i class="ti ti-books"></i> Teknik Informatika</span>
          </div>
        </div>
        <div class="j-right">
          <div class="j-time">07.30 – 10.00</div>
          <div class="j-room"><i class="ti ti-door"></i> Lab A-101</div>
          <div><span class="sks-badge sks-3">3 SKS</span></div>
          <div style="margin-top:4px"><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></div>
        </div>
      </div>

      <div class="hari-label">📅 Selasa</div>
      <div class="jadwal-item">
        <div class="jadwal-hari jh-sel"><i class="jh-icon ti ti-database"></i></div>
        <div class="jadwal-info">
          <div class="j-matkul">Basis Data</div>
          <div class="j-kode">MK-002</div>
          <div class="j-detail">
            <span><i class="ti ti-users"></i> 29 Mahasiswa</span>
            <span><i class="ti ti-school"></i> Semester 3</span>
            <span><i class="ti ti-books"></i> Teknik Informatika</span>
          </div>
        </div>
        <div class="j-right">
          <div class="j-time">08.00 – 10.30</div>
          <div class="j-room"><i class="ti ti-door"></i> Lab A-102</div>
          <div><span class="sks-badge sks-3">3 SKS</span></div>
          <div style="margin-top:4px"><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></div>
        </div>
      </div>

      <div class="hari-label">📅 Kamis</div>
      <div class="jadwal-item">
        <div class="jadwal-hari jh-kam"><i class="jh-icon ti ti-brain"></i></div>
        <div class="jadwal-info">
          <div class="j-matkul">Kecerdasan Buatan</div>
          <div class="j-kode">MK-009</div>
          <div class="j-detail">
            <span><i class="ti ti-users"></i> 28 Mahasiswa</span>
            <span><i class="ti ti-school"></i> Semester 5</span>
            <span><i class="ti ti-books"></i> Teknik Informatika</span>
          </div>
        </div>
        <div class="j-right">
          <div class="j-time">13.00 – 15.30</div>
          <div class="j-room"><i class="ti ti-door"></i> Lab A-104</div>
          <div><span class="sks-badge sks-3">3 SKS</span></div>
          <div style="margin-top:4px"><span class="status-pill s-libur"><span class="dot d-libur"></span>Libur Pekan Ini</span></div>
        </div>
      </div>
    </div>
  </main>
</div>
</body>
</html>