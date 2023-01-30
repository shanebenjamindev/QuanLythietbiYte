-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 09:27 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlthietbiyte`
--

-- --------------------------------------------------------

--
-- Table structure for table `congty`
--

CREATE TABLE `congty` (
  `TenCT` varchar(100) NOT NULL,
  `DiaDiem` varchar(100) NOT NULL,
  `GiaiNgan` int(11) NOT NULL,
  `NhanVien` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ct_dathang`
--

CREATE TABLE `ct_dathang` (
  `id` int(11) NOT NULL,
  `id_donnhap` int(11) NOT NULL,
  `MaSP` char(10) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `GiaVon` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ct_dathang`
--

INSERT INTO `ct_dathang` (`id`, `id_donnhap`, `MaSP`, `TenSP`, `GiaVon`, `SoLuong`, `ThanhTien`) VALUES
(2, 1, 'SP1', 'Ống tim', 15000, 5, 75000),
(5, 2, 'SP2', 'Tai nghe thường', 300000, 10, 3000000),
(6, 3, 'SP1', 'Ống tim', 150000, 1, 150000),
(7, 3, 'SP2', 'Tai nghe thường', 300000, 2, 600000),
(8, 3, 'SP3', 'tai nghe y tế tốt', 450000, 1, 450000);

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

CREATE TABLE `dondathang` (
  `id` int(11) NOT NULL,
  `NgayNhap` date NOT NULL,
  `NguoiNhap` varchar(100) NOT NULL,
  `GhiChu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dondathang`
--

INSERT INTO `dondathang` (`id`, `NgayNhap`, `NguoiNhap`, `GhiChu`) VALUES
(1, '2021-09-08', 'Triệu Đoan Chí Vĩ', 'bt'),
(2, '2021-09-23', 'Trần Tấn Phát', ''),
(3, '2021-09-06', 'Trần Tấn Phát', 'ngon');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `ID` int(11) NOT NULL,
  `idKH` int(11) NOT NULL,
  `MaKH` int(10) NOT NULL,
  `MaLoaiSP` char(10) NOT NULL,
  `TenKH` varchar(100) NOT NULL,
  `TenSP` varchar(200) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaSP` float NOT NULL,
  `GiaBan` float NOT NULL,
  `ThanhTien` float NOT NULL,
  `ChiecKhau` int(11) NOT NULL,
  `SDT` int(11) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `NgayMua` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `GhiChu` varchar(11) NOT NULL,
  `MaTk` int(11) NOT NULL,
  `NguoiBan` varchar(150) NOT NULL,
  `id_MaDon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`ID`, `idKH`, `MaKH`, `MaLoaiSP`, `TenKH`, `TenSP`, `SoLuong`, `GiaSP`, `GiaBan`, `ThanhTien`, `ChiecKhau`, `SDT`, `DiaChi`, `NgayMua`, `GhiChu`, `MaTk`, `NguoiBan`, `id_MaDon`) VALUES
(144, 0, 2, 'LSP01', 'Khang', 'Ống tim', 1, 150000, 300000, 30000, 0, 113, 's', '2021-09-06 04:50:32', 'Đã Giao', 6, 'admin', 43),
(145, 0, 2, 'LSP02', 'Khang', 'Tai nghe thường', 1, 300000, 550000, 550000, 0, 113, 's', '2021-09-06 04:51:38', 'Đã Giao', 6, 'admin', 43),
(146, 39, 0, 'LSP01', 'a', 'Ống tim', 1, 150000, 30000, 0, 0, 0, 'a', '2021-09-06 05:20:37', 'Chưa Giao', 6, 'admin', 0),
(147, 87, 0, 'LSP02', 'a', 'Tai nghe thường', 1, 300000, 550000, 0, 0, 0, 'a', '2021-09-06 05:20:38', 'Chưa Giao', 6, 'admin', 0),
(148, 28, 0, 'LSP01', 'a', 'Ống tim', 1, 150000, 30000, 0, 0, 2, '2', '2021-09-06 05:25:49', 'Chưa Giao', 6, 'admin', 0),
(149, 40, 0, 'LSP02', 'a', 'Tai nghe thường', 1, 300000, 550000, 0, 0, 2, '2', '2021-09-06 05:25:49', 'Chưa Giao', 6, 'admin', 0),
(150, 0, 98, 'LSP02', 'Khang', 'Tai nghe thường', 1, 300000, 550000, 0, 0, 2, '2', '2021-09-06 05:35:53', 'Chưa Giao', 6, 'admin', 46),
(151, 0, 98, 'LSP01', 'Khang', 'Ống tim', 1, 150000, 30000, 0, 0, 2, '2', '2021-09-06 05:35:53', 'Chưa Giao', 6, 'admin', 46),
(152, 0, 2, 'LSP01', 'Khang', 'Ống tim', 1, 150000, 30000, 0, 0, 113, '', '2021-09-06 05:43:59', 'Chưa Giao', 6, 'admin', 48),
(153, 0, 2, 'LSP02', 'Khang', 'Tai nghe thường', 1, 300000, 550000, 0, 0, 113, '', '2021-09-06 05:43:59', 'Chưa Giao', 6, 'admin', 48),
(154, 0, 2, 'LSP01', 'Khang', 'Ống tim', 1, 150000, 30000, 0, 0, 113, '', '2021-09-06 05:45:28', 'Chưa Giao', 6, 'admin', 49),
(155, 0, 2, 'LSP02', 'Khang', 'Tai nghe thường', 1, 300000, 550000, 0, 0, 113, '', '2021-09-06 05:45:29', 'Chưa Giao', 6, 'admin', 49),
(156, 0, 2, 'LSP01', 'Khang', 'Ống tim', 1, 150000, 30000, 0, 0, 113, '', '2021-09-06 05:46:11', 'Chưa Giao', 6, 'admin', 50),
(157, 0, 2, 'LSP02', 'Khang', 'Tai nghe thường', 1, 300000, 550000, 0, 0, 113, '', '2021-09-06 05:46:11', 'Chưa Giao', 6, 'admin', 50),
(158, 0, 2, 'LSP01', 'Phát', 'Ống tim', 1, 150000, 30000, 0, 0, 113, '', '2021-09-06 05:48:00', 'Chưa Giao', 6, 'admin', 51),
(159, 0, 2, 'LSP02', 'Phát', 'Tai nghe thường', 1, 300000, 550000, 0, 0, 113, '', '2021-09-06 05:48:00', 'Chưa Giao', 6, 'admin', 51),
(160, 0, 2, 'LSP01', 'Khang', 'Ống tim', 1, 150000, 30000, 0, 0, 113, '', '2021-09-06 05:49:15', 'Chưa Giao', 6, 'admin', 52),
(161, 0, 2, 'LSP02', 'Khang', 'Tai nghe thường', 1, 300000, 550000, 0, 0, 113, '', '2021-09-06 05:49:15', 'Chưa Giao', 6, 'admin', 52),
(162, 0, 2, 'LSP01', 'Khang', 'Ống tim', 1, 150000, 30000, 0, 0, 113, 'Sóc lọ', '2021-09-06 05:50:53', 'Chưa Giao', 6, 'admin', 53),
(163, 0, 2, 'LSP02', 'Khang', 'Tai nghe thường', 1, 300000, 550000, 0, 0, 113, 'Sóc lọ', '2021-09-06 05:50:53', 'Chưa Giao', 6, 'admin', 53),
(164, 0, 2, 'LSP01', 'Khang', 'Ống tim', 1, 150000, 30000, 0, 0, 113, 'Sóc lọ', '2021-09-06 05:53:30', 'Chưa Giao', 6, 'admin', 54),
(165, 0, 2, 'LSP02', 'Khang', 'Tai nghe thường', 1, 300000, 550000, 0, 0, 113, 'Sóc lọ', '2021-09-06 05:53:30', 'Chưa Giao', 6, 'admin', 54);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `idKH` int(11) NOT NULL,
  `TenKH` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SDT` int(11) NOT NULL,
  `DiaChi` varchar(150) NOT NULL,
  `GhiChu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `idKH`, `TenKH`, `Email`, `SDT`, `DiaChi`, `GhiChu`) VALUES
(1, 1, 'Khang', 'yeu@gmail.com', 113, 'Sóc trăng', 'VIP'),
(2, 0, 'Phát', 'phat@gmail.com', 113, 'Sóc lọ', '');

-- --------------------------------------------------------

--
-- Table structure for table `kho`
--

CREATE TABLE `kho` (
  `MaKho` int(11) NOT NULL,
  `TenKho` varchar(50) NOT NULL,
  `NgayLap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kho`
--

INSERT INTO `kho` (`MaKho`, `TenKho`, `NgayLap`) VALUES
(1, 'Kho hàng lớn', '2021-05-05'),
(2, 'Kho hàng nhỏ', '2021-08-31'),
(3, 'Kho hàng phụ', '2021-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `MaLoaiSP` char(10) NOT NULL,
  `TenLoai` varchar(50) NOT NULL,
  `MaNCC` char(10) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ChuThich` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`MaLoaiSP`, `TenLoai`, `MaNCC`, `SoLuong`, `ChuThich`) VALUES
