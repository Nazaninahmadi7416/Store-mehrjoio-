-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2019 at 11:55 AM
-- Server version: 10.3.15-MariaDB
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
-- Database: `prime_apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `ID` int(11) NOT NULL,
  `title` longtext COLLATE utf8_persian_ci NOT NULL,
  `discount_code` longtext COLLATE utf8_persian_ci NOT NULL,
  `usage_limit` int(11) NOT NULL,
  `used_amount` int(11) NOT NULL,
  `max_amount` int(11) NOT NULL,
  `discount_percent` int(11) NOT NULL,
  `expire_date` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `discount_codes`
--

INSERT INTO `discount_codes` (`ID`, `title`, `discount_code`, `usage_limit`, `used_amount`, `max_amount`, `discount_percent`, `expire_date`) VALUES
(1, 'عنوان', 'code_disc', 1111, 0, 2222, 3333, 1946724256),
(2, 'عنوان کد جدید', 'disc_codex', 111, 0, 222, 333, 1946724466);

-- --------------------------------------------------------

--
-- Table structure for table `file_manager`
--

CREATE TABLE `file_manager` (
  `ID` int(11) NOT NULL,
  `file_name` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `original_file_name` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `file_path` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `file_type` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `file_size` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `file_manager`
--

INSERT INTO `file_manager` (`ID`, `file_name`, `original_file_name`, `file_path`, `file_type`, `file_size`, `user_id`, `admin_id`, `date`) VALUES
(13, '1_9b0c5383b2a0e92baac0a28ad813792b.mp4', 'udemy_the_complete_jquery_course_2019_build_real_world_projects_introduction.mp4', './p_uploads_dir/', 'video/mp4', 16849.3, 0, 1, '2019-07-03 16:18:52'),
(14, '1_e3d391952222984d119a24bb0e56278f.vtt', 'fbca231d-bfea-4c51-8411-a3f2ff4d3ec1.vtt', './p_uploads_dir/', 'text/plain', 57.65, 0, 1, '2019-07-03 16:22:02'),
(15, '1_23bc9d4d73410d3f820e902b317b1d34.zip', 'masoudx-chinese-app-c00aae583783.zip', './p_uploads_dir/', 'application/zip', 39518, 0, 1, '2019-07-03 16:23:02'),
(17, '1_53846b320767e072048eaca5895051b3.png', 'ielts-course-1.png', './p_uploads_dir/', 'image/png', 316.98, 0, 1, '2019-07-03 18:15:14'),
(18, '1_1f1f560444803c17b0392958baa37802.png', 'ielts-course-1.png', './p_uploads_dir/', 'image/png', 316.98, 0, 1, '2019-07-03 18:23:57'),
(19, '1_260eb54d35dcf8721f2ef3b175493abc.png', 'teacher-profile.png', './p_uploads_dir/', 'image/png', 62.15, 0, 1, '2019-07-03 19:10:56'),
(20, '1_19d64ecb67ed107f859f2559e9cedc80.jpg', '2x.jpg', './p_uploads_dir/', 'image/jpeg', 289.8, 0, 1, '2019-07-08 10:04:47'),
(21, '1_65bd02b6d2185171af262e8fe20fbc44.jpeg', '29.jpeg', './p_uploads_dir/', 'image/jpeg', 117.63, 0, 1, '2019-07-08 10:06:48'),
(22, '1_97f876ad96ccdd8a307e7f5c261253de.jpeg', '28.jpeg', './p_uploads_dir/', 'image/jpeg', 117.75, 0, 1, '2019-07-08 10:07:23'),
(23, '1_6e8bd61bdeaf2acf7aa389534188a1a8.jpg', '4x.jpg', './p_uploads_dir/', 'image/jpeg', 170.03, 0, 1, '2019-07-08 10:07:33'),
(24, '1_eb7c62d4b954dca4f509f6324e9d8c8c.png', '2.png', './p_uploads_dir/', 'image/png', 1381.67, 0, 1, '2019-07-08 10:10:04'),
(25, '1_d8d6d7fbdaf443705885e58849e6b27a.png', '3.png', './p_uploads_dir/', 'image/png', 341.08, 0, 1, '2019-07-08 10:10:47'),
(26, '1_91a10e7a0c235732cb6dc9ed38c7e4b9.jpg', '4x.jpg', './p_uploads_dir/', 'image/jpeg', 170.03, 0, 1, '2019-07-08 10:11:15'),
(27, '1_56eb468325e7fed3a2c7eeda18ce31bc.png', '3.png', './p_uploads_dir/', 'image/png', 341.08, 0, 1, '2019-07-08 10:11:57'),
(28, '1_21c2ae50400ce46219608df4c1065f31.png', '2.png', './p_uploads_dir/', 'image/png', 1381.67, 0, 1, '2019-07-08 10:13:10'),
(29, '1_cfcbb6b12f791c024ebda02467bd5ccb.png', '2x.png', './p_uploads_dir/', 'image/png', 310.04, 0, 1, '2019-07-08 10:13:18'),
(30, '1_a0f6824a1916f9b888713133cdf23c83.jpg', '4x.jpg', './p_uploads_dir/', 'image/jpeg', 170.03, 0, 1, '2019-07-08 10:31:01'),
(31, '1_dc634a06adbb48bf50de6a510b835c85.jpg', '4x.jpg', './p_uploads_dir/', 'image/jpeg', 170.03, 0, 1, '2019-07-08 10:31:47'),
(32, '1_67272711cc276cbe0053b22b9fddc945.png', '4.png', './p_uploads_dir/', 'image/png', 535.77, 0, 1, '2019-07-08 10:34:13'),
(33, '1_ad0560b0b3e99997ada2f23f8c7757a6.jpg', '1.jpg', './p_uploads_dir/', 'image/jpeg', 887.73, 0, 1, '2019-07-08 10:36:25'),
(34, '1_2a1c1066123d656c6fcba47b2b1d26f2.jpg', '3x.jpg', './p_uploads_dir/', 'image/jpeg', 154.15, 0, 1, '2019-07-08 10:39:12'),
(42, '1_395758a7a92ba5b5198ff2fc8ca7a3d9.png', '3.png', './p_uploads_dir/', 'image/png', 341.08, 0, 1, '2019-07-08 10:46:39'),
(43, '1_2ec00bccf9d34052decaeaf3800d8fde.jpeg', '28.jpeg', './p_uploads_dir/', 'image/jpeg', 117.75, 0, 1, '2019-07-08 10:53:51'),
(44, '1_ba0b8d2615d37e3535f9461a0a55028a.zip', 'bizino.zip', './p_uploads_dir/', 'application/zip', 13167, 0, 1, '2019-07-08 11:14:22'),
(45, '1_1e5b7c7c18f3e1bee3e9397f042ed99a.zip', 'Putty_For_Mac.zip', './p_uploads_dir/', 'application/zip', 0.83, 0, 1, '2019-07-08 11:14:36'),
(46, '1_8b727c4985a8b70880bc6eccf7ed6df3.jpeg', '28.jpeg', './p_uploads_dir/', 'image/jpeg', 117.75, 0, 1, '2019-07-08 11:18:19'),
(47, '1_c1b1c664535ddaa6201cec488e6a83f3.png', '2x.png', './p_uploads_dir/', 'image/png', 310.04, 0, 1, '2019-07-08 11:18:54'),
(52, '1_883d001949a7ed3d5b55a52561a06d14.jpg', '2x.jpg', './p_uploads_dir/', 'image/jpeg', 289.8, 0, 1, '2019-07-09 12:13:47'),
(54, '1_df7844938cb27656671c90d8551c3bea.png', '2.png', './p_uploads_dir/', 'image/png', 1381.67, 0, 1, '2019-07-09 13:56:58'),
(55, '1_bbc46ce318cd410e2610b1c73d0a9d89.mp4', 'udemy_the_complete_jquery_course_2019_build_real_world_projects_introduction.mp4', './p_uploads_dir/', 'video/mp4', 16849.3, 0, 1, '2019-07-09 13:57:13'),
(56, '1_df08aef890d83d38bda57b0c94306911.png', '1.png', './p_uploads_dir/', 'image/png', 1080.41, 0, 1, '2019-07-09 13:57:24'),
(57, '1_025597f6e090609f4fff68a0dcdd6230.jpg', '2x.jpg', './p_uploads_dir/', 'image/jpeg', 289.8, 0, 1, '2019-07-09 13:57:29'),
(58, '1_557f893d0d6e4f4f4de7e322384a394a.jpg', '4x.jpg', './p_uploads_dir/', 'image/jpeg', 170.03, 0, 1, '2019-07-09 13:57:34'),
(59, '1_99a7f0022f7054f774d87294d3d32afd.jpg', '4x.jpg', './p_uploads_dir/', 'image/jpeg', 170.03, 0, 1, '2019-07-09 13:57:39'),
(60, '1_028cf0f5f2129c47cd04d3fd1fd9c6a8.jpeg', '28.jpeg', './p_uploads_dir/', 'image/jpeg', 117.75, 0, 1, '2019-07-09 13:57:43'),
(61, '1_2090a9650ce53fe6f95b319a7ab19012.jpeg', '29.jpeg', './p_uploads_dir/', 'image/jpeg', 117.63, 0, 1, '2019-07-09 13:57:48'),
(63, '1_156f74c61881e1eaf0c4c34429695f27.jpg', '1.jpg', './p_uploads_dir/', 'image/jpeg', 887.73, 0, 1, '2019-07-09 15:44:13'),
(65, '1_c90f21513f668f48ab042251de4d110e.zip', 'bizino.zip', './p_uploads_dir/', 'application/zip', 13167, 0, 1, '2019-07-09 15:44:55'),
(66, '1_3141d4bf8b2d13a5afd6dd5fa5a92151.jpg', '2.jpg', './p_uploads_dir/', 'image/jpeg', 985.07, 0, 1, '2019-07-09 15:45:03'),
(67, '1_92d3aa279f7127250bb622e680fa7e62.png', '3.png', './p_uploads_dir/', 'image/png', 341.08, 0, 1, '2019-07-09 15:45:08'),
(68, '1_55567116badfa0d8abdaad8520ab7efd.jpg', '4x.jpg', './p_uploads_dir/', 'image/jpeg', 170.03, 0, 1, '2019-07-09 15:45:13'),
(69, '1_e2d9442380035a8f93afea3f2d785841.jpg', '5x.jpg', './p_uploads_dir/', 'image/jpeg', 182.36, 0, 1, '2019-07-09 15:45:18'),
(70, '1_cfc4e0234f293f958d2a59188c8ab9f2.jpeg', '28.jpeg', './p_uploads_dir/', 'image/jpeg', 117.75, 0, 1, '2019-07-09 15:45:24'),
(71, '1_e40a772b15db68d137b55f7610ee01cf.jpeg', '29.jpeg', './p_uploads_dir/', 'image/jpeg', 117.63, 0, 1, '2019-07-09 15:45:29'),
(72, '1_f1008c5ed3610ba1862b0d411453bb18.jpg', '1.jpg', './p_uploads_dir/', 'image/jpeg', 887.73, 0, 1, '2019-07-10 08:52:11'),
(73, '1_cd601914ea274aba29c2af4af430aa63.zip', 'wordpress-4_9_8-fa_IR.zip', './p_uploads_dir/', 'application/zip', 10180.2, 0, 1, '2019-07-10 08:52:23'),
(74, '1_0d4d5e371a8b5af4c9f4ea54f899c1c6.png', '2.png', './p_uploads_dir/', 'image/png', 1381.67, 0, 1, '2019-07-10 09:51:27'),
(75, '1_2bb7c93e882068a1854df4d6d60a7eea.jpeg', '28.jpeg', './p_uploads_dir/', 'image/jpeg', 117.75, 0, 1, '2019-07-10 09:51:34'),
(76, '1_35522a4e13a81a0a83b99bdd8684c6b5.jpg', '2x.jpg', './p_uploads_dir/', 'image/jpeg', 289.8, 0, 1, '2019-07-10 11:48:01'),
(78, '1_4d22dabee595c1b2852cc17ab6a49bc2.jpeg', '29.jpeg', './p_uploads_dir/', 'image/jpeg', 117.63, 0, 1, '2019-07-10 11:51:02'),
(79, '1_95577d803017cd9861d3e67d6aa12c1e.png', '3.png', './p_uploads_dir/', 'image/png', 341.08, 0, 1, '2019-07-10 11:53:41'),
(80, '1_ce0be60338e563adba9251b115efef53.png', '4.png', './p_uploads_dir/', 'image/png', 535.77, 0, 1, '2019-07-10 11:54:21'),
(81, '1_0b644f372fcb18830e4f65b2b42adb71.png', '3.png', './p_uploads_dir/', 'image/png', 341.08, 0, 1, '2019-07-10 11:55:26'),
(82, '1_1427d2bb6d0ea19effb57a28b06920a4.png', '2x.png', './p_uploads_dir/', 'image/png', 310.04, 0, 1, '2019-07-10 11:58:19'),
(83, '1_19fa2084b5b57d58c4e2735f17f66dec.jpg', '2 (1).jpg', './p_uploads_dir/', 'image/jpeg', 283.84, 0, 1, '2019-07-10 13:07:15'),
(84, '1_88c7abebc0a428d975b744f03ce66bc5.jpg', 'ppt6824_pptm [Autosaved].jpg', './p_uploads_dir/', 'image/jpeg', 336.98, 0, 1, '2019-07-10 13:13:33'),
(85, '1_17c4b8fc901c287d4e585693065a147c.zip', 'Flin252_macneed_ir.zip', './p_uploads_dir/', 'application/zip', 20917.5, 0, 1, '2019-07-10 13:13:53'),
(86, '1_a80dde6292817b13821b32ecdab6e9e7.zip', '1Modern_Business_WEBTemplate_Bootstrap.zip', './p_uploads_dir/', 'application/zip', 652.42, 0, 1, '2019-07-10 13:14:36'),
(87, '1_df126bbad60a1157ed85d0f7d2427001.jpg', '2.jpg', './p_uploads_dir/', 'image/jpeg', 985.07, 0, 1, '2019-07-10 14:45:45'),
(90, '1_79d71b5daef476a75612450c98d9f255.jpg', '2.jpg', './p_uploads_dir/', 'image/jpeg', 985.07, 0, 1, '2019-07-13 07:28:48'),
(91, '1_f51e8965a96ea082135fa4ad81e3ec1d.png', '2.png', './p_uploads_dir/', 'image/png', 1381.67, 0, 1, '2019-07-13 15:08:52'),
(92, '1_ee16ef4742af004f57067694e8f22cd0.jpg', '4x.jpg', './p_uploads_dir/', 'image/jpeg', 170.03, 0, 1, '2019-07-13 15:08:57'),
(93, '1_ff51db0905ecd90599379f65d4f37fcc.jpg', '2 (1).jpg', './p_uploads_dir/', 'image/jpeg', 283.84, 0, 1, '2019-07-13 16:10:27'),
(94, '1_8329b8e98491aa2f50cbb63ee5a9b6a9.jpg', '4x.jpg', './p_uploads_dir/', 'image/jpeg', 170.03, 0, 1, '2019-07-13 16:10:33'),
(95, '1_c3f2e15ef531270fa96df3d80e8e5c5d.jpeg', '28.jpeg', './p_uploads_dir/', 'image/jpeg', 117.75, 0, 1, '2019-07-13 16:10:38'),
(96, '1_8423d907aa4f8bc8848bb3f46ca9b1c8.png', 'ielts-course-1.png', './p_uploads_dir/', 'image/png', 316.98, 0, 1, '2019-07-13 18:11:13'),
(97, '1_f4c04cf07e33acd70e5ddc4c28287a72.png', 'teacher-profile.png', './p_uploads_dir/', 'image/png', 62.15, 0, 1, '2019-07-13 18:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `ID` int(11) NOT NULL,
  `total_sells_amount` int(11) NOT NULL,
  `total_users_amount` int(11) NOT NULL,
  `total_tickets_amount` int(11) NOT NULL,
  `total_replies_amount` int(11) NOT NULL,
  `total_payments_amount` int(11) NOT NULL,
  `my_products_desc` longtext COLLATE utf8_persian_ci NOT NULL,
  `renew_support_desc` longtext COLLATE utf8_persian_ci NOT NULL,
  `request_phonecall_desc` longtext COLLATE utf8_persian_ci NOT NULL,
  `addon_disabled_error` longtext COLLATE utf8_persian_ci NOT NULL,
  `addon_used_error` longtext COLLATE utf8_persian_ci NOT NULL,
  `support_ended_error` longtext COLLATE utf8_persian_ci NOT NULL,
  `ticket_closed_err` longtext COLLATE utf8_persian_ci NOT NULL,
  `ticket_support_finished_err` longtext COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`ID`, `total_sells_amount`, `total_users_amount`, `total_tickets_amount`, `total_replies_amount`, `total_payments_amount`, `my_products_desc`, `renew_support_desc`, `request_phonecall_desc`, `addon_disabled_error`, `addon_used_error`, `support_ended_error`, `ticket_closed_err`, `ticket_support_finished_err`) VALUES
(1, 0, 0, 0, 0, 0, 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.', 'آیا مایل به تمدید #support_month# ماهه پشتیبانی این محصول هستید؟', 'زمان مجاز دریافت مشاوره تلفنی برای این محصول #phonecall_remaining# از #phonecall_time# می باشد.\r\n<br>\r\nآیا مایل به دریافت مشاوره تلفنی هستید؟\r\n<br>\r\nشما پس از اتمام زمان نیز می توانید زمان دریافت مشاوره را تمدید کنید.', 'امکان استفاده از خدمات \"#addon_title#\" برای این محصول وجود ندارد.', 'محدودیت استفاده از این خدمات به پایان رسیده است و امکان استفاده مجدد از آن وجود ندارد.', 'زمان پشتیبانی این پروژه در تاریخ #support_end_date# به پایان رسیده است.\r\nلطفا بمنظور استفاده از خدمات پشتیبانی ٬ دانلود جدید ترین نسخه از پروژه و ارسال تیکت ٬ زمان پشتیبانی پروژه را تمدید بفرمایید.', 'این تیکت به علت گذشت زمان بسته شده است. لطفا تیکت جدید ارسال بفرمایید.', 'به علت اتمام زمان پشتیبانی این محصول امکان ارسال تیکت یا پاسخ جدید وجود ندارد.\r\nلطفا زمان پشتیبانی این محصول را تمدید بفرمایید.');

-- --------------------------------------------------------

--
-- Table structure for table `order_logs`
--

CREATE TABLE `order_logs` (
  `ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(10) COLLATE utf8_persian_ci NOT NULL COMMENT 'product/addon/support',
  `amount` int(11) NOT NULL,
  `gateway` int(11) NOT NULL,
  `discount_code` longtext COLLATE utf8_persian_ci NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `bank_au` longtext COLLATE utf8_persian_ci NOT NULL,
  `bank_result` int(11) NOT NULL COMMENT 'if 0 : successful payment',
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `order_logs`
--

