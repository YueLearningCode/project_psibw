<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Input Nilai - AkademikApp</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
  *{box-sizing:border-box;margin:0;padding:0}
  body{font-family:'Segoe UI',sans-serif;background:#f4f6f8;display:flex;height:100vh;overflow:hidden}
  .sidebar{width:160px;min-width:160px;background:#1a7a5e;display:flex;flex-direction:column;height:100vh;padding-bottom:12px}
  .logo{padding:16px 16px 14px;display:flex;align-items:center;gap:8px;border-bottom:1px solid rgba(255,255,255,0.15)}
  .logo-icon{width:28px;height:28px;border-radius:8px;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center}
  .logo-icon i{color:#fff;font-size:15px}
  .logo-text{font-size:13px;font-weight:700;color:#fff}
  .role-badge{margin:10px 12px 0;background:rgba(255,255,255,0.15);border-radius:8px;padding:8px 10px;display:flex;align-items:center;gap:8px}
  .role-badge i{font-size:16px;color:rgba(255,255,255,0.8)}
  .role-name{font-size:12px;font-weight:600;color:#fff}
  .role-sub{font-size:10px;color:rgba(255,255,255,0.6)}
  .sec-label{padding:14px 14px 4px;font-size:10px;font-weight:700;color:rgba(255,255,255,0.5);letter-spacing:.08em;text-transform:uppercase}
  .nav-item{display:flex;align-items:center;gap:8px;padding:9px 14px;margin:1px 8px;border-radius:8px;cursor:pointer;color:rgba(255,255,255,0.75);font-size:12.5px;transition:background .15s;text-decoration:none}
  .nav-item:hover{background:rgba(255,255,255,0.12);color:#fff}
  .nav-item.active{background:rgba(255,255,255,0.2);color:#fff;font-weight:600}
  .nav-item i{font-size:16px;opacity:.85}
  .nav-item.active i{opacity:1}
  .nav-bottom{margin-top:auto;border-top:1px solid rgba(255,255,255,0.15);padding:10px 8px 0}
  .right-wrap{flex:1;display:flex;flex-direction:column;overflow:hidden}
  .topnav{background:#fff;border-bottom:1px solid #e8e8e8;padding:10px 24px;display:flex;align-items:center;justify-content:space-between}
  .search-wrap{display:flex;align-items:center;gap:8px;background:#f4f6f8;border:1px solid #e0e0e0;border-radius:8px;padding:7px 14px;width:280px}
  .search-wrap input{border:none;background:transparent;font-size:13px;color:#333;outline:none;width:100%}
  .search-wrap i{font-size:15px;color:#bbb}
  .topnav-right{display:flex;align-items:center;gap:10px}
  .tnav-btn{width:32px;height:32px;border-radius:8px;background:#f4f6f8;border:1px solid #e8e8e8;display:flex;align-items:center;justify-content:center;cursor:pointer}
  .tnav-btn i{font-size:16px;color:#666}
  .avatar-top{width:32px;height:32px;border-radius:50%;background:#1a7a5e;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#fff}
  .main{flex:1;overflow-y:auto;background:#f4f6f8;padding:24px 28px}
  .page-head{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:20px}
  .page-title{font-size:20px;font-weight:700;color:#1a1a1a}
  .page-sub{font-size:13px;color:#888;margin-top:3px}
  .btn-simpan-all{background:#1a7a5e;color:#fff;border:none;padding:10px 20px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:8px}
  .btn-simpan-all i{font-size:16px}
  .btn-simpan-all:hover{background:#155f49}
  .filter-bar{display:flex;gap:12px;margin-bottom:18px}
  .filter-sel{font-size:13px;padding:9px 14px;border-radius:8px;border:1px solid #e0e0e0;background:#fff;outline:none;color:#333;cursor:pointer}
  .card{background:#fff;border-radius:12px;border:1px solid #ececec;overflow:hidden;margin-bottom:16px}
  .card-header{display:flex;align-items:center;justify-content:space-between;padding:14px 20px;border-bottom:1px solid #f0f0f0}
  .card-title{font-size:14px;font-weight:700;color:#1a1a1a}
  .deadline-badge{display:flex;align-items:center;gap:6px;font-size:12px;color:#854F0B;background:#faeeda;padding:5px 12px;border-radius:20px;font-weight:600}
  table{width:100%;border-collapse:collapse}
  thead tr{background:#f9f9f7;border-bottom:1px solid #ececec}
  th{padding:11px 16px;text-align:left;font-size:11px;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:.05em}
  td{padding:11px 16px;font-size:13px;color:#333;border-bottom:1px solid #f5f5f3}
  tbody tr:last-child td{border-bottom:none}
  tbody tr:hover{background:#fafafa}
  .nim-link{font-weight:700;color:#1a7a5e;font-size:12.5px}
  .mhs-cell{display:flex;align-items:center;gap:8px}
  .av{width:30px;height:30px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;flex-shrink:0}
  .av-a{background:#e6f1fb;color:#185FA5}.av-b{background:#e8f5f0;color:#1a7a5e}
  .av-c{background:#EEEDFE;color:#3C3489}.av-d{background:#faeeda;color:#854F0B}
  .av-e{background:#fbeaf0;color:#993556}.av-f{background:#fcebeb;color:#A32D2D}
  .mhs-name{font-size:13px;font-weight:600;color:#1a1a1a}
  .nilai-input{width:56px;padding:5px 8px;border:1px solid #e0e0e0;border-radius:6px;font-size:13px;text-align:center;outline:none;transition:border .15s}
  .nilai-input:focus{border-color:#1a7a5e}
  .nilai-badge{display:inline-block;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:700}
  .n-a{background:#e8f5f0;color:#1a7a5e}.n-b{background:#e6f1fb;color:#185FA5}
  .n-c{background:#faeeda;color:#854F0B}.n-d{background:#fbeaf0;color:#993556}
  .n-e{background:#fcebeb;color:#A32D2D}.n-bl{background:#f0f0f0;color:#888}
  .na-val{font-weight:700;color:#1a1a1a;font-size:14px}
  .btn-row-save{background:#1a7a5e;color:#fff;border:none;padding:5px 14px;border-radius:6px;font-size:12px;font-weight:600;cursor:pointer}
  .btn-row-save:hover{background:#155f49}
  .keterangan{margin-top:14px;background:#fff;border-radius:10px;border:1px solid #ececec;padding:14px 18px;display:flex;align-items:center;gap:20px;flex-wrap:wrap;font-size:12px;color:#555}
  .alert-saved{display:none;position:fixed;bottom:24px;right:24px;background:#1a7a5e;color:#fff;padding:12px 20px;border-radius:10px;font-size:13px;font-weight:600;display:none;align-items:center;gap:8px;box-shadow:0 4px 16px rgba(0,0,0,.15)}
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
    <i class="ti ti-user-check"></i>
    <div><div class="role-name">Dosen</div><div class="role-sub">Dr. Budi Santoso</div></div>
  </div>
  <div class="sec-label">Menu</div>
  <a href="dashboard.html" class="nav-item"><i class="ti ti-layout-dashboard"></i> Dashboard</a>
  <a href="jadwal.html" class="nav-item"><i class="ti ti-calendar"></i> Jadwal Saya</a>
  <a href="mahasiswa.html" class="nav-item"><i class="ti ti-users"></i> Mahasiswa</a>
  <a href="nilai.html" class="nav-item active"><i class="ti ti-clipboard-check"></i> Input Nilai</a>
  <div class="sec-label">Akun</div>
  <div class="nav-bottom">
    <a href="profil.html" class="nav-item"><i class="ti ti-user-circle"></i> Profil Saya</a>
    <a href="#" class="nav-item"><i class="ti ti-lock"></i> Ganti Password</a>
    <a href="#" class="nav-item" style="color:rgba(255,255,255,0.6)"><i class="ti ti-logout"></i> Logout</a>
  </div>
</aside>

<div class="right-wrap">
  <div class="topnav">
    <div class="search-wrap"><i class="ti ti-search"></i><input type="text" placeholder="Cari mahasiswa..."></div>
    <div class="topnav-right">
      <div class="tnav-btn"><i class="ti ti-moon"></i></div>
      <div class="tnav-btn"><i class="ti ti-bell"></i></div>
      <div class="tnav-btn"><i class="ti ti-settings"></i></div>
      <div class="avatar-top">BS</div>
    </div>
  </div>
  <main class="main">
    <div class="page-head">
      <div><div class="page-title">Input Nilai Mahasiswa</div><div class="page-sub">Masukkan nilai untuk matakuliah yang Anda ampu</div></div>
      <button class="btn-simpan-all" onclick="simpanSemua()"><i class="ti ti-device-floppy"></i> Simpan Semua Nilai</button>
    </div>

    <div class="filter-bar">
      <select class="filter-sel" id="selMatkul">
        <option value="1">Algoritma &amp; Pemrograman (MK-001)</option>
        <option value="2">Basis Data (MK-002)</option>
        <option value="3">Kecerdasan Buatan (MK-009)</option>
      </select>
      <select class="filter-sel">
        <option>Semester Ganjil 2024/2025</option>
      </select>
    </div>

    <div class="card">
      <div class="card-header">
        <span class="card-title">Daftar Nilai — Algoritma &amp; Pemrograman (MK-001)</span>
        <span class="deadline-badge"><i class="ti ti-clock" style="font-size:14px"></i> Deadline: 20 Mei 2026</span>
      </div>
      <table>
        <thead>
          <tr>
            <th>No</th><th>NIM</th><th>Nama Mahasiswa</th>
            <th>Tugas <small style="font-weight:400">(20%)</small></th>
            <th>UTS <small style="font-weight:400">(35%)</small></th>
            <th>UAS <small style="font-weight:400">(45%)</small></th>
            <th>Nilai Akhir</th><th>Grade</th><th>Simpan</th>
          </tr>
        </thead>
        <tbody id="nilaiBody">
          <tr>
            <td style="color:#bbb;font-size:12px">1</td>
            <td><span class="nim-link">22101001</span></td>
            <td><div class="mhs-cell"><div class="av av-a">A</div><span class="mhs-name">Andi Pratama</span></div></td>
            <td><input class="nilai-input" id="t1" type="number" min="0" max="100" value="80" oninput="hitung(1)"></td>
            <td><input class="nilai-input" id="u1" type="number" min="0" max="100" value="75" oninput="hitung(1)"></td>
            <td><input class="nilai-input" id="a1" type="number" min="0" max="100" value="82" oninput="hitung(1)"></td>
            <td><span class="na-val" id="na1">79.9</span></td>
            <td><span class="nilai-badge n-b" id="gr1">B</span></td>
            <td><button class="btn-row-save" onclick="simpanBaris(1)">Simpan</button></td>
          </tr>
          <tr>
            <td style="color:#bbb;font-size:12px">2</td>
            <td><span class="nim-link">22101002</span></td>
            <td><div class="mhs-cell"><div class="av av-b">S</div><span class="mhs-name">Sari Dewi Lestari</span></div></td>
            <td><input class="nilai-input" id="t2" type="number" min="0" max="100" value="90" oninput="hitung(2)"></td>
            <td><input class="nilai-input" id="u2" type="number" min="0" max="100" value="88" oninput="hitung(2)"></td>
            <td><input class="nilai-input" id="a2" type="number" min="0" max="100" value="92" oninput="hitung(2)"></td>
            <td><span class="na-val" id="na2">90.4</span></td>
            <td><span class="nilai-badge n-a" id="gr2">A</span></td>
            <td><button class="btn-row-save" onclick="simpanBaris(2)">Simpan</button></td>
          </tr>
          <tr>
            <td style="color:#bbb;font-size:12px">3</td>
            <td><span class="nim-link">23101001</span></td>
            <td><div class="mhs-cell"><div class="av av-c">B</div><span class="mhs-name">Budi Santoso</span></div></td>
            <td><input class="nilai-input" id="t3" type="number" min="0" max="100" value="70" oninput="hitung(3)"></td>
            <td><input class="nilai-input" id="u3" type="number" min="0" max="100" value="72" oninput="hitung(3)"></td>
            <td><input class="nilai-input" id="a3" type="number" min="0" max="100" value="68" oninput="hitung(3)"></td>
            <td><span class="na-val" id="na3">70.1</span></td>
            <td><span class="nilai-badge n-b" id="gr3">B</span></td>
            <td><button class="btn-row-save" onclick="simpanBaris(3)">Simpan</button></td>
          </tr>
          <tr>
            <td style="color:#bbb;font-size:12px">4</td>
            <td><span class="nim-link">23101002</span></td>
            <td><div class="mhs-cell"><div class="av av-d">R</div><span class="mhs-name">Rina Fitriani</span></div></td>
            <td><input class="nilai-input" id="t4" type="number" min="0" max="100" value="60" oninput="hitung(4)"></td>
            <td><input class="nilai-input" id="u4" type="number" min="0" max="100" value="55" oninput="hitung(4)"></td>
            <td><input class="nilai-input" id="a4" type="number" min="0" max="100" value="58" oninput="hitung(4)"></td>
            <td><span class="na-val" id="na4">57.8</span></td>
            <td><span class="nilai-badge n-c" id="gr4">C</span></td>
            <td><button class="btn-row-save" onclick="simpanBaris(4)">Simpan</button></td>
          </tr>
          <tr>
            <td style="color:#bbb;font-size:12px">5</td>
            <td><span class="nim-link">25101001</span></td>
            <td><div class="mhs-cell"><div class="av av-e">F</div><span class="mhs-name">Fajar Nugroho</span></div></td>
            <td><input class="nilai-input" id="t5" type="number" min="0" max="100" placeholder="0" oninput="hitung(5)"></td>
            <td><input class="nilai-input" id="u5" type="number" min="0" max="100" placeholder="0" oninput="hitung(5)"></td>
            <td><input class="nilai-input" id="a5" type="number" min="0" max="100" placeholder="0" oninput="hitung(5)"></td>
            <td><span class="na-val" id="na5" style="color:#bbb">—</span></td>
            <td><span class="nilai-badge n-bl" id="gr5">—</span></td>
            <td><button class="btn-row-save" onclick="simpanBaris(5)">Simpan</button></td>
          </tr>
          <tr>
            <td style="color:#bbb;font-size:12px">6</td>
            <td><span class="nim-link">22101003</span></td>
            <td><div class="mhs-cell"><div class="av av-f">H</div><span class="mhs-name">Hendra Setiawan</span></div></td>
            <td><input class="nilai-input" id="t6" type="number" min="0" max="100" placeholder="0" oninput="hitung(6)"></td>
            <td><input class="nilai-input" id="u6" type="number" min="0" max="100" placeholder="0" oninput="hitung(6)"></td>
            <td><input class="nilai-input" id="a6" type="number" min="0" max="100" placeholder="0" oninput="hitung(6)"></td>
            <td><span class="na-val" id="na6" style="color:#bbb">—</span></td>
            <td><span class="nilai-badge n-bl" id="gr6">—</span></td>
            <td><button class="btn-row-save" onclick="simpanBaris(6)">Simpan</button></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="keterangan">
      <span style="font-weight:700;color:#333">Keterangan Grade:</span>
      <span><span class="nilai-badge n-a" style="font-size:11px">A</span> ≥ 85</span>
      <span><span class="nilai-badge n-b" style="font-size:11px">B</span> 70 – 84</span>
      <span><span class="nilai-badge n-c" style="font-size:11px">C</span> 55 – 69</span>
      <span><span class="nilai-badge n-d" style="font-size:11px">D</span> 40 – 54</span>
      <span><span class="nilai-badge n-e" style="font-size:11px">E</span> &lt; 40</span>
      <span style="color:#bbb;margin-left:auto;font-size:11px">*Nilai Akhir = Tugas×20% + UTS×35% + UAS×45%</span>
    </div>
  </main>
</div>

<div id="alertSaved" style="display:none;position:fixed;bottom:24px;right:24px;background:#1a7a5e;color:#fff;padding:12px 20px;border-radius:10px;font-size:13px;font-weight:600;align-items:center;gap:8px;box-shadow:0 4px 16px rgba(0,0,0,.15)">
  <i class="ti ti-check" style="font-size:16px"></i> Nilai berhasil disimpan!
</div>

<script>
function getGrade(na){
  if(na>=85) return{g:'A',c:'n-a'};
  if(na>=70) return{g:'B',c:'n-b'};
  if(na>=55) return{g:'C',c:'n-c'};
  if(na>=40) return{g:'D',c:'n-d'};
  return{g:'E',c:'n-e'};
}
function hitung(i){
  const t=parseFloat(document.getElementById('t'+i).value)||0;
  const u=parseFloat(document.getElementById('u'+i).value)||0;
  const a=parseFloat(document.getElementById('a'+i).value)||0;
  const na=(t*0.2)+(u*0.35)+(a*0.45);
  const naEl=document.getElementById('na'+i);
  const grEl=document.getElementById('gr'+i);
  naEl.textContent=na.toFixed(1);
  naEl.style.color='#1a1a1a';
  const {g,c}=getGrade(na);
  grEl.textContent=g;
  grEl.className='nilai-badge '+c;
}
function simpanBaris(i){
  const el=document.getElementById('alertSaved');
  el.style.display='flex';
  setTimeout(()=>el.style.display='none',2500);
}
function simpanSemua(){
  const el=document.getElementById('alertSaved');
  el.innerHTML='<i class="ti ti-check" style="font-size:16px"></i> Semua nilai berhasil disimpan!';
  el.style.display='flex';
  setTimeout(()=>el.style.display='none',2500);
}
</script>
</body>
</html>