('LSP01', 'Ống Tim', 'NCC01', 18, 'Còn hàng'),
('LSP02', 'Tai Nghe Y Tế', 'NCC01', 50, 'còn hàng');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` char(10) NOT NULL,
  `TenNCC` varchar(50) NOT NULL,
  `DiaChi` varchar(60) NOT NULL,
  `SDT` int(11) NOT NULL,
  `Gmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `DiaChi`, `SDT`, `Gmail`) VALUES
('NCC01', 'Thiết bị y tế cần thơ', 'cần thơ', 779743329, 'vi@gmail.com'),
('NCC02', 'TNHH Y TẾ Sóc Trăng', 'Sóc Trăng', 12456885, 'TNYTSocTrang@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `nhomtaikhoan`
--

CREATE TABLE `nhomtaikhoan` (
  `TenNhom` int(11) NOT NULL,
  `NgayTao` date DEFAULT NULL,
  `SoNhanVien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhomtaikhoan`
--

INSERT INTO `nhomtaikhoan` (`TenNhom`, `NgayTao`, `SoNhanVien`) VALUES
(1, '2021-05-07', 4),
(2, '2021-08-21', 10),
(3, '2021-08-21', 2),
(4, '2021-08-21', 2),
(5, '2021-08-21', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` char(10) NOT NULL,
  `MaLoaiSP` char(10) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `GiaVon` float NOT NULL,
  `HinhAnh` char(20) NOT NULL,
  `TenNhaCungCap` varchar(100) NOT NULL,
  `LoaiSP` varchar(100) NOT NULL,
  `CT` varchar(200) NOT NULL,
  `GiaBan` float NOT NULL,
  `SoLuong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `MaLoaiSP`, `TenSP`, `GiaVon`, `HinhAnh`, `TenNhaCungCap`, `LoaiSP`, `CT`, `GiaBan`, `SoLuong`) VALUES
('SP1', 'LSP01', 'Ống tim', 150000, '0', 'Thiết bị y tế cần thơ', 'Ống Tim', 'Còn hàng', 30000, 21),
('SP2', 'LSP02', 'Tai nghe thường', 300000, '0', 'Thiết bị y tế cần thơ', 'Tai Nghe Y Tế', 'Còn Hàng', 550000, 42),
('SP3', 'LSP02', 'tai nghe y tế tốt', 450000, '0', 'Thiết bị y tế cần thơ', 'Tai Nghe Y Tế', 'Còn hàng', 900000, 31);

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `title`, `name`) VALUES
(1, 'Quản lý', 'Thanh Toán');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTk` int(11) NOT NULL,
  `TenTK` varchar(50) NOT NULL,
  `MatKhau` varchar(300) NOT NULL,
  `Gmail` varchar(150) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `Quyen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTk`, `TenTK`, `MatKhau`, `Gmail`, `SDT`, `Quyen`) VALUES
(1, 'Trần Tấn Phát', '2000', 'ttphat@gmail.com', '0706644880', 'admin'),
(2, 'Triệu Đoan Chí Vĩ', '2512', 'tdcvi@gmail.com', '0123456789', 'admin'),
(3, 'Phạm Hoàng Khang', '0606', 'phkhang@gmail.com', '01236666', 'admin'),
(4, 'Nguyễn Thanh Lễ', '12333', 'NTLe@gmail.com', '012345678', 'admin'),
(5, 'admin1', '2000', 'VPGiang@gmail.com', '1233241212', 'admin'),
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `taodonhang`
--

CREATE TABLE `taodonhang` (
  `id_MaDon` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `TongTien` float NOT NULL,
  `NgayBan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taodonhang`
--

INSERT INTO `taodonhang` (`id_MaDon`, `MaKH`, `DiaChi`, `TongTien`, `NgayBan`, `TrangThai`) VALUES
(43, 2, '0', 580000, '2021-09-06 05:07:35', 'Đã Giao'),
(44, 28, '0', 150000, '2021-09-06 05:25:49', 'Chưa Giao'),
(45, 40, '0', 450000, '2021-09-06 05:25:49', 'Chưa Giao'),
(46, 98, '0', 580000, '2021-09-06 05:35:53', 'Chưa giao'),
(47, 2, '0', 0, '2021-09-06 05:42:21', 'Chưa giao'),
(48, 2, '0', 580000, '2021-09-06 05:43:59', 'Chưa giao'),
(49, 2, '0', 580000, '2021-09-06 05:45:29', 'Chưa giao'),
(50, 2, '0', 580000, '2021-09-06 05:46:12', 'Chưa giao'),
(51, 2, '0', 580000, '2021-09-06 05:48:00', 'Chưa giao'),
(52, 2, '0', 580000, '2021-09-06 05:49:15', 'Chưa giao'),
(53, 2, '0', 580000, '2021-09-06 05:50:53', 'Chưa giao'),
(54, 2, '0', 0, '2021-09-06 05:54:09', 'Chưa giao');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ct_dathang`
--
ALTER TABLE `ct_dathang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_MaTKNV` (`MaTk`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Indexes for table `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`MaKho`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MaLoaiSP`),
  ADD KEY `fk_mancc` (`MaNCC`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Indexes for table `nhomtaikhoan`
--
ALTER TABLE `nhomtaikhoan`
  ADD PRIMARY KEY (`TenNhom`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `fk_maloaisp` (`MaLoaiSP`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTk`);

--
-- Indexes for table `taodonhang`
--
ALTER TABLE `taodonhang`
  ADD PRIMARY KEY (`id_MaDon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ct_dathang`
--
ALTER TABLE `ct_dathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `kho`
--
ALTER TABLE `kho`
  MODIFY `MaKho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhomtaikhoan`
--
ALTER TABLE `nhomtaikhoan`
  MODIFY `TenNhom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `taodonhang`
--
ALTER TABLE `taodonhang`
  MODIFY `id_MaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD CONSTRAINT `fk_mancc` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_maloaisp` FOREIGN KEY (`MaLoaiSP`) REFERENCES `loaisp` (`MaLoaiSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
