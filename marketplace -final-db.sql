-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 09:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Biraj parajuli', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image_1` varchar(200) NOT NULL,
  `image_2` varchar(200) DEFAULT NULL,
  `image_3` varchar(200) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `is_negotiable` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `expiry_at` date NOT NULL,
  `condition_id` int(11) NOT NULL,
  `used_for` int(11) DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `is_boosted` tinyint(1) DEFAULT NULL,
  `delivery` tinyint(1) NOT NULL DEFAULT 0,
  `view_status` tinyint(1) NOT NULL DEFAULT 1,
  `approval_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `posted_by`, `is_active`, `name`, `description`, `image_1`, `image_2`, `image_3`, `category`, `is_negotiable`, `price`, `created_at`, `expiry_at`, `condition_id`, `used_for`, `location`, `is_boosted`, `delivery`, `view_status`, `approval_status`) VALUES
(12, 'ssuzzaan@gmail.com', 1, 'Macbook Air M1/ Apple Macbook /m1', 'Macbook Air M1/ Apple macbook /M1\r\nModel -Macbook Air M1\r\nCpu - M1\r\nRam - 8GB\r\nStorage - 256GB\r\nDisplay -13.3&&\r\nWITH 1 YEAR INTERNATIONAL WARRANTY & 1 MONTH CHECK TIME WARRANTY EXPECT PHYSICAL DAMAGE.', '1679736268.jpg', NULL, NULL, 1, 1, 120000, '2023-03-25', '2023-04-08', 1, 0, 'Satdobato, Bodhigram tole, near ANFA.', NULL, 0, 1, 1),
(13, 'ssuzzaan@gmail.com', 1, 'Study Table | Vintage Looking | Collection Items', 'like new table. No damage. Great for studying/ working/ computer\r\n\r\n', '1679736535.jpg', NULL, NULL, 3, 0, 5999, '2023-03-25', '2023-04-01', 3, 2, 'Kathmandu Hanumandhoka', NULL, 1, 1, 1),
(14, 'biraj@golden-duck.com', 1, 'Canon RF 24-105 mm f/4-7.1 IS STM', 'RF 24-105mm f/4-7.1 IS STM\r\nCame as a kit lens on my camera.\r\nIts new and hasn’t been used at all.\r\nCanon lens\r\nRf lens\r\nRf 24-105\r\nZoom lens', '1679748305.jpg', NULL, NULL, 18, 0, 40000, '2023-03-25', '2023-03-31', 1, 0, 'Srijanagar, Suryabinayak, Suryabinayak Municipality, Bhaktapur', NULL, 0, 1, 1),
(15, 'biraj@golden-duck.com', 1, '120w Fast Charging Thick Data Cable', 'For Samsung, Type C and iPhone.\r\nVery Thick and Durable.\r\nHigh quality.\r\nCurrent stability\r\nFast charging.\r\n100% copper core.', '1679748571.webp', NULL, NULL, 19, 1, 999, '2023-03-25', '2023-04-08', 2, 0, 'asan, Mahaboudha (Ason), Kathmandu', NULL, 1, 1, 1),
(16, 'biraj@golden-duck.com', 1, 'Dell XPS 9350 i7 6th gen', 'Dell XPS 9350\r\ni7 6th gen processor, 8GB RAM\r\n500 GB SSD\r\n4K Screen\r\n\r\n', 'dwww.jpg', NULL, NULL, 1, 0, 95000, '2023-03-25', '2023-04-04', 1, 1, 'Rudra Mati Marg, कालोपुल, मैतीदेवी', NULL, 0, 1, 1),
(17, 'biraj@golden-duck.com', 1, 'जग्गा बिक्रीमा,चपुर वजार - पैनिपारी', '(उतर,पश्चिम,पूर्व,दक्षिण मोहोडा,घामाइलो र रमाइलो पूर्णत नयाँ बस्ती)\r\n✅रौतहट, चन्द्रपुर नगरपालिका वार्ड नम्बर-६\r\n✅चपुर्-गौर रोडबाट २०० मि.\r\n✅चन्द्रपुर नगरपालिका बाट ३०० मि.\r\n✅जन्ज्योती हाई स्कुल बाट १५० मि.\r\n✅जन्ज्योती कलेज बाट १०० मि.\r\n✅महेन्द्र हाईवे बाट १ कि. मि\r\n✅२० फिटे बाटोमा अवस्थित\r\n✅उतर,पश्चिम,पूर्व,दक्षिण मोहोडा,घामाइलो र रमाइलो पूर्णत नयाँ बस्ती\r\n✅तत्काल घर बनाएर बस्न मिल्ने\r\n✅सुन्दर एवंम शान्त रमणीय वातावरण भएको', '1679749308.jpg', NULL, NULL, 20, 1, 6000000, '2023-03-25', '2023-04-29', 1, 0, 'Rautahat District, Rautahat', NULL, 0, 1, 1),
(18, 'biraj@golden-duck.com', 1, 'Sony Xm4 Headphone, Sony Headphone, Best Headphone', 'Sony Xm4 Headphone (Sony Headphone) Sony\r\nGood Condition\r\nViber me if interested: 9869731710\r\nFixed Price, Comes with all the accessories and with original box\r\nBest headphone you can buy with your money.', '1679749525.png', NULL, NULL, 9, 1, 35000, '2023-03-25', '2023-04-29', 3, 1, 'naya bazar, NayaBazar, Kathmandu', NULL, 0, 1, 1),
(19, 'ssuzzaan@gmail.com', 1, 'Head First PHP & MySQL/ Best Book to learn PHP in Nepal', ' ready to create web pages more complex than those you can build with HTML and CSS, Head First PHP & MySQL is the ultimate learning guide to building dynamic, database-driven websites using PHP and MySQL', '1679750263.jpg', NULL, NULL, 20, 0, 1212, '2023-03-25', '2023-04-07', 1, 0, 'Srijanagar, Suryabinayak, Suryabinayak Municipality, Bhaktapur', NULL, 0, 1, 1),
(20, 'ssuzzaan@gmail.com', 1, 'for rent house in budhanilkantha pasikot', 'parking, pani, Garden south face bastu anusar banayeko bangalow Rent ma chha yo bangalow yekdam ramro thau ra Santa batawaran vako sabai subida vako yo ghar koi renma linu chha vane samjhanu hola ', '1679757659.jpg', NULL, NULL, 20, 1, 50000, '2023-03-25', '2023-04-29', 1, 0, 'बूढानीलकण्ठ, बूढानिलकण्ठ नगरपालिका, काठमाडौं', NULL, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `name`, `icon`) VALUES
(1, 'Laptop', NULL),
(2, 'Mobile', NULL),
(3, 'Furniture', NULL),
(9, 'Headphone', NULL),
(18, 'Camera', NULL),
(19, 'Electronics', NULL),
(20, 'Other', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(100) DEFAULT 'avatar.png',
  `is_verified` tinyint(1) DEFAULT NULL,
  `message_link` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `phone`, `password`, `image`, `is_verified`, `message_link`, `created_at`) VALUES
(1, 'Biraj parajuli', 'biraj@golden.com', '9823119616', '12345678', 'avatar.png', NULL, NULL, '2023-03-09 21:32:49'),
(5, 'Aashish Timalsina', 'ssuzzaan@gmail.com', '9800658967', 'Aashish123', 'avatar.png', NULL, NULL, '2023-03-25 15:06:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
