<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tagihan & Pembayaran — AkademikApp</title>
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

/* Stats */
.stats-row{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:22px}
.stat-card{background:#fff;border-radius:12px;padding:18px 20px;border:1px solid #ececec;display:flex;align-items:center;gap:14px}
.stat-icon{width:46px;height:46px;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.si-red{background:#fdecea}.si-red i{color:#c0392b;font-size:22px}
.si-green{background:#e8f5f0}.si-green i{color:#1a7a5e;font-size:22px}
.si-blue{background:#e6f1fb}.si-blue i{color:#185FA5;font-size:22px}
.stat-label{font-size:12px;color:#888;margin-bottom:4px}
.stat-val{font-size:20px;font-weight:700;color:#1a1a1a}
.stat-val.red{color:#c0392b}
.stat-val.green{color:#1a7a5e}

/* Layout */
.grid-main{display:grid;grid-template-columns:1fr 340px;gap:16px}

/* Tagihan item */
.tagihan-item{display:flex;align-items:center;gap:14px;padding:16px 18px;border-bottom:1px solid #f5f5f3;transition:background .15s}
.tagihan-item:last-child{border-bottom:none}
.tagihan-item:hover{background:#fafafa}
.tagihan-ico{width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.ti-red{background:#fdecea}.ti-red i{color:#c0392b;font-size:20px}
.ti-green{background:#e8f5f0}.ti-green i{color:#1a7a5e;font-size:20px}
.ti-grey{background:#f0f0f0}.ti-grey i{color:#999;font-size:20px}
.tagihan-info{flex:1}
.t-nama{font-size:13px;font-weight:600;color:#1a1a1a}
.t-detail{font-size:11px;color:#888;margin-top:2px}
.t-right{text-align:right}
.t-nominal{font-size:14px;font-weight:700;color:#1a1a1a}
.t-status{margin-top:4px}
.badge{display:inline-flex;align-items:center;gap:4px;padding:3px 9px;border-radius:20px;font-size:11px;font-weight:600}
.badge-danger{background:#fdecea;color:#c0392b}
.badge-success{background:#e8f5f0;color:#0F6E56}
.badge-grey{background:#f0f0f0;color:#888}
.btn-bayar{padding:7px 14px;background:#1a7a5e;color:#fff;border:none;border-radius:8px;font-size:12px;font-weight:600;cursor:pointer}
.btn-bayar:hover{background:#155f4a}
.btn-lihat{padding:7px 14px;background:#fff;color:#1a7a5e;border:1.5px solid #1a7a5e;border-radius:8px;font-size:12px;font-weight:600;cursor:pointer}

/* Riwayat & Metode */
.metode-item{display:flex;align-items:center;gap:12px;padding:12px 18px;border-bottom:1px solid #f5f5f3}
.metode-item:last-child{border-bottom:none}
.m-ico{width:36px;height:36px;border-radius:8px;background:#e8f5f0;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.m-ico i{color:#1a7a5e;font-size:17px}
.m-info{flex:1}
.m-name{font-size:13px;font-weight:600;color:#1a1a1a}
.m-sub{font-size:11px;color:#888;margin-top:2px}
.m-arrow i{font-size:16px;color:#bbb}

/* Banner */
.banner-warn{background:linear-gradient(135deg,#fff3cd 0%,#fde8a0 100%);border:1px solid #f5c842;border-radius:12px;padding:16px 20px;display:flex;align-items:center;gap:14px;margin-bottom:18px}
.banner-warn i{font-size:28px;color:#854F0B;flex-shrink:0}
.bw-title{font-size:14px;font-weight:700;color:#5a3800}
.bw-sub{font-size:12px;color:#7a5200;margin-top:3px}
.bw-btn{margin-left:auto;padding:9px 18px;background:#854F0B;color:#fff;border:none;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;white-space:nowrap;flex-shrink:0}
.bw-btn:hover{background:#6b3e09}

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
  <a href="tagihan.html" class="nav-item active"><i class="ti ti-receipt"></i> Tagihan &amp; Pembayaran</a>
  <div class="sec-label">Akun</div>
  <div class="nav-bottom">
    <a href="profil.html" class="nav-item"><i class="ti ti-user-circle"></i> Profil Saya</a>
    <a href="ganti-password.html" class="nav-item"><i class="ti ti-lock"></i> Ganti Password</a>
    <a href="logout.html" class="nav-item" style="color:rgba(255,255,255,0.6)"><i class="ti ti-logout"></i> Logout</a>
  </div>
</aside>

<div class="right-wrap">
  <div class="topnav">
    <div class="search-wrap"><i class="ti ti-search"></i><input type="text" placeholder="Cari tagihan, riwayat bayar..."></div>
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
        <div class="page-title">Tagihan &amp; Pembayaran</div>
        <div class="page-sub">Kelola tagihan dan riwayat pembayaran akademik</div>
      </div>
    </div>

    <!-- Banner Peringatan -->
    <div class="banner-warn">
      <i class="ti ti-alert-triangle"></i>
      <div>
        <div class="bw-title">Tagihan UKT Jatuh Tempo</div>
        <div class="bw-sub">UKT Semester Ganjil 2024/2025 jatuh tempo pada 15 Mei 2026. Segera lakukan pembayaran untuk menghindari sanksi akademik.</div>
      </div>
      <button class="bw-btn"><i class="ti ti-credit-card" style="font-size:13px;margin-right:4px"></i>Bayar Sekarang</button>
    </div>

    <!-- Stats -->
    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon si-red"><i class="ti ti-alert-circle"></i></div>
        <div><div class="stat-label">Total Tagihan Aktif</div><div class="stat-val red">Rp 4.500.000</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon si-green"><i class="ti ti-circle-check"></i></div>
        <div><div class="stat-label">Total Terbayar (2024)</div><div class="stat-val green">Rp 9.000.000</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon si-blue"><i class="ti ti-calendar-due"></i></div>
        <div><div class="stat-label">Jatuh Tempo Terdekat</div><div class="stat-val" style="font-size:15px;color:#185FA5">15 Mei 2026</div></div>
      </div>
    </div>

    <div class="grid-main">
      <!-- Kiri: Daftar Tagihan -->
      <div style="display:flex;flex-direction:column;gap:16px">

        <!-- Tagihan Aktif -->
        <div class="card">
          <div class="card-header">
            <span class="card-title">Tagihan Aktif</span>
            <span style="font-size:11px;background:#fdecea;color:#c0392b;padding:3px 10px;border-radius:20px;font-weight:600">1 Belum Dibayar</span>
          </div>
          <div class="tagihan-item">
            <div class="tagihan-ico ti-red"><i class="ti ti-receipt"></i></div>
            <div class="tagihan-info">
              <div class="t-nama">UKT Semester Ganjil 2024/2025</div>
              <div class="t-detail">Uang Kuliah Tunggal · Jatuh tempo: 15 Mei 2026</div>
            </div>
            <div class="t-right">
              <div class="t-nominal">Rp 4.500.000</div>
              <div class="t-status"><span class="badge badge-danger"><i class="ti ti-clock" style="font-size:10px"></i> Belum Bayar</span></div>
            </div>
            <div style="margin-left:12px">
              <button class="btn-bayar">Bayar</button>
            </div>
          </div>
        </div>

        <!-- Riwayat Pembayaran -->
        <div class="card">
          <div class="card-header">
            <span class="card-title">Riwayat Pembayaran</span>
            <span style="font-size:12px;color:#1a7a5e;font-weight:600;cursor:pointer">Lihat Semua</span>
          </div>
          <div class="tagihan-item">
            <div class="tagihan-ico ti-green"><i class="ti ti-circle-check"></i></div>
            <div class="tagihan-info">
              <div class="t-nama">UKT Semester Genap 2023/2024</div>
              <div class="t-detail">Dibayar 10 Feb 2024 · via Transfer Bank BNI</div>
            </div>
            <div class="t-right">
              <div class="t-nominal">Rp 4.500.000</div>
              <div class="t-status"><span class="badge badge-success"><i class="ti ti-check" style="font-size:10px"></i> Lunas</span></div>
            </div>
            <div style="margin-left:12px">
              <button class="btn-lihat">Bukti</button>
            </div>
          </div>
          <div class="tagihan-item">
            <div class="tagihan-ico ti-green"><i class="ti ti-circle-check"></i></div>
            <div class="tagihan-info">
              <div class="t-nama">UKT Semester Ganjil 2023/2024</div>
              <div class="t-detail">Dibayar 5 Agu 2023 · via Virtual Account BRI</div>
            </div>
            <div class="t-right">
              <div class="t-nominal">Rp 4.500.000</div>
              <div class="t-status"><span class="badge badge-success"><i class="ti ti-check" style="font-size:10px"></i> Lunas</span></div>
            </div>
            <div style="margin-left:12px">
              <button class="btn-lihat">Bukti</button>
            </div>
          </div>
          <div class="tagihan-item">
            <div class="tagihan-ico ti-green"><i class="ti ti-circle-check"></i></div>
            <div class="tagihan-info">
              <div class="t-nama">Biaya Wisuda</div>
              <div class="t-detail">Dibayar 20 Jan 2023 · via Indomaret</div>
            </div>
            <div class="t-right">
              <div class="t-nominal">Rp 750.000</div>
              <div class="t-status"><span class="badge badge-success"><i class="ti ti-check" style="font-size:10px"></i> Lunas</span></div>
            </div>
            <div style="margin-left:12px">
              <button class="btn-lihat">Bukti</button>
            </div>
          </div>
          <div class="tagihan-item">
            <div class="tagihan-ico ti-grey"><i class="ti ti-receipt-off"></i></div>
            <div class="tagihan-info">
              <div class="t-nama">UKT Semester Genap 2022/2023</div>
              <div class="t-detail">Dibayar 12 Feb 2022 · via Transfer Bank Mandiri</div>
            </div>
            <div class="t-right">
              <div class="t-nominal">Rp 4.500.000</div>
              <div class="t-status"><span class="badge badge-grey">Lunas</span></div>
            </div>
            <div style="margin-left:12px">
              <button class="btn-lihat">Bukti</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Kanan: Metode & Info -->
      <div style="display:flex;flex-direction:column;gap:16px">

        <!-- Cara Pembayaran -->
        <div class="card">
          <div class="card-header">
            <span class="card-title">Metode Pembayaran</span>
          </div>
          <div class="metode-item">
            <div class="m-ico"><i class="ti ti-building-bank"></i></div>
            <div class="m-info"><div class="m-name">Transfer Bank</div><div class="m-sub">BNI, BRI, Mandiri, BCA</div></div>
            <div class="m-arrow"><i class="ti ti-chevron-right"></i></div>
          </div>
          <div class="metode-item">
            <div class="m-ico"><i class="ti ti-device-mobile"></i></div>
            <div class="m-info"><div class="m-name">Virtual Account</div><div class="m-sub">Otomatis, 24 jam aktif</div></div>
            <div class="m-arrow"><i class="ti ti-chevron-right"></i></div>
          </div>
          <div class="metode-item">
            <div class="m-ico"><i class="ti ti-building-store"></i></div>
            <div class="m-info"><div class="m-name">Minimarket</div><div class="m-sub">Indomaret, Alfamart</div></div>
            <div class="m-arrow"><i class="ti ti-chevron-right"></i></div>
          </div>
          <div class="metode-item">
            <div class="m-ico"><i class="ti ti-wallet"></i></div>
            <div class="m-info"><div class="m-name">Dompet Digital</div><div class="m-sub">GoPay, OVO, DANA</div></div>
            <div class="m-arrow"><i class="ti ti-chevron-right"></i></div>
          </div>
        </div>

        <!-- Info Rekening -->
        <div class="card">
          <div class="card-header"><span class="card-title">Informasi Pembayaran</span></div>
          <div style="padding:18px;display:flex;flex-direction:column;gap:14px">
            <div>
              <div style="font-size:11px;color:#aaa;text-transform:uppercase;margin-bottom:4px">Nama Mahasiswa</div>
              <div style="font-size:14px;font-weight:600;color:#1a1a1a">Reza Firmansyah</div>
            </div>
            <div>
              <div style="font-size:11px;color:#aaa;text-transform:uppercase;margin-bottom:4px">NIM</div>
              <div style="font-size:14px;font-weight:600;color:#1a1a1a">22101088</div>
            </div>
            <div>
              <div style="font-size:11px;color:#aaa;text-transform:uppercase;margin-bottom:4px">Kode Tagihan</div>
              <div style="font-size:14px;font-weight:600;color:#1a1a1a;display:flex;align-items:center;gap:8px">
                TGH-2024-0089
                <span style="cursor:pointer;background:#f0f0f0;padding:2px 8px;border-radius:6px;font-size:11px;color:#555"><i class="ti ti-copy" style="font-size:11px"></i> Salin</span>
              </div>
            </div>
            <div>
              <div style="font-size:11px;color:#aaa;text-transform:uppercase;margin-bottom:4px">Nominal</div>
              <div style="font-size:18px;font-weight:700;color:#c0392b">Rp 4.500.000</div>
            </div>
            <button style="width:100%;padding:11px;background:#1a7a5e;color:#fff;border:none;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:6px">
              <i class="ti ti-credit-card-pay"></i> Lanjutkan Pembayaran
            </button>
          </div>
        </div>

      </div>
    </div>
  </main>
</div>
</body>
</html>