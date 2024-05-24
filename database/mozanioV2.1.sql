-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 06, 2024 lúc 08:29 AM
-- Phiên bản máy phục vụ: 11.5.0-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mozanio`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `active` int(11) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `estimated_tax` float NOT NULL DEFAULT 0,
  `total_price` float DEFAULT 0,
  `session_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `session_modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_item`
--

CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sub_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_item_add_on`
--

CREATE TABLE `cart_item_add_on` (
  `id` int(11) NOT NULL,
  `cart_item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `optionName` varchar(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` float NOT NULL,
  `sub_total` float NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog_product_images`
--

CREATE TABLE `catalog_product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_large_thumb` varchar(200) NOT NULL,
  `product_small_thumb` varchar(200) NOT NULL,
  `product_position` int(11) NOT NULL,
  `is_front_face` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `url_key` varchar(200) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `meta_description` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `url_key`, `image`, `name`, `description`, `meta_description`) VALUES
(1, '0', 'cafein-fin.png', 'Cà phê rang hạt', '', 'Hương thơm đặc trưng và vị đắng nhẹ từ những hạt cà phê được rang chín.'),
(2, '0', '15gpIkbEsTweP.png!f305cw', 'Cà phê pha máy', '', 'Tiện lợi và nhanh chóng, tạo ra ly cà phê đậm đà và thơm ngon.\r\n'),
(3, '0', 'coffee-cup-parisluxe-1.png', 'Cà phê kiểu ý', '', 'Đậm đà và đặc trưng, thường được pha chế bằng phương pháp espresso, tạo ra ly cà phê ngắn và mạnh mẽ.'),
(4, '0', 'caphevietnam.png', 'Cà phê việt nam', '', 'Hương thơm đặc trưng, vị đậm đà và đắng nhẹ, thường pha bằng phin truyền thống.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `is_current_customer` tinyint(1) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `company` varchar(150) NOT NULL,
  `company_type` varchar(100) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `employee_number` varchar(20) DEFAULT NULL,
  `zip_code` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contents` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `controler_sequence`
--

CREATE TABLE `controler_sequence` (
  `id` varchar(5) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `controler_sequence`
--

INSERT INTO `controler_sequence` (`id`, `description`) VALUES
('01', 'Measure coffee.'),
('02', 'Grind coffee'),
('03', 'Prepare the water'),
('04', 'Pour'),
('05', 'Soak and stir'),
('06', 'Brew');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `controller_error_code`
--

CREATE TABLE `controller_error_code` (
  `id` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `controller_error_code`
--

INSERT INTO `controller_error_code` (`id`, `description`) VALUES
('01', 'Emptied Container'),
('02', 'Water level is too low'),
('03', 'Temperature out of range'),
('04', 'Blade jammed/stuck'),
('05', 'Maintenance required'),
('06', 'No sensors detected'),
('07', 'Monthly payment is due'),
('08', 'Wasted container is full'),
('09', 'Surged protection relay is off.'),
('10', 'Water deficiency in water pump'),
('11', 'Unable to contact with controller board');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `country_code`
--

CREATE TABLE `country_code` (
  `code` int(11) NOT NULL,
  `language` varchar(20) NOT NULL,
  `short_name` varchar(3) NOT NULL,
  `full_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `short_name` varchar(5) NOT NULL,
  `long_name` varchar(20) NOT NULL,
  `USD_exchange_rate` float NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `equipments`
--

CREATE TABLE `equipments` (
  `id` int(11) DEFAULT NULL,
  `serial_number` varchar(50) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status_id` tinyint(4) NOT NULL,
  `total_time_used` float NOT NULL DEFAULT 0,
  `commission_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `decommision_time` timestamp NULL DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `equipment_branch`
--

CREATE TABLE `equipment_branch` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `rent_price` float NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date_manufacture` timestamp NOT NULL,
  `updated_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `equipment_logs`
--

CREATE TABLE `equipment_logs` (
  `id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `sequence_id` int(11) NOT NULL,
  `firmware_ctl_error_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `option_1` varchar(20) DEFAULT NULL,
  `unit_price1` float NOT NULL,
  `option_2` varchar(20) DEFAULT NULL,
  `unit_price2` float NOT NULL,
  `option_3` varchar(20) DEFAULT NULL,
  `unit_price3` float NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `modified_by_user_id` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `payment_id` int(11) NOT NULL,
  `handling_id` tinyint(4) NOT NULL,
  `ship_first_name` varchar(100) NOT NULL,
  `ship_last_name` varchar(100) NOT NULL,
  `ship_address` varchar(100) NOT NULL,
  `ship_address2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `customer_special_notes` text DEFAULT NULL,
  `internal_notes` mediumtext DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `sub_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_handling`
--

CREATE TABLE `delivery_method` (
  `id` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  `short_description` varchar(50) NOT NULL,
  `long_description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_trackings`
--

CREATE TABLE `order_trackings` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `carrier` varchar(20) NOT NULL,
  `special_notes` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by_user` varchar(20) NOT NULL,
  `modified_by_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payement_methods`
--

CREATE TABLE `payement_methods` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `short_description` varchar(50) NOT NULL,
  `special_notes` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_in_stock` tinyint(1) NOT NULL DEFAULT 1,
  `quantity_available` float NOT NULL,
  `is_category_searchable` tinyint(1) NOT NULL DEFAULT 1,
  `is_category_visible` tinyint(1) NOT NULL DEFAULT 1,
  `sku` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `short_description` varchar(250) NOT NULL,
  `meta_description` varchar(250) DEFAULT NULL,
  `unit_price` float NOT NULL,
  `url_key` varchar(200) NOT NULL,
  `internal_image_path` varchar(50) DEFAULT NULL,
  `is_new_from_date` datetime DEFAULT NULL,
  `is_new_to_date` datetime DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `is_active`, `is_in_stock`, `quantity_available`, `is_category_searchable`, `is_category_visible`, `sku`, `name`, `description`, `short_description`, `meta_description`, `unit_price`, `url_key`, `internal_image_path`, `is_new_from_date`, `is_new_to_date`, `created_date`, `modified_date`) VALUES
(1, 1, 1, 1, 41, 1, 1, 'Quidem voluptas ullam laboriosam et.', 'Iste nam quia esse.', 'Repellendus.', 'Nihil excepturi et in ut. Culpa facilis occaecati et explicabo et. Maxime nisi velit animi qui qui earum dolores. Quis nostrum iste dolorem.', 'Aut fugiat at sint mollitia. Qui voluptas iure inventore enim. Blanditiis labore quibusdam dolores est quia.', 398.57, 'Ex repellendus corporis impedit et voluptatem aspernatur libero. Tenetur consequatur et ipsa reprehenderit voluptatum. Quia eos eos delectus corporis.', 'Ut ratione pariatur.', NULL, NULL, '2024-05-06 05:37:13', '2024-05-06 05:37:13'),
(2, 2, 1, 1, 95, 1, 1, 'Eum quis expedita id et accusamus.', 'Voluptatem ratione.', 'Blanditiis neque.', 'Cupiditate neque voluptates officiis debitis atque voluptatem. Placeat est voluptas nulla architecto quibusdam quae.', 'Quaerat voluptatem provident adipisci autem. Laborum nihil ut debitis eius. Sed rem eaque adipisci saepe. Aut quidem consequatur voluptatem voluptatem quo voluptatem.', 51.7, 'Non dolor dolorem deserunt voluptatem velit velit reiciendis. Molestiae rem esse minima. Tempora doloremque cum sint molestiae. Eos est voluptatibus excepturi ipsum est ex blanditiis numquam.', 'Non sit et possimus.', NULL, NULL, '2024-05-06 05:37:13', '2024-05-06 05:37:13'),
(3, 2, 1, 1, 47, 1, 1, 'Ut est aut esse labore quisquam rerum.', 'Quidem vel ut iste.', 'Eveniet recusandae.', 'Quia dolor a voluptas aliquam esse voluptatem. Labore qui reiciendis cum suscipit autem. Molestiae et cupiditate itaque cumque. Ea et aut recusandae voluptas doloribus labore autem.', 'Repudiandae repellendus in asperiores distinctio nulla quod placeat. Sed nisi voluptatem ad. Aut voluptates qui unde quo eos debitis quae voluptatibus.', 235.35, 'Nam inventore minus veniam architecto omnis quidem sapiente. Quidem doloribus assumenda commodi blanditiis possimus. Ad consequuntur vel quos accusamus eos est.', 'Asperiores modi qui.', NULL, NULL, '2024-05-06 05:37:13', '2024-05-06 05:37:13'),
(4, 3, 1, 1, 18, 1, 1, 'Alias rem ab accusamus.', 'Est occaecati.', 'Magni sint eum.', 'Officia deleniti eligendi laudantium veniam iure voluptatem. Eum facilis quam veniam. Non magnam ut maiores aperiam laboriosam a alias.', 'Eveniet eos necessitatibus enim culpa. Illum laborum error dolore totam et aspernatur ea enim.', 891.75, 'Dolorem animi quod sed commodi et et. Eius quidem ducimus consectetur quaerat molestiae praesentium tenetur. Dolor quis quia excepturi dignissimos.', 'Dolores et minima.', NULL, NULL, '2024-05-06 05:40:12', '2024-05-06 05:40:12'),
(5, 2, 1, 1, 37, 1, 1, 'Sed voluptatem eius corporis similique.', 'Alias aspernatur.', 'Fugiat ex autem.', 'Alias sequi et omnis amet. Doloribus voluptatem nobis aut qui quis sequi ullam.', 'Ducimus et quis fugit. Inventore tenetur est ab. Ut molestias dolores nulla animi omnis voluptas.', 378.84, 'Sequi distinctio sed dolorum tempora voluptatem. Nulla consequuntur debitis fuga vitae. Quam vero voluptatem distinctio omnis.', 'Pariatur sed.', NULL, NULL, '2024-05-06 05:40:12', '2024-05-06 05:40:12'),
(6, 4, 1, 1, 51, 1, 1, 'Deleniti aut numquam rem rerum.', 'Quae vero nemo.', 'Facilis adipisci.', 'Similique possimus veritatis amet repudiandae exercitationem. Voluptas quos ut autem officia qui. Ea omnis illum rem dignissimos in voluptas deserunt. Repellendus laudantium eius eos voluptatum.', 'Natus eos exercitationem non incidunt repellendus aut rerum. Unde facere nihil velit officia eum quasi beatae. Porro sit quo ipsam harum.', 328.14, 'Nihil similique aliquid officia qui. Sunt corporis aspernatur molestias. Quos inventore unde nemo optio.', 'Laboriosam velit.', NULL, NULL, '2024-05-06 05:37:13', '2024-05-06 05:37:13'),
(7, 3, 1, 1, 83, 1, 1, 'Vitae repellendus similique adipisci.', 'Impedit officia.', 'Quia velit nemo.', 'Corrupti nesciunt magni molestiae et. Placeat consequatur et quidem ullam. Aut nobis repellat veritatis aut consequatur minus.', 'Rem possimus hic quasi soluta voluptas. Molestiae enim voluptatem asperiores aut explicabo debitis. In eius et itaque quis ut sit qui tenetur. Officia et aut ab facilis sint optio.', 619.86, 'Sapiente ut vero nesciunt ut et incidunt. Explicabo totam optio molestias. Libero et ea et deleniti possimus iure.', 'Mollitia error.', NULL, NULL, '2024-05-06 05:37:13', '2024-05-06 05:37:13'),
(8, 1, 1, 1, 20, 1, 1, 'Et soluta iusto aliquam sapiente.', 'Autem aut sequi.', 'Aut explicabo ab.', 'Praesentium veritatis tempora perferendis officiis id tempora. Omnis eos tenetur nemo voluptatibus. Aut eligendi qui autem. Nobis vitae excepturi distinctio quis sint cum doloremque.', 'Qui qui sunt enim sunt accusantium velit aperiam. Beatae qui libero soluta porro quo cupiditate. Et officiis quia temporibus ipsum corporis minus.', 237.33, 'Hic at quas id vel dolore voluptatem. Qui distinctio quae est officia autem. Sapiente alias consequatur molestias aut nulla vel magnam. Nesciunt sequi ut voluptatibus quae ut natus.', 'Quae temporibus.', NULL, NULL, '2024-05-06 05:37:13', '2024-05-06 05:37:13'),
(9, 3, 1, 1, 80, 1, 1, 'Hic voluptates ab excepturi et.', 'Provident quia aut.', 'Est ea totam.', 'Aut id labore veritatis consequatur illum iste. Ipsa voluptatibus possimus ea enim voluptas rerum velit. Repellendus aperiam qui quis et.', 'Sed unde error aperiam qui harum quos. Quisquam sit molestias voluptatem unde libero qui vitae. Nemo quia amet qui id qui incidunt laborum dolorum. Eaque aut voluptas accusantium fuga eum.', 736.42, 'Maxime eveniet modi sequi nobis. Aliquid et accusantium repellat quia iure excepturi reprehenderit. Suscipit similique qui quia aut est. Sunt dolores enim vitae.', 'Eos error et quas.', NULL, NULL, '2024-05-06 05:37:13', '2024-05-06 05:37:13'),
(10, 3, 1, 1, 76, 1, 1, 'Impedit rerum qui amet aut ut nulla.', 'Doloribus qui.', 'Quia quas ea omnis.', 'Reprehenderit maxime unde rem quia voluptatum voluptatibus exercitationem. Id corrupti quisquam eveniet iusto totam est. Est facere et omnis necessitatibus officiis non quae.', 'Porro doloribus est omnis incidunt. Ab doloremque sint suscipit sed ducimus. Non sit quas tempore veniam iure. Provident molestiae natus minus. Aliquam at ullam culpa pariatur quaerat optio aut.', 784.79, 'Sapiente modi aliquam ipsa qui molestiae dolorem. Dolorem id nesciunt sunt reprehenderit consequuntur. Veniam inventore blanditiis omnis laboriosam rem soluta.', 'Adipisci minima a.', NULL, NULL, '2024-05-06 05:40:12', '2024-05-06 05:40:12'),
(11, 2, 1, 1, 17, 1, 1, 'Aliquid non facere voluptas enim quo.', 'Amet quidem aut est.', 'Voluptates ipsam.', 'Placeat accusantium amet et sunt dolorum architecto quibusdam. Dolorem animi omnis dolor quia nihil nulla quod. Non dolorum dolores provident pariatur.', 'Qui ipsa repudiandae animi aut ullam. Id est et labore impedit. Vero sed maiores rerum ut.', 567.35, 'Et sit error molestiae veniam quidem. Incidunt qui debitis quia suscipit. Qui laborum velit voluptas consectetur accusantium ut consectetur amet. Maiores ut occaecati consequatur incidunt.', 'Atque accusamus.', NULL, NULL, '2024-05-06 05:37:13', '2024-05-06 05:37:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_related`
--

CREATE TABLE `product_related` (
  `id` int(11) NOT NULL,
  `related_id_list` varchar(250) DEFAULT NULL,
  `recommend_id_list` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_specification`
--

CREATE TABLE `product_specification` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) DEFAULT NULL,
  `weight_id` int(11) DEFAULT NULL,
  `actual_weight` float DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `actual_size` float DEFAULT NULL,
  `specification_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `minium_eligible_amount` float NOT NULL,
  `max_counts_allow` int(11) DEFAULT NULL,
  `use_percentage` float DEFAULT NULL,
  `use_ammount` float DEFAULT NULL,
  `cap_percentage` float NOT NULL,
  `cap_amount` float NOT NULL,
  `expiration_date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `limit_access` tinyint(1) DEFAULT NULL,
  `can_create_m_staff` tinyint(1) DEFAULT NULL,
  `can_create_v_owner` tinyint(1) DEFAULT NULL,
  `can_create_v_staff` tinyint(1) DEFAULT NULL,
  `can_approve_m_staff` tinyint(1) DEFAULT NULL,
  `can_approve_v_owner` tinyint(1) DEFAULT NULL,
  `can_approve_v_staff` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size_type`
--

CREATE TABLE `size_type` (
  `id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slide_index` smallint(6) NOT NULL,
  `slide_content` varchar(100) NOT NULL,
  `slide_image` varchar(200) NOT NULL,
  `active` enum('disable','enable') NOT NULL DEFAULT 'disable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `static_blocks`
--

CREATE TABLE `static_blocks` (
  `id` int(11) NOT NULL,
  `identifier` varchar(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `active` enum('disable','enable') NOT NULL DEFAULT 'enable',
  `section` varchar(255) NOT NULL,
  `position` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id` tinyint(4) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store_parameters`
--

CREATE TABLE `store_parameters` (
  `id` int(11) NOT NULL,
  `parameter_name` varchar(50) NOT NULL,
  `value` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store_settings`
--

CREATE TABLE `store_settings` (
  `id` int(11) NOT NULL,
  `process_identifier` varchar(30) NOT NULL,
  `stastus_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `activation_code` varchar(150) DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL,
  `role_id` smallint(6) NOT NULL DEFAULT 5,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `country_code` smallint(6) NOT NULL DEFAULT 84,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `login_attempts` smallint(6) NOT NULL DEFAULT 0,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_devices`
--

CREATE TABLE `user_devices` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `imei` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_password_reset`
--

CREATE TABLE `user_password_reset` (
  `id` varchar(150) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `permission_id` tinyint(4) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type_id` smallint(6) NOT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT 0,
  `currency_id` smallint(6) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `owner_first_name` varchar(50) NOT NULL,
  `owner_last_name` varchar(20) NOT NULL,
  `date_joined` timestamp NOT NULL,
  `date_exit` timestamp NULL DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL,
  `modified_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vendor_contact`
--

CREATE TABLE `vendor_contact` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `address_2` varchar(200) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `country` varchar(10) NOT NULL DEFAULT 'VN',
  `email` varchar(120) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `is_mobile` tinyint(4) NOT NULL DEFAULT 1,
  `is_default` tinyint(1) NOT NULL DEFAULT 1,
  `is_billing` tinyint(1) DEFAULT 1,
  `is_shipping` tinyint(1) NOT NULL DEFAULT 1,
  `update_time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vendor_geography`
--

CREATE TABLE `vendor_geography` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longtitude` varchar(20) NOT NULL,
  `updated_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vendor_type`
--

CREATE TABLE `vendor_type` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `long_description` varchar(200) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `vendor_type`
--

INSERT INTO `vendor_type` (`id`, `description`, `long_description`, `date_created`, `date_modified`) VALUES
(1, 'store', '', '2024-04-25 02:08:15', '2024-04-25 02:08:15'),
(2, 'mobile', '', '2024-04-25 02:08:30', '2024-04-25 02:08:30'),
(3, 'kiosk', '', '2024-04-25 03:23:14', '2024-04-25 03:23:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `weight_type`
--

CREATE TABLE `weight_type` (
  `id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `cart_item_add_on`
--
ALTER TABLE `cart_item_add_on`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `controler_sequence`
--
ALTER TABLE `controler_sequence`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `controller_error_code`
--
ALTER TABLE `controller_error_code`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `country_code`
--
ALTER TABLE `country_code`
  ADD PRIMARY KEY (`code`) USING BTREE;

--
-- Chỉ mục cho bảng `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `equipments`
--
ALTER TABLE `equipments`
  ADD UNIQUE KEY `serial_number` (`serial_number`) USING BTREE;

--
-- Chỉ mục cho bảng `equipment_branch`
--
ALTER TABLE `equipment_branch`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `equipment_logs`
--
ALTER TABLE `equipment_logs`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `detailID` (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `order_handling`
--
ALTER TABLE `order_handling`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `order_trackings`
--
ALTER TABLE `order_trackings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `payement_methods`
--
ALTER TABLE `payement_methods`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `product_id` (`category_id`) USING BTREE;

--
-- Chỉ mục cho bảng `product_related`
--
ALTER TABLE `product_related`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `product_specification`
--
ALTER TABLE `product_specification`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `code` (`code`) USING BTREE;

--
-- Chỉ mục cho bảng `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `size_type`
--
ALTER TABLE `size_type`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `static_blocks`
--
ALTER TABLE `static_blocks`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `store_parameters`
--
ALTER TABLE `store_parameters`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `store_settings`
--
ALTER TABLE `store_settings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `user_name` (`user_name`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- Chỉ mục cho bảng `user_devices`
--
ALTER TABLE `user_devices`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `imei` (`imei`) USING BTREE;

--
-- Chỉ mục cho bảng `user_password_reset`
--
ALTER TABLE `user_password_reset`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `account_number` (`account_number`) USING BTREE,
  ADD UNIQUE KEY `user_id` (`user_id`) USING BTREE;

--
-- Chỉ mục cho bảng `vendor_contact`
--
ALTER TABLE `vendor_contact`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `vendor_geography`
--
ALTER TABLE `vendor_geography`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `vendor_type`
--
ALTER TABLE `vendor_type`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `weight_type`
--
ALTER TABLE `weight_type`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cart_item_add_on`
--
ALTER TABLE `cart_item_add_on`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `equipment_branch`
--
ALTER TABLE `equipment_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `equipment_logs`
--
ALTER TABLE `equipment_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `order_handling`
--
ALTER TABLE `order_handling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_trackings`
--
ALTER TABLE `order_trackings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payement_methods`
--
ALTER TABLE `payement_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_specification`
--
ALTER TABLE `product_specification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `size_type`
--
ALTER TABLE `size_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `static_blocks`
--
ALTER TABLE `static_blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `store_parameters`
--
ALTER TABLE `store_parameters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `store_settings`
--
ALTER TABLE `store_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user_devices`
--
ALTER TABLE `user_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vendor_contact`
--
ALTER TABLE `vendor_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vendor_geography`
--
ALTER TABLE `vendor_geography`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vendor_type`
--
ALTER TABLE `vendor_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `weight_type`
--
ALTER TABLE `weight_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `ingredient_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
