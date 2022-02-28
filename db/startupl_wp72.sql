-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2022 at 12:45 AM
-- Server version: 5.7.37-log-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `startupl_wp72`
--

-- --------------------------------------------------------

--
-- Table structure for table `wpsg_commentmeta`
--

CREATE TABLE `wpsg_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wpsg_comments`
--

CREATE TABLE `wpsg_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'comment',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wpsg_comments`
--

INSERT INTO `wpsg_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2021-08-30 11:48:15', '2021-08-30 11:48:15', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://gravatar.com\">Gravatar</a>.', 0, '1', '', 'comment', 0, 0),
(2, 155, 'Anon', 'anon@example.com', '', '', '2007-09-04 10:49:28', '2007-09-04 00:49:28', 'Anonymous comment.', 0, '1', '', 'comment', 0, 0),
(3, 155, 'tellyworthtest2', 'tellyworth+test2@example.com', '', '', '2007-09-04 10:49:03', '2007-09-04 00:49:03', 'Contributor comment.', 0, '1', '', 'comment', 0, 0),
(4, 155, 'themedemos', 'themeshaperwp+demos@gmail.com', 'https://wpthemetestdata.wordpress.com/', '', '2007-09-04 10:48:51', '2007-09-04 17:48:51', 'Author comment.', 0, '1', '', 'comment', 0, 0),
(5, 155, 'themereviewteam', 'themereviewteam@gmail.com', '', '', '2014-12-10 01:56:24', '2014-12-10 08:56:24', 'nothing useful to say', 0, '0', '', 'comment', 3, 0),
(6, 703, 'ken', 'example@example.com', '', '', '2014-11-29 21:03:05', '2014-11-30 04:03:05', 'I want to learn how to make chinese eggrolls', 0, '0', '', 'comment', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wpsg_links`
--

CREATE TABLE `wpsg_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wpsg_options`
--

CREATE TABLE `wpsg_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wpsg_options`
--

