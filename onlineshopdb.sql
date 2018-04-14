-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2017 at 07:31 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `itemNo` int(11) NOT NULL,
  `itemCartQuantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `forumID` int(11) NOT NULL,
  `dateandtime` datetime NOT NULL,
  `description` varchar(500) NOT NULL,
  `nameUser` varchar(255) NOT NULL,
  `nameAdmin` varchar(255) NOT NULL,
  `positionAdmin` varchar(255) NOT NULL,
  `adminImg` varchar(255) NOT NULL DEFAULT 'res/admin.png',
  `userImage` varchar(255) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`forumID`, `dateandtime`, `description`, `nameUser`, `nameAdmin`, `positionAdmin`, `adminImg`, `userImage`, `role`) VALUES
(1, '2017-03-23 03:47:00', 'How do I make the feeder work? Any tips? Suggestions?', 'Patrick Gomez', '', '', 'res/admin.png', 'res/default.png', 'user'),
(1, '2017-03-23 08:07:27', 'Hello? IS anyone gonna answer me?', 'Patrick Gomez', '', '', 'res/admin.png', 'res/default.png', 'user'),
(1, '2017-03-23 11:57:41', 'Can you give me the exact details on how the feeder broke?', '', 'Rey Alegre', 'CSR', 'res/admin.png', '', 'admin'),
(1, '2017-03-25 01:03:52', 'I dont know.', 'Patrick Gomez', '', '', 'res/admin.png', 'res/default.png', 'user'),
(1, '2017-03-25 01:08:05', 'How do I start this?', '', 'Patrick Gomez', 'Senior Manager', 'res/admin.png', '', 'admin'),
(2, '2017-03-25 01:46:46', 'I want to return this product immediately.', 'Juan Dela Cruz', '', '', 'res/admin.png', 'res/bear-02.jpg', 'user'),
(2, '2017-03-25 01:48:25', 'Hi :)', 'Juan Dela Cruz', '', '', 'res/admin.png', 'res/bear-02.jpg', 'user'),
(3, '2017-03-25 02:01:00', 'testting', 'Patrick Gomez', '', '', 'res/admin.png', 'res/default.png', 'user'),
(3, '2017-03-25 02:01:38', 'tesssst1', 'Patrick Gomez', '', '', 'res/admin.png', 'res/default.png', 'user'),
(3, '2017-03-25 02:05:08', 'closingg', '', 'Rey Alegre', 'CSR', 'res/admin.png', '', 'admin'),
(1, '2017-03-25 12:18:19', 'TEST', '', 'Rey Alegre', 'CSR', 'res/admin.png', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `forumID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `postedBy` varchar(50) NOT NULL,
  `level` int(1) NOT NULL DEFAULT '1',
  `assignedTo` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'OPEN'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forumID`, `title`, `productName`, `category`, `username`, `postedBy`, `level`, `assignedTo`, `status`) VALUES
(1, 'Feeder Issue', 'HP LaserJet Pro M127fn ', 'Troubleshooting', 'patrick', 'Patrick Gomez', 1, 'admin3', 'OPEN'),
(2, 'Product Return', 'HP LaserJet Pro M127fn ', 'Return', 'user123', 'Juan Dela Cruz', 1, '', 'OPEN'),
(3, 'Replacement of product', 'HP DesignJet T795 Printer', 'Replacement', 'patrick', 'Patrick Gomez', 1, 'admin2', 'CLOSED');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemNo` int(4) NOT NULL,
  `itemName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `itemDescription` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `itemQuantity` int(4) NOT NULL,
  `itemPrice` int(10) NOT NULL,
  `itemImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemNo`, `itemName`, `itemDescription`, `itemQuantity`, `itemPrice`, `itemImage`) VALUES
(31, 'HP LaserJet Pro M127fn ', 'This HP Printer is compatible with Windows 10 (printer driver update may be required', 100, 3999, 'res/printer3.jpg'),
(33, 'HP DesignJet T795 Printer', 'The HP DesignJet T795 Printer produces a wide color gamut ideal for color graphics, thanks to six Original HP inks. Print up to E/A0 without sacrificing quality, and enjoy the ability to print on everything from bond and coated papers to film ', 50, 7999, 'res/printer4.jpg'),
(35, 'HP Photosmart Premium', 'The HP Photosmart Premium printer that connects to the internet, accepts iPhone pictures and scans photos. This is an all-in-one that really does do everything.\r\n', 99, 4999, 'res/printer1.jpg'),
(36, 'test', 'test', 123, 1000, 'res/HPDESKJET4729PRINTER.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `role`) VALUES
('admin1', 'admin1', 'admin'),
('admin2', 'admin2', 'CSR'),
('admin3', 'admin3', 'Team Leader'),
('admin4', 'admin4', 'Manager'),
('admin5', 'admin5', 'Senior Manager'),
('patrick', 'patrick', 'user'),
('user123', 'user123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `newsletter_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`newsletter_email`) VALUES
('sad@gmail.com'),
('patrickllarenagomez@gmail.com'),
('test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `orderID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `itemNo` int(11) NOT NULL,
  `orderQuantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `paymentMethod` varchar(6) NOT NULL,
  `isDelivered` varchar(9) NOT NULL DEFAULT 'NOT YET'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`orderID`, `username`, `itemNo`, `orderQuantity`, `totalPrice`, `paymentMethod`, `isDelivered`) VALUES
(1, 'patrick', 31, 1, 3999, 'COD', 'DELIVERED'),
(2, 'patrick', 35, 1, 4999, 'COD', 'DELIVERED'),
(6, 'patrick', 31, 1, 3999, 'COD', 'DELIVERED'),
(7, 'patrick', 33, 1, 7999, 'COD', 'DELIVERED'),
(8, 'patrick', 35, 1, 4999, 'COD', 'NOT YET'),
(9, 'user123', 31, 1, 3999, 'COD', 'DELIVERED'),
(10, 'user123', 33, 1, 7999, 'COD', 'NOT YET'),
(11, 'patrick', 33, 1, 7999, 'COD', 'NOT YET'),
(12, 'patrick', 31, 1, 3999, 'COD', 'NOT YET');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `useraddress` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usercontactno` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `useremail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `userpaypal` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `userImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'res/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`username`, `firstname`, `lastname`, `useraddress`, `usercontactno`, `useremail`, `userpaypal`, `userImage`) VALUES
('admin2', 'Rey', 'Alegre', '', '', '', '', 'res/admin.png'),
('admin3', 'Nancy', 'Malgapo', '', '', '', '', 'res/admin.png'),
('admin4', 'Mary Ann', 'Belasa', '', '', '', '', 'res/admin.png'),
('admin5', 'Patrick', 'Gomez', '', '', '', '', 'res/admin.png'),
('patrick', 'Patrick', 'Gomez', 'TEST1', '09111111112', 'test1@gmail.com', 'test1@gmail.com', 'res/default.png'),
('user123', 'Juan', 'Dela Cruz', '274 P. Cruz Manila', '09123131312', 'juan@gmail.com', 'juan@gmail.com', 'res/bear-02.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`dateandtime`),
  ADD KEY `forumID` (`forumID`),
  ADD KEY `userImage` (`userImage`),
  ADD KEY `dateandtime` (`dateandtime`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forumID`),
  ADD KEY `forumID` (`forumID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemNo`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `itemNo` (`itemNo`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`),
  ADD KEY `userImage` (`userImage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `forumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemNo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `productorder`
--
ALTER TABLE `productorder`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`forumID`) REFERENCES `forum` (`forumID`);

--
-- Constraints for table `productorder`
--
ALTER TABLE `productorder`
  ADD CONSTRAINT `productorder_ibfk_1` FOREIGN KEY (`itemNo`) REFERENCES `items` (`itemNo`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
