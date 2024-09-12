-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 28, 2023 lúc 03:20 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_movie`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `MaNguoidung` int(11) NOT NULL,
  `HoTen` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Tuoi` int(2) NOT NULL,
  `GioiTinh` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`MaNguoidung`, `HoTen`, `Email`, `SDT`, `Tuoi`, `GioiTinh`) VALUES
(1, 'admin', 'admin@gmail.com', '123123123', 45, 'Nam'),
(2, 'Khach2', 'KH02@gmail.com', '123213123', 21, 'Nam'),
(3, 'Khach1', 'KH01@gmail.com', '213123123', 22, 'Nu'),
(4, 'kaka', 'vvanu@gmail.com', '9084579546', 20, 'Nam'),
(5, 'Nhan Vien', 'threater@gmail.com', '1231232131', 22, 'Nu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangnhap`
--

CREATE TABLE `tbl_dangnhap` (
  `MaDN` int(11) NOT NULL,
  `MaRap` int(11) NOT NULL,
  `TenDangNhap` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LoaiNguoidung` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangnhap`
--

INSERT INTO `tbl_dangnhap` (`MaDN`, `MaRap`, `TenDangNhap`, `MatKhau`, `LoaiNguoidung`) VALUES
(1, 1, 'admin', 'admin', 0),
(2, 2, 'KH02@gmail.com', '123', 2),
(3, 3, 'KH01@gmail.com', '123', 2),
(4, 4, 'vvanu@gmail.com', '123456789', 0),
(5, 5, 'threater', 'threater', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_datve`
--

CREATE TABLE `tbl_datve` (
  `MaDatVe` int(11) NOT NULL,
  `MaVe` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MaRap` int(11) NOT NULL,
  `MaNguoidung` int(11) NOT NULL,
  `MaLichChieu` int(11) NOT NULL,
  `MaPhongChieu` int(11) NOT NULL,
  `SoChoNgoi` int(3) NOT NULL,
  `ThanhTien` int(5) NOT NULL,
  `NgayDatVe` date NOT NULL,
  `Ngay` date NOT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_datve`
--

INSERT INTO `tbl_datve` (`MaDatVe`, `MaVe`, `MaRap`, `MaNguoidung`, `MaLichChieu`, `MaPhongChieu`, `SoChoNgoi`, `ThanhTien`, `NgayDatVe`, `Ngay`, `TrangThai`) VALUES
(6, '', 3, 3, 6, 1, 1, 70000, '2017-05-22', '2017-05-22', 1),
(7, '', 13, 3, 5, 2, 1, 70000, '2017-05-22', '2017-05-22', 1),
(12, 'BKID3183258', 4, 3, 15, 3, 2, 140000, '2023-05-28', '2023-05-28', 1),
(13, 'BKID8689512', 4, 3, 15, 3, 3, 210000, '2023-05-28', '2023-05-28', 1),
(14, 'BKID6875431', 3, 3, 12, 2, 1, 60000, '2023-05-28', '2023-05-28', 1),
(15, 'BKID9847115', 4, 3, 18, 3, 1, 70000, '2023-05-28', '2023-05-28', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lichchieu`
--

CREATE TABLE `tbl_lichchieu` (
  `MaLichChieu` int(11) NOT NULL,
  `MaTgChieu` int(11) NOT NULL COMMENT 'ma thoi gian ',
  `MaRap` int(11) NOT NULL,
  `MaPhim` int(11) NOT NULL,
  `NgayKhoiChieu` date NOT NULL,
  `TrangThai` int(11) NOT NULL COMMENT '1 la co san',
  `r_TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lichchieu`
--

INSERT INTO `tbl_lichchieu` (`MaLichChieu`, `MaTgChieu`, `MaRap`, `MaPhim`, `NgayKhoiChieu`, `TrangThai`, `r_TrangThai`) VALUES
(1, 9, 4, 1, '2017-05-01', 1, 1),
(2, 10, 4, 1, '2017-05-01', 1, 1),
(3, 11, 4, 2, '2017-05-01', 1, 1),
(4, 12, 4, 2, '2017-05-01', 1, 1),
(5, 1, 3, 1, '2017-05-01', 1, 1),
(6, 2, 3, 1, '2017-05-01', 1, 1),
(7, 3, 3, 1, '2017-05-01', 1, 1),
(8, 4, 3, 1, '2017-05-01', 1, 1),
(9, 5, 3, 2, '2017-05-01', 1, 1),
(10, 6, 3, 2, '2017-05-01', 1, 1),
(11, 7, 3, 2, '2017-05-01', 1, 1),
(12, 8, 3, 2, '2017-05-01', 1, 1),
(13, 1, 3, 3, '2017-02-25', 1, 0),
(14, 2, 3, 3, '2017-02-25', 1, 0),
(15, 9, 4, 4, '2017-05-28', 1, 0),
(16, 10, 4, 4, '2017-05-28', 1, 0),
(17, 11, 4, 4, '2017-05-28', 1, 0),
(18, 12, 4, 5, '2017-05-28', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `MaLienhe` int(11) NOT NULL,
  `TenLienhe` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SDT_Lienhe` int(11) NOT NULL,
  `Noidung` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`MaLienhe`, `TenLienhe`, `Email`, `SDT_Lienhe`, `Noidung`) VALUES
(2, 'sdfg', 'KKK@gmail.com', 2147483647, ' ádfghjawesrdtfxcv');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phim`
--

CREATE TABLE `tbl_phim` (
  `MaPhim` int(11) NOT NULL,
  `MaRap` int(11) NOT NULL COMMENT 'Ma Rap',
  `TenPhim` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DienVien` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TheLoai` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NgayKhoiChieu` date NOT NULL,
  `image` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `video_url` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_phim`
--

INSERT INTO `tbl_phim` (`MaPhim`, `MaRap`, `TenPhim`, `DienVien`, `TheLoai`, `NgayKhoiChieu`, `image`, `video_url`, `TrangThai`) VALUES
(1, 3, 'LẬT MẶT 6: TẤM VÉ ĐỊNH MỆNH', ' Lý Hải, Quốc Cường, Trung Dũng, Huy Khánh, Thanh Thức, Trần Kim Hải, Huỳnh Thi, Diệp Bảo Ngọc, Tú Tri, Quỳnh Như, Tạ Lâm, bé Thùy Linh…', 'Phim Hài, Hành Động, Hồi hộp, Tâm Lý', '2023-04-28', 'images/P5.jpg', 'https://youtu.be/2EnP2tVC00Q', 0),
(2, 3, 'SIÊU LỪA GẶP SIÊU LẦY', 'Anh Tú, Mạc Văn Khoa, Ngọc Phước, Trung Lùn, NSƯT Mỹ Duyên, Đại Nghĩa, Lâm Vỹ Dạ, BB Trần, Cát Tường, Hứa Minh Đạt…', 'Phim Hài – Hành Động ', '2017-05-05', 'images/P3.jpg', 'https://youtu.be/ecNMIlP7wIs', 0),
(3, 3, 'CON NHÓT MÓT CHỒNG', 'Thái Hòa, Thu Trang, Tiến Luật, NSND Hồng Vân, Huỳnh Phương, Vinh Râu, Thái Vũ,...', 'Phim Hài, Tâm Lý', '2017-05-01', 'images/P8.jpg', 'https://youtu.be/QDLyLlmex-Y', 0),
(4, 3, 'Ma Lai Rút Ruột', 'Nink Chanya McClory, Kritsanapoom Phibunsongkhram', 'Phim Kinh Dị', '2017-05-19', 'images/P2.jpg', 'https://youtu.be/a6mrWVcAJ74', 0),
(5, 3, 'Nhà Bà Nữ', 'Trấn Thành, Lê Giang, NSND Ngọc Giàu, Khả Như, Huỳnh Uyển Ân, Song Luân, Lê Dương Bảo Lâm, NSND Việt Anh, NSƯT Công Ninh, Ngân Quỳnh, Lý Hạo Mạnh Quỳnh, Phương Lan…', 'Phim Hài ,Tâm Lý', '2017-05-12', 'images/P4.jpg', 'https://youtu.be/pg4L29p98Kw', 0),
(6, 4, 'Cô gái từ quá khứ', 'Ninh Dương Lan Ngọc, Kaity Nguyễn, NSND Lê Khanh, NSƯT Hữu Châu, Ốc Thanh Vân... ', 'Phim Bí Ẩn, Hồi Hộp, Tâm Lý', '2022-10-13', 'images/P10.jpg', 'https://youtu.be/Z0RhrRHyDbw', 0),
(7, 5, 'NGƯỜI NHỆN: DU HÀNH VŨ TRỤ NHỆN', 'Shameik Moore', 'Hài Hước', '2023-06-02', 'images/Screenshot (1).png', 'https://youtu.be/HVgwRbQfpCc', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phimmoi`
--

CREATE TABLE `tbl_phimmoi` (
  `MaPhimMoi` int(11) NOT NULL,
  `TenPhimMoi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DienVien` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NgayKhoiChieu` date NOT NULL,
  `TheLoai` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Anh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_phimmoi`
--

INSERT INTO `tbl_phimmoi` (`MaPhimMoi`, `TenPhimMoi`, `DienVien`, `NgayKhoiChieu`, `TheLoai`, `Anh`) VALUES
(3, 'ĐẤT RỪNG PHƯƠNG NAM', 'Hồng Ánh, Huỳnh Hạo Khang, Mai Tài Phến, Công Ninh, Hứa Vĩ Văn, Tuyền Mập, Tuấn Trần.', '2023-10-20', 'Phim Tâm Lý', 'P7.jpg'),
(5, 'FAST AND FURIOUS X', 'Vin Diesel, Jason Momoa, Brie Larson,…', '2023-05-19', 'Phim Hành Động, Tội phạm', 'P8.jpg'),
(6, 'PHIM ĐIỆN ẢNH DORAEMON: NOBITA VÀ VÙNG ĐẤT LÝ TƯỞNG TRÊN BẦU TRỜI', '', '2023-05-26', 'Phim Hoạt Hình', 'P6.jpg'),
(7, 'THIỆN ÁC ĐỐI ĐẦU', 'Denzel Washington, Dakota Fanning, Sonia Ammar, Remo Girone', '2023-09-01', 'Phim Hành Động', 'P9.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phongchieu`
--

CREATE TABLE `tbl_phongchieu` (
  `MaPhongChieu` int(11) NOT NULL,
  `MaRap` int(11) NOT NULL,
  `TenPhongChieu` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ChoNgoi` int(11) NOT NULL,
  `Gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_phongchieu`
--

INSERT INTO `tbl_phongchieu` (`MaPhongChieu`, `MaRap`, `TenPhongChieu`, `ChoNgoi`, `Gia`) VALUES
(1, 3, 'Phòng chiếu 1', 100, 70000),
(2, 3, 'Phòng chiếu 2', 150, 60000),
(3, 4, 'Phòng chiếu 3', 200, 70000),
(4, 14, 'Phòng chiếu 4', 300, 75000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_rap`
--

CREATE TABLE `tbl_rap` (
  `MaRap` int(11) NOT NULL,
  `TenRap` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Tinh_ThanhPho` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TinhTrang` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_rap`
--

INSERT INTO `tbl_rap` (`MaRap`, `TenRap`, `DiaChi`, `Tinh_ThanhPho`, `TinhTrang`, `Pin`) VALUES
(2, 'CGV Vincom Mỹ Tho', 'Tiền Giang', 'Tiền Giang', 'Sắp khai trương', 691523),
(3, 'CGV CT Plaza', '60A Trường Sơn, P.2, Q. Tân Bình, Tp. Hồ Chí Minh', 'Q. Tân Bình, Tp. Hồ Chí Minh', 'Hoạt Động', 691523),
(4, 'CGV Vincom Bà Triệu', ' VinCom Center Hà Nội, 191 Bà Triệu, Q. Hai Bà Trưng, Tp. Hà Nội', 'Tp. Hà Nội', 'Hoạt Động', 691523),
(5, 'CGV Hùng Vương Plaza', 'Hùng Vương Plaza, 126 Hùng Vương, Q.5, Tp. Hồ Chí Minh', 'Q.5, Tp. Hồ Chí Minh', 'Hoạt Động', 691523),
(9, 'CGV Vivo City', 'TTTM SC VivoCity, 1058 Nguyễn Văn Linh, Q.7, Tp. Hồ Chí Minh', 'Q.7, Tp. Hồ Chí Minh', 'Hoạt Động', 600001),
(10, 'CGV Vincom Gò Vấp', 'TTTM Vincom Plaza Gò Vấp, 12 Phan Văn Trị, P.7, Q. Gò Vấp, Tp. Hồ Chí Minh', 'Q. Gò Vấp, Tp. Hồ Chí Minh', 'Hoạt Động', 600001),
(13, 'CGV Vincom Landmark 81', 'B1, Vincom Center Landmark 81, 722 Điện Biên Phủ, P. 22, Q. Bình Thạnh, Tp. Hồ Chí Minh', 'Q. Bình Thạnh, Tp. Hồ Chí Minh', 'Hoạt Động', 130012),
(14, 'CGV Satra Củ Chi', 'TTTM Satra Củ Chi, Số 1239, Tỉnh Lộ 8, Ấp Thạnh An, Xã Trung An, Huyện Củ Chi, TP.HCM', 'Huyện Củ Chi, TP.HCM', 'Sắp khai trương', 691554);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thoigianchieu`
--

CREATE TABLE `tbl_thoigianchieu` (
  `MaTgChieu` int(11) NOT NULL,
  `MaPhongChieu` int(11) NOT NULL,
  `BuoiChieu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ThoiGianChieu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thoigianchieu`
--

INSERT INTO `tbl_thoigianchieu` (`MaTgChieu`, `MaPhongChieu`, `BuoiChieu`, `ThoiGianChieu`) VALUES
(1, 1, 'Sáng', '10:00:00'),
(2, 1, 'Chiều', '14:00:00'),
(3, 1, 'Tối', '18:00:00'),
(4, 1, 'Đêm', '21:00:00'),
(5, 2, 'Sáng', '10:00:00'),
(6, 2, 'Chiều', '14:00:00'),
(7, 2, 'Tối', '18:00:00'),
(8, 2, 'Đêm', '21:00:00'),
(9, 3, 'Sáng', '10:00:00'),
(10, 3, 'Chiều', '14:00:00'),
(11, 3, 'Tối', '19:00:00'),
(12, 3, 'Đêm', '21:00:00'),
(14, 4, 'Sáng', '11:00:00'),
(15, 4, 'Chiều', '14:00:00'),
(16, 4, 'Đêm', '21:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`MaNguoidung`);

--
-- Chỉ mục cho bảng `tbl_dangnhap`
--
ALTER TABLE `tbl_dangnhap`
  ADD PRIMARY KEY (`MaDN`),
  ADD KEY `MaNguoidung` (`MaRap`);

--
-- Chỉ mục cho bảng `tbl_datve`
--
ALTER TABLE `tbl_datve`
  ADD PRIMARY KEY (`MaDatVe`),
  ADD KEY `MaRap` (`MaRap`),
  ADD KEY `MaLichChieu` (`MaLichChieu`),
  ADD KEY `MaPhongChieu` (`MaPhongChieu`),
  ADD KEY `MaNguoidung` (`MaNguoidung`);

--
-- Chỉ mục cho bảng `tbl_lichchieu`
--
ALTER TABLE `tbl_lichchieu`
  ADD PRIMARY KEY (`MaLichChieu`),
  ADD KEY `MaTgChieu` (`MaTgChieu`),
  ADD KEY `MaRap` (`MaRap`),
  ADD KEY `MaPhim` (`MaPhim`);

--
-- Chỉ mục cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`MaLienhe`);

--
-- Chỉ mục cho bảng `tbl_phim`
--
ALTER TABLE `tbl_phim`
  ADD PRIMARY KEY (`MaPhim`),
  ADD KEY `MaRap` (`MaRap`);

--
-- Chỉ mục cho bảng `tbl_phimmoi`
--
ALTER TABLE `tbl_phimmoi`
  ADD PRIMARY KEY (`MaPhimMoi`);

--
-- Chỉ mục cho bảng `tbl_phongchieu`
--
ALTER TABLE `tbl_phongchieu`
  ADD PRIMARY KEY (`MaPhongChieu`),
  ADD KEY `MaRap` (`MaRap`);

--
-- Chỉ mục cho bảng `tbl_rap`
--
ALTER TABLE `tbl_rap`
  ADD PRIMARY KEY (`MaRap`);

--
-- Chỉ mục cho bảng `tbl_thoigianchieu`
--
ALTER TABLE `tbl_thoigianchieu`
  ADD PRIMARY KEY (`MaTgChieu`),
  ADD KEY `MaPhongChieu` (`MaPhongChieu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `MaNguoidung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_dangnhap`
--
ALTER TABLE `tbl_dangnhap`
  MODIFY `MaDN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_datve`
--
ALTER TABLE `tbl_datve`
  MODIFY `MaDatVe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_lichchieu`
--
ALTER TABLE `tbl_lichchieu`
  MODIFY `MaLichChieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `MaLienhe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_phim`
--
ALTER TABLE `tbl_phim`
  MODIFY `MaPhim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_phimmoi`
--
ALTER TABLE `tbl_phimmoi`
  MODIFY `MaPhimMoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_phongchieu`
--
ALTER TABLE `tbl_phongchieu`
  MODIFY `MaPhongChieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_rap`
--
ALTER TABLE `tbl_rap`
  MODIFY `MaRap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_thoigianchieu`
--
ALTER TABLE `tbl_thoigianchieu`
  MODIFY `MaTgChieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_dangnhap`
--
ALTER TABLE `tbl_dangnhap`
  ADD CONSTRAINT `tbl_dangnhap_ibfk_1` FOREIGN KEY (`MaDN`) REFERENCES `tbl_dangky` (`MaNguoidung`);

--
-- Các ràng buộc cho bảng `tbl_datve`
--
ALTER TABLE `tbl_datve`
  ADD CONSTRAINT `tbl_datve_ibfk_1` FOREIGN KEY (`MaRap`) REFERENCES `tbl_rap` (`MaRap`),
  ADD CONSTRAINT `tbl_datve_ibfk_2` FOREIGN KEY (`MaLichChieu`) REFERENCES `tbl_lichchieu` (`MaLichChieu`),
  ADD CONSTRAINT `tbl_datve_ibfk_3` FOREIGN KEY (`MaPhongChieu`) REFERENCES `tbl_phongchieu` (`MaPhongChieu`),
  ADD CONSTRAINT `tbl_datve_ibfk_4` FOREIGN KEY (`MaNguoidung`) REFERENCES `tbl_dangky` (`MaNguoidung`);

--
-- Các ràng buộc cho bảng `tbl_lichchieu`
--
ALTER TABLE `tbl_lichchieu`
  ADD CONSTRAINT `tbl_lichchieu_ibfk_1` FOREIGN KEY (`MaTgChieu`) REFERENCES `tbl_thoigianchieu` (`MaTgChieu`),
  ADD CONSTRAINT `tbl_lichchieu_ibfk_2` FOREIGN KEY (`MaRap`) REFERENCES `tbl_rap` (`MaRap`),
  ADD CONSTRAINT `tbl_lichchieu_ibfk_3` FOREIGN KEY (`MaPhim`) REFERENCES `tbl_phim` (`MaPhim`);

--
-- Các ràng buộc cho bảng `tbl_phim`
--
ALTER TABLE `tbl_phim`
  ADD CONSTRAINT `tbl_phim_ibfk_1` FOREIGN KEY (`MaRap`) REFERENCES `tbl_rap` (`MaRap`);

--
-- Các ràng buộc cho bảng `tbl_phongchieu`
--
ALTER TABLE `tbl_phongchieu`
  ADD CONSTRAINT `tbl_phongchieu_ibfk_1` FOREIGN KEY (`MaRap`) REFERENCES `tbl_rap` (`MaRap`);

--
-- Các ràng buộc cho bảng `tbl_thoigianchieu`
--
ALTER TABLE `tbl_thoigianchieu`
  ADD CONSTRAINT `tbl_thoigianchieu_ibfk_1` FOREIGN KEY (`MaPhongChieu`) REFERENCES `tbl_phongchieu` (`MaPhongChieu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
