-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2019 at 08:07 AM
-- Server version: 10.2.24-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u401986195_cat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(10) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_logo` varchar(255) NOT NULL,
  `parent_id` int(255) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `cat_name`, `cat_logo`, `parent_id`, `level`, `created_at`, `updated_at`) VALUES
(4, 'cat ssdd', 'cat_images/COLLEGE.jpg', 0, 0, '2019-08-28 01:43:26', '2019-08-29 08:26:05'),
(7, 'cat 5', 'cat_images/aman.png', 5, 0, '2019-08-28 07:05:13', '2019-08-28 07:06:49'),
(8, 'cat 6', 'cat_images/aman.png', 7, 0, '2019-08-28 07:05:24', '2019-08-28 07:06:55'),
(10, 'sdfs', 'cat_images/download.jfif', 5, 2, '2019-08-28 08:06:14', '2019-08-28 08:06:14'),
(11, 'sadfdsdfdf', 'cat_images/aman.png', 19, 3, '2019-08-28 08:06:29', '2019-08-29 08:34:52'),
(14, 'test1', 'cat_images/43-439598_painting-flower-bouquet-clip-art-leaves-transprent-transparent.png', 3, 2, '2019-08-28 08:27:04', '2019-08-28 08:27:04'),
(19, 'gfffsdfsdf', 'cat_images/aman.png', 4, 2, '2019-08-29 08:23:04', '2019-08-29 08:24:30'),
(21, 'uyu', 'cat_images/download.jfif', 0, 1, '2019-08-29 08:30:01', '2019-08-29 08:30:08'),
(25, 'ewew', 'cat_images/665091.jpg', 21, 2, '2019-08-29 09:33:40', '2019-08-29 09:33:40'),
(26, 'ok', 'cat_images/dahlia-flowers.png', 21, 2, '2019-08-29 09:43:45', '2019-08-29 09:43:45'),
(27, 'hh', 'cat_images/FL (3).jpeg', 26, 3, '2019-08-29 09:43:58', '2019-08-29 09:43:58'),
(28, 'hhh', 'cat_images/image4.jpg', 21, 2, '2019-08-29 09:44:34', '2019-08-29 09:44:34'),
(29, 'demo', 'cat_images/debris-after-a-landslide.jpg', 0, 1, '2019-08-29 12:06:59', '2019-08-29 12:06:59'),
(30, 'fggfgf', 'cat_images/debris-after-a-landslide.jpg', 29, 2, '2019-08-29 12:07:20', '2019-08-29 12:07:20'),
(31, 'test', 'cat_images/debris-after-a-landslide.jpg', 0, 1, '2019-08-30 04:12:09', '2019-08-30 04:12:09'),
(32, 'child test1', 'cat_images/', 31, 2, '2019-08-30 04:12:26', '2019-08-30 04:13:39'),
(33, 'hello checka', 'cat_images/login_bg.jpg', 25, 3, '2019-08-30 04:15:05', '2019-08-30 04:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img` varchar(250) NOT NULL,
  `cat_1` varchar(150) NOT NULL,
  `cat_2` varchar(150) NOT NULL,
  `cat_3` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `img`, `cat_1`, `cat_2`, `cat_3`, `created_at`, `updated_at`) VALUES
(11, 'test', ' joi', 'post_images/debris-after-a-landslide.jpg', '21', '', '', '2019-08-29 12:08:06', '2019-08-29 12:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `password`, `created_at`, `update_at`) VALUES
(3, 'aa', 'norwalklaaoanco@gmail.com', '4124bc0a9335c27f086f24ba207a4912', '2019-08-29 04:57:20', '2019-08-30 06:51:22'),
(4, 'asdasd', 'admin@adadmin.com', '7815696ecbf1c96e6894b779456d330e', '2019-08-29 04:59:37', '2019-08-29 04:59:37'),
(5, 'usrasd', 'asdassdgas@gmail.com', '7815696ecbf1c96e6894b779456d330e', '2019-08-29 05:00:15', '2019-08-29 05:00:15'),
(6, 'asd', 'vipinfarswan421@yahoo.net', '7815696ecbf1c96e6894b779456d330e', '2019-08-29 05:01:36', '2019-08-29 05:01:36'),
(7, 'asd', 'TEST@123MAIL.COM', '7815696ecbf1c96e6894b779456d330e', '2019-08-29 05:03:16', '2019-08-29 05:03:16'),
(8, 'dasd', 'sas@sasaa.com', '7815696ecbf1c96e6894b779456d330e', '2019-08-29 05:06:39', '2019-08-29 05:06:39'),
(9, 'asd', 'admin@admasdin.com', '7815696ecbf1c96e6894b779456d330e', '2019-08-29 05:10:17', '2019-08-29 05:10:17'),
(10, 'adasd', 're@sd.com', '7815696ecbf1c96e6894b779456d330e', '2019-08-29 05:12:06', '2019-08-29 05:12:06'),
(11, 'asd', 'assd@gmail.com', '7815696ecbf1c96e6894b779456d330e', '2019-08-29 05:12:40', '2019-08-29 05:12:40'),
(12, 'adde', 'aass@gdmail.com', '7815696ecbf1c96e6894b779456d330e', '2019-08-29 05:12:55', '2019-08-29 05:12:55'),
(14, 'admin@gmail.com', 'rerer@gg.hhggh', '310dcbbf4cce62f762a2aaa148d556bd', '2019-08-29 09:32:10', '2019-08-29 09:32:10'),
(15, 'test', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-08-29 12:06:24', '2019-08-29 12:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(1) NOT NULL,
  `type` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `email`, `password`, `phone`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
