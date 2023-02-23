-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 24, 2022 lúc 02:07 AM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbunizone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `maChiTietDH` int(10) NOT NULL AUTO_INCREMENT,
  `maMon` int(10) NOT NULL,
  `soLuong` int(10) NOT NULL,
  `magiaodich` varchar(50) NOT NULL,
  `ngaythang` timestamp NOT NULL,
  `tinhtrangdon` int(11) NOT NULL,
  `huydon` int(11) NOT NULL,
  `maKH` int(11) NOT NULL,
  PRIMARY KEY (`maChiTietDH`),
  KEY `chitietdh_mon` (`maMon`),
  KEY `chitietdonhang_KH` (`maKH`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`maChiTietDH`, `maMon`, `soLuong`, `magiaodich`, `ngaythang`, `tinhtrangdon`, `huydon`, `maKH`) VALUES
(2, 37, 2, '4', '2022-12-22 01:40:51', 1, 0, 17),
(3, 37, 2, '4', '2022-12-22 01:40:51', 1, 0, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `maDH` int(10) NOT NULL AUTO_INCREMENT,
  `maKh` int(10) NOT NULL,
  `tongTienThanhToan` float NOT NULL,
  `trangThai` int(2) NOT NULL,
  `ngayDatHang` date NOT NULL,
  `diaChiGiaoHang` varchar(100) NOT NULL,
  `hinhThucGiaoHang` varchar(100) NOT NULL,
  `hinhThucThanhToan` varchar(100) NOT NULL,
  PRIMARY KEY (`maDH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

DROP TABLE IF EXISTS `giohang`;
CREATE TABLE IF NOT EXISTS `giohang` (
  `maGH` int(10) NOT NULL AUTO_INCREMENT,
  `tenMon` varchar(100) NOT NULL,
  `maMon` int(10) NOT NULL,
  `gia` int(11) NOT NULL,
  `hinhAnh` text NOT NULL,
  `soLuong` int(11) NOT NULL,
  PRIMARY KEY (`maGH`),
  KEY `fk_maGH_maKH` (`maMon`),
  KEY `GH_M` (`tenMon`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`maGH`, `tenMon`, `maMon`, `gia`, `hinhAnh`, `soLuong`) VALUES
(88, 'CÃ  phÃª sá»¯a', 28, 20000, '1671637829_nengioithieu.png', 1),
(89, 'TrÃ  sá»¯a matcha', 25, 20000, '1671637632_nengioithieu.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `maKH` int(10) NOT NULL AUTO_INCREMENT,
  `tenKH` varchar(100) NOT NULL,
  `matKhauKH` varchar(300) NOT NULL,
  `SDT` int(10) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  PRIMARY KEY (`maKH`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`maKH`, `tenKH`, `matKhauKH`, `SDT`, `DiaChi`, `Email`) VALUES
(14, 'Quáº¿ TrÃ¢n', '12345', 367677451, 'Long an', 'nguyengiangquetran2k1@gmail.com'),
(16, 'trÃ¢n', '12345', 367677451, 'long an', 'quetran@gmail.com'),
(17, 'hoai bao', '2101', 99, 'longan', 'bao@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

DROP TABLE IF EXISTS `loai`;
CREATE TABLE IF NOT EXISTS `loai` (
  `maLoai` int(10) NOT NULL AUTO_INCREMENT,
  `tenLoai` varchar(100) NOT NULL,
  PRIMARY KEY (`maLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maLoai`, `tenLoai`) VALUES
(15, 'TrÃ  sá»¯a'),
(20, 'Soda'),
(21, 'Sinh tá»‘'),
(22, 'CÃ  phÃª'),
(23, 'TrÃ '),
(26, 'Ca phe ne'),
(27, 'Ca phe ne');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon`
--

DROP TABLE IF EXISTS `mon`;
CREATE TABLE IF NOT EXISTS `mon` (
  `maMon` int(10) NOT NULL AUTO_INCREMENT,
  `tenMon` varchar(100) NOT NULL,
  `gia` float NOT NULL,
  `hinhAnh` text NOT NULL,
  `moTa` varchar(500) NOT NULL,
  `maLoai` int(10) NOT NULL,
  PRIMARY KEY (`maMon`),
  KEY `mon_loai` (`maLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `mon`
--

INSERT INTO `mon` (`maMon`, `tenMon`, `gia`, `hinhAnh`, `moTa`, `maLoai`) VALUES
(25, 'TrÃ  sá»¯a matcha', 20000, '1671637632_nengioithieu.png', 'mÃ´ táº£ ', 15),
(26, 'Soda blue', 30000, '1671637767_nengioithieu.png', 'mota', 20),
(27, 'TrÃ  Ä‘Ã o', 30000, '1671637797_nengioithieu.png', 'mota', 23),
(28, 'CÃ  phÃª sá»¯a', 20000, '1671637829_nengioithieu.png', 'mota', 22),
(29, 'Sinh tá»‘ dÃ¢u', 40000, '1671637869_nengioithieu.png', 'mota', 21),
(30, 'TrÃ  sá»¯a Olong', 30000, '1671637942_nengioithieu.png', 'mota', 15),
(31, 'TrÃ  sá»¯a thÃ¡i', 20000, '1671638076_nengioithieu.png', 'mota', 15),
(34, 'Soda', 20000, '1671670017_nengioithieu.png', 'TrÃ  sá»¯a socola trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en lÃ  sá»± káº¿t há»£p giá»¯a lá»¥c trÃ  vÃ  nho táº¡o vá»‹ ngá»t thanh khi uá»‘ng. ', 20),
(35, 'Soda dÃ¢u', 40000, '1671670122_nengioithieu.png', 'TrÃ  sá»¯a socola trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en lÃ  sá»± káº¿t há»£p giá»¯a lá»¥c trÃ  vÃ  nho táº¡o vá»‹ ngá»t thanh khi uá»‘ng. ÄÃ¢y thuá»™c nhÃ³m danh má»¥c TrÃ  sá»¯a mÃ  nháº¥t Ä‘á»‹nh báº¡n pháº£i thá»­ Ä‘á»ƒ cáº£m nháº­n nhá»¯ng ly trÃ  bÃ¡n cháº¡y nháº¥t cá»§a chÃºng tÃ´i nhÆ° TrÃ  sá»¯a trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en, TrÃ  sá»¯a vá»‹ phomai pudding trá»©ng â€¦', 20),
(36, 'CÃ  phÃª Ä‘en', 20000, '1671670160_nengioithieu.png', 'TrÃ  sá»¯a socola trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en lÃ  sá»± káº¿t há»£p giá»¯a lá»¥c trÃ  vÃ  nho táº¡o vá»‹ ngá»t thanh khi uá»‘ng. ÄÃ¢y thuá»™c nhÃ³m danh má»¥c TrÃ  sá»¯a mÃ  nháº¥t Ä‘á»‹nh báº¡n pháº£i thá»­ Ä‘á»ƒ cáº£m nháº­n nhá»¯ng ly trÃ  bÃ¡n cháº¡y nháº¥t cá»§a chÃºng tÃ´i nhÆ° TrÃ  sá»¯a trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en, TrÃ  sá»¯a vá»‹ phomai pudding trá»©ng â€¦', 22),
(37, 'CÃ  phÃª socola', 30000, '1671670185_nengioithieu.png', 'TrÃ  sá»¯a socola trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en lÃ  sá»± káº¿t há»£p giá»¯a lá»¥c trÃ  vÃ  nho táº¡o vá»‹ ngá»t thanh khi uá»‘ng. ÄÃ¢y thuá»™c nhÃ³m danh má»¥c TrÃ  sá»¯a mÃ  nháº¥t Ä‘á»‹nh báº¡n pháº£i thá»­ Ä‘á»ƒ cáº£m nháº­n nhá»¯ng ly trÃ  bÃ¡n cháº¡y nháº¥t cá»§a chÃºng tÃ´i nhÆ° TrÃ  sá»¯a trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en, TrÃ  sá»¯a vá»‹ phomai pudding trá»©ng â€¦', 22),
(38, 'TrÃ  Ã´long sen', 40000, '1671670222_nengioithieu.png', 'TrÃ  sá»¯a socola trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en lÃ  sá»± káº¿t há»£p giá»¯a lá»¥c trÃ  vÃ  nho táº¡o vá»‹ ngá»t thanh khi uá»‘ng. ÄÃ¢y thuá»™c nhÃ³m danh má»¥c TrÃ  sá»¯a mÃ  nháº¥t Ä‘á»‹nh báº¡n pháº£i thá»­ Ä‘á»ƒ cáº£m nháº­n nhá»¯ng ly trÃ  bÃ¡n cháº¡y nháº¥t cá»§a chÃºng tÃ´i nhÆ° TrÃ  sá»¯a trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en, TrÃ  sá»¯a vá»‹ phomai pudding trá»©ng â€¦', 23),
(39, 'TrÃ  máº­t ong', 30000, '1671670253_nengioithieu.png', 'TrÃ  sá»¯a socola trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en lÃ  sá»± káº¿t há»£p giá»¯a lá»¥c trÃ  vÃ  nho táº¡o vá»‹ ngá»t thanh khi uá»‘ng. ÄÃ¢y thuá»™c nhÃ³m danh má»¥c TrÃ  sá»¯a mÃ  nháº¥t Ä‘á»‹nh báº¡n pháº£i thá»­ Ä‘á»ƒ cáº£m nháº­n nhá»¯ng ly trÃ  bÃ¡n cháº¡y nháº¥t cá»§a chÃºng tÃ´i nhÆ° TrÃ  sá»¯a trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en, TrÃ  sá»¯a vá»‹ phomai pudding trá»©ng â€¦', 23),
(40, 'Sinh tá»‘ Ä‘Ã o', 30000, '1671670380_nengioithieu.png', 'TrÃ  sá»¯a socola trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en lÃ  sá»± káº¿t há»£p giá»¯a lá»¥c trÃ  vÃ  nho táº¡o vá»‹ ngá»t thanh khi uá»‘ng. ÄÃ¢y thuá»™c nhÃ³m danh má»¥c TrÃ  sá»¯a mÃ  nháº¥t Ä‘á»‹nh báº¡n pháº£i thá»­ Ä‘á»ƒ cáº£m nháº­n nhá»¯ng ly trÃ  bÃ¡n cháº¡y nháº¥t cá»§a chÃºng tÃ´i nhÆ° TrÃ  sá»¯a trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en, TrÃ  sá»¯a vá»‹ phomai pudding trá»©ng â€¦', 21),
(41, 'Sinh tá»‘ xoÃ i', 40000, '1671670403_nengioithieu.png', 'TrÃ  sá»¯a socola trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en lÃ  sá»± káº¿t há»£p giá»¯a lá»¥c trÃ  vÃ  nho táº¡o vá»‹ ngá»t thanh khi uá»‘ng. ÄÃ¢y thuá»™c nhÃ³m danh má»¥c TrÃ  sá»¯a mÃ  nháº¥t Ä‘á»‹nh báº¡n pháº£i thá»­ Ä‘á»ƒ cáº£m nháº­n nhá»¯ng ly trÃ  bÃ¡n cháº¡y nháº¥t cá»§a chÃºng tÃ´i nhÆ° TrÃ  sá»¯a trÃ¢n chÃ¢u Ä‘Æ°á»ng Ä‘en, TrÃ  sá»¯a vá»‹ phomai pudding trá»©ng â€¦', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoanadmin`
--

DROP TABLE IF EXISTS `taikhoanadmin`;
CREATE TABLE IF NOT EXISTS `taikhoanadmin` (
  `maAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `mailAdmin` varchar(300) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `passAdmin` varchar(100) NOT NULL,
  PRIMARY KEY (`maAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `taikhoanadmin`
--

INSERT INTO `taikhoanadmin` (`maAdmin`, `mailAdmin`, `userName`, `passAdmin`) VALUES
(6, 'nguyen@gmail.com', 'tranque n', '1'),
(7, 'nguyengiangquetran2k1@gmail.com', 'tran', '123411111111111'),
(11, 'nguyengiangquetran2k1@gmail.com', 'tran', '1234');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdh_mon` FOREIGN KEY (`maMon`) REFERENCES `mon` (`maMon`),
  ADD CONSTRAINT `chitietdonhang_KH` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `GH_Mon` FOREIGN KEY (`maMon`) REFERENCES `mon` (`maMon`);

--
-- Các ràng buộc cho bảng `mon`
--
ALTER TABLE `mon`
  ADD CONSTRAINT `mon_loai` FOREIGN KEY (`maLoai`) REFERENCES `loai` (`maLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
