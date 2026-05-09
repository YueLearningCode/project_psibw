<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ganti Password — AkademikApp</title>
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
.page-title{font-size:20px;font-weight:700;color:#1a1a1a}
.page-sub{font-size:13px;color:#888;margin-top:3px;margin-bottom:24px}
.card{background:#fff;border-radius:12px;border:1px solid #ececec;overflow:hidden}
.card-header{display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid #f0f0f0}
.card-title{font-size:14px;font-weight:700;color:#1a1a1a}

/* Layout */
.pw-layout{display:grid;grid-template-columns:1fr 320px;gap:16px;align-items:start}

/* Form */
.form-wrap{padding:24px}
.field-group{margin-bottom:20px}
.field-label{font-size:13px;font-weight:600;color:#333;margin-bottom:7px;display:block}
.field-sub{font-size:11px;color:#999;margin-top:4px}
.input-wrap{display:flex;align-items:center;gap:8px;border:1.5px solid #e0e0e0;border-radius:9px;padding:0 14px;background:#fff;transition:border .15s}
.input-wrap:focus-within{border-color:#1a7a5e}
.input-wrap i{font-size:17px;color:#bbb;flex-shrink:0}
.input-wrap input{border:none;outline:none;font-size:14px;color:#333;padding:11px 0;flex:1;background:transparent}
.toggle-pw{cursor:pointer;color:#bbb;font-size:17px;flex-shrink:0}
.toggle-pw:hover{color:#555}

/* Strength */
.strength-wrap{margin-top:10px}
.strength-bars{display:flex;gap:4px;margin-bottom:5px}
.strength-bar{height:4px;flex:1;border-radius:4px;background:#e8e8e8;transition:background .3s}
.bar-weak{background:#e24b4a}
.bar-medium{background:#f0a500}
.bar-strong{background:#1a7a5e}
.strength-text{font-size:11px;color:#888}

/* Tips list */
.tips-list{display:flex;flex-direction:column;gap:8px;padding:16px 18px}
.tip-item{display:flex;align-items:center;gap:8px;font-size:12px;color:#555}
.tip-item i{font-size:14px;flex-shrink:0}
.tip-ok{color:#1a7a5e}
.tip-no{color:#bbb}

/* Btn */
.btn-submit{width:100%;padding:12px;background:#1a7a5e;color:#fff;border:none;border-radius:9px;font-size:14px;font-weight:600;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;margin-top:6px}
.btn-submit:hover{background:#155f4a}
.btn-cancel{width:100%;padding:11px;background:#fff;color:#555;border:1.5px solid #ddd;border-radius:9px;font-size:14px;font-weight:500;cursor:pointer;margin-top:8px}
.btn-cancel:hover{border-color:#aaa}

/* Info card -->*/
.info-card{background:#fff;border-radius:12px;border:1px solid #ececec;overflow:hidden}
.info-inner{padding:20px}
.ic-icon{width:48px;height:48px;border-radius:12px;background:#e8f5f0;display:flex;align-items:center;justify-content:center;margin-bottom:14px}
.ic-icon i{font-size:24px;color:#1a7a5e}
.ic-title{font-size:14px;font-weight:700;color:#1a1a1a;margin-bottom:6px}
.ic-desc{font-size:12px;color:#888;line-height:1.7}
.divider{border:none;border-top:1px solid #f0f0f0;margin:16px 0}
.activity-item{display:flex;align-items:flex-start;gap:10px;padding:8px 0}
.act-dot{width:8px;height:8px;border-radius:50%;background:#1a7a5e;flex-shrink:0;margin-top:4px}
.act-text{font-size:12px;color:#555}
.act-time{font-size:11px;color:#bbb;margin-top:2px}

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
    <a href="profil.html" class="nav-item"><i class="ti ti-user-circle"></i> Profil Saya</a>
    <a href="ganti-password.html" class="nav-item active"><i class="ti ti-lock"></i> Ganti Password</a>
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
    <div class="page-title">Ganti Password</div>
    <div class="page-sub">Perbarui kata sandi akun Anda secara berkala untuk menjaga keamanan</div>

    <div class="pw-layout">

      <!-- Form -->
      <div class="card">
        <div class="card-header"><span class="card-title">Ubah Kata Sandi</span></div>
        <div class="form-wrap">

          <div class="field-group">
            <label class="field-label">Password Saat Ini</label>
            <div class="input-wrap">
              <i class="ti ti-lock"></i>
              <input type="password" id="cur-pw" placeholder="Masukkan password saat ini">
              <span class="toggle-pw" onclick="togglePw('cur-pw',this)"><i class="ti ti-eye"></i></span>
            </div>
          </div>

          <div class="field-group">
            <label class="field-label">Password Baru</label>
            <div class="input-wrap">
              <i class="ti ti-lock-plus"></i>
              <input type="password" id="new-pw" placeholder="Minimal 8 karakter" oninput="checkStrength(this.value)">
              <span class="toggle-pw" onclick="togglePw('new-pw',this)"><i class="ti ti-eye"></i></span>
            </div>
            <div class="strength-wrap">
              <div class="strength-bars">
                <div class="strength-bar" id="bar1"></div>
                <div class="strength-bar" id="bar2"></div>
                <div class="strength-bar" id="bar3"></div>
                <div class="strength-bar" id="bar4"></div>
              </div>
              <div class="strength-text" id="strength-text">Masukkan password baru</div>
            </div>
          </div>

          <div class="field-group" style="margin-bottom:24px">
            <label class="field-label">Konfirmasi Password Baru</label>
            <div class="input-wrap">
              <i class="ti ti-lock-check"></i>
              <input type="password" id="conf-pw" placeholder="Ulangi password baru" oninput="checkMatch()">
              <span class="toggle-pw" onclick="togglePw('conf-pw',this)"><i class="ti ti-eye"></i></span>
            </div>
            <div class="field-sub" id="match-msg"></div>
          </div>

          <button class="btn-submit"><i class="ti ti-shield-check"></i> Simpan Password Baru</button>
          <button class="btn-cancel">Batal</button>
        </div>
      </div>

      <!-- Kanan -->
      <div style="display:flex;flex-direction:column;gap:16px">

        <!-- Tips -->
        <div class="info-card">
          <div class="card-header"><span class="card-title">Tips Keamanan</span></div>
          <div class="tips-list">
            <div class="tip-item"><i class="ti ti-circle-check tip-ok"></i> Minimal 8 karakter</div>
            <div class="tip-item"><i class="ti ti-circle-check tip-ok"></i> Gunakan huruf besar dan kecil</div>
            <div class="tip-item"><i class="ti ti-circle-check tip-ok"></i> Sertakan angka (0–9)</div>
            <div class="tip-item"><i class="ti ti-circle-check tip-ok"></i> Tambahkan karakter spesial (!@#$)</div>
            <div class="tip-item"><i class="ti ti-circle-x tip-no"></i> Jangan gunakan nama atau NIM</div>
            <div class="tip-item"><i class="ti ti-circle-x tip-no"></i> Hindari urutan berulang (111, abc)</div>
          </div>
        </div>

        <!-- Aktivitas -->
        <div class="info-card">
          <div class="card-header"><span class="card-title">Aktivitas Login Terakhir</span></div>
          <div style="padding:12px 18px">
            <div class="activity-item">
              <div class="act-dot" style="background:#1a7a5e"></div>
              <div><div class="act-text">Login dari Chrome · Windows 11</div><div class="act-time">Hari ini, 08.42 WIB · Pekanbaru</div></div>
            </div>
            <div class="activity-item">
              <div class="act-dot" style="background:#1a7a5e"></div>
              <div><div class="act-text">Login dari Safari · iPhone</div><div class="act-time">Kemarin, 21.15 WIB · Pekanbaru</div></div>
            </div>
            <div class="activity-item">
              <div class="act-dot" style="background:#bbb"></div>
              <div><div class="act-text">Login dari Chrome · Android</div><div class="act-time">3 hari lalu, 10.00 WIB · Pekanbaru</div></div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
</div>

<script>
function togglePw(id, el) {
  const inp = document.getElementById(id);
  const isText = inp.type === 'text';
  inp.type = isText ? 'password' : 'text';
  el.innerHTML = isText ? '<i class="ti ti-eye"></i>' : '<i class="ti ti-eye-off"></i>';
}

function checkStrength(val) {
  const bars = ['bar1','bar2','bar3','bar4'];
  const txt = document.getElementById('strength-text');
  let score = 0;
  if (val.length >= 8) score++;
  if (/[A-Z]/.test(val) && /[a-z]/.test(val)) score++;
  if (/\d/.test(val)) score++;
  if (/[^A-Za-z0-9]/.test(val)) score++;

  bars.forEach((b, i) => {
    const el = document.getElementById(b);
    el.className = 'strength-bar';
    if (i < score) {
      if (score === 1) el.classList.add('bar-weak');
      else if (score <= 2) el.classList.add('bar-medium');
      else el.classList.add('bar-strong');
    }
  });

  const labels = ['','Lemah','Sedang','Kuat','Sangat Kuat'];
  txt.textContent = val.length === 0 ? 'Masukkan password baru' : labels[score] || 'Lemah';
  txt.style.color = score <= 1 ? '#e24b4a' : score === 2 ? '#f0a500' : '#1a7a5e';
}

function checkMatch() {
  const np = document.getElementById('new-pw').value;
  const cp = document.getElementById('conf-pw').value;
  const msg = document.getElementById('match-msg');
  if (cp.length === 0) { msg.textContent = ''; return; }
  if (np === cp) { msg.textContent = '✓ Password cocok'; msg.style.color = '#1a7a5e'; }
  else { msg.textContent = '✗ Password tidak cocok'; msg.style.color = '#e24b4a'; }
}
</script>
</body>
</html>