INSERT INTO `wpsg_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'https://startuplawyer.lk/main/blog', 'yes'),
(2, 'home', 'https://startuplawyer.lk/main/blog', 'yes'),
(3, 'blogname', 'StartupLawyer', 'yes'),
(4, 'blogdescription', 'My WordPress Blog', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'admin@startuplawyer.lk', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:138:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:17:\"^wp-sitemap\\.xml$\";s:23:\"index.php?sitemap=index\";s:17:\"^wp-sitemap\\.xsl$\";s:36:\"index.php?sitemap-stylesheet=sitemap\";s:23:\"^wp-sitemap-index\\.xsl$\";s:34:\"index.php?sitemap-stylesheet=index\";s:48:\"^wp-sitemap-([a-z]+?)-([a-z\\d_-]+?)-(\\d+?)\\.xml$\";s:75:\"index.php?sitemap=$matches[1]&sitemap-subtype=$matches[2]&paged=$matches[3]\";s:34:\"^wp-sitemap-([a-z]+?)-(\\d+?)\\.xml$\";s:47:\"index.php?sitemap=$matches[1]&paged=$matches[2]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:49:\"help_cat/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?help_cat=$matches[1]&feed=$matches[2]\";s:44:\"help_cat/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?help_cat=$matches[1]&feed=$matches[2]\";s:25:\"help_cat/([^/]+)/embed/?$\";s:41:\"index.php?help_cat=$matches[1]&embed=true\";s:37:\"help_cat/([^/]+)/page/?([0-9]{1,})/?$\";s:48:\"index.php?help_cat=$matches[1]&paged=$matches[2]\";s:19:\"help_cat/([^/]+)/?$\";s:30:\"index.php?help_cat=$matches[1]\";s:50:\"video_cat/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:48:\"index.php?video_cat=$matches[1]&feed=$matches[2]\";s:45:\"video_cat/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:48:\"index.php?video_cat=$matches[1]&feed=$matches[2]\";s:26:\"video_cat/([^/]+)/embed/?$\";s:42:\"index.php?video_cat=$matches[1]&embed=true\";s:38:\"video_cat/([^/]+)/page/?([0-9]{1,})/?$\";s:49:\"index.php?video_cat=$matches[1]&paged=$matches[2]\";s:20:\"video_cat/([^/]+)/?$\";s:31:\"index.php?video_cat=$matches[1]\";s:35:\"artical/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:45:\"artical/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:65:\"artical/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:60:\"artical/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:60:\"artical/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:41:\"artical/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:24:\"artical/([^/]+)/embed/?$\";s:40:\"index.php?artical=$matches[1]&embed=true\";s:28:\"artical/([^/]+)/trackback/?$\";s:34:\"index.php?artical=$matches[1]&tb=1\";s:36:\"artical/([^/]+)/page/?([0-9]{1,})/?$\";s:47:\"index.php?artical=$matches[1]&paged=$matches[2]\";s:43:\"artical/([^/]+)/comment-page-([0-9]{1,})/?$\";s:47:\"index.php?artical=$matches[1]&cpage=$matches[2]\";s:32:\"artical/([^/]+)(?:/([0-9]+))?/?$\";s:46:\"index.php?artical=$matches[1]&page=$matches[2]\";s:24:\"artical/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:34:\"artical/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:54:\"artical/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:49:\"artical/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:49:\"artical/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:30:\"artical/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:33:\"video/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:43:\"video/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:63:\"video/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:58:\"video/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:58:\"video/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:39:\"video/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:22:\"video/([^/]+)/embed/?$\";s:38:\"index.php?video=$matches[1]&embed=true\";s:26:\"video/([^/]+)/trackback/?$\";s:32:\"index.php?video=$matches[1]&tb=1\";s:34:\"video/([^/]+)/page/?([0-9]{1,})/?$\";s:45:\"index.php?video=$matches[1]&paged=$matches[2]\";s:41:\"video/([^/]+)/comment-page-([0-9]{1,})/?$\";s:45:\"index.php?video=$matches[1]&cpage=$matches[2]\";s:30:\"video/([^/]+)(?:/([0-9]+))?/?$\";s:44:\"index.php?video=$matches[1]&page=$matches[2]\";s:22:\"video/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:32:\"video/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:52:\"video/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:47:\"video/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:47:\"video/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:28:\"video/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:58:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:68:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:88:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:64:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:53:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$\";s:91:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$\";s:85:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1\";s:77:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:65:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]\";s:61:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]\";s:47:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:77:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:53:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]\";s:51:\"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]\";s:38:\"([0-9]{4})/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&cpage=$matches[2]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:9:{i:0;s:74:\"advanced-category-and-custom-taxonomy-image/wp-advanced-taxonomy-image.php\";i:1;s:30:\"advanced-custom-fields/acf.php\";i:2;s:33:\"classic-editor/classic-editor.php\";i:3;s:43:\"custom-post-type-ui/custom-post-type-ui.php\";i:4;s:25:\"fakerpress/fakerpress.php\";i:5;s:25:\"option-tree/ot-loader.php\";i:6;s:75:\"recent-posts-widget-with-thumbnails/recent-posts-widget-with-thumbnails.php\";i:7;s:41:\"wordpress-importer/wordpress-importer.php\";i:8;s:45:\"wp-categories-widget/wp-categories-widget.php\";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', 'a:5:{i:0;s:78:\"/home/startupl/public_html/main/blog/wp-content/themes/srtartuplawyer/home.php\";i:1;s:79:\"/home/startupl/public_html/main/blog/wp-content/themes/srtartuplawyer/style.css\";i:2;s:82:\"/home/startupl/public_html/main/blog/wp-content/themes/srtartuplawyer/footer-y.php\";i:3;s:84:\"/home/startupl/public_html/main/blog/wp-content/themes/srtartuplawyer/footer-woo.php\";i:4;s:87:\"/home/startupl/public_html/main/blog/wp-content/themes/srtartuplawyer/footer-search.php\";}', 'no'),
(40, 'template', 'srtartuplawyer', 'yes'),
(41, 'stylesheet', 'srtartuplawyer', 'yes'),
(42, 'comment_registration', '0', 'yes'),
(43, 'html_type', 'text/html', 'yes'),
(44, 'use_trackback', '0', 'yes'),
(45, 'default_role', 'subscriber', 'yes'),
(46, 'db_version', '51917', 'yes'),
(47, 'uploads_use_yearmonth_folders', '1', 'yes'),
(48, 'upload_path', '', 'yes'),
(49, 'blog_public', '1', 'yes'),
(50, 'default_link_category', '2', 'yes'),
(51, 'show_on_front', 'posts', 'yes'),
(52, 'tag_base', '', 'yes'),
(53, 'show_avatars', '1', 'yes'),
(54, 'avatar_rating', 'G', 'yes'),
(55, 'upload_url_path', '', 'yes'),
(56, 'thumbnail_size_w', '150', 'yes'),
(57, 'thumbnail_size_h', '150', 'yes'),
(58, 'thumbnail_crop', '1', 'yes'),
(59, 'medium_size_w', '300', 'yes'),
(60, 'medium_size_h', '300', 'yes'),
(61, 'avatar_default', 'mystery', 'yes'),
(62, 'large_size_w', '1024', 'yes'),
(63, 'large_size_h', '1024', 'yes'),
(64, 'image_default_link_type', 'none', 'yes'),
(65, 'image_default_size', '', 'yes'),
(66, 'image_default_align', '', 'yes'),
(67, 'close_comments_for_old_posts', '0', 'yes'),
(68, 'close_comments_days_old', '14', 'yes'),
(69, 'thread_comments', '1', 'yes'),
(70, 'thread_comments_depth', '5', 'yes'),
(71, 'page_comments', '0', 'yes'),
(72, 'comments_per_page', '50', 'yes'),
(73, 'default_comments_page', 'newest', 'yes'),
(74, 'comment_order', 'asc', 'yes'),
(75, 'sticky_posts', 'a:0:{}', 'yes'),
(76, 'widget_categories', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(77, 'widget_text', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(78, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'uninstall_plugins', 'a:0:{}', 'no'),
(80, 'timezone_string', '', 'yes'),
(81, 'page_for_posts', '0', 'yes'),
(82, 'page_on_front', '0', 'yes'),
(83, 'default_post_format', '0', 'yes'),
(84, 'link_manager_enabled', '0', 'yes'),
(85, 'finished_splitting_shared_terms', '1', 'yes'),
(86, 'site_icon', '0', 'yes'),
(87, 'medium_large_size_w', '768', 'yes'),
(88, 'medium_large_size_h', '0', 'yes'),
(89, 'wp_page_for_privacy_policy', '3', 'yes'),
(90, 'show_comments_cookies_opt_in', '1', 'yes'),
(91, 'admin_email_lifespan', '1645876095', 'yes'),
(92, 'disallowed_keys', '', 'no'),
(93, 'comment_previously_approved', '1', 'yes'),
(94, 'auto_plugin_theme_update_emails', 'a:0:{}', 'no'),
(95, 'auto_update_core_dev', 'enabled', 'yes'),
(96, 'auto_update_core_minor', 'enabled', 'yes'),
(97, 'auto_update_core_major', 'enabled', 'yes'),
(98, 'wp_force_deactivated_plugins', 'a:0:{}', 'yes'),
(99, 'initial_db_version', '49752', 'yes'),
(100, 'wpsg_user_roles', 'a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:61:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}', 'yes'),
(101, 'fresh_site', '0', 'yes'),
(102, 'widget_block', 'a:9:{i:3;a:1:{s:7:\"content\";s:1833:\"<!-- wp:group -->\n<div class=\"wp-block-group\"><!-- wp:legacy-widget {\"idBase\":\"wpcategorieswidget\",\"instance\":{\"encoded\":\"YTo4OntzOjk6Indjd190aXRsZSI7czoxMzoiV1AgQ2F0ZWdvcmllcyI7czoxNDoid2N3X2hpZGVfdGl0bGUiO3M6MToiMSI7czoxNDoid2N3X3Nob3dfZW1wdHkiO3M6MToiMSI7czoxNDoid2N3X2hpZGVfY2hpbGQiO3M6MToiMSI7czoxNzoid2N3X3RheG9ub215X3R5cGUiO3M6ODoiY2F0ZWdvcnkiO3M6MjM6Indjd19zZWxlY3RlZF9jYXRlZ29yaWVzIjthOjY5OntpOjA7czoyOiIxMCI7aToxO3M6MjoiMTEiO2k6MjtzOjI6IjEyIjtpOjM7czoyOiIxMyI7aTo0O3M6MjoiMTQiO2k6NTtzOjI6IjE1IjtpOjY7czoyOiIxNiI7aTo3O3M6MjoiMTciO2k6ODtzOjI6IjE4IjtpOjk7czoyOiIxOSI7aToxMDtzOjI6IjIwIjtpOjExO3M6MjoiMjEiO2k6MTI7czoyOiIyMiI7aToxMztzOjI6IjY3IjtpOjE0O3M6MjoiNjgiO2k6MTU7czoyOiI2OSI7aToxNjtzOjI6IjcwIjtpOjE3O3M6MjoiNzEiO2k6MTg7czoyOiI3MiI7aToxOTtzOjI6IjczIjtpOjIwO3M6MjoiMjMiO2k6MjE7czoyOiIyNCI7aToyMjtzOjI6IjI1IjtpOjIzO3M6MjoiMjYiO2k6MjQ7czoyOiIyNyI7aToyNTtzOjI6IjI4IjtpOjI2O3M6MjoiMjkiO2k6Mjc7czoyOiIzMCI7aToyODtzOjI6IjMxIjtpOjI5O3M6MjoiMzIiO2k6MzA7czoyOiIzMyI7aTozMTtzOjI6Ijc0IjtpOjMyO3M6MjoiMzQiO2k6MzM7czoxOiIyIjtpOjM0O3M6MjoiMzUiO2k6MzU7czoyOiI3NSI7aTozNjtzOjI6IjM2IjtpOjM3O3M6MjoiMzciO2k6Mzg7czoyOiIzOCI7aTozOTtzOjI6IjM5IjtpOjQwO3M6MjoiNDAiO2k6NDE7czoyOiI0MSI7aTo0MjtzOjE6IjMiO2k6NDM7czoyOiI0MiI7aTo0NDtzOjI6IjQzIjtpOjQ1O3M6MjoiNDQiO2k6NDY7czoyOiI0NSI7aTo0NztzOjI6IjQ2IjtpOjQ4O3M6MjoiNDciO2k6NDk7czoyOiI0OCI7aTo1MDtzOjI6IjQ5IjtpOjUxO3M6MjoiNTAiO2k6NTI7czoyOiI1MSI7aTo1MztzOjI6IjUyIjtpOjU0O3M6MjoiNTMiO2k6NTU7czoyOiI1NCI7aTo1NjtzOjI6IjU1IjtpOjU3O3M6MjoiNTYiO2k6NTg7czoyOiI1NyI7aTo1OTtzOjI6IjU4IjtpOjYwO3M6MjoiNTkiO2k6NjE7czoxOiIxIjtpOjYyO3M6MjoiNjAiO2k6NjM7czoyOiI2MSI7aTo2NDtzOjI6IjYyIjtpOjY1O3M6MjoiNjMiO2k6NjY7czoyOiI2NCI7aTo2NztzOjI6IjY1IjtpOjY4O3M6MjoiNjYiO31zOjE3OiJ3Y3dfYWN0aW9uX29uX2NhdCI7czowOiIiO3M6MTQ6Indjd19oaWRlX2NvdW50IjtzOjA6IiI7fQ==\",\"hash\":\"078f59dbdb488a15e7ee0c2c664ab626\"}} /--></div>\n<!-- /wp:group -->\";}i:4;a:1:{s:7:\"content\";s:1834:\"<!-- wp:group -->\n<div class=\"wp-block-group\"><!-- wp:legacy-widget {\"idBase\":\"recent-posts-widget-with-thumbnails\",\"instance\":{\"encoded\":\"YTo0MTp7czo1OiJ0aXRsZSI7czowOiIiO3M6MTE6ImRlZmF1bHRfdXJsIjtzOjEwNzoiaHR0cHM6Ly9zdGFydHVwbGF3eWVyLmxrL21haW4vYmxvZy93cC1jb250ZW50L3BsdWdpbnMvcmVjZW50LXBvc3RzLXdpZGdldC13aXRoLXRodW1ibmFpbHMvZGVmYXVsdF90aHVtYi5naWYiO3M6MTY6InRodW1iX2RpbWVuc2lvbnMiO3M6NjoiY3VzdG9tIjtzOjEyOiJjYXRlZ29yeV9pZHMiO2E6MTp7aTowO2k6MDt9czo3OiJvcmRlcmJ5IjtzOjQ6ImRhdGUiO3M6NToib3JkZXIiO3M6NDoiZGVzYyI7czoxNDoiZXhjZXJwdF9sZW5ndGgiO2k6NTU7czoxMjoibnVtYmVyX3Bvc3RzIjtpOjE7czoxNzoicG9zdF90aXRsZV9sZW5ndGgiO2k6MTAwMDtzOjEyOiJ0aHVtYl9oZWlnaHQiO2k6NzU7czoxMToidGh1bWJfd2lkdGgiO2k6NzU7czoxNzoiaGlkZV9jdXJyZW50X3Bvc3QiO2I6MDtzOjE3OiJvbmx5X3N0aWNreV9wb3N0cyI7YjowO3M6MTc6ImhpZGVfc3RpY2t5X3Bvc3RzIjtiOjA7czoxMDoiaGlkZV90aXRsZSI7YjowO3M6MTc6ImtlZXBfYXNwZWN0X3JhdGlvIjtiOjA7czoxMToia2VlcF9zdGlja3kiO2I6MDtzOjEyOiJvbmx5XzFzdF9pbWciO2I6MDtzOjEyOiJyYW5kb21fb3JkZXIiO2I6MDtzOjExOiJzaG93X2F1dGhvciI7YjowO3M6MTU6InNob3dfY2F0ZWdvcmllcyI7YjowO3M6MjA6InNob3dfY29tbWVudHNfbnVtYmVyIjtiOjA7czo5OiJzaG93X2RhdGUiO2I6MDtzOjEyOiJzaG93X2V4Y2VycHQiO2I6MDtzOjE0OiJpZ25vcmVfZXhjZXJwdCI7YjowO3M6Mjc6Imlnbm9yZV9wb3N0X2NvbnRlbnRfZXhjZXJwdCI7YjowO3M6MTY6InNldF9tb3JlX2FzX2xpbmsiO2I6MDtzOjExOiJ0cnlfMXN0X2ltZyI7YjowO3M6MTE6InVzZV9kZWZhdWx0IjtiOjA7czoxNjoidXNlX2RlZmF1bHRfb25seSI7YjowO3M6MTU6Im9wZW5fbmV3X3dpbmRvdyI7YjowO3M6MjE6InByaW50X3Bvc3RfY2F0ZWdvcmllcyI7YjowO3M6MTc6InNldF9jYXRzX2FzX2xpbmtzIjtiOjA7czoxNDoidXNlX2lubGluZV9jc3MiO2I6MDtzOjEwOiJ1c2Vfbm9fY3NzIjtiOjA7czoxNDoiaGlkZV9hbHRfdGV4dHMiO2I6MDtzOjEwOiJzaG93X3RodW1iIjtiOjE7czoxMjoiYXV0aG9yX2xhYmVsIjtzOjI6IkJ5IjtzOjEyOiJleGNlcnB0X21vcmUiO3M6NjoiIFvigKZdIjtzOjE0OiJjYXRlZ29yeV9sYWJlbCI7czoyOiJJbiI7czo5OiJ0aHVtYl9hbHQiO3M6MDoiIjt9\",\"hash\":\"4de9e26fe0e487f7597acb25f6110257\"}} /--></div>\n<!-- /wp:group -->\";}i:5;a:1:{s:7:\"content\";s:146:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Archives</h2><!-- /wp:heading --><!-- wp:archives /--></div><!-- /wp:group -->\";}i:6;a:1:{s:7:\"content\";s:150:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Categories</h2><!-- /wp:heading --><!-- wp:categories /--></div><!-- /wp:group -->\";}i:7;a:1:{s:7:\"content\";s:22:\"<!-- wp:tag-cloud /-->\";}i:8;a:1:{s:7:\"content\";s:60:\"<!-- wp:heading -->\n<h2>Categories</h2>\n<!-- /wp:heading -->\";}i:9;a:1:{s:7:\"content\";s:62:\"<!-- wp:heading -->\n<h2>Popular Tags</h2>\n<!-- /wp:heading -->\";}i:10;a:1:{s:7:\"content\";s:61:\"<!-- wp:heading -->\n<h2>Latest Post</h2>\n<!-- /wp:heading -->\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(103, 'sidebars_widgets', 'a:3:{s:19:\"wp_inactive_widgets\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}s:19:\"primary-widget-area\";a:6:{i:0;s:8:\"block-10\";i:1;s:7:\"block-4\";i:2;s:7:\"block-8\";i:3;s:7:\"block-3\";i:4;s:7:\"block-9\";i:5;s:7:\"block-7\";}s:13:\"array_version\";i:3;}', 'yes'),
(104, 'cron', 'a:9:{i:1645984097;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1646005695;a:3:{s:18:\"wp_https_detection\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1646048895;a:1:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1646048962;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1646048963;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1646135295;a:1:{s:30:\"wp_site_health_scheduled_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}i:1646143416;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1893499218;a:1:{s:19:\"publish_future_post\";a:1:{s:32:\"53e45760b4285163a94322f2b432f7d3\";a:2:{s:8:\"schedule\";b:0;s:4:\"args\";a:1:{i:0;i:1153;}}}}s:7:\"version\";i:2;}', 'yes'),
(105, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_archives', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(112, 'widget_meta', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(113, 'widget_search', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(114, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(115, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(116, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(118, 'recovery_keys', 'a:0:{}', 'yes'),
(119, 'theme_mods_twentytwentyone', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1630324590;s:4:\"data\";a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";}s:9:\"sidebar-2\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}}}}', 'yes'),
(120, 'https_detection_errors', 'a:0:{}', 'yes'),
(367, 'cptui_taxonomies', 'a:2:{s:8:\"help_cat\";a:25:{s:4:\"name\";s:8:\"help_cat\";s:5:\"label\";s:13:\"Help Category\";s:14:\"singular_label\";s:8:\"help_cat\";s:11:\"description\";s:0:\"\";s:6:\"public\";s:4:\"true\";s:18:\"publicly_queryable\";s:4:\"true\";s:12:\"hierarchical\";s:5:\"false\";s:7:\"show_ui\";s:4:\"true\";s:12:\"show_in_menu\";s:4:\"true\";s:17:\"show_in_nav_menus\";s:4:\"true\";s:9:\"query_var\";s:4:\"true\";s:14:\"query_var_slug\";s:0:\"\";s:7:\"rewrite\";s:4:\"true\";s:12:\"rewrite_slug\";s:0:\"\";s:17:\"rewrite_withfront\";s:1:\"1\";s:20:\"rewrite_hierarchical\";s:1:\"0\";s:17:\"show_admin_column\";s:5:\"false\";s:12:\"show_in_rest\";s:4:\"true\";s:18:\"show_in_quick_edit\";s:0:\"\";s:9:\"rest_base\";s:0:\"\";s:21:\"rest_controller_class\";s:0:\"\";s:6:\"labels\";a:19:{s:9:\"menu_name\";s:0:\"\";s:9:\"all_items\";s:0:\"\";s:9:\"edit_item\";s:0:\"\";s:9:\"view_item\";s:0:\"\";s:11:\"update_item\";s:0:\"\";s:12:\"add_new_item\";s:0:\"\";s:13:\"new_item_name\";s:0:\"\";s:11:\"parent_item\";s:0:\"\";s:17:\"parent_item_colon\";s:0:\"\";s:12:\"search_items\";s:0:\"\";s:13:\"popular_items\";s:0:\"\";s:26:\"separate_items_with_commas\";s:0:\"\";s:19:\"add_or_remove_items\";s:0:\"\";s:21:\"choose_from_most_used\";s:0:\"\";s:9:\"not_found\";s:0:\"\";s:8:\"no_terms\";s:0:\"\";s:21:\"items_list_navigation\";s:0:\"\";s:10:\"items_list\";s:0:\"\";s:13:\"back_to_items\";s:0:\"\";}s:11:\"meta_box_cb\";s:0:\"\";s:12:\"default_term\";s:0:\"\";s:12:\"object_types\";a:1:{i:0;s:7:\"artical\";}}s:9:\"video_cat\";a:25:{s:4:\"name\";s:9:\"video_cat\";s:5:\"label\";s:15:\"Videos Category\";s:14:\"singular_label\";s:14:\"Video Category\";s:11:\"description\";s:0:\"\";s:6:\"public\";s:4:\"true\";s:18:\"publicly_queryable\";s:4:\"true\";s:12:\"hierarchical\";s:5:\"false\";s:7:\"show_ui\";s:4:\"true\";s:12:\"show_in_menu\";s:4:\"true\";s:17:\"show_in_nav_menus\";s:4:\"true\";s:9:\"query_var\";s:4:\"true\";s:14:\"query_var_slug\";s:0:\"\";s:7:\"rewrite\";s:4:\"true\";s:12:\"rewrite_slug\";s:0:\"\";s:17:\"rewrite_withfront\";s:1:\"1\";s:20:\"rewrite_hierarchical\";s:1:\"0\";s:17:\"show_admin_column\";s:5:\"false\";s:12:\"show_in_rest\";s:4:\"true\";s:18:\"show_in_quick_edit\";s:0:\"\";s:9:\"rest_base\";s:0:\"\";s:21:\"rest_controller_class\";s:0:\"\";s:6:\"labels\";a:19:{s:9:\"menu_name\";s:0:\"\";s:9:\"all_items\";s:0:\"\";s:9:\"edit_item\";s:0:\"\";s:9:\"view_item\";s:0:\"\";s:11:\"update_item\";s:0:\"\";s:12:\"add_new_item\";s:0:\"\";s:13:\"new_item_name\";s:0:\"\";s:11:\"parent_item\";s:0:\"\";s:17:\"parent_item_colon\";s:0:\"\";s:12:\"search_items\";s:0:\"\";s:13:\"popular_items\";s:0:\"\";s:26:\"separate_items_with_commas\";s:0:\"\";s:19:\"add_or_remove_items\";s:0:\"\";s:21:\"choose_from_most_used\";s:0:\"\";s:9:\"not_found\";s:0:\"\";s:8:\"no_terms\";s:0:\"\";s:21:\"items_list_navigation\";s:0:\"\";s:10:\"items_list\";s:0:\"\";s:13:\"back_to_items\";s:0:\"\";}s:11:\"meta_box_cb\";s:0:\"\";s:12:\"default_term\";s:0:\"\";s:12:\"object_types\";a:1:{i:0;s:5:\"video\";}}}', 'yes'),
(1195, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.9.1.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.9.1.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-5.9.1-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-5.9.1-new-bundled.zip\";s:7:\"partial\";s:0:\"\";s:8:\"rollback\";s:0:\"\";}s:7:\"current\";s:5:\"5.9.1\";s:7:\"version\";s:5:\"5.9.1\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.9\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1645970579;s:15:\"version_checked\";s:5:\"5.9.1\";s:12:\"translations\";a:0:{}}', 'no'),
(991, 'can_compress_scripts', '0', 'yes'),
(950, '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1645970580;s:8:\"response\";a:4:{s:30:\"advanced-custom-fields/acf.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:36:\"w.org/plugins/advanced-custom-fields\";s:4:\"slug\";s:22:\"advanced-custom-fields\";s:6:\"plugin\";s:30:\"advanced-custom-fields/acf.php\";s:11:\"new_version\";s:4:\"5.12\";s:3:\"url\";s:53:\"https://wordpress.org/plugins/advanced-custom-fields/\";s:7:\"package\";s:70:\"https://downloads.wordpress.org/plugin/advanced-custom-fields.5.12.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:75:\"https://ps.w.org/advanced-custom-fields/assets/icon-256x256.png?rev=1082746\";s:2:\"1x\";s:75:\"https://ps.w.org/advanced-custom-fields/assets/icon-128x128.png?rev=1082746\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:78:\"https://ps.w.org/advanced-custom-fields/assets/banner-1544x500.jpg?rev=1729099\";s:2:\"1x\";s:77:\"https://ps.w.org/advanced-custom-fields/assets/banner-772x250.jpg?rev=1729102\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.7\";s:6:\"tested\";s:5:\"5.9.1\";s:12:\"requires_php\";s:3:\"5.6\";}s:19:\"akismet/akismet.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:5:\"4.2.2\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/plugin/akismet.4.2.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:59:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272\";s:2:\"1x\";s:59:\"https://ps.w.org/akismet/assets/icon-128x128.png?rev=969272\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:61:\"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"5.0\";s:6:\"tested\";s:5:\"5.9.1\";s:12:\"requires_php\";b:0;}s:43:\"custom-post-type-ui/custom-post-type-ui.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:33:\"w.org/plugins/custom-post-type-ui\";s:4:\"slug\";s:19:\"custom-post-type-ui\";s:6:\"plugin\";s:43:\"custom-post-type-ui/custom-post-type-ui.php\";s:11:\"new_version\";s:6:\"1.10.2\";s:3:\"url\";s:50:\"https://wordpress.org/plugins/custom-post-type-ui/\";s:7:\"package\";s:69:\"https://downloads.wordpress.org/plugin/custom-post-type-ui.1.10.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:72:\"https://ps.w.org/custom-post-type-ui/assets/icon-256x256.png?rev=2549362\";s:2:\"1x\";s:72:\"https://ps.w.org/custom-post-type-ui/assets/icon-128x128.png?rev=2549362\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:75:\"https://ps.w.org/custom-post-type-ui/assets/banner-1544x500.png?rev=2549362\";s:2:\"1x\";s:74:\"https://ps.w.org/custom-post-type-ui/assets/banner-772x250.png?rev=2549362\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"5.5\";s:6:\"tested\";s:5:\"5.9.0\";s:12:\"requires_php\";s:3:\"5.6\";}s:25:\"fakerpress/fakerpress.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:24:\"w.org/plugins/fakerpress\";s:4:\"slug\";s:10:\"fakerpress\";s:6:\"plugin\";s:25:\"fakerpress/fakerpress.php\";s:11:\"new_version\";s:5:\"0.5.2\";s:3:\"url\";s:41:\"https://wordpress.org/plugins/fakerpress/\";s:7:\"package\";s:53:\"https://downloads.wordpress.org/plugin/fakerpress.zip\";s:5:\"icons\";a:3:{s:2:\"2x\";s:63:\"https://ps.w.org/fakerpress/assets/icon-256x256.png?rev=1846090\";s:2:\"1x\";s:55:\"https://ps.w.org/fakerpress/assets/icon.svg?rev=1846090\";s:3:\"svg\";s:55:\"https://ps.w.org/fakerpress/assets/icon.svg?rev=1846090\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:66:\"https://ps.w.org/fakerpress/assets/banner-1544x500.png?rev=1152002\";s:2:\"1x\";s:65:\"https://ps.w.org/fakerpress/assets/banner-772x250.png?rev=1152002\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.7\";s:6:\"tested\";s:5:\"5.9.1\";s:12:\"requires_php\";s:3:\"5.6\";}}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:7:{s:74:\"advanced-category-and-custom-taxonomy-image/wp-advanced-taxonomy-image.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:57:\"w.org/plugins/advanced-category-and-custom-taxonomy-image\";s:4:\"slug\";s:43:\"advanced-category-and-custom-taxonomy-image\";s:6:\"plugin\";s:74:\"advanced-category-and-custom-taxonomy-image/wp-advanced-taxonomy-image.php\";s:11:\"new_version\";s:5:\"1.0.5\";s:3:\"url\";s:74:\"https://wordpress.org/plugins/advanced-category-and-custom-taxonomy-image/\";s:7:\"package\";s:86:\"https://downloads.wordpress.org/plugin/advanced-category-and-custom-taxonomy-image.zip\";s:5:\"icons\";a:1:{s:2:\"1x\";s:96:\"https://ps.w.org/advanced-category-and-custom-taxonomy-image/assets/icon-128x128.png?rev=2048847\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:98:\"https://ps.w.org/advanced-category-and-custom-taxonomy-image/assets/banner-772x250.png?rev=2048847\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:5:\"3.5.0\";}s:33:\"classic-editor/classic-editor.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:28:\"w.org/plugins/classic-editor\";s:4:\"slug\";s:14:\"classic-editor\";s:6:\"plugin\";s:33:\"classic-editor/classic-editor.php\";s:11:\"new_version\";s:5:\"1.6.2\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/classic-editor/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/classic-editor.1.6.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-256x256.png?rev=1998671\";s:2:\"1x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-128x128.png?rev=1998671\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/classic-editor/assets/banner-1544x500.png?rev=1998671\";s:2:\"1x\";s:69:\"https://ps.w.org/classic-editor/assets/banner-772x250.png?rev=1998676\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.9\";}s:9:\"hello.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:25:\"w.org/plugins/hello-dolly\";s:4:\"slug\";s:11:\"hello-dolly\";s:6:\"plugin\";s:9:\"hello.php\";s:11:\"new_version\";s:5:\"1.7.2\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/hello-dolly/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/hello-dolly.1.7.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=2052855\";s:2:\"1x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=2052855\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/hello-dolly/assets/banner-1544x500.jpg?rev=2645582\";s:2:\"1x\";s:66:\"https://ps.w.org/hello-dolly/assets/banner-772x250.jpg?rev=2052855\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.6\";}s:25:\"option-tree/ot-loader.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:25:\"w.org/plugins/option-tree\";s:4:\"slug\";s:11:\"option-tree\";s:6:\"plugin\";s:25:\"option-tree/ot-loader.php\";s:11:\"new_version\";s:5:\"2.7.3\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/option-tree/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/option-tree.2.7.3.zip\";s:5:\"icons\";a:1:{s:7:\"default\";s:62:\"https://s.w.org/plugins/geopattern-icon/option-tree_363534.svg\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:65:\"https://ps.w.org/option-tree/assets/banner-772x250.png?rev=845297\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"3.8\";}s:75:\"recent-posts-widget-with-thumbnails/recent-posts-widget-with-thumbnails.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:49:\"w.org/plugins/recent-posts-widget-with-thumbnails\";s:4:\"slug\";s:35:\"recent-posts-widget-with-thumbnails\";s:6:\"plugin\";s:75:\"recent-posts-widget-with-thumbnails/recent-posts-widget-with-thumbnails.php\";s:11:\"new_version\";s:5:\"7.1.1\";s:3:\"url\";s:66:\"https://wordpress.org/plugins/recent-posts-widget-with-thumbnails/\";s:7:\"package\";s:84:\"https://downloads.wordpress.org/plugin/recent-posts-widget-with-thumbnails.7.1.1.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:88:\"https://ps.w.org/recent-posts-widget-with-thumbnails/assets/icon-256x256.png?rev=2478511\";s:2:\"1x\";s:88:\"https://ps.w.org/recent-posts-widget-with-thumbnails/assets/icon-128x128.png?rev=2478511\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:91:\"https://ps.w.org/recent-posts-widget-with-thumbnails/assets/banner-1544x500.jpg?rev=2480188\";s:2:\"1x\";s:90:\"https://ps.w.org/recent-posts-widget-with-thumbnails/assets/banner-772x250.jpg?rev=2480188\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.6\";}s:41:\"wordpress-importer/wordpress-importer.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:32:\"w.org/plugins/wordpress-importer\";s:4:\"slug\";s:18:\"wordpress-importer\";s:6:\"plugin\";s:41:\"wordpress-importer/wordpress-importer.php\";s:11:\"new_version\";s:3:\"0.7\";s:3:\"url\";s:49:\"https://wordpress.org/plugins/wordpress-importer/\";s:7:\"package\";s:65:\"https://downloads.wordpress.org/plugin/wordpress-importer.0.7.zip\";s:5:\"icons\";a:3:{s:2:\"2x\";s:71:\"https://ps.w.org/wordpress-importer/assets/icon-256x256.png?rev=1908375\";s:2:\"1x\";s:63:\"https://ps.w.org/wordpress-importer/assets/icon.svg?rev=1908375\";s:3:\"svg\";s:63:\"https://ps.w.org/wordpress-importer/assets/icon.svg?rev=1908375\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:72:\"https://ps.w.org/wordpress-importer/assets/banner-772x250.png?rev=547654\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"3.7\";}s:45:\"wp-categories-widget/wp-categories-widget.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:34:\"w.org/plugins/wp-categories-widget\";s:4:\"slug\";s:20:\"wp-categories-widget\";s:6:\"plugin\";s:45:\"wp-categories-widget/wp-categories-widget.php\";s:11:\"new_version\";s:3:\"2.1\";s:3:\"url\";s:51:\"https://wordpress.org/plugins/wp-categories-widget/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/wp-categories-widget.zip\";s:5:\"icons\";a:1:{s:2:\"1x\";s:73:\"https://ps.w.org/wp-categories-widget/assets/icon-128x128.png?rev=1497163\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:75:\"https://ps.w.org/wp-categories-widget/assets/banner-772x250.jpg?rev=2569460\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"5.0\";}}s:7:\"checked\";a:11:{s:74:\"advanced-category-and-custom-taxonomy-image/wp-advanced-taxonomy-image.php\";s:5:\"1.0.5\";s:30:\"advanced-custom-fields/acf.php\";s:6:\"5.10.2\";s:19:\"akismet/akismet.php\";s:6:\"4.1.11\";s:33:\"classic-editor/classic-editor.php\";s:5:\"1.6.2\";s:43:\"custom-post-type-ui/custom-post-type-ui.php\";s:5:\"1.9.2\";s:25:\"fakerpress/fakerpress.php\";s:5:\"0.5.1\";s:9:\"hello.php\";s:5:\"1.7.2\";s:25:\"option-tree/ot-loader.php\";s:5:\"2.7.3\";s:75:\"recent-posts-widget-with-thumbnails/recent-posts-widget-with-thumbnails.php\";s:5:\"7.1.1\";s:41:\"wordpress-importer/wordpress-importer.php\";s:3:\"0.7\";s:45:\"wp-categories-widget/wp-categories-widget.php\";s:3:\"2.1\";}}', 'no'),
(158, 'option_tree_settings', 'a:2:{s:8:\"sections\";a:1:{i:0;a:2:{s:2:\"id\";s:7:\"general\";s:5:\"title\";s:7:\"General\";}}s:8:\"settings\";a:1:{i:0;a:10:{s:2:\"id\";s:11:\"sample_text\";s:5:\"label\";s:23:\"Sample Text Field Label\";s:4:\"desc\";s:38:\"Description for the sample text field.\";s:7:\"section\";s:7:\"general\";s:4:\"type\";s:4:\"text\";s:3:\"std\";s:0:\"\";s:5:\"class\";s:0:\"\";s:4:\"rows\";s:0:\"\";s:9:\"post_type\";s:0:\"\";s:7:\"choices\";a:0:{}}}}', 'yes'),
(159, 'option_tree', 'a:1:{s:11:\"sample_text\";s:0:\"\";}', 'yes'),
(160, 'ot_media_post_ID', '7', 'yes'),
(149, 'finished_updating_comment_type', '1', 'yes'),
(988, 'db_upgraded', '1', 'yes'),
(347, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}', 'yes'),
(318, 'theme_switched_via_customizer', '', 'yes'),
(319, 'customize_stashed_theme_mods', 'a:0:{}', 'no'),
(150, 'current_theme', 'StartupLaywers', 'yes'),
(151, 'theme_mods_srtartuplawyer', 'a:4:{i:0;b:0;s:18:\"nav_menu_locations\";a:2:{s:9:\"main-menu\";i:223;s:9:\"foot-menu\";i:222;}s:18:\"custom_css_post_id\";i:1853;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1630414235;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}s:19:\"primary-widget-area\";a:6:{i:0;s:8:\"block-10\";i:1;s:7:\"block-4\";i:2;s:7:\"block-8\";i:3;s:7:\"block-3\";i:4;s:7:\"block-9\";i:5;s:7:\"block-7\";}}}}', 'yes'),
(152, 'theme_switched', '', 'yes'),
(153, 'recently_activated', 'a:1:{s:27:\"wp-pagenavi/wp-pagenavi.php\";i:1630332429;}', 'yes'),
(359, 'cptui_new_install', 'false', 'yes');
INSERT INTO `wpsg_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(360, 'cptui_post_types', 'a:2:{s:7:\"artical\";a:30:{s:4:\"name\";s:7:\"artical\";s:5:\"label\";s:8:\"Articals\";s:14:\"singular_label\";s:7:\"Artical\";s:11:\"description\";s:0:\"\";s:6:\"public\";s:4:\"true\";s:18:\"publicly_queryable\";s:4:\"true\";s:7:\"show_ui\";s:4:\"true\";s:17:\"show_in_nav_menus\";s:4:\"true\";s:16:\"delete_with_user\";s:5:\"false\";s:12:\"show_in_rest\";s:4:\"true\";s:9:\"rest_base\";s:0:\"\";s:21:\"rest_controller_class\";s:0:\"\";s:11:\"has_archive\";s:5:\"false\";s:18:\"has_archive_string\";s:0:\"\";s:19:\"exclude_from_search\";s:5:\"false\";s:15:\"capability_type\";s:4:\"post\";s:12:\"hierarchical\";s:5:\"false\";s:7:\"rewrite\";s:4:\"true\";s:12:\"rewrite_slug\";s:0:\"\";s:17:\"rewrite_withfront\";s:4:\"true\";s:9:\"query_var\";s:4:\"true\";s:14:\"query_var_slug\";s:0:\"\";s:13:\"menu_position\";s:0:\"\";s:12:\"show_in_menu\";s:4:\"true\";s:19:\"show_in_menu_string\";s:0:\"\";s:9:\"menu_icon\";s:0:\"\";s:8:\"supports\";a:3:{i:0;s:5:\"title\";i:1;s:6:\"editor\";i:2;s:9:\"thumbnail\";}s:10:\"taxonomies\";a:0:{}s:6:\"labels\";a:29:{s:9:\"menu_name\";s:11:\"My Articals\";s:9:\"all_items\";s:12:\"All Articals\";s:7:\"add_new\";s:11:\"Add Artical\";s:12:\"add_new_item\";s:15:\"Add New Artical\";s:9:\"edit_item\";s:12:\"Edit Artical\";s:8:\"new_item\";s:11:\"New Artical\";s:9:\"view_item\";s:12:\"View Artical\";s:10:\"view_items\";s:13:\"View Articals\";s:12:\"search_items\";s:15:\"Search Articals\";s:9:\"not_found\";s:16:\"No Artical found\";s:18:\"not_found_in_trash\";s:0:\"\";s:17:\"parent_item_colon\";s:0:\"\";s:14:\"featured_image\";s:0:\"\";s:18:\"set_featured_image\";s:0:\"\";s:21:\"remove_featured_image\";s:0:\"\";s:18:\"use_featured_image\";s:0:\"\";s:8:\"archives\";s:0:\"\";s:16:\"insert_into_item\";s:0:\"\";s:21:\"uploaded_to_this_item\";s:0:\"\";s:17:\"filter_items_list\";s:0:\"\";s:21:\"items_list_navigation\";s:0:\"\";s:10:\"items_list\";s:0:\"\";s:10:\"attributes\";s:0:\"\";s:14:\"name_admin_bar\";s:0:\"\";s:14:\"item_published\";s:0:\"\";s:24:\"item_published_privately\";s:0:\"\";s:22:\"item_reverted_to_draft\";s:0:\"\";s:14:\"item_scheduled\";s:0:\"\";s:12:\"item_updated\";s:0:\"\";}s:15:\"custom_supports\";s:0:\"\";}s:5:\"video\";a:30:{s:4:\"name\";s:5:\"video\";s:5:\"label\";s:6:\"Videos\";s:14:\"singular_label\";s:5:\"Video\";s:11:\"description\";s:0:\"\";s:6:\"public\";s:4:\"true\";s:18:\"publicly_queryable\";s:4:\"true\";s:7:\"show_ui\";s:4:\"true\";s:17:\"show_in_nav_menus\";s:4:\"true\";s:16:\"delete_with_user\";s:5:\"false\";s:12:\"show_in_rest\";s:4:\"true\";s:9:\"rest_base\";s:0:\"\";s:21:\"rest_controller_class\";s:0:\"\";s:11:\"has_archive\";s:5:\"false\";s:18:\"has_archive_string\";s:0:\"\";s:19:\"exclude_from_search\";s:5:\"false\";s:15:\"capability_type\";s:4:\"post\";s:12:\"hierarchical\";s:5:\"false\";s:7:\"rewrite\";s:4:\"true\";s:12:\"rewrite_slug\";s:0:\"\";s:17:\"rewrite_withfront\";s:4:\"true\";s:9:\"query_var\";s:4:\"true\";s:14:\"query_var_slug\";s:0:\"\";s:13:\"menu_position\";s:0:\"\";s:12:\"show_in_menu\";s:4:\"true\";s:19:\"show_in_menu_string\";s:0:\"\";s:9:\"menu_icon\";s:0:\"\";s:8:\"supports\";a:3:{i:0;s:5:\"title\";i:1;s:6:\"editor\";i:2;s:9:\"thumbnail\";}s:10:\"taxonomies\";a:0:{}s:6:\"labels\";a:29:{s:9:\"menu_name\";s:0:\"\";s:9:\"all_items\";s:0:\"\";s:7:\"add_new\";s:0:\"\";s:12:\"add_new_item\";s:0:\"\";s:9:\"edit_item\";s:0:\"\";s:8:\"new_item\";s:0:\"\";s:9:\"view_item\";s:0:\"\";s:10:\"view_items\";s:0:\"\";s:12:\"search_items\";s:0:\"\";s:9:\"not_found\";s:0:\"\";s:18:\"not_found_in_trash\";s:0:\"\";s:17:\"parent_item_colon\";s:0:\"\";s:14:\"featured_image\";s:0:\"\";s:18:\"set_featured_image\";s:0:\"\";s:21:\"remove_featured_image\";s:0:\"\";s:18:\"use_featured_image\";s:0:\"\";s:8:\"archives\";s:0:\"\";s:16:\"insert_into_item\";s:0:\"\";s:21:\"uploaded_to_this_item\";s:0:\"\";s:17:\"filter_items_list\";s:0:\"\";s:21:\"items_list_navigation\";s:0:\"\";s:10:\"items_list\";s:0:\"\";s:10:\"attributes\";s:0:\"\";s:14:\"name_admin_bar\";s:0:\"\";s:14:\"item_published\";s:0:\"\";s:24:\"item_published_privately\";s:0:\"\";s:22:\"item_reverted_to_draft\";s:0:\"\";s:14:\"item_scheduled\";s:0:\"\";s:12:\"item_updated\";s:0:\"\";}s:15:\"custom_supports\";s:0:\"\";}}', 'yes'),
(179, 'widget_wpcategorieswidget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(866, 'category_children', 'a:0:{}', 'yes'),
(206, 'widget_recent-posts-widget-with-thumbnails', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(475, 'acf_version', '5.10.2', 'yes'),
(487, 'recovery_mode_email_last_sent', '1630678028', 'yes'),
(175, 'theme_mods_twentynineteen', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1630326862;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}s:9:\"sidebar-1\";a:3:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";}}}}', 'yes'),
(395, 'ad_cat_tax_img_basic_settings', 'a:1:{s:18:\"enabled_taxonomies\";a:2:{s:8:\"help_cat\";s:8:\"help_cat\";s:9:\"video_cat\";s:9:\"video_cat\";}}', 'yes'),
(396, 'ad_cat_tax_img_advanced_settings', '', 'yes'),
(189, 'widget_recent-posts', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(188, 'widget_recent-comments', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(240, 'theme_mods_blankslate', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1630415031;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}s:19:\"primary-widget-area\";a:6:{i:0;s:8:\"block-10\";i:1;s:7:\"block-4\";i:2;s:7:\"block-8\";i:3;s:7:\"block-3\";i:4;s:7:\"block-9\";i:5;s:7:\"block-7\";}}}}', 'yes'),
(242, '_site_transient_update_themes', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1645970580;s:7:\"checked\";a:6:{s:10:\"blankslate\";s:4:\"2021\";s:14:\"srtartuplawyer\";s:6:\"2019.1\";s:14:\"twentynineteen\";s:3:\"2.1\";s:12:\"twentytwenty\";s:3:\"1.8\";s:15:\"twentytwentyone\";s:3:\"1.4\";s:15:\"twentytwentytwo\";s:3:\"1.0\";}s:8:\"response\";a:5:{s:10:\"blankslate\";a:6:{s:5:\"theme\";s:10:\"blankslate\";s:11:\"new_version\";i:2022;s:3:\"url\";s:40:\"https://wordpress.org/themes/blankslate/\";s:7:\"package\";s:57:\"https://downloads.wordpress.org/theme/blankslate.2022.zip\";s:8:\"requires\";s:3:\"5.0\";s:12:\"requires_php\";s:3:\"7.0\";}s:14:\"twentynineteen\";a:6:{s:5:\"theme\";s:14:\"twentynineteen\";s:11:\"new_version\";s:3:\"2.2\";s:3:\"url\";s:44:\"https://wordpress.org/themes/twentynineteen/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/theme/twentynineteen.2.2.zip\";s:8:\"requires\";s:5:\"4.9.6\";s:12:\"requires_php\";s:5:\"5.2.4\";}s:12:\"twentytwenty\";a:6:{s:5:\"theme\";s:12:\"twentytwenty\";s:11:\"new_version\";s:3:\"1.9\";s:3:\"url\";s:42:\"https://wordpress.org/themes/twentytwenty/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/theme/twentytwenty.1.9.zip\";s:8:\"requires\";s:3:\"4.7\";s:12:\"requires_php\";s:5:\"5.2.4\";}s:15:\"twentytwentyone\";a:6:{s:5:\"theme\";s:15:\"twentytwentyone\";s:11:\"new_version\";s:3:\"1.5\";s:3:\"url\";s:45:\"https://wordpress.org/themes/twentytwentyone/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/theme/twentytwentyone.1.5.zip\";s:8:\"requires\";s:3:\"5.3\";s:12:\"requires_php\";s:3:\"5.6\";}s:15:\"twentytwentytwo\";a:6:{s:5:\"theme\";s:15:\"twentytwentytwo\";s:11:\"new_version\";s:3:\"1.1\";s:3:\"url\";s:45:\"https://wordpress.org/themes/twentytwentytwo/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/theme/twentytwentytwo.1.1.zip\";s:8:\"requires\";s:3:\"5.9\";s:12:\"requires_php\";s:3:\"5.6\";}}s:9:\"no_update\";a:0:{}s:12:\"translations\";a:0:{}}', 'no'),
(302, '_transient_health-check-site-status-result', '{\"good\":13,\"recommended\":5,\"critical\":1}', 'yes'),
(1216, '_site_transient_timeout_theme_roots', '1645972380', 'no'),
(1217, '_site_transient_theme_roots', 'a:6:{s:10:\"blankslate\";s:7:\"/themes\";s:14:\"srtartuplawyer\";s:7:\"/themes\";s:14:\"twentynineteen\";s:7:\"/themes\";s:12:\"twentytwenty\";s:7:\"/themes\";s:15:\"twentytwentyone\";s:7:\"/themes\";s:15:\"twentytwentytwo\";s:7:\"/themes\";}', 'no'),
(1185, '_site_transient_timeout_php_check_97f83d63b8a66f6e8c057d89a83d8845', '1646141220', 'no'),
(1186, '_site_transient_php_check_97f83d63b8a66f6e8c057d89a83d8845', 'a:5:{s:19:\"recommended_version\";s:3:\"7.4\";s:15:\"minimum_version\";s:6:\"5.6.20\";s:12:\"is_supported\";b:0;s:9:\"is_secure\";b:0;s:13:\"is_acceptable\";b:0;}', 'no'),
(1218, '_transient_timeout_global_styles_srtartuplawyer', '1645970640', 'no'),
(1219, '_transient_global_styles_srtartuplawyer', 'body{--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--duotone--dark-grayscale: url(\'#wp-duotone-dark-grayscale\');--wp--preset--duotone--grayscale: url(\'#wp-duotone-grayscale\');--wp--preset--duotone--purple-yellow: url(\'#wp-duotone-purple-yellow\');--wp--preset--duotone--blue-red: url(\'#wp-duotone-blue-red\');--wp--preset--duotone--midnight: url(\'#wp-duotone-midnight\');--wp--preset--duotone--magenta-yellow: url(\'#wp-duotone-magenta-yellow\');--wp--preset--duotone--purple-green: url(\'#wp-duotone-purple-green\');--wp--preset--duotone--blue-orange: url(\'#wp-duotone-blue-orange\');--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `wpsg_postmeta`
--

CREATE TABLE `wpsg_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wpsg_postmeta`
--

INSERT INTO `wpsg_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default'),
(3, 5, '_edit_last', '1'),
(4, 5, '_wp_page_template', 'home.php'),
(5, 5, '_edit_lock', '1632033947:1'),
(6, 1, '_edit_lock', '1632037224:1'),
(7, 8, '_wp_attached_file', '2021/08/Penguins.jpg'),
(8, 8, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1024;s:6:\"height\";i:768;s:4:\"file\";s:20:\"2021/08/Penguins.jpg\";s:5:\"sizes\";a:2:{s:6:\"medium\";a:4:{s:4:\"file\";s:20:\"Penguins-300x225.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:225;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:20:\"Penguins-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:6:\"Corbis\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:10:\"1203311251\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(9, 1, '_edit_last', '1'),
(10, 1, '_thumbnail_id', '1956'),
(1136, 1161, '_oembed_40c481854bb8ba9dfc980b30fb9a3201', '<iframe title=\"Matt Mullenweg on KTEH &quot;This is Us!&quot;\" width=\"829\" height=\"466\" src=\"https://www.youtube.com/embed/SQEQr7c0-dw?feature=oembed\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(1135, 1161, '_edit_lock', '1632036179:1'),
(185, 1747, '_menu_item_type', 'custom'),
(186, 1747, '_menu_item_menu_item_parent', '0'),
(187, 1747, '_menu_item_object_id', '1747'),
(188, 1747, '_menu_item_object', 'custom'),
(189, 1747, '_menu_item_target', ''),
(190, 1747, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(191, 1747, '_menu_item_xfn', ''),
(192, 1747, '_menu_item_url', 'https://twitter.com/wordpress'),
(193, 1748, '_menu_item_type', 'custom'),
(194, 1748, '_menu_item_menu_item_parent', '0'),
(195, 1748, '_menu_item_object_id', '1748'),
(196, 1748, '_menu_item_object', 'custom'),
(197, 1748, '_menu_item_target', ''),
(198, 1748, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(199, 1748, '_menu_item_xfn', ''),
(200, 1748, '_menu_item_url', 'https://www.facebook.com/WordPress/'),
(201, 1749, '_menu_item_type', 'custom'),
(202, 1749, '_menu_item_menu_item_parent', '0'),
(203, 1749, '_menu_item_object_id', '1749'),
(204, 1749, '_menu_item_object', 'custom'),
(205, 1749, '_menu_item_target', ''),
(206, 1749, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(207, 1749, '_menu_item_xfn', ''),
(208, 1749, '_menu_item_url', 'https://github.com/WordPress/'),
(209, 1750, '_menu_item_type', 'custom'),
(210, 1750, '_menu_item_menu_item_parent', '0'),
(211, 1750, '_menu_item_object_id', '1750'),
(212, 1750, '_menu_item_object', 'custom'),
(213, 1750, '_menu_item_target', ''),
(214, 1750, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(215, 1750, '_menu_item_xfn', ''),
(216, 1750, '_menu_item_url', 'https://www.instagram.com/photomatt/'),
(217, 1751, '_menu_item_type', 'custom'),
(218, 1751, '_menu_item_menu_item_parent', '0'),
(219, 1751, '_menu_item_object_id', '1751'),
(220, 1751, '_menu_item_object', 'custom'),
(221, 1751, '_menu_item_target', ''),
(222, 1751, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(223, 1751, '_menu_item_xfn', ''),
(224, 1751, '_menu_item_url', 'https://www.linkedin.com/company/wordpress/'),
(957, 1906, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(956, 1906, '_menu_item_target', ''),
(955, 1906, '_menu_item_object', 'page'),
(954, 1906, '_menu_item_object_id', '1901'),
(953, 1906, '_menu_item_menu_item_parent', '0'),
(952, 1906, '_menu_item_type', 'post_type'),
(950, 1905, '_menu_item_url', ''),
(949, 1905, '_menu_item_xfn', ''),
(948, 1905, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(947, 1905, '_menu_item_target', ''),
(946, 1905, '_menu_item_object', 'page'),
(861, 1879, '_thumbnail_id', '1851'),
(941, 1903, '_wp_page_template', 'genral.php'),
(928, 1897, '_menu_item_object', 'custom'),
(940, 1903, '_edit_last', '1'),
(939, 1901, '_wp_page_template', 'genral.php'),
(938, 1901, '_edit_lock', '1632034153:1'),
(937, 1901, '_edit_last', '1'),
(936, 1898, '_edit_lock', '1632034280:1'),
(854, 1888, '_thumbnail_id', '1851'),
(853, 1888, '_wp_page_template', 'join.php'),
(851, 1888, '_edit_last', '1'),
(852, 1888, '_edit_lock', '1632034063:1'),
(935, 1898, '_wp_page_template', 'default'),
(934, 1898, '_edit_last', '1'),
(929, 1897, '_menu_item_target', ''),
(896, 1893, '_menu_item_url', ''),
(895, 1893, '_menu_item_xfn', ''),
(841, 1885, '_edit_lock', '1632034104:1'),
(840, 1885, '_wp_page_template', 'default'),
(839, 1885, '_edit_last', '1'),
(884, 1892, '_menu_item_target', ''),
(885, 1892, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(886, 1892, '_menu_item_xfn', ''),
(887, 1892, '_menu_item_url', ''),
(930, 1897, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(889, 1893, '_menu_item_type', 'post_type'),
(890, 1893, '_menu_item_menu_item_parent', '0'),
(891, 1893, '_menu_item_object_id', '1867'),
(892, 1893, '_menu_item_object', 'page'),
(893, 1893, '_menu_item_target', ''),
(894, 1893, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(968, 1907, '_menu_item_url', ''),
(967, 1907, '_menu_item_xfn', ''),
(966, 1907, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(965, 1907, '_menu_item_target', ''),
(964, 1907, '_menu_item_object', 'page'),
(963, 1907, '_menu_item_object_id', '1898'),
(962, 1907, '_menu_item_menu_item_parent', '0'),
(961, 1907, '_menu_item_type', 'post_type'),
(959, 1906, '_menu_item_url', ''),
(958, 1906, '_menu_item_xfn', ''),
(944, 1905, '_menu_item_menu_item_parent', '0'),
(945, 1905, '_menu_item_object_id', '1903'),
(943, 1905, '_menu_item_type', 'post_type'),
(942, 1903, '_edit_lock', '1632034204:1'),
(921, 1896, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(922, 1896, '_menu_item_xfn', ''),
(978, 701, '_edit_lock', '1632033991:1'),
(977, 703, '_edit_lock', '1632033858:1'),
(975, 1896, '_wp_old_date', '2021-09-04'),
(974, 1897, '_wp_old_date', '2021-09-04'),
(973, 1895, '_wp_old_date', '2021-09-04'),
(971, 1893, '_wp_old_date', '2021-09-04'),
(972, 1892, '_wp_old_date', '2021-09-04'),
(970, 1891, '_wp_old_date', '2021-09-04'),
(932, 1897, '_menu_item_url', 'https://startuplawyer.lk/main/blog/'),
(981, 2, '_edit_lock', '1632034228:1'),
(982, 1153, '_edit_lock', '1632034408:1'),
(980, 701, '_wp_page_template', 'default'),
(979, 701, '_edit_last', '1'),
(925, 1897, '_menu_item_type', 'custom'),
(923, 1896, '_menu_item_url', ''),
(761, 1865, 'is_feature', '1'),
(762, 1865, '_is_feature', 'field_61325a719bc31'),
(1143, 1956, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:650;s:6:\"height\";i:488;s:4:\"file\";s:20:\"2021/08/Jayanthi.jpg\";s:5:\"sizes\";a:2:{s:6:\"medium\";a:4:{s:4:\"file\";s:20:\"Jayanthi-300x225.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:225;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:20:\"Jayanthi-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(1142, 1956, '_wp_attached_file', '2021/08/Jayanthi.jpg'),
(1139, 1161, '_thumbnail_id', '1851'),
(472, 1809, '_wp_page_template', 'default'),
(473, 1811, '_wp_page_template', 'default'),
(474, 1813, '_wp_page_template', 'default'),
(760, 1865, '_youtube_video_url', 'field_613228098ef71'),
(759, 1865, 'youtube_video_url', 'https://www.youtube.com/watch?v=MKRGgX5rYbY'),
(758, 1870, '_edit_lock', '1630694207:1'),
(757, 1870, '_edit_last', '1'),
(756, 1867, '_thumbnail_id', '1851'),
(755, 1867, '_wp_page_template', 'videos.php'),
(754, 1867, '_edit_lock', '1632039281:1'),
(753, 1867, '_edit_last', '1'),
(752, 1866, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:900;s:6:\"height\";i:900;s:4:\"file\";s:19:\"2021/08/unnamed.jpg\";s:5:\"sizes\";a:2:{s:6:\"medium\";a:4:{s:4:\"file\";s:19:\"unnamed-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:19:\"unnamed-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(751, 1866, '_wp_attached_file', '2021/08/unnamed.jpg'),
(976, 1898, '_thumbnail_id', '1851'),
(749, 1865, '_edit_lock', '1632038903:1'),
(748, 1865, '_edit_last', '1'),
(747, 1859, '_thumbnail_id', '8'),
(742, 1859, '_edit_lock', '1631014501:1'),
(741, 1859, '_edit_last', '1'),
(800, 1879, '_edit_last', '1'),
(801, 1879, '_wp_page_template', 'benefit.php'),
(802, 1879, '_edit_lock', '1632033897:1'),
(920, 1896, '_menu_item_target', ''),
(919, 1896, '_menu_item_object', 'page'),
(918, 1896, '_menu_item_object_id', '1849'),
(917, 1896, '_menu_item_menu_item_parent', '0'),
(926, 1897, '_menu_item_menu_item_parent', '0'),
(916, 1896, '_menu_item_type', 'post_type'),
(914, 1895, '_menu_item_url', ''),
(913, 1895, '_menu_item_xfn', ''),
(912, 1895, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(911, 1895, '_menu_item_target', ''),
(910, 1895, '_menu_item_object', 'page'),
(909, 1895, '_menu_item_object_id', '1888'),
(908, 1895, '_menu_item_menu_item_parent', '0'),
(907, 1895, '_menu_item_type', 'post_type'),
(927, 1897, '_menu_item_object_id', '1897'),
(875, 1891, '_menu_item_target', ''),
(876, 1891, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(877, 1891, '_menu_item_xfn', ''),
(878, 1891, '_menu_item_url', 'https://startuplawyer.lk/main'),
(931, 1897, '_menu_item_xfn', ''),
(880, 1892, '_menu_item_type', 'post_type'),
(881, 1892, '_menu_item_menu_item_parent', '0'),
(882, 1892, '_menu_item_object_id', '1879'),
(883, 1892, '_menu_item_object', 'page'),
(862, 1890, '_menu_item_type', 'post_type'),
(863, 1890, '_menu_item_menu_item_parent', '0'),
(864, 1890, '_menu_item_object_id', '5'),
(865, 1890, '_menu_item_object', 'page'),
(866, 1890, '_menu_item_target', ''),
(867, 1890, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(868, 1890, '_menu_item_xfn', ''),
(869, 1890, '_menu_item_url', ''),
(870, 1890, '_menu_item_orphaned', '1630771469'),
(871, 1891, '_menu_item_type', 'custom'),
(872, 1891, '_menu_item_menu_item_parent', '0'),
(873, 1891, '_menu_item_object_id', '1891'),
(874, 1891, '_menu_item_object', 'custom'),
(1138, 1161, '_edit_last', '1'),
(1137, 1161, '_oembed_time_40c481854bb8ba9dfc980b30fb9a3201', '1632036295'),
(624, 1161, '_oembed_ba35faabe2fe88ee1ffa66b5e7e19e5e', '<iframe title=\"Matt Mullenweg on KTEH &quot;This is Us!&quot;\" width=\"1778\" height=\"1000\" src=\"https://www.youtube.com/embed/SQEQr7c0-dw?feature=oembed\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(625, 1161, '_oembed_time_ba35faabe2fe88ee1ffa66b5e7e19e5e', '1632036320'),
(708, 1849, '_edit_last', '1'),
(709, 1849, '_wp_page_template', 'help.php'),
(710, 1849, '_edit_lock', '1632034035:1'),
(711, 1849, '_thumbnail_id', '1851'),
(712, 1851, '_wp_attached_file', '2021/09/hero_general.jpg'),
(713, 1851, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1400;s:6:\"height\";i:788;s:4:\"file\";s:24:\"2021/09/hero_general.jpg\";s:5:\"sizes\";a:3:{s:6:\"medium\";a:4:{s:4:\"file\";s:24:\"hero_general-300x169.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:169;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:25:\"hero_general-1024x576.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:576;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:24:\"hero_general-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(1149, 1957, '_edit_lock', '1632036507:1'),
(1148, 1957, '_edit_last', '1'),
(1150, 1958, '_wp_attached_file', '2021/09/cebab310d0de566d1a073d52099b683f-png-400x150another-2.png'),
(1151, 1958, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:400;s:6:\"height\";i:150;s:4:\"file\";s:65:\"2021/09/cebab310d0de566d1a073d52099b683f-png-400x150another-2.png\";s:5:\"sizes\";a:2:{s:6:\"medium\";a:4:{s:4:\"file\";s:65:\"cebab310d0de566d1a073d52099b683f-png-400x150another-2-300x113.png\";s:5:\"width\";i:300;s:6:\"height\";i:113;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:65:\"cebab310d0de566d1a073d52099b683f-png-400x150another-2-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(1152, 1957, '_thumbnail_id', '1958'),
(1156, 1960, '_edit_lock', '1632038854:1'),
(1155, 1960, '_edit_last', '1'),
(1157, 1960, 'youtube_video_url', 'https://youtu.be/PgCliOxl41o'),
(1158, 1960, '_youtube_video_url', 'field_613228098ef71'),
(1159, 1960, 'is_feature', '1'),
(1160, 1960, '_is_feature', 'field_61325a719bc31'),
(1161, 1961, '_edit_last', '1'),
(1162, 1961, '_edit_lock', '1632038895:1'),
(1163, 1961, 'youtube_video_url', 'https://youtu.be/IHaa05GKflU'),
(1164, 1961, '_youtube_video_url', 'field_613228098ef71'),
(1165, 1961, 'is_feature', '1'),
(1166, 1961, '_is_feature', 'field_61325a719bc31'),
(1167, 1962, '_edit_last', '1'),
(1168, 1962, '_edit_lock', '1632038886:1'),
(1169, 1962, 'youtube_video_url', 'https://youtu.be/9UH2rmKpDzE'),
(1170, 1962, '_youtube_video_url', 'field_613228098ef71'),
(1171, 1962, 'is_feature', '1'),
(1172, 1962, '_is_feature', 'field_61325a719bc31'),
(1173, 1963, '_edit_last', '1'),
(1174, 1963, '_edit_lock', '1632038795:1'),
(1175, 1963, 'youtube_video_url', 'https://youtu.be/5OHGpO_1j8o'),
(1176, 1963, '_youtube_video_url', 'field_613228098ef71'),
(1177, 1963, 'is_feature', '1'),
(1178, 1963, '_is_feature', 'field_61325a719bc31'),
(1179, 1964, '_wp_attached_file', '2021/08/Sirimavo.jpg'),
(1180, 1964, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:512;s:6:\"height\";i:393;s:4:\"file\";s:20:\"2021/08/Sirimavo.jpg\";s:5:\"sizes\";a:2:{s:6:\"medium\";a:4:{s:4:\"file\";s:20:\"Sirimavo-300x230.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:230;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:20:\"Sirimavo-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(1181, 1965, '_wp_attached_file', '2021/08/Asha-2.jpg'),
(1182, 1965, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:225;s:6:\"height\";i:225;s:4:\"file\";s:18:\"2021/08/Asha-2.jpg\";s:5:\"sizes\";a:1:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:18:\"Asha-2-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(1183, 1966, '_wp_attached_file', '2021/08/Padmavati.jpg'),
(1184, 1966, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:650;s:6:\"height\";i:400;s:4:\"file\";s:21:\"2021/08/Padmavati.jpg\";s:5:\"sizes\";a:2:{s:6:\"medium\";a:4:{s:4:\"file\";s:21:\"Padmavati-300x185.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:185;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:21:\"Padmavati-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(1185, 1967, '_wp_attached_file', '2021/08/Caroline.jpg'),
(1186, 1967, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:800;s:6:\"height\";i:1200;s:4:\"file\";s:20:\"2021/08/Caroline.jpg\";s:5:\"sizes\";a:3:{s:6:\"medium\";a:4:{s:4:\"file\";s:20:\"Caroline-200x300.jpg\";s:5:\"width\";i:200;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:21:\"Caroline-683x1024.jpg\";s:5:\"width\";i:683;s:6:\"height\";i:1024;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:20:\"Caroline-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');

-- --------------------------------------------------------

--
-- Table structure for table `wpsg_posts`
--

CREATE TABLE `wpsg_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wpsg_posts`
--

INSERT INTO `wpsg_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2021-08-30 11:48:15', '2021-08-30 11:48:15', '<!-- wp:paragraph -->\r\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\r\n<!-- /wp:paragraph -->', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2021-09-19 07:27:18', '2021-09-19 07:27:18', '', 0, 'https://startuplawyer.lk/main/blog/?p=1', 0, 'post', '', 1),
(2, 1, '2021-08-30 11:48:15', '2021-08-30 11:48:15', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"https://startuplawyer.lk/main/blog/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2021-08-30 11:48:15', '2021-08-30 11:48:15', '', 0, 'https://startuplawyer.lk/main/blog/?page_id=2', 0, 'page', '', 0),
(3, 1, '2021-08-30 11:48:15', '2021-08-30 11:48:15', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Our website address is: https://startuplawyer.lk/main/blog.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Comments</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Media</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Cookies</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Embedded content from other websites</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you request a password reset, your IP address will be included in the reset email.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where we send your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph -->', 'Privacy Policy', '', 'draft', 'closed', 'open', '', 'privacy-policy', '', '', '2021-08-30 11:48:15', '2021-08-30 11:48:15', '', 0, 'https://startuplawyer.lk/main/blog/?page_id=3', 0, 'page', '', 0),
(5, 1, '2021-08-30 12:02:34', '2021-08-30 12:02:34', 'Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog\r\n\r\nTest blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog\r\n\r\nTest blog Test blog Test blog Test blog Test blog Test blog Test blog', 'Blog', '', 'publish', 'closed', 'closed', '', 'blog', '', '', '2021-09-19 06:47:57', '2021-09-19 06:47:57', '', 0, 'https://startuplawyer.lk/main/blog/?page_id=5', 0, 'page', '', 0),
(6, 1, '2021-08-30 12:02:34', '2021-08-30 12:02:34', '', 'Blog', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2021-08-30 12:02:34', '2021-08-30 12:02:34', '', 5, 'https://startuplawyer.lk/main/blog/?p=6', 0, 'revision', '', 0),
(7, 1, '2021-08-30 12:07:32', '2021-08-30 12:07:32', '', 'Media', '', 'private', 'closed', 'closed', '', 'media', '', '', '2021-08-30 12:07:32', '2021-08-30 12:07:32', '', 0, 'https://startuplawyer.lk/main/blog/?option-tree=media', 0, 'option-tree', '', 0),
(8, 1, '2021-08-30 12:12:18', '2021-08-30 12:12:18', '', 'Penguins', '', 'inherit', 'open', 'closed', '', 'penguins', '', '', '2021-08-30 12:12:18', '2021-08-30 12:12:18', '', 1, 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Penguins.jpg', 0, 'attachment', 'image/jpeg', 0),
(9, 1, '2021-08-30 12:12:23', '2021-08-30 12:12:23', '<!-- wp:paragraph -->\r\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\r\n<!-- /wp:paragraph -->', 'Hello world!', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2021-08-30 12:12:23', '2021-08-30 12:12:23', '', 1, 'https://startuplawyer.lk/main/blog/?p=9', 0, 'revision', '', 0),
(10, 1, '2021-08-30 12:51:09', '2021-08-30 12:51:09', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Hello world!', '', 'inherit', 'closed', 'closed', '', '1-autosave-v1', '', '', '2021-08-30 12:51:09', '2021-08-30 12:51:09', '', 1, 'https://startuplawyer.lk/main/blog/?p=10', 0, 'revision', '', 0),
(1725, 1, '2010-07-25 19:40:01', '2010-07-26 02:40:01', 'This site is using the standard WordPress Theme Unit Test Data for content. The Theme Unit Test is a series of posts and pages that match up with a checklist on the WordPress codex. You can use the data and checklist together to test your theme. It is recommended that you test your theme with the Theme Unit Test before submitting your theme to the WordPress.org theme directory.\n\n<h2>WordPress Theme Development Resources</h2>\n\n<ol>\n	<li>See <a href=\"https://developer.wordpress.org/themes/\">the WordPress Theme Developer Handbook</a> for examples of best practices.</li>\n	<li>See <a href=\"https://developer.wordpress.org/reference/\">the WordPress Code Reference</a> for more information about WordPress\' functions, classes, methods, and hooks.</li>\n	<li>See <a href=\"https://codex.wordpress.org/Theme_Unit_Test\">Theme Unit Test</a> for a robust test suite for your Theme and get the latest version of the test data you see here.</li>\n	<li>See <a href=\"https://developer.wordpress.org/themes/release/\">Releasing Your Theme</a> for a guide to submitting your Theme to the <a href=\"https://wordpress.org/themes/\">Theme Directory</a>.</li>\n</ol>', 'About The Tests', '', 'publish', 'closed', 'closed', '', 'about', '', '', '2010-07-25 19:40:01', '2010-07-26 02:40:01', '', 0, 'https://wpthemetestdata.wordpress.com/about/', 1, 'page', '', 0),
(146, 1, '2007-09-04 09:52:50', '2007-09-04 16:52:50', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt. Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet, nisi orci ullamcorper massa, et adipiscing orci velit quis magna. Praesent sit amet ligula id orci venenatis auctor. Phasellus porttitor, metus non tincidunt dapibus, orci pede pretium neque, sit amet adipiscing ipsum lectus et libero. Aenean bibendum. Curabitur mattis quam id urna. Vivamus dui. Donec nonummy lacinia lorem. Cras risus arcu, sodales ac, ultrices ac, mollis quis, justo. Sed a libero. Quisque risus erat, posuere at, tristique non, lacinia quis, eros.\n\nCras volutpat, lacus quis semper pharetra, nisi enim dignissim est, et sollicitudin quam ipsum vel mi. Sed commodo urna ac urna. Nullam eu tortor. Curabitur sodales scelerisque magna. Donec ultricies tristique pede. Nullam libero. Nam sollicitudin felis vel metus. Nullam posuere molestie metus. Nullam molestie, nunc id suscipit rhoncus, felis mi vulputate lacus, a ultrices tortor dolor eget augue. Aenean ultricies felis ut turpis. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse placerat tellus ac nulla. Proin adipiscing sem ac risus. Maecenas nisi. Cras semper.\n\nPraesent interdum mollis neque. In egestas nulla eget pede. Integer eu purus sed diam dictum scelerisque. Morbi cursus velit et felis. Maecenas faucibus aliquet erat. In aliquet rhoncus tellus. Integer auctor nibh a nunc fringilla tempus. Cras turpis urna, dignissim vel, suscipit pulvinar, rutrum quis, sem. Ut lobortis convallis dui. Sed nonummy orci a justo. Morbi nec diam eget eros eleifend tincidunt.\n\nՀայերեն\n\nLorem Ipsum-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ:\n\nБългарски\n\nLorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги разбърква, за да напечата с тях книга с примерни шрифтове. Този начин не само е оцелял повече от 5 века, но е навлязъл и в публикуването на електронни издания като е запазен почти без промяна. Популяризиран е през 60те години на 20ти век със издаването на Letraset листи, съдържащи Lorem Ipsum пасажи, популярен е и в наши дни във софтуер за печатни издания като Aldus PageMaker, който включва различни версии на Lorem Ipsum.\n\nCatalà\n\nLorem Ipsum és un text de farciment usat per la indústria de la tipografia i la impremta. Lorem Ipsum ha estat el text estàndard de la indústria des de l\'any 1500, quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogràfiques. No només ha sobreviscut cinc segles, sinó que ha fet el salt cap a la creació de tipus de lletra electrònics, romanent essencialment sense canvis. Es va popularitzar l\'any 1960 amb el llançament de fulls Letraset que contenien passatges de Lorem Ipsum, i més recentment amb programari d\'autoedició com Aldus Pagemaker que inclou versions de Lorem Ipsum.\n\nHrvatski\n\nLorem Ipsum je jednostavno probni tekst koji se koristi u tiskarskoj i slovoslagarskoj industriji. Lorem Ipsum postoji kao industrijski standard još od 16-og stoljeća, kada je nepoznati tiskar uzeo tiskarsku galiju slova i posložio ih da bi napravio knjigu s uzorkom tiska. Taj je tekst ne samo preživio pet stoljeća, već se i vinuo u svijet elektronskog slovoslagarstva, ostajući u suštini nepromijenjen. Postao je popularan tijekom 1960-ih s pojavom Letraset listova s odlomcima Lorem Ipsum-a, a u skorije vrijeme sa software-om za stolno izdavaštvo kao što je Aldus PageMaker koji također sadrži varijante Lorem Ipsum-a.\n\nČesky\n\nLorem Ipsum je demonstrativní výplňový text používaný v tiskařském a knihařském průmyslu. Lorem Ipsum je považováno za standard v této oblasti už od začátku 16. století, kdy dnes neznámý tiskař vzal kusy textu a na jejich základě vytvořil speciální vzorovou knihu. Jeho odkaz nevydržel pouze pět století, on přežil i nástup elektronické sazby v podstatě beze změny. Nejvíce popularizováno bylo Lorem Ipsum v šedesátých letech 20. století, kdy byly vydávány speciální vzorníky s jeho pasážemi a později pak díky počítačovým DTP programům jako Aldus PageMaker.\n\nRomâna\n\nLorem Ipsum este pur şi simplu o machetă pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective. Nu doar că a supravieţuit timp de cinci secole, dar şi a facut saltul în tipografia electronică practic neschimbată. A fost popularizată în anii \'60 odată cu ieşirea colilor Letraset care conţineau pasaje Lorem Ipsum, iar mai recent, prin programele de publicare pentru calculator, ca Aldus PageMaker care includeau versiuni de Lorem Ipsum.\n\nСрпски\n\nLorem Ipsum је једноставно модел текста који се користи у штампарској и словослагачкој индустрији. Lorem ipsum је био стандард за модел текста још од 1500. године, када је непознати штампар узео кутију са словима и сложио их како би направио узорак књиге. Не само што је овај модел опстао пет векова, него је чак почео да се користи и у електронским медијима, непроменивши се. Популаризован је шездесетих година двадесетог века заједно са листовима летерсета који су садржали Lorem Ipsum пасусе, а данас са софтверским пакетом за прелом као што је Aldus PageMaker који је садржао Lorem Ipsum верзије.\n\nΕλληνικά\n\nΤάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός Τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός. Ϊϊϋ, Τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός Τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός. ΤΑΧΙΣΤΗ ΑΛΩΠΗΞ ΒΑΦΗΣ ΨΗΜΕΝΗ ΓΗ, ΔΡΑΣΚΕΛΙΖΕΙ ΥΠΕΡ ΝΩΘΡΟΥ ΚΥΝΟΣ. Τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός Τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός. Ϊϊϋ, Τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός Τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός. ΤΑΧΙΣΤΗ ΑΛΩΠΗΞ ΒΑΦΗΣ ΨΗΜΕΝΗ ΓΗ, ΔΡΑΣΚΕΛΙΖΕΙ ΥΠΕΡ ΝΩΘΡΟΥ ΚΥΝΟΣ.', 'Lorem Ipsum', '', 'publish', 'closed', 'closed', '', 'lorem-ipsum', '', '', '2007-09-04 09:52:50', '2007-09-04 16:52:50', '', 0, 'https://wpthemetestdata.wordpress.com/lorem-ipsum/', 7, 'page', '', 0),
(155, 1, '2007-09-04 10:47:47', '2007-09-04 17:47:47', 'Repository-hosted Themes are required to support display of comments on static Pages as well as on single blog Posts.  This static Page has comments, and these comments should be displayed.\nIf the Theme includes a custom option to prevent static Pages from displaying comments, such option must be disabled (i.e. so that static Pages display comments) by default.\nAlso, verify that this Page does not display taxonomy information (e.g. categories or tags) or time-stamp information (Page publish date/time).', 'Page with comments', '', 'publish', 'open', 'closed', '', 'page-with-comments', '', '', '2007-09-04 10:47:47', '2007-09-04 17:47:47', '', 1725, 'https://wpthemetestdata.wordpress.com/page-with-comments/', 3, 'page', '', 3),
(156, 1, '2007-09-04 10:48:10', '2007-09-04 17:48:10', 'This static Page is set not to allow comments. Verify that the Page does not display a comment list, comment reply links, or comment reply form.\nAlso, verify that the Page does not display a \"comments are closed\" type message. Such messages are not suitable for static Pages, and should only be used on blog Posts.', 'Page with comments disabled', '', 'publish', 'closed', 'closed', '', 'page-with-comments-disabled', '', '', '2007-09-04 10:48:10', '2007-09-04 17:48:10', '', 1725, 'https://wpthemetestdata.wordpress.com/page-with-comments-disabled/', 4, 'page', '', 0),
(172, 1, '2007-12-11 16:23:16', '2007-12-11 06:23:16', 'Level 3 of the reverse hierarchy test.', 'Level 3', '', 'publish', 'closed', 'closed', '', 'level-3', '', '', '2007-12-11 16:23:16', '2007-12-11 06:23:16', '', 173, 'https://wpthemetestdata.wordpress.com/level-3/', 0, 'page', '', 0),
(173, 1, '2007-12-11 16:23:33', '2007-12-11 06:23:33', 'Level 2 of the reverse hierarchy test.', 'Level 2', '', 'publish', 'closed', 'closed', '', 'level-2', '', '', '2007-12-11 16:23:33', '2007-12-11 06:23:33', '', 174, 'https://wpthemetestdata.wordpress.com/level-2/', 0, 'page', '', 0),
(174, 1, '2007-12-11 16:25:40', '2007-12-11 23:25:40', 'Level 1 of the reverse hierarchy test.  This is to make sure the importer correctly assigns parents and children even when the children come first in the export file.', 'Level 1', '', 'publish', 'closed', 'closed', '', 'level-1', '', '', '2007-12-11 16:25:40', '2007-12-11 23:25:40', '', 0, 'https://wpthemetestdata.wordpress.com/level-1/', 5, 'page', '', 0),
(501, 1, '2010-08-01 09:42:26', '2010-08-01 16:42:26', 'The last item in this page\'s content is a thumbnail floated left. There should be page links following it. Make sure any elements after the content are clearing properly.\n\n  The float is cleared when it does not stick out the bottom of the parent container, and when other elements that follow it do not wrap around the floated element.\n\n<img class=\"alignleft size-thumbnail wp-image-827\" title=\"Camera\" src=\"https://wpthemetestdata.files.wordpress.com/2010/08/manhattansummer.jpg?w=150\" alt=\"\" width=\"160\" /> <!--nextpage-->This is the second page', 'Clearing Floats', '', 'publish', 'closed', 'closed', '', 'clearing-floats', '', '', '2010-08-01 09:42:26', '2010-08-01 16:42:26', '', 1725, 'https://wpthemetestdata.wordpress.com/', 2, 'page', '', 0),
(701, 1, '2011-05-20 18:49:43', '2011-05-21 01:49:43', 'Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page\r\n\r\nTest front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page\r\n\r\nTest front page Test front page Test front page Test front page Test front page\r\n\r\nTest front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page', 'Front Page', '', 'publish', 'open', 'closed', '', 'front-page', '', '', '2021-09-19 06:48:48', '2021-09-19 06:48:48', '', 0, 'https://wpthemetestdata.wordpress.com/?page_id=701', 0, 'page', '', 0),
(703, 1, '2011-05-20 18:51:43', '2011-05-21 01:51:43', 'Use this static Page to test the Theme\'s handling of the Blog Posts Index page. If the site is set to display a static Page on the Front Page, and this Page is set to display the Blog Posts Index, then this text should not appear. The title might, so make sure the theme is not supplying a hard-coded title for the Blog Post Index.', 'a Blog page', '', 'publish', 'open', 'closed', '', 'blog-2', '', '', '2011-05-20 18:51:43', '2011-05-21 01:51:43', '', 0, 'https://wpthemetestdata.wordpress.com/?page_id=703', 0, 'page', '', 0),
(1899, 1, '2021-09-04 16:30:48', '2021-09-04 16:30:48', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Terms & Conditions', '', 'inherit', 'closed', 'closed', '', '1898-revision-v1', '', '', '2021-09-04 16:30:48', '2021-09-04 16:30:48', '', 1898, 'https://startuplawyer.lk/main/blog/?p=1899', 0, 'revision', '', 0),
(1898, 1, '2021-09-04 16:30:48', '2021-09-04 16:30:48', '<b>Test T&amp;C </b>Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions\r\n\r\nTest Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions\r\n\r\nTest Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions\r\n\r\nTest Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions\r\n\r\nTest Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions', 'Terms & Conditions', '', 'publish', 'closed', 'closed', '', 'terms-conditions', '', '', '2021-09-19 06:53:37', '2021-09-19 06:53:37', '', 0, 'https://startuplawyer.lk/main/blog/?page_id=1898', 0, 'page', '', 0),
(1897, 1, '2021-09-07 10:52:04', '2021-09-04 16:24:19', '', 'Free Resources', '', 'publish', 'closed', 'closed', '', 'free-resources-2', '', '', '2021-09-07 10:52:04', '2021-09-07 10:52:04', '', 0, 'https://startuplawyer.lk/main/blog/?p=1897', 5, 'nav_menu_item', '', 0),
(1889, 1, '2021-09-04 10:21:13', '2021-09-04 10:21:13', '', 'Join us', '', 'inherit', 'closed', 'closed', '', '1888-revision-v1', '', '', '2021-09-04 10:21:13', '2021-09-04 10:21:13', '', 1888, 'https://startuplawyer.lk/main/blog/?p=1889', 0, 'revision', '', 0),
(1890, 1, '2021-09-04 16:04:29', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2021-09-04 16:04:29', '0000-00-00 00:00:00', '', 0, 'https://startuplawyer.lk/main/blog/?p=1890', 1, 'nav_menu_item', '', 0),
(1888, 1, '2021-09-04 10:21:13', '2021-09-04 10:21:13', 'Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us\r\n\r\nTest join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us', 'Join us', '', 'publish', 'closed', 'closed', '', 'join-us', '', '', '2021-09-19 06:50:01', '2021-09-19 06:50:01', '', 0, 'https://startuplawyer.lk/main/blog/?page_id=1888', 0, 'page', '', 0),
(1891, 1, '2021-09-07 10:52:04', '2021-09-04 16:06:37', '', 'Home', '', 'publish', 'closed', 'closed', '', 'home', '', '', '2021-09-07 10:52:04', '2021-09-07 10:52:04', '', 0, 'https://startuplawyer.lk/main/blog/?p=1891', 1, 'nav_menu_item', '', 0),
(1886, 1, '2021-09-03 18:58:07', '2021-09-03 18:58:07', '', 'Pricing & Plans', '', 'inherit', 'closed', 'closed', '', '1885-revision-v1', '', '', '2021-09-03 18:58:07', '2021-09-03 18:58:07', '', 1885, 'https://startuplawyer.lk/main/blog/?p=1886', 0, 'revision', '', 0),
(1885, 1, '2021-09-03 18:58:07', '2021-09-03 18:58:07', 'Test pricing and plans Test pricing and plans Test pricing and plan\r\n\r\nTest pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans\r\n\r\nTest pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans', 'Pricing & Plans', '', 'publish', 'closed', 'closed', '', 'pricing-plans', '', '', '2021-09-19 06:50:42', '2021-09-19 06:50:42', '', 0, 'https://startuplawyer.lk/main/blog/?page_id=1885', 0, 'page', '', 0),
(1874, 1, '2021-09-03 17:25:39', '2021-09-03 17:25:39', 'a:10:{s:4:\"type\";s:10:\"true_false\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:7:\"message\";s:10:\"Is Feature\";s:13:\"default_value\";i:0;s:2:\"ui\";i:0;s:10:\"ui_on_text\";s:0:\"\";s:11:\"ui_off_text\";s:0:\"\";}', 'Is Feature', 'is_feature', 'publish', 'closed', 'closed', '', 'field_61325a719bc31', '', '', '2021-09-03 17:35:00', '2021-09-03 17:35:00', '', 1870, 'https://startuplawyer.lk/main/blog/?post_type=acf-field&#038;p=1874', 1, 'acf-field', '', 0),
(1896, 1, '2021-09-07 10:52:04', '2021-09-04 16:06:37', ' ', '', '', 'publish', 'closed', 'closed', '', '1896', '', '', '2021-09-07 10:52:04', '2021-09-07 10:52:04', '', 0, 'https://startuplawyer.lk/main/blog/?p=1896', 6, 'nav_menu_item', '', 0),
(1747, 1, '2021-08-30 13:22:13', '2021-08-30 13:22:13', '', 'twitter.com', '', 'publish', 'closed', 'closed', '', 'twitter-com', '', '', '2021-08-30 13:22:13', '2021-08-30 13:22:13', '', 0, 'https://startuplawyer.lk/main/blog/2021/08/30/twitter-com/', 1, 'nav_menu_item', '', 0),
(1748, 1, '2021-08-30 13:22:13', '2021-08-30 13:22:13', '', 'facebook.com', '', 'publish', 'closed', 'closed', '', 'facebook-com', '', '', '2021-08-30 13:22:13', '2021-08-30 13:22:13', '', 0, 'https://startuplawyer.lk/main/blog/2021/08/30/facebook-com/', 2, 'nav_menu_item', '', 0),
(1749, 1, '2021-08-30 13:22:13', '2021-08-30 13:22:13', '', 'github.com', '', 'publish', 'closed', 'closed', '', 'github-com', '', '', '2021-08-30 13:22:13', '2021-08-30 13:22:13', '', 0, 'https://startuplawyer.lk/main/blog/2021/08/30/github-com/', 3, 'nav_menu_item', '', 0),
(1750, 1, '2021-08-30 13:22:13', '2021-08-30 13:22:13', '', 'instagram.com', '', 'publish', 'closed', 'closed', '', 'instagram-com', '', '', '2021-08-30 13:22:13', '2021-08-30 13:22:13', '', 0, 'https://startuplawyer.lk/main/blog/2021/08/30/instagram-com/', 5, 'nav_menu_item', '', 0),
(1751, 1, '2021-08-30 13:22:13', '2021-08-30 13:22:13', '', 'linkedin.com', '', 'publish', 'closed', 'closed', '', 'linkedin-com', '', '', '2021-08-30 13:22:13', '2021-08-30 13:22:13', '', 0, 'https://startuplawyer.lk/main/blog/2021/08/30/linkedin-com/', 4, 'nav_menu_item', '', 0),
(1892, 1, '2021-09-07 10:52:04', '2021-09-04 16:06:37', ' ', '', '', 'publish', 'closed', 'closed', '', '1892', '', '', '2021-09-07 10:52:04', '2021-09-07 10:52:04', '', 0, 'https://startuplawyer.lk/main/blog/?p=1892', 2, 'nav_menu_item', '', 0),
(1893, 1, '2021-09-07 10:52:04', '2021-09-04 16:06:37', '', 'How it works', '', 'publish', 'closed', 'closed', '', 'how-it-works', '', '', '2021-09-07 10:52:04', '2021-09-07 10:52:04', '', 0, 'https://startuplawyer.lk/main/blog/?p=1893', 3, 'nav_menu_item', '', 0),
(1895, 1, '2021-09-07 10:52:04', '2021-09-04 16:06:37', ' ', '', '', 'publish', 'closed', 'closed', '', '1895', '', '', '2021-09-07 10:52:04', '2021-09-07 10:52:04', '', 0, 'https://startuplawyer.lk/main/blog/?p=1895', 4, 'nav_menu_item', '', 0),
(1880, 1, '2021-09-03 18:54:42', '2021-09-03 18:54:42', '', 'Benefits', '', 'inherit', 'closed', 'closed', '', '1879-revision-v1', '', '', '2021-09-03 18:54:42', '2021-09-03 18:54:42', '', 1879, 'https://startuplawyer.lk/main/blog/?p=1880', 0, 'revision', '', 0),
(1879, 1, '2021-09-03 18:54:42', '2021-09-03 18:54:42', 'Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits\r\n\r\nTest benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits\r\n\r\nTest benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits', 'Benefits', '', 'publish', 'closed', 'closed', '', 'benefits', '', '', '2021-09-19 06:47:13', '2021-09-19 06:47:13', '', 0, 'https://startuplawyer.lk/main/blog/?page_id=1879', 0, 'page', '', 0),
(1864, 1, '2021-09-02 13:23:46', '2021-09-02 13:23:46', '', 'srtartuplawyer', '', 'inherit', 'closed', 'closed', '', '1853-revision-v1', '', '', '2021-09-02 13:23:46', '2021-09-02 13:23:46', '', 1853, 'https://startuplawyer.lk/main/blog/?p=1864', 0, 'revision', '', 0),
(1862, 1, '2021-09-02 13:23:18', '2021-09-02 13:23:18', 'a.box_topic img {\n    width: 100px;\n    height: 100px;\n    border-radius: 100%;\n		margin-bottom: 15px;\n}', 'srtartuplawyer', '', 'inherit', 'closed', 'closed', '', '1853-revision-v1', '', '', '2021-09-02 13:23:18', '2021-09-02 13:23:18', '', 1853, 'https://startuplawyer.lk/main/blog/?p=1862', 0, 'revision', '', 0),
(1871, 1, '2021-09-03 13:51:17', '2021-09-03 13:51:17', 'a:7:{s:4:\"type\";s:3:\"url\";s:12:\"instructions\";s:28:\"Please Add YouTube Video URL\";s:8:\"required\";i:1;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";}', 'YouTube Video URL', 'youtube_video_url', 'publish', 'closed', 'closed', '', 'field_613228098ef71', '', '', '2021-09-03 13:51:17', '2021-09-03 13:51:17', '', 1870, 'https://startuplawyer.lk/main/blog/?post_type=acf-field&p=1871', 0, 'acf-field', '', 0),
(1870, 1, '2021-09-03 13:51:17', '2021-09-03 13:51:17', 'a:7:{s:8:\"location\";a:1:{i:0;a:1:{i:0;a:3:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:5:\"video\";}}}s:8:\"position\";s:6:\"normal\";s:5:\"style\";s:7:\"default\";s:15:\"label_placement\";s:3:\"top\";s:21:\"instruction_placement\";s:5:\"label\";s:14:\"hide_on_screen\";s:0:\"\";s:11:\"description\";s:0:\"\";}', 'Custom field for Videos', 'custom-field-for-videos', 'publish', 'closed', 'closed', '', 'group_613227cb733ba', '', '', '2021-09-03 17:35:00', '2021-09-03 17:35:00', '', 0, 'https://startuplawyer.lk/main/blog/?post_type=acf-field-group&#038;p=1870', 0, 'acf-field-group', '', 0),
(1869, 1, '2021-09-02 18:52:43', '2021-09-02 18:52:43', 'Search questions or useful articles', 'Videos', '', 'inherit', 'closed', 'closed', '', '1867-revision-v1', '', '', '2021-09-02 18:52:43', '2021-09-02 18:52:43', '', 1867, 'https://startuplawyer.lk/main/blog/?p=1869', 0, 'revision', '', 0),
(1868, 1, '2021-09-02 18:44:42', '2021-09-02 18:44:42', '', 'Videos', '', 'inherit', 'closed', 'closed', '', '1867-revision-v1', '', '', '2021-09-02 18:44:42', '2021-09-02 18:44:42', '', 1867, 'https://startuplawyer.lk/main/blog/?p=1868', 0, 'revision', '', 0),
(1867, 1, '2021-09-02 18:44:42', '2021-09-02 18:44:42', '<p style=\"text-align: center;\">Watch videos about Special Features, Benefits\r\nand How to Use Startup Lawyer</p>', 'How it Works', '', 'publish', 'closed', 'closed', '', 'videos', '', '', '2021-09-19 08:13:50', '2021-09-19 08:13:50', '', 0, 'https://startuplawyer.lk/main/blog/?page_id=1867', 0, 'page', '', 0),
(733, 1, '2011-06-23 18:38:52', '2011-06-24 01:38:52', 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.', 'Page A', '', 'publish', 'open', 'closed', '', 'page-a', '', '', '2011-06-23 18:38:52', '2011-06-24 01:38:52', '', 0, 'https://wpthemetestdata.wordpress.com/?page_id=733', 10, 'page', '', 0),
(735, 1, '2011-06-23 18:39:14', '2011-06-24 01:39:14', '(lorem ipsum)', 'Page B', '', 'publish', 'open', 'closed', '', 'page-b', '', '', '2011-06-23 18:39:14', '2011-06-24 01:39:14', '', 0, 'https://wpthemetestdata.wordpress.com/?page_id=735', 11, 'page', '', 0),
(742, 1, '2011-06-23 19:03:33', '2011-06-24 02:03:33', '(lorem ipsum)', 'Level 2a', '', 'publish', 'open', 'closed', '', 'level-2a', '', '', '2011-06-23 19:03:33', '2011-06-24 02:03:33', '', 174, 'https://wpthemetestdata.wordpress.com/?page_id=742', 0, 'page', '', 0),
(744, 1, '2011-06-23 19:04:03', '2011-06-24 02:04:03', '(lorem ipsum)', 'Level 2b', '', 'publish', 'open', 'closed', '', 'level-2b', '', '', '2011-06-23 19:04:03', '2011-06-24 02:04:03', '', 174, 'https://wpthemetestdata.wordpress.com/?page_id=744', 0, 'page', '', 0),
(746, 1, '2011-06-23 19:04:24', '2011-06-24 02:04:24', '(lorem ipsum)', 'Level 3a', '', 'publish', 'open', 'closed', '', 'level-3a', '', '', '2011-06-23 19:04:24', '2011-06-24 02:04:24', '', 173, 'https://wpthemetestdata.wordpress.com/?page_id=746', 0, 'page', '', 0),
(748, 1, '2011-06-23 19:04:46', '2011-06-24 02:04:46', '(lorem ipsum)', 'Level 3b', '', 'publish', 'open', 'closed', '', 'level-3b', '', '', '2011-06-23 19:04:46', '2011-06-24 02:04:46', '', 173, 'https://wpthemetestdata.wordpress.com/?page_id=748', 0, 'page', '', 0);
INSERT INTO `wpsg_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1133, 1, '2013-03-15 18:19:23', '2013-03-15 23:19:23', 'Welcome to image alignment! The best way to demonstrate the ebb and flow of the various image positioning options is to nestle them snuggly among an ocean of words. Grab a paddle and let\'s get started.\n\nOn the topic of alignment, it should be noted that users can choose from the options of <em>None</em>, <em>Left</em>, <em>Right, </em>and <em>Center</em>. In addition, they also get the options of <em>Thumbnail</em>, <em>Medium</em>, <em>Large</em> &amp; <em>Fullsize</em>. Be sure to try this page in RTL mode and it should look the same as LTR. \n<p><img class=\"size-full wp-image-906 aligncenter\" title=\"Image Alignment 580x300\" alt=\"Image Alignment 580x300\" src=\"https://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-580x300.jpg\" width=\"580\" height=\"300\" /></p>\nThe image above happens to be <em><strong>centered</strong></em>.\n\n<img class=\"size-full wp-image-904 alignleft\" title=\"Image Alignment 150x150\" alt=\"Image Alignment 150x150\" src=\"https://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-150x150.jpg\" width=\"150\" height=\"150\" /> The rest of this paragraph is filler for the sake of seeing the text wrap around the 150x150 image, which is <em><strong>left aligned</strong></em>. \n\nAs you can see there should be some space above, below, and to the right of the image. The text should not be creeping on the image. Creeping is just not right. Images need breathing room too. Let them speak like you words. Let them do their jobs without any hassle from the text. In about one more sentence here, we\'ll see that the text moves from the right of the image down below the image in seamless transition. Again, letting the do it\'s thang. Mission accomplished!\n\nAnd now for a <em><strong>massively large image</strong></em>. It also has <em><strong>no alignment</strong></em>.\n\n<img class=\"alignnone  wp-image-907\" title=\"Image Alignment 1200x400\" alt=\"Image Alignment 1200x400\" src=\"https://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-1200x4002.jpg\" width=\"1200\" height=\"400\" />\n\nThe image above, though 1200px wide, should not overflow the content area. It should remain contained with no visible disruption to the flow of content.\n\n<img class=\"aligncenter  wp-image-907\" title=\"Image Alignment 1200x400\" alt=\"Image Alignment 1200x400\" src=\"https://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-1200x4002.jpg\" width=\"1200\" height=\"400\" />\n\nAnd we try the large image again, with the center alignment since that sometimes is a problem. The image above, though 1200px wide, should not overflow the content area. It should remain contained with no visible disruption to the flow of content.\n\n<img class=\"size-full wp-image-905 alignright\" title=\"Image Alignment 300x200\" alt=\"Image Alignment 300x200\" src=\"https://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-300x200.jpg\" width=\"300\" height=\"200\" />\n\nAnd now we\'re going to shift things to the <em><strong>right align</strong></em>. Again, there should be plenty of room above, below, and to the left of the image. Just look at him there... Hey guy! Way to rock that right side. I don\'t care what the left aligned image says, you look great. Don\'t let anyone else tell you differently.\n\nIn just a bit here, you should see the text start to wrap below the right aligned image and settle in nicely. There should still be plenty of room and everything should be sitting pretty. Yeah... Just like that. It never felt so good to be right.\n\nAnd just when you thought we were done, we\'re going to do them all over again with captions!\n\n[caption id=\"attachment_906\" align=\"aligncenter\" width=\"580\"]<img class=\"size-full wp-image-906  \" title=\"Image Alignment 580x300\" alt=\"Image Alignment 580x300\" src=\"https://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-580x300.jpg\" width=\"580\" height=\"300\" /> Look at 580x300 getting some <a title=\"Image Settings\" href=\"https://en.support.wordpress.com/images/image-settings/\">caption</a> love.[/caption]\n\nThe image above happens to be <em><strong>centered</strong></em>. The caption also has a link in it, just to see if it does anything funky.\n\n[caption id=\"attachment_904\" align=\"alignleft\" width=\"150\"]<img class=\"size-full wp-image-904  \" title=\"Image Alignment 150x150\" alt=\"Image Alignment 150x150\" src=\"https://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-150x150.jpg\" width=\"150\" height=\"150\" /> Bigger caption than the image usually is.[/caption]\n\nThe rest of this paragraph is filler for the sake of seeing the text wrap around the 150x150 image, which is <em><strong>left aligned</strong></em>. \n\nAs you can see the should be some space above, below, and to the right of the image. The text should not be creeping on the image. Creeping is just not right. Images need breathing room too. Let them speak like you words. Let them do their jobs without any hassle from the text. In about one more sentence here, we\'ll see that the text moves from the right of the image down below the image in seamless transition. Again, letting the do it\'s thang. Mission accomplished!\n\nAnd now for a <em><strong>massively large image</strong></em>. It also has <em><strong>no alignment</strong></em>.\n\n[caption id=\"attachment_907\" align=\"alignnone\" width=\"1200\"]<img class=\" wp-image-907\" title=\"Image Alignment 1200x400\" alt=\"Image Alignment 1200x400\" src=\"https://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-1200x4002.jpg\" width=\"1200\" height=\"400\" /> Comment for massive image for your eyeballs.[/caption]\n\nThe image above, though 1200px wide, should not overflow the content area. It should remain contained with no visible disruption to the flow of content.\n[caption id=\"attachment_907\" align=\"aligncenter\" width=\"1200\"]<img class=\" wp-image-907\" title=\"Image Alignment 1200x400\" alt=\"Image Alignment 1200x400\" src=\"https://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-1200x4002.jpg\" width=\"1200\" height=\"400\" /> This massive image is centered.[/caption]\n\nAnd again with the big image centered. The image above, though 1200px wide, should not overflow the content area. It should remain contained with no visible disruption to the flow of content.\n\n[caption id=\"attachment_905\" align=\"alignright\" width=\"300\"]<img class=\"size-full wp-image-905 \" title=\"Image Alignment 300x200\" alt=\"Image Alignment 300x200\" src=\"https://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-300x200.jpg\" width=\"300\" height=\"200\" /> Feels good to be right all the time.[/caption]\n\nAnd now we\'re going to shift things to the <em><strong>right align</strong></em>. Again, there should be plenty of room above, below, and to the left of the image. Just look at him there... Hey guy! Way to rock that right side. I don\'t care what the left aligned image says, you look great. Don\'t let anyone else tell you differently.\n\nIn just a bit here, you should see the text start to wrap below the right aligned image and settle in nicely. There should still be plenty of room and everything should be sitting pretty. Yeah... Just like that. It never felt so good to be right.\n\nAnd that\'s a wrap, yo! You survived the tumultuous waters of alignment. Image alignment achievement unlocked! Last thing is a small image aligned right. Whatever follows should be unaffected. <img class=\"size-full wp-image-904 alignright\" title=\"Image Alignment 150x150\" alt=\"Image Alignment 150x150\" src=\"https://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-150x150.jpg\" width=\"150\" height=\"150\" />', 'Page Image Alignment', '', 'publish', 'open', 'open', '', 'page-image-alignment', '', '', '2013-03-15 18:19:23', '2013-03-15 23:19:23', '', 1725, 'http://wptest.io/demo/?page_id=1080', 0, 'page', '', 0),
(1134, 1, '2013-03-15 18:20:05', '2013-03-15 23:20:05', '<strong>Headings</strong>\n<h1>Header one</h1>\n<h2>Header two</h2>\n<h3>Header three</h3>\n<h4>Header four</h4>\n<h5>Header five</h5>\n<h6>Header six</h6>\n<h2>Blockquotes</h2>\nSingle line blockquote:\n<blockquote>Stay hungry. Stay foolish.</blockquote>\nMulti line blockquote with a cite reference:\n<blockquote cite=\"https://developer.mozilla.org/en-US/docs/Web/HTML/Element/blockquote\"><p>The <strong>HTML <code>&lt;blockquote&gt;</code> Element</strong> (or <em>HTML Block Quotation Element</em>) indicates that the enclosed text is an extended quotation. Usually, this is rendered visually by indentation (see <a href=\"https://developer.mozilla.org/en-US/docs/HTML/Element/blockquote#Notes\">Notes</a> for how to change it). A URL for the source of the quotation may be given using the <strong>cite</strong> attribute, while a text representation of the source can be given using the <a href=\"https://developer.mozilla.org/en-US/docs/Web/HTML/Element/cite\" title=\"The HTML Citation Element &lt;cite&gt; represents a reference to a creative work. It must include the title of a work or a URL reference, which may be in an abbreviated form according to the conventions used for the addition of citation metadata.\"><code>&lt;cite&gt;</code></a> element.</p></blockquote>\n<cite>multiple contributors</cite> - MDN HTML element reference - blockquote\n<h2>Tables</h2>\n<table>\n<tbody>\n<tr>\n<th>Employee</th>\n<th class=\"views\">Salary</th>\n<th></th>\n</tr>\n<tr class=\"odd\">\n<td><a href=\"http://example.com/\">Jane</a></td>\n<td>$1</td>\n<td>Because that\'s all Steve Jobs needed for a salary.</td>\n</tr>\n<tr class=\"even\">\n<td><a href=\"http://example.com\">John</a></td>\n<td>$100K</td>\n<td>For all the blogging he does.</td>\n</tr>\n<tr class=\"odd\">\n<td><a href=\"http://example.com/\">Jane</a></td>\n<td>$100M</td>\n<td>Pictures are worth a thousand words, right? So Tom x 1,000.</td>\n</tr>\n<tr class=\"even\">\n<td><a href=\"http://example.com/\">Jane</a></td>\n<td>$100B</td>\n<td>With hair like that?! Enough said...</td>\n</tr>\n</tbody>\n</table>\n<h2>Definition Lists</h2>\n<dl><dt>Definition List Title</dt><dd>Definition list division.</dd><dt>Startup</dt><dd>A startup company or startup is a company or temporary organization designed to search for a repeatable and scalable business model.</dd><dt>#dowork</dt><dd>Coined by Rob Dyrdek and his personal body guard Christopher \"Big Black\" Boykins, \"Do Work\" works as a self motivator, to motivating your friends.</dd><dt>Do It Live</dt><dd>I\'ll let Bill O\'Reilly will <a title=\"We\'ll Do It Live\" href=\"https://www.youtube.com/watch?v=O_HyZ5aW76c\">explain</a> this one.</dd></dl>\n<h2>Unordered Lists (Nested)</h2>\n<ul>\n	<li>List item one\n<ul>\n	<li>List item one\n<ul>\n	<li>List item one</li>\n	<li>List item two</li>\n	<li>List item three</li>\n	<li>List item four</li>\n</ul>\n</li>\n	<li>List item two</li>\n	<li>List item three</li>\n	<li>List item four</li>\n</ul>\n</li>\n	<li>List item two</li>\n	<li>List item three</li>\n	<li>List item four</li>\n</ul>\n<h2>Ordered List (Nested)</h2>\n<ol start=\"8\">\n 	<li>List item one -start at 8\n<ol>\n 	<li>List item one\n<ol reversed=\"reversed\">\n 	<li>List item one -reversed attribute</li>\n	<li>List item two</li>\n	<li>List item three</li>\n	<li>List item four</li>\n</ol>\n</li>\n	<li>List item two</li>\n	<li>List item three</li>\n	<li>List item four</li>\n</ol>\n</li>\n	<li>List item two</li>\n	<li>List item three</li>\n	<li>List item four</li>\n</ol>\n<h2>HTML Tags</h2>\nThese supported tags come from the WordPress.com code <a title=\"Code\" href=\"https://en.support.wordpress.com/code/\">FAQ</a>.\n\n<strong>Address Tag</strong>\n\n<address>1 Infinite Loop\nCupertino, CA 95014\nUnited States</address><strong>Anchor Tag (aka. Link)</strong>\n\nThis is an example of a <a title=\"WordPress Foundation\" href=\"https://wordpressfoundation.org/\">link</a>.\n\n<strong>Abbreviation Tag</strong>\n\nThe abbreviation <abbr title=\"Seriously\">srsly</abbr> stands for \"seriously\".\n\n<strong>Acronym Tag (<em>deprecated in HTML5</em>)</strong>\n\nThe acronym <acronym title=\"For The Win\">ftw</acronym> stands for \"for the win\".\n\n<strong>Big Tag</strong> (<em>deprecated in HTML5</em>)\n\nThese tests are a <big>big</big> deal, but this tag is no longer supported in HTML5.\n\n<strong>Cite Tag</strong>\n\n\"Code is poetry.\" --<cite>Automattic</cite>\n\n<strong>Code Tag</strong>\n\nThis tag styles blocks of code.\n<code>.post-title {\n	margin: 0 0 5px;\n	font-weight: bold;\n	font-size: 38px;\n	line-height: 1.2;\n	and here\'s a line of some really, really, really, really long text, just to see how it is handled and to find out how it overflows;\n}</code>\nYou will learn later on in these tests that <code>word-wrap: break-word;</code> will be your best friend.\n\n<strong>Delete Tag</strong>\n\nThis tag will let you <del cite=\"deleted it\">strike out text</del>, but this tag is <em>recommended</em> supported in HTML5 (use the <code>&lt;s&gt;</code> instead).\n\n<strong>Emphasize Tag</strong>\n\nThe emphasize tag should <em>italicize</em> <i>text</i>.\n\n<strong>Horizontal Rule Tag</strong>\n\n<hr />\n\nThis sentence is following a <code>&lt;hr /&gt;</code> tag.\n\n<strong>Insert Tag</strong>\n\nThis tag should denote <ins cite=\"inserted it\">inserted</ins> text.\n\n<strong>Keyboard Tag</strong>\n\nThis scarcely known tag emulates <kbd>keyboard text</kbd>, which is usually styled like the <code>&lt;code&gt;</code> tag.\n\n<strong>Preformatted Tag</strong>\n\nThis tag is for preserving whitespace as typed, such as in poetry or ASCII art.\n<h2>The Road Not Taken</h2>\n<pre>\n <cite>Robert Frost</cite>\n\n\n  Two roads diverged in a yellow wood,\n  And sorry I could not travel both          (\\_/)\n  And be one traveler, long I stood         (=\'.\'=)\n  And looked down one as far as I could     (\")_(\")\n  To where it bent in the undergrowth;\n\n  Then took the other, as just as fair,\n  And having perhaps the better claim,          |\\_/|\n  Because it was grassy and wanted wear;       / @ @ \\\n  Though as for that the passing there        ( &gt; º &lt; )\n  Had worn them really about the same,         `&gt;&gt;x&lt;&lt;´\n                                               /  O  \\\n  And both that morning equally lay\n  In leaves no step had trodden black.\n  Oh, I kept the first for another day!\n  Yet knowing how way leads on to way,\n  I doubted if I should ever come back.\n\n  I shall be telling this with a sigh\n  Somewhere ages and ages hence:\n  Two roads diverged in a wood, and I—\n  I took the one less traveled by,\n  And that has made all the difference.\n\n\n  and here\'s a line of some really, really, really, really long text, just to see how it is handled and to find out how it overflows;\n</pre>\n<strong>Quote Tag</strong> for short, inline quotes\n\n<q>Developers, developers, developers...</q> --Steve Ballmer\n\n<strong>Strike Tag</strong> (<em>deprecated in HTML5</em>) and <strong>S Tag</strong>\n\nThis tag shows <strike>strike-through</strike> <s>text</s>.\n\n<strong>Small Tag</strong>\n\nThis tag shows <small>smaller<small> text.</small></small>\n\n<strong>Strong Tag</strong>\n\nThis tag shows <strong>bold<strong> text.</strong></strong>\n\n<strong>Subscript Tag</strong>\n\nGetting our science styling on with H<sub>2</sub>O, which should push the \"2\" down.\n\n<strong>Superscript Tag</strong>\n\nStill sticking with science and Albert Einstein\'s E = MC<sup>2</sup>, which should lift the 2 up.\n\n<strong>Teletype Tag </strong>(<em>obsolete in HTML5</em>)\n\nThis rarely used tag emulates <tt>teletype text</tt>, which is usually styled like the <code>&lt;code&gt;</code> tag.\n\n<strong>Underline Tag</strong> <em>deprecated in HTML 4, re-introduced in HTML5 with other semantics</em>\n\nThis tag shows <u>underlined text</u>.\n\n<strong>Variable Tag</strong>\n\nThis allows you to denote <var>variables</var>.', 'Page Markup And Formatting', '', 'publish', 'open', 'open', '', 'page-markup-and-formatting', '', '', '2013-03-15 18:20:05', '2013-03-15 23:20:05', '', 1725, 'http://wptest.io/demo/?page_id=1083', 0, 'page', '', 0),
(1153, 1, '2030-01-01 12:00:18', '2030-01-01 19:00:18', 'This post is scheduled to be published in the future.\n\nIt should not be displayed by the theme.', 'Scheduled', '', 'future', 'closed', 'closed', '', 'scheduled', '', '', '2030-01-01 12:00:18', '2030-01-01 19:00:18', '', 0, 'https://wpthemetestdata.wordpress.com/?p=418', 0, 'post', '', 0),
(1161, 1, '2010-06-02 02:00:58', '2010-06-02 09:00:58', 'https://www.youtube.com/watch?v=SQEQr7c0-dw\r\n\r\nLearn more about <a title=\"WordPress Embeds\" href=\"https://codex.wordpress.org/Embeds\" target=\"_blank\" rel=\"noopener\">WordPress Embeds</a>.', 'Post Format: Video (YouTube)', '', 'publish', 'closed', 'closed', '', 'post-format-video-youtube', '', '', '2021-09-19 07:25:15', '2021-09-19 07:25:15', '', 0, 'https://wpthemetestdata.wordpress.com/?p=582', 0, 'post', '', 0),
(1809, 1, '2020-02-14 13:31:00', '2020-02-14 10:31:00', 'Typography tests for Greek Ελληνική σελίδα 1ου επιπέδου και δείγμα τυπογραφίας.\n\n<strong>Headings Επικεφαλίδες</strong>\n<h1>Επικεφαλίδα 1 Header one</h1>\n<h2>Επικεφαλίδα 2 Header two</h2>\n<h3>Επικεφαλίδα 3 Header three</h3>\n<h4>Επικεφαλίδα 2 Header four</h4>\n<h5>Επικεφαλίδα 5 Header five</h5>\n<h6>Επικεφαλίδα 6Header six</h6>\n<h2>Παράθεση άλλου Blockquotes</h2>\nSingle line blockquote: Μια γραμμή\n<blockquote>Πάντα να είναι περίεργος.</blockquote>\nΠολλές γραμμέ με αναφορά Multi line blockquote with a cite reference:\n<blockquote>Το <strong>HTML <code>&lt;blockquote&gt;</code> Element</strong> (ή <em>HTML Block Quotation Element</em>) καταδεικνύει ότι το κείμενο έχει μια παράθεση. Συνήθως οπτικοποιείται με εσοχή (δείτε <a href=\"https://developer.mozilla.org/en-US/docs/HTML/Element/blockquote#Notes\">Σημειώσεις</a> για το πως να το αλλάξετε. Ίσως να δίνεται και URL πηγής με την χρήση του <strong>cite</strong> attribute, μπλα, μπλα <a href=\"https://developer.mozilla.org/en-US/docs/Web/HTML/Element/cite\"><code>&lt;cite&gt;</code></a> .</blockquote>\n<cite>multiple contributors - MDN HTML element reference - blockquote</cite>\n<h2>Πίνακες Tables</h2>\n<table>\n<thead>\n<tr>\n<th>Υπάλληλος Employee</th>\n<th>Μισθός Salary</th>\n<th></th>\n</tr>\n</thead>\n<tbody>\n<tr>\n<th><a href=\"http://example.org/\">Τάδε κάποιος</a></th>\n<td>$1</td>\n<td>Γιατί τόσα χρειάζεται για να ζήσει</td>\n</tr>\n<tr>\n<th><a href=\"http://example.org/\">Jane Doe</a></th>\n<td>$100K</td>\n<td>For all the blogging she does.</td>\n</tr>\n<tr>\n<th><a href=\"http://example.org/\">Fred Bloggs</a></th>\n<td>$100M</td>\n<td>Pictures are worth a thousand words, right? So Jane x 1,000.</td>\n</tr>\n<tr>\n<th><a href=\"http://example.org/\">Jane Bloggs</a></th>\n<td>$100B</td>\n<td>With hair like that?! Enough said...</td>\n</tr>\n</tbody>\n</table>\n<h2>Λίστες Definition Lists</h2>\n<dl>\n 	<dt>Τίτλος λίστας Definition List Title</dt>\n 	<dd>Υποδιαίρεση λίστας Definition list division.</dd>\n</dl>\n<h2>Λίστα με κουκίδες Unordered Lists (Nested)</h2>\n<ul>\n 	<li>Πρώτο στοιχείο List item one\n<ul>\n 	<li>Στοιχείο πρώτο List item one\n<ul>\n 	<li>Στοιχείο λίστα ένα List item one</li>\n 	<li>Στοιχείο λίστας δύο List item two</li>\n</ul>\n</li>\n 	<li>Στοιχείο δεύτερο -item two</li>\n</ul>\n</li>\n 	<li>Στοιχειο δύο List item two</li>\n</ul>\n<h2>Αριθμημένη λίστα(Nested)</h2>\n<ol start=\"8\">\n 	<li>Στοιχειο ξεκινά με 8-start at 8\n<ol>\n 	<li>Στοιχείο λίστας ενα List item one\n<ol>\n 	<li>Στοιχείο λίστας ενα  -reversed attribute</li>\n 	<li>Στοιχείο λίστας δύο</li>\n</ol>\n</li>\n 	<li>Δεύτερο στοιχείο</li>\n</ol>\n</li>\n 	<li>Στοιχείο δύο</li>\n</ol>\n<h2>Ετικέττες HTML Tags</h2>\n<strong>Διεύθυνση Address Tag</strong>\n\n<address>1 Απέραντη διαδρομή Infinite Loop\nΑπλωπολή , ΤΚ 95014\nΕλλάδα</address><strong>Αγκυρωση Anchor Tag (aka. Link)</strong>\n\nΠάραδειγμα <a title=\"WordPress Foundation\" href=\"https://wordpressfoundation.org/\">συνδέσμου</a>.\n\n<strong>Συντομογραφία Abbreviation Tag</strong>\n\nΗ συντομογραφία <abbr title=\"Και τα λοιπά\">κτλ</abbr> σημαίνει \"Και τα λοιπά\".\n\n<strong>Ακρωνύμιο Acronym Tag</strong>\n\nΤο ακρωνύμιο <acronym title=\"Κύριος\">κυρ</acronym> σημαίνει \"Κύριος\".\n\n<strong>Big Tag</strong>\n\nΑυτό είναι <big>μεγάλο</big> θέμα\n\n<strong>Cite Tag</strong>\n\n\"Φάε το φαϊ σου\" --<cite>Όλες οι μαμάδες</cite>\n\n<strong>Code Tag</strong>\n\nThis tag styles blocks of code.\n<code>.post-title {\nmargin: 0 0 5px;\nfont-weight: bold;\nfont-size: 38px;\nline-height: 1.2;\nκαι μία γραμμή με πολύ πάρα πολύ υπερβολικά πάρα πολύ μεγάλο κείμενο που πρέπει να δούμε πως το χειρίζεται η γραμματοσειρά και αν ξεχειλίζει από τις γραμμές και δημιουργεί πρόβλημα;\n}</code>\n\n<strong>Διαγραφή Delete Tag</strong>\n\nΜπορείτε να <del>διαγράφεται κείμενο</del>, αλλά δεν <em>συνιστάται</em>.\n\n<strong>Έμφαση Emphasize Tag</strong>\n\nΘα πρέπει να κάνει <em>ιταλικ italicize το</em> <i>κείμενο</i>.\n\n<strong>Εισαγωγή Insert Tag</strong>\n\nΑυτό το tag υποδηλώνει <ins cite=\"Εισαγωγή inserted it\">εισηγμένο inserted </ins> κείμενο.\n\n<strong>Keyboard Tag</strong>\n\nΑυτό το ελάχιστο γνωστό <kbd>κείμενο πληκτρολογίου keyboard Tag</kbd>, συνήθως μορφοποιείται όμοια με το <code>&lt;κώδικα code&gt;</code> tag.\n\n<strong>Προδιαμορφωμένο Preformatted Tag</strong>\n<h2>Ο Δρόμος που δεν διάλεξα - The Road Not Taken</h2>\n<pre><cite>Robert Frost</cite>\n   Δυο δρόμοι διασταυρώθηκαν σ\' ένα χρυσαφένιο δάσος ,\n   Και προς λύπη μου και τους δυο τα πόδια μου να ταξιδέψουν δεν μπορούσαν\n   Κι επί μακρόν εστάθηκα , καθώς ένας ήμουν ταξιδευτής μονάχος ,\n   κι έστρεψα το βλέμμα μου στον πρώτο όσο να χαθεί στο βάθος\n   μέχρι εκεί που χάνονταν στα άγρια χόρτα που βλαστούσαν.\n\n  Two roads diverged in a yellow wood,\n  And sorry I could not travel both          (\\_/)\n  And be one traveler, long I stood         (=\'.\'=)\n  And looked down one as far as I could     (\")_(\")\n  To where it bent in the undergrowth;\n\n  Then took the other, as just as fair,\n  And having perhaps the better claim,          |\\_/|\n  Because it was grassy and wanted wear;       / @ @ \\\n  Though as for that the passing there        ( &gt; º &lt; )\n  Had worn them really about the same,         `&gt;&gt;x&lt;&lt;´\n                                               /  O  \\\n  And both that morning equally lay\n  In leaves no step had trodden black.\n  Oh, I kept the first for another day!\n  Yet knowing how way leads on to way,\n  I doubted if I should ever come back.\n\n  I shall be telling this with a sigh\n  Somewhere ages and ages hence:\n  Two roads diverged in a wood, and I—\n  I took the one less traveled by,\n  And that has made all the difference.\n\n\n  και μία μακριά, πάρα πολύ μακριά, υπερβολικά μακροσκελής δίχως νόημα πρόταση για να δούμε πως το χειρίζεται το θέμα εμφάνισης και αν αναδιπλώνεται, κρύβεται ή ξεχειλίζει;\n</pre>\n<strong>Quote Tag</strong> for short, inline quotes\n\n<q>Προγραμματιστές, προγραμματιστές, developers...</q> --Steve Ballmer\n\n<strong>Strike Tag</strong> (<em>deprecated in HTML5</em>) and <strong>S Tag</strong>\n\nΑυτή η ετικέτα είναι <span style=\"text-decoration: line-through;\">με διαγράμμιση strike-through</span> <s>κείμενο text</s>.\n\n<strong>Μικρά Small Tag</strong>\n\nΑυτή η ετικέτα είναι <small>μικρότερο smaller<small> κείμενο text.</small></small>\n\n<strong>Strong Tag</strong>\n\nΑυτή η ετικέτα δείχνει <strong> έντονο bold<strong> κείμενο text.</strong></strong>\n\n<strong>Subscript Tag</strong>\n\nGetting our science styling on with H<sub>2 δύο</sub>O, which should push the \"2\" down.\n\n<strong>Superscript Tag</strong>\n\nStill sticking with science and Albert Einstein\'s E = MC<sup>2 δύο</sup>, which should lift the 2 up.\n\n<strong>Teletype Tag </strong>(<em>obsolete in HTML5</em>)\n\nΑυτή η ετικέτα δείχνει <tt>τυλετυπος teletype κείμενο</tt>, which is usually styled like the <code>&lt;κώδικα code&gt;</code> tag.\n\n<strong>Underline Tag</strong> <em>deprecated in HTML 4, re-introduced in HTML5 with other semantics</em>\n\nΑυτή η ετικέτα δείχνει <u>υπογράμμιση underlined text</u>.\n\n<strong>Variable Tag</strong>\n\nΑυτή η ετικέτα δείχνει <var>παράμετροι variables</var>.', 'Ελληνικά-Greek', '', 'publish', 'closed', 'closed', '', 'greek', '', '', '2020-02-14 13:31:00', '2020-02-14 10:31:00', '', 0, 'https://wpthemetestdata.wordpress.com/?page_id=1809', 0, 'page', '', 0),
(1811, 1, '2020-02-14 13:31:47', '2020-02-14 10:31:47', 'Σελίδα 2ου επιπέδου - Second level page\n', 'Επίπεδο 2 -Second Greek level', '', 'publish', 'closed', 'closed', '', '%ce%b5%cf%80%ce%af%cf%80%ce%b5%ce%b4%ce%bf-2', '', '', '2020-02-14 13:31:47', '2020-02-14 10:31:47', '', 1809, 'https://wpthemetestdata.wordpress.com/?page_id=1811', 0, 'page', '', 0),
(1813, 1, '2020-02-14 13:32:50', '2020-02-14 10:32:50', '', 'Επίπεδο 3', '', 'publish', 'closed', 'closed', '', '%ce%b5%cf%80%ce%af%cf%80%ce%b5%ce%b4%ce%bf-3', '', '', '2020-02-14 13:32:50', '2020-02-14 10:32:50', '', 1811, 'https://wpthemetestdata.wordpress.com/?page_id=1813', 0, 'page', '', 0),
(1859, 1, '2021-09-02 12:55:47', '2021-09-02 12:55:47', 'this is test content of Artical', 'this is title', '', 'publish', 'closed', 'closed', '', 'this-is-title', '', '', '2021-09-02 13:36:39', '2021-09-02 13:36:39', '', 0, 'https://startuplawyer.lk/main/blog/?post_type=artical&#038;p=1859', 0, 'artical', '', 0),
(1856, 1, '2021-09-02 11:05:42', '2021-09-02 11:05:42', 'div#helpzx nav.main-menu {\n    display: block;\n    width: 100%;\n    position: absolute;\n}\ndiv#helpzx nav.main-menu {\n    width: 100%;\n    position: absolute;\n}', 'srtartuplawyer', '', 'inherit', 'closed', 'closed', '', '1853-revision-v1', '', '', '2021-09-02 11:05:42', '2021-09-02 11:05:42', '', 1853, 'https://startuplawyer.lk/main/blog/?p=1856', 0, 'revision', '', 0),
(1858, 1, '2021-09-02 11:37:39', '2021-09-02 11:37:39', '', 'srtartuplawyer', '', 'inherit', 'closed', 'closed', '', '1853-revision-v1', '', '', '2021-09-02 11:37:39', '2021-09-02 11:37:39', '', 1853, 'https://startuplawyer.lk/main/blog/?p=1858', 0, 'revision', '', 0),
(1866, 1, '2021-09-02 18:06:24', '2021-09-02 18:06:24', '', 'unnamed', '', 'inherit', 'open', 'closed', '', 'unnamed', '', '', '2021-09-02 18:06:24', '2021-09-02 18:06:24', '', 7, 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/unnamed.jpg', 0, 'attachment', 'image/jpeg', 0),
(1865, 1, '2021-09-02 17:53:01', '2021-09-02 17:53:01', 'Here is Adding content form Videos post', 'Adding Video', '', 'publish', 'closed', 'closed', '', 'adding-video', '', '', '2021-09-19 08:10:20', '2021-09-19 08:10:20', '', 0, 'https://startuplawyer.lk/main/blog/?post_type=video&#038;p=1865', 0, 'video', '', 0),
(1849, 1, '2021-09-02 10:03:47', '2021-09-02 10:03:47', 'Test Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help\r\n\r\nTest help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help\r\n\r\nhelp Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help\r\n\r\nTest help', 'Help', '', 'publish', 'closed', 'closed', '', 'help', '', '', '2021-09-19 06:49:30', '2021-09-19 06:49:30', '', 0, 'https://startuplawyer.lk/main/blog/?page_id=1849', 0, 'page', '', 0),
(1850, 1, '2021-09-02 10:03:47', '2021-09-02 10:03:47', '', 'Help', '', 'inherit', 'closed', 'closed', '', '1849-revision-v1', '', '', '2021-09-02 10:03:47', '2021-09-02 10:03:47', '', 1849, 'https://startuplawyer.lk/main/blog/?p=1850', 0, 'revision', '', 0),
(1851, 1, '2021-09-02 10:36:10', '2021-09-02 10:36:10', '', 'hero_general', '', 'inherit', 'open', 'closed', '', 'hero_general', '', '', '2021-09-02 10:36:10', '2021-09-02 10:36:10', '', 1849, 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/09/hero_general.jpg', 0, 'attachment', 'image/jpeg', 0),
(1853, 1, '2021-09-02 11:00:45', '2021-09-02 11:00:45', '', 'srtartuplawyer', '', 'publish', 'closed', 'closed', '', 'srtartuplawyer', '', '', '2021-09-02 13:23:46', '2021-09-02 13:23:46', '', 0, 'https://startuplawyer.lk/main/blog/2021/09/02/srtartuplawyer/', 0, 'custom_css', '', 0),
(1854, 1, '2021-09-02 11:00:45', '2021-09-02 11:00:45', 'div#helpzx nav.main-menu {\n    display: block;\n    width: 100%;\n    position: absolute;\n}', 'srtartuplawyer', '', 'inherit', 'closed', 'closed', '', '1853-revision-v1', '', '', '2021-09-02 11:00:45', '2021-09-02 11:00:45', '', 1853, 'https://startuplawyer.lk/main/blog/?p=1854', 0, 'revision', '', 0),
(1900, 1, '2021-09-04 16:31:01', '2021-09-04 16:31:01', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Terms & Conditions', '', 'inherit', 'closed', 'closed', '', '1898-autosave-v1', '', '', '2021-09-04 16:31:01', '2021-09-04 16:31:01', '', 1898, 'https://startuplawyer.lk/main/blog/?p=1900', 0, 'revision', '', 0),
(1901, 1, '2021-09-04 16:32:39', '2021-09-04 16:32:39', '<b>Test privacy and security  </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security\r\n\r\n<b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security', 'Privacy & Security', '', 'publish', 'closed', 'closed', '', 'privacy-security', '', '', '2021-09-19 06:51:31', '2021-09-19 06:51:31', '', 0, 'https://startuplawyer.lk/main/blog/?page_id=1901', 0, 'page', '', 0),
(1902, 1, '2021-09-04 16:32:39', '2021-09-04 16:32:39', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Privacy & Security', '', 'inherit', 'closed', 'closed', '', '1901-revision-v1', '', '', '2021-09-04 16:32:39', '2021-09-04 16:32:39', '', 1901, 'https://startuplawyer.lk/main/blog/?p=1902', 0, 'revision', '', 0),
(1903, 1, '2021-09-04 16:33:20', '2021-09-04 16:33:20', '<b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy\r\n\r\n<b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy\r\n\r\n<b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy', 'Refund Policy', '', 'publish', 'closed', 'closed', '', 'refund-policy', '', '', '2021-09-19 06:52:22', '2021-09-19 06:52:22', '', 0, 'https://startuplawyer.lk/main/blog/?page_id=1903', 0, 'page', '', 0),
(1904, 1, '2021-09-04 16:33:20', '2021-09-04 16:33:20', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Refund Policy', '', 'inherit', 'closed', 'closed', '', '1903-revision-v1', '', '', '2021-09-04 16:33:20', '2021-09-04 16:33:20', '', 1903, 'https://startuplawyer.lk/main/blog/?p=1904', 0, 'revision', '', 0),
(1905, 1, '2021-09-04 16:34:07', '2021-09-04 16:34:07', ' ', '', '', 'publish', 'closed', 'closed', '', '1905', '', '', '2021-09-04 16:34:07', '2021-09-04 16:34:07', '', 0, 'https://startuplawyer.lk/main/blog/?p=1905', 3, 'nav_menu_item', '', 0),
(1906, 1, '2021-09-04 16:34:07', '2021-09-04 16:34:07', ' ', '', '', 'publish', 'closed', 'closed', '', '1906', '', '', '2021-09-04 16:34:07', '2021-09-04 16:34:07', '', 0, 'https://startuplawyer.lk/main/blog/?p=1906', 2, 'nav_menu_item', '', 0),
(1907, 1, '2021-09-04 16:34:07', '2021-09-04 16:34:07', ' ', '', '', 'publish', 'closed', 'closed', '', '1907', '', '', '2021-09-04 16:34:07', '2021-09-04 16:34:07', '', 0, 'https://startuplawyer.lk/main/blog/?p=1907', 1, 'nav_menu_item', '', 0),
(1911, 1, '2021-09-19 06:47:13', '2021-09-19 06:47:13', 'Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits\r\n\r\nTest benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits\r\n\r\nTest benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits Test benefits', 'Benefits', '', 'inherit', 'closed', 'closed', '', '1879-revision-v1', '', '', '2021-09-19 06:47:13', '2021-09-19 06:47:13', '', 1879, 'https://startuplawyer.lk/main/blog/?p=1911', 0, 'revision', '', 0),
(1912, 1, '2021-09-19 06:47:57', '2021-09-19 06:47:57', 'Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog\r\n\r\nTest blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog Test blog\r\n\r\nTest blog Test blog Test blog Test blog Test blog Test blog Test blog', 'Blog', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2021-09-19 06:47:57', '2021-09-19 06:47:57', '', 5, 'https://startuplawyer.lk/main/blog/?p=1912', 0, 'revision', '', 0),
(1913, 1, '2021-09-19 06:48:48', '2021-09-19 06:48:48', 'Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page\r\n\r\nTest front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page\r\n\r\nTest front page Test front page Test front page Test front page Test front page\r\n\r\nTest front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page Test front page', 'Front Page', '', 'inherit', 'closed', 'closed', '', '701-revision-v1', '', '', '2021-09-19 06:48:48', '2021-09-19 06:48:48', '', 701, 'https://startuplawyer.lk/main/blog/?p=1913', 0, 'revision', '', 0),
(1914, 1, '2021-09-19 06:49:30', '2021-09-19 06:49:30', 'Test Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help\r\n\r\nTest help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help\r\n\r\nhelp Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help Test help\r\n\r\nTest help', 'Help', '', 'inherit', 'closed', 'closed', '', '1849-revision-v1', '', '', '2021-09-19 06:49:30', '2021-09-19 06:49:30', '', 1849, 'https://startuplawyer.lk/main/blog/?p=1914', 0, 'revision', '', 0),
(1915, 1, '2021-09-19 06:50:01', '2021-09-19 06:50:01', 'Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us\r\n\r\nTest join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us Test join us', 'Join us', '', 'inherit', 'closed', 'closed', '', '1888-revision-v1', '', '', '2021-09-19 06:50:01', '2021-09-19 06:50:01', '', 1888, 'https://startuplawyer.lk/main/blog/?p=1915', 0, 'revision', '', 0),
(1916, 1, '2021-09-19 06:50:42', '2021-09-19 06:50:42', 'Test pricing and plans Test pricing and plans Test pricing and plan\r\n\r\nTest pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans\r\n\r\nTest pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans Test pricing and plans', 'Pricing & Plans', '', 'inherit', 'closed', 'closed', '', '1885-revision-v1', '', '', '2021-09-19 06:50:42', '2021-09-19 06:50:42', '', 1885, 'https://startuplawyer.lk/main/blog/?p=1916', 0, 'revision', '', 0),
(1917, 1, '2021-09-19 06:51:31', '2021-09-19 06:51:31', '<b>Test privacy and security  </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security\r\n\r\n<b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security <b> </b>Test privacy and security', 'Privacy & Security', '', 'inherit', 'closed', 'closed', '', '1901-revision-v1', '', '', '2021-09-19 06:51:31', '2021-09-19 06:51:31', '', 1901, 'https://startuplawyer.lk/main/blog/?p=1917', 0, 'revision', '', 0),
(1918, 1, '2021-09-19 06:52:22', '2021-09-19 06:52:22', '<b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy\r\n\r\n<b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy\r\n\r\n<b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy <b> </b>Test refund policy', 'Refund Policy', '', 'inherit', 'closed', 'closed', '', '1903-revision-v1', '', '', '2021-09-19 06:52:22', '2021-09-19 06:52:22', '', 1903, 'https://startuplawyer.lk/main/blog/?p=1918', 0, 'revision', '', 0);
INSERT INTO `wpsg_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1919, 1, '2021-09-19 06:53:37', '2021-09-19 06:53:37', '<b>Test T&amp;C </b>Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions\r\n\r\nTest Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions\r\n\r\nTest Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions\r\n\r\nTest Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions\r\n\r\nTest Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions Test Terms &amp; Conditions', 'Terms & Conditions', '', 'inherit', 'closed', 'closed', '', '1898-revision-v1', '', '', '2021-09-19 06:53:37', '2021-09-19 06:53:37', '', 1898, 'https://startuplawyer.lk/main/blog/?p=1919', 0, 'revision', '', 0),
(1969, 1, '2021-09-19 08:13:50', '2021-09-19 08:13:50', '<p style=\"text-align: center;\">Watch videos about Special Features, Benefits\r\nand How to Use Startup Lawyer</p>', 'How it Works', '', 'inherit', 'closed', 'closed', '', '1867-revision-v1', '', '', '2021-09-19 08:13:50', '2021-09-19 08:13:50', '', 1867, 'https://startuplawyer.lk/main/blog/?p=1969', 0, 'revision', '', 0),
(1920, 1, '2021-09-19 06:54:19', '2021-09-19 06:54:19', 'Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos Test videos', 'Videos', '', 'inherit', 'closed', 'closed', '', '1867-revision-v1', '', '', '2021-09-19 06:54:19', '2021-09-19 06:54:19', '', 1867, 'https://startuplawyer.lk/main/blog/?p=1920', 0, 'revision', '', 0),
(1955, 1, '2021-09-19 07:25:15', '2021-09-19 07:25:15', 'https://www.youtube.com/watch?v=SQEQr7c0-dw\r\n\r\nLearn more about <a title=\"WordPress Embeds\" href=\"https://codex.wordpress.org/Embeds\" target=\"_blank\" rel=\"noopener\">WordPress Embeds</a>.', 'Post Format: Video (YouTube)', '', 'inherit', 'closed', 'closed', '', '1161-revision-v1', '', '', '2021-09-19 07:25:15', '2021-09-19 07:25:15', '', 1161, 'https://startuplawyer.lk/main/blog/?p=1955', 0, 'revision', '', 0),
(1956, 1, '2021-09-19 07:26:05', '2021-09-19 07:26:05', '', 'Jayanthi', '', 'inherit', 'open', 'closed', '', 'jayanthi', '', '', '2021-09-19 07:26:05', '2021-09-19 07:26:05', '', 1, 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Jayanthi.jpg', 0, 'attachment', 'image/jpeg', 0),
(1957, 1, '2021-09-19 07:30:42', '2021-09-19 07:30:42', 'Test brand new post', 'Brand New Post', '', 'publish', 'open', 'open', '', 'brand-new-post', '', '', '2021-09-19 07:30:42', '2021-09-19 07:30:42', '', 0, 'https://startuplawyer.lk/main/blog/?p=1957', 0, 'post', '', 0),
(1958, 1, '2021-09-19 07:30:31', '2021-09-19 07:30:31', '', 'cebab310d0de566d1a073d52099b683f-png-400x150another (2)', '', 'inherit', 'open', 'closed', '', 'cebab310d0de566d1a073d52099b683f-png-400x150another-2', '', '', '2021-09-19 07:30:31', '2021-09-19 07:30:31', '', 1957, 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/09/cebab310d0de566d1a073d52099b683f-png-400x150another-2.png', 0, 'attachment', 'image/png', 0),
(1959, 1, '2021-09-19 07:30:42', '2021-09-19 07:30:42', 'Test brand new post', 'Brand New Post', '', 'inherit', 'closed', 'closed', '', '1957-revision-v1', '', '', '2021-09-19 07:30:42', '2021-09-19 07:30:42', '', 1957, 'https://startuplawyer.lk/main/blog/?p=1959', 0, 'revision', '', 0),
(1960, 1, '2021-09-19 07:52:19', '2021-09-19 07:52:19', 'New video body content New video body contentNew video body content', 'This is a new video heading', '', 'publish', 'closed', 'closed', '', 'this-is-a-new-video', '', '', '2021-09-19 08:09:53', '2021-09-19 08:09:53', '', 0, 'https://startuplawyer.lk/main/blog/?post_type=video&#038;p=1960', 0, 'video', '', 0),
(1961, 1, '2021-09-19 08:02:36', '2021-09-19 08:02:36', '', 'Endorsements', '', 'publish', 'closed', 'closed', '', 'endorsements', '', '', '2021-09-19 08:09:31', '2021-09-19 08:09:31', '', 0, 'https://startuplawyer.lk/main/blog/?post_type=video&#038;p=1961', 0, 'video', '', 0),
(1962, 1, '2021-09-19 08:04:40', '2021-09-19 08:04:40', '', 'Special Features for Lawyers', '', 'publish', 'closed', 'closed', '', 'special-features-for-lawyers', '', '', '2021-09-19 08:09:12', '2021-09-19 08:09:12', '', 0, 'https://startuplawyer.lk/main/blog/?post_type=video&#038;p=1962', 0, 'video', '', 0),
(1963, 1, '2021-09-19 08:06:10', '2021-09-19 08:06:10', 'B', 'Benefits for Startups', '', 'publish', 'closed', 'closed', '', 'benefits-for-startups', '', '', '2021-09-19 08:06:10', '2021-09-19 08:06:10', '', 0, 'https://startuplawyer.lk/main/blog/?post_type=video&#038;p=1963', 0, 'video', '', 0),
(1964, 1, '2021-09-19 08:06:51', '2021-09-19 08:06:51', '', 'Sirimavo', '', 'inherit', 'open', 'closed', '', 'sirimavo', '', '', '2021-09-19 08:06:51', '2021-09-19 08:06:51', '', 7, 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Sirimavo.jpg', 0, 'attachment', 'image/jpeg', 0),
(1965, 1, '2021-09-19 08:07:29', '2021-09-19 08:07:29', '', 'Asha 2', '', 'inherit', 'open', 'closed', '', 'asha-2', '', '', '2021-09-19 08:07:29', '2021-09-19 08:07:29', '', 7, 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Asha-2.jpg', 0, 'attachment', 'image/jpeg', 0),
(1966, 1, '2021-09-19 08:08:01', '2021-09-19 08:08:01', '', 'Padmavati', '', 'inherit', 'open', 'closed', '', 'padmavati', '', '', '2021-09-19 08:08:01', '2021-09-19 08:08:01', '', 7, 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Padmavati.jpg', 0, 'attachment', 'image/jpeg', 0),
(1967, 1, '2021-09-19 08:08:31', '2021-09-19 08:08:31', '', 'Caroline', '', 'inherit', 'open', 'closed', '', 'caroline', '', '', '2021-09-19 08:08:31', '2021-09-19 08:08:31', '', 7, 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Caroline.jpg', 0, 'attachment', 'image/jpeg', 0),
(1968, 1, '2021-09-19 08:12:16', '2021-09-19 08:12:16', 'Watch videos and understand how to use Startup Lawyer, its benefits etc.', 'How it Works', '', 'inherit', 'closed', 'closed', '', '1867-autosave-v1', '', '', '2021-09-19 08:12:16', '2021-09-19 08:12:16', '', 1867, 'https://startuplawyer.lk/main/blog/?p=1968', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wpsg_termmeta`
--

CREATE TABLE `wpsg_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wpsg_termmeta`
--

INSERT INTO `wpsg_termmeta` (`meta_id`, `term_id`, `meta_key`, `meta_value`) VALUES
(1, 214, 'tax_image_url_universal', 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Penguins.jpg'),
(2, 215, 'tax_image_url_universal', 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Penguins.jpg'),
(3, 217, 'tax_image_url_universal', 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Penguins.jpg'),
(4, 216, 'tax_image_url_universal', 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Penguins.jpg'),
(13, 249, 'tax_image_url_universal', 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Asha-2.jpg'),
(14, 250, 'tax_image_url_universal', 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Padmavati.jpg'),
(11, 247, 'tax_image_url_universal', 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Caroline.jpg'),
(12, 248, 'tax_image_url_universal', 'https://startuplawyer.lk/main/blog/wp-content/uploads/2021/08/Sirimavo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wpsg_terms`
--

CREATE TABLE `wpsg_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wpsg_terms`
--

INSERT INTO `wpsg_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(244, 'Guidelines', 'guidelines', 0),
(243, 'Other', 'other', 0),
(242, 'Government Approvals', 'governmentapprovals', 0),
(236, 'International Trade', 'internationaltrade', 0),
(235, 'Investment', 'investment', 0),
(234, 'Immigration', 'immigration', 0),
(233, 'Family', 'family', 0),
(232, 'Taxation', 'taxation', 0),
(231, 'Litigation', 'litigation', 0),
(230, 'Dispute Resolution', 'disputeresolution', 0),
(229, 'Intellectual Property', 'intellectualproperty', 0),
(228, 'Deeds', 'deeds', 0),
(227, 'Employment', 'employment', 0),
(226, 'Contracts', 'contracts', 0),
(225, 'Business Registration', 'businessregistration', 0),
(241, 'Banking &amp; Loans', 'bankingloans', 0),
(240, 'Accounting', 'accounting', 0),
(239, 'Business Consultancy', 'businessconsultancy', 0),
(237, 'Personal Injury', 'personalinjury', 0),
(238, 'IT', 'it', 0),
(247, 'Account Creation', 'account', 0),
(248, 'Features', 'features', 0),
(223, 'Header Menu', 'header-menu', 0),
(191, 'Social menu', 'social-menu', 0),
(192, 'Gallery', 'post-format-gallery', 0),
(193, 'Aside', 'post-format-aside', 0),
(194, 'Chat', 'post-format-chat', 0),
(195, 'Link', 'post-format-link', 0),
(196, 'Image', 'post-format-image', 0),
(197, 'Quote', 'post-format-quote', 0),
(198, 'Status', 'post-format-status', 0),
(199, 'Video', 'post-format-video', 0),
(200, 'Audio', 'post-format-audio', 0),
(250, 'Endorsements', 'endorsements', 0),
(217, 'jkl', 'jkl', 0),
(216, 'ghi', 'ghi', 0),
(214, 'abc', 'abc', 0),
(215, 'def', 'def', 0),
(249, 'Special Benefits', 'special-benefits', 0),
(222, 'Footer Menu', 'footer-menu', 0),
(224, 'Short', 'short', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wpsg_term_relationships`
--

CREATE TABLE `wpsg_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wpsg_term_relationships`
--

INSERT INTO `wpsg_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1747, 191, 0),
(1748, 191, 0),
(1749, 191, 0),
(1750, 191, 0),
(1751, 191, 0),
(1897, 223, 0),
(1891, 223, 0),
(1893, 223, 0),
(1892, 223, 0),
(1907, 222, 0),
(1895, 223, 0),
(1905, 222, 0),
(1906, 222, 0),
(1896, 223, 0),
(1957, 243, 0),
(1960, 247, 0),
(1961, 250, 0),
(1962, 248, 0),
(1, 1, 0),
(1153, 1, 0),
(1161, 1, 0),
(1161, 199, 0),
(1865, 247, 0),
(1, 244, 0),
(1963, 249, 0),
(1859, 217, 0),
(1859, 216, 0),
(1859, 215, 0),
(1859, 214, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wpsg_term_taxonomy`
--

CREATE TABLE `wpsg_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wpsg_term_taxonomy`
--

INSERT INTO `wpsg_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 2),
(242, 242, 'category', '', 0, 0),
(240, 240, 'category', '', 0, 0),
(237, 237, 'category', '', 0, 0),
(235, 235, 'category', '', 0, 0),
(233, 233, 'category', '', 0, 0),
(227, 227, 'category', '', 0, 0),
(225, 225, 'category', '', 0, 0),
(223, 223, 'nav_menu', '', 0, 6),
(191, 191, 'nav_menu', '', 0, 5),
(192, 192, 'post_format', '', 0, 0),
(193, 193, 'post_format', '', 0, 0),
(194, 194, 'post_format', '', 0, 0),
(195, 195, 'post_format', '', 0, 0),
(196, 196, 'post_format', '', 0, 0),
(197, 197, 'post_format', '', 0, 0),
(198, 198, 'post_format', '', 0, 0),
(199, 199, 'post_format', '', 0, 1),
(200, 200, 'post_format', '', 0, 0),
(236, 236, 'category', '', 0, 0),
(243, 243, 'category', '', 0, 1),
(241, 241, 'category', '', 0, 0),
(239, 239, 'category', '', 0, 0),
(238, 238, 'category', '', 0, 0),
(234, 234, 'category', '', 0, 0),
(232, 232, 'category', '', 0, 0),
(231, 231, 'category', '', 0, 0),
(230, 230, 'category', '', 0, 0),
(229, 229, 'category', '', 0, 0),
(228, 228, 'category', '', 0, 0),
(226, 226, 'category', '', 0, 0),
(244, 244, 'post_tag', '', 0, 1),
(224, 224, 'nav_menu', '', 0, 0),
(214, 214, 'help_cat', 'Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.', 0, 1),
(215, 215, 'help_cat', 'Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.', 0, 1),
(216, 216, 'help_cat', 'Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.', 0, 1),
(217, 217, 'help_cat', 'Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.', 0, 1),
(249, 249, 'video_cat', '', 0, 1),
(250, 250, 'video_cat', '', 0, 1),
(247, 247, 'video_cat', '', 0, 2),
(248, 248, 'video_cat', '', 0, 1),
(222, 222, 'nav_menu', '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `wpsg_usermeta`
--

CREATE TABLE `wpsg_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wpsg_usermeta`
--

INSERT INTO `wpsg_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wpsg_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wpsg_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', 'theme_editor_notice'),
(15, 1, 'show_welcome_panel', '1'),
(16, 1, 'session_tokens', 'a:1:{s:64:\"f02d1fc0e20db26f914c7a131c6928b6750530723db5507b04a5783994d9979a\";a:4:{s:10:\"expiration\";i:1632206727;s:2:\"ip\";s:15:\"203.189.185.165\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36\";s:5:\"login\";i:1632033927;}}'),
(17, 1, 'wpsg_dashboard_quick_press_last_post_id', '1910'),
(18, 1, 'community-events-location', 'a:1:{s:2:\"ip\";s:11:\"39.34.220.0\";}'),
(19, 1, 'wpsg_user-settings', 'libraryContent=browse'),
(20, 1, 'wpsg_user-settings-time', '1630325540'),
(21, 1, 'nav_menu_recently_edited', '222'),
(22, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),
(23, 1, 'metaboxhidden_nav-menus', 'a:1:{i:0;s:12:\"add-post_tag\";}'),
(24, 1, 'closedpostboxes_artical', 'a:0:{}'),
(25, 1, 'metaboxhidden_artical', 'a:1:{i:0;s:7:\"slugdiv\";}'),
(26, 1, 'meta-box-order_artical', 'a:3:{s:4:\"side\";s:39:\"submitdiv,tagsdiv-help_cat,postimagediv\";s:6:\"normal\";s:7:\"slugdiv\";s:8:\"advanced\";s:0:\"\";}'),
(27, 1, 'screen_layout_artical', '2');

-- --------------------------------------------------------

--
-- Table structure for table `wpsg_users`
--

CREATE TABLE `wpsg_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wpsg_users`
--

INSERT INTO `wpsg_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$BM45sPYhNEWj7LUjJaySigP2173LVJ/', 'admin', 'admin@startuplawyer.lk', 'https://startuplawyer.lk/main/blog', '2021-08-30 11:48:15', '', 0, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wpsg_commentmeta`
--
ALTER TABLE `wpsg_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wpsg_comments`
--
ALTER TABLE `wpsg_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `wpsg_links`
--
ALTER TABLE `wpsg_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wpsg_options`
--
ALTER TABLE `wpsg_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- Indexes for table `wpsg_postmeta`
--
ALTER TABLE `wpsg_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wpsg_posts`
--
ALTER TABLE `wpsg_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wpsg_termmeta`
--
ALTER TABLE `wpsg_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wpsg_terms`
--
ALTER TABLE `wpsg_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wpsg_term_relationships`
--
ALTER TABLE `wpsg_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wpsg_term_taxonomy`
--
ALTER TABLE `wpsg_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wpsg_usermeta`
--
ALTER TABLE `wpsg_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wpsg_users`
--
ALTER TABLE `wpsg_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wpsg_commentmeta`
--
ALTER TABLE `wpsg_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wpsg_comments`
--
ALTER TABLE `wpsg_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `wpsg_links`
--
ALTER TABLE `wpsg_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wpsg_options`
--
ALTER TABLE `wpsg_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1221;

--
-- AUTO_INCREMENT for table `wpsg_postmeta`
--
ALTER TABLE `wpsg_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1187;

--
-- AUTO_INCREMENT for table `wpsg_posts`
--
ALTER TABLE `wpsg_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1970;

--
-- AUTO_INCREMENT for table `wpsg_termmeta`
--
ALTER TABLE `wpsg_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wpsg_terms`
--
ALTER TABLE `wpsg_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `wpsg_term_taxonomy`
--
ALTER TABLE `wpsg_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `wpsg_usermeta`
--
ALTER TABLE `wpsg_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `wpsg_users`
--
ALTER TABLE `wpsg_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
