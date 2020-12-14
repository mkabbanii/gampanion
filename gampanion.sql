-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2020 at 07:06 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gampanion`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_2470978` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

DROP TABLE IF EXISTS `audit_logs`;
CREATE TABLE IF NOT EXISTS `audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `host` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(1, 'created', 2, 'App\\Models\\User', 1, '{\"name\":\"user\",\"full_name\":null,\"email\":\"user@user.com\",\"birth_day\":null,\"phone\":null,\"about\":null,\"phone_verified_at\":null,\"address\":null,\"language\":null,\"rank\":null,\"become_provider_at\":null,\"nationality\":null,\"passport_number\":null,\"bank_name\":null,\"bank_account_number\":null,\"beneficial_name\":null,\"updated_at\":\"2020-12-08 23:50:17\",\"created_at\":\"2020-12-08 23:50:17\",\"id\":2,\"profile_photos\":[],\"photo\":[],\"audio\":null,\"passport_photos\":[],\"media\":[]}', '::1', '2020-12-08 15:50:17', '2020-12-08 15:50:17'),
(2, 'updated', 2, 'App\\Models\\User', 1, '{\"name\":\"user\",\"full_name\":null,\"email\":\"user@user.com\",\"birth_day\":null,\"phone\":null,\"about\":null,\"phone_verified_at\":null,\"address\":null,\"language\":null,\"rank\":null,\"become_provider_at\":null,\"nationality\":null,\"passport_number\":null,\"bank_name\":null,\"bank_account_number\":null,\"beneficial_name\":null,\"updated_at\":\"2020-12-08 23:50:17\",\"created_at\":\"2020-12-08 23:50:17\",\"id\":2,\"verified\":1,\"verified_at\":\"08-12-2020 23:50:17\",\"profile_photos\":[],\"photo\":[],\"audio\":null,\"passport_photos\":[],\"media\":[]}', '::1', '2020-12-08 15:50:17', '2020-12-08 15:50:17'),
(3, 'updated', 2, 'App\\Models\\User', 1, '{\"id\":2,\"name\":\"user\",\"email\":\"user@user.com\",\"email_verified_at\":null,\"phone\":null,\"about\":null,\"is_active\":null,\"is_blocked\":null,\"is_provider\":\"Yes\",\"phone_verified_at\":null,\"address\":null,\"gps_location\":null,\"verified\":1,\"verified_at\":\"08-12-2020 23:50:17\",\"verification_token\":null,\"language\":null,\"rank\":null,\"become_provider_at\":null,\"birth_day\":null,\"gender\":null,\"nationality\":null,\"passport_number\":null,\"bank_name\":null,\"bank_account_number\":null,\"beneficial_name\":null,\"full_name\":null,\"created_at\":\"2020-12-08 23:50:17\",\"updated_at\":\"2020-12-09 00:22:23\",\"deleted_at\":null,\"profile_photos\":[],\"photo\":[],\"audio\":null,\"passport_photos\":[],\"media\":[]}', '::1', '2020-12-08 16:22:23', '2020-12-08 16:22:23'),
(4, 'created', 1, 'App\\Models\\Game', 1, '{\"game_name\":\"League of Legends: Wild Rift\",\"game_info\":\"RIFT. Explore the universe of League of Legends, the world of Runeterra, and a global community of incredible fans.\",\"note\":null,\"is_featured\":\"0\",\"updated_at\":\"2020-12-09 07:37:27\",\"created_at\":\"2020-12-09 07:37:27\",\"id\":1,\"game_photo\":null,\"media\":[]}', '::1', '2020-12-08 23:37:27', '2020-12-08 23:37:27'),
(5, 'created', 2, 'App\\Models\\Game', 1, '{\"game_name\":\"Mobile Legends: Bang Bang\",\"game_info\":\"Mobile Legends: Bang Bang is a mobile multiplayer online battle arena developed and published by Moonton.\",\"note\":null,\"is_featured\":\"0\",\"updated_at\":\"2020-12-09 07:38:58\",\"created_at\":\"2020-12-09 07:38:58\",\"id\":2,\"game_photo\":null,\"media\":[]}', '::1', '2020-12-08 23:38:58', '2020-12-08 23:38:58'),
(6, 'created', 3, 'App\\Models\\Game', 1, '{\"game_name\":\"PUBG Mobile\",\"game_info\":\"View the Metro Royale story and answer questions to get Survival Guide EXP\",\"note\":null,\"is_featured\":\"0\",\"updated_at\":\"2020-12-09 15:50:16\",\"created_at\":\"2020-12-09 15:50:16\",\"id\":3,\"game_photo\":null,\"media\":[]}', '::1', '2020-12-09 07:50:16', '2020-12-09 07:50:16'),
(7, 'created', 4, 'App\\Models\\Game', 1, '{\"game_name\":\"Identity V\",\"game_info\":\"Identity V is an asymmetrical multiplayer horror computer game developed and published by NetEase company\",\"note\":null,\"is_featured\":\"0\",\"updated_at\":\"2020-12-09 15:51:22\",\"created_at\":\"2020-12-09 15:51:22\",\"id\":4,\"game_photo\":null,\"media\":[]}', '::1', '2020-12-09 07:51:22', '2020-12-09 07:51:22'),
(8, 'created', 5, 'App\\Models\\Game', 1, '{\"game_name\":\"Call of Duty Mobile\",\"game_info\":\"Call of Duty: Mobile is a free-to-play shooter video game developed by TiMi Studios\",\"note\":null,\"is_featured\":\"0\",\"updated_at\":\"2020-12-09 15:53:53\",\"created_at\":\"2020-12-09 15:53:53\",\"id\":5,\"game_photo\":null,\"media\":[]}', '::1', '2020-12-09 07:53:53', '2020-12-09 07:53:53'),
(9, 'created', 6, 'App\\Models\\Game', 1, '{\"game_name\":\"Among Us\",\"game_info\":\"Among Us is an online multiplayer social deduction game developed and published by American game studio Innersloth\",\"note\":null,\"is_featured\":\"0\",\"updated_at\":\"2020-12-09 15:56:52\",\"created_at\":\"2020-12-09 15:56:52\",\"id\":6,\"game_photo\":null,\"media\":[]}', '::1', '2020-12-09 07:56:52', '2020-12-09 07:56:52'),
(10, 'created', 7, 'App\\Models\\Game', 1, '{\"game_name\":\"Garena Free Fire: BOOYAH Day\",\"game_info\":\"Garena Free Fire is a battle royale game, developed by 111 Dots Studio and published by Garena\",\"note\":null,\"is_featured\":\"0\",\"updated_at\":\"2020-12-09 16:05:07\",\"created_at\":\"2020-12-09 16:05:07\",\"id\":7,\"game_photo\":null,\"media\":[]}', '::1', '2020-12-09 08:05:07', '2020-12-09 08:05:07'),
(11, 'created', 8, 'App\\Models\\Game', 1, '{\"game_name\":\"KartRider Rush+\",\"game_info\":\"The kart racing sensation enjoyed by over 300M players worldwide is back and better than ever with more style, more game modes, more thrill!\",\"note\":null,\"is_featured\":\"0\",\"updated_at\":\"2020-12-09 17:33:05\",\"created_at\":\"2020-12-09 17:33:05\",\"id\":8,\"game_photo\":null,\"media\":[]}', '::1', '2020-12-09 09:33:05', '2020-12-09 09:33:05'),
(12, 'created', 9, 'App\\Models\\Game', 1, '{\"game_name\":\"Garena Speed Drifters\",\"game_info\":\"One of the most important game feature is the Nitro. Charge up your N-tank by drifting and unleash it to achieve your maximum speed\",\"note\":null,\"is_featured\":\"0\",\"updated_at\":\"2020-12-09 17:36:02\",\"created_at\":\"2020-12-09 17:36:02\",\"id\":9,\"game_photo\":null,\"media\":[]}', '::1', '2020-12-09 09:36:02', '2020-12-09 09:36:02'),
(13, 'created', 10, 'App\\Models\\Game', 1, '{\"game_name\":\"Garena AOV: Link Start\",\"game_info\":\"Garena AOV: Link Start\",\"note\":null,\"is_featured\":\"0\",\"updated_at\":\"2020-12-09 17:43:54\",\"created_at\":\"2020-12-09 17:43:54\",\"id\":10,\"game_photo\":null,\"media\":[]}', '::1', '2020-12-09 09:43:54', '2020-12-09 09:43:54'),
(14, 'created', 11, 'App\\Models\\Game', 1, '{\"game_name\":\"Other games\",\"game_info\":\"Unlisted games\",\"note\":null,\"is_featured\":\"0\",\"updated_at\":\"2020-12-09 17:46:31\",\"created_at\":\"2020-12-09 17:46:31\",\"id\":11,\"game_photo\":null,\"media\":[]}', '::1', '2020-12-09 09:46:31', '2020-12-09 09:46:31'),
(15, 'created', 3, 'App\\Models\\User', 1, '{\"name\":\"user2\",\"full_name\":\"User2 Test\",\"email\":\"user2@user.com\",\"birth_day\":null,\"phone\":null,\"about\":null,\"phone_verified_at\":null,\"address\":null,\"language\":null,\"rank\":null,\"become_provider_at\":null,\"nationality\":null,\"passport_number\":null,\"bank_name\":null,\"bank_account_number\":null,\"beneficial_name\":null,\"updated_at\":\"2020-12-09 18:02:42\",\"created_at\":\"2020-12-09 18:02:42\",\"id\":3,\"profile_photos\":[],\"photo\":[],\"audio\":null,\"passport_photos\":[],\"media\":[]}', '::1', '2020-12-09 10:02:42', '2020-12-09 10:02:42'),
(16, 'updated', 3, 'App\\Models\\User', 1, '{\"name\":\"user2\",\"full_name\":\"User2 Test\",\"email\":\"user2@user.com\",\"birth_day\":null,\"phone\":null,\"about\":null,\"phone_verified_at\":null,\"address\":null,\"language\":null,\"rank\":null,\"become_provider_at\":null,\"nationality\":null,\"passport_number\":null,\"bank_name\":null,\"bank_account_number\":null,\"beneficial_name\":null,\"updated_at\":\"2020-12-09 18:02:42\",\"created_at\":\"2020-12-09 18:02:42\",\"id\":3,\"verified\":1,\"verified_at\":\"09-12-2020 18:02:42\",\"profile_photos\":[],\"photo\":[],\"audio\":null,\"passport_photos\":[],\"media\":[]}', '::1', '2020-12-09 10:02:42', '2020-12-09 10:02:42'),
(17, 'created', 4, 'App\\Models\\User', 1, '{\"name\":\"user3\",\"full_name\":\"User3\",\"email\":\"user3@user.com\",\"birth_day\":null,\"phone\":null,\"about\":null,\"phone_verified_at\":null,\"address\":null,\"language\":null,\"rank\":null,\"become_provider_at\":null,\"nationality\":null,\"passport_number\":null,\"bank_name\":null,\"bank_account_number\":null,\"beneficial_name\":null,\"updated_at\":\"2020-12-09 18:03:31\",\"created_at\":\"2020-12-09 18:03:31\",\"id\":4,\"profile_photos\":[],\"photo\":[],\"audio\":null,\"passport_photos\":[],\"media\":[]}', '::1', '2020-12-09 10:03:31', '2020-12-09 10:03:31'),
(18, 'updated', 4, 'App\\Models\\User', 1, '{\"name\":\"user3\",\"full_name\":\"User3\",\"email\":\"user3@user.com\",\"birth_day\":null,\"phone\":null,\"about\":null,\"phone_verified_at\":null,\"address\":null,\"language\":null,\"rank\":null,\"become_provider_at\":null,\"nationality\":null,\"passport_number\":null,\"bank_name\":null,\"bank_account_number\":null,\"beneficial_name\":null,\"updated_at\":\"2020-12-09 18:03:31\",\"created_at\":\"2020-12-09 18:03:31\",\"id\":4,\"verified\":1,\"verified_at\":\"09-12-2020 18:03:31\",\"profile_photos\":[],\"photo\":[],\"audio\":null,\"passport_photos\":[],\"media\":[]}', '::1', '2020-12-09 10:03:31', '2020-12-09 10:03:31'),
(19, 'updated', 4, 'App\\Models\\User', 1, '{\"id\":4,\"name\":\"user3\",\"email\":\"user3@user.com\",\"email_verified_at\":null,\"phone\":null,\"about\":null,\"is_active\":null,\"is_blocked\":null,\"is_provider\":null,\"phone_verified_at\":null,\"address\":null,\"gps_location\":null,\"verified\":1,\"verified_at\":\"09-12-2020 18:03:31\",\"verification_token\":null,\"language\":null,\"rank\":null,\"become_provider_at\":null,\"birth_day\":null,\"gender\":null,\"nationality\":null,\"passport_number\":null,\"bank_name\":null,\"bank_account_number\":null,\"beneficial_name\":null,\"full_name\":\"User3 Test\",\"created_at\":\"2020-12-09 18:03:31\",\"updated_at\":\"2020-12-09 18:04:51\",\"deleted_at\":null,\"profile_photos\":[],\"photo\":[],\"audio\":null,\"passport_photos\":[],\"media\":[]}', '::1', '2020-12-09 10:04:51', '2020-12-09 10:04:51'),
(20, 'updated', 2, 'App\\Models\\User', 1, '{\"id\":2,\"name\":\"user\",\"email\":\"user@user.com\",\"email_verified_at\":null,\"phone\":null,\"about\":null,\"is_active\":null,\"is_blocked\":null,\"is_provider\":\"Yes\",\"phone_verified_at\":null,\"address\":null,\"gps_location\":null,\"verified\":1,\"verified_at\":\"08-12-2020 23:50:17\",\"verification_token\":null,\"language\":null,\"rank\":null,\"become_provider_at\":null,\"birth_day\":null,\"gender\":null,\"nationality\":null,\"passport_number\":null,\"bank_name\":null,\"bank_account_number\":null,\"beneficial_name\":null,\"full_name\":\"User1 Provider\",\"created_at\":\"2020-12-08 23:50:17\",\"updated_at\":\"2020-12-09 18:05:17\",\"deleted_at\":null,\"profile_photos\":[],\"photo\":[],\"audio\":null,\"passport_photos\":[],\"media\":[]}', '::1', '2020-12-09 10:05:17', '2020-12-09 10:05:17'),
(21, 'created', 1, 'App\\Models\\Gampanion', 1, '{\"game_id\":\"1\",\"user_id\":\"2\",\"cost\":\"5\",\"level\":\"N\\/A\",\"server\":\"N\\/A\",\"platform\":\"Windows\",\"availability\":\"1\",\"discount\":\"0\",\"other_game\":null,\"updated_at\":\"2020-12-09 19:13:05\",\"created_at\":\"2020-12-09 19:13:05\",\"id\":1,\"photo\":null,\"media\":[]}', '::1', '2020-12-09 11:13:05', '2020-12-09 11:13:05'),
(22, 'created', 2, 'App\\Models\\Gampanion', 1, '{\"game_id\":\"3\",\"user_id\":\"2\",\"cost\":\"10\",\"level\":\"N\\/A\",\"server\":\"N\\/A\",\"platform\":null,\"availability\":\"0\",\"discount\":\"0\",\"other_game\":null,\"updated_at\":\"2020-12-09 19:18:12\",\"created_at\":\"2020-12-09 19:18:12\",\"id\":2,\"photo\":null,\"media\":[]}', '::1', '2020-12-09 11:18:12', '2020-12-09 11:18:12'),
(23, 'created', 3, 'App\\Models\\Gampanion', 1, '{\"game_id\":\"4\",\"user_id\":\"2\",\"cost\":\"15\",\"level\":\"N\\/A\",\"server\":\"N\\/A\",\"platform\":null,\"availability\":\"0\",\"discount\":\"0\",\"other_game\":null,\"updated_at\":\"2020-12-09 19:22:05\",\"created_at\":\"2020-12-09 19:22:05\",\"id\":3,\"photo\":null,\"media\":[]}', '::1', '2020-12-09 11:22:05', '2020-12-09 11:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL,
  `is_valid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `favorite_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_2470411` (`user_id`),
  KEY `favorite_user_fk_2470412` (`favorite_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `game_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_name`, `game_info`, `note`, `is_featured`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'League of Legends: Wild Rift', 'RIFT. Explore the universe of League of Legends, the world of Runeterra, and a global community of incredible fans.', NULL, 0, '2020-12-08 23:37:27', '2020-12-08 23:37:27', NULL),
(2, 'Mobile Legends: Bang Bang', 'Mobile Legends: Bang Bang is a mobile multiplayer online battle arena developed and published by Moonton.', NULL, 0, '2020-12-08 23:38:58', '2020-12-08 23:38:58', NULL),
(3, 'PUBG Mobile', 'View the Metro Royale story and answer questions to get Survival Guide EXP', NULL, 0, '2020-12-09 07:50:16', '2020-12-09 07:50:16', NULL),
(4, 'Identity V', 'Identity V is an asymmetrical multiplayer horror computer game developed and published by NetEase company', NULL, 0, '2020-12-09 07:51:22', '2020-12-09 07:51:22', NULL),
(5, 'Call of Duty Mobile', 'Call of Duty: Mobile is a free-to-play shooter video game developed by TiMi Studios', NULL, 0, '2020-12-09 07:53:53', '2020-12-09 07:53:53', NULL),
(6, 'Among Us', 'Among Us is an online multiplayer social deduction game developed and published by American game studio Innersloth', NULL, 0, '2020-12-09 07:56:52', '2020-12-09 07:56:52', NULL),
(7, 'Garena Free Fire: BOOYAH Day', 'Garena Free Fire is a battle royale game, developed by 111 Dots Studio and published by Garena', NULL, 0, '2020-12-09 08:05:07', '2020-12-09 08:05:07', NULL),
(8, 'KartRider Rush+', 'The kart racing sensation enjoyed by over 300M players worldwide is back and better than ever with more style, more game modes, more thrill!', NULL, 0, '2020-12-09 09:33:05', '2020-12-09 09:33:05', NULL),
(9, 'Garena Speed Drifters', 'One of the most important game feature is the Nitro. Charge up your N-tank by drifting and unleash it to achieve your maximum speed', NULL, 0, '2020-12-09 09:36:02', '2020-12-09 09:36:02', NULL),
(10, 'Garena AOV: Link Start', 'Garena AOV: Link Start', NULL, 0, '2020-12-09 09:43:54', '2020-12-09 09:43:54', NULL),
(11, 'Other games', 'Unlisted games', NULL, 0, '2020-12-09 09:46:31', '2020-12-09 09:46:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gampanions`
--

DROP TABLE IF EXISTS `gampanions`;
CREATE TABLE IF NOT EXISTS `gampanions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cost` int(11) NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `server` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` tinyint(1) DEFAULT '0',
  `discount` int(11) DEFAULT NULL,
  `other_game` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `game_fk_2732531` (`game_id`),
  KEY `user_fk_2732532` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gampanions`
--

INSERT INTO `gampanions` (`id`, `cost`, `level`, `server`, `platform`, `availability`, `discount`, `other_game`, `created_at`, `updated_at`, `deleted_at`, `game_id`, `user_id`) VALUES
(1, 5, 'N/A', 'N/A', 'Windows', 1, 0, NULL, '2020-12-09 11:13:05', '2020-12-09 11:13:05', NULL, 1, 2),
(2, 10, 'N/A', 'N/A', NULL, 0, 0, NULL, '2020-12-09 11:18:12', '2020-12-09 11:18:12', NULL, 3, 2),
(3, 15, 'N/A', 'N/A', NULL, 0, 0, NULL, '2020-12-09 11:22:05', '2020-12-09 11:22:05', NULL, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Game', 1, '3239e610-8316-4ed9-a80e-f8ca87b4604b', 'game_photo', '5fd07eb2e7f68_legaue', '5fd07eb2e7f68_legaue.jpg', 'image/jpeg', 'public', 'public', 15453, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 1, '2020-12-08 23:37:28', '2020-12-08 23:37:30'),
(2, 'App\\Models\\Game', 2, 'c2adc97e-3379-4cd6-a9fd-b56d20b92d65', 'game_photo', '5fd07f1027c45_Mobilelegends', '5fd07f1027c45_Mobilelegends.png', 'image/png', 'public', 'public', 101921, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 2, '2020-12-08 23:38:58', '2020-12-08 23:38:59'),
(3, 'App\\Models\\Game', 3, '42ddde5e-7858-4e7a-8698-60e1d0c11205', 'game_photo', '5fd0f2365ec54_pubg', '5fd0f2365ec54_pubg.jpg', 'image/jpeg', 'public', 'public', 11679, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 3, '2020-12-09 07:50:16', '2020-12-09 07:50:17'),
(4, 'App\\Models\\Game', 4, 'fa3bd3b6-12ad-4741-90e1-e1a6d123eb4f', 'game_photo', '5fd0f2787ec70_identity', '5fd0f2787ec70_identity.jpg', 'image/jpeg', 'public', 'public', 75941, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 4, '2020-12-09 07:51:22', '2020-12-09 07:51:23'),
(5, 'App\\Models\\Game', 5, '2bb52dcf-6f0c-4c3c-9cc7-2ce1c5408deb', 'game_photo', '5fd0f30fbf265_call-of-duty-mobile', '5fd0f30fbf265_call-of-duty-mobile.jpg', 'image/jpeg', 'public', 'public', 103668, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 5, '2020-12-09 07:53:53', '2020-12-09 07:53:54'),
(6, 'App\\Models\\Game', 6, '4635213c-58a1-4796-937c-bf606cf102b9', 'game_photo', '5fd0f3c25abae_capsule_616x353', '5fd0f3c25abae_capsule_616x353.jpg', 'image/jpeg', 'public', 'public', 68224, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 6, '2020-12-09 07:56:52', '2020-12-09 07:56:52'),
(7, 'App\\Models\\Game', 7, 'f99eb13b-5534-4346-92a7-04792fe16929', 'game_photo', '5fd0f56f2d457_garena free', '5fd0f56f2d457_garena-free.jpeg', 'image/jpeg', 'public', 'public', 119664, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 7, '2020-12-09 08:05:07', '2020-12-09 08:05:08'),
(8, 'App\\Models\\Game', 8, '915c12e1-4b2f-46cd-b73e-6b999af99ead', 'game_photo', '5fd10a4ea3717_KartRider-Rush-Plus', '5fd10a4ea3717_KartRider-Rush-Plus.jpg', 'image/jpeg', 'public', 'public', 122628, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 8, '2020-12-09 09:33:05', '2020-12-09 09:33:05'),
(9, 'App\\Models\\Game', 9, 'c0d53928-2060-46a2-9353-bba034e64cfe', 'game_photo', '5fd10b0020804_3EN', '5fd10b0020804_3EN.jpg', 'image/jpeg', 'public', 'public', 522107, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 9, '2020-12-09 09:36:02', '2020-12-09 09:36:02'),
(10, 'App\\Models\\Game', 10, 'e3240875-4ee2-40bf-9ce5-7a085981f648', 'game_photo', '5fd10cd8916b9_screen-0', '5fd10cd8916b9_screen-0.jpg', 'image/jpeg', 'public', 'public', 395681, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 10, '2020-12-09 09:43:54', '2020-12-09 09:43:55'),
(11, 'App\\Models\\Game', 11, 'a9bac33f-a34a-411e-a14a-5d45c8366356', 'game_photo', '5fd10d7686bfe_maxresdefault', '5fd10d7686bfe_maxresdefault.jpg', 'image/jpeg', 'public', 'public', 137958, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 11, '2020-12-09 09:46:31', '2020-12-09 09:46:32'),
(12, 'App\\Models\\User', 2, '08e69b23-1ec0-465d-89db-18397779788a', 'photo', '5fd46e484418e_WhatsApp Image 2020-10-07 at 9.20.32 PM', '5fd46e484418e_WhatsApp-Image-2020-10-07-at-9.20.32-PM.jpeg', 'image/jpeg', 'public', 'public', 16832, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 12, '2020-12-11 23:16:28', '2020-12-11 23:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sender_fk_2506199` (`sender_id`),
  KEY `receiver_fk_2506200` (`receiver_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2020_12_08_000001_create_media_table', 1),
(8, '2020_12_08_000002_create_audit_logs_table', 1),
(9, '2020_12_08_000003_create_wallets_table', 1),
(10, '2020_12_08_000004_create_system_strings_table', 1),
(11, '2020_12_08_000005_create_banners_table', 1),
(12, '2020_12_08_000006_create_gampanions_table', 1),
(13, '2020_12_08_000007_create_messages_table', 1),
(14, '2020_12_08_000008_create_announcements_table', 1),
(15, '2020_12_08_000009_create_redemptions_table', 1),
(16, '2020_12_08_000010_create_coupons_table', 1),
(17, '2020_12_08_000011_create_withdraws_table', 1),
(18, '2020_12_08_000012_create_favorites_table', 1),
(19, '2020_12_08_000013_create_payment_methods_table', 1),
(20, '2020_12_08_000014_create_payments_table', 1),
(21, '2020_12_08_000015_create_user_alerts_table', 1),
(22, '2020_12_08_000016_create_permissions_table', 1),
(23, '2020_12_08_000017_create_statuses_table', 1),
(24, '2020_12_08_000018_create_roles_table', 1),
(25, '2020_12_08_000019_create_orders_table', 1),
(26, '2020_12_08_000020_create_games_table', 1),
(27, '2020_12_08_000021_create_reviews_table', 1),
(28, '2020_12_08_000022_create_users_table', 1),
(29, '2020_12_08_000023_create_role_user_pivot_table', 1),
(30, '2020_12_08_000024_create_permission_role_pivot_table', 1),
(31, '2020_12_08_000025_create_user_user_alert_pivot_table', 1),
(32, '2020_12_08_000026_add_relationship_fields_to_gampanions_table', 1),
(33, '2020_12_08_000027_add_relationship_fields_to_messages_table', 1),
(34, '2020_12_08_000028_add_relationship_fields_to_reviews_table', 1),
(35, '2020_12_08_000029_add_relationship_fields_to_announcements_table', 1),
(36, '2020_12_08_000030_add_relationship_fields_to_redemptions_table', 1),
(37, '2020_12_08_000031_add_relationship_fields_to_withdraws_table', 1),
(38, '2020_12_08_000032_add_relationship_fields_to_favorites_table', 1),
(39, '2020_12_08_000033_add_relationship_fields_to_orders_table', 1),
(40, '2020_12_08_000034_add_relationship_fields_to_payments_table', 1),
(41, '2020_12_08_000035_add_relationship_fields_to_wallets_table', 1),
(42, '2020_12_08_000036_add_verification_fields', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `amount_deducted_from_user` int(11) DEFAULT NULL,
  `amount_earned_by_provider` int(11) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `approved_at` date DEFAULT NULL,
  `rejected_at` date DEFAULT NULL,
  `proposed_time` datetime DEFAULT NULL,
  `request_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `game_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `gampanion_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `game_fk_2466878` (`game_id`),
  KEY `user_fk_2466879` (`user_id`),
  KEY `status_fk_2470216` (`status_id`),
  KEY `gampanion_fk_2733018` (`gampanion_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaction_amount` int(11) DEFAULT NULL,
  `earned_points` int(11) DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_2470327` (`user_id`),
  KEY `status_fk_2470333` (`status_id`),
  KEY `payment_method_fk_2470403` (`payment_method_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `method`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Direct Bank Transfer', '2020-12-08 22:48:16', '2020-12-08 22:48:16', NULL),
(2, 'PayPal', '2020-12-08 22:48:24', '2020-12-08 22:48:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'audit_log_show', NULL, NULL, NULL),
(18, 'audit_log_access', NULL, NULL, NULL),
(19, 'user_alert_create', NULL, NULL, NULL),
(20, 'user_alert_show', NULL, NULL, NULL),
(21, 'user_alert_delete', NULL, NULL, NULL),
(22, 'user_alert_access', NULL, NULL, NULL),
(23, 'game_create', NULL, NULL, NULL),
(24, 'game_edit', NULL, NULL, NULL),
(25, 'game_show', NULL, NULL, NULL),
(26, 'game_delete', NULL, NULL, NULL),
(27, 'game_access', NULL, NULL, NULL),
(28, 'order_create', NULL, NULL, NULL),
(29, 'order_edit', NULL, NULL, NULL),
(30, 'order_show', NULL, NULL, NULL),
(31, 'order_delete', NULL, NULL, NULL),
(32, 'order_access', NULL, NULL, NULL),
(33, 'status_create', NULL, NULL, NULL),
(34, 'status_edit', NULL, NULL, NULL),
(35, 'status_delete', NULL, NULL, NULL),
(36, 'status_access', NULL, NULL, NULL),
(37, 'review_create', NULL, NULL, NULL),
(38, 'review_edit', NULL, NULL, NULL),
(39, 'review_show', NULL, NULL, NULL),
(40, 'review_delete', NULL, NULL, NULL),
(41, 'review_access', NULL, NULL, NULL),
(42, 'wallet_create', NULL, NULL, NULL),
(43, 'wallet_edit', NULL, NULL, NULL),
(44, 'wallet_show', NULL, NULL, NULL),
(45, 'wallet_delete', NULL, NULL, NULL),
(46, 'wallet_access', NULL, NULL, NULL),
(47, 'payment_create', NULL, NULL, NULL),
(48, 'payment_edit', NULL, NULL, NULL),
(49, 'payment_show', NULL, NULL, NULL),
(50, 'payment_delete', NULL, NULL, NULL),
(51, 'payment_access', NULL, NULL, NULL),
(52, 'payment_method_create', NULL, NULL, NULL),
(53, 'payment_method_edit', NULL, NULL, NULL),
(54, 'payment_method_show', NULL, NULL, NULL),
(55, 'payment_method_delete', NULL, NULL, NULL),
(56, 'payment_method_access', NULL, NULL, NULL),
(57, 'favorite_create', NULL, NULL, NULL),
(58, 'favorite_edit', NULL, NULL, NULL),
(59, 'favorite_show', NULL, NULL, NULL),
(60, 'favorite_delete', NULL, NULL, NULL),
(61, 'favorite_access', NULL, NULL, NULL),
(62, 'withdraw_create', NULL, NULL, NULL),
(63, 'withdraw_edit', NULL, NULL, NULL),
(64, 'withdraw_show', NULL, NULL, NULL),
(65, 'withdraw_delete', NULL, NULL, NULL),
(66, 'withdraw_access', NULL, NULL, NULL),
(67, 'coupon_create', NULL, NULL, NULL),
(68, 'coupon_edit', NULL, NULL, NULL),
(69, 'coupon_show', NULL, NULL, NULL),
(70, 'coupon_delete', NULL, NULL, NULL),
(71, 'coupon_access', NULL, NULL, NULL),
(72, 'redemption_create', NULL, NULL, NULL),
(73, 'redemption_edit', NULL, NULL, NULL),
(74, 'redemption_show', NULL, NULL, NULL),
(75, 'redemption_delete', NULL, NULL, NULL),
(76, 'redemption_access', NULL, NULL, NULL),
(77, 'announcement_create', NULL, NULL, NULL),
(78, 'announcement_edit', NULL, NULL, NULL),
(79, 'announcement_show', NULL, NULL, NULL),
(80, 'announcement_delete', NULL, NULL, NULL),
(81, 'announcement_access', NULL, NULL, NULL),
(82, 'message_create', NULL, NULL, NULL),
(83, 'message_edit', NULL, NULL, NULL),
(84, 'message_show', NULL, NULL, NULL),
(85, 'message_delete', NULL, NULL, NULL),
(86, 'message_access', NULL, NULL, NULL),
(87, 'system_setting_access', NULL, NULL, NULL),
(88, 'system_management_access', NULL, NULL, NULL),
(89, 'games_and_order_access', NULL, NULL, NULL),
(90, 'money_matter_access', NULL, NULL, NULL),
(91, 'gampanion_create', NULL, NULL, NULL),
(92, 'gampanion_edit', NULL, NULL, NULL),
(93, 'gampanion_show', NULL, NULL, NULL),
(94, 'gampanion_delete', NULL, NULL, NULL),
(95, 'gampanion_access', NULL, NULL, NULL),
(96, 'banner_create', NULL, NULL, NULL),
(97, 'banner_edit', NULL, NULL, NULL),
(98, 'banner_show', NULL, NULL, NULL),
(99, 'banner_delete', NULL, NULL, NULL),
(100, 'banner_access', NULL, NULL, NULL),
(101, 'system_string_create', NULL, NULL, NULL),
(102, 'system_string_edit', NULL, NULL, NULL),
(103, 'system_string_show', NULL, NULL, NULL),
(104, 'system_string_delete', NULL, NULL, NULL),
(105, 'system_string_access', NULL, NULL, NULL),
(106, 'profile_password_edit', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  KEY `role_id_fk_2420601` (`role_id`),
  KEY `permission_id_fk_2420601` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(2, 17),
(2, 18),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(2, 101),
(2, 102),
(2, 103),
(2, 104),
(2, 105),
(2, 106);

-- --------------------------------------------------------

--
-- Table structure for table `redemptions`
--

DROP TABLE IF EXISTS `redemptions`;
CREATE TABLE IF NOT EXISTS `redemptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `coupon_fk_2470845` (`coupon_id`),
  KEY `user_fk_2470846` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_rate_value` double(2,1) DEFAULT NULL,
  `is_recommend` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gampanion_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_2470219` (`user_id`),
  KEY `gampanion_fk_2732637` (`gampanion_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  KEY `user_id_fk_2420610` (`user_id`),
  KEY `role_id_fk_2420610` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(4, 2),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'In Progress', '2020-12-08 22:48:50', '2020-12-08 22:48:50', NULL),
(2, 'Completed', '2020-12-08 22:49:12', '2020-12-08 22:49:12', NULL),
(3, 'Cancelled', '2020-12-08 22:49:46', '2020-12-08 22:49:46', NULL),
(4, 'On Hold', '2020-12-08 22:51:01', '2020-12-08 22:51:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_strings`
--

DROP TABLE IF EXISTS `system_strings`;
CREATE TABLE IF NOT EXISTS `system_strings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_blocked` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verified_at` datetime DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gps_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) DEFAULT '0',
  `verified_at` datetime DEFAULT NULL,
  `verification_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `become_provider_at` datetime DEFAULT NULL,
  `birth_day` date DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficial_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `about`, `is_active`, `is_blocked`, `is_provider`, `phone_verified_at`, `address`, `gps_location`, `verified`, `verified_at`, `verification_token`, `language`, `rank`, `become_provider_at`, `birth_day`, `gender`, `nationality`, `passport_number`, `bank_name`, `bank_account_number`, `beneficial_name`, `full_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$MN1XbOdBib6I1Wi2mq4JTeWPPEVhmsfm1Lw/ZHfxJtPsedJToROtq', NULL, '', '', NULL, NULL, NULL, NULL, '', '', 1, '2020-12-08 23:21:23', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL),
(2, 'user', 'user@user.com', NULL, '$2y$10$GjsLnVlquWANDWAYn9C1..HIlGGGMc6/vYe6vxCrpQ05T7uhF6SQG', NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, 1, '2020-12-08 23:50:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User1 Provider', '2020-12-08 15:50:17', '2020-12-09 10:05:17', NULL),
(3, 'user2', 'user2@user.com', NULL, '$2y$10$EyRbqZ3bnsnTxWGr/RBsW.bQMclq0sq6BKhtMeGVVxgcklM6jLgRe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-12-09 18:02:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User2 Test', '2020-12-09 10:02:42', '2020-12-09 10:02:42', NULL),
(4, 'user3', 'user3@user.com', NULL, '$2y$10$M2xCUr3tZXMCE6dw47CSQO91zruoh.2ztlrqYNw9qZdYz4TGAE7Fm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-12-09 18:03:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User3 Test', '2020-12-09 10:03:31', '2020-12-09 10:04:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_alerts`
--

DROP TABLE IF EXISTS `user_alerts`;
CREATE TABLE IF NOT EXISTS `user_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `alert_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_user_alert`
--

DROP TABLE IF EXISTS `user_user_alert`;
CREATE TABLE IF NOT EXISTS `user_user_alert` (
  `user_alert_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  KEY `user_alert_id_fk_2437601` (`user_alert_id`),
  KEY `user_id_fk_2437601` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;
CREATE TABLE IF NOT EXISTS `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `balance` int(11) NOT NULL,
  `previous_balance` int(11) DEFAULT NULL,
  `last_added_amount` int(11) DEFAULT NULL,
  `last_deduct_amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_2470297` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

DROP TABLE IF EXISTS `withdraws`;
CREATE TABLE IF NOT EXISTS `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `points` int(11) NOT NULL,
  `cash_amount` int(11) DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_2470795` (`user_id`),
  KEY `payment_method_fk_2470798` (`payment_method_id`),
  KEY `status_fk_2470801` (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
