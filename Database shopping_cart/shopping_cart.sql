-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 11:33 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created`, `modified`, `status`) VALUES
(1, 'test', 'test@gmail.com', '1010101010', 'test address', '2021-02-21 09:09:52', '2021-02-21 09:09:52', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `grand_total` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `grand_total`, `created`, `modified`, `status`) VALUES
(1, 1, 111110.00, '2021-02-21 09:09:52', '2021-02-21 09:09:52', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `sub_total` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `sub_total`) VALUES
(1, 1, 3, 2, 111110.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`, `price`, `created`, `modified`, `status`) VALUES
(1, '3.jpg', 'Redmi Note 9 Pro', 'The Redmi Note 9 Pro is powerful and everyday work will go smoothly. The display is large and crisp, making games and movies look good.The 16.9cm(6.67\") large display with rounded corner design and dot notch display. Qualcomm Snapdragon 720G octa-core processor with 8nm technology; coupled with MIUI 11 system level optimisations enables low power consumption for a longer battery life. 48MP Quad camera with high resolution camera.', 18990.00, '2021-02-01 10:34:06', '2021-02-21 10:34:06', '1'),
(2, '2.jpg', 'Oneplus 8T', 'OnePlus 8T is a high-end smartphone from the brand, with 128GB storage space, best in class 8GB RAM, accompanied by an excellent display setup. OnePlus 8T features a 6.55-inch FHD+ Fluid AMOLED display, having a screen resolution of 1080 x 2400 pixels. The all new OnePlus 8T 5G - ultra stops at nothing - loaded with snapdragon 865 processor, 5G connectivity, 120hz fluid amoled display, 65W warp charging, rear quad camera setup', 42999.00, '2021-02-01 10:34:06', '2021-02-21 10:34:06', '1'),
(3, '4.jpg', 'Samsung Galaxy S21', 'Meet Galaxy S21 5G Designed to revolutionize video and photography, with beyond cinematic 8K resolution so you can snap epic photos right out of video. It has it all in two sizes: 64MP, our fastest chip and a massive all-day battery. Quad rear camera setup- Main Camera 108MP + Ultra Wide 12MP Dual Pixel Camera + Tele1 3X 10MP Dual Pixel Camera + Tele2 10x 10MP Dual pixel camera | 40MP front faciing camera.', 69999.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(4, '6.jpg', 'Vivo X50 Pro', 'The Vivo X50 Pro smartphone comes with 48MP+13MP+8MP+8MP rear camera with Gimbal Technology, 32MP front camera, Qualcomm Snapdragon 765G octa core processor, 8GB RAM, 256GB internal memory, 16.66 cm (6.56) FHD+ S-Amoled Curved Ultra O Display, a massive 4315mAh battery along with 33W fast charging and much more.', 49990.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(5, '8.jpg', 'Samsung Galaxy A71', 'Samsung galaxy a71 - ready action. Built for the era of life. Indulge in an immersive viewing experience with Quad Camera Setup - 64MP (F1.8) Main Camera +12MP (F2.2) Ultra Wide Camera +5MP(F2.2) Depth Camera +5MP(F2.4) Macro Camera and 32MP (F2.0) front facing Punch Hole Camera', 27999.00, '2021-03-01 09:54:21', '2021-03-01 09:54:21', '1'),
(6, '6.jpg', 'Realme X2 Pro', 'Realme X2 Pro is a stylish and performance-oriented smartphone on which you can watch movies, listen to songs, play games, and do many more things. The phone features a 6.5 inches Full-HD+ Super AMOLED display, a 90Hz refresh rate, and dual surround speakers that give you a delightful viewing experience. Also, it comes with the latest in-display fingerprint from Goodix so that the user can unlock the device phone quickly (up to 0.23 s).', 29999.00, '2021-03-01 09:58:08', '2021-03-01 09:58:08', '1'),
(17, '7.jpg', 'Poco X3', 'Display Features Display Size 16.94 cm (6.67 inch) Resolution 2400 x 1080 Pixels Resolution Type Full HD+ GPU Adreno 618 Display Type Full HD+ Display Other Display Features Corning Gorilla Glass 5 Screen Protection, 120 Hz Refresh Rate, 240 Hz Touch Sampling Rate, HDR 10 Os & Processor Features Operating System Android 10 Processor Type Qualcomm Snapdragon 732G Processor Core Octa Core Primary Clock Speed 2.3 GHz', 19800.00, '2021-03-01 10:04:28', '2021-03-01 10:04:28', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `phone`, `created`, `modified`, `status`) VALUES
(1, 'Akash', 'Phad', 'phad.akash2000@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', '9545627203', '2021-03-05 13:59:45', '2021-03-05 13:59:45', 1),
(2, 'test', 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Male', '7020958353', '2021-03-08 15:50:07', '2021-03-08 15:50:07', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
