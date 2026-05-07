<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Matakuliah - AkademiKu</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Segoe UI', sans-serif; background: #f5f5f0; display: flex; height: 100vh; overflow: hidden; }

  /* SIDEBAR */
  .sidebar {
    width: 220px; min-width: 220px; background: #fff;
    border-right: 0.5px solid #e0e0d8; display: flex;
    flex-direction: column; height: 100vh;
  }
  .logo {
    padding: 18px 20px 14px; border-bottom: 0.5px solid #e0e0d8;
    display: flex; align-items: center; gap: 10px;
  }
  .logo-icon {
    width: 30px; height: 30px; border-radius: 50%;
    background: #1a7a5e; display: flex; align-items: center; justify-content: center;
  }
  .logo-icon i { color: #fff; font-size: 16px; }
  .logo-text { font-size: 15px; font-weight: 600; color: #1a1a1a; }
  .sidebar-section {
    padding: 14px 12px 6px; font-size: 11px; font-weight: 600;
    color: #aaa; letter-spacing: 0.06em; text-transform: uppercase;
  }
  .nav-item {
    display: flex; align-items: center; gap: 10px;
    padding: 9px 14px; border-radius: 8px; margin: 1px 8px;
    cursor: pointer; color: #555; font-size: 13px; transition: background 0.15s;
    text-decoration: none;
  }
  .nav-item:hover { background: #f5f5f0; }
  .nav-item.active { background: #e8f5f0; color: #1a7a5e; font-weight: 600; }
  .nav-item.active i { color: #1a7a5e; }
  .nav-item i { font-size: 17px; color: #aaa; }
  .nav-item.active i { color: #1a7a5e; }
  .nav-bottom { margin-top: auto; border-top: 0.5px solid #e0e0d8; padding: 10px 8px; }
  .nav-item.logout { color: #A32D2D; }
  .nav-item.logout i { color: #A32D2D; }

  /* MAIN */
  .main { flex: 1; overflow: auto; padding: 28px 32px; background: #f5f5f0; }
  .topbar {
    display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;
  }
  .page-title { font-size: 20px; font-weight: 600; color: #1a1a1a; }
  .page-sub { font-size: 13px; color: #888; margin-top: 3px; }
  .btn-add {
    display: flex; align-items: center; gap: 8px;
    background: #1a7a5e; color: #fff; border: none;
    padding: 10px 20px; border-radius: 8px; font-size: 13px;
    font-weight: 500; cursor: pointer; transition: background 0.15s;
  }
  .btn-add:hover { background: #155f49; }
  .btn-add i { font-size: 16px; }

  /* STATS */
  .stats-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; margin-bottom: 24px; }
  .stat-card {
    background: #fff; border-radius: 12px; padding: 16px 18px;
    border: 0.5px solid #e0e0d8;
  }
  .stat-label { font-size: 12px; color: #888; margin-bottom: 8px; }
  .stat-val { font-size: 24px; font-weight: 600; color: #1a1a1a; }
  .stat-badge {
    display: inline-flex; align-items: center; gap: 4px;
    font-size: 11px; margin-top: 6px; padding: 3px 10px; border-radius: 20px;
  }
  .badge-green { background: #e8f5f0; color: #1a7a5e; }
  .badge-blue  { background: #e6f1fb; color: #185FA5; }
  .badge-amber { background: #faeeda; color: #854F0B; }
  .badge-pink  { background: #fbeaf0; color: #993556; }

  /* TABLE CARD */
  .table-card {
    background: #fff; border-radius: 12px;
    border: 0.5px solid #e0e0d8; overflow: hidden;
  }
  .table-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 16px 20px; border-bottom: 0.5px solid #e0e0d8;
  }
  .table-title { font-size: 15px; font-weight: 600; color: #1a1a1a; }
  .search-box {
    display: flex; align-items: center; gap: 8px;
    background: #f5f5f0; border: 0.5px solid #e0e0d8;
    border-radius: 8px; padding: 7px 12px;
  }
  .search-box input {
    border: none; background: transparent; font-size: 13px;
    color: #1a1a1a; outline: none; width: 180px;
  }
  .search-box i { font-size: 15px; color: #aaa; }

  table { width: 100%; border-collapse: collapse; }
  thead tr { border-bottom: 0.5px solid #e0e0d8; }
  th {
    padding: 11px 16px; text-align: left; font-size: 11px;
    font-weight: 600; color: #aaa; text-transform: uppercase; letter-spacing: 0.05em;
  }
  td {
    padding: 13px 16px; font-size: 13px; color: #1a1a1a;
    border-bottom: 0.5px solid #f0f0e8;
  }
  tbody tr:last-child td { border-bottom: none; }
  tbody tr:hover { background: #f9f9f6; }

  /* BADGES */
  .sks-badge { display: inline-block; padding: 3px 10px; border-radius: 20px; font-size: 12px; font-weight: 500; }
  .sks-2 { background: #e8f5f0; color: #1a7a5e; }
  .sks-3 { background: #e6f1fb; color: #185FA5; }
  .sks-4 { background: #faeeda; color: #854F0B; }
  .semester-pill {
    display: inline-block; font-size: 12px; padding: 3px 10px;
    border-radius: 20px; background: #f0f0e8; color: #666;
  }
  .status-pill { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; padding: 3px 10px; border-radius: 20px; }
  .status-aktif    { background: #e8f5f0; color: #1a7a5e; }
  .status-nonaktif { background: #fcebeb; color: #A32D2D; }
  .dot { width: 6px; height: 6px; border-radius: 50%; }
  .dot-aktif    { background: #1a7a5e; }
  .dot-nonaktif { background: #A32D2D; }
  .kode-aktif   { font-weight: 600; color: #1a7a5e; }
  .kode-nonaktif{ font-weight: 600; color: #aaa; }
  .prodi-tag { font-size: 12px; color: #888; }

  /* ACTION BUTTONS */
  .action-btn {
    background: none; border: none; cursor: pointer;
    padding: 5px 6px; border-radius: 6px; color: #aaa;
    transition: background 0.12s, color 0.12s;
  }
  .action-btn:hover { background: #f0f0e8; color: #1a1a1a; }
  .action-btn i { font-size: 16px; }
  .action-btn.del:hover { background: #fcebeb; color: #A32D2D; }

  /* PAGINATION */
  .pagination {
    display: flex; align-items: center; justify-content: space-between;
    padding: 14px 20px; border-top: 0.5px solid #e0e0d8; font-size: 13px; color: #888;
  }
  .page-btns { display: flex; gap: 6px; }
  .page-btn {
    width: 30px; height: 30px; border-radius: 6px; border: 0.5px solid #e0e0d8;
    background: #fff; cursor: pointer; font-size: 13px; color: #555;
    display: flex; align-items: center; justify-content: center; transition: background 0.12s;
  }
  .page-btn:hover { background: #f0f0e8; }
  .page-btn.active { background: #1a7a5e; color: #fff; border-color: #1a7a5e; font-weight: 600; }
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="logo">
    <div class="logo-icon"><i class="ti ti-school"></i></div>
    <span class="logo-text">AkademiKu</span>
  </div>

  <div class="sidebar-section">Menu Utama</div>
  <a href="#" class="nav-item">
    <i class="ti ti-layout-dashboard"></i> Dashboard
  </a>
  <a href="#" class="nav-item">
    <i class="ti ti-users"></i> Data Mahasiswa
  </a>
  <a href="#" class="nav-item">
    <i class="ti ti-user-check"></i> Data Dosen
  </a>
  <a href="#" class="nav-item active">
    <i class="ti ti-book"></i> Data Matkul
  </a>
  <a href="#" class="nav-item">
    <i class="ti ti-chalkboard"></i> Pengampu MK
  </a>
  <a href="#" class="nav-item">
    <i class="ti ti-calendar"></i> Jadwal Kuliah
  </a>

  <div class="nav-bottom">
    <a href="#" class="nav-item">
      <i class="ti ti-lock"></i> Ganti Password
    </a>
    <a href="#" class="nav-item logout">
      <i class="ti ti-logout"></i> Logout
    </a>
  </div>
</aside>

<!-- MAIN CONTENT -->
<main class="main">

  <!-- TOPBAR -->
  <div class="topbar">
    <div>
      <div class="page-title">Data Matakuliah</div>
      <div class="page-sub">Kelola seluruh data matakuliah yang tersedia</div>
    </div>
    <button class="btn-add" onclick="alert('Form tambah matakuliah')">
      <i class="ti ti-plus"></i> Tambah Matakuliah
    </button>
  </div>

  <!-- STAT CARDS -->
  <div class="stats-row">
    <div class="stat-card">
      <div class="stat-label">Total Matakuliah</div>
      <div class="stat-val">42</div>
      <div class="stat-badge badge-green"><i class="ti ti-trending-up" style="font-size:12px"></i> +3 semester ini</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Matkul Aktif</div>
      <div class="stat-val">38</div>
      <div class="stat-badge badge-blue">90% dari total</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Total SKS</div>
      <div class="stat-val">124</div>
      <div class="stat-badge badge-amber">Sem. Ganjil 2024</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Program Studi</div>
      <div class="stat-val">4</div>
      <div class="stat-badge badge-pink">Prodi Aktif</div>
    </div>
  </div>

  <!-- TABLE -->
  <div class="table-card">
    <div class="table-header">
      <span class="table-title">Daftar Matakuliah</span>
      <div class="search-box">
        <i class="ti ti-search"></i>
        <input type="text" id="searchInput" placeholder="Cari matakuliah..." oninput="filterTable()">
      </div>
    </div>

    <table id="matkuTable">
      <thead>
        <tr>
          <th>Kode MK</th>
          <th>Nama Matakuliah</th>
          <th>SKS</th>
          <th>Semester</th>
          <th>Program Studi</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="tableBody">
        <tr>
          <td><span class="kode-aktif">MK-001</span></td>
          <td>Algoritma &amp; Pemrograman</td>
          <td><span class="sks-badge sks-3">3 SKS</span></td>
          <td><span class="semester-pill">Semester 1</span></td>
          <td><span class="prodi-tag">Teknik Informatika</span></td>
          <td><span class="status-pill status-aktif"><span class="dot dot-aktif"></span>Aktif</span></td>
          <td>
            <button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button>
            <button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td><span class="kode-aktif">MK-002</span></td>
          <td>Basis Data</td>
          <td><span class="sks-badge sks-3">3 SKS</span></td>
          <td><span class="semester-pill">Semester 3</span></td>
          <td><span class="prodi-tag">Teknik Informatika</span></td>
          <td><span class="status-pill status-aktif"><span class="dot dot-aktif"></span>Aktif</span></td>
          <td>
            <button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button>
            <button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td><span class="kode-aktif">MK-003</span></td>
          <td>Jaringan Komputer</td>
          <td><span class="sks-badge sks-4">4 SKS</span></td>
          <td><span class="semester-pill">Semester 4</span></td>
          <td><span class="prodi-tag">Teknik Informatika</span></td>
          <td><span class="status-pill status-aktif"><span class="dot dot-aktif"></span>Aktif</span></td>
          <td>
            <button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button>
            <button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td><span class="kode-aktif">MK-004</span></td>
          <td>Kalkulus</td>
          <td><span class="sks-badge sks-3">3 SKS</span></td>
          <td><span class="semester-pill">Semester 1</span></td>
          <td><span class="prodi-tag">Sistem Informasi</span></td>
          <td><span class="status-pill status-aktif"><span class="dot dot-aktif"></span>Aktif</span></td>
          <td>
            <button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button>
            <button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td><span class="kode-aktif">MK-005</span></td>
          <td>Pemrograman Web</td>
          <td><span class="sks-badge sks-3">3 SKS</span></td>
          <td><span class="semester-pill">Semester 4</span></td>
          <td><span class="prodi-tag">Sistem Informasi</span></td>
          <td><span class="status-pill status-aktif"><span class="dot dot-aktif"></span>Aktif</span></td>
          <td>
            <button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button>
            <button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td><span class="kode-aktif">MK-006</span></td>
          <td>Sistem Operasi</td>
          <td><span class="sks-badge sks-2">2 SKS</span></td>
          <td><span class="semester-pill">Semester 3</span></td>
          <td><span class="prodi-tag">Teknik Komputer</span></td>
          <td><span class="status-pill status-aktif"><span class="dot dot-aktif"></span>Aktif</span></td>
          <td>
            <button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button>
            <button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td><span class="kode-nonaktif">MK-007</span></td>
          <td>Pemrograman Berorientasi Objek</td>
          <td><span class="sks-badge sks-3">3 SKS</span></td>
          <td><span class="semester-pill">Semester 2</span></td>
          <td><span class="prodi-tag">Teknik Informatika</span></td>
          <td><span class="status-pill status-nonaktif"><span class="dot dot-nonaktif"></span>Nonaktif</span></td>
          <td>
            <button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button>
            <button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td><span class="kode-aktif">MK-008</span></td>
          <td>Etika Profesi &amp; Hukum TI</td>
          <td><span class="sks-badge sks-2">2 SKS</span></td>
          <td><span class="semester-pill">Semester 6</span></td>
          <td><span class="prodi-tag">Sistem Informasi</span></td>
          <td><span class="status-pill status-aktif"><span class="dot dot-aktif"></span>Aktif</span></td>
          <td>
            <button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button>
            <button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td><span class="kode-aktif">MK-009</span></td>
          <td>Kecerdasan Buatan</td>
          <td><span class="sks-badge sks-3">3 SKS</span></td>
          <td><span class="semester-pill">Semester 5</span></td>
          <td><span class="prodi-tag">Teknik Informatika</span></td>
          <td><span class="status-pill status-aktif"><span class="dot dot-aktif"></span>Aktif</span></td>
          <td>
            <button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button>
            <button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td><span class="kode-aktif">MK-010</span></td>
          <td>Manajemen Proyek TI</td>
          <td><span class="sks-badge sks-2">2 SKS</span></td>
          <td><span class="semester-pill">Semester 6</span></td>
          <td><span class="prodi-tag">Sistem Informasi</span></td>
          <td><span class="status-pill status-aktif"><span class="dot dot-aktif"></span>Aktif</span></td>
          <td>
            <button class="action-btn" title="Edit"><i class="ti ti-edit"></i></button>
            <button class="action-btn del" title="Hapus"><i class="ti ti-trash"></i></button>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- PAGINATION -->
    <div class="pagination">
      <span>Menampilkan 1–10 dari 42 data</span>
      <div class="page-btns">
        <button class="page-btn"><i class="ti ti-chevron-left" style="font-size:14px"></i></button>
        <button class="page-btn active">1</button>
        <button class="page-btn">2</button>
        <button class="page-btn">3</button>
        <button class="page-btn">4</button>
        <button class="page-btn">5</button>
        <button class="page-btn"><i class="ti ti-chevron-right" style="font-size:14px"></i></button>
      </div>
    </div>
  </div>

</main>

<script>
  function filterTable() {
    const query = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#tableBody tr');
    rows.forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(query) ? '' : 'none';
    });
  }
</script>

</body>
</html>