-- ════════════════════════════════════════════════════════════════
-- PSIBW LMS - Database Query Script
-- Version: 1.0.0
-- Created: May 11, 2026
-- ════════════════════════════════════════════════════════════════

-- ════════════════ USERS TABLE (Core) ════════════════
CREATE TABLE IF NOT EXISTS users (
  ni VARCHAR(20) PRIMARY KEY COMMENT 'Nomor Induk (NIM/NIDN/NIP)',
  username VARCHAR(100) NOT NULL UNIQUE COMMENT 'Unique username untuk login',
  email VARCHAR(150) NOT NULL UNIQUE COMMENT 'Email address',
  password VARCHAR(255) NOT NULL COMMENT 'Hashed password',
  role ENUM('admin','dosen','mahasiswa') NOT NULL DEFAULT 'mahasiswa' COMMENT 'User role',
  full_name VARCHAR(150) NULL COMMENT 'Full name',
  is_active TINYINT(1) DEFAULT 1 COMMENT '1=active, 0=inactive',
  last_login DATETIME NULL COMMENT 'Last login timestamp',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Account creation date',
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Last update',
  INDEX idx_role (role),
  INDEX idx_email (email),
  INDEX idx_username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Users/Accounts table';

-- ════════════════ DOSEN TABLE ════════════════
CREATE TABLE IF NOT EXISTS dosen (
  id_dosen INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key',
  ni VARCHAR(20) NOT NULL UNIQUE COMMENT 'NIDN (Nomor Induk Dosen Nasional)',
  full_name VARCHAR(150) NOT NULL COMMENT 'Full name',
  phone VARCHAR(15) NULL COMMENT 'Phone number',
  address TEXT NULL COMMENT 'Address',
  department VARCHAR(100) NULL COMMENT 'Department/Jurusan',
  status ENUM('aktif','non-aktif','cuti') DEFAULT 'aktif' COMMENT 'Employment status',
  photo_path VARCHAR(255) NULL COMMENT 'Profile photo path',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (ni) REFERENCES users(ni) ON DELETE RESTRICT,
  INDEX idx_department (department),
  INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Dosen/Lecturer profile data';

-- ════════════════ MAHASISWA TABLE ════════════════
CREATE TABLE IF NOT EXISTS mahasiswa (
  id_mahasiswa INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key',
  nim VARCHAR(20) NOT NULL UNIQUE COMMENT 'NIM (Nomor Induk Mahasiswa)',
  ni VARCHAR(20) NOT NULL UNIQUE COMMENT 'User NI from users table',
  full_name VARCHAR(150) NOT NULL COMMENT 'Full name',
  gender ENUM('L','P') NULL COMMENT 'Laki-laki/Perempuan',
  phone VARCHAR(15) NULL COMMENT 'Phone number',
  address TEXT NULL COMMENT 'Address',
  angkatan YEAR NOT NULL COMMENT 'Academic year/batch',
  semester INT DEFAULT 1 COMMENT 'Current semester',
  status ENUM('aktif','cuti','lulus','non-aktif') DEFAULT 'aktif' COMMENT 'Student status',
  ipk DECIMAL(3,2) DEFAULT 0.00 COMMENT 'Cumulative GPA',
  photo_path VARCHAR(255) NULL COMMENT 'Profile photo path',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (ni) REFERENCES users(ni) ON DELETE RESTRICT,
  INDEX idx_nim (nim),
  INDEX idx_angkatan (angkatan),
  INDEX idx_semester (semester),
  INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Mahasiswa/Student profile data';

-- ════════════════ MATKUL (MATA KULIAH) ════════════════
CREATE TABLE IF NOT EXISTS matkul (
  id_matkul INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key',
  kode_matkul VARCHAR(20) NOT NULL UNIQUE COMMENT 'Course code',
  nama_matkul VARCHAR(150) NOT NULL COMMENT 'Course name',
  sks INT NOT NULL COMMENT 'Semester credit hours',
  semester INT NOT NULL COMMENT 'Semester when offered',
  deskripsi TEXT NULL COMMENT 'Course description',
  is_active TINYINT(1) DEFAULT 1 COMMENT '1=active, 0=inactive',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_kode (kode_matkul),
  INDEX idx_semester (semester),
  INDEX idx_active (is_active)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Courses/Mata Kuliah';

-- ════════════════ JADWAL (SCHEDULE) ════════════════
CREATE TABLE IF NOT EXISTS jadwal (
  id_jadwal INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key',
  id_matkul INT NOT NULL COMMENT 'Course ID',
  hari VARCHAR(20) NOT NULL COMMENT 'Day (Senin, Selasa, etc)',
  jam_mulai TIME NOT NULL COMMENT 'Start time',
  jam_selesai TIME NOT NULL COMMENT 'End time',
  ruangan VARCHAR(50) NULL COMMENT 'Room/Class',
  semester INT NOT NULL COMMENT 'Semester',
  tahun_akademik VARCHAR(10) NOT NULL COMMENT 'Academic year (2025/2026)',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (id_matkul) REFERENCES matkul(id_matkul) ON DELETE CASCADE,
  INDEX idx_matkul (id_matkul),
  INDEX idx_hari (hari),
  INDEX idx_tahun (tahun_akademik)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Course schedule';

-- ════════════════ KELAS (CLASS) ════════════════
CREATE TABLE IF NOT EXISTS kelas (
  id_kelas INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key',
  id_matkul INT NOT NULL COMMENT 'Course ID',
  ni_dosen VARCHAR(20) NOT NULL COMMENT 'Teacher NIDN',
  kode_kelas VARCHAR(20) NOT NULL UNIQUE COMMENT 'Class code (e.g., A1, B1)',
  kuota INT DEFAULT 40 COMMENT 'Student quota',
  tahun_akademik VARCHAR(10) NOT NULL COMMENT 'Academic year',
  semester INT NOT NULL COMMENT 'Semester',
  status ENUM('aktif','selesai','batal') DEFAULT 'aktif' COMMENT 'Class status',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (id_matkul) REFERENCES matkul(id_matkul) ON DELETE CASCADE,
  FOREIGN KEY (ni_dosen) REFERENCES users(ni) ON DELETE RESTRICT,
  INDEX idx_matkul (id_matkul),
  INDEX idx_dosen (ni_dosen),
  INDEX idx_tahun_sem (tahun_akademik, semester)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Class/Kelas info';

-- ════════════════ KRS (COURSE REGISTRATION) ════════════════
CREATE TABLE IF NOT EXISTS krs (
  id_krs INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key',
  nim VARCHAR(20) NOT NULL COMMENT 'Student NIM',
  id_kelas INT NOT NULL COMMENT 'Class ID',
  tahun_akademik VARCHAR(10) NOT NULL COMMENT 'Academic year',
  semester INT NOT NULL COMMENT 'Semester',
  tgl_daftar DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Registration date',
  status ENUM('aktif','batal','selesai') DEFAULT 'aktif' COMMENT 'Enrollment status',
  nilai_akhir DECIMAL(3,2) NULL COMMENT 'Final grade',
  nilai_huruf VARCHAR(1) NULL COMMENT 'Letter grade (A-E)',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (nim) REFERENCES mahasiswa(nim) ON DELETE CASCADE,
  FOREIGN KEY (id_kelas) REFERENCES kelas(id_kelas) ON DELETE CASCADE,
  UNIQUE KEY unique_krs (nim, id_kelas, tahun_akademik, semester),
  INDEX idx_nim (nim),
  INDEX idx_kelas (id_kelas),
  INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Student course registration';

-- ════════════════ NILAI (GRADES) ════════════════
CREATE TABLE IF NOT EXISTS nilai (
  id_nilai INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key',
  id_krs INT NOT NULL COMMENT 'KRS ID',
  nim VARCHAR(20) NOT NULL COMMENT 'Student NIM',
  id_kelas INT NOT NULL COMMENT 'Class ID',
  tugas DECIMAL(3,2) DEFAULT NULL COMMENT 'Assignment score',
  quiz DECIMAL(3,2) DEFAULT NULL COMMENT 'Quiz score',
  uts DECIMAL(3,2) DEFAULT NULL COMMENT 'Midterm score',
  uas DECIMAL(3,2) DEFAULT NULL COMMENT 'Final exam score',
  nilai_akhir DECIMAL(3,2) DEFAULT NULL COMMENT 'Final grade (calculated)',
  nilai_huruf VARCHAR(1) DEFAULT NULL COMMENT 'Letter grade',
  tgl_input DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Input date',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (id_krs) REFERENCES krs(id_krs) ON DELETE CASCADE,
  FOREIGN KEY (nim) REFERENCES mahasiswa(nim) ON DELETE CASCADE,
  FOREIGN KEY (id_kelas) REFERENCES kelas(id_kelas) ON DELETE CASCADE,
  UNIQUE KEY unique_nilai (id_kelas, nim),
  INDEX idx_nim (nim),
  INDEX idx_kelas (id_kelas)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Student grades/scores';

-- ════════════════ ABSENSI (ATTENDANCE) ════════════════
CREATE TABLE IF NOT EXISTS absensi (
  id_absensi INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key',
  nim VARCHAR(20) NOT NULL COMMENT 'Student NIM',
  id_kelas INT NOT NULL COMMENT 'Class ID',
  tanggal DATE NOT NULL COMMENT 'Attendance date',
  status ENUM('hadir','sakit','izin','alpha') DEFAULT 'hadir' COMMENT 'Attendance status',
  keterangan TEXT NULL COMMENT 'Notes/reason',
  input_oleh VARCHAR(20) NULL COMMENT 'Input by (NIDN)',
  tgl_input DATETIME DEFAULT CURRENT_TIMESTAMP,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (nim) REFERENCES mahasiswa(nim) ON DELETE CASCADE,
  FOREIGN KEY (id_kelas) REFERENCES kelas(id_kelas) ON DELETE CASCADE,
  UNIQUE KEY unique_absensi (nim, id_kelas, tanggal),
  INDEX idx_nim (nim),
  INDEX idx_kelas (id_kelas),
  INDEX idx_tanggal (tanggal)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Student attendance records';

-- ════════════════ TAGIHAN (BILLS/PAYMENT) ════════════════
CREATE TABLE IF NOT EXISTS tagihan (
  id_tagihan INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key',
  nim VARCHAR(20) NOT NULL COMMENT 'Student NIM',
  semester INT NOT NULL COMMENT 'Semester',
  tahun_akademik VARCHAR(10) NOT NULL COMMENT 'Academic year',
  jumlah_tagihan DECIMAL(12,2) NOT NULL COMMENT 'Bill amount',
  jumlah_bayar DECIMAL(12,2) DEFAULT 0.00 COMMENT 'Amount paid',
  status ENUM('belum_bayar','lunas','sebagian') DEFAULT 'belum_bayar' COMMENT 'Payment status',
  tanggal_jatuh_tempo DATE NULL COMMENT 'Due date',
  tanggal_bayar DATE NULL COMMENT 'Payment date',
  metode_bayar VARCHAR(50) NULL COMMENT 'Payment method',
  keterangan TEXT NULL COMMENT 'Notes',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (nim) REFERENCES mahasiswa(nim) ON DELETE CASCADE,
  INDEX idx_nim (nim),
  INDEX idx_status (status),
  INDEX idx_tahun_sem (tahun_akademik, semester)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Student bills and payments';

-- ════════════════ PENGAMPU (TEACHING ASSIGNMENTS) ════════════════
CREATE TABLE IF NOT EXISTS pengampu (
  id_pengampu INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key',
  ni_dosen VARCHAR(20) NOT NULL COMMENT 'Teacher NIDN',
  id_kelas INT NOT NULL COMMENT 'Class ID',
  tahun_akademik VARCHAR(10) NOT NULL COMMENT 'Academic year',
  semester INT NOT NULL COMMENT 'Semester',
  status ENUM('aktif','selesai') DEFAULT 'aktif' COMMENT 'Assignment status',
  tgl_mulai DATE NULL COMMENT 'Start date',
  tgl_selesai DATE NULL COMMENT 'End date',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (ni_dosen) REFERENCES users(ni) ON DELETE RESTRICT,
  FOREIGN KEY (id_kelas) REFERENCES kelas(id_kelas) ON DELETE CASCADE,
  INDEX idx_dosen (ni_dosen),
  INDEX idx_kelas (id_kelas),
  INDEX idx_tahun_sem (tahun_akademik, semester)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Teacher assignments to classes';

-- ════════════════ AUDIT LOG (Optional) ════════════════
CREATE TABLE IF NOT EXISTS audit_log (
  id_log INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key',
  ni VARCHAR(20) NOT NULL COMMENT 'User NI',
  action VARCHAR(100) NOT NULL COMMENT 'Action performed',
  entity VARCHAR(50) NOT NULL COMMENT 'Entity (users, nilai, krs, etc)',
  entity_id INT NULL COMMENT 'Entity ID',
  old_value JSON NULL COMMENT 'Previous value',
  new_value JSON NULL COMMENT 'New value',
  ip_address VARCHAR(50) NULL COMMENT 'IP address',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_ni (ni),
  INDEX idx_action (action),
  INDEX idx_entity (entity),
  INDEX idx_created (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Audit trail for all actions';

-- ════════════════════════════════════════════════════════════════
-- END OF DATABASE SCHEMA
-- ════════════════════════════════════════════════════════════════