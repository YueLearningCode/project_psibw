-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 11, 2026
-- Server version: 8.0.43
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- ================================================================
-- Database: `psibw_project`
-- PSIBW Learning Management System
-- ================================================================

-- ================================================================
-- TABLE: users
-- ================================================================
CREATE TABLE `users` (
  `ni` varchar(20) NOT NULL COMMENT 'Nomor Induk (NIM/NIDN/NIP)',
  `username` varchar(100) NOT NULL COMMENT 'Username untuk login',
  `email` varchar(150) NOT NULL COMMENT 'Email address',
  `password` varchar(255) NOT NULL COMMENT 'Hashed password',
  `role` enum('admin','dosen','mahasiswa') NOT NULL DEFAULT 'mahasiswa' COMMENT 'User role',
  `full_name` varchar(150) DEFAULT NULL COMMENT 'Full name',
  `is_active` tinyint(1) DEFAULT 1 COMMENT '1=active, 0=inactive',
  `last_login` datetime DEFAULT NULL COMMENT 'Last login timestamp',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ni`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `idx_role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data
INSERT INTO `users` VALUES
('2403127126', 'Yue', 'Yue@gmail.com', '$2y$10$PVHGpCJR7yTAT/vW/cKMmOAje0n5glZztdZmuLMt1phubsLC5SN6i', 'admin', 'Yue', 1, NULL, '2026-05-06 22:10:03', '2026-05-06 22:10:03'),
('1807065123', 'dosen01', 'dosen01@psibw.ac.id', '$2y$10$PVHGpCJR7yTAT/vW/cKMmOAje0n5glZztdZmuLMt1phubsLC5SN6i', 'dosen', 'Dr. Ahmad Wijaya', 1, NULL, '2026-05-11 08:00:00', '2026-05-11 08:00:00'),
('2003001234', 'mahasiswa01', 'mahasiswa01@psibw.ac.id', '$2y$10$PVHGpCJR7yTAT/vW/cKMmOAje0n5glZztdZmuLMt1phubsLC5SN6i', 'mahasiswa', 'Budi Santoso', 1, NULL, '2026-05-11 08:00:00', '2026-05-11 08:00:00');

-- ================================================================
-- TABLE: dosen
-- ================================================================
CREATE TABLE `dosen` (
  `id_dosen` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `ni` varchar(20) NOT NULL COMMENT 'NIDN',
  `full_name` varchar(150) NOT NULL COMMENT 'Full name',
  `phone` varchar(15) DEFAULT NULL COMMENT 'Phone number',
  `address` text COMMENT 'Address',
  `department` varchar(100) DEFAULT NULL COMMENT 'Department/Jurusan',
  `status` enum('aktif','non-aktif','cuti') DEFAULT 'aktif' COMMENT 'Employment status',
  `photo_path` varchar(255) DEFAULT NULL COMMENT 'Profile photo path',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_dosen`),
  UNIQUE KEY `ni` (`ni`),
  FOREIGN KEY (`ni`) REFERENCES `users` (`ni`) ON DELETE RESTRICT,
  KEY `idx_department` (`department`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `dosen` VALUES
(1, '1807065123', 'Dr. Ahmad Wijaya', '081234567890', 'Jl. Pendidikan No. 10, Bandung', 'Teknik Informatika', 'aktif', NULL, '2026-05-11 08:00:00', '2026-05-11 08:00:00');

-- ================================================================
-- TABLE: mahasiswa
-- ================================================================
CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `nim` varchar(20) NOT NULL COMMENT 'NIM',
  `ni` varchar(20) NOT NULL COMMENT 'User NI',
  `full_name` varchar(150) NOT NULL COMMENT 'Full name',
  `gender` enum('L','P') DEFAULT NULL COMMENT 'Gender',
  `phone` varchar(15) DEFAULT NULL COMMENT 'Phone number',
  `address` text COMMENT 'Address',
  `angkatan` year NOT NULL COMMENT 'Academic year/batch',
  `semester` int DEFAULT 1 COMMENT 'Current semester',
  `status` enum('aktif','cuti','lulus','non-aktif') DEFAULT 'aktif' COMMENT 'Student status',
  `ipk` decimal(3,2) DEFAULT 0.00 COMMENT 'Cumulative GPA',
  `photo_path` varchar(255) DEFAULT NULL COMMENT 'Profile photo path',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mahasiswa`),
  UNIQUE KEY `nim` (`nim`),
  UNIQUE KEY `ni` (`ni`),
  FOREIGN KEY (`ni`) REFERENCES `users` (`ni`) ON DELETE RESTRICT,
  KEY `idx_nim` (`nim`),
  KEY `idx_angkatan` (`angkatan`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `mahasiswa` VALUES
(1, '2003001234', '2003001234', 'Budi Santoso', 'L', '082345678901', 'Jl. Merdeka No. 5, Bandung', 2020, 5, 'aktif', 3.50, NULL, '2026-05-11 08:00:00', '2026-05-11 08:00:00');

-- ================================================================
-- TABLE: matkul
-- ================================================================
CREATE TABLE `matkul` (
  `id_matkul` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `kode_matkul` varchar(20) NOT NULL COMMENT 'Course code',
  `nama_matkul` varchar(150) NOT NULL COMMENT 'Course name',
  `sks` int NOT NULL COMMENT 'Semester credit hours',
  `semester` int NOT NULL COMMENT 'Semester',
  `deskripsi` text COMMENT 'Course description',
  `is_active` tinyint(1) DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_matkul`),
  UNIQUE KEY `kode_matkul` (`kode_matkul`),
  KEY `idx_semester` (`semester`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `matkul` VALUES
(1, 'INF401', 'Algoritma Lanjut', 3, 5, 'Mempelajari algoritma kompleks', 1, '2026-05-11 08:00:00', '2026-05-11 08:00:00'),
(2, 'INF402', 'Basis Data Lanjut', 3, 5, 'Mempelajari sistem manajemen basis data', 1, '2026-05-11 08:00:00', '2026-05-11 08:00:00');

-- ================================================================
-- TABLE: jadwal
-- ================================================================
CREATE TABLE `jadwal` (
  `id_jadwal` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `id_matkul` int NOT NULL COMMENT 'Course ID',
  `hari` varchar(20) NOT NULL COMMENT 'Day',
  `jam_mulai` time NOT NULL COMMENT 'Start time',
  `jam_selesai` time NOT NULL COMMENT 'End time',
  `ruangan` varchar(50) DEFAULT NULL COMMENT 'Room',
  `semester` int NOT NULL COMMENT 'Semester',
  `tahun_akademik` varchar(10) NOT NULL COMMENT 'Academic year',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jadwal`),
  FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`) ON DELETE CASCADE,
  KEY `idx_matkul` (`id_matkul`),
  KEY `idx_tahun` (`tahun_akademik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================================
-- TABLE: kelas
-- ================================================================
CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `id_matkul` int NOT NULL COMMENT 'Course ID',
  `ni_dosen` varchar(20) NOT NULL COMMENT 'Teacher NIDN',
  `kode_kelas` varchar(20) NOT NULL COMMENT 'Class code',
  `kuota` int DEFAULT 40 COMMENT 'Student quota',
  `tahun_akademik` varchar(10) NOT NULL COMMENT 'Academic year',
  `semester` int NOT NULL COMMENT 'Semester',
  `status` enum('aktif','selesai','batal') DEFAULT 'aktif' COMMENT 'Class status',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kelas`),
  UNIQUE KEY `kode_kelas` (`kode_kelas`),
  FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`) ON DELETE CASCADE,
  FOREIGN KEY (`ni_dosen`) REFERENCES `users` (`ni`) ON DELETE RESTRICT,
  KEY `idx_matkul` (`id_matkul`),
  KEY `idx_dosen` (`ni_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================================
-- TABLE: krs
-- ================================================================
CREATE TABLE `krs` (
  `id_krs` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `nim` varchar(20) NOT NULL COMMENT 'Student NIM',
  `id_kelas` int NOT NULL COMMENT 'Class ID',
  `tahun_akademik` varchar(10) NOT NULL COMMENT 'Academic year',
  `semester` int NOT NULL COMMENT 'Semester',
  `tgl_daftar` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Registration date',
  `status` enum('aktif','batal','selesai') DEFAULT 'aktif' COMMENT 'Enrollment status',
  `nilai_akhir` decimal(3,2) DEFAULT NULL COMMENT 'Final grade',
  `nilai_huruf` varchar(1) DEFAULT NULL COMMENT 'Letter grade',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_krs`),
  FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE,
  FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE,
  UNIQUE KEY `unique_krs` (`nim`, `id_kelas`, `tahun_akademik`, `semester`),
  KEY `idx_nim` (`nim`),
  KEY `idx_kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================================
-- TABLE: nilai
-- ================================================================
CREATE TABLE `nilai` (
  `id_nilai` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `id_krs` int NOT NULL COMMENT 'KRS ID',
  `nim` varchar(20) NOT NULL COMMENT 'Student NIM',
  `id_kelas` int NOT NULL COMMENT 'Class ID',
  `tugas` decimal(3,2) DEFAULT NULL COMMENT 'Assignment score',
  `quiz` decimal(3,2) DEFAULT NULL COMMENT 'Quiz score',
  `uts` decimal(3,2) DEFAULT NULL COMMENT 'Midterm score',
  `uas` decimal(3,2) DEFAULT NULL COMMENT 'Final exam score',
  `nilai_akhir` decimal(3,2) DEFAULT NULL COMMENT 'Final grade',
  `nilai_huruf` varchar(1) DEFAULT NULL COMMENT 'Letter grade',
  `tgl_input` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Input date',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_nilai`),
  FOREIGN KEY (`id_krs`) REFERENCES `krs` (`id_krs`) ON DELETE CASCADE,
  FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE,
  FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE,
  UNIQUE KEY `unique_nilai` (`id_kelas`, `nim`),
  KEY `idx_nim` (`nim`),
  KEY `idx_kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================================
-- TABLE: absensi
-- ================================================================
CREATE TABLE `absensi` (
  `id_absensi` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `nim` varchar(20) NOT NULL COMMENT 'Student NIM',
  `id_kelas` int NOT NULL COMMENT 'Class ID',
  `tanggal` date NOT NULL COMMENT 'Attendance date',
  `status` enum('hadir','sakit','izin','alpha') DEFAULT 'hadir' COMMENT 'Attendance status',
  `keterangan` text COMMENT 'Notes/reason',
  `input_oleh` varchar(20) DEFAULT NULL COMMENT 'Input by (NIDN)',
  `tgl_input` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_absensi`),
  FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE,
  FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE,
  UNIQUE KEY `unique_absensi` (`nim`, `id_kelas`, `tanggal`),
  KEY `idx_nim` (`nim`),
  KEY `idx_kelas` (`id_kelas`),
  KEY `idx_tanggal` (`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================================
-- TABLE: tagihan
-- ================================================================
CREATE TABLE `tagihan` (
  `id_tagihan` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `nim` varchar(20) NOT NULL COMMENT 'Student NIM',
  `semester` int NOT NULL COMMENT 'Semester',
  `tahun_akademik` varchar(10) NOT NULL COMMENT 'Academic year',
  `jumlah_tagihan` decimal(12,2) NOT NULL COMMENT 'Bill amount',
  `jumlah_bayar` decimal(12,2) DEFAULT 0.00 COMMENT 'Amount paid',
  `status` enum('belum_bayar','lunas','sebagian') DEFAULT 'belum_bayar' COMMENT 'Payment status',
  `tanggal_jatuh_tempo` date DEFAULT NULL COMMENT 'Due date',
  `tanggal_bayar` date DEFAULT NULL COMMENT 'Payment date',
  `metode_bayar` varchar(50) DEFAULT NULL COMMENT 'Payment method',
  `keterangan` text COMMENT 'Notes',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tagihan`),
  FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE,
  KEY `idx_nim` (`nim`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================================
-- TABLE: pengampu
-- ================================================================
CREATE TABLE `pengampu` (
  `id_pengampu` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `ni_dosen` varchar(20) NOT NULL COMMENT 'Teacher NIDN',
  `id_kelas` int NOT NULL COMMENT 'Class ID',
  `tahun_akademik` varchar(10) NOT NULL COMMENT 'Academic year',
  `semester` int NOT NULL COMMENT 'Semester',
  `status` enum('aktif','selesai') DEFAULT 'aktif' COMMENT 'Assignment status',
  `tgl_mulai` date DEFAULT NULL COMMENT 'Start date',
  `tgl_selesai` date DEFAULT NULL COMMENT 'End date',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pengampu`),
  FOREIGN KEY (`ni_dosen`) REFERENCES `users` (`ni`) ON DELETE RESTRICT,
  FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE,
  KEY `idx_dosen` (`ni_dosen`),
  KEY `idx_kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================================
-- TABLE: audit_log
-- ================================================================
CREATE TABLE `audit_log` (
  `id_log` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `ni` varchar(20) NOT NULL COMMENT 'User NI',
  `action` varchar(100) NOT NULL COMMENT 'Action performed',
  `entity` varchar(50) NOT NULL COMMENT 'Entity',
  `entity_id` int DEFAULT NULL COMMENT 'Entity ID',
  `old_value` json DEFAULT NULL COMMENT 'Previous value',
  `new_value` json DEFAULT NULL COMMENT 'New value',
  `ip_address` varchar(50) DEFAULT NULL COMMENT 'IP address',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log`),
  KEY `idx_ni` (`ni`),
  KEY `idx_action` (`action`),
  KEY `idx_created` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================================
-- Database Commit
-- ================================================================
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
