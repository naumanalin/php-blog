-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 12:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogging_web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_body` text NOT NULL,
  `blog_image` varchar(200) NOT NULL,
  `category` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_body`, `blog_image`, `category`, `author_id`, `publish_date`) VALUES
(1, 'newest title for editingffffffffffffff', '<p>asdf aewr&nbsp;</p>\r\n', 'image/news3.jpeg', 5, 3, '2024-08-24 18:07:25'),
(2, 'sfgg', '<p>dddddddddddddddddddddddddddddddddddddddddfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff ddddddddddddddddddddddd eeeeeeeeeeeeeeee dsssssssssssssssssssss</p>\r\n', 'image/suppot2.jpg', 2, 3, '2024-08-24 18:12:26'),
(3, 'The Rise of New Political Movements', '<p>As political landscapes around the world shift, new movements are gaining momentum. This post explores how grassroots organizations and young leaders are challenging traditional political structures and the impact this has on global governance.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'image/politics1.jpeg', 1, 3, '2024-08-25 09:26:52'),
(4, 'The Benefits of a Plant-Based Diet ', '<p>Adopting a plant-based diet can have numerous health benefits, including improved heart health and reduced risk of chronic diseases. This post provides an overview of the advantages of plant-based eating and tips for transitioning to a more plant-focused diet.</p>\r\n', 'image/health1.jpeg', 6, 3, '2024-08-25 09:27:40'),
(5, 'Building Resilient Support Networks', '<p>A strong support network can be vital during challenging times. This post highlights the importance of cultivating resilient relationships, both personal and professional, and provides advice on how to build and maintain these connections.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'image/coahs.png', 2, 3, '2024-08-25 09:28:21'),
(6, 'The Role of Technology in Modern Politics ', '<p>Technology has transformed the way political campaigns are run and how voters engage with candidates. This post examines the influence of social media, data analytics, and digital platforms on modern political strategies and voter behavior.</p>\r\n', 'image/politics2.jpeg', 1, 4, '2024-08-25 09:30:27'),
(7, 'Mental Health and Workplace Wellness ', '<p>Mental health is increasingly recognized as a crucial component of workplace wellness. This post discusses strategies for promoting mental well-being in the workplace, including stress management techniques and creating a supportive work environment.</p>\r\n', 'image/health2.jpeg', 6, 4, '2024-08-25 09:30:59'),
(8, 'Resources for Navigating Life Transitions', '<p>Life transitions, whether personal or professional, can be challenging. This post offers a guide to resources and support systems that can help individuals navigate major changes, such as career shifts, relocations, and major life events.</p>\r\n\r\n<h3>&nbsp;</h3>\r\n', 'image/suppot2.jpg', 2, 4, '2024-08-25 09:31:51'),
(9, ' Breaking News: Major Policy Changes Announced', '<p>Stay up to date with the latest developments as major policy changes are announced. This post provides a detailed overview of the new policies, their potential impacts, and expert opinions on the implications for various sectors.</p>\r\n', 'image/news.jpeg', 5, 4, '2024-08-25 09:32:22'),
(10, ' Global Events: Key Stories to Watch', '<p>In a rapidly changing world, staying informed about key global events is essential. This post highlights the most significant news stories currently unfolding around the globe and offers insights into their potential consequences.</p>\r\n', 'image/news2.jpeg', 5, 4, '2024-08-25 09:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'politics '),
(2, 'Sports'),
(4, 'Home'),
(5, 'News'),
(6, 'Health');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(2, 'admin', 'admin@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 1),
(3, 'admin2', 'admin@gmail.xom', '356a192b7913b04c54574d18c28d46e6395428ab', 1),
(4, 'ali rajpoot', 'ali@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
