-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 25 مايو 2021 الساعة 22:34
-- إصدار الخادم: 10.2.26-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chalets_amr`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `photo_profile` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `group_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `photo_profile`, `password`, `group_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'الادارة', 'test@test.com', 'admin/1/nosgkLSNOyHA3V6s00Xk63RymH4mh1BJlgfw6rfx.png', '$2y$10$aR3NAztSMDsLA77/zBDPjO4R1aJE0MpwTR0RHd5eoIbOIIiQ2050i', NULL, 'dvAJhRS2PCR4R0l69oZBdDzoO31P76DLEhawT9PdT9wOFgk0dYeFNS5FeHPG', '2020-01-24 11:04:35', '2020-02-02 18:20:56');

-- --------------------------------------------------------

--
-- بنية الجدول `admin_groups`
--

CREATE TABLE `admin_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `setting` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `about` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `admingroup_add` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `admingroup_edit` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `admingroup_show` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `admingroup_delete` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `page_add` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `page_edit` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `page_show` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `page_delete` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `links_add` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `links_edit` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `links_show` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `links_delete` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `admin_add` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `admin_edit` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `admin_show` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `admin_delete` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `contect_add` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `contect_edit` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `contect_show` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `contect_delete` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `socail_add` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `socail_edit` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `socail_show` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `socail_delete` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `area_show` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `area_edit` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `area_add` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `area_delete` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `city_show` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `city_edit` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `city_add` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `city_delete` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `user_show` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `user_edit` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `user_add` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `user_delete` enum('enable','disable') NOT NULL DEFAULT 'disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `areas`
--

INSERT INTO `areas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الرياض', '2021-05-01 17:25:49', '2021-05-01 17:25:49'),
(2, 'حائل', '2021-05-01 17:25:57', '2021-05-01 17:25:57');

-- --------------------------------------------------------

--
-- بنية الجدول `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `Bank_item_id` int(10) UNSIGNED NOT NULL,
  `Bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `banks`
--

INSERT INTO `banks` (`id`, `Bank_item_id`, `Bank_name`, `bank_photo`, `created_at`, `updated_at`) VALUES
(1, 4, '15151151511551151515', 'bank/SG11vPdwMWGadZOimZyNcCpGRS4MknzpVX485gME.png', '2021-05-15 09:34:44', '2021-05-15 09:34:44'),
(2, 4, '15151151511551151515', 'bank/4HyrNma8y8fvJ5XUaLYoBnGgosg36iPi3R8zPY5P.png', '2021-05-15 09:34:57', '2021-05-15 09:34:57'),
(3, 4, '15151151511551151515', 'bank/c0aL7jEs5zuDcjinaPvahekmgPfU75UUgSaU8kUM.png', '2021-05-15 09:35:13', '2021-05-15 09:35:13'),
(4, 5, '258608010', 'bank/2vFAjLNYbKQoBlIgNsa8wjIsdf6W7ITB4z8UIs7L.png', '2021-05-21 06:29:24', '2021-05-21 06:29:24');

-- --------------------------------------------------------

--
-- بنية الجدول `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `area_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `cities`
--

INSERT INTO `cities` (`id`, `name`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 'الرياض مدينة', 1, '2021-05-01 17:26:33', '2021-05-01 17:26:33'),
(2, 'حى الرياض ', 1, '2021-05-19 14:15:40', '2021-05-19 14:15:40'),
(3, 'حي النقرة', 2, '2021-05-21 22:39:19', '2021-05-21 22:39:19');

-- --------------------------------------------------------

--
-- بنية الجدول `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `status_msg` enum('seen','unseen') NOT NULL DEFAULT 'seen',
  `move_to` enum('inbox','archive','spam') NOT NULL DEFAULT 'inbox',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `contact_us_replays`
--

CREATE TABLE `contact_us_replays` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `msg_id` int(10) UNSIGNED DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `file` varchar(191) NOT NULL,
  `full_path` varchar(191) NOT NULL,
  `type_file` varchar(191) NOT NULL,
  `type_id` varchar(191) NOT NULL,
  `path` varchar(191) NOT NULL,
  `ext` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `size` varchar(191) NOT NULL,
  `size_bytes` int(11) NOT NULL,
  `mimtype` varchar(191) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `image_items`
--

CREATE TABLE `image_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `imageItem_id` int(10) UNSIGNED NOT NULL,
  `imageItem_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `image_items`
