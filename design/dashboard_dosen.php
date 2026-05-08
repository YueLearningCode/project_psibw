<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Dosen - AkademikApp</title>
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
  .three-col{display:grid;grid-template-columns:1fr 2fr 1fr;gap:16px;margin-bottom:20px}
  .card{background:#fff;border-radius:12px;border:1px solid #ececec;overflow:hidden}
  .card-header{display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid #f0f0f0}
  .card-title{font-size:14px;font-weight:700;color:#1a1a1a}
  .card-link{font-size:12px;color:#1a7a5e;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:4px;text-decoration:none}
  .jadwal-item{display:flex;align-items:center;gap:12px;padding:12px 18px;border-bottom:1px solid #f5f5f3}
  .jadwal-item:last-child{border-bottom:none}
  .jadwal-item:hover{background:#fafafa}
  .jadwal-hari{width:40px;height:40px;border-radius:10px;display:flex;flex-direction:column;align-items:center;justify-content:center;flex-shrink:0}
  .jh-sen{background:#e6f1fb}.jh-sel{background:#e8f5f0}.jh-kam{background:#EEEDFE}
  .jh-sen .jh-icon{color:#185FA5}.jh-sel .jh-icon{color:#1a7a5e}.jh-kam .jh-icon{color:#3C3489}
  .jh-icon{font-size:18px}
  .jadwal-info{flex:1}
  .j-matkul{font-size:13px;font-weight:600;color:#1a1a1a}
  .j-detail{font-size:11px;color:#888;margin-top:2px}
  .j-time{font-size:12px;font-weight:600;color:#555;white-space:nowrap}
  .j-room{font-size:11px;color:#888;text-align:right;margin-top:2px}
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
  .profil-card{background:#fff;border-radius:12px;border:1px solid #ececec;padding:20px;display:flex;flex-direction:column;align-items:center;gap:10px}
  .profil-avatar{width:64px;height:64px;border-radius:50%;background:#1a7a5e;display:flex;align-items:center;justify-content:center;font-size:22px;font-weight:700;color:#fff}
  .profil-name{font-size:15px;font-weight:700;color:#1a1a1a;text-align:center}
  .profil-nip{font-size:12px;color:#888}
  .profil-prodi{font-size:12px;font-weight:600;color:#1a7a5e;background:#e8f5f0;padding:3px 12px;border-radius:20px}
  .profil-row{width:100%;display:flex;flex-direction:column;gap:8px;margin-top:6px}
  .profil-field{display:flex;align-items:center;gap:8px;font-size:12px;color:#555}
  .profil-field i{font-size:15px;color:#1a7a5e}
  .btn-profil{width:100%;margin-top:4px;padding:9px;border-radius:8px;border:1.5px solid #1a7a5e;background:#fff;color:#1a7a5e;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:6px;text-decoration:none}
  .btn-profil:hover{background:#e8f5f0}
  table{width:100%;border-collapse:collapse}
  thead tr{background:#f9f9f7;border-bottom:1px solid #ececec}
  th{padding:10px 14px;text-align:left;font-size:11px;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:.05em}
  td{padding:11px 14px;font-size:13px;color:#333;border-bottom:1px solid #f5f5f3}
  tbody tr:last-child td{border-bottom:none}
  tbody tr:hover{background:#fafafa}
  .nim-link{font-weight:700;color:#1a7a5e;font-size:12px}
  .mhs-cell{display:flex;align-items:center;gap:8px}
  .av{width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;flex-shrink:0}
  .av-a{background:#e6f1fb;color:#185FA5}.av-b{background:#e8f5f0;color:#1a7a5e}
  .av-c{background:#EEEDFE;color:#3C3489}.av-e{background:#fbeaf0;color:#993556}
  .mhs-name{font-size:13px;font-weight:600;color:#1a1a1a}
  .mhs-email{font-size:11px;color:#aaa}
  .status-pill{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:600;padding:3px 8px;border-radius:20px}
  .s-belum{background:#f0f0f0;color:#888}
  .dot{width:5px;height:5px;border-radius:50%}
  .d-belum{background:#bbb}
  .act-btn{width:26px;height:26px;border-radius:6px;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center}
  .act-btn i{font-size:13px;color:#fff}
  .act-edit{background:#1a7a5e}
  .act-btn:hover{opacity:.82}
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
  <a href="dashboard.html" class="nav-item active"><i class="ti ti-layout-dashboard"></i> Dashboard</a>
  <a href="jadwal.html" class="nav-item"><i class="ti ti-calendar"></i> Jadwal Saya</a>
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
    <div class="search-wrap"><i class="ti ti-search"></i><input type="text" placeholder="Cari mahasiswa, matakuliah..."></div>
    <div class="topnav-right">
      <div class="tnav-btn"><i class="ti ti-moon"></i></div>
      <div class="tnav-btn"><i class="ti ti-bell"></i><span class="notif-dot"></span></div>
      <div class="tnav-btn"><i class="ti ti-settings"></i></div>
      <div class="avatar-top">BS</div>
    </div>
  </div>
  <main class="main">
    <div class="page-head">
      <div>
        <div class="page-title">Selamat Datang, Dr. Budi 👋</div>
        <div class="page-sub">Semester Ganjil 2024/2025 — Teknik Informatika</div>
      </div>
      <div class="greeting-badge">
        <i class="ti ti-calendar-event"></i>
        <div><div class="g-name">Senin, 8 Mei 2026</div><div class="g-sub">2 jadwal mengajar hari ini</div></div>
      </div>
    </div>

    <div class="stats-row">
      <div class="stat-card"><div class="stat-icon si-green"><i class="ti ti-chalkboard"></i></div><div><div class="stat-label">Matkul Diampu</div><div class="stat-val">3</div></div></div>
      <div class="stat-card"><div class="stat-icon si-blue"><i class="ti ti-users"></i></div><div><div class="stat-label">Total Mahasiswa</div><div class="stat-val">87</div></div></div>
      <div class="stat-card"><div class="stat-icon si-amber"><i class="ti ti-clipboard-check"></i></div><div><div class="stat-label">Belum Dinilai</div><div class="stat-val">12</div></div></div>
      <div class="stat-card"><div class="stat-icon si-purple"><i class="ti ti-calendar-time"></i></div><div><div class="stat-label">Jadwal Minggu Ini</div><div class="stat-val">6</div></div></div>
    </div>

    <div class="three-col">
      <div class="profil-card">
        <div class="profil-avatar">BS</div>
        <div class="profil-name">Dr. Budi Santoso, M.Kom</div>
        <div class="profil-nip">NIP 198501012010011001</div>
        <div class="profil-prodi">Teknik Informatika</div>
        <div class="profil-row">
          <div class="profil-field"><i class="ti ti-mail"></i> budi.santoso@kampus.ac.id</div>
          <div class="profil-field"><i class="ti ti-phone"></i> 081234567800</div>
          <div class="profil-field"><i class="ti ti-building"></i> Gedung A Lt. 3 R.305</div>
        </div>
        <a href="profil.html" class="btn-profil"><i class="ti ti-edit"></i> Edit Profil</a>
      </div>

      <div class="card">
        <div class="card-header">
          <span class="card-title">Jadwal Mengajar Hari Ini</span>
          <a href="jadwal.html" class="card-link">Lihat Semua <i class="ti ti-arrow-right" style="font-size:12px"></i></a>
        </div>
        <div class="jadwal-item">
          <div class="jadwal-hari jh-sen"><i class="jh-icon ti ti-book"></i></div>
          <div class="jadwal-info"><div class="j-matkul">Algoritma &amp; Pemrograman</div><div class="j-detail">30 Mahasiswa · Sem 1 · TI</div></div>
          <div style="text-align:right"><div class="j-time">07.30 – 10.00</div><div class="j-room">Lab A-101</div></div>
        </div>
        <div class="jadwal-item">
          <div class="jadwal-hari jh-kam"><i class="jh-icon ti ti-brain"></i></div>
          <div class="jadwal-info"><div class="j-matkul">Kecerdasan Buatan</div><div class="j-detail">28 Mahasiswa · Sem 5 · TI</div></div>
          <div style="text-align:right"><div class="j-time">13.00 – 15.30</div><div class="j-room">Lab A-104</div></div>
        </div>
        <div class="jadwal-item">
          <div class="jadwal-hari jh-sel"><i class="jh-icon ti ti-database"></i></div>
          <div class="jadwal-info"><div class="j-matkul">Basis Data (Selasa)</div><div class="j-detail">29 Mahasiswa · Sem 3 · TI</div></div>
          <div style="text-align:right"><div class="j-time">08.00 – 10.30</div><div class="j-room">Lab A-102</div></div>
        </div>
      </div>

      <div class="card">
        <div class="card-header"><span class="card-title">Notifikasi</span><span class="card-link">Tandai Baca</span></div>
        <div class="notif-item">
          <div class="notif-icon ni-amber"><i class="ti ti-alert-circle"></i></div>
          <div class="notif-text"><div class="n-title">Batas Input Nilai</div><div class="n-sub">Deadline nilai MK Algoritma 3 hari lagi</div><div class="n-time">2 jam yang lalu</div></div>
          <div class="unread-dot"></div>
        </div>
        <div class="notif-item">
          <div class="notif-icon ni-blue"><i class="ti ti-message"></i></div>
          <div class="notif-text"><div class="n-title">Pesan Mahasiswa</div><div class="n-sub">Andi Pratama mengajukan pertanyaan</div><div class="n-time">5 jam yang lalu</div></div>
          <div class="unread-dot"></div>
        </div>
        <div class="notif-item">
          <div class="notif-icon ni-green"><i class="ti ti-check"></i></div>
          <div class="notif-text"><div class="n-title">Jadwal Disetujui</div><div class="n-sub">Jadwal semester baru dikonfirmasi</div><div class="n-time">1 hari yang lalu</div></div>
        </div>
        <div class="notif-item">
          <div class="notif-icon ni-amber"><i class="ti ti-calendar-x"></i></div>
          <div class="notif-text"><div class="n-title">Kelas Ditiadakan</div><div class="n-sub">Rabu 15 Mei — libur nasional</div><div class="n-time">2 hari yang lalu</div></div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <span class="card-title">Mahasiswa Belum Dinilai</span>
        <a href="nilai.html" class="card-link">Input Nilai <i class="ti ti-arrow-right" style="font-size:12px"></i></a>
      </div>
      <table>
        <thead><tr><th>NIM</th><th>Mahasiswa</th><th>Matakuliah</th><th>Angkatan</th><th>Status</th><th>Aksi</th></tr></thead>
        <tbody>
          <tr><td><span class="nim-link">22101001</span></td><td><div class="mhs-cell"><div class="av av-a">A</div><div><div class="mhs-name">Andi Pratama</div><div class="mhs-email">andi@kampus.ac.id</div></div></div></td><td style="font-size:12px">Algoritma &amp; Pemrograman</td><td style="font-size:12px;color:#888">2022</td><td><span class="status-pill s-belum"><span class="dot d-belum"></span>Belum</span></td><td><a href="nilai.html"><button class="act-btn act-edit"><i class="ti ti-pencil"></i></button></a></td></tr>
          <tr><td><span class="nim-link">23101001</span></td><td><div class="mhs-cell"><div class="av av-b">B</div><div><div class="mhs-name">Budi Santoso</div><div class="mhs-email">budi.s@kampus.ac.id</div></div></div></td><td style="font-size:12px">Algoritma &amp; Pemrograman</td><td style="font-size:12px;color:#888">2023</td><td><span class="status-pill s-belum"><span class="dot d-belum"></span>Belum</span></td><td><a href="nilai.html"><button class="act-btn act-edit"><i class="ti ti-pencil"></i></button></a></td></tr>
          <tr><td><span class="nim-link">22101004</span></td><td><div class="mhs-cell"><div class="av av-e">F</div><div><div class="mhs-name">Fajar Nugroho</div><div class="mhs-email">fajar@kampus.ac.id</div></div></div></td><td style="font-size:12px">Kecerdasan Buatan</td><td style="font-size:12px;color:#888">2022</td><td><span class="status-pill s-belum"><span class="dot d-belum"></span>Belum</span></td><td><a href="nilai.html"><button class="act-btn act-edit"><i class="ti ti-pencil"></i></button></a></td></tr>
        </tbody>
      </table>
    </div>
  </main>
</div>
</body>
</html>