-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 10:35 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cat_admin`
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
  `level` int(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `cat_name`, `cat_logo`, `parent_id`, `level`, `created_at`, `updated_at`) VALUES
(3, 'user', 'cat_images/COLLEGE.jpg', 0, 1, '2019-08-28 01:41:27', '2019-08-28 17:37:59'),
(4, 'user1', 'cat_images/COLLEGE.jpg', 0, 1, '2019-08-28 01:43:26', '2019-08-28 17:38:03'),
(5, 'aa', 'aaa', 3, 2, '2019-08-15 00:00:00', '2019-08-28 17:38:11'),
(6, 'b', 'b', 4, 2, '2019-08-20 00:00:00', '2019-08-28 17:52:05'),
(7, 'kk', 'cat_images/Screenshot_2017-07-21-12-17-21-77.png', 4, 2, '2019-08-28 23:34:31', '2019-08-28 18:04:31'),
(8, 'dfghj', 'cat_images/Screenshot_2017-07-21-12-17-21-77.png', 5, 3, '2019-08-28 23:34:46', '2019-08-28 18:04:46'),
(9, 'we', 'cat_images/Screenshot_2017-07-21-12-17-21-77.png', 6, 3, '2019-08-28 23:34:55', '2019-08-28 18:04:55'),
(10, 'ufhufhj', 'cat_images/Screenshot_2017-07-21-12-17-21-77.png', 7, 3, '2019-08-28 23:35:06', '2019-08-28 18:05:06'),
(13, 'okkk', '/controllers/cat_images/', 0, 1, '2019-08-29 00:27:54', '2019-08-28 18:57:54'),
(14, 'okkk666', '/controllers/cat_images/', 0, 1, '2019-08-29 00:30:03', '2019-08-28 19:00:03');

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
(7, 'test11', '   aqs asdsad adiadaisd a sd fs ds f', 'post_images/Chrysanthemum.jpg', '4', '6', '9', '2019-08-29 01:15:51', '2019-08-28 20:17:48');

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
(1, 'admin', 'admin@gmail.com', 'b5f6dcca37342e4beb906c790b3d51e9', '99');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
