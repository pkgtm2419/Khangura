-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2017 at 09:32 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `Customer_Id` int(10) NOT NULL,
  `Customer_Name` varchar(50) NOT NULL,
  `Item_Name` varchar(50) DEFAULT NULL,
  `Item_Quantity` int(10) DEFAULT NULL,
  `Sales_price` double DEFAULT NULL,
  `Tax_Percentage` int(10) DEFAULT NULL,
  `Discount` int(10) DEFAULT NULL,
  `Sales_Date` date DEFAULT NULL,
  `Total_Amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`Customer_Id`, `Customer_Name`, `Item_Name`, `Item_Quantity`, `Sales_price`, `Tax_Percentage`, `Discount`, `Sales_Date`, `Total_Amount`) VALUES
(1, 'Customer2', 'Item1', 30, 1200, 2, 3, '0000-00-00', 36720),
(2, 'Customer2', 'Item1', 30, 1200, 2, 3, '0000-00-00', 36720),
(3, 'Customer2', 'Item1', 30, 1200, 2, 2, '0000-00-00', 36720),
(4, 'Customer2', 'Item1', 50, 200, 2, 2, '0000-00-00', 10200);

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `Order_Id` int(10) NOT NULL,
  `Sales_Date` date NOT NULL,
  `Client_Name` varchar(50) NOT NULL,
  `Client_Contact` varchar(30) NOT NULL,
  `Sub_Total` double NOT NULL,
  `Tax` double NOT NULL,
  `Total_Amount` double NOT NULL,
  `Discount` int(10) NOT NULL,
  `Grand_Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`Order_Id`, `Sales_Date`, `Client_Name`, `Client_Contact`, `Sub_Total`, `Tax`, `Total_Amount`, `Discount`, `Grand_Total`) VALUES
(42, '0000-00-00', 'Customer1', '9823221100', 10, 10, 2129.6, 100, 2029.6),
(43, '0000-00-00', 'Test my Customer', '9876543211', 10, 10, 1379.4, 100, 1279.4),
(44, '0000-00-00', 'Customer343', '9829999999', 10, 10, 5108.4, 10, 5098.4),
(45, '0000-00-00', 'Customer2 my test', '9867588888', 10, 10, 3620.1, 100, 3520.1),
(46, '0000-00-00', 'Ikbal', '7734343434', 10, 10, 17160, 100, 17060),
(47, '0000-00-00', 'Customer2', '9823221100', 10, 10, 6025.8, 25, 6000.8),
(48, '1970-01-01', 'CustomerDateTest', '9876554444', 10, 13, 1678.05, 100, 1578.05),
(49, '1970-01-01', 'CustomerDate', '4243243243', 10, 10, 2432.1, 100, 2332.1),
(50, '2017-05-29', 'Customer2333', '3432423423', 10, 10, 2686.2, 100, 2586.2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_Id` int(10) NOT NULL,
  `Customer_Number` int(10) DEFAULT NULL,
  `Customer_Name` varchar(50) DEFAULT NULL,
  `Phone_Number` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_Id`, `Customer_Number`, `Customer_Name`, `Phone_Number`) VALUES
(4, 10, 'Customer1', '7654321122'),
(5, 11, 'Customer2', '8756432122'),
(6, 13, 'Customer1', '23232323');

-- --------------------------------------------------------

--
-- Table structure for table `itemdetails`
--

CREATE TABLE `itemdetails` (
  `Item_Id` int(10) NOT NULL,
  `Item_Number` int(10) NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Item_Quantity` int(10) NOT NULL,
  `Price` double NOT NULL,
  `Total_Price` double NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemdetails`
--

INSERT INTO `itemdetails` (`Item_Id`, `Item_Number`, `Item_Name`, `Item_Quantity`, `Price`, `Total_Price`, `Date`) VALUES
(3, 13, 'item3', 100, 25, 2500, '2017-05-27'),
(4, 14, 'Item4', 100, 200, 20000, '2017-05-27'),
(5, 15, 'Item4', 100, 13, 1300, '2017-05-27'),
(6, 16, 'Item8', 200, 10, 2000, '2017-05-27'),
(7, 17, 'Item9', 12, 12, 144, '2017-05-27'),
(8, 18, 'Item10', 100, 12, 1200, '2017-05-29'),
(9, 19, 'Rubber', 20, 100, 2000, '2017-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin'),
('admin', 'admin'),
('admin@gmail.com', 'admin'),
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_Id` int(10) NOT NULL,
  `Sales_Date` date NOT NULL,
  `Client_Name` varchar(60) NOT NULL,
  `Client_Contact` varchar(30) NOT NULL,
  `Sub_Total` double NOT NULL,
  `Tax` int(10) NOT NULL,
  `Total_Amount` double NOT NULL,
  `Discount` int(10) NOT NULL,
  `Grand_Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `Order_Item_Id` int(10) NOT NULL,
  `Order_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Rate` double NOT NULL,
  `Total` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`Order_Item_Id`, `Order_Id`, `Product_Id`, `Quantity`, `Rate`, `Total`) VALUES
