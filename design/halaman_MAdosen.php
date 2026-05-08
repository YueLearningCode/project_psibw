<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mahasiswa - AkademikApp</title>
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
  .table-card{background:#fff;border-radius:12px;border:1px solid #ececec;overflow:hidden}
  .table-toolbar{display:flex;align-items:center;justify-content:space-between;padding:14px 20px;border-bottom:1px solid #f0f0f0}
  .table-title{font-size:15px;font-weight:700;color:#1a1a1a}
  .toolbar-right{display:flex;align-items:center;gap:10px}
  .tb-search{display:flex;align-items:center;gap:7px;background:#f4f6f8;border:1px solid #e0e0e0;border-radius:8px;padding:7px 12px}
  .tb-search input{border:none;background:transparent;font-size:13px;color:#333;outline:none;width:150px}
  .tb-search i{font-size:14px;color:#bbb}
  .filter-sel{font-size:13px;padding:7px 12px;border-radius:8px;border:1px solid #e0e0e0;background:#f4f6f8;color:#555;outline:none;cursor:pointer}
  table{width:100%;border-collapse:collapse}
  thead tr{background:#f9f9f7;border-bottom:1px solid #ececec}
  th{padding:11px 16px;text-align:left;font-size:11px;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:.05em}
  td{padding:12px 16px;font-size:13px;color:#333;border-bottom:1px solid #f5f5f3}
  tbody tr:last-child td{border-bottom:none}
  tbody tr:hover{background:#fafafa}
  .nim-link{font-weight:700;color:#1a7a5e;font-size:12.5px}
  .mhs-cell{display:flex;align-items:center;gap:10px}
  .av{width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;flex-shrink:0}
  .av-a{background:#e6f1fb;color:#185FA5}.av-b{background:#e8f5f0;color:#1a7a5e}
  .av-c{background:#EEEDFE;color:#3C3489}.av-d{background:#faeeda;color:#854F0B}
  .av-e{background:#fbeaf0;color:#993556}.av-f{background:#fcebeb;color:#A32D2D}
  .mhs-name{font-size:13px;font-weight:600;color:#1a1a1a}
  .mhs-email{font-size:11px;color:#aaa}
  .nilai-badge{display:inline-block;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:700}
  .n-a{background:#e8f5f0;color:#1a7a5e}.n-b{background:#e6f1fb;color:#185FA5}
  .n-c{background:#faeeda;color:#854F0B}.n-d{background:#fbeaf0;color:#993556}
  .n-e{background:#fcebeb;color:#A32D2D}.n-bl{background:#f0f0f0;color:#888}
  .status-pill{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:600;padding:3px 8px;border-radius:20px}
  .s-lulus{background:#e8f5f0;color:#1a7a5e}.s-proses{background:#faeeda;color:#854F0B}.s-belum{background:#f0f0f0;color:#888}
  .dot{width:5px;height:5px;border-radius:50%}
  .d-lulus{background:#1a7a5e}.d-proses{background:#854F0B}.d-belum{background:#bbb}
  .action-wrap{display:flex;gap:4px}
  .act-btn{width:28px;height:28px;border-radius:6px;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center}
  .act-btn i{font-size:13px;color:#fff}
  .act-view{background:#185FA5}.act-edit{background:#1a7a5e}
  .act-btn:hover{opacity:.82}
  .pagination{display:flex;align-items:center;justify-content:space-between;padding:13px 20px;border-top:1px solid #f0f0f0;font-size:13px;color:#888}
  .page-btns{display:flex;gap:5px}
  .pg{width:30px;height:30px;border-radius:6px;border:1px solid #e8e8e8;background:#fff;cursor:pointer;font-size:13px;color:#555;display:flex;align-items:center;justify-content:center}
  .pg:hover{background:#f0f0f0}
  .pg.active{background:#1a7a5e;color:#fff;border-color:#1a7a5e;font-weight:700}
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
  <a href="jadwal.html" class="nav-item"><i class="ti ti-calendar"></i> Jadwal Saya</a>
  <a href="mahasiswa.html" class="nav-item active"><i class="ti ti-users"></i> Mahasiswa</a>
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
    <div class="search-wrap"><i class="ti ti-search"></i><input type="text" placeholder="Cari mahasiswa..." oninput="filterTable()"></div>
    <div class="topnav-right">
      <div class="tnav-btn"><i class="ti ti-moon"></i></div>
      <div class="tnav-btn"><i class="ti ti-bell"></i></div>
      <div class="tnav-btn"><i class="ti ti-settings"></i></div>
      <div class="avatar-top">BS</div>
    </div>
  </div>
  <main class="main">
    <div class="page-head">
      <div><div class="page-title">Mahasiswa yang Saya Ampu</div><div class="page-sub">Daftar mahasiswa di kelas Anda — Semester Ganjil 2024/2025</div></div>
    </div>

    <div class="stats-row">
      <div class="stat-card"><div class="stat-icon si-green"><i class="ti ti-users"></i></div><div><div class="stat-label">Total Mahasiswa</div><div class="stat-val">87</div></div></div>
      <div class="stat-card"><div class="stat-icon si-blue"><i class="ti ti-check"></i></div><div><div class="stat-label">Sudah Dinilai</div><div class="stat-val">75</div></div></div>
      <div class="stat-card"><div class="stat-icon si-amber"><i class="ti ti-clock"></i></div><div><div class="stat-label">Belum Dinilai</div><div class="stat-val">12</div></div></div>
      <div class="stat-card"><div class="stat-icon si-purple"><i class="ti ti-trending-up"></i></div><div><div class="stat-label">Rata-rata Nilai</div><div class="stat-val">78</div></div></div>
    </div>

    <div class="table-card">
      <div class="table-toolbar">
        <span class="table-title">Daftar Mahasiswa</span>
        <div class="toolbar-right">
          <div class="tb-search"><i class="ti ti-search"></i><input type="text" id="tableSearch" placeholder="Cari mahasiswa..." oninput="filterTable()"></div>
          <select class="filter-sel" id="filterMatkul" onchange="filterTable()">
            <option value="">Semua Matkul</option>
            <option value="Algoritma">Algoritma &amp; Pemrograman</option>
            <option value="Basis Data">Basis Data</option>
            <option value="Kecerdasan">Kecerdasan Buatan</option>
          </select>
          <select class="filter-sel" id="filterNilai" onchange="filterTable()">
            <option value="">Semua Nilai</option>
            <option value="Lulus">Lulus</option>
            <option value="Remidi">Remidi</option>
            <option value="Belum">Belum Dinilai</option>
          </select>
        </div>
      </div>
      <table>
        <thead><tr><th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Matakuliah</th><th>Angkatan</th><th>Semester</th><th>Nilai</th><th>Status</th><th>Aksi</th></tr></thead>
        <tbody id="tableBody">
          <tr data-matkul="Algoritma" data-status="Belum"><td style="color:#bbb;font-size:12px">1</td><td><span class="nim-link">22101001</span></td><td><div class="mhs-cell"><div class="av av-a">A</div><div><div class="mhs-name">Andi Pratama</div><div class="mhs-email">andi.pratama@kampus.ac.id</div></div></div></td><td style="font-size:12px">Algoritma &amp; Pemrograman</td><td style="font-size:12px;color:#888">2022</td><td style="font-size:12px">Sem 7</td><td><span class="nilai-badge n-bl">—</span></td><td><span class="status-pill s-belum"><span class="dot d-belum"></span>Belum Dinilai</span></td><td><div class="action-wrap"><button class="act-btn act-view"><i class="ti ti-eye"></i></button><a href="nilai.html"><button class="act-btn act-edit"><i class="ti ti-pencil"></i></button></a></div></td></tr>
          <tr data-matkul="Algoritma" data-status="Lulus"><td style="color:#bbb;font-size:12px">2</td><td><span class="nim-link">22101002</span></td><td><div class="mhs-cell"><div class="av av-b">S</div><div><div class="mhs-name">Sari Dewi Lestari</div><div class="mhs-email">sari.dewi@kampus.ac.id</div></div></div></td><td style="font-size:12px">Algoritma &amp; Pemrograman</td><td style="font-size:12px;color:#888">2022</td><td style="font-size:12px">Sem 7</td><td><span class="nilai-badge n-a">A</span></td><td><span class="status-pill s-lulus"><span class="dot d-lulus"></span>Lulus</span></td><td><div class="action-wrap"><button class="act-btn act-view"><i class="ti ti-eye"></i></button><a href="nilai.html"><button class="act-btn act-edit"><i class="ti ti-pencil"></i></button></a></div></td></tr>
          <tr data-matkul="Basis Data" data-status="Lulus"><td style="color:#bbb;font-size:12px">3</td><td><span class="nim-link">23101001</span></td><td><div class="mhs-cell"><div class="av av-c">B</div><div><div class="mhs-name">Budi Santoso</div><div class="mhs-email">budi.s@kampus.ac.id</div></div></div></td><td style="font-size:12px">Basis Data</td><td style="font-size:12px;color:#888">2023</td><td style="font-size:12px">Sem 5</td><td><span class="nilai-badge n-b">B</span></td><td><span class="status-pill s-lulus"><span class="dot d-lulus"></span>Lulus</span></td><td><div class="action-wrap"><button class="act-btn act-view"><i class="ti ti-eye"></i></button><a href="nilai.html"><button class="act-btn act-edit"><i class="ti ti-pencil"></i></button></a></div></td></tr>
          <tr data-matkul="Basis Data" data-status="Remidi"><td style="color:#bbb;font-size:12px">4</td><td><span class="nim-link">23101002</span></td><td><div class="mhs-cell"><div class="av av-d">R</div><div><div class="mhs-name">Rina Fitriani</div><div class="mhs-email">rina.f@kampus.ac.id</div></div></div></td><td style="font-size:12px">Basis Data</td><td style="font-size:12px;color:#888">2023</td><td style="font-size:12px">Sem 5</td><td><span class="nilai-badge n-c">C</span></td><td><span class="status-pill s-proses"><span class="dot d-proses"></span>Remidi</span></td><td><div class="action-wrap"><button class="act-btn act-view"><i class="ti ti-eye"></i></button><a href="nilai.html"><button class="act-btn act-edit"><i class="ti ti-pencil"></i></button></a></div></td></tr>
          <tr data-matkul="Kecerdasan" data-status="Lulus"><td style="color:#bbb;font-size:12px">5</td><td><span class="nim-link">24101001</span></td><td><div class="mhs-cell"><div class="av av-e">D</div><div><div class="mhs-name">Doni Kurniawan</div><div class="mhs-email">doni.k@kampus.ac.id</div></div></div></td><td style="font-size:12px">Kecerdasan Buatan</td><td style="font-size:12px;color:#888">2024</td><td style="font-size:12px">Sem 3</td><td><span class="nilai-badge n-a">A</span></td><td><span class="status-pill s-lulus"><span class="dot d-lulus"></span>Lulus</span></td><td><div class="action-wrap"><button class="act-btn act-view"><i class="ti ti-eye"></i></button><a href="nilai.html"><button class="act-btn act-edit"><i class="ti ti-pencil"></i></button></a></div></td></tr>
          <tr data-matkul="Kecerdasan" data-status="Belum"><td style="color:#bbb;font-size:12px">6</td><td><span class="nim-link">24101002</span></td><td><div class="mhs-cell"><div class="av av-f">M</div><div><div class="mhs-name">Mega Wulandari</div><div class="mhs-email">mega.w@kampus.ac.id</div></div></div></td><td style="font-size:12px">Kecerdasan Buatan</td><td style="font-size:12px;color:#888">2024</td><td style="font-size:12px">Sem 3</td><td><span class="nilai-badge n-bl">—</span></td><td><span class="status-pill s-belum"><span class="dot d-belum"></span>Belum Dinilai</span></td><td><div class="action-wrap"><button class="act-btn act-view"><i class="ti ti-eye"></i></button><a href="nilai.html"><button class="act-btn act-edit"><i class="ti ti-pencil"></i></button></a></div></td></tr>
          <tr data-matkul="Algoritma" data-status="Lulus"><td style="color:#bbb;font-size:12px">7</td><td><span class="nim-link">25101001</span></td><td><div class="mhs-cell"><div class="av av-a">F</div><div><div class="mhs-name">Fajar Nugroho</div><div class="mhs-email">fajar.n@kampus.ac.id</div></div></div></td><td style="font-size:12px">Algoritma &amp; Pemrograman</td><td style="font-size:12px;color:#888">2025</td><td style="font-size:12px">Sem 1</td><td><span class="nilai-badge n-b">B</span></td><td><span class="status-pill s-lulus"><span class="dot d-lulus"></span>Lulus</span></td><td><div class="action-wrap"><button class="act-btn act-view"><i class="ti ti-eye"></i></button><a href="nilai.html"><button class="act-btn act-edit"><i class="ti ti-pencil"></i></button></a></div></td></tr>
          <tr data-matkul="Basis Data" data-status="Belum"><td style="color:#bbb;font-size:12px">8</td><td><span class="nim-link">22101003</span></td><td><div class="mhs-cell"><div class="av av-b">H</div><div><div class="mhs-name">Hendra Setiawan</div><div class="mhs-email">hendra.s@kampus.ac.id</div></div></div></td><td style="font-size:12px">Basis Data</td><td style="font-size:12px;color:#888">2022</td><td style="font-size:12px">Sem 7</td><td><span class="nilai-badge n-bl">—</span></td><td><span class="status-pill s-belum"><span class="dot d-belum"></span>Belum Dinilai</span></td><td><div class="action-wrap"><button class="act-btn act-view"><i class="ti ti-eye"></i></button><a href="nilai.html"><button class="act-btn act-edit"><i class="ti ti-pencil"></i></button></a></div></td></tr>
        </tbody>
      </table>
      <div class="pagination">
        <span>Menampilkan 1–8 dari 87 data</span>
        <div class="page-btns">
          <button class="pg"><i class="ti ti-chevron-left" style="font-size:13px"></i></button>
          <button class="pg active">1</button>
          <button class="pg">2</button>
          <button class="pg">3</button>
          <button class="pg"><i class="ti ti-chevron-right" style="font-size:13px"></i></button>
        </div>
      </div>
    </div>
  </main>
</div>
<script>
function filterTable(){
  const q=(document.querySelector('.search-wrap input').value||document.getElementById('tableSearch').value||'').toLowerCase();
  const mk=document.getElementById('filterMatkul').value;
  const st=document.getElementById('filterNilai').value;
  document.querySelectorAll('#tableBody tr').forEach(tr=>{
    const txt=tr.textContent.toLowerCase();
    const dm=tr.dataset.matkul||'';
    const ds=tr.dataset.status||'';
    tr.style.display=(txt.includes(q)&&(!mk||dm===mk)&&(!st||ds===st))?'':'none';
  });
}
</script>
</body>
</html>