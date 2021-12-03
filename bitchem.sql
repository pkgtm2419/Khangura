-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2019 at 06:33 PM
-- Server version: 5.6.41
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemsindi_Yuvak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `date`) VALUES
(1, 'admin', 'admin@gmail.com', '11111', '2018-09-27 06:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `date`, `address`, `image`) VALUES
(4, 'Upcoming Event', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus.', '2018-10-02', 'New York', '1540557413.jpg'),
(5, 'Quisquam ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus.', '2018-10-03', 'Quisquam ', '1538416185.jpg'),
(6, 'Education', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus.', '0988-08-07', 'New York', '1538416203.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallary`
--

CREATE TABLE `gallary` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallary`
--

INSERT INTO `gallary` (`id`, `name`, `type`, `size`, `date`) VALUES
(4, '1545634467.jpg', 'image/jpeg', 123641, '2018-12-24 06:54:27'),
(6, '1538414854.jpg', 'image/jpeg', 108102, '2018-10-01 17:27:34'),
(7, '1538414864.jpg', 'image/jpeg', 91433, '2018-10-01 17:27:44'),
(8, '1538414874.jpg', 'image/jpeg', 117732, '2018-10-01 17:27:54'),
(9, '1538414882.jpg', 'image/jpeg', 117732, '2018-10-01 17:28:02'),
(10, '1538414890.jpg', 'image/jpeg', 93985, '2018-10-01 17:28:10'),
(11, '1538414910.jpg', 'image/jpeg', 85220, '2018-10-01 17:28:30'),
(12, '1538414918.jpg', 'image/jpeg', 114843, '2018-10-01 17:28:38'),
(13, '1538414926.jpg', 'image/jpeg', 129191, '2018-10-01 17:28:46'),
(14, '1538414982.jpg', 'image/jpeg', 76674, '2018-10-01 17:29:42'),
(15, '1538414998.jpg', 'image/jpeg', 123641, '2018-10-01 17:29:58'),
(16, '1538416556.jpg', 'image/jpeg', 33420, '2018-10-01 17:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `gallary2`
--

CREATE TABLE `gallary2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallary2`
--

INSERT INTO `gallary2` (`id`, `name`, `type`, `size`, `date`) VALUES
(2, '1538042362.jpg', 'image/jpeg', 794413, '2018-09-27 09:59:22'),
(3, '1538042419.jpg', 'image/jpeg', 587103, '2018-09-27 10:00:19'),
(4, '1538042385.jpg', 'image/jpeg', 810141, '2018-09-27 09:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `gallary3`
--

CREATE TABLE `gallary3` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallary3`
--

INSERT INTO `gallary3` (`id`, `name`, `type`, `size`, `date`) VALUES
(1, '1538042434.jpg', 'image/jpeg', 705056, '2018-09-27 10:00:34'),
(4, '1538042516.jpg', 'image/jpeg', 55712, '2018-09-27 10:01:56'),
(5, '1538042529.jpg', 'image/jpeg', 255991, '2018-09-27 10:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `latest_causes`
--

CREATE TABLE `latest_causes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latest_causes`
--

INSERT INTO `latest_causes` (`id`, `title`, `description`, `image`) VALUES
(2, 'providing annual', 'Make educated a poor rural child and adult by providing annual scholarship for the current educational academic year.  ', '1538415933.jpg'),
(3, 'Education', 'Make educated a poor rural child and adult by providing annual scholarship for the current educational academic year.', '1538414764.jpg'),
(4, 'gdfgdannual scholarship', 'Make educated a poor rural child and adult by providing annual scholarship for the current educational academic year.  ', '1538415952.jpg'),
(5, 'Education', 'Make educated a poor rural child and adult by providing annual scholarship for the current educational academic year.  ', '1538415961.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`) VALUES
(1, 'ENTREPRENEURSHIP DEVELOPMENT', 'Entrepreneurs play an important role in the economic development of a country. Successful entrepreneurs innovate, bring new products and concepts to the market, improve market efficiency, build wealth, create jobs, and enhance economic growth. Entrepreneu', '1540454763.jpg'),
(2, 'YOUTH EMPOWERMENT', 'In a country with more than 6,50,000 villages, where more than half of its population live in rural areas and villages. Most are remote and too isolated to benefit from the countryâ€™s impressive economic progress. Yet thereâ€™s a growing desire among peo', '1538554796.jpg'),
(4, 'SKILL DEVELOPMENT', 'Skill Development efforts across the country have been highly fragmented so far. Though India enjoys the demographic advantage of having the youngest workforce with an average age of 29 years in comparison with the advanced economies, as opposed to the de', '1538554830.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `image`) VALUES
(4, 'vnvbn', 'bvnvmbn', '1538396815.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `f_name`, `designation`, `description`, `image`) VALUES
(3, 'consectetur ', 'consectetur ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus.', '1538416024.jpg'),
(4, 'consectetur ', 'consectetur', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus.', '1538415069.jpg'),
(5, 'adipisicing ', 'adipisicing ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus.', '1538416053.jpg'),
(6, 'Catherine Grace', 'Catherine Grace', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis totam, laudantium officia praesentium expedita omnis unde tempora beatae,', '1538415105.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallary2`
--
ALTER TABLE `gallary2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallary3`
--
ALTER TABLE `gallary3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_causes`
--
ALTER TABLE `latest_causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gallary2`
--
ALTER TABLE `gallary2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallary3`
--
ALTER TABLE `gallary3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `latest_causes`
--
ALTER TABLE `latest_causes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
