-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 03:04 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_ad` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_ad`, `username`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id_cthd` int(255) NOT NULL,
  `id_hd` int(255) NOT NULL,
  `id_sp` int(255) NOT NULL,
  `dongia` float NOT NULL,
  `sl_sp` int(255) NOT NULL,
  `thanhtien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id_cthd`, `id_hd`, `id_sp`, `dongia`, `sl_sp`, `thanhtien`) VALUES
(1, 32, 337, 12344400, 2, 24688800),
(2, 33, 338, 12009900, 1, 12009900),
(3, 34, 337, 12344400, 1, 12344400);

-- --------------------------------------------------------

--
-- Table structure for table `ds_img`
--

CREATE TABLE `ds_img` (
  `id_anh` int(255) NOT NULL,
  `id_sp` int(255) NOT NULL,
  `img` text NOT NULL,
  `mau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id_gh` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `id_sp` int(255) NOT NULL,
  `soluong` int(255) NOT NULL,
  `trangthai` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hd` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `ngaydat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ngaygiao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id_hd`, `id`, `ngaydat`, `ngaygiao`) VALUES
(32, 6, '2021-02-06 02:26:26', '2021-02-06 02:26:26'),
(33, 6, '2021-02-06 02:28:02', '2021-02-06 02:28:02'),
(34, 6, '2021-02-06 02:28:20', '2021-02-06 02:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id_kh` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `ten_kh` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `diachi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id_kh`, `id`, `ten_kh`, `sdt`, `diachi`) VALUES
(33, 7, 'Sơn Thươl', '0377087266', 'Sóc Trăng'),
(34, 6, 'Sơn Thươl 123', '0377087266', 'Sóc Trăng');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `ma_loaisp` varchar(20) NOT NULL,
  `ten_loaisp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`ma_loaisp`, `ten_loaisp`) VALUES
('ĐT', 'Điện Thoại');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(255) NOT NULL,
  `ma_loaisp` varchar(20) NOT NULL,
  `id_th` int(255) NOT NULL,
  `ten_sp` varchar(100) NOT NULL,
  `gia_sp` float NOT NULL,
  `img_sp` varchar(200) NOT NULL,
  `sl_sp` int(255) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ngay_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ma_loaisp`, `id_th`, `ten_sp`, `gia_sp`, `img_sp`, `sl_sp`, `ngay_tao`, `ngay_update`) VALUES
(337, 'ĐT', 1, 'iPhone 13 Pro', 12344400, './img_sp/iphone-12-pro-max-vang-new-600x600-600x600.jpg', 10, '2021-02-06 01:01:00', '2021-02-06 01:01:00'),
(338, 'ĐT', 1, 'Samsung Galaxy Tab A 8.0', 12009900, './img_sp/samsung-galaxy-z-fold-2-vang-600x600-600x600.jpg', 20, '2021-02-06 01:20:06', '2021-02-06 01:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(255) NOT NULL,
  `tentaikhoan` varchar(100) NOT NULL,
  `matkhau` varchar(200) NOT NULL,
  `gioitinh` varchar(20) NOT NULL,
  `path_anh_tv` varchar(300) NOT NULL,
  `sothich` varchar(200) DEFAULT NULL,
  `nghenghiep` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `tentaikhoan`, `matkhau`, `gioitinh`, `path_anh_tv`, `sothich`, `nghenghiep`) VALUES
(6, 'Sơn Thươl', 'c4ca4238a0b923820dcc509a6f75849b', 'Nam', './img_tv/125315430_317183609725087_2469722111177829115_n.jpg', 'Du Lịch.', 'Sinh Viên'),
(7, 'Lý Chiến', '202cb962ac59075b964b07152d234b70', 'Nam', './img_tv/130236341_2904114506490301_5365165624450315706_o.jpg', 'Du Lịch.', 'Nhân Viên');

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `id_th` int(255) NOT NULL,
  `ma_loaisp` varchar(20) NOT NULL,
  `ma_th` varchar(20) NOT NULL,
  `ten_tenth` varchar(20) NOT NULL,
  `img_th` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuonghieu`
--

INSERT INTO `thuonghieu` (`id_th`, `ma_loaisp`, `ma_th`, `ten_tenth`, `img_th`) VALUES
(1, 'ĐT', 'iP', 'iPhone', './img_th/iPhone.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_ad`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id_cthd`),
  ADD KEY `id_hd` (`id_hd`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `ds_img`
--
ALTER TABLE `ds_img`
  ADD PRIMARY KEY (`id_anh`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id_gh`),
  ADD KEY `id` (`id`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`ma_loaisp`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `ma_loaisp` (`ma_loaisp`),
  ADD KEY `id_th` (`id_th`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`id_th`),
  ADD KEY `ma_loaisp` (`ma_loaisp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_ad` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id_cthd` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ds_img`
--
ALTER TABLE `ds_img`
  MODIFY `id_anh` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id_gh` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hd` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_kh` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;
--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `id_th` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`id_hd`) REFERENCES `hoadon` (`id_hd`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Constraints for table `ds_img`
--
ALTER TABLE `ds_img`
  ADD CONSTRAINT `ds_img_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`id`) REFERENCES `thanhvien` (`id`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`id`) REFERENCES `thanhvien` (`id`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`id`) REFERENCES `thanhvien` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ma_loaisp`) REFERENCES `loaisp` (`ma_loaisp`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_th`) REFERENCES `thuonghieu` (`id_th`);

--
-- Constraints for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD CONSTRAINT `thuonghieu_ibfk_1` FOREIGN KEY (`ma_loaisp`) REFERENCES `loaisp` (`ma_loaisp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
