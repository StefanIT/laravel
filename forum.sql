-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 03:52 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(255) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'General'),
(2, 'Languages'),
(3, 'Discussion');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(255) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `post_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `parent_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `text`, `created_at`, `updated_at`, `post_id`, `user_id`, `parent_id`) VALUES
(1, 'Ovo je prvi komentar na temu', '2018-03-11 01:55:00', '0000-00-00 00:00:00', 2, 2, 0),
(2, '<p>dsadsadsadsad</p>', '2018-03-11 04:20:20', NULL, 2, 2, NULL),
(3, '<p>BRAVO STEFANE!</p>', '2018-03-11 04:46:44', NULL, 2, 2, NULL),
(4, '<p>BUMP!!</p>', '2018-03-11 04:47:12', NULL, 3, 3, NULL),
(5, '<p>Welcome!</p>', '2018-03-11 16:21:03', NULL, 2, 2, NULL),
(6, '<p>BUMP!!</p>', '2018-03-14 00:45:22', NULL, 3, 2, NULL),
(7, '<p>Evo link ka tut-u:&nbsp;<a href=\"https://www.youtube.com/watch?v=CzoeFyIm9tc\" target=\"_blank\" rel=\"noopener\">klik</a></p>', '2018-03-14 14:39:50', NULL, 5, 1, NULL),
(8, '<p>fsafafsfasfasfagdgsxcx</p>', '2018-03-14 18:18:14', NULL, 6, 2, NULL),
(9, '<p>Stefan</p>', '2018-03-14 18:18:20', NULL, 6, 2, NULL),
(14, '<div class=\"alert alert-success\">\n<blockquote><cite>daka&gt;:</cite>\n<p>BUMP!!</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>BUMP!!</p>\n</blockquote>\n</div>', '2018-03-14 18:41:40', NULL, 3, 2, NULL),
(15, '<div>\n<blockquote><cite>daka:</cite>\n<div class=\"alert alert-success\">\n<blockquote><cite>daka&gt;:</cite>\n<p>BUMP!!</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>BUMP!!</p>\n<p>&nbsp;</p>\n<p>fsafafaasgags</p>\n</blockquote>\n</div>\n</blockquote>\n</div>', '2018-03-14 18:42:50', NULL, 3, 2, NULL),
(16, '<div>\n<blockquote><cite>daka:</cite>\n<p>BUMP!!</p>\n<p style=\"text-align: left;\">Aj da probamo</p>\n</blockquote>\n</div>', '2018-03-14 18:46:23', NULL, 3, 2, NULL),
(17, '<p>dsdsdsdsds</p>', '2018-03-14 19:51:13', NULL, 2, 2, NULL),
(18, '<p>dsdsdadsdsadsa</p>', '2018-03-14 20:36:43', NULL, 4, 2, NULL),
(19, '<p>dsafsafagdaffafsa</p>', '2018-03-14 20:36:47', NULL, 4, 2, NULL),
(20, '<div>\n<blockquote><cite>daka:</cite>\n<p>dsdsdadsdsadsa</p>\n</blockquote>\n</div>', '2018-03-15 00:20:31', NULL, 4, 2, NULL),
(21, '<div>\n<blockquote><cite>daka:</cite>\n<div>\n<blockquote><cite>daka:</cite>\n<p>dsdsdadsdsadsa</p>\n</blockquote>\n</div>\n</blockquote>\n</div>', '2018-03-15 00:21:41', NULL, 4, 2, NULL),
(22, '<div>\n<blockquote><cite>daka:</cite>\n<p>dsdsdadsdsadsa</p>\n</blockquote>\n</div>', '2018-03-15 00:22:38', NULL, 4, 2, NULL),
(23, '<div>\n<blockquote><cite>daka:</cite>\n<div>\n<blockquote><cite>daka:</cite>\n<p>dsdsdadsdsadsa</p>\n</blockquote>\n</div>\n</blockquote>\n</div>', '2018-03-15 00:23:19', NULL, 4, 2, NULL),
(24, '<div>\n<blockquote><cite>daka:</cite>\n<div>\n<blockquote><cite>daka:</cite>\n<div>\n<blockquote><cite>daka:</cite>\n<p>dsdsdadsdsadsa</p>\n</blockquote>\n</div>\n</blockquote>\n</div>\n</blockquote>\n</div>', '2018-03-15 00:24:19', NULL, 4, 2, NULL),
(25, '<div>\n<blockquote><cite>daka:</cite>\n<p>dsdsdadsdsadsa</p>\n</blockquote>\n</div>', '2018-03-15 00:26:35', NULL, 4, 2, NULL),
(26, '<div>\n<blockquote><cite>daka:</cite>\n<div>\n<blockquote><cite>daka:</cite>\n<p>dsdsdadsdsadsa</p>\n<p>&nbsp;</p>\n<p>Odlicno ovo ide!</p>\n</blockquote>\n</div>\n</blockquote>\n</div>', '2018-03-15 00:33:14', NULL, 4, 2, 22),
(28, '<p>Pa jeste</p>', '2018-03-15 01:15:27', NULL, 7, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'My Testing Add To Log.', 'http://localhost:8085/laravel/public/add-to-log', 'GET', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 2, '2018-03-14 15:32:28', '2018-03-14 15:32:28'),
(2, 'My Testing Add To Log.', 'http://localhost:8085/laravel/public/add-to-log', 'GET', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 2, '2018-03-14 15:34:07', '2018-03-14 15:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(255) NOT NULL,
  `menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `a_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `li_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu`, `link`, `opis`, `a_class`, `li_class`, `parent_id`) VALUES
