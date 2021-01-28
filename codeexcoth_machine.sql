-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2021 at 03:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
(5, 'admin', 'login', '0', '::1', '2021-01-27 15:28:32');

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
(3, '11', '1', '1', '1', '1', 0, '1', '', '', '', '', '', 1, '1', '1', '1', '', '0', '', '', '', '', '', '', '', '', '', '', 'no');

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
(1, 'Brands');

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

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cus_id`, `cus_name`, `cus_mobile_phone`, `cus_email`, `cus_birth_date`, `cus_pic_path`, `cus_remark`, `company_id`) VALUES
(1, 'นายอาเขต  แซ่ภู่', '+66864473731', 'phploso@hotmail.com', '2021-01-07', '20210126200801.jpg', '', 12),
(2, 'Arkhet  Sape', '+66864473731', 'zzzzzzz@hotmail.com', '2020-07-30', '20210126200749.jpeg', '', 5),
(3, 'Peter Copper', '+66864473731', 'phploso@hotmail.com', '2021-01-20', '20210127051648.jpg', 'wqeqe', 2),
(5, 'test1', '0651636553', 'csxman69@gmail.com', '2021-01-01', '20210127051709.jpg', 'test', 1);

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
  `emp_work_stop_date` date DEFAULT NULL,
  `emp_sarary_start` int(10) NOT NULL,
  `emp_sarary_now` int(10) NOT NULL,
  `emp_remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emp_blood_group` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `emp_gender` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_height` int(3) NOT NULL,
  `emp_weight` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`emp_id`, `emp_name`, `emp_username`, `emp_password`, `emp_password_md5`, `emp_address`, `position_id`, `emp_tel`, `emp_mobile_phone`, `emp_personal_email`, `emp_company_email`, `emp_birth_date`, `emp_age`, `emp_pic_path`, `emp_work_start_date`, `emp_work_stop_date`, `emp_sarary_start`, `emp_sarary_now`, `emp_remark`, `emp_status`, `emp_blood_group`, `emp_gender`, `emp_height`, `emp_weight`) VALUES
(1, 'Arkhet Saepu', 'popup', 'MTIzNDU2', 'e10adc3949ba59abbe56e057f20f883e', '118/2 Moo 4 Tambon Huaysai', 1, '0989989876', '+66864473731', 'phploso@hotmail.com', 'phploso@hotmail.com', '2020-12-31', 30, '20210119050442.png', '2021-01-05', '0001-01-01', 7000, 15000, '', 'Single', 'A', 'Man', 189, 78),
(2, 'Arkhet Saepu', 'phploso', 'MTIzNDU2', 'e10adc3949ba59abbe56e057f20f883e', '118/2 Moo 4 Tambon Huaysai', 1, '0989989000', '06864473731', 'phploso@hotmail.com', 'phploso@hotmail.com', '2021-01-06', 30, '20210119050827.png', '2020-12-31', '0000-00-00', 5000, 8000, '', 'Married', 'O', 'Man', 167, 65),
(3, 'Arkhet Saepu', 'sile', 'MTIzNDU2', 'e10adc3949ba59abbe56e057f20f883e', '118/2 Moo 4 Tambon Huaysai', 1, '0989989000', '0984445567', 'phploso@hotmail.com', 'phploso@hotmail.com', '2021-01-06', 30, '20210119050931.png', '2020-12-31', '0000-00-00', 5000, 8000, '', 'Single', 'B', 'Women', 167, 65),
(4, 'นายสมชัย   มหานาม', 'somchai', '', 'd41d8cd98f00b204e9800998ecf8427e', ' 118/2 Moo 4 Tambon Huaysai', 1, '0989989000', '0984445567', 'phploso@hotmail.com', 'phploso@hotmail.com', '2021-01-06', 30, '', '2020-12-31', '0000-00-00', 8000, 15000, '', 'Single', 'O', 'Man', 189, 89),
(6, 'นาบเลิศพันธุ์   สมัครใจ', 'lertpan', '', 'd41d8cd98f00b204e9800998ecf8427e', ' 118/2 Moo 4 Tambon Huaysai', 1, '0989989000', '0984445567', 'phploso@hotmail.com', 'phploso@hotmail.com', '2021-01-06', 30, '20210127114935.jpg', '2020-12-31', '0000-00-00', 8000, 15000, '', 'Married', 'AB', 'Man', 189, 89),
(10, 'Arkhet Saepu', 'popupwqeqwe', '', 'd41d8cd98f00b204e9800998ecf8427e', ' 118/2 Moo 4 Tambon Huaysai', 1, '', '+66864473731', 'phploso@hotmail.com', 'phploso@hotmail.com', '2021-01-26', 30, '20210127114919.jpg', '2021-01-27', '2021-01-13', 4000, 50000, '', 'Married', 'B', 'Women', 100, 60);

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

--
-- Dumping data for table `tbl_model`
--

INSERT INTO `tbl_model` (`model_id`, `model_name`) VALUES
(2, 'bbbb');

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
(1, 'Position 1');

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
(1, 'qqq22', '22', '0651636553', 'csxman69@gmail.com', '2021-01-27', '20210127132939.jpg', '22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitor`
--

CREATE TABLE `tbl_visitor` (
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
  `vs_email_personal` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_visitor`
--

INSERT INTO `tbl_visitor` (`vs_id`, `vs_name`, `vs_address`, `vs_company`, `vs_position`, `vs_branch`, `vs_tel_1`, `vs_tel_2`, `vs_tel_main`, `vs_mobile_phone`, `vs_email`, `vs_email_personal`) VALUES
(1, '444', '44', '44', '44', '44', '44', '44', '44', '44', '44', '44');

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
-- Indexes for table `tbl_visitor`
--
ALTER TABLE `tbl_visitor`
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
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_borrow_asset`
--
ALTER TABLE `tbl_borrow_asset`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `tbl_visitor`
--
ALTER TABLE `tbl_visitor`
  MODIFY `vs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
