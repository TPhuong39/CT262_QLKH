-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 11:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ct262_qlkh`
--

-- --------------------------------------------------------

--
-- Table structure for table `baohanh`
--

CREATE TABLE `baohanh` (
  `Id` int(11) NOT NULL,
  `BH_NgayBatDau` datetime NOT NULL,
  `BH_NgayKetThuc` datetime NOT NULL,
  `BH_TrangThai` varchar(50) NOT NULL,
  `BH_SoLan` int(11) NOT NULL,
  `sp_id` int(11) DEFAULT NULL,
  `kh_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `dh_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `CTDH_SoLuong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`dh_id`, `sp_id`, `CTDH_SoLuong`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 5, 3, NULL, NULL),
(5, 4, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `ID` int(11) NOT NULL,
  `DG_Loai` varchar(255) NOT NULL,
  `DG_NoiDung` text NOT NULL,
  `DG_SoSao` int(11) NOT NULL,
  `sp_id` int(11) DEFAULT NULL,
  `kh_id` int(11) DEFAULT NULL,
  `nv_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`ID`, `DG_Loai`, `DG_NoiDung`, `DG_SoSao`, `sp_id`, `kh_id`, `nv_id`, `created_at`, `updated_at`) VALUES
(1, 'Dịch vụ', 'Rất tuyệt', 5, NULL, 1, NULL, '2025-04-06 22:25:58', '2025-04-06 22:25:58'),
(2, 'Sửa chữa', 'Hehehe', 3, NULL, 1, NULL, '2025-04-06 22:26:21', '2025-04-06 22:26:21'),
(3, 'Dịch vụ', 'Quá tuyệt vời', 5, NULL, 1, NULL, '2025-04-07 00:48:45', '2025-04-07 00:48:45'),
(4, 'Dịch vụ', 'Quá dữ luôn', 5, NULL, 1, NULL, '2025-04-07 01:55:48', '2025-04-07 01:55:48'),
(5, 'Dịch vụ', 'Rất tuyệt vời', 5, NULL, 2, NULL, '2025-04-07 02:15:57', '2025-04-07 02:15:57'),
(6, 'Dịch vụ', 'rất tuyệt', 5, NULL, 1, NULL, '2025-04-07 20:40:54', '2025-04-07 20:40:54'),
(7, 'Dịch Vụ', 'tuyệt lắm', 4, NULL, 1, 1, '2025-04-08 01:41:40', '2025-04-08 01:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `DH_NgayDat` datetime NOT NULL,
  `DH_TongTien` decimal(15,2) NOT NULL,
  `DH_TrangThai` varchar(50) NOT NULL,
  `kh_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `DH_NgayDat`, `DH_TongTien`, `DH_TrangThai`, `kh_id`, `created_at`, `updated_at`) VALUES
