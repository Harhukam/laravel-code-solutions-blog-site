-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 12:31 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adampur`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `parent_id`, `slug`, `active`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Blog', NULL, 'blog', 'Y', NULL, '2020-07-26 03:51:59', '2020-07-26 03:51:59');

-- --------------------------------------------------------

--
-- Stand-in structure for view `category_view`
-- (See below for the actual view)
--
CREATE TABLE `category_view` (
`id` bigint(20) unsigned
,`category_name` varchar(255)
,`parent` varchar(255)
,`image` varchar(255)
,`active` enum('Y','N')
);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2020_07_26_074234_create_categories_table', 2),
(12, '2020_07_26_074951_create_posts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disclaimer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `body`, `image`, `slug`, `active`, `meta_title`, `meta_description`, `disclaimer`, `created_at`, `updated_at`) VALUES
(1, 5, 'My first blog', '<p>My first blog<br></p>', '9575ba987daf8edd.jpg', 'my-first-blog', 'Y', 'My first blog', 'My first blog', NULL, '2020-07-26 04:33:26', '2020-07-26 04:33:26'),
(2, 5, 'My Second Blog by mandeep', '<p>My Second Blog<br></p>', 'f39510f68b768a38.jpg', 'my-second-blog-by-mandeep', 'Y', 'My Second Blog', 'My Second Blog', NULL, '2020-07-26 04:39:07', '2020-07-26 05:00:59'),
(3, 5, 'ਕੋਰੋਨਾਵਾਇਰਸ ਵੈਕਸੀਨ ਬਾਰੇ ਪੁੱਛੇ ਜਾ ਰਹੇ 4 ਸਵਾਲਾਂ ਦੇ ਇਹ ਹਨ ਜਵਾਬ', '<div class=\"GridItemConstrainedLargeNoMargin-sc-12lwanc-5 tOkbK\" style=\"box-sizing: inherit; grid-column: 6 / span 12;\"><figure class=\"Figure-sc-6a3dhy-0 gJUCFc\" style=\"box-sizing: inherit; margin-bottom: 0px; padding-bottom: 1.5rem; width: 645.25px;\"><div class=\"NestedGridParentLarge-sc-12lwanc-10 hfLVVX\" style=\"box-sizing: inherit; display: grid; column-gap: 1rem; grid-template-columns: repeat(12, 1fr);\"><div class=\"NestedGridItemChildLarge-sc-12lwanc-9 ichKJL\" style=\"box-sizing: inherit; grid-column: 1 / span 10;\"><figcaption class=\"Caption-sc-16x70so-0 kaNhcD\" style=\"box-sizing: inherit; line-height: 1.625rem; padding: 0.5rem 0px 0px; width: 534.938px;\"><p style=\"box-sizing: inherit; padding-bottom: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\">ਵੱਖ-ਵੱਖ ਦਵਾਈ ਬਣਾਉਣ ਵਾਲੀਆਂ ਕੰਪਨੀਆਂ ਅਤੇ ਖੋਜ ਸੰਸਥਾਵਾਂ ਵੱਲੋਂ ਲਗਭਗ 140 ਹੋਰ ਟੀਕਿਆਂ \'ਤੇ ਵੀ ਖੋਜ ਕਾਰਜ ਜਾਰੀ ਹੈ</p></figcaption></div></div></figure></div><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\"><span style=\"box-sizing: inherit;\">ਹੁਣ ਤੱਕ ਦੁਨੀਆ ਭਰ \'ਚ ਤਕਰੀਬਨ 20 ਦੇ ਕਰੀਬ ਸੰਭਾਵੀ ਕੋਰੋਨਾ ਟੀਕੇ ਵਿਕਸਤ ਕੀਤੇ ਜਾ ਚੁੱਕੇ ਹਨ। ਜਿੰਨ੍ਹਾਂ ਨੇ ਆਪਣੇ ਸ਼ੁਰੂਆਤੀ ਪ੍ਰੀਖਣਾਂ \'ਚ ਵਧੀਆ ਨਤੀਜੇ ਦਿੱਤੇ ਹਨ ਅਤੇ ਹੁਣ ਵਿਗਿਆਨੀ ਇਨ੍ਹਾਂ ਦੇ ਅਗਲੇ ਪੜਾਅ ਲਈ \'ਕਲੀਨਿਕਲ ਟਰਾਇਲ ਕਰ ਰਹੇ ਹਨ।</span></p></div><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\">ਵੱਖ-ਵੱਖ ਦਵਾਈ ਬਣਾਉਣ ਵਾਲੀਆਂ ਕੰਪਨੀਆਂ ਅਤੇ ਖੋਜ ਸੰਸਥਾਵਾਂ ਵੱਲੋਂ ਲਗਭਗ 140 ਹੋਰ ਟੀਕਿਆਂ \'ਤੇ ਵੀ ਖੋਜ ਕਾਰਜ ਜਾਰੀ ਹੈ। ਉਮੀਦ ਕੀਤੀ ਜਾ ਰਹੀ ਹੈ ਇੰਨ੍ਹਾਂ \'ਚੋਂ ਹੀ ਕੋਈ ਇੱਕ ਟੀਕਾ ਕੋਰੋਨਾ ਦੀ ਰੋਕਥਾਮ ਲਈ ਸਮਰੱਥ ਹੋਵੇਗਾ।</p></div><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\">ਇਸ ਸਬੰਧੀ ਪਿਛਲੇ ਦੋ ਹਫ਼ਤੇ ਬਹੁਤ ਵਧੀਆ ਲੰਘੇ, ਪਹਿਲਾਂ ਅਮਰੀਕਾ ਫਿਰ ਬ੍ਰਿਟੇਨ, ਚੀਨ, ਰੂਸ ਅਤੇ ਭਾਰਤ ਨੇ ਜਾਣਕਾਰੀ ਦਿੱਤੀ ਕਿ ਉਨ੍ਹਾਂ ਵੱਲੋਂ ਕੋਰੋਨਾ ਲਈ ਤਿਆਰ ਕੀਤਾ ਜਾ ਰਿਹਾ ਸੰਭਾਵੀ ਟੀਕਾ ਆਪਣੇ ਸ਼ੁਰੂਆਤੀ ਗੇੜ੍ਹ ਦੇ ਪ੍ਰੀਖਣਾਂ \'ਚ ਸਫ਼ਲ ਰਿਹਾ ਹੈ।</p><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\">ਬਹੁਤ ਸਾਰੇ ਪਾਠਕਾਂ ਨੇ ਇਸ ਕੋਰੋਨਾ ਦੇ ਸੰਭਾਵੀ ਟੀਕਿਆਂ ਸਬੰਧੀ ਕੁੱਝ ਸਵਾਲ ਸਾਡੇ ਅੱਗੇ ਰੱਖੇ ਹਨ। ਬੀਬੀਸੀ ਦੀ ਹੈਲਥ ਐਡੀਟਰ ਮਿਸ਼ੇਲ ਰਾਬਰਟਸ ਨੇ ਇੰਨ੍ਹਾਂ ਸਵਾਲਾਂ ਦਾ ਜਵਾਬ ਦੇਣ ਦੀ ਕੋਸ਼ਿਸ਼ ਕੀਤੀ ਹੈ:</p></div><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\"><span style=\"box-sizing: inherit;\">ਪਹਿਲਾ ਸਵਾਲ: </span>ਕੀ ਕੋਰੋਨਾ ਵੈਕਸੀਨ 100 ਫੀਸਦ ਸੁਰੱਖਿਅਤ ਹੋਵੇਗਾ? ਕੀ ਇਸ ਟੀਕੇ ਦੇ ਕੁੱਝ ਅਣਚਾਹੇ ਪ੍ਰਭਾਵ ਤਾਂ ਸਾਹਮਣੇ ਨਹੀਂ ਆਉਣਗੇ?</p></div><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\"><span style=\"box-sizing: inherit;\">ਜਵਾਬ: </span>ਸਖ਼ਤ ਸੁਰੱਖਿਆ ਜਾਂਚ ਤੋਂ ਬਾਅਦ ਹੀ ਕਿਸੇ ਵੀ ਟੀਕੇ ਦੀ ਵਿਆਪਕ ਵਰਤੋਂ ਦੀ ਮਨਜ਼ੂਰੀ ਮਿਲਦੀ ਹੈ। ਇਸ ਲਈ ਕਈ ਗੇੜਾਂ ਵਿੱਚੋਂ ਲੰਘਣਾ ਪੈਂਦਾ ਹੈ।</p></div><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\">ਪਰ ਕੋਵਿਡ-19 ਦਾ ਟੀਕਾ ਲੱਭਣ ਲਈ ਖੋਜ ਕਾਰਜ ਤੇਜ਼ੀ ਨਾਲ ਕੀਤਾ ਗਿਆ ਹੈ।</p></div><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\">ਖੋਜ ਸਬੰਧੀ ਕਾਰਜ ਵੀ ਆਮ ਗਤੀ ਨਾਲੋਂ ਵਧੇਰੇ ਤੇਜ਼ ਹੈ। ਫਿਰ ਵੀ ਕਲੀਨਿਕਲ ਟਰਾਇਲ \'ਚ ਉਨ੍ਹਾਂ ਸਾਰੇ ਹੀ ਮਾਪਦੰਡਾਂ ਨੂੰ ਧਿਆਨ \'ਚ ਰੱਖ ਕੇ ਪ੍ਰੀਖਣ ਕੀਤੇ ਜਾ ਰਹੇ ਹਨ ਜੋ ਕਿ ਇੱਕ ਟੀਕੇ ਦੀ ਵਰਤੋਂ ਦੀ ਮਨਜ਼ੂਰੀ ਦੇਣ ਤੋਂ ਪਹਿਲਾਂ ਜ਼ਰੂਰੀ ਹੁੰਦੇ ਹਨ।</p></div><div class=\"GridItemConstrainedLargeNoMargin-sc-12lwanc-5 tOkbK\" style=\"box-sizing: inherit; grid-column: 6 / span 12;\"><figure class=\"Figure-sc-6a3dhy-0 gJUCFc\" style=\"box-sizing: inherit; margin-bottom: 0px; padding-bottom: 1.5rem; width: 645.25px;\"><div class=\"NestedGridParentLarge-sc-12lwanc-10 hfLVVX\" style=\"box-sizing: inherit; display: grid; column-gap: 1rem; grid-template-columns: repeat(12, 1fr);\"><div class=\"NestedGridItemChildLarge-sc-12lwanc-9 fkKpIa\" style=\"box-sizing: inherit; grid-column: 1 / span 12;\"><div class=\"ImagePlaceholder-sc-11u25v2-0 _StyledImagePlaceholder-gu1fm2-0 dWHIXb\" style=\"box-sizing: inherit; position: relative; height: 0px; overflow: hidden; padding-bottom: 362.875px; width: 645.125px; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><img srcset=\"https://ichef.bbci.co.uk/news/240/cpsprodpb/FCF9/production/_112016746_whatsubject.jpg 240w, https://ichef.bbci.co.uk/news/320/cpsprodpb/FCF9/production/_112016746_whatsubject.jpg 320w, https://ichef.bbci.co.uk/news/480/cpsprodpb/FCF9/production/_112016746_whatsubject.jpg 480w, https://ichef.bbci.co.uk/news/624/cpsprodpb/FCF9/production/_112016746_whatsubject.jpg 624w, https://ichef.bbci.co.uk/news/800/cpsprodpb/FCF9/production/_112016746_whatsubject.jpg 800w\" alt=\"ਕੋਵਿਡ-19\" src=\"https://ichef.bbci.co.uk/news/640/cpsprodpb/FCF9/production/_112016746_whatsubject.jpg\" width=\"976\" class=\"StyledImg-sc-7vx2mr-0 dQLeqZ\" style=\"box-sizing: inherit; display: block; width: 645.125px; visibility: visible; animation: 0.2s linear 0s 1 normal none running eMLfYp; transition: visibility 0.2s linear 0s;\"><p role=\"text\" class=\"Copyright-sc-11lgtw-0 hDvIfz\" style=\"box-sizing: inherit; line-height: 1rem; padding: 0.25rem 0.5rem; position: absolute; bottom: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; left: 0px;\"><span class=\"VisuallyHiddenText-sc-1yjwwa5-0 ldFJPH\" style=\"box-sizing: inherit; clip-path: inset(100%); clip: rect(1px, 1px, 1px, 1px); height: 1px; overflow: hidden; position: absolute; width: 1px; margin: 0px;\">ਤਸਵੀਰ ਸਰੋਤ,</span><span lang=\"en-GB\" style=\"box-sizing: inherit;\">GETTY IMAGES</span></p></div></div><div class=\"NestedGridItemChildLarge-sc-12lwanc-9 ichKJL\" style=\"box-sizing: inherit; grid-column: 1 / span 10;\"><figcaption class=\"Caption-sc-16x70so-0 kaNhcD\" style=\"box-sizing: inherit; line-height: 1.625rem; padding: 0.5rem 0px 0px; width: 534.938px;\"><span class=\"VisuallyHiddenText-sc-1yjwwa5-0 ldFJPH\" style=\"box-sizing: inherit; clip-path: inset(100%); clip: rect(1px, 1px, 1px, 1px); height: 1px; overflow: hidden; position: absolute; width: 1px; margin: 0px;\">ਤਸਵੀਰ ਕੈਪਸ਼ਨ,</span><p style=\"box-sizing: inherit; padding-bottom: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\">ਪਹਿਲਾਂ ਅਮਰੀਕਾ ਫਿਰ ਬ੍ਰਿਟੇਨ, ਚੀਨ, ਰੂਸ ਅਤੇ ਭਾਰਤ ਨੇ ਟੀਕਿਆਂ ਦੇ ਸ਼ੁਰੂਆਤੀ ਗੇੜ ਦੇ ਸਫ਼ਲ ਨਤੀਜਿਆਂ ਬਾਰੇ ਗੱਲ ਕੀਤੀ ਹੈ</p></figcaption></div></div></figure></div><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\">ਮੈਡੀਕਲ ਸਾਇੰਸ ਦਾ ਮੰਨਣਾ ਹੈ ਕਿ ਕਿਸੇ ਵੀ ਇਲਾਜ ਦੇ ਕੁੱਝ ਮਾੜੇ ਪ੍ਰਭਾਵ ਹੋ ਸਕਦੇ ਹਨ ਅਤੇ ਟੀਕੇ ਦੇ ਸਬੰਧ \'ਚ ਵੀ ਇਹੀ ਧਾਰਨਾ ਹੈ।</p></div><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\">ਪਰ ਟੀਕੇ ਦਾ ਸਭ ਤੋਂ ਆਮ ਮਾੜਾ ਪ੍ਰਭਾਵ ਵੀ ਮਾਮੂਲੀ ਜਿਹਾ ਹੁੰਦਾ ਹੈ, ਜਿਵੇਂ ਸਰੀਰ ਦੇ ਕਿਸੇ ਹਿੱਸੇ \'ਚ ਸੋਜ ਜਾਂ ਚਮੜੀ \'ਤੇ ਲਾਲ ਧੱਬੇ, ਉਹ ਵੀ ਉਸ ਥਾਂ \'ਤੇ ਜਿੱਥੇ ਟੀਕਾ ਲੱਗਾ ਹੋਵੇ ਆਦਿ।</p></div><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\"><span style=\"box-sizing: inherit;\">ਇਹ ਵੀ ਪੜ੍ਹੋ</span><span style=\"box-sizing: inherit;\">: </span><a href=\"https://www.bbc.com/punjabi/india-53519091\" class=\"InlineLink-hkwpaz-0 idscKS\" style=\"box-sizing: inherit; border-bottom: 1px solid rgb(110, 110, 115);\">ਕੋਰੋਨਾਵਾਇਰਸ ਦੀ ਦਵਾਈ ਜਿੱਥੇ ਵੀ ਬਣੇ, ਭਾਰਤ ਪਹੁੰਚਣ ’ਚ ਇਹ ਮੁਸ਼ਕਿਲਾਂ ਆ ਸਕਦੀਆਂ</a></p></div><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\"><span style=\"box-sizing: inherit;\">ਦੂਜਾ ਸਵਾਲ:</span> ਕੀ ਕੋਵਿਡ-19 ਲਈ ਪੁਰਾਣੇ ਹੀ ਫਲੂ ਦੇ ਟੀਕੇ ਨੂੰ ਹੋਰ ਵਿਕਸਤ ਕੀਤਾ ਗਿਆ ਹੈ?</p></div><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\"><span style=\"box-sizing: inherit;\">ਜਵਾਬ:</span> ਮੌਸਮੀ ਫਲੂ ਤੋਂ ਬਚਾਅ ਲਈ ਲੱਗਣ ਵਾਲਾ ਟੀਕਾ ਕੋਵਿਡ-19 ਤੋਂ ਬਚਾਅ ਨਹੀਂ ਕਰ ਸਕੇਗਾ। ਫਲੂ (ਇਨਫਲੂਐਂਜਾ) ਅਤੇ ਕੋਰੋਨਾ ਲਾਗ ਦੋਵੇਂ ਹੀ ਵੱਖ-ਵੱਖ ਬਿਮਾਰੀਆਂ ਹਨ, ਜੋ ਕਿ ਵੱਖੋ-ਵੱਖ ਵਾਇਰਸ ਕਰਕੇ ਹੁੰਦੀਆਂ ਹਨ।</p></div><div class=\"GridItemConstrainedMedium-sc-12lwanc-2 fVauYi\" style=\"box-sizing: inherit; grid-column: 6 / span 10; max-width: initial;\"><p class=\"Paragraph-k859h4-0 MZjgE\" style=\"box-sizing: inherit; line-height: 1.875rem; padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;\">ਪਰ ਫਲੂ ਦਾ ਟੀਕਾ ਲ</p></div></div>', 'f4f2f062d57bef5e.jpg', 'here-are-the-answers-to-4-questions-about-the-coronavirus-vaccine', 'Y', 'ਕੋਰੋਨਾਵਾਇਰਸ ਵੈਕਸੀਨ ਬਾਰੇ ਪੁੱਛੇ ਜਾ ਰਹੇ 4 ਸਵਾਲਾਂ ਦੇ ਇਹ ਹਨ ਜਵਾਬ', 'ਹੁਣ ਤੱਕ ਦੁਨੀਆ ਭਰ \'ਚ ਤਕਰੀਬਨ 20 ਦੇ ਕਰੀਬ ਸੰਭਾਵੀ ਕੋਰੋਨਾ ਟੀਕੇ ਵਿਕਸਤ ਕੀਤੇ ਜਾ ਚੁੱਕੇ ਹਨ। ਜਿੰਨ੍ਹਾਂ ਨੇ ਆਪਣੇ ਸ਼ੁਰੂਆਤੀ ਪ੍ਰੀਖਣਾਂ \'ਚ ਵਧੀਆ ਨਤੀਜੇ ਦਿੱਤੇ ਹਨ', '<p>ਮਿਸਾਲ ਦੇ ਤੌਰ \'ਤੇ ਵਿਗਿਆਨੀਆਂ ਨੇ ਵਾਇਰਸ ਦੇ ਤਿੱਖੇ ਕੰਢੇਦਾਰ \'ਪ੍ਰੋਟੀਨ ਸਪਾਈਕ\', ਜਿਸ ਦੀ ਮਦਦ ਨਾਲ ਉਹ ਮਨੁੱਖੀ ਸਰੀਰ \'ਚ ਮੌਜੂਦ ਸੈੱਲਾਂ \'ਤੇ ਹਮਲਾ ਕਰਦਾ ਹੈ, ਉਸ ਦੇ ਜੈਨੇਟਿਕ ਨਿਰਦੇਸ਼ ਸੰਭਾਵੀ ਟੀਕੇ \'ਚ ਸ਼ਾਮਲ ਕੀਤੇ ਹਨ।<br></p>', '2020-07-26 04:48:31', '2020-07-26 05:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y' COMMENT 'Y -> Active, N -> Disable',
  `role` enum('U','S','A') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'U' COMMENT 'U -> User, S -> Seller , A -> Admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile_number`, `email`, `active`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rebory', '9463710716', 'dhbgraphics.user@gmail.com', 'Y', 'A', NULL, '$2y$10$cfRp85/hi9Pe7Sc3mJpsgujMa0xvW08aRShJnOsPjHSxb0cDwosju', NULL, '2020-07-25 03:40:26', '2020-07-25 03:40:26');

-- --------------------------------------------------------

--
-- Structure for view `category_view`
--
DROP TABLE IF EXISTS `category_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `category_view`  AS  select `a`.`id` AS `id`,`a`.`category_name` AS `category_name`,`b`.`category_name` AS `parent`,`a`.`image` AS `image`,`a`.`active` AS `active` from (`categories` `a` left join `categories` `b` on(`a`.`parent_id` = `b`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_number_unique` (`mobile_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
