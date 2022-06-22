-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 21, 2022 lúc 05:57 PM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdl_congnghe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `code_cart` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_user`, `code_cart`, `cart_status`) VALUES
(1, 3, 16935, 1),
(2, 2, 17307, 1),
(3, 2, 9772, 1),
(4, 3, 13980, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_detail`
--

CREATE TABLE `tbl_cart_detail` (
  `id_cart_detail` int(11) NOT NULL,
  `code_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_detail`
--

INSERT INTO `tbl_cart_detail` (`id_cart_detail`, `code_cart`, `id_product`, `quantify`) VALUES
(1, 16935, 1, 1),
(2, 16935, 5, 1),
(3, 17307, 1, 1),
(4, 9772, 2, 1),
(5, 13980, 1, 2),
(6, 13980, 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_category` int(11) NOT NULL,
  `title_category` varchar(255) NOT NULL,
  `img_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `title_category`, `img_category`) VALUES
(1, 'Laptop', 'fa-solid fa-laptop'),
(2, 'PC-Gaming', 'fa-solid fa-desktop'),
(3, 'SmartPhone', 'fa-solid fa-mobile-screen'),
(4, 'Mouse', 'fas fa-mouse'),
(5, 'Headphone', 'fa-solid fa-camera'),
(6, 'Wifi', 'fa-solid fa-wifi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detail_product`
--

CREATE TABLE `tbl_detail_product` (
  `id_detail_product` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `img_detail_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_detail_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_detail_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_detail_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_product` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` int(11) NOT NULL,
  `rom` int(11) NOT NULL,
  `display` varchar(255) NOT NULL,
  `core` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_detail_product`
--

INSERT INTO `tbl_detail_product` (`id_detail_product`, `id_product`, `img_detail_1`, `img_detail_2`, `img_detail_3`, `img_detail_4`, `info_product`, `color`, `ram`, `rom`, `display`, `core`) VALUES
(1, 1, 'detail-1-1.png', 'detail-1-2.png', 'detail-1-3.png', 'detail-1-4.png', 'Máy tính bảng Macbook Pro M1 thế hệ mới vừa ra mắt được trang bị vi xử lý M1 do chính Apple tự thiết kế. Hứa hẹn mang đến hiệu năng cực kì mạnh mẽ, thời gian sử dụng cực kì ấn tượng.\r\n\r\nVẫn kế thừa thiết kế từ người tiềm nhiệm trước đó của mình, Macbook Pro 2020 M1 vẫn sở hữu thiết kế nhôm nguyên khối, các đường viền trên máy được cắt CNC tỉ mỉ, sắc xảo.', 'Bạc', 8, 512, '13', 'i5-8300H'),
(2, 2, 'detail-2-1.png', 'detail-2-3.png', 'detail-2-3.png', 'detail-2-4.png', 'Ấn tượng đầu tiên của mình khi trên tay chiếc máy là sự cơ động dễ dàng cầm nắm bằng một tay. Trọng lượng chỉ 1.19 kg cùng độ mỏng 15.9 mm hoàn toàn linh hoạt để mình có thể xách bằng tay hay bỏ trong balo khi đi lại. Tổng quan chiếc máy rất đúng như tên gọi là “Swift” đó chính là nhanh, mượt và linh hoạt.', 'Bạc', 16, 512, '15.6', 'i7-8300H');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_product` float NOT NULL,
  `price_sale` float NOT NULL,
  `img_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`id_product`, `name_product`, `price_product`, `price_sale`, `img_product`, `category_product`) VALUES
(1, 'Laptop LENOVO V15', 22000000, 19000000, 'product-3.jpg', 1),
(2, 'Laptop LENOVO V15', 23000000, 21000000, 'product-2.jpg', 1),
(3, 'Dell Precision 5550 2020', 19000000, 17900000, 'product-4.png', 1),
(4, 'MacBook Pro 2020', 24000000, 22000000, 'product-5.jpg', 1),
(5, 'PC ASUS ROG STRIX G35DX', 51999000, 49499000, 'product-20.png', 2),
(6, 'PC Gigabyte Aorus Model X', 85999000, 87999000, 'product-21.png', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`) VALUES
(1, 'thangbd', '123', 'thangepu@gmail.com'),
(2, 'lam', '123', 'lam@gmail.com'),
(3, 'duc', '123', 'duc@gmail.com'),
(4, 'admin', '123', 'admin@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  ADD PRIMARY KEY (`id_cart_detail`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `tbl_detail_product`
--
ALTER TABLE `tbl_detail_product`
  ADD PRIMARY KEY (`id_detail_product`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  MODIFY `id_cart_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_detail_product`
--
ALTER TABLE `tbl_detail_product`
  MODIFY `id_detail_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
