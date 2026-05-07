<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pengampu Matakuliah - AkademiKu</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Segoe UI', sans-serif; background: #f5f5f0; display: flex; height: 100vh; overflow: hidden; }

  /* SIDEBAR */
  .sidebar { width: 220px; min-width: 220px; background: #fff; border-right: 0.5px solid #e0e0d8; display: flex; flex-direction: column; height: 100vh; }
  .logo { padding: 18px 20px 14px; border-bottom: 0.5px solid #e0e0d8; display: flex; align-items: center; gap: 10px; }
  .logo-icon { width: 30px; height: 30px; border-radius: 50%; background: #1a7a5e; display: flex; align-items: center; justify-content: center; }
  .logo-icon i { color: #fff; font-size: 16px; }
  .logo-text { font-size: 15px; font-weight: 600; color: #1a1a1a; }
  .sec-label { padding: 14px 12px 6px; font-size: 11px; font-weight: 600; color: #bbb; letter-spacing: .06em; text-transform: uppercase; }
  .nav-item { display: flex; align-items: center; gap: 10px; padding: 9px 14px; border-radius: 8px; margin: 1px 8px; cursor: pointer; color: #555; font-size: 13px; transition: background .15s; text-decoration: none; }
  .nav-item:hover { background: #f5f5f0; }
  .nav-item.active { background: #e8f5f0; color: #1a7a5e; font-weight: 600; }
  .nav-item i { font-size: 17px; color: #bbb; }
  .nav-item.active i { color: #1a7a5e; }
  .nav-item.logout { color: #A32D2D; }
  .nav-item.logout i { color: #A32D2D; }
  .nav-bottom { margin-top: auto; border-top: 0.5px solid #e0e0d8; padding: 10px 8px; }

  /* TOPNAV */
  .topnav { background: #fff; border-bottom: 0.5px solid #e0e0d8; padding: 12px 28px; display: flex; align-items: center; justify-content: space-between; }
  .topnav-search { display: flex; align-items: center; gap: 8px; background: #f5f5f0; border: 0.5px solid #e0e0d8; border-radius: 8px; padding: 8px 14px; width: 340px; }
  .topnav-search input { border: none; background: transparent; font-size: 13px; color: #1a1a1a; outline: none; width: 100%; }
  .topnav-search i { font-size: 16px; color: #bbb; }
  .topnav-right { display: flex; align-items: center; gap: 14px; }
  .topnav-icon { width: 34px; height: 34px; border-radius: 8px; background: #f5f5f0; border: 0.5px solid #e0e0d8; display: flex; align-items: center; justify-content: center; cursor: pointer; }
  .topnav-icon i { font-size: 17px; color: #888; }
  .avatar-top { width: 34px; height: 34px; border-radius: 50%; background: #1a7a5e; display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 600; color: #fff; cursor: pointer; }

  /* MAIN */
  .main { flex: 1; overflow: auto; background: #f5f5f0; }
  .content { padding: 24px 28px; }
  .page-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
  .page-title { font-size: 20px; font-weight: 600; color: #1a1a1a; }
  .page-sub { font-size: 13px; color: #888; margin-top: 3px; }
  .btn-add { display: flex; align-items: center; gap: 8px; background: #1a7a5e; color: #fff; border: none; padding: 10px 18px; border-radius: 8px; font-size: 13px; font-weight: 500; cursor: pointer; transition: background .15s; }
  .btn-add:hover { background: #155f49; }
  .btn-add i { font-size: 16px; }

  /* STATS */
  .stats-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; margin-bottom: 22px; }
  .stat-card { background: #fff; border-radius: 12px; padding: 16px 18px; border: 0.5px solid #e0e0d8; }
  .stat-label { font-size: 12px; color: #888; margin-bottom: 8px; }
  .stat-val { font-size: 24px; font-weight: 600; color: #1a1a1a; }
  .stat-badge { display: inline-flex; align-items: center; gap: 4px; font-size: 11px; margin-top: 6px; padding: 3px 10px; border-radius: 20px; }
  .bg-green  { background: #e8f5f0; color: #1a7a5e; }
  .bg-blue   { background: #e6f1fb; color: #185FA5; }
  .bg-amber  { background: #faeeda; color: #854F0B; }
  .bg-purple { background: #EEEDFE; color: #3C3489; }

  /* TABLE */
  .table-card { background: #fff; border-radius: 12px; border: 0.5px solid #e0e0d8; overflow: hidden; }
  .table-toolbar { display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; border-bottom: 0.5px solid #e0e0d8; }
  .table-title { font-size: 15px; font-weight: 600; color: #1a1a1a; }
  .toolbar-right { display: flex; align-items: center; gap: 10px; }
  .filter-select { font-size: 13px; padding: 7px 12px; border-radius: 8px; border: 0.5px solid #e0e0d8; background: #f5f5f0; color: #555; outline: none; cursor: pointer; }

  table { width: 100%; border-collapse: collapse; }
  thead tr { border-bottom: 0.5px solid #e0e0d8; }
  th { padding: 11px 16px; text-align: left; font-size: 11px; font-weight: 600; color: #bbb; text-transform: uppercase; letter-spacing: .05em; }
  td { padding: 12px 16px; font-size: 13px; color: #1a1a1a; border-bottom: 0.5px solid #f0f0e8; }
  tbody tr:last-child td { border-bottom: none; }
  tbody tr:hover { background: #f9f9f6; }

  .dosen-cell { display: flex; align-items: center; gap: 10px; }
  .avatar-sm { width: 34px; height: 34px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 600; flex-shrink: 0; }
  .av-teal   { background: #e8f5f0; color: #1a7a5e; }
  .av-blue   { background: #e6f1fb; color: #185FA5; }
  .av-purple { background: #EEEDFE; color: #3C3489; }
  .av-amber  { background: #faeeda; color: #854F0B; }
  .av-pink   { background: #fbeaf0; color: #993556; }
  .dosen-name { font-size: 13px; font-weight: 500; color: #1a1a1a; }
  .dosen-nip  { font-size: 11px; color: #aaa; }

  .mk-pill { display: inline-block; font-size: 12px; padding: 3px 10px; border-radius: 20px; background: #f0f0e8; color: #555; }
  .sks-badge { display: inline-block; padding: 3px 10px; border-radius: 20px; font-size: 12px; font-weight: 500; }
  .sks-2 { background: #e8f5f0; color: #1a7a5e; }
  .sks-3 { background: #e6f1fb; color: #185FA5; }
  .sks-4 { background: #faeeda; color: #854F0B; }
  .prodi-tag { font-size: 12px; color: #888; }

  .status-pill { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; padding: 3px 10px; border-radius: 20px; }
  .s-aktif    { background: #e8f5f0; color: #1a7a5e; }
  .s-nonaktif { background: #fcebeb; color: #A32D2D; }
  .dot { width: 6px; height: 6px; border-radius: 50%; }
  .d-aktif    { background: #1a7a5e; }
  .d-nonaktif { background: #A32D2D; }

  .action-btn { background: none; border: none; cursor: pointer; padding: 5px 6px; border-radius: 6px; color: #bbb; transition: background .12s, color .12s; }
  .action-btn:hover { background: #f0f0e8; color: #1a1a1a; }
  .action-btn.del:hover { background: #fcebeb; color: #A32D2D; }
  .action-btn i { font-size: 16px; }

  .pagination { display: flex; align-items: center; justify-content: space-between; padding: 13px 20px; border-top: 0.5px solid #e0e0d8; font-size: 13px; color: #888; }
  .page-btns { display: flex; gap: 6px; }
  .page-btn { width: 30px; height: 30px; border-radius: 6px; border: 0.5px solid #e0e0d8; background: #fff; cursor: pointer; font-size: 13px; color: #555; display: flex; align-items: center; justify-content: center; transition: background .12s; }
  .page-btn:hover { background: #f0f0e8; }
  .page-btn.active { background: #1a7a5e; color: #fff; border-color: #1a7a5e; font-weight: 600; }
  .sem-txt { font-size: 12px; color: #555; }
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="logo">
    <div class="logo-icon"><i class="ti ti-school"></i></div>
    <span class="logo-text">AkademiKu</span>
  </div>
  <div class="sec-label">Menu Utama</div>
  <a href="#" class="nav-item"><i class="ti ti-layout-dashboard"></i> Dashboard</a>
  <a href="#" class="nav-item"><i class="ti ti-users"></i> Data Mahasiswa</a>
  <a href="#" class="nav-item"><i class="ti ti-user-check"></i> Data Dosen</a>
  <a href="#" class="nav-item"><i class="ti ti-book"></i> Data Matkul</a>
  <a href="#" class="nav-item active"><i class="ti ti-chalkboard"></i> Pengampu MK</a>
  <a href="#" class="nav-item"><i class="ti ti-calendar"></i> Jadwal Kuliah</a>
  <div class="nav-bottom">
    <a href="#" class="nav-item"><i class="ti ti-lock"></i> Ganti Password</a>
    <a href="#" class="nav-item logout"><i class="ti ti-logout"></i> Logout</a>
  </div>
</aside>

<!-- WRAPPER KANAN -->
<div style="flex:1; display:flex; flex-direction:column; overflow:hidden;">

  <!-- TOPNAV dengan Search Global -->
  <div class="topnav">
    <div class="topnav-search">
      <i class="ti ti-search"></i>
      <input type="text" id="globalSearch" placeholder="Cari dosen, matakuliah, kode MK..." oninput="filterTable()">
    </div>
    <div class="topnav-right">
      <div class="topnav-icon"><i class="ti ti-bell"></i></div>
      <div class="topnav-icon"><i class="ti ti-settings"></i></div>
      <div class="avatar-top">AD</div>
    </div>
  </div>

  <!-- MAIN CONTENT -->
  <main class="main">
    <div class="content">

      <!-- HEADER -->
      <div class="page-head">
        <div>
          <div class="page-title">Pengampu Matakuliah</div>
          <div class="page-sub">Data penugasan dosen pengampu per matakuliah</div>
        </div>
        <button class="btn-add" onclick="alert('Form tambah pengampu')">
          <i class="ti ti-plus"></i> Tambah Pengampu
        </button>
      </div>

      <!-- STAT CARDS -->
      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-label">Total Pengampu</div>
          <div class="stat-val">24</div>
          <div class="stat-badge bg-green"><i class="ti ti-trending-up" style="font-size:12px"></i> Aktif bertugas</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Total Dosen</div>
          <div class="stat-val">18</div>
          <div class="stat-badge bg-blue">Terdaftar aktif</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Matkul Diampu</div>
          <div class="stat-val">20</div>
          <div class="stat-badge bg-amber">Dari 42 matkul</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Rata-rata SKS/Dosen</div>
          <div class="stat-val">6</div>
          <div class="stat-badge bg-purple">SKS per semester</div>
        </div>
      </div>

      <!-- TABLE -->
      <div class="table-card">
        <div class="table-toolbar">
          <span class="table-title">Daftar Pengampu Matakuliah</span>
          <div class="toolbar-right">
            <select class="filter-select" id="filterProdi" onchange="filterTable()">
              <option value="">Semua Prodi</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Teknik Komputer">Teknik Komputer</option>
              <option value="Manajemen Informatika">Manajemen Informatika</option>
            </select>
            <select class="filter-select" id="filterSemester" onchange="filterTable()">
              <option value="">Semua Semester</option>
              <option value="Ganjil">Ganjil</option>
              <option value="Genap">Genap</option>
            </select>
          </div>
        </div>

        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Dosen Pengampu</th>
              <th>Matakuliah</th>
              <th>SKS</th>
              <th>Semester</th>
              <th>Program Studi</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="tableBody">
            <tr data-prodi="Teknik Informatika" data-semester="Ganjil">
              <td style="color:#aaa">01</td>
              <td><div class="dosen-cell"><div class="avatar-sm av-teal">BS</div><div><div class="dosen-name">Dr. Budi Santoso, M.Kom</div><div class="dosen-nip">NIP 198501012010011001</div></div></div></td>
              <td><span class="mk-pill">MK-001 Algoritma &amp; Pemrograman</span></td>
              <td><span class="sks-badge sks-3">3 SKS</span></td>
              <td><span class="sem-txt">Ganjil 2024/2025</span></td>
              <td><span class="prodi-tag">Teknik Informatika</span></td>
              <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
              <td><button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button><button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button></td>
            </tr>
            <tr data-prodi="Teknik Informatika" data-semester="Ganjil">
              <td style="color:#aaa">02</td>
              <td><div class="dosen-cell"><div class="avatar-sm av-blue">SR</div><div><div class="dosen-name">Siti Rahayu, S.T., M.T.</div><div class="dosen-nip">NIP 199002152015042002</div></div></div></td>
              <td><span class="mk-pill">MK-002 Basis Data</span></td>
              <td><span class="sks-badge sks-3">3 SKS</span></td>
              <td><span class="sem-txt">Ganjil 2024/2025</span></td>
              <td><span class="prodi-tag">Teknik Informatika</span></td>
              <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
              <td><button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button><button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button></td>
            </tr>
            <tr data-prodi="Teknik Informatika" data-semester="Ganjil">
              <td style="color:#aaa">03</td>
              <td><div class="dosen-cell"><div class="avatar-sm av-purple">AW</div><div><div class="dosen-name">Ahmad Wijaya, Ph.D</div><div class="dosen-nip">NIP 197803202005011003</div></div></div></td>
              <td><span class="mk-pill">MK-003 Jaringan Komputer</span></td>
              <td><span class="sks-badge sks-4">4 SKS</span></td>
              <td><span class="sem-txt">Ganjil 2024/2025</span></td>
              <td><span class="prodi-tag">Teknik Informatika</span></td>
              <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
              <td><button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button><button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button></td>
            </tr>
            <tr data-prodi="Sistem Informasi" data-semester="Ganjil">
              <td style="color:#aaa">04</td>
              <td><div class="dosen-cell"><div class="avatar-sm av-amber">DP</div><div><div class="dosen-name">Dewi Puspita, M.Si</div><div class="dosen-nip">NIP 198811102012042004</div></div></div></td>
              <td><span class="mk-pill">MK-004 Kalkulus</span></td>
              <td><span class="sks-badge sks-3">3 SKS</span></td>
              <td><span class="sem-txt">Ganjil 2024/2025</span></td>
              <td><span class="prodi-tag">Sistem Informasi</span></td>
              <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
              <td><button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button><button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button></td>
            </tr>
            <tr data-prodi="Sistem Informasi" data-semester="Genap">
              <td style="color:#aaa">05</td>
              <td><div class="dosen-cell"><div class="avatar-sm av-pink">RH</div><div><div class="dosen-name">Rudi Hartono, M.Kom</div><div class="dosen-nip">NIP 198605062011011005</div></div></div></td>
              <td><span class="mk-pill">MK-005 Pemrograman Web</span></td>
              <td><span class="sks-badge sks-3">3 SKS</span></td>
              <td><span class="sem-txt">Genap 2024/2025</span></td>
              <td><span class="prodi-tag">Sistem Informasi</span></td>
              <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
              <td><button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button><button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button></td>
            </tr>
            <tr data-prodi="Teknik Komputer" data-semester="Ganjil">
              <td style="color:#aaa">06</td>
              <td><div class="dosen-cell"><div class="avatar-sm av-teal">FN</div><div><div class="dosen-name">Fajar Nugroho, S.Kom., M.T.</div><div class="dosen-nip">NIP 199203142018011006</div></div></div></td>
              <td><span class="mk-pill">MK-006 Sistem Operasi</span></td>
              <td><span class="sks-badge sks-2">2 SKS</span></td>
              <td><span class="sem-txt">Ganjil 2024/2025</span></td>
              <td><span class="prodi-tag">Teknik Komputer</span></td>
              <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
              <td><button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button><button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button></td>
            </tr>
            <tr data-prodi="Teknik Informatika" data-semester="Genap">
              <td style="color:#aaa">07</td>
              <td><div class="dosen-cell"><div class="avatar-sm av-blue">BS</div><div><div class="dosen-name">Dr. Budi Santoso, M.Kom</div><div class="dosen-nip">NIP 198501012010011001</div></div></div></td>
              <td><span class="mk-pill">MK-009 Kecerdasan Buatan</span></td>
              <td><span class="sks-badge sks-3">3 SKS</span></td>
              <td><span class="sem-txt">Genap 2024/2025</span></td>
              <td><span class="prodi-tag">Teknik Informatika</span></td>
              <td><span class="status-pill s-nonaktif"><span class="dot d-nonaktif"></span>Nonaktif</span></td>
              <td><button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button><button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button></td>
            </tr>
            <tr data-prodi="Manajemen Informatika" data-semester="Genap">
              <td style="color:#aaa">08</td>
              <td><div class="dosen-cell"><div class="avatar-sm av-amber">LK</div><div><div class="dosen-name">Linda Kusuma, M.M.</div><div class="dosen-nip">NIP 198407172009042007</div></div></div></td>
              <td><span class="mk-pill">MK-008 Etika Profesi &amp; Hukum TI</span></td>
              <td><span class="sks-badge sks-2">2 SKS</span></td>
              <td><span class="sem-txt">Genap 2024/2025</span></td>
              <td><span class="prodi-tag">Manajemen Informatika</span></td>
              <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
              <td><button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button><button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button></td>
            </tr>
            <tr data-prodi="Sistem Informasi" data-semester="Ganjil">
              <td style="color:#aaa">09</td>
              <td><div class="dosen-cell"><div class="avatar-sm av-purple">DP</div><div><div class="dosen-name">Dewi Puspita, M.Si</div><div class="dosen-nip">NIP 198811102012042004</div></div></div></td>
              <td><span class="mk-pill">MK-010 Manajemen Proyek TI</span></td>
              <td><span class="sks-badge sks-2">2 SKS</span></td>
              <td><span class="sem-txt">Ganjil 2024/2025</span></td>
              <td><span class="prodi-tag">Sistem Informasi</span></td>
              <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
              <td><button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button><button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button></td>
            </tr>
            <tr data-prodi="Teknik Komputer" data-semester="Genap">
              <td style="color:#aaa">10</td>
              <td><div class="dosen-cell"><div class="avatar-sm av-pink">AW</div><div><div class="dosen-name">Ahmad Wijaya, Ph.D</div><div class="dosen-nip">NIP 197803202005011003</div></div></div></td>
              <td><span class="mk-pill">MK-011 Arsitektur Komputer</span></td>
              <td><span class="sks-badge sks-3">3 SKS</span></td>
              <td><span class="sem-txt">Genap 2024/2025</span></td>
              <td><span class="prodi-tag">Teknik Komputer</span></td>
              <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
              <td><button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button><button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button></td>
            </tr>
          </tbody>
        </table>

        <div class="pagination">
          <span>Menampilkan 1–10 dari 24 data</span>
          <div class="page-btns">
            <button class="page-btn"><i class="ti ti-chevron-left" style="font-size:14px"></i></button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn"><i class="ti ti-chevron-right" style="font-size:14px"></i></button>
          </div>
        </div>
      </div>

    </div>
  </main>
</div>

<script>
  function filterTable() {
    const q = document.getElementById('globalSearch').value.toLowerCase();
    const prodi = document.getElementById('filterProdi').value;
    const sem = document.getElementById('filterSemester').value;
    document.querySelectorAll('#tableBody tr').forEach(tr => {
      const txt = tr.textContent.toLowerCase();
      const dp  = tr.dataset.prodi || '';
      const ds  = tr.dataset.semester || '';
      const matchQ = txt.includes(q);
      const matchP = !prodi || dp === prodi;
      const matchS = !sem   || ds === sem;
      tr.style.display = (matchQ && matchP && matchS) ? '' : 'none';
    });
  }
</script>

</body>
</html>