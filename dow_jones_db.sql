-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 11, 2021 at 12:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dow_jones_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_fname` varchar(50) NOT NULL,
  `client_lname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` tinytext DEFAULT NULL,
  `client_email` varchar(100) NOT NULL,
  `risk_tolerance` double DEFAULT NULL,
  `debts` double DEFAULT NULL,
  `networth` double DEFAULT NULL,
  `profit_percent` double DEFAULT NULL,
  `location` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_fname`, `client_lname`, `password`, `address`, `client_email`, `risk_tolerance`, `debts`, `networth`, `profit_percent`, `location`) VALUES
(1001, '', '', '', 'Block B Plot 67 New Juaben', '', 0.2, 0, 1450, 0.2, 'Kumasi'),
(1002, '', '', '', 'Block P Plot 69 Amasaman', '', 0.1, 599, 234900, 0.5, 'Accra'),
(1003, '', '', '', 'Block F Plot 78 Madina', '', 0.07, 1200, 456000, 0.4, 'Accra'),
(1004, '', '', '', 'Block R Plot 89 Real Street', '', 0.02, 0, 6700, 0.48, 'Sunyani'),
(1005, '', '', '', 'Block S Plot 14 Kekele', '', 0.17, 40, 567900, 0.6, 'Oti'),
(1006, '', '', '', 'Block W Plot 16 Navrongo', '', 0.3, 690, 59560, 0.55, 'Salaman'),
(1007, '', '', '', 'Block C Plot 25 Koforidua', '', 0.2, 1002, 35800, 0.58, 'Koforidua'),
(1008, '', '', '', 'Block L Plot 48 Bolgatanga', '', 0.05, 1300, 56000, 0.39, 'Bolgatanga'),
(1009, '', '', '', 'Block K Plot 19 Asokwa', '', 0.2, 400, 3900, 0.15, 'Kumasi'),
(1010, '', '', '', 'Block Z Plot 56 New Atonso', '', 0.2, 0, 45644, 0.25, 'Kumasi'),
(1011, 'Gideon', 'Bonsu', '@Heriosd345', 'P.O Box KW 207', 'gideonbonsu543@gmail.com', 0.6, 45, 45000, 0.5, 'Accra'),
(1012, 'Donkor', 'Safari', '@Heriosd345', 'P.O Box KW 207 ', 'gideonbonsu543@gmail.com', 0.3, 0, 60000, 0.6, 'Accra');

-- --------------------------------------------------------

--
-- Stand-in structure for view `commission_estimations`
-- (See below for the actual view)
--
CREATE TABLE `commission_estimations` (
`order_id` int(11)
,`quantity` int(11)
,`price` double
,`commission` double
);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `com_id` int(11) NOT NULL,
  `com_name` tinytext DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(130) NOT NULL,
  `com_type` tinytext DEFAULT NULL,
  `trade_name` char(4) DEFAULT NULL,
  `ratings` enum('AA','AB','BB') DEFAULT NULL,
  `liq_ratio` double DEFAULT NULL,
  `variability` double DEFAULT NULL,
  `average_returns` double DEFAULT NULL,
  `assets_value` double DEFAULT NULL,
  `debts` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`com_id`, `com_name`, `password`, `email`, `com_type`, `trade_name`, `ratings`, `liq_ratio`, `variability`, `average_returns`, `assets_value`, `debts`) VALUES
(4001, 'FanMilk Limited', '', '', 'Manufacturing', 'FANM', 'AA', 0.6, 0.55, 0.3, 1500000, 45000),
(4002, 'Cocoa Processing Company', '', '', 'Manufacturing', 'CCPL', 'AA', 0.3, 0.58, 0.6, 2540000, 15000),
(4003, 'Tullow Oil', '', '', 'Gas and Oil Production', 'TUOL', 'AB', 0.5, 0.2, 0.3, 1554000, 67000),
(4004, 'Societe Generale', '', '', 'Banking', 'SGCC', 'AB', 0.1, 0.05, 0.25, 1640000, 128000),
(4005, 'Mazuma Limited', '', '', 'Fintech', 'MZLT', 'BB', 0.25, 0.65, 0.85, 1950000, 47000),
(4006, 'Kasapreko', '', '', 'Manufacturing', 'KASC', 'AA', 0.01, 0.45, 0.67, 7540000, 20000),
(4007, 'Kempenski', '', '', 'Hotel', 'KMPH', 'AA', 0.02, 0.01, 0.12, 4560000, 34600),
(4008, 'Movenpick', '', '', 'Hotel', 'MVPH', 'AB', 0.3, 0.2, 0.4, 121000, 45750),
(4009, 'Silverbird', '', '', 'Cinema', 'SLVC', 'BB', 0.5, 0.2, 0.3, 1240000, 55040),
(4010, 'Goil', '', '', 'Gas and Oil Production', 'GOIL', 'AB', 0.55, 0.23, 0.3, 17000, 45200);

-- --------------------------------------------------------

--
-- Table structure for table `company_match`
--

