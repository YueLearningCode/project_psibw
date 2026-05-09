<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nilai &amp; Transkrip — AkademikApp</title>
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
/* IPK summary cards */
.summary-row{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:22px}
.sum-card{background:#fff;border-radius:12px;border:1px solid #ececec;padding:16px 20px}
.sum-label{font-size:12px;color:#888;margin-bottom:6px}
.sum-val{font-size:26px;font-weight:700;color:#1a1a1a}
.sum-sub{font-size:11px;color:#aaa;margin-top:4px}
/* Progress bar */
.prog-wrap{display:flex;align-items:center;gap:10px;margin-top:8px}
.prog-bar{flex:1;height:6px;background:#f0f0f0;border-radius:10px;overflow:hidden}
.prog-fill{height:100%;border-radius:10px;background:#1a7a5e}
.prog-txt{font-size:11px;color:#888;white-space:nowrap}
/* Semester tabs */
.sem-tabs{display:flex;gap:8px;margin-bottom:18px;flex-wrap:wrap}
.sem-tab{padding:6px 14px;border-radius:20px;font-size:12px;font-weight:600;cursor:pointer;border:1px solid #ececec;background:#fff;color:#888;transition:all .15s}
.sem-tab.active{background:#1a7a5e;color:#fff;border-color:#1a7a5e}
.sem-tab:hover:not(.active){background:#f4f6f8}
/* Table */
.card{background:#fff;border-radius:12px;border:1px solid #ececec;overflow:hidden;margin-bottom:16px}
.card-header{display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid #f0f0f0}
.card-title{font-size:14px;font-weight:700;color:#1a1a1a}
.card-sub{font-size:12px;color:#888}
table{width:100%;border-collapse:collapse}
thead tr{background:#f9f9f7;border-bottom:1px solid #ececec}
th{padding:10px 18px;text-align:left;font-size:11px;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:.05em}
td{padding:13px 18px;font-size:13px;color:#333;border-bottom:1px solid #f5f5f3}
tbody tr:last-child td{border-bottom:none}
tbody tr:hover{background:#fafafa}
.grade-badge{display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:8px;font-size:15px;font-weight:700}
.g-A{background:#e8f5f0;color:#0F6E56}
.g-B{background:#e6f1fb;color:#185FA5}
.g-Bp{background:#e6f1fb;color:#185FA5}
.g-C{background:#EEEDFE;color:#3C3489}
.g-proses{background:#f4f6f8;color:#aaa}
.mutu-val{font-size:13px;font-weight:600;color:#1a1a1a}
.status-ok{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:600;padding:3px 8px;border-radius:20px;background:#e8f5f0;color:#0F6E56}
.status-proses{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:600;padding:3px 8px;border-radius:20px;background:#f4f6f8;color:#888}
.dot{width:5px;height:5px;border-radius:50%}
/* Semester footer */
.sem-footer{display:flex;align-items:center;justify-content:space-between;padding:12px 18px;background:#f9f9f7;border-top:1px solid #ececec}
.sf-label{font-size:12px;color:#888}
.sf-val{font-size:14px;font-weight:700;color:#1a1a1a}
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
  <a href="nilai.html" class="nav-item active"><i class="ti ti-file-certificate"></i> Nilai &amp; Transkrip</a>
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
        <div class="page-title">Nilai &amp; Transkrip</div>
        <div class="page-sub">Reza Firmansyah · NIM 22101088 · Teknik Informatika</div>
      </div>
      <div style="display:flex;gap:8px">
        <a href="#" class="btn btn-outline"><i class="ti ti-download"></i> Unduh Transkrip</a>
        <a href="#" class="btn btn-primary"><i class="ti ti-file-certificate"></i> Cetak KHS</a>
      </div>
    </div>

    <div class="summary-row">
      <div class="sum-card">
        <div class="sum-label">IPK Kumulatif</div>
        <div class="sum-val" style="color:#1a7a5e">3.72</div>
        <div class="sum-sub">Skala 4.00</div>
      </div>
      <div class="sum-card">
        <div class="sum-label">SKS Lulus</div>
        <div class="sum-val">68</div>
        <div class="prog-wrap"><div class="prog-bar"><div class="prog-fill" style="width:47%"></div></div><span class="prog-txt">68/144</span></div>
      </div>
      <div class="sum-card">
        <div class="sum-label">IPS Semester Ini</div>
        <div class="sum-val" style="color:#185FA5">3.61</div>
        <div class="sum-sub">Ganjil 2024/2025</div>
      </div>
      <div class="sum-card">
        <div class="sum-label">Semester Tempuh</div>
        <div class="sum-val">4</div>
        <div class="sum-sub">dari 8 semester</div>
      </div>
    </div>

    <div class="sem-tabs" id="semTabs">
      <div class="sem-tab" onclick="showSem(0)">Sem 1</div>
      <div class="sem-tab" onclick="showSem(1)">Sem 2</div>
      <div class="sem-tab active" onclick="showSem(2)">Sem 3</div>
      <div class="sem-tab" onclick="showSem(3)">Sem 4 (Aktif)</div>
    </div>

    <!-- Semester 3 table (shown by default) -->
    <div class="card" id="semTable">
      <div class="card-header">
        <div><div class="card-title">Semester 3 — Ganjil 2023/2024</div><div class="card-sub" style="margin-top:3px">5 matakuliah · 17 SKS</div></div>
      </div>
      <table>
        <thead>
          <tr>
            <th>Kode MK</th>
            <th>Matakuliah</th>
            <th>SKS</th>
            <th>Nilai Huruf</th>
            <th>Nilai Angka</th>
            <th>Mutu</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="font-size:12px;color:#888;font-weight:600">TI301</td>
            <td><div style="font-weight:600;color:#1a1a1a">Algoritma &amp; Pemrograman</div><div style="font-size:11px;color:#aaa">Dr. Budi Santoso</div></td>
            <td style="font-weight:600">3</td>
            <td><span class="grade-badge g-A">A</span></td>
            <td style="font-weight:700;color:#0F6E56">4.00</td>
            <td class="mutu-val">12.00</td>
            <td><span class="status-ok"><span class="dot" style="background:#0F6E56"></span>Lulus</span></td>
          </tr>
          <tr>
            <td style="font-size:12px;color:#888;font-weight:600">TI302</td>
            <td><div style="font-weight:600;color:#1a1a1a">Kalkulus II</div><div style="font-size:11px;color:#aaa">Dr. Rina Kusuma</div></td>
            <td style="font-weight:600">3</td>
            <td><span class="grade-badge g-Bp">B+</span></td>
            <td style="font-weight:700;color:#185FA5">3.50</td>
            <td class="mutu-val">10.50</td>
            <td><span class="status-ok"><span class="dot" style="background:#0F6E56"></span>Lulus</span></td>
          </tr>
          <tr>
            <td style="font-size:12px;color:#888;font-weight:600">TI303</td>
            <td><div style="font-weight:600;color:#1a1a1a">Basis Data</div><div style="font-size:11px;color:#aaa">Dr. Hendra Wijaya</div></td>
            <td style="font-weight:600">4</td>
            <td><span class="grade-badge g-A">A</span></td>
            <td style="font-weight:700;color:#0F6E56">4.00</td>
            <td class="mutu-val">16.00</td>
            <td><span class="status-ok"><span class="dot" style="background:#0F6E56"></span>Lulus</span></td>
          </tr>
          <tr>
            <td style="font-size:12px;color:#888;font-weight:600">TI304</td>
            <td><div style="font-weight:600;color:#1a1a1a">Fisika Dasar</div><div style="font-size:11px;color:#aaa">Dr. Anita Rahayu</div></td>
            <td style="font-weight:600">3</td>
            <td><span class="grade-badge g-B">B</span></td>
            <td style="font-weight:700;color:#185FA5">3.00</td>
            <td class="mutu-val">9.00</td>
            <td><span class="status-ok"><span class="dot" style="background:#0F6E56"></span>Lulus</span></td>
          </tr>
          <tr>
            <td style="font-size:12px;color:#888;font-weight:600">TI305</td>
            <td><div style="font-weight:600;color:#1a1a1a">Pancasila &amp; Kewarganegaraan</div><div style="font-size:11px;color:#aaa">Dr. Sari Dewi</div></td>
            <td style="font-weight:600">4</td>
            <td><span class="grade-badge g-A">A</span></td>
            <td style="font-weight:700;color:#0F6E56">4.00</td>
            <td class="mutu-val">16.00</td>
            <td><span class="status-ok"><span class="dot" style="background:#0F6E56"></span>Lulus</span></td>
          </tr>
        </tbody>
      </table>
      <div class="sem-footer">
        <div><span class="sf-label">Total SKS: </span><span class="sf-val">17</span></div>
        <div><span class="sf-label">Total Mutu: </span><span class="sf-val">63.50</span></div>
        <div><span class="sf-label">IPS: </span><span class="sf-val" style="color:#1a7a5e;font-size:16px">3.74</span></div>
      </div>
    </div>
  </main>
</div>
<script>
const semData = [
  {label:'Semester 1 — Ganjil 2022/2023',matkul:'5 matakuliah · 17 SKS',rows:[
    ['TI101','Pengantar Teknologi Informasi','Dr. Suryo Prabowo','3','A','4.00','12.00'],
    ['TI102','Matematika Diskrit','Dr. Rina Kusuma','3','B+','3.50','10.50'],
    ['TI103','Dasar Pemrograman','Dr. Budi Santoso','4','A','4.00','16.00'],
    ['TI104','Bahasa Indonesia','Dr. Dewi Lestari','2','A','4.00','8.00'],
    ['TI105','Bahasa Inggris','Dr. Ahmad Fauzi','3','B','3.00','9.00'],
  ],ips:'3.68'},
  {label:'Semester 2 — Genap 2022/2023',matkul:'5 matakuliah · 17 SKS',rows:[
    ['TI201','Pemrograman Berorientasi Objek','Dr. Budi Santoso','4','A','4.00','16.00'],
    ['TI202','Kalkulus I','Dr. Rina Kusuma','3','B+','3.50','10.50'],
    ['TI203','Struktur Data','Dr. Hendra Wijaya','3','A','4.00','12.00'],
    ['TI204','Logika Matematika','Dr. Suryo Prabowo','3','B','3.00','9.00'],
    ['TI205','Statistika','Dr. Anita Rahayu','2','A','4.00','8.00'],
  ],ips:'3.76'},
  {label:'Semester 3 — Ganjil 2023/2024',matkul:'5 matakuliah · 17 SKS',rows:[
    ['TI301','Algoritma &amp; Pemrograman','Dr. Budi Santoso','3','A','4.00','12.00'],
    ['TI302','Kalkulus II','Dr. Rina Kusuma','3','B+','3.50','10.50'],
    ['TI303','Basis Data','Dr. Hendra Wijaya','4','A','4.00','16.00'],
    ['TI304','Fisika Dasar','Dr. Anita Rahayu','3','B','3.00','9.00'],
    ['TI305','Pancasila &amp; Kewarganegaraan','Dr. Sari Dewi','4','A','4.00','16.00'],
  ],ips:'3.74'},
  {label:'Semester 4 — Genap 2023/2024 (Aktif)',matkul:'6 matakuliah · 20 SKS',rows:[
    ['TI401','Jaringan Komputer','Dr. Hendra Wijaya','3','—','—','—'],
    ['TI402','Kecerdasan Buatan','Dr. Budi Santoso','3','—','—','—'],
    ['TI403','Pemrograman Web','Dr. Suryo Prabowo','4','—','—','—'],
    ['TI404','Sistem Operasi','Dr. Anita Rahayu','3','—','—','—'],
    ['TI405','Rekayasa Perangkat Lunak','Dr. Sari Dewi','4','—','—','—'],
    ['TI406','Metodologi Penelitian','Dr. Rina Kusuma','3','—','—','—'],
  ],ips:'—'},
];
function showSem(idx){
  document.querySelectorAll('.sem-tab').forEach((t,i)=>t.classList.toggle('active',i===idx));
  const d = semData[idx];
  const gradeColor = {'A':'#0F6E56','B+':'#185FA5','B':'#185FA5','—':'#aaa'};
  const gradeClass = {'A':'g-A','B+':'g-Bp','B':'g-B','—':'g-proses'};
  const isActive = idx===3;
  document.getElementById('semTable').innerHTML = `
    <div class="card-header"><div><div class="card-title">${d.label}</div><div class="card-sub" style="margin-top:3px">${d.matkul}</div></div></div>
    <table>
      <thead><tr><th>Kode MK</th><th>Matakuliah</th><th>SKS</th><th>Nilai Huruf</th><th>Nilai Angka</th><th>Mutu</th><th>Status</th></tr></thead>
      <tbody>
        ${d.rows.map(r=>`<tr>
          <td style="font-size:12px;color:#888;font-weight:600">${r[0]}</td>
          <td><div style="font-weight:600;color:#1a1a1a">${r[1]}</div><div style="font-size:11px;color:#aaa">${r[2]}</div></td>
          <td style="font-weight:600">${r[3]}</td>
          <td><span class="grade-badge ${gradeClass[r[4]]||'g-proses'}">${r[4]}</span></td>
          <td style="font-weight:700;color:${gradeColor[r[4]]||'#aaa'}">${r[5]}</td>
          <td class="mutu-val">${r[6]}</td>
          <td>${isActive?'<span class="status-proses"><span class="dot" style="background:#bbb"></span>Proses</span>':'<span class="status-ok"><span class="dot" style="background:#0F6E56"></span>Lulus</span>'}</td>
        </tr>`).join('')}
      </tbody>
    </table>
    ${isActive?'':`<div class="sem-footer">
      <div><span class="sf-label">Total SKS: </span><span class="sf-val">${d.rows.reduce((a,r)=>a+parseInt(r[3]),0)}</span></div>
      <div><span class="sf-label">IPS: </span><span class="sf-val" style="color:#1a7a5e;font-size:16px">${d.ips}</span></div>
    </div>`}
  `;
}
</script>
</body>
</html>