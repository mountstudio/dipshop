-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 20 2018 г., 07:16
-- Версия сервера: 5.7.20-log
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dipshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `baskets`
--

CREATE TABLE `baskets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `embassy` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `percent` varchar(255) NOT NULL DEFAULT '0',
  `is_delivered` tinyint(1) NOT NULL DEFAULT '0',
  `delivery` tinyint(1) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `delivery_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `baskets`
--

INSERT INTO `baskets` (`id`, `user_id`, `name`, `last_name`, `embassy`, `code`, `total_price`, `percent`, `is_delivered`, `delivery`, `address`, `delivery_date`, `delivery_time`, `created_at`, `updated_at`) VALUES
(1, 2, 'admin', 'kubanov', 'USA', '1231231123', 16, '0', 0, 0, NULL, NULL, NULL, '2018-11-07 11:58:49', '2018-11-07 11:58:49'),
(2, 6, 'Tilek', 'Kubanov', 'USA', '123456789', 36, '0', 0, 0, NULL, NULL, NULL, '2018-11-07 14:04:54', '2018-11-07 14:04:54'),
(3, 2, 'admin', 'kubanov', 'USA', '1231231123', 30, '0', 0, 0, NULL, NULL, NULL, '2018-11-07 14:05:16', '2018-11-07 14:05:16'),
(4, 7, 'test', 'test', 'USA', '123456789', 85, '10', 0, 0, NULL, NULL, NULL, '2018-11-16 08:58:40', '2018-11-16 08:58:40');

-- --------------------------------------------------------

--
-- Структура таблицы `basket_product`
--

CREATE TABLE `basket_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `basket_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket_product`
--

INSERT INTO `basket_product` (`id`, `basket_id`, `product_id`, `qty`, `price`) VALUES
(1, 1, 171, 1, 16),
(2, 2, 85, 1, 30),
(3, 2, 43, 1, 6),
(4, 3, 33, 1, 6),
(5, 3, 41, 1, 24),
(6, 4, 38, 1, 16),
(7, 4, 49, 1, 69);

-- --------------------------------------------------------

--
-- Структура таблицы `bids`
--

CREATE TABLE `bids` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bids`
--

INSERT INTO `bids` (`id`, `name`, `phone`, `email`, `question`, `created_at`, `updated_at`) VALUES
(1, 'Tilek Kubanov', 701001052, 'tilek.kubanov@gmail.com', 'Question', '2018-10-31 15:08:26', '2018-10-31 15:08:26');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Алкоголь', 'alkogol', NULL, '2018-09-27 14:01:33', '2018-09-27 14:01:33'),
(2, 'Вино', 'vino', 1, '2018-09-27 14:04:04', '2018-09-27 14:04:04'),
(3, 'Коньяк', 'konyak', 1, '2018-09-27 14:04:33', '2018-09-27 14:04:33'),
(4, 'Водка', 'vodka', 1, '2018-09-27 14:04:49', '2018-09-27 14:04:50'),
(5, 'Вино игристое', 'vino-igristoe', 1, '2018-09-27 14:06:05', '2018-09-27 14:06:05'),
(6, 'Вермут', 'vermut', 1, '2018-09-27 14:06:19', '2018-09-27 14:06:19'),
(7, 'Виски', 'viski', 1, '2018-09-27 14:06:37', '2018-09-27 14:06:37'),
(8, 'Ром', 'rom', 1, '2018-09-27 14:06:51', '2018-09-27 14:06:51'),
(9, 'Джин', 'dzhin', 1, '2018-09-27 14:07:02', '2018-09-27 14:07:02'),
(10, 'Ликер', 'liker', 1, '2018-09-27 14:07:31', '2018-09-27 14:07:31'),
(11, 'Прочие', 'prochie', 1, '2018-09-27 14:08:29', '2018-09-27 14:08:29'),
(12, 'Пиво', 'pivo', 1, '2018-09-27 16:38:43', '2018-09-27 16:38:43'),
(13, 'Сигареты', 'sigarety', NULL, '2018-10-16 13:15:18', '2018-10-16 13:15:18');

-- --------------------------------------------------------

--
-- Структура таблицы `category_property`
--

CREATE TABLE `category_property` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_property`
--

INSERT INTO `category_property` (`id`, `category_id`, `property_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_25_191245_add_admin_column_to_users', 1),
(4, '2018_09_04_083024_create_products_table', 1),
(5, '2018_09_08_202522_add_column_to_products_table', 1),
(6, '2018_09_08_203941_create_types_table', 1),
(7, '2018_09_11_172321_rename_types_table', 1),
(8, '2018_09_11_175202_rename_column_in_products_table', 1),
(9, '2018_09_13_100209_add_parent_id_column_to_categories_table', 1),
(10, '2018_09_13_191312_create_product_props_table', 1),
(11, '2018_09_13_191358_create_category_props_table', 1),
(12, '2018_09_15_073926_change_price_type_in_products_table', 1),
(13, '2018_09_24_104410_rename_product_props_table', 1),
(14, '2018_09_24_105415_rename_category_props_table', 1),
(15, '2018_09_24_105832_create_properties_table', 1),
(16, '2018_09_25_154120_rename_category_properties_table', 1),
(17, '2018_09_25_154227_rename_products_properties_table', 1),
(18, '2018_09_26_120115_change_value_prop', 1),
(19, '2018_09_27_204838_add_slug_column_to_products_table', 2),
(20, '2018_09_27_211239_change_slug_column_properties_table', 3),
(21, '2018_09_27_211559_change_slug_column_in_categories_table', 4),
(24, '2018_10_07_172527_add_id_column_to_product_property_table', 5),
(25, '2018_10_07_172549_add_id_column_to_category_property_table', 6),
(26, '2018_10_26_082619_add_is_active_to_users_table', 7),
(27, '2018_10_30_084641_add_columns_to_users_table', 8),
(34, '2018_10_31_095541_create_bids_table', 9),
(35, '2018_10_31_165337_create_baskets_table', 10),
(36, '2018_10_31_173158_create_basket_product_table', 11),
(38, '2018_11_07_184316_add_percent_column_to_users_table', 12),
(40, '2018_11_12_211456_add_columns_to_products_table', 13),
(41, '2018_11_16_100510_add_column_to_baskets_table', 14),
(42, '2018_11_16_100629_add_column_to_users_table', 15),
(43, '2018_12_16_133515_create_stocks_table', 16),
(44, '2018_12_16_141909_create_product_stock_table', 17);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_product_id` varchar(255) DEFAULT NULL,
  `stripe_sku_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `image`, `price`, `category_id`, `created_at`, `updated_at`, `stripe_product_id`, `stripe_sku_id`) VALUES
