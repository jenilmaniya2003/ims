-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 07:47 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobile_no` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin_reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `mobile_no`, `username`, `email`, `contact`, `password`, `admin_reg_date`, `updation_date`) VALUES
(1, 'Avalon Metalic', 'Bhatiawadi,near Phool Market, Surat', '8238564354', 'test', 'avalonmetalic@gmail.com', 'Uttam Vachhani', '202cb962ac59075b964b07152d234b70', '2023-02-07 05:27:50', '2023-03-23 05:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `ledger_trans`
--

CREATE TABLE `ledger_trans` (
  `id` int(250) NOT NULL,
  `challan_no` varchar(250) NOT NULL,
  `cid` varchar(250) NOT NULL,
  `received_amount` int(250) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ledger_trans`
--

INSERT INTO `ledger_trans` (`id`, `challan_no`, `cid`, `received_amount`, `date`) VALUES
(1, '2', '4', 295, '2023-03-21'),
(2, '2', '4', 1000, '2023-03-21'),
(5, '2', '4', 2000, '2023-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pan_no` varchar(100) NOT NULL,
  `adhar_no` varchar(100) NOT NULL,
  `gstin` varchar(100) NOT NULL,
  `con_per_name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `mo_no` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `name`, `alias`, `city`, `area`, `state`, `pan_no`, `adhar_no`, `gstin`, `con_per_name`, `address`, `pin`, `mo_no`, `phone_no`, `fax`, `email`, `website`) VALUES
(10, 'AXAR JARI', '', 'SURAT', 'BHATHENA', 'GUJARAT', 'ABCDE1234F', '987654321032', '24AAAGM0289CA19', 'RAMBHAI', '12,13,ABC ,XYZ', '395006', '98765432100', '', '', '', ''),
(11, 'BHARAT JARI', '', 'SURAT', 'KATARGAM', 'GUJARAT', 'ABCDE1234F', '987654321032', '24AAAGM0289CA19', 'BHARATBHAI', '133,ABC,XYZ', '395006', '98765432100', '', '', '', ''),
(12, 'SHREEJI JARI', '', 'SURAT', 'UMIYADHAM', 'GUJARAT', 'ABCDE1234F', '987654321032', '24AAAGM0289CA19', 'SHYAMBHAI', '123,ABC,XYZ', '395006', '98765432100', '', '', '', ''),
(13, 'SURABHI JARI', '', 'SURAT', 'UDHANA', 'GUJARAT', 'ABCDE1234F', '987654321032', '24AAAGM0289CA19', 'RAMANBHAI', '123,ABC,XYZ', '395006', '98765432100', '', '', '', ''),
(14, 'SUMILON JARI', '', 'SURAT', 'KAPODRA', 'GUJARAT', 'ABCDE1234F', '987654321032', '24AAAGM0289CA19', 'SURESHBHAI', '123,ABC,XYZ', '395006', '98765432100', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` varchar(250) NOT NULL,
  `opening_stock` int(50) NOT NULL,
  `updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `price`, `opening_stock`, `updationdate`) VALUES
(38, 'FL 1010', 'One Side', '285', -13, '2023-03-27 05:31:40'),
(39, 'FL BCH 303', 'Flora', '58', 297, '2023-03-18 04:27:15'),
(40, 'FL MJ', 'One Side', '96', 154, '2023-03-23 05:05:14'),
(41, 'FL Orange', 'Silver', '36', 23, '2023-03-27 05:17:46'),
(43, 'GP Water', 'Both Side', '12', 528, '2023-03-13 05:24:00'),
(44, 'GR 4-B63', 'Both Side', '45', 40, NULL),
(46, 'J Anmol', 'Both Side', '23', 245, '2023-03-27 05:23:17'),
(47, 'J BCH', 'Both Side', '53', 50, '2023-03-23 05:05:14'),
(48, 'J Gold 50/35', 'Both Side', '42', 100, '2023-03-27 05:22:16'),
(49, 'J Water', 'One Side', '63', 0, NULL),
(50, 'L Pink', 'Flora', '75', 0, NULL),
(51, 'L Anmol', 'Both Side', '52', 0, NULL),
(52, 'L Water', 'Both Side', '41', -11, '2023-03-27 05:00:37'),
(53, 'LG Water', 'Both Side', '32', 0, NULL),
(54, 'M Anmol', 'Both Side', '45', 0, NULL),
(55, 'M Water', 'Flora', '74', -10, '2023-03-27 05:18:56'),
(56, 'MS 11', 'Silver', '85', 0, NULL),
(57, 'NT Anmol', 'Flora', '22', 0, NULL),
(58, 'PC Water', 'One Side', '32', 0, NULL),
(59, 'PJ Water', 'One Side', '32', 0, NULL),
(60, 'PS Water', 'Both Side', '12', 0, NULL),
(61, 'Pink Flora', 'Flora', '22', 0, NULL),
(62, 'Pink WATER', 'Both Side', '25', 0, NULL),
(63, 'R Water', 'Both Side', '36', 0, NULL),
(64, 'RB Water', 'Both Side', '22', -12, '2023-03-27 05:18:56'),
(65, 'R Coper', 'Both Side', '88', 0, NULL),
(66, 'R Steel grey', 'Gray', '99', 0, NULL),
(67, 'Rose Gold', 'Both Side', '25', 0, NULL),
(68, 'S Anmol', 'One Side', '69', 0, NULL),
(69, 'SBCH', 'Both Side', '85', 0, NULL),
(70, 'SN Water', 'Both Side', '33', 0, NULL),
(71, 'SPT Anmol', 'Both Side', '55', 0, NULL),
(72, 'SR Anmol', 'One Side', '74', 0, NULL),
(73, 'SR BCH', 'One Side', '12', 0, NULL),
(74, 'Steel Grey', 'Gray', '56', 0, NULL),
(75, 'V Gold', 'One Side', '88', 0, NULL),
(76, 'VR GOLD', 'Both Side', '74', 0, NULL),
(77, 'WPJ BS', 'Both Side', '22', 0, NULL),
(78, 'Water 11 50/69', 'Both Side', '74', 0, NULL),
(79, 'Water Gold', 'Both Side', '63', 0, NULL),
(80, 'Y Anmol', 'Silver', '85', 0, NULL),
(81, 'Y Gold', 'One Side', '32', 0, NULL),
(82, 'Y Antic', 'Silver', '123', 0, NULL),
(83, 'Y Antic', 'Silver', '45', 0, NULL),
(84, 'Y Water', 'Flora', '45', 0, NULL),
(85, 'Zaina 303', 'Both Side', '52', 0, NULL),
(86, 'AB GOLD', 'Flora', '45', 50, NULL),
(92, 'Test', 'Both Side', '20', 35, NULL),
(93, 'test2', 'Flora', '30', 30, NULL),
(94, 'test2', 'One Side', '20', 35, NULL),
(95, 'A Biskit', 'One Side', '280', 50, '2023-03-23 05:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(50) NOT NULL,
  `productid` varchar(100) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `invoice_no` int(50) NOT NULL,
  `bill_no` varchar(100) NOT NULL,
  `bill_date` date NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `pymnt_mode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `productid`, `supplier_name`, `date`, `invoice_no`, `bill_no`, `bill_date`, `product_name`, `quantity`, `rate`, `amount`, `pymnt_mode`) VALUES
