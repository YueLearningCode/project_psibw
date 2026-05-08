
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Profil Saya - AkademikApp</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

<style>

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
}

body{
  font-family:'Segoe UI',sans-serif;
  background:#f4f6f8;
  display:flex;
  min-height:100vh;
  overflow:hidden;
}

/* ================= SIDEBAR ================= */

.sidebar{
  width:160px;
  min-width:160px;
  background:#1a7a5e;
  display:flex;
  flex-direction:column;
  height:100vh;
  padding-bottom:12px;
}

.logo{
  padding:16px 16px 14px;
  display:flex;
  align-items:center;
  gap:8px;
  border-bottom:1px solid rgba(255,255,255,0.15);
}

.logo-icon{
  width:28px;
  height:28px;
  border-radius:8px;
  background:rgba(255,255,255,0.2);
  display:flex;
  align-items:center;
  justify-content:center;
}

.logo-icon i{
  color:#fff;
  font-size:15px;
}

.logo-text{
  font-size:13px;
  font-weight:700;
  color:#fff;
}

.role-badge{
  margin:10px 12px 0;
  background:rgba(255,255,255,0.15);
  border-radius:8px;
  padding:8px 10px;
  display:flex;
  align-items:center;
  gap:8px;
}

.role-badge i{
  font-size:16px;
  color:rgba(255,255,255,0.8);
}

.role-name{
  font-size:12px;
  font-weight:600;
  color:#fff;
}

.role-sub{
  font-size:10px;
  color:rgba(255,255,255,0.6);
}

.sec-label{
  padding:14px 14px 4px;
  font-size:10px;
  font-weight:700;
  color:rgba(255,255,255,0.5);
  letter-spacing:.08em;
  text-transform:uppercase;
}

.nav-item{
  display:flex;
  align-items:center;
  gap:8px;
  padding:9px 14px;
  margin:1px 8px;
  border-radius:8px;
  cursor:pointer;
  color:rgba(255,255,255,0.75);
  font-size:12.5px;
  transition:background .15s;
  text-decoration:none;
}

.nav-item:hover{
  background:rgba(255,255,255,0.12);
  color:#fff;
}

.nav-item.active{
  background:rgba(255,255,255,0.2);
  color:#fff;
  font-weight:600;
}

.nav-item i{
  font-size:16px;
  opacity:.85;
}

.nav-bottom{
  margin-top:auto;
  border-top:1px solid rgba(255,255,255,0.15);
  padding:10px 8px 0;
}

/* ================= CONTENT ================= */

.right-wrap{
  flex:1;
  display:flex;
  flex-direction:column;
  overflow:hidden;
}

/* TOPBAR */

.topnav{
  background:#fff;
  border-bottom:1px solid #e8e8e8;
  padding:10px 24px;
  display:flex;
  align-items:center;
  justify-content:space-between;
}

.search-wrap{
  display:flex;
  align-items:center;
  gap:8px;
  background:#f4f6f8;
  border:1px solid #e0e0e0;
  border-radius:8px;
  padding:7px 14px;
  width:280px;
}

.search-wrap input{
  border:none;
  background:transparent;
  font-size:13px;
  color:#333;
  outline:none;
  width:100%;
}

.search-wrap i{
  font-size:15px;
  color:#bbb;
}

.topnav-right{
  display:flex;
  align-items:center;
  gap:10px;
}

.tnav-btn{
  width:32px;
  height:32px;
  border-radius:8px;
  background:#f4f6f8;
  border:1px solid #e8e8e8;
  display:flex;
  align-items:center;
  justify-content:center;
  cursor:pointer;
  position:relative;
}

.tnav-btn i{
  font-size:16px;
  color:#666;
}

.notif-dot{
  position:absolute;
  top:5px;
  right:5px;
  width:7px;
  height:7px;
  background:#e24b4a;
  border-radius:50%;
  border:1.5px solid #fff;
}

.avatar-top{
  width:32px;
  height:32px;
  border-radius:50%;
  background:#1a7a5e;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:13px;
  font-weight:700;
  color:#fff;
  cursor:pointer;
}

/* MAIN */

.main{
  flex:1;
  overflow-y:auto;
  background:#f4f6f8;
  padding:24px 28px;
}

.page-head{
  display:flex;
  align-items:flex-start;
  justify-content:space-between;
  margin-bottom:22px;
}

.page-title{
  font-size:28px;
  font-weight:700;
  color:#1a1a1a;
}

.page-sub{
  font-size:14px;
  color:#888;
  margin-top:4px;
}

.edit-btn{
  background:#1a7a5e;
  color:#fff;
  border:none;
  padding:10px 18px;
  border-radius:10px;
  font-size:13px;
  font-weight:600;
  cursor:pointer;
  display:flex;
  align-items:center;
  gap:6px;
}

/* PROFILE */

.profile-layout{
  display:grid;
  grid-template-columns:240px 1fr;
  gap:18px;
}

.card{
  background:#fff;
  border-radius:14px;
  border:1px solid #ececec;
  overflow:hidden;
}

/* LEFT PROFILE */

.profile-card{
  padding:24px 18px;
  text-align:center;
}

.profile-avatar{
  width:80px;
  height:80px;
  border-radius:50%;
  background:#1a7a5e;
  margin:auto;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:34px;
  font-weight:700;
  color:#fff;
  margin-bottom:16px;
}

.profile-name{
  font-size:15px;
  font-weight:700;
  color:#1a1a1a;
}

.profile-nip{
  font-size:12px;
  color:#888;
  margin-top:8px;
}

.profile-tag{
  display:inline-block;
  margin-top:14px;
  background:#e8f5f0;
  color:#1a7a5e;
  padding:5px 14px;
  border-radius:20px;
  font-size:12px;
  font-weight:600;
}

