-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 05:50 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `danhgiasp`
--

CREATE TABLE `danhgiasp` (
  `id_bl` int(255) NOT NULL,
  `id_sp` int(255) NOT NULL,
  `hoten_nguoibinhluan` varchar(255) NOT NULL,
  `sodienthoai_nguoibinhluan` varchar(11) NOT NULL,
  `email_nguoibinhluan` varchar(255) DEFAULT NULL,
  `img_binhluan` text NOT NULL,
  `sosao` int(255) NOT NULL,
  `noidungdanhgia` text,
  `ngaydanhgia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `id_nv` int(255) NOT NULL,
  `id_nvgh` int(255) NOT NULL,
  `ngay_dathang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `noi_nhanhang` text NOT NULL,
  `ghichu` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `ma_loaisp` varchar(20) NOT NULL,
  `ten_loaisp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id_nv` int(255) NOT NULL,
  `ten_nv` varchar(255) NOT NULL,
  `tentaikhoan_nv` varchar(255) NOT NULL,
  `matkhau_nv` varchar(255) NOT NULL,
  `sdt_nv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien_giaohang`
--

CREATE TABLE `nhanvien_giaohang` (
  `id_nvgh` int(255) NOT NULL,
  `ten_nvgh` varchar(255) NOT NULL,
  `sdt1` varchar(255) NOT NULL,
  `sdt2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `gia_ban` float NOT NULL,
  `img_sp` varchar(200) NOT NULL,
  `mausac` varchar(200) DEFAULT NULL,
  `sl_sp` int(255) NOT NULL,
  `sosao` int(255) NOT NULL,
  `danhgia` int(255) NOT NULL,
  `khuyenmai` varchar(255) NOT NULL,
  `giatrikhuyenmai` int(255) DEFAULT NULL,
  `ngaybatdau_km` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ngayketthuc_km` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ngay_tao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ngay_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trangthaisp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(255) NOT NULL,
  `hoten_tv` varchar(255) NOT NULL,
  `tentaikhoan` varchar(100) NOT NULL,
  `matkhau` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `path_anh_tv` varchar(500) NOT NULL,
  `diachi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `thongsokithuat`
--

CREATE TABLE `thongsokithuat` (
  `id_sp` int(255) NOT NULL,
  `ma_loaisp` varchar(20) NOT NULL,
  `manhinh` text,
  `hedieuhanh` text,
  `camera_truoc` text,
  `camera_sau` text,
  `cpu` text,
  `ram` text,
  `bonhotrong` text,
  `sim` text,
  `dungluongpin` text,
  `o_cung` text,
  `card_manhinh` text,
  `congketnoi` text,
  `thietke` text,
  `kichthuoc` text,
  `thoidiemramat` text,
  `ketnoimang` text,
  `hotrosim` text,
  `congnghemanhinh` text,
  `kichthuocmanhinh` text,
  `thoigiansudungpin` text,
  `ketnoivoihedieuhanh` text,
  `chatlieumat` text,
  `duongkinhmat` text,
  `ketnoi` text,
  `ngonngu` text,
  `theodoisuckhoe` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `id_th` int(255) NOT NULL,
  `ma_loaisp` varchar(20) NOT NULL,
  `ma_th` varchar(200) NOT NULL,
  `ten_tenth` varchar(200) NOT NULL,
  `img_th` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `danhgiasp`
--
ALTER TABLE `danhgiasp`
  ADD PRIMARY KEY (`id_bl`),
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
  ADD KEY `id` (`id`),
  ADD KEY `id_nv` (`id_nv`),
  ADD KEY `id_nvgh` (`id_nvgh`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`ma_loaisp`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id_nv`);

--
-- Indexes for table `nhanvien_giaohang`
--
ALTER TABLE `nhanvien_giaohang`
  ADD PRIMARY KEY (`id_nvgh`);

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
-- Indexes for table `thongsokithuat`
--
ALTER TABLE `thongsokithuat`
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `ma_loaisp` (`ma_loaisp`);

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
  MODIFY `id_cthd` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `danhgiasp`
--
ALTER TABLE `danhgiasp`
  MODIFY `id_bl` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_img`
--
ALTER TABLE `ds_img`
  MODIFY `id_anh` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id_gh` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hd` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id_nv` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nhanvien_giaohang`
--
ALTER TABLE `nhanvien_giaohang`
  MODIFY `id_nvgh` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `id_th` int(255) NOT NULL AUTO_INCREMENT;
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
-- Constraints for table `danhgiasp`
--
ALTER TABLE `danhgiasp`
  ADD CONSTRAINT `danhgiasp_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

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
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`id`) REFERENCES `thanhvien` (`id`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`id_nv`) REFERENCES `nhanvien` (`id_nv`),
  ADD CONSTRAINT `hoadon_ibfk_3` FOREIGN KEY (`id_nvgh`) REFERENCES `nhanvien_giaohang` (`id_nvgh`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ma_loaisp`) REFERENCES `loaisp` (`ma_loaisp`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_th`) REFERENCES `thuonghieu` (`id_th`);

--
-- Constraints for table `thongsokithuat`
--
ALTER TABLE `thongsokithuat`
  ADD CONSTRAINT `thongsokithuat_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `thongsokithuat_ibfk_2` FOREIGN KEY (`ma_loaisp`) REFERENCES `loaisp` (`ma_loaisp`);

--
-- Constraints for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD CONSTRAINT `thuonghieu_ibfk_1` FOREIGN KEY (`ma_loaisp`) REFERENCES `loaisp` (`ma_loaisp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
