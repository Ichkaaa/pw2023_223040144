-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Jun 2023 pada 14.25
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guest_stars`
--

CREATE TABLE `guest_stars` (
  `guest_star_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `guest_stars`
--

INSERT INTO `guest_stars` (`guest_star_id`, `name`, `description`, `gambar`) VALUES
(10, 'Lola Zieta', 'Lola adalah bentuk gabungan dari kecerdasan dan kecantikan, ketika ia memerankan cosplayer yang hampir beretelanjang dada banyak sekali cacian, hujatan dan pidato singkat melayang ke pada dirinya. Tentu kita melihat dari akun media sosialnya, Lola mendapatkan cibiran, semisal Hanya bermodal tete doang, cocok buat bacol nih.     Konten ini telah tayang di Kompasiana.com dengan judul &quot;Lola Zieta dan Objektifikasi Perempuan&quot;, Klik untuk baca: https://www.kompasiana.com/harislana/5c2e8c1b12ae9431914f2bc2/lola-zieta-dan-objektifikasi-perempuan  Kreator: Haris Fauzi    Kompasiana adalah platform blog. Konten ini menjadi tanggung jawab bloger dan tidak mewakili pandangan redaksi Kompas.  Tulis opini Anda seputar isu terkini di Kompasiana.com', '647bcfa0cdd2e.jpg'),
(11, ' Larissa Rochefort', 'Larissa Rochefort merupakan seorang diva cosplayer yang berhasil menembus level internasional. Namanya mulai dikenal luas usai dikontrak oleh team eSports Indonesia, NXL, sebagai brand ambassador, setelah penampilan memukaunya saat memvisualisasikan karakter Mercy dari Overwatch dan Yorha 2B dari Noer New Project.', '647bcfe18c6b4.jpg'),
(12, 'Punipun', 'sepuh', '647c6fd2f0e05.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merchandise`
--

CREATE TABLE `merchandise` (
  `id` int NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(10,3) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `stok` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `merchandise`
--

INSERT INTO `merchandise` (`id`, `gambar`, `nama`, `harga`, `deskripsi`, `stok`) VALUES
(5, '647f63ca9351f.jpg', 'SNK ', 40.000, 'Distro', 100),
(6, '647f642f6c9e6.jpg', 'Anifest Totebag', 25.000, 'Totebag Ekslusive', 100),
(7, '647f647551a1e.jpg', 'Anifest exlusive t-shirt', 95.000, 'Distro', 100),
(8, '647f64bbe1297.jpg', 'Anifest neko t-shirt', 75.000, 'T-Shirt distro', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `username`, `email`) VALUES
(1, NULL, 'ikasabila59@gmail.com'),
(2, NULL, 'lisvindanu@gmail.com'),
(3, NULL, 'ikasabila59@gmail.com'),
(4, NULL, 'lisvindanu@gmail.com'),
(5, 'lisvindanu', 'lisvindanu@gmail.com'),
(6, 'lisvindanu', 'lisvindanu@gmail.com'),
(8, 'ichka sabila', 'klmrekfk@gmail.com'),
(9, 'ichka sabila', 'klmrekfk@gmail.com'),
(10, 'ichka sabila', 'klmrekfk@gmail.com'),
(11, 'ichka sabila', 'klmrekfk@gmail.com'),
(12, 'ichka sabila', 'klmrekfk@gmail.com'),
(13, 'ichka sabila', 'zuhdi@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` int NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `harga` decimal(10,3) NOT NULL,
  `jumlah_tiket` int NOT NULL DEFAULT '0',
  `keterangan` varchar(255) DEFAULT NULL,
  `guest_star_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `gambar`, `jenis`, `harga`, `jumlah_tiket`, `keterangan`, `guest_star_id`) VALUES
(3, '647bba7b193e9.png', 'VVIP', 300.000, 201, 'ekslusif jilat paha lola zieta', 10),
(4, '647bcf33e95bf.png', 'VIP', 200.000, 100, 'Foto Bersama Guest Star Tertentu', 11),
(5, '648706b7d7b48.png', 'Standar', 70.000, 100, 'Tiket Standar', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'username tidak ada',
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role`) VALUES
(1, 'ichka@gmail.com', 'ichka sabila', '$2y$10$LucXXnMNkGfbqgn8C6mkael/7WrEyGbOiylHZNK2qFiviKw8wIpZu', 'admin'),
(7, 'caca@gmail.com', 'caca', '$2y$10$ZYmMpzOKZE.pccAx//GKguBmSmY.G33kjGMiAzv1QrhplWyJKuESe', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guest_stars`
--
ALTER TABLE `guest_stars`
  ADD PRIMARY KEY (`guest_star_id`);

--
-- Indeks untuk tabel `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guest_star_id` (`guest_star_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guest_stars`
--
ALTER TABLE `guest_stars`
  MODIFY `guest_star_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`guest_star_id`) REFERENCES `guest_stars` (`guest_star_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