(36, 27, 12, 11, 12, '132.00'),
(37, 31, 100, 11, 22, '242.00'),
(38, 31, 101, 11, 33, '363.00'),
(39, 31, 106, 11, 12, '132.00'),
(40, 32, 100, 22, 22, '484.00'),
(41, 32, 101, 11, 33, '363.00'),
(42, 32, 106, 11, 20, '220.00'),
(43, 33, 100, 12, 100, '1200.00'),
(44, 33, 101, 30, 50, '1500.00'),
(45, 33, 106, 12, 90, '1080.00'),
(46, 34, 106, 12, 22, '264.00'),
(47, 34, 106, 10, 12, '120.00'),
(48, 35, 100, 20, 100, '2000.00'),
(49, 35, 101, 20, 20, '400.00'),
(50, 35, 123, 20, 50, '1000.00'),
(51, 36, 104, 11, 22, '242.00'),
(52, 36, 103, 22, 33, '726.00'),
(53, 36, 123, 22, 33, '726.00'),
(54, 37, 104, 23, 23, '529.00'),
(55, 37, 103, 23, 23, '529.00'),
(56, 38, 104, 43, 43, '1849.00'),
(57, 38, 103, 23, 34, '782.00'),
(58, 39, 104, 22, 12, '264.00'),
(59, 39, 103, 44, 33, '1452.00'),
(60, 40, 104, 21, 23, '483.00'),
(61, 40, 103, 323, 12, '3876.00'),
(62, 40, 123, 23, 23, '529.00'),
(63, 41, 13, 12, 12, '144.00'),
(64, 41, 14, 11, 33, '363.00'),
(65, 41, 16, 11, 33, '363.00'),
(66, 42, 13, 22, 22, '484.00'),
(67, 42, 15, 22, 33, '726.00'),
(68, 42, 16, 22, 33, '726.00'),
(69, 43, 13, 11, 12, '132.00'),
(70, 43, 14, 22, 33, '726.00'),
(71, 43, 15, 12, 33, '396.00'),
(72, 44, 13, 23, 123, '2829.00'),
(73, 44, 14, 22, 33, '726.00'),
(74, 44, 16, 33, 33, '1089.00'),
(75, 45, 13, 12, 123, '1476.00'),
(76, 45, 14, 22, 33, '726.00'),
(77, 45, 15, 33, 33, '1089.00'),
(78, 46, 13, 100, 12, '1200.00'),
(79, 46, 14, 1200, 12, '14400.00'),
(80, 47, 13, 33, 122, '4026.00'),
(81, 47, 15, 22, 33, '726.00'),
(82, 47, 16, 22, 33, '726.00'),
(83, 48, 13, 33, 12, '396.00'),
(84, 48, 15, 22, 33, '726.00'),
(85, 48, 16, 11, 33, '363.00'),
(86, 49, 13, 22, 33, '726.00'),
(87, 49, 15, 23, 33, '759.00'),
(88, 49, 16, 22, 33, '726.00'),
(89, 50, 13, 11, 123, '1353.00'),
(90, 50, 14, 22, 33, '726.00'),
(91, 50, 16, 11, 33, '363.00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `Item_Name` varchar(40) NOT NULL,
  `Item_Number` int(10) NOT NULL,
  `Purchase_Quantity` int(30) NOT NULL,
  `Purchasing_Price` double NOT NULL,
  `Sales_Price` double NOT NULL,
  `purchase_number` varchar(50) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `Supplier_Number` int(10) DEFAULT NULL,
  `notes` varchar(60) DEFAULT NULL,
  `Total_Payment` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `Item_Name`, `Item_Number`, `Purchase_Quantity`, `Purchasing_Price`, `Sales_Price`, `purchase_number`, `purchase_date`, `Supplier_Number`, `notes`, `Total_Payment`) VALUES
