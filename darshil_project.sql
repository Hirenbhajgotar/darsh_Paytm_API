-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2019 at 02:07 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darshil_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `buying_product`
--

CREATE TABLE `buying_product` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `m_id` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `txn_amount` varchar(255) NOT NULL,
  `payment_mod` varchar(255) NOT NULL,
  `txn_date` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` text NOT NULL,
  `mobile_no` int(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buying_product`
--

INSERT INTO `buying_product` (`id`, `status`, `order_id`, `m_id`, `txn_id`, `txn_amount`, `payment_mod`, `txn_date`, `user_id`, `name`, `mobile_no`, `pincode`, `city`, `state`, `country`, `address`, `product_id`) VALUES
(133, '', 'ORDS96979862', 'OoCMIQ91797208295098', '20190917111212800110168126701165166', '12000.00', 'DC', '2019-09-17 16:17:15.0', 1, 'anil', 1234567891, '360005', 'rajkot', 'Gujarat', 'India', 'Samruddhi nagar, kalawad road, rajkot.', '20'),
(138, '', 'ORDS43792447', 'OoCMIQ91797208295098', '20190918111212800110168403300855897', '10000.00', 'NB', '2019-09-18 16:29:42.0', 1, 'nishit', 1234567897, '360005', 'rajkot', 'Gujarat', 'India', '29/9, Samruddhi nagar, kalawad road, rajkot.', '7'),
(139, '', 'ORDS25703722', 'OoCMIQ91797208295098', '20190918111212800110168667800847547', '10000.00', 'NB', '2019-09-18 16:33:57.0', 1, 'nishit', 1234567897, '360005', 'rajkot', 'Gujarat', 'India', '29/9, Samruddhi nagar, kalawad road, rajkot.', '7'),
(140, 'TXN_SUCCESS', 'ORDS69807841', 'OoCMIQ91797208295098', '20190918111212800110168212500836353', '10000.00', 'NB', '2019-09-18 16:38:06.0', 1, 'nishit', 1234567897, '360005', 'rajkot', 'Gujarat', 'India', '29/9, Samruddhi nagar, kalawad road, rajkot.', '7'),
(141, 'TXN_FAILURE', 'ORDS42746087', 'OoCMIQ91797208295098', '20190918111212800110168824100849395', '12000.00', 'NB', '2019-09-18 16:39:36.0', 1, 'anil', 1234567897, '360005', 'rajkot', 'Gujarat', 'India', 'Samruddhi nagar, kalawad road, rajkot.', '11'),
(142, 'TXN_FAILURE', 'ORDS74862865', 'OoCMIQ91797208295098', '20190918111212800110168428800834679', '60000.00', 'NB', '2019-09-18 16:42:13.0', 1, 'nishit', 1234567897, '360005', 'rajkot', 'Gujarat', 'India', '29/9, Samruddhi nagar, kalawad road, rajkot.', '17'),
(143, 'TXN_SUCCESS', 'ORDS14121620', 'OoCMIQ91797208295098', '20190918111212800110168598900858006', '6999.00', 'NB', '2019-09-18 17:33:12.0', 1, 'hien', 1234567897, '360005', 'rajkot', 'Gujarat', 'India', '29/9, Samruddhi nagar, kalawad road, rajkot.', '3');

-- --------------------------------------------------------

--
-- Table structure for table `mobiles`
--

CREATE TABLE `mobiles` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `details` varchar(255) NOT NULL,
  `price` int(200) NOT NULL,
  `m_brand_id` int(255) NOT NULL,
  `brand_tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobiles`
--

