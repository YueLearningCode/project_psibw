<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logout — AkademikApp</title>
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
.nav-item.active{background:rgba(255,255,255,0.15);color:#fff;font-weight:600}
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
.avatar-top{width:32px;height:32px;border-radius:50%;background:#1a7a5e;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#fff;cursor:pointer}

/* Center content */
.main{flex:1;display:flex;align-items:center;justify-content:center;background:#f4f6f8;padding:24px}

.logout-wrap{width:100%;max-width:440px}

/* Card utama */
.logout-card{background:#fff;border-radius:16px;border:1px solid #ececec;padding:40px 36px;text-align:center}
.logout-icon{width:72px;height:72px;border-radius:50%;background:#fff3f3;border:2px solid #fcd8d8;display:flex;align-items:center;justify-content:center;margin:0 auto 20px}
.logout-icon i{font-size:32px;color:#c0392b}
.logout-title{font-size:20px;font-weight:700;color:#1a1a1a;margin-bottom:8px}
.logout-desc{font-size:14px;color:#888;line-height:1.6;margin-bottom:28px}

/* User info */
.user-badge{display:flex;align-items:center;gap:12px;background:#f8faf9;border:1px solid #e8f5f0;border-radius:10px;padding:12px 16px;margin-bottom:24px;text-align:left}
.ub-avatar{width:40px;height:40px;border-radius:50%;background:#1a7a5e;display:flex;align-items:center;justify-content:center;font-size:15px;font-weight:700;color:#fff;flex-shrink:0}
.ub-name{font-size:14px;font-weight:600;color:#1a1a1a}
.ub-detail{font-size:12px;color:#888;margin-top:2px}

/* Buttons */
.btn-logout{width:100%;padding:13px;background:#c0392b;color:#fff;border:none;border-radius:10px;font-size:14px;font-weight:600;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;margin-bottom:10px;transition:background .15s}
.btn-logout:hover{background:#a93226}
.btn-cancel{width:100%;padding:12px;background:#fff;color:#555;border:1.5px solid #ddd;border-radius:10px;font-size:14px;font-weight:500;cursor:pointer;transition:border .15s}
.btn-cancel:hover{border-color:#aaa;color:#333}

/* Reminder list */
.reminder-card{background:#fff;border-radius:12px;border:1px solid #ececec;margin-top:14px;overflow:hidden}
.reminder-header{padding:12px 16px;border-bottom:1px solid #f0f0f0;font-size:13px;font-weight:600;color:#555;display:flex;align-items:center;gap:6px}
.reminder-header i{color:#1a7a5e}
.reminder-item{display:flex;align-items:center;gap:10px;padding:10px 16px;border-bottom:1px solid #f8f8f8;font-size:12px;color:#777}
.reminder-item:last-child{border-bottom:none}
.reminder-item i{font-size:15px;color:#1a7a5e;flex-shrink:0}

/* Timer */
.timer-bar-wrap{height:4px;background:#f0f0f0;border-radius:4px;overflow:hidden;margin-bottom:20px}
.timer-bar{height:4px;background:#c0392b;border-radius:4px;width:100%;transition:width 1s linear}
.timer-text{font-size:12px;color:#bbb;margin-bottom:12px}
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
    <a href="profil.html" class="nav-item"><i class="ti ti-user-circle"></i> Profil Saya</a>
    <a href="ganti-password.html" class="nav-item"><i class="ti ti-lock"></i> Ganti Password</a>
    <a href="logout.html" class="nav-item active"><i class="ti ti-logout"></i> Logout</a>
  </div>
</aside>

<div class="right-wrap">
  <div class="topnav">
    <div class="search-wrap"><i class="ti ti-search"></i><input type="text" placeholder="Cari matakuliah, jadwal..."></div>
    <div class="topnav-right">
      <div class="tnav-btn"><i class="ti ti-moon"></i></div>
      <div class="tnav-btn"><i class="ti ti-bell"></i></div>
      <div class="tnav-btn"><i class="ti ti-settings"></i></div>
      <div class="avatar-top">RF</div>
    </div>
  </div>

  <main class="main">
    <div class="logout-wrap">

      <!-- Card Konfirmasi -->
      <div class="logout-card">
        <div class="logout-icon">
          <i class="ti ti-logout"></i>
        </div>
        <div class="logout-title">Keluar dari AkademikApp?</div>
        <div class="logout-desc">Anda akan keluar dari sesi aktif Anda. Pastikan Anda telah menyimpan semua pekerjaan sebelum keluar.</div>

        <!-- Info Akun -->
        <div class="user-badge">
          <div class="ub-avatar">RF</div>
          <div>
            <div class="ub-name">Reza Firmansyah</div>
            <div class="ub-detail">NIM 22101088 · Teknik Informatika</div>
          </div>
        </div>

        <!-- Timer -->
        <div class="timer-bar-wrap"><div class="timer-bar" id="timer-bar"></div></div>
        <div class="timer-text" id="timer-text">Logout otomatis dalam <strong id="countdown">30</strong> detik</div>

        <button class="btn-logout" onclick="doLogout()">
          <i class="ti ti-logout"></i> Ya, Logout Sekarang
        </button>
        <button class="btn-cancel" onclick="cancelLogout()">
          <i class="ti ti-arrow-left" style="font-size:13px;margin-right:4px"></i> Kembali ke Dashboard
        </button>
      </div>

      <!-- Reminder -->
      <div class="reminder-card">
        <div class="reminder-header"><i class="ti ti-info-circle"></i> Sebelum keluar, pastikan:</div>
        <div class="reminder-item"><i class="ti ti-circle-check"></i> KRS semester berjalan sudah dikonfirmasi</div>
        <div class="reminder-item"><i class="ti ti-circle-check"></i> Tagihan UKT belum jatuh tempo (15 Mei 2026)</div>
        <div class="reminder-item"><i class="ti ti-circle-check"></i> Tidak ada formulir yang sedang diisi</div>
      </div>

    </div>
  </main>
</div>

<script>
let secs = 30;
let interval = setInterval(() => {
  secs--;
  document.getElementById('countdown').textContent = secs;
  const pct = (secs / 30) * 100;
  document.getElementById('timer-bar').style.width = pct + '%';
  if (secs <= 0) {
    clearInterval(interval);
    doLogout();
  }
}, 1000);

function doLogout() {
  clearInterval(interval);
  document.getElementById('timer-text').textContent = 'Sedang keluar...';
  // Redirect ke halaman login
  setTimeout(() => { window.location.href = 'login.html'; }, 800);
}

function cancelLogout() {
  clearInterval(interval);
  window.location.href = 'dashboard.html';
}
</script>
</body>
</html>