-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2018 lúc 08:54 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_chart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `charts`
--

CREATE TABLE `charts` (
  `id` int(10) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `type_id` int(10) DEFAULT NULL,
  `thumbnail` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `display_slide` tinyint(1) DEFAULT '0',
  `display_collect` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `charts`
--

INSERT INTO `charts` (`id`, `title`, `user_id`, `type_id`, `thumbnail`, `display_slide`, `display_collect`, `created_at`, `updated_at`) VALUES
(12, 'We are drawchart', 2, 6, '/file/images/2017/12/29/j79LP1DBRLug0eP57YqX17sWamHhx6UayOOnzmqw.jpeg', 1, 0, '2017-12-29 06:47:28', '2017-12-29 06:47:28'),
(14, 'Chart_1', 2, 5, '/file/images/2017/11/27/jLryE0VEag5eOAUliUcaKdWOv4uolALDGneq9Dk5.png', 0, 1, '2017-12-05 17:57:07', '2017-12-02 00:48:20'),
(15, 'Chart_2', 2, 5, '/file/images/2017/11/27/kkQHpr0oqbUxvw9VF9wmT2Zgi4MLYA0GQZjFE7C0.png', 0, 1, '2017-12-05 17:57:09', '2017-12-02 00:49:30'),
(16, 'Chart_3', 2, 5, '/file/images/2017/11/27/bylWy8EWNncyhshoW0ok0nPXcIhS7MwpUNnPraWN.png', 0, 1, '2017-12-28 09:53:20', '2017-12-28 09:53:20'),
(25, 'My Skill', 2, 6, '/file/images/2017/12/27/Pxs34QrgoqL7Co330GxbQkdqdQO9E0tFc4VaoMXb.png', 0, 1, '2017-12-27 02:31:39', '2017-12-27 02:31:39'),
(28, 'Chart title', 9, 11, '/file/chart/1514341839.png', 0, 1, '2017-12-29 06:47:03', '2017-12-29 06:47:03'),
(29, 'Multi Bar Chart', 7, 15, '/file/chart/1514454729.png', 0, 1, '2017-12-28 09:53:47', '2017-12-28 09:53:47'),
(30, 'My work in project', 10, 7, '/file/chart/1514457916.png', 0, 0, '2017-12-28 10:45:16', '2017-12-28 10:45:16'),
(31, 'Doanh số bán hàng 11.2017', 7, 9, '/file/chart/1514477851.png', 0, 0, '2017-12-28 16:17:31', '2017-12-28 16:17:31'),
(33, 'Welcome Drawchart', 2, 6, '/file/images/2017/12/29/37L58IiJGIUmVcwuu3bfaS4nGc9Eru0yCeVgX0fW.jpeg', 1, 0, '2017-12-29 04:02:18', '2017-12-29 04:02:18'),
(38, 'Example Multichart', 2, 15, '/file/chart/1514528526.png', 0, 0, '2018-01-03 02:42:22', '2017-12-29 06:22:06'),
(39, 'Chart title', 2, 13, '/file/chart/1514528644.png', 0, 0, '2018-01-03 02:42:27', '2017-12-29 06:24:04'),
(40, 'Chart title', 2, 9, '/file/chart/1514528686.png', 0, 0, '2018-01-03 02:42:33', '2017-12-29 06:24:46'),
(41, 'Pie chart example', 2, 7, '/file/images/2017/12/29/eif3YpPbDyKFXiRs6TwR9yafAoWWhrRnNcv89Igo.png', 0, 1, '2017-12-29 06:48:18', '2017-12-29 06:48:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `reply` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `faqs`
--

INSERT INTO `faqs` (`id`, `name`, `email`, `content`, `reply`, `status`, `id_user`, `created_at`, `updated_at`) VALUES
(11, 'Hoai an', 'hoaian.br@gmail.com', 'Chào mừng bạn đến với Drawchart nhà sản xuất biểu đồ trực tuyến. Tạo biểu đồ phong phú và đầy màu sắc. \r\nMục tiêu chính của chúng tôi là làm cho việc tạo biểu đồ đơn giản và hấp dẫn trực quan. Các biểu đồ phức tạp và nhàm chán nên là một điều của quá khứ. Cho dù bạn muốn tạo một biểu đồ hình tròn hay biểu đồ dạng đường, chúng tôi sẽ làm cho nó trở nên đơn giản cho bạn.', 'Wellcome!!!', 2, 2, '2017-12-02 19:13:41', '2017-12-28 14:34:56'),
(14, 'anan', 'hoaian.br@gmail.com', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. Lorem Ipsum đã được sử dụng như một văn bản chuẩn cho ngành công nghiệp in ấn từ những năm 1500, khi một họa sĩ vô danh ghép nhiều đoạn văn bản với nhau để tạo thành một bản mẫu văn bản.', NULL, 0, NULL, '2017-12-25 16:54:35', '2017-12-25 16:54:35'),
(15, 'Thảo Lê', 'thaole2809@gmail.com', 'Hệ thống thật sự bổ ích cho công việc của tôi. Cảm ơn vì đã phát triển hệ thống biểu diễn dữ liệu này. Chúc website ngày càng phát triển.', NULL, 0, NULL, '2017-12-28 10:27:12', '2017-12-28 10:27:12'),
(18, 'trung nguyên kiếm khách', 'trungnguyenhiepkhach@gmail.com', 'web đẹp chưa từng thấy', 'Cảm ơn anh ạ :D', 2, 19, '2018-01-02 23:10:12', '2018-01-03 09:49:41'),
(19, 'thao', 'ellethao.linda@gmail.com', 'tôi muốn test', NULL, 0, NULL, '2018-01-03 00:53:35', '2018-01-03 00:53:35'),
(20, 'Source', 'ellethao.linda@gmail.com', 'hgvjh', NULL, 0, NULL, '2018-01-03 08:07:07', '2018-01-03 08:07:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(28, '2017_06_12_073056_create_users_table', 1),
(29, '2017_06_12_074356_create_permission_tables', 1),
(30, '2017_06_12_074604_create_password_resets_table', 1),
(31, '2017_06_14_065352_create_settings_table', 1),
(32, '2017_11_06_130735_create_types_table', 2),
(33, '2017_12_02_055923_create_faq_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tuyetchinh1996@gmail.com', '$2y$10$z2RRmcpaWhj242DEXKAbGe3ZBZKfx8znoYhHsJo3PPQEw9lja8XQu', '2017-12-26 01:30:05'),
('chinh96th@gmail.com', '$2y$10$vxBKVX6tson12FIpK5209eMTkKM8nA6kVvMiTb6PCH3BCdiNjMfPe', '2018-01-03 09:48:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'view_user', '2017-11-21 20:49:06', '2017-11-21 20:49:06'),
(2, 'create_user', '2017-11-21 20:49:06', '2017-11-21 20:49:06'),
(3, 'edit_user', '2017-11-21 20:49:06', '2017-11-21 20:49:06'),
(4, 'delete_user', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(5, 'view_role', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(6, 'create_role', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(7, 'edit_role', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(8, 'delete_role', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(9, 'view_type', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(10, 'create_type', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(11, 'edit_type', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(12, 'delete_type', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(13, 'view_chart', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(14, 'create_chart', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(15, 'edit_chart', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(16, 'delete_chart', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(17, 'slide_chart', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(18, 'collect_chart', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(19, 'view_setting', '2017-11-21 20:49:07', '2017-11-21 20:49:07'),
(20, 'edit_setting', '2017-11-21 20:49:07', '2017-11-21 20:49:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `key`, `name`, `description`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'contact_email', 'Contact form email address', 'The email address that all emails from the contact form will go to.', 'drawchart.vn@gmail.com', 0, NULL, NULL),
(2, 'contact_phone', 'Contact via phone', 'Contact via phone', '+1 234 567 89 - +987 654 321', 0, NULL, '2017-12-29 06:50:44'),
(3, 'contact_address', 'Contact form address', 'Contact form address', 'Ho Chi Minh City, Vietnam', 0, NULL, NULL),
(4, 'link_facebook_page', 'Link fan page facebook', 'Link fan page facebook', 'htpps://facebook.com/drawchartvn', 0, NULL, '2017-12-28 14:41:55'),
(5, 'link_google_page', 'Link fan page google', 'Link fan page google', 'https://gooogle.com/', 0, NULL, NULL),
(6, 'link_twitter_page', 'Link fan page twitter', 'Link fan page twitter', 'https://twitter.com/', 0, NULL, NULL),
(7, 'link_youtube_page', 'Link fan page youtube', 'Link fan page youtube', 'https://youtube.com/', 0, NULL, NULL),
(8, 'link_slack_page', 'Link fan page slack', 'Link fan page slack', 'https://slack.com/', 0, NULL, NULL),
(9, 'link_skype_page', 'Link fan page skype', 'Link fan page skype', 'https://skype.com/', 0, NULL, NULL),
(10, 'link_instagram_page', 'Link fan page instagram', 'Link fan page instagram', 'https://instagram.com/', 0, NULL, NULL),
(11, 'link_pinterest_page', 'Link fan page pinterest', 'Link fan page pinterest', 'https://pinterest.com/', 0, NULL, NULL),
(12, 'site_title', 'Site title', 'Website title', 'Drawchart', 0, NULL, '2017-12-13 02:37:46'),
(13, 'site_logo', 'Site logo', 'Website logo', 'assets\\user\\images\\logo.png', 0, NULL, '2017-12-13 02:37:21'),
(14, 'meta_keywords', 'Site meta keywords', 'Website meta', 'Drawchart', 0, NULL, NULL),
(15, 'meta_description', 'Site meta description', 'Website meta description', 'Project demo', 0, NULL, NULL),
(16, 'site_link', 'link website', NULL, 'chart.dev.com', 0, '2017-12-12 17:00:00', '2017-12-12 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `types`
--

INSERT INTO `types` (`id`, `key`, `name_en`, `name_vi`, `thumbnail`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'form_pie', 'Pie', 'Tròn', NULL, NULL, NULL, NULL),
(2, 'form_bar', 'Bar', 'Cột', NULL, NULL, NULL, NULL),
(3, 'form_line', 'Line', 'Đường', NULL, NULL, NULL, NULL),
(4, 'form_mix', 'Mix', 'Kết hợp', NULL, NULL, NULL, NULL),
(5, 'form_multi', 'Multiple', 'Đa dữ liệu', NULL, NULL, NULL, NULL),
(6, 'bar', 'Bar Chart', 'Biểu đồ Cột', '/file/images/2017/12/25/uD4CqInBGelLnVlsBqhO5t70aYdJw20PmcAcD47N.png', 2, NULL, NULL),
(7, 'pie', 'Pie Chart', 'Biểu đồ Tròn', '/file/images/2017/12/25/uMp2MZQD4jbOLCLWi8skSIVIk6cdp41WZbWtJdaZ.png', 1, NULL, NULL),
(8, 'line', 'Line Chart', 'Biểu đồ Đường', '/file/images/2017/12/25/1Yvbe9p5LVvLuFix4ifOnOEUQ3W4dVznrpDw9nnW.png', 3, NULL, NULL),
(9, 'doughnut', 'Doughnut Chart', 'Biểu đồ Bánh', '/file/images/2017/12/25/UR9lGIIIN3QLMRLksdrG2uvOlcfpFl9ot7KacETJ.png', 1, NULL, NULL),
(10, 'radar', 'Radar Chart', 'Biều đồ Radar', '/file/images/2017/12/25/xMUWW7izwYaASde6VEre03B4A9jn0mbtLs8OJRnI.png', 3, NULL, NULL),
(11, 'horizontalBar', 'Horizontal Bar Chart', 'Biều đồ Cột Ngang', '/file/images/2017/12/25/vKBH8dR9c2oeLPKbCwEN1ohN1I10GNC8Gi8Z1u9s.png', 2, NULL, NULL),
(12, 'area', 'Area Chart', 'Biều đồ miền', '/file/images/2017/12/28/YKOoq5spZdTbPh6WBhi4UdTEUSub8uccGFCS06vS.png', 3, NULL, NULL),
(13, 'bar_line', 'Line and Bar', 'Biểu đồ Cột và đường', '/file/images/2017/12/26/tiuVuW4jiG1bluexR0iHNgLZzAMJtChmTuTYOHkc.png', 4, NULL, NULL),
(14, 'bar_area', 'Bar and Area', 'Biểu đồ Cột và miền', '/file/images/2017/12/26/lxdtlwvFlnhZvaOeBOwweH4FraHwTP9SiLOEyeMr.png', 4, NULL, NULL),
(15, 'bar', 'Multi Bar Chart', 'Biều  đồ Đa cột', '/file/images/2017/12/26/M7NoYjRTyBhwfwJhHJ9BGKrmFFACNU1GZrDorGhn.png', 5, NULL, NULL),
(16, 'line', 'Multi Line Chart', 'Biểu đồ Đa đường', '/file/images/2017/12/26/IdcFCC9NMRhBU6PBrT6vnofG7otlOiMUh4QPbXY3.png', 5, NULL, NULL),
(17, 'area', 'Multi Area Chart', 'Biểu đồ Đa Miền', '/file/images/2017/12/28/bJ9RExIWN1Uf4WzuVKXeN64k8tWcqIzFD7sDcqfS.png', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_root` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `is_admin`, `is_root`, `status`, `last_login`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hoaian', 'hoaian.br@admin.com', '$2y$10$6xS6BjnKUhmLAO62oJGAmOvfNyWwwD6qZSNDuMBL/GAUdzPlGTHJy', NULL, 1, 1, 1, '2018-01-03 09:47:29', 'en3A1cdflK', '2017-11-01 10:47:25', '2018-01-03 09:47:29', NULL),
(2, 'chinhho', 'chinh96th@gmail.com', '$2y$10$0JWMbg0rfQOWbXl6ltHoa.6WxaFnGm15lyQDDrzaEGYV93lFo7aeC', NULL, 1, 1, 1, '2018-01-07 01:03:55', 'HNrbKmeXz9SBzbVWAve96empgWCNY1ybVTDvl9hIMCoi5G77kCGdSeu8G8VV', '2017-11-13 19:41:59', '2018-01-06 18:03:55', NULL),
(4, 'admin thuong', 'chinh3@gmail.com', '$2y$10$/kXeeMChYqQPLw.4hBGO9OEdXmESn1V7.AjZUtGHT4XyhAh6y99SC', NULL, 1, 0, 0, '2017-11-22 04:05:00', NULL, '2017-11-21 20:55:47', '2017-12-10 13:14:38', NULL),
(5, 'test', 'test@gmail.com', '$2y$10$Wt8So4QuxgBH9VyeFWacF.dz1Nfqt.ZMfa0m/Zj0KloSlSCJJDITq', NULL, 0, 0, 1, '2017-11-26 04:55:04', 'LNfst1KF0wk1ybaJrNiVGp1rQZEvHrjUcEiYGHH6AeZ2FFkEw5uyGaCWXf1A', '2017-11-25 21:53:17', '2017-11-25 21:55:04', NULL),
(7, 'lanhuong', 'lanhuong@gmail.com', '$2y$10$gi4ovgu0OxzsuYYAtZN8d.ssp/SW6Iqs3kFWx.3NBuAwt.kSwAnZm', NULL, 0, 0, 1, NULL, NULL, '2017-12-25 17:24:23', '2017-12-29 06:38:37', NULL),
(9, 'hoanganh', 'hoanganh@gmail.com', '$2y$10$DyVtUB0cdFTi/vMKrtsxceo6ZnH8/QYtFz/1YaXZ0k0HYHoyMkpcS', NULL, 0, 0, 1, NULL, NULL, '2017-12-26 16:44:59', '2017-12-26 16:44:59', NULL),
(10, 'thaole', 'thaole2809@gmail.com', '$2y$10$16c0valuOADkAHZHhUjfBu.488V6sk6tZhxIFuuOu4gawtMczxPQ6', NULL, 0, 0, 1, NULL, NULL, '2017-12-28 10:25:23', '2017-12-28 10:25:23', NULL),
(11, 'thuynhu', 'thuynhu@gmail.com', '$2y$10$jP8i9FhGMtpc618Hjf6BzOX.CoFX0Wc/3mbCgZsF1.Oi93I9mPTum', NULL, 0, 0, 1, NULL, NULL, '2017-12-28 10:52:39', '2017-12-28 10:52:39', NULL),
(18, 'an an', 'hoaian.br@gmail.com', '$2y$10$rVsN.Gf8QhHcUvbfwLimh.m29noZgLQNR9eSBFUJCDPYSyeTO/oMC', NULL, 0, 0, 1, NULL, NULL, '2017-12-31 13:11:57', '2017-12-31 13:11:57', NULL),
(19, 'Chinh Ho', 'tuyetchinh1996@gmail.com', '$2y$10$eHz5NAM25.TiIneSPCA1IuXbHxUbVRMJlZY3unytN5MK3.GJvYJMq', NULL, 1, 1, 1, '2018-01-03 09:48:57', NULL, '2018-01-03 08:45:35', '2018-01-03 09:48:57', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_has_permissions`
--

CREATE TABLE `user_has_permissions` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_has_permissions`
--

INSERT INTO `user_has_permissions` (`user_id`, `permission_id`) VALUES
(4, 1),
(4, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_has_roles`
--

CREATE TABLE `user_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `charts`
--
ALTER TABLE `charts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`user_id`),
  ADD KEY `id_topic` (`type_id`);

--
-- Chỉ mục cho bảng `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `user_has_permissions_permission_id_foreign` (`permission_id`);

--
-- Chỉ mục cho bảng `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `user_has_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `charts`
--
ALTER TABLE `charts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
