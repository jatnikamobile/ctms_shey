-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2020 at 05:29 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simrs-mcu`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama`) VALUES
(1, 'Islam'),
(2, 'Katolik'),
(3, 'Hindu'),
(4, 'Kristen'),
(5, 'Budha'),
(6, 'Konghuchu'),
(7, 'Lain-Lain');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa_kerja`
--

CREATE TABLE `diagnosa_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa_kerja`
--

INSERT INTO `diagnosa_kerja` (`id`, `nama`) VALUES
(1, 'POSITIF'),
(3, 'NEGATIF');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`) VALUES
(9, 'dr. Mukti A. Berlian, Sp. P. D.'),
(10, 'dr. Nunik Utami, Sp. MK');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id` int(11) NOT NULL,
  `kode` int(4) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `bagian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id`, `kode`, `nama`, `bagian`) VALUES
(10, 1113, 'RSAU', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kesimpulan`
--

CREATE TABLE `kesimpulan` (
  `id` int(11) NOT NULL,
  `id_registrasi` int(11) NOT NULL,
  `id_diagnosa_kerja` int(11) DEFAULT NULL,
  `isi_kesimpulan` varchar(255) DEFAULT NULL,
  `saran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kesimpulan`
--

INSERT INTO `kesimpulan` (`id`, `id_registrasi`, `id_diagnosa_kerja`, `isi_kesimpulan`, `saran`) VALUES
(2, 35, NULL, 'Scrotalis : Negativ, ', NULL),
(3, 1, NULL, 'RIWAYAT KESEHATAN KELUARGA : Ada, ', NULL),
(4, 2, NULL, '', NULL),
(5, 3, NULL, NULL, NULL),
(6, 4, NULL, 'RIWAYAT KESEHATAN KELUARGA : Hipertensi, KEBIASAAN : Merokok, ', NULL),
(7, 8, 2, 'RIWAYAT ALERGI : Ada, RIWAYAT KESEHATAN DULU : Diabetes, RIWAYAT KESEHATAN KELUARGA : Hipertensi dan Diabetes Melitus, Serumen : +/+, Conchae : Tidak Normal, Tiroid : Membesar, Mucosa Mulut : Stomatitis, Dinding : Asimetris, Dinding : Nyeri Tekan Epigastr', 'gak ada ah'),
(8, 9, 1, 'Pada semua pemeriksaan dalam batas normal', 'periksakan mata ke dokter mata'),
(9, 10, 2, 'KELUHAN UTAMA : SERING PUSING, RIWAYAT KESEHATAN DULU : ANEMIA, KEBIASAAN : OLAHRAGA, Kelopak Mata : Hordeolum, ', 'CEK SECARA BERKALA LABORATORIUM  SEPERTI PEMERIKSAAN CHOLESSTEROL, PERIKSA'),
(10, 6, NULL, 'RIWAYAT ALERGI : Ada, RIWAYAT KESEHATAN DULU : Hepatitis, RIWAYAT KESEHATAN KELUARGA : Diabetes Melitus, KEBIASAAN : Merokok, KACAMATA : Pakai, Kelopak Mata : Hordeolum, Konjungtiva : Anemis, Sklera : Icteric, Mata Juling : Juling Kiri, Mucosa Mulut : Sto', NULL),
(11, 11, NULL, '', NULL),
(12, 12, NULL, '', NULL),
(13, 13, NULL, 'RIWAYAT ALERGI : Ada, RIWAYAT KESEHATAN DULU : Operasi Usus Buntu, RIWAYAT KESEHATAN KELUARGA : Diabetes Melitus, KEBIASAAN : Olahraga, Konjungtiva : Anemis, Funduskopi : Tidak Normal, Membrane : Tidak Normal, Serumen : +/-, Septum Deviasi : Tidak Ada, Li', NULL),
(14, 14, NULL, '', NULL),
(15, 15, NULL, '', ''),
(16, 16, NULL, '', NULL),
(17, 17, 5, 'Aman', 'Jaga Kesehatan'),
(18, 18, NULL, '', NULL),
(19, 19, 3, '', 'Perbanyak makan buah buahan'),
(20, 20, 3, '', 'Jaga kondisi, jaga jarak dan selalu pake masker');

-- --------------------------------------------------------

--
-- Table structure for table `kop`
--

CREATE TABLE `kop` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kop`
--

INSERT INTO `kop` (`id`, `nama`, `alamat`, `telp`, `email`, `website`, `photo`) VALUES
(1, 'CTMS Klinik Pejaten', 'Jalan Merpati No.2 Halim Perdana Kusuma Jakarta Timur', '02180882817', 'itrsauantariska@gmail.com', 'www.rsauesnawan.com', 'logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `id` int(11) NOT NULL,
  `id_registrasi` int(11) NOT NULL,
  `hasil_pemeriksaan` varchar(255) DEFAULT 'Normal',
  `berkas_lab` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`id`, `id_registrasi`, `hasil_pemeriksaan`, `berkas_lab`) VALUES
(3, 35, 'Normal', NULL),
(4, 1, 'Normal', NULL),
(5, 1, 'Normal', NULL),
(6, 2, 'Normal', NULL),
(7, 2, 'Normal', NULL),
(8, 3, 'Normal', NULL),
(9, 3, 'Normal', NULL),
(10, 4, 'Normal', NULL),
(11, 4, 'Normal', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium_hematologi`
--

CREATE TABLE `laboratorium_hematologi` (
  `id` int(11) NOT NULL,
  `id_laboratorium` int(11) NOT NULL,
  `hemoglobin` varchar(255) DEFAULT NULL,
  `lekosit` varchar(255) DEFAULT NULL,
  `hematokrit` varchar(255) DEFAULT NULL,
  `trombosit` varchar(255) DEFAULT NULL,
  `eritrosit` varchar(255) DEFAULT NULL,
  `hj_basofil` varchar(255) DEFAULT NULL,
  `hj_eosinofil` varchar(255) DEFAULT NULL,
  `hj_neutrofil_batang` varchar(255) DEFAULT NULL,
  `hj_neutrofil_segment` varchar(255) DEFAULT NULL,
  `hj_limfosit` varchar(255) DEFAULT NULL,
  `hj_monosit` varchar(255) DEFAULT NULL,
  `led` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium_hematologi`
--

INSERT INTO `laboratorium_hematologi` (`id`, `id_laboratorium`, `hemoglobin`, `lekosit`, `hematokrit`, `trombosit`, `eritrosit`, `hj_basofil`, `hj_eosinofil`, `hj_neutrofil_batang`, `hj_neutrofil_segment`, `hj_limfosit`, `hj_monosit`, `led`) VALUES
(1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium_imunoserologi`
--

CREATE TABLE `laboratorium_imunoserologi` (
  `id` int(11) NOT NULL,
  `id_laboratorium` int(11) NOT NULL,
  `hbs_ag` varchar(255) DEFAULT 'Non Reaktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium_imunoserologi`
--

INSERT INTO `laboratorium_imunoserologi` (`id`, `id_laboratorium`, `hbs_ag`) VALUES
(1, 2, 'Non Reaktif'),
(2, 1, 'Non Reaktif'),
(3, 4, 'Non Reaktif'),
(4, 3, 'Non Reaktif'),
(5, 5, 'Non Reaktif'),
(6, 7, 'Non Reaktif'),
(7, 9, 'Non Reaktif'),
(8, 11, 'Non Reaktif'),
(9, 10, 'Non Reaktif'),
(10, 6, 'Non Reaktif');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium_kimia`
--

CREATE TABLE `laboratorium_kimia` (
  `id` int(11) NOT NULL,
  `id_laboratorium` int(11) NOT NULL,
  `faal_hati_sgot` varchar(255) DEFAULT NULL,
  `faal_hati_sgpt` varchar(255) DEFAULT NULL,
  `lemak_kolesterol_total` varchar(255) DEFAULT NULL,
  `lemak_trigliserida` varchar(255) DEFAULT NULL,
  `lemak_kolesterol_hdl` varchar(255) DEFAULT NULL,
  `lemak_kolesterol_ldl` varchar(255) DEFAULT NULL,
  `diabetes_glukosa_puasa` varchar(255) DEFAULT NULL,
  `diabetes_glukosa_2_jam` varchar(255) DEFAULT NULL,
  `diabetes_gamma_gt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium_kimia`
--

INSERT INTO `laboratorium_kimia` (`id`, `id_laboratorium`, `faal_hati_sgot`, `faal_hati_sgpt`, `lemak_kolesterol_total`, `lemak_trigliserida`, `lemak_kolesterol_hdl`, `lemak_kolesterol_ldl`, `diabetes_glukosa_puasa`, `diabetes_glukosa_2_jam`, `diabetes_gamma_gt`) VALUES
(1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium_narkoba`
--

CREATE TABLE `laboratorium_narkoba` (
  `id` int(11) NOT NULL,
  `id_laboratorium` int(11) NOT NULL,
  `methamphetamine` varchar(255) DEFAULT 'Negatif',
  `cocain` varchar(255) DEFAULT 'Negatif',
  `amphetamine` varchar(255) DEFAULT 'Negatif',
  `morphine` varchar(255) DEFAULT 'Negatif',
  `mariyuana` varchar(255) DEFAULT 'Negatif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium_narkoba`
--

INSERT INTO `laboratorium_narkoba` (`id`, `id_laboratorium`, `methamphetamine`, `cocain`, `amphetamine`, `morphine`, `mariyuana`) VALUES
(1, 2, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif'),
(2, 1, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif'),
(3, 4, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif'),
(4, 3, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif'),
(5, 5, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif'),
(6, 7, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif'),
(7, 9, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif'),
(8, 11, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif'),
(9, 10, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif'),
(10, 6, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium_urinalisa`
--

CREATE TABLE `laboratorium_urinalisa` (
  `id` int(11) NOT NULL,
  `id_laboratorium` int(11) NOT NULL,
  `ph` varchar(255) DEFAULT NULL,
  `berat_jenis` varchar(255) DEFAULT NULL,
  `protein` varchar(255) DEFAULT 'Negatif',
  `reduksi` varchar(255) DEFAULT 'Negatif',
  `bilirubin` varchar(255) DEFAULT 'Negatif',
  `urobilinogen` varchar(255) DEFAULT 'Positif',
  `nitrit` varchar(255) DEFAULT 'Negatif',
  `keton` varchar(255) DEFAULT 'Negatif',
  `darah` varchar(255) DEFAULT 'Negatif',
  `mk_leukosit` varchar(255) DEFAULT NULL,
  `mk_eritrosit` varchar(255) DEFAULT NULL,
  `mk_silender` varchar(255) DEFAULT 'Negatif',
  `mk_epithel` varchar(255) DEFAULT 'Positif',
  `mk_kristal` varchar(255) DEFAULT 'Negatif',
  `mk_lainlain` varchar(255) DEFAULT 'Negatif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium_urinalisa`
--

INSERT INTO `laboratorium_urinalisa` (`id`, `id_laboratorium`, `ph`, `berat_jenis`, `protein`, `reduksi`, `bilirubin`, `urobilinogen`, `nitrit`, `keton`, `darah`, `mk_leukosit`, `mk_eritrosit`, `mk_silender`, `mk_epithel`, `mk_kristal`, `mk_lainlain`) VALUES
(1, 2, '5', '1000', 'Negatif', 'Negatif', 'Negatif', 'Positif', 'Negatif', 'Negatif', 'Negatif', NULL, NULL, 'Negatif', 'Positif', 'Negatif', 'Negatif'),
(2, 1, '5', '1000', 'Negatif', 'Negatif', 'Negatif', 'Positif', 'Negatif', 'Negatif', 'Negatif', NULL, NULL, 'Negatif', 'Positif', 'Negatif', 'Negatif'),
(3, 4, '5', '1000', 'Negatif', 'Negatif', 'Negatif', 'Positif', 'Negatif', 'Negatif', 'Negatif', NULL, NULL, 'Negatif', 'Positif', 'Negatif', 'Negatif'),
(4, 3, '5', '1000', 'Negatif', 'Negatif', 'Negatif', 'Positif', 'Negatif', 'Negatif', 'Negatif', NULL, NULL, 'Negatif', 'Positif', 'Negatif', 'Negatif'),
(5, 5, NULL, NULL, 'Negatif', 'Negatif', 'Negatif', 'Positif', 'Negatif', 'Negatif', 'Negatif', NULL, NULL, 'Negatif', 'Positif', 'Negatif', 'Negatif'),
(6, 7, NULL, NULL, 'Negatif', 'Negatif', 'Negatif', 'Positif', 'Negatif', 'Negatif', 'Negatif', NULL, NULL, 'Negatif', 'Positif', 'Negatif', 'Negatif'),
(7, 9, NULL, NULL, 'Negatif', 'Negatif', 'Negatif', 'Positif', 'Negatif', 'Negatif', 'Negatif', NULL, NULL, 'Negatif', 'Positif', 'Negatif', 'Negatif'),
(8, 11, NULL, NULL, 'Negatif', 'Negatif', 'Negatif', 'Positif', 'Negatif', 'Negatif', 'Negatif', NULL, NULL, 'Negatif', 'Positif', 'Negatif', 'Negatif'),
(9, 10, NULL, NULL, 'Negatif', 'Negatif', 'Negatif', 'Positif', 'Negatif', 'Negatif', 'Negatif', NULL, NULL, 'Negatif', 'Positif', 'Negatif', 'Negatif'),
(10, 6, NULL, NULL, 'Negatif', 'Negatif', 'Negatif', 'Positif', 'Negatif', 'Negatif', 'Negatif', NULL, NULL, 'Negatif', 'Positif', 'Negatif', 'Negatif');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `nama`) VALUES
(8, 'PCR & Swab');

-- --------------------------------------------------------

--
-- Table structure for table `paket_pemeriksaan`
--

CREATE TABLE `paket_pemeriksaan` (
  `id` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `status_kesimpulan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_pemeriksaan`
--

INSERT INTO `paket_pemeriksaan` (`id`, `id_paket`, `id_pemeriksaan`, `status_kesimpulan`) VALUES
(1, 1, 1, ''),
(2, 1, 2, ''),
(3, 1, 3, ''),
(4, 1, 4, ''),
(5, 1, 5, ''),
(6, 4, 2, '1'),
(7, 4, 3, '1'),
(8, 4, 7, '1'),
(9, 1, 6, '0'),
(15, 2, 1, '0'),
(16, 3, 3, '0'),
(17, 3, 2, '0'),
(21, 6, 2, '0'),
(22, 7, 2, '1'),
(27, 8, 2, '1'),
(28, 8, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `paket_tindakan`
--

CREATE TABLE `paket_tindakan` (
  `id` int(11) NOT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `id_tindakan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_tindakan`
--

INSERT INTO `paket_tindakan` (`id`, `id_paket`, `id_tindakan`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `id_pasien_instansi` int(11) DEFAULT NULL,
  `id_pasien_unit` int(11) DEFAULT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `golongan_darah` varchar(10) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `status_kawin` varchar(255) DEFAULT NULL,
  `id_pasien_agama` varchar(11) DEFAULT NULL,
  `id_pasien_pekerjaan` varchar(11) DEFAULT NULL,
  `id_pasien_pendidikan` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `id_pasien_instansi`, `id_pasien_unit`, `nik`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `umur`, `jenis_kelamin`, `golongan_darah`, `no_telepon`, `status_kawin`, `id_pasien_agama`, `id_pasien_pekerjaan`, `id_pasien_pendidikan`) VALUES
(20, 10, 3, '197712072088', 'Anita', 'Jln', 'Bandung', '1989-06-27', NULL, 'Perempuan', 'B', '', 'kawin', '1', '4', '5');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama`) VALUES
(1, 'Pegawai Swasta'),
(2, 'Pelajar'),
(3, 'Mahasiswa'),
(4, 'PNS'),
(5, 'CPNS');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id` int(11) NOT NULL,
  `id_induk` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `status_bmi` int(11) DEFAULT NULL,
  `status_tekanan_darah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id`, `id_induk`, `nama`, `status_bmi`, `status_tekanan_darah`) VALUES
(1, NULL, 'TIME PCR SARS CoV 2', NULL, NULL),
(2, NULL, 'MOLEKULER', NULL, NULL),
(5, NULL, 'Audiometri', NULL, NULL),
(6, NULL, 'EKG', NULL, NULL),
(7, NULL, 'Treadmill', NULL, NULL),
(8, NULL, 'USG', NULL, NULL),
(22, 2, 'PCR SARS', NULL, NULL),
(32, 31, 'Hematologi', NULL, NULL),
(33, 31, 'Urinalisa', NULL, NULL),
(36, 34, 'Tekanan Darah', NULL, NULL),
(39, 37, 'Pemeriksaan', 3, NULL),
(43, 1, 'Pemeriksaan', NULL, NULL),
(44, NULL, 'REAL TIME PCR', NULL, NULL),
(46, 44, 'Pemeriksaan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_audiometry`
--

CREATE TABLE `pemeriksaan_audiometry` (
  `id` int(11) NOT NULL,
  `id_registrasi` int(11) NOT NULL,
  `l1000` int(11) DEFAULT NULL,
  `l4000` int(11) DEFAULT NULL,
  `r1000` int(11) DEFAULT NULL,
  `r4000` int(11) DEFAULT NULL,
  `selisih` int(11) DEFAULT NULL,
  `nih` varchar(255) DEFAULT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `kesimpulan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_audiometry`
--

INSERT INTO `pemeriksaan_audiometry` (`id`, `id_registrasi`, `l1000`, `l4000`, `r1000`, `r4000`, `selisih`, `nih`, `uraian`, `kesimpulan`) VALUES
(2, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_ekg`
--

CREATE TABLE `pemeriksaan_ekg` (
  `id` int(11) NOT NULL,
  `id_registrasi` int(11) NOT NULL,
  `hasil` varchar(255) DEFAULT NULL,
  `kesan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_ekg`
--

INSERT INTO `pemeriksaan_ekg` (`id`, `id_registrasi`, `hasil`, `kesan`) VALUES
(2, 35, NULL, NULL),
(3, 1, '', ''),
(4, 2, NULL, NULL),
(5, 3, NULL, NULL),
(6, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_fisik`
--

CREATE TABLE `pemeriksaan_fisik` (
  `id` int(11) NOT NULL,
  `id_registrasi` int(11) NOT NULL,
  `keluhan_utama` varchar(255) DEFAULT 'Tidak Ada',
  `riwayat_alergi` varchar(255) DEFAULT 'Tidak Ada',
  `riwayat_kesehatan_dulu` varchar(255) DEFAULT 'Tidak Ada',
  `riwayat_kesehatan_keluarga` varchar(255) DEFAULT 'Tidak Ada',
  `kebiasaan` varchar(255) DEFAULT 'Tidak Ada',
  `sistolik` int(11) DEFAULT NULL,
  `diastolik` int(11) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `golongan_darah` varchar(255) DEFAULT NULL,
  `buta_warna` varchar(255) DEFAULT NULL,
  `anamnesa` varchar(255) DEFAULT NULL,
  `nadi` varchar(255) DEFAULT NULL,
  `pernafasan` varchar(255) DEFAULT NULL,
  `suhu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_fisik`
--

INSERT INTO `pemeriksaan_fisik` (`id`, `id_registrasi`, `keluhan_utama`, `riwayat_alergi`, `riwayat_kesehatan_dulu`, `riwayat_kesehatan_keluarga`, `kebiasaan`, `sistolik`, `diastolik`, `tinggi_badan`, `berat_badan`, `golongan_darah`, `buta_warna`, `anamnesa`, `nadi`, `pernafasan`, `suhu`) VALUES
(3, 35, 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(4, 1, 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 100, 97, 150, 10, '', '', '', '', '', ''),
(5, 1, 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 2, 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 2, 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 3, 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 3, 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 4, 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 4, 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_fisik_abdomen`
--

CREATE TABLE `pemeriksaan_fisik_abdomen` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan_fisik` int(11) NOT NULL,
  `dinding` varchar(255) DEFAULT 'Normal',
  `hati` varchar(255) DEFAULT 'Normal',
  `limpa` varchar(255) DEFAULT 'Normal',
  `usus` varchar(255) DEFAULT 'Normal',
  `hernia` varchar(255) DEFAULT 'Normal',
  `scrotalis` varchar(255) DEFAULT 'Negativ'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_fisik_abdomen`
--

INSERT INTO `pemeriksaan_fisik_abdomen` (`id`, `id_pemeriksaan_fisik`, `dinding`, `hati`, `limpa`, `usus`, `hernia`, `scrotalis`) VALUES
(1, 2, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Negativ'),
(2, 1, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Negativ'),
(3, 4, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Negativ'),
(4, 3, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Negativ'),
(5, 5, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Negativ'),
(6, 7, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Negativ'),
(7, 9, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Negativ'),
(8, 11, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Negativ'),
(9, 10, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Negativ'),
(10, 6, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Negativ');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_fisik_hidung`
--

CREATE TABLE `pemeriksaan_fisik_hidung` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan_fisik` int(11) NOT NULL,
  `bentuk_hidung` varchar(255) DEFAULT 'Normal',
  `septum_deviasi` varchar(255) DEFAULT 'Tidak Ada',
  `conchae` varchar(255) DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_fisik_hidung`
--

INSERT INTO `pemeriksaan_fisik_hidung` (`id`, `id_pemeriksaan_fisik`, `bentuk_hidung`, `septum_deviasi`, `conchae`) VALUES
(1, 2, 'Normal', 'Tidak Ada', 'Normal'),
(2, 1, 'Normal', 'Tidak Ada', 'Normal'),
(3, 4, 'Normal', 'Tidak Ada', 'Normal'),
(4, 3, 'Normal', 'Tidak Ada', 'Normal'),
(5, 5, 'Normal', 'Tidak Ada', 'Normal'),
(6, 7, 'Normal', 'Tidak Ada', 'Normal'),
(7, 9, 'Normal', 'Tidak Ada', 'Normal'),
(8, 11, 'Normal', 'Tidak Ada', 'Normal'),
(9, 10, 'Normal', 'Tidak Ada', 'Normal'),
(10, 6, 'Normal', 'Tidak Ada', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_fisik_leher`
--

CREATE TABLE `pemeriksaan_fisik_leher` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan_fisik` int(11) NOT NULL,
  `tiroid` varchar(255) DEFAULT 'Tidak Teraba',
  `limfonoid` varchar(255) DEFAULT 'Tidak Teraba',
  `tenggorokan` varchar(255) DEFAULT 'Normal',
  `tonsil` varchar(255) DEFAULT 'Normal',
  `faring` varchar(255) DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_fisik_leher`
--

INSERT INTO `pemeriksaan_fisik_leher` (`id`, `id_pemeriksaan_fisik`, `tiroid`, `limfonoid`, `tenggorokan`, `tonsil`, `faring`) VALUES
(1, 2, 'Tidak Teraba', 'Tidak Teraba', 'Normal', 'Normal', 'Normal'),
(2, 1, 'Tidak Teraba', 'Tidak Teraba', 'Normal', 'Normal', 'Normal'),
(3, 4, 'Tidak Teraba', 'Tidak Teraba', 'Normal', 'Normal', 'Normal'),
(4, 3, 'Tidak Teraba', 'Tidak Teraba', 'Normal', 'Normal', 'Normal'),
(5, 5, 'Tidak Teraba', 'Tidak Teraba', 'Normal', 'Normal', 'Normal'),
(6, 7, 'Tidak Teraba', 'Tidak Teraba', 'Normal', 'Normal', 'Normal'),
(7, 9, 'Tidak Teraba', 'Tidak Teraba', 'Normal', 'Normal', 'Normal'),
(8, 11, 'Tidak Teraba', 'Tidak Teraba', 'Normal', 'Normal', 'Normal'),
(9, 10, 'Tidak Teraba', 'Tidak Teraba', 'Normal', 'Normal', 'Normal'),
(10, 6, 'Tidak Teraba', 'Tidak Teraba', 'Normal', 'Normal', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_fisik_manufer_ekstremitas`
--

CREATE TABLE `pemeriksaan_fisik_manufer_ekstremitas` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan_fisik` int(11) NOT NULL,
  `kekuatan` varchar(255) DEFAULT 'Normal',
  `varises` varchar(255) DEFAULT 'Normal',
  `reflek_fisiologis` varchar(255) DEFAULT 'Normal',
  `reflek_patologis` varchar(255) DEFAULT 'Normal',
  `lainlain` varchar(255) DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_fisik_manufer_ekstremitas`
--

INSERT INTO `pemeriksaan_fisik_manufer_ekstremitas` (`id`, `id_pemeriksaan_fisik`, `kekuatan`, `varises`, `reflek_fisiologis`, `reflek_patologis`, `lainlain`) VALUES
(1, 2, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal'),
(2, 1, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal'),
(3, 4, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal'),
(4, 3, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal'),
(5, 5, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal'),
(6, 7, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal'),
(7, 9, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal'),
(8, 11, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal'),
(9, 10, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal'),
(10, 6, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_fisik_mata`
--

CREATE TABLE `pemeriksaan_fisik_mata` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan_fisik` int(11) NOT NULL,
  `kacamata` varchar(255) DEFAULT 'Tidak Pakai',
  `kelopak_mata` varchar(255) DEFAULT 'Normal',
  `konjungtiva` varchar(255) DEFAULT 'Normal',
  `sklera` varchar(255) DEFAULT 'Normal',
  `pupil` varchar(255) DEFAULT 'Isokor',
  `buta_warna` varchar(255) DEFAULT 'Normal',
  `refraksi` varchar(255) DEFAULT 'Normal',
  `addisi` varchar(255) DEFAULT 'Normal',
  `funduskopi` varchar(255) DEFAULT 'Normal',
  `tekanan_bola` varchar(255) DEFAULT 'Normal',
  `mata_juling` varchar(255) DEFAULT 'Normal',
  `tonometri` varchar(255) DEFAULT '8/7.5 (ODS)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_fisik_mata`
--

INSERT INTO `pemeriksaan_fisik_mata` (`id`, `id_pemeriksaan_fisik`, `kacamata`, `kelopak_mata`, `konjungtiva`, `sklera`, `pupil`, `buta_warna`, `refraksi`, `addisi`, `funduskopi`, `tekanan_bola`, `mata_juling`, `tonometri`) VALUES
(1, 2, 'Tidak Pakai', 'Normal', 'Normal', 'Normal', 'Isokor', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '8/7.5 (ODS)'),
(2, 1, 'Pakai', 'Normal', 'Normal', 'Normal', 'Isokor', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '8/7.5 (ODS)'),
(3, 4, 'Tidak Pakai', 'Hordeolum', 'Lain-lain', 'Normal', 'Isokor', 'Total', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '8/7.5 (ODS)'),
(4, 3, 'Tidak Pakai', 'Normal', 'Normal', 'Normal', 'Isokor', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '8/7.5 (ODS)'),
(5, 5, 'Tidak Pakai', 'Normal', 'Normal', 'Normal', 'Isokor', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '8/7.5 (ODS)'),
(6, 7, 'Tidak Pakai', 'Normal', 'Normal', 'Normal', 'Isokor', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '8/7.5 (ODS)'),
(7, 9, 'Tidak Pakai', 'Normal', 'Normal', 'Normal', 'Isokor', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '8/7.5 (ODS)'),
(8, 11, 'Tidak Pakai', 'Normal', 'Normal', 'Normal', 'Isokor', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '8/7.5 (ODS)'),
(9, 10, 'Tidak Pakai', 'Normal', 'Normal', 'Normal', 'Isokor', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '8/7.5 (ODS)'),
(10, 6, 'Tidak Pakai', 'Normal', 'Normal', 'Normal', 'Isokor', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '8/7.5 (ODS)');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_fisik_mulut`
--

CREATE TABLE `pemeriksaan_fisik_mulut` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan_fisik` int(11) NOT NULL,
  `mucosa_mulut` varchar(255) DEFAULT 'Normal',
  `kelainan_gigi` varchar(255) DEFAULT 'Tidak ada Kelainan',
  `lidah` varchar(255) DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_fisik_mulut`
--

INSERT INTO `pemeriksaan_fisik_mulut` (`id`, `id_pemeriksaan_fisik`, `mucosa_mulut`, `kelainan_gigi`, `lidah`) VALUES
(1, 2, 'Normal', 'Tidak ada Kelainan', 'Normal'),
(2, 1, 'Normal', 'Tidak ada Kelainan', 'Normal'),
(3, 4, 'Normal', 'Tidak ada Kelainan', 'Normal'),
(4, 3, 'Normal', 'Tidak ada Kelainan', 'Normal'),
(5, 5, 'Normal', 'Tidak ada Kelainan', 'Normal'),
(6, 7, 'Normal', 'Tidak ada Kelainan', 'Normal'),
(7, 9, 'Normal', 'Tidak ada Kelainan', 'Normal'),
(8, 11, 'Normal', 'Tidak ada Kelainan', 'Normal'),
(9, 10, 'Normal', 'Tidak ada Kelainan', 'Normal'),
(10, 6, 'Normal', 'Tidak ada Kelainan', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_fisik_telinga`
--

CREATE TABLE `pemeriksaan_fisik_telinga` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan_fisik` int(11) NOT NULL,
  `bentuk_telinga` varchar(255) DEFAULT 'Normal',
  `membrane` varchar(255) DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_fisik_telinga`
--

INSERT INTO `pemeriksaan_fisik_telinga` (`id`, `id_pemeriksaan_fisik`, `bentuk_telinga`, `membrane`) VALUES
(1, 2, 'Normal', 'Normal'),
(2, 1, 'Normal', 'Normal'),
(3, 4, 'Normal', 'Normal'),
(4, 3, 'Normal', 'Normal'),
(5, 5, 'Normal', 'Normal'),
(6, 7, 'Normal', 'Normal'),
(7, 9, 'Normal', 'Normal'),
(8, 11, 'Normal', 'Normal'),
(9, 10, 'Normal', 'Normal'),
(10, 6, 'Normal', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_fisik_thorax`
--

CREATE TABLE `pemeriksaan_fisik_thorax` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan_fisik` int(11) NOT NULL,
  `dinding` varchar(255) DEFAULT 'Simetris',
  `paru_paru` varchar(255) DEFAULT 'Vesikuler',
  `jantung` varchar(255) DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_fisik_thorax`
--

INSERT INTO `pemeriksaan_fisik_thorax` (`id`, `id_pemeriksaan_fisik`, `dinding`, `paru_paru`, `jantung`) VALUES
(1, 2, 'Simetris', 'Vesikuler', 'Normal'),
(2, 1, 'Simetris', 'Vesikuler', 'Normal'),
(3, 4, 'Simetris', 'Vesikuler', 'Normal'),
(4, 3, 'Simetris', 'Vesikuler', 'Normal'),
(5, 5, 'Simetris', 'Vesikuler', 'Normal'),
(6, 7, 'Simetris', 'Vesikuler', 'Normal'),
(7, 9, 'Simetris', 'Vesikuler', 'Normal'),
(8, 11, 'Simetris', 'Vesikuler', 'Normal'),
(9, 10, 'Simetris', 'Vesikuler', 'Normal'),
(10, 6, 'Simetris', 'Vesikuler', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_fisik_timpani`
--

CREATE TABLE `pemeriksaan_fisik_timpani` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan_fisik` int(11) NOT NULL,
  `serumen` varchar(255) DEFAULT '-/-',
  `lainlain` varchar(255) DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_fisik_timpani`
--

INSERT INTO `pemeriksaan_fisik_timpani` (`id`, `id_pemeriksaan_fisik`, `serumen`, `lainlain`) VALUES
(1, 2, '-/-', 'Normal'),
(2, 1, '-/-', 'Normal'),
(3, 4, '-/-', 'Normal'),
(4, 3, '-/-', 'Normal'),
(5, 5, '-/-', 'Normal'),
(6, 7, '-/-', 'Normal'),
(7, 9, '-/-', 'Normal'),
(8, 11, '-/-', 'Normal'),
(9, 10, '-/-', 'Normal'),
(10, 6, '-/-', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_rincian`
--

CREATE TABLE `pemeriksaan_rincian` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `id_induk` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `append` varchar(255) DEFAULT NULL,
  `rincian_jenis` int(11) NOT NULL DEFAULT 1,
  `default_value` varchar(255) DEFAULT NULL,
  `nilai_rujukan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_rincian`
--

INSERT INTO `pemeriksaan_rincian` (`id`, `id_pemeriksaan`, `id_induk`, `nama`, `append`, `rincian_jenis`, `default_value`, `nilai_rujukan`) VALUES
(14, 9, NULL, 'KACAMATA', NULL, 1, NULL, NULL),
(18, 9, NULL, 'Kelopak Mata', NULL, 1, NULL, NULL),
(22, 9, NULL, 'Konjungtiva', NULL, 1, NULL, NULL),
(23, 9, NULL, 'Sklera', NULL, 1, NULL, NULL),
(24, 9, NULL, 'Pupil', NULL, 1, NULL, NULL),
(25, 9, NULL, 'Buta Warna', NULL, 1, NULL, NULL),
(26, 9, NULL, 'Refraksi', NULL, 1, NULL, NULL),
(27, 9, NULL, 'Addisi', NULL, 1, NULL, NULL),
(28, 9, NULL, 'Funduskopi', NULL, 1, NULL, NULL),
(29, 9, NULL, 'Tekanan Bola', NULL, 1, NULL, NULL),
(31, 9, NULL, 'Mata Juling', NULL, 1, NULL, NULL),
(32, 9, NULL, 'Tonometri', NULL, 1, NULL, NULL),
(33, 10, NULL, 'Bentuk Telinga', NULL, 1, NULL, NULL),
(34, 10, NULL, 'Membrane', NULL, 1, NULL, NULL),
(35, 11, NULL, 'Serumen', NULL, 1, NULL, NULL),
(36, 11, NULL, 'Lain - Lain', NULL, 1, NULL, NULL),
(37, 12, NULL, 'Bentuk Hidung', NULL, 1, NULL, NULL),
(38, 12, NULL, 'Septum Deviasi', NULL, 1, NULL, NULL),
(39, 12, NULL, 'Conchae', NULL, 1, NULL, NULL),
(40, 13, NULL, 'Tiroid', NULL, 1, NULL, NULL),
(41, 13, NULL, 'Limfonoid', NULL, 1, NULL, NULL),
(43, 13, NULL, 'Tenggorokan', NULL, 1, NULL, NULL),
(44, 13, NULL, 'Tonsil', NULL, 1, NULL, NULL),
(45, 13, NULL, 'Faring', NULL, 1, NULL, NULL),
(46, 14, NULL, 'Mucosa Mulut', NULL, 1, NULL, NULL),
(47, 14, NULL, 'Kelainan Gigi', NULL, 1, NULL, NULL),
(48, 14, NULL, 'Lidah', NULL, 1, NULL, NULL),
(49, 15, NULL, 'Dinding', NULL, 1, NULL, NULL),
(50, 15, NULL, 'Paru Paru', NULL, 1, NULL, NULL),
(51, 15, NULL, 'Jantung', NULL, 1, NULL, NULL),
(52, 16, NULL, 'Dinding', NULL, 1, NULL, NULL),
(53, 16, NULL, 'Hati', NULL, 1, NULL, NULL),
(54, 16, NULL, 'Limpa', NULL, 1, NULL, NULL),
(55, 16, NULL, 'Usus', NULL, 1, NULL, NULL),
(56, 16, NULL, 'Hernia', NULL, 1, NULL, NULL),
(57, 16, NULL, 'Scrotalis', NULL, 1, NULL, NULL),
(59, 17, NULL, 'Kekuatan', NULL, 1, NULL, NULL),
(60, 17, NULL, 'Varises', NULL, 1, NULL, NULL),
(61, 17, NULL, 'Reflek Fisiologis', NULL, 1, NULL, NULL),
(62, 17, NULL, 'Reflek Patologis', NULL, 1, NULL, NULL),
(63, 17, NULL, 'Lain - Lain', NULL, 1, NULL, NULL),
(65, 22, 175, 'PCR SARS CoV-2', NULL, 1, NULL, 'Tidak Terdeteksi (Negatif)'),
(72, 22, 176, 'Basofil', '%', 2, NULL, '0 - 1%'),
(73, 22, 176, 'Eosinofil', '%', 2, NULL, '2 - 4%'),
(74, 22, 176, 'Neutrofil Batang', '%', 2, NULL, '3 - 5%'),
(75, 22, 176, 'Neutrofil Segment', '%', 2, NULL, '50 - 70%'),
(76, 22, 176, 'Limfosit', '%', 2, NULL, '25 - 40%'),
(77, 22, 176, 'Monosit', '%', 2, NULL, '2 - 8%'),
(78, 23, NULL, 'Hbs Ag', NULL, 1, NULL, NULL),
(79, 24, NULL, 'Faal Hati', NULL, 3, NULL, NULL),
(81, 24, NULL, 'Profil Lemak', 'mg/dL', 3, NULL, NULL),
(85, 24, 79, 'SGOT', 'u/l', 2, NULL, 'P: 10-50 u/l W: 10-35 u/l'),
(86, 24, 79, 'SGPT', 'u/l', 2, NULL, 'P: 10-50 u/l W: 10-35 u/l'),
(87, 24, 81, 'Kolesterol Total', 'mg/dL', 2, NULL, '< 200 mg/dl'),
(88, 24, 81, 'Trigliserida', 'mg/dL', 2, NULL, '<200 mg/dl'),
(89, 24, 81, 'Kolesterol HDL', 'mg/dL', 2, NULL, '<200 mg/dl'),
(90, 24, 81, 'Kolesterol LDL', 'mg/dL', 2, NULL, '< 140 mg/dl'),
(91, 24, NULL, 'Diabetes', NULL, 3, NULL, NULL),
(92, 24, 91, 'Glukosa Puasa', 'mg/dL', 2, NULL, '80 - 100 mg/dl'),
(93, 24, 91, 'Glukosa 2 Jam PP', 'mg/dL', 2, NULL, '< 120 mg/dl'),
(94, 24, 91, 'Gamma GT', 'u/l', 2, NULL, '5-38 u/l'),
(95, 26, NULL, 'Urin Lengkap', NULL, 3, NULL, NULL),
(96, 26, 95, 'PH', NULL, 2, NULL, '5.0 - 6.0'),
(97, 26, 95, 'Berat Jenis', NULL, 2, NULL, '1000 - 1030'),
(98, 26, 95, 'Protein', NULL, 2, 'Negatif', 'Negatif'),
(99, 26, 95, 'Reduksi', NULL, 2, 'Negatif', 'Negatif'),
(100, 26, 95, 'Bilirubin', NULL, 2, 'Negatif', 'Negatif'),
(101, 26, 95, 'Urobilinogen', NULL, 2, 'Positif', 'Positif'),
(103, 26, 95, 'Nitrit', NULL, 2, 'Negatif', 'Negatif'),
(104, 26, 95, 'Keton', NULL, 2, 'Negatif', 'Negatif'),
(105, 26, 95, 'Darah', NULL, 2, 'Negatif', 'Negatif'),
(106, 26, 95, 'Mikroskopis', NULL, 3, NULL, NULL),
(107, 26, 106, 'Leukosit', '/LPB', 2, NULL, '1-5 /LPB'),
(108, 26, 106, 'Eritrosit', '/LPB', 2, NULL, '0-1/LPB'),
(109, 26, 106, 'Silender', NULL, 2, 'Negatif', 'Negatif'),
(110, 26, 106, 'Ephitel', NULL, 2, 'Positif', 'Positif'),
(111, 26, 106, 'Kristal', NULL, 2, 'Negatif', 'Negatif'),
(112, 26, 106, 'Lain - Lain', NULL, 2, 'Negatif', 'Negatif'),
(113, 27, NULL, 'Methamphetamine', NULL, 1, NULL, 'Negatif'),
(114, 27, NULL, 'Cocain', NULL, 1, NULL, 'Negatif'),
(115, 27, NULL, 'Amphetamine', NULL, 1, NULL, 'Negatif'),
(116, 27, NULL, 'Morphine', NULL, 1, NULL, 'Negatif'),
(117, 27, NULL, 'Mariyuana', NULL, 1, NULL, 'Negatif'),
(119, 3, NULL, 'COR', NULL, 2, 'Normal', NULL),
(120, 3, NULL, 'PULMO', NULL, 2, 'Normal', NULL),
(121, 3, NULL, 'Sinus & Diafragma', NULL, 2, 'Normal', NULL),
(122, 3, NULL, 'Tulang Dan Jaringan Lunak', NULL, 2, 'Normal', NULL),
(123, 3, NULL, 'Hasil Pemeriksaan', NULL, 2, 'Normal', NULL),
(124, 4, NULL, 'Hasil', NULL, 2, 'Normal', NULL),
(125, 4, NULL, 'Kesimpulan', NULL, 2, 'Normal', NULL),
(126, 5, NULL, 'L1000', NULL, 2, NULL, NULL),
(127, 5, NULL, 'L4000', NULL, 2, NULL, NULL),
(128, 5, NULL, 'R1000', NULL, 2, NULL, NULL),
(129, 5, NULL, 'R4000', NULL, 2, NULL, NULL),
(130, 5, NULL, 'Selisih', NULL, 2, NULL, NULL),
(131, 5, NULL, 'Nih', NULL, 2, NULL, NULL),
(132, 5, NULL, 'Uraian', NULL, 2, NULL, NULL),
(133, 5, NULL, 'Kesimpulan', NULL, 2, NULL, NULL),
(134, 6, NULL, 'Hasil', NULL, 2, NULL, NULL),
(135, 6, NULL, 'Kesan', NULL, 2, NULL, NULL),
(136, 8, NULL, 'Hati', NULL, 2, NULL, NULL),
(137, 8, NULL, 'K.G.B', NULL, 1, NULL, NULL),
(139, 8, NULL, 'Empedu', NULL, 2, NULL, NULL),
(140, 8, NULL, 'Limpa', NULL, 2, NULL, NULL),
(141, 8, NULL, 'Pankreas', NULL, 2, NULL, NULL),
(142, 8, NULL, 'Ginjal', NULL, 2, NULL, NULL),
(143, 8, NULL, 'Kemih', NULL, 2, NULL, NULL),
(144, 8, NULL, 'Lain - Lain', NULL, 2, NULL, NULL),
(145, 8, NULL, 'Kesimpulan', NULL, 2, 'Abnormal', NULL),
(146, 7, NULL, 'Metode', NULL, 2, NULL, NULL),
(147, 7, NULL, 'Jantung', NULL, 1, NULL, NULL),
(148, 7, NULL, 'Klasifikasi Fitness Poor', 'Mets', 2, NULL, NULL),
(149, 7, NULL, 'Klasifikasi Fitness Fair', 'Mets', 2, NULL, NULL),
(150, 7, NULL, 'Klasifikasi Fitness Average', 'Mets', 2, NULL, NULL),
(151, 7, NULL, 'Klasifikasi Fitness Good', 'Mets', 2, NULL, NULL),
(152, 7, NULL, 'Klasifikasi Fitness Excelent', 'Mets', 2, NULL, NULL),
(153, 7, NULL, 'Klasifikasi Fungsional 1', NULL, 2, NULL, NULL),
(154, 7, NULL, 'Klasifikasi Fungsional 2', NULL, 2, NULL, NULL),
(155, 7, NULL, 'Klasifikasi Fungsional 3', NULL, 2, NULL, NULL),
(156, 7, NULL, 'Stop Treadmill', NULL, 2, NULL, NULL),
(157, 7, NULL, 'Resume Hasil', NULL, 2, 'Abnormal', NULL),
(158, 7, NULL, 'Denyut Nadi Awal', NULL, 2, NULL, NULL),
(159, 7, NULL, 'Denyut Nadi Akhir', NULL, 2, NULL, NULL),
(160, 7, NULL, 'Tekanan Darah Awal', NULL, 3, NULL, NULL),
(163, 7, NULL, 'Tekanan Darah Akhir', NULL, 3, NULL, NULL),
(166, 7, NULL, 'MAX', 'HR', 2, NULL, NULL),
(167, 7, NULL, 'Submax', 'HR', 2, NULL, NULL),
(168, 28, NULL, 'Tinggi Badan', 'Cm', 2, NULL, NULL),
(169, 28, NULL, 'Berat Badan', 'Kg', 2, NULL, NULL),
(170, 29, NULL, 'SISTOLIK', '/', 2, NULL, NULL),
(171, 29, NULL, 'DIASTOLIK', 'mmHg', 2, NULL, NULL),
(173, 3, NULL, 'Dokter Pemeriksa', NULL, 5, NULL, NULL),
(174, 4, NULL, 'Lampiran', NULL, 4, NULL, NULL),
(175, 22, NULL, '', NULL, 3, NULL, NULL),
(180, 2, NULL, 'Dokter Pemeriksa', NULL, 5, NULL, NULL),
(182, 1, NULL, 'Dokter Pemeriksa', NULL, 5, NULL, NULL),
(183, 30, NULL, 'Hbs Ag', NULL, 1, NULL, 'Non Reaktif'),
(184, 31, NULL, 'Hasil Pemeriksaan', NULL, 1, NULL, NULL),
(185, 31, NULL, 'Dokter Pemeriksa', NULL, 5, NULL, NULL),
(186, 31, NULL, 'Nama Pemeriksa', NULL, 6, NULL, NULL),
(187, 32, NULL, 'Darah Rutin', NULL, 3, NULL, NULL),
(189, 32, 187, 'Hemoglobin', NULL, 2, NULL, 'P 13,2 - 17,3 W 11,7 - 15,5 gr/dl'),
(190, 32, 187, 'Hematokrit', NULL, 2, NULL, 'P: 40 - 52% W: 35 - 47%'),
(191, 32, 187, 'Lekosit', NULL, 2, NULL, 'P: 3800 - 10600 W: 3600 - 11000/mm3'),
(192, 32, 187, 'Trombosit', NULL, 2, NULL, '150 - 440 ribu/mm3'),
(193, 32, 187, 'Eritrosit', NULL, 2, NULL, 'P: 4,5 - 5,5 juta/mm3 W: 4,0 - 5,2 juta/mm3'),
(194, 32, 187, 'LED', NULL, 2, NULL, 'P: < 15, W <20 mm/jam'),
(195, 33, NULL, 'Urine Rutin', NULL, 1, NULL, NULL),
(196, 33, 195, 'Protein', NULL, 2, 'Negatif', 'Negatif'),
(197, 3, 173, 'Lampiran', NULL, 4, NULL, NULL),
(198, 33, 195, 'Glukosa', NULL, 2, 'Negatif', 'Negatif'),
(199, 33, 195, 'Bilirubin', NULL, 2, 'Negatif', 'Negatif'),
(200, 33, 195, 'Urobilin', NULL, 2, 'Negatif', 'Negatif'),
(201, 34, NULL, 'KELUHAN UTAMA', NULL, 2, 'Tidak Ada', NULL),
(202, 34, NULL, 'RIWAYAT ALERGI', NULL, 2, 'Tidak Ada', NULL),
(203, 34, NULL, 'RIWAYAT KESEHATAN DULU', NULL, 2, 'Tidak Ada', NULL),
(204, 34, NULL, 'RIWAYAT KESEHATAN KELUARGA', NULL, 2, 'Tidak Ada', NULL),
(205, 34, NULL, 'KEBIASAAN', NULL, 2, 'Tidak Ada', NULL),
(206, 34, NULL, 'Dokter Pemeriksa', NULL, 5, NULL, NULL),
(207, 35, NULL, 'Tinggi Badan', NULL, 2, NULL, NULL),
(208, 35, NULL, 'Berat Badan', NULL, 2, NULL, NULL),
(209, 36, NULL, 'SISTOLIK', NULL, 2, NULL, NULL),
(210, 36, NULL, 'DIASTOLIK', NULL, 2, NULL, NULL),
(211, 39, NULL, 'Pemeriksaan', '1', 2, '-', 'Tidak'),
(212, 39, NULL, 'HASIL', '2', 2, '-', NULL),
(213, 39, NULL, 'Nilai Rujukan', NULL, 2, 'Tidak terdeteksi (Negatif)', NULL),
(214, 37, NULL, 'Pemeriksaan Swab', NULL, 3, NULL, NULL),
(216, 39, NULL, 'Keterangan :', NULL, 2, NULL, '- Hasil di atas hanya menggambarkan kondisi pada saat pengambilan sampel \r\n- Hasil negatif belum dapat menyingkirkan kemungkinan adanya infeksi SARS CoV-2\r\n- Bila Positif Lakukan isolasi mandiri dan terpantau\r\n- Tetap Melakukan “MASTAGAR” (Gunakan masker, cuci tangan sesering mungkin dengan sabun atau handrub, jaga jarak dan hindari keramaian serta berperilaku sehat)\r\n- Bila ada keluhan konsultasikan dengan dokter keluarga anda atau klinik kesehatan/RS terdekat\r\n'),
(218, 39, 211, 'HASIL', NULL, 1, NULL, NULL),
(221, 43, NULL, 'Tanggal Pengambilan Spesimen', NULL, 2, NULL, NULL),
(222, 43, NULL, 'Jenis Spesimen', NULL, 2, NULL, NULL),
(223, 43, NULL, 'Hasil Pemeriksaan', NULL, 1, NULL, NULL),
(235, 46, NULL, 'Tanggal Pengambilan Spesimen', NULL, 2, NULL, NULL),
(236, 46, NULL, 'Jenis Spesimen', NULL, 2, NULL, NULL),
(237, 46, NULL, 'Hasil Pemeriksaan', NULL, 1, NULL, NULL),
(241, 46, 237, 'Dokter Pemeriksa', NULL, 5, NULL, NULL),
(242, 46, 237, 'Diperiksa Oleh ', NULL, 6, NULL, NULL),
(249, 47, NULL, 'Tangal Pengambilan Spesimen', NULL, 2, NULL, NULL),
(250, 47, NULL, 'Jenis Spesimen', NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_rincian_hasil`
--

CREATE TABLE `pemeriksaan_rincian_hasil` (
  `id` int(11) NOT NULL,
  `id_registrasi` int(11) NOT NULL,
  `id_pemeriksaan_rincian` int(11) NOT NULL,
  `jawaban` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_rincian_hasil`
--

INSERT INTO `pemeriksaan_rincian_hasil` (`id`, `id_registrasi`, `id_pemeriksaan_rincian`, `jawaban`) VALUES
(1, 1, 1, 'Tidak Ada'),
(2, 1, 2, 'Tidak Ada'),
(3, 1, 3, 'Tidak Ada'),
(4, 1, 4, 'Ada'),
(5, 1, 5, 'Tidak Ada'),
(6, 1, 168, '170'),
(7, 1, 169, '200'),
(8, 1, 170, '150'),
(9, 1, 171, '79'),
(10, 1, 65, '1'),
(11, 1, 66, '2'),
(12, 1, 68, '3'),
(13, 1, 69, '4'),
(14, 1, 70, '5'),
(15, 1, 71, '6'),
(16, 1, 72, '7'),
(17, 1, 73, '8'),
(18, 1, 74, '9'),
(19, 1, 75, '10'),
(20, 1, 76, '11'),
(21, 1, 77, '12'),
(22, 1, 85, '1'),
(23, 1, 86, '2'),
(24, 1, 87, '3'),
(25, 1, 88, '4'),
(26, 1, 89, '5'),
(27, 1, 90, '6'),
(28, 1, 92, '7'),
(29, 1, 93, '8'),
(30, 1, 94, '9'),
(31, 1, 96, '1'),
(32, 1, 97, '2'),
(33, 1, 98, 'Negatif'),
(34, 1, 99, 'Negatif'),
(35, 1, 100, 'Negatif'),
(36, 1, 101, 'Positif'),
(37, 1, 103, 'Negatif'),
(38, 1, 104, 'Negatif'),
(39, 1, 105, 'Negatif'),
(40, 1, 107, '1'),
(41, 1, 108, '2'),
(42, 1, 109, 'Negatif'),
(43, 1, 110, 'Positif'),
(44, 1, 111, 'Negatif'),
(45, 1, 112, 'Negatif'),
(46, 1, 119, 'Normal'),
(47, 1, 120, 'Normal'),
(48, 1, 121, 'Normal'),
(49, 1, 122, 'Normal'),
(50, 1, 123, 'Normal'),
(51, 1, 14, 'Pakai'),
(52, 1, 18, 'Normal'),
(53, 1, 22, 'Normal'),
(54, 1, 23, 'Normal'),
(55, 1, 24, 'Isokor'),
(56, 1, 25, 'Normal'),
(57, 1, 26, 'Normal'),
(58, 1, 27, 'Normal'),
(59, 1, 28, 'Normal'),
(60, 1, 29, 'Normal'),
(61, 1, 31, 'Normal'),
(62, 1, 32, '8/7.5 (ODS)'),
(63, 1, 33, 'Normal'),
(64, 1, 34, 'Normal'),
(65, 1, 35, '-/-'),
(66, 1, 36, 'Normal'),
(67, 1, 37, 'Normal'),
(68, 1, 38, 'Ada'),
(69, 1, 39, 'Normal'),
(70, 1, 40, 'Tidak Teraba'),
(71, 1, 41, 'Tidak Teraba'),
(72, 1, 43, 'Normal'),
(73, 1, 44, 'Normal'),
(74, 1, 45, 'Normal'),
(75, 1, 46, 'Normal'),
(76, 1, 47, 'Tidak ada Kelainan'),
(77, 1, 48, 'Normal'),
(78, 1, 49, 'Simetris'),
(79, 1, 50, 'Vesikuler'),
(80, 1, 51, 'Normal'),
(81, 1, 52, 'Normal'),
(82, 1, 53, 'Normal'),
(83, 1, 54, 'Normal'),
(84, 1, 55, 'Normal'),
(85, 1, 56, 'Normal'),
(86, 1, 57, 'Negativ'),
(87, 1, 59, 'Normal'),
(88, 1, 60, 'Normal'),
(89, 1, 61, 'Normal'),
(90, 1, 62, 'Normal'),
(91, 1, 63, 'Normal'),
(92, 1, 64, 'Normal'),
(93, 1, 78, 'Non Reaktif'),
(94, 1, 113, 'Negatif'),
(95, 1, 114, 'Negatif'),
(96, 1, 115, 'Negatif'),
(97, 1, 116, 'Negatif'),
(98, 1, 117, 'Negatif'),
(99, 2, 1, 'Tidak Ada'),
(100, 2, 2, 'Tidak Ada'),
(101, 2, 3, 'Tidak Ada'),
(102, 2, 4, 'Tidak Ada'),
(103, 2, 5, 'Tidak Ada'),
(104, 2, 168, ''),
(105, 2, 169, ''),
(106, 2, 170, ''),
(107, 2, 171, ''),
(108, 2, 65, '90'),
(109, 2, 66, '90'),
(110, 2, 68, '9'),
(111, 2, 69, '09'),
(112, 2, 70, '090'),
(113, 2, 71, ''),
(114, 2, 72, ''),
(115, 2, 73, ''),
(116, 2, 74, ''),
(117, 2, 75, ''),
(118, 2, 76, ''),
(119, 2, 77, ''),
(120, 2, 85, ''),
(121, 2, 86, ''),
(122, 2, 87, ''),
(123, 2, 88, ''),
(124, 2, 89, ''),
(125, 2, 90, ''),
(126, 2, 92, ''),
(127, 2, 93, ''),
(128, 2, 94, ''),
(129, 2, 96, ''),
(130, 2, 97, ''),
(131, 2, 98, 'Negatif'),
(132, 2, 99, 'Negatif'),
(133, 2, 100, 'Negatif'),
(134, 2, 101, 'Positif'),
(135, 2, 103, 'Negatif'),
(136, 2, 104, 'Negatif'),
(137, 2, 105, 'Negatif'),
(138, 2, 107, ''),
(139, 2, 108, ''),
(140, 2, 109, 'Negatif'),
(141, 2, 110, 'Positif'),
(142, 2, 111, 'Negatif'),
(143, 2, 112, 'Negatif'),
(144, 2, 119, 'Normal'),
(145, 2, 120, 'Normal'),
(146, 2, 121, 'Normal'),
(147, 2, 122, 'Normal'),
(148, 2, 123, 'Normal'),
(149, 1, 124, 'Normal'),
(150, 1, 125, 'Normal'),
(151, 1, 126, ''),
(152, 1, 127, ''),
(153, 1, 128, ''),
(154, 1, 129, ''),
(155, 1, 130, ''),
(156, 1, 131, ''),
(157, 1, 132, ''),
(158, 1, 133, ''),
(159, 2, 124, 'Normal'),
(160, 2, 125, 'Normal'),
(161, 2, 126, ''),
(162, 2, 127, ''),
(163, 2, 128, ''),
(164, 2, 129, ''),
(165, 2, 130, ''),
(166, 2, 131, ''),
(167, 2, 132, ''),
(168, 2, 133, ''),
(169, 2, 64, 'Abnormal'),
(170, 2, 180, '6'),
(171, 1, 180, '6'),
(172, 1, 181, '1'),
(173, 2, 182, ''),
(174, 2, 181, '1'),
(175, 1, 182, ''),
(176, 8, 182, 'Dr.Dokter'),
(177, 8, 180, ''),
(178, 8, 181, ''),
(179, 8, 1, 'Tidak Ada'),
(180, 8, 2, 'Ada'),
(181, 8, 3, 'Diabetes'),
(182, 8, 4, 'Hipertensi dan Diabetes Melitus'),
(183, 8, 5, 'Tidak Ada'),
(184, 8, 168, '170'),
(185, 8, 169, '70'),
(186, 8, 170, '100'),
(187, 8, 171, '60'),
(188, 8, 65, ''),
(189, 8, 66, ''),
(190, 8, 68, ''),
(191, 8, 69, ''),
(192, 8, 70, ''),
(193, 8, 71, ''),
(194, 8, 72, ''),
(195, 8, 73, ''),
(196, 8, 74, ''),
(197, 8, 75, ''),
(198, 8, 76, ''),
(199, 8, 77, ''),
(200, 8, 85, ''),
(201, 8, 86, ''),
(202, 8, 87, ''),
(203, 8, 88, ''),
(204, 8, 89, ''),
(205, 8, 90, ''),
(206, 8, 92, ''),
(207, 8, 93, ''),
(208, 8, 94, ''),
(209, 8, 96, ''),
(210, 8, 97, ''),
(211, 8, 98, 'Negatif'),
(212, 8, 99, 'Negatif'),
(213, 8, 100, 'Negatif'),
(214, 8, 101, 'Positif'),
(215, 8, 103, 'Negatif'),
(216, 8, 104, 'Negatif'),
(217, 8, 105, 'Negatif'),
(218, 8, 107, ''),
(219, 8, 108, ''),
(220, 8, 109, 'Negatif'),
(221, 8, 110, 'Positif'),
(222, 8, 111, 'Negatif'),
(223, 8, 112, 'Negatif'),
(224, 8, 119, 'Normal'),
(225, 8, 120, 'Normal'),
(226, 8, 121, 'Normal'),
(227, 8, 122, 'Normal'),
(228, 8, 123, 'Normal'),
(229, 8, 124, 'Normal'),
(230, 8, 125, 'Normal'),
(231, 8, 126, ''),
(232, 8, 127, ''),
(233, 8, 128, ''),
(234, 8, 129, ''),
(235, 8, 130, ''),
(236, 8, 131, ''),
(237, 8, 132, ''),
(238, 8, 133, ''),
(239, 8, 134, ''),
(240, 8, 135, ''),
(241, 8, 14, 'Tidak Pakai'),
(242, 8, 18, 'Normal'),
(243, 8, 22, 'Normal'),
(244, 8, 23, 'Normal'),
(245, 8, 24, 'Isokor'),
(246, 8, 25, 'Normal'),
(247, 8, 26, 'Normal'),
(248, 8, 27, 'Normal'),
(249, 8, 28, 'Normal'),
(250, 8, 29, 'Normal'),
(251, 8, 31, 'Normal'),
(252, 8, 32, '8/7.5 (ODS)'),
(253, 8, 33, 'Normal'),
(254, 8, 34, 'Normal'),
(255, 8, 35, '+/+'),
(256, 8, 36, 'Normal'),
(257, 8, 37, 'Normal'),
(258, 8, 38, 'Ada'),
(259, 8, 39, 'Tidak Normal'),
(260, 8, 40, 'Membesar'),
(261, 8, 41, 'Tidak Teraba'),
(262, 8, 43, 'Normal'),
(263, 8, 44, 'Normal'),
(264, 8, 45, 'Normal'),
(265, 8, 46, 'Stomatitis'),
(266, 8, 47, 'Tidak ada Kelainan'),
(267, 8, 48, 'Normal'),
(268, 8, 49, 'Asimetris'),
(269, 8, 50, 'Vesikuler'),
(270, 8, 51, 'Normal'),
(271, 8, 52, 'Nyeri Tekan Epigastrum'),
(272, 8, 53, 'Normal'),
(273, 8, 54, 'Normal'),
(274, 8, 55, 'Normal'),
(275, 8, 56, 'Normal'),
(276, 8, 57, 'Negativ'),
(277, 8, 59, 'Palese'),
(278, 8, 60, 'Normal'),
(279, 8, 61, 'Normal'),
(280, 8, 62, 'Normal'),
(281, 8, 63, 'Normal'),
(282, 8, 64, 'Normal'),
(283, 8, 113, 'Negatif'),
(284, 8, 114, 'Negatif'),
(285, 8, 115, 'Negatif'),
(286, 8, 116, 'Negatif'),
(287, 8, 117, 'Negatif'),
(288, 8, 183, 'Non Reaktif'),
(289, 4, 182, 'dr. Test'),
(290, 4, 180, ''),
(291, 4, 181, ''),
(292, 4, 1, 'Tidak Ada'),
(293, 4, 2, 'Tidak Ada'),
(294, 4, 3, 'Tidak Ada'),
(295, 4, 4, 'Hipertensi'),
(296, 4, 5, 'Merokok'),
(297, 4, 168, '165'),
(298, 4, 169, '80'),
(299, 4, 170, '140'),
(300, 4, 171, '100'),
(301, 4, 65, ''),
(302, 4, 66, ''),
(303, 4, 68, ''),
(304, 4, 69, ''),
(305, 4, 70, ''),
(306, 4, 71, ''),
(307, 4, 72, ''),
(308, 4, 73, ''),
(309, 4, 74, ''),
(310, 4, 75, ''),
(311, 4, 76, ''),
(312, 4, 77, ''),
(313, 4, 85, ''),
(314, 4, 86, ''),
(315, 4, 87, ''),
(316, 4, 88, ''),
(317, 4, 89, ''),
(318, 4, 90, ''),
(319, 4, 92, ''),
(320, 4, 93, ''),
(321, 4, 94, ''),
(322, 4, 96, ''),
(323, 4, 97, ''),
(324, 4, 98, 'Negatif'),
(325, 4, 99, 'Negatif'),
(326, 4, 100, 'Negatif'),
(327, 4, 101, 'Positif'),
(328, 4, 103, 'Negatif'),
(329, 4, 104, 'Negatif'),
(330, 4, 105, 'Negatif'),
(331, 4, 107, ''),
(332, 4, 108, ''),
(333, 4, 109, 'Negatif'),
(334, 4, 110, 'Positif'),
(335, 4, 111, 'Negatif'),
(336, 4, 112, 'Negatif'),
(337, 4, 119, 'Normal'),
(338, 4, 120, 'Normal'),
(339, 4, 121, 'Normal'),
(340, 4, 122, 'Normal'),
(341, 4, 123, 'Normal'),
(342, 4, 124, 'Normal'),
(343, 4, 125, 'Normal'),
(344, 4, 126, ''),
(345, 4, 127, ''),
(346, 4, 128, ''),
(347, 4, 129, ''),
(348, 4, 130, ''),
(349, 4, 131, ''),
(350, 4, 132, ''),
(351, 4, 133, ''),
(352, 4, 134, ''),
(353, 4, 135, ''),
(354, 4, 14, 'Pakai'),
(355, 4, 18, 'Normal'),
(356, 4, 22, 'Normal'),
(357, 4, 23, 'Normal'),
(358, 4, 24, 'Isokor'),
(359, 4, 25, 'Normal'),
(360, 4, 26, 'Normal'),
(361, 4, 27, 'Normal'),
(362, 4, 28, 'Normal'),
(363, 4, 29, 'Normal'),
(364, 4, 31, 'Normal'),
(365, 4, 32, '8/7.5 (ODS)'),
(366, 4, 33, 'Normal'),
(367, 4, 34, 'Normal'),
(368, 4, 35, '-/-'),
(369, 4, 36, 'Normal'),
(370, 4, 37, 'Normal'),
(371, 4, 38, 'Ada'),
(372, 4, 39, 'Normal'),
(373, 4, 40, 'Tidak Teraba'),
(374, 4, 41, 'Tidak Teraba'),
(375, 4, 43, 'Normal'),
(376, 4, 44, 'Normal'),
(377, 4, 45, 'Normal'),
(378, 4, 46, 'Normal'),
(379, 4, 47, 'Tidak ada Kelainan'),
(380, 4, 48, 'Normal'),
(381, 4, 49, 'Simetris'),
(382, 4, 50, 'Vesikuler'),
(383, 4, 51, 'Normal'),
(384, 4, 52, 'Normal'),
(385, 4, 53, 'Normal'),
(386, 4, 54, 'Normal'),
(387, 4, 55, 'Normal'),
(388, 4, 56, 'Normal'),
(389, 4, 57, 'Negativ'),
(390, 4, 59, 'Normal'),
(391, 4, 60, 'Normal'),
(392, 4, 61, 'Normal'),
(393, 4, 62, 'Normal'),
(394, 4, 63, 'Normal'),
(395, 4, 64, 'Normal'),
(396, 4, 113, 'Negatif'),
(397, 4, 114, 'Negatif'),
(398, 4, 115, 'Negatif'),
(399, 4, 116, 'Negatif'),
(400, 4, 117, 'Negatif'),
(401, 4, 183, 'Non Reaktif'),
(402, 9, 182, 'dr. Test'),
(403, 9, 180, 'Dr.Dokter'),
(404, 9, 181, 'Agus'),
(405, 9, 1, 'Tidak Ada'),
(406, 9, 2, 'Tidak Ada'),
(407, 9, 3, 'Tidak Ada'),
(408, 9, 4, 'Tidak Ada'),
(409, 9, 5, 'Tidak Ada'),
(410, 9, 168, '170'),
(411, 9, 169, '65'),
(412, 9, 170, '100/70'),
(413, 9, 171, '100'),
(414, 9, 65, '19'),
(415, 9, 66, '100'),
(416, 9, 68, '20'),
(417, 9, 69, '100'),
(418, 9, 70, '30'),
(419, 9, 71, '12'),
(420, 9, 72, '10'),
(421, 9, 73, '20'),
(422, 9, 74, '14'),
(423, 9, 75, '20'),
(424, 9, 76, '11'),
(425, 9, 77, '12'),
(426, 9, 85, ''),
(427, 9, 86, ''),
(428, 9, 87, ''),
(429, 9, 88, ''),
(430, 9, 89, ''),
(431, 9, 90, ''),
(432, 9, 92, ''),
(433, 9, 93, ''),
(434, 9, 94, ''),
(435, 9, 96, ''),
(436, 9, 97, ''),
(437, 9, 98, 'Negatif'),
(438, 9, 99, 'Negatif'),
(439, 9, 100, 'Negatif'),
(440, 9, 101, 'Positif'),
(441, 9, 103, 'Negatif'),
(442, 9, 104, 'Negatif'),
(443, 9, 105, 'Negatif'),
(444, 9, 107, ''),
(445, 9, 108, ''),
(446, 9, 109, 'Negatif'),
(447, 9, 110, 'Positif'),
(448, 9, 111, 'Negatif'),
(449, 9, 112, 'Negatif'),
(450, 9, 119, 'Normal'),
(451, 9, 120, 'Normal'),
(452, 9, 121, 'Normal'),
(453, 9, 122, 'Normal'),
(454, 9, 123, 'Normal'),
(455, 9, 124, 'Normal'),
(456, 9, 125, 'Normal'),
(457, 9, 126, ''),
(458, 9, 127, ''),
(459, 9, 128, ''),
(460, 9, 129, ''),
(461, 9, 130, ''),
(462, 9, 131, ''),
(463, 9, 132, ''),
(464, 9, 133, ''),
(465, 9, 134, ''),
(466, 9, 135, ''),
(467, 9, 14, 'Tidak Pakai'),
(468, 9, 18, 'Normal'),
(469, 9, 22, 'Normal'),
(470, 9, 23, 'Normal'),
(471, 9, 24, 'Isokor'),
(472, 9, 25, 'Normal'),
(473, 9, 26, 'Normal'),
(474, 9, 27, 'Normal'),
(475, 9, 28, 'Normal'),
(476, 9, 29, 'Normal'),
(477, 9, 31, 'Normal'),
(478, 9, 32, '8/7.5 (ODS)'),
(479, 9, 33, 'Normal'),
(480, 9, 34, 'Normal'),
(481, 9, 35, '-/-'),
(482, 9, 36, 'Normal'),
(483, 9, 37, 'Normal'),
(484, 9, 38, 'Ada'),
(485, 9, 39, 'Normal'),
(486, 9, 40, 'Tidak Teraba'),
(487, 9, 41, 'Tidak Teraba'),
(488, 9, 43, 'Normal'),
(489, 9, 44, 'Normal'),
(490, 9, 45, 'Normal'),
(491, 9, 46, 'Normal'),
(492, 9, 47, 'Tidak ada Kelainan'),
(493, 9, 48, 'Normal'),
(494, 9, 49, 'Simetris'),
(495, 9, 50, 'Vesikuler'),
(496, 9, 51, 'Normal'),
(497, 9, 52, 'Normal'),
(498, 9, 53, 'Normal'),
(499, 9, 54, 'Normal'),
(500, 9, 55, 'Normal'),
(501, 9, 56, 'Normal'),
(502, 9, 57, 'Negativ'),
(503, 9, 59, 'Normal'),
(504, 9, 60, 'Normal'),
(505, 9, 61, 'Normal'),
(506, 9, 62, 'Normal'),
(507, 9, 63, 'Normal'),
(508, 9, 64, 'Normal'),
(509, 9, 113, 'Negatif'),
(510, 9, 114, 'Negatif'),
(511, 9, 115, 'Negatif'),
(512, 9, 116, 'Negatif'),
(513, 9, 117, 'Negatif'),
(514, 9, 183, 'Non Reaktif'),
(515, 9, 173, '20190410050312-LOGO-RS-TEFRBARU.png'),
(516, 9, 174, 'Hasil HD.png'),
(517, 4, 173, ''),
(518, 10, 182, 'DRT'),
(519, 10, 180, 'DRT'),
(520, 10, 181, 'Agus'),
(521, 10, 1, 'SERING PUSING'),
(522, 10, 2, 'Tidak Ada'),
(523, 10, 3, 'ANEMIA'),
(524, 10, 4, 'Tidak Ada'),
(525, 10, 5, 'OLAHRAGA'),
(526, 10, 168, '168'),
(527, 10, 169, '56'),
(528, 10, 170, '150'),
(529, 10, 171, '120'),
(530, 10, 65, '14.0'),
(531, 10, 66, '3200'),
(532, 10, 68, '34'),
(533, 10, 69, '320000'),
(534, 10, 70, '5.4'),
(535, 10, 71, '8'),
(536, 10, 72, '0'),
(537, 10, 73, '1'),
(538, 10, 74, '6'),
(539, 10, 75, '80'),
(540, 10, 76, '10'),
(541, 10, 77, '3'),
(542, 10, 85, '14'),
(543, 10, 86, '11'),
(544, 10, 87, '250'),
(545, 10, 88, '120'),
(546, 10, 89, '56'),
(547, 10, 90, '67'),
(548, 10, 92, '98'),
(549, 10, 93, '110'),
(550, 10, 94, ''),
(551, 10, 96, '6.0'),
(552, 10, 97, '1030'),
(553, 10, 98, 'Negatif'),
(554, 10, 99, 'Negatif'),
(555, 10, 100, 'Negatif'),
(556, 10, 101, 'Positif'),
(557, 10, 103, 'Negatif'),
(558, 10, 104, 'Negatif'),
(559, 10, 105, 'Negatif'),
(560, 10, 107, '0-1'),
(561, 10, 108, '1-2'),
(562, 10, 109, 'Negatif'),
(563, 10, 110, 'Positif'),
(564, 10, 111, 'Negatif'),
(565, 10, 112, 'Negatif'),
(566, 10, 119, 'Normal'),
(567, 10, 120, 'Normal'),
(568, 10, 121, 'Normal'),
(569, 10, 122, 'Normal'),
(570, 10, 123, 'Normal'),
(571, 10, 124, 'Normal'),
(572, 10, 125, 'Normal'),
(573, 10, 126, ''),
(574, 10, 127, ''),
(575, 10, 128, ''),
(576, 10, 129, ''),
(577, 10, 130, ''),
(578, 10, 131, ''),
(579, 10, 132, ''),
(580, 10, 133, ''),
(581, 10, 134, ''),
(582, 10, 135, ''),
(583, 10, 14, 'Tidak Pakai'),
(584, 10, 18, 'Hordeolum'),
(585, 10, 22, 'Normal'),
(586, 10, 23, 'Normal'),
(587, 10, 24, 'Isokor'),
(588, 10, 25, 'Normal'),
(589, 10, 26, 'Normal'),
(590, 10, 27, 'Normal'),
(591, 10, 28, 'Normal'),
(592, 10, 29, 'Normal'),
(593, 10, 31, 'Normal'),
(594, 10, 32, '8/7.5 (ODS)'),
(595, 10, 33, 'Normal'),
(596, 10, 34, 'Normal'),
(597, 10, 35, '-/-'),
(598, 10, 36, 'Normal'),
(599, 10, 37, 'Normal'),
(600, 10, 38, 'Ada'),
(601, 10, 39, 'Normal'),
(602, 10, 40, 'Tidak Teraba'),
(603, 10, 41, 'Tidak Teraba'),
(604, 10, 43, 'Normal'),
(605, 10, 44, 'Normal'),
(606, 10, 45, 'Normal'),
(607, 10, 46, 'Normal'),
(608, 10, 47, 'Tidak ada Kelainan'),
(609, 10, 48, 'Normal'),
(610, 10, 49, 'Simetris'),
(611, 10, 50, 'Vesikuler'),
(612, 10, 51, 'Normal'),
(613, 10, 52, 'Normal'),
(614, 10, 53, 'Normal'),
(615, 10, 54, 'Normal'),
(616, 10, 55, 'Normal'),
(617, 10, 56, 'Normal'),
(618, 10, 57, 'Negativ'),
(619, 10, 59, 'Normal'),
(620, 10, 60, 'Normal'),
(621, 10, 61, 'Normal'),
(622, 10, 62, 'Normal'),
(623, 10, 63, 'Normal'),
(624, 10, 64, 'Normal'),
(625, 10, 113, 'Negatif'),
(626, 10, 114, 'Negatif'),
(627, 10, 115, 'Negatif'),
(628, 10, 116, 'Negatif'),
(629, 10, 117, 'Negatif'),
(630, 10, 183, 'Non Reaktif'),
(631, 6, 182, 'dr. Test'),
(632, 6, 180, ''),
(633, 6, 181, ''),
(634, 6, 1, 'Tidak Ada'),
(635, 6, 2, 'Ada'),
(636, 6, 3, 'Hepatitis'),
(637, 6, 4, 'Diabetes Melitus'),
(638, 6, 5, 'Merokok'),
(639, 6, 168, '165'),
(640, 6, 169, '80'),
(641, 6, 170, '130'),
(642, 6, 171, '80'),
(643, 6, 65, ''),
(644, 6, 66, ''),
(645, 6, 68, ''),
(646, 6, 69, ''),
(647, 6, 70, ''),
(648, 6, 71, ''),
(649, 6, 72, ''),
(650, 6, 73, ''),
(651, 6, 74, ''),
(652, 6, 75, ''),
(653, 6, 76, ''),
(654, 6, 77, ''),
(655, 6, 85, ''),
(656, 6, 86, ''),
(657, 6, 87, ''),
(658, 6, 88, ''),
(659, 6, 89, ''),
(660, 6, 90, ''),
(661, 6, 92, ''),
(662, 6, 93, ''),
(663, 6, 94, ''),
(664, 6, 96, ''),
(665, 6, 97, ''),
(666, 6, 98, 'Negatif'),
(667, 6, 99, 'Negatif'),
(668, 6, 100, 'Negatif'),
(669, 6, 101, 'Positif'),
(670, 6, 103, 'Negatif'),
(671, 6, 104, 'Negatif'),
(672, 6, 105, 'Negatif'),
(673, 6, 107, ''),
(674, 6, 108, ''),
(675, 6, 109, 'Negatif'),
(676, 6, 110, 'Positif'),
(677, 6, 111, 'Negatif'),
(678, 6, 112, 'Negatif'),
(679, 6, 119, 'Normal'),
(680, 6, 120, 'Normal'),
(681, 6, 121, 'Normal'),
(682, 6, 122, 'Normal'),
(683, 6, 123, 'Normal'),
(684, 6, 124, 'Normal'),
(685, 6, 125, 'Normal'),
(686, 6, 126, ''),
(687, 6, 127, ''),
(688, 6, 128, ''),
(689, 6, 129, ''),
(690, 6, 130, ''),
(691, 6, 131, ''),
(692, 6, 132, ''),
(693, 6, 133, ''),
(694, 6, 134, ''),
(695, 6, 135, ''),
(696, 6, 14, 'Pakai'),
(697, 6, 18, 'Hordeolum'),
(698, 6, 22, 'Anemis'),
(699, 6, 23, 'Icteric'),
(700, 6, 24, 'Isokor'),
(701, 6, 25, 'Normal'),
(702, 6, 26, 'Normal'),
(703, 6, 27, 'Normal'),
(704, 6, 28, 'Normal'),
(705, 6, 29, 'Normal'),
(706, 6, 31, 'Juling Kiri'),
(707, 6, 32, '8/7.5 (ODS)'),
(708, 6, 33, 'Normal'),
(709, 6, 34, 'Normal'),
(710, 6, 35, '-/-'),
(711, 6, 36, 'Normal'),
(712, 6, 37, 'Normal'),
(713, 6, 38, 'Ada'),
(714, 6, 39, 'Normal'),
(715, 6, 40, 'Tidak Teraba'),
(716, 6, 41, 'Tidak Teraba'),
(717, 6, 43, 'Normal'),
(718, 6, 44, 'Normal'),
(719, 6, 45, 'Normal'),
(720, 6, 46, 'Stomatitis'),
(721, 6, 47, 'Calkulus'),
(722, 6, 48, 'Normal'),
(723, 6, 49, 'Asimetris'),
(724, 6, 50, 'Ronkhi'),
(725, 6, 51, 'Mur-mur'),
(726, 6, 52, 'Nyeri Tekan Epigastrum'),
(727, 6, 53, 'Hati Teraba'),
(728, 6, 54, 'Limpa Membesar'),
(729, 6, 55, 'Normal'),
(730, 6, 56, 'Normal'),
(731, 6, 57, 'Negativ'),
(732, 6, 59, 'Paralisis'),
(733, 6, 60, 'Normal'),
(734, 6, 61, 'Normal'),
(735, 6, 62, 'Normal'),
(736, 6, 63, 'Normal'),
(737, 6, 64, 'Normal'),
(738, 6, 113, 'Negatif'),
(739, 6, 114, 'Negatif'),
(740, 6, 115, 'Negatif'),
(741, 6, 116, 'Negatif'),
(742, 6, 117, 'Negatif'),
(743, 6, 183, 'Non Reaktif'),
(744, 11, 173, 'Dr.Dokter'),
(745, 11, 185, ''),
(746, 11, 186, ''),
(747, 11, 119, 'Normal'),
(748, 11, 120, 'Normal'),
(749, 11, 121, 'Normal'),
(750, 11, 122, 'Normal'),
(751, 11, 123, 'Normal'),
(752, 11, 189, '14'),
(753, 11, 190, '34'),
(754, 11, 191, '6400'),
(755, 11, 192, '280000'),
(756, 11, 193, '5,3'),
(757, 11, 194, '10'),
(758, 11, 196, 'Negatif'),
(759, 11, 198, 'Negatif'),
(760, 11, 199, 'Negatif'),
(761, 11, 200, 'Negatif'),
(762, 11, 206, ''),
(763, 11, 201, 'Tidak Ada'),
(764, 11, 202, 'Tidak Ada'),
(765, 11, 203, 'Tidak Ada'),
(766, 11, 204, 'Tidak Ada'),
(767, 11, 205, 'Tidak Ada'),
(768, 11, 207, '168'),
(769, 11, 208, '78'),
(770, 11, 209, '140'),
(771, 11, 210, '140'),
(772, 10, 173, ''),
(773, 12, 182, 'dr. Mukti A. Berlian, Sp. P. D.'),
(774, 12, 180, 'Dr.Dokter'),
(775, 12, 173, ''),
(776, 12, 181, 'Agus'),
(777, 12, 1, ''),
(778, 12, 2, 'Ada'),
(779, 12, 3, 'Epiliepsi'),
(780, 12, 4, 'Hipertensi dan Diabetes Melitus'),
(781, 12, 5, 'Merokok'),
(782, 12, 168, '155'),
(783, 12, 169, '60'),
(784, 12, 170, '130'),
(785, 12, 171, '90'),
(786, 12, 65, '14'),
(787, 12, 66, '6400'),
(788, 12, 68, '30'),
(789, 12, 69, '320'),
(790, 12, 70, '5.2'),
(791, 12, 71, '8'),
(792, 12, 72, '0'),
(793, 12, 73, '1'),
(794, 12, 74, '2'),
(795, 12, 75, '55'),
(796, 12, 76, '33'),
(797, 12, 77, '10'),
(798, 12, 85, '12'),
(799, 12, 86, '9'),
(800, 12, 87, '240'),
(801, 12, 88, '140'),
(802, 12, 89, '100'),
(803, 12, 90, '120'),
(804, 12, 92, '120'),
(805, 12, 93, '145'),
(806, 12, 94, '58'),
(807, 12, 96, '6.0'),
(808, 12, 97, '1020'),
(809, 12, 98, 'Negatif'),
(810, 12, 99, 'Negatif'),
(811, 12, 100, 'Negatif'),
(812, 12, 101, 'Positif'),
(813, 12, 103, 'Negatif'),
(814, 12, 104, 'Negatif'),
(815, 12, 105, 'Negatif'),
(816, 12, 107, '0-1'),
(817, 12, 108, '1-2'),
(818, 12, 109, 'Negatif'),
(819, 12, 110, 'Positif'),
(820, 12, 111, 'Negatif'),
(821, 12, 112, 'Negatif'),
(822, 12, 119, 'Normal'),
(823, 12, 120, 'Normal'),
(824, 12, 121, 'Normal'),
(825, 12, 122, 'Normal'),
(826, 12, 123, 'Normal'),
(827, 12, 124, 'Normal'),
(828, 12, 125, 'Normal'),
(829, 12, 126, ''),
(830, 12, 127, ''),
(831, 12, 128, ''),
(832, 12, 129, ''),
(833, 12, 130, ''),
(834, 12, 131, ''),
(835, 12, 132, ''),
(836, 12, 133, ''),
(837, 12, 134, ''),
(838, 12, 135, ''),
(839, 12, 14, 'Tidak Pakai'),
(840, 12, 18, 'Normal'),
(841, 12, 22, 'Normal'),
(842, 12, 23, 'Normal'),
(843, 12, 24, 'Isokor'),
(844, 12, 25, 'Normal'),
(845, 12, 26, 'Normal'),
(846, 12, 27, 'Normal'),
(847, 12, 28, 'Normal'),
(848, 12, 29, 'Tidak Normal'),
(849, 12, 31, 'Normal'),
(850, 12, 32, '8/7.5 (ODS)'),
(851, 12, 33, 'Normal'),
(852, 12, 34, 'Normal'),
(853, 12, 35, '-/-'),
(854, 12, 36, 'Normal'),
(855, 12, 37, 'Normal'),
(856, 12, 38, 'Ada'),
(857, 12, 39, 'Normal'),
(858, 12, 40, 'Tidak Teraba'),
(859, 12, 41, 'Tidak Teraba'),
(860, 12, 43, 'Normal'),
(861, 12, 44, 'Normal'),
(862, 12, 45, 'Normal'),
(863, 12, 46, 'Normal'),
(864, 12, 47, 'Calkulus'),
(865, 12, 48, 'Normal'),
(866, 12, 49, 'Simetris'),
(867, 12, 50, 'Vesikuler'),
(868, 12, 51, 'Normal'),
(869, 12, 52, 'Normal'),
(870, 12, 53, 'Normal'),
(871, 12, 54, 'Normal'),
(872, 12, 55, 'Normal'),
(873, 12, 56, 'Normal'),
(874, 12, 57, 'Negativ'),
(875, 12, 59, 'Normal'),
(876, 12, 60, 'Normal'),
(877, 12, 61, 'Normal'),
(878, 12, 62, 'Normal'),
(879, 12, 63, 'Normal'),
(880, 12, 64, 'Normal'),
(881, 12, 113, 'Negatif'),
(882, 12, 114, 'Negatif'),
(883, 12, 115, 'Negatif'),
(884, 12, 116, 'Negatif'),
(885, 12, 117, 'Negatif'),
(886, 12, 183, 'Non Reaktif'),
(887, 13, 1, 'Tidak Ada'),
(888, 13, 2, 'Ada'),
(889, 13, 3, 'Operasi Usus Buntu'),
(890, 13, 4, 'Diabetes Melitus'),
(891, 13, 5, 'Olahraga'),
(892, 13, 168, '155'),
(893, 13, 169, '70'),
(894, 13, 170, '120'),
(895, 13, 171, '80'),
(896, 13, 14, 'Tidak Pakai'),
(897, 13, 18, 'Normal'),
(898, 13, 22, 'Anemis'),
(899, 13, 23, 'Normal'),
(900, 13, 24, 'Isokor'),
(901, 13, 25, 'Normal'),
(902, 13, 26, 'Normal'),
(903, 13, 27, 'Normal'),
(904, 13, 28, 'Tidak Normal'),
(905, 13, 29, 'Normal'),
(906, 13, 31, 'Normal'),
(907, 13, 32, '8/7.5 (ODS)'),
(908, 13, 33, 'Normal'),
(909, 13, 34, 'Tidak Normal'),
(910, 13, 35, '+/-'),
(911, 13, 36, 'Normal'),
(912, 13, 37, 'Normal'),
(913, 13, 38, 'Tidak Ada'),
(914, 13, 39, 'Normal'),
(915, 13, 40, 'Tidak Teraba'),
(916, 13, 41, 'Membesar'),
(917, 13, 43, 'Normal'),
(918, 13, 44, 'Pembesaran Tonsil'),
(919, 13, 45, 'Normal'),
(920, 13, 46, 'Normal'),
(921, 13, 47, 'Caries'),
(922, 13, 48, 'Normal'),
(923, 13, 49, 'Simetris'),
(924, 13, 50, 'Wheezing'),
(925, 13, 51, 'Normal'),
(926, 13, 52, 'Normal'),
(927, 13, 53, 'Normal'),
(928, 13, 54, 'Limpa Membesar'),
(929, 13, 55, 'Normal'),
(930, 13, 56, 'Tidak Normal'),
(931, 13, 57, 'Negativ'),
(932, 13, 59, 'Normal'),
(933, 13, 60, 'Normal'),
(934, 13, 61, 'Normal'),
(935, 13, 62, 'Normal'),
(936, 13, 63, 'Normal'),
(937, 14, 173, 'dr. Test'),
(938, 14, 180, 'dr. Test'),
(939, 14, 181, 'Agus'),
(940, 14, 119, 'Normal'),
(941, 14, 120, 'Normal'),
(942, 14, 121, 'Normal'),
(943, 14, 122, 'Normal'),
(944, 14, 123, 'Normal'),
(945, 14, 65, '15'),
(946, 14, 66, '7200'),
(947, 14, 68, '34'),
(948, 14, 69, '350'),
(949, 14, 70, '6.2'),
(950, 14, 71, '10'),
(951, 14, 72, '0'),
(952, 14, 73, '1'),
(953, 14, 74, '2'),
(954, 14, 75, '60'),
(955, 14, 76, '24'),
(956, 14, 77, '10'),
(957, 14, 85, '10'),
(958, 14, 86, '9'),
(959, 14, 87, '120'),
(960, 14, 88, '56'),
(961, 14, 89, '235'),
(962, 14, 90, '58'),
(963, 14, 92, '200'),
(964, 14, 93, '120'),
(965, 14, 94, '80'),
(966, 14, 96, '7.0'),
(967, 14, 97, '1030'),
(968, 14, 98, 'Negatif'),
(969, 14, 99, 'Negatif'),
(970, 14, 100, 'Negatif'),
(971, 14, 101, 'Positif'),
(972, 14, 103, 'Negatif'),
(973, 14, 104, 'Negatif'),
(974, 14, 105, 'Negatif'),
(975, 14, 107, '0-1'),
(976, 14, 108, '1-0'),
(977, 14, 109, 'Negatif'),
(978, 14, 110, 'Positif'),
(979, 14, 111, 'Negatif'),
(980, 14, 112, 'Negatif'),
(981, 14, 64, 'Normal'),
(982, 14, 113, 'Negatif'),
(983, 14, 114, 'Negatif'),
(984, 14, 115, 'Negatif'),
(985, 14, 116, 'Negatif'),
(986, 14, 117, 'Negatif'),
(987, 14, 183, 'Non Reaktif'),
(988, 15, 211, 'PCR SARS CoV-2'),
(989, 15, 212, 'Tidak Terdeteksi (Negatif)'),
(990, 15, 213, 'Tidak terdeteksi (Negatif)'),
(991, 15, 216, 'ccc'),
(992, 15, 218, 'Ya'),
(993, 15, 65, 'Terdeteksi '),
(994, 15, 85, ''),
(995, 15, 86, ''),
(996, 15, 87, ''),
(997, 15, 88, ''),
(998, 15, 89, ''),
(999, 15, 90, ''),
(1000, 15, 92, ''),
(1001, 15, 93, ''),
(1002, 15, 94, ''),
(1003, 15, 96, ''),
(1004, 15, 97, ''),
(1005, 15, 98, 'Negatif'),
(1006, 15, 99, 'Negatif'),
(1007, 15, 100, 'Negatif'),
(1008, 15, 101, 'Positif'),
(1009, 15, 103, 'Negatif'),
(1010, 15, 104, 'Negatif'),
(1011, 15, 105, 'Negatif'),
(1012, 15, 107, ''),
(1013, 15, 108, ''),
(1014, 15, 109, 'Negatif'),
(1015, 15, 110, 'Positif'),
(1016, 15, 111, 'Negatif'),
(1017, 15, 112, 'Negatif'),
(1018, 15, 64, 'Tidak Terdeteksi (Negatif)'),
(1019, 15, 113, 'Negatif'),
(1020, 15, 114, 'Negatif'),
(1021, 15, 115, 'Negatif'),
(1022, 15, 116, 'Negatif'),
(1023, 15, 117, 'Negatif'),
(1024, 15, 183, 'Non Reaktif'),
(1025, 16, 65, 'Tidak Terdeteksi (Negatif)'),
(1026, 12, 221, '10 Agustus 2020'),
(1027, 12, 222, 'Sample'),
(1028, 12, 223, 'Negatif'),
(1029, 17, 221, '10 Agustus 2020'),
(1030, 17, 222, 'Sample'),
(1031, 17, 223, 'Negatif'),
(1032, 17, 65, 'Tidak Terdeteksi (Negatif)'),
(1033, 17, 182, ''),
(1034, 17, 180, ''),
(1035, 17, 232, 'dr. Mukti A. Berlian, Sp. P. D.'),
(1036, 17, 181, ''),
(1037, 17, 233, 'Sinta Khaerun Nisa, A. Md. Kes'),
(1038, 17, 134, ''),
(1039, 17, 135, ''),
(1040, 17, 225, '10 Agustus 2020'),
(1041, 17, 226, 'Dahak'),
(1042, 17, 227, 'Negatif'),
(1043, 17, 235, '20 Agustus 2020'),
(1044, 17, 236, 'Dahak'),
(1045, 17, 237, 'Negatif'),
(1046, 18, 235, '20 Agustus 2020'),
(1047, 18, 236, 'Dahak'),
(1048, 18, 237, 'Negatif'),
(1049, 18, 65, 'Tidak Terdeteksi (Negatif)'),
(1050, 19, 235, '20 Agustus 2020'),
(1051, 19, 236, 'Urine'),
(1052, 19, 237, 'Tidak Terdeteksi (Negatif)'),
(1053, 19, 65, ''),
(1054, 20, 235, '20 Agustus 2020'),
(1055, 20, 236, 'Urine'),
(1056, 20, 65, 'Terdeteksi (Positif)'),
(1057, 20, 237, 'Tidak Terdeteksi (Negatif)'),
(1058, 20, 247, 'Terdeteksi (Positif)'),
(1059, 20, 248, 'Nunik'),
(1060, 20, 249, '21 Agustu 2020'),
(1061, 20, 250, 'Cair'),
(1062, 20, 221, '10 Agustus 2020'),
(1063, 20, 222, 'Sample'),
(1064, 20, 223, 'Tidak Terdeteksi (Negatif)');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_rincian_pilihan`
--

CREATE TABLE `pemeriksaan_rincian_pilihan` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan_rincian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `default_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_rincian_pilihan`
--

INSERT INTO `pemeriksaan_rincian_pilihan` (`id`, `id_pemeriksaan_rincian`, `nama`, `default_value`) VALUES
(1, 14, 'Pakai', NULL),
(2, 14, 'Tidak Pakai', 1),
(3, 18, 'Normal', 1),
(4, 18, 'Hordeolum', NULL),
(5, 18, 'Lain-Lain', NULL),
(7, 22, 'Normal', 1),
(8, 22, 'Anemis', NULL),
(9, 22, 'Lain-Lain', NULL),
(10, 23, 'Normal', 1),
(11, 23, 'Icteric', NULL),
(12, 23, 'Lain-Lain', NULL),
(13, 24, 'Isokor', 1),
(14, 24, 'Lain-Lain', NULL),
(15, 25, 'Normal', 1),
(16, 25, 'Parsial', NULL),
(17, 25, 'Total', NULL),
(18, 26, 'Normal', 1),
(19, 26, 'Tidak Normal', NULL),
(20, 27, 'Normal', 1),
(21, 27, 'Tidak Normal', NULL),
(22, 28, 'Normal', 1),
(23, 28, 'Tidak Normal', NULL),
(24, 29, 'Normal', 1),
(25, 29, 'Tidak Normal', NULL),
(26, 31, 'Normal', 1),
(27, 31, 'Juling Kanan', NULL),
(28, 31, 'Juling Kiri', NULL),
(29, 32, '8/7.5 (ODS)', 1),
(30, 32, 'Tidak Normal', NULL),
(31, 33, 'Normal', 1),
(32, 33, 'Lain-Lain', NULL),
(33, 34, 'Normal', 1),
(34, 34, 'Tidak Normal', NULL),
(35, 35, '-/-', 1),
(36, 35, '-/+', NULL),
(37, 35, '+/-', NULL),
(38, 35, '+/+', NULL),
(39, 36, 'Normal', 1),
(40, 36, 'Lain-Lain', NULL),
(41, 37, 'Normal', 1),
(42, 37, 'Lain-Lain', NULL),
(43, 38, 'Ada', 1),
(44, 38, 'Tidak Ada', NULL),
(45, 39, 'Normal', 1),
(46, 39, 'Tidak Normal', NULL),
(47, 40, 'Tidak Teraba', 1),
(48, 40, 'Membesar', NULL),
(49, 41, 'Tidak Teraba', 1),
(50, 41, 'Membesar', NULL),
(51, 43, 'Normal', 1),
(52, 43, 'Hiperemis', NULL),
(53, 43, 'Pembesaran Tonsil', NULL),
(54, 44, 'Normal', 1),
(55, 44, 'Pembesaran Tonsil', NULL),
(56, 45, 'Normal', 1),
(57, 45, 'Hiperemis', NULL),
(58, 46, 'Normal', 1),
(59, 46, 'Stomatitis', NULL),
(60, 46, 'Lain-Lain', NULL),
(61, 47, 'Tidak ada Kelainan', 1),
(62, 47, 'Caries', NULL),
(63, 47, 'Tambal', NULL),
(64, 47, 'Calkulus', NULL),
(65, 48, 'Normal', 1),
(66, 48, 'Tidak Normal', NULL),
(67, 49, 'Simetris', 1),
(68, 49, 'Asimetris', NULL),
(69, 50, 'Vesikuler', 1),
(70, 50, 'Slam', NULL),
(71, 50, 'Wheezing', NULL),
(72, 50, 'Ronkhi', NULL),
(73, 50, 'Lain-Lain', NULL),
(74, 51, 'Normal', 1),
(75, 51, 'Mur-mur', NULL),
(76, 51, 'Extrasistole', NULL),
(77, 51, 'Galloy', NULL),
(78, 52, 'Normal', 1),
(79, 52, 'Nyeri Tekan Epigastrum', NULL),
(80, 52, 'Lain-Lain', NULL),
(81, 53, 'Normal', 1),
(82, 53, 'Hati Teraba', NULL),
(83, 53, 'Lain-Lain', NULL),
(84, 54, 'Normal', 1),
(85, 54, 'Limpa Membesar', NULL),
(86, 54, 'Lain-Lain', NULL),
(87, 55, 'Normal', 1),
(88, 55, 'Nyeri Ketok CVA', NULL),
(89, 55, 'Lain-Lain', NULL),
(90, 56, 'Normal', 1),
(91, 56, 'Tidak Normal', NULL),
(92, 57, 'Negativ', 1),
(93, 57, 'Positif', NULL),
(94, 59, 'Normal', 1),
(95, 59, 'Paralisis', NULL),
(96, 59, 'Palese', NULL),
(97, 59, 'Lain-Lain', NULL),
(98, 60, 'Normal', 1),
(99, 60, 'Tidak Normal', NULL),
(100, 60, 'Lain-Lain', NULL),
(101, 61, 'Normal', 1),
(102, 61, 'Tidak Normal', NULL),
(103, 62, 'Normal', 1),
(104, 62, 'Tidak Normal', NULL),
(105, 63, 'Normal', 1),
(106, 63, 'Tidak Normal', NULL),
(107, 64, 'Tidak Terdeteksi (Negatif)', 1),
(108, 64, 'Terdeteksi (Positif)', NULL),
(110, 78, 'Reaktif', NULL),
(111, 78, 'Non Reaktif', NULL),
(112, 113, 'Negatif', 1),
(113, 113, 'Positif', NULL),
(114, 114, 'Negatif', 1),
(115, 114, 'Positif', NULL),
(116, 115, 'Negatif', 1),
(117, 115, 'Positif', NULL),
(118, 116, 'Negatif', 1),
(119, 116, 'Positif', NULL),
(120, 117, 'Negatif', 1),
(121, 117, 'Positif', NULL),
(122, 137, 'Normal', NULL),
(123, 137, 'Membesar', NULL),
(124, 147, 'Negatif', NULL),
(125, 147, '+ Ringan', NULL),
(126, 147, '+ Sedang', NULL),
(127, 147, '+ Parah', NULL),
(128, 183, 'Non Reaktif', 1),
(129, 183, 'Reaktif', NULL),
(130, 184, 'Normal', NULL),
(131, 184, 'Dalam Batas Normal', NULL),
(132, 184, 'Abnormal', NULL),
(133, 218, 'Ya', NULL),
(134, 237, 'Tidak Terdeteksi (Negatif)', NULL),
(135, 237, 'Terdeteksi (Positif)', NULL),
(136, 245, 'Tidak Terdeteksi (Negatif)', NULL),
(137, 245, 'Terdeteksi (Positif)', NULL),
(138, 247, 'Terdeteksi (Positif)', NULL),
(139, 247, 'Tidak Terdeteksi (Negatif)', NULL),
(140, 65, 'Tidak Terdeteksi (Negatif)', NULL),
(141, 65, 'Terdeteksi (Positif)', NULL),
(142, 223, 'Tidak Terdeteksi (Negatif)', NULL),
(143, 223, 'Terdeteksi (Positif)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_spirometry`
--

CREATE TABLE `pemeriksaan_spirometry` (
  `id` int(11) NOT NULL,
  `id_registrasi` int(11) NOT NULL,
  `hasil` varchar(255) DEFAULT 'Normal',
  `kesimpulan` varchar(255) DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_spirometry`
--

INSERT INTO `pemeriksaan_spirometry` (`id`, `id_registrasi`, `hasil`, `kesimpulan`) VALUES
(2, 35, 'Normal', 'Normal'),
(3, 1, 'Normal', 'Normal'),
(4, 2, 'Normal', 'Normal'),
(5, 3, 'Normal', 'Normal'),
(6, 4, 'Normal', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_treadmill`
--

CREATE TABLE `pemeriksaan_treadmill` (
  `id` int(11) NOT NULL,
  `id_registrasi` int(11) NOT NULL,
  `metode` varchar(255) DEFAULT NULL,
  `jantung` varchar(255) DEFAULT NULL,
  `kf_poor` varchar(11) DEFAULT NULL,
  `kf_fair` varchar(11) DEFAULT NULL,
  `kf_average` varchar(11) DEFAULT NULL,
  `kf_good` varchar(11) DEFAULT NULL,
  `kf_excelent` varchar(11) DEFAULT NULL,
  `klasifikasi_fungsional_1` varchar(11) DEFAULT NULL,
  `klasifikasi_fungsional_2` varchar(11) DEFAULT NULL,
  `klasifikasi_fungsional_3` varchar(11) DEFAULT NULL,
  `denyut_nadi_awal` varchar(11) DEFAULT NULL,
  `denyut_nadi_akhir` varchar(11) DEFAULT NULL,
  `td_sistolik_awal` int(11) DEFAULT NULL,
  `td_diastolik_awal` int(11) DEFAULT NULL,
  `td_sistolik_akhir` int(11) DEFAULT NULL,
  `td_diastolik_akhir` int(11) DEFAULT NULL,
  `stop_treadmill` varchar(255) DEFAULT NULL,
  `resume_hasil` varchar(255) DEFAULT 'Abnormal',
  `max` varchar(11) DEFAULT NULL,
  `submax` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_treadmill`
--

INSERT INTO `pemeriksaan_treadmill` (`id`, `id_registrasi`, `metode`, `jantung`, `kf_poor`, `kf_fair`, `kf_average`, `kf_good`, `kf_excelent`, `klasifikasi_fungsional_1`, `klasifikasi_fungsional_2`, `klasifikasi_fungsional_3`, `denyut_nadi_awal`, `denyut_nadi_akhir`, `td_sistolik_awal`, `td_diastolik_awal`, `td_sistolik_akhir`, `td_diastolik_akhir`, `stop_treadmill`, `resume_hasil`, `max`, `submax`) VALUES
(2, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abnormal', NULL, NULL),
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abnormal', NULL, NULL),
(4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abnormal', NULL, NULL),
(5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abnormal', NULL, NULL),
(6, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abnormal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_treadmill_anjuran`
--

CREATE TABLE `pemeriksaan_treadmill_anjuran` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan_treadmill` int(11) NOT NULL,
  `jalan` varchar(11) DEFAULT NULL,
  `denyut_nadi` varchar(11) DEFAULT NULL,
  `frekuensi` varchar(11) DEFAULT NULL,
  `olahraga_lain` varchar(11) DEFAULT NULL,
  `konsultasi_kardiologi` varchar(11) DEFAULT NULL,
  `treadmill_ulang` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_usg`
--

CREATE TABLE `pemeriksaan_usg` (
  `id` int(11) NOT NULL,
  `id_registrasi` int(11) NOT NULL,
  `hati` varchar(255) DEFAULT NULL,
  `kgb` varchar(255) DEFAULT NULL,
  `empedu` varchar(255) DEFAULT NULL,
  `limpa` varchar(255) DEFAULT NULL,
  `pankreas` varchar(255) DEFAULT NULL,
  `ginjal` varchar(255) DEFAULT NULL,
  `kemih` varchar(255) DEFAULT NULL,
  `lainlain` varchar(255) DEFAULT NULL,
  `kesimpulan` varchar(255) DEFAULT 'Abnormal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_usg`
--

INSERT INTO `pemeriksaan_usg` (`id`, `id_registrasi`, `hati`, `kgb`, `empedu`, `limpa`, `pankreas`, `ginjal`, `kemih`, `lainlain`, `kesimpulan`) VALUES
(2, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abnormal'),
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abnormal'),
(4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abnormal'),
(5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abnormal'),
(6, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abnormal');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nama`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SLTA'),
(4, 'DIPLOMA'),
(5, 'SARJANA'),
(6, 'S2'),
(7, 'S3'),
(8, 'Lain-Lain'),
(9, 'Tidak Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`) VALUES
(3, 'Sinta Khaerun Nisa, A. Md. Kes'),
(4, 'Rela Sukmawati, AMAK');

-- --------------------------------------------------------

--
-- Table structure for table `radiologi`
--

CREATE TABLE `radiologi` (
  `id` int(11) NOT NULL,
  `id_registrasi` int(11) NOT NULL,
  `hasil_pemeriksaan` varchar(255) DEFAULT 'Normal',
  `cor` varchar(255) DEFAULT 'Normal',
  `pulmo` varchar(255) DEFAULT 'Normal',
  `sinus_diafragma` varchar(255) DEFAULT 'Normal',
  `tulang_jaringan_lunak` varchar(255) DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radiologi`
--

INSERT INTO `radiologi` (`id`, `id_registrasi`, `hasil_pemeriksaan`, `cor`, `pulmo`, `sinus_diafragma`, `tulang_jaringan_lunak`) VALUES
(2, 35, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal'),
(3, 1, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal'),
(4, 2, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal'),
(5, 3, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal'),
(6, 4, 'Normal', 'Normal', 'Normal', 'Normal', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id` int(11) NOT NULL,
  `no_registrasi` int(11) NOT NULL,
  `no_mcu` varchar(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nik_pasien` varchar(255) DEFAULT NULL,
  `nama_pasien` varchar(255) DEFAULT NULL,
  `alamat_pasien` varchar(255) DEFAULT NULL,
  `tempat_lahir_pasien` varchar(255) DEFAULT NULL,
  `tanggal_lahir_pasien` date DEFAULT NULL,
  `jenis_kelamin_pasien` varchar(10) DEFAULT NULL,
  `golongan_darah_pasien` varchar(10) DEFAULT NULL,
  `no_telepon_pasien` varchar(20) DEFAULT NULL,
  `status_kawin_pasien` varchar(255) DEFAULT NULL,
  `id_pasien_instansi` int(11) DEFAULT NULL,
  `id_pasien_unit` int(11) DEFAULT NULL,
  `id_pasien_agama` int(11) DEFAULT NULL,
  `id_pasien_pekerjaan` int(11) DEFAULT NULL,
  `id_pasien_pendidikan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id`, `no_registrasi`, `no_mcu`, `no_urut`, `paket_id`, `pasien_id`, `tanggal`, `nik_pasien`, `nama_pasien`, `alamat_pasien`, `tempat_lahir_pasien`, `tanggal_lahir_pasien`, `jenis_kelamin_pasien`, `golongan_darah_pasien`, `no_telepon_pasien`, `status_kawin_pasien`, `id_pasien_instansi`, `id_pasien_unit`, `id_pasien_agama`, `id_pasien_pekerjaan`, `id_pasien_pendidikan`) VALUES
(20, 1, '11130001', 1, 8, 20, '2020-08-17', '197712072088', 'Anita', 'Jln', 'Bandung', '1989-06-27', 'Perempuan', 'B', '', 'kawin', 10, 3, 1, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id`, `kode`, `nama`) VALUES
(1, 'LTes', '01'),
(2, 'LB-0000074', 'H2TL');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `instansi_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `instansi_id`, `nama`) VALUES
(3, 10, 'LAB MICROBIOLOGI');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `id_user_role` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_instansi` int(11) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `id_user_role`, `email`, `id_instansi`, `id_dokter`) VALUES
(1, 'admin', '$2y$13$hqWekYoFqDInOk6fWaTpeONetrIxrc5Tb1kK5TumqGVMbLDI30HRK', NULL, 1, NULL, NULL, NULL),
(5, 'arihermawan', '$2y$13$LCpit9cSR0cSRB/HCF5NLO5Jo6nHK.3F.m.aJPanKCWB4SkSW3Eba', NULL, 1, NULL, NULL, NULL),
(6, 'karsau', '$2y$13$qdRnTRG3frA56k5SLujvp.U6ZJgkmIpjcpSn3DwTwpslSM7E.WzxO', NULL, 1, NULL, NULL, NULL),
(10, 'mediantara', '$2y$13$KIeWGR9RXBGjKfwGzDzlPOAjhbaozWr34w4OBfXrb6aop94nWKzBS', NULL, 2, NULL, 9, NULL),
(14, 'mukti', '$2y$13$5DAtwKYArTzDpFyjraIDye6TT.q2V45m4JdYglf3MC5n5be0/eSBm', NULL, 3, '', NULL, 9),
(15, 'Nunik', '$2y$13$oss5x4sax7P0Wt0NxYjoQeZkW5h0rlLiv98CK4Fy5X71Z0YO4m84q', NULL, 3, '', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'instansi'),
(3, 'dokter');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `nama`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosa_kerja`
--
ALTER TABLE `diagnosa_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kesimpulan`
--
ALTER TABLE `kesimpulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kop`
--
ALTER TABLE `kop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorium_hematologi`
--
ALTER TABLE `laboratorium_hematologi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorium_imunoserologi`
--
ALTER TABLE `laboratorium_imunoserologi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorium_kimia`
--
ALTER TABLE `laboratorium_kimia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorium_narkoba`
--
ALTER TABLE `laboratorium_narkoba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorium_urinalisa`
--
ALTER TABLE `laboratorium_urinalisa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_pemeriksaan`
--
ALTER TABLE `paket_pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_tindakan`
--
ALTER TABLE `paket_tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_audiometry`
--
ALTER TABLE `pemeriksaan_audiometry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_ekg`
--
ALTER TABLE `pemeriksaan_ekg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_fisik`
--
ALTER TABLE `pemeriksaan_fisik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_fisik_abdomen`
--
ALTER TABLE `pemeriksaan_fisik_abdomen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_fisik_hidung`
--
ALTER TABLE `pemeriksaan_fisik_hidung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_fisik_leher`
--
ALTER TABLE `pemeriksaan_fisik_leher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_fisik_manufer_ekstremitas`
--
ALTER TABLE `pemeriksaan_fisik_manufer_ekstremitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_fisik_mata`
--
ALTER TABLE `pemeriksaan_fisik_mata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_fisik_mulut`
--
ALTER TABLE `pemeriksaan_fisik_mulut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_fisik_telinga`
--
ALTER TABLE `pemeriksaan_fisik_telinga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_fisik_thorax`
--
ALTER TABLE `pemeriksaan_fisik_thorax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_fisik_timpani`
--
ALTER TABLE `pemeriksaan_fisik_timpani`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_rincian`
--
ALTER TABLE `pemeriksaan_rincian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_rincian_hasil`
--
ALTER TABLE `pemeriksaan_rincian_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_rincian_pilihan`
--
ALTER TABLE `pemeriksaan_rincian_pilihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_spirometry`
--
ALTER TABLE `pemeriksaan_spirometry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_treadmill`
--
ALTER TABLE `pemeriksaan_treadmill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_treadmill_anjuran`
--
ALTER TABLE `pemeriksaan_treadmill_anjuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_usg`
--
ALTER TABLE `pemeriksaan_usg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radiologi`
--
ALTER TABLE `radiologi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diagnosa_kerja`
--
ALTER TABLE `diagnosa_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kesimpulan`
--
ALTER TABLE `kesimpulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kop`
--
ALTER TABLE `kop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laboratorium`
--
ALTER TABLE `laboratorium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `laboratorium_hematologi`
--
ALTER TABLE `laboratorium_hematologi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laboratorium_imunoserologi`
--
ALTER TABLE `laboratorium_imunoserologi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laboratorium_kimia`
--
ALTER TABLE `laboratorium_kimia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laboratorium_narkoba`
--
ALTER TABLE `laboratorium_narkoba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laboratorium_urinalisa`
--
ALTER TABLE `laboratorium_urinalisa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paket_pemeriksaan`
--
ALTER TABLE `paket_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `paket_tindakan`
--
ALTER TABLE `paket_tindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pemeriksaan_audiometry`
--
ALTER TABLE `pemeriksaan_audiometry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemeriksaan_ekg`
--
ALTER TABLE `pemeriksaan_ekg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemeriksaan_fisik`
--
ALTER TABLE `pemeriksaan_fisik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pemeriksaan_fisik_abdomen`
--
ALTER TABLE `pemeriksaan_fisik_abdomen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemeriksaan_fisik_hidung`
--
ALTER TABLE `pemeriksaan_fisik_hidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemeriksaan_fisik_leher`
--
ALTER TABLE `pemeriksaan_fisik_leher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemeriksaan_fisik_manufer_ekstremitas`
--
ALTER TABLE `pemeriksaan_fisik_manufer_ekstremitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemeriksaan_fisik_mata`
--
ALTER TABLE `pemeriksaan_fisik_mata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemeriksaan_fisik_mulut`
--
ALTER TABLE `pemeriksaan_fisik_mulut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemeriksaan_fisik_telinga`
--
ALTER TABLE `pemeriksaan_fisik_telinga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemeriksaan_fisik_thorax`
--
ALTER TABLE `pemeriksaan_fisik_thorax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemeriksaan_fisik_timpani`
--
ALTER TABLE `pemeriksaan_fisik_timpani`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemeriksaan_rincian`
--
ALTER TABLE `pemeriksaan_rincian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `pemeriksaan_rincian_hasil`
--
ALTER TABLE `pemeriksaan_rincian_hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1065;

--
-- AUTO_INCREMENT for table `pemeriksaan_rincian_pilihan`
--
ALTER TABLE `pemeriksaan_rincian_pilihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `pemeriksaan_spirometry`
--
ALTER TABLE `pemeriksaan_spirometry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemeriksaan_treadmill`
--
ALTER TABLE `pemeriksaan_treadmill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemeriksaan_treadmill_anjuran`
--
ALTER TABLE `pemeriksaan_treadmill_anjuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemeriksaan_usg`
--
ALTER TABLE `pemeriksaan_usg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `radiologi`
--
ALTER TABLE `radiologi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
