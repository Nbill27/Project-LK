-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 04:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `email`, `created_at`) VALUES
(1, 'admin1', '0192023a7bbd73250516f069df18b500', 'Admin Satu', 'admin1@lk.ac.id', '2025-05-14 13:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `aslab`
--

CREATE TABLE `aslab` (
  `id_aslab` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL COMMENT 'Dosen yang bertanggung jawab atas lab',
  `nama` varchar(100) NOT NULL,
  `lab` varchar(100) NOT NULL COMMENT 'Nama lab, misalnya: Lab Komputer',
  `email` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `status` enum('Aktif','Non-Aktif') DEFAULT 'Aktif',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama_dosen`, `email`, `password`, `created_at`) VALUES
(1, '123456789', 'Nabil', 'nabil@lk.ac.id', 'eb96f4b33c211219dc8a7e2db9d7b448', '2025-05-14 13:14:54'),
(2, '270406', 'elbil', 'elbil@lk.ac.id', 'bil123', '2025-05-14 16:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_roles`
--

CREATE TABLE `dosen_roles` (
  `id_role` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `current_role` enum('Dekan','Kaprodi','') NOT NULL DEFAULT '',
  `allowed_roles` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen_roles`
--

INSERT INTO `dosen_roles` (`id_role`, `id_dosen`, `current_role`, `allowed_roles`) VALUES
(1, 1, 'Dekan', 'Dekan');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `username`, `password`, `nama_lengkap`, `email`, `created_at`) VALUES
(1, 'keuangan1', '87cbf810625de2ff054ac8b841e135df', 'Keuangan Satu', 'keuangan1@lk.ac.id', '2025-05-14 13:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus_yayasan`
--

CREATE TABLE `pengurus_yayasan` (
  `id_pengurus` int(11) NOT NULL,
  `id_yayasan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL COMMENT 'Contoh: Ketua, Sekretaris, Bendahara',
  `email` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `tanggal_mulai_jabatan` date NOT NULL,
  `tanggal_selesai_jabatan` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengurus_yayasan`
--

INSERT INTO `pengurus_yayasan` (`id_pengurus`, `id_yayasan`, `nama`, `jabatan`, `email`, `no_telepon`, `tanggal_mulai_jabatan`, `tanggal_selesai_jabatan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hendra Wijaya', 'Ketua', 'hendra@yayasan.ac.id', NULL, '2025-01-01', NULL, '2025-05-15 10:06:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `id_kaprodi` int(11) NOT NULL COMMENT 'Kaprodi dari tabel users',
  `fakultas` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id_prodi`, `nama_prodi`, `id_kaprodi`, `fakultas`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Informatika', 2, 'Fakultas Teknik', '2025-05-15 10:06:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `judul_surat` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` enum('Masuk','Diproses','Selesai') NOT NULL DEFAULT 'Masuk',
  `tanggal_selesai` date DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL COMMENT 'Path ke file lampiran',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `id_dosen`, `nomor_surat`, `judul_surat`, `kategori`, `pengirim`, `deskripsi`, `tanggal_masuk`, `status`, `tanggal_selesai`, `lampiran`, `created_at`) VALUES
(1, 1, '1', 'pengajuan dana', 'Permintaan', 'Nabil', 'TES', '2025-05-16', 'Masuk', NULL, NULL, '2025-05-15 03:34:11'),
(2, 2, '001/UNIV/2025', 'Undangan Rapat', 'Undangan', 'Rektor', 'Rapat evaluasi', '2025-05-15', 'Masuk', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` enum('admin','dosen','dekan','kaprodi') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `role`, `created_at`) VALUES
(1, 'Admin Utama', 'admin', '2025-05-15 09:49:56'),
(2, 'Dosen 1', 'dosen', '2025-05-15 09:49:56'),
(3, 'Dr. Ahmad', 'dosen', '2025-05-15 10:06:32'),
(4, 'Prof. Budi', 'kaprodi', '2025-05-15 10:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `warek`
--

CREATE TABLE `warek` (
  `id_warek` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `posisi` enum('Warek 1','Warek 2','Warek 3') NOT NULL,
  `tanggung_jawab` varchar(100) NOT NULL COMMENT 'Contoh: Akademik, Keuangan, Kemahasiswaan',
  `email` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `tanggal_mulai_jabatan` date NOT NULL,
  `tanggal_selesai_jabatan` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warek`
--

INSERT INTO `warek` (`id_warek`, `nama`, `posisi`, `tanggung_jawab`, `email`, `no_telepon`, `tanggal_mulai_jabatan`, `tanggal_selesai_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Siti', 'Warek 1', 'Akademik', 'siti@univ.ac.id', NULL, '2025-01-01', NULL, '2025-05-15 10:06:32', NULL),
(2, 'Dr. Rudi', 'Warek 2', 'Keuangan', 'rudi@univ.ac.id', NULL, '2025-01-01', NULL, '2025-05-15 10:06:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yayasan`
--

CREATE TABLE `yayasan` (
  `id_yayasan` int(11) NOT NULL,
  `nama_yayasan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yayasan`
--

INSERT INTO `yayasan` (`id_yayasan`, `nama_yayasan`, `alamat`, `email`, `no_telepon`, `created_at`, `updated_at`) VALUES
(1, 'Yayasan Pendidikan Maju', 'Jl. Pendidikan No. 1', 'yayasan@univ.ac.id', NULL, '2025-05-15 10:06:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `aslab`
--
ALTER TABLE `aslab`
  ADD PRIMARY KEY (`id_aslab`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `dosen_roles`
--
ALTER TABLE `dosen_roles`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pengurus_yayasan`
--
ALTER TABLE `pengurus_yayasan`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_yayasan` (`id_yayasan`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_kaprodi` (`id_kaprodi`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warek`
--
ALTER TABLE `warek`
  ADD PRIMARY KEY (`id_warek`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `yayasan`
--
ALTER TABLE `yayasan`
  ADD PRIMARY KEY (`id_yayasan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `aslab`
--
ALTER TABLE `aslab`
  MODIFY `id_aslab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dosen_roles`
--
ALTER TABLE `dosen_roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengurus_yayasan`
--
ALTER TABLE `pengurus_yayasan`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `warek`
--
ALTER TABLE `warek`
  MODIFY `id_warek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `yayasan`
--
ALTER TABLE `yayasan`
  MODIFY `id_yayasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aslab`
--
ALTER TABLE `aslab`
  ADD CONSTRAINT `aslab_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen_roles`
--
ALTER TABLE `dosen_roles`
  ADD CONSTRAINT `dosen_roles_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE;

--
-- Constraints for table `pengurus_yayasan`
--
ALTER TABLE `pengurus_yayasan`
  ADD CONSTRAINT `pengurus_yayasan_ibfk_1` FOREIGN KEY (`id_yayasan`) REFERENCES `yayasan` (`id_yayasan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD CONSTRAINT `program_studi_ibfk_1` FOREIGN KEY (`id_kaprodi`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
