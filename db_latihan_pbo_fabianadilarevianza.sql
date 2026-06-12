-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2026 at 03:05 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_fabianadilarevianza`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(100) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('regular','imax','velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(20) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(100) DEFAULT NULL,
  `layanan_butler` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Agak Laen', '2026-06-13 10:00:00', 120, 35000.00, 'regular', 'Dolby Stereo', 'A-D', '-', '-', '-', '-'),
(2, 'Jumbo', '2026-06-13 12:30:00', 120, 35000.00, 'regular', 'Dolby Stereo', 'A-D', '-', '-', '-', '-'),
(3, 'Petualangan Sherina 2', '2026-06-13 15:00:00', 110, 40000.00, 'regular', 'Dolby Digital', 'A-E', '-', '-', '-', '-'),
(4, 'Siksa Kubur', '2026-06-13 17:30:00', 100, 40000.00, 'regular', 'Dolby Digital', 'B-F', '-', '-', '-', '-'),
(5, 'Ancika 1995', '2026-06-14 10:00:00', 115, 35000.00, 'regular', 'Dolby Stereo', 'A-D', '-', '-', '-', '-'),
(6, 'Ngeri-Ngeri Sedap', '2026-06-14 12:00:00', 120, 35000.00, 'regular', 'Dolby Stereo', 'A-D', '-', '-', '-', '-'),
(7, 'KKN di Desa Penari', '2026-06-14 14:30:00', 100, 40000.00, 'regular', 'Dolby Digital', 'C-F', '-', '-', '-', '-'),
(8, 'Avengers Endgame', '2026-06-13 11:00:00', 80, 75000.00, 'imax', 'IMAX Surround', 'A-H', '3D-IMAX-001', 'Getaran Kursi Premium', '-', '-'),
(9, 'Avatar The Way of Water', '2026-06-13 14:00:00', 80, 85000.00, 'imax', 'IMAX 12-Channel', 'A-H', '3D-IMAX-002', 'Efek Visual 3D Premium', '-', '-'),
(10, 'Interstellar', '2026-06-13 17:00:00', 75, 80000.00, 'imax', 'IMAX Surround', 'B-H', '3D-IMAX-003', 'Layar Lengkung IMAX', '-', '-'),
(11, 'Dune Part Two', '2026-06-13 20:00:00', 80, 85000.00, 'imax', 'IMAX 12-Channel', 'A-H', '3D-IMAX-004', 'Efek Suara Imersif', '-', '-'),
(12, 'Godzilla x Kong', '2026-06-14 11:00:00', 85, 75000.00, 'imax', 'IMAX Surround', 'A-I', '3D-IMAX-005', 'Efek Gerak Ringan', '-', '-'),
(13, 'Oppenheimer', '2026-06-14 15:00:00', 70, 80000.00, 'imax', 'IMAX 12-Channel', 'C-H', '3D-IMAX-006', 'Layar Resolusi Tinggi', '-', '-'),
(14, 'Top Gun Maverick', '2026-06-14 19:00:00', 80, 75000.00, 'imax', 'IMAX Surround', 'A-H', '3D-IMAX-007', 'Efek Suara Pesawat', '-', '-'),
(15, 'The Batman', '2026-06-13 13:00:00', 40, 120000.00, 'velvet', 'Dolby Atmos', 'Recliner A-C', '-', '-', 'Bantal dan Selimut Premium', 'Butler Service Minuman'),
(16, 'Fast X', '2026-06-13 16:00:00', 35, 125000.00, 'velvet', 'Dolby Atmos', 'Recliner A-C', '-', '-', 'Bantal dan Selimut Premium', 'Butler Service Makanan'),
(17, 'Mission Impossible', '2026-06-13 19:30:00', 35, 130000.00, 'velvet', 'Dolby Atmos', 'Recliner A-D', '-', '-', 'Luxury Comfort Pack', 'Butler Service Full'),
(18, 'Wonka', '2026-06-14 13:00:00', 40, 110000.00, 'velvet', 'Dolby Digital Plus', 'Recliner A-C', '-', '-', 'Soft Pillow Pack', 'Butler Service Snack'),
(19, 'La La Land', '2026-06-14 16:00:00', 30, 115000.00, 'velvet', 'Dolby Atmos', 'Recliner A-B', '-', '-', 'Couple Blanket Pack', 'Butler Service Premium'),
(20, 'Titanic', '2026-06-14 20:00:00', 35, 125000.00, 'velvet', 'Dolby Atmos', 'Recliner A-C', '-', '-', 'Bantal dan Selimut Eksklusif', 'Butler Service Minuman dan Snack');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