INSERT INTO `mobiles` (`id`, `image`, `name`, `details`, `price`, `m_brand_id`, `brand_tag`) VALUES
(3, 'mi-redmi-7a-1.jpeg', 'Redmi 7A (Matte Blue, 32 GB)', '4.456,777 Ratings & 3,980 Reviews#\r\n2 GB RAM | 32 GB ROM | Expandable Upto 256 GB#\r\n13.84 cm (5.45 inch) HD+ Display#\r\n12MP Rear Camera | 5MP Front Camera#\r\n4000 mAh Li-Polymer Battery#\r\nQualcomm Snapdragon 439 Processor#\r\nBrand Warranty of 2 Years Availa', 6999, 1, 'mi,\r\nreadme'),
(4, 'mi-redmi-go-2.jpeg', 'Redmi Note 7 Pro', '4.456,777 Ratings & 3,980 Reviews#\r\n2 GB RAM | 32 GB ROM | Expandable Upto 256 GB#\r\n13.84 cm (5.45 inch) HD+ Display#\r\n12MP Rear Camera | 5MP Front Camera#\r\n4000 mAh Li-Polymer Battery#\r\nQualcomm Snapdragon 439 Processor#\r\nBrand Warranty of 2 Years Availa', 8999, 1, 'mi,\r\nreadme'),
(5, 'mi-redmi-note-7-pro-3.jpeg', 'Redmi Note 7 Pro', '4.456,777 Ratings & 3,980 Reviews#\r\n2 GB RAM | 32 GB ROM | Expandable Upto 256 GB#\r\n13.84 cm (5.45 inch) HD+ Display#\r\n12MP Rear Camera | 5MP Front Camer#\r\n4000 mAh Li-Polymer Battery#\r\nQualcomm Snapdragon 439 Processor#\r\nBrand Warranty of 2 Years Availa', 6999, 1, 'mi,\r\nreadme'),
(6, 'mi-redmi-note-7s-4.jpeg', 'Redmi Y2', '4.456,777 Ratings & 3,980 Reviews#\r\n2 GB RAM | 32 GB ROM | Expandable Upto 256 GB#\r\n13.84 cm (5.45 inch) HD+ Display#\r\n12MP Rear Camera | 5MP Front Camera#\r\n4000 mAh Li-Polymer Battery#\r\nQualcomm Snapdragon 439 Processor#\r\nBrand Warranty of 2 Years Availa', 6999, 1, 'mi,\r\nreadme'),
(7, 'realme-3-rmx1825-1.jpeg', 'Realme C2', '4.42,55,994 Ratings & 25,310 Reviews#\r\n2 GB RAM | 16 GB ROM | Expandable Upto 256 GB#\r\n15.49 cm (6.1 inch) HD+ Display#\r\n13MP + 2MP | 5MP Front Camera#\r\n4000 mAh Battery#\r\nMediaTek P22 Octa Core 2.0 GHz Processor#\r\nDual Nano SIM slots and Memory Card Slot', 10000, 2, 'Realme'),
(8, 'realme-c2-rmx1941-2.jpeg', 'Realme X', '4.42,55,994 Ratings & 25,310 Reviews#\r\n2 GB RAM | 16 GB ROM | Expandable Upto 256 GB#\r\n15.49 cm (6.1 inch) HD+ Display#\r\n13MP + 2MP | 5MP Front Camera#\r\n4000 mAh Battery#\r\nMediaTek P22 Octa Core 2.0 GHz Processor#\r\nDual Nano SIM slots and Memory Card Slot', 10000, 2, 'Realme'),
(9, 'samsung-galaxy-a8-plus-1.jpeg', 'Samsung Galaxy A80 (Angel Gold, 128 GB)  (8 GB RAM)', '8 GB RAM | 128 GB ROM |#\r\n17.02 cm (6.7 inch) Full HD+ Display#\r\n48MP + 8MP | 48MP(F2.0) + 8MP(Ultra Wide/F2.2) + TOF (Time-of-Flight) 3D-Depth Rotating Camera#\r\n3700 mAh Battery#\r\nQualcomm Snapdragon 730G Octa-Core Processor#', 12000, 3, 'Samsung'),
(10, 'samsung-galaxy-a50-2.jpeg', 'Samsung Galaxy Note 10 (Angel Gold, 128 GB)  (8 GB RAM)', '8 GB RAM | 128 GB ROM |#\r\n17.02 cm (6.7 inch) Full HD+ Display#\r\n48MP + 8MP | 48MP(F2.0) + 8MP(Ultra Wide/F2.2) + TOF (Time-of-Flight) 3D-Depth Rotating Camera#\r\n3700 mAh Battery#\r\nQualcomm Snapdragon 730G Octa-Core Processor#', 12000, 3, 'Samsung'),
(11, 'samsung-galaxy-a80-sm-3.jpeg', 'Samsung Galaxy A20 (Angel Gold, 128 GB)  (8 GB RAM)', '8 GB RAM | 128 GB ROM |#\r\n17.02 cm (6.7 inch) Full HD+ Display#\r\n48MP + 8MP | 48MP(F2.0) + 8MP(Ultra Wide/F2.2) + TOF (Time-of-Flight) 3D-Depth Rotating Camera#\r\n3700 mAh Battery#\r\nQualcomm Snapdragon 730G Octa-Core Processor#', 12000, 3, 'Samsung'),
(12, 'oppo-a5s-cph1909-original-1.jpeg', 'OPPO A37f (Gold, 16 GB)  (2 GB RAM)', '2 GB RAM | 16 GB ROM | Expandable Upto 128 GB#\r\n12.7 cm (5 inch) HD Display#\r\n8MP Rear Camera | 5MP Front Camera#\r\n2630 mAh Battery#\r\nQualcomm Snapdragon 410 Quad Core 1.2GHz Processor#', 12000, 6, 'oppo'),
(14, 'oppo-a71k-cph-1801-original-2.jpeg', 'OPPO A83 (Gold, 16 GB)  (2 GB RAM)', '2 GB RAM | 16 GB ROM | Expandable Upto 128 GB#\r\n12.7 cm (5 inch) HD Display#\r\n8MP Rear Camera | 5MP Front Camera#\r\n2630 mAh Battery#\r\nQualcomm Snapdragon 410 Quad Core 1.2GHz Processor#', 12000, 6, 'oppo'),
(15, 'oppo-a83-cph1827-original-3.jpeg', 'OPPO A5s (Gold, 16 GB)  (2 GB RAM)', '2 GB RAM | 16 GB ROM | Expandable Upto 128 GB#\r\n12.7 cm (5 inch) HD Display#\r\n8MP Rear Camera | 5MP Front Camera#\r\n2630 mAh Battery#\r\nQualcomm Snapdragon 410 Quad Core 1.2GHz Processor#', 12000, 6, 'oppo'),
(16, 'oppo-f11-cph1911-original-4.jpeg', 'OPPO A71K (Gold, 16 GB)  (2 GB RAM)', '2 GB RAM | 16 GB ROM | Expandable Upto 128 GB#\r\n12.7 cm (5 inch) HD Display#\r\n8MP Rear Camera | 5MP Front Camera#\r\n2630 mAh Battery#\r\nQualcomm Snapdragon 410 Quad Core 1.2GHz Processor#', 12000, 6, 'oppo'),
(17, 'apple-iphone-8-plus-1.jpeg', 'Apple iPhone 8 Plus (Space Grey, 64 GB)', '4.63,138 Ratings & 347 Reviews#\r\n64 GB ROM |#\r\n13.97 cm (5.5 inch) Retina HD Display#\r\n12MP + 12MP | 7MP Front Camera#\r\nA11 Bionic Chip with 64-bit Architecture, Neural Engine, Embedded M11 Motion Coprocessor Processor#\r\nBrand Warranty of 1 Year#', 60000, 4, 'apple'),
(18, 'apple-iphone-8-plus-2.jpeg', 'Apple iPhone 7 Plus (Space Grey, 64 GB)', '4.63,138 Ratings & 347 Reviews#\r\n64 GB ROM |#\r\n13.97 cm (5.5 inch) Retina HD Display#\r\n12MP + 12MP | 7MP Front Camera#\r\nA11 Bionic Chip with 64-bit Architecture, Neural Engine, Embedded M11 Motion Coprocessor Processor#\r\nBrand Warranty of 1 Year#', 58000, 4, 'apple'),
(19, 'apple-iphone-8-product-red-3.jpeg', 'Apple iPhone 8 (Space Grey, 64 GB)', '4.63,138 Ratings & 347 Reviews#\r\n64 GB ROM |#\r\n13.97 cm (5.5 inch) Retina HD Display#\r\n12MP + 12MP | 7MP Front Camera#\r\nA11 Bionic Chip with 64-bit Architecture, Neural Engine, Embedded M11 Motion Coprocessor Processor#\r\nBrand Warranty of 1 Year#', 62000, 4, 'apple'),
(20, 'vivo-y12-1904-pd1901ef-ex-1.jpeg', 'Vivo Z1Pro (Sonic Black, 64 GB)', '4.578,102 Ratings & 8,872 Reviews#\r\n4 GB RAM | 64 GB ROM | Expandable Upto 256 GB#\r\n16.59 cm (6.53 inch) FHD+ Display#\r\n16MP + 8MP + 2MP | 32MP Front Camera#\r\n5000 mAh Battery#\r\nQualcomm Snapdragon 712 AIE Octa Core 2.3GHz Processor#\r\nTriple Card Slot#', 12000, 5, 'vivo'),
(21, 'vivo-y81-1803-original-2.jpeg', 'Vivo Y91 (Sonic Black, 64 GB)', '4.578,102 Ratings & 8,872 Reviews#\r\n4 GB RAM | 64 GB ROM | Expandable Upto 256 GB#\r\n16.59 cm (6.53 inch) FHD+ Display#\r\n16MP + 8MP + 2MP | 32MP Front Camera#\r\n5000 mAh Battery#\r\nQualcomm Snapdragon 712 AIE Octa Core 2.3GHz Processor#\r\nTriple Card Slot#', 12000, 5, 'Vivo'),
(22, 'vivo-y90-1908-original-3.jpeg', 'Vivo v15 (Sonic Black, 64 GB)', '4.578,102 Ratings & 8,872 Reviews#\r\n4 GB RAM | 64 GB ROM | Expandable Upto 256 GB#\r\n16.59 cm (6.53 inch) FHD+ Display.\r\n16MP + 8MP + 2MP | 32MP Front Camera.\r\n5000 mAh Battery.\r\nQualcomm Snapdragon 712 AIE Octa Core 2.3GHz Processor.\r\nTriple Card Slot.\r\nF', 12000, 5, 'vivo'),
(23, 'vivo-z1-pro-1951-4.jpeg', 'Vivo Y90 (Sonic Black, 64 GB)', '4.578,102 Ratings & 8,872 Reviews#\r\n4 GB RAM | 64 GB ROM | Expandable Upto 256 GB#\r\n16.59 cm (6.53 inch) FHD+ Display#\r\n16MP + 8MP + 2MP | 32MP Front Camera#\r\n5000 mAh Battery#\r\nQualcomm Snapdragon 712 AIE Octa Core 2.3GHz Processor#\r\nTriple Card Slot#', 12000, 5, 'vivo'),
(24, 'asus-zenfone-4-selfie-pro-1.jpeg', 'Asus Zenfone Max Pro M1 (Grey, 32 GB)', '4.32,18,796 Ratings & 33,536 Reviews\r\n3 GB RAM | 32 GB ROM | Expandable Upto 2 TB#\r\n15.21 cm (5.99 inch) Full HD+ Display#\r\n13MP + 5MP | 8MP Front Camera#\r\n5000 mAh Battery#\r\nQualcomm Snapdragon 636 Octa Core Processor#\r\nBrand Warranty of 1 Year Available', 7999, 7, 'asus'),
(25, 'asus-zenfone-5z-2.jpeg', 'Asus Zenfone Max M2 (Grey, 32 GB)', '4.32,18,796 Ratings & 33,536 Reviews\r\n3 GB RAM | 32 GB ROM | Expandable Upto 2 TB#\r\n15.21 cm (5.99 inch) Full HD+ Display#\r\n13MP + 5MP | 8MP Front Camera#\r\n5000 mAh Battery#\r\nQualcomm Snapdragon 636 Octa Core Processor#\r\nBrand Warranty of 1 Year Available', 7999, 7, 'asus'),
(26, 'asus-zenfone-max-m2-3.jpeg', 'Asus Zenfone 5 A501CG', '4.32,18,796 Ratings & 33,536 Reviews\r\n3 GB RAM | 32 GB ROM | Expandable Upto 2 TB#\r\n15.21 cm (5.99 inch) Full HD+ Display#\r\n13MP + 5MP | 8MP Front Camera#\r\n5000 mAh Battery#\r\nQualcomm Snapdragon 636 Octa Core Processor#\r\nBrand Warranty of 1 Year Available', 7999, 7, 'asus');

-- --------------------------------------------------------

--
-- Table structure for table `mobiles_brands_name`
--

CREATE TABLE `mobiles_brands_name` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobiles_brands_name`
--

INSERT INTO `mobiles_brands_name` (`id`, `name`, `img`) VALUES
(1, 'mi', 'mi.jpg'),
(2, 'realme', 'realme.jpg'),
(3, 'samsung', 'samsung.jpg'),
(4, 'apple', 'iphone.jpg'),
(5, 'vivo', 'vivo.jpeg'),
(6, 'oppo', 'oppo.jpg'),
(7, 'asus', 'asus.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `buyer_email` varchar(255) NOT NULL,
  `buyer_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `buyer_email`, `buyer_pass`) VALUES
(1, 'hiren@gmail.com', '1234'),
(2, 'anil@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buying_product`
--
ALTER TABLE `buying_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobiles`
--
ALTER TABLE `mobiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobiles_brands_name`
--
ALTER TABLE `mobiles_brands_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buying_product`
--
ALTER TABLE `buying_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `mobiles`
--
ALTER TABLE `mobiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mobiles_brands_name`
--
ALTER TABLE `mobiles_brands_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
