<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>KRS — AkademikApp</title>
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
.page-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px}
.page-title{font-size:20px;font-weight:700;color:#1a1a1a}
.page-sub{font-size:13px;color:#888;margin-top:3px}
.btn{display:inline-flex;align-items:center;gap:6px;padding:9px 16px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;border:none;text-decoration:none}
.btn-primary{background:#1a7a5e;color:#fff}
.btn-primary:hover{background:#166a52}
.btn-outline{background:#fff;color:#1a7a5e;border:1.5px solid #1a7a5e}
.btn-outline:hover{background:#e8f5f0}
.btn-danger{background:#fff;color:#e24b4a;border:1.5px solid #e24b4a}
.btn-danger:hover{background:#fcebeb}
/* Status banner */
.status-banner{display:flex;align-items:center;gap:14px;background:#fff;border:1px solid #ececec;border-radius:12px;padding:16px 22px;margin-bottom:20px}
.sb-icon{width:44px;height:44px;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.sb-title{font-size:14px;font-weight:700;color:#1a1a1a}
.sb-sub{font-size:12px;color:#888;margin-top:3px}
.sb-badge{margin-left:auto;padding:6px 14px;border-radius:20px;font-size:12px;font-weight:700}
.badge-approved{background:#e8f5f0;color:#0F6E56}
.badge-pending{background:#faeeda;color:#854F0B}
/* SKS meter */
.sks-row{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:20px}
.sks-card{background:#fff;border-radius:12px;border:1px solid #ececec;padding:16px 20px}
.sks-label{font-size:12px;color:#888;margin-bottom:4px}
.sks-val{font-size:24px;font-weight:700;color:#1a1a1a}
.sks-sub{font-size:11px;color:#aaa;margin-top:4px}
.sks-bar{height:6px;background:#f0f0f0;border-radius:10px;overflow:hidden;margin-top:10px}
.sks-fill{height:100%;border-radius:10px;transition:width .4s}
/* Two col layout */
.two-col{display:grid;grid-template-columns:1fr 380px;gap:16px}
/* Matkul list */
.card{background:#fff;border-radius:12px;border:1px solid #ececec;overflow:hidden}
.card-header{display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid #f0f0f0}
.card-title{font-size:14px;font-weight:700;color:#1a1a1a}
.krs-item{display:flex;align-items:center;gap:12px;padding:14px 18px;border-bottom:1px solid #f5f5f3}
.krs-item:last-child{border-bottom:none}
.krs-num{width:28px;height:28px;border-radius:8px;background:#f4f6f8;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:#888;flex-shrink:0}
.krs-info{flex:1}
.krs-mk{font-size:13px;font-weight:600;color:#1a1a1a}
.krs-det{font-size:11px;color:#888;margin-top:3px;display:flex;gap:10px}
.krs-sks{font-size:13px;font-weight:700;color:#1a7a5e;white-space:nowrap;text-align:right}
.krs-sks-lbl{font-size:10px;color:#aaa;text-align:right;margin-top:2px}
.del-btn{width:28px;height:28px;border-radius:7px;background:#fcebeb;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;margin-left:8px}
.del-btn i{font-size:14px;color:#e24b4a}
.del-btn:hover{background:#f7c1c1}
/* Catalog */
.cat-search{display:flex;align-items:center;gap:8px;background:#f4f6f8;border:1px solid #e0e0e0;border-radius:8px;padding:8px 12px;margin:14px 18px 10px}
.cat-search input{border:none;background:transparent;font-size:13px;color:#333;outline:none;flex:1}
.cat-search i{font-size:15px;color:#bbb}
.cat-item{display:flex;align-items:center;gap:10px;padding:10px 18px;border-bottom:1px solid #f5f5f3;cursor:pointer}
.cat-item:last-child{border-bottom:none}
.cat-item:hover{background:#fafafa}
.cat-info{flex:1}
.cat-mk{font-size:12.5px;font-weight:600;color:#1a1a1a}
.cat-det{font-size:11px;color:#888;margin-top:2px}
.cat-sks{font-size:12px;font-weight:700;color:#555;margin-right:8px}
.add-btn{width:26px;height:26px;border-radius:7px;background:#e8f5f0;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center}
.add-btn i{font-size:14px;color:#1a7a5e}
.add-btn:hover{background:#c5e8d9}
.add-btn.added{background:#f0f0f0;cursor:default}
.add-btn.added i{color:#bbb}
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
  <a href="krs.html" class="nav-item active"><i class="ti ti-notes"></i> KRS</a>
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
        <div class="page-title">Kartu Rencana Studi (KRS)</div>
        <div class="page-sub">Semester Ganjil 2024/2025 — Periode pengisian: 1–14 Agustus 2024</div>
      </div>
      <div style="display:flex;gap:8px">
        <a href="#" class="btn btn-outline"><i class="ti ti-printer"></i> Cetak KRS</a>
        <a href="#" class="btn btn-primary" id="ajukanBtn"><i class="ti ti-send"></i> Ajukan ke PA</a>
      </div>
    </div>

    <div class="status-banner">
      <div class="sb-icon" style="background:#e8f5f0"><i class="ti ti-circle-check" style="font-size:22px;color:#1a7a5e"></i></div>
      <div>
        <div class="sb-title">KRS Semester Ganjil 2024/2025</div>
        <div class="sb-sub">Diajukan 5 Agustus 2024 · Disetujui oleh Dr. Budi Santoso pada 7 Agustus 2024</div>
      </div>
      <span class="sb-badge badge-approved">✓ Disetujui</span>
    </div>

    <div class="sks-row">
      <div class="sks-card">
        <div class="sks-label">SKS Diambil</div>
        <div class="sks-val" id="sksAmbil">20</div>
        <div class="sks-sub">Maksimum 24 SKS (IPS ≥ 3.00)</div>
        <div class="sks-bar"><div class="sks-fill" id="sksFill" style="width:83%;background:#1a7a5e"></div></div>
      </div>
      <div class="sks-card">
        <div class="sks-label">Jumlah Matakuliah</div>
        <div class="sks-val" id="jmlMK">6</div>
        <div class="sks-sub">Matakuliah terdaftar</div>
      </div>
      <div class="sks-card">
        <div class="sks-label">SKS Kumulatif Lulus</div>
        <div class="sks-val">68</div>
        <div class="sks-sub">dari 144 SKS total</div>
        <div class="sks-bar"><div class="sks-fill" style="width:47%;background:#185FA5"></div></div>
      </div>
    </div>

    <div class="two-col">
      <div class="card">
        <div class="card-header">
          <span class="card-title">Matakuliah yang Diambil</span>
          <span style="font-size:12px;color:#888" id="totalSksLabel">Total: 20 SKS</span>
        </div>
        <div id="krsList">
          <div class="krs-item"><div class="krs-num">1</div><div class="krs-info"><div class="krs-mk">Jaringan Komputer</div><div class="krs-det"><span>TI401</span><span>Dr. Hendra Wijaya</span><span>Sen 13.00–15.30</span></div></div><div style="text-align:right"><div class="krs-sks">3</div><div class="krs-sks-lbl">SKS</div></div><button class="del-btn" onclick="removeKRS(this,3)"><i class="ti ti-trash"></i></button></div>
          <div class="krs-item"><div class="krs-num">2</div><div class="krs-info"><div class="krs-mk">Kecerdasan Buatan</div><div class="krs-det"><span>TI402</span><span>Dr. Budi Santoso</span><span>Sel 10.00–12.30</span></div></div><div style="text-align:right"><div class="krs-sks">3</div><div class="krs-sks-lbl">SKS</div></div><button class="del-btn" onclick="removeKRS(this,3)"><i class="ti ti-trash"></i></button></div>
          <div class="krs-item"><div class="krs-num">3</div><div class="krs-info"><div class="krs-mk">Pemrograman Web</div><div class="krs-det"><span>TI403</span><span>Dr. Suryo Prabowo</span><span>Rab 08.00–10.30</span></div></div><div style="text-align:right"><div class="krs-sks">4</div><div class="krs-sks-lbl">SKS</div></div><button class="del-btn" onclick="removeKRS(this,4)"><i class="ti ti-trash"></i></button></div>
          <div class="krs-item"><div class="krs-num">4</div><div class="krs-info"><div class="krs-mk">Sistem Operasi</div><div class="krs-det"><span>TI404</span><span>Dr. Anita Rahayu</span><span>Rab 13.00–15.30</span></div></div><div style="text-align:right"><div class="krs-sks">3</div><div class="krs-sks-lbl">SKS</div></div><button class="del-btn" onclick="removeKRS(this,3)"><i class="ti ti-trash"></i></button></div>
          <div class="krs-item"><div class="krs-num">5</div><div class="krs-info"><div class="krs-mk">Rekayasa Perangkat Lunak</div><div class="krs-det"><span>TI405</span><span>Dr. Sari Dewi</span><span>Kam 08.00–10.30</span></div></div><div style="text-align:right"><div class="krs-sks">4</div><div class="krs-sks-lbl">SKS</div></div><button class="del-btn" onclick="removeKRS(this,4)"><i class="ti ti-trash"></i></button></div>
          <div class="krs-item"><div class="krs-num">6</div><div class="krs-info"><div class="krs-mk">Metodologi Penelitian</div><div class="krs-det"><span>TI406</span><span>Dr. Rina Kusuma</span><span>Jum 08.00–09.30</span></div></div><div style="text-align:right"><div class="krs-sks">3</div><div class="krs-sks-lbl">SKS</div></div><button class="del-btn" onclick="removeKRS(this,3)"><i class="ti ti-trash"></i></button></div>
        </div>
      </div>

      <div class="card" style="height:fit-content">
        <div class="card-header"><span class="card-title">Katalog Matakuliah</span></div>
        <div class="cat-search"><i class="ti ti-search"></i><input type="text" placeholder="Cari matakuliah..."></div>
        <div class="cat-item"><div class="cat-info"><div class="cat-mk">Komputer Grafis</div><div class="cat-det">TI501 · Dr. Suryo Prabowo · 3 SKS</div></div><button class="add-btn"><i class="ti ti-plus"></i></button></div>
        <div class="cat-item"><div class="cat-info"><div class="cat-mk">Keamanan Informasi</div><div class="cat-det">TI502 · Dr. Hendra Wijaya · 3 SKS</div></div><button class="add-btn"><i class="ti ti-plus"></i></button></div>
        <div class="cat-item"><div class="cat-info"><div class="cat-mk">Pemrograman Mobile</div><div class="cat-det">TI503 · Dr. Budi Santoso · 4 SKS</div></div><button class="add-btn"><i class="ti ti-plus"></i></button></div>
        <div class="cat-item"><div class="cat-info"><div class="cat-mk">Cloud Computing</div><div class="cat-det">TI504 · Dr. Anita Rahayu · 3 SKS</div></div><button class="add-btn"><i class="ti ti-plus"></i></button></div>
        <div class="cat-item"><div class="cat-info"><div class="cat-mk">Data Mining</div><div class="cat-det">TI505 · Dr. Rina Kusuma · 3 SKS</div></div><button class="add-btn"><i class="ti ti-plus"></i></button></div>
      </div>
    </div>
  </main>
</div>
<script>
let totalSKS = 20;
let totalMK = 6;
function removeKRS(btn, sks) {
  const item = btn.closest('.krs-item');
  item.remove();
  totalSKS -= sks;
  totalMK--;
  updateSKS();
  renumberItems();
}
function updateSKS() {
  document.getElementById('sksAmbil').textContent = totalSKS;
  document.getElementById('jmlMK').textContent = totalMK;
  document.getElementById('totalSksLabel').textContent = 'Total: '+totalSKS+' SKS';
  document.getElementById('sksFill').style.width = Math.round(totalSKS/24*100)+'%';
}
function renumberItems() {
  document.querySelectorAll('.krs-item').forEach((el,i)=>{
    el.querySelector('.krs-num').textContent = i+1;
  });
}
</script>
</body>
</html>