(1, 'MARTINI PROSECCO 11.5% 0.75L', 'martini-prosecco-115-075l', 'product_martini-prosecco-115-075l_5bbb9e91ef918.jpg', 13, 5, '2018-09-27 15:39:20', '2018-11-12 17:04:47', 'prod_DxjsqXswVLuRvX', 'sku_DxjwJh8v2OmxYb'),
(2, 'CINZANO ASTI 7% 0.75L', 'cinzano-asti-7-075l', 'product_cinzano-asti-7-075l_5bbb9e1dc118b.jpg', 10, 5, '2018-09-27 15:50:01', '2018-11-12 17:04:49', 'prod_DxjsUGUQS5DIXs', 'sku_DxjwpuGNfnBQu3'),
(3, 'MARTINI BRUT 11.5% 0.75L', 'martini-brut-115-075l', 'product_martini-brut-115-075l_5bbb9e51761ed.jpg', 12, 5, '2018-09-27 15:51:27', '2018-11-12 17:04:50', 'prod_DxjseLkPg9BeX1', 'sku_DxjwLY9bWRxosW'),
(4, 'MARTINI ROSE 11.5% 0.75L', 'martini-rose-115-075l', 'product_martini-rose-115-075l_5bbb9eb078643.jpg', 13.5, 5, '2018-09-27 15:52:42', '2018-11-12 17:04:51', 'prod_DxjsGFhG7YM2Wh', 'sku_DxjwCOfZuPe93N'),
(5, 'CINZANO BIANCO 15%', 'cinzano-bianco-15', 'product_cinzano-bianco-15_5bbb89c617542.jpg', 7, 6, '2018-09-27 15:53:15', '2018-11-12 17:04:53', 'prod_DxjsOwfhQgUiMJ', 'sku_DxjwHwPrQod2IT'),
(6, 'CINZANO ROSSO 15%', 'cinzano-rosso-15', 'product_cinzano-rosso-15_5bbb8a0255d95.jpg', 7, 6, '2018-09-27 15:53:57', '2018-11-12 17:04:54', 'prod_Dxjs3qdQxCrl18', 'sku_DxjwFL6ZCKAd2J'),
(7, 'ASTI MARTINI 7.5% 0.75L', 'asti-martini-75-075l', 'product_asti-martini-75-075l_5bbb9e7652af6.jpg', 11, 5, '2018-09-27 15:54:10', '2018-11-12 17:04:55', 'prod_DxjspcjqKBa5RE', 'sku_DxjwV97BlXJ8Sl'),
(8, 'MARTINI BIANCO 15%', 'martini-bianco-15', 'product_martini-bianco-15_5bbb8a31b8029.jpg', 8, 6, '2018-09-27 15:55:04', '2018-11-12 17:04:56', 'prod_Dxjsjaf6IviXgT', 'sku_Dxjw7u0sndPTNz'),
(9, 'CINZANO ROSE 9.5% 0.75L', 'cinzano-rose-95-075l', 'product_cinzano-rose-95-075l_5bbb9de48f984.jpg', 11, 5, '2018-09-27 15:55:10', '2018-11-12 17:04:58', 'prod_Dxjs5DjuESkpCl', 'sku_DxjwaAeLv1prn5'),
(10, 'MARTINI DRY 18%', 'martini-dry-18', 'product_martini-dry-18_5bbb8a5f7c3b5.jpg', 8, 6, '2018-09-27 15:55:38', '2018-11-12 17:04:59', 'prod_DxjslMFihZeiNz', 'sku_DxjwhiGFgeRVsC'),
(11, 'FUERST VON METTERNICH DRY 12.5% 0.75L', 'fuerst-von-metternich-dry-125-075l', 'product_fuerst-von-metternich-dry-125-075l_5bbb9f9f879eb.jpg', 14, 5, '2018-09-27 15:56:01', '2018-11-12 17:05:00', 'prod_DxjsQ9b0MkiLGz', 'sku_Dxjwatzl21eGWG'),
(12, 'MARTINI ROSATO 15%', 'martini-rosato-15', 'product_martini-rosato-15_5bbb8a9fbdfc7.jpg', 8, 6, '2018-09-27 15:56:43', '2018-11-12 17:05:01', 'prod_DxjsS3tKufyUko', 'sku_Dxjw2BlflFImGt'),
(13, 'PORTO SANDEMAN*** RUBY 19.5% 1L', 'porto-sandeman-ruby-195-1l', 'product_porto-sandeman-ruby-195-1l_5bbb9c32a186b.jpg', 13, 2, '2018-09-27 15:56:57', '2018-11-12 17:05:03', 'prod_DxjsDWLtoegw72', 'sku_DxjwKA5Lrzh1xa'),
(14, 'MARTINI ROSSO 15%', 'martini-rosso-15', 'product_martini-rosso-15_5bbb8acdb2000.jpg', 8, 6, '2018-09-27 15:57:16', '2018-11-12 17:05:04', 'prod_DxjsCl5ehvawYj', 'sku_DxjwGx0t6ZHEBg'),
(15, 'J.P. CHENET ICE EDITION WHITE 10.5% 0.75L', 'jp-chenet-ice-edition-white-105-075l', 'product_jp-chenet-ice-edition-white-105-075l_5bbb9918ed561.jpg', 6, 2, '2018-09-27 15:57:52', '2018-11-12 17:05:05', 'prod_Dxjs73PQyFXjIU', 'sku_Dxjw0yflzIIx78'),
(16, 'BARDINET VSOP 36%', 'bardinet-vsop-36', 'product_bardinet-vsop-36_5bbb7cbe29370.jpg', 9, 3, '2018-09-27 15:58:41', '2018-11-12 17:05:06', 'prod_Dxjsd5doL4PmUi', 'sku_Dxjw6EJ8F8l0c1'),
(17, 'J.P. CHENET ICE EDITION ROSE 11% 0.75L', 'jp-chenet-ice-edition-rose-11-075l', 'product_jp-chenet-ice-edition-rose-11-075l_5bbb993f43c59.jpg', 6, 2, '2018-09-27 15:58:43', '2018-11-12 17:05:08', 'prod_Dxjscu4PoVYTA6', 'sku_DxjwjIj8nDGVax'),
(18, 'J.P. CHENET SEKT TROCKEN 11% 0.75L', 'jp-chenet-sekt-trocken-11-075l', 'product_jp-chenet-sekt-trocken-11-075l_5bbb98fbbc6b6.jpg', 6, 2, '2018-09-27 15:59:44', '2018-11-12 17:05:09', 'prod_DxjshfDvazrS8c', 'sku_DxjwMDMRR6JdZV'),
(19, 'BARDINET XO 40%', 'bardinet-xo-40', 'product_bardinet-xo-40_5bbb7d64b3e2e.jpg', 13, 3, '2018-09-27 15:59:45', '2018-11-12 17:05:10', 'prod_DxjsxmECYfhzvb', 'sku_Dxjw9RJHDR90LR'),
(20, 'J.P. CHENET SEKT HALBTROCKEN 10.5% 0.75L', 'jp-chenet-sekt-halbtrocken-105-075l', 'product_jp-chenet-sekt-halbtrocken-105-075l_5bbb98d1d91cf.jpg', 6, 2, '2018-09-27 16:00:28', '2018-11-12 17:05:11', 'prod_Dxjs1ARY9zSJJo', 'sku_DxjwSUeVZfUSNi'),
(21, 'BARON OTARD VSOP GIFTBOX 40%', 'baron-otard-vsop-giftbox-40', 'product_baron-otard-vsop-giftbox-40_5bbb7df5d64ae.jpg', 42, 3, '2018-09-27 16:00:35', '2018-11-12 17:05:13', 'prod_DxjsajZtkSg2XN', 'sku_DxjwmdO6X6UrMj'),
(22, 'CHATEAU DU BARRAILH (RED) 0.75L', 'chateau-du-barrailh-red-075l', 'product_chateau-du-barrailh-red-075l_5bbb9c5c3c4e2.jpg', 14, 2, '2018-09-27 16:01:58', '2018-11-12 17:05:14', 'prod_DxjsiuJkA6iZma', 'sku_DxjwpE3HF2KDst'),
(23, 'CHATEAU LA GRAVELLE RED 12 0.75L', 'chateau-la-gravelle-red-12-075l', 'product_chateau-la-gravelle-red-12-075l_5bbb9bc356341.jpg', 9, 2, '2018-09-27 16:02:59', '2018-11-12 17:05:15', 'prod_DxjsVLPTXgUs3b', 'sku_DxjwWUnF8XcwQL'),
(24, 'BARON OTARD XO GOLD GIFTBOX 40% 1L', 'baron-otard-xo-gold-giftbox-40-1l', 'product_baron-otard-xo-gold-giftbox-40-1l_5bbb7e2c9cf82.jpg', 120, 3, '2018-09-27 16:07:08', '2018-11-12 17:05:16', 'prod_Dxjs7RW1SHt90q', 'sku_Dxjw1UyrJnG0Cw'),
(25, 'CHATEAU D\'ANGLES - LA CLAPE CLASSIC ROSE 0.75L', 'chateau-dangles-la-clape-classic-rose-075l', 'product_chateau-dangles-la-clape-classic-rose-075l_5bbb9c844a94c.jpg', 14, 2, '2018-09-27 16:07:21', '2018-11-12 17:05:18', 'prod_Dxjs9bRhOIv1qd', 'sku_Dxjw7wFtI6K8VY'),
(26, 'CAMUS VS ELEGANCE 40% 1L', 'camus-vs-elegance-40-1l', 'product_camus-vs-elegance-40-1l_5bbb7e7df2f38.jpg', 29, 3, '2018-09-27 16:07:54', '2018-11-12 17:05:19', 'prod_Dxjs3ahrJTDNcl', 'sku_DxjwvcIqYedhFS'),
(27, 'CAMUS VSOP ELEGANCE 40% 1L', 'camus-vsop-elegance-40-1l', 'product_camus-vsop-elegance-40-1l_5bbb7eb964e16.jpg', 42, 3, '2018-09-27 16:09:22', '2018-11-12 17:05:20', 'prod_DxjsyHbU7Jjl8t', 'sku_Dxjx1oQB1Ca3eg'),
(28, 'LANGLOIS CHATEAU CABERNET DE SAUMUR ROSE 0.75L', 'langlois-chateau-cabernet-de-saumur-rose-075l', 'product_langlois-chateau-cabernet-de-saumur-rose-075l_5bbb9c0ce1f08.jpg', 12, 2, '2018-09-27 16:10:15', '2018-11-12 17:05:22', 'prod_DxjsEqCExcd3mN', 'sku_Dxjxh0yA6PLK5M'),
(29, 'CAMUS XO ELEGANCE GIFT BOX 40% 1L', 'camus-xo-elegance-gift-box-40-1l', 'product_camus-xo-elegance-gift-box-40-1l_5bbb7ef17e41e.jpg', 120, 3, '2018-09-27 16:10:17', '2018-11-12 17:05:23', 'prod_DxjsQRvj72Kbmb', 'sku_DxjxxVIbVLV5Y8'),
(31, 'J.P. CHENET COLOMBART SAUVIGNON (WHITE) 0.75L', 'jp-chenet-colombart-sauvignon-white-075l', 'product_jp-chenet-colombart-sauvignon-white-075l_5bbb9804a0a58.jpg', 6, 2, '2018-09-27 16:11:30', '2018-11-12 17:05:24', 'prod_DxjsQsSXWQrfaL', 'sku_Dxjx1evr3MIgNm'),
(33, 'J.P. CHENET COLOMBART CHARDONNAY 0.75L', 'jp-chenet-colombart-chardonnay-075l', 'product_jp-chenet-colombart-chardonnay-075l_5bbb97cc3faf3.jpg', 6, 2, '2018-09-27 16:12:21', '2018-11-12 17:05:25', 'prod_Dxjsl1fpLTMM7h', 'sku_Dxjxh7wCH5919U'),
(34, 'J.P. CHENET MERLOT (RED) 0.75L', 'jp-chenet-merlot-red-075l', 'product_jp-chenet-merlot-red-075l_5bbb978927d7f.jpg', 6, 2, '2018-09-27 16:13:35', '2018-11-12 17:05:27', 'prod_Dxjsufdh7URLu7', 'sku_DxjxKcKdx6pUWJ'),
(35, 'DAVIDOFF XO EN CARAFFE 40% 0.7L', 'davidoff-xo-en-caraffe-40-07l', 'product_davidoff-xo-en-caraffe-40-07l_5bbb7f81bce78.jpg', 130, 3, '2018-09-27 16:13:48', '2018-11-12 17:05:28', 'prod_DxjsQX7pM6RokK', 'sku_DxjxYtdwRmnWf2'),
(36, 'J.P. CHENET CABERNET-SYRAH (RED) 0.75L', 'jp-chenet-cabernet-syrah-red-075l', 'product_jp-chenet-cabernet-syrah-red-075l_5bbb972859a22.jpg', 6, 2, '2018-09-27 16:14:36', '2018-11-12 17:05:29', 'prod_DxjscSu4caBOHk', 'sku_DxjxzVoyB3Wvi4'),
(37, 'HENNESSY VS 40% 1L', 'hennessy-vs-40-1l', 'product_hennessy-vs-40-1l_5bbb80046db20.jpg', 36, 3, '2018-09-27 16:14:38', '2018-11-12 17:05:30', 'prod_DxjsoPFO0BQZUY', 'sku_DxjxsMMqCmLJqY'),
(38, 'BALLANTINE\'S 40% 1L', 'ballantines-40-1l', 'product_ballantines-40-1l_5bbb69c2bc08e.jpg', 16, 7, '2018-09-27 16:15:37', '2018-11-12 17:05:32', 'prod_DxjsGljNMA2HRD', 'sku_DxjxSUDI3V03N0'),
(39, 'MARTELL VS 40% 1L', 'martell-vs-40-1l', 'product_martell-vs-40-1l_5bbb803fd8c17.jpg', 40, 3, '2018-09-27 16:15:48', '2018-11-12 17:05:33', 'prod_DxjsaAKMKM9O32', 'sku_DxjxNJjaH5BzL7'),
(40, 'J.P. CHENET MEDIUM SWEET ROSE 0.75L', 'jp-chenet-medium-sweet-rose-075l', 'product_jp-chenet-medium-sweet-rose-075l_5bbb96f2d686f.jpg', 6, 2, '2018-09-27 16:16:07', '2018-11-12 17:05:34', 'prod_DxjsZOGADUMlxH', 'sku_DxjxQh4QyE27mR'),
(41, 'BALLANTINE\'S HARD FIRED 40% 1L', 'ballantines-hard-fired-40-1l', 'product_ballantines-hard-fired-40-1l_5bbb69fb069a9.jpg', 24, 7, '2018-09-27 16:16:24', '2018-11-12 17:05:36', 'prod_DxjsTQ0RmJfFKL', 'sku_DxjxzeUhX1qmPd'),
(42, 'MARTELL VSOP 40% IC 1L', 'martell-vsop-40-ic-1l', 'product_martell-vsop-40-ic-1l_5bbb8068a0f41.jpg', 55, 3, '2018-09-27 16:16:27', '2018-11-12 17:05:37', 'prod_DxjsQNRNSpXzlA', 'sku_DxjxkYYrAbgNwZ'),
(43, 'J.P. CHENET MEDIUM SWEET RED 0.75L', 'jp-chenet-medium-sweet-red-075l', 'product_jp-chenet-medium-sweet-red-075l_5bbb96bc9a376.jpg', 6, 2, '2018-09-27 16:17:22', '2018-11-12 17:05:38', 'prod_DxjtL2PCAOD3am', 'sku_Dxjx9xcmMnGISI'),
(44, 'BALLANTINE\'S 12YO 40% IC 1L', 'ballantines-12yo-40-ic-1l', 'product_ballantines-12yo-40-ic-1l_5bbb6c4c5d6c5.jpg', 31, 7, '2018-09-27 16:17:23', '2018-11-12 17:05:39', 'prod_DxjtTzbuOFSmaD', 'sku_DxjxQ7gRzDissW'),
(45, 'MARTELL XO 40%  0.7L', 'martell-xo-40-07l', 'product_martell-xo-40-07l_5bbb80ac8d166.jpg', 140, 3, '2018-09-27 16:17:45', '2018-11-12 17:05:41', 'prod_DxjtOwxhTXcefN', 'sku_DxjxzsTHshfDeO'),
(46, 'BLACK & WHITE 40% 1L', 'black-white-40-1l', 'product_black-white-40-1l_5bbb69319d50a.jpg', 11, 7, '2018-09-27 16:18:03', '2018-11-12 17:05:42', 'prod_DxjtHH6FPs7xcw', 'sku_DxjxxatQdvxI9S'),
(47, 'METAXA 5* 38% 1L', 'metaxa-5-38-1l', 'product_metaxa-5-38-1l_5bbb80f738e87.jpg', 12, 3, '2018-09-27 16:18:30', '2018-11-12 17:05:43', 'prod_Dxjtyswyb9jpDR', 'sku_Dxjx7fqHAKoA49'),
(48, 'RUFFINO CHIANTI DOCG 0.75L', 'ruffino-chianti-docg-075l', 'product_ruffino-chianti-docg-075l_5bbb9b8cacfb2.jpg', 8, 2, '2018-09-27 16:19:03', '2018-11-12 17:05:44', 'prod_DxjtGxgw36rSJO', 'sku_DxjxdSCWecLeqZ'),
(49, 'CHIVAS REGAL EXTRA 40% IC 1L', 'chivas-regal-extra-40-ic-1l', 'product_chivas-regal-extra-40-ic-1l_5bbb6d2c50a24.jpg', 69, 7, '2018-09-27 16:19:08', '2018-11-12 17:05:46', 'prod_DxjtOiIchu9GF5', 'sku_DxjxgzHskPNbcP'),
(50, 'METAXA 7* 40% 1L', 'metaxa-7-40-1l', 'product_metaxa-7-40-1l_5bbb812077f63.jpg', 18, 3, '2018-09-27 16:19:57', '2018-11-12 17:05:47', 'prod_DxjtZswlJIzeSD', 'sku_DxjxB3t0HNbEtK'),
(51, 'RUFFINO MODUS 0.75L', 'ruffino-modus-075l', 'product_ruffino-modus-075l_5bbb9d608c2b3.jpg', 36, 2, '2018-09-27 16:20:16', '2018-11-12 17:05:48', 'prod_DxjtuF6RBhEw3N', 'sku_DxjxlmDSaJAa15'),
(52, 'MEUKOW VSOP 40% 1L', 'meukow-vsop-40-1l', 'product_meukow-vsop-40-1l_5bbb818d41835.jpg', 38, 3, '2018-09-27 16:20:55', '2018-11-12 17:05:49', 'prod_Dxjt0Nw6z6iZjM', 'sku_DxjxrcdVX0XVI6'),
(53, 'CHIVAS REGAL 12YO 40% IC 1L', 'chivas-regal-12yo-40-ic-1l', 'product_chivas-regal-12yo-40-ic-1l_5bbb6bff650f9.jpg', 30, 7, '2018-09-27 16:21:39', '2018-11-12 17:05:51', 'prod_Dxjt4jYjTI2R5M', 'sku_DxjxHGwRBaV3Ur'),
(54, 'RUFFINO CHIANTI CLASSICO RISERVA DUCALE 0.75L', 'ruffino-chianti-classico-riserva-ducale-075l', 'product_ruffino-chianti-classico-riserva-ducale-075l_5bbb9ce039eb2.jpg', 20, 2, '2018-09-27 16:21:51', '2018-11-12 17:05:52', 'prod_DxjtadKDXpUGJA', 'sku_DxjxAIBACbgezm'),
(55, 'RUFFINO CHIANTI RISERVA DUCALE GOLD LABEL 0.75L', 'ruffino-chianti-riserva-ducale-gold-label-075l', 'product_ruffino-chianti-riserva-ducale-gold-label-075l_5bbb9d3db3a66.jpg', 34, 2, '2018-09-27 16:24:42', '2018-11-12 17:05:53', 'prod_Dxjt2LqQExSlvy', 'sku_DxjxlfYdB2PKuq'),
(56, 'VILLA ANTINORI ROSSO 0.75L', 'villa-antinori-rosso-075l', 'product_villa-antinori-rosso-075l_5bbb9d02267f3.jpg', 22, 2, '2018-09-27 16:25:41', '2018-11-12 17:05:55', 'prod_DxjtlS20WXbXWj', 'sku_DxjxDDzmjvcPpE'),
(57, 'CHIVAS REGAL 12YO BROTHER\'S BLEND IC 40% 1L', 'chivas-regal-12yo-brothers-blend-ic-40-1l', 'product_chivas-regal-12yo-brothers-blend-ic-40-1l_5bbb6cec8e5aa.jpg', 42, 7, '2018-09-27 16:26:25', '2018-11-12 17:05:56', 'prod_DxjtdQWZEUyqS7', 'sku_DxjxHQt6xTMpSN'),
(58, 'VILLA ANTINORI BIANCO 0.75L', 'villa-antinori-bianco-075l', 'product_villa-antinori-bianco-075l_5bbb9caa190f2.jpg', 14, 2, '2018-09-27 16:26:30', '2018-11-12 17:05:57', 'prod_Dxjt5gtx640axA', 'sku_DxjxrVgZPi8QDw'),
(62, 'CHIVAS REGAL 18YO 40% IC 6/1L', 'chivas-regal-18yo-40-ic-61l', 'product_chivas-regal-18yo-40-ic-61l_5bbb6d3c1fec2.jpg', 75, 7, '2018-09-27 16:27:30', '2018-11-12 17:05:58', 'prod_DxjtCGeETa9xey', 'sku_DxjxIc1dxVlTKp'),
(64, 'NEDERBURG CABERNET SAUVIGNON 0.75L', 'nederburg-cabernet-sauvignon-075l', 'product_nederburg-cabernet-sauvignon-075l_5bbb999cedbe3.jpg', 7, 2, '2018-09-27 16:28:45', '2018-11-12 17:24:50', 'prod_DxjtqIO4zSRrS0', 'sku_DxkGLs9HGbRoFW'),
(66, 'NEDERBURG CHARDONNAY 0.75L', 'nederburg-chardonnay-075l', 'product_nederburg-chardonnay-075l_5bbb99788141d.jpg', 7, 2, '2018-09-27 16:30:50', '2018-11-12 17:24:51', 'prod_DxjtHSzPdWL4CW', 'sku_DxkGaLyUNaLstO'),
(67, 'MEUKOW XO 40% IC 0.7L', 'meukow-xo-40-ic-07l', 'product_meukow-xo-40-ic-07l_5bbb81d8b70a0.jpg', 91, 3, '2018-09-27 16:30:55', '2018-11-12 17:24:52', 'prod_DxjtZot9H01H0f', 'sku_DxkGWFmPIyOYbq'),
(68, 'POLIGNAC XO 40% GIFT BOX 0.7L', 'polignac-xo-40-gift-box-07l', 'product_polignac-xo-40-gift-box-07l_5bbb8262bd000.jpg', 38, 3, '2018-09-27 16:31:50', '2018-11-12 17:24:54', 'prod_DxjtLrIAdGeT3J', 'sku_DxkGGg8wmK0qEC'),
(69, 'TWO OCEANS CABERNET MERLOT 0.75L', 'two-oceans-cabernet-merlot-075l', 'product_two-oceans-cabernet-merlot-075l_5bbb963a8d714.jpg', 6, 2, '2018-09-27 16:32:25', '2018-11-12 17:24:55', 'prod_DxjtNBs9mpPVot', 'sku_DxkGdxyvZoeLNt'),
(71, 'FREIXENET TIERRA DE CASTILLA MIA (RED) 0.75L', 'freixenet-tierra-de-castilla-mia-red-075l', 'product_freixenet-tierra-de-castilla-mia-red-075l_5bbb93f0d0a5f.jpg', 5, 2, '2018-09-27 16:33:21', '2018-11-12 17:24:56', 'prod_DxjtbR6arY7oaW', 'sku_DxkGVL8Mfp3gA0'),
(72, 'ROYAL SALUTE 21YO IC 40% 0.7L', 'royal-salute-21yo-ic-40-07l', 'product_royal-salute-21yo-ic-40-07l_5bbb6d4ac862a.jpg', 140, 7, '2018-09-27 16:33:41', '2018-11-12 17:24:57', 'prod_DxjtwW9YALfKQV', 'sku_DxkGKghTxx7TJb'),
(73, 'CLAYMORE WHISKY 40% 1L', 'claymore-whisky-40-1l', 'product_claymore-whisky-40-1l_5bbb67ebc5e45.jpg', 5, 7, '2018-09-27 16:34:26', '2018-11-12 17:24:59', 'prod_Dxjt8WSVcOwftP', 'sku_DxkGTKn4ArBCpL'),
(74, 'REMY MARTIN PRIME CELLAR SELECTION 16 40% IC 1L', 'remy-martin-prime-cellar-selection-16-40-ic-1l', 'product_remy-martin-prime-cellar-selection-16-40-ic-1l_5bbb8291ae50a.jpg', 54, 3, '2018-09-27 16:36:34', '2018-11-12 17:25:00', 'prod_DxjtG0X7MY57HT', 'sku_DxkGQaQTljhH6p'),
(75, 'VETERANO 30% 1L', 'veterano-30-1l', 'product_veterano-30-1l_5bbb82e006328.jpg', 8, 3, '2018-09-27 16:37:17', '2018-11-12 17:25:01', 'prod_DxjtReXOM16WaO', 'sku_DxkGhnjRwD9hOq'),
(76, 'W.GRANT\'S DISTILLERY EDITION 46.3% IC 1L', 'wgrants-distillery-edition-463-ic-1l', 'product_wgrants-distillery-edition-463-ic-1l_5bbb69adc3cce.jpg', 15, 7, '2018-09-27 16:39:38', '2018-11-12 17:25:03', 'prod_DxjtilP7i4OSrr', 'sku_DxkGjvUADdxrHe'),
(77, 'Budweiser Budvar Original 5%', 'budweiser-budvar-original-5', 'product_budweiser-budvar-original-5_5bbb8a925e5e5.jpg', 0.9, 12, '2018-09-27 16:41:27', '2018-11-12 17:25:04', 'prod_DxjtjoaQFBAA1J', 'sku_DxkG0Bn0qTXneW'),
(78, 'Fax Extra Strong 10%', 'fax-extra-strong-10', 'product_fax-extra-strong-10_5bbb8b08158c2.jpg', 1.9, 12, '2018-09-27 16:42:03', '2018-11-12 17:25:05', 'prod_DxjtF83ZGowGh0', 'sku_DxkGlRLAfeUqFF'),
(79, 'Faxe Premium 5%', 'faxe-premium-5', 'product_faxe-premium-5_5bbb8af67c8c4.jpg', 1.7, 12, '2018-09-27 16:42:34', '2018-11-12 17:25:06', 'prod_Dxjtm3PcFg8YJr', 'sku_DxkGKvSg8eYUon'),
(80, 'Heineken Original 5.5%', 'heineken-original-55', 'product_heineken-original-55_5bbb8a5792e9d.jpg', 0.9, 12, '2018-09-27 16:43:09', '2018-11-12 17:25:07', 'prod_DxjtOmbPaGbeBm', 'sku_DxkGS6yVkkp18K'),
(81, 'Krombacher Pils 4.8%', 'krombacher-pils-48', 'product_krombacher-pils-48_5bbb8ad834dc3.jpg', 1.6, 12, '2018-09-27 16:44:05', '2018-11-12 17:25:09', 'prod_DxjtAWceJPapU7', 'sku_DxkGIzOXqsgnFZ'),
(82, 'Paulaner Hefe-WeiBbir 5.5%', 'paulaner-hefe-weibbir-55', 'product_paulaner-hefe-weibbir-55_5bbb8abf03f50.jpg', 1.2, 12, '2018-09-27 16:44:36', '2018-11-12 17:25:10', 'prod_DxjtUzJBnba3fT', 'sku_DxkG5csvnlR2Ha'),
(83, 'Radeberger Pilsener 4.8%', 'radeberger-pilsener-48', 'product_radeberger-pilsener-48_5bbb8b1c3a094.jpg', 2.3, 12, '2018-09-27 16:45:07', '2018-11-12 17:25:11', 'prod_DxjtdIGxFmJcbh', 'sku_DxkG5FBAZKvPur'),
(84, 'San Miguel Especisl 5.4%', 'san-miguel-especisl-54', 'product_san-miguel-especisl-54_5bbb8aa70a3b7.jpg', 0.9, 12, '2018-09-27 16:45:32', '2018-11-12 17:25:13', 'prod_DxjtGOQl73XrwO', 'sku_DxkG3eZXlE0Iae'),
(85, 'BACARDI 8YO TIN BOX 40% 1L', 'bacardi-8yo-tin-box-40-1l', 'product_bacardi-8yo-tin-box-40-1l_5bbb841d615a8.jpg', 30, 8, '2018-09-27 16:46:21', '2018-11-12 17:25:14', 'prod_Dxjt8GrAl9Om7X', 'sku_DxkGKSsgAmXpxY'),
(86, 'BACARDI CARTA BLANCA 40% 1L', 'bacardi-carta-blanca-40-1l', 'product_bacardi-carta-blanca-40-1l_5bbb84543cd9c.jpg', 14, 8, '2018-09-27 16:47:22', '2018-11-12 17:25:15', 'prod_Dxjtj4BeGWQkHb', 'sku_DxkG6Rvmob0lxj'),
(87, 'BACARDI CARTA NEGRA 40% 1L', 'bacardi-carta-negra-40-1l', 'product_bacardi-carta-negra-40-1l_5bbb84e13d859.jpg', 15, 8, '2018-09-27 16:48:25', '2018-11-12 17:25:17', 'prod_DxjtpM0rzJF5NS', 'sku_DxkG4SW35D5JAp'),
(88, 'BACARDI CARTA ORO 40% 1L', 'bacardi-carta-oro-40-1l', 'product_bacardi-carta-oro-40-1l_5bbb852860699.jpg', 15, 8, '2018-09-27 16:49:10', '2018-11-12 17:25:18', 'prod_Dxjtf6Nd3Fs7hU', 'sku_DxkG7QCk5HNVzn'),
(89, 'CAPT MORGAN DARK 40% 1L', 'capt-morgan-dark-40-1l', 'product_capt-morgan-dark-40-1l_5bbb8572ebea6.jpg', 16.5, 8, '2018-09-27 16:50:10', '2018-11-12 17:25:20', 'prod_DxjtrQloHlLsyS', 'sku_DxkHLze2A5a2Fc'),
(90, 'HAVANA CLUB 3YO 40% 1L', 'havana-club-3yo-40-1l', 'product_havana-club-3yo-40-1l_5bbb85f8123d7.jpg', 15, 8, '2018-09-27 16:50:56', '2018-11-12 17:25:21', 'prod_DxjtLmcMYo6pch', 'sku_DxkH3AEb3UW5SS'),
(91, 'W.GRANT\'S FAMILY RESERVE 43% 1L', 'wgrants-family-reserve-43-1l', 'product_wgrants-family-reserve-43-1l_5bbb6943c17f4.jpg', 12, 7, '2018-09-27 16:51:08', '2018-11-12 17:25:23', 'prod_DxjtgJ1p7FLV4F', 'sku_DxkHifvQQE6MEl'),
(92, 'HAVANA CLUB 7YO 40% GIFTBOX 1L', 'havana-club-7yo-40-giftbox-1l', 'product_havana-club-7yo-40-giftbox-1l_5bbb87e1a818a.jpg', 30, 8, '2018-09-27 16:51:27', '2018-11-12 17:25:24', 'prod_DxjtFRQKnZJpJv', 'sku_DxkHW878Ot70Mt'),
(93, 'J.WALKER BLACK LABEL 40% IC 1L', 'jwalker-black-label-40-ic-1l', 'product_jwalker-black-label-40-ic-1l_5bbb6c14a8c86.jpg', 29, 7, '2018-09-27 16:52:14', '2018-11-12 17:25:25', 'prod_DxjtjZ129rc3RJ', 'sku_DxkHzN09WpoYZe'),
(94, 'J.WALKER DOUBLE BLACK 40% IC 1L', 'jwalker-double-black-40-ic-1l', 'product_jwalker-double-black-40-ic-1l_5bbb6c24ea80d.jpg', 41, 7, '2018-09-27 16:53:37', '2018-11-12 17:25:26', 'prod_Dxjt3dkYUp2kdN', 'sku_DxkHZvajA7ehyn'),
(95, 'J.WALKER GOLD RESERVE 40% IC 1L', 'jwalker-gold-reserve-40-ic-1l', 'product_jwalker-gold-reserve-40-ic-1l_5bbb6d1b75d37.jpg', 55, 7, '2018-09-27 16:54:30', '2018-11-12 17:25:28', 'prod_DxjtKroSmuhTL1', 'sku_DxkHZvWh41sZNy'),
(96, 'J.WALKER RED LABEL 40% 1L', 'jwalker-red-label-40-1l', 'product_jwalker-red-label-40-1l_5bbb69a00921f.jpg', 13, 7, '2018-09-27 16:55:14', '2018-11-12 17:25:29', 'prod_DxjtQET4lKL7fC', 'sku_DxkHD7Um9VPk54'),
(97, 'HANKEY BANNISTER 40% IC 1L', 'hankey-bannister-40-ic-1l', 'product_hankey-bannister-40-ic-1l_5bbb68b7d54ce.jpg', 7, 7, '2018-09-27 16:57:02', '2018-11-12 17:25:30', 'prod_DxjuuYjfG3j5bF', 'sku_DxkH3wxjfDvmiU'),
(98, 'HIGH COMMISSIONER 40% 1L', 'high-commissioner-40-1l', 'product_high-commissioner-40-1l_5bbb68a457058.jpg', 6.5, 7, '2018-09-27 16:58:03', '2018-11-12 17:25:31', 'prod_DxjuyEEDTyhGw1', 'sku_DxkH3fqRBAMGYS'),
(99, 'ABSOLUT BLUE 40% 1L', 'absolut-blue-40-1l', 'product_absolut-blue-40-1l_5bbb8b5eed90f.jpg', 10, 4, '2018-09-27 17:02:54', '2018-11-12 17:25:33', 'prod_Dxju07iVvZWy5B', 'sku_DxkHdymTZWhbUr'),
(100, 'ABSOLUT 100 50% 1L', 'absolut-100-50-1l', 'product_absolut-100-50-1l_5bbb8b95c0123.jpg', 22, 4, '2018-09-27 17:03:50', '2018-11-12 17:25:34', 'prod_Dxju93gaFVScNd', 'sku_DxkHZY3q2siJVM'),
(101, 'BELUGA NOBLE 40% 1L', 'beluga-noble-40-1l', 'product_beluga-noble-40-1l_5bbb8bd84035e.jpg', 24, 4, '2018-09-27 17:04:33', '2018-11-12 17:25:35', 'prod_DxjunUYUfMoRh9', 'sku_DxkHj6L8ueADco'),
(102, 'BELUGA NOBLE CELEBRATION 40% 1L', 'beluga-noble-celebration-40-1l', 'product_beluga-noble-celebration-40-1l_5bbb8c160e973.jpg', 32, 4, '2018-09-27 17:05:10', '2018-11-12 17:25:36', 'prod_DxjuNjTXnskIch', 'sku_DxkHVNijXKQMNw'),
(103, 'BELUGA TRANSATLANTIC RACING 40% WITH GLASS 0.7L', 'beluga-transatlantic-racing-40-with-glass-07l', 'product_beluga-transatlantic-racing-40-with-glass-07l_5bbb8c406c40a.jpg', 30, 4, '2018-09-27 17:06:01', '2018-11-12 17:25:38', 'prod_DxjuvFWHQ8B0OY', 'sku_DxkHJY00zBmRHR'),
(104, 'DANZKA 40% 1L', 'danzka-40-1l', 'product_danzka-40-1l_5bbb8c658d2e8.jpg', 10, 4, '2018-09-27 17:06:31', '2018-11-12 17:25:39', 'prod_DxjuGfJwdHD9xw', 'sku_DxkHWH3G42DgzV'),
(105, 'FINLANDIA 40% 1L', 'finlandia-40-1l', 'product_finlandia-40-1l_5bbb8c8e4bc4d.jpg', 11, 4, '2018-09-27 17:07:09', '2018-11-12 17:25:40', 'prod_DxjuEwWSyBqHt6', 'sku_DxkHYc0QVpFyYV'),
(106, 'GREY GOOSE 40% 1L', 'grey-goose-40-1l', 'product_grey-goose-40-1l_5bbb8cb6b3e37.jpg', 44, 4, '2018-09-27 17:07:46', '2018-11-12 17:25:42', 'prod_DxjueRd2tZuahn', 'sku_DxkH7xWXn5Ag5k'),
(107, 'GREY GOOSE DUCASSE 40% IC 0.7L', 'grey-goose-ducasse-40-ic-07l', 'product_grey-goose-ducasse-40-ic-07l_5bbb8cdc84f26.jpg', 70, 4, '2018-09-27 17:08:31', '2018-11-12 17:25:43', 'prod_DxjuCBtHNJ45pb', 'sku_DxkH7YwOdp2uqd'),
(108, 'JELZIN 37.5% BAG IN BOX 3L', 'jelzin-375-bag-in-box-3l', 'product_jelzin-375-bag-in-box-3l_5bc6365a789fa.jpg', 9, 4, '2018-09-27 17:09:24', '2018-11-12 17:25:44', 'prod_DxjuWug2aGAaZ2', 'sku_DxkHQgPUQejxmc'),
(109, 'JELZIN 37.5% 1L', 'jelzin-375-1l', 'product_jelzin-375-1l_5bbb8d6f28847.jpg', 3, 4, '2018-09-27 17:10:20', '2018-11-12 17:25:46', 'prod_DxjuFkoSGUkWMP', 'sku_DxkHLj3orLKaps'),
(110, 'MOSKOVSKAYA VODKA 40% 1L', 'moskovskaya-vodka-40-1l', 'product_moskovskaya-vodka-40-1l_5bbb8d9e0fc88.jpg', 9, 4, '2018-09-27 17:10:59', '2018-11-12 17:25:47', 'prod_DxjuIEaggKmipN', 'sku_DxkHIsr1ZOOhbF'),
(111, 'RUSSIAN STANDARD 40% 1L', 'russian-standard-40-1l', 'product_russian-standard-40-1l_5bbb8dec3cc21.jpg', 10, 4, '2018-09-27 17:11:42', '2018-11-12 17:25:48', 'prod_DxjuTtvrjPm8Dn', 'sku_DxkHzIepBW3uD8'),
(112, 'JOHN BARR RESERVE 40% 1L', 'john-barr-reserve-40-1l', 'product_john-barr-reserve-40-1l_5bbb68ef64f8e.jpg', 9, 7, '2018-09-27 17:11:50', '2018-11-12 17:25:49', 'prod_DxjulGHUAwUkob', 'sku_DxkHhDovPKnNiP'),
(113, 'RUSSIAN STANDARD PLATINUM 40% 1L', 'russian-standard-platinum-40-1l', 'product_russian-standard-platinum-40-1l_5bbb8e2f852a1.jpg', 20, 4, '2018-09-27 17:12:17', '2018-11-12 17:25:51', 'prod_Dxjusz5T6vep5y', 'sku_DxkHKDmCFYtv1x'),
(114, 'KING ROBERT II 43% 1L', 'king-robert-ii-43-1l', 'product_king-robert-ii-43-1l_5bbb68c494eb1.jpg', 8, 7, '2018-09-27 17:12:30', '2018-11-12 17:25:52', 'prod_DxjuSOlX3Xcwfx', 'sku_DxkHBKtDu9VXXV'),
(115, 'STOLICHNAYA 40% 1L', 'stolichnaya-40-1l', 'product_stolichnaya-40-1l_5bbb8e99bdf51.jpg', 10, 4, '2018-09-27 17:12:51', '2018-11-12 17:25:53', 'prod_DxjuSJAYYmEPOq', 'sku_DxkH4IFcEkCzxu'),
(116, 'LAUDER\'S FINEST 40% 1L', 'lauders-finest-40-1l', 'product_lauders-finest-40-1l_5bbb697ddd2f4.jpg', 8, 7, '2018-09-27 17:13:09', '2018-11-12 17:25:55', 'prod_Dxju2Otz5X9AGT', 'sku_DxkHkaMpAoXQ2X'),
(117, 'TEACHER\'S 40% 1L', 'teachers-40-1l', 'product_teachers-40-1l_5bbb696e55da3.jpg', 14, 7, '2018-09-27 17:13:40', '2018-11-12 17:25:56', 'prod_DxjulDv2wHDPsC', 'sku_DxkHhubpKdcSmj'),
(118, 'THE DIMPLE 15YO 43% IC 1L', 'the-dimple-15yo-43-ic-1l', 'product_the-dimple-15yo-43-ic-1l_5bbb6cfa3a415.jpg', 48, 7, '2018-09-27 17:15:46', '2018-11-12 17:25:58', 'prod_DxjuCiPdvTmdUk', 'sku_DxkHzAdgDrqRE8'),
(119, 'WHYTE & MACKAY 40% 1L', 'whyte-mackay-40-1l', 'product_whyte-mackay-40-1l_5bbb691105580.jpg', 10, 7, '2018-09-27 17:16:19', '2018-11-12 17:25:59', 'prod_DxjuIKm41xiw4M', 'sku_DxkHifrV0SdLXC'),
(120, 'DALMORE VALOUR 40% IC 1L', 'dalmore-valour-40-ic-1l', 'product_dalmore-valour-40-ic-1l_5bbb6d08282d5.jpg', 53, 7, '2018-09-27 17:17:21', '2018-11-12 17:26:01', 'prod_DxjupYXF3G8Tnp', 'sku_DxkHq3ku8ZF9ZZ'),
(121, 'GLENFARCLAS 12YO 43% IC 1L', 'glenfarclas-12yo-43-ic-1l', 'product_glenfarclas-12yo-43-ic-1l_5bbb6c5c4b312.jpg', 31, 7, '2018-09-27 17:18:24', '2018-11-12 17:26:02', 'prod_Dxjue18NG7eFA1', 'sku_DxkHIErFVmtzn6'),
(122, 'GLENFIDDICH CASK COLLECT. SELECT CASK 40% IC 1L', 'glenfiddich-cask-collect-select-cask-40-ic-1l', 'product_glenfiddich-cask-collect-select-cask-40-ic-1l_5bbb6cd2625ec.jpg', 39, 7, '2018-09-27 17:29:38', '2018-11-12 17:26:03', 'prod_DxjuhGthtMexRP', 'sku_DxkHTzYpufMNwX'),
(123, 'GLENLIVET MASTER DISTILLER\'S RESERVE 40% IC 1L', 'glenlivet-master-distillers-reserve-40-ic-1l', 'product_glenlivet-master-distillers-reserve-40-ic-1l_5bbb6cb00fc0c.jpg', 37, 7, '2018-09-27 17:30:21', '2018-11-12 17:26:04', 'prod_DxjuVYIdht6btV', 'sku_DxkHNRSea62VT8'),
(124, 'MONKEY SHOULDER 40% 1L', 'monkey-shoulder-40-1l', 'product_monkey-shoulder-40-1l_5bbb6c928b656.jpg', 36, 7, '2018-09-27 17:30:57', '2018-11-12 17:26:07', 'prod_DxjukHsVMo3Bi2', 'sku_DxkHPCtIQeydda'),
(125, 'CONNEMARA 40% TUBE 0.7L', 'connemara-40-tube-07l', 'product_connemara-40-tube-07l_5bbb6bedadfbc.jpg', 27, 7, '2018-09-27 17:31:45', '2018-11-12 17:26:08', 'prod_Dxjugs86jn5w13', 'sku_DxkHcSsKzm37uv'),
(126, 'JAMESON 40% 1L', 'jameson-40-1l', 'product_jameson-40-1l_5bbb69ec3cef7.jpg', 19, 7, '2018-09-27 17:34:37', '2018-11-12 17:26:09', 'prod_DxjuxpFzinpuD2', 'sku_DxkHVdg4BzvGux'),
(127, 'JAMESON SIGNATURE RESERVE 40% CANISTER 1L', 'jameson-signature-reserve-40-canister-1l', 'product_jameson-signature-reserve-40-canister-1l_5bbb6cc0e1e11.jpg', 38, 7, '2018-09-27 17:35:16', '2018-11-12 17:26:10', 'prod_DxjuaqPmk3t2um', 'sku_DxkH5lbLTn6fV6'),
(128, 'JAMESON CASKMATES 40% 1L', 'jameson-caskmates-40-1l', 'product_jameson-caskmates-40-1l_5bbb6bd379f8b.jpg', 25, 7, '2018-09-27 17:35:43', '2018-11-12 17:26:12', 'prod_Dxjuo4y4fbd77y', 'sku_DxkHM7387toNp5'),
(129, 'LAMBAY SMALLK BATCH BLEND 40% 1L', 'lambay-smallk-batch-blend-40-1l', 'product_lambay-smallk-batch-blend-40-1l_5bbb6c9f40761.jpg', 36, 7, '2018-09-27 17:36:19', '2018-11-12 17:26:13', 'prod_Dxjuyo2XH7jlgL', 'sku_DxkH5Wkqzibqz4'),
(130, 'TULLAMORE DEW 40% 1L', 'tullamore-dew-40-1l', 'product_tullamore-dew-40-1l_5bbb69cff169b.jpg', 17, 7, '2018-09-27 17:37:41', '2018-11-12 17:26:14', 'prod_DxjuDcKmKhIuTC', 'sku_DxkHLW9VAm5CQD'),
(131, 'GENTLEMAN JACK 40% 1L', 'gentleman-jack-40-1l', 'product_gentleman-jack-40-1l_5bbb6c34b3f9b.jpg', 30, 7, '2018-09-27 17:38:14', '2018-11-12 17:26:15', 'prod_DxjuCthb9p1j1l', 'sku_DxkH9hakDvWAKT'),
(132, 'JACK DANIEL\'S 40% 1L', 'jack-daniels-40-1l', 'product_jack-daniels-40-1l_5bbb6ac1e48f0.jpg', 20, 7, '2018-09-27 17:38:44', '2018-11-12 17:26:17', 'prod_DxjuXoAxe9c42s', 'sku_DxkHGDx35PHBvb'),
(133, 'JACK DANIEL\'S TENNESSEE HONEY 35% 1L', 'jack-daniels-tennessee-honey-35-1l', 'product_jack-daniels-tennessee-honey-35-1l_5bbb6ad4c3a6f.jpg', 23, 7, '2018-09-27 17:39:14', '2018-11-12 17:26:18', 'prod_Dxju5PPPnfTcwe', 'sku_DxkHl22j3LRWhy'),
(134, 'JIM BEAM SIGNATURE CRAFT 43% 1L', 'jim-beam-signature-craft-43-1l', 'product_jim-beam-signature-craft-43-1l_5bbb6c78a4f1b.jpg', 34, 7, '2018-09-27 17:39:47', '2018-11-12 17:26:19', 'prod_Dxju1aSwXHKVM3', 'sku_DxkH1lVTBR63H3'),
(135, 'JIM BEAM 40% 1L', 'jim-beam-40-1l', 'product_jim-beam-40-1l_5bbb6951e91e4.jpg', 13, 7, '2018-09-27 17:40:17', '2018-11-12 17:26:20', 'prod_Dxju58WTl2oYsi', 'sku_DxkIOKneibslxX'),
(136, 'JIM BEAM DEVIL\'S CUT 45% 1L', 'jim-beam-devils-cut-45-1l', 'product_jim-beam-devils-cut-45-1l_5bbb6bb4d7701.jpg', 24, 7, '2018-09-27 17:40:46', '2018-11-12 17:26:22', 'prod_Dxjuqc3ILaN1tk', 'sku_DxkIXMIRmmgA1O'),
(137, 'MAKER\'S MARK 45% 1L', 'makers-mark-45-1l', 'product_makers-mark-45-1l_5bbb6c8582b18.jpg', 27, 7, '2018-09-27 17:41:12', '2018-11-12 17:26:23', 'prod_Dxjump1qrnQADi', 'sku_DxkIgucxb8ssDy'),
(138, 'WOODFORD RESERVE 43.2% 1L', 'woodford-reserve-432-1l', 'product_woodford-reserve-432-1l_5bbb6c6934991.jpg', 28, 7, '2018-09-27 17:41:42', '2018-11-12 17:26:24', 'prod_DxjuY8joBallUQ', 'sku_DxkI7H3FXdVMRm'),
(139, 'BLACK VELVET 40% 1L', 'black-velvet-40-1l', 'product_black-velvet-40-1l_5bbb68d86dbb7.jpg', 8, 7, '2018-09-27 17:42:13', '2018-11-12 17:26:26', 'prod_DxjuNC26LppEnQ', 'sku_DxkIkjy4b72V3y'),
(140, 'BLACK VELVET RESERVE 40% 1L', 'black-velvet-reserve-40-1l', 'product_black-velvet-reserve-40-1l_5bbb6921a37c9.jpg', 12, 7, '2018-09-27 17:42:44', '2018-11-12 17:26:27', 'prod_DxjukKk0nBcuKJ', 'sku_DxkIWo7o4WDsgS'),
(141, 'CANADIAN CLUB 40% 1L', 'canadian-club-40-1l', 'product_canadian-club-40-1l_5bbb698c33503.jpg', 15, 7, '2018-09-27 17:43:12', '2018-11-12 17:26:28', 'prod_Dxju5NrULSUj2G', 'sku_DxkI6HTRSe05TY'),
(142, 'CANADIAN CLUB CLASSIC 40% 1L', 'canadian-club-classic-40-1l', 'product_canadian-club-classic-40-1l_5bbb69df7321f.jpg', 22, 7, '2018-09-27 17:43:38', '2018-11-12 17:26:29', 'prod_DxjuonXsmo4iVS', 'sku_DxkIySzQOMLj5K'),
(143, 'CROWN ROYAL 40% IC 1L', 'crown-royal-40-ic-1l', 'product_crown-royal-40-ic-1l_5bbb6bc5a9b69.jpg', 25, 7, '2018-09-27 17:44:09', '2018-11-12 17:26:30', 'prod_DxjudwgOAF5iW9', 'sku_DxkI0ahFPRBtGA'),
(144, 'BEEFEATER 47% 1L', 'beefeater-47-1l', 'product_beefeater-47-1l_5bbb8d23d82e9.jpg', 14, 9, '2018-10-08 11:00:23', '2018-11-12 17:26:32', 'prod_DxjvIgWEzlYhNU', 'sku_DxkInc8VPS4Jc3'),
(145, 'BULLDOG GIN 40% 1L', 'bulldog-gin-40-1l', 'product_bulldog-gin-40-1l_5bbb8d4d32c93.jpg', 24, 9, '2018-10-08 11:01:03', '2018-11-12 17:26:33', 'prod_DxjvLf8jRumcgt', 'sku_DxkIzRFbhVbrjr'),
(146, 'BOMBAY SAPPHIRE 47% 1L', 'bombay-sapphire-47-1l', 'product_bombay-sapphire-47-1l_5bbb8d7c1eadb.jpg', 19, 9, '2018-10-08 11:01:50', '2018-11-12 17:26:34', 'prod_Dxjv1X5pNjI0CR', 'sku_DxkIE4ivjwlMpR'),
(147, 'STAR OF BOMBAY 47.5% 1L', 'star-of-bombay-475-1l', 'product_star-of-bombay-475-1l_5bbb8db41486e.jpg', 33, 9, '2018-10-08 11:02:47', '2018-11-12 17:26:35', 'prod_DxjvIC62F2ILia', 'sku_DxkI0kBh3pCnbe'),
(148, 'GORDON\'S DRY GIN 47.3% 1L', 'gordons-dry-gin-473-1l', 'product_gordons-dry-gin-473-1l_5bbb8ddd95e1d.jpg', 10, 9, '2018-10-08 11:03:28', '2018-11-12 17:26:37', 'prod_DxjvWsd3BnU9oW', 'sku_DxkIikE5Ov5fmI'),
(149, 'HENDRICK\'S GIN 44% 1L', 'hendricks-gin-44-1l', 'product_hendricks-gin-44-1l_5bbb8e02efac5.jpg', 40, 9, '2018-10-08 11:04:04', '2018-11-12 17:26:38', 'prod_DxjvN0lO5qRRB1', 'sku_DxkIPZucE7nGc4'),
(150, 'KINGSTON GIN 43% 1L', 'kingston-gin-43-1l', 'product_kingston-gin-43-1l_5bbb8e295fcdf.jpg', 5, 9, '2018-10-08 11:04:44', '2018-11-12 17:26:39', 'prod_DxjvUYfif56Zz2', 'sku_DxkIwT43qaIhMa'),
(156, 'CAMPARI 28.5% 1L', 'campari-285-1l', 'product_campari-285-1l_5bbb98c07ae71.jpg', 12, 11, '2018-10-08 11:49:55', '2018-11-12 17:26:40', 'prod_DxjvtrurRHvGdP', 'sku_DxkItcPRroqUTo'),
(157, 'BECHEROVKA 38% 1L', 'becherovka-38-1l', 'product_becherovka-38-1l_5bbb99badbb2e.jpg', 11, 11, '2018-10-08 11:54:05', '2018-11-12 17:26:42', 'prod_DxjvTCseWoKQiP', 'sku_DxkIRKg61r0NA1'),
(158, 'SANDEMAN MEDIUM DRY 15% 1L', 'sandeman-medium-dry-15-1l', 'product_sandeman-medium-dry-15-1l_5bbb9a3a9da6c.jpg', 11, 11, '2018-10-08 11:56:13', '2018-11-12 17:26:43', 'prod_DxjvRVRAuTrn75', 'sku_DxkI9jzhcfKlvp'),
(159, 'JOSE CUERVO ESPECIAL REPOSADO 38% 1L', 'jose-cuervo-especial-reposado-38-1l', 'product_jose-cuervo-especial-reposado-38-1l_5bbb9b3a85769.jpg', 19, 11, '2018-10-08 12:00:28', '2018-11-12 17:26:44', 'prod_Dxjv9ClD9GzBor', 'sku_DxkIVpt12npuFO'),
(160, 'JOSE CUERVO ESPECIAL SILVER 38% 1L', 'jose-cuervo-especial-silver-38-1l', 'product_jose-cuervo-especial-silver-38-1l_5bbb9bdf45e6f.jpg', 15, 11, '2018-10-08 12:03:14', '2018-11-12 17:26:46', 'prod_DxjvbmTC9y7Tl0', 'sku_DxkI5dBXMgeVtG'),
(161, 'OLMECA BLANCO 38% 1L', 'olmeca-blanco-38-1l', 'product_olmeca-blanco-38-1l_5bbb9c64d46c3.jpg', 23, 11, '2018-10-08 12:05:27', '2018-11-12 17:26:47', 'prod_Dxjv11L2qYIp2X', 'sku_DxkII8p2CYzEk4'),
(162, 'OLMECA GOLD 38% 1L', 'olmeca-gold-38-1l', 'product_olmeca-gold-38-1l_5bbb9cb6b8aac.jpg', 24, 11, '2018-10-08 12:06:49', '2018-11-12 17:26:48', 'prod_DxjvX9rDtW3XIl', 'sku_DxkIaajjZs0XS1'),
(163, 'SAUZA GOLD EXTRA 38% 1L', 'sauza-gold-extra-38-1l', 'product_sauza-gold-extra-38-1l_5bbb9d0da7add.jpg', 15, 11, '2018-10-08 12:08:15', '2018-11-12 17:26:49', 'prod_DxjvbjWWKbJctM', 'sku_DxkIi7AAcsudOm'),
(164, 'SIERRA REPOSADO 38% 1L', 'sierra-reposado-38-1l', 'product_sierra-reposado-38-1l_5bbb9d7b46250.jpg', 16, 11, '2018-10-08 12:10:05', '2018-11-12 17:26:51', 'prod_Dxjv8NPDPQkilo', 'sku_DxkI74liCZXIH0'),
(165, 'SIERRA SILVER 38% 1L', 'sierra-silver-38-1l', 'product_sierra-silver-38-1l_5bbb9dbed7245.jpg', 15, 11, '2018-10-08 12:11:13', '2018-11-12 17:26:52', 'prod_DxjvR04U1r9ClV', 'sku_DxkIrQCbcZK6QR'),
(166, 'ABSENTE 55 \"VAN GOGH\" IC 55% 0.7L', 'absente-55-van-gogh-ic-55-07l', 'product_absente-55-van-gogh-ic-55-07l_5bbb9e8ba9664.jpg', 17, 11, '2018-10-08 12:14:38', '2018-11-12 17:03:42', 'prod_Dxjvz1ge8w3p4o', 'sku_DxjnRuYczjG2Rg'),
(167, 'YENI RAKI 45% 1L', 'yeni-raki-45-1l', 'product_yeni-raki-45-1l_5bbb9fb54a3c1.jpg', 18, 11, '2018-10-08 12:19:35', '2018-11-12 17:26:53', 'prod_DxjvtnolQdWk18', 'sku_DxkIed5faPC87b'),
(168, 'APEROL 11% 1L', 'aperol-11-1l', 'product_aperol-11-1l_5bbba00f6333e.jpg', 12, 11, '2018-10-08 12:21:05', '2018-11-12 17:26:55', 'prod_DxjvqXleQbxWcm', 'sku_DxkIs6bSNuPpGd'),
(169, 'AVERNA 29% 1L', 'averna-29-1l', 'product_averna-29-1l_5bbba0767d8bf.jpg', 17, 11, '2018-10-08 12:22:48', '2018-11-12 17:26:56', 'prod_DxjvgP0HDNvyzK', 'sku_DxkIJzD6p4gUGl'),
(170, 'VOGUE SUPERSLIMS (LA CIG) VERTE ORIGINALE 20/200 ENG block', 'vogue-superslims-la-cig-verte-originale-20200-eng-block', 'product_vogue-superslims-la-cig-verte-originale-20200-eng_5bc63dd14fcc9.jpg', 16, 13, '2018-10-16 13:36:50', '2018-11-12 17:26:57', 'prod_Dxjvj8gkIyqBkF', 'sku_DxkIIL6QCCNfp4'),
(171, 'VOGUE SUPERSLIMS (LA CIG) LILAS 20/200 ENG block', 'vogue-superslims-la-cig-lilas-20200-eng-block', 'product_vogue-superslims-la-cig-lilas-20200-eng_5bc63f4bb296a.jpg', 16, 13, '2018-10-16 13:43:08', '2018-11-12 17:26:58', 'prod_DxjvXA0qsRUbFF', 'sku_DxkIq6z2KaczCc'),
(172, 'VOGUE SUPERSLIMS (LA CIG) BLEUE 20/200 ENG block', 'vogue-superslims-la-cig-bleue-20200-eng-block', 'product_vogue-superslims-la-cig-bleue-20200-eng_5bc63f65aab01.jpg', 16, 13, '2018-10-16 13:43:34', '2018-11-12 17:27:00', 'prod_DxjvvmtHoDjq6L', 'sku_DxkIgX7eeyr47n'),
(173, 'ROTHMANS INTERNATIONAL 20/200 ENG block', 'rothmans-international-20200-eng-block', 'product_rothmans-international-20200-eng_5bc63f91d1593.jpg', 16, 13, '2018-10-16 13:44:19', '2018-11-12 17:27:01', 'prod_DxjvfBd7b6IOOE', 'sku_DxkIrf6oraLXUp'),
(174, 'ROTHMANS BLUE KS 20/200 ENG block', 'rothmans-blue-ks-20200-eng-block', 'product_rothmans-blue-ks-20200-eng_5bc63fdec39cd.jpg', 10, 13, '2018-10-16 13:45:35', '2018-11-12 17:27:02', 'prod_Dxjvdp65gNdw8d', 'sku_DxkIbpi0IXtZiK'),
(175, 'PALL MALL RED KS 20/200 ENG block', 'pall-mall-red-ks-20200-eng-block', 'product_pall-mall-red-ks-20200-eng_5bc64038cc519.jpg', 9, 13, '2018-10-16 13:47:05', '2018-11-12 17:27:03', 'prod_Dxjv8mUkJwmHjP', 'sku_DxkIvaFbWSWoA2'),
(176, 'PALL MALL BLUE KS 20/200 ENG block', 'pall-mall-blue-ks-20200-eng-block', 'product_pall-mall-blue-ks-20200-eng_5bc64053b89e9.jpg', 9, 13, '2018-10-16 13:47:32', '2018-11-12 17:27:05', 'prod_DxjvG5NPI1rY07', 'sku_DxkIFFYekPhPwg'),
(177, 'LUCKY STRIKE ORIGINAL RED KS 20/200 ENG block', 'lucky-strike-original-red-ks-20200-eng-block', 'product_lucky-strike-original-red-ks-20200-eng_5bc6407b49df4.jpg', 15, 13, '2018-10-16 13:48:12', '2018-11-12 17:27:06', 'prod_DxjvJwKMYJSIZf', 'sku_DxkIc5beSczBNV'),
(178, 'KENT HD WHITE KS 20/200 ENG block', 'kent-hd-white-ks-20200-eng-block', 'product_kent-hd-white-ks-20200-eng_5bc640d823073.jpg', 16, 13, '2018-10-16 13:49:45', '2018-11-12 17:27:07', 'prod_Dxjvc4tdg4Ww1Y', 'sku_DxkIR7VRAM55b6'),
(179, 'KENT HD SILVER KS 20/200 ENG block', 'kent-hd-silver-ks-20200-eng-block', 'product_kent-hd-silver-ks-20200-eng_5bc640efc7bba.jpg', 16, 13, '2018-10-16 13:50:08', '2018-11-12 17:27:08', 'prod_Dxjvzj9sU2rpoz', 'sku_DxkI9R9bMApzoN'),
(180, 'KENT HD NAVY BLUE KS 20/200 RC block', 'kent-hd-navy-blue-ks-20200-rc-block', 'product_kent-hd-navy-blue-ks-20200-rc_5bc6410b50b0d.jpg', 16, 13, '2018-10-16 13:50:36', '2018-11-12 17:27:10', 'prod_DxjvJ2IaEWvc4f', 'sku_DxkICjsI6wIXsr'),
(181, 'KENT CONVERTIBLES 20/200 ENG ISWITCH block', 'kent-convertibles-20200-eng-iswitch-block', 'product_kent-convertibles-20200-eng-iswitch_5bc6448e515a6.jpg', 16, 13, '2018-10-16 14:05:35', '2018-11-12 17:27:11', 'prod_DxjvKDJbkgmkRN', 'sku_DxkIg5VggCZ9yl'),
(182, 'ENG WINSTON SILVER CPB block', 'eng-winston-silver-cpb-block', 'product_eng-winston-silver-cpb_5bc644b65531b.jpg', 9, 13, '2018-10-16 14:06:15', '2018-11-12 17:27:12', 'prod_Dxjv2c4VNeJstC', 'sku_DxkIt6wQVYN5TB'),
(183, 'ENG WINSTON BALANCE BLUE KS CPB block', 'eng-winston-balance-blue-ks-cpb-block', 'product_eng-winston-balance-blue-ks-cpb_5bc644c75ebb7.jpg', 9, 13, '2018-10-16 14:06:32', '2018-11-12 17:27:14', 'prod_DxjvAx6uTO8K1E', 'sku_DxkIR0A05ESQNF'),
(184, 'ENG WEST SILVER KS EI BOX block', 'eng-west-silver-ks-ei-box-block', 'product_eng-west-silver-ks-ei-box_5bc644f22d0a5.jpg', 9, 13, '2018-10-16 14:07:15', '2018-11-12 17:27:15', 'prod_Dxjv09nWsmf1Ev', 'sku_DxkILlX57eU5rW'),
(185, 'ENG WEST RED KS FI BOX block', 'eng-west-red-ks-fi-box-block', 'product_eng-west-red-ks-fi-box_5bc64503ecdad.jpg', 9, 13, '2018-10-16 14:07:33', '2018-11-12 17:27:16', 'prod_DxjvTZAQmIBNWR', 'sku_DxkIAyzQs30sUl'),
(186, 'ENG SOBRANIE LAUBE BLACK RUSSIAN block', 'eng-sobranie-laube-black-russian-block', 'product_eng-sobranie-laube-black-russian_5bc6454809dc2.jpg', 24, 13, '2018-10-16 14:08:40', '2018-11-12 17:27:17', 'prod_DxjvwF1CfPuCRK', 'sku_DxkIbXUxc9dawY'),
(187, 'ENG SOBRANIE KS GOLD block', 'eng-sobranie-ks-gold-block', 'product_eng-sobranie-ks-gold_5bc6456b5cad5.jpg', 17, 13, '2018-10-16 14:09:16', '2018-11-12 17:27:19', 'prod_DxjvxutG06o5Bc', 'sku_DxkIKJwoNMkrQb'),
(188, 'ENG SOBRANIE KS BLUE block', 'eng-sobranie-ks-blue-block', 'product_eng-sobranie-ks-blue_5bc645800a3a3.jpg', 17, 13, '2018-10-16 14:09:37', '2018-11-12 17:27:20', 'prod_DxjvUTiRq4b7s0', 'sku_DxkJfJAIixTE84'),
(189, 'ENG R1 BLUE block', 'eng-r1-blue-block', 'product_eng-r1-blue_5bc6459ba9a3d.jpg', 13, 13, '2018-10-16 14:10:04', '2018-11-12 17:27:21', 'prod_DxjvemRms1G91v', 'sku_DxkJRWbyWmhno4'),
(190, 'ENG PARLAMENT SUPERSLIMS100S BOX block', 'eng-parlament-superslims100s-box-block', 'product_eng-parlament-superslims100s-box_5bc645ce60a7c.jpg', 20, 13, '2018-10-16 14:10:55', '2018-11-12 17:27:22', 'prod_DxjviL9fkQKdNK', 'sku_DxkJw7sYV4EyFq'),
(191, 'ENG PARLAMENT NIGTH BLUE KS RCB block', 'eng-parlament-nigth-blue-ks-rcb-block', 'product_eng-parlament-nigth-blue-ks-rcb_5bc645ea5bdb5.jpg', 20, 13, '2018-10-16 14:11:23', '2018-11-12 17:27:24', 'prod_DxjvIzo40UMEFd', 'sku_DxkJb0Sy1YOb4c'),
(192, 'ENG PARLAMENT AQUA BLUE RS RCB block', 'eng-parlament-aqua-blue-rs-rcb-block', 'product_eng-parlament-aqua-blue-rs-rcb_5bc645fbad3c7.jpg', 20, 13, '2018-10-16 14:11:40', '2018-11-12 17:27:25', 'prod_DxjvUL3yZR6nAP', 'sku_DxkJ4USfR2yX8A'),
(193, 'ENG MARLBORO GOLD ORIGINAL KS FTB block', 'eng-marlboro-gold-original-ks-ftb-block', 'product_eng-marlboro-gold-original-ks-ftb_5bc64614f3af0.jpg', 18, 13, '2018-10-16 14:12:05', '2018-11-12 17:27:26', 'prod_DxjvDoklrgEPZe', 'sku_DxkJXhH1u10OlT'),
(194, 'ENG MARLBORO FILTER PLUS KS SLIGING LID PACK block', 'eng-marlboro-filter-plus-ks-sliging-lid-pack', 'product_eng-marlboro-filter-plus-ks-sliging-lid-pack_5bc6464c8d8cc.jpg', 23, 13, '2018-10-16 14:13:01', '2018-11-12 17:27:28', 'prod_DxjvB4mGOdtqUV', 'sku_DxkJlDv7EdY0II'),
(195, 'ENG L&M RED LABLE KS FTB block', 'eng-lm-red-lable-ks-ftb-block', 'product_eng-lm-red-lable-ks-ftb_5bc646631e382.jpg', 9, 13, '2018-10-16 14:13:24', '2018-11-12 17:27:29', 'prod_DxjvwMZWSZ7iWZ', 'sku_DxkJoqPXhz4z2t'),
(196, 'ENG L&M BLUE LABEL KS FTB block', 'eng-lm-blue-label-ks-ftb-block', 'product_eng-lm-blue-label-ks-ftb_5bc64676865a1.jpg', 9, 13, '2018-10-16 14:13:43', '2018-11-12 17:27:30', 'prod_DxjwkIrL6v07l0', 'sku_DxkJ2OZZcSctRp'),
(197, 'ENG GLAMOUR PERFUME BOX PINKS block', 'eng-glamour-perfume-box-pinks-block', 'product_eng-glamour-perfume-box-pinks-block_5bc646b72d48c.jpg', 14, 13, '2018-10-16 14:14:48', '2018-11-12 17:27:31', 'prod_DxjwPdv7oQfc7g', 'sku_DxkJaRe01MQLep'),
(198, 'ENG GLAMOUR PERFUME BOX PINKS', 'eng-glamour-perfume-box-pinks', 'product_eng-glamour-perfume-box-pinks_5bc646ce2a4a0.jpg', 0.1, 13, '2018-10-16 14:15:10', '2018-11-12 17:27:33', 'prod_DxjwKaLN67xtU3', 'sku_DxkJarW0hyBJHs'),
(199, 'ENG GLAMOUR PERFUME BOX MENTOL  block', 'eng-glamour-perfume-box-mentol-block', 'product_eng-glamour-perfume-box-mentol-block_5bc6470932d07.jpg', 14, 13, '2018-10-16 14:16:10', '2018-11-12 17:27:34', 'prod_DxjwnHOXU7faba', 'sku_DxkJvCFmkHOBGK'),
(200, 'ENG DAVIDOFF GOLD FI BOX block', 'eng-davidoff-gold-fi-box-block', 'product_eng-davidoff-gold-fi-box-block_5bc64724e9a93.jpg', 17, 13, '2018-10-16 14:16:37', '2018-11-12 17:27:35', 'prod_Dxjwe4i7dysMHs', 'sku_DxkJNOl2fSD7nN'),
(201, 'ENG DAVIDOFF CLASSIC FI BOX block', 'eng-davidoff-classic-fi-box-block', 'product_eng-davidoff-classic-fi-box-block_5bc64735c6ea3.jpg', 17, 13, '2018-10-16 14:16:54', '2018-11-12 17:27:36', 'prod_Dxjw7BcMw3rTnY', 'sku_DxkJbVmpJEZNtb'),
(202, 'ENG CAMEL BLUE KS FI CPB block', 'eng-camel-blue-ks-fi-cpb-block', 'product_eng-camel-blue-ks-fi-cpb-block_5bc647553d59e.jpg', 14, 13, '2018-10-16 14:17:26', '2018-11-12 17:27:38', 'prod_DxjwYUm5axRAsa', 'sku_DxkJWsJlwYdDmA'),
(203, 'END WINSTON CLASSIC RED block', 'end-winston-classic-red-block', 'product_end-winston-classic-red-block_5bc6477ad9dc6.jpg', 9, 13, '2018-10-16 14:18:03', '2018-11-12 17:27:39', 'prod_DxjwJT32AxeNLB', 'sku_DxkJEgLnarIbmg'),
(204, 'END MARLBORO RED KS FTB block', 'end-marlboro-red-ks-ftb-block', 'product_end-marlboro-red-ks-ftb-block_5bc64790dd9e3.jpg', 18, 13, '2018-10-16 14:18:25', '2018-11-12 17:27:40', 'prod_DxjwrE2wYVxN1r', 'sku_DxkJ4rSc7KXlaV'),
(205, 'DUNHILL INTERN. RED 20/200 ENG block', 'dunhill-intern-red-20200-eng-block', 'product_dunhill-intern-red-20200-eng-block_5bc647b58d0a4.jpg', 18, 13, '2018-10-16 14:19:02', '2018-11-12 17:27:41', 'prod_DxjwbHx4SwDiyv', 'sku_DxkJfQfBws4tII'),
(206, 'BENSON & HEDGES SF KS 20/200 ENG block', 'benson-hedges-sf-ks-20200-eng-block', 'product_benson-hedges-sf-ks-20200-eng-block_5bc647cd5908e.jpg', 15, 13, '2018-10-16 14:19:26', '2018-11-12 17:27:43', 'prod_DxjwNa2R3YRlik', 'sku_DxkJSUwxcKqvZX'),
(207, 'ENG GOLDEN GATE RED block', 'eng-golden-gate-red-block', 'product_eng-golden-gate-red-block_5bc647f052615.jpg', 5, 13, '2018-10-16 14:20:01', '2018-11-12 17:27:44', 'prod_Dxjw94atT6CaEp', 'sku_DxkJpWljzCpsgz');

