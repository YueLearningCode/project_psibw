<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profil Saya — AkademikApp</title>
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
.card{background:#fff;border-radius:12px;border:1px solid #ececec;overflow:hidden}
.card-header{display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid #f0f0f0}
.card-title{font-size:14px;font-weight:700;color:#1a1a1a}

/* Layout */
.profile-layout{display:grid;grid-template-columns:230px 1fr;gap:16px}

/* Avatar card */
.avatar-card{padding:24px 18px;text-align:center;background:#fff;border-radius:12px;border:1px solid #ececec}
.p-avatar{width:80px;height:80px;border-radius:50%;background:#1a7a5e;margin:0 auto 14px;display:flex;align-items:center;justify-content:center;font-size:30px;font-weight:700;color:#fff;position:relative}
.avatar-edit{position:absolute;bottom:0;right:0;width:24px;height:24px;border-radius:50%;background:#fff;border:2px solid #1a7a5e;display:flex;align-items:center;justify-content:center;cursor:pointer}
.avatar-edit i{font-size:12px;color:#1a7a5e}
.p-name{font-size:15px;font-weight:700;color:#1a1a1a}
.p-nim{font-size:12px;color:#888;margin-top:6px}
.p-prodi{display:inline-block;margin-top:10px;background:#e8f5f0;color:#1a7a5e;padding:5px 14px;border-radius:20px;font-size:12px;font-weight:600}
.p-info-row{margin-top:16px;display:flex;flex-direction:column;gap:8px;text-align:left}
.p-info-item{display:flex;align-items:center;gap:8px;font-size:12px;color:#555}
.p-info-item i{font-size:14px;color:#1a7a5e;width:16px}
.divider{border:none;border-top:1px solid #f0f0f0;margin:16px 0}
.p-stat-row{display:grid;grid-template-columns:1fr 1fr;gap:10px;text-align:center}
.p-stat{background:#f8faf9;border-radius:8px;padding:10px 8px}
.p-stat-val{font-size:18px;font-weight:700;color:#1a7a5e}
.p-stat-label{font-size:10px;color:#888;margin-top:2px}

/* Info grid */
.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:22px 36px;padding:20px 20px}
.info-box{display:flex;flex-direction:column;gap:5px}
.info-label{font-size:11px;color:#aaa;text-transform:uppercase;letter-spacing:.04em}
.info-value{font-size:14px;color:#1a1a1a;font-weight:500}
.edit-btn{background:#1a7a5e;color:#fff;border:none;padding:9px 18px;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:6px}
.edit-btn:hover{background:#155f4a}

/* Dokumen */
.dokumen-item{display:flex;align-items:center;gap:12px;padding:13px 18px;border-bottom:1px solid #f5f5f3}
.dokumen-item:last-child{border-bottom:none}
.dokumen-item:hover{background:#fafafa}
.dok-ico{width:38px;height:38px;border-radius:8px;background:#e6f1fb;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.dok-ico i{font-size:18px;color:#185FA5}
.dok-info{flex:1}
.dok-name{font-size:13px;font-weight:600;color:#1a1a1a}
.dok-sub{font-size:11px;color:#888;margin-top:2px}
.dok-btn{padding:6px 12px;background:#fff;border:1.5px solid #ddd;border-radius:7px;font-size:12px;color:#555;cursor:pointer;display:flex;align-items:center;gap:4px}
.dok-btn:hover{border-color:#1a7a5e;color:#1a7a5e}

::-webkit-scrollbar{width:5px}::-webkit-scrollbar-thumb{background:#d0d0d0;border-radius:10px}
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
  <a href="dashboard.html" class="nav-item"><i class="ti ti-layout-dashboard"></i> Dashboard</a>
  <a href="jadwal.html" class="nav-item"><i class="ti ti-calendar-week"></i> Jadwal Kuliah</a>
  <a href="nilai.html" class="nav-item"><i class="ti ti-file-certificate"></i> Nilai &amp; Transkrip</a>
  <a href="krs.html" class="nav-item"><i class="ti ti-notes"></i> KRS</a>
  <a href="absensi.html" class="nav-item"><i class="ti ti-clipboard-list"></i> Absensi</a>
  <a href="tagihan.html" class="nav-item"><i class="ti ti-receipt"></i> Tagihan &amp; Pembayaran</a>
  <div class="sec-label">Akun</div>
  <div class="nav-bottom">
    <a href="profil.html" class="nav-item active"><i class="ti ti-user-circle"></i> Profil Saya</a>
    <a href="ganti-password.html" class="nav-item"><i class="ti ti-lock"></i> Ganti Password</a>
    <a href="logout.html" class="nav-item" style="color:rgba(255,255,255,0.6)"><i class="ti ti-logout"></i> Logout</a>
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
        <div class="page-title">Profil Saya</div>
        <div class="page-sub">Informasi data mahasiswa</div>
      </div>
      <button class="edit-btn"><i class="ti ti-pencil"></i> Edit Profil</button>
    </div>

    <div class="profile-layout">

      <!-- Kiri -->
      <div class="avatar-card">
        <div class="p-avatar">
          RF
          <div class="avatar-edit"><i class="ti ti-camera"></i></div>
        </div>
        <div class="p-name">Reza Firmansyah</div>
        <div class="p-nim">NIM 22101088</div>
        <div class="p-prodi">Teknik Informatika</div>
        <div class="p-info-row">
          <div class="p-info-item"><i class="ti ti-mail"></i> reza@kampus.ac.id</div>
          <div class="p-info-item"><i class="ti ti-phone"></i> 081298765432</div>
          <div class="p-info-item"><i class="ti ti-calendar"></i> Angkatan 2022</div>
          <div class="p-info-item"><i class="ti ti-user-check"></i> PA: Dr. Budi Santoso</div>
        </div>
        <hr class="divider">
        <div class="p-stat-row">
          <div class="p-stat"><div class="p-stat-val">3.72</div><div class="p-stat-label">IPK</div></div>
          <div class="p-stat"><div class="p-stat-val">91%</div><div class="p-stat-label">Kehadiran</div></div>
          <div class="p-stat"><div class="p-stat-val">20</div><div class="p-stat-label">SKS</div></div>
          <div class="p-stat"><div class="p-stat-val">Sem 4</div><div class="p-stat-label">Semester</div></div>
        </div>
      </div>

      <!-- Kanan -->
      <div style="display:flex;flex-direction:column;gap:16px">

        <!-- Data Diri -->
        <div class="card">
          <div class="card-header"><span class="card-title">Data Pribadi</span></div>
          <div class="info-grid">
            <div class="info-box">
              <div class="info-label">Nama Lengkap</div>
              <div class="info-value">Reza Firmansyah</div>
            </div>
            <div class="info-box">
              <div class="info-label">NIM</div>
              <div class="info-value">22101088</div>
            </div>
            <div class="info-box">
              <div class="info-label">Tempat, Tanggal Lahir</div>
              <div class="info-value">Pekanbaru, 14 Maret 2004</div>
            </div>
            <div class="info-box">
              <div class="info-label">Jenis Kelamin</div>
              <div class="info-value">Laki-laki</div>
            </div>
            <div class="info-box">
              <div class="info-label">Agama</div>
              <div class="info-value">Islam</div>
            </div>
            <div class="info-box">
              <div class="info-label">Kewarganegaraan</div>
              <div class="info-value">Warga Negara Indonesia</div>
            </div>
            <div class="info-box" style="grid-column:1/3">
              <div class="info-label">Alamat Domisili</div>
              <div class="info-value">Jl. Harapan No. 12, Kel. Tampan, Kec. Payung Sekaki, Pekanbaru, Riau 28292</div>
            </div>
          </div>
        </div>

        <!-- Data Akademik -->
        <div class="card">
          <div class="card-header"><span class="card-title">Data Akademik</span></div>
          <div class="info-grid">
            <div class="info-box">
              <div class="info-label">Program Studi</div>
              <div class="info-value">Teknik Informatika</div>
            </div>
            <div class="info-box">
              <div class="info-label">Fakultas</div>
              <div class="info-value">Teknik</div>
            </div>
            <div class="info-box">
              <div class="info-label">Angkatan</div>
              <div class="info-value">2022</div>
            </div>
            <div class="info-box">
              <div class="info-label">Semester Aktif</div>
              <div class="info-value">Semester 4</div>
            </div>
            <div class="info-box">
              <div class="info-label">Status Mahasiswa</div>
              <div class="info-value" style="color:#1a7a5e;font-weight:600">Aktif</div>
            </div>
            <div class="info-box">
              <div class="info-label">Dosen Pembimbing Akademik</div>
              <div class="info-value">Dr. Budi Santoso, M.Kom</div>
            </div>
          </div>
        </div>

        <!-- Dokumen -->
        <div class="card">
          <div class="card-header"><span class="card-title">Dokumen Akademik</span></div>
          <div class="dokumen-item">
            <div class="dok-ico"><i class="ti ti-id-badge"></i></div>
            <div class="dok-info"><div class="dok-name">Kartu Tanda Mahasiswa (KTM)</div><div class="dok-sub">Berlaku s/d 2026 · PDF</div></div>
            <button class="dok-btn"><i class="ti ti-download" style="font-size:13px"></i> Unduh</button>
          </div>
          <div class="dokumen-item">
            <div class="dok-ico"><i class="ti ti-file-certificate"></i></div>
            <div class="dok-info"><div class="dok-name">Surat Keterangan Mahasiswa Aktif</div><div class="dok-sub">Diterbitkan 01 Mei 2026 · PDF</div></div>
            <button class="dok-btn"><i class="ti ti-download" style="font-size:13px"></i> Unduh</button>
          </div>
          <div class="dokumen-item">
            <div class="dok-ico"><i class="ti ti-report"></i></div>
            <div class="dok-info"><div class="dok-name">Transkrip Nilai Sementara</div><div class="dok-sub">Per Semester 3 · PDF</div></div>
            <button class="dok-btn"><i class="ti ti-download" style="font-size:13px"></i> Unduh</button>
          </div>
        </div>

      </div>
    </div>
  </main>
</div>
</body>
</html>