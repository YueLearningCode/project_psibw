<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Data Dosen – AkademikApp</title>
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

  body { font-family: 'DM Sans', sans-serif; background: var(--bg); color: var(--text); display: flex; min-height: 100vh; }

  /* ── SIDEBAR ── */
  .sidebar {
    width: var(--sidebar-w); min-height: 100vh; background: var(--sidebar-bg);
    display: flex; flex-direction: column; position: fixed; left: 0; top: 0;
    z-index: 100; overflow-y: auto;
  }
  .sidebar-logo {
    display: flex; align-items: center; gap: 10px; padding: 20px 18px 16px;
    color: #fff; font-weight: 700; font-size: 17px; letter-spacing: -0.3px;
  }
  .sidebar-logo-icon {
    width: 32px; height: 32px; background: #fff; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
  }
  .sidebar-logo-icon svg { width: 18px; height: 18px; }
  .sidebar-section-label {
    font-size: 10px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;
    color: rgba(255,255,255,0.5); padding: 14px 18px 6px;
  }
  .sidebar-item {
    display: flex; align-items: center; gap: 11px; padding: 9px 18px;
    color: rgba(255,255,255,0.75); font-size: 14px; font-weight: 500;
    cursor: pointer; border-radius: 10px; margin: 1px 8px;
    transition: background 0.15s, color 0.15s; text-decoration: none;
  }
  .sidebar-item:hover { background: rgba(255,255,255,0.12); color: #fff; }
  .sidebar-item.active { background: rgba(255,255,255,0.18); color: #fff; }
  .sidebar-item i { width: 18px; text-align: center; font-size: 14px; opacity: 0.85; }

  /* ── MAIN ── */
  .main { margin-left: var(--sidebar-w); flex: 1; display: flex; flex-direction: column; min-height: 100vh; }

  /* ── NAVBAR ── */
  .navbar {
    height: var(--navbar-h); background: var(--white); display: flex; align-items: center;
    padding: 0 28px; gap: 14px; position: sticky; top: 0; z-index: 90;
    border-bottom: 1px solid var(--border);
  }
  .navbar-search {
    flex: 1; max-width: 320px; display: flex; align-items: center; gap: 9px;
    background: var(--bg); border: 1px solid var(--border); border-radius: 10px;
    padding: 0 14px; height: 38px;
  }
  .navbar-search input { border: none; background: transparent; font-family: inherit; font-size: 13.5px; color: var(--text); width: 100%; outline: none; }
  .navbar-search input::placeholder { color: var(--muted); }
  .navbar-right { margin-left: auto; display: flex; align-items: center; gap: 6px; }
  .nav-icon-btn {
    width: 36px; height: 36px; border: none; background: transparent; border-radius: 50%;
    cursor: pointer; display: flex; align-items: center; justify-content: center;
    color: var(--muted); font-size: 15px; position: relative; transition: background 0.15s;
  }
  .nav-icon-btn:hover { background: var(--bg); }
  .nav-dot {
    width: 8px; height: 8px; background: var(--red); border-radius: 50%;
    border: 2px solid #fff; position: absolute; top: 3px; right: 3px;
  }
  .nav-avatar {
    width: 34px; height: 34px; border-radius: 50%;
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-weight: 700; font-size: 13px; cursor: pointer; margin-left: 4px;
  }

  /* ── CONTENT ── */
  .content { flex: 1; padding: 28px; display: flex; flex-direction: column; gap: 22px; }

  .page-header { display: flex; align-items: center; justify-content: space-between; }
  .page-header h1 { font-size: 22px; font-weight: 700; letter-spacing: -0.3px; }
  .page-header-right { display: flex; align-items: center; gap: 10px; }

  .btn-primary {
    display: flex; align-items: center; gap: 8px;
    background: var(--green-accent); color: #1a1d23;
    border: none; border-radius: 10px; padding: 8px 18px;
    font-family: inherit; font-size: 14px; font-weight: 600;
    cursor: pointer; transition: opacity 0.15s;
  }
  .btn-primary:hover { opacity: 0.88; }

  /* ── STAT CARDS ── */
  .grid-4 { display: grid; grid-template-columns: repeat(4,1fr); gap: 18px; }

  .card {
    background: var(--white); border-radius: var(--card-radius);
    padding: 22px; border: 1px solid var(--border);
  }

  /* ── STATUS BADGES ── */
  .badge {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 12px; font-weight: 600; padding: 3px 10px; border-radius: 20px;
  }
  .badge-aktif    { background: #dcfce7; color: #16a34a; }
  .badge-nonaktif { background: #f1f5f9; color: #475569; }
  .badge-s3 { background: #e0e7ff; color: #3730a3; }
  .badge-s2 { background: #e8f5f0; color: #1a7a5e; }
  .badge-s1 { background: #fef9c3; color: #a16207; }

  /* ── JABATAN CHIPS ── */
  .chip-gb  { background: #fef3c7; color: #92400e; font-size:11px; font-weight:700; padding:2px 9px; border-radius:20px; }
  .chip-lk  { background: #ede9fe; color: #5b21b6; font-size:11px; font-weight:700; padding:2px 9px; border-radius:20px; }
  .chip-l   { background: #e0f2fe; color: #0369a1; font-size:11px; font-weight:700; padding:2px 9px; border-radius:20px; }
  .chip-aa  { background: #fce7f3; color: #9d174d; font-size:11px; font-weight:700; padding:2px 9px; border-radius:20px; }

  /* scrollbar */
  ::-webkit-scrollbar { width: 5px; }
  ::-webkit-scrollbar-track { background: transparent; }
  ::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.15); border-radius: 10px; }
</style>
</head>
<body>

<!-- ══════════════ SIDEBAR ══════════════ -->
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
  <a class="sidebar-item" href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a>
  <a class="sidebar-item" href="dashboard.php"><i class="fa-solid fa-user-graduate"></i> Data Mahasiswa</a>
  <a class="sidebar-item active" href="#"><i class="fa-solid fa-chalkboard-user"></i> Data Dosen</a>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-book-open"></i> Data Matkul</a>

  <div class="sidebar-section-label">Akademik</div>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-person-chalkboard"></i> Pengampu MK</a>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-calendar-days"></i> Jadwal Kuliah</a>

  <div class="sidebar-section-label">Akun</div>
  <a class="sidebar-item" href="#"><i class="fa-solid fa-key"></i> Ganti Password</a>
  <a class="sidebar-item" href="#" style="color:rgba(255,180,180,0.85);">
    <i class="fa-solid fa-right-from-bracket"></i> Logout
  </a>
</aside>

<!-- ══════════════ MAIN ══════════════ -->
<div class="main">

  <!-- NAVBAR -->
  <nav class="navbar">
    <button class="nav-icon-btn"><i class="fa-solid fa-bars"></i></button>
    <div class="navbar-search">
      <i class="fa-solid fa-magnifying-glass" style="color:var(--muted);font-size:13px;"></i>
      <input type="text" placeholder="Search...">
    </div>
    <div class="navbar-right">
      <button class="nav-icon-btn"><i class="fa-regular fa-moon"></i></button>
      <button class="nav-icon-btn" style="position:relative;">
        <i class="fa-regular fa-bell"></i>
        <span class="nav-dot" style="background:#f59e0b;"></span>
      </button>
      <button class="nav-icon-btn"><i class="fa-solid fa-gear"></i></button>
      <div class="nav-avatar">A</div>
    </div>
  </nav>

  <!-- CONTENT -->
  <main class="content">

    <!-- Page Header -->
    <div class="page-header">
      <div>
        <h1>Data Dosen</h1>
        <p style="font-size:13px;color:var(--muted);margin-top:3px;">Manajemen data seluruh dosen pengajar</p>
      </div>
      <div class="page-header-right">
        <button class="btn-primary" onclick="document.getElementById('modalTambah').style.display='flex'">
          <i class="fa-solid fa-plus"></i> Tambah Dosen
        </button>
      </div>
    </div>

    <!-- ── 4 Stat Cards ── -->
    <div class="grid-4">

      <div class="card" style="display:flex;align-items:center;gap:16px;">
        <div style="width:48px;height:48px;border-radius:14px;background:#e8f5f0;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <i class="fa-solid fa-chalkboard-user" style="color:var(--green);font-size:20px;"></i>
        </div>
        <div>
          <div style="font-size:12px;color:var(--muted);font-weight:500;">Total Dosen</div>
          <div style="font-size:26px;font-weight:700;letter-spacing:-0.5px;">86</div>
        </div>
      </div>

      <div class="card" style="display:flex;align-items:center;gap:16px;">
        <div style="width:48px;height:48px;border-radius:14px;background:#dcfce7;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <i class="fa-solid fa-user-check" style="color:#16a34a;font-size:20px;"></i>
        </div>
        <div>
          <div style="font-size:12px;color:var(--muted);font-weight:500;">Dosen Aktif</div>
          <div style="font-size:26px;font-weight:700;letter-spacing:-0.5px;">74</div>
        </div>
      </div>

      <div class="card" style="display:flex;align-items:center;gap:16px;">
        <div style="width:48px;height:48px;border-radius:14px;background:#e0e7ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <i class="fa-solid fa-graduation-cap" style="color:#3730a3;font-size:20px;"></i>
        </div>
        <div>
          <div style="font-size:12px;color:var(--muted);font-weight:500;">Bergelar S3 / Doktor</div>
          <div style="font-size:26px;font-weight:700;letter-spacing:-0.5px;">38</div>
        </div>
      </div>

      <div class="card" style="display:flex;align-items:center;gap:16px;">
        <div style="width:48px;height:48px;border-radius:14px;background:#fef3c7;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <i class="fa-solid fa-award" style="color:#92400e;font-size:20px;"></i>
        </div>
        <div>
          <div style="font-size:12px;color:var(--muted);font-weight:500;">Guru Besar / Professor</div>
          <div style="font-size:26px;font-weight:700;letter-spacing:-0.5px;">7</div>
        </div>
      </div>

    </div>

    <!-- ── Distribusi per Jabatan (mini chart row) ── -->
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:18px;">

      <!-- Distribusi Jabatan Fungsional -->
      <div class="card">
        <div style="font-size:15px;font-weight:700;margin-bottom:16px;">Distribusi Jabatan Fungsional</div>
        <?php
          $jabatan = [
            ['Guru Besar',     7,  86, '#92400e', '#fef3c7'],
            ['Lektor Kepala',  18, 86, '#5b21b6', '#ede9fe'],
            ['Lektor',         30, 86, '#0369a1', '#e0f2fe'],
            ['Asisten Ahli',   31, 86, '#9d174d', '#fce7f3'],
          ];
          foreach($jabatan as $j):
            $pct = round($j[1]/$j[2]*100);
        ?>
        <div style="margin-bottom:14px;">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:6px;">
            <span style="font-size:13px;font-weight:500;"><?= $j[0] ?></span>
            <span style="font-size:13px;font-weight:700;color:<?= $j[3] ?>;"><?= $j[1] ?> dosen</span>
          </div>
          <div style="height:8px;background:var(--border);border-radius:10px;overflow:hidden;">
            <div style="height:100%;width:<?= $pct ?>%;background:<?= $j[3] ?>;border-radius:10px;transition:width 0.6s;"></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Distribusi Pendidikan Terakhir -->
      <div class="card">
        <div style="font-size:15px;font-weight:700;margin-bottom:16px;">Distribusi Pendidikan Terakhir</div>
        <?php
          $pendidikan = [
            ['S3 / Doktor',  38, 86, '#3730a3', '#e0e7ff'],
            ['S2 / Magister',45, 86, '#1a7a5e', '#e8f5f0'],
            ['S1 / Sarjana',  3, 86, '#a16207', '#fef9c3'],
          ];
          foreach($pendidikan as $p):
            $pct = round($p[1]/$p[2]*100);
        ?>
        <div style="margin-bottom:14px;">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:6px;">
            <span style="font-size:13px;font-weight:500;"><?= $p[0] ?></span>
            <span style="font-size:13px;font-weight:700;color:<?= $p[3] ?>;"><?= $p[1] ?> dosen</span>
          </div>
          <div style="height:8px;background:var(--border);border-radius:10px;overflow:hidden;">
            <div style="height:100%;width:<?= $pct ?>%;background:<?= $p[3] ?>;border-radius:10px;"></div>
          </div>
        </div>
        <?php endforeach; ?>

        <!-- Donut placeholder visual -->
        <div style="display:flex;gap:10px;margin-top:18px;flex-wrap:wrap;">
          <div style="display:flex;align-items:center;gap:5px;font-size:12px;color:var(--muted);">
            <span style="width:10px;height:10px;border-radius:50%;background:#3730a3;display:inline-block;"></span> S3 (44%)
          </div>
          <div style="display:flex;align-items:center;gap:5px;font-size:12px;color:var(--muted);">
            <span style="width:10px;height:10px;border-radius:50%;background:#1a7a5e;display:inline-block;"></span> S2 (52%)
          </div>
          <div style="display:flex;align-items:center;gap:5px;font-size:12px;color:var(--muted);">
            <span style="width:10px;height:10px;border-radius:50%;background:#a16207;display:inline-block;"></span> S1 (4%)
          </div>
        </div>
      </div>

    </div>

    <!-- ── Tabel Data Dosen ── -->
    <div class="card" style="padding:0;overflow:hidden;">

      <!-- Toolbar -->
      <div style="display:flex;align-items:center;justify-content:space-between;padding:18px 22px;border-bottom:1px solid var(--border);flex-wrap:wrap;gap:12px;">
        <div style="font-size:16px;font-weight:700;">Daftar Dosen</div>
        <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;">

          <!-- Search -->
          <div style="display:flex;align-items:center;gap:8px;background:var(--bg);border:1px solid var(--border);border-radius:9px;padding:0 12px;height:36px;">
            <i class="fa-solid fa-magnifying-glass" style="color:var(--muted);font-size:12px;"></i>
            <input type="text" placeholder="Cari dosen / NIDN..." style="border:none;background:transparent;font-family:inherit;font-size:13px;outline:none;width:180px;color:var(--text);">
          </div>

          <!-- Filter Prodi -->
          <select style="border:1px solid var(--border);background:#fff;border-radius:9px;padding:0 12px;height:36px;font-family:inherit;font-size:13px;color:var(--text);outline:none;cursor:pointer;">
            <option value="">Semua Prodi</option>
            <option>Teknik Informatika</option>
            <option>Sistem Informasi</option>
            <option>Teknik Elektro</option>
            <option>Manajemen</option>
          </select>

          <!-- Filter Jabatan -->
          <select style="border:1px solid var(--border);background:#fff;border-radius:9px;padding:0 12px;height:36px;font-family:inherit;font-size:13px;color:var(--text);outline:none;cursor:pointer;">
            <option value="">Semua Jabatan</option>
            <option>Guru Besar</option>
            <option>Lektor Kepala</option>
            <option>Lektor</option>
            <option>Asisten Ahli</option>
          </select>

          <!-- Export -->
          <button class="btn-primary" style="height:36px;padding:0 14px;font-size:13px;">
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
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">NIDN</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">Nama Dosen</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">Program Studi</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">Jabatan Fungsional</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">Pendidikan</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">Bidang Keahlian</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">No. HP</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:left;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">Status</th>
              <th style="padding:11px 16px;font-size:11px;font-weight:600;color:var(--muted);text-align:center;text-transform:uppercase;letter-spacing:0.5px;white-space:nowrap;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              // nidn, nama, prodi, jabatan, pendidikan, keahlian, no_hp, status
              $dosen = [
                ['0112057801','Prof. Dr. Ahmad Fauzi, M.T.','Teknik Informatika','Guru Besar','S3','Kecerdasan Buatan','081311111101','Aktif'],
                ['0205068902','Dr. Budi Raharjo, M.Kom.','Sistem Informasi','Lektor Kepala','S3','Basis Data','081311111102','Aktif'],
                ['0318077003','Dr. Citra Dewi, M.T.','Teknik Elektro','Lektor Kepala','S3','Sistem Kendali','081311111103','Aktif'],
                ['0427089104','Drs. Doni Prasetyo, M.M.','Manajemen','Lektor','S2','Manajemen SDM','081311111104','Aktif'],
                ['0509076505','Dr. Eka Susanti, M.Kom.','Teknik Informatika','Lektor','S3','Jaringan Komputer','081311111105','Aktif'],
                ['0614058806','Fajar Nugroho, S.T., M.T.','Teknik Elektro','Asisten Ahli','S2','Elektronika Daya','081311111106','Aktif'],
                ['0723089207','Gita Puspita, S.Kom., M.Kom.','Sistem Informasi','Asisten Ahli','S2','Rekayasa Perangkat Lunak','081311111107','Aktif'],
                ['0831077308','Prof. Dr. Hendra Wijaya, M.T.','Teknik Informatika','Guru Besar','S3','Komputasi Paralel','081311111108','Aktif'],
                ['0916068409','Indah Permata, S.E., M.M.','Manajemen','Lektor','S2','Pemasaran Digital','081311111109','Tidak Aktif'],
                ['1005079510','Dr. Joko Santoso, M.Kom.','Sistem Informasi','Lektor Kepala','S3','Keamanan Siber','081311111110','Aktif'],
              ];

              $jabatan_chip = [
                'Guru Besar'   => 'chip-gb',
                'Lektor Kepala'=> 'chip-lk',
                'Lektor'       => 'chip-l',
                'Asisten Ahli' => 'chip-aa',
              ];
              $pend_badge = ['S3'=>'badge-s3','S2'=>'badge-s2','S1'=>'badge-s1'];

              $init_bg  = ['#e8f5f0','#e0e7ff','#fef9c3','#fce7f3','#e0f2fe','#f0fdf4','#fff7ed','#ede9fe','#f1f5f9','#fef3c7'];
              $init_col = ['#1a7a5e','#3730a3','#a16207','#9d174d','#0369a1','#16a34a','#c2410c','#5b21b6','#475569','#92400e'];

              foreach($dosen as $idx => $d):
                // ambil inisial dari nama (skip gelar prefix Prof./Dr./Drs.)
                $clean = preg_replace('/^(Prof\.|Dr\.|Drs\.)\s*/i','',$d[1]);
                $init  = strtoupper(substr($clean,0,1));
                $bg    = $init_bg[$idx % count($init_bg)];
                $col   = $init_col[$idx % count($init_col)];
            ?>
            <tr style="border-bottom:1px solid var(--border);transition:background 0.12s;"
                onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background=''">

              <td style="padding:13px 22px;font-size:13px;color:var(--muted);"><?= $idx+1 ?></td>

              <td style="padding:13px 16px;">
                <span style="font-size:13px;font-weight:600;font-family:'DM Mono',monospace;color:var(--green);"><?= $d[0] ?></span>
              </td>

              <td style="padding:13px 16px;">
                <div style="display:flex;align-items:center;gap:10px;">
                  <div style="width:36px;height:36px;border-radius:50%;background:<?= $bg ?>;color:<?= $col ?>;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:13px;flex-shrink:0;"><?= $init ?></div>
                  <div>
                    <div style="font-size:14px;font-weight:600;"><?= $d[1] ?></div>
                    <div style="font-size:11px;color:var(--muted);"><?= strtolower(preg_replace('/[^a-zA-Z]/','',$d[1])) ?>@kampus.ac.id</div>
                  </div>
                </div>
              </td>

              <td style="padding:13px 16px;font-size:13px;"><?= $d[2] ?></td>

              <td style="padding:13px 16px;">
                <span class="<?= $jabatan_chip[$d[3]] ?? 'chip-l' ?>"><?= $d[3] ?></span>
              </td>

              <td style="padding:13px 16px;">
                <span class="badge <?= $pend_badge[$d[4]] ?? 'badge-s2' ?>"><?= $d[4] ?></span>
              </td>

              <td style="padding:13px 16px;font-size:13px;color:var(--muted);max-width:160px;"><?= $d[5] ?></td>

              <td style="padding:13px 16px;font-size:13px;color:var(--muted);white-space:nowrap;"><?= $d[6] ?></td>

              <td style="padding:13px 16px;">
                <span class="badge <?= $d[7]==='Aktif' ? 'badge-aktif' : 'badge-nonaktif' ?>"><?= $d[7] ?></span>
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
        <div style="font-size:13px;color:var(--muted);">Menampilkan <strong>1–10</strong> dari <strong>86</strong> dosen</div>
        <div style="display:flex;gap:6px;">
          <?php foreach(['‹','1','2','3','4','5','›'] as $pg): ?>
          <button style="min-width:32px;height:32px;border:1px solid <?= $pg==='1' ? 'var(--green)' : 'var(--border)' ?>;
            background:<?= $pg==='1' ? 'var(--green)' : 'var(--white)' ?>;
            color:<?= $pg==='1' ? '#fff' : 'var(--text)' ?>;
            border-radius:8px;font-family:inherit;font-size:13px;font-weight:<?= $pg==='1' ? '600' : '400' ?>;
            cursor:pointer;padding:0 8px;">
            <?= $pg ?>
          </button>
          <?php endforeach; ?>
        </div>
      </div>

    </div><!-- /table card -->

  </main><!-- /content -->
</div><!-- /main -->

<!-- ══ MODAL TAMBAH DOSEN ══ -->
<div id="modalTambah" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.4);z-index:999;align-items:center;justify-content:center;padding:20px;">
  <div style="background:#fff;border-radius:20px;width:100%;max-width:640px;max-height:90vh;overflow-y:auto;box-shadow:0 20px 60px rgba(0,0,0,0.15);">

    <div style="display:flex;align-items:center;justify-content:space-between;padding:22px 24px;border-bottom:1px solid var(--border);">
      <div style="font-size:17px;font-weight:700;">Tambah Dosen Baru</div>
      <button onclick="document.getElementById('modalTambah').style.display='none'"
        style="width:32px;height:32px;border:none;background:var(--bg);border-radius:50%;cursor:pointer;font-size:15px;color:var(--muted);">✕</button>
    </div>

    <div style="padding:24px;display:grid;grid-template-columns:1fr 1fr;gap:16px;">
      <?php
        $fields = [
          ['NIDN','nidn','text','cth: 0112057801','full'],
          ['Nama Lengkap (dengan gelar)','nama','text','cth: Dr. Budi Santoso, M.Kom.','full'],
          ['Jenis Kelamin','jk','select',''],
          ['Tempat Lahir','tmpat_lahir','text','cth: Pekanbaru'],
          ['Tanggal Lahir','tgl_lahir','date',''],
          ['Program Studi','prodi','select',''],
          ['Jabatan Fungsional','jabatan','select',''],
          ['Pendidikan Terakhir','pendidikan','select',''],
          ['Bidang Keahlian','keahlian','text','cth: Kecerdasan Buatan'],
          ['No. HP','no_hp','text','08xxxxxxxxxx'],
          ['Email','email','email','nama@kampus.ac.id'],
          ['Alamat','alamat','text','Alamat lengkap','full'],
          ['Status','status','select',''],
        ];
        foreach($fields as $f):
          $full = isset($f[4]) && $f[4]==='full';
      ?>
      <div style="<?= $full ? 'grid-column:1/-1;' : '' ?>display:flex;flex-direction:column;gap:6px;">
        <label style="font-size:12px;font-weight:600;color:var(--muted);text-transform:uppercase;letter-spacing:0.4px;"><?= $f[0] ?></label>
        <?php if($f[2]==='select'): ?>
        <select name="<?= $f[1] ?>" style="border:1px solid var(--border);border-radius:10px;padding:9px 12px;font-family:inherit;font-size:14px;color:var(--text);outline:none;background:#fff;">
          <?php
            if($f[1]==='jk')       { echo '<option value="">-- Pilih --</option><option>Laki-laki</option><option>Perempuan</option>'; }
            elseif($f[1]==='prodi') { echo '<option value="">-- Pilih Prodi --</option><option>Teknik Informatika</option><option>Sistem Informasi</option><option>Teknik Elektro</option><option>Manajemen</option>'; }
            elseif($f[1]==='jabatan') { echo '<option value="">-- Pilih Jabatan --</option><option>Guru Besar</option><option>Lektor Kepala</option><option>Lektor</option><option>Asisten Ahli</option>'; }
            elseif($f[1]==='pendidikan') { echo '<option value="">-- Pilih --</option><option>S3 / Doktor</option><option>S2 / Magister</option><option>S1 / Sarjana</option>'; }
            elseif($f[1]==='status') { echo '<option>Aktif</option><option>Tidak Aktif</option>'; }
          ?>
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
      <button class="btn-primary" style="padding:9px 22px;">
        <i class="fa-solid fa-save"></i> Simpan Data
      </button>
    </div>

  </div>
</div>

<!-- Floating gear -->
<button style="position:fixed;bottom:24px;right:24px;width:44px;height:44px;border-radius:50%;
  background:var(--green);color:#fff;border:none;font-size:17px;cursor:pointer;
  display:flex;align-items:center;justify-content:center;
  box-shadow:0 4px 16px rgba(26,122,94,0.35);z-index:998;">
  <i class="fa-solid fa-gear"></i>
</button>

</body>
</html>