INSERT INTO `order_logs` (`ID`, `product_id`, `product_type`, `amount`, `gateway`, `discount_code`, `discount_amount`, `bank_au`, `bank_result`, `user_id`, `date_created`, `date_updated`) VALUES
(1, 17, 'product', 10000, 0, '', 0, '', 0, 10, '2019-06-13 12:16:46', '2019-07-12 12:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `pages_info`
--

CREATE TABLE `pages_info` (
  `ID` int(11) NOT NULL,
  `key` varchar(40) COLLATE utf8mb4_persian_ci NOT NULL,
  `data` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `pages_info`
--

INSERT INTO `pages_info` (`ID`, `key`, `data`, `notes`) VALUES
(1, 'homepage', '{\"page_title\": \"Page Title\",\r\n  \"meta_desc\": \"Meta Desc\",\r\n  \"social_title\": \"Social Title\",\r\n  \"social_desc\": \"Social Desc\"\r\n}', ''),
(2, 'products_list', '{\"page_title\": \"Page Title\",\r\n  \"meta_desc\": \"Meta Desc\",\r\n  \"social_title\": \"Social Title\",\r\n  \"social_desc\": \"Social Desc\"\r\n}', '');

-- --------------------------------------------------------

--
-- Table structure for table `pme_admin_tokens`
--

CREATE TABLE `pme_admin_tokens` (
  `ID` int(11) NOT NULL,
  `token` longtext COLLATE utf8_persian_ci NOT NULL,
  `admin_id` int(20) NOT NULL,
  `is_logout` int(1) NOT NULL,
  `login_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `expire_date` bigint(20) NOT NULL,
  `is_expired` int(1) NOT NULL,
  `ip` longtext COLLATE utf8_persian_ci NOT NULL,
  `browser` longtext COLLATE utf8_persian_ci NOT NULL,
  `device` longtext COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `pme_admin_tokens`
--

INSERT INTO `pme_admin_tokens` (`ID`, `token`, `admin_id`, `is_logout`, `login_date`, `logout_date`, `expire_date`, `is_expired`, `ip`, `browser`, `device`) VALUES
(2, 'a92146c3708d93db79d106bf512d40c2', 1, 0, '2019-06-20 18:23:39', '0000-00-00 00:00:00', 1561227819, 0, '127.0.0.1', 'PostmanRuntime/7.13.0', ''),
(3, 'a82f9028d231b088043f3da468a58739', 1, 0, '2019-06-23 19:37:27', '0000-00-00 00:00:00', 1561491447, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', ''),
(4, 'c18a517f0b9231183f51070d4bb21c45', 1, 0, '2019-06-23 19:38:55', '0000-00-00 00:00:00', 1561491535, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', ''),
(5, 'c6b8dfb7cfdcd4c7ade80223dffbf123', 1, 0, '2019-06-23 19:39:09', '0000-00-00 00:00:00', 1561491549, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', ''),
(6, '362fcbf2c61de71c8d6b903a5d55728f', 1, 0, '2019-06-23 19:39:36', '0000-00-00 00:00:00', 1561491576, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', ''),
(7, 'b8ebdade1710678cce96a78af3643d8e', 1, 0, '2019-06-23 19:49:38', '0000-00-00 00:00:00', 1561492178, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', ''),
(8, 'c7d1e9659fc18c0ed602cbe428771a86', 1, 0, '2019-06-23 19:50:12', '0000-00-00 00:00:00', 1561492212, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', ''),
(9, 'aed857d88b9ef478bb816d8c02b584f4', 1, 0, '2019-06-23 19:50:34', '0000-00-00 00:00:00', 1561492234, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', ''),
(10, '35e30dba415a6ebcfdb52f9edd189284', 1, 0, '2019-06-23 19:50:56', '0000-00-00 00:00:00', 1561492255, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', ''),
(11, 'f634465e1f595ad6b7a8a8de125577bb', 1, 0, '2019-06-23 19:51:05', '0000-00-00 00:00:00', 1561492265, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', ''),
(12, 'b06c652ca1780c6785453c93772cf9d1', 1, 0, '2019-06-23 19:51:30', '0000-00-00 00:00:00', 1561492290, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', ''),
(13, 'c1a0bc32dc0e493111f35bf107532db0', 1, 0, '2019-06-23 19:52:10', '0000-00-00 00:00:00', 1561492330, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', ''),
(14, '11bc63b2b1dc64080135a487fa30e1af', 1, 0, '2019-06-23 19:55:47', '0000-00-00 00:00:00', 1561492547, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', ''),
(15, 'cc0a951bcb487798a62240ace54202da', 1, 0, '2019-06-23 22:52:18', '0000-00-00 00:00:00', 1561503138, 0, '127.0.0.1', 'PostmanRuntime/7.13.0', ''),
(16, '28314f8793920777511cebc0132c4ebb', 1, 0, '2019-07-01 10:55:49', '0000-00-00 00:00:00', 1562151349, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(17, '09fc2ec501bb47059ab3c9fb6fdf46ef', 1, 0, '2019-07-03 15:22:17', '0000-00-00 00:00:00', 1562340137, 0, '127.0.0.1', 'PostmanRuntime/7.13.0', ''),
(18, '5b23658d1a9285f946303c3d03dd4859', 1, 0, '2019-07-08 09:38:58', '0000-00-00 00:00:00', 1562751538, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(19, '3a6bbac643354248ee303fadee785d80', 1, 0, '2019-07-27 15:39:25', '0000-00-00 00:00:00', 1564414765, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '');

-- --------------------------------------------------------

--
-- Table structure for table `pme_portal_admins`
--

CREATE TABLE `pme_portal_admins` (
  `ID` int(11) NOT NULL,
  `fullname` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `username` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `email` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `mobile` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `level` int(2) NOT NULL COMMENT '1: Admin, 2: Developer, 3:Operator',
  `is_blocked` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `pme_portal_admins`
--

INSERT INTO `pme_portal_admins` (`ID`, `fullname`, `username`, `password`, `email`, `mobile`, `level`, `is_blocked`, `date_created`, `date_updated`) VALUES
(1, 'مدیریت', 'admin', 'a1cd4b898170526648fb6f39f23d79eb', 'masoudx@gmail.com', '09122769683', 1, 0, '2019-06-20 18:22:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `prime_users`
--

CREATE TABLE `prime_users` (
  `ID` int(11) NOT NULL,
  `account_id` bigint(20) NOT NULL,
  `fullname` longtext COLLATE utf8_persian_ci DEFAULT NULL,
  `mobile` longtext COLLATE utf8_persian_ci DEFAULT NULL,
  `is_mobile_verified` tinyint(1) DEFAULT 0,
  `last_sms_send` bigint(20) NOT NULL,
  `verification_code` int(11) NOT NULL,
  `credit` int(11) DEFAULT 0,
  `email` longtext COLLATE utf8_persian_ci DEFAULT NULL,
  `password` longtext COLLATE utf8_persian_ci DEFAULT NULL,
  `products_amount` int(11) DEFAULT 0,
  `payment_amount` int(11) DEFAULT 0,
  `agreement_accept` int(1) DEFAULT NULL,
  `agreement_accept_date` bigint(20) DEFAULT NULL,
  `isBlocked` tinyint(1) DEFAULT 0,
  `block_reason` longtext COLLATE utf8_persian_ci DEFAULT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `prime_users`
--

INSERT INTO `prime_users` (`ID`, `account_id`, `fullname`, `mobile`, `is_mobile_verified`, `last_sms_send`, `verification_code`, `credit`, `email`, `password`, `products_amount`, `payment_amount`, `agreement_accept`, `agreement_accept_date`, `isBlocked`, `block_reason`, `date_joined`, `date_updated`) VALUES
(1, 15581214342816772, 'مسعود بنی مهد', '09364461689', 0, 1563976749, 616035, 63500, 'masoudx@gmail.com', 'a8c9437a3b73d2170884f003dedaac02', 0, 0, 0, 0, 0, 'reason', '2019-05-10 17:32:45', '2019-07-24 13:45:21'),
(2, 77550349858, 'Masoud', '09122769686', 0, 1559054760, 0, 0, 'masoudxxxx@gmail.com', '123456', NULL, NULL, 1, 1558905019, NULL, NULL, '2019-05-26 21:09:42', '2019-07-12 11:28:37'),
(10, 35599424125, 'مسعود بنی مهد', '09364461688', 1, 1562418888, 766728, 0, 'asasdasd@gmail.com', 'a8c9437a3b73d2170884f003dedaac02', NULL, NULL, 1, 1562234878, 0, 'دلیل مسدود سازی', '2019-07-04 10:07:58', '2019-07-12 11:44:15'),
(11, 16575129383, 'مسعود بنی مهد', '09364461690', 0, 1563975724, 855100, 0, 'masoudxx@gmail.com', 'a8c9437a3b73d2170884f003dedaac02', NULL, NULL, 1, 1563975724, NULL, NULL, '2019-07-24 13:42:04', '0000-00-00 00:00:00'),
(12, 81543891257, 'Masoud Banimahd', '09123456789', 0, 1563975803, 442769, 0, 'maxxsoudx@gmail.com', 'a8c9437a3b73d2170884f003dedaac02', NULL, NULL, 1, 1563975802, NULL, NULL, '2019-07-24 13:43:22', '0000-00-00 00:00:00'),
(13, 68840141137, 'Masoud Banimahd', '09122345678', 0, 1563975858, 841626, 0, 'adsasdads@sfsfs.com', 'a8c9437a3b73d2170884f003dedaac02', NULL, NULL, 1, 1563975858, NULL, NULL, '2019-07-24 13:44:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shop_cats`
--

CREATE TABLE `shop_cats` (
  `ID` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `order` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `shop_cats`
--

INSERT INTO `shop_cats` (`ID`, `parent_id`, `title`, `image`, `order`, `date_created`, `date_updated`) VALUES
(1, 0, 'دسته شماره یک', 'cat_image.png', 0, '2019-06-25 15:09:51', '0000-00-00 00:00:00'),
(2, 0, 'قرعه کشی', 'cat_image.png', 0, '2019-06-25 15:09:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shop_orders`
--

CREATE TABLE `shop_orders` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `address` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `payment_status` int(11) NOT NULL COMMENT '0: Wait For Payment, 1: Successful, 2: Failed, 3:Timeout',
  `bank_result` varchar(10) COLLATE utf8mb4_persian_ci NOT NULL,
  `bank_au` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `shop_orders`
--

INSERT INTO `shop_orders` (`ID`, `user_id`, `total_price`, `address`, `payment_status`, `bank_result`, `bank_au`, `message`, `date_created`, `date_updated`) VALUES
(1, 1, 37500, '', 0, '', '', '', '2019-06-29 13:58:58', '0000-00-00 00:00:00'),
(2, 1, 37500, '', 0, '', '', '', '2019-06-29 13:59:25', '0000-00-00 00:00:00'),
(3, 1, 37500, '', 0, '', '', '', '2019-06-29 14:09:00', '0000-00-00 00:00:00'),
(4, 1, 37500, '', 1, '0', 'SAMPLESUCCESS0000', 'Sample Payment', '2019-06-29 14:14:49', '0000-00-00 00:00:00'),
(5, 1, 37500, '', 0, '', '', '', '2019-06-29 14:29:54', '0000-00-00 00:00:00'),
(6, 1, 37500, '', 1, '0', 'SAMPLESUCCESS0000', 'Sample Payment', '2019-06-29 14:40:26', '0000-00-00 00:00:00'),
(7, 1, 0, '', 0, '', '', '', '2019-06-29 17:49:10', '0000-00-00 00:00:00'),
(8, 1, 37500, '', 0, '', '', '', '2019-06-29 17:57:24', '0000-00-00 00:00:00'),
(9, 1, 37500, '', 1, '0', 'SAMPLESUCCESS0000', 'Sample Payment', '2019-06-29 17:57:28', '0000-00-00 00:00:00'),
(10, 1, 37500, '', 1, '0', 'SAMPLESUCCESS0000', 'Sample Payment', '2019-06-29 18:01:31', '0000-00-00 00:00:00'),
(11, 1, 37500, '', 1, '0', 'SAMPLESUCCESS0000', 'Sample Payment', '2019-06-29 18:02:39', '0000-00-00 00:00:00'),
(12, 1, 37500, '', 1, '0', 'SAMPLESUCCESS0000', 'Sample Payment', '2019-06-29 18:03:08', '0000-00-00 00:00:00'),
(13, 1, 37500, '', 1, '0', 'SAMPLESUCCESS0000', 'Sample Payment', '2019-06-29 18:05:49', '0000-00-00 00:00:00'),
(14, 1, 37500, '', 1, '0', 'SAMPLESUCCESS0000', 'Sample Payment', '2019-06-29 18:07:59', '0000-00-00 00:00:00'),
(15, 1, 37500, '', 1, '0', 'SAMPLESUCCESS0000', 'Sample Payment', '2019-06-29 18:09:24', '0000-00-00 00:00:00'),
(16, 1, 37500, '', 0, '', '', '', '2019-06-30 07:44:08', '0000-00-00 00:00:00'),
(17, 1, 37500, '', 0, '', '', '', '2019-06-30 07:44:31', '0000-00-00 00:00:00'),
(18, 1, 37500, '', 0, '', '', '', '2019-06-30 07:44:39', '0000-00-00 00:00:00'),
(19, 1, 37500, '', 0, '', '', '', '2019-06-30 07:45:07', '0000-00-00 00:00:00'),
(20, 1, 37500, '', 0, '', '', '', '2019-06-30 07:45:29', '0000-00-00 00:00:00'),
(26, 1, 37500, '', 0, '', '', '', '2019-06-30 07:53:02', '0000-00-00 00:00:00'),
(27, 1, 37500, '', 1, '0', 'SAMPLESUCCESS0000', 'Sample Payment', '2019-06-30 08:07:10', '0000-00-00 00:00:00'),
(28, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 10:37:35', '0000-00-00 00:00:00'),
(29, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 10:38:45', '0000-00-00 00:00:00'),
(30, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 10:54:30', '0000-00-00 00:00:00'),
(31, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 10:58:27', '0000-00-00 00:00:00'),
(32, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 10:58:38', '0000-00-00 00:00:00'),
(33, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 10:59:20', '0000-00-00 00:00:00'),
(34, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 11:00:14', '0000-00-00 00:00:00'),
(35, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 11:00:18', '0000-00-00 00:00:00'),
(36, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 11:00:38', '0000-00-00 00:00:00'),
(37, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 11:00:48', '0000-00-00 00:00:00'),
(38, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 11:01:09', '0000-00-00 00:00:00'),
(39, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 11:01:43', '0000-00-00 00:00:00'),
(40, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 12:53:18', '0000-00-00 00:00:00'),
(41, 1, 37500, 'Address', 0, '', '', '', '2019-07-18 13:24:27', '0000-00-00 00:00:00'),
(42, 1, 37500, 'Address', 0, '', '', '', '2019-07-20 15:02:03', '0000-00-00 00:00:00'),
(43, 1, 37500, 'Address', 0, '', '', '', '2019-07-21 10:58:24', '0000-00-00 00:00:00'),
(44, 1, 37500, 'Address', 0, '', '', '', '2019-07-21 11:59:12', '0000-00-00 00:00:00'),
(45, 1, 37500, 'Address', 0, '', '', '', '2019-07-21 11:59:51', '0000-00-00 00:00:00'),
(46, 1, 37500, 'Address', 0, '', '', '', '2019-07-21 12:00:04', '0000-00-00 00:00:00'),
(47, 1, 37500, 'Address', 0, '', '', '', '2019-07-21 12:08:46', '0000-00-00 00:00:00'),
(48, 1, 37500, 'Address', 0, '', '', '', '2019-07-21 12:11:27', '0000-00-00 00:00:00'),
(49, 1, 37500, 'Address', 0, '', '', '', '2019-07-21 12:14:32', '0000-00-00 00:00:00'),
(50, 1, 37500, 'Address', 0, '', '', '', '2019-07-21 12:20:16', '0000-00-00 00:00:00'),
(51, 1, 37500, 'Address', 0, '', '', '', '2019-07-21 12:21:49', '0000-00-00 00:00:00'),
(52, 1, 37500, 'Address', 1, '0', 'SAMPLESUCCESS0000', 'Sample Payment', '2019-07-21 12:37:22', '0000-00-00 00:00:00'),
(53, 1, 37500, 'Address', 1, '0', 'SAMPLESUCCESS0000', 'Sample Payment', '2019-07-21 12:38:25', '0000-00-00 00:00:00'),
(54, 1, 37500, 'Address', 0, '', '', '', '2019-07-21 14:14:55', '0000-00-00 00:00:00'),
(55, 1, 37500, 'Address', 1, '0', 'SAMPLESUCCESS0000', 'Sample Payment', '2019-07-21 14:20:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shop_order_products`
--

CREATE TABLE `shop_order_products` (
  `ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `lottory_code` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `shop_order_products`
--

INSERT INTO `shop_order_products` (`ID`, `product_id`, `product_title`, `lottory_code`, `quantity`, `price`, `total_price`, `user_id`, `order_id`, `date_created`, `date_updated`) VALUES
(2, 1, '', '', 2, 7500, 15000, 1, 1, '2019-06-29 13:58:58', '0000-00-00 00:00:00'),
(3, 1, '', '', 3, 7500, 22500, 1, 1, '2019-06-29 13:58:58', '0000-00-00 00:00:00'),
(4, 1, '', '', 2, 7500, 15000, 1, 2, '2019-06-29 13:59:25', '0000-00-00 00:00:00'),
(5, 1, '', '', 3, 7500, 22500, 1, 2, '2019-06-29 13:59:25', '0000-00-00 00:00:00'),
(6, 1, '', '', 2, 7500, 15000, 1, 3, '2019-06-29 14:09:00', '0000-00-00 00:00:00'),
(7, 1, '', '', 3, 7500, 22500, 1, 3, '2019-06-29 14:09:00', '0000-00-00 00:00:00'),
(8, 1, '', '', 2, 7500, 15000, 1, 4, '2019-06-29 14:14:49', '0000-00-00 00:00:00'),
(9, 1, '', '', 3, 7500, 22500, 1, 4, '2019-06-29 14:14:49', '0000-00-00 00:00:00'),
(10, 1, '', '', 2, 7500, 15000, 1, 5, '2019-06-29 14:29:54', '0000-00-00 00:00:00'),
(11, 1, '', '', 3, 7500, 22500, 1, 5, '2019-06-29 14:29:54', '0000-00-00 00:00:00'),
(12, 1, 'محصول تست', '', 2, 7500, 15000, 1, 6, '2019-06-29 14:40:26', '0000-00-00 00:00:00'),
(13, 1, 'محصول تست', '', 3, 7500, 22500, 1, 6, '2019-06-29 14:40:26', '0000-00-00 00:00:00'),
(14, 1, 'محصول تست', '', 2, 7500, 15000, 1, 8, '2019-06-29 17:57:24', '0000-00-00 00:00:00'),
(15, 1, 'محصول تست', '', 3, 7500, 22500, 1, 8, '2019-06-29 17:57:24', '0000-00-00 00:00:00'),
(16, 1, 'محصول تست', '', 2, 7500, 15000, 1, 9, '2019-06-29 17:57:28', '0000-00-00 00:00:00'),
(17, 1, 'محصول تست', '', 3, 7500, 22500, 1, 9, '2019-06-29 17:57:28', '0000-00-00 00:00:00'),
(18, 1, 'محصول تست', '', 2, 7500, 15000, 1, 10, '2019-06-29 18:01:31', '0000-00-00 00:00:00'),
(19, 1, 'محصول تست', '', 3, 7500, 22500, 1, 10, '2019-06-29 18:01:31', '0000-00-00 00:00:00'),
(20, 1, 'محصول تست', '', 2, 7500, 15000, 1, 11, '2019-06-29 18:02:39', '0000-00-00 00:00:00'),
(21, 1, 'محصول تست', '', 3, 7500, 22500, 1, 11, '2019-06-29 18:02:39', '0000-00-00 00:00:00'),
(22, 1, 'محصول تست', '', 2, 7500, 15000, 1, 12, '2019-06-29 18:03:08', '0000-00-00 00:00:00'),
(23, 1, 'محصول تست', '', 3, 7500, 22500, 1, 12, '2019-06-29 18:03:08', '0000-00-00 00:00:00'),
(24, 1, 'محصول تست', '', 2, 7500, 15000, 1, 13, '2019-06-29 18:05:49', '0000-00-00 00:00:00'),
(25, 1, 'محصول تست', '', 3, 7500, 22500, 1, 13, '2019-06-29 18:05:49', '0000-00-00 00:00:00'),
(26, 1, 'محصول تست', '', 2, 7500, 15000, 1, 14, '2019-06-29 18:07:59', '0000-00-00 00:00:00'),
(27, 1, 'محصول تست', '', 3, 7500, 22500, 1, 14, '2019-06-29 18:07:59', '0000-00-00 00:00:00'),
(28, 1, 'محصول تست', '', 2, 7500, 15000, 1, 15, '2019-06-29 18:09:24', '0000-00-00 00:00:00'),
(29, 1, 'محصول تست', '', 3, 7500, 22500, 1, 15, '2019-06-29 18:09:24', '0000-00-00 00:00:00'),
(30, 1, 'محصول تست', '', 2, 7500, 15000, 1, 16, '2019-06-30 07:44:08', '0000-00-00 00:00:00'),
(31, 1, 'محصول تست', '', 3, 7500, 22500, 1, 16, '2019-06-30 07:44:08', '0000-00-00 00:00:00'),
(32, 1, 'محصول تست', '', 2, 7500, 15000, 1, 17, '2019-06-30 07:44:31', '0000-00-00 00:00:00'),
(33, 1, 'محصول تست', '', 3, 7500, 22500, 1, 17, '2019-06-30 07:44:31', '0000-00-00 00:00:00'),
(34, 1, 'محصول تست', '', 2, 7500, 15000, 1, 18, '2019-06-30 07:44:39', '0000-00-00 00:00:00'),
(35, 1, 'محصول تست', '', 3, 7500, 22500, 1, 18, '2019-06-30 07:44:39', '0000-00-00 00:00:00'),
(36, 1, 'محصول تست', '', 2, 7500, 15000, 1, 19, '2019-06-30 07:45:07', '0000-00-00 00:00:00'),
(37, 1, 'محصول تست', '', 3, 7500, 22500, 1, 19, '2019-06-30 07:45:08', '0000-00-00 00:00:00'),
(38, 1, 'محصول تست', '', 2, 7500, 15000, 1, 20, '2019-06-30 07:45:29', '0000-00-00 00:00:00'),
(39, 1, 'محصول تست', '', 3, 7500, 22500, 1, 20, '2019-06-30 07:45:29', '0000-00-00 00:00:00'),
(50, 1, 'محصول تست', '', 2, 7500, 15000, 1, 26, '2019-06-30 07:53:02', '0000-00-00 00:00:00'),
(51, 1, 'محصول تست', '', 3, 7500, 22500, 1, 26, '2019-06-30 07:53:02', '0000-00-00 00:00:00'),
(52, 1, 'محصول تست', '', 2, 7500, 15000, 1, 27, '2019-06-30 08:07:10', '0000-00-00 00:00:00'),
(53, 1, 'محصول تست', '', 3, 7500, 22500, 1, 27, '2019-06-30 08:07:10', '0000-00-00 00:00:00'),
(54, 1, 'محصول تست', '', 2, 7500, 15000, 1, 28, '2019-07-18 10:37:35', '0000-00-00 00:00:00'),
(55, 1, 'محصول تست', '', 3, 7500, 22500, 1, 28, '2019-07-18 10:37:35', '0000-00-00 00:00:00'),
(56, 1, 'محصول تست', '', 2, 7500, 15000, 1, 29, '2019-07-18 10:38:45', '0000-00-00 00:00:00'),
(57, 1, 'محصول تست', '', 3, 7500, 22500, 1, 29, '2019-07-18 10:38:45', '0000-00-00 00:00:00'),
(58, 1, 'محصول تست', '', 2, 7500, 15000, 1, 30, '2019-07-18 10:54:30', '0000-00-00 00:00:00'),
(59, 1, 'محصول تست', '', 3, 7500, 22500, 1, 30, '2019-07-18 10:54:30', '0000-00-00 00:00:00'),
(60, 1, 'محصول تست', '', 2, 7500, 15000, 1, 31, '2019-07-18 10:58:27', '0000-00-00 00:00:00'),
(61, 1, 'محصول تست', '', 3, 7500, 22500, 1, 31, '2019-07-18 10:58:27', '0000-00-00 00:00:00'),
(62, 1, 'محصول تست', '', 2, 7500, 15000, 1, 32, '2019-07-18 10:58:38', '0000-00-00 00:00:00'),
(63, 1, 'محصول تست', '', 3, 7500, 22500, 1, 32, '2019-07-18 10:58:38', '0000-00-00 00:00:00'),
(64, 1, 'محصول تست', '', 2, 7500, 15000, 1, 33, '2019-07-18 10:59:20', '0000-00-00 00:00:00'),
(65, 1, 'محصول تست', '', 3, 7500, 22500, 1, 33, '2019-07-18 10:59:20', '0000-00-00 00:00:00'),
(66, 1, 'محصول تست', '', 2, 7500, 15000, 1, 34, '2019-07-18 11:00:14', '0000-00-00 00:00:00'),
(67, 1, 'محصول تست', '', 3, 7500, 22500, 1, 34, '2019-07-18 11:00:14', '0000-00-00 00:00:00'),
(68, 1, 'محصول تست', '', 2, 7500, 15000, 1, 35, '2019-07-18 11:00:18', '0000-00-00 00:00:00'),
(69, 1, 'محصول تست', '', 3, 7500, 22500, 1, 35, '2019-07-18 11:00:18', '0000-00-00 00:00:00'),
(70, 1, 'محصول تست', '', 2, 7500, 15000, 1, 36, '2019-07-18 11:00:38', '0000-00-00 00:00:00'),
(71, 1, 'محصول تست', '', 3, 7500, 22500, 1, 36, '2019-07-18 11:00:38', '0000-00-00 00:00:00'),
(72, 1, 'محصول تست', '', 2, 7500, 15000, 1, 37, '2019-07-18 11:00:48', '0000-00-00 00:00:00'),
(73, 1, 'محصول تست', '', 3, 7500, 22500, 1, 37, '2019-07-18 11:00:48', '0000-00-00 00:00:00'),
(74, 1, 'محصول تست', '', 2, 7500, 15000, 1, 38, '2019-07-18 11:01:09', '0000-00-00 00:00:00'),
(75, 1, 'محصول تست', '', 3, 7500, 22500, 1, 38, '2019-07-18 11:01:09', '0000-00-00 00:00:00'),
(76, 1, 'محصول تست', '', 2, 7500, 15000, 1, 39, '2019-07-18 11:01:43', '0000-00-00 00:00:00'),
(77, 1, 'محصول تست', '', 3, 7500, 22500, 1, 39, '2019-07-18 11:01:43', '0000-00-00 00:00:00'),
(78, 1, 'محصول تست', '', 2, 7500, 15000, 1, 40, '2019-07-18 12:53:18', '0000-00-00 00:00:00'),
(79, 1, 'محصول تست', '', 3, 7500, 22500, 1, 40, '2019-07-18 12:53:18', '0000-00-00 00:00:00'),
(80, 1, 'محصول تست', '', 2, 7500, 15000, 1, 41, '2019-07-18 13:24:27', '0000-00-00 00:00:00'),
(81, 1, 'محصول تست', '', 3, 7500, 22500, 1, 41, '2019-07-18 13:24:27', '0000-00-00 00:00:00'),
(82, 1, 'محصول تست', '', 2, 7500, 15000, 1, 42, '2019-07-20 15:02:03', '0000-00-00 00:00:00'),
(83, 1, 'محصول تست', '', 3, 7500, 22500, 1, 42, '2019-07-20 15:02:03', '0000-00-00 00:00:00'),
(84, 1, 'محصول تست', '', 2, 7500, 15000, 1, 43, '2019-07-21 10:58:24', '0000-00-00 00:00:00'),
(85, 1, 'محصول تست', '', 3, 7500, 22500, 1, 43, '2019-07-21 10:58:24', '0000-00-00 00:00:00'),
(86, 1, 'محصول تست', '', 2, 7500, 15000, 1, 44, '2019-07-21 11:59:12', '0000-00-00 00:00:00'),
(87, 1, 'محصول تست', '', 3, 7500, 22500, 1, 44, '2019-07-21 11:59:12', '0000-00-00 00:00:00'),
(88, 1, 'محصول تست', '', 2, 7500, 15000, 1, 45, '2019-07-21 11:59:51', '0000-00-00 00:00:00'),
(89, 1, 'محصول تست', '', 3, 7500, 22500, 1, 45, '2019-07-21 11:59:51', '0000-00-00 00:00:00'),
(90, 1, 'محصول تست', '', 2, 7500, 15000, 1, 46, '2019-07-21 12:00:04', '0000-00-00 00:00:00'),
(91, 1, 'محصول تست', '', 3, 7500, 22500, 1, 46, '2019-07-21 12:00:04', '0000-00-00 00:00:00'),
(92, 1, 'محصول تست', '', 2, 7500, 15000, 1, 47, '2019-07-21 12:08:46', '0000-00-00 00:00:00'),
(93, 1, 'محصول تست', '', 3, 7500, 22500, 1, 47, '2019-07-21 12:08:46', '0000-00-00 00:00:00'),
(94, 1, 'محصول تست', '', 2, 7500, 15000, 1, 48, '2019-07-21 12:11:27', '0000-00-00 00:00:00'),
(95, 1, 'محصول تست', '', 3, 7500, 22500, 1, 48, '2019-07-21 12:11:27', '0000-00-00 00:00:00'),
(96, 1, 'محصول تست', '', 2, 7500, 15000, 1, 49, '2019-07-21 12:14:32', '0000-00-00 00:00:00'),
(97, 1, 'محصول تست', '', 3, 7500, 22500, 1, 49, '2019-07-21 12:14:32', '0000-00-00 00:00:00'),
(98, 1, 'محصول تست', '', 2, 7500, 15000, 1, 50, '2019-07-21 12:20:16', '0000-00-00 00:00:00'),
(99, 1, 'محصول تست', '', 3, 7500, 22500, 1, 50, '2019-07-21 12:20:16', '0000-00-00 00:00:00'),
(100, 1, 'محصول تست', '', 2, 7500, 15000, 1, 51, '2019-07-21 12:21:49', '0000-00-00 00:00:00'),
(101, 1, 'محصول تست', '', 3, 7500, 22500, 1, 51, '2019-07-21 12:21:49', '0000-00-00 00:00:00'),
(102, 1, 'محصول تست', '', 2, 7500, 15000, 1, 52, '2019-07-21 12:22:29', '0000-00-00 00:00:00'),
(103, 1, 'محصول تست', '', 3, 7500, 22500, 1, 52, '2019-07-21 12:22:29', '0000-00-00 00:00:00'),
(104, 1, 'محصول تست', '', 2, 7500, 15000, 1, 53, '2019-07-21 12:38:25', '0000-00-00 00:00:00'),
(105, 1, 'محصول تست', '', 3, 7500, 22500, 1, 53, '2019-07-21 12:38:25', '0000-00-00 00:00:00'),
(106, 1, 'محصول تست', '', 2, 7500, 15000, 1, 54, '2019-07-21 14:14:55', '0000-00-00 00:00:00'),
(107, 1, 'محصول تست', '', 3, 7500, 22500, 1, 54, '2019-07-21 14:14:55', '0000-00-00 00:00:00'),
(108, 1, 'محصول تست', '', 2, 7500, 15000, 1, 55, '2019-07-21 14:20:23', '0000-00-00 00:00:00'),
(109, 1, 'محصول تست', '', 3, 7500, 22500, 1, 55, '2019-07-21 14:20:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shop_products`
--

CREATE TABLE `shop_products` (
  `ID` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `details_json` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount_percent` double NOT NULL,
  `max_quantity` int(11) NOT NULL,
  `images` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `cat` int(11) NOT NULL,
  `is_special` int(11) NOT NULL,
  `has_lottery` int(11) NOT NULL,
  `total_sell_amount` bigint(20) NOT NULL,
  `total_sell_price` bigint(20) NOT NULL,
  `is_published` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `shop_products`
--

INSERT INTO `shop_products` (`ID`, `admin_id`, `title`, `description`, `details_json`, `price`, `discount_percent`, `max_quantity`, `images`, `cat`, `is_special`, `has_lottery`, `total_sell_amount`, `total_sell_price`, `is_published`, `date_created`, `date_update`) VALUES
(1, 1, 'محصول تست', 'توضیحات محصول تست', '[{\"title\":\"فیلد ۱\",\"value\":\"اطلاعات ۱\"},{\"title\":\"فیلد ۲\",\"value\":\"طلاعات ۲\"},{\"title\":\"فیلد ۳\",\"value\":\"طلاعات ۳\"},{\"title\":\"فیلد ۴\",\"value\":\"طلاعات ۴\"},{\"title\":\"فیلد ۵\",\"value\":\"طلاعات ۵\"},{\"title\":\"فیلد ۶\",\"value\":\"طلاعات ۶\"},{\"title\":\"فیلد ۷\",\"value\":\"طلاعات ۷\"},{\"title\":\"فیلد ۸\",\"value\":\"طلاعات ۸\"},{\"title\":\"فیلد ۹\",\"value\":\"طلاعات ۹\"},{\"title\":\"فیلد ۱۰\",\"value\":\"اطلاعات ۱۰\"},{\"title\":\"فیلد ۱۱\",\"value\":\"طلاعات ۱۱\"},{\"title\":\"فیلد ۱۲\",\"value\":\"طلاعات ۱۲\"},{\"title\":\"فیلد ۱۳\",\"value\":\"طلاعات ۱۳\"},{\"title\":\"فیلد ۱۴\",\"value\":\"طلاعات ۱۴\"}]', 10000, 25, 100, 'image1.png,image2.png,image3.png', 1, 1, 0, 79, 945500, 1, '2019-07-21 14:29:12', '0000-00-00 00:00:00'),
(2, 1, 'محصول قرعه کشی', 'توضیحات محصول تست', '[{\"title\":\"فیلد ۱\",\"value\":\"اطلاعات ۱\"},{\"title\":\"فیلد ۲\",\"value\":\"طلاعات ۲\"},{\"title\":\"فیلد ۳\",\"value\":\"طلاعات ۳\"},{\"title\":\"فیلد ۴\",\"value\":\"طلاعات ۴\"},{\"title\":\"فیلد ۵\",\"value\":\"طلاعات ۵\"},{\"title\":\"فیلد ۶\",\"value\":\"طلاعات ۶\"},{\"title\":\"فیلد ۷\",\"value\":\"طلاعات ۷\"},{\"title\":\"فیلد ۸\",\"value\":\"طلاعات ۸\"},{\"title\":\"فیلد ۹\",\"value\":\"طلاعات ۹\"},{\"title\":\"فیلد ۱۰\",\"value\":\"اطلاعات ۱۰\"},{\"title\":\"فیلد ۱۱\",\"value\":\"طلاعات ۱۱\"},{\"title\":\"فیلد ۱۲\",\"value\":\"طلاعات ۱۲\"},{\"title\":\"فیلد ۱۳\",\"value\":\"طلاعات ۱۳\"},{\"title\":\"فیلد ۱۴\",\"value\":\"طلاعات ۱۴\"}]', 10000, 25, 100, 'image1.png,image2.png,image3.png', 2, 1, 1, 59, 795500, 1, '2019-06-30 08:17:55', '0000-00-00 00:00:00'),
(3, 1, 'محصول 3', 'توضیحات محصول تست', '[{\"title\":\"فیلد ۱\",\"value\":\"اطلاعات ۱\"},{\"title\":\"فیلد ۲\",\"value\":\"طلاعات ۲\"},{\"title\":\"فیلد ۳\",\"value\":\"طلاعات ۳\"},{\"title\":\"فیلد ۴\",\"value\":\"طلاعات ۴\"},{\"title\":\"فیلد ۵\",\"value\":\"طلاعات ۵\"},{\"title\":\"فیلد ۶\",\"value\":\"طلاعات ۶\"},{\"title\":\"فیلد ۷\",\"value\":\"طلاعات ۷\"},{\"title\":\"فیلد ۸\",\"value\":\"طلاعات ۸\"},{\"title\":\"فیلد ۹\",\"value\":\"طلاعات ۹\"},{\"title\":\"فیلد ۱۰\",\"value\":\"اطلاعات ۱۰\"},{\"title\":\"فیلد ۱۱\",\"value\":\"طلاعات ۱۱\"},{\"title\":\"فیلد ۱۲\",\"value\":\"طلاعات ۱۲\"},{\"title\":\"فیلد ۱۳\",\"value\":\"طلاعات ۱۳\"},{\"title\":\"فیلد ۱۴\",\"value\":\"طلاعات ۱۴\"}]', 10000, 25, 100, 'image1.png,image2.png,image3.png', 1, 1, 0, 64, 833000, 1, '2019-06-30 08:07:10', '0000-00-00 00:00:00'),
(4, 1, 'محصول ۴', 'توضیحات محصول تست', '[{\"title\":\"فیلد ۱\",\"value\":\"اطلاعات ۱\"},{\"title\":\"فیلد ۲\",\"value\":\"طلاعات ۲\"},{\"title\":\"فیلد ۳\",\"value\":\"طلاعات ۳\"},{\"title\":\"فیلد ۴\",\"value\":\"طلاعات ۴\"},{\"title\":\"فیلد ۵\",\"value\":\"طلاعات ۵\"},{\"title\":\"فیلد ۶\",\"value\":\"طلاعات ۶\"},{\"title\":\"فیلد ۷\",\"value\":\"طلاعات ۷\"},{\"title\":\"فیلد ۸\",\"value\":\"طلاعات ۸\"},{\"title\":\"فیلد ۹\",\"value\":\"طلاعات ۹\"},{\"title\":\"فیلد ۱۰\",\"value\":\"اطلاعات ۱۰\"},{\"title\":\"فیلد ۱۱\",\"value\":\"طلاعات ۱۱\"},{\"title\":\"فیلد ۱۲\",\"value\":\"طلاعات ۱۲\"},{\"title\":\"فیلد ۱۳\",\"value\":\"طلاعات ۱۳\"},{\"title\":\"فیلد ۱۴\",\"value\":\"طلاعات ۱۴\"}]', 10000, 25, 100, 'image1.png,image2.png,image3.png', 2, 1, 0, 59, 795500, 1, '2019-06-29 18:09:39', '0000-00-00 00:00:00'),
(5, 1, 'محصول ۵', 'توضیحات محصول تست', '[{\"title\":\"فیلد ۱\",\"value\":\"اطلاعات ۱\"},{\"title\":\"فیلد ۲\",\"value\":\"طلاعات ۲\"},{\"title\":\"فیلد ۳\",\"value\":\"طلاعات ۳\"},{\"title\":\"فیلد ۴\",\"value\":\"طلاعات ۴\"},{\"title\":\"فیلد ۵\",\"value\":\"طلاعات ۵\"},{\"title\":\"فیلد ۶\",\"value\":\"طلاعات ۶\"},{\"title\":\"فیلد ۷\",\"value\":\"طلاعات ۷\"},{\"title\":\"فیلد ۸\",\"value\":\"طلاعات ۸\"},{\"title\":\"فیلد ۹\",\"value\":\"طلاعات ۹\"},{\"title\":\"فیلد ۱۰\",\"value\":\"اطلاعات ۱۰\"},{\"title\":\"فیلد ۱۱\",\"value\":\"طلاعات ۱۱\"},{\"title\":\"فیلد ۱۲\",\"value\":\"طلاعات ۱۲\"},{\"title\":\"فیلد ۱۳\",\"value\":\"طلاعات ۱۳\"},{\"title\":\"فیلد ۱۴\",\"value\":\"طلاعات ۱۴\"}]', 10000, 25, 100, 'image1.png,image2.png,image3.png', 1, 1, 0, 64, 833000, 1, '2019-06-30 08:07:10', '0000-00-00 00:00:00'),
(6, 1, 'محصول ۶', 'توضیحات محصول تست', '[{\"title\":\"فیلد ۱\",\"value\":\"اطلاعات ۱\"},{\"title\":\"فیلد ۲\",\"value\":\"طلاعات ۲\"},{\"title\":\"فیلد ۳\",\"value\":\"طلاعات ۳\"},{\"title\":\"فیلد ۴\",\"value\":\"طلاعات ۴\"},{\"title\":\"فیلد ۵\",\"value\":\"طلاعات ۵\"},{\"title\":\"فیلد ۶\",\"value\":\"طلاعات ۶\"},{\"title\":\"فیلد ۷\",\"value\":\"طلاعات ۷\"},{\"title\":\"فیلد ۸\",\"value\":\"طلاعات ۸\"},{\"title\":\"فیلد ۹\",\"value\":\"طلاعات ۹\"},{\"title\":\"فیلد ۱۰\",\"value\":\"اطلاعات ۱۰\"},{\"title\":\"فیلد ۱۱\",\"value\":\"طلاعات ۱۱\"},{\"title\":\"فیلد ۱۲\",\"value\":\"طلاعات ۱۲\"},{\"title\":\"فیلد ۱۳\",\"value\":\"طلاعات ۱۳\"},{\"title\":\"فیلد ۱۴\",\"value\":\"طلاعات ۱۴\"}]', 10000, 25, 100, 'image1.png,image2.png,image3.png', 2, 1, 0, 59, 795500, 1, '2019-06-29 18:09:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shop_slider`
--

CREATE TABLE `shop_slider` (
  `ID` int(11) NOT NULL,
  `title` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `url` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `is_published` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `shop_slider`
--

INSERT INTO `shop_slider` (`ID`, `title`, `image`, `url`, `product_id`, `admin_id`, `is_published`, `date_created`, `date_updated`) VALUES
(1, 'اسلاید شماره یک', 'ali.png', 'http://www.google.com', 0, 1, 1, '2019-06-25 15:23:24', '0000-00-00 00:00:00'),
(2, 'اسلاید شماره دو', 'ali.png', '', 1, 1, 1, '2019-06-25 15:23:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `ID` int(11) NOT NULL,
  `title` longtext COLLATE utf8_persian_ci NOT NULL,
  `content` longtext COLLATE utf8_persian_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `attachments` longtext COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0: wait for answer, 1: processing, 2: answered, 3: closed',
  `is_read_by_user` int(11) NOT NULL,
  `is_read_by_admin` int(11) NOT NULL,
  `is_added_by_user` int(1) NOT NULL DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`ID`, `title`, `content`, `product_id`, `product_type`, `order_id`, `user_id`, `parent_id`, `attachments`, `status`, `is_read_by_user`, `is_read_by_admin`, `is_added_by_user`, `date_created`, `date_updated`) VALUES
(1, 'hello', 'hello content', 1, 'product', 16, 1, 0, '', 0, 0, 1, 0, '2019-06-01 16:21:03', '2019-07-12 10:13:17'),
(5, 'test title', 'test content', 1, 'PRIME_PRODUCTS', 0, 1, 0, 'file1URL,file2URL,file3URL', 2, 1, 1, 0, '2019-06-01 19:51:43', '2019-07-12 10:11:04'),
(6, '', 'test content', 0, '0', 0, 1, 5, 'file1URL,file2URL,file3URL', 0, 0, 1, 0, '2019-06-02 12:45:21', '2019-07-12 10:08:31'),
(7, '', 'test content', 0, '0', 0, 1, 5, 'file1URL,file2URL,file3URL', 0, 0, 1, 0, '2019-06-02 12:45:56', '2019-07-12 10:08:31'),
(8, '', 'test content', 0, '0', 0, 1, 5, 'file1URL,file2URL,file3URL', 0, 0, 1, 0, '2019-06-02 12:47:46', '2019-07-12 10:08:31'),
(11, '', 'شسیشسیشسی', 1, '', 0, 1, 5, '', 0, 0, 1, 1, '2019-07-12 09:40:31', '2019-07-12 10:08:31'),
(12, '', 'سلام<div>این یک پاسخ تست است</div><div><span style=\"font-weight: bold;\">خدانگهدار</span></div>', 1, '', 0, 1, 5, '1_84e1dbce5cec456687e57b989062eba3.png', 0, 0, 1, 0, '2019-07-12 09:42:27', '2019-07-12 10:08:31'),
(13, '', 'صیشسیشسی', 1, '', 0, 1, 5, '', 0, 0, 1, 0, '2019-07-12 09:50:11', '2019-07-12 10:08:31'),
(14, '', 'صیشسیشسی', 1, '', 0, 1, 5, '', 0, 0, 1, 0, '2019-07-12 09:51:34', '2019-07-12 10:08:31'),
(15, '', 'یسبسیبسیب', 1, '', 0, 1, 5, '', 0, 0, 1, 0, '2019-07-12 09:51:51', '2019-07-12 10:08:31'),
(16, '', 'یک پاسخ آزمایشی', 1, '', 0, 1, 1, '', 0, 0, 1, 0, '2019-07-12 10:10:34', '2019-07-12 10:10:37'),
(17, '', 'تست پاسخ به تیکت بسته شده', 1, '', 0, 1, 5, '', 0, 0, 1, 0, '2019-07-12 10:11:04', '2019-07-12 10:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_gateways`
--

CREATE TABLE `transaction_gateways` (
  `ID` int(11) NOT NULL,
  `gateway_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `title_en` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `MerchantID` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `transaction_gateways`
--

INSERT INTO `transaction_gateways` (`ID`, `gateway_id`, `title`, `title_en`, `MerchantID`, `is_active`) VALUES
(1, 1, 'زرین پال', 'zarinpal', '4ee75077-d3e8-4757-881a-3d9dae8e8897', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_manager`
--

CREATE TABLE `transaction_manager` (
  `ID` bigint(20) NOT NULL,
  `hash` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `gateway` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `mobile` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `device` varchar(40) COLLATE utf8mb4_persian_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `gateway_status` varchar(40) COLLATE utf8mb4_persian_ci NOT NULL,
  `gateway_desc` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `refID` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `Authority` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `is_successful` int(1) NOT NULL,
  `is_order_delivered` int(1) NOT NULL,
  `deliver_date` bigint(20) NOT NULL,
  `desc` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `token` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `callback_url` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `callback_url_background` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `expire_date` bigint(20) NOT NULL,
  `ip` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `user_agent` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `package_name` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `transaction_manager`
--

INSERT INTO `transaction_manager` (`ID`, `hash`, `gateway`, `order_id`, `mobile`, `device`, `amount`, `gateway_status`, `gateway_desc`, `refID`, `Authority`, `is_successful`, `is_order_delivered`, `deliver_date`, `desc`, `token`, `user_id`, `callback_url`, `callback_url_background`, `expire_date`, `ip`, `user_agent`, `package_name`, `date_created`, `date_updated`) VALUES
(1, '6705b21c91d1775d5ebbb4489cefa161', 1, 38, '1', '', 37500, '', '', '', '', 0, 0, 0, 'شماره فاکتور 38', '6cfc391d8f5222bda0079c4ffbd3a912', 0, 'callback_url', '', 1563450369, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-18 11:16:57', '0000-00-00 00:00:00'),
(2, '92d883599262695583ddfbc932adcf38', 1, 39, '1', 'android', 37500, 'CANCELED', 'کاربر انصراف داده است.', '', '000000000000000000000000000124294181', 1, 0, 0, 'شماره فاکتور 39', '6cfc391d8f5222bda0079c4ffbd3a912', 0, 'callback_url', '', 2563450403, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-18 13:24:17', '0000-00-00 00:00:00'),
(3, '5fbc799d062c0d1455eb61fb1f448168', 1, 40, '1', '#device#', 37500, '', '', '', '', 0, 0, 0, 'شماره فاکتور 40', '6cfc391d8f5222bda0079c4ffbd3a912', 0, 'callback_url', '', 1563457098, '', '', 'com.app.android', '2019-07-18 12:53:18', '0000-00-00 00:00:00'),
(4, '65c6bb5c48c8b416412098aa986a868a', 1, 41, '1', 'android', 37500, '', '', '', '', 1, 0, 0, 'شماره فاکتور 41', '6cfc391d8f5222bda0079c4ffbd3a912', 0, 'callback_url', '', 1563458967, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-18 13:28:51', '0000-00-00 00:00:00'),
(5, 'a533696b750623d5fbb2250e17d0ba22', -1, 42, '1', '', 37500, '', '', '', '', 0, 0, 0, 'شماره فاکتور 42', '6cfc391d8f5222bda0079c4ffbd3a912', 0, 'callback_url', '', 1563636124, '', '', 'com.app.android', '2019-07-20 15:02:04', '0000-00-00 00:00:00'),
(6, '3f3a17307e8e8a09b8e084c3522a549e', -1, 43, '1', 'android', 37500, '', '', '', '', 0, 0, 0, 'شماره فاکتور 43', '6cfc391d8f5222bda0079c4ffbd3a912', 0, 'callback_url', '', 1563707904, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-21 11:02:00', '0000-00-00 00:00:00'),
(7, 'dc4a38283c8cdb997064f51c99e22eee', -1, 44, '1', '', 37500, '', '', '', '', 0, 0, 0, 'شماره فاکتور 44', '6cfc391d8f5222bda0079c4ffbd3a912', 0, '', 'http://localhost/prime-apps/backend-php/api/v1/', 1563711552, '', '', 'com.app.android', '2019-07-21 11:59:12', '0000-00-00 00:00:00'),
(8, 'c0094c035bfc3ac59e3608533994b9fc', -1, 45, '1', '', 37500, '', '', '', '', 0, 0, 0, 'شماره فاکتور 45', '6cfc391d8f5222bda0079c4ffbd3a912', 0, '', 'http://localhost/prime-apps/backend-php/api/v1/', 1563711591, '', '', 'com.app.android', '2019-07-21 11:59:51', '0000-00-00 00:00:00'),
(9, 'ce23d191e84dc1fefc158b10ec064df5', -1, 46, '1', 'android', 37500, '', 'تراکنش موفق - کد: 123456', '123456', '', 1, 0, 0, 'شماره فاکتور 46', '6cfc391d8f5222bda0079c4ffbd3a912', 0, '', 'http://localhost/prime-apps/backend-php/api/v1/', 1563711604, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-21 12:00:31', '0000-00-00 00:00:00'),
(10, '0abc2ba9b73eccc8102e248d884675e8', -1, 47, '1', 'android', 37500, '', 'تراکنش موفق - کد: 123456', '123456', '', 1, 0, 0, 'شماره فاکتور 47', 'a476609e3d0dd7652f827624029ebe57', 0, '', 'http://localhost/prime-apps/backend-php/api/v1/', 1563712126, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-21 12:09:04', '0000-00-00 00:00:00'),
(11, '480c499d80d9f133f3c671e91eb87990', -1, 48, '1', 'android', 37500, '', '', '', '', 0, 0, 0, 'شماره فاکتور 48', 'a476609e3d0dd7652f827624029ebe57', 0, '', 'http://localhost/prime-apps/backend-php/api/v1/', 1563712287, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-21 12:11:39', '0000-00-00 00:00:00'),
(12, '9b670cbace9eb1b9f8a0aa39f204887e', -1, 49, '1', 'android', 37500, '', '', '', '', 0, 0, 0, 'شماره فاکتور 49', 'a476609e3d0dd7652f827624029ebe57', 0, '', 'http://localhost/prime-apps/backend-php/api/v1/savePaymentInfo', 1563712472, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-21 12:14:43', '0000-00-00 00:00:00'),
(13, 'fd42769a73bb6db1688dce4a4ba1148f', -1, 50, '1', 'android', 37500, '', '', '', '', 0, 0, 0, 'شماره فاکتور 50', 'a476609e3d0dd7652f827624029ebe57', 0, '', 'http://localhost/prime-apps/backend-php/api/v1/savePaymentInfo', 1563712816, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-21 12:20:28', '0000-00-00 00:00:00'),
(14, '99f07e474878bbfd0467f24ea31da2ce', -1, 51, '1', 'android', 37500, '', '', '', '', 0, 0, 0, 'شماره فاکتور 51', 'a476609e3d0dd7652f827624029ebe57', 0, '', 'http://localhost/prime-apps/backend-php/api/v1/savePaymentInfo', 1563712909, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-21 12:21:57', '0000-00-00 00:00:00'),
(15, '4ecef691553111fda36caaa7b3eb2aaa', -1, 52, '1', 'android', 37500, '', '', '', '', 0, 0, 0, 'شماره فاکتور 52', 'a476609e3d0dd7652f827624029ebe57', 0, '', 'http://localhost/prime-apps/backend-php/api/v1/savePaymentInfo', 1563712949, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-21 12:22:39', '0000-00-00 00:00:00'),
(16, '4f2dd4007ac5001bc9f79d382c2a040c', -1, 53, '1', 'android', 37500, '', '', '', '', 0, 0, 0, 'شماره فاکتور 53', 'a476609e3d0dd7652f827624029ebe57', 0, '', 'http://localhost/prime-apps/backend-php/api/v1/savePaymentInfo', 1563713905, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-21 12:38:45', '0000-00-00 00:00:00'),
(17, 'ee3020132e58ecf45acd7cdde5252bc5', -1, 54, '1', 'android', 37500, '', '', '', '', 0, 0, 0, 'شماره فاکتور 54', 'a476609e3d0dd7652f827624029ebe57', 0, '', 'http://localhost/prime-apps/backend-php/api/v1/savePaymentInfo', 1563719695, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-21 14:15:27', '0000-00-00 00:00:00'),
(18, 'c1af9ae2b1d1756816135a7b5412d02a', -1, 55, '1', 'android', 37500, '', 'تراکنش موفق - کد: 123456', '123456', 'SAMPLE_AUTH', 1, 1, 1563719352, 'شماره فاکتور 55', 'a476609e3d0dd7652f827624029ebe57', 1, '', 'http://localhost/prime-apps/backend-php/api/v1/savePaymentInfo', 1563720023, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-21 14:29:12', '0000-00-00 00:00:00'),
(19, 'd07eb57ecf07ecbfa4d0773454738079', -1, 1, '1', '', 1000, '', '', '', '', 0, 0, 0, 'افزایش اعتبار', '1e21cb2463154650337ad36061e4ad29', 1, '', 'http://localhost/prime-apps/backend-php/api/v1/chargeCredit?hash=9180998e54f5d8e3c53458489115af22', 0, '', '', 'com.app.android', '2019-07-21 14:38:38', '0000-00-00 00:00:00'),
(20, 'b50cc1d7d3974fac46e38d6c4e1dbdbb', -1, 1, '1', '', 1000, '', '', '', '', 0, 0, 0, 'افزایش اعتبار', '1e21cb2463154650337ad36061e4ad29', 1, '', 'http://localhost/prime-apps/backend-php/api/v1/chargeCredit?hash=9180998e54f5d8e3c53458489115af22', 0, '', '', 'com.app.android', '2019-07-21 14:39:37', '0000-00-00 00:00:00'),
(21, 'd38b0491d980c171116fb19f41aa5424', -1, 1, '1', '', 1000, '', '', '', '', 0, 0, 0, 'افزایش اعتبار', '1e21cb2463154650337ad36061e4ad29', 1, '', 'http://localhost/prime-apps/backend-php/api/v1/chargeCredit?hash=9180998e54f5d8e3c53458489115af22', 0, '', '', 'com.app.android', '2019-07-21 14:41:38', '0000-00-00 00:00:00'),
(22, '342a8a2a511c3411545012a92c7bd056', -1, 1, '1', 'android', 1000, 'success', 'تراکنش موفق - کد: 123456', '123456', 'SAMPLE_AUTH', 1, 0, 0, 'افزایش اعتبار', '1e21cb2463154650337ad36061e4ad29', 1, '', 'http://localhost/prime-apps/backend-php/api/v1/chargeCredit?hash=9180998e54f5d8e3c53458489115af22', 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-21 14:42:44', '0000-00-00 00:00:00'),
(23, 'ca921b991e294c68146347d07f85c55e', -1, 1, '1', '', 1000, '', '', '', '', 0, 0, 0, 'افزایش اعتبار', '1e21cb2463154650337ad36061e4ad29', 1, '', 'http://localhost/prime-apps/backend-php/api/v1/chargeCredit?hash=9180998e54f5d8e3c53458489115af22', 1563721364, '', '', 'com.app.android', '2019-07-21 14:42:44', '0000-00-00 00:00:00'),
(24, '3959b3d633a4d912bf0b996c3beb221e', -1, 1563720356, '1', 'android', 1000, 'success', 'تراکنش موفق - کد: 123456', '123456', 'SAMPLE_AUTH', 1, 1, 1563720357, 'افزایش اعتبار', '1e21cb2463154650337ad36061e4ad29', 1, '', 'http://localhost/prime-apps/backend-php/api/v1/chargeCredit?hash=9180998e54f5d8e3c53458489115af22', 1563721556, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'com.app.android', '2019-07-21 14:45:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `ID` bigint(20) NOT NULL,
  `title` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `phone` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `mobile` longtext COLLATE utf8mb4_persian_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`ID`, `title`, `address`, `lat`, `lng`, `phone`, `mobile`, `user_id`, `date_created`, `date_updated`) VALUES
(1, 'TitleEE', 'Address', 11111, 22222, '02188228822', '09364445566', 1, '2019-07-20 13:50:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_credit_logs`
--

CREATE TABLE `user_credit_logs` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `last_amount` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_products`
--

CREATE TABLE `user_products` (
  `ID` int(11) NOT NULL,
  `call_time` int(11) NOT NULL,
  `call_time_used` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `last_downloaded_version` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `addons` longtext COLLATE utf8_persian_ci NOT NULL,
  `addons_questions_data` longtext COLLATE utf8_persian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `support_expire_date` bigint(20) NOT NULL,
  `purchase_date` bigint(20) NOT NULL,
  `is_questions_answered` int(11) NOT NULL,
  `questions_data` longtext COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user_products`
--

INSERT INTO `user_products` (`ID`, `call_time`, `call_time_used`, `product_id`, `last_downloaded_version`, `order_id`, `addons`, `addons_questions_data`, `user_id`, `support_expire_date`, `purchase_date`, `is_questions_answered`, `questions_data`) VALUES
(1, 60, 20, 1, 0, 0, ',1,,1,', '[{\"addonID\":1,\"purchase_date\":1558905019,\"data\":[{\"question\":\"Question 1\",\"type\":\"text\",\"answer\":\"Answer 1\"},{\"question\":\"Question 2\",\"type\":\"number\",\"answer\":\"Answer 2\"},{\"question\":\"Question 3\",\"type\":\"file\",\"answer\":\"Answer 3\"},{\"question\":\"Question 4\",\"type\":\"textarea\",\"answer\":\"Answer 4\"},{\"question\":\"Question 5\",\"type\":\"dropdown\",\"answer\":\"Answer 5\"}]}]', 1, 1568908019, 1558905019, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE `user_tokens` (
  `ID` int(11) NOT NULL,
  `token` longtext COLLATE utf8_persian_ci NOT NULL,
  `account_id` bigint(20) NOT NULL,
  `is_logout` int(1) NOT NULL,
  `login_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `expire_date` bigint(20) NOT NULL,
  `is_expired` int(1) NOT NULL,
  `ip` longtext COLLATE utf8_persian_ci NOT NULL,
  `browser` longtext COLLATE utf8_persian_ci NOT NULL,
  `device` longtext COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user_tokens`
--

INSERT INTO `user_tokens` (`ID`, `token`, `account_id`, `is_logout`, `login_date`, `logout_date`, `expire_date`, `is_expired`, `ip`, `browser`, `device`) VALUES
(36, '0c994464678fdeae6d1295476cec19ca', 15581214342816772, 1, '2019-07-03 15:15:50', '2019-07-07 00:00:00', 1564758950, 0, '127.0.0.1', 'PostmanRuntime/7.13.0', ''),
(49, '9dd8cf764e0a08d4f2432d3bacdb78f4', 35599424125, 0, '2019-07-06 13:41:34', '0000-00-00 00:00:00', 1565012494, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(50, '6cfc391d8f5222bda0079c4ffbd3a912', 15581214342816772, 0, '2019-07-18 10:37:26', '0000-00-00 00:00:00', 1566038246, 0, '127.0.0.1', 'PostmanRuntime/7.13.0', ''),
(51, 'f12a4063767631cdc5f1c7c46760cbd4', 15581214342816772, 0, '2019-07-18 11:00:00', '0000-00-00 00:00:00', 1566039600, 0, '127.0.0.1', 'PostmanRuntime/7.13.0', ''),
(52, '1e21cb2463154650337ad36061e4ad29', 15581214342816772, 0, '2019-07-20 13:50:33', '0000-00-00 00:00:00', 1566222633, 0, '127.0.0.1', 'PostmanRuntime/7.13.0', ''),
(53, 'a476609e3d0dd7652f827624029ebe57', 15581214342816772, 0, '2019-07-21 12:08:38', '0000-00-00 00:00:00', 1566302918, 0, '127.0.0.1', 'PostmanRuntime/7.13.0', ''),
(54, 'fd21758f73a49aa296707580d4d03b97', 15581214342816772, 0, '2019-07-21 17:38:06', '0000-00-00 00:00:00', 1566322686, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(55, 'd5d3dcabee82d9ec6511f6b08eafb797', 15581214342816772, 0, '2019-07-22 11:40:32', '0000-00-00 00:00:00', 1566387632, 0, '127.0.0.1', 'PostmanRuntime/7.13.0', ''),
(56, '32447af07c2e6884ee8f3bf0c5f1be3b', 15581214342816772, 0, '2019-07-23 14:14:53', '0000-00-00 00:00:00', 1566483293, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(57, '2c69c92ebb39d2d1ff220763ae15c563', 15581214342816772, 0, '2019-07-24 07:55:08', '0000-00-00 00:00:00', 1566546908, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(58, '38ad43205e4f633d3a0bddbdcf7512a2', 15581214342816772, 0, '2019-07-24 13:37:37', '0000-00-00 00:00:00', 1566567457, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(59, 'c269828c56509c1afda57c2a1d43c716', 16575129383, 0, '2019-07-24 13:42:04', '0000-00-00 00:00:00', 1566567724, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(60, '4a18a0247e9fc1b38ba4f1fbd5207b3c', 81543891257, 0, '2019-07-24 13:43:22', '0000-00-00 00:00:00', 1566567802, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(61, '02b594745afd6a1c7664117bdea94736', 68840141137, 0, '2019-07-24 13:44:18', '0000-00-00 00:00:00', 1566567858, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(62, 'fd7b1d98b45ede98711c5b095068875a', 15581214342816772, 0, '2019-07-24 13:47:02', '0000-00-00 00:00:00', 1566568022, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(63, '2f1e37c41202a16f73fec1c800cfa6e5', 15581214342816772, 0, '2019-07-24 13:49:01', '0000-00-00 00:00:00', 1566568141, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(64, 'fe648e814f0a1cf0a65a190f43be4c7a', 15581214342816772, 0, '2019-07-24 13:50:44', '0000-00-00 00:00:00', 1566568244, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(65, '6924af923d9490eb971f61868466ea52', 15581214342816772, 0, '2019-07-24 13:52:00', '0000-00-00 00:00:00', 1566568320, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', ''),
(66, 'bb02230f7dab1ddc6a929832ff7fe39c', 15581214342816772, 0, '2019-07-24 13:58:04', '0000-00-00 00:00:00', 1566568684, 0, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '');

-- --------------------------------------------------------

--
-- Table structure for table `web_pages`
--

CREATE TABLE `web_pages` (
  `ID` int(11) NOT NULL,
  `title` longtext COLLATE utf8_persian_ci NOT NULL,
  `url_slug` longtext COLLATE utf8_persian_ci NOT NULL,
  `meta_title` longtext COLLATE utf8_persian_ci NOT NULL,
  `meta_desc` longtext COLLATE utf8_persian_ci NOT NULL,
  `content` longtext COLLATE utf8_persian_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL,
  `show_in_footer` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `web_pages`
--

INSERT INTO `web_pages` (`ID`, `title`, `url_slug`, `meta_title`, `meta_desc`, `content`, `is_visible`, `show_in_footer`, `date_created`, `date_updated`) VALUES
(1, 'About Us', 'about_us', '', '', '', 1, 1, '2019-05-30 14:17:00', '2019-05-30 17:11:00'),
(2, 'تماس با ما', 'contact-us', 'عنوان متا', 'توضیحات متا', '<span style=\"font-weight: bold;\">صفحه تماس با ما</span>', 1, 1, '2019-07-12 12:00:22', '2019-07-12 12:00:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `file_manager`
--
ALTER TABLE `file_manager`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_logs`
--
ALTER TABLE `order_logs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pages_info`
--
ALTER TABLE `pages_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pme_admin_tokens`
--
ALTER TABLE `pme_admin_tokens`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `account_id` (`admin_id`);

--
-- Indexes for table `pme_portal_admins`
--
ALTER TABLE `pme_portal_admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `prime_users`
--
ALTER TABLE `prime_users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `account_id` (`account_id`);

--
-- Indexes for table `shop_cats`
--
ALTER TABLE `shop_cats`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `shop_orders`
--
ALTER TABLE `shop_orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `shop_order_products`
--
ALTER TABLE `shop_order_products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `shop_products`
--
ALTER TABLE `shop_products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `shop_slider`
--
ALTER TABLE `shop_slider`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `transaction_gateways`
--
ALTER TABLE `transaction_gateways`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaction_manager`
--
ALTER TABLE `transaction_manager`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_credit_logs`
--
ALTER TABLE `user_credit_logs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `user_products`
--
ALTER TABLE `user_products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `web_pages`
--
ALTER TABLE `web_pages`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `file_manager`
--
ALTER TABLE `file_manager`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_logs`
--
ALTER TABLE `order_logs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages_info`
--
ALTER TABLE `pages_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pme_admin_tokens`
--
ALTER TABLE `pme_admin_tokens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pme_portal_admins`
--
ALTER TABLE `pme_portal_admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prime_users`
--
ALTER TABLE `prime_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shop_cats`
--
ALTER TABLE `shop_cats`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop_orders`
--
ALTER TABLE `shop_orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `shop_order_products`
--
ALTER TABLE `shop_order_products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `shop_products`
--
ALTER TABLE `shop_products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shop_slider`
--
ALTER TABLE `shop_slider`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaction_gateways`
--
ALTER TABLE `transaction_gateways`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction_manager`
--
ALTER TABLE `transaction_manager`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_credit_logs`
--
ALTER TABLE `user_credit_logs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_products`
--
ALTER TABLE `user_products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `web_pages`
--
ALTER TABLE `web_pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_logs`
--
ALTER TABLE `order_logs`
  ADD CONSTRAINT `order_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `prime_users` (`ID`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_logs_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `prime_products` (`ID`) ON UPDATE NO ACTION;

--
-- Constraints for table `shop_order_products`
--
ALTER TABLE `shop_order_products`
  ADD CONSTRAINT `shop_order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `shop_orders` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD CONSTRAINT `support_tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `prime_users` (`ID`) ON UPDATE NO ACTION;

--
-- Constraints for table `user_products`
--
ALTER TABLE `user_products`
  ADD CONSTRAINT `user_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `prime_users` (`ID`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `prime_products` (`ID`) ON UPDATE NO ACTION;

--
-- Constraints for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `prime_users` (`account_id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