.profile-nidk{
  margin-top:18px;
  font-size:12px;
  color:#999;
}

/* RIGHT */

.info-header{
  padding:16px 18px;
  border-bottom:1px solid #ececec;
  font-size:15px;
  font-weight:700;
  color:#1a1a1a;
}

.info-content{
  padding:22px 18px;
}

.info-grid{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:24px 40px;
}

.info-box{
  display:flex;
  flex-direction:column;
  gap:5px;
}

.info-label{
  font-size:12px;
  color:#aaa;
  text-transform:uppercase;
}

.info-value{
  font-size:15px;
  color:#1a1a1a;
}

.tag-list{
  display:flex;
  flex-wrap:wrap;
  gap:10px;
}

.tag{
  background:#e8f5f0;
  color:#1a7a5e;
  padding:6px 12px;
  border-radius:20px;
  font-size:12px;
  font-weight:600;
}

::-webkit-scrollbar{
  width:5px;
}

::-webkit-scrollbar-thumb{
  background:#d0d0d0;
  border-radius:10px;
}

</style>
</head>

<body>

<!-- SIDEBAR -->

<aside class="sidebar">

  <div class="logo">
    <div class="logo-icon">
      <i class="ti ti-school"></i>
    </div>

    <span class="logo-text">
      AkademikApp
    </span>
  </div>

  <div class="role-badge">
    <i class="ti ti-user-check"></i>

    <div>
      <div class="role-name">Dosen</div>
      <div class="role-sub">Dr. Budi Santoso</div>
    </div>
  </div>

  <div class="sec-label">MENU</div>

  <a href="dashboard_dosen.php" class="nav-item">
    <i class="ti ti-layout-dashboard"></i>
    Dashboard
  </a>

  <a href="jadwal_dosen.php" class="nav-item">
    <i class="ti ti-calendar"></i>
    Jadwal Saya
  </a>

  <a href="mahasiswa.php" class="nav-item">
    <i class="ti ti-users"></i>
    Mahasiswa
  </a>

  <a href="input_nilai_dosen.php" class="nav-item">
    <i class="ti ti-clipboard-check"></i>
    Input Nilai
  </a>

  <div class="sec-label">AKUN</div>

  <div class="nav-bottom">

    <a href="#" class="nav-item active">
      <i class="ti ti-user-circle"></i>
      Profil Saya
    </a>

    <a href="#" class="nav-item">
      <i class="ti ti-lock"></i>
      Ganti Password
    </a>

    <a href="#" class="nav-item">
      <i class="ti ti-logout"></i>
      Logout
    </a>

  </div>

</aside>

<!-- CONTENT -->

<div class="right-wrap">

  <!-- TOPBAR -->

  <div class="topnav">

    <div class="search-wrap">
      <i class="ti ti-search"></i>
      <input type="text" placeholder="Cari mahasiswa, matakuliah...">
    </div>

    <div class="topnav-right">

      <div class="tnav-btn">
        <i class="ti ti-moon"></i>
      </div>

      <div class="tnav-btn">
        <i class="ti ti-bell"></i>
        <span class="notif-dot"></span>
      </div>

      <div class="tnav-btn">
        <i class="ti ti-settings"></i>
      </div>

      <div class="avatar-top">
        BS
      </div>

    </div>

  </div>

  <!-- MAIN -->

  <main class="main">

    <div class="page-head">

      <div>
        <div class="page-title">
          Profil Saya
        </div>

        <div class="page-sub">
          Informasi data dosen
        </div>
      </div>

      <button class="edit-btn">
        <i class="ti ti-pencil"></i>
        Edit Profil
      </button>

    </div>

    <div class="profile-layout">

      <!-- LEFT -->

      <div class="card profile-card">

        <div class="profile-avatar">
          BS
        </div>

        <div class="profile-name">
          Dr. Budi Santoso, M.Kom
        </div>

        <div class="profile-nip">
          NIP 198501012010011001
        </div>

        <div class="profile-tag">
          Teknik Informatika
        </div>

        <div class="profile-nidk">
          NIDK 8810830016
        </div>

      </div>

      <!-- RIGHT -->

      <div class="card">

        <div class="info-header">
          Data Lengkap
        </div>

        <div class="info-content">

          <div class="info-grid">

            <div class="info-box">
              <div class="info-label">Nama Lengkap</div>
              <div class="info-value">Dr. Budi Santoso, M.Kom</div>
            </div>

            <div class="info-box">
              <div class="info-label">NIP</div>
              <div class="info-value">198501012010011001</div>
            </div>

            <div class="info-box">
              <div class="info-label">Email</div>
              <div class="info-value">budi.santoso@kampus.ac.id</div>
            </div>

            <div class="info-box">
              <div class="info-label">No. HP</div>
              <div class="info-value">081234567800</div>
            </div>

            <div class="info-box">
              <div class="info-label">Program Studi</div>
              <div class="info-value">Teknik Informatika</div>
            </div>

            <div class="info-box">
              <div class="info-label">Jabatan Fungsional</div>
              <div class="info-value">Lektor Kepala</div>
            </div>

            <div class="info-box">
              <div class="info-label">Pendidikan Terakhir</div>
              <div class="info-value">S3 — Ilmu Komputer</div>
            </div>

            <div class="info-box">
              <div class="info-label">Ruangan</div>
              <div class="info-value">Gedung A Lt. 3 R.305</div>
            </div>

            <div class="info-box" style="grid-column:1/3;">
              <div class="info-label">Matakuliah Diampu</div>

              <div class="tag-list">

                <div class="tag">
                  Algoritma & Pemrograman
                </div>

                <div class="tag">
                  Basis Data
                </div>

                <div class="tag">
                  Kecerdasan Buatan
                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </main>

</div>

</body>
</html>
```
