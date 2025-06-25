-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 25, 2025 at 09:24 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

DROP TABLE IF EXISTS `audit_logs`;
CREATE TABLE IF NOT EXISTS `audit_logs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `old_values` json DEFAULT NULL,
  `new_values` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audit_logs_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `user_id`, `action`, `description`, `ip_address`, `user_agent`, `old_values`, `new_values`, `created_at`, `updated_at`) VALUES
(1, 1, 'project_created', 'Created project: booking system', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '[]', '{\"project_id\": 1, \"project_name\": \"booking system\"}', '2025-06-24 21:44:06', '2025-06-24 21:44:06'),
(2, 1, 'project_created', 'Created project: test project', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '[]', '{\"project_id\": 2, \"project_name\": \"test project\"}', '2025-06-24 22:12:29', '2025-06-24 22:12:29'),
(3, 1, 'subscription_created', 'User subscription_created for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-24 22:20:50', '2025-06-24 22:20:50'),
(4, 1, 'subscription_cancelled', 'User subscription_cancelled for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-24 22:22:23', '2025-06-24 22:22:23'),
(5, 1, 'subscription_created', 'User subscription_created for plan: Free', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 1, \"plan_name\": \"Free\"}', '2025-06-24 22:22:23', '2025-06-24 22:22:23'),
(6, 1, 'subscription_cancelled', 'User subscription_cancelled for plan: Free', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 1, \"plan_name\": \"Free\"}', '2025-06-24 22:22:39', '2025-06-24 22:22:39'),
(7, 1, 'subscription_created', 'User subscription_created for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-24 22:22:39', '2025-06-24 22:22:39'),
(8, 3, 'project_created', 'Created project: B1 project', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '[]', '{\"project_id\": 3, \"project_name\": \"B1 project\"}', '2025-06-25 12:54:15', '2025-06-25 12:54:15'),
(9, 3, 'subscription_created', 'User subscription_created for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 12:54:40', '2025-06-25 12:54:40'),
(10, 3, 'subscription_cancelled', 'User subscription_cancelled for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 12:54:47', '2025-06-25 12:54:47'),
(11, 3, 'subscription_created', 'User subscription_created for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 12:54:47', '2025-06-25 12:54:47'),
(12, 3, 'subscription_cancelled', 'User subscription_cancelled for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 12:54:52', '2025-06-25 12:54:52'),
(13, 3, 'subscription_created', 'User subscription_created for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 12:54:52', '2025-06-25 12:54:52'),
(14, 3, 'subscription_cancelled', 'User subscription_cancelled for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 12:55:00', '2025-06-25 12:55:00'),
(15, 3, 'subscription_created', 'User subscription_created for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 12:55:00', '2025-06-25 12:55:00'),
(16, 3, 'subscription_cancelled', 'User subscription_cancelled for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 12:56:14', '2025-06-25 12:56:14'),
(17, 3, 'subscription_created', 'User subscription_created for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-25 12:56:14', '2025-06-25 12:56:14'),
(18, 3, 'subscription_cancelled', 'User subscription_cancelled for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-25 12:56:27', '2025-06-25 12:56:27'),
(19, 3, 'subscription_created', 'User subscription_created for plan: Free', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 1, \"plan_name\": \"Free\"}', '2025-06-25 12:56:27', '2025-06-25 12:56:27'),
(20, 1, 'subscription_cancelled', 'User subscription_cancelled for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 13:08:31', '2025-06-25 13:08:31'),
(21, 1, 'subscription_created', 'User subscription_created for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-25 13:08:31', '2025-06-25 13:08:31'),
(22, 1, 'subscription_cancelled', 'User subscription_cancelled for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-25 13:10:10', '2025-06-25 13:10:10'),
(23, 1, 'subscription_created', 'User subscription_created for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 13:10:10', '2025-06-25 13:10:10'),
(24, 2, 'project_created', 'Created project: test user project', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '[]', '{\"project_id\": 4, \"project_name\": \"test user project\"}', '2025-06-25 14:03:44', '2025-06-25 14:03:44'),
(25, 1, 'subscription_cancelled', 'User subscription_cancelled for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 14:10:35', '2025-06-25 14:10:35'),
(26, 1, 'subscription_created', 'User subscription_created for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-25 14:10:35', '2025-06-25 14:10:35'),
(27, 1, 'subscription_cancelled', 'User subscription_cancelled for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-25 14:22:18', '2025-06-25 14:22:18'),
(28, 1, 'subscription_created', 'User subscription_created for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 14:22:18', '2025-06-25 14:22:18'),
(29, 1, 'subscription_cancelled', 'User subscription_cancelled for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 14:22:47', '2025-06-25 14:22:47'),
(30, 1, 'subscription_created', 'User subscription_created for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-25 14:22:47', '2025-06-25 14:22:47'),
(31, 1, 'subscription_cancelled', 'User subscription_cancelled for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-25 14:24:10', '2025-06-25 14:24:10'),
(32, 1, 'subscription_created', 'User subscription_created for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 14:24:10', '2025-06-25 14:24:10'),
(33, 1, 'subscription_cancelled', 'User subscription_cancelled for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 14:27:08', '2025-06-25 14:27:08'),
(34, 1, 'subscription_created', 'User subscription_created for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-25 14:27:08', '2025-06-25 14:27:08'),
(35, 1, 'subscription_cancelled', 'User subscription_cancelled for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-25 14:27:41', '2025-06-25 14:27:41'),
(36, 1, 'subscription_created', 'User subscription_created for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 14:27:41', '2025-06-25 14:27:41'),
(37, 1, 'subscription_cancelled', 'User subscription_cancelled for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 14:28:57', '2025-06-25 14:28:57'),
(38, 1, 'subscription_created', 'User subscription_created for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-25 14:28:57', '2025-06-25 14:28:57'),
(39, 1, 'subscription_cancelled', 'User subscription_cancelled for plan: Basic', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 2, \"plan_name\": \"Basic\"}', '2025-06-25 14:29:45', '2025-06-25 14:29:45'),
(40, 1, 'subscription_created', 'User subscription_created for plan: Free', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 1, \"plan_name\": \"Free\"}', '2025-06-25 14:29:45', '2025-06-25 14:29:45'),
(41, 1, 'subscription_cancelled', 'User subscription_cancelled for plan: Free', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 1, \"plan_name\": \"Free\"}', '2025-06-25 14:30:01', '2025-06-25 14:30:01'),
(42, 1, 'subscription_created', 'User subscription_created for plan: Premium', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, '{\"plan_id\": 3, \"plan_name\": \"Premium\"}', '2025-06-25 14:30:01', '2025-06-25 14:30:01'),
(43, 1, 'team_member_assigned', 'Assigned Test User to project: test project', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '[]', '[]', '2025-06-25 14:57:13', '2025-06-25 14:57:13'),
(44, 1, 'team_member_assigned', 'Assigned Admin Usera to project: booking system', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '[]', '[]', '2025-06-25 15:13:20', '2025-06-25 15:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '20d0def7-a0db-4c84-9742-904818bae4ef', 'database', 'default', '{\"uuid\":\"20d0def7-a0db-4c84-9742-904818bae4ef\",\"displayName\":\"App\\\\Mail\\\\InvoiceMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:20:\\\"App\\\\Mail\\\\InvoiceMail\\\":3:{s:12:\\\"subscription\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Subscription\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:27:\\\"hareshbaraiya1028@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1750881138,\"delay\":null}', 'InvalidArgumentException: View [emails.invoice] not found. in D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php:138\nStack trace:\n#0 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php(78): Illuminate\\View\\FileViewFinder->findInPaths(\'emails.invoice\', Array)\n#1 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Factory.php(150): Illuminate\\View\\FileViewFinder->find(\'emails.invoice\')\n#2 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(444): Illuminate\\View\\Factory->make(\'emails.invoice\', Array)\n#3 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(419): Illuminate\\Mail\\Mailer->renderView(\'emails.invoice\', Array)\n#4 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(312): Illuminate\\Mail\\Mailer->addContent(Object(Illuminate\\Mail\\Message), \'emails.invoice\', NULL, NULL, Array)\n#5 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(207): Illuminate\\Mail\\Mailer->send(\'emails.invoice\', Array, Object(Closure))\n#6 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#7 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(200): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#8 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SendQueuedMailable.php(82): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\MailManager))\n#9 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Mail\\SendQueuedMailable->handle(Object(Illuminate\\Mail\\MailManager))\n#10 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#11 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#12 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#13 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(754): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#14 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Container\\Container->call(Array)\n#15 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(169): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#16 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#17 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(136): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#18 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(125): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Mail\\SendQueuedMailable), false)\n#19 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(169): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#20 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#21 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#22 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Mail\\SendQueuedMailable))\n#23 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#24 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(444): Illuminate\\Queue\\Jobs\\Job->fire()\n#25 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(394): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#26 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(180): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#28 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#29 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#30 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#32 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#33 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(754): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#34 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(209): Illuminate\\Container\\Container->call(Array)\n#35 D:\\wamp64\\www\\saas-platform\\vendor\\symfony\\console\\Command\\Command.php(318): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(178): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#37 D:\\wamp64\\www\\saas-platform\\vendor\\symfony\\console\\Application.php(1092): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 D:\\wamp64\\www\\saas-platform\\vendor\\symfony\\console\\Application.php(341): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 D:\\wamp64\\www\\saas-platform\\vendor\\symfony\\console\\Application.php(192): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(197): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 D:\\wamp64\\www\\saas-platform\\artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#43 {main}', '2025-06-25 14:22:21'),
(2, '4d9a7dd6-d1b0-427a-a257-5765fb7a7fc6', 'database', 'default', '{\"uuid\":\"4d9a7dd6-d1b0-427a-a257-5765fb7a7fc6\",\"displayName\":\"App\\\\Mail\\\\InvoiceMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:20:\\\"App\\\\Mail\\\\InvoiceMail\\\":3:{s:12:\\\"subscription\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Subscription\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:27:\\\"hareshbaraiya1028@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1750881167,\"delay\":null}', 'InvalidArgumentException: View [emails.invoice] not found. in D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php:138\nStack trace:\n#0 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php(78): Illuminate\\View\\FileViewFinder->findInPaths(\'emails.invoice\', Array)\n#1 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Factory.php(150): Illuminate\\View\\FileViewFinder->find(\'emails.invoice\')\n#2 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(444): Illuminate\\View\\Factory->make(\'emails.invoice\', Array)\n#3 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(419): Illuminate\\Mail\\Mailer->renderView(\'emails.invoice\', Array)\n#4 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(312): Illuminate\\Mail\\Mailer->addContent(Object(Illuminate\\Mail\\Message), \'emails.invoice\', NULL, NULL, Array)\n#5 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(207): Illuminate\\Mail\\Mailer->send(\'emails.invoice\', Array, Object(Closure))\n#6 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#7 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(200): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#8 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SendQueuedMailable.php(82): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\MailManager))\n#9 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Mail\\SendQueuedMailable->handle(Object(Illuminate\\Mail\\MailManager))\n#10 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#11 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#12 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#13 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(754): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#14 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Container\\Container->call(Array)\n#15 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(169): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#16 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#17 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(136): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#18 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(125): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Mail\\SendQueuedMailable), false)\n#19 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(169): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#20 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#21 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#22 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Mail\\SendQueuedMailable))\n#23 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#24 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(444): Illuminate\\Queue\\Jobs\\Job->fire()\n#25 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(394): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#26 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(180): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#28 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#29 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#30 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#32 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#33 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(754): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#34 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(209): Illuminate\\Container\\Container->call(Array)\n#35 D:\\wamp64\\www\\saas-platform\\vendor\\symfony\\console\\Command\\Command.php(318): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(178): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#37 D:\\wamp64\\www\\saas-platform\\vendor\\symfony\\console\\Application.php(1092): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 D:\\wamp64\\www\\saas-platform\\vendor\\symfony\\console\\Application.php(341): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 D:\\wamp64\\www\\saas-platform\\vendor\\symfony\\console\\Application.php(192): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(197): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 D:\\wamp64\\www\\saas-platform\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 D:\\wamp64\\www\\saas-platform\\artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#43 {main}', '2025-06-25 14:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `features_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `key`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Basic Project Management', 'basic_projects', 'Create and manage basic projects', 1, '2025-06-24 22:20:26', '2025-06-24 22:20:26'),
(2, 'Team Assignment', 'team_assignment', 'Assign team members to projects', 1, '2025-06-24 22:20:26', '2025-06-24 22:20:26'),
(3, 'Advanced Analytics', 'advanced_analytics', 'View detailed project analytics and reports', 1, '2025-06-24 22:20:26', '2025-06-24 22:20:26'),
(4, 'Priority Support', 'priority_support', 'Get priority customer support', 1, '2025-06-24 22:20:26', '2025-06-24 22:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_24_163304_create_permission_tables', 1),
(5, '2025_06_24_175025_create_plans_table', 1),
(6, '2025_06_24_175100_create_features_table', 1),
(7, '2025_06_24_175102_add_plan_to_users_table', 1),
(8, '2025_06_24_175124_create_plan_feature_table', 1),
(9, '2025_06_24_182714_add_role_to_users_table', 1),
(10, '2025_06_25_022220_create_subscriptions_table', 1),
(11, '2025_06_25_022229_create_projects_table', 1),
(12, '2025_06_25_022238_create_project_team_members_table', 1),
(13, '2025_06_25_022247_create_audit_logs_table', 1),
(14, '2025_06_25_194809_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(7, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('hareshbaraiya1028@gmail.com', '$2y$12$5LNar.qvEG9cWz1pAm8fY.yv1hSiIDg47nGLpp8TWIwaYePM71fYy', '2025-06-25 14:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage-users', 'web', '2025-06-24 22:20:26', '2025-06-24 22:20:26'),
(2, 'manage-plans', 'web', '2025-06-24 22:20:26', '2025-06-24 22:20:26'),
(3, 'manage-subscriptions', 'web', '2025-06-24 22:20:26', '2025-06-24 22:20:26'),
(4, 'view-admin-dashboard', 'web', '2025-06-24 22:20:26', '2025-06-24 22:20:26'),
(5, 'create-projects', 'web', '2025-06-24 22:20:26', '2025-06-24 22:20:26'),
(6, 'assign-team-members', 'web', '2025-06-24 22:20:26', '2025-06-24 22:20:26'),
(7, 'project.assign-team', 'web', '2025-06-25 14:53:15', '2025-06-25 14:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'api-token', '7d757203efb2106e926ddd0c6e8e3e31643a2b3fad2cf27b5027609f74efbbea', '[\"*\"]', NULL, NULL, '2025-06-25 15:38:33', '2025-06-25 15:38:33'),
(2, 'App\\Models\\User', 1, 'api-token', '00290e157d5c55b796030ed0c47b29311c9f253c5985eee9f7e14e30d076bdd2', '[\"*\"]', NULL, NULL, '2025-06-25 15:53:00', '2025-06-25 15:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
CREATE TABLE IF NOT EXISTS `plans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `billing_cycle` enum('monthly','yearly') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'monthly',
  `max_projects` int NOT NULL DEFAULT '1',
  `can_assign_teams` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plans_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `slug`, `description`, `price`, `billing_cycle`, `max_projects`, `can_assign_teams`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Free', 'free', 'Perfect for getting started', 0.00, 'monthly', 1, 0, 1, '2025-06-24 22:20:26', '2025-06-24 22:20:26'),
(2, 'Basic', 'basic', 'Great for small teams', 29.99, 'monthly', 5, 1, 1, '2025-06-24 22:20:26', '2025-06-24 22:20:26'),
(3, 'Premium', 'premium', 'For growing businesses', 99.99, 'monthly', -1, 1, 1, '2025-06-24 22:20:26', '2025-06-24 22:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `plan_features`
--

DROP TABLE IF EXISTS `plan_features`;
CREATE TABLE IF NOT EXISTS `plan_features` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `plan_id` bigint UNSIGNED NOT NULL,
  `feature_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plan_features_plan_id_feature_id_unique` (`plan_id`,`feature_id`),
  KEY `plan_features_feature_id_foreign` (`feature_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_features`
--

INSERT INTO `plan_features` (`id`, `plan_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 3, 2, NULL, NULL),
(6, 3, 3, NULL, NULL),
(7, 3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` enum('planning','active','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'planning',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `user_id`, `status`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'booking system', 'booking system', 1, 'planning', NULL, NULL, '2025-06-24 21:44:06', '2025-06-24 21:44:06'),
(2, 'test project', 'test project', 1, 'planning', NULL, NULL, '2025-06-24 22:12:29', '2025-06-24 22:12:29'),
(3, 'B1 project', 'test', 3, 'planning', NULL, NULL, '2025-06-25 12:54:15', '2025-06-25 12:54:15'),
(4, 'test user project', 'test user project', 2, 'planning', NULL, NULL, '2025-06-25 14:03:44', '2025-06-25 14:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `project_team_members`
--

DROP TABLE IF EXISTS `project_team_members`;
CREATE TABLE IF NOT EXISTS `project_team_members` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `role` enum('member','lead') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `project_team_members_project_id_user_id_unique` (`project_id`,`user_id`),
  KEY `project_team_members_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_team_members`
--

INSERT INTO `project_team_members` (`id`, `project_id`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'member', NULL, NULL),
(2, 1, 2, 'lead', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-06-24 22:20:26', '2025-06-24 22:20:26'),
(2, 'user', 'web', '2025-06-24 22:20:26', '2025-06-24 22:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('w3lEJ7vgZ60KX92pliP8BAWbr7cFwCn5XJy6J1lQ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTGhOcnhuc1REV2NHcW1OMmlFdnNlYTZPT2hxZWMyZUVCZ2R6SmVBUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1750886576);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `plan_id` bigint UNSIGNED NOT NULL,
  `status` enum('active','cancelled','expired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `starts_at` timestamp NOT NULL,
  `expires_at` timestamp NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriptions_user_id_foreign` (`user_id`),
  KEY `subscriptions_plan_id_foreign` (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `plan_id`, `status`, `starts_at`, `expires_at`, `payment_method`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'cancelled', '2025-06-24 22:20:50', '2025-07-24 22:20:50', 'card', 'fake_685b721a3c989', '2025-06-24 22:20:50', '2025-06-24 22:22:23'),
(2, 1, 1, 'cancelled', '2025-06-24 22:22:23', '2025-07-24 22:22:23', 'card', 'fake_685b727742e82', '2025-06-24 22:22:23', '2025-06-24 22:22:39'),
(3, 1, 3, 'cancelled', '2025-06-24 22:22:39', '2025-07-24 22:22:39', 'card', 'fake_685b72875b4f1', '2025-06-24 22:22:39', '2025-06-25 13:08:31'),
(4, 3, 3, 'cancelled', '2025-06-25 12:54:40', '2025-07-25 12:54:40', 'bank', 'fake_685c3ee81fe99', '2025-06-25 12:54:40', '2025-06-25 12:54:47'),
(5, 3, 3, 'cancelled', '2025-06-25 12:54:47', '2025-07-25 12:54:47', 'card', 'fake_685c3eef3df94', '2025-06-25 12:54:47', '2025-06-25 12:54:52'),
(6, 3, 3, 'cancelled', '2025-06-25 12:54:52', '2025-07-25 12:54:52', 'card', 'fake_685c3ef4d971f', '2025-06-25 12:54:52', '2025-06-25 12:55:00'),
(7, 3, 3, 'cancelled', '2025-06-25 12:55:00', '2025-07-25 12:55:00', 'bank', 'fake_685c3efc347b5', '2025-06-25 12:55:00', '2025-06-25 12:56:14'),
(8, 3, 2, 'cancelled', '2025-06-25 12:56:14', '2025-07-25 12:56:14', 'card', 'fake_685c3f46a4d6c', '2025-06-25 12:56:14', '2025-06-25 12:56:27'),
(9, 3, 1, 'active', '2025-06-25 12:56:27', '2025-07-25 12:56:27', 'card', 'fake_685c3f53561ae', '2025-06-25 12:56:27', '2025-06-25 12:56:27'),
(10, 1, 2, 'cancelled', '2025-06-25 13:08:31', '2025-07-25 13:08:31', 'card', 'fake_685c422788e8a', '2025-06-25 13:08:31', '2025-06-25 13:10:10'),
(11, 1, 3, 'cancelled', '2025-06-25 13:10:10', '2025-07-25 13:10:10', 'card', 'fake_685c428ac5ece', '2025-06-25 13:10:10', '2025-06-25 14:10:35'),
(12, 1, 2, 'cancelled', '2025-06-25 14:10:35', '2025-07-25 14:10:35', 'card', 'fake_685c50b39e01a', '2025-06-25 14:10:35', '2025-06-25 14:22:18'),
(13, 1, 3, 'cancelled', '2025-06-25 14:22:18', '2025-07-25 14:22:18', 'card', 'fake_685c5372aadb2', '2025-06-25 14:22:18', '2025-06-25 14:22:47'),
(14, 1, 2, 'cancelled', '2025-06-25 14:22:47', '2025-07-25 14:22:47', 'paypal', 'fake_685c538f8548e', '2025-06-25 14:22:47', '2025-06-25 14:24:10'),
(15, 1, 3, 'cancelled', '2025-06-25 14:24:10', '2025-07-25 14:24:10', 'bank', 'fake_685c53e23f814', '2025-06-25 14:24:10', '2025-06-25 14:27:08'),
(16, 1, 2, 'cancelled', '2025-06-25 14:27:08', '2025-07-25 14:27:08', 'card', 'fake_685c54949827c', '2025-06-25 14:27:08', '2025-06-25 14:27:41'),
(17, 1, 3, 'cancelled', '2025-06-25 14:27:41', '2025-07-25 14:27:41', 'card', 'fake_685c54b52e971', '2025-06-25 14:27:41', '2025-06-25 14:28:57'),
(18, 1, 2, 'cancelled', '2025-06-25 14:28:57', '2025-07-25 14:28:57', 'card', 'fake_685c5501d2e45', '2025-06-25 14:28:57', '2025-06-25 14:29:45'),
(19, 1, 1, 'cancelled', '2025-06-25 14:29:45', '2025-07-25 14:29:45', 'card', 'fake_685c5531e713f', '2025-06-25 14:29:45', '2025-06-25 14:30:01'),
(20, 1, 3, 'active', '2025-06-25 14:30:01', '2025-07-25 14:30:01', 'card', 'fake_685c55419d65a', '2025-06-25 14:30:01', '2025-06-25 14:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `plan_id` bigint UNSIGNED DEFAULT NULL,
  `plan_expires_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_plan_id_foreign` (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `plan_id`, `plan_expires_at`) VALUES
(1, 'Haresh', 'hareshbaraiya1028@gmail.com', 'Admin', NULL, '$2y$12$P2D8M4w/h7P3ZrfYEhq6t.f42K8LDYjw7wptEr0flI82zJpxAQAcS', NULL, '2025-06-24 21:20:39', '2025-06-24 21:20:39', NULL, NULL),
(2, 'Admin Usera', 'admin@admin.com', 'User', '2025-06-24 22:20:26', '$2y$12$zlJlPcRqhNzSKtbAy2FP7uqaWmuk/xEHq5Lga4kEjoYAuW/Y.vCSK', NULL, '2025-06-24 22:20:26', '2025-06-25 13:59:36', NULL, NULL),
(3, 'Test User', 'user@example.com', 'User', '2025-06-24 22:20:26', '$2y$12$HbsEPdlGonkH0TRAIoJiWe/0aXMRHxQj4k5Y/oFotl5qkMGcUZt7W', NULL, '2025-06-24 22:20:26', '2025-06-25 12:51:42', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD CONSTRAINT `audit_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plan_features`
--
ALTER TABLE `plan_features`
  ADD CONSTRAINT `plan_features_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plan_features_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_team_members`
--
ALTER TABLE `project_team_members`
  ADD CONSTRAINT `project_team_members_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_team_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
