<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jadwal Kuliah — AkademikApp</title>
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
.btn-primary{background:#1a7a5e;color:#fff}
.btn-primary:hover{background:#166a52}
.btn-outline{background:#fff;color:#1a7a5e;border:1.5px solid #1a7a5e}
.btn-outline:hover{background:#e8f5f0}
.tabs{display:flex;gap:4px;background:#fff;border-radius:10px;padding:4px;border:1px solid #ececec;margin-bottom:20px;width:fit-content}
.tab{padding:7px 18px;border-radius:7px;font-size:13px;font-weight:600;color:#888;cursor:pointer;transition:all .15s}
.tab.active{background:#1a7a5e;color:#fff}
.tab:hover:not(.active){background:#f4f6f8;color:#555}
/* Weekly timetable */
.week-nav{display:flex;align-items:center;gap:12px;margin-bottom:16px}
.week-arrow{width:32px;height:32px;border-radius:8px;background:#fff;border:1px solid #ececec;display:flex;align-items:center;justify-content:center;cursor:pointer}
.week-arrow:hover{background:#f4f6f8}
.week-arrow i{font-size:16px;color:#555}
.week-label{font-size:14px;font-weight:600;color:#1a1a1a}
.timetable-wrap{background:#fff;border-radius:12px;border:1px solid #ececec;overflow:hidden}
.tt-head{display:grid;grid-template-columns:72px repeat(5,1fr);border-bottom:1px solid #ececec}
.tt-head-cell{padding:12px 0;text-align:center}
.tt-head-cell .day-name{font-size:12px;font-weight:700;color:#888;text-transform:uppercase;letter-spacing:.05em}
.tt-head-cell .day-num{font-size:18px;font-weight:700;color:#1a1a1a;margin-top:2px}
.tt-head-cell.today .day-name{color:#1a7a5e}
.tt-head-cell.today .day-num{width:34px;height:34px;background:#1a7a5e;color:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:2px auto 0;font-size:15px}
.tt-body{display:grid;grid-template-columns:72px repeat(5,1fr)}
.tt-time-col{border-right:1px solid #f0f0f0}
.tt-time{padding:10px 0;text-align:center;font-size:11px;color:#bbb;font-weight:600;height:72px;display:flex;align-items:flex-start;justify-content:center;padding-top:10px;border-bottom:1px solid #f8f8f8}
.tt-col{border-right:1px solid #f8f8f8;position:relative}
.tt-col:last-child{border-right:none}
.tt-slot{height:72px;border-bottom:1px solid #f8f8f8;position:relative}
.tt-class{position:absolute;left:3px;right:3px;border-radius:8px;padding:6px 8px;cursor:pointer;overflow:hidden}
.tc-name{font-size:11.5px;font-weight:700;line-height:1.2}
.tc-room{font-size:10px;margin-top:3px;opacity:.8}
.tc-b{background:#e6f1fb;border-left:3px solid #185FA5}.tc-b .tc-name{color:#185FA5}.tc-b .tc-room{color:#185FA5}
.tc-g{background:#e8f5f0;border-left:3px solid #1a7a5e}.tc-g .tc-name{color:#1a7a5e}.tc-g .tc-room{color:#1a7a5e}
.tc-p{background:#EEEDFE;border-left:3px solid #3C3489}.tc-p .tc-name{color:#3C3489}.tc-p .tc-room{color:#3C3489}
.tc-a{background:#faeeda;border-left:3px solid #854F0B}.tc-a .tc-name{color:#854F0B}.tc-a .tc-room{color:#854F0B}
/* List view */
.list-card{background:#fff;border-radius:12px;border:1px solid #ececec;overflow:hidden;margin-bottom:14px}
.list-day-header{padding:10px 18px;background:#f9f9f7;font-size:12px;font-weight:700;color:#888;text-transform:uppercase;letter-spacing:.06em;border-bottom:1px solid #ececec;display:flex;align-items:center;gap:8px}
.list-day-badge{font-size:11px;font-weight:700;color:#1a7a5e;background:#e8f5f0;padding:2px 8px;border-radius:20px}
.list-item{display:flex;align-items:center;gap:14px;padding:14px 18px;border-bottom:1px solid #f5f5f3}
.list-item:last-child{border-bottom:none}
.list-item:hover{background:#fafafa}
.li-time-col{min-width:80px;text-align:center}
.li-time{font-size:13px;font-weight:700;color:#1a1a1a}
.li-dur{font-size:10px;color:#bbb;margin-top:2px}
.li-divider{width:2px;height:40px;border-radius:2px}
.li-info{flex:1}
.li-matkul{font-size:14px;font-weight:600;color:#1a1a1a}
.li-detail{font-size:12px;color:#888;margin-top:3px;display:flex;align-items:center;gap:10px}
.li-detail span{display:flex;align-items:center;gap:4px}
.li-detail i{font-size:13px}
.li-room{text-align:right}
.li-room-name{font-size:13px;font-weight:600;color:#1a1a1a}
.li-room-sub{font-size:11px;color:#888;margin-top:2px}
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
  <a href="jadwal.html" class="nav-item active"><i class="ti ti-calendar-week"></i> Jadwal Kuliah</a>
  <a href="nilai.html" class="nav-item"><i class="ti ti-file-certificate"></i> Nilai &amp; Transkrip</a>
  <a href="krs.html" class="nav-item"><i class="ti ti-notes"></i> KRS</a>
  <a href="absensi.html" class="nav-item"><i class="ti ti-clipboard-list"></i> Absensi</a>
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
        <div class="page-title">Jadwal Kuliah</div>
        <div class="page-sub">Semester Ganjil 2024/2025 — 6 matakuliah · 20 SKS</div>
      </div>
      <div style="display:flex;gap:8px">
        <a href="#" class="btn btn-outline"><i class="ti ti-download"></i> Unduh PDF</a>
      </div>
    </div>

    <div class="tabs" id="viewTabs">
      <div class="tab active" onclick="switchView('week')">Mingguan</div>
      <div class="tab" onclick="switchView('list')">Daftar</div>
    </div>

    <!-- Weekly view -->
    <div id="weekView">
      <div class="week-nav">
        <div class="week-arrow"><i class="ti ti-chevron-left"></i></div>
        <div class="week-label">5 – 10 Mei 2026</div>
        <div class="week-arrow"><i class="ti ti-chevron-right"></i></div>
      </div>
      <div class="timetable-wrap">
        <div class="tt-head">
          <div style="padding:12px 0"></div>
          <div class="tt-head-cell today"><div class="day-name">Sen</div><div class="day-num">5</div></div>
          <div class="tt-head-cell"><div class="day-name">Sel</div><div class="day-num" style="margin-top:4px">6</div></div>
          <div class="tt-head-cell"><div class="day-name">Rab</div><div class="day-num" style="margin-top:4px">7</div></div>
          <div class="tt-head-cell"><div class="day-name">Kam</div><div class="day-num" style="margin-top:4px">8</div></div>
          <div class="tt-head-cell"><div class="day-name">Jum</div><div class="day-num" style="margin-top:4px">9</div></div>
        </div>
        <div class="tt-body">
          <div class="tt-time-col">
            <div class="tt-time">07.00</div>
            <div class="tt-time">08.00</div>
            <div class="tt-time">09.00</div>
            <div class="tt-time">10.00</div>
            <div class="tt-time">11.00</div>
            <div class="tt-time">12.00</div>
            <div class="tt-time">13.00</div>
            <div class="tt-time">14.00</div>
            <div class="tt-time">15.00</div>
          </div>
          <!-- Senin -->
          <div class="tt-col">
            <div class="tt-slot" style="position:relative">
              <div class="tt-class tc-b" style="top:0;height:182px">
                <div class="tc-name">Kalkulus II</div>
                <div class="tc-room">07.30–10.00 · Gd B R.201</div>
              </div>
            </div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot" style="position:relative">
              <div class="tt-class tc-g" style="top:0;height:182px">
                <div class="tc-name">Algoritma &amp; Pemrograman</div>
                <div class="tc-room">10.00–12.30 · Lab A-101</div>
              </div>
            </div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
          </div>
          <!-- Selasa -->
          <div class="tt-col">
            <div class="tt-slot"></div>
            <div class="tt-slot" style="position:relative">
              <div class="tt-class tc-a" style="top:0;height:182px">
                <div class="tc-name">Fisika Dasar</div>
                <div class="tc-room">08.00–10.30 · Gd C R.102</div>
              </div>
            </div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
          </div>
          <!-- Rabu -->
          <div class="tt-col">
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot" style="position:relative">
              <div class="tt-class tc-p" style="top:0;height:182px">
                <div class="tc-name">Basis Data</div>
                <div class="tc-room">10.00–12.30 · Lab A-102</div>
              </div>
            </div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
          </div>
          <!-- Kamis -->
          <div class="tt-col">
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot" style="position:relative">
              <div class="tt-class tc-g" style="top:0;height:182px">
                <div class="tc-name">Jaringan Komputer</div>
                <div class="tc-room">13.00–15.30 · Lab A-104</div>
              </div>
            </div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
          </div>
          <!-- Jumat -->
          <div class="tt-col">
            <div class="tt-slot"></div>
            <div class="tt-slot" style="position:relative">
              <div class="tt-class tc-b" style="top:0;height:116px">
                <div class="tc-name">Pancasila &amp; Kewarganegaraan</div>
                <div class="tc-room">08.00–09.30 · Gd A R.101</div>
              </div>
            </div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
            <div class="tt-slot"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- List view (hidden by default) -->
    <div id="listView" style="display:none">
      <div class="list-card">
        <div class="list-day-header"><i class="ti ti-calendar" style="font-size:14px"></i> Senin <span class="list-day-badge">Hari ini</span></div>
        <div class="list-item">
          <div class="li-time-col"><div class="li-time">07.30</div><div class="li-dur">2.5 jam</div></div>
          <div class="li-divider" style="background:#185FA5"></div>
          <div class="li-info">
            <div class="li-matkul">Kalkulus II</div>
            <div class="li-detail">
              <span><i class="ti ti-user" style="color:#1a7a5e"></i> Dr. Rina Kusuma</span>
              <span><i class="ti ti-book" style="color:#888"></i> 3 SKS</span>
            </div>
          </div>
          <div class="li-room"><div class="li-room-name">Gd B – R.201</div><div class="li-room-sub">10.00 selesai</div></div>
        </div>
        <div class="list-item">
          <div class="li-time-col"><div class="li-time">10.00</div><div class="li-dur">2.5 jam</div></div>
          <div class="li-divider" style="background:#1a7a5e"></div>
          <div class="li-info">
            <div class="li-matkul">Algoritma &amp; Pemrograman</div>
            <div class="li-detail">
              <span><i class="ti ti-user" style="color:#1a7a5e"></i> Dr. Budi Santoso</span>
              <span><i class="ti ti-book" style="color:#888"></i> 3 SKS</span>
            </div>
          </div>
          <div class="li-room"><div class="li-room-name">Lab A-101</div><div class="li-room-sub">12.30 selesai</div></div>
        </div>
      </div>
      <div class="list-card">
        <div class="list-day-header"><i class="ti ti-calendar" style="font-size:14px"></i> Selasa</div>
        <div class="list-item">
          <div class="li-time-col"><div class="li-time">08.00</div><div class="li-dur">2.5 jam</div></div>
          <div class="li-divider" style="background:#854F0B"></div>
          <div class="li-info">
            <div class="li-matkul">Fisika Dasar</div>
            <div class="li-detail">
              <span><i class="ti ti-user" style="color:#1a7a5e"></i> Dr. Anita Rahayu</span>
              <span><i class="ti ti-book" style="color:#888"></i> 3 SKS</span>
            </div>
          </div>
          <div class="li-room"><div class="li-room-name">Gd C – R.102</div><div class="li-room-sub">10.30 selesai</div></div>
        </div>
      </div>
      <div class="list-card">
        <div class="list-day-header"><i class="ti ti-calendar" style="font-size:14px"></i> Rabu</div>
        <div class="list-item">
          <div class="li-time-col"><div class="li-time">10.00</div><div class="li-dur">2.5 jam</div></div>
          <div class="li-divider" style="background:#3C3489"></div>
          <div class="li-info">
            <div class="li-matkul">Basis Data</div>
            <div class="li-detail">
              <span><i class="ti ti-user" style="color:#1a7a5e"></i> Dr. Hendra Wijaya</span>
              <span><i class="ti ti-book" style="color:#888"></i> 3 SKS</span>
            </div>
          </div>
          <div class="li-room"><div class="li-room-name">Lab A-102</div><div class="li-room-sub">12.30 selesai</div></div>
        </div>
      </div>
      <div class="list-card">
        <div class="list-day-header"><i class="ti ti-calendar" style="font-size:14px"></i> Kamis</div>
        <div class="list-item">
          <div class="li-time-col"><div class="li-time">13.00</div><div class="li-dur">2.5 jam</div></div>
          <div class="li-divider" style="background:#1a7a5e"></div>
          <div class="li-info">
            <div class="li-matkul">Jaringan Komputer</div>
            <div class="li-detail">
              <span><i class="ti ti-user" style="color:#1a7a5e"></i> Dr. Hendra Wijaya</span>
              <span><i class="ti ti-book" style="color:#888"></i> 3 SKS</span>
            </div>
          </div>
          <div class="li-room"><div class="li-room-name">Lab A-104</div><div class="li-room-sub">15.30 selesai</div></div>
        </div>
      </div>
      <div class="list-card">
        <div class="list-day-header"><i class="ti ti-calendar" style="font-size:14px"></i> Jumat</div>
        <div class="list-item">
          <div class="li-time-col"><div class="li-time">08.00</div><div class="li-dur">1.5 jam</div></div>
          <div class="li-divider" style="background:#185FA5"></div>
          <div class="li-info">
            <div class="li-matkul">Pancasila &amp; Kewarganegaraan</div>
            <div class="li-detail">
              <span><i class="ti ti-user" style="color:#1a7a5e"></i> Dr. Sari Dewi</span>
              <span><i class="ti ti-book" style="color:#888"></i> 2 SKS</span>
            </div>
          </div>
          <div class="li-room"><div class="li-room-name">Gd A – R.101</div><div class="li-room-sub">09.30 selesai</div></div>
        </div>
      </div>
    </div>
  </main>
</div>
<script>
function switchView(v){
  document.getElementById('weekView').style.display = v==='week'?'block':'none';
  document.getElementById('listView').style.display = v==='list'?'block':'none';
  document.querySelectorAll('.tab').forEach((t,i)=>{
    t.classList.toggle('active', (v==='week'&&i===0)||(v==='list'&&i===1));
  });
}
</script>
</body>
</html>