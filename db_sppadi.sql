-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Jun 2023 pada 17.00
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sppadi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(1, 'admin', '1234', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan`
--

CREATE TABLE `aturan` (
  `id` int(11) NOT NULL,
  `kode_gejalacf` varchar(10) DEFAULT NULL,
  `kode_penyakitcf` varchar(10) DEFAULT NULL,
  `cfaturan` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aturan`
--

INSERT INTO `aturan` (`id`, `kode_gejalacf`, `kode_penyakitcf`, `cfaturan`) VALUES
(1, 'G1', 'P1', '0.60'),
(2, 'G3', 'P1', '0.60'),
(3, 'G4', 'P1', '0.60'),
(4, 'G8', 'P1', '0.60'),
(5, 'G9', 'P1', '0.60'),
(6, 'G2', 'P2', '0.80'),
(7, 'G4', 'P2', '0.80'),
(8, 'G5', 'P2', '0.80'),
(9, 'G9', 'P2', '0.80'),
(10, 'G6', 'P3', '0.40'),
(11, 'G7', 'P3', '0.40'),
(12, 'G9', 'P3', '0.40'),
(13, 'G10', 'P3', '0.40'),
(14, 'G11', 'P3', '0.40'),
(15, 'G12', 'P3', '0.40'),
(16, 'G13', 'P3', '0.40'),
(17, 'G14', 'P4', '0.80'),
(18, 'G15', 'P4', '0.80'),
(19, 'G16', 'P4', '0.80'),
(20, 'G17', 'P4', '0.80'),
(21, 'G18', 'P5', '0.60'),
(22, 'G19', 'P5', '0.60'),
(23, 'G20', 'P5', '0.60'),
(24, 'G21', 'P5', '0.60'),
(25, 'G22', 'P5', '0.60');

-- --------------------------------------------------------

--
-- Struktur dari tabel `basispengetahuan`
--

CREATE TABLE `basispengetahuan` (
  `id` int(11) NOT NULL,
  `kode_penyakit` varchar(30) NOT NULL,
  `kode_gejala` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `basispengetahuan`
--

INSERT INTO `basispengetahuan` (`id`, `kode_penyakit`, `kode_gejala`) VALUES
(1, 'P1', 'G1'),
(2, 'P1', 'G3'),
(3, 'P1', 'G4'),
(4, 'P1', 'G8'),
(5, 'P1', 'G9'),
(6, 'P2', 'G2'),
(7, 'P2', 'G4'),
(8, 'P2', 'G5'),
(9, 'P2', 'G9'),
(10, 'P3', 'G6'),
(11, 'P3', 'G7'),
(12, 'P3', 'G9'),
(13, 'P3', 'G10'),
(14, 'P3', 'G11'),
(15, 'P3', 'G12'),
(16, 'P3', 'G13'),
(17, 'P4', 'G14'),
(18, 'P4', 'G15'),
(19, 'P4', 'G16'),
(20, 'P4', 'G17'),
(21, 'P5', 'G18'),
(22, 'P5', 'G19'),
(23, 'P5', 'G20'),
(24, 'P5', 'G21'),
(25, 'P5', 'G22'),
(26, 'P5', 'G23'),
(27, 'P5', 'G24'),
(28, 'P5', 'G25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` varchar(30) NOT NULL,
  `gejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `gejala`) VALUES
('G1', 'Malai'),
('G10', 'Malai menjadi kecil'),
('G11', 'Malai tidak berisi '),
('G12', 'Bercak daun membesar'),
('G13', 'Bercak kehitaman pada pelepah'),
('G14', 'Menyerang pelepah'),
('G15', 'Menyerang pelepah yang membentuk anakan'),
('G16', 'Jumlah gabah menurun'),
('G17', 'Kualitas gabah kurang baik'),
('G18', 'Menyerang semua bagian tanaman'),
('G19', 'Daun menjadi pendek'),
('G2', 'Menyerang bagian daun'),
('G20', 'Batang menjadi sempit'),
('G21', 'Tanaman berwarna hijau kekuningan'),
('G22', 'Batang menjadi pendek'),
('G23', 'Buku-buku menjadi pendek'),
('G24', 'Anakan banyak tapi kecil'),
('G25', 'Pertumbuhan tanaman kurang sempurna'),
('G3', 'Menyerang tangkai malai'),
('G4', 'Menyerang titik tumbuh padi'),
('G5', 'Terdapat garis tulang daun'),
('G6', 'Batang melepuh'),
('G7', 'Batang berisi cairan hitam'),
('G8', 'Daun terkulai'),
('G9', 'Akar membusuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejalacf`
--

CREATE TABLE `gejalacf` (
  `kode_gejalacf` varchar(5) NOT NULL,
  `gejalacf` varchar(100) DEFAULT NULL,
  `bobot_pakar` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gejalacf`
--

INSERT INTO `gejalacf` (`kode_gejalacf`, `gejalacf`, `bobot_pakar`) VALUES
('G1', 'Malai', '0.40'),
('G10', 'Malai menjadi kecil', '0.60'),
('G11', 'Malai tidak berisi', '1.00'),
('G12', 'Bercak daun membesar', '0.20'),
('G13', 'Bercak kehitaman pada pelepah', '0.80'),
('G14', 'Menyerang pelepah', '0.60'),
('G15', 'Menyerang pelepah yang membentuk anakan', '0.80'),
('G16', 'Jumlah gabah menurun', '0.40'),
('G17', 'Kualitas gabah kurang baik', '1.00'),
('G18', 'Menyerang semua bagian tanaman', '1.00'),
('G19', 'Daun menjadi pendek', '0.40'),
('G2', 'Menyerang bagian daun', '0.80'),
('G20', 'Batang menjadi sempit', '0.80'),
('G21', 'Tanaman berwarna hijau kekuningan', '0.60'),
('G22', 'Batang menjadi pendek', '0.60'),
('G23', 'Buku-buku menjadi pendek', '0.40'),
('G24', 'Anakan banyak tapi kecil', '0.80'),
('G25', 'Pertumbuhan tanaman kurang sempurna', '0.20'),
('G3', 'Menyerang tangkai malai', '0.20'),
('G4', 'Menyerang titik tumbuh padi', '1.00'),
('G5', 'Terdapat garis di antara tulang daun', '0.80'),
('G6', 'Batang melepuh', '0.60'),
('G7', 'Batang berisi cairan hitam', '0.40'),
('G8', 'Daun terkulai', '0.40'),
('G9', 'Akar membusuk', '0.40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status_aktif` enum('Y','N') NOT NULL,
  `premium` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `username`, `password`, `email`, `status_aktif`, `premium`) VALUES
(1, 'angga', '1234', 'angga@gmail.com', 'Y', 'Y'),
(3, 'aku', '1234', 'angga@amikom.ac.id', 'Y', 'N'),
(5, 'dia', '1234', 'dia@gmail.com', 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` varchar(30) NOT NULL,
  `penyakit` varchar(30) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `penyakit`, `solusi`) VALUES
('P1', 'Fusarium', '1. Merenggangkan jarak tanaman \r\n2. Mencelupkan bibit ke dalam air campuran POCNASA\r\n3. Sebarkan GLIO di lahan'),
('P2', 'Kresek hawar daun', '1. Pengolahan tanah secara optimal\r\n2. Penanaman varietas unggul dari benih yang sehat\r\n3. Pengaturan jarak tanam \r\n4. Pemupukan berimbang dengan pemberian unsur N, P, K, dan unsur mikro\r\n5. Pengaturan sistem pengairan sesuai fase pertumbuhan tanaman \r\n6. Penyemprotan bakterisida sesuai anjuran yang efektif\r\n\r\n\r\n\r\n\r\n'),
('P3', 'Batang busuk ', '1. Penyemprotan dengan pestisida jenis fungisida yang berbahan aktif difenokonazol\r\n2. Pengelolaan air secara intermiten, jangan terlalu digenang\r\n3. Pemupukan yang berimbang, dengan pemberian unsur K(Kalium), dan N (Nitrogen) sesuai anjuran \r\n'),
('P4', 'Pelepah daun', '1. Pengaturan jarak tanaman tidak terlalu rapat\r\n2. Pemupukan berimbang \r\n3. Pengairan berselang \r\n4. Sanitasi sisa tanaman dan gulma di sekitar sawah \r\n'),
('P5', 'Kerdil', '1. Menggunakan bibit unggul\r\n2. Membersihkan gulma disekitar tanaman padi\r\n3. Penyemprotan pestisida dan insektisida \r\n4. Bercocok tanam dengan tepat \r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakitcf`
--

CREATE TABLE `penyakitcf` (
  `kode_penyakitcf` varchar(5) NOT NULL,
  `penyakitcf` varchar(50) DEFAULT NULL,
  `keterangancf` text NOT NULL,
  `solusicf` text DEFAULT NULL,
  `gambarcf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyakitcf`
--

INSERT INTO `penyakitcf` (`kode_penyakitcf`, `penyakitcf`, `keterangancf`, `solusicf`, `gambarcf`) VALUES
('P1', 'Fusarium', 'Fusarium adalah penyakit yang disebabkan oleh jamur Fusarium spp. Penyakit ini dapat mempengaruhi berbagai bagian tanaman padi, termasuk akar, batang, dan bulir. Gejala yang umum terjadi adalah pembusukan akar, penurunan pertumbuhan tanaman, daun kuning, dan kehilangan hasil panen.', '1. Merenggangkan jarak tanaman\r\n2. Mencelupkan bibit ke dalam air campuran POCNASA\r\n3. Sebarkan GLIO di lahan', 'penyakit-layu-fusarium.jpg'),
('P2', 'Kresek Hawar Daun', 'Kresek hawar daun adalah penyakit yang disebabkan oleh bakteri Xanthomonas oryzae pv. oryzae. Gejala utama penyakit ini adalah adanya bercak-bercak kuning yang berbentuk V pada daun padi. Infeksi yang parah dapat menyebabkan kekuningan dan kemudian keringnya daun.', '1. Pengolahan tanah secara optimal\r\n2. Penanaman varietas unggul dari benih yang sehat\r\n3. Pengaturan jarak tanam\r\n4. Pemupukan berimbang dengan pemberian unsur N, P, K, dan unsur mikro\r\n5. Pengaturan sistem pengairan sesuai fase pertumbuhan tanaman\r\n6. Penyemprotan bakterisida sesuai anjuran yang efektif', 'cara-mengatasi-penyakit-kresek-pada-tanaman-padi.jpg'),
('P3', 'Batang busuk', 'Batang busuk adalah penyakit yang disebabkan oleh jamur Pyricularia oryzae. Infeksi jamur ini menyebabkan kerusakan pada batang tanaman padi. Gejala yang muncul meliputi bercak-bercak cokelat atau hitam pada batang, penurunan pertumbuhan, dan kerontokan malai.', '1. Penyemprotan dengan pestisida jenis fungisida yang berbahan aktif difenokonazol\r\n2. Pengelolaan air secara intermiten, jangan terlalu digenang\r\n3. Pemupukan yang berimbang, dengan pemberian unsur K(Kalium), dan N (Nitrogen) sesuai anjuran', 'batangbusuk.jpeg'),
('P4', 'Pelepah daun', 'Pelepah daun adalah penyakit yang disebabkan oleh jamur Cochliobolus miyabeanus. Penyakit ini mempengaruhi daun tanaman padi. Gejala awalnya adalah munculnya bercak-bercak cokelat pada pelepah daun, yang kemudian berkembang menjadi bercak berwarna krem atau putih dengan pinggiran merah kecokelatan.\r\n\r\n', '1. Pengaturan jarak tanaman tidak terlalu rapat\r\n2. Pemupukan berimbang\r\n3. Pengairan berselang\r\n4. Sanitasi sisa tanaman dan gulma di sekitar sawah', 'hawarpelepah.jpeg'),
('P5', 'Kerdil', 'Kerdil pada padi merupakan kompleks penyakit yang disebabkan oleh virus-virus tertentu, seperti Rice tungro virus (RTV) dan Rice ragged stunt virus (RRSV). Gejala yang terlihat termasuk pertumbuhan tanaman yang terhambat, daun menguning, pembentukan malai yang tidak sempurna, dan penurunan hasil panen.', '1. Menggunakan bibit unggul\r\n2. Membersihkan gulma disekitar tanaman padi\r\n3. Penyemprotan pestisida dan insektisida\r\n4. Bercocok tanam dengan tepat', 'kerdil.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_gejalacf` (`kode_gejalacf`),
  ADD KEY `kode_penyakitcf` (`kode_penyakitcf`);

--
-- Indeks untuk tabel `basispengetahuan`
--
ALTER TABLE `basispengetahuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_penyakit` (`kode_penyakit`),
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indeks untuk tabel `gejalacf`
--
ALTER TABLE `gejalacf`
  ADD PRIMARY KEY (`kode_gejalacf`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indeks untuk tabel `penyakitcf`
--
ALTER TABLE `penyakitcf`
  ADD PRIMARY KEY (`kode_penyakitcf`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `basispengetahuan`
--
ALTER TABLE `basispengetahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `aturan_ibfk_1` FOREIGN KEY (`kode_gejalacf`) REFERENCES `gejalacf` (`kode_gejalacf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aturan_ibfk_2` FOREIGN KEY (`kode_penyakitcf`) REFERENCES `penyakitcf` (`kode_penyakitcf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `basispengetahuan`
--
ALTER TABLE `basispengetahuan`
  ADD CONSTRAINT `basispengetahuan_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `penyakit` (`kode_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `basispengetahuan_ibfk_2` FOREIGN KEY (`kode_gejala`) REFERENCES `gejala` (`kode_gejala`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
