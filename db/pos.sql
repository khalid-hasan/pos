-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2019 at 08:21 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_accounts`
--

CREATE TABLE `customer_accounts` (
  `id` int(11) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_accounts`
--

INSERT INTO `customer_accounts` (`id`, `mobile`, `customer_name`, `password`, `balance`) VALUES
(1, '01715013338', 'Kamrul Hasan', '654321', 4800),
(2, '01715293043', 'Farhana Hasan', '123456', 5620),
(4, '01852456987', 'Tazkia', '$2y$10$LXcp4IiAB6tYqF4ezLOpp.DlDuOa.AAnwc1S7i/fwUcGAZkEx6FUG', 0),
(5, '01874236584', 'Rahnuma', '$2y$10$X9QDt0tBBN/w2iYFvMi/vuBtp2dtNvSoJ3BzvW8xulfAdT5LO.Zi6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_transactions`
--

CREATE TABLE `customer_transactions` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `current_balance` int(11) DEFAULT NULL,
  `paid_amount` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `due_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_transactions`
--

INSERT INTO `customer_transactions` (`id`, `order_id`, `mobile`, `current_balance`, `paid_amount`, `date`, `due_status`, `created_at`, `updated_at`) VALUES
(2, 14, '01715013338', 5000, 250, '2019-04-28', NULL, '2019-04-28 05:45:22', '2019-05-04 05:11:54'),
(3, 15, '01715013338', 4750, 250, '2019-04-28', NULL, '2019-04-28 05:43:22', '2019-05-04 05:11:54'),
(4, 15, '01715013338', 4500, 390, '2019-04-28', NULL, '2019-04-28 05:43:22', '2019-05-04 05:11:54'),
(5, 18, '01715293043', 6000, 130, '2019-04-29', NULL, '2019-04-29 05:45:22', '2019-05-04 05:11:54'),
(6, 18, '01715293043', 5870, 200, '2019-04-29', NULL, '2019-04-29 05:45:22', '2019-05-04 05:11:54'),
(7, 19, '01715293043', 5670, 50, '2019-04-29', NULL, '2019-04-29 05:45:22', '2019-05-04 05:11:54'),
(8, 20, '01715013338', 5000, 125, '2019-04-29', NULL, '2019-04-29 05:45:22', '2019-05-04 05:11:54'),
(9, 21, '01715013338', 4875, 25, '2019-04-29', NULL, '2019-04-29 05:48:47', '2019-05-04 05:11:54'),
(10, 23, '01715013338', 4850, 50, '2019-04-30', NULL, '2019-04-30 09:28:04', '2019-05-04 05:11:54'),
(13, 26, '01852456987', 0, 25, '2019-05-03', NULL, '2019-05-03 14:26:23', '2019-05-04 05:11:54'),
(14, 27, '01852456987', 0, 65, '2019-05-03', NULL, '2019-05-03 14:27:59', '2019-05-04 05:11:54'),
(15, 28, '01874236584', 0, 130, '2019-05-03', NULL, '2019-05-03 14:35:38', '2019-05-04 05:11:54'),
(16, 29, '01874236584', 0, 25, '2019-05-03', NULL, '2019-05-03 14:36:18', '2019-05-04 05:11:54'),
(17, 30, '01874236584', 0, 25, '2019-05-04', NULL, '2019-05-04 04:58:34', '2019-05-04 05:11:54'),
(18, 31, '01852456987', -65, 65, '2019-05-04', NULL, '2019-05-04 04:59:46', '2019-05-04 05:11:54'),
(19, 32, '01852456987', -65, 50, '2019-05-04', NULL, '2019-05-04 05:01:15', '2019-05-04 05:11:54'),
(20, 34, '01852456987', 0, 65, '2019-05-04', 'Clear', '2019-05-04 05:15:37', '2019-05-04 05:15:37'),
(21, 34, '01852456987', 0, 25, '2019-05-04', NULL, '2019-05-04 05:15:37', '2019-05-04 05:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `factories`
--

CREATE TABLE `factories` (
  `factory_id` int(11) NOT NULL,
  `factory_name` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factories`
--

INSERT INTO `factories` (`factory_id`, `factory_name`, `address`, `phone`) VALUES
(1, 'Khalid LTD.', 'Dhanmondi, Dhaka.', '01820570771'),
(4, 'Walid LTD.', 'Dhanmondi, Dhaka.', '0185263547');

-- --------------------------------------------------------

--
-- Table structure for table `factory_shipments`
--

CREATE TABLE `factory_shipments` (
  `id` int(11) NOT NULL,
  `shipment_name` varchar(50) DEFAULT NULL,
  `shipment_creation_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `shipment_arrival_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factory_shipments`
--

INSERT INTO `factory_shipments` (`id`, `shipment_name`, `shipment_creation_date`, `shipment_arrival_date`, `status`) VALUES
(8, 'Shipment 001', '2019-05-05 10:50:47', NULL, 'Received'),
(9, 'Shipment 002', '2019-05-05 10:52:49', NULL, 'Received'),
(10, 'Shipment 003', '2019-05-05 19:21:05', NULL, 'Sent');

-- --------------------------------------------------------

--
-- Table structure for table `factory_shipment_products`
--

CREATE TABLE `factory_shipment_products` (
  `fsp_id` int(11) NOT NULL,
  `shipment_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factory_shipment_products`
--

INSERT INTO `factory_shipment_products` (`fsp_id`, `shipment_id`, `product_id`, `quantity`, `price`) VALUES
(7, 8, 1, 5, 20),
(8, 8, 11, 10, 30),
(9, 9, 11, 5, 20),
(10, 9, 1, 3, 10),
(11, 10, 11, 6, 200),
(12, 10, 1, 4, 100);

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `quantity`) VALUES
(1, 1, 45),
(4, 11, 79),
(5, 12, 25),
(6, 13, 40),
(7, 14, 45),
(8, 15, 35),
(9, 16, 1),
(12, 19, 20),
(13, 20, 60),
(15, 24, 40);

-- --------------------------------------------------------

--
-- Table structure for table `local_inventories`
--

CREATE TABLE `local_inventories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `local_inventories`
--

INSERT INTO `local_inventories` (`id`, `product_id`, `quantity`) VALUES
(3, 1, 18),
(4, 11, 79);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `mobile`) VALUES
(8, 'Khalid', '01820570771'),
(9, 'Hasan', '01742712141'),
(14, 'Kamrul', '01715013338'),
(15, 'Khalid', '01715013338'),
(16, 'Suma', '01715293043'),
(17, 'Walid', '01915236548'),
(18, 'Farana', '01715293043'),
(19, 'Farhana', '01715293043'),
(20, 'Kamrul Hasan', '01715013338'),
(21, 'Kamrul', '01715013338'),
(22, 'Saif', '01745698741'),
(23, 'Kamrul', '01715013338'),
(26, 'Tazkia', '01852456987'),
(27, 'Tazkia', '01852456987'),
(28, 'Rahnuma', '01874236584'),
(29, 'Rahnuma', '01874236584'),
(30, 'Rahnuma', '01874236584'),
(31, 'Tazkia', '01852456987'),
(32, 'Tazkia', '01852456987'),
(34, 'Tazkia', '01852456987');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unitprice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'Paid',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `unitprice`, `discount`, `total`, `added_by`, `payment_status`, `updated_at`, `created_at`) VALUES
(160, 8, 1, '5', '20', NULL, '100', 'khalid', NULL, '2019-04-27 15:09:37', '2019-04-27 08:08:06'),
(161, 8, 11, '4', '50', NULL, '200', 'khalid', NULL, '2019-04-27 15:09:37', '2019-04-27 08:08:06'),
(162, 8, 16, '3', '65', NULL, '195', 'khalid', NULL, '2019-04-27 15:09:37', '2019-04-27 08:08:06'),
(164, 9, 11, '1', '50', '10', '45', 'khalid', NULL, '2019-04-27 15:09:38', '2019-04-27 08:10:26'),
(170, 14, 11, '5', '50', NULL, '250', 'khalid', NULL, '2019-04-28 10:02:21', '2019-04-28 10:02:21'),
(171, 15, 11, '5', '50', NULL, '250', 'khalid', NULL, '2019-04-28 10:03:35', '2019-04-28 10:03:35'),
(172, 15, 16, '6', '65', NULL, '390', 'khalid', NULL, '2019-04-28 10:03:35', '2019-04-28 10:03:35'),
(173, 16, 11, '5', '50', NULL, '250', 'khalid', NULL, '2019-04-28 10:11:52', '2019-04-28 10:11:52'),
(174, 17, 11, '5', '50', NULL, '250', 'khalid', NULL, '2019-04-28 10:31:22', '2019-04-28 10:31:22'),
(175, 17, 16, '2', '65', NULL, '130', 'khalid', NULL, '2019-04-28 10:31:22', '2019-04-28 10:31:22'),
(176, 18, 16, '2', '65', NULL, '130', 'khalid', NULL, '2019-04-28 10:39:34', '2019-04-28 10:39:34'),
(177, 18, 11, '4', '50', NULL, '200', 'khalid', NULL, '2019-04-28 10:39:34', '2019-04-28 10:39:34'),
(178, 19, 24, '2', '25', NULL, '50', 'khalid', NULL, '2019-04-28 10:43:06', '2019-04-28 10:43:06'),
(179, 20, 24, '5', '25', NULL, '125', 'khalid', NULL, '2019-04-28 14:03:32', '2019-04-28 14:03:32'),
(180, 21, 24, '1', '25', NULL, '25', 'khalid', NULL, '2019-04-28 23:48:47', '2019-04-28 23:48:47'),
(181, 22, 16, '5', '65', NULL, '325', 'khalid', NULL, '2019-04-30 03:27:35', '2019-04-30 03:27:35'),
(182, 22, 16, '6', '65', NULL, '390', 'khalid', NULL, '2019-04-30 03:27:35', '2019-04-30 03:27:35'),
(183, 23, 24, '2', '25', NULL, '50', 'khalid', NULL, '2019-04-30 03:28:04', '2019-04-30 03:28:04'),
(186, 26, 24, '1', '25', NULL, '25', 'khalid', 'Paid', '2019-05-03 08:26:23', '2019-05-03 08:26:23'),
(187, 27, 16, '1', '65', NULL, '65', 'khalid', 'Unpaid', '2019-05-03 14:35:07', '2019-05-03 08:27:59'),
(188, 28, 16, '2', '65', NULL, '130', 'khalid', 'Paid', '2019-05-03 08:35:38', '2019-05-03 08:35:38'),
(189, 29, 24, '1', '25', NULL, '25', 'khalid', 'Unpaid', '2019-05-03 08:36:18', '2019-05-03 08:36:18'),
(190, 30, 24, '1', '25', NULL, '25', 'khalid', 'Paid', '2019-05-03 22:58:34', '2019-05-03 22:58:34'),
(191, 31, 16, '1', '65', NULL, '65', 'khalid', 'Unpaid', '2019-05-03 22:59:46', '2019-05-03 22:59:46'),
(192, 32, 11, '1', '50', NULL, '50', 'khalid', 'Paid', '2019-05-03 23:01:15', '2019-05-03 23:01:15'),
(193, 34, 24, '1', '25', NULL, '25', 'khalid', 'Paid', '2019-05-03 23:15:37', '2019-05-03 23:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `poss`
--

CREATE TABLE `poss` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sales_point` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `customer_details` varchar(50) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `quantity` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `added_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `quantity`, `date`, `price`, `status`, `added_by`) VALUES
(1, 'Kitkat', 'Lorem ipsum dolor sit amet', 38, '2019-04-25 00:00:00', 10, 'In Stock', 'khalid'),
(11, 'Munch', 'Lorem ipsum dolor sit amet.', 30, '2019-04-25 00:00:00', 20, 'In Stock', 'khalid'),
(12, 'Snickers', 'Lorem ipsum dolor sit amet', 25, '2019-04-25 00:00:00', 60, 'In System', 'khalid'),
(13, 'Perk', 'Lorem ipsum dolor sit amet', 40, '2019-04-25 00:00:00', 10, 'In System', 'khalid'),
(14, 'Lays', 'Lorem ipsum dolor sit amet', 45, '2019-04-25 00:00:00', 30, 'In System', 'khalid'),
(15, 'Kurkure', 'Lorem ipsum dolor sit amet', 35, '2019-04-25 00:00:00', 15, 'In System', 'khalid'),
(16, 'Pringles', 'Lorem ipsum dolor sit amet', 45, '2019-04-25 00:00:00', 65, 'In Stock', 'khalid'),
(19, 'Oreo', 'Lorem ipsum dolor sit amet', 20, '2019-04-25 00:00:00', 50, 'In System', 'khalid'),
(20, 'Dairy Milk Silk', 'Lorem ipsum dolor sit amet.', 60, '2019-04-25 10:24:37', 80, 'In System', 'khalid'),
(24, 'Appy Fizz', 'Lorem ipsum dolor sit amet.', 55, '2019-04-26 16:46:59', 25, 'In Stock', 'khalid');

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `id` int(11) NOT NULL,
  `material_name` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `material_name`, `quantity`, `price`) VALUES
(2, 'Plastic', 15, 120),
(3, 'Paper', 1, 150),
(4, 'Glass', 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `added_by` varchar(50) DEFAULT NULL,
  `send_date` datetime DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `product_id`, `quantity`, `name`, `added_by`, `send_date`, `receive_date`) VALUES
(6, 1, 15, 'Kitkat', NULL, '2019-04-29 00:00:00', '2019-04-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transferred_in_to_bds`
--

CREATE TABLE `transferred_in_to_bds` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `sender_name` varchar(50) DEFAULT NULL,
  `receiver_name` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transferred_in_to_bds`
--

INSERT INTO `transferred_in_to_bds` (`id`, `amount`, `sender_name`, `receiver_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 5000, 'khalid', 'Ibne', 'Received', '2019-04-27 15:52:43', '2019-04-29 14:34:43'),
(2, 10000, 'khalid', 'Walid', 'Sent', '2019-04-27 15:53:55', '2019-04-27 15:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `residence` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `address`, `email`, `password`, `residence`, `role`) VALUES
('hasan', 'Ibne Hasan', 'Banani, Dhaka', 'khalid.bd13@gmail.com', '123456', 'BD', 'Seller'),
('khalid', 'Khalid Hasan', 'Adabor, Dhaka', 'khalidibnehasan@gmail.com', '123456', 'IN', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `work_orders`
--

CREATE TABLE `work_orders` (
  `id` int(11) NOT NULL,
  `factory_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `raw_material_total_price` int(11) DEFAULT NULL,
  `assigned_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `received_date` datetime DEFAULT NULL,
  `remaining_quantity` int(11) DEFAULT NULL,
  `received_quantity` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_orders`
--

INSERT INTO `work_orders` (`id`, `factory_id`, `product_id`, `product_quantity`, `raw_material_total_price`, `assigned_date`, `received_date`, `remaining_quantity`, `received_quantity`, `status`) VALUES
(3, 1, 1, 50, 700, '2019-05-05 02:06:29', NULL, 20, 30, 'Received'),
(4, 4, 11, 100, 550, '2019-05-05 02:06:53', NULL, 0, 100, 'Received'),
(6, 1, 12, 30, 300, '2019-05-05 03:44:54', NULL, 30, 0, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_transactions`
--
ALTER TABLE `customer_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factories`
--
ALTER TABLE `factories`
  ADD PRIMARY KEY (`factory_id`);

--
-- Indexes for table `factory_shipments`
--
ALTER TABLE `factory_shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factory_shipment_products`
--
ALTER TABLE `factory_shipment_products`
  ADD PRIMARY KEY (`fsp_id`),
  ADD KEY `factory_shipment_products_products_product_id_fk` (`product_id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_name_products_product_id_fk` (`product_id`);

--
-- Indexes for table `local_inventories`
--
ALTER TABLE `local_inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_orders_id_fk` (`order_id`),
  ADD KEY `order_details_inventories_product_id_fk` (`product_id`);

--
-- Indexes for table `poss`
--
ALTER TABLE `poss`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poss_products_product_id_fk` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipments_products_product_id_fk` (`product_id`);

--
-- Indexes for table `transferred_in_to_bds`
--
ALTER TABLE `transferred_in_to_bds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_user_id_uindex` (`user_id`);

--
-- Indexes for table `work_orders`
--
ALTER TABLE `work_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_transactions`
--
ALTER TABLE `customer_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `factories`
--
ALTER TABLE `factories`
  MODIFY `factory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `factory_shipments`
--
ALTER TABLE `factory_shipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `factory_shipment_products`
--
ALTER TABLE `factory_shipment_products`
  MODIFY `fsp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `local_inventories`
--
ALTER TABLE `local_inventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `poss`
--
ALTER TABLE `poss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transferred_in_to_bds`
--
ALTER TABLE `transferred_in_to_bds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work_orders`
--
ALTER TABLE `work_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `factory_shipment_products`
--
ALTER TABLE `factory_shipment_products`
  ADD CONSTRAINT `factory_shipment_products_products_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `table_name_products_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_inventories_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `inventories` (`product_id`),
  ADD CONSTRAINT `order_details_orders_id_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `poss`
--
ALTER TABLE `poss`
  ADD CONSTRAINT `poss_products_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_products_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