-- --------------------------------------------------------

--
-- Структура таблицы `product_property`
--

CREATE TABLE `product_property` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_property`
--

INSERT INTO `product_property` (`id`, `product_id`, `property_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '11.5%', NULL, NULL),
(2, 1, 2, '0.75L', NULL, NULL),
(3, 2, 1, '7%', NULL, NULL),
(4, 2, 2, '0.75L', NULL, NULL),
(5, 3, 1, '11.5%', NULL, NULL),
(6, 3, 2, 'MARTINI BRUT 11.5% 6/75CL', NULL, NULL),
(7, 4, 1, '11.5%', NULL, NULL),
(8, 4, 2, '0.75L', NULL, NULL),
(9, 5, 1, '15%', NULL, NULL),
(10, 5, 2, '1L', NULL, NULL),
(11, 6, 1, '15%', NULL, NULL),
(12, 6, 2, '1L', NULL, NULL),
(13, 7, 1, '7.5%', NULL, NULL),
(14, 7, 2, '0.75L', NULL, NULL),
(15, 8, 1, '15%', NULL, NULL),
(16, 8, 2, '1L', NULL, NULL),
(17, 9, 1, '9.5%', NULL, NULL),
(18, 9, 2, '0.75L', NULL, NULL),
(19, 10, 1, '18%', NULL, NULL),
(20, 10, 2, '1L', NULL, NULL),
(21, 11, 1, '12.5%', NULL, NULL),
(22, 11, 2, '0.75L', NULL, NULL),
(23, 12, 1, '15%', NULL, NULL),
(24, 12, 2, '1L', NULL, NULL),
(25, 13, 1, '19.5%', NULL, NULL),
(26, 13, 2, '1L', NULL, NULL),
(27, 14, 1, '15%', NULL, NULL),
(28, 14, 2, '1L', NULL, NULL),
(29, 15, 1, '10.5%', NULL, NULL),
(30, 15, 2, '0.75L', NULL, NULL),
(31, 16, 1, '36%', NULL, NULL),
(32, 16, 2, '1L', NULL, NULL),
(33, 17, 1, '11%', NULL, NULL),
(34, 17, 2, '0.75L', NULL, NULL),
(35, 18, 1, '11%', NULL, NULL),
(36, 18, 2, '0.75L', NULL, NULL),
(37, 19, 1, '40%', NULL, NULL),
(38, 19, 2, '1L', NULL, NULL),
(39, 20, 1, '10.5%', NULL, NULL),
(40, 20, 2, '0.75L', NULL, NULL),
(41, 21, 1, '40%', NULL, NULL),
(42, 21, 2, '1L', NULL, NULL),
(43, 22, 1, '12,5%', NULL, NULL),
(44, 22, 2, '0.75L', NULL, NULL),
(45, 23, 1, '12.5%', NULL, NULL),
(46, 23, 2, '0.75L', NULL, NULL),
(47, 24, 1, '40%', NULL, NULL),
(48, 24, 2, '1L', NULL, NULL),
(49, 25, 1, '13,5%', NULL, NULL),
(50, 25, 2, '0.75L', NULL, NULL),
(51, 26, 1, '40%', NULL, NULL),
(52, 26, 2, '1L', NULL, NULL),
(53, 27, 1, '40%', NULL, NULL),
(54, 27, 2, '1L', NULL, NULL),
(55, 28, 1, '12,5%', NULL, NULL),
(56, 28, 2, '0.75L', NULL, NULL),
(57, 29, 1, '40%', NULL, NULL),
(58, 29, 2, '1L', NULL, NULL),
(59, 30, 1, '40%', NULL, NULL),
(60, 30, 2, '1L', NULL, NULL),
(61, 31, 1, '11%', NULL, NULL),
(62, 31, 2, '0.75L', NULL, NULL),
(63, 32, 1, '40%', NULL, NULL),
(64, 32, 2, '1L', NULL, NULL),
(65, 33, 1, '11%', NULL, NULL),
(66, 33, 2, '0.75L', NULL, NULL),
(67, 34, 1, '13%', NULL, NULL),
(68, 34, 2, '0.75L', NULL, NULL),
(69, 35, 1, '40%', NULL, NULL),
(70, 35, 2, '0.7L', NULL, NULL),
(71, 36, 1, '13%', NULL, NULL),
(72, 36, 2, '0.75L', NULL, NULL),
(73, 37, 1, '40%', NULL, NULL),
(74, 37, 2, '1L', NULL, NULL),
(75, 38, 1, '40%', NULL, NULL),
(76, 38, 2, '1L', NULL, NULL),
(77, 39, 1, '40%', NULL, NULL),
(78, 39, 2, '1L', NULL, NULL),
(79, 40, 1, '12%', NULL, NULL),
(80, 40, 2, '0.75L', NULL, NULL),
(81, 41, 1, '40%', NULL, NULL),
(82, 41, 2, '1L', NULL, NULL),
(83, 42, 1, '40%', NULL, NULL),
(84, 42, 2, '1L', NULL, NULL),
(85, 43, 1, '12%', NULL, NULL),
(86, 43, 2, '0.75L', NULL, NULL),
(87, 44, 1, '40%', NULL, NULL),
(88, 44, 2, '1L', NULL, NULL),
(89, 45, 1, '40%', NULL, NULL),
(90, 45, 2, '0.7L', NULL, NULL),
(91, 46, 1, '40%', NULL, NULL),
(92, 46, 2, '1L', NULL, NULL),
(93, 47, 1, '38%', NULL, NULL),
(94, 47, 2, '1L', NULL, NULL),
(95, 48, 1, '12,5%', NULL, NULL),
(96, 48, 2, '0.75L', NULL, NULL),
(97, 49, 1, '40%', NULL, NULL),
(98, 49, 2, '1L', NULL, NULL),
(99, 50, 1, '40%', NULL, NULL),
(100, 50, 2, '1L', NULL, NULL),
(101, 51, 1, '12,5%', NULL, NULL),
(102, 51, 2, '0.75L', NULL, NULL),
(103, 52, 1, '40%', NULL, NULL),
(104, 52, 2, '1L', NULL, NULL),
(105, 53, 1, '40%', NULL, NULL),
(106, 53, 2, '1L', NULL, NULL),
(107, 54, 1, '13%', NULL, NULL),
(108, 54, 2, '0.75L', NULL, NULL),
(109, 55, 1, '13,5%', NULL, NULL),
(110, 55, 2, '0.75L', NULL, NULL),
(111, 56, 1, '13,5%', NULL, NULL),
(112, 56, 2, '0.75L', NULL, NULL),
(113, 57, 1, '40%', NULL, NULL),
(114, 57, 2, '1L', NULL, NULL),
(115, 58, 1, '12%', NULL, NULL),
(116, 58, 2, '0.75L', NULL, NULL),
(117, 62, 1, '40%', NULL, NULL),
(118, 62, 2, '1L', NULL, NULL),
(119, 64, 1, '14%', NULL, NULL),
(120, 64, 2, '0.75L', NULL, NULL),
(122, 66, 1, '14,50%', NULL, NULL),
(123, 66, 2, '0.75L', NULL, NULL),
(125, 67, 1, '40%', NULL, NULL),
(126, 67, 2, '0.7L', NULL, NULL),
(127, 68, 1, '40%', NULL, NULL),
(128, 68, 2, '0.7L', NULL, NULL),
(129, 69, 1, '13,5%', NULL, NULL),
(130, 69, 2, '0.75L', NULL, NULL),
(131, 70, 1, '40&', NULL, NULL),
(132, 70, 2, '1L', NULL, NULL),
(133, 71, 1, '13,5%', NULL, NULL),
(134, 71, 2, '0.75L', NULL, NULL),
(135, 72, 1, '40%', NULL, NULL),
(136, 72, 2, '0.7L', NULL, NULL),
(137, 73, 1, '40%', NULL, NULL),
(138, 73, 2, '1L', NULL, NULL),
(139, 74, 1, '40%', NULL, NULL),
(140, 74, 2, '1L', NULL, NULL),
(141, 75, 1, '30%', NULL, NULL),
(142, 75, 2, '1L', NULL, NULL),
(143, 76, 1, '46.3%', NULL, NULL),
(144, 76, 2, '1L', NULL, NULL),
(145, 78, 1, '10%', NULL, NULL),
(146, 78, 2, '0.4', NULL, NULL),
(147, 79, 1, '5%', NULL, NULL),
(148, 79, 2, '0.4', NULL, NULL),
(149, 80, 1, '5.5%', NULL, NULL),
(150, 80, 2, '0.4', NULL, NULL),
(151, 81, 1, '4.8%', NULL, NULL),
(152, 81, 2, '0.4', NULL, NULL),
(153, 82, 1, '5.5%', NULL, NULL),
(154, 82, 2, '0.4', NULL, NULL),
(155, 83, 1, '4.8%', NULL, NULL),
(156, 83, 2, '0.4', NULL, NULL),
(157, 84, 1, '5.4%', NULL, NULL),
(158, 84, 2, '0.4', NULL, NULL),
(159, 85, 1, '40%', NULL, NULL),
(160, 85, 2, '1L', NULL, NULL),
(161, 86, 1, '40%', NULL, NULL),
(162, 86, 2, '1L', NULL, NULL),
(163, 87, 1, '40%', NULL, NULL),
(164, 87, 2, '1L', NULL, NULL),
(165, 88, 1, '40%', NULL, NULL),
(166, 88, 2, '1L', NULL, NULL),
(167, 89, 1, '40%', NULL, NULL),
(168, 89, 2, '1L', NULL, NULL),
(169, 90, 1, '40%', NULL, NULL),
(170, 90, 2, '1L', NULL, NULL),
(171, 91, 1, '43%', NULL, NULL),
(172, 91, 2, '1L', NULL, NULL),
(173, 92, 1, '40%', NULL, NULL),
(174, 92, 2, '1L', NULL, NULL),
(175, 93, 1, '40%', NULL, NULL),
(176, 93, 2, '1L', NULL, NULL),
(177, 94, 1, '40%', NULL, NULL),
(178, 94, 2, '1L', NULL, NULL),
(179, 95, 1, '40%', NULL, NULL),
(180, 95, 2, '1L', NULL, NULL),
(181, 96, 1, '40%', NULL, NULL),
(182, 96, 2, '1L', NULL, NULL),
(183, 97, 1, '40%', NULL, NULL),
(184, 97, 2, '1L', NULL, NULL),
(185, 98, 1, '40%', NULL, NULL),
(186, 98, 2, '1L', NULL, NULL),
(187, 99, 1, '40%', NULL, NULL),
(188, 99, 2, '1L', NULL, NULL),
(189, 100, 1, '50%', NULL, NULL),
(190, 100, 2, '1L', NULL, NULL),
(191, 101, 1, '40%', NULL, NULL),
(192, 101, 2, '1L', NULL, NULL),
(193, 102, 1, '40%', NULL, NULL),
(194, 102, 2, '1L', NULL, NULL),
(195, 103, 1, '40%', NULL, NULL),
(196, 103, 2, '0.7L', NULL, NULL),
(197, 104, 1, '40%', NULL, NULL),
(198, 104, 2, '1L', NULL, NULL),
(199, 105, 1, '40%', NULL, NULL),
(200, 105, 2, '1L', NULL, NULL),
(201, 106, 1, '40%', NULL, NULL),
(202, 106, 2, '1L', NULL, NULL),
(203, 107, 1, '40%', NULL, NULL),
(204, 107, 2, '0.7L', NULL, NULL),
(205, 108, 1, '37.5%', NULL, NULL),
(206, 108, 2, '3L', NULL, NULL),
(207, 109, 1, '37.5%', NULL, NULL),
(208, 109, 2, '1L', NULL, NULL),
(209, 110, 1, '40%', NULL, NULL),
(210, 110, 2, '1L', NULL, NULL),
(211, 111, 1, '40%', NULL, NULL),
(212, 111, 2, '1L', NULL, NULL),
(213, 112, 1, '40%', NULL, NULL),
(214, 112, 2, '1L', NULL, NULL),
(215, 113, 1, '40%', NULL, NULL),
(216, 113, 2, '1L', NULL, NULL),
(217, 114, 1, '43%', NULL, NULL),
(218, 114, 2, '1L', NULL, NULL),
(219, 115, 1, '40%', NULL, NULL),
(220, 115, 2, '1L', NULL, NULL),
(221, 116, 1, '40%', NULL, NULL),
(222, 116, 2, '1L', NULL, NULL),
(223, 117, 1, '40%', NULL, NULL),
(224, 117, 2, '1L', NULL, NULL),
(225, 118, 1, '43%', NULL, NULL),
(226, 118, 2, '1L', NULL, NULL),
(227, 119, 1, '40%', NULL, NULL),
(228, 119, 2, '1L', NULL, NULL),
(229, 120, 1, '40%', NULL, NULL),
(230, 120, 2, '1L', NULL, NULL),
(231, 121, 1, '43%', NULL, NULL),
(232, 121, 2, '1L', NULL, NULL),
(233, 122, 1, '40%', NULL, NULL),
(234, 122, 2, '1L', NULL, NULL),
(235, 123, 1, '40%', NULL, NULL),
(236, 123, 2, '1L', NULL, NULL),
(237, 124, 1, '40%', NULL, NULL),
(238, 124, 2, '1L', NULL, NULL),
(239, 125, 1, '40%', NULL, NULL),
(240, 125, 2, '0.7L', NULL, NULL),
(241, 126, 1, '40%', NULL, NULL),
(242, 126, 2, '1L', NULL, NULL),
(243, 127, 1, '40%', NULL, NULL),
(244, 127, 2, '1L', NULL, NULL),
(245, 128, 1, '40%', NULL, NULL),
(246, 128, 2, '1L', NULL, NULL),
(247, 129, 1, '40%', NULL, NULL),
(248, 129, 2, '1L', NULL, NULL),
(249, 130, 1, '40%', NULL, NULL),
(250, 130, 2, '1L', NULL, NULL),
(251, 131, 1, '40%', NULL, NULL),
(252, 131, 2, '1L', NULL, NULL),
(253, 132, 1, '40%', NULL, NULL),
(254, 132, 2, '1L', NULL, NULL),
(255, 133, 1, '35%', NULL, NULL),
(256, 133, 2, '1L', NULL, NULL),
(257, 134, 1, '43%', NULL, NULL),
(258, 134, 2, '1L', NULL, NULL),
(259, 135, 1, '40%', NULL, NULL),
(260, 135, 2, '1L', NULL, NULL),
(261, 136, 1, '45%', NULL, NULL),
(262, 136, 2, '1L', NULL, NULL),
(263, 137, 1, '45%', NULL, NULL),
(264, 137, 2, '1L', NULL, NULL),
(265, 138, 1, '43.2%', NULL, NULL),
(266, 138, 2, '1L', NULL, NULL),
(267, 139, 1, '40%', NULL, NULL),
(268, 139, 2, '1L', NULL, NULL),
(269, 140, 1, '40%', NULL, NULL),
(270, 140, 2, '1L', NULL, NULL),
(271, 141, 1, '40%', NULL, NULL),
(272, 141, 2, '1L', NULL, NULL),
(273, 142, 1, '40%', NULL, NULL),
(274, 142, 2, '1L', NULL, NULL),
(275, 143, 1, '40%', NULL, NULL),
(276, 143, 2, '1L', NULL, NULL),
(277, 144, 1, '47%', NULL, NULL),
(278, 144, 2, '1L', NULL, NULL),
(279, 145, 1, '40%', NULL, NULL),
(280, 145, 2, '1L', NULL, NULL),
(281, 146, 1, '47%', NULL, NULL),
(282, 146, 2, '1L', NULL, NULL),
(283, 147, 1, '47.5%', NULL, NULL),
(284, 147, 2, '1L', NULL, NULL),
(285, 148, 1, '47.3%', NULL, NULL),
(286, 148, 2, '1L', NULL, NULL),
(287, 149, 1, '44%', NULL, NULL),
(288, 149, 2, '1L', NULL, NULL),
(289, 150, 1, '43%', NULL, NULL),
(290, 150, 2, '1L', NULL, NULL),
(291, 151, 1, '55', NULL, NULL),
(292, 151, 2, '0.7', NULL, NULL),
(293, 152, 1, '45', NULL, NULL),
(294, 152, 2, '1', NULL, NULL),
(295, 153, 1, '11', NULL, NULL),
(296, 153, 2, '1', NULL, NULL),
(297, 154, 1, '29', NULL, NULL),
(298, 154, 2, '1', NULL, NULL),
(299, 155, 1, '38', NULL, NULL),
(300, 155, 2, '1', NULL, NULL),
(301, 156, 1, '28.5%', NULL, NULL),
(302, 156, 2, '1L', NULL, NULL),
(303, 157, 1, '38%', NULL, NULL),
(304, 157, 2, '1L', NULL, NULL),
(305, 158, 1, '15%', NULL, NULL),
(306, 158, 2, '1L', NULL, NULL),
(307, 159, 1, '38%', NULL, NULL),
(308, 159, 2, '1L', NULL, NULL),
(309, 160, 1, '38%', NULL, NULL),
(310, 160, 2, '1L', NULL, NULL),
(311, 161, 1, '38%', NULL, NULL),
(312, 161, 2, '1L', NULL, NULL),
(313, 162, 1, '38%', NULL, NULL),
(314, 162, 2, '1L', NULL, NULL),
(315, 163, 1, '38%', NULL, NULL),
(316, 163, 2, '1L', NULL, NULL),
(317, 164, 1, '38%', NULL, NULL),
(318, 164, 2, '1L', NULL, NULL),
(319, 165, 1, '38%', NULL, NULL),
(320, 165, 2, '1L', NULL, NULL),
(321, 166, 1, '55%', NULL, NULL),
(322, 166, 2, '0.7L', NULL, NULL),
(323, 167, 1, '45%', NULL, NULL),
(324, 167, 2, '1L', NULL, NULL),
(325, 168, 1, '11%', NULL, NULL),
(326, 168, 2, '1L', NULL, NULL),
(327, 169, 1, '29%', NULL, NULL),
(328, 169, 2, '1L', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `product_stock`
--

CREATE TABLE `product_stock` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `new_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_stock`
--

INSERT INTO `product_stock` (`id`, `product_id`, `stock_id`, `new_price`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 12, NULL, NULL),
(2, 1, 1, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `properties`
--

CREATE TABLE `properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `properties`
--

INSERT INTO `properties` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Крепость', 'krepost', '2018-09-27 14:02:17', '2018-09-27 14:02:17'),
(2, 'Литраж', 'litrazh', '2018-09-27 14:09:59', '2018-09-27 14:09:59'),
(3, 'Цвет', 'tsvet', '2018-09-27 14:15:16', '2018-09-27 14:15:16');

-- --------------------------------------------------------

--
-- Структура таблицы `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Test', '2018-12-19', '2019-01-31', '2018-12-19 14:00:06', '2018-12-19 14:00:06');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `embassy` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `percent` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `embassy`, `code`, `percent`, `email`, `phone_number`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`, `is_active`) VALUES
(2, 'admin', 'kubanov', 'USA', 'admin', 3, 'admin@gmail.com', NULL, '$2y$10$3sqUcivgqVOZgAlM/K9hxuZz31Bwsspx1/WMoqw1B031u0VdGiAn6', 'yk7LOkUbgc6B7YZlE4V5OnVQpogmVwmvWinVOZNIaIfQSOHFvHSShFumk0Ub', '2018-09-27 14:00:38', '2018-11-16 08:22:56', 1, 1),
(15, 'Tilek', 'Kubanov', 'USA', '1234567875864', 0, 'tilek.kubanov@gmail.com', '701001052', '$2y$10$lh78jDWt1gqRQzWVAgEQXe31hQZWRRROa6DY8MdX9a5CK2iBN0rhi', 'D1riFmzmaig09LD3sguMYnpiEZ4zcBs8UcUAl9GKGRdHQA9daPyFnrZ3UuXl', '2018-11-20 16:00:34', '2018-11-20 21:32:39', 0, 1),
(16, 'Эркин', 'Наспеков', 'USA', '1234567875864', 0, 'mackinkenny@gmail.com', '700112239', '$2y$10$mnokRpuGx/H3mwo/XvJx5.nFoNI/jKmB9a0qcRSjxiTAaknMbx6SO', 'khpfPdhvjJgTrybMUZThNVo0UFoMK28mgj5BEDvJlqcqhTQWfu4IWZE3TtxQ', '2018-11-20 16:04:23', '2018-11-20 16:04:23', 0, 0),
(17, 'Кайрат', 'Джумадылов', 'USA', '1234567875864', 0, 'saitama7@gmail.com', '701001052', '$2y$10$wuFL/A28.73jcR4k9nuY8.MrH17eOc7gsrsJL9NOkbR/IovUGBi8y', 'rLydeLYsmaabUSOtDqFOFmZ2veJdtnHj5nEikPY8l1E0COG6gR5waBBBKlax', '2018-11-20 16:07:01', '2018-11-20 16:07:01', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `basket_product`
--
ALTER TABLE `basket_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Индексы таблицы `category_property`
--
ALTER TABLE `category_property`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Индексы таблицы `product_property`
--
ALTER TABLE `product_property`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `properties_slug_unique` (`slug`);

--
-- Индексы таблицы `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `basket_product`
--
ALTER TABLE `basket_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `category_property`
--
ALTER TABLE `category_property`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT для таблицы `product_property`
--
ALTER TABLE `product_property`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT для таблицы `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