(46, 'TestItem', 104, 100122, 3000122, 4000122, 'purhase09812', '2017-05-27', 13, 'my test update', 600088),
(47, 'TestItem', 103, 10022, 13422, 15034, 'purchase45333', '2017-05-26', 13, 'my test description again', 1340000),
(48, 'TestItem', 123, 123, 145, 200, 'purchase-0002', '2017-05-10', 10, 'gfdgfdgfd', 123434),
(49, 'TestItem', 19, 100, 100, 110, 'purch123', '2017-05-29', 10, 'for test', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `Sales_ID` int(11) NOT NULL,
  `Customer_Number` int(10) NOT NULL,
  `Item_Name` varchar(50) NOT NULL,
  `Item_Number` int(10) NOT NULL,
  `Item_Quantity` int(10) NOT NULL,
  `Sales_Price` double NOT NULL,
  `Tax_Percentage` int(10) NOT NULL,
  `Sales_Date` date NOT NULL,
  `Total_Amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`Sales_ID`, `Customer_Number`, `Item_Name`, `Item_Number`, `Item_Quantity`, `Sales_Price`, `Tax_Percentage`, `Sales_Date`, `Total_Amount`) VALUES
(29, 10, '', 101, 20, 1200, 2, '2017-05-13', 24480),
(30, 10, '', 100, 30, 1200, 2, '2017-05-13', 36720),
(31, 10, '', 101, 12, 1200, 1, '2017-05-13', 14544),
(32, 10, '', 101, 2, 1200, 2, '2017-05-15', 2448),
(33, 10, '', 106, 3, 150, 3, '2017-05-15', 463.5),
(34, 10, '', 106, 1, 150, 1, '2017-05-15', 151.5),
(35, 10, '', 106, 2, 150, 2, '2017-05-15', 306),
(36, 10, '', 106, 2, 150, 2, '2017-05-15', 306),
(37, 10, '', 106, 1, 150, 2, '2017-05-15', 153),
(38, 10, '', 106, 2, 150, 2, '2017-05-15', 306),
(39, 10, '', 106, 30, 150, 2, '2017-05-15', 4590),
(40, 10, '', 106, 50, 150, 3, '2017-05-15', 7725),
(41, 10, '', 106, 12, 150, 2, '2017-05-15', 1836),
(42, 10, '', 123, 12, 200, 2, '2017-05-15', 2448),
(43, 10, '', 101, 30, 1200, 12, '2017-05-17', 123555);

-- --------------------------------------------------------

--
-- Table structure for table `stockdetails`
--

CREATE TABLE `stockdetails` (
  `Item_id` int(10) NOT NULL,
  `Item_Number` int(10) NOT NULL,
  `Item_Quantity` int(10) DEFAULT NULL,
  `Purchase_Price` double DEFAULT NULL,
  `Sales_Price` double DEFAULT NULL,
  `Total_Price` double NOT NULL,
  `Stock_Type` varchar(10) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockdetails`
--

INSERT INTO `stockdetails` (`Item_id`, `Item_Number`, `Item_Quantity`, `Purchase_Price`, `Sales_Price`, `Total_Price`, `Stock_Type`, `Date`) VALUES
(106, 19, 20, 100, 110, 2000, 'Old', '2017-05-29'),
(107, 19, 100, 100, 110, 11000, 'New', '2017-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_Id` int(10) NOT NULL,
  `Supplier_Number` int(10) NOT NULL,
  `Supplier_Name` varchar(50) NOT NULL,
  `Phone_Number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_Id`, `Supplier_Number`, `Supplier_Name`, `Phone_Number`) VALUES
(1, 10, 'Supplier1', '9865431222'),
(2, 11, 'Supplier2', '8765431222'),
(5, 13, 'First Supplier', '8765432122');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`Customer_Id`),
  ADD UNIQUE KEY `Customer_Id` (`Customer_Id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_Id`),
  ADD UNIQUE KEY `Customer_Id` (`Customer_Id`),
  ADD UNIQUE KEY `Customer_Number` (`Customer_Number`);

--
-- Indexes for table `itemdetails`
--
ALTER TABLE `itemdetails`
  ADD PRIMARY KEY (`Item_Id`),
  ADD UNIQUE KEY `Item_Number` (`Item_Number`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`Order_Item_Id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`Sales_ID`),
  ADD KEY `Item_Number` (`Item_Number`),
  ADD KEY `Item_Number_2` (`Item_Number`);

--
-- Indexes for table `stockdetails`
--
ALTER TABLE `stockdetails`
  ADD PRIMARY KEY (`Item_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_Id`),
  ADD UNIQUE KEY `Supplier_Number` (`Supplier_Number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `Customer_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `Order_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `itemdetails`
--
ALTER TABLE `itemdetails`
  MODIFY `Item_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Order_Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `Order_Item_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `Sales_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `stockdetails`
--
ALTER TABLE `stockdetails`
  MODIFY `Item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supplier_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