(1, '2025-04-01 10:30:00', 32990000.00, 'Tiền mặt', 1, '2025-03-31 20:30:00', NULL),
(2, '2025-04-02 14:15:00', 41990000.00, 'Tiền mặt', 2, '2025-04-02 00:15:00', NULL),
(3, '2025-04-03 09:45:00', 18990000.00, 'Chuyển khoản', 1, '2025-04-02 19:45:00', NULL),
(4, '2025-04-04 16:00:00', 4990000.00, 'Tiền mặt', 3, '2025-04-04 02:00:00', NULL),
(5, '2025-04-05 11:20:00', 7990000.00, 'Chuyển khoản', 2, '2025-04-04 21:20:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotro`
--

CREATE TABLE `hotro` (
  `ID` int(11) NOT NULL,
  `HT_Loai` varchar(50) NOT NULL,
  `HT_NoiDung` text NOT NULL,
  `HT_TrangThai` varchar(50) NOT NULL,
  `kh_id` int(11) DEFAULT NULL,
  `nv_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `KH_HoTen` varchar(100) NOT NULL,
  `KH_NgaySinh` date DEFAULT NULL,
  `KH_DiaChi` text DEFAULT NULL,
  `KH_SDT` varchar(11) NOT NULL,
  `KH_Email` varchar(255) NOT NULL,
  `KH_MatKhau` varchar(255) NOT NULL,
  `lkh_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `KH_HoTen`, `KH_NgaySinh`, `KH_DiaChi`, `KH_SDT`, `KH_Email`, `KH_MatKhau`, `lkh_id`, `created_at`, `updated_at`) VALUES
(1, 'Trần Quốc Tuấn', '2002-10-20', 'An Khánh, Ninh Kiều, Cần Thơ', '0113456789', 'toan@gmail.com', '$2y$10$47/ibjC9B3BDCJmdV6YLeurDVo/h/59DjViHmBUSwrKm4YddQ5yRO', 1, NULL, '2025-04-07 20:29:49'),
(2, 'Nguyễn Văn Bình', '2003-03-23', 'Phụng Hiệp, Hậu Giang', '0786987576', 'binh@gmail.com', '$2y$10$GUjKRCFK28JrhK5BCo0J.ewH8YwrMssufhrMTTJE6qxKXz1arGkFa', 1, '2025-04-06 22:31:17', '2025-04-06 22:31:17'),
(3, 'Lê Đức Trọng', '2001-12-19', 'Tri Tôn, An Giang', '0786787576', 'trong@gmail.com', '$2y$10$bCFe9Th8hzWSyl6zyNGuXeOrvZxfNMxk0qKIN3Mle6DTeIV6gcR5e', 1, '2025-04-07 07:45:15', '2025-04-07 20:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(11) NOT NULL,
  `KM_Ten` varchar(100) NOT NULL,
  `KM_PhanTramGiam` double(8,2) NOT NULL,
  `KM_NgayBatDau` datetime NOT NULL,
  `KM_NgayKetThuc` datetime NOT NULL,
  `KM_DieuKien` text NOT NULL,
  `KM_SoLuong` int(11) NOT NULL,
  `lkh_id` int(11) DEFAULT NULL,
  `sp_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `KM_Ten`, `KM_PhanTramGiam`, `KM_NgayBatDau`, `KM_NgayKetThuc`, `KM_DieuKien`, `KM_SoLuong`, `lkh_id`, `sp_id`, `created_at`, `updated_at`) VALUES
(1, 'Giảm 40%', 40.00, '2025-04-01 00:00:00', '2025-04-30 00:00:00', 'Hóa đơn trên 5 triệu đồng', 100, 1, 1, NULL, '2025-04-07 09:42:04'),
(3, 'Samsung Sale Sập Sàn', 15.00, '2025-05-01 00:00:00', '2025-05-10 00:00:00', 'Áp dụng cho đơn hàng từ 10 triệu trở lên', 200, 1, 5, '2025-04-07 20:24:13', '2025-04-07 20:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `loaikhachhang`
--

CREATE TABLE `loaikhachhang` (
  `id` int(11) NOT NULL,
  `LKH_TenLoai` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaikhachhang`
--

INSERT INTO `loaikhachhang` (`id`, `LKH_TenLoai`, `created_at`, `updated_at`) VALUES
(1, 'Khách hàng lẻ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_03_24_102628_create_loai_khach_hangs_table', 1),
(7, '2025_03_24_102629_create_san_phams_table', 1),
(8, '2025_03_24_102630_create_khach_hangs_table', 1),
(9, '2025_03_24_102631_create_don_hangs_table', 1),
(10, '2025_03_24_102632_create_nhan_viens_table', 1),
(11, '2025_03_24_102633_create_bao_hanhs_table', 1),
(12, '2025_03_24_102633_create_chi_tiet_don_hangs_table', 1),
(13, '2025_03_24_102634_create_danh_gias_table', 1),
(14, '2025_03_24_102634_create_ho_tros_table', 1),
(15, '2025_03_24_102634_create_khuyen_mais_table', 1),
(16, '2025_03_24_113902_add_role_to_users_table', 2),
(17, '2025_03_31_104700_add_phone_and_role_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `NV_HoTen` varchar(100) NOT NULL,
  `NV_DiaChi` text DEFAULT NULL,
  `NV_SDT` varchar(11) NOT NULL,
  `NV_Email` varchar(255) NOT NULL,
  `NV_MatKhau` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `NV_HoTen`, `NV_DiaChi`, `NV_SDT`, `NV_Email`, `NV_MatKhau`, `created_at`, `updated_at`) VALUES
(1, 'Trần Văn Dũng', NULL, '0789678678', 'dung@gmail.com', '$2y$10$axAsfrSWseRXVCTlwGch8ONwnK9VZpWRVvjFj6D8dHIN6LLZeyMOy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `SP_Ten` varchar(100) NOT NULL,
  `SP_Loai` varchar(50) NOT NULL,
  `SP_Gia` double(8,2) NOT NULL,
  `SP_MoTa` text NOT NULL,
  `SP_HinhAnh` varchar(255) DEFAULT NULL,
  `SP_TrangThai` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `SP_Ten`, `SP_Loai`, `SP_Gia`, `SP_MoTa`, `SP_HinhAnh`, `SP_TrangThai`, `created_at`, `updated_at`) VALUES
(1, 'Samsung S25 Ultra', 'Điện thoại', 300000.00, 'Điện thoại thông minh', NULL, 'còn hàng', NULL, NULL),
(2, 'Samsung Galaxy Z Fold5', 'Điện thoại gập', 999999.99, 'Màn hình gập tiên tiến, hiệu năng mạnh mẽ', '', 'Còn Hàng', NULL, NULL),
(3, 'Samsung Galaxy Tab S9', 'Máy tính bảng', 999999.99, 'Màn hình AMOLED 120Hz, bút S-Pen hỗ trợ vẽ và ghi chú', '', 'Còn Hàng', NULL, NULL),
(4, 'Samsung Galaxy Watch 6', 'Đồng hồ thông minh', 999999.99, 'Theo dõi sức khoẻ, hỗ trợ thể thao, pin lâu', '', 'Còn Hàng', NULL, NULL),
(5, 'Samsung Galaxy Buds2 Pro', 'Tai nghe', 999999.99, 'Chống ồn chủ động, âm thanh chất lượng cao', '', 'Còn Hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baohanh`
--
ALTER TABLE `baohanh`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_baohanh_sp` (`sp_id`),
  ADD KEY `fk_baohanh_kh` (`kh_id`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`dh_id`),
  ADD KEY `fk_ctdh_sp` (`sp_id`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_danhgia_sp` (`sp_id`),
  ADD KEY `fk_danhgia_kh` (`kh_id`),
  ADD KEY `fk_danhgia_nv` (`nv_id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_donhang_kh` (`kh_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotro`
--
ALTER TABLE `hotro`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_hotro_kh` (`kh_id`),
  ADD KEY `fk_hotro_nv` (`nv_id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_khachhang_lkh` (`lkh_id`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_khuyenmai_lkh` (`lkh_id`),
  ADD KEY `fk_khuyenmai_sp` (`sp_id`);

--
-- Indexes for table `loaikhachhang`
--
ALTER TABLE `loaikhachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baohanh`
--
ALTER TABLE `baohanh`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotro`
--
ALTER TABLE `hotro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loaikhachhang`
--
ALTER TABLE `loaikhachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baohanh`
--
ALTER TABLE `baohanh`
  ADD CONSTRAINT `fk_baohanh_kh` FOREIGN KEY (`kh_id`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `fk_baohanh_sp` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_chitietdonhang_sp` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `fk_ctdh_dh` FOREIGN KEY (`dh_id`) REFERENCES `donhang` (`id`),
  ADD CONSTRAINT `fk_ctdh_sp` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `fk_danhgia_kh` FOREIGN KEY (`kh_id`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `fk_danhgia_nv` FOREIGN KEY (`nv_id`) REFERENCES `nhanvien` (`id`),
  ADD CONSTRAINT `fk_danhgia_sp` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_donhang_kh` FOREIGN KEY (`kh_id`) REFERENCES `khachhang` (`id`);

--
-- Constraints for table `hotro`
--
ALTER TABLE `hotro`
  ADD CONSTRAINT `fk_hotro_kh` FOREIGN KEY (`kh_id`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `fk_hotro_nv` FOREIGN KEY (`nv_id`) REFERENCES `nhanvien` (`id`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `fk_khachhang_lkh` FOREIGN KEY (`lkh_id`) REFERENCES `loaikhachhang` (`id`);

--
-- Constraints for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `fk_khuyenmai_lkh` FOREIGN KEY (`lkh_id`) REFERENCES `loaikhachhang` (`id`),
  ADD CONSTRAINT `fk_khuyenmai_sp` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
