-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 06:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
(1, 'Avalon Metalic', 'Bhatiawadi,near Phool Market, Surat', '+91 8238564354', 'test', 'avalonmetalic@gmail.com', 'Uttam Vachhani', '202cb962ac59075b964b07152d234b70', '2023-02-07 05:27:50', '2023-02-07 06:44:29');

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
(4, 'Sumilon Jari', '', 'Surat', 'Katargam', 'GUJARAT', '', '', '', 'GB', 'Katargam GIDC', '399651', '98451322024', '', '', 'ahs@gam.co', ''),
(8, 'Ansh', 'MR.A', 'Surat', 'Sarthana', 'Gujarat', 'DNKP06605X', '1236547854545', '12547GHST445', 'Ansh', 'Surat', '395006', '52136547890', '0216 126547', '', 'ansh@gmail.com', 'www.ansh.com');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` varchar(250) NOT NULL,
  `opening_stock` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `price`, `opening_stock`) VALUES
(38, 'FL 1010', 'One Side', '50', '50'),
(39, 'FL BCH 303', 'Flora', '58', '45'),
(40, 'FL MJ', 'One Side', '96', '35'),
(41, 'FL Orange', 'Silver', '36', '45'),
(42, 'FL Orange', 'Silver', '23', '88'),
(43, 'GP Water', 'Both Side', '12', '66'),
(44, 'GR 4-B63', 'Both Side', '45', '40'),
(46, 'J Anmol', 'Both Side', '23', ''),
(47, 'J BCH', 'Both Side', '53', ''),
(48, 'J Gold 50/35', 'Both Side', '42', ''),
(49, 'J Water', 'One Side', '63', ''),
(50, 'L Pink', 'Flora', '75', ''),
(51, 'L Anmol', 'Both Side', '52', ''),
(52, 'L Water', 'Both Side', '41', ''),
(53, 'LG Water', 'Both Side', '32', ''),
(54, 'M Anmol', 'Both Side', '45', ''),
(55, 'M Water', 'Flora', '74', ''),
(56, 'MS 11', 'Silver', '85', ''),
(57, 'NT Anmol', 'Flora', '22', ''),
(58, 'PC Water', 'One Side', '32', ''),
(59, 'PJ Water', 'One Side', '32', ''),
(60, 'PS Water', 'Both Side', '12', ''),
(61, 'Pink Flora', 'Flora', '22', ''),
(62, 'Pink WATER', 'Both Side', '25', ''),
(63, 'R Water', 'Both Side', '36', ''),
(64, 'RB Water', 'Both Side', '22', ''),
(65, 'R Coper', 'Both Side', '88', ''),
(66, 'R Steel grey', 'Gray', '99', ''),
(67, 'Rose Gold', 'Both Side', '25', ''),
(68, 'S Anmol', 'One Side', '69', ''),
(69, 'SBCH', 'Both Side', '85', ''),
(70, 'SN Water', 'Both Side', '33', ''),
(71, 'SPT Anmol', 'Both Side', '55', ''),
(72, 'SR Anmol', 'One Side', '74', ''),
(73, 'SR BCH', 'One Side', '12', ''),
(74, 'Steel Grey', 'Gray', '56', ''),
(75, 'V Gold', 'One Side', '88', ''),
(76, 'VR GOLD', 'Both Side', '74', ''),
(77, 'WPJ BS', 'Both Side', '22', ''),
(78, 'Water 11 50/69', 'Both Side', '74', ''),
(79, 'Water Gold', 'Both Side', '63', ''),
(80, 'Y Anmol', 'Silver', '85', ''),
(81, 'Y Gold', 'One Side', '32', ''),
(82, 'Y Antic', 'Silver', '123', ''),
(83, 'Y Antic', 'Silver', '45', ''),
(84, 'Y Water', 'Flora', '45', ''),
(85, 'Zaina 303', 'Both Side', '52', ''),
(86, 'AB GOLD', 'Flora', '45', '50'),
(92, 'Test', 'Both Side', '20', '35'),
(93, 'test2', 'Flora', '30', '30'),
(94, 'test2', 'One Side', '20', '35');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(50) NOT NULL,
  `party_name` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `voucher_no` varchar(50) NOT NULL,
  `bill_no` varchar(100) NOT NULL,
  `bill_date` date NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `sgst` varchar(100) NOT NULL,
  `cgst` varchar(100) NOT NULL,
  `ammount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(100) NOT NULL,
  `productid` varchar(250) NOT NULL,
  `challan_no` varchar(50) NOT NULL,
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
(1, '39', '1', '8', '2023-02-08', 'FL BCH 303', '1', '1', '1', '58.00', '58', 'credit'),
(4, '50', '2', '4', '2023-02-08', 'L Pink', '18', '65', '250', '75.00', '18750', 'credit'),
(5, '42', '2', '4', '2023-02-08', 'FL Orange', '18', '15', '42', '23.00', '966', 'credit'),
(6, '50', '2', '4', '2023-02-08', 'L Pink', '18', '65', '250', '75.00', '18750', 'credit'),
(7, '42', '5', '8', '2023-02-08', 'FL Orange', '17', '84', '40', '23.00', '920', 'credit'),
(8, '53', '5', '8', '2023-02-08', 'LG Water', '78', '10', '60', '32.00', '1920', 'credit'),
(9, '54', '5', '8', '2023-02-09', 'M Anmol', '78', '10', '50', '45.00', '2250', 'credit'),
(10, '43', '5', '8', '2023-02-09', 'GP Water', '78', '10', '60', '12.00', '720', 'credit'),
(11, '42', '5', '4', '2023-02-09', 'FL Orange', '1', '1', '1', '23.00', '23', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_list`
--

CREATE TABLE `supplier_list` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(250) NOT NULL,
  `challan_no` varchar(250) NOT NULL,
  `cid` varchar(250) NOT NULL,
  `total_amount` varchar(250) NOT NULL,
  `pending_amount` varchar(250) NOT NULL,
  `received_amount` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `challan_no`, `cid`, `total_amount`, `pending_amount`, `received_amount`) VALUES
(2, '5', '8', '2970', '1000', '1000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_list`
--
ALTER TABLE `supplier_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
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
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier_list`
--
ALTER TABLE `supplier_list`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
