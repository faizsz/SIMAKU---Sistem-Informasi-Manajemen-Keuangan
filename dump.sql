-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: simaku
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `beasiswa`
--

DROP TABLE IF EXISTS `beasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beasiswa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_beasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_mulai` date NOT NULL,
  `periode_selesai` date NOT NULL,
  `nominal_max` decimal(15,2) NOT NULL,
  `persyaratan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','non-aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beasiswa`
--

LOCK TABLES `beasiswa` WRITE;
/*!40000 ALTER TABLE `beasiswa` DISABLE KEYS */;
INSERT INTO `beasiswa` VALUES (1,'Beasiswa Prestasi Akademik 2025','UKT + Uang Saku','Beasiswa untuk mahasiswa berprestasi di bidang akademik','2025-08-01','2030-07-31',10000000.00,'IPK minimal 3.5','aktif','2025-05-01 08:05:28','2025-05-01 08:05:28'),(2,'Beasiswa Bidang Studi Teknik','UKT + Uang Saku','Bantuan biaya kuliah untuk mahasiswa yang mengambil jurusan Teknik Informatika/Elektro','2025-09-15','2026-08-31',7500000.00,'Mahasiswa aktif jurusan Teknik Informatika/Elektro','aktif','2025-05-01 08:05:28','2025-05-01 08:05:28'),(3,'Beasiswa Mahasiswa Kurang Mampu','UKT + Uang Saku','Beasiswa untuk mahasiswa yang kurang mampu dan berasal dari keluarga kurang mampu','2025-07-01','2026-06-30',5000000.00,'Surat keterangan tidak mampu dari kelurahan','aktif','2025-05-01 08:05:28','2025-05-01 08:05:28'),(4,'Beasiswa Penelitian Skripsi','UKT + Uang Saku','Dana bantuan untuk mahasiswa yang sedang mengerjakan skripsi','2025-10-01','2026-05-31',3000000.00,'Proposal skripsi yang disetujui oleh dosen pembimbing','aktif','2025-05-01 08:05:28','2025-05-01 08:05:28'),(5,'Beasiswa Pengembangan Diri','UKT + Uang Saku','Beasiswa untuk mendukung kegiatan pengembangan diri mahasiswa','2025-08-15','2026-07-15',2000000.00,'Mengikuti minimal 2 organisasi/kepekerjaaan','aktif','2025-05-01 08:05:28','2025-05-01 08:05:28'),(6,'Beasiswa Unggulan Nasional','UKT + Uang Saku','Beasiswa dengan pengergensikan untuk mahasiswa dengan potensi nasional','2025-09-01','2026-08-31',12500000.00,'IPK minimal 3.7 dan lolos seleksi berkas','aktif','2025-05-01 08:05:28','2025-05-01 08:05:28'),(7,'Beasiswa Kewirausahaan Muda','UKT + Uang Saku','Dukungan dana untuk mahasiswa yang memiliki ide bisnis','2025-07-15','2026-06-15',6000000.00,'Proposal bisnis yang layak','aktif','2025-05-01 08:05:28','2025-05-01 08:05:28'),(8,'Beasiswa Seni dan Budaya','UKT + Uang Saku','Bantuan biaya untuk mahasiswa aktif dalam kegiatan seni/budaya','2025-08-01','2026-07-31',4000000.00,'Portfolio kegiatan seni/budaya','aktif','2025-05-01 08:05:28','2025-05-01 08:05:28'),(9,'Beasiswa Regional Jawa Tengah','UKT + Uang Saku','Beasiswa khusus untuk mahasiswa yang berasal dari Jawa Tengah','2025-08-01','2026-07-31',5500000.00,'KTP Jawa Tengah','aktif','2025-05-01 08:05:28','2025-05-01 08:05:28'),(10,'Beasiswa PT Pradana (Persero) Tbk','UKT + Uang Saku','Beasiswa untuk uang makan mahasiswa','2025-04-20','2025-10-07',15000000.00,'Tidak sedang menempuh beasiswa lain','non-aktif','2025-05-04 08:24:23','2025-05-04 08:24:23');
/*!40000 ALTER TABLE `beasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_pembayaran`
--

DROP TABLE IF EXISTS `detail_pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_pembayaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pembayaran_ukt_semester` bigint unsigned NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pembayaran_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','verified','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `verified_by` bigint unsigned DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_pembayaran_id_pembayaran_ukt_semester_foreign` (`id_pembayaran_ukt_semester`),
  KEY `detail_pembayaran_verified_by_foreign` (`verified_by`),
  CONSTRAINT `detail_pembayaran_id_pembayaran_ukt_semester_foreign` FOREIGN KEY (`id_pembayaran_ukt_semester`) REFERENCES `pembayaran_ukt_semester` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detail_pembayaran_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `staff` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_pembayaran`
--

LOCK TABLES `detail_pembayaran` WRITE;
/*!40000 ALTER TABLE `detail_pembayaran` DISABLE KEYS */;
INSERT INTO `detail_pembayaran` VALUES (9,11,600000.00,'2025-06-30 00:00:00','BNI',NULL,'bukti-pembayaran/icon_hijau.png','verified',1,NULL,NULL,'2025-06-29 16:16:39','2025-06-29 16:24:50'),(10,12,600000.00,'2025-06-30 00:00:00','BNI',NULL,'bukti-pembayaran/ChatGPT Image Jun 25, 2025, 09_17_06 PM.png','pending',NULL,NULL,NULL,'2025-06-29 18:17:50','2025-06-29 18:17:50'),(14,29,2000000.00,'2025-07-04 00:00:00','BNI',NULL,'bukti-pembayaran/simaku.png','pending',NULL,NULL,NULL,'2025-07-04 07:37:58','2025-07-04 07:37:58'),(15,30,2000000.00,'2025-07-04 00:00:00','BNI',NULL,'bukti-pembayaran/simaku.png','verified',NULL,NULL,NULL,'2025-07-04 07:38:21','2025-07-12 14:56:41');
/*!40000 ALTER TABLE `detail_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment_mahasiswa`
--

DROP TABLE IF EXISTS `enrollment_mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollment_mahasiswa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` bigint unsigned NOT NULL,
  `id_program_studi` bigint unsigned NOT NULL,
  `id_golongan_ukt` bigint unsigned NOT NULL,
  `id_kelas` bigint unsigned NOT NULL,
  `id_tingkat` bigint unsigned NOT NULL,
  `id_tahun_akademik` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enrollment_mahasiswa_id_mahasiswa_foreign` (`id_mahasiswa`),
  KEY `enrollment_mahasiswa_id_program_studi_foreign` (`id_program_studi`),
  KEY `enrollment_mahasiswa_id_golongan_ukt_foreign` (`id_golongan_ukt`),
  KEY `enrollment_mahasiswa_id_kelas_foreign` (`id_kelas`),
  KEY `enrollment_mahasiswa_id_tingkat_foreign` (`id_tingkat`),
  KEY `enrollment_mahasiswa_id_tahun_akademik_foreign` (`id_tahun_akademik`),
  CONSTRAINT `enrollment_mahasiswa_id_golongan_ukt_foreign` FOREIGN KEY (`id_golongan_ukt`) REFERENCES `golongan_ukt` (`id`) ON DELETE CASCADE,
  CONSTRAINT `enrollment_mahasiswa_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `enrollment_mahasiswa_id_mahasiswa_foreign` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  CONSTRAINT `enrollment_mahasiswa_id_program_studi_foreign` FOREIGN KEY (`id_program_studi`) REFERENCES `program_studi` (`id`) ON DELETE CASCADE,
  CONSTRAINT `enrollment_mahasiswa_id_tahun_akademik_foreign` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id`) ON DELETE CASCADE,
  CONSTRAINT `enrollment_mahasiswa_id_tingkat_foreign` FOREIGN KEY (`id_tingkat`) REFERENCES `tingkat` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment_mahasiswa`
--

LOCK TABLES `enrollment_mahasiswa` WRITE;
/*!40000 ALTER TABLE `enrollment_mahasiswa` DISABLE KEYS */;
INSERT INTO `enrollment_mahasiswa` VALUES (1,1,8,4,17,2,4,NULL,NULL),(2,2,9,7,19,1,5,NULL,NULL),(3,3,9,3,12,1,4,'2025-06-11 06:57:37','2025-06-11 06:57:37'),(4,4,8,3,18,2,4,NULL,NULL),(5,6,9,5,20,2,4,'2025-06-30 00:42:21','2025-06-30 00:42:21'),(6,9,3,5,4,2,4,'2025-07-04 06:41:27','2025-07-04 06:41:27');
/*!40000 ALTER TABLE `enrollment_mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fakultas`
--

DROP TABLE IF EXISTS `fakultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fakultas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fakultas`
--

LOCK TABLES `fakultas` WRITE;
/*!40000 ALTER TABLE `fakultas` DISABLE KEYS */;
INSERT INTO `fakultas` VALUES (1,'Fakultas Kedokteran','2025-05-01 09:40:48','2025-05-01 09:40:48'),(2,'Fakultas Teknik Mesin','2025-05-01 09:40:48','2025-05-01 02:45:35'),(3,'Fakultas Ekonomi dan Bisnis','2025-05-01 09:40:48','2025-05-01 09:40:48'),(4,'Fakultas Hukum','2025-05-01 09:40:48','2025-05-01 09:40:48'),(5,'Fakultas Ilmu Sosial dan Ilmu Politik','2025-05-01 09:40:48','2025-05-01 09:40:48'),(6,'Fakultas Ilmu Komputer','2025-05-01 09:40:48','2025-05-01 09:40:48'),(7,'Fakultas Psikologi','2025-05-01 09:40:48','2025-05-01 09:40:48'),(8,'Fakultas Pertanian','2025-05-01 09:40:48','2025-05-01 09:40:48'),(9,'Fakultas Ilmu Budaya','2025-05-01 09:40:48','2025-05-01 09:40:48'),(10,'Fakultas Farmasi','2025-05-01 09:40:48','2025-05-01 09:40:48');
/*!40000 ALTER TABLE `fakultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `golongan_ukt`
--

DROP TABLE IF EXISTS `golongan_ukt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `golongan_ukt` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level` tinyint unsigned NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `tahun_berlaku` year NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `golongan_ukt_level_unique` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `golongan_ukt`
--

LOCK TABLES `golongan_ukt` WRITE;
/*!40000 ALTER TABLE `golongan_ukt` DISABLE KEYS */;
INSERT INTO `golongan_ukt` VALUES (1,1,500000.00,'Golongan UKT 1 - Ekonomi keluarga sangat rendah',2025,'2025-05-01 10:23:40','2025-05-01 10:23:40'),(2,2,1000000.00,'Golongan UKT 2 - Ekonomi keluarga rendah',2025,'2025-05-01 10:23:40','2025-05-01 10:23:40'),(3,3,2500000.00,'Golongan UKT 3 - Ekonomi keluarga menengah ke bawah',2025,'2025-05-01 10:23:40','2025-05-01 10:23:40'),(4,4,4000000.00,'Golongan UKT 4 - Ekonomi keluarga menengah',2025,'2025-05-01 10:23:40','2025-05-01 10:23:40'),(5,5,6000000.00,'Golongan UKT 5 - Ekonomi keluarga menengah ke atas',2025,'2025-05-01 10:23:40','2025-05-01 10:23:40'),(6,6,8000000.00,'Golongan UKT 6 - Ekonomi keluarga atas',2025,'2025-05-01 10:23:40','2025-05-01 10:23:40'),(7,7,10000000.00,'Golongan UKT 7 - Ekonomi keluarga sangat atas',2025,'2025-05-01 10:23:40','2025-05-01 10:23:40'),(8,8,12000000.00,'Golongan UKT 8 - Ekonomi keluarga istimewa',2025,'2025-05-01 10:23:40','2025-05-01 10:23:40'),(9,9,15000000.00,'Golongan UKT 9 - Jalur mandiri/khusus',2025,'2025-05-01 10:23:40','2025-05-01 10:23:40'),(10,10,20000000.00,'Golongan UKT 10 - Program internasional/kelas khusus',2025,'2025-05-01 10:23:40','2025-05-01 10:23:40');
/*!40000 ALTER TABLE `golongan_ukt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_pembayaran`
--

DROP TABLE IF EXISTS `jenis_pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_pembayaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `is_angsuran` tinyint(1) NOT NULL DEFAULT '0',
  `max_angsuran` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_pembayaran`
--

LOCK TABLES `jenis_pembayaran` WRITE;
/*!40000 ALTER TABLE `jenis_pembayaran` DISABLE KEYS */;
INSERT INTO `jenis_pembayaran` VALUES (1,'Pembayaran Lunas','Pembayaran UKT secara penuh dalam satu kali transaksi.',0,NULL,'2025-05-02 01:25:35','2025-05-02 01:25:35'),(2,'Angsuran 2 Kali - Tahap 1','Pembayaran UKT tahap pertama dari 2 kali angsuran.',1,2,'2025-05-02 01:25:35','2025-05-02 01:25:35'),(3,'Angsuran 2 Kali - Tahap 2','Pembayaran UKT tahap kedua (terakhir) dari 2 kali angsuran.',1,2,'2025-05-02 01:25:35','2025-05-02 01:25:35'),(4,'Angsuran 3 Kali - Tahap 1','Pembayaran UKT tahap pertama dari 3 kali angsuran.',1,3,'2025-05-02 01:25:35','2025-05-02 01:25:35'),(5,'Angsuran 3 Kali - Tahap 2','Pembayaran UKT tahap kedua dari 3 kali angsuran.',1,3,'2025-05-02 01:25:35','2025-05-02 01:25:35'),(6,'Angsuran 3 Kali - Tahap 3','Pembayaran UKT tahap ketiga (terakhir) dari 3 kali angsuran.',1,3,'2025-05-02 01:25:35','2025-05-02 01:25:35'),(7,'Angsuran 4 Kali - Tahap 1','Pembayaran UKT tahap pertama dari 4 kali angsuran.',1,4,'2025-05-02 01:25:35','2025-05-02 01:25:35'),(8,'Angsuran 4 Kali - Tahap 2','Pembayaran UKT tahap kedua dari 4 kali angsuran.',1,4,'2025-05-02 01:25:35','2025-05-02 01:25:35'),(9,'Angsuran 4 Kali - Tahap 3','Pembayaran UKT tahap ketiga dari 4 kali angsuran.',1,4,'2025-05-02 01:25:35','2025-05-02 01:25:35'),(10,'Angsuran 4 Kali - Tahap 4','Pembayaran UKT tahap keempat (terakhir) dari 4 kali angsuran.',1,4,'2025-05-02 01:25:35','2025-05-02 01:25:35');
/*!40000 ALTER TABLE `jenis_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` bigint unsigned NOT NULL,
  `tahun_angkatan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kelas_id_prodi_foreign` (`id_prodi`),
  CONSTRAINT `kelas_id_prodi_foreign` FOREIGN KEY (`id_prodi`) REFERENCES `program_studi` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (1,'FA-A',2,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(2,'FA-B',2,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(3,'FA-C',2,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(4,'IH-A',3,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(5,'IH-B',3,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(6,'IH-C',3,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(7,'SI-A',4,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(8,'SI-B',4,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(9,'SI-C',4,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(10,'IN-A',5,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(11,'IN-B',5,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(12,'IN-C',5,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(13,'PS-A',6,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(14,'PS-B',6,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(15,'PS-C',6,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(16,'AG-A',7,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(17,'AG-B',7,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(18,'AG-C',7,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(19,'AK-A',8,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(20,'AK-B',8,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(21,'AK-C',8,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(22,'MN-A',9,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(23,'MN-B',9,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(24,'MN-C',9,2023,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(26,'TM-B',10,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(27,'TM-C',10,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(28,'EP-A',11,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(29,'EP-B',11,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(30,'EP-C',11,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(31,'HI-A',12,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(32,'HI-B',12,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(33,'HI-C',12,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(34,'SI-A',13,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(35,'SI-B',13,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(36,'SI-C',13,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(37,'IG-A',14,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(38,'IG-B',14,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(39,'IG-C',14,0,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(40,'AW-A',6,2023,'2025-06-11 06:21:35','2025-06-11 06:21:35');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_aktivitas`
--

DROP TABLE IF EXISTS `log_aktivitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_aktivitas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned NOT NULL,
  `aktivitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_aktivitas_id_user_foreign` (`id_user`),
  CONSTRAINT `log_aktivitas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_aktivitas`
--

LOCK TABLES `log_aktivitas` WRITE;
/*!40000 ALTER TABLE `log_aktivitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_aktivitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mahasiswa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mahasiswa_nim_unique` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES (1,'4.33.2.02','Bayu Samudra','JI. Mawar No. 10, Semarang','081234567890','bayu.png','2025-05-01 07:18:03','2025-05-01 07:18:03'),(2,'4.33.2.05','Tegar Arwana','JI. Mawar No. 10, Semarang','081234567890',NULL,'2025-05-01 07:18:03','2025-05-01 07:18:03'),(3,'4.33.2.08','Enggar Pancar','JI. Mawar No. 10, Semarang','081234567890',NULL,'2025-05-01 07:18:03','2025-05-01 07:18:03'),(4,'4.33.2.12','Rahmat Tahalu','JI. Mawar No. 10, Semarang','081234567890',NULL,'2025-05-01 07:18:03','2025-05-01 07:18:03'),(5,'4.33.2.39','Dewi Ratnasari','JI. Cempaka No. 8, Semarang','081222334455',NULL,'2025-05-01 14:06:17','2025-05-01 14:06:17'),(6,'4.33.2.42','Bima Setiawan','Perumahan Griya Lestari Blok B No. 10, Semarang','085877665544',NULL,'2025-05-01 14:06:17','2025-05-01 14:06:17'),(7,'4.33.2.45','Larasati Ayu','Ds. Suka Maju RT 03 RW 02, Semarang','089611233344',NULL,'2025-05-01 14:06:17','2025-05-01 14:06:17'),(8,'4.33.2.48','Pandu Wijaya','JI. Garuda No. 25, Semarang','082133445566',NULL,'2025-05-01 14:06:17','2025-05-01 14:06:17'),(9,'4.33.2.51','Sinta Dewi','Gg. Aster No. 11, Semarang','087855667788',NULL,'2025-05-01 14:06:17','2025-05-01 14:06:17'),(10,'4.33.2.54','Rizky Pratama','JI. Merpati No. 18, Semarang','085799001122',NULL,'2025-05-01 14:06:17','2025-05-01 14:06:17');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (182,'2014_10_12_100000_create_password_reset_tokens_table',1),(183,'2019_08_19_000000_create_failed_jobs_table',1),(184,'2019_12_14_000001_create_personal_access_tokens_table',1),(185,'2025_04_30_049998_create_fakultas_table',1),(186,'2025_04_30_049999_create_program_studis_table',1),(187,'2025_04_30_050000_create_kelas_table',1),(188,'2025_04_30_050003_create_tingkats_table',1),(189,'2025_04_30_062012_create_golongan_ukts_table',1),(190,'2025_04_30_062101_create_tahun_akademiks_table',1),(191,'2025_04_30_062103_create_periode_pembayarans_table',1),(192,'2025_04_30_062110_create_mahasiswas_table',1),(193,'2025_04_30_062111_create_enrollment_mahasiswas_table',1),(194,'2025_04_30_062112_create_ukt_semesters_table',1),(195,'2025_04_30_062846_create_staff_table',1),(196,'2025_04_30_062847_create_users_table',1),(197,'2025_04_30_065542_create_beasiswas_table',1),(198,'2025_04_30_069999_create_pengajuan_cicilans_table',1),(199,'2025_04_30_070814_create_jenis_pembayarans_table',1),(200,'2025_04_30_070815_create_pembayaran_ukt_semesters_table',1),(201,'2025_04_30_070922_create_log_aktivitas_table',1),(202,'2025_04_30_071523_create_penerima_beasiswas_table',1),(203,'2025_04_30_071526_create_detail_pembayarans_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran_ukt_semester`
--

DROP TABLE IF EXISTS `pembayaran_ukt_semester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembayaran_ukt_semester` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_enrollment` bigint unsigned NOT NULL,
  `id_ukt_semester` bigint unsigned NOT NULL,
  `id_jenis_pembayaran` bigint unsigned NOT NULL,
  `total_cicilan` int unsigned NOT NULL DEFAULT '1',
  `nominal_tagihan` decimal(15,2) NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `status` enum('belum_bayar','terbayar','cancelled','overdue') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum_bayar',
  `id_pengajuan_cicilan` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pembayaran_ukt_semester_id_enrollment_foreign` (`id_enrollment`),
  KEY `pembayaran_ukt_semester_id_ukt_semester_foreign` (`id_ukt_semester`),
  KEY `pembayaran_ukt_semester_id_jenis_pembayaran_foreign` (`id_jenis_pembayaran`),
  KEY `pembayaran_ukt_semester_id_pengajuan_cicilan_foreign` (`id_pengajuan_cicilan`),
  CONSTRAINT `pembayaran_ukt_semester_id_enrollment_foreign` FOREIGN KEY (`id_enrollment`) REFERENCES `enrollment_mahasiswa` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pembayaran_ukt_semester_id_jenis_pembayaran_foreign` FOREIGN KEY (`id_jenis_pembayaran`) REFERENCES `jenis_pembayaran` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pembayaran_ukt_semester_id_pengajuan_cicilan_foreign` FOREIGN KEY (`id_pengajuan_cicilan`) REFERENCES `pengajuan_cicilan` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pembayaran_ukt_semester_id_ukt_semester_foreign` FOREIGN KEY (`id_ukt_semester`) REFERENCES `ukt_semester` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran_ukt_semester`
--

LOCK TABLES `pembayaran_ukt_semester` WRITE;
/*!40000 ALTER TABLE `pembayaran_ukt_semester` DISABLE KEYS */;
INSERT INTO `pembayaran_ukt_semester` VALUES (8,1,6,1,1,4000000.00,'2025-07-02','belum_bayar',NULL,'2025-06-29 15:45:30','2025-06-29 15:45:30'),(9,3,7,1,1,2500000.00,'2025-07-02','cancelled',NULL,'2025-06-29 15:45:30','2025-06-29 15:57:54'),(10,4,8,1,1,2500000.00,'2025-07-02','belum_bayar',NULL,'2025-06-29 15:45:30','2025-06-29 15:45:30'),(11,3,7,2,4,600000.00,'2025-02-16','terbayar',7,'2025-06-29 15:57:55','2025-06-29 15:57:55'),(12,3,7,2,4,600000.00,'2025-03-18','terbayar',7,'2025-06-29 15:57:55','2025-06-29 15:57:55'),(13,3,7,2,4,600000.00,'2025-04-17','terbayar',7,'2025-06-29 15:57:55','2025-06-29 15:57:55'),(14,3,7,2,4,700000.00,'2025-05-17','terbayar',7,'2025-06-29 15:57:56','2025-06-29 15:57:56'),(19,5,9,2,3,2000000.00,'2025-02-16','belum_bayar',8,'2025-07-04 06:29:51','2025-07-04 06:29:51'),(20,5,9,2,3,2000000.00,'2025-03-18','belum_bayar',8,'2025-07-04 06:29:51','2025-07-04 06:29:51'),(21,5,9,2,3,2000000.00,'2025-04-17','belum_bayar',8,'2025-07-04 06:29:51','2025-07-04 06:29:51'),(29,6,10,4,3,2000000.00,'2025-02-16','belum_bayar',9,'2025-07-04 07:31:06','2025-07-04 07:31:06'),(30,6,10,5,3,2000000.00,'2025-03-18','belum_bayar',9,'2025-07-04 07:31:06','2025-07-04 07:31:06'),(31,6,10,6,3,2000000.00,'2025-04-17','belum_bayar',9,'2025-07-04 07:31:07','2025-07-04 07:31:07');
/*!40000 ALTER TABLE `pembayaran_ukt_semester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penerima_beasiswa`
--

DROP TABLE IF EXISTS `penerima_beasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penerima_beasiswa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_beasiswa` bigint unsigned NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penerima_beasiswa_id_beasiswa_foreign` (`id_beasiswa`),
  KEY `penerima_beasiswa_created_by_foreign` (`created_by`),
  KEY `penerima_beasiswa_nim_foreign` (`nim`),
  CONSTRAINT `penerima_beasiswa_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `staff` (`id`) ON DELETE SET NULL,
  CONSTRAINT `penerima_beasiswa_id_beasiswa_foreign` FOREIGN KEY (`id_beasiswa`) REFERENCES `beasiswa` (`id`) ON DELETE CASCADE,
  CONSTRAINT `penerima_beasiswa_nim_foreign` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penerima_beasiswa`
--

LOCK TABLES `penerima_beasiswa` WRITE;
/*!40000 ALTER TABLE `penerima_beasiswa` DISABLE KEYS */;
INSERT INTO `penerima_beasiswa` VALUES (1,'4.33.2.02',2,'2025-06-08','2026-06-16',500000.00,'aktif','2025-06-08',2,NULL,NULL),(3,'4.33.2.08',7,'2025-06-08','2026-06-16',500000.00,'aktif','2025-06-08',6,'2025-06-11 08:37:55','2025-06-11 08:37:55');
/*!40000 ALTER TABLE `penerima_beasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajuan_cicilan`
--

DROP TABLE IF EXISTS `pengajuan_cicilan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengajuan_cicilan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_enrollment` bigint unsigned NOT NULL,
  `id_ukt_semester` bigint unsigned NOT NULL,
  `jumlah_angsuran_diajukan` int NOT NULL,
  `jumlah_angsuran_disetujui` int DEFAULT NULL,
  `alasan_pengajuan` text COLLATE utf8mb4_unicode_ci,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `catatan_approval` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengajuan_cicilan_id_enrollment_foreign` (`id_enrollment`),
  KEY `pengajuan_cicilan_id_ukt_semester_foreign` (`id_ukt_semester`),
  KEY `pengajuan_cicilan_approved_by_foreign` (`approved_by`),
  CONSTRAINT `pengajuan_cicilan_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `staff` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pengajuan_cicilan_id_enrollment_foreign` FOREIGN KEY (`id_enrollment`) REFERENCES `enrollment_mahasiswa` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pengajuan_cicilan_id_ukt_semester_foreign` FOREIGN KEY (`id_ukt_semester`) REFERENCES `ukt_semester` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuan_cicilan`
--

LOCK TABLES `pengajuan_cicilan` WRITE;
/*!40000 ALTER TABLE `pengajuan_cicilan` DISABLE KEYS */;
INSERT INTO `pengajuan_cicilan` VALUES (7,3,7,4,4,'pengen aja','C:\\Windows\\Temp\\php61E7.tmp','approved',5,'2025-06-29 08:57:40','yyyy','2025-06-29 15:55:57','2025-06-29 15:57:40'),(8,5,9,4,3,'butuh','C:\\Users\\faiza\\AppData\\Local\\Temp\\php8147.tmp','approved',1,'2025-06-29 18:09:21','oke','2025-06-30 01:08:08','2025-06-30 01:09:21'),(9,6,10,3,3,'uayya','C:\\Users\\faiza\\AppData\\Local\\Temp\\phpB72.tmp','approved',1,'2025-07-03 23:47:43','okok','2025-07-04 06:46:54','2025-07-04 06:47:44');
/*!40000 ALTER TABLE `pengajuan_cicilan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periode_pembayaran`
--

DROP TABLE IF EXISTS `periode_pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `periode_pembayaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_tahun_akademik` bigint unsigned NOT NULL,
  `nama_periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `periode_pembayaran_id_tahun_akademik_foreign` (`id_tahun_akademik`),
  CONSTRAINT `periode_pembayaran_id_tahun_akademik_foreign` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periode_pembayaran`
--

LOCK TABLES `periode_pembayaran` WRITE;
/*!40000 ALTER TABLE `periode_pembayaran` DISABLE KEYS */;
INSERT INTO `periode_pembayaran` VALUES (1,4,'2024/2025-Genap','2025-02-17','2025-02-24','aktif','2025-05-01 13:15:52','2025-05-01 13:15:52'),(2,5,'2025/2026-Genap','2025-08-17','2025-08-25','non-aktif','2025-05-01 13:15:52','2025-05-01 13:15:52'),(3,6,'2025/2026-Ganjil','2025-02-16','2025-08-23','non-aktif','2025-05-01 13:15:52','2025-05-01 13:15:52'),(4,7,'2026/2027-Genap','2026-08-17','2027-08-24','non-aktif','2025-05-01 13:15:52','2025-05-01 13:15:52'),(5,10,'2027/2028-Genap','2027-08-16','2027-08-23','non-aktif','2025-05-01 13:15:52','2025-05-01 13:15:52');
/*!40000 ALTER TABLE `periode_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',11,'auth_token','fed9735c3e8d7ad526623890ef51dbaf7c1fe38468a4efa31a3cf48ac0ec0bee','[\"*\"]',NULL,NULL,'2025-06-09 11:26:06','2025-06-09 11:26:06'),(2,'App\\Models\\User',12,'auth_token','1edb452f008412e51a1f85f1b041c9f2c1b7e782e251324397264674b13d4910','[\"*\"]',NULL,NULL,'2025-06-09 11:28:45','2025-06-09 11:28:45'),(5,'App\\Models\\User',13,'auth_token','345613fe5c7ca9fe74c5f565c4ba4e011565b2c8b27691de6f2a31f3203fc0b5','[\"*\"]',NULL,NULL,'2025-06-09 11:31:54','2025-06-09 11:31:54'),(7,'App\\Models\\User',12,'auth_token','4234b89b663c3e089e0c1fabb94d054697169fa5cba8d2ab34db2b703c3055db','[\"*\"]','2025-06-09 12:16:18',NULL,'2025-06-09 11:35:16','2025-06-09 12:16:18'),(8,'App\\Models\\User',12,'auth_token','2f6dec0ee63f0eec560c512e505ec489e65a4ce9cb3a32a9034a716c5c4576d6','[\"*\"]','2025-07-04 07:16:00',NULL,'2025-06-09 12:15:56','2025-07-04 07:16:00'),(9,'App\\Models\\User',13,'auth_token','23b5999495c1031e20cd596ed54156faa8c76d06f6ae1b4794d1dc9ad1b82b68','[\"*\"]','2025-07-04 05:57:05',NULL,'2025-06-09 12:33:21','2025-07-04 05:57:05'),(13,'App\\Models\\User',13,'auth_token','eddd7dfba88343f83bc6e9abfb6dec8dd0f193ca8fec21248124ed6ef4f049d9','[\"*\"]','2025-06-25 08:17:12',NULL,'2025-06-11 05:32:56','2025-06-25 08:17:12'),(14,'App\\Models\\User',12,'auth_token','4b503cd4c819e8d5200734dd54008764158600fa49c60986261cff37e2e78acd','[\"*\"]','2025-06-11 09:25:40',NULL,'2025-06-11 09:21:45','2025-06-11 09:25:40'),(15,'App\\Models\\User',18,'auth_token','5dd48ac4a6512716e0e0256de89159de2838c53055aea88f767025785c5cb664','[\"*\"]','2025-06-11 09:29:20',NULL,'2025-06-11 09:26:18','2025-06-11 09:29:20'),(16,'App\\Models\\User',18,'auth_token','e7ce549cb39d6e06a73c0d533e76945d5071d427ed8cf66a43bb532a5a8ff624','[\"*\"]','2025-06-12 01:58:35',NULL,'2025-06-12 01:02:02','2025-06-12 01:58:35'),(17,'App\\Models\\User',18,'auth_token','d8b2abbfe1285c7417540f43210bd0ef4c4464b12b29d5b5299c2f252db66172','[\"*\"]','2025-06-12 08:56:39',NULL,'2025-06-12 08:11:04','2025-06-12 08:56:39'),(24,'App\\Models\\User',18,'auth_token','479e6b883a1bf752412bf7966c5192dd645329583187183b065c497ed6dcbca3','[\"*\"]','2025-06-12 14:34:22',NULL,'2025-06-12 14:34:18','2025-06-12 14:34:22'),(25,'App\\Models\\User',18,'auth_token','4ae681019ab655ce1d8bf7ea0d48ca3761472f4d80d1cb5ab48993b2a34ddb8b','[\"*\"]','2025-06-13 04:42:08',NULL,'2025-06-13 04:23:15','2025-06-13 04:42:08'),(29,'App\\Models\\User',11,'auth_token','495f507360d36b2d44a59cafa721f6381b5e5692664e20a3c58eccd767dc5706','[\"*\"]','2025-06-15 11:35:13',NULL,'2025-06-15 11:34:58','2025-06-15 11:35:13'),(30,'App\\Models\\User',11,'auth_token','950aceb7afcf79f253f5e6ab930bfe3a04e7451eb73cff21c298caf90540e8bd','[\"*\"]',NULL,NULL,'2025-06-15 11:50:17','2025-06-15 11:50:17'),(31,'App\\Models\\User',19,'auth_token','5e153e7f5761906756e8dc591c43d1ab04d2d0a74f03e53cde5ee2a2f746e8a7','[\"*\"]','2025-06-19 14:34:38',NULL,'2025-06-15 11:50:41','2025-06-19 14:34:38'),(42,'App\\Models\\User',18,'auth_token','af403fbf1aa77d61908f0e28a2adfad5ec5ffb49b1a2cc678077dc02d530e0db','[\"*\"]','2025-06-15 15:00:01',NULL,'2025-06-15 14:50:04','2025-06-15 15:00:01'),(53,'App\\Models\\User',18,'auth_token','7106cc018510167aca6885f224de5192d5ba4d4e18514e0a70f948587a665276','[\"*\"]','2025-06-16 04:23:19',NULL,'2025-06-16 03:30:03','2025-06-16 04:23:19'),(56,'App\\Models\\User',18,'auth_token','0de4ab9459bcc2e0b2b4da3c977f6b344e7057ad3812a3e1bcac8969fb82642b','[\"*\"]','2025-06-19 05:11:53',NULL,'2025-06-19 03:54:43','2025-06-19 05:11:53'),(58,'App\\Models\\User',18,'auth_token','90eaf57dd8f3c8d2a1950de3bf90b0d7f58674842f6b38c63db788c409ad2a2a','[\"*\"]','2025-06-19 08:35:32',NULL,'2025-06-19 07:46:11','2025-06-19 08:35:32'),(60,'App\\Models\\User',19,'auth_token','050709a378a8b81c393b035344e790d952ef51fc83c6f8ac9ed4b49b22d45497','[\"*\"]','2025-06-19 15:12:47',NULL,'2025-06-19 13:42:43','2025-06-19 15:12:47'),(65,'App\\Models\\User',18,'auth_token','5b1bcd2f66d4c1926619bb79d73ad5eadb91731adcd3997078cc40d0f50c829a','[\"*\"]','2025-06-20 03:35:13',NULL,'2025-06-20 02:22:49','2025-06-20 03:35:13'),(69,'App\\Models\\User',18,'auth_token','8fc3bbf3ae2f73be08458888f3c133a0bd5506a71740160fd3dadd94aafbbc87','[\"*\"]','2025-06-20 13:34:41',NULL,'2025-06-20 12:13:28','2025-06-20 13:34:41'),(71,'App\\Models\\User',18,'auth_token','5ee42a6f8854acd3870f73698b7a3c775408c96c940388d3f3562b0a654a7991','[\"*\"]','2025-06-21 07:16:07',NULL,'2025-06-21 07:01:13','2025-06-21 07:16:07'),(76,'App\\Models\\User',13,'auth_token','3d3f098e51310f59da1dd865dd624da518823915ea5ced91b265c97ee43d86eb','[\"*\"]','2025-06-22 07:06:11',NULL,'2025-06-22 04:37:21','2025-06-22 07:06:11'),(77,'App\\Models\\User',13,'auth_token','cb7ffc50f8dfef111ecbee648d3469f2ee7def4c412fe5689667ca186dbb8417','[\"*\"]','2025-06-22 05:26:36',NULL,'2025-06-22 05:26:05','2025-06-22 05:26:36'),(80,'App\\Models\\User',13,'auth_token','5cbf2cfaadbc6a2401901c6e32f795e720cd06312e871e87a84e2bb59debff10','[\"*\"]','2025-06-23 03:19:12',NULL,'2025-06-23 03:19:07','2025-06-23 03:19:12'),(81,'App\\Models\\User',13,'auth_token','5a108c047ee5e8196d7523a92cd76403886c0ad7d2c81fe144407ac3bc1c503a','[\"*\"]','2025-06-23 07:12:01',NULL,'2025-06-23 07:10:43','2025-06-23 07:12:01'),(83,'App\\Models\\User',18,'auth_token','e8ba62a163a29cc9b19329623a8deb78d20c172997bd9b0a47f3681b6affb9f1','[\"*\"]','2025-06-24 13:21:50',NULL,'2025-06-24 13:16:11','2025-06-24 13:21:50'),(84,'App\\Models\\User',13,'auth_token','8a9ca9832574380ffa7c668279dfaed78aa2fad1a5a158600b9335190ef3da83','[\"*\"]',NULL,NULL,'2025-06-24 13:22:16','2025-06-24 13:22:16'),(85,'App\\Models\\User',18,'auth_token','74c0caa6e3724be9a9269316de5210aab1431c2690e88ebbffd269e89596d2a3','[\"*\"]','2025-06-24 13:24:12',NULL,'2025-06-24 13:24:08','2025-06-24 13:24:12'),(86,'App\\Models\\User',13,'auth_token','2003c38e7ab0a2cad7a244344ccb9248b82a38fab3e6b057ace5c35e3a61a685','[\"*\"]','2025-06-24 14:44:03',NULL,'2025-06-24 13:25:27','2025-06-24 14:44:03'),(87,'App\\Models\\User',13,'auth_token','5ce867e0b88a92735c637c6d91a9ec801915bf38f1157aabf2a060c5085c21c6','[\"*\"]','2025-06-25 13:34:39',NULL,'2025-06-25 02:25:30','2025-06-25 13:34:39'),(88,'App\\Models\\User',13,'auth_token','4724a0f5af72a3cdd3be5ff2f25b5c66c57146c68a305d67befb890be653105b','[\"*\"]','2025-06-25 07:53:59',NULL,'2025-06-25 07:53:47','2025-06-25 07:53:59'),(91,'App\\Models\\User',18,'auth_token','06f37600042e59f29cd5d61684ea6b827be2a87217a1a1ca39500fd650fed961','[\"*\"]','2025-06-28 13:43:23',NULL,'2025-06-28 13:37:19','2025-06-28 13:43:23'),(93,'App\\Models\\User',13,'auth_token','dc799f35650df80c05f0a610e3ab947e238e5b0cb4db967754eadbeb776b16af','[\"*\"]','2025-06-28 13:57:23',NULL,'2025-06-28 13:49:02','2025-06-28 13:57:23'),(94,'App\\Models\\User',13,'auth_token','3a77851adabe1cc52932f2154dac9da9653a693bcf1b89dfc394b70ebe1d4b7d','[\"*\"]','2025-06-29 10:51:40',NULL,'2025-06-29 10:23:20','2025-06-29 10:51:40'),(96,'App\\Models\\User',17,'auth_token','8bc9be2651793d49d9339d7a17d0b94a37d102a3f1c6ceaa25956c35a8c2bd00','[\"*\"]','2025-06-29 12:03:25',NULL,'2025-06-29 12:03:07','2025-06-29 12:03:25'),(103,'App\\Models\\User',18,'auth_token','220a381049e88291d777d3991b758b0ad80649df88ccce8013988a7e98e0a4f1','[\"*\"]','2025-06-29 15:04:30',NULL,'2025-06-29 15:04:29','2025-06-29 15:04:30'),(112,'App\\Models\\User',11,'auth_token','c700e25ab713fa4212d5a1b528f84aa08e8d97ef3f3ad420b48e1c428be1fcb1','[\"*\"]','2025-06-29 16:43:53',NULL,'2025-06-29 16:25:07','2025-06-29 16:43:53'),(113,'App\\Models\\User',11,'auth_token','27c3ae8fd861f2f657fa7cb28dc3c99d7b293440949ae2047790ef6907136949','[\"*\"]','2025-06-29 18:20:01',NULL,'2025-06-29 18:04:52','2025-06-29 18:20:01'),(132,'App\\Models\\User',13,'auth_token','d8f7ae71aecd1f447bd5a2942ca7864a0c964c3a569977a765f0ca1a92328494','[\"*\"]','2025-06-30 01:34:28',NULL,'2025-06-30 01:32:59','2025-06-30 01:34:28'),(133,'App\\Models\\User',11,'auth_token','759ce97ba418f6c877c2f5177d4e832418e5f059f2e12740d65e82ca0489dd48','[\"*\"]',NULL,NULL,'2025-07-04 04:45:33','2025-07-04 04:45:33'),(143,'App\\Models\\User',13,'auth_token','005347ac2f844ec137549b8bf2bf7dcbca45cccc0ddd45703f31cec191cffe19','[\"*\"]','2025-07-04 09:43:12',NULL,'2025-07-04 09:40:18','2025-07-04 09:43:12'),(150,'App\\Models\\User',11,'auth_token','48ae39b010291788bd8de05ad0bb711250af51527f8c9e59a45868852729cfa9','[\"*\"]','2025-11-19 04:11:28',NULL,'2025-11-19 04:11:26','2025-11-19 04:11:28'),(152,'App\\Models\\User',11,'auth_token','ea646db961a49675aca27d0e1ab590526d524fd39c9a8ae93b55740539c2484c','[\"*\"]','2026-04-01 17:15:49',NULL,'2026-04-01 16:09:59','2026-04-01 17:15:49'),(153,'App\\Models\\User',11,'auth_token','032dcb953c2f462ba4f9d9108cbb03dbc7e99bcbab30fa111473710f8a09ff96','[\"*\"]','2026-04-02 05:14:16',NULL,'2026-04-02 05:09:12','2026-04-02 05:14:16'),(154,'App\\Models\\User',12,'auth_token','8172e4192e03b94e197d161e583fc6b8b549dcc8962ab58a3b005c9c096ebaae','[\"*\"]','2026-04-04 07:43:50',NULL,'2026-04-04 07:40:30','2026-04-04 07:43:50'),(171,'App\\Models\\User',13,'auth_token','c0140ea2a1572cf46dbaa954ab082be347d02f6a84861e1cdd4d201d63b0d7a2','[\"*\"]','2026-05-28 16:48:20',NULL,'2026-05-28 16:48:17','2026-05-28 16:48:20'),(182,'App\\Models\\User',11,'auth_token','510ade15c7bdc836caa09b38e2adab60af2eeecb8ac669c33fc2f0dde65d02f4','[\"*\"]','2026-05-29 16:22:06',NULL,'2026-05-29 16:20:15','2026-05-29 16:22:06'),(185,'App\\Models\\User',11,'auth_token','fa063d8246b548d1fd11221a8f44219ed7e609d860ee19125320aa39f9ba6096','[\"*\"]','2026-05-30 19:05:31',NULL,'2026-05-30 16:58:48','2026-05-30 19:05:31');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_studi`
--

DROP TABLE IF EXISTS `program_studi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `program_studi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fakultas` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `program_studi_id_fakultas_foreign` (`id_fakultas`),
  CONSTRAINT `program_studi_id_fakultas_foreign` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_studi`
--

LOCK TABLES `program_studi` WRITE;
/*!40000 ALTER TABLE `program_studi` DISABLE KEYS */;
INSERT INTO `program_studi` VALUES (2,'S1-Farmasi',10,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(3,'S1-Ilmu Hukum',4,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(4,'S1-Sastra Indonesia',9,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(5,'S1-Informatika',6,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(6,'S1-Ilmu Komunikasi',5,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(7,'S1-Psikologi',7,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(8,'S1-Agroteknologi',8,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(9,'S1-Akuntansi',3,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(10,'S1-Manajemen',3,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(11,'S1-Teknik Mesin',2,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(12,'S1-Ekonomi Pembangunan',3,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(13,'S1-Hubungan Internasional',5,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(14,'S1-Sistem Informasi',6,'2025-05-02 00:25:21','2025-05-02 00:25:21'),(15,'S1-Ilmu Gizi',1,'2025-05-02 00:25:21','2025-05-02 00:25:21');
/*!40000 ALTER TABLE `program_studi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staff_nip_unique` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'199802102004210201','Rudi Hartono','Staff','Bagian Keuangan','2025-05-01 08:38:11','2025-05-01 08:38:11'),(2,'199611152020352002','Dewi Anggraini','Staff','Bagian Keuangan','2025-05-01 08:38:11','2025-05-01 08:38:11'),(3,'199709222024032003','Sinta Lestari','Staff','Bagian Keuangan','2025-05-01 08:38:11','2025-05-01 08:38:11'),(4,'199804052020520405','Andi Wijaya','Staff','Bagian Keuangan','2025-05-01 08:38:11','2025-05-01 08:38:11'),(5,'199512032020620006','Citra Dewi','Staff','Bagian Keuangan','2025-05-01 08:38:11','2025-05-01 08:38:11'),(6,'199512032020320607','Arya Siregar','Staff','Bagian Keuangan','2025-05-01 02:08:43','2025-05-01 02:08:55');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tahun_akademik`
--

DROP TABLE IF EXISTS `tahun_akademik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tahun_akademik` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tahun_akademik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tahun_akademik`
--

LOCK TABLES `tahun_akademik` WRITE;
/*!40000 ALTER TABLE `tahun_akademik` DISABLE KEYS */;
INSERT INTO `tahun_akademik` VALUES (1,'2023/2024','Ganjil','2023-08-21','2024-01-26','non-aktif','2025-05-01 12:32:43','2025-05-01 12:32:43'),(2,'2023/2024','Genap','2024-01-24','2024-06-19','non-aktif','2025-05-01 12:32:43','2025-05-01 12:32:43'),(3,'2024/2025','Ganjil','2024-08-21','2025-01-26','non-aktif','2025-05-01 12:32:43','2025-05-01 12:32:43'),(4,'2024/2025','Genap','2026-05-28','2026-05-29','non-aktif','2025-05-01 12:32:43','2026-05-28 14:01:45'),(5,'2025/2026','Ganjil','2025-08-17','2026-01-22','non-aktif','2025-05-01 12:32:43','2025-05-01 12:32:43'),(6,'2025/2026','Genap','2026-01-22','2026-06-16','aktif','2025-05-01 12:32:43','2026-05-28 14:42:12'),(7,'2026/2027','Ganjil','2026-05-28','2027-05-28','non-aktif','2025-05-01 12:32:43','2026-05-28 14:02:30'),(8,'2026/2027','Genap','2027-01-23','2027-06-17','non-aktif','2025-05-01 12:32:43','2025-05-01 12:32:43'),(9,'2027/2028','Ganjil','2027-08-16','2028-01-23','non-aktif','2025-05-01 12:32:43','2025-05-01 12:32:43'),(10,'2027/2028','Genap','2028-01-24','2028-07-14','non-aktif','2025-05-01 12:32:43','2025-05-01 12:32:43');
/*!40000 ALTER TABLE `tahun_akademik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tingkat`
--

DROP TABLE IF EXISTS `tingkat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tingkat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_tingkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tingkat`
--

LOCK TABLES `tingkat` WRITE;
/*!40000 ALTER TABLE `tingkat` DISABLE KEYS */;
INSERT INTO `tingkat` VALUES (1,'Tahun Pertama','Mahasiswa tahun pertama.','2025-05-02 01:04:30','2025-05-02 01:04:30'),(2,'Tahun Kedua','Mahasiswa tahun kedua.','2025-05-02 01:04:30','2025-05-02 01:04:30'),(3,'Tahun Ketiga','Mahasiswa tahun ketiga.','2025-05-02 01:04:30','2025-05-02 01:04:30'),(4,'Tahun Keempat','Mahasiswa tahun keempat.','2025-05-02 01:04:30','2025-05-02 01:04:30'),(5,'Tahun Kelima','Mahasiswa tahun kelima (biasanya untuk program studi tertentu).','2025-05-02 01:04:30','2025-05-02 01:04:30'),(6,'Tahun Keenam','Mahasiswa tahun keenam (biasanya untuk program studi tertentu).','2025-05-02 01:04:30','2025-05-02 01:04:30'),(7,'Tahun Ketujuh','Mahasiswa tahun ketujuh (biasanya untuk program studi tertentu).','2025-05-02 01:04:30','2025-05-02 01:04:30'),(8,'Tahun Kedelapan','Mahasiswa tahun kedelapan (biasanya untuk program studi tertentu).','2025-05-02 01:04:30','2025-05-02 01:04:30');
/*!40000 ALTER TABLE `tingkat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ukt_semester`
--

DROP TABLE IF EXISTS `ukt_semester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ukt_semester` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_enrollment` bigint unsigned NOT NULL,
  `status` enum('aktif','tidak_aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `id_periode_pembayaran` bigint unsigned NOT NULL,
  `jumlah_ukt` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ukt_semester_id_enrollment_foreign` (`id_enrollment`),
  KEY `ukt_semester_id_periode_pembayaran_foreign` (`id_periode_pembayaran`),
  CONSTRAINT `ukt_semester_id_enrollment_foreign` FOREIGN KEY (`id_enrollment`) REFERENCES `enrollment_mahasiswa` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ukt_semester_id_periode_pembayaran_foreign` FOREIGN KEY (`id_periode_pembayaran`) REFERENCES `periode_pembayaran` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ukt_semester`
--

LOCK TABLES `ukt_semester` WRITE;
/*!40000 ALTER TABLE `ukt_semester` DISABLE KEYS */;
INSERT INTO `ukt_semester` VALUES (6,1,'aktif',1,4000000.00,'2025-06-29 15:45:30','2025-06-29 15:45:30'),(7,3,'aktif',1,2500000.00,'2025-06-29 15:45:30','2025-06-29 15:45:30'),(8,4,'aktif',1,2500000.00,'2025-06-29 15:45:30','2025-06-29 15:45:30'),(9,5,'aktif',1,6000000.00,'2025-06-30 00:46:51','2025-06-30 00:46:51'),(10,6,'aktif',1,6000000.00,'2025-07-04 06:44:55','2025-07-04 06:44:55');
/*!40000 ALTER TABLE `ukt_semester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('mahasiswa','staff','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahasiswa_id` bigint unsigned DEFAULT NULL,
  `staff_id` bigint unsigned DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_mahasiswa_id_index` (`mahasiswa_id`),
  KEY `users_staff_id_index` (`staff_id`),
  KEY `users_role_index` (`role`),
  CONSTRAINT `users_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (11,'4.33.2.08','$2y$12$VBJdC5DKfcvd/3Eh3peiJu.Hzk50879xf5oEzdBsZq/PAq0ZrpL1q','enggar@example.com','mahasiswa',3,NULL,1,NULL,NULL,'2025-06-09 11:26:06','2025-06-09 11:26:06'),(12,'admin','$2y$12$pcW.BHJhC6DShB8d5I4LV.PX8fd8fg1qNC51LKjNVp6Fx5bg80G.u','admin@example.com','admin',NULL,NULL,1,NULL,NULL,'2025-06-09 11:28:45','2025-06-09 11:28:45'),(13,'199802102004210201','$2y$12$VBJdC5DKfcvd/3Eh3peiJu.Hzk50879xf5oEzdBsZq/PAq0ZrpL1q','rudi@example.com','staff',NULL,1,1,NULL,NULL,'2025-06-09 11:31:54','2025-06-09 11:31:54'),(14,'199611152020352002','$2y$12$cYmPBHHQnDBPN/InH4Lr5OFja58IyPdKH6e1ZnS80mjCJAi.pAuMm','dewi123@example.com','staff',NULL,2,1,NULL,NULL,'2025-06-09 11:55:28','2025-06-09 11:57:13'),(15,'199709222024032003','$2y$12$WmvHTe0oR7/cDKwlWMmyROd87rLsSlOcrXlQuovWc5MvMcu1OpsDO','sinta@example.com','staff',NULL,3,1,NULL,NULL,'2025-06-11 09:22:35','2025-06-11 09:22:35'),(16,'199804052020520405','$2y$12$M.EEh1.bgA1gXpQpwPssZuWWhOkVPcVDsfXjBpvpTULy88HdY9YLC','andri@example.com','staff',NULL,4,1,NULL,NULL,'2025-06-11 09:23:13','2025-06-11 09:23:13'),(17,'199512032020620006','$2y$12$Bltgu4/CZQFMdaeGIQ7c/eFDYjMfPtf0i4SE9.EVivO8fU80UT3Nq','citra@example.com','staff',NULL,5,1,NULL,NULL,'2025-06-11 09:23:50','2025-06-11 09:23:50'),(18,'4.33.2.02','$2y$12$GKaUqpci2/5grq7hxOccnewONcJUWiCbrrd2BnwDUbqubEd/m2f7G','john@example.com','mahasiswa',1,NULL,1,NULL,NULL,'2025-06-11 09:24:40','2025-06-11 09:24:40'),(19,'4.33.2.05','$2y$12$4LfmDzLAC4/QncjrTJ1eUePruRJXq3ktmP3lnOzpRjugotAYXGU0y','jane@example.com','mahasiswa',2,NULL,1,NULL,NULL,'2025-06-11 09:25:41','2025-06-11 09:25:41'),(20,'4.33.2.42','$2y$12$kuMZfmZbSb0isyAFNI5bNumdraL0lc7LMQBmUi2bGbo6J4qo0RaIK','bimaset@gmail.com','mahasiswa',6,NULL,1,NULL,NULL,'2025-06-30 00:43:19','2025-06-30 00:43:19'),(21,'4.33.2.51','$2y$12$9o7.cP9f.VgHvLIjjp1kteN3ElkJPptrfAPp6vHJE18GBX5kk49v6','sintadewi@gmail.com','mahasiswa',9,NULL,1,NULL,NULL,'2025-07-04 06:43:59','2025-07-04 06:43:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-02 23:34:28