(1, '41', '1', '2023-02-20', 45, '40', '2023-02-19', 'FL Orange', '100', '280.00', '28000', 'credit'),
(2, '44', '1', '2023-02-21', 10, '41', '2023-02-21', 'GR 4-B63', '260', '270.00', '70200', 'credit'),
(3, '48', '1', '2023-02-21', 10, '41', '2023-02-21', 'J Gold 50/35', '250', '280.00', '70000', 'credit'),
(4, '56', '1', '2023-02-21', 15, '45', '2023-02-22', 'MS 11', '190', '275.00', '52250', 'cash'),
(5, '62', '1', '2023-02-21', 15, '45', '2023-02-22', 'Pink WATER', '220', '280.00', '61600', 'cash'),
(6, '43', '1', '2023-03-10', 13, '49', '2023-03-02', 'GP Water', '280', '245.00', '68600', 'credit'),
(7, '39', '1', '2023-03-10', 13, '49', '2023-03-02', 'FL BCH 303', '275', '250.00', '68750', 'credit'),
(8, '55', '1', '2023-03-13', 46, '133', '2023-03-11', 'M Water', '150', '260.00', '39000', 'credit'),
(10, '46', '1', '2023-03-13', 47, '123', '2023-03-12', 'J Anmol', '220', '275.00', '60500', 'credit'),
(11, '43', '1', '2023-03-13', 48, '48', '2023-03-11', 'GP Water', '182', '240.00', '43680', 'credit'),
(12, '40', '1', '2023-03-23', 49, '142', '2023-03-21', 'FL MJ', '150', '200.00', '30000', 'credit'),
(13, '47', '1', '2023-03-23', 49, '142', '2023-03-21', 'J BCH', '50', '250.00', '12500', 'credit'),
(14, '95', '1', '2023-03-23', 50, '144', '2023-03-21', 'A Biskit', '50', '255.00', '12750', 'credit'),
(16, '46', '1', '2023-03-27', 51, '145', '2023-03-25', 'J Anmol', '245', '245.00', '60025', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `purch_trans`
--

CREATE TABLE `purch_trans` (
  `id` int(250) NOT NULL,
  `invoice_no` varchar(250) NOT NULL,
  `sid` varchar(250) NOT NULL,
  `total_amount` varchar(250) NOT NULL,
  `pending_amount` varchar(250) NOT NULL,
  `paid_amount` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purch_trans`
--

INSERT INTO `purch_trans` (`id`, `invoice_no`, `sid`, `total_amount`, `pending_amount`, `paid_amount`) VALUES
(1, '45', '1', '28000', '0', 28000),
(2, '10', '1', '140200', '0', 108000),
(3, '13', '1', '137350', '0', 70000),
(5, '48', '1', '43680', '0', 43680),
(6, '49', '1', '42500', '0', 52500),
(7, '50', '1', '12750', '0', 12750);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(100) NOT NULL,
  `productid` varchar(250) NOT NULL,
  `challan_no` int(50) NOT NULL,
  `party_name` varchar(200) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `product_name` varchar(200) NOT NULL,
  `box_no` varchar(100) NOT NULL,
  `bobin` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `pymnt_mode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `productid`, `challan_no`, `party_name`, `date`, `product_name`, `box_no`, `bobin`, `quantity`, `rate`, `amount`, `pymnt_mode`) VALUES
(1, '41', 1, '10', '2023-03-27', 'FL Orange', '10', '100', '10.65', '290.00', '3088.5', 'credit'),
(2, '55', 2, '11', '2023-03-27', 'M Water', '11', '100', '10.45', '285.00', '2978.25', 'credit'),
(3, '64', 2, '11', '2023-03-27', 'RB Water', '13', '105', '12.23', '285.00', '3485.55', 'credit'),
(4, '38', 3, '14', '2023-03-27', 'FL 1010', '20', '100', '12.52', '280.00', '3505.6', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `sale_trans`
--

CREATE TABLE `sale_trans` (
  `id` int(250) NOT NULL,
  `challan_no` varchar(250) NOT NULL,
  `cid` varchar(250) NOT NULL,
  `total_amount` varchar(250) NOT NULL,
  `pending_amount` varchar(250) NOT NULL,
  `received_amount` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_trans`
--

INSERT INTO `sale_trans` (`id`, `challan_no`, `cid`, `total_amount`, `pending_amount`, `received_amount`) VALUES
(2, '5', '8', '2970', '0', 1000),
(4, '126', '4', '8420.35', '0', 8420),
(5, '128', '4', '3052', '0', 3052),
(6, '1', '4', '2587.8', '0', 2587),
(7, '2', '4', '3294.6', '0', 5295),
(8, '3', '4', '3491.25', '3491.25', 0),
(9, '4', '12', '6220', '6220', 0),
(10, '1', '10', '3088.5', '-0.5', 3089),
(11, '2', '11', '6463.8', '6463.8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pan_no` varchar(100) NOT NULL,
  `adhar_no` varchar(100) NOT NULL,
  `gstin` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `mo_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `city`, `area`, `state`, `pan_no`, `adhar_no`, `gstin`, `address`, `pin`, `mo_no`, `email`, `website`) VALUES
(1, 'Brightlon Metalic', 'Surat', 'Pipodara', 'GUJARAT', 'GVXPM260P', '526556522541', '4545454545hghh', 'Beside Tempo Gali', '395060', '9845132202', 'brightlonmet@gmail.com', 'brightlonmet.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger_trans`
--
ALTER TABLE `ledger_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purch_trans`
--
ALTER TABLE `purch_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_trans`
--
ALTER TABLE `sale_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ledger_trans`
--
ALTER TABLE `ledger_trans`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `purch_trans`
--
ALTER TABLE `purch_trans`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sale_trans`
--
ALTER TABLE `sale_trans`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
