-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2021 at 07:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeexcoth_machine`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_login_logout`
--

CREATE TABLE `log_login_logout` (
  `id_log` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `type_log` varchar(100) NOT NULL,
  `type_process` varchar(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `date_process` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_login_logout`
--

INSERT INTO `log_login_logout` (`id_log`, `username`, `type_log`, `type_process`, `ip_address`, `date_process`) VALUES
(1, 'admin', 'logout', 'admin', '::1', '2021-01-26 15:11:56'),
(2, 'admin', 'login', '0', '::1', '2021-01-26 15:12:45'),
(3, 'admin', 'login', '0', '::1', '2021-01-26 16:42:24'),
(4, 'admin', 'login', '0', '::1', '2021-01-27 02:38:39'),
(5, 'admin', 'login', '0', '::1', '2021-01-27 15:28:32'),
(6, 'admin', 'logout', 'admin', '::1', '2021-01-30 14:23:53'),
(7, 'admin', 'login', '0', '::1', '2021-01-30 14:23:57'),
(8, 'admin', 'login', '0', '::1', '2021-01-31 04:09:32'),
(9, 'admin', 'logout', 'admin', '::1', '2021-01-31 11:03:39'),
(10, 'admin', 'login', '', '::1', '2021-01-31 11:18:05'),
(11, 'admin', 'login', '', '::1', '2021-01-31 16:10:18'),
(12, 'admin', 'login', '', '::1', '2021-02-04 04:59:58'),
(13, 'admin', 'logout', 'admin', '::1', '2021-02-05 17:15:24'),
(14, 'admin', 'login', '', '::1', '2021-02-05 17:15:27'),
(15, 'admin', 'login', '', '::1', '2021-02-07 04:48:49'),
(16, 'admin', 'login', '', '::1', '2021-02-07 11:09:59'),
(17, 'admin', 'login', '', '::1', '2021-02-09 03:14:51'),
(18, 'admin', 'login', '', '::1', '2021-02-09 17:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `setting_web`
--

CREATE TABLE `setting_web` (
  `id_setting` int(1) NOT NULL,
  `nameweb` varchar(500) NOT NULL,
  `emailweb` text NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `line_id` varchar(200) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `open_web` date NOT NULL,
  `titleweb` text NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `footer` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_web`
--

INSERT INTO `setting_web` (`id_setting`, `nameweb`, `emailweb`, `facebook`, `line_id`, `phone_number`, `address`, `open_web`, `titleweb`, `keywords`, `description`, `footer`) VALUES
(1, 'Codeex.co.th', 'admin@codeex.co.th', '', '', '', 'Codeex.co.th', '2021-01-25', 'Codeex.co.th', 'Codeex.co.th', 'Codeex.co.th', 'Copyright © 2020 All rights reserved by Codeex.co.th');

-- --------------------------------------------------------

--
-- Table structure for table `statistic`
--

CREATE TABLE `statistic` (
  `id` int(5) NOT NULL,
  `openweb` date NOT NULL,
  `stat` int(11) NOT NULL,
  `new_today` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stat_today`
--

CREATE TABLE `stat_today` (
  `id` int(11) NOT NULL,
  `ip_user` varchar(100) NOT NULL,
  `visit_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `id_area` int(11) NOT NULL,
  `area_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`id_area`, `area_name`) VALUES
(1, 'North'),
(2, 'East'),
(3, 'West'),
(4, 'South');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asset`
--

CREATE TABLE `tbl_asset` (
  `asset_id` int(11) NOT NULL,
  `asset_desc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_guarantee` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_condition` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_destroy` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_storage_location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_amount` int(11) DEFAULT 0,
  `asset_unit` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_doc_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_movement` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_borrow` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_schedule_borrow` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_pending_sale` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_balance` int(11) DEFAULT 0,
  `asset_real_stock` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_difference` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_councilor` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_cause_difference` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_remark` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_pic_path_1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_pic_path_2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_pic_path_3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_pic_path_4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_pic_path_5` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_pic_path_6` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_pic_path_7` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_pic_path_8` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_pic_path_9` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_pic_path_10` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_asset`
--

INSERT INTO `tbl_asset` (`asset_id`, `asset_desc`, `asset_guarantee`, `asset_condition`, `asset_destroy`, `asset_storage_location`, `asset_amount`, `asset_unit`, `asset_doc_no`, `asset_movement`, `asset_borrow`, `asset_schedule_borrow`, `asset_pending_sale`, `asset_balance`, `asset_real_stock`, `asset_difference`, `asset_councilor`, `asset_cause_difference`, `asset_remark`, `asset_pic_path_1`, `asset_pic_path_2`, `asset_pic_path_3`, `asset_pic_path_4`, `asset_pic_path_5`, `asset_pic_path_6`, `asset_pic_path_7`, `asset_pic_path_8`, `asset_pic_path_9`, `asset_pic_path_10`, `company_id`) VALUES
(1, 'value-2', 'value-3', 'value-4', 'value-5', 'value-6', 1, 'value-8', 'value-9', 'value-10', 'value-11', 'value-12', 'value-13', 1, 'value-15', 'value-16', 'value-17', 'value-18', 'value-19', 'value-20', 'value-21', 'value-22', 'value-23', 'value-24', 'value-25', 'value-26', 'value-27', 'value-28', 'value-29', '1'),
(2, '11', '1', '1', '1', '1', 0, '1', '', '', '', '', '', 1, '1', '1', '1', '', '0', '', '', '', '', '', '', '', '', '', '', '1'),
(3, '11', '1', '1', '1', '1', 0, '1', '', '', '', '', '', 1, '1', '1', '1', '', '0', '', '', '', '', '', '', '', '', '', '', 'no'),
(4, 'ทดสอบๆทดสอบๆ', '', '', '', '', 0, '', '', '', '', '', '', 0, '0', '0', '', '', '0', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'ok ok test', 'ok ok test', 'ok ok test', 'ok ok test', 'ok ok test', 0, '', '', '', '', '', '', 100, '20', '80', '', '', '0', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'ok ok test', 'ok ok test', 'ok ok test', 'ok ok test', 'ok ok test', 0, '', '', '', '', '', '', 100, '20', '80', '', '', '0', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'Add New AssetAdd New Asset', 'Add New Asset', 'ok ok test', 'ok ok test', 'ok ok test', 100, '20', '20', 'ตัดออก', '', '', '', 100, '80', '20', '', '', '0', '20210130164241.jpg', '20210130164241.jpg', '', '20210130164241.png', '', '', '20210130164241.jpg', '', '', '', ''),
(12, 'Add New AssetAdd', 'Add New Asset', 'ok ok test', 'ok ok test', 'ok ok test', 100, '20', '20', '', '', '', '', 100, '80', '20', '', '', '', '20210130172751.jpg', '20210130172753.jpg', '20210207051632.png', NULL, '20210130172755.png', NULL, '20210130172815.jpg', '20210130172817.jpg', '20210130172832.jpg', '20210130172845.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrow_asset`
--

CREATE TABLE `tbl_borrow_asset` (
  `br_id` int(11) NOT NULL,
  `asset_id` int(11) DEFAULT 0,
  `br_cause` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `br_work` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `br_detail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `br_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `br_return_date` date DEFAULT current_timestamp(),
  `br_user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `br_accept` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `br_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_borrow_asset`
--

INSERT INTO `tbl_borrow_asset` (`br_id`, `asset_id`, `br_cause`, `br_work`, `br_detail`, `br_no`, `br_return_date`, `br_user`, `br_accept`, `br_date`) VALUES
(1, 3, '3', '3', '1', '1', '2021-01-28', '1', '1', '2021-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'LASER HANS'),
(2, 'FUME'),
(3, 'VISION'),
(4, 'LASER FOBA'),
(5, 'LASER HG'),
(6, 'LASER VIDEOJET');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_addr1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `company_addr2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `company_addr3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `company_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_zip_code` int(5) NOT NULL,
  `company_tel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_fax` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_capital_investment` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_bussiness_group` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_product_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `company_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `company_area` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_indust` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_www` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_distance_office` int(3) NOT NULL,
  `company_googlemap_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_name`, `company_addr1`, `company_addr2`, `company_addr3`, `company_city`, `company_zip_code`, `company_tel`, `company_fax`, `company_email`, `company_capital_investment`, `company_bussiness_group`, `company_product_type`, `company_status`, `company_remark`, `company_area`, `company_indust`, `company_www`, `company_facebook`, `company_distance_office`, `company_googlemap_link`) VALUES
(3, 'CodeEx', 'CodeEx', 'CodeEx', 'CodeEx', 'Cati', 67900, '0983334400', '', 'CodeEx', '', '2', '1', 'Customer', '', '1', '3', '', '', 45, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_customer`
--

CREATE TABLE `tbl_company_customer` (
  `com_cus_id` int(11) NOT NULL,
  `com_cus_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_addr1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_addr2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_addr3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_zipcode` int(5) DEFAULT 0,
  `com_cus_tel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_cap_invest` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_group_bussiness` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_product_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_remark` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_area` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_indust` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_www` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_facebook` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_distance_office` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_cus_googlemap_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_company_customer`
--

INSERT INTO `tbl_company_customer` (`com_cus_id`, `com_cus_name`, `com_cus_addr1`, `com_cus_addr2`, `com_cus_addr3`, `com_cus_city`, `com_cus_zipcode`, `com_cus_tel`, `com_cus_fax`, `com_cus_email`, `com_cus_cap_invest`, `com_cus_group_bussiness`, `com_cus_product_type`, `com_cus_status`, `com_cus_remark`, `com_cus_area`, `com_cus_indust`, `com_cus_www`, `com_cus_facebook`, `com_cus_distance_office`, `com_cus_googlemap_link`) VALUES
(1, 'Beverage-Coffee', 'Chiangmai', '377 Moo 8 Tambon MaeSong', '', 'Tasongyang', 0, '0989956879', '', 'ppp@z.com', 'aaaa', '', '2', '', '', '', '2', 'https://google.com', 'https://facebook.com', '0', 'https://google.com'),
(2, 'Car Industry', 'Phuget', '', '', '', 0, '0998887761', '0978889900', 'saha@z.com', '30000000', '3', '6', 'Propect', '', '3', '2', '', '', '0', ''),
(3, 'Customer Factory', '150 ม.4 ต.บ้านเป้า', '150 ม.4 ต.บ้านเป้า', 'ประตูฝั่งตาชั่งอ้อย', 'อ.เกษตรสมบูรณ์', 0, '123456', 'CodeEx', 'csxman69@gmail.com', 'CodeEx', '2', '6', 'Suspect', '', '4', '4', '', '', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_supplier`
--

CREATE TABLE `tbl_company_supplier` (
  `com_sup_id` int(11) NOT NULL,
  `com_sup_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_addr1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_addr2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_addr3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_zipcode` int(5) DEFAULT 0,
  `com_sup_tel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_cap_invest` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_group_bussiness` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_product_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_remark` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_area` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_indust` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_www` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_facebook` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_distance_office` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_sup_googlemap_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_company_supplier`
--

INSERT INTO `tbl_company_supplier` (`com_sup_id`, `com_sup_name`, `com_sup_addr1`, `com_sup_addr2`, `com_sup_addr3`, `com_sup_city`, `com_sup_zipcode`, `com_sup_tel`, `com_sup_fax`, `com_sup_email`, `com_sup_cap_invest`, `com_sup_group_bussiness`, `com_sup_product_type`, `com_sup_status`, `com_sup_remark`, `com_sup_area`, `com_sup_indust`, `com_sup_www`, `com_sup_facebook`, `com_sup_distance_office`, `com_sup_googlemap_link`) VALUES
(1, 'Beverage-Coffee', 'Chiangmai', '377 Moo 8 Tambon MaeSong', '', 'Tasongyang', 0, '0989956879', '', 'ppp@z.com', 'aaaa', '', '2', '', '', '', '2', 'https://google.com', 'https://facebook.com', '0', 'https://google.com'),
(2, 'Car Industry', 'Phuget', '', '', '', 0, '0998887761', '0978889900', 'saha@z.com', '30000000', '3', '6', 'Propect', '', '3', '2', '', '', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cus_mobile_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cus_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cus_birth_date` date NOT NULL,
  `cus_pic_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cus_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cus_id`, `cus_name`, `cus_mobile_phone`, `cus_email`, `cus_birth_date`, `cus_pic_path`, `cus_remark`, `company_id`) VALUES
(1, 'นายอาเขต  แซ่ภู่', '+66864473731', 'phploso@hotmail.com', '2021-01-07', '20210130161404.png', '', 12),
(2, 'Arkhet  Sape', '+66864473731', 'zzzzzzz@hotmail.com', '2020-07-30', '20210130161359.jpg', '', 5),
(3, 'Peter Copper', '+66864473731', 'phploso@hotmail.com', '2021-01-20', '20210130161353.jpg', 'wqeqe', 2),
(5, 'test1', '0651636553', 'csxman69@gmail.com', '2021-01-01', '20210130161411.jpg', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_type_user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emp_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_password_md5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emp_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `position_id` int(11) NOT NULL,
  `emp_tel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_mobile_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_personal_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_company_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_birth_date` date NOT NULL,
  `emp_age` int(3) NOT NULL,
  `emp_pic_path` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_work_start_date` date NOT NULL,
  `emp_work_stop_date` date DEFAULT NULL,
  `emp_sarary_start` int(10) NOT NULL,
  `emp_sarary_now` int(10) NOT NULL,
  `emp_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emp_blood_group` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `emp_gender` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_height` int(3) NOT NULL,
  `emp_weight` int(3) NOT NULL,
  `company_id` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`emp_id`, `emp_name`, `emp_type_user`, `emp_username`, `emp_password`, `emp_password_md5`, `emp_address`, `position_id`, `emp_tel`, `emp_mobile_phone`, `emp_personal_email`, `emp_company_email`, `emp_birth_date`, `emp_age`, `emp_pic_path`, `emp_work_start_date`, `emp_work_stop_date`, `emp_sarary_start`, `emp_sarary_now`, `emp_remark`, `emp_status`, `emp_blood_group`, `emp_gender`, `emp_height`, `emp_weight`, `company_id`) VALUES
(1, 'Arkhet Saepu', '', 'admin', '', 'd41d8cd98f00b204e9800998ecf8427e', ' 118/2 Moo 4 Tambon Huaysai', 5, '0989989876', '+66864473731', 'phploso@hotmail.com', 'phploso@hotmail.com', '2020-12-31', 30, '20210206160655.jpg', '2021-01-05', '0001-01-01', 7000, 15000, '', 'Single', 'A', 'Man', 189, 78, 1),
(2, 'Arkhet Saepu', '', 'phploso', '', 'd41d8cd98f00b204e9800998ecf8427e', ' 118/2 Moo 4 Tambon Huaysai', 5, '0989989000', '06864473731', 'phploso@hotmail.com', 'phploso@hotmail.com', '2021-01-06', 30, '20210206160632.png', '2020-12-31', '0000-00-00', 5000, 8000, '', 'Married', 'O', 'Man', 167, 65, 1),
(4, 'นายสมชัย   มหานาม', '', 'somchai', '', 'd41d8cd98f00b204e9800998ecf8427e', '       118/2 Moo 4 Tambon Huaysai', 1, '0989989000', '0984445567', 'phploso@hotmail.com', 'phploso@hotmail.com', '2021-01-06', 30, '20210130161203.jpg', '2020-12-31', '0000-00-00', 8000, 15000, '', 'Single', 'O', 'Man', 189, 89, 1),
(6, 'นาบเลิศพันธุ์   สมัครใจ', '', 'lertpan', '', 'd41d8cd98f00b204e9800998ecf8427e', '  118/2 Moo 4 Tambon Huaysai', 5, '0989989000', '0984445567', 'phploso@hotmail.com', 'phploso@hotmail.com', '2021-01-06', 30, '20210127114935.jpg', '2020-12-31', '0000-00-00', 8000, 15000, '', 'Married', 'AB', 'Man', 189, 89, 1),
(10, 'Arkhet Saepu', '', 'popupwqeqwe', '', 'd41d8cd98f00b204e9800998ecf8427e', '            118/2 Moo 4 Tambon Huaysai', 5, '', '+66864473731', 'phploso@hotmail.com', 'phploso@hotmail.com', '2021-01-26', 30, '20210206160504.jpg', '2021-01-27', '2021-01-13', 4000, 50000, '', 'Married', 'B', 'Women', 100, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_factory_group`
--

CREATE TABLE `tbl_factory_group` (
  `id_factory_group` int(11) NOT NULL,
  `name_factory_group` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_factory_group`
--

INSERT INTO `tbl_factory_group` (`id_factory_group`, `name_factory_group`) VALUES
(1, 'THAIBEV'),
(2, 'NESTLE'),
(3, 'BOONRAWD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_industrial_estate`
--

CREATE TABLE `tbl_industrial_estate` (
  `id_industrial_estate` int(11) NOT NULL,
  `name_industrial_estate` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_industrial_estate`
--

INSERT INTO `tbl_industrial_estate` (`id_industrial_estate`, `name_industrial_estate`) VALUES
(1, 'GateWay City'),
(2, 'WHA ชลบุรี (โครงการ 2)'),
(3, 'WHA  ตะวันออก (มาบตาพุด)'),
(4, 'WHA Eastern C-board');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `inv_id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `inv_status` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `inv_pn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `inv_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `inv_sell_price` int(11) NOT NULL,
  `inv_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `inv_pic_path` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `inv_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id_invoice` int(11) NOT NULL,
  `rqs_id` varchar(100) NOT NULL,
  `rtc_pn` varchar(100) NOT NULL,
  `vs_name` varchar(100) NOT NULL,
  `vs_company` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id_invoice`, `rqs_id`, `rtc_pn`, `vs_name`, `vs_company`, `create_date`) VALUES
(1, '123099', '5750000', 'Supplier01', 'Company01', '2021-02-09 19:07:04'),
(2, '324234', 'FN0654353000', 'Supplier02', 'Company02', '2021-02-09 19:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_machine`
--

CREATE TABLE `tbl_machine` (
  `machine_id` int(11) NOT NULL,
  `machine_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `machine_type_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `machine_serial_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `machine_price` int(11) NOT NULL,
  `machine_stock` int(11) NOT NULL,
  `machine_sup_inv_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `machine_sup_inv_date` date NOT NULL,
  `machine_warranty_year` int(11) NOT NULL,
  `machine_warranty_start_date` date NOT NULL,
  `machine_warranty_stop_date` date NOT NULL,
  `machine_company_inv_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `machine_company_inv_date` date NOT NULL,
  `machine_warranty_comp_year` int(11) NOT NULL,
  `machine_warranty_comp_start_date` date NOT NULL,
  `machine_warranty_comp_stop_date` date NOT NULL,
  `status_machine` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_machine`
--

INSERT INTO `tbl_machine` (`machine_id`, `machine_status`, `machine_type_id`, `model_id`, `machine_serial_no`, `brand_id`, `machine_price`, `machine_stock`, `machine_sup_inv_no`, `machine_sup_inv_date`, `machine_warranty_year`, `machine_warranty_start_date`, `machine_warranty_stop_date`, `machine_company_inv_no`, `machine_company_inv_date`, `machine_warranty_comp_year`, `machine_warranty_comp_start_date`, `machine_warranty_comp_stop_date`, `status_machine`) VALUES
(2, 'qwertty', 3, 12, '23456gda4365640ER', 4, 1000, 1, '192', '2021-02-10', 5, '2021-02-07', '2026-02-07', '129', '2021-02-12', 4, '2021-02-07', '2025-02-07', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_machine_detail`
--

CREATE TABLE `tbl_machine_detail` (
  `mch_detail_id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `mch_detail_ink_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_detail_make_up_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_detail_clean_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_detail_tube_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_detail_nozzle_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_detail_main_pcb_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_detail_power_supply_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_detail_display_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_detail_ink_core_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_detail_warranty_year` int(11) NOT NULL,
  `mch_detail_warranty_start_date` date NOT NULL,
  `mch_detail_warranty_stop_date` date NOT NULL,
  `mch_detail_pic_path` int(11) NOT NULL,
  `mch_detail_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mch_detail_warranty_sta` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_machine_part`
--

CREATE TABLE `tbl_machine_part` (
  `mch_part_id` int(11) NOT NULL,
  `mch_part_ink_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_part_make_up_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_part_clean_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_part_tube_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_part_nozzle_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_part_main_plc_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_part_power_supply_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_part_display_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_part_ink_core_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_part_warranty_year` int(11) NOT NULL,
  `mch_part_warranty_start_date` date NOT NULL,
  `mch_part_warranty_stop_date` date NOT NULL,
  `mch_part_pic_path` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_part_remark` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mch_part_warranty_sta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_machine_type`
--

CREATE TABLE `tbl_machine_type` (
  `machine_type_id` int(11) NOT NULL,
  `machine_type_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_machine_type`
--

INSERT INTO `tbl_machine_type` (`machine_type_id`, `machine_type_name`) VALUES
(1, 'Food-Scaming'),
(2, 'Food-Frozen'),
(3, 'Food-Candy and GUM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model`
--

CREATE TABLE `tbl_model` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_model`
--

INSERT INTO `tbl_model` (`model_id`, `model_name`) VALUES
(2, 'bbbb'),
(3, 'CM100'),
(4, 'CM200'),
(5, 'CM750'),
(6, 'HG LASER FLYING 15U'),
(7, 'HG LASER FLYING 5U'),
(8, 'HG LASER FLYING 8U'),
(9, 'IFUME 400 1'),
(10, 'IFUME 8001'),
(11, 'ET 2 NEO S'),
(12, 'LASER MARKING FOBA Y.0500');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`position_id`, `position_name`) VALUES
(1, 'Position 1'),
(2, 'Purchase'),
(3, 'Production'),
(4, 'Engineer'),
(5, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_type`
--

CREATE TABLE `tbl_product_type` (
  `product_type_id` int(11) NOT NULL,
  `product_type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product_type`
--

INSERT INTO `tbl_product_type` (`product_type_id`, `product_type_name`) VALUES
(1, 'Beverage-Alcohol'),
(2, 'Beverage-Coffee'),
(3, 'Beverage-Non Alcohol'),
(4, 'Cable and Electrical'),
(5, 'Cosmetic'),
(6, 'Car Industry'),
(7, 'Cap Maker');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requisition`
--

CREATE TABLE `tbl_requisition` (
  `rqs_id` int(11) NOT NULL,
  `rqs_date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `rqs_pn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rqs_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rqs_qty` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `rqs_contract` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rqs_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `rqs_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return_certificate`
--

CREATE TABLE `tbl_return_certificate` (
  `rtc_id` int(11) NOT NULL,
  `rqs_id` int(11) NOT NULL,
  `rtc_pn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rtc_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rtc_qty` int(11) NOT NULL,
  `rtc_sup_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rtc_note` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_outside`
--

CREATE TABLE `tbl_service_outside` (
  `svo_id` int(11) NOT NULL,
  `svo_revision_no` int(11) DEFAULT 0,
  `svo_date` date DEFAULT current_timestamp(),
  `svo_company_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_machine_model` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_machine_sn` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_technician_name` int(11) DEFAULT 0,
  `svo_emp_receive` int(11) DEFAULT 0,
  `svo_emp_id_1` int(11) DEFAULT 0,
  `svo_emp_id_2` int(11) DEFAULT 0,
  `svo_emp_id_3` int(11) DEFAULT 0,
  `svo_emp_id_4` int(11) DEFAULT 0,
  `svo_emp_id_5` int(11) DEFAULT 0,
  `svo_license_plate_1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_license_plate_2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_license_plate_3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_license_plate_4` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_license_plate_5` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_active_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_case_break_down` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_detail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_remark` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_id` int(11) DEFAULT 0,
  `svo_pic_path_1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_pic_path_2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_pic_path_3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_pic_path_4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svo_pic_path_5` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_service_outside`
--

INSERT INTO `tbl_service_outside` (`svo_id`, `svo_revision_no`, `svo_date`, `svo_company_name`, `svo_machine_model`, `svo_machine_sn`, `svo_technician_name`, `svo_emp_receive`, `svo_emp_id_1`, `svo_emp_id_2`, `svo_emp_id_3`, `svo_emp_id_4`, `svo_emp_id_5`, `svo_license_plate_1`, `svo_license_plate_2`, `svo_license_plate_3`, `svo_license_plate_4`, `svo_license_plate_5`, `svo_active_type`, `svo_status`, `svo_case_break_down`, `svo_detail`, `svo_remark`, `company_id`, `svo_pic_path_1`, `svo_pic_path_2`, `svo_pic_path_3`, `svo_pic_path_4`, `svo_pic_path_5`) VALUES
(1, 2, '2021-01-01', '4', '5', '6', 7, 8, 9, 10, 11, 12, 13, '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', 24, '25', '26', '27', '28', '29'),
(2, 2, '2021-01-01', '4', '5', '6', 7, 8, 9, 10, 11, 12, 13, '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', 24, '25', '26', '27', '28', '29'),
(3, 2, '2021-01-01', '4', '5', '6', 7, 8, 9, 10, 11, 12, 13, '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', 24, '25', '26', '27', '28', '29'),
(4, 2, '2021-01-01', '4', '5', '6', 7, 8, 9, 10, 11, 12, 13, '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', 24, '25', '26', '27', '28', '29'),
(5, 2, '2021-01-01', '4', '5', '6', 7, 8, 9, 10, 11, 12, 13, '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', 24, '25', '26', '27', '28', '29'),
(6, 11, '2021-01-27', '11', '11', '11', 1, 1, 1, 1, 11, 11, 11, '11', '', '', '', '', '', '11', 'bbb', '11', '1111', 0, '', '', '', '', ''),
(7, 11, '2021-01-27', '11', '11', '11', 1, 1, 1, 1, 11, 11, 11, '11', '', '', '', '', '', '11', 'bbb', '11', '1111', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_inventory`
--

CREATE TABLE `tbl_sub_inventory` (
  `sub_inv_id` int(11) NOT NULL,
  `mch_detail_id` int(11) NOT NULL,
  `sub_inv_status` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `sub_inv_pn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sub_inv_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `sub_inv_sell_price` int(11) NOT NULL,
  `sub_inv_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_inv_pic_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sub_inv_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_requisition`
--

CREATE TABLE `tbl_sub_requisition` (
  `sub_rqs_id` int(11) NOT NULL,
  `rqs_id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `machine_id_sta` varchar(4) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ใช้แยกว่าเป็น Part หรือสินค้าหลัก Main',
  `sub_rqs_pn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_rqs_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_rqs_station_location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sub_rqs_mch_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_rqs_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_return_certificate`
--

CREATE TABLE `tbl_sub_return_certificate` (
  `sub_rtc_id` int(11) NOT NULL,
  `rtc_id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `machine_id_sta` varchar(4) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ใช้แยกว่าเป็น Part หรือสินค้าหลัก Main',
  `sub_rtc_date_in` date NOT NULL,
  `sub_rtc_pn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_rtc_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_rtc_station_location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_rtc_mch_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_rtc_rqs_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_rtc_ivn_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_rtc_waranty_period` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_rtc_sup_waranty_end` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_rtc_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_posion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_mobile_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_birth_date` date NOT NULL,
  `supplier_pic_path` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplier_id`, `supplier_name`, `supplier_posion`, `supplier_mobile_phone`, `supplier_email`, `supplier_birth_date`, `supplier_pic_path`, `supplier_remark`, `com_sup_id`) VALUES
(1, 'qqq22', '22', '0651636553', 'csxman69@gmail.com', '2021-01-27', '20210130162042.jpg', '22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_type_id`, `user_type_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitor_customer`
--

CREATE TABLE `tbl_visitor_customer` (
  `vs_id` int(11) NOT NULL,
  `vs_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vs_company` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vs_position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_branch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_tel_1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_tel_2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_tel_main` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_mobile_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_email_personal` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_cus_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_visitor_customer`
--

INSERT INTO `tbl_visitor_customer` (`vs_id`, `vs_name`, `vs_address`, `vs_company`, `vs_position`, `vs_branch`, `vs_tel_1`, `vs_tel_2`, `vs_tel_main`, `vs_mobile_phone`, `vs_email`, `vs_email_personal`, `com_cus_id`) VALUES
(1, '444', '44', '44', '44', '44', '44', '44', '44', '44', '44', '44', 3),
(2, 'นายคัสสสสส', 'cus', 'cus', 'cus', 'cus', '44', '13124', '44', '0651636553', 'csxman69@gmail.com', 'csxman69@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitor_supplier`
--

CREATE TABLE `tbl_visitor_supplier` (
  `vs_id` int(11) NOT NULL,
  `vs_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vs_company` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vs_position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_branch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_tel_1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_tel_2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_tel_main` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_mobile_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vs_email_personal` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_visitor_supplier`
--

INSERT INTO `tbl_visitor_supplier` (`vs_id`, `vs_name`, `vs_address`, `vs_company`, `vs_position`, `vs_branch`, `vs_tel_1`, `vs_tel_2`, `vs_tel_main`, `vs_mobile_phone`, `vs_email`, `vs_email_personal`, `com_sup_id`) VALUES
(1, 'Supplier01', 'Supplier01', 'Company01', 'Supplier01', 'Supplier01', '12341234', '123412', '341234', '44', '44', '44', 2),
(2, 'Supplier02', 'Supplier02', 'Company02', 'Supplier02', 'Supplier02', '22222', '22222', '44', '0448811114', 'csxman69@gmail.com', 'csxman69@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `type_user` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `passwordmd5` varchar(300) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `save_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `type_user`, `username`, `password`, `passwordmd5`, `fullname`, `save_date`) VALUES
(1, 'admin', 'admin', 'MTIzNDU2', 'e10adc3949ba59abbe56e057f20f883e', 'น้องแม็ก Programer', '2020-03-16 10:38:19'),
(15, 'user', 'phploso', 'MTIzNDU2', 'e10adc3949ba59abbe56e057f20f883e', 'นายทดสอบ ระบบ user', '2020-12-31 09:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `id` int(11) NOT NULL,
  `session_user` varchar(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_login_logout`
--
ALTER TABLE `log_login_logout`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `setting_web`
--
ALTER TABLE `setting_web`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `statistic`
--
ALTER TABLE `statistic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stat_today`
--
ALTER TABLE `stat_today`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `tbl_asset`
--
ALTER TABLE `tbl_asset`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `tbl_borrow_asset`
--
ALTER TABLE `tbl_borrow_asset`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_company_customer`
--
ALTER TABLE `tbl_company_customer`
  ADD PRIMARY KEY (`com_cus_id`);

--
-- Indexes for table `tbl_company_supplier`
--
ALTER TABLE `tbl_company_supplier`
  ADD PRIMARY KEY (`com_sup_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tbl_factory_group`
--
ALTER TABLE `tbl_factory_group`
  ADD PRIMARY KEY (`id_factory_group`);

--
-- Indexes for table `tbl_industrial_estate`
--
ALTER TABLE `tbl_industrial_estate`
  ADD PRIMARY KEY (`id_industrial_estate`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tbl_machine`
--
ALTER TABLE `tbl_machine`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `tbl_machine_detail`
--
ALTER TABLE `tbl_machine_detail`
  ADD PRIMARY KEY (`mch_detail_id`);

--
-- Indexes for table `tbl_machine_part`
--
ALTER TABLE `tbl_machine_part`
  ADD PRIMARY KEY (`mch_part_id`);

--
-- Indexes for table `tbl_machine_type`
--
ALTER TABLE `tbl_machine_type`
  ADD PRIMARY KEY (`machine_type_id`);

--
-- Indexes for table `tbl_model`
--
ALTER TABLE `tbl_model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `tbl_requisition`
--
ALTER TABLE `tbl_requisition`
  ADD PRIMARY KEY (`rqs_id`);

--
-- Indexes for table `tbl_return_certificate`
--
ALTER TABLE `tbl_return_certificate`
  ADD PRIMARY KEY (`rtc_id`);

--
-- Indexes for table `tbl_service_outside`
--
ALTER TABLE `tbl_service_outside`
  ADD PRIMARY KEY (`svo_id`);

--
-- Indexes for table `tbl_sub_inventory`
--
ALTER TABLE `tbl_sub_inventory`
  ADD PRIMARY KEY (`sub_inv_id`);

--
-- Indexes for table `tbl_sub_requisition`
--
ALTER TABLE `tbl_sub_requisition`
  ADD PRIMARY KEY (`sub_rqs_id`);

--
-- Indexes for table `tbl_sub_return_certificate`
--
ALTER TABLE `tbl_sub_return_certificate`
  ADD PRIMARY KEY (`sub_rtc_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `tbl_visitor_customer`
--
ALTER TABLE `tbl_visitor_customer`
  ADD PRIMARY KEY (`vs_id`);

--
-- Indexes for table `tbl_visitor_supplier`
--
ALTER TABLE `tbl_visitor_supplier`
  ADD PRIMARY KEY (`vs_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_login_logout`
--
ALTER TABLE `log_login_logout`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `setting_web`
--
ALTER TABLE `setting_web`
  MODIFY `id_setting` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statistic`
--
ALTER TABLE `statistic`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `stat_today`
--
ALTER TABLE `stat_today`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=535;

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_asset`
--
ALTER TABLE `tbl_asset`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_borrow_asset`
--
ALTER TABLE `tbl_borrow_asset`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_company_customer`
--
ALTER TABLE `tbl_company_customer`
  MODIFY `com_cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_company_supplier`
--
ALTER TABLE `tbl_company_supplier`
  MODIFY `com_sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_factory_group`
--
ALTER TABLE `tbl_factory_group`
  MODIFY `id_factory_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_industrial_estate`
--
ALTER TABLE `tbl_industrial_estate`
  MODIFY `id_industrial_estate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_machine`
--
ALTER TABLE `tbl_machine`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_machine_detail`
--
ALTER TABLE `tbl_machine_detail`
  MODIFY `mch_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_machine_part`
--
ALTER TABLE `tbl_machine_part`
  MODIFY `mch_part_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_machine_type`
--
ALTER TABLE `tbl_machine_type`
  MODIFY `machine_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_model`
--
ALTER TABLE `tbl_model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_requisition`
--
ALTER TABLE `tbl_requisition`
  MODIFY `rqs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_return_certificate`
--
ALTER TABLE `tbl_return_certificate`
  MODIFY `rtc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service_outside`
--
ALTER TABLE `tbl_service_outside`
  MODIFY `svo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_sub_inventory`
--
ALTER TABLE `tbl_sub_inventory`
  MODIFY `sub_inv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sub_requisition`
--
ALTER TABLE `tbl_sub_requisition`
  MODIFY `sub_rqs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sub_return_certificate`
--
ALTER TABLE `tbl_sub_return_certificate`
  MODIFY `sub_rtc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_visitor_customer`
--
ALTER TABLE `tbl_visitor_customer`
  MODIFY `vs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_visitor_supplier`
--
ALTER TABLE `tbl_visitor_supplier`
  MODIFY `vs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_online`
--
ALTER TABLE `user_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=746;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
