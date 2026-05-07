<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jadwal Kuliah - AkademikApp</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Segoe UI', sans-serif; background: #f4f6f8; display: flex; height: 100vh; overflow: hidden; }

  /* ===== SIDEBAR ===== */
  .sidebar {
    width: 160px; min-width: 160px; background: #1a7a5e;
    display: flex; flex-direction: column; height: 100vh;
    padding-bottom: 12px;
  }
  .logo {
    padding: 16px 16px 14px; display: flex; align-items: center;
    gap: 8px; border-bottom: 1px solid rgba(255,255,255,0.15);
  }
  .logo-icon {
    width: 28px; height: 28px; border-radius: 8px;
    background: rgba(255,255,255,0.2); display: flex;
    align-items: center; justify-content: center;
  }
  .logo-icon i { color: #fff; font-size: 15px; }
  .logo-text { font-size: 13px; font-weight: 700; color: #fff; line-height: 1.2; }

  .sec-label {
    padding: 14px 14px 4px; font-size: 10px; font-weight: 700;
    color: rgba(255,255,255,0.5); letter-spacing: .08em; text-transform: uppercase;
  }
  .nav-item {
    display: flex; align-items: center; gap: 8px;
    padding: 9px 14px; margin: 1px 8px; border-radius: 8px;
    cursor: pointer; color: rgba(255,255,255,0.75); font-size: 12.5px;
    transition: background .15s; text-decoration: none;
  }
  .nav-item:hover { background: rgba(255,255,255,0.12); color: #fff; }
  .nav-item.active { background: rgba(255,255,255,0.2); color: #fff; font-weight: 600; }
  .nav-item i { font-size: 16px; opacity: .85; }
  .nav-item.active i { opacity: 1; }
  .nav-bottom { margin-top: auto; border-top: 1px solid rgba(255,255,255,0.15); padding: 10px 8px 0; }

  /* ===== WRAPPER KANAN ===== */
  .right-wrap { flex: 1; display: flex; flex-direction: column; overflow: hidden; }

  /* TOPNAV */
  .topnav {
    background: #fff; border-bottom: 1px solid #e8e8e8;
    padding: 10px 24px; display: flex; align-items: center; justify-content: space-between;
  }
  .search-wrap {
    display: flex; align-items: center; gap: 8px;
    background: #f4f6f8; border: 1px solid #e0e0e0;
    border-radius: 8px; padding: 7px 14px; width: 280px;
  }
  .search-wrap input { border: none; background: transparent; font-size: 13px; color: #333; outline: none; width: 100%; }
  .search-wrap i { font-size: 15px; color: #bbb; }
  .topnav-right { display: flex; align-items: center; gap: 10px; }
  .tnav-btn {
    width: 32px; height: 32px; border-radius: 8px;
    background: #f4f6f8; border: 1px solid #e8e8e8;
    display: flex; align-items: center; justify-content: center; cursor: pointer;
  }
  .tnav-btn i { font-size: 16px; color: #666; }
  .avatar-top {
    width: 32px; height: 32px; border-radius: 50%;
    background: #1a7a5e; display: flex; align-items: center;
    justify-content: center; font-size: 13px; font-weight: 700; color: #fff; cursor: pointer;
  }

  /* ===== MAIN ===== */
  .main { flex: 1; overflow-y: auto; background: #f4f6f8; padding: 24px 28px; }

  /* PAGE HEAD */
  .page-head { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 22px; }
  .page-title { font-size: 20px; font-weight: 700; color: #1a1a1a; }
  .page-sub { font-size: 13px; color: #888; margin-top: 3px; }
  .btn-add {
    display: flex; align-items: center; gap: 7px;
    background: #1a7a5e; color: #fff; border: none;
    padding: 10px 18px; border-radius: 8px; font-size: 13px;
    font-weight: 600; cursor: pointer; white-space: nowrap;
    transition: background .15s;
  }
  .btn-add:hover { background: #155f49; }
  .btn-add i { font-size: 15px; }

  /* STAT CARDS */
  .stats-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px; }
  .stat-card {
    background: #fff; border-radius: 12px; padding: 16px 18px;
    border: 1px solid #ececec; display: flex; align-items: center; gap: 14px;
  }
  .stat-icon {
    width: 44px; height: 44px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
  }
  .si-green  { background: #e8f5f0; }
  .si-blue   { background: #e6f1fb; }
  .si-amber  { background: #faeeda; }
  .si-purple { background: #EEEDFE; }
  .stat-icon i { font-size: 22px; }
  .si-green  i { color: #1a7a5e; }
  .si-blue   i { color: #185FA5; }
  .si-amber  i { color: #854F0B; }
  .si-purple i { color: #3C3489; }
  .stat-info {}
  .stat-label { font-size: 12px; color: #888; margin-bottom: 4px; }
  .stat-val { font-size: 22px; font-weight: 700; color: #1a1a1a; }

  /* TABLE SECTION */
  .table-card { background: #fff; border-radius: 12px; border: 1px solid #ececec; overflow: hidden; }
  .table-toolbar {
    display: flex; align-items: center; justify-content: space-between;
    padding: 14px 20px; border-bottom: 1px solid #f0f0f0;
  }
  .table-title { font-size: 15px; font-weight: 700; color: #1a1a1a; }
  .toolbar-right { display: flex; align-items: center; gap: 10px; }
  .tb-search {
    display: flex; align-items: center; gap: 7px;
    background: #f4f6f8; border: 1px solid #e0e0e0;
    border-radius: 8px; padding: 7px 12px;
  }
  .tb-search input { border: none; background: transparent; font-size: 13px; color: #333; outline: none; width: 160px; }
  .tb-search i { font-size: 14px; color: #bbb; }
  .filter-sel {
    font-size: 13px; padding: 7px 12px; border-radius: 8px;
    border: 1px solid #e0e0e0; background: #f4f6f8; color: #555; outline: none; cursor: pointer;
  }
  .btn-export {
    display: flex; align-items: center; gap: 6px;
    background: #1a7a5e; color: #fff; border: none;
    padding: 8px 14px; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer;
  }
  .btn-export i { font-size: 15px; }

  /* TABLE */
  table { width: 100%; border-collapse: collapse; }
  thead tr { background: #f9f9f7; border-bottom: 1px solid #ececec; }
  th { padding: 11px 16px; text-align: left; font-size: 11px; font-weight: 700; color: #aaa; text-transform: uppercase; letter-spacing: .05em; }
  td { padding: 13px 16px; font-size: 13px; color: #333; border-bottom: 1px solid #f5f5f3; }
  tbody tr:last-child td { border-bottom: none; }
  tbody tr:hover { background: #fafafa; }

  /* NIM / Kode */
  .kode-link { font-weight: 700; color: #1a7a5e; font-size: 12.5px; }

  /* avatar mahasiswa */
  .mhs-cell { display: flex; align-items: center; gap: 10px; }
  .av { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; flex-shrink: 0; }
  .av-a { background: #e6f1fb; color: #185FA5; }
  .av-b { background: #e8f5f0; color: #1a7a5e; }
  .av-c { background: #EEEDFE; color: #3C3489; }
  .av-d { background: #faeeda; color: #854F0B; }
  .av-e { background: #fbeaf0; color: #993556; }
  .av-f { background: #fcebeb; color: #A32D2D; }
  .mhs-name { font-size: 13px; font-weight: 600; color: #1a1a1a; }
  .mhs-sub  { font-size: 11px; color: #aaa; }

  /* pills */
  .hari-pill { display: inline-block; font-size: 12px; font-weight: 600; padding: 3px 10px; border-radius: 20px; }
  .h-sen  { background: #e6f1fb; color: #185FA5; }
  .h-sel  { background: #e8f5f0; color: #1a7a5e; }
  .h-rab  { background: #faeeda; color: #854F0B; }
  .h-kam  { background: #EEEDFE; color: #3C3489; }
  .h-jum  { background: #fbeaf0; color: #993556; }

  .sks-badge { display: inline-block; padding: 3px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
  .sks-2 { background: #e8f5f0; color: #1a7a5e; }
  .sks-3 { background: #e6f1fb; color: #185FA5; }
  .sks-4 { background: #faeeda; color: #854F0B; }

  .ruang-tag { font-size: 12px; color: #555; background: #f4f6f8; padding: 3px 10px; border-radius: 6px; border: 1px solid #e8e8e8; display: inline-block; }

  .status-pill { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 20px; }
  .s-aktif    { background: #e8f5f0; color: #1a7a5e; }
  .s-libur    { background: #faeeda; color: #854F0B; }
  .s-batal    { background: #fcebeb; color: #A32D2D; }
  .dot { width: 6px; height: 6px; border-radius: 50%; }
  .d-aktif { background: #1a7a5e; }
  .d-libur { background: #854F0B; }
  .d-batal { background: #A32D2D; }

  /* action */
  .action-wrap { display: flex; gap: 4px; }
  .act-btn { width: 28px; height: 28px; border-radius: 6px; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: opacity .15s; }
  .act-btn i { font-size: 14px; color: #fff; }
  .act-view  { background: #185FA5; }
  .act-edit  { background: #1a7a5e; }
  .act-del   { background: #E24B4A; }
  .act-btn:hover { opacity: .82; }

  /* pagination */
  .pagination {
    display: flex; align-items: center; justify-content: space-between;
    padding: 13px 20px; border-top: 1px solid #f0f0f0; font-size: 13px; color: #888;
  }
  .page-btns { display: flex; gap: 5px; }
  .pg { width: 30px; height: 30px; border-radius: 6px; border: 1px solid #e8e8e8; background: #fff; cursor: pointer; font-size: 13px; color: #555; display: flex; align-items: center; justify-content: center; transition: background .12s; }
  .pg:hover { background: #f0f0f0; }
  .pg.active { background: #1a7a5e; color: #fff; border-color: #1a7a5e; font-weight: 700; }
</style>
</head>
<body>

<!-- ===== SIDEBAR ===== -->
<aside class="sidebar">
  <div class="logo">
    <div class="logo-icon"><i class="ti ti-school"></i></div>
    <span class="logo-text">AkademikApp</span>
  </div>

  <div class="sec-label">Menu Utama</div>
  <a href="#" class="nav-item"><i class="ti ti-layout-dashboard"></i> Dashboard</a>
  <a href="#" class="nav-item"><i class="ti ti-users"></i> Data Mahasiswa</a>
  <a href="#" class="nav-item"><i class="ti ti-user-check"></i> Data Dosen</a>
  <a href="#" class="nav-item"><i class="ti ti-book"></i> Data Matkul</a>

  <div class="sec-label">Akademik</div>
  <a href="#" class="nav-item"><i class="ti ti-chalkboard"></i> Pengampu MK</a>
  <a href="#" class="nav-item active"><i class="ti ti-calendar"></i> Jadwal Kuliah</a>

  <div class="sec-label">Akun</div>
  <div class="nav-bottom">
    <a href="#" class="nav-item"><i class="ti ti-lock"></i> Ganti Password</a>
    <a href="#" class="nav-item" style="color:rgba(255,255,255,0.6)"><i class="ti ti-logout"></i> Logout</a>
  </div>
</aside>

<!-- ===== KANAN ===== -->
<div class="right-wrap">

  <!-- TOPNAV -->
  <div class="topnav">
    <div class="search-wrap">
      <i class="ti ti-search"></i>
      <input type="text" id="globalSearch" placeholder="Search..." oninput="filterTable()">
    </div>
    <div class="topnav-right">
      <div class="tnav-btn"><i class="ti ti-moon"></i></div>
      <div class="tnav-btn"><i class="ti ti-shopping-cart"></i></div>
      <div class="tnav-btn"><i class="ti ti-bell"></i></div>
      <div class="tnav-btn"><i class="ti ti-settings"></i></div>
      <div class="avatar-top">C</div>
    </div>
  </div>

  <!-- MAIN -->
  <main class="main">

    <!-- PAGE HEAD -->
    <div class="page-head">
      <div>
        <div class="page-title">Jadwal Kuliah</div>
        <div class="page-sub">Manajemen jadwal kuliah seluruh program studi</div>
      </div>
      <button class="btn-add" onclick="alert('Form tambah jadwal')">
        <i class="ti ti-plus"></i> Tambah Jadwal
      </button>
    </div>

    <!-- STAT CARDS -->
    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon si-green"><i class="ti ti-calendar-stats"></i></div>
        <div class="stat-info">
          <div class="stat-label">Total Jadwal</div>
          <div class="stat-val">128</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon si-blue"><i class="ti ti-calendar-check"></i></div>
        <div class="stat-info">
          <div class="stat-label">Jadwal Aktif</div>
          <div class="stat-val">115</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon si-amber"><i class="ti ti-door"></i></div>
        <div class="stat-info">
          <div class="stat-label">Ruangan Digunakan</div>
          <div class="stat-val">24</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon si-purple"><i class="ti ti-clock"></i></div>
        <div class="stat-info">
          <div class="stat-label">Total Jam/Minggu</div>
          <div class="stat-val">312</div>
        </div>
      </div>
    </div>

    <!-- TABLE CARD -->
    <div class="table-card">
      <div class="table-toolbar">
        <span class="table-title">Daftar Jadwal Kuliah</span>
        <div class="toolbar-right">
          <div class="tb-search">
            <i class="ti ti-search"></i>
            <input type="text" id="tableSearch" placeholder="Cari jadwal..." oninput="filterTable()">
          </div>
          <select class="filter-sel" id="filterHari" onchange="filterTable()">
            <option value="">Semua Hari</option>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
          </select>
          <select class="filter-sel" id="filterProdi" onchange="filterTable()">
            <option value="">Semua Prodi</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknik Komputer">Teknik Komputer</option>
            <option value="Manajemen Informatika">Manajemen Informatika</option>
          </select>
          <button class="btn-export"><i class="ti ti-download"></i> Export</button>
        </div>
      </div>

      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Kode MK</th>
            <th>Matakuliah &amp; Dosen</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Ruangan</th>
            <th>SKS</th>
            <th>Program Studi</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody">

          <tr data-hari="Senin" data-prodi="Teknik Informatika">
            <td style="color:#bbb;font-size:12px">1</td>
            <td><span class="kode-link">MK-001</span></td>
            <td>
              <div class="mhs-cell">
                <div class="av av-b">A</div>
                <div>
                  <div class="mhs-name">Algoritma &amp; Pemrograman</div>
                  <div class="mhs-sub">Dr. Budi Santoso, M.Kom</div>
                </div>
              </div>
            </td>
            <td><span class="hari-pill h-sen">Senin</span></td>
            <td style="font-size:12px;color:#555">07.30 – 10.00</td>
            <td><span class="ruang-tag">Lab A-101</span></td>
            <td><span class="sks-badge sks-3">3 SKS</span></td>
            <td style="font-size:12px;color:#888">Teknik Informatika</td>
            <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
            <td><div class="action-wrap">
              <button class="act-btn act-view" title="Lihat"><i class="ti ti-eye"></i></button>
              <button class="act-btn act-edit" title="Edit"><i class="ti ti-edit"></i></button>
              <button class="act-btn act-del"  title="Hapus"><i class="ti ti-trash"></i></button>
            </div></td>
          </tr>

          <tr data-hari="Senin" data-prodi="Sistem Informasi">
            <td style="color:#bbb;font-size:12px">2</td>
            <td><span class="kode-link">MK-004</span></td>
            <td>
              <div class="mhs-cell">
                <div class="av av-d">K</div>
                <div>
                  <div class="mhs-name">Kalkulus</div>
                  <div class="mhs-sub">Dewi Puspita, M.Si</div>
                </div>
              </div>
            </td>
            <td><span class="hari-pill h-sen">Senin</span></td>
            <td style="font-size:12px;color:#555">10.00 – 12.30</td>
            <td><span class="ruang-tag">Gdg B-203</span></td>
            <td><span class="sks-badge sks-3">3 SKS</span></td>
            <td style="font-size:12px;color:#888">Sistem Informasi</td>
            <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
            <td><div class="action-wrap">
              <button class="act-btn act-view" title="Lihat"><i class="ti ti-eye"></i></button>
              <button class="act-btn act-edit" title="Edit"><i class="ti ti-edit"></i></button>
              <button class="act-btn act-del"  title="Hapus"><i class="ti ti-trash"></i></button>
            </div></td>
          </tr>

          <tr data-hari="Selasa" data-prodi="Teknik Informatika">
            <td style="color:#bbb;font-size:12px">3</td>
            <td><span class="kode-link">MK-002</span></td>
            <td>
              <div class="mhs-cell">
                <div class="av av-a">B</div>
                <div>
                  <div class="mhs-name">Basis Data</div>
                  <div class="mhs-sub">Siti Rahayu, S.T., M.T.</div>
                </div>
              </div>
            </td>
            <td><span class="hari-pill h-sel">Selasa</span></td>
            <td style="font-size:12px;color:#555">08.00 – 10.30</td>
            <td><span class="ruang-tag">Lab A-102</span></td>
            <td><span class="sks-badge sks-3">3 SKS</span></td>
            <td style="font-size:12px;color:#888">Teknik Informatika</td>
            <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
            <td><div class="action-wrap">
              <button class="act-btn act-view" title="Lihat"><i class="ti ti-eye"></i></button>
              <button class="act-btn act-edit" title="Edit"><i class="ti ti-edit"></i></button>
              <button class="act-btn act-del"  title="Hapus"><i class="ti ti-trash"></i></button>
            </div></td>
          </tr>

          <tr data-hari="Selasa" data-prodi="Teknik Komputer">
            <td style="color:#bbb;font-size:12px">4</td>
            <td><span class="kode-link">MK-006</span></td>
            <td>
              <div class="mhs-cell">
                <div class="av av-c">S</div>
                <div>
                  <div class="mhs-name">Sistem Operasi</div>
                  <div class="mhs-sub">Fajar Nugroho, S.Kom., M.T.</div>
                </div>
              </div>
            </td>
            <td><span class="hari-pill h-sel">Selasa</span></td>
            <td style="font-size:12px;color:#555">13.00 – 14.40</td>
            <td><span class="ruang-tag">Gdg C-301</span></td>
            <td><span class="sks-badge sks-2">2 SKS</span></td>
            <td style="font-size:12px;color:#888">Teknik Komputer</td>
            <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
            <td><div class="action-wrap">
              <button class="act-btn act-view" title="Lihat"><i class="ti ti-eye"></i></button>
              <button class="act-btn act-edit" title="Edit"><i class="ti ti-edit"></i></button>
              <button class="act-btn act-del"  title="Hapus"><i class="ti ti-trash"></i></button>
            </div></td>
          </tr>

          <tr data-hari="Rabu" data-prodi="Teknik Informatika">
            <td style="color:#bbb;font-size:12px">5</td>
            <td><span class="kode-link">MK-003</span></td>
            <td>
              <div class="mhs-cell">
                <div class="av av-e">J</div>
                <div>
                  <div class="mhs-name">Jaringan Komputer</div>
                  <div class="mhs-sub">Ahmad Wijaya, Ph.D</div>
                </div>
              </div>
            </td>
            <td><span class="hari-pill h-rab">Rabu</span></td>
            <td style="font-size:12px;color:#555">07.30 – 11.10</td>
            <td><span class="ruang-tag">Lab A-103</span></td>
            <td><span class="sks-badge sks-4">4 SKS</span></td>
            <td style="font-size:12px;color:#888">Teknik Informatika</td>
            <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
            <td><div class="action-wrap">
              <button class="act-btn act-view" title="Lihat"><i class="ti ti-eye"></i></button>
              <button class="act-btn act-edit" title="Edit"><i class="ti ti-edit"></i></button>
              <button class="act-btn act-del"  title="Hapus"><i class="ti ti-trash"></i></button>
            </div></td>
          </tr>

          <tr data-hari="Rabu" data-prodi="Sistem Informasi">
            <td style="color:#bbb;font-size:12px">6</td>
            <td><span class="kode-link">MK-005</span></td>
            <td>
              <div class="mhs-cell">
                <div class="av av-f">P</div>
                <div>
                  <div class="mhs-name">Pemrograman Web</div>
                  <div class="mhs-sub">Rudi Hartono, M.Kom</div>
                </div>
              </div>
            </td>
            <td><span class="hari-pill h-rab">Rabu</span></td>
            <td style="font-size:12px;color:#555">13.00 – 15.30</td>
            <td><span class="ruang-tag">Lab B-201</span></td>
            <td><span class="sks-badge sks-3">3 SKS</span></td>
            <td style="font-size:12px;color:#888">Sistem Informasi</td>
            <td><span class="status-pill s-libur"><span class="dot d-libur"></span>Libur</span></td>
            <td><div class="action-wrap">
              <button class="act-btn act-view" title="Lihat"><i class="ti ti-eye"></i></button>
              <button class="act-btn act-edit" title="Edit"><i class="ti ti-edit"></i></button>
              <button class="act-btn act-del"  title="Hapus"><i class="ti ti-trash"></i></button>
            </div></td>
          </tr>

          <tr data-hari="Kamis" data-prodi="Manajemen Informatika">
            <td style="color:#bbb;font-size:12px">7</td>
            <td><span class="kode-link">MK-008</span></td>
            <td>
              <div class="mhs-cell">
                <div class="av av-d">E</div>
                <div>
                  <div class="mhs-name">Etika Profesi &amp; Hukum TI</div>
                  <div class="mhs-sub">Linda Kusuma, M.M.</div>
                </div>
              </div>
            </td>
            <td><span class="hari-pill h-kam">Kamis</span></td>
            <td style="font-size:12px;color:#555">08.00 – 09.40</td>
            <td><span class="ruang-tag">Gdg D-401</span></td>
            <td><span class="sks-badge sks-2">2 SKS</span></td>
            <td style="font-size:12px;color:#888">Manajemen Informatika</td>
            <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
            <td><div class="action-wrap">
              <button class="act-btn act-view" title="Lihat"><i class="ti ti-eye"></i></button>
              <button class="act-btn act-edit" title="Edit"><i class="ti ti-edit"></i></button>
              <button class="act-btn act-del"  title="Hapus"><i class="ti ti-trash"></i></button>
            </div></td>
          </tr>

          <tr data-hari="Kamis" data-prodi="Sistem Informasi">
            <td style="color:#bbb;font-size:12px">8</td>
            <td><span class="kode-link">MK-010</span></td>
            <td>
              <div class="mhs-cell">
                <div class="av av-c">M</div>
                <div>
                  <div class="mhs-name">Manajemen Proyek TI</div>
                  <div class="mhs-sub">Dewi Puspita, M.Si</div>
                </div>
              </div>
            </td>
            <td><span class="hari-pill h-kam">Kamis</span></td>
            <td style="font-size:12px;color:#555">10.00 – 11.40</td>
            <td><span class="ruang-tag">Gdg B-205</span></td>
            <td><span class="sks-badge sks-2">2 SKS</span></td>
            <td style="font-size:12px;color:#888">Sistem Informasi</td>
            <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
            <td><div class="action-wrap">
              <button class="act-btn act-view" title="Lihat"><i class="ti ti-eye"></i></button>
              <button class="act-btn act-edit" title="Edit"><i class="ti ti-edit"></i></button>
              <button class="act-btn act-del"  title="Hapus"><i class="ti ti-trash"></i></button>
            </div></td>
          </tr>

          <tr data-hari="Jumat" data-prodi="Teknik Informatika">
            <td style="color:#bbb;font-size:12px">9</td>
            <td><span class="kode-link">MK-009</span></td>
            <td>
              <div class="mhs-cell">
                <div class="av av-b">K</div>
                <div>
                  <div class="mhs-name">Kecerdasan Buatan</div>
                  <div class="mhs-sub">Dr. Budi Santoso, M.Kom</div>
                </div>
              </div>
            </td>
            <td><span class="hari-pill h-jum">Jumat</span></td>
            <td style="font-size:12px;color:#555">07.30 – 10.00</td>
            <td><span class="ruang-tag">Lab A-104</span></td>
            <td><span class="sks-badge sks-3">3 SKS</span></td>
            <td style="font-size:12px;color:#888">Teknik Informatika</td>
            <td><span class="status-pill s-batal"><span class="dot d-batal"></span>Dibatalkan</span></td>
            <td><div class="action-wrap">
              <button class="act-btn act-view" title="Lihat"><i class="ti ti-eye"></i></button>
              <button class="act-btn act-edit" title="Edit"><i class="ti ti-edit"></i></button>
              <button class="act-btn act-del"  title="Hapus"><i class="ti ti-trash"></i></button>
            </div></td>
          </tr>

          <tr data-hari="Jumat" data-prodi="Teknik Komputer">
            <td style="color:#bbb;font-size:12px">10</td>
            <td><span class="kode-link">MK-011</span></td>
            <td>
              <div class="mhs-cell">
                <div class="av av-a">A</div>
                <div>
                  <div class="mhs-name">Arsitektur Komputer</div>
                  <div class="mhs-sub">Ahmad Wijaya, Ph.D</div>
                </div>
              </div>
            </td>
            <td><span class="hari-pill h-jum">Jumat</span></td>
            <td style="font-size:12px;color:#555">13.00 – 15.30</td>
            <td><span class="ruang-tag">Gdg C-302</span></td>
            <td><span class="sks-badge sks-3">3 SKS</span></td>
            <td style="font-size:12px;color:#888">Teknik Komputer</td>
            <td><span class="status-pill s-aktif"><span class="dot d-aktif"></span>Aktif</span></td>
            <td><div class="action-wrap">
              <button class="act-btn act-view" title="Lihat"><i class="ti ti-eye"></i></button>
              <button class="act-btn act-edit" title="Edit"><i class="ti ti-edit"></i></button>
              <button class="act-btn act-del"  title="Hapus"><i class="ti ti-trash"></i></button>
            </div></td>
          </tr>

        </tbody>
      </table>

      <!-- PAGINATION -->
      <div class="pagination">
        <span>Menampilkan 1–10 dari 128 data</span>
        <div class="page-btns">
          <button class="pg"><i class="ti ti-chevron-left" style="font-size:13px"></i></button>
          <button class="pg active">1</button>
          <button class="pg">2</button>
          <button class="pg">3</button>
          <button class="pg">4</button>
          <button class="pg">5</button>
          <button class="pg"><i class="ti ti-chevron-right" style="font-size:13px"></i></button>
        </div>
      </div>
    </div>

  </main>
</div>

<script>
  function filterTable() {
    const q1  = (document.getElementById('globalSearch').value || '').toLowerCase();
    const q2  = (document.getElementById('tableSearch').value  || '').toLowerCase();
    const q   = q1 || q2;
    const hari  = document.getElementById('filterHari').value;
    const prodi = document.getElementById('filterProdi').value;

    document.querySelectorAll('#tableBody tr').forEach(tr => {
      const txt  = tr.textContent.toLowerCase();
      const dh   = tr.dataset.hari  || '';
      const dp   = tr.dataset.prodi || '';
      const mQ   = txt.includes(q);
      const mH   = !hari  || dh === hari;
      const mP   = !prodi || dp === prodi;
      tr.style.display = (mQ && mH && mP) ? '' : 'none';
    });
  }
</script>

</body>
</html>