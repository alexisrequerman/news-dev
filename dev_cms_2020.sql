-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2020 at 09:02 AM
-- Server version: 8.0.12
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_cms_2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_articles`
--

CREATE TABLE `cms_articles` (
  `article_id` int(11) NOT NULL,
  `article_date` text COLLATE utf8mb4_bin NOT NULL,
  `article_image` text COLLATE utf8mb4_bin NOT NULL,
  `article_title` text COLLATE utf8mb4_bin NOT NULL,
  `article_body` text COLLATE utf8mb4_bin NOT NULL,
  `article_video` text COLLATE utf8mb4_bin NOT NULL,
  `article_category` text COLLATE utf8mb4_bin NOT NULL,
  `article_status` text COLLATE utf8mb4_bin NOT NULL,
  `article_author` text COLLATE utf8mb4_bin NOT NULL,
  `article_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `cms_articles`
--

INSERT INTO `cms_articles` (`article_id`, `article_date`, `article_image`, `article_title`, `article_body`, `article_video`, `article_category`, `article_status`, `article_author`, `article_timestamp`) VALUES
(1, '03/28/2020', 'MG_FAZZ_Ver_KA.jpg', 'I rebuild this GUNDAM MODEL [mg FAZZ] - RAY STUDIO', '<p>The standard Lorem Ipsum passage, used since the 1500s.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/hzVr0XOmxC8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'News', 'published', 'Alexis Requerman', '2020-03-28 08:08:04'),
(2, '03/28/2020', 'Thunderbolt.jpg', 'Mobile Suit Gundam Thunderbolt DECEMBER SKY (EN.HK.TW.KR.FR.CN Sub)', '<p>The standard Lorem Ipsum passage, used since the 1500s.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/YkR4zK-_cRY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'CLick', 'published', 'Alexis Requerman', '2020-03-28 08:33:47'),
(3, '03/28/2020', 'Bandit_Flower.jpg', 'Mobile Suit Gundam Thunderbolt BANDIT FLOWER (EN.HK.TW.KR.FR.CN Sub)', '<p>The standard Lorem Ipsum passage, used since the 1500s.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/q4PI6EMz_0s\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Current Affairs', 'published', 'Alexis Requerman', '2020-03-28 08:36:51'),
(4, '03/28/2020', 'Wing_Proto.jpg', '#Gunpla #newtype MG Wing Gundam Proto Zero - Otaku Builder', '<p>The standard Lorem Ipsum passage, used since the 1500s.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/8AdKTx5ytrg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Entertainment', 'published', 'Alexis Requerman', '2020-03-28 08:40:06'),
(5, '03/28/2020', 'Arthur_R.jpg', 'Tamron 28-75 F2.8 vs Sony 16-55 F2.8 -  Arthur R', '<p>The standard Lorem Ipsum passage, used since the 1500s.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/1UPeii-W4Ws\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'News', 'published', 'Alexis Requerman', '2020-03-28 08:46:43'),
(6, '03/28/2020', 'Jason_Vong.jpg', '5 PRICELESS STREET PHOTOGRAPHY TIPS FROM A PRO! -  Jason Vong', '<p>The standard Lorem Ipsum passage, used since the 1500s.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Dyf2WDPttko\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'CLick', 'published', 'Alexis Requerman', '2020-03-28 08:48:54'),
(7, '03/28/2020', 'Pokemon.jpg', '2020 Pokémon Oceania International Championships: VGC Masters Division Finals - The Official Pokémon YouTube channel', '<p>The standard Lorem Ipsum passage, used since the 1500s.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/r4IFx8eX8-k\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Current Affairs', 'published', 'Alexis Requerman', '2020-03-28 08:53:56'),
(8, '03/28/2020', 'Wing_Zero.jpg', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '<p>The standard Lorem Ipsum passage, used since the 1500s.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/vZ44oKgw9TQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Entertainment', 'published', 'Alexis Requerman', '2020-03-28 08:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `cms_categories`
--

CREATE TABLE `cms_categories` (
  `category_id` int(11) NOT NULL,
  `category_title` text COLLATE utf8mb4_bin NOT NULL,
  `category_status` text COLLATE utf8mb4_bin NOT NULL,
  `category_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `cms_categories`
--

INSERT INTO `cms_categories` (`category_id`, `category_title`, `category_status`, `category_timestamp`) VALUES
(1, 'News', 'active', '2020-03-28 08:03:12'),
(2, 'CLick', 'active', '2020-03-28 08:03:28'),
(3, 'Current Affairs', 'active', '2020-03-28 08:03:46'),
(4, 'Entertainment', 'active', '2020-03-28 08:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `cms_programs`
--

CREATE TABLE `cms_programs` (
  `program_id` int(11) NOT NULL,
  `program_image` text COLLATE utf8mb4_bin NOT NULL,
  `program_title` text COLLATE utf8mb4_bin NOT NULL,
  `program_body` text COLLATE utf8mb4_bin NOT NULL,
  `program_category` text COLLATE utf8mb4_bin NOT NULL,
  `program_status` text COLLATE utf8mb4_bin NOT NULL,
  `program_author` text COLLATE utf8mb4_bin NOT NULL,
  `program_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `cms_programs`
--

INSERT INTO `cms_programs` (`program_id`, `program_image`, `program_title`, `program_body`, `program_category`, `program_status`, `program_author`, `program_timestamp`) VALUES
(1, '16by9.jpg', 'Balitang Central Luzon', '<p>The standard Lorem Ipsum passage, used since the 1500s.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'News', 'published', 'Alexis Requerman', '2020-03-28 08:27:40'),
(2, '16by91.jpg', 'Music Zone', '<p>The standard Lorem Ipsum passage, used since the 1500s.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Entertainment', 'published', 'Alexis Requerman', '2020-03-28 08:28:58'),
(3, '16by92.jpg', 'Nanu Pa Ta?', '<p>The standard Lorem Ipsum passage, used since the 1500s.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Current Affairs', 'published', 'Alexis Requerman', '2020-03-28 08:29:26'),
(4, '16by93.jpg', 'InstaChika', '<p>The standard Lorem Ipsum passage, used since the 1500s.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Current Affairs', 'published', 'Alexis Requerman', '2020-03-28 08:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `user_id` int(11) NOT NULL,
  `user_name` text COLLATE utf8mb4_bin NOT NULL,
  `user_password` text COLLATE utf8mb4_bin NOT NULL,
  `user_fullname` text COLLATE utf8mb4_bin NOT NULL,
  `user_role` text COLLATE utf8mb4_bin NOT NULL,
  `user_status` text COLLATE utf8mb4_bin NOT NULL,
  `user_pw_dec` text COLLATE utf8mb4_bin NOT NULL,
  `user_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_role`, `user_status`, `user_pw_dec`, `user_timestamp`) VALUES
(1, 'amrequerman', '73c2a162c784f682c4ee4353fbb40191', 'Alexis Requerman', 'administrator', 'active', 'nexusmako', '2020-03-28 07:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `cms_visitors`
--

CREATE TABLE `cms_visitors` (
  `visit_id` int(11) NOT NULL,
  `visit_date` text COLLATE utf8mb4_bin NOT NULL,
  `visit_time` text COLLATE utf8mb4_bin NOT NULL,
  `visit_page` text COLLATE utf8mb4_bin NOT NULL,
  `visit_url` text COLLATE utf8mb4_bin NOT NULL,
  `visit_page_title` text COLLATE utf8mb4_bin NOT NULL,
  `visit_ip` text COLLATE utf8mb4_bin NOT NULL,
  `visit_content_id` text COLLATE utf8mb4_bin NOT NULL,
  `visit_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `cms_visitors`
--

INSERT INTO `cms_visitors` (`visit_id`, `visit_date`, `visit_time`, `visit_page`, `visit_url`, `visit_page_title`, `visit_ip`, `visit_content_id`, `visit_timestamp`) VALUES
(1, '03/28/2020', '03:40:40 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 07:40:40'),
(2, '03/28/2020', '03:44:18 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 07:44:18'),
(3, '03/28/2020', '03:46:04 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 07:46:04'),
(4, '03/28/2020', '04:03:54 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:03:54'),
(5, '03/28/2020', '04:08:07 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=1', 'I rebuild this GUNDAM MODEL [mg FAZZ] - RAY STUDIO', '192.168.0.13', '1', '2020-03-28 08:08:07'),
(6, '03/28/2020', '04:09:30 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=1', 'I rebuild this GUNDAM MODEL [mg FAZZ] - RAY STUDIO', '192.168.0.13', '1', '2020-03-28 08:09:30'),
(7, '03/28/2020', '04:09:33 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=1', 'I rebuild this GUNDAM MODEL [mg FAZZ] - RAY STUDIO', '192.168.0.13', '1', '2020-03-28 08:09:33'),
(8, '03/28/2020', '04:09:36 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=1', 'I rebuild this GUNDAM MODEL [mg FAZZ] - RAY STUDIO', '192.168.0.13', '1', '2020-03-28 08:09:36'),
(9, '03/28/2020', '04:21:40 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:21:40'),
(10, '03/28/2020', '04:27:48 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:27:48'),
(11, '03/28/2020', '04:28:28 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:28:28'),
(12, '03/28/2020', '04:29:29 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:29:29'),
(13, '03/28/2020', '04:30:10 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:30:10'),
(14, '03/28/2020', '04:33:50 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:33:50'),
(15, '03/28/2020', '04:36:54 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:36:54'),
(16, '03/28/2020', '04:40:09 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:40:09'),
(17, '03/28/2020', '04:43:15 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:43:15'),
(18, '03/28/2020', '04:46:49 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:46:49'),
(19, '03/28/2020', '04:49:02 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:49:02'),
(20, '03/28/2020', '04:50:32 PM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=Current Affairs', 'Current Affairs', '192.168.0.13', '3', '2020-03-28 08:50:32'),
(21, '03/28/2020', '04:50:33 PM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=Entertainment', 'Entertainment', '192.168.0.13', '4', '2020-03-28 08:50:33'),
(22, '03/28/2020', '04:50:35 PM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-28 08:50:35'),
(23, '03/28/2020', '04:50:37 PM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=News', 'News', '192.168.0.13', '1', '2020-03-28 08:50:37'),
(24, '03/28/2020', '04:50:59 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:50:59'),
(25, '03/28/2020', '04:53:59 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:53:59'),
(26, '03/28/2020', '04:54:38 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:54:38'),
(27, '03/28/2020', '04:54:40 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:54:40'),
(28, '03/28/2020', '04:54:47 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:54:47'),
(29, '03/28/2020', '04:57:56 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:57:56'),
(30, '03/28/2020', '04:59:10 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 08:59:10'),
(31, '03/28/2020', '05:11:37 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-28 09:11:37'),
(32, '03/28/2020', '05:11:40 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-28 09:11:40'),
(33, '03/28/2020', '05:11:49 PM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=Current Affairs', 'Current Affairs', '192.168.0.13', '3', '2020-03-28 09:11:49'),
(34, '03/28/2020', '05:11:50 PM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-28 09:11:50'),
(35, '03/28/2020', '05:11:51 PM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=Entertainment', 'Entertainment', '192.168.0.13', '4', '2020-03-28 09:11:51'),
(36, '03/28/2020', '05:11:52 PM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=News', 'News', '192.168.0.13', '1', '2020-03-28 09:11:52'),
(37, '03/30/2020', '06:33:20 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-30 10:33:20'),
(38, '03/30/2020', '06:35:41 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-30 10:35:41'),
(39, '03/30/2020', '06:35:48 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-30 10:35:48'),
(40, '03/30/2020', '06:35:56 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-30 10:35:56'),
(41, '03/30/2020', '06:36:14 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-30 10:36:14'),
(42, '03/30/2020', '06:36:43 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-30 10:36:43'),
(43, '03/30/2020', '06:37:20 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-30 10:37:20'),
(44, '03/30/2020', '06:38:01 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-30 10:38:01'),
(45, '03/30/2020', '06:38:24 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-30 10:38:24'),
(46, '03/30/2020', '06:38:43 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-30 10:38:43'),
(47, '03/30/2020', '06:38:56 PM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-30 10:38:56'),
(48, '03/31/2020', '09:27:57 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:27:57'),
(49, '03/31/2020', '09:30:31 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:30:31'),
(50, '03/31/2020', '09:31:08 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:31:08'),
(51, '03/31/2020', '09:31:12 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:31:12'),
(52, '03/31/2020', '09:31:19 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:31:19'),
(53, '03/31/2020', '09:31:33 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:31:33'),
(54, '03/31/2020', '09:31:42 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:31:42'),
(55, '03/31/2020', '09:32:28 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:32:28'),
(56, '03/31/2020', '09:33:52 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:33:52'),
(57, '03/31/2020', '09:34:31 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:34:31'),
(58, '03/31/2020', '09:34:42 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:34:42'),
(59, '03/31/2020', '09:35:31 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:35:31'),
(60, '03/31/2020', '09:35:42 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:35:42'),
(61, '03/31/2020', '09:35:51 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 01:35:51'),
(62, '03/31/2020', '09:35:54 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:35:54'),
(63, '03/31/2020', '09:38:03 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:38:03'),
(64, '03/31/2020', '09:39:05 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:39:05'),
(65, '03/31/2020', '09:39:37 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:39:37'),
(66, '03/31/2020', '09:44:17 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:44:17'),
(67, '03/31/2020', '09:44:19 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:44:19'),
(68, '03/31/2020', '09:44:39 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:44:39'),
(69, '03/31/2020', '09:44:41 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:44:41'),
(70, '03/31/2020', '09:44:54 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:44:54'),
(71, '03/31/2020', '09:46:19 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:46:19'),
(72, '03/31/2020', '09:46:29 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:46:29'),
(73, '03/31/2020', '09:47:55 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:47:55'),
(74, '03/31/2020', '09:48:18 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:48:18'),
(75, '03/31/2020', '09:49:15 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:49:15'),
(76, '03/31/2020', '09:50:26 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:50:26'),
(77, '03/31/2020', '09:51:46 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:51:46'),
(78, '03/31/2020', '09:52:10 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 01:52:10'),
(79, '03/31/2020', '09:52:13 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:52:13'),
(80, '03/31/2020', '09:53:59 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:53:59'),
(81, '03/31/2020', '09:55:36 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-03-31 01:55:36'),
(82, '03/31/2020', '09:55:39 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 01:55:39'),
(83, '03/31/2020', '09:55:45 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=Current Affairs', 'Current Affairs', '192.168.0.13', '3', '2020-03-31 01:55:45'),
(84, '03/31/2020', '09:55:53 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:55:53'),
(85, '03/31/2020', '09:55:58 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=Entertainment', 'Entertainment', '192.168.0.13', '4', '2020-03-31 01:55:58'),
(86, '03/31/2020', '09:56:03 AM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=News', 'News', '192.168.0.13', '1', '2020-03-31 01:56:03'),
(87, '03/31/2020', '09:56:05 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:56:05'),
(88, '03/31/2020', '09:56:15 AM', 'TV Show Page', 'http://alexisrequerman.local/news-dev/news/tv_show?show=1', 'Balitang Central Luzon', '192.168.0.13', '1', '2020-03-31 01:56:15'),
(89, '03/31/2020', '09:56:38 AM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-03-31 01:56:38'),
(90, '03/31/2020', '10:06:06 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=5', 'Tamron 28-75 F2.8 vs Sony 16-55 F2.8 -  Arthur R', '192.168.0.13', '5', '2020-03-31 02:06:06'),
(91, '03/31/2020', '10:06:44 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=5', 'Tamron 28-75 F2.8 vs Sony 16-55 F2.8 -  Arthur R', '192.168.0.13', '5', '2020-03-31 02:06:44'),
(92, '03/31/2020', '10:29:47 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=5', 'Tamron 28-75 F2.8 vs Sony 16-55 F2.8 -  Arthur R', '192.168.0.13', '5', '2020-03-31 02:29:47'),
(93, '03/31/2020', '10:29:52 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:29:52'),
(94, '03/31/2020', '10:38:02 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:38:02'),
(95, '03/31/2020', '10:38:06 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:38:06'),
(96, '03/31/2020', '10:39:47 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:39:47'),
(97, '03/31/2020', '10:41:12 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:41:12'),
(98, '03/31/2020', '10:41:29 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:41:29'),
(99, '03/31/2020', '10:43:23 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:43:23'),
(100, '03/31/2020', '10:43:53 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:43:53'),
(101, '03/31/2020', '10:43:56 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:43:56'),
(102, '03/31/2020', '10:44:14 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:44:14'),
(103, '03/31/2020', '10:46:02 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:46:02'),
(104, '03/31/2020', '10:46:25 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:46:25'),
(105, '03/31/2020', '10:46:39 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:46:39'),
(106, '03/31/2020', '10:46:51 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:46:51'),
(107, '03/31/2020', '10:47:16 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:47:16'),
(108, '03/31/2020', '10:51:24 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:51:24'),
(109, '03/31/2020', '10:53:09 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:53:09'),
(110, '03/31/2020', '10:53:51 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:53:51'),
(111, '03/31/2020', '10:55:46 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:55:46'),
(112, '03/31/2020', '10:55:57 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:55:57'),
(113, '03/31/2020', '10:56:16 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:56:16'),
(114, '03/31/2020', '10:56:30 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:56:30'),
(115, '03/31/2020', '10:56:39 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:56:39'),
(116, '03/31/2020', '10:56:51 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:56:51'),
(117, '03/31/2020', '10:57:04 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:57:04'),
(118, '03/31/2020', '10:57:20 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:57:20'),
(119, '03/31/2020', '10:57:28 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:57:28'),
(120, '03/31/2020', '10:57:48 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 02:57:48'),
(121, '03/31/2020', '11:00:53 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:00:53'),
(122, '03/31/2020', '11:01:03 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:01:03'),
(123, '03/31/2020', '11:01:41 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:01:41'),
(124, '03/31/2020', '11:02:12 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:02:12'),
(125, '03/31/2020', '11:03:50 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:03:50'),
(126, '03/31/2020', '11:04:25 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:04:25'),
(127, '03/31/2020', '11:08:18 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:08:18'),
(128, '03/31/2020', '11:24:26 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:24:26'),
(129, '03/31/2020', '11:25:35 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:25:35'),
(130, '03/31/2020', '11:26:09 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:26:09'),
(131, '03/31/2020', '11:30:03 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:30:03'),
(132, '03/31/2020', '11:30:16 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:30:16'),
(133, '03/31/2020', '11:30:22 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:30:22'),
(134, '03/31/2020', '11:30:30 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:30:30'),
(135, '03/31/2020', '11:46:38 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:46:38'),
(136, '03/31/2020', '11:48:13 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:48:13'),
(137, '03/31/2020', '11:50:33 AM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 03:50:33'),
(138, '03/31/2020', '01:34:50 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 05:34:50'),
(139, '03/31/2020', '01:43:32 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 05:43:32'),
(140, '03/31/2020', '01:50:48 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 05:50:48'),
(141, '03/31/2020', '01:51:11 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 05:51:11'),
(142, '03/31/2020', '01:51:48 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 05:51:48'),
(143, '03/31/2020', '01:53:56 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 05:53:56'),
(144, '03/31/2020', '01:54:35 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 05:54:35'),
(145, '03/31/2020', '01:55:10 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 05:55:10'),
(146, '03/31/2020', '01:55:32 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 05:55:32'),
(147, '03/31/2020', '01:56:23 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 05:56:23'),
(148, '03/31/2020', '05:58:09 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-03-31 09:58:09'),
(149, '04/01/2020', '02:23:43 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-04-01 06:23:43'),
(150, '04/01/2020', '03:57:59 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-04-01 07:57:59'),
(151, '04/01/2020', '03:59:33 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=8', 'GUNPLA MG Wing Gundam Zero Full build / twin buster rifle fire! LED / Endless waltz / Gunpla - Musasino PLAmodel', '192.168.0.13', '8', '2020-04-01 07:59:33'),
(152, '04/01/2020', '04:02:06 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-04-01 08:02:06'),
(153, '04/01/2020', '04:02:44 PM', 'TV Show Page', 'http://alexisrequerman.local/news-dev/news/tv_show?show=1', 'Balitang Central Luzon', '192.168.0.13', '1', '2020-04-01 08:02:44'),
(154, '04/01/2020', '04:02:58 PM', 'Home Page', 'http://alexisrequerman.local/news-dev/', 'CLTV - Championing Local Pride', '192.168.0.13', '0', '2020-04-01 08:02:58'),
(155, '04/01/2020', '04:03:08 PM', 'Pages Page', 'http://alexisrequerman.local/news-dev/news/pages?page=CLick', 'CLick', '192.168.0.13', '2', '2020-04-01 08:03:08'),
(156, '04/01/2020', '04:03:13 PM', 'Articles Page', 'http://alexisrequerman.local/news-dev/news/post?post_id=6', '5 PRICELESS STREET PHOTOGRAPHY TIPS FROM A PRO! -  Jason Vong', '192.168.0.13', '6', '2020-04-01 08:03:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_articles`
--
ALTER TABLE `cms_articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `cms_categories`
--
ALTER TABLE `cms_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cms_programs`
--
ALTER TABLE `cms_programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cms_visitors`
--
ALTER TABLE `cms_visitors`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_articles`
--
ALTER TABLE `cms_articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms_categories`
--
ALTER TABLE `cms_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_programs`
--
ALTER TABLE `cms_programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_visitors`
--
ALTER TABLE `cms_visitors`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