CREATE TABLE `company_match` (
  `company_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_match`
--

INSERT INTO `company_match` (`company_id`, `client_id`) VALUES
(4001, 1001),
(4002, 1005),
(4003, 1008),
(4007, 1002),
(4010, 1006);

-- --------------------------------------------------------

--
-- Table structure for table `filed`
--

CREATE TABLE `filed` (
  `order_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filed`
--

INSERT INTO `filed` (`order_id`, `stock_id`) VALUES
(5004, 6003),
(5003, 6004),
(5009, 6009);

-- --------------------------------------------------------

--
-- Table structure for table `instituitions`
--

CREATE TABLE `instituitions` (
  `client_id` int(11) NOT NULL,
  `inst_name` tinytext DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `area` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instituitions`
--

INSERT INTO `instituitions` (`client_id`, `inst_name`, `password`, `area`) VALUES
(1001, 'VANGUARD', '', 'Insurance'),
(1002, 'GRIDCO', '', 'Electricity'),
(1003, 'Anglogold', '', 'Mining'),
(1004, 'Standard Chartered', '', 'Banking'),
(1005, 'McKinsey GH', '', 'Consultancy');

-- --------------------------------------------------------

--
-- Table structure for table `investors`
--

CREATE TABLE `investors` (
  `client_id` int(11) NOT NULL,
  `fname` tinytext DEFAULT NULL,
  `lname` tinytext DEFAULT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investors`
--

INSERT INTO `investors` (`client_id`, `fname`, `lname`, `password`) VALUES
(1006, 'Sofia', 'Wood', ''),
(1007, 'Idaya', 'Seidu', ''),
(1008, 'Betsy', 'Malm', ''),
(1009, 'Clement', 'Darko', ''),
(1010, 'Knowledge', 'Nunya', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `com_id` int(11) DEFAULT NULL,
  `order_type` enum('BUY','SELL') DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `commission` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `client_id`, `com_id`, `order_type`, `quantity`, `price`, `commission`) VALUES
(5003, 1006, 4002, 'BUY', 800, 15, 0.05),
(5004, 1005, 4001, 'BUY', 2000, 25, 0.1),
(5005, 1005, 4001, 'SELL', 1500, 45, 0.1),
(5007, 1004, 4005, 'BUY', 1000, 25, 0.1),
(5009, 1010, 4010, 'BUY', 4000, 35, 0.1),
(5014, 1003, 4001, 'BUY', 564, 10, 0.1),
(5019, 1003, 4010, 'BUY', 45, 10, 0.1),
(5020, 1011, 4001, 'BUY', 454, 10, 0.1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `roi`
-- (See below for the actual view)
--
CREATE TABLE `roi` (
`order_id` int(11)
,`quantity` int(11)
,`order_type` enum('BUY','SELL')
,`price` double
,`Amount` double
);

-- --------------------------------------------------------

--
-- Table structure for table `stock_prices`
--

CREATE TABLE `stock_prices` (
  `stock_id` int(11) NOT NULL,
  `com_id` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_prices`
--

INSERT INTO `stock_prices` (`stock_id`, `com_id`, `unit_price`) VALUES
(6001, 4001, 25),
(6002, 4001, 67),
(6003, 4001, 45),
(6004, 4002, 15),
(6005, 4002, 25),
(6006, 4005, 23),
(6007, 4006, 5),
(6008, 4006, 15),
(6009, 4006, 35),
(6010, 4006, 60),
(6011, 4001, 10);

-- --------------------------------------------------------

--
-- Structure for view `commission_estimations`
--
DROP TABLE IF EXISTS `commission_estimations`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `commission_estimations`  AS SELECT `orders`.`order_id` AS `order_id`, `orders`.`quantity` AS `quantity`, `orders`.`price` AS `price`, `orders`.`commission` AS `commission` FROM (`orders` join `filed` on(`orders`.`order_id` = `filed`.`order_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `roi`
--
DROP TABLE IF EXISTS `roi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `roi`  AS SELECT `orders`.`order_id` AS `order_id`, `orders`.`quantity` AS `quantity`, `orders`.`order_type` AS `order_type`, `orders`.`price` AS `price`, `orders`.`quantity`* `orders`.`price` AS `Amount` FROM (`orders` join `filed` on(`orders`.`order_id` = `filed`.`order_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`com_id`),
  ADD UNIQUE KEY `trade_name` (`trade_name`);

--
-- Indexes for table `company_match`
--
ALTER TABLE `company_match`
  ADD KEY `Matches` (`company_id`),
  ADD KEY `Clients` (`client_id`);

--
-- Indexes for table `filed`
--
ALTER TABLE `filed`
  ADD KEY `filed_ibfk_1` (`order_id`),
  ADD KEY `filed_ibfk_2` (`stock_id`);

--
-- Indexes for table `investors`
--
ALTER TABLE `investors`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `Typed` (`order_type`),
  ADD KEY `Quantity` (`quantity`),
  ADD KEY `orders_ibfk_1` (`client_id`),
  ADD KEY `orders_ibfk_2` (`com_id`);

--
-- Indexes for table `stock_prices`
--
ALTER TABLE `stock_prices`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `com_id` (`com_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4011;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5021;

--
-- AUTO_INCREMENT for table `stock_prices`
--
ALTER TABLE `stock_prices`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6012;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_match`
--
ALTER TABLE `company_match`
  ADD CONSTRAINT `company_match_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`com_id`),
  ADD CONSTRAINT `company_match_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON UPDATE CASCADE;

--
-- Constraints for table `filed`
--
ALTER TABLE `filed`
  ADD CONSTRAINT `filed_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filed_ibfk_2` FOREIGN KEY (`stock_id`) REFERENCES `stock_prices` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instituitions`
--
ALTER TABLE `instituitions`
  ADD CONSTRAINT `instituitions_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON UPDATE CASCADE;

--
-- Constraints for table `investors`
--
ALTER TABLE `investors`
  ADD CONSTRAINT `investors_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`com_id`) REFERENCES `companies` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_prices`
--
ALTER TABLE `stock_prices`
  ADD CONSTRAINT `stock_prices_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `companies` (`com_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
