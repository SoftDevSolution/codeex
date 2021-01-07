-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2021 at 05:27 PM
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
-- Database: `codeex`
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
(1, 'admin', 'logout', 'admin', '::1', '2020-12-20 14:14:57'),
(2, 'admin', 'login', 'Codeex', '::1', '2020-12-20 14:15:14'),
(3, 'admin', 'logout', 'admin', '::1', '2020-12-20 14:17:43'),
(4, 'admin', 'login', 'Vision', '::1', '2020-12-20 14:18:19'),
(5, 'admin', 'logout', 'admin', '::1', '2020-12-20 14:18:58'),
(6, 'admin', 'login', 'Codeex', '::1', '2020-12-20 14:29:08'),
(7, 'admin', 'logout', 'admin', '::1', '2020-12-20 15:26:11'),
(8, 'admin', 'login', 'Vision', '::1', '2020-12-20 15:26:22'),
(9, 'admin', 'login', 'Codeex', '::1', '2020-12-21 17:02:40'),
(10, 'admin', 'login', 'Codeex', '::1', '2020-12-28 10:34:41'),
(11, 'admin', 'logout', 'admin', '::1', '2020-12-28 11:14:50'),
(12, 'admin', 'login', '0', '::1', '2020-12-28 11:14:55'),
(13, 'admin', 'login', '0', '::1', '2020-12-29 05:23:05'),
(14, 'admin', 'login', '0', '::1', '2020-12-30 04:18:58'),
(15, 'admin', 'logout', 'admin', '::1', '2020-12-30 10:52:47'),
(16, 'admin', 'login', '0', '::1', '2020-12-30 10:52:52'),
(17, 'admin', 'logout', 'admin', '::1', '2020-12-30 10:53:34'),
(18, 'admin', 'login', '0', '::1', '2020-12-30 10:53:38'),
(19, 'admin', 'login', '0', '::1', '2020-12-30 16:03:05'),
(20, 'admin', 'logout', 'admin', '::1', '2020-12-31 01:07:51'),
(21, 'admin', 'login', '0', '::1', '2020-12-31 01:07:55'),
(22, 'admin', 'logout', 'admin', '::1', '2020-12-31 03:37:04'),
(23, 'admin', 'login', '0', '::1', '2020-12-31 03:37:16'),
(24, 'admin', 'logout', 'admin', '::1', '2020-12-31 03:37:20'),
(25, 'admin', 'login', '0', '::1', '2020-12-31 03:37:25'),
(26, 'admin', 'login', '0', '::1', '2020-12-31 04:01:38'),
(27, 'admin', 'login', '0', '::1', '2021-01-03 15:19:07'),
(28, 'admin', 'login', '0', '::1', '2021-01-07 14:12:56'),
(29, 'admin', 'login', '0', '::1', '2021-01-07 15:17:01'),
(30, 'admin', 'login', '0', '::1', '2021-01-07 15:21:04'),
(31, 'admin', 'logout', 'admin', '::1', '2021-01-07 16:18:58'),
(32, 'admin', 'login', '0', '::1', '2021-01-07 16:19:10');

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
(1, 'Lottobonus', 'deto-official@gmail.com', 'https://web.facebook.com/lottobonus', '@lottobonus999', '', 'Lottobonus', '2020-11-05', 'LottoBonus.net เลือกที่ชอบ ได้ที่ใช่โอนไวจ่ายตรงต้อง lotto bonus', 'LottoBonus.net เลือกที่ชอบ ได้ที่ใช่โอนไวจ่ายตรงต้อง lotto bonus', 'LottoBonus.net เลือกที่ชอบ ได้ที่ใช่โอนไวจ่ายตรงต้อง lotto bonus', 'Copyright © 2020 All rights reserved by Lottobonus.net');

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
-- Table structure for table `tbl_asset`
--

CREATE TABLE `tbl_asset` (
  `asset_id` int(11) NOT NULL,
  `asset_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `asset_guarantee` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `asset_condition` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `asset_destroy` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `asset_storage_location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_amount` int(11) NOT NULL,
  `asset_unit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `asset_doc_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_movement` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_borrow` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_schedule_borrow` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_pending_sale` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_balance` int(11) NOT NULL,
  `asset_real_stock` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_difference` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `asset_councilor` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `asset_cause_difference` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `asset_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `asset_pic_path_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_pic_path_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_pic_path_3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_pic_path_4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_pic_path_5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_pic_path_6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_pic_path_7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_pic_path_8` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_pic_path_9` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_pic_path_10` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `company_status` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `company_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `company_area` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_indust` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_www` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_distance_office` int(3) NOT NULL,
  `company_googlemap_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_supplier`
--

CREATE TABLE `tbl_company_supplier` (
  `com_sup_id` int(11) NOT NULL,
  `com_sup_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_addr1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_addr2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_addr3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_zipcode` int(5) NOT NULL,
  `com_sup_tel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_fax` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_cap_invest` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_group_bussiness` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_product_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_status` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_area` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_indust` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_www` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_distance_office` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `com_sup_googlemap_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
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
  `emp_work_stop_date` date NOT NULL,
  `emp_sarary_start` int(10) NOT NULL,
  `emp_sarary_now` int(10) NOT NULL,
  `emp_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_status` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `emp_blood_group` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `emp_gender` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_height` int(3) NOT NULL,
  `emp_weight` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Table structure for table `tbl_machine`
--

CREATE TABLE `tbl_machine` (
  `machine_id` int(11) NOT NULL,
  `machine_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `machine_type_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `machine_serial_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
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
(1, 'TV 32 inch'),
(2, 'PHPLOSO'),
(5, 'TV 24 inch');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model`
--

CREATE TABLE `tbl_model` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `rqs_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL
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
  `svo_revision_no` int(11) NOT NULL,
  `svo_date` date NOT NULL,
  `svo_company_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `svo_machine_model` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `svo_machine_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `svo_technician_name` int(11) NOT NULL,
  `svo_emp_receive` int(11) NOT NULL,
  `svo_emp_id_1` int(11) NOT NULL,
  `svo_emp_id_2` int(11) NOT NULL,
  `svo_emp_id_3` int(11) NOT NULL,
  `svo_emp_id_4` int(11) NOT NULL,
  `svo_emp_id_5` int(11) NOT NULL,
  `svo_license_plate_1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `svo_license_plate_2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `svo_license_plate_3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `svo_license_plate_4` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `svo_license_plate_5` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `svo_active_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `svo_status` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `svo_case_break_down` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `svo_detail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `svo_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `svo_pic_path_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `svo_pic_path_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `svo_pic_path_3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `svo_pic_path_4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `svo_pic_path_5` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Indexes for table `tbl_asset`
--
ALTER TABLE `tbl_asset`
  ADD PRIMARY KEY (`asset_id`);

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
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`inv_id`);

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
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
-- AUTO_INCREMENT for table `tbl_asset`
--
ALTER TABLE `tbl_asset`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company_supplier`
--
ALTER TABLE `tbl_company_supplier`
  MODIFY `com_sup_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `machine_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_model`
--
ALTER TABLE `tbl_model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `svo_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

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
