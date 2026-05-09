<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Absensi — AkademikApp</title>
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
.nav-item.active i{opacity:1}
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
.page-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:22px}
.page-title{font-size:20px;font-weight:700;color:#1a1a1a}
.page-sub{font-size:13px;color:#888;margin-top:3px}
.btn{display:inline-flex;align-items:center;gap:6px;padding:9px 16px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;border:none;text-decoration:none}
.btn-outline{background:#fff;color:#1a7a5e;border:1.5px solid #1a7a5e}
.btn-outline:hover{background:#e8f5f0}
/* Overview cards */
.mk-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:22px}
.mk-card{background:#fff;border-radius:12px;border:1px solid #ececec;padding:16px 18px;cursor:pointer;transition:box-shadow .15s,border-color .15s}
.mk-card:hover{border-color:#1a7a5e}
.mk-card.active{border-color:#1a7a5e;box-shadow:0 0 0 3px rgba(26,122,94,0.1)}
.mk-head{display:flex;align-items:center;gap:10px;margin-bottom:12px}
.mk-ico{width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.mk-name{font-size:13px;font-weight:700;color:#1a1a1a}
.mk-dosen{font-size:11px;color:#888;margin-top:2px}
.pct-row{display:flex;align-items:center;justify-content:space-between;margin-bottom:6px}
.pct-num{font-size:18px;font-weight:700}
.pct-stat{font-size:11px;color:#888}
.abs-bar{height:8px;background:#f0f0f0;border-radius:10px;overflow:hidden}
.abs-fill{height:100%;border-radius:10px;transition:width .4s}
.abs-row{display:flex;gap:10px;margin-top:8px}
.abs-pill{font-size:10px;font-weight:600;padding:2px 8px;border-radius:20px}
.ap-h{background:#e8f5f0;color:#0F6E56}
.ap-a{background:#faeeda;color:#854F0B}
.ap-s{background:#e6f1fb;color:#185FA5}
.ap-i{background:#EEEDFE;color:#3C3489}
/* Detail table */
.card{background:#fff;border-radius:12px;border:1px solid #ececec;overflow:hidden}
.card-header{display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid #f0f0f0}
.card-title{font-size:14px;font-weight:700;color:#1a1a1a}
table{width:100%;border-collapse:collapse}
thead tr{background:#f9f9f7;border-bottom:1px solid #ececec}
th{padding:10px 18px;text-align:left;font-size:11px;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:.05em}
td{padding:11px 18px;font-size:13px;color:#333;border-bottom:1px solid #f5f5f3}
tbody tr:last-child td{border-bottom:none}
tbody tr:hover{background:#fafafa}
.status-H{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:600;padding:3px 8px;border-radius:20px;background:#e8f5f0;color:#0F6E56}
.status-A{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:600;padding:3px 8px;border-radius:20px;background:#faeeda;color:#854F0B}
.status-S{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:600;padding:3px 8px;border-radius:20px;background:#e6f1fb;color:#185FA5}
.status-I{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:600;padding:3px 8px;border-radius:20px;background:#EEEDFE;color:#3C3489}
.dot{width:5px;height:5px;border-radius:50%}
.warn-row{background:#fffbf5!important}
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
    <i class="ti ti-user-student"></i>
    <div><div class="role-name">Mahasiswa</div><div class="role-sub">Reza Firmansyah</div></div>
  </div>
  <div class="sec-label">Menu</div>
  <a href="dashboard.html" class="nav-item"><i class="ti ti-layout-dashboard"></i> Dashboard</a>
  <a href="jadwal.html" class="nav-item"><i class="ti ti-calendar-week"></i> Jadwal Kuliah</a>
  <a href="nilai.html" class="nav-item"><i class="ti ti-file-certificate"></i> Nilai &amp; Transkrip</a>
  <a href="krs.html" class="nav-item"><i class="ti ti-notes"></i> KRS</a>
  <a href="absensi.html" class="nav-item active"><i class="ti ti-clipboard-list"></i> Absensi</a>
  <a href="tagihan.html" class="nav-item"><i class="ti ti-receipt"></i> Tagihan &amp; Pembayaran</a>
  <div class="sec-label">Akun</div>
  <div class="nav-bottom">
    <a href="profil.html" class="nav-item"><i class="ti ti-user-circle"></i> Profil Saya</a>
    <a href="ganti-password.html" class="nav-item"><i class="ti ti-lock"></i> Ganti Password</a>
    <a href="login.html" class="nav-item" style="color:rgba(255,255,255,0.6)"><i class="ti ti-logout"></i> Logout</a>
  </div>
</aside>

<div class="right-wrap">
  <div class="topnav">
    <div class="search-wrap"><i class="ti ti-search"></i><input type="text" placeholder="Cari matakuliah..."></div>
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
        <div class="page-title">Rekap Absensi</div>
        <div class="page-sub">Semester Ganjil 2024/2025 · Minimal kehadiran 75%</div>
      </div>
      <a href="#" class="btn btn-outline"><i class="ti ti-download"></i> Unduh Rekap</a>
    </div>

    <div class="mk-grid">
      <div class="mk-card active" onclick="selectMK(this,0)">
        <div class="mk-head">
          <div class="mk-ico" style="background:#e8f5f0"><i class="ti ti-network" style="font-size:18px;color:#1a7a5e"></i></div>
          <div><div class="mk-name">Jaringan Komputer</div><div class="mk-dosen">Dr. Hendra Wijaya</div></div>
        </div>
        <div class="pct-row"><span class="pct-num" style="color:#1a7a5e">93%</span><span class="pct-stat">14/15 pertemuan</span></div>
        <div class="abs-bar"><div class="abs-fill" style="width:93%;background:#1a7a5e"></div></div>
        <div class="abs-row"><span class="abs-pill ap-h">H: 14</span><span class="abs-pill ap-a">A: 1</span><span class="abs-pill ap-s">S: 0</span><span class="abs-pill ap-i">I: 0</span></div>
      </div>
      <div class="mk-card" onclick="selectMK(this,1)">
        <div class="mk-head">
          <div class="mk-ico" style="background:#EEEDFE"><i class="ti ti-brain" style="font-size:18px;color:#3C3489"></i></div>
          <div><div class="mk-name">Kecerdasan Buatan</div><div class="mk-dosen">Dr. Budi Santoso</div></div>
        </div>
        <div class="pct-row"><span class="pct-num" style="color:#1a7a5e">87%</span><span class="pct-stat">13/15 pertemuan</span></div>
        <div class="abs-bar"><div class="abs-fill" style="width:87%;background:#1a7a5e"></div></div>
        <div class="abs-row"><span class="abs-pill ap-h">H: 13</span><span class="abs-pill ap-a">A: 1</span><span class="abs-pill ap-s">S: 1</span><span class="abs-pill ap-i">I: 0</span></div>
      </div>
      <div class="mk-card" onclick="selectMK(this,2)">
        <div class="mk-head">
          <div class="mk-ico" style="background:#e6f1fb"><i class="ti ti-world-www" style="font-size:18px;color:#185FA5"></i></div>
          <div><div class="mk-name">Pemrograman Web</div><div class="mk-dosen">Dr. Suryo Prabowo</div></div>
        </div>
        <div class="pct-row"><span class="pct-num" style="color:#854F0B">73%</span><span class="pct-stat">11/15 pertemuan</span></div>
        <div class="abs-bar"><div class="abs-fill" style="width:73%;background:#854F0B"></div></div>
        <div class="abs-row"><span class="abs-pill ap-h">H: 11</span><span class="abs-pill ap-a">A: 3</span><span class="abs-pill ap-s">S: 1</span><span class="abs-pill ap-i">I: 0</span></div>
      </div>
      <div class="mk-card" onclick="selectMK(this,3)">
        <div class="mk-head">
          <div class="mk-ico" style="background:#faeeda"><i class="ti ti-server" style="font-size:18px;color:#854F0B"></i></div>
          <div><div class="mk-name">Sistem Operasi</div><div class="mk-dosen">Dr. Anita Rahayu</div></div>
        </div>
        <div class="pct-row"><span class="pct-num" style="color:#1a7a5e">100%</span><span class="pct-stat">15/15 pertemuan</span></div>
        <div class="abs-bar"><div class="abs-fill" style="width:100%;background:#1a7a5e"></div></div>
        <div class="abs-row"><span class="abs-pill ap-h">H: 15</span><span class="abs-pill ap-a">A: 0</span><span class="abs-pill ap-s">S: 0</span><span class="abs-pill ap-i">I: 0</span></div>
      </div>
      <div class="mk-card" onclick="selectMK(this,4)">
        <div class="mk-head">
          <div class="mk-ico" style="background:#e8f5f0"><i class="ti ti-git-branch" style="font-size:18px;color:#1a7a5e"></i></div>
          <div><div class="mk-name">Rekayasa Perangkat Lunak</div><div class="mk-dosen">Dr. Sari Dewi</div></div>
        </div>
        <div class="pct-row"><span class="pct-num" style="color:#1a7a5e">80%</span><span class="pct-stat">12/15 pertemuan</span></div>
        <div class="abs-bar"><div class="abs-fill" style="width:80%;background:#1a7a5e"></div></div>
        <div class="abs-row"><span class="abs-pill ap-h">H: 12</span><span class="abs-pill ap-a">A: 2</span><span class="abs-pill ap-s">S: 0</span><span class="abs-pill ap-i">I: 1</span></div>
      </div>
      <div class="mk-card" onclick="selectMK(this,5)">
        <div class="mk-head">
          <div class="mk-ico" style="background:#e6f1fb"><i class="ti ti-file-search" style="font-size:18px;color:#185FA5"></i></div>
          <div><div class="mk-name">Metodologi Penelitian</div><div class="mk-dosen">Dr. Rina Kusuma</div></div>
        </div>
        <div class="pct-row"><span class="pct-num" style="color:#1a7a5e">93%</span><span class="pct-stat">14/15 pertemuan</span></div>
        <div class="abs-bar"><div class="abs-fill" style="width:93%;background:#1a7a5e"></div></div>
        <div class="abs-row"><span class="abs-pill ap-h">H: 14</span><span class="abs-pill ap-a">A: 0</span><span class="abs-pill ap-s">1</span><span class="abs-pill ap-i">I: 0</span></div>
      </div>
    </div>

    <div class="card" id="detailCard">
      <div class="card-header">
        <span class="card-title" id="detailTitle">Detail Absensi — Jaringan Komputer</span>
        <span style="font-size:12px;color:#888">Kehadiran: 93% (14/15)</span>
      </div>
      <table>
        <thead><tr><th>Pertemuan</th><th>Tanggal</th><th>Topik</th><th>Status</th></tr></thead>
        <tbody id="detailBody">
          <tr><td style="font-weight:600;color:#888">1</td><td>10 Feb 2025</td><td>Pengantar Jaringan Komputer</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
          <tr><td style="font-weight:600;color:#888">2</td><td>17 Feb 2025</td><td>Model OSI &amp; TCP/IP</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
          <tr><td style="font-weight:600;color:#888">3</td><td>24 Feb 2025</td><td>Pengalamatan IP</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
          <tr><td style="font-weight:600;color:#888">4</td><td>3 Mar 2025</td><td>Subnetting</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
          <tr><td style="font-weight:600;color:#888">5</td><td>10 Mar 2025</td><td>Routing Statis</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
          <tr><td style="font-weight:600;color:#888">6</td><td>17 Mar 2025</td><td>Routing Dinamis</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
          <tr class="warn-row"><td style="font-weight:600;color:#888">7</td><td>24 Mar 2025</td><td>Protokol Transport</td><td><span class="status-A"><span class="dot" style="background:#854F0B"></span>Alpha</span></td></tr>
          <tr><td style="font-weight:600;color:#888">8</td><td>31 Mar 2025</td><td>Keamanan Jaringan</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
          <tr><td style="font-weight:600;color:#888">9</td><td>7 Apr 2025</td><td>UTS</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
          <tr><td style="font-weight:600;color:#888">10</td><td>14 Apr 2025</td><td>Wireless Networking</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
          <tr><td style="font-weight:600;color:#888">11</td><td>21 Apr 2025</td><td>VPN &amp; Tunneling</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
          <tr><td style="font-weight:600;color:#888">12</td><td>28 Apr 2025</td><td>Network Troubleshooting</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
          <tr><td style="font-weight:600;color:#888">13</td><td>5 Mei 2025</td><td>SDN &amp; Cloud Networking</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
          <tr><td style="font-weight:600;color:#888">14</td><td>8 Mei 2025</td><td>IoT Networking</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
          <tr><td style="font-weight:600;color:#888">15</td><td>12 Mei 2025</td><td>UAS</td><td><span class="status-H"><span class="dot" style="background:#0F6E56"></span>Hadir</span></td></tr>
        </tbody>
      </table>
    </div>
  </main>
</div>
<script>
function selectMK(el, idx) {
  document.querySelectorAll('.mk-card').forEach(c=>c.classList.remove('active'));
  el.classList.add('active');
  const titles = ['Jaringan Komputer','Kecerdasan Buatan','Pemrograman Web','Sistem Operasi','Rekayasa Perangkat Lunak','Metodologi Penelitian'];
  document.getElementById('detailTitle').textContent = 'Detail Absensi — '+titles[idx];
}
</script>
</body>
</html>