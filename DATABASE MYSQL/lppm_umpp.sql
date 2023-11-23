-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 07:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lppm_umpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'admin_lppm', 'lppm_umpp_2022', 'ADMIN', 'super admin'),
(3, 'admin123', 'admin123', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `determinasi_tanaman`
--

CREATE TABLE `determinasi_tanaman` (
  `id` int(11) NOT NULL,
  `nama_yang_bertanda_tangan` text NOT NULL DEFAULT 'Nuniek Nizmah F,M.Kep., Sp.KMB',
  `nik_yang_bertanda_tangan` text NOT NULL DEFAULT '1970090819931007',
  `nim_mahasiswa` text NOT NULL,
  `nama_mahasiswa` text NOT NULL,
  `prodi_mhs` text NOT NULL,
  `fakultas_mhs` text NOT NULL,
  `tahun_akademik` text NOT NULL,
  `dosen_pembimbing` text NOT NULL,
  `judul_penelitian` text NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` enum('1','2') NOT NULL,
  `nomor_surat` text NOT NULL,
  `lampiran` text NOT NULL DEFAULT '-',
  `hal` text NOT NULL,
  `ditujukan_kepada` text NOT NULL,
  `universitas` text NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telfon` text NOT NULL,
  `status_pengajuan` enum('Tercetak','Dalam Proses') NOT NULL DEFAULT 'Dalam Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ethical_clearense`
--

CREATE TABLE `ethical_clearense` (
  `id` int(11) NOT NULL,
  `nama_yang_bertanda_tangan` text NOT NULL DEFAULT 'Nuniek Nizmah F,M.Kep., Sp.KMB',
  `nik_yang_bertanda_tangan` text NOT NULL DEFAULT '1970090819931007',
  `nomor_surat` text NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `lampiran` text NOT NULL,
  `perihal` text NOT NULL,
  `ditujukan_kepada` text NOT NULL,
  `fakultas` text NOT NULL,
  `universitas` text NOT NULL,
  `prodi` text NOT NULL,
  `nama_peneliti` text NOT NULL,
  `nidn` text NOT NULL,
  `judul_penelitian` text NOT NULL,
  `status` enum('1','2') NOT NULL,
  `status_pengajuan` enum('Tercetak','Dalam Proses') NOT NULL DEFAULT 'Dalam Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `izin_penelitian`
--

CREATE TABLE `izin_penelitian` (
  `id` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `nomor_surat` text NOT NULL,
  `lampiran` text NOT NULL,
  `perihal` text NOT NULL,
  `ditujukan_kepada` text NOT NULL,
  `fakultas` text NOT NULL,
  `universitas` text NOT NULL,
  `prodi` text NOT NULL,
  `nama_dosen` text NOT NULL,
  `nidn` text NOT NULL,
  `nama_mahasiswa` text NOT NULL,
  `nim` text NOT NULL,
  `judul_penelitian` text NOT NULL,
  `nama_yang_bertanda_tangan` text NOT NULL DEFAULT 'Nuniek Nizmah F,M.Kep., Sp.KMB',
  `nik_yang_bertanda_tangan` text NOT NULL DEFAULT '1970090819931007',
  `status` enum('1','2') NOT NULL,
  `status_pengajuan` enum('Tercetak','Dalam Proses') NOT NULL DEFAULT 'Dalam Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ket_selesai_penelitian`
--

CREATE TABLE `ket_selesai_penelitian` (
  `id` int(11) NOT NULL,
  `nim_mahasiswa` text NOT NULL,
  `nama_mahasiswa` text NOT NULL,
  `prodi_mhs` text NOT NULL,
  `fakultas_mhs` text NOT NULL,
  `tahun_akademik` text NOT NULL,
  `dosen_pembimbing` text NOT NULL,
  `judul_penelitian` text NOT NULL,
  `tanggal_masuk` text NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `nomor_surat` text NOT NULL,
  `lampiran` text NOT NULL,
  `hal` text NOT NULL,
  `ditujukan_kepada` text NOT NULL,
  `universitas` text NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telfon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `limit_pengajuan`
--

CREATE TABLE `limit_pengajuan` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nim_atau_nidn` text NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `perihal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log_login`
--

CREATE TABLE `log_login` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `login_at` text NOT NULL,
  `logout_at` text NOT NULL,
  `ip` varchar(255) NOT NULL,
  `browser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nomor_surat`
--

CREATE TABLE `nomor_surat` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tahun` text NOT NULL,
  `nama_pemilik_surat` text NOT NULL,
  `hal` text NOT NULL,
  `ditujukan_kepada` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `oral_presentasi`
--

CREATE TABLE `oral_presentasi` (
  `id` int(11) NOT NULL,
  `nomor_surat` text NOT NULL,
  `nama_yang_bertanda_tangan` text NOT NULL DEFAULT 'Nuniek Nizmah F,M.Kep., Sp.KMB',
  `nidn_yang_bertanda_tangan` text NOT NULL DEFAULT '0608097003',
  `pangkat_yang_bertanda_tangan` text NOT NULL DEFAULT 'Penata Muda/III.c',
  `jabatan_masyarakat` text NOT NULL DEFAULT 'Ketua Lembaga Penelitian dan Pengabdian Masyarakat',
  `pada_perguruan_tinggi` text NOT NULL DEFAULT 'Universitas Muhammadiyah Pekajangan Pekalongan',
  `nama` text NOT NULL,
  `nidn` text NOT NULL,
  `pangkat` text NOT NULL,
  `fakultas` text NOT NULL,
  `prodi` text NOT NULL,
  `universitas` text NOT NULL,
  `bentuk_kegiatan` text NOT NULL,
  `judul` text NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `tanggal` date NOT NULL,
  `dikategorikan` text NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `tanggal_masuk` date NOT NULL,
  `status_pengajuan` enum('Tercetak','Dalam Proses') NOT NULL DEFAULT 'Dalam Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengabdian_masyarakat`
--

CREATE TABLE `pengabdian_masyarakat` (
  `id` int(11) NOT NULL,
  `nomor_surat` text NOT NULL,
  `lampiran` text NOT NULL,
  `perihal` text NOT NULL,
  `tanggal_masuk` text NOT NULL,
  `ditujukan_kepada` text NOT NULL,
  `fakultas` text NOT NULL,
  `prodi` text NOT NULL,
  `universitas` text NOT NULL,
  `nama_dosen` text NOT NULL,
  `nidn` text NOT NULL,
  `nama_mahasiswa` text NOT NULL,
  `nim` text NOT NULL,
  `judul_pengabdian` text NOT NULL,
  `nama_yang_bertanda_tangan` text NOT NULL DEFAULT 'Nuniek Nizmah F,M.Kep., Sp.KMB',
  `nik_yang_bertanda_tangan` text NOT NULL DEFAULT '1970090819931007',
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `status_pengajuan` enum('Tercetak','Dalam Proses') NOT NULL DEFAULT 'Dalam Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_penelitian`
--

CREATE TABLE `pengajuan_penelitian` (
  `id` int(11) NOT NULL,
  `nama_yang_bertanda_tangan` text NOT NULL DEFAULT 'Nuniek Nizmah F,M.Kep., Sp.KMB',
  `nik_yang_bertanda_tangan` text NOT NULL DEFAULT '1970090819931007',
  `nim_mahasiswa` varchar(20) NOT NULL,
  `nama_mahasiswa` text NOT NULL,
  `prodi_mhs` text NOT NULL,
  `fakultas_mhs` text NOT NULL,
  `tahun_akademik` varchar(10) NOT NULL,
  `dosen_pembimbing` text NOT NULL,
  `judul_penelitian` text NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` enum('1','2') DEFAULT '1',
  `nomor_surat` text NOT NULL,
  `lampiran` text NOT NULL DEFAULT '-',
  `hal` text NOT NULL,
  `ditujukan_kepada` text NOT NULL,
  `universitas` text NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telfon` text NOT NULL,
  `status_pengajuan` enum('Tercetak','Dalam Proses') NOT NULL DEFAULT 'Dalam Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_surattugas`
--

CREATE TABLE `pengajuan_surattugas` (
  `id` int(11) NOT NULL,
  `tujuan` text NOT NULL,
  `alamat_bertandatangan` text NOT NULL,
  `nama_bertandatangan` text NOT NULL,
  `jabatan_bertandatangan` varchar(255) NOT NULL,
  `nama_dosen` text NOT NULL,
  `jabatan` text NOT NULL,
  `keperluan` text NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `nama_mahasiswa` text NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `mengetahui` varchar(255) NOT NULL,
  `status` enum('1','2') DEFAULT '1',
  `nomor_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studi_pendahuluan`
--

CREATE TABLE `studi_pendahuluan` (
  `id` int(11) NOT NULL,
  `nama_yang_bertanda_tangan` text NOT NULL DEFAULT 'Nuniek Nizmah F,M.Kep., Sp.KMB',
  `nik_yang_bertanda_tangan` text NOT NULL DEFAULT '1970090819931007',
  `nomor_surat` text NOT NULL,
  `lampiran` text NOT NULL DEFAULT '-',
  `hal` text NOT NULL,
  `tanggal_surat` date NOT NULL,
  `ditujukan_kepada` text NOT NULL,
  `prodi_mhs` varchar(255) NOT NULL,
  `fakultas_mhs` varchar(255) NOT NULL,
  `universitas` text NOT NULL,
  `tahun_akademik` text NOT NULL,
  `nama` text NOT NULL,
  `nim` text NOT NULL,
  `alamat_mhs` text NOT NULL,
  `dosen_pembimbing` text NOT NULL,
  `judul_penelitian` text NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `nomor_telfon` varchar(20) NOT NULL,
  `status_pengajuan` enum('Tercetak','Dalam Proses') NOT NULL DEFAULT 'Dalam Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_publikasi`
--

CREATE TABLE `surat_publikasi` (
  `id` int(11) NOT NULL,
  `nomor_surat` text NOT NULL,
  `nama_yang_bertanda_tangan` text NOT NULL DEFAULT 'Nuniek Nizmah F,M.Kep., Sp.KMB',
  `nidn_yang_bertanda_tangan` text NOT NULL DEFAULT '0608097003',
  `pangkat_yang_bertanda_tangan` text NOT NULL DEFAULT 'Penata Muda/III.c',
  `jabatan_masyarakat` text NOT NULL DEFAULT 'Ketua Lembaga Penelitian dan Pengabdian Masyarakat',
  `pada_perguruan_tinggi` text NOT NULL DEFAULT 'Universitas Muhammadiyah Pekajangan Pekalongan',
  `nama_dosen` text NOT NULL,
  `nidn` text NOT NULL,
  `pangkat` text NOT NULL,
  `fakultas` text NOT NULL,
  `prodi` text NOT NULL,
  `universitas` text NOT NULL,
  `bentuk_tugas` text NOT NULL,
  `judul` text NOT NULL,
  `nama_jurnal` text NOT NULL,
  `nomor_dan_volume` text NOT NULL,
  `issn` text NOT NULL,
  `penerbit` text NOT NULL,
  `kategori_jurnal` text NOT NULL,
  `tanggal_terbit` text NOT NULL,
  `dikategorikan` text NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` enum('1','2') NOT NULL,
  `status_pengajuan` enum('Tercetak','Dalam Proses') NOT NULL DEFAULT 'Dalam Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas_hki`
--

CREATE TABLE `surat_tugas_hki` (
  `id` int(11) NOT NULL,
  `nama_yang_bertanda_tangan` text NOT NULL DEFAULT 'Nuniek Nizmah F,M.Kep., Sp.KMB',
  `nidn_yang_bertanda_tangan` text NOT NULL DEFAULT '0608097003',
  `pangkat_yang_bertanda_tangan` text NOT NULL DEFAULT 'Penata Muda/III.c',
  `jabatan_bertandatangan` text NOT NULL DEFAULT 'Ketua Lembaga Penelitian dan Pengabdian Masyarakat',
  `pada_perguruan_tinggi` text NOT NULL DEFAULT 'Universitas Muhammadiyah Pekajangan Pekalongan',
  `tanggal_masuk` date NOT NULL,
  `nama_dosen` text NOT NULL,
  `nidn` text NOT NULL,
  `pangkat` text NOT NULL,
  `universitas` text NOT NULL,
  `fakultas` text NOT NULL,
  `prodi` text NOT NULL,
  `jenis_ciptaan` text NOT NULL,
  `judul` text NOT NULL,
  `nomor_permohonan` text NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `nomor_pencatatan` text NOT NULL,
  `tahun_terbit` text NOT NULL,
  `dikategorikan` text NOT NULL,
  `nomor_surat` text NOT NULL,
  `bentuk_tugas` text NOT NULL,
  `status` enum('1','2') DEFAULT '1',
  `status_pengajuan` enum('Tercetak','Dalam Proses') NOT NULL DEFAULT 'Dalam Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tugas_penelitian`
--

CREATE TABLE `tugas_penelitian` (
  `id` int(11) NOT NULL,
  `nomor_surat` text NOT NULL,
  `nama_yang_bertanda_tangan` text NOT NULL,
  `jabatan_yang_bertanda_tangan` text NOT NULL,
  `alamat` text NOT NULL,
  `nama_dosen` text NOT NULL,
  `jabatan` text NOT NULL,
  `nama_mahasiswa` text NOT NULL,
  `judul_penelitian` text NOT NULL,
  `keperluan` text NOT NULL,
  `tanggal` date NOT NULL,
  `tujuan` text NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `status_pengajuan` enum('Tercetak','Dalam Proses') NOT NULL DEFAULT 'Dalam Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tugas_pengabdian`
--

CREATE TABLE `tugas_pengabdian` (
  `id` int(11) NOT NULL,
  `nomor_surat` text NOT NULL,
  `nama_yang_bertanda_tangan` text NOT NULL,
  `jabatan_yang_bertanda_tangan` text NOT NULL,
  `alamat` text NOT NULL,
  `nama_dosen` text NOT NULL,
  `jabatan` text NOT NULL,
  `nama_mahasiswa` text NOT NULL,
  `keperluan` text NOT NULL,
  `tanggal` date NOT NULL,
  `tujuan` text NOT NULL,
  `tanggal_masuk` text NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `status_pengajuan` enum('Tercetak','Dalam Proses') NOT NULL DEFAULT 'Dalam Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uji_validitas`
--

CREATE TABLE `uji_validitas` (
  `id` int(11) NOT NULL,
  `nama_yang_bertanda_tangan` text NOT NULL DEFAULT 'Nuniek Nizmah F,M.Kep., Sp.KMB',
  `nik_yang_bertanda_tangan` text NOT NULL DEFAULT '1970090819931007',
  `nomor_surat` text NOT NULL,
  `lampiran` text NOT NULL DEFAULT '-',
  `hal` text NOT NULL,
  `tanggal_surat` date NOT NULL,
  `ditujukan_kepada` text NOT NULL,
  `prodi_mhs` text NOT NULL,
  `fakultas_mhs` text NOT NULL,
  `universitas` text NOT NULL,
  `tahun_akademik` text NOT NULL,
  `nama` text NOT NULL,
  `nim` text NOT NULL,
  `alamat_mhs` text NOT NULL,
  `dosen_pembimbing` text NOT NULL,
  `judul_penelitian` text NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `nomor_telfon` text NOT NULL,
  `status_pengajuan` enum('Tercetak','Dalam Proses') NOT NULL DEFAULT 'Dalam Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `determinasi_tanaman`
--
ALTER TABLE `determinasi_tanaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ethical_clearense`
--
ALTER TABLE `ethical_clearense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `izin_penelitian`
--
ALTER TABLE `izin_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ket_selesai_penelitian`
--
ALTER TABLE `ket_selesai_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limit_pengajuan`
--
ALTER TABLE `limit_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nomor_surat`
--
ALTER TABLE `nomor_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomor_surat` (`nomor_surat`);

--
-- Indexes for table `oral_presentasi`
--
ALTER TABLE `oral_presentasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengabdian_masyarakat`
--
ALTER TABLE `pengabdian_masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_penelitian`
--
ALTER TABLE `pengajuan_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_surattugas`
--
ALTER TABLE `pengajuan_surattugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studi_pendahuluan`
--
ALTER TABLE `studi_pendahuluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_publikasi`
--
ALTER TABLE `surat_publikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_tugas_hki`
--
ALTER TABLE `surat_tugas_hki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_penelitian`
--
ALTER TABLE `tugas_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_pengabdian`
--
ALTER TABLE `tugas_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uji_validitas`
--
ALTER TABLE `uji_validitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `determinasi_tanaman`
--
ALTER TABLE `determinasi_tanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ethical_clearense`
--
ALTER TABLE `ethical_clearense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `izin_penelitian`
--
ALTER TABLE `izin_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ket_selesai_penelitian`
--
ALTER TABLE `ket_selesai_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `limit_pengajuan`
--
ALTER TABLE `limit_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_login`
--
ALTER TABLE `log_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `nomor_surat`
--
ALTER TABLE `nomor_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `oral_presentasi`
--
ALTER TABLE `oral_presentasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengabdian_masyarakat`
--
ALTER TABLE `pengabdian_masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengajuan_penelitian`
--
ALTER TABLE `pengajuan_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pengajuan_surattugas`
--
ALTER TABLE `pengajuan_surattugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `studi_pendahuluan`
--
ALTER TABLE `studi_pendahuluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `surat_publikasi`
--
ALTER TABLE `surat_publikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `surat_tugas_hki`
--
ALTER TABLE `surat_tugas_hki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tugas_penelitian`
--
ALTER TABLE `tugas_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tugas_pengabdian`
--
ALTER TABLE `tugas_pengabdian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `uji_validitas`
--
ALTER TABLE `uji_validitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