--

INSERT INTO `image_items` (`id`, `admin_id`, `imageItem_id`, `imageItem_photo`, `created_at`, `updated_at`) VALUES
(17, 1, 4, 'imageitem/6bZoVX2kkaaJaqP1EOiF0Rb8QA7fFStWiTMYJY8v.png', '2021-05-15 04:20:24', '2021-05-15 04:20:24'),
(18, 1, 4, 'imageitem/7HAhTiZqlOyL6EJy1HB4tihL5ZOKay1jJIwQVW8z.png', '2021-05-15 04:20:24', '2021-05-15 04:20:24'),
(19, 1, 5, 'imageitem/nm25Cuwl9bDK4yvwq5zQCuufaxRpbVDCQvZwdHgD.jpeg', '2021-05-21 06:27:29', '2021-05-21 06:27:29'),
(20, 1, 5, 'imageitem/PkM8nMeJI7imPBPYQ2FFx1iuVqnbzMJFWjGARXfC.jpeg', '2021-05-21 06:27:29', '2021-05-21 06:27:29'),
(21, 1, 5, 'imageitem/hrAdOTGN9VrBchhkVwCh9bVLHEnJnadlZ8k3257M.jpeg', '2021-05-21 06:27:29', '2021-05-21 06:27:29'),
(22, 1, 5, 'imageitem/9Sy3Zcy44KXcgbThIf1je0PL9Ey5wwR5PY03UIsJ.jpeg', '2021-05-21 06:27:29', '2021-05-21 06:27:29'),
(23, 1, 6, 'imageitem/TjApkACz8EVT8VjqgsTFwg4QNGuRGV0SsLzzIbH6.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(24, 1, 6, 'imageitem/PwPLMbMVFIlxzcQ0euMFO01zvjcs8XOF4E89P18i.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(25, 1, 6, 'imageitem/sPAO8F7bDm2W1tIOIljiWTn2oRMfkj5vDBC7Nixp.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(26, 1, 6, 'imageitem/JMvPuDWRg0zhyvykhi2sTvTC5WEFkajJF9nJ8a9w.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(27, 1, 6, 'imageitem/rCzPEvdH9YdburmD1x6aVMDhpu0otg4rq50zHMRG.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(28, 1, 6, 'imageitem/0NGk2dMHDbp4wEiYwXYUuN0qiN1hyuvfTHVqhICZ.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(29, 1, 6, 'imageitem/laND36NRRhF9yacFqo7XXod1Qlz8A84ogl77dow4.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(30, 1, 6, 'imageitem/Bu7F4HXPSGZ1dNEpN0hsoVsfjdH5LRbTuUstqn5J.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(31, 1, 6, 'imageitem/nFQGKyT6mOgkPlS8OUImjLdGWJXmcNzwXw7g95xE.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(32, 1, 6, 'imageitem/r08mOm3ZxG28tIqOCuEHTIjEqF2Oly9yyuvv8ipL.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(33, 1, 6, 'imageitem/R0Uz0KzGaXIKNtxMvzKTzyG98XAaAMaJf2gxjv2D.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(34, 1, 6, 'imageitem/8Sm1tTCDkgs9Zbjff5Yjr6GvNasSv897IoCWEtco.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(35, 1, 6, 'imageitem/0oMqx2sQPE91USM8oYL0dHcpWMeTZPzGoldsLedT.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(36, 1, 6, 'imageitem/XdI9J4fZgOfbLfwNXLY2Z3pCKm6Bq3GSYO7U4WJF.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(37, 1, 6, 'imageitem/TwtcHBo02X6xLEVutDLPInFnCMf1CuW4Vm4SqZZp.jpeg', '2021-05-23 17:57:05', '2021-05-23 17:57:05'),
(38, 1, 7, 'imageitem/eE5JPU6OoRRMOEETBk1A3qpu5M4lUPff23Wh6A7t.jpeg', '2021-05-23 17:59:31', '2021-05-23 17:59:31'),
(39, 1, 7, 'imageitem/MjWlKoABau0kF91f58dxlzJq2IFrQeO12PtYYtiF.jpeg', '2021-05-23 17:59:31', '2021-05-23 17:59:31'),
(40, 1, 7, 'imageitem/4g80ytyUuaHbvuEA75majtHF17tMzFszOdRkblTO.jpeg', '2021-05-23 17:59:31', '2021-05-23 17:59:31'),
(41, 1, 7, 'imageitem/g95STFDSAGMxScPJqRu874w2TQWENUzITDHaLUaX.jpeg', '2021-05-23 17:59:31', '2021-05-23 17:59:31'),
(42, 1, 7, 'imageitem/7OqNRmEVVbAD2vPiTb69VmJH8cGUnL6xsCrYCtXz.jpeg', '2021-05-23 17:59:31', '2021-05-23 17:59:31'),
(43, 1, 7, 'imageitem/YxHD1Ve0mYFotBrqCpkApt8eXFeZOfteAhhEQ4bF.jpeg', '2021-05-23 17:59:31', '2021-05-23 17:59:31'),
(44, 1, 7, 'imageitem/jPjTexWQV1rRRQvPfKAt6KjjG8DBWLEjtlNh6YVM.jpeg', '2021-05-23 17:59:31', '2021-05-23 17:59:31'),
(45, 1, 7, 'imageitem/vJVhhI4FVxtHZjkgn3vn8cUC4vyzO5iThKF2BhZm.jpeg', '2021-05-23 17:59:31', '2021-05-23 17:59:31'),
(46, 1, 7, 'imageitem/Y1jAg9DkUP4afgXGrItg5tuD20Au8W3mCyWDXBbA.jpeg', '2021-05-23 17:59:31', '2021-05-23 17:59:31'),
(47, 1, 7, 'imageitem/yxMeYzNLahPBIuzp9PKWQNwLv2WQE4A4qvnBgXHs.jpeg', '2021-05-23 17:59:31', '2021-05-23 17:59:31'),
(48, 1, 7, 'imageitem/BYICqMmvffGzEEYPIOWapbl7UEX0xKIheMe4YXHw.jpeg', '2021-05-23 17:59:31', '2021-05-23 17:59:31'),
(49, 1, 7, 'imageitem/qfYe35HlQVeK1qTjn9WalTJXFR4nFQQSA51EXt7Z.jpeg', '2021-05-23 17:59:31', '2021-05-23 17:59:31'),
(50, 1, 7, 'imageitem/PzK6W87mQOGZ3K8bIXMFelGa7mIRYsKoJMOzHrSj.jpeg', '2021-05-23 17:59:31', '2021-05-23 17:59:31');

-- --------------------------------------------------------

--
-- بنية الجدول `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `Item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Item_Details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Item_price` int(11) NOT NULL,
  `Item_price_overnight` int(11) NOT NULL,
  `Item_terms` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_bank_account` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_types_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `items`
--

INSERT INTO `items` (`id`, `admin_id`, `Item_name`, `Item_Details`, `Item_price`, `Item_price_overnight`, `Item_terms`, `item_bank_account`, `item_latitude`, `item_longitude`, `item_photo`, `city_id`, `status`, `item_types_id`, `created_at`, `updated_at`) VALUES
(4, 1, 'شاليهات كلوسترز ', '<p>ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضو</p>\r\n', 150, 10, '<p>ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموض</p>\r\n', '51151511515511', '111111', '1111111', 'item/z4xkwAxJHiSCn0fmcbiZpoW7W8cvIiVd4LF38hUw.jpeg', 1, 'active', 1, '2021-05-02 06:58:07', '2021-05-16 16:57:24'),
(5, 1, 'شاليه الكناري', '<p>(((تفاصيل الشالية + شاليه الكناري</p>\r\n\r\n<p><a href=\"http://google.com\">ljkhkljlkjlk&nbsp; </a>+&nbsp;</p>\r\n\r\n<p>تفاصيل الشالية)))</p>\r\n', 800, 0, '<p><span style=\"color:#e74c3c\"><span style=\"font-size:24px\"><strong>باتمامك للحجز فانت توافق على الشروط والاحكام الخاصة بالشاليه</strong></span></span></p>\r\n\r\n<p>(((الشروط والاحكام - الكناري -&nbsp;الشروط والاحكام)))</p>\r\n', NULL, '27.866734', '41.753181', 'item/9xVBTUeMCh7MZyh8275IHPOe89oOOpPjj5aCpcpY.jpeg', 3, 'active', 1, '2021-05-21 06:27:29', '2021-05-21 22:39:56'),
(6, 1, 'فالي 1', '<p>فيلام فالي 1</p>\r\n\r\n<p>غرف النوم : 3</p>\r\n\r\n<p>يوجد مسبح</p>\r\n\r\n<p>بقية التفاصيل تذكر هنا</p>\r\n\r\n<p><a href=\"https://www.google.com/maps/place/6165%D8%8C+%D8%A7%D9%84%D9%88%D8%B3%D9%8A%D8%B7%D8%A7%D8%A1%D8%8C+%D8%AD%D8%A7%D8%A6%D9%84+55424%C2%A02838%E2%80%AD/@27.5092986,41.6670157,17z/data=!3m1!4b1!4m5!3m4!1s0x157640becff17eef:0xdaf5eaad70b078c!8m2!3d27.5092952!4d41.6654258\">للوصول الى الموقع اضغط هنا</a></p>\r\n', 1000, 500, '<p><span style=\"color:#ff0000\"><span style=\"font-size:14px\"><strong>بحجزك للشاليه فأنت توافق على الشروط والأحكام التاليه</strong></span></span></p>\r\n\r\n<p>شروط وأحكام الفيلا :</p>\r\n\r\n<p>شرط 1</p>\r\n\r\n<p>شرط 2</p>\r\n\r\n<p>شرط 3</p>\r\n', NULL, '27.866734', '41.753181', 'item/m770DFOfpWBmRm8qjfTtcRyNeqBl8oAakTfvq5VF.jpeg', 3, 'active', 2, '2021-05-23 17:57:05', '2021-05-23 20:22:55'),
(7, 1, 'فالي 2', '<p style=\"direction:rtl\">تفاصيل الشاليه</p>\r\n\r\n<p style=\"direction:rtl\">عدد غرف النوم : 3</p>\r\n\r\n<p style=\"direction:rtl\">المجالس : 1 مساحته 64 متر مربع</p>\r\n\r\n<p style=\"direction:rtl\">يوجد مسبح</p>\r\n\r\n<p style=\"direction:rtl\">وبقية التفاصيل تذكر هنا</p>\r\n', 1000, 500, '<p><span style=\"color:#ff0000\"><strong>بحجزك للشاليه فأنت توافق على الشروط والأحكام التاليه</strong></span></p>\r\n\r\n<p>شروط وأحكام الفيلا :</p>\r\n\r\n<p>شرط 1</p>\r\n\r\n<p>شرط 2</p>\r\n\r\n<p>شرط 3</p>\r\n', NULL, '27.866734', '41.753181', 'item/XcpmW84K6zxbfes7IEFF4pz5hk5EAiemYCwQJZDN.jpeg', 3, 'active', 2, '2021-05-23 17:59:31', '2021-05-23 18:03:39');

-- --------------------------------------------------------

--
-- بنية الجدول `item_types`
--

CREATE TABLE `item_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `ItemType_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `item_types`
--

INSERT INTO `item_types` (`id`, `admin_id`, `ItemType_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'شالية ', '2021-05-01 13:39:44', '2021-05-01 13:39:44'),
(2, 1, 'فيلا ', '2021-05-01 13:39:51', '2021-05-01 13:39:51');

-- --------------------------------------------------------

--
-- بنية الجدول `links`
--

CREATE TABLE `links` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `url` varchar(191) NOT NULL,
  `link_place` enum('header','footer') DEFAULT 'header',
  `icon` varchar(191) DEFAULT NULL,
  `status` enum('pending','active') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `links`
--

INSERT INTO `links` (`id`, `name`, `url`, `link_place`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'الرئيسية', 'https://vally.hgamma.com', 'header', NULL, 'active', '2020-02-02 18:01:59', '2021-05-22 00:41:50'),
(2, 'الشاليهات', 'https://vally.hgamma.com/chalets', 'header', NULL, 'active', '2020-02-02 18:02:34', '2021-05-21 22:33:33'),
(3, 'الشروط والاحكام', 'https://chalets.alharbi-group.com', 'footer', NULL, 'active', '2020-02-02 18:02:57', '2021-05-14 15:05:53'),
(4, 'سياسة الخصوصية', 'https://chalets.alharbi-group.com/page/2', 'footer', NULL, 'active', '2020-02-02 18:03:53', '2021-05-14 15:06:43'),
(5, 'اتصل بنا', 'https://vally.hgamma.com/contectus', 'header', NULL, 'active', '2020-02-02 18:04:11', '2021-05-21 22:33:48');

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_22_094109_create_admin_groups_table', 1),
(4, '2018_02_22_094109_create_admins_table', 1),
(5, '2018_04_04_002130_create_files_table', 1),
(6, '2018_07_19_132721_create_contacts_table', 1),
(7, '2018_07_19_132722_create_contact_us_replays_table', 1),
(8, '2018_08_31_700207_create_links_table', 1),
(9, '2018_08_31_783275_create_pages_table', 1),
(10, '2018_09_03_353448_create_socials_table', 1),
(11, '2018_12_23_985759_create_settings_table', 1),
(12, '2019_09_01_210105_create_areas_table', 1),
(13, '2019_09_01_210552_create_cities_table', 1),
(35, '2021_05_01_493943_create_testes_table', 2),
(37, '2021_05_01_131407_create_item_types_table', 3),
(40, '2021_05_01_276986_create_items_table', 4),
(42, '2021_05_01_581680_create_image_items_table', 5),
(43, '2021_05_15_720126_create_banks_table', 6),
(44, '2021_05_16_342659_create_reservations_table', 7);

-- --------------------------------------------------------

--
-- بنية الجدول `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `content` longtext NOT NULL,
  `status` enum('pending','active') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, 'الشروط والأحكام', '<p>أهلا بك في مشارق.كوم. تشكل هذه الشروط والأحكام اتفاقية ملزمة قانونًا بينك وبيننا. إنك تقر وتوافق على أن هذه الشروط والأحكام تطبق بمجرد دخولك واستخدامك لموقع مشارق.كوم والخدمات، وأنك لديك كامل الصلاحية والسلطة للدخول في اتفاقية ملزمة وتنفيذها معنا لاستخدام خدمات مشارق.كوم، ومفوض حسب الأصول لربط الطرف الذي تعمل من أجله</p>\r\n\r\n<p>عند دخولك أو استخدامك للموقع أو استخدام الخدمة، فإنك تقر بأنك قد قرأت وفهمت ووافقت على الالتزام بهذه الشروط والأحكام</p>\r\n\r\n<h3>من نحن</h3>\r\n\r\n<p>شركة مشارقكم لتقنية المعلومات المحدودة وهي شركة تأسست بموجب قوانين المملكة الأردنية الهاشمية، ومكتبها الرئيسي في عمان، الأردن، وسجل تجاري رقم: 51838، يشار إليها فيما بعد باسم (&quot;مشارق.كوم&quot; أو &quot;مشارق&quot; أو &quot;السوق&quot; أو &quot;نحن&quot; &quot; أو &quot;لنا&quot; أو &quot;موقعنا&quot; أو &quot;موقع الكتروني&quot;)</p>\r\n\r\n<p>إنَّ شركة مشارق.كوم لا تعمل كوكالة توظيف، ولكنها تعمل كوسيط بين أصحاب العمل الذين يبحثون عن خدمات التوظيف ومسؤولي التوظيف الذين يمكنهم تقديم خدماتهم في عملية التوظيف.</p>\r\n\r\n<p>تحتفظ شركة مشارق.كوم بحق تغيير هذه الشروط والأحكام في أي وقت دون سابق إنذار، وذلك بنشر التغييرات على الموقع؛ وتكون مسؤولية المستخدم التحقق من هذه الشروط والأحكام في كل مرة يدخل فيها إلى الموقع لضمان معرفته بأي تغييرات</p>\r\n', 'active', '2021-05-14 08:14:53', '2021-05-14 08:15:46'),
(3, 'عنوان جديد', '<p dir=\"rtl\">عنوان جديدعنوان جديدعنوان جديدعنوان جديدعنوان جديدعنوان جديدعنوان <a href=\"http://google.com\">جديدعنوان</a> جديدعنوان جديدعنوان جديدعنوان جديدعنوان جديدعنوان جديد</p>\r\n', 'active', '2021-05-21 06:49:28', '2021-05-21 06:51:09');

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `Reservation_item_id` int(10) UNSIGNED NOT NULL,
  `Reservation_start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Reservation_end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Reservation_start_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Reservation_end_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Reservation_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Reservation_user_id` int(10) UNSIGNED NOT NULL,
  `Reservation_overnight` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `Reservation_status` enum('pending','done','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `reservations`
--

INSERT INTO `reservations` (`id`, `Reservation_item_id`, `Reservation_start_date`, `Reservation_end_date`, `Reservation_start_time`, `Reservation_end_time`, `Reservation_price`, `Reservation_user_id`, `Reservation_overnight`, `count`, `Reservation_status`, `created_at`, `updated_at`) VALUES
(29, 6, '23-05-2021', '25-05-2021', '03:00 مساءا', '12:00 ظهراٌ', '3000', 27, '1', 2, 'done', '2021-05-23 20:52:16', '2021-05-23 20:56:25'),
(30, 6, '25-05-2021', '27-05-2021', '03:00 مساءا', '12:00 ظهراٌ', '3000', 27, '0', 2, 'pending', '2021-05-23 22:51:07', '2021-05-23 22:51:07'),
(31, 5, '28-05-2021', '28-05-2021', '03:00 مساءا', '12:00 ليلاٌ', '800 ريال', 26, '1', 1, 'done', '2021-05-24 22:23:41', '2021-05-24 22:23:41');

-- --------------------------------------------------------

--
-- بنية الجدول `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sitename_ar` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `description_ar` longtext DEFAULT NULL,
  `keywords_ar` longtext DEFAULT NULL,
  `Address` varchar(191) DEFAULT NULL,
  `work` varchar(191) DEFAULT NULL,
  `terms` longtext DEFAULT NULL,
  `text_footer` text DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `system_status` enum('open','close') NOT NULL DEFAULT 'open',
  `system_message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `settings`
--

INSERT INTO `settings` (`id`, `sitename_ar`, `email`, `phone`, `description_ar`, `keywords_ar`, `Address`, `work`, `terms`, `text_footer`, `logo`, `icon`, `system_status`, `system_message`, `created_at`, `updated_at`) VALUES
(1, 'مجموعه فيلا فالي', 'test@test.com', '9665000000000', 'فلل وشاليهات فندقيه.. منتجعات', 'مجموعه فيلا فالي\r\n', 'الرياض ', NULL, '<p>الحمدلله </p>', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص هذا النص هو هذا النص هذا النص هو مثال لنص يمكن أن يستبدل\r\n\r\n', 'setting/TLe6gu1fwAzlTLUZUhBG95IRaV7uPFcP0AJ3H1hc.png', 'setting/sPCVVvndaeXBPQTY1vlhFKjWraOSJDk5DNHFwCx1.png', 'open', '<p style=\"text-align: center;\"><span style=\"font-size:36px;\">الموقع قيد الصيانة </span></p><p style=\"text-align: center;\"><span style=\"font-size:36px;\"></span><br></p><p style=\"text-align: center;\"><span style=\"font-size:36px;\">وهنا رسالة الصيانة</span></p>', '2020-01-24 11:05:09', '2021-05-19 07:49:13');

-- --------------------------------------------------------

--
-- بنية الجدول `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `url_name` varchar(191) NOT NULL,
  `fa_icon` varchar(191) NOT NULL,
  `url` varchar(191) NOT NULL,
  `status` enum('pending','active') DEFAULT 'pending',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `socials`
--

INSERT INTO `socials` (`id`, `url_name`, `fa_icon`, `url`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'فيس بوك ', 'fab fa-facebook-f', 'https://www.facebook.com', 'active', NULL, '2020-02-02 18:41:48', '2021-05-14 14:56:21'),
(2, 'تويتر', 'fab fa-twitter', 'https://twitter.com', 'active', NULL, '2020-02-02 18:43:49', '2020-02-02 18:44:42'),
(3, 'انستجرام', 'fab fa-instagram', 'https://instagram.com', 'active', NULL, '2020-02-02 18:44:32', '2020-02-02 18:44:38');

-- --------------------------------------------------------

--
-- بنية الجدول `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `testes_ma` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `activation_code` int(11) DEFAULT NULL,
  `national_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `activation_code`, `national_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'عمرو سالم', '0102250138', 1111, 1558484884, 'zyRuMzKBpESyY3lZKYLoo2dWcXp7zoTPhJwlmp4voW01p84qBoWgWOQ5nEeh', NULL, '2021-05-19 08:28:36'),
(2, 'عيسى مهدى', '0151188855', 0, 0, 'dQ3I4gpQ6TbLXDKWrUVi855Uc7OsAdke6tPBKovwBsWTvoSIg0mBHysDnAep', NULL, '2020-02-17 23:38:14'),
(9, 'عمرو سالم', '0102520138', 1111, NULL, NULL, '2021-05-15 14:23:49', '2021-05-15 14:23:49'),
(12, 'عمرو سالم', '0532396141', NULL, NULL, NULL, '2021-05-18 06:21:17', '2021-05-18 06:21:17'),
(15, 'عيسى مهدى', '0503995349', 305, 1015477498, NULL, '2021-05-18 22:10:42', '2021-05-22 07:27:39'),
(16, 'عمرو سالم', '0687459874', 1111, NULL, NULL, '2021-05-18 22:20:55', '2021-05-18 22:20:55'),
(17, 'amrsalem ', '0651518812', 1111, NULL, NULL, '2021-05-18 22:21:52', '2021-05-18 22:21:52'),
(18, 'عمرو سالم', '0102550138', NULL, 1558484884, NULL, '2021-05-19 07:12:48', '2021-05-19 07:12:48'),
(19, 'عمرو سالم', '0102550138', NULL, 1558484884, NULL, '2021-05-19 07:13:22', '2021-05-19 07:19:06'),
(20, 'عيسى مهدى', '1234562890', NULL, 1518484840, NULL, '2021-05-20 20:37:30', '2021-05-20 20:37:30'),
(21, 'ثصببصثبصث', '1234525490', NULL, 1234567890, NULL, '2021-05-20 20:42:20', '2021-05-20 20:42:20'),
(22, 'wefewfwef', '9514567890', NULL, 1234567890, NULL, '2021-05-20 20:43:14', '2021-05-20 20:43:14'),
(23, 'wefwefwe', '1239546224', 1111, NULL, NULL, '2021-05-20 21:55:24', '2021-05-20 21:55:24'),
(24, 'wefwefwe', '9512368741', 1111, NULL, NULL, '2021-05-20 21:56:09', '2021-05-20 21:56:09'),
(25, 'rgergergerg', '0514789635', 1111, NULL, NULL, '2021-05-20 22:07:16', '2021-05-20 22:07:16'),
(26, 'محمد', '0506126572', NULL, 1234567890, NULL, '2021-05-21 22:42:24', '2021-05-21 22:42:24'),
(27, 'سعود مبارك الشمري ', '0505229654', 2776, 1007781584, NULL, '2021-05-23 20:50:38', '2021-05-23 20:51:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_group_id_foreign` (`group_id`);

--
-- Indexes for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banks_bank_item_id_foreign` (`Bank_item_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_area_id_index` (`area_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_us_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `contact_us_replays`
--
ALTER TABLE `contact_us_replays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_us_replays_admin_id_foreign` (`admin_id`),
  ADD KEY `contact_us_replays_msg_id_foreign` (`msg_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_admin_id_foreign` (`admin_id`),
  ADD KEY `files_user_id_foreign` (`user_id`);

--
-- Indexes for table `image_items`
--
ALTER TABLE `image_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_items_admin_id_foreign` (`admin_id`),
  ADD KEY `image_items_imageitem_id_foreign` (`imageItem_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_admin_id_foreign` (`admin_id`),
  ADD KEY `items_city_id_foreign` (`city_id`),
  ADD KEY `items_item_types_id_foreign` (`item_types_id`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_types_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_reservation_item_id_foreign` (`Reservation_item_id`),
  ADD KEY `reservations_reservation_user_id_foreign` (`Reservation_user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_testes_ma_foreign` (`testes_ma`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_groups`
--
ALTER TABLE `admin_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us_replays`
--
ALTER TABLE `contact_us_replays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_items`
--
ALTER TABLE `image_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `banks`
--
ALTER TABLE `banks`
  ADD CONSTRAINT `banks_bank_item_id_foreign` FOREIGN KEY (`Bank_item_id`) REFERENCES `items` (`id`);

--
-- القيود للجدول `image_items`
--
ALTER TABLE `image_items`
  ADD CONSTRAINT `image_items_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `image_items_imageitem_id_foreign` FOREIGN KEY (`imageItem_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_item_types_id_foreign` FOREIGN KEY (`item_types_id`) REFERENCES `item_types` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `item_types`
--
ALTER TABLE `item_types`
  ADD CONSTRAINT `item_types_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_reservation_item_id_foreign` FOREIGN KEY (`Reservation_item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `reservations_reservation_user_id_foreign` FOREIGN KEY (`Reservation_user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_testes_ma_foreign` FOREIGN KEY (`testes_ma`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
