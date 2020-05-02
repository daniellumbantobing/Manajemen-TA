-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Bulan Mei 2020 pada 15.49
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
  `id` int(11) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(191) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `passwords` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nama`, `telepon`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Sarjono', '08123476585', 'Depok', '2020-04-03 13:18:20', '0000-00-00 00:00:00'),
(2, 'Dwikorita', '121231141414', 'Bekasi', '2020-04-03 13:18:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nim` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_depan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `nim`, `nama_depan`, `username`, `jenis_kelamin`, `agama`, `alamat`, `avatar`, `prodi_id`, `created_at`, `updated_at`) VALUES
(24, 31, '11318010', 'Davids', 'daniel12', 'L', 'Kristen', 'Medan', '427-4277341_add-play-button-to-image-online-overlay-play.png', 1, NULL, NULL),
(29, 42, '11318030', 'Budi Anto', 'dada12312', 'L', 'Kristen', 'tarutung', NULL, 3, NULL, NULL),
(31, 45, '1131801012', 'Daniel S', 'daniel', 'L', 'Kristen', 'tarutung', NULL, 1, NULL, NULL),
(33, 47, '113180dad0', 'Basruldda', 'daniel4567', 'L', 'Kristen', 'tarutung', NULL, 3, NULL, NULL),
(34, 48, 'iss12312', 'Karpijol', 'karpijol', 'L', 'Kristen', 'Medan', 'user2.png', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `kode` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `kode`, `nama`, `semester`, `guru_id`, `create_at`, `update_at`) VALUES
(4, 'M-101', 'Matematika', 'ganji', 1, '2020-04-22 13:57:38', '0000-00-00 00:00:00'),
(5, 'B-203', 'Bahasa Indonesia', 'ganjil', 2, '2020-04-22 13:57:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel_siswa`
--

INSERT INTO `mapel_siswa` (`id`, `siswa_id`, `mapel_id`, `nilai`, `created_at`, `updated_at`) VALUES
(32, 21, 5, 80, '2020-04-22 06:57:52', '2020-04-22 13:57:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`) VALUES
(1, 'S1 Sistem Informasi'),
(2, 'S1 Teknik Informatika'),
(3, 'S1 Teknik Elektro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'Admin', 'basrul@gmail.com', NULL, '$2y$10$777YvB9zBqmZc9w//sz4P.cbOU7QlhdLtLIZvay6lCY5F5m1GdaXi', 'EDgfLoGUVhYTgcjk4xMJW8nI7AE4S4upbNicRpOMHhaydmNUYr5WnXe39nta', '2020-03-29 17:24:19', '2020-03-29 17:24:19'),
(31, 'siswa', 'daniel12', 'daniel', 'daniellumbantobing05@gmail.com', NULL, '$2y$10$ksx33qXzd8L9pINJ.Hp.H.27ZARFjV5qGt2cc8TqGrOPEIrAPi4Oi', 'Etbz7ezuGkquSDv8WYKjbX2nmKF05SElehAcEa4EA6d09CWUd8fDFXrYah7W', '2020-04-22 09:54:50', '2020-04-22 09:54:50'),
(42, 'siswa', 'dada12312', 'Budi Anto', 'membdad@gmail.com', NULL, '$2y$10$oVDWPk0ANcRaX8zGdxUc9OFrSLPA77dsrVDaayItbiEtkiJKJWeI2', 'RVGpdmx9X503XM9gpP3tHq7D1ZTavE5utyzBv7VDP2wDAvMFsXsXk1CoOOzy', '2020-04-25 05:08:32', '2020-04-25 05:08:32'),
(44, 'siswa', 'ifdadada', 'Ana', 'basrul@gmdadaail.com', NULL, '$2y$10$aDI6yLYdosY6sWA0kRBUxuyWV/q0gaGsWAEnaOlRXKeXerQ/8PSu6', 'Gl5JpacJJAFrnLKCluvN9bQv4cBn1VNg7PUiV0AJuTRr5nB2gbDrRWt0pv3B', '2020-04-25 08:56:20', '2020-04-25 08:56:20'),
(45, 'siswa', 'daniel', 'daniel', 'basrul@gmdaddadaaail.com', NULL, '$2y$10$WI.RkYetXgy8zfbmSLyeJOc7U/ATX.4d0U3vYDBP17BFTm.k7RmqW', 'yxPM9HOn2MghPqwU8gxnXwNEwa0fdh9IEqbzFwO2oaHMWH7qp479WK7j9Ijr', '2020-04-26 09:42:13', '2020-04-26 09:42:13'),
(46, 'siswa', 'anita', 'Anita Tambunan', 'anita@gmail.com', NULL, '$2y$10$aTFk9O/P.wOkJZvh2f4M8Okgdd5eZ7ej//VQmQzNThUbfQggzgutO', 'oJvoZpTqLpPFcD1vRbf4KNnKWHEjOePjA8XETnLnWX16E1XnwAxr2AdBzuTR', '2020-04-28 09:21:39', '2020-04-28 09:21:39'),
(47, 'siswa', 'daniel4567', 'Basruldda', 'basrdddul@agmail.com', NULL, '$2y$10$s.U2LE6sVDxhcWtL0Ht2b.rIq4KRSJduiM1nCZnyHOl7wOBb8GV6C', 'ifoi4QMYNfbaingRE8ua8r7kVMFmOGGM1oiOvAroDzUhcNwxXHiPDawrVFhN', '2020-04-28 09:30:07', '2020-04-28 09:30:07'),
(48, 'siswa', 'karpijol', 'Karpijol', 'Karpijol@yahoo.com', NULL, '$2y$10$7tdtbtzrfFHYjPvgEYa25eOvKpERDC1F8KrvjDnTvDiKRKcKHYvUC', 'GqGFLc5I25d2fWz1yN0Qni9bhvZANbttdfog7UkbwAHVSRKt4JisShxp93Bk', '2020-04-29 21:36:41', '2020-04-29 21:36:41'),
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
-- Indeks untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