(1, 'HOME', '', 'START HERE', 'act', 'cap', NULL),
(2, 'AUTHOR', 'author', 'MY WORK', 'act2', '', NULL),
(3, 'LOGIN', 'login', 'If you registered, go to login.', 'act3', '', NULL),
(4, 'REGISTER', 'register', 'If you want to discuss, register your acc.', 'act3', '', NULL),
(5, 'LOGOUT', 'logout', 'If you want to signout, click here.', 'act4', '', NULL),
(6, 'ADMIN PANEL', 'admin/users', 'Go to edit your site', 'act2', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus_role`
--

CREATE TABLE `menus_role` (
  `menu_role_id` int(255) NOT NULL,
  `menu_id` int(255) NOT NULL,
  `role_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus_role`
--

INSERT INTO `menus_role` (`menu_role_id`, `menu_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 5, 1),
(4, 1, 2),
(5, 2, 2),
(6, 5, 2),
(7, 1, 3),
(8, 2, 3),
(9, 5, 3),
(10, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_06_172719_create_sessions_table', 1),
(4, '2018_03_14_151218_create_log_activity_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `picture_id` int(255) NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`picture_id`, `alt`, `path`, `comment_id`) VALUES
(1, 'moj profil', 'images/ja.png', NULL),
(2, 'Daka', '/images/cc.jpg', NULL),
(3, 'Nojko', 'images/4.jpg', NULL),
(6, 'New User', 'images/1521116050.jpg', NULL),
(7, 'New User', 'images/1521116095.jpg', NULL),
(8, 'New User', 'images/1521119213.jpg', NULL),
(10, 'New User', 'images/1521123179.jpg', NULL),
(11, 'New User', 'images/1521123318.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(255) NOT NULL,
  `picture_id` int(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `theme_id` int(255) NOT NULL,
  `closed` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post`, `description`, `user_id`, `picture_id`, `created_at`, `updated_at`, `theme_id`, `closed`) VALUES
(1, 'Predstavite se', 'Ovo je post gde mozete da napisete nesto ukratko o vama.', 1, NULL, '2018-03-03 14:41:00', '0000-00-00 00:00:00', 2, 0),
(2, 'Otvaranje', 'Predstavljam vam novi forum ICT-a gde mozete da diskutujete o programskim jezicima, vasim omiljenim filmovima, muzici, sportu i svemu ostalom.', 1, NULL, '2018-03-03 14:43:22', NULL, 1, 0),
(3, 'Programiranje dronova', 'Da li neko zna kako dohvatiti port drona preko C tarabe? Molio bih za pomoc.', 3, NULL, '2018-03-04 18:53:21', NULL, 3, 0),
(4, 'Proba', '<p>Da ispamujmeo</p>', 2, NULL, '2018-03-14 01:55:42', NULL, 2, 0),
(5, 'Kako radi', '<p>Kako odraditi paginaciju?</p>', 2, NULL, '2018-03-14 13:38:14', NULL, 4, 0),
(6, 'sfasfgasfas', '<p>fsafsafasfsaf</p>', 2, NULL, '2018-03-14 15:41:54', NULL, 1, 0),
(7, 'Daka je car?', '<p>Da li je?</p>', 2, NULL, '2018-03-15 00:14:31', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(255) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Moderator'),
(3, 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3z9UDINdsDqnkBi0avvrwbsCGNOYSINiyeLfMb4G', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'YTo0OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo2NDoiaHR0cDovL2xvY2FsaG9zdDo4MDg1L2xhcmF2ZWwvcHVibGljL1VzZXJzQ29udHJvbGxlci9mYXZpY29uLmljbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJQTEZvUWZ0QUJDcGJxc21Jb05oV053eFQ4M1NqSlFhdDgxTzFuTmpYIjtzOjQ6InVzZXIiO2E6MTp7aTowO086ODoic3RkQ2xhc3MiOjEyOntzOjI6ImlkIjtpOjE7czo0OiJuYW1lIjtzOjc6InNoZWthcmEiO3M6NToiZW1haWwiO3M6MTg6InNoZWthcmFAaWN0LmVkdS5ycyI7czo4OiJwYXNzd29yZCI7czozMjoiNGI0NjUzNmViMmI5NzVlYzc4MWQ3N2E3NjY5NDcwNjAiO3M6MTQ6InJlbWVtYmVyX3Rva2VuIjtOO3M6MTA6ImNyZWF0ZWRfYXQiO047czoxMDoidXBkYXRlZF9hdCI7TjtzOjEwOiJmaXJzdF9uYW1lIjtzOjY6IlN0ZWZhbiI7czo5OiJsYXN0X25hbWUiO3M6NzoiTmlraXRpbiI7czo3OiJyb2xlX2lkIjtpOjE7czoxMDoicGljdHVyZV9pZCI7aToxO3M6NDoicm9sZSI7czo1OiJBZG1pbiI7fX19', 1521124920);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `theme_id` int(255) NOT NULL,
  `theme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`theme_id`, `theme`, `description`, `category_id`) VALUES
(1, 'Obavestenja', 'Informisanje, novosti, svet.', 1),
(2, 'Spam', 'Ne znate gde da postavite neku temu? Postavite je ovde.', 3),
(3, 'C#', 'Sve o C# programskom jeziku na jednom mestu.', 2),
(4, 'PHP', 'Sve o PHP programskom jeziku na jednom mestu.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(255) NOT NULL,
  `picture_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `first_name`, `last_name`, `role_id`, `picture_id`) VALUES
(1, 'shekara', 'shekara@ict.edu.rs', '4b46536eb2b975ec781d77a766947060', NULL, NULL, NULL, 'Stefan', 'Nikitin', 1, 1),
(2, 'daka', 'danijela.nikitin@ict.edu.rs', '3342ddebdc78ca54a1ee6434aafe9dac', NULL, NULL, NULL, 'Danijela', 'Nikitin', 2, 2),
(3, 'nojko', 'dusan.nojkovic.20.15@ict.edu.rs', 'ffd008a2e962e09a7ab5216532693df7', NULL, NULL, NULL, 'Dusan', 'Nojkovic', 3, 3),
(4, 'peric', 'pera@ict.edu.rs', 'd8795f0d07280328f80e59b1e8414c49', NULL, '2018-03-15 12:06:53', NULL, 'Pera', 'Peric', 3, 8),
(5, 'djokaraa', 'djoka@ict.edu.rs', '231e9b0944b03a74009be7ac4ce2065c', NULL, '2018-03-15 13:15:18', NULL, 'Djoka', 'Djokicc', 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users_es`
--

CREATE TABLE `users_es` (
  `user_id` int(255) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(255) NOT NULL,
  `picture_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_es`
--

INSERT INTO `users_es` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`, `role_id`, `picture_id`) VALUES
(1, 'Stefan', 'Nikitin', 'shekara', 'shekara@ict.edu.rs', '4b46536eb2b975ec781d77a766947060', 1, 1),
(2, 'Danijela', 'Nikitin', 'daka', 'danijela.nikitin@ict.edu.rs', '3342ddebdc78ca54a1ee6434aafe9dac', 2, 2),
(3, 'Dusan', 'Nojkovic', 'nojko', 'dusan.nojkovic.20.15@ict.edu.rs', 'ffd008a2e962e09a7ab5216532693df7', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `voices`
--

CREATE TABLE `voices` (
  `voice_id` int(255) NOT NULL,
  `positive` int(255) NOT NULL,
  `negative` int(255) NOT NULL,
  `comment_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menus_role`
--
ALTER TABLE `menus_role`
  ADD PRIMARY KEY (`menu_role_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_es`
--
ALTER TABLE `users_es`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `voices`
--
ALTER TABLE `voices`
  ADD PRIMARY KEY (`voice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus_role`
--
ALTER TABLE `menus_role`
  MODIFY `menu_role_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `theme_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_es`
--
ALTER TABLE `users_es`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voices`
--
ALTER TABLE `voices`
  MODIFY `voice_id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
