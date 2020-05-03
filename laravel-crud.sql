-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2020 pada 12.43
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` INT(11) NOT NULL,
  `nidn` VARCHAR(20) NOT NULL,
  `nama` VARCHAR(255) NOT NULL,
  `status` VARCHAR(191) NOT NULL,
  `jabatan` VARCHAR(255) NOT NULL,
  `passwords` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` DATETIME NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `nama`, `status`, `jabatan`, `passwords`, `created_at`, `update_at`) VALUES
(1, '123', 'Andi', 'Aktif', 'Dosen Pembingbing', 'andi', '2020-04-26 14:12:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `connection` TEXT COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` TEXT COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` LONGTEXT COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` LONGTEXT COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` INT(11) NOT NULL,
  `nama` VARCHAR(100) NOT NULL,
  `telepon` VARCHAR(15) NOT NULL,
  `alamat` TEXT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nama`, `telepon`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Sarjono', '08123476585', 'Depok', '2020-04-03 13:18:20', '0000-00-00 00:00:00'),
(2, 'Dwikorita', '121231141414', 'Bekasi', '2020-04-03 13:18:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id` INT(11) NOT NULL,
  `tahun` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kurikulum`
--

INSERT INTO `kurikulum` (`id`, `tahun`) VALUES
(1, '2014'),
(2, '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` INT(10) UNSIGNED NOT NULL,
  `user_id` INT(11) NOT NULL,
  `nim` VARCHAR(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_depan` VARCHAR(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` VARCHAR(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` VARCHAR(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` VARCHAR(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` TEXT COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` VARCHAR(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `nim`, `nama_depan`, `username`, `jenis_kelamin`, `agama`, `alamat`, `avatar`, `prodi_id`, `created_at`, `updated_at`) VALUES
(24, 31, '11318010', 'Davids', 'daniel12', 'L', 'Kristen', 'Medan', '427-4277341_add-play-button-to-image-online-overlay-play.png', 1, NULL, NULL),
(29, 42, '11318030', 'Budi Anto', 'dada12312', 'L', 'Kristen', 'tarutung', NULL, 3, NULL, NULL),
(31, 45, '1131801012', 'Daniel S', 'daniel', 'L', 'Kristen', 'tarutung', NULL, 1, NULL, NULL),
(33, 47, '113180dad0', 'Basruldda', 'daniel4567', 'L', 'Kristen', 'tarutung', NULL, 3, NULL, NULL),
(34, 48, 'iss12312', 'Karpijol', 'karpijol', 'L', 'Kristen', 'Medan', '427-4277341_add-play-button-to-image-online-overlay-play.png', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` INT(11) NOT NULL,
  `kode` VARCHAR(191) NOT NULL,
  `nama` VARCHAR(191) NOT NULL,
  `semester` VARCHAR(45) NOT NULL,
  `guru_id` INT(11) NOT NULL,
  `create_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` DATETIME NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `kode`, `nama`, `semester`, `guru_id`, `create_at`, `update_at`) VALUES
(4, 'M-101', 'Matematika', 'ganji', 1, '2020-04-22 13:57:38', '0000-00-00 00:00:00'),
(5, 'B-203', 'Bahasa Indonesia', 'ganjil', 2, '2020-04-22 13:57:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` INT(11) NOT NULL,
  `kode_matkul` VARCHAR(50) NOT NULL,
  `matakuliah` VARCHAR(255) NOT NULL,
  `sks` INT(11) NOT NULL,
  `prodi_id` INT(11) NOT NULL,
  `semester_id` INT(11) NOT NULL,
  `kurikulum_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode_matkul`, `matakuliah`, `sks`, `prodi_id`, `semester_id`, `kurikulum_id`, `created_at`, `updated_at`) VALUES
(1, 'KUS1101', 'Pembentukan Karakter Del', 2, 2, 1, 1, '2020-05-02 15:30:43', '0000-00-00 00:00:00'),
(2, 'IFS1102', 'Pemrograman I', 2, 2, 1, 1, '2020-05-02 15:30:43', '0000-00-00 00:00:00'),
(3, 'MAS1101', 'Matematika Dasar I', 4, 2, 1, 1, '2020-05-02 15:30:43', '0000-00-00 00:00:00'),
(4, 'FIS1101', 'Fisika Dasar I', 4, 2, 1, 1, '2020-05-02 15:30:43', '0000-00-00 00:00:00'),
(5, 'KUS1102', 'Bahasa Inggris I', 2, 2, 1, 1, '2020-05-02 15:30:43', '0000-00-00 00:00:00'),
(6, 'IFS1101', 'Pengantar Teknologi Informasi', 2, 2, 1, 1, '2020-05-02 15:30:43', '0000-00-00 00:00:00'),
(13, 'IFS1103', 'Sains Teknologi dan Seni di Masyarakat', 2, 2, 1, 1, '2020-05-02 15:38:07', '0000-00-00 00:00:00'),
(14, 'MAS1201', 'Matematika Dasar II', 4, 2, 2, 1, '2020-05-02 15:38:07', '0000-00-00 00:00:00'),
(15, 'FIS1201', 'Fisika Dasar II (+P)', 4, 2, 2, 1, '2020-05-02 15:38:07', '0000-00-00 00:00:00'),
(16, 'KUS1201', 'Bahasa Inggris II', 2, 2, 2, 1, '2020-05-02 15:38:07', '0000-00-00 00:00:00'),
(17, 'IFS1202', 'Dasar Rekayasa Perangkat Lunak', 3, 2, 2, 1, '2020-05-02 15:38:07', '0000-00-00 00:00:00'),
(18, 'IFS1203', 'Pengantar Desain Rekayasa', 2, 2, 2, 1, '2020-05-02 15:38:07', '0000-00-00 00:00:00'),
(19, 'IFS1201', 'Pemrograman II', 2, 2, 2, 1, '2020-05-02 15:38:07', '0000-00-00 00:00:00'),
(20, 'KUS1001', 'Tata Tulis Karya Ilmiah', 2, 2, 2, 1, '2020-05-02 15:38:07', '0000-00-00 00:00:00'),
(41, 'MAS2102', 'Matematika Diskrit', 3, 2, 3, 1, '2020-05-02 16:15:43', '0000-00-00 00:00:00'),
(42, 'MAS2001', 'Probabilitas dan Statistika', 3, 2, 3, 1, '2020-05-02 16:15:43', '0000-00-00 00:00:00'),
(43, 'IFS2101	', 'Algoritma dan Struktur Data', 3, 2, 3, 1, '2020-05-02 16:15:43', '0000-00-00 00:00:00'),
(44, 'ELS2180', 'Sistem Digital', 3, 2, 3, 1, '2020-05-02 16:15:43', '0000-00-00 00:00:00'),
(45, 'ISS2101', 'Basis Data', 3, 2, 3, 1, '2020-05-02 16:15:43', '0000-00-00 00:00:00'),
(46, 'IFS2102', 'Logika Informatika', 3, 2, 3, 1, '2020-05-02 16:15:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah_siswa`
--

CREATE TABLE `matakuliah_siswa` (
  `id` INT(11) NOT NULL,
  `siswa_id` INT(11) NOT NULL,
  `matakuliah_id` INT(11) NOT NULL,
  `nilai` INT(11) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah_siswa`
--

INSERT INTO `matakuliah_siswa` (`id`, `siswa_id`, `matakuliah_id`, `nilai`, `created_at`, `updated_at`) VALUES
(37, 34, 1, 90, '2020-05-03 02:36:59', '2020-05-03 10:09:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` INT(10) UNSIGNED NOT NULL,
  `migration` VARCHAR(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_03_04_012211_create_siswa_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `thumbnail` VARCHAR(255) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `slug`, `thumbnail`, `created_at`, `updated_at`) VALUES
(9, 1, 'Pengumuman', '<p>Jadwal</p>', 'pengumuman', '/photos/1/barang.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 'Pengumupulan Doukumen', '<p>Dear Seluruh Mahasiswa.,</p><p>Kami informasikan dari Panitia KPU IT DEL 2020 dari hasil pemilihan putaran pertama dengan hasil perolehan suara yang sama, maka kami ingin memberitahukan informasi lebih lanjut terkait pelaksanaan pemilihan Ketua dan Wakil Ketua BEM 2020/2021 putaran ke-2 (dua) yang akan dilaksanakan pada :</p><p><strong>Hari, Tanggal : Kamis, 30 April 2020</strong><br><strong>Pukul : 08.00 - 20.00 WIB</strong></p>', 'pengumupulan-doukumen', NULL, '2020-04-30 03:48:42', '2020-04-30 10:48:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` INT(11) NOT NULL,
  `nama_prodi` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`) VALUES
(1, 'S1 Sistem Informasi'),
(2, 'S1 Teknik Informatika'),
(3, 'S1 Teknik Elektro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` INT(11) NOT NULL,
  `semester` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id`, `semester`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `role` VARCHAR(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` VARCHAR(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` VARCHAR(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` VARCHAR(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` VARCHAR(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'Admin', 'basrul@gmail.com', NULL, '$2y$10$777YvB9zBqmZc9w//sz4P.cbOU7QlhdLtLIZvay6lCY5F5m1GdaXi', 'UlEwp3DCjd9ErdPP65UZuARLgcJvleHDDOy1J0eJ9mcCvxaO4y3soBdn4BvB', '2020-03-29 17:24:19', '2020-03-29 17:24:19'),
(31, 'siswa', 'daniel12', 'daniel', 'daniellumbantobing05@gmail.com', NULL, '$2y$10$ksx33qXzd8L9pINJ.Hp.H.27ZARFjV5qGt2cc8TqGrOPEIrAPi4Oi', 'Etbz7ezuGkquSDv8WYKjbX2nmKF05SElehAcEa4EA6d09CWUd8fDFXrYah7W', '2020-04-22 09:54:50', '2020-04-22 09:54:50'),
(42, 'siswa', 'dada12312', 'Budi Anto', 'membdad@gmail.com', NULL, '$2y$10$oVDWPk0ANcRaX8zGdxUc9OFrSLPA77dsrVDaayItbiEtkiJKJWeI2', 'RVGpdmx9X503XM9gpP3tHq7D1ZTavE5utyzBv7VDP2wDAvMFsXsXk1CoOOzy', '2020-04-25 05:08:32', '2020-04-25 05:08:32'),
(44, 'siswa', 'ifdadada', 'Ana', 'basrul@gmdadaail.com', NULL, '$2y$10$aDI6yLYdosY6sWA0kRBUxuyWV/q0gaGsWAEnaOlRXKeXerQ/8PSu6', 'Gl5JpacJJAFrnLKCluvN9bQv4cBn1VNg7PUiV0AJuTRr5nB2gbDrRWt0pv3B', '2020-04-25 08:56:20', '2020-04-25 08:56:20'),
(45, 'siswa', 'daniel', 'daniel', 'basrul@gmdaddadaaail.com', NULL, '$2y$10$WI.RkYetXgy8zfbmSLyeJOc7U/ATX.4d0U3vYDBP17BFTm.k7RmqW', 'yxPM9HOn2MghPqwU8gxnXwNEwa0fdh9IEqbzFwO2oaHMWH7qp479WK7j9Ijr', '2020-04-26 09:42:13', '2020-04-26 09:42:13'),
(46, 'siswa', 'anita', 'Anita Tambunan', 'anita@gmail.com', NULL, '$2y$10$aTFk9O/P.wOkJZvh2f4M8Okgdd5eZ7ej//VQmQzNThUbfQggzgutO', 'oJvoZpTqLpPFcD1vRbf4KNnKWHEjOePjA8XETnLnWX16E1XnwAxr2AdBzuTR', '2020-04-28 09:21:39', '2020-04-28 09:21:39'),
(47, 'siswa', 'daniel4567', 'Basruldda', 'basrdddul@agmail.com', NULL, '$2y$10$s.U2LE6sVDxhcWtL0Ht2b.rIq4KRSJduiM1nCZnyHOl7wOBb8GV6C', 'ifoi4QMYNfbaingRE8ua8r7kVMFmOGGM1oiOvAroDzUhcNwxXHiPDawrVFhN', '2020-04-28 09:30:07', '2020-04-28 09:30:07'),
(48, 'siswa', 'karpijol', 'Karpijol', 'Karpijol@yahoo.com', NULL, '$2y$10$7tdtbtzrfFHYjPvgEYa25eOvKpERDC1F8KrvjDnTvDiKRKcKHYvUC', 'aIShI8RG4ySJWqFwn7W1SKtzRV09edqQ8WybxwbNmkHQ9qsIcAOrKtKWAtOd', '2020-04-29 21:36:41', '2020-04-29 21:36:41'),
(49, 'siswa', 'sukijo', 'Sukijo', 'salomosepttwindo@gmail.com', NULL, '$2y$10$8HkQ6Et/YXbqDk0GR2ksIuoMS5pY393y9rwa0POAA6PaJmZepvUVe', 'mIVst4A9xGVlDhBNI8AKIhs6cWLwGruizFk9gtDSB0acfjSHaKTivDpJtv1p', '2020-04-29 23:05:25', '2020-04-29 23:05:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `id_prodi` (`prodi_id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_matkul` (`kode_matkul`),
  ADD KEY `prodi_id` (`prodi_id`),
  ADD KEY `tahun_kurikulum_id` (`kurikulum_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indeks untuk tabel `matakuliah_siswa`
--
ALTER TABLE `matakuliah_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_verified_at` (`email_verified_at`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `matakuliah_siswa`
--
ALTER TABLE `matakuliah_siswa`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matakuliah_ibfk_2` FOREIGN KEY (`kurikulum_id`) REFERENCES `kurikulum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matakuliah_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
