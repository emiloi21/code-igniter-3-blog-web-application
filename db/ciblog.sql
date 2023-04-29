-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 10:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `ciblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `user_id`, `name`, `created_at`) VALUES
(1, 4, 'Business', '2023-02-11 12:21:16'),
(2, 4, 'Technology', '2023-02-11 12:21:16'),
(3, 5, 'Crypto Currency', '2023-02-12 04:37:29'),
(5, 5, 'Programming', '2023-02-14 08:38:31'),
(6, 5, 'Web Development', '2023-02-14 08:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `name`, `email_address`, `body`, `created_at`) VALUES
(1, 23, 'Emilio Magtolis', 'emiloimagtolis@gmail.com', '<p>sample comment</p>\r\n', '2023-02-12 06:04:06'),
(2, 23, 'miloi', 'emiloi@gmail.com', '<p>second comment</p>\r\n', '2023-02-12 06:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `body`, `post_image`, `created_at`) VALUES
(21, 2, 4, 'Me, myself, and I', 'Me-myself-and-I', '<h2>Me, myself, and I</h2>\r\n', 'no_image.png', '2023-02-11 14:39:15'),
(22, 1, 4, 'Post One', 'Post-One', '<p>sample post-one</p>\r\n', 'no_image.png', '2023-02-11 15:06:30'),
(23, 3, 4, 'Bitcoin', 'Bitcoin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pulvinar velit diam, consectetur elementum est egestas a. Morbi libero turpis, ultricies nec placerat a, ullamcorper sit amet purus. Etiam vehicula hendrerit tellus et semper. Nullam semper et magna vitae lacinia. Sed ut vestibulum lacus. Aliquam augue urna, eleifend a libero sit amet, scelerisque scelerisque arcu. Phasellus elementum vulputate gravida. Aenean varius luctus congue. Donec facilisis tincidunt mi sit amet semper.</p>\r\n\r\n<p>Mauris vitae bibendum velit, eget tincidunt velit. Etiam sit amet tristique lorem, vel consectetur lacus. Nulla pellentesque at dolor eget egestas. Aenean imperdiet, tellus sed dictum malesuada, leo ex commodo mauris, ut cursus ex lectus vel mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis tempus nisl, id vulputate ante. Phasellus et varius odio. Nunc iaculis eros quis congue gravida. Donec eget dignissim dui. Nam vitae mi eu nunc convallis mollis. Fusce id est ac odio ultricies maximus. Aliquam ultrices turpis ut consectetur ultricies. Curabitur nibh felis, cursus et accumsan id, hendrerit eget urna. Vivamus efficitur ante quis velit feugiat sollicitudin. Nullam fringilla semper odio, sit amet venenatis nisi facilisis eu.</p>\r\n', 'no_image.png', '2023-02-12 05:00:54'),
(26, 1, 5, 'testtesttesttesttest', 'testtesttesttesttest', '<p>testtesttesttesttesttesttesttesttesttesttesttest</p>\r\n', 'no_image.png', '2023-02-14 02:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `lname`, `fname`, `email_address`, `username`, `password`, `register_date`) VALUES
(4, 'emilio', 'magtolis', 'emiloi@gmail.com', 'emiloi', '202cb962ac59075b964b07152d234b70', '2023-02-14 01:32:39'),
(5, 'test', 'test', 'test@gmail.com', 'test', '098f6bcd4621d373cade4e832627b4f6', '2023-02-14 02:03:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
