-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 07:07 AM
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
-- Database: `e-com-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(35) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f88'),
(2, 'alvin', 'alvin@123', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(10,0) NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `address_id`, `order_date`) VALUES
(81, '3636', 'paid', 1, 4, '2023-02-18'),
(82, '948', 'paid', 11, 1, '2023-02-18'),
(83, '1947', 'Delivered', 11, 2, '2023-02-18'),
(84, '7596', 'Delivered', 9, 5, '2023-02-18'),
(85, '1796', 'paid', 9, 5, '2023-02-18'),
(86, '665', 'paid', 1, 4, '2023-02-18'),
(87, '4849', 'paid', 11, 3, '2023-02-18'),
(88, '2397', 'Delivered', 9, 5, '2023-02-27'),
(89, '4674', 'On the way', 9, 5, '2023-02-27'),
(90, '849', 'paid', 11, 2, '2023-02-27'),
(91, '898', 'paid', 11, 3, '2023-02-27'),
(92, '2547', 'paid', 11, 6, '2023-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `item_quantity`, `user_id`) VALUES
(8, 11, 4, 2, 8),
(10, 12, 4, 2, 9),
(12, 13, 2, 2, 9),
(13, 13, 3, 2, 9),
(18, 18, 1, 1, 8),
(19, 18, 2, 3, 8),
(20, 20, 1, 1, 1),
(21, 22, 1, 2, 1),
(22, 24, 2, 1, 1),
(23, 26, 2, 1, 1),
(24, 26, 3, 1, 1),
(25, 28, 3, 5, 9),
(26, 29, 3, 1, 9),
(27, 29, 4, 2, 9),
(28, 31, 4, 1, 9),
(29, 31, 1, 1, 9),
(30, 33, 2, 1, 1),
(31, 35, 1, 1, 8),
(32, 35, 3, 1, 8),
(33, 37, 4, 1, 1),
(34, 39, 3, 2, 1),
(35, 41, 1, 1, 1),
(36, 43, 2, 1, 1),
(37, 45, 1, 1, 8),
(38, 46, 1, 1, 8),
(39, 46, 2, 1, 8),
(40, 47, 1, 2, 1),
(41, 48, 1, 1, 1),
(42, 49, 1, 1, 9),
(43, 50, 3, 1, 9),
(44, 51, 11, 1, 9),
(45, 52, 1, 1, 11),
(46, 53, 1, 1, 11),
(49, 54, 1, 1, 11),
(50, 55, 1, 1, 11),
(51, 55, 2, 2, 11),
(52, 55, 11, 5, 11),
(53, 56, 1, 2, 2),
(54, 56, 2, 1, 2),
(55, 57, 1, 2, 2),
(56, 57, 2, 1, 2),
(57, 57, 11, 1, 2),
(58, 58, 1, 2, 2),
(59, 58, 0, 0, 2),
(60, 58, 0, 0, 2),
(61, 59, 1, 4, 2),
(62, 60, 1, 1, 2),
(63, 61, 1, 5, 2),
(64, 62, 1, 5, 2),
(65, 63, 1, 1, 2),
(66, 64, 1, 1, 2),
(67, 65, 2, 2, 2),
(68, 66, 3, 1, 11),
(69, 67, 3, 1, 11),
(70, 68, 3, 1, 11),
(71, 69, 4, 1, 11),
(72, 70, 1, 2, 11),
(73, 71, 3, 3, 11),
(74, 72, 3, 3, 11),
(75, 73, 2, 6, 11),
(76, 74, 1, 1, 11),
(77, 74, 4, 1, 11),
(78, 74, 11, 1, 11),
(79, 75, 26, 1, 11),
(80, 75, 28, 3, 11),
(81, 76, 1, 4, 11),
(82, 76, 11, 1, 11),
(83, 77, 26, 1, 11),
(84, 78, 2, 1, 11),
(85, 79, 28, 1, 11),
(86, 80, 19, 1, 1),
(87, 81, 2, 1, 1),
(88, 81, 4, 1, 1),
(89, 82, 26, 1, 11),
(90, 82, 19, 1, 11),
(91, 83, 3, 3, 11),
(92, 84, 30, 4, 9),
(93, 85, 29, 2, 9),
(94, 86, 1, 1, 1),
(95, 87, 28, 1, 11),
(96, 87, 11, 2, 11),
(97, 88, 2, 1, 9),
(98, 88, 3, 1, 9),
(99, 88, 26, 1, 9),
(100, 89, 4, 2, 9),
(101, 90, 28, 1, 11),
(102, 91, 26, 2, 11),
(103, 92, 28, 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(30) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `user_id`, `transaction_id`, `payment_date`) VALUES
(1, 20, 1, 'tok_1MJrnBSC2OvST834IBsgoxbq', '0000-00-00'),
(2, 22, 1, 'tok_1MJrr8SC2OvST834DYqeVuMO', '0000-00-00'),
(3, 24, 1, 'tok_1MK4PySC2OvST834ESxyv7ay', '0000-00-00'),
(4, 45, 8, 'tok_1MKCRQSC2OvST834XCLY6RRn', '0000-00-00'),
(5, 46, 8, 'tok_1MKCTMSC2OvST834pwiyebLd', '0000-00-00'),
(6, 47, 1, 'tok_1MKkrqSC2OvST8349btQ3dop', '0000-00-00'),
(7, 43, 1, 'tok_1MKksaSC2OvST834gzO3hDeI', '0000-00-00'),
(8, 48, 1, 'tok_1MNs9GSC2OvST834eVuGOf65', '0000-00-00'),
(9, 11, 8, 'tok_1MNtluSC2OvST834SweX7jOx', '0000-00-00'),
(10, 49, 9, 'tok_1MNz5VSC2OvST8346ZdtZ4mO', '0000-00-00'),
(11, 51, 9, 'tok_1MOVchSC2OvST8346EArgdOE', '2022-12-28'),
(12, 53, 11, 'tok_1MOxlxSC2OvST8343cL4c7Rr', '0000-00-00'),
(13, 0, 11, 'tok_1MOxpSSC2OvST834Bgzwbkqe', '0000-00-00'),
(14, 52, 11, 'tok_1MOxxhSC2OvST834S7bkA1Ky', '0000-00-00'),
(15, 55, 11, 'tok_1MP0xUSC2OvST834fEwxj1yT', '0000-00-00'),
(16, 54, 11, 'tok_1MPdMVSC2OvST834KO7DCyC6', '2023-01-13'),
(17, 56, 2, 'tok_1MPfgvSC2OvST834Op8qQWAq', '2023-01-13'),
(18, 57, 2, 'tok_1MPfrwSC2OvST834B5U0qHCK', '2023-01-13'),
(19, 75, 11, 'tok_1MQWy0SC2OvST834W7mzPu1a', '2023-01-15'),
(20, 76, 11, 'tok_1MWcHqSC2OvST834iA8NSaAC', '2023-02-01'),
(21, 72, 11, 'tok_1MYK7rSC2OvST834gcxhAc57', '2023-02-06'),
(22, 81, 1, 'tok_1McoGHSC2OvST834oZ6NKNWt', '2023-02-18'),
(23, 86, 1, 'tok_1McpafSC2OvST834EkcYFpIL', '2023-02-18'),
(24, 83, 11, 'tok_1Mct5sSC2OvST834AJPfCOgZ', '2023-02-18'),
(25, 82, 11, 'tok_1Mct6KSC2OvST834Ui02wWCx', '2023-02-18'),
(26, 87, 11, 'tok_1Mct7gSC2OvST8348UvNCP2a', '2023-02-18'),
(27, 88, 9, 'tok_1MfwTKSC2OvST8344clCaknm', '2023-02-27'),
(28, 85, 9, 'tok_1MfwToSC2OvST834MMkyLUbn', '2023-02-27'),
(29, 84, 9, 'tok_1MfwUISC2OvST8348yuNrDyM', '2023-02-27'),
(30, 89, 9, 'tok_1MfwVkSC2OvST834rHwwVVAB', '2023-02-27'),
(31, 90, 11, 'tok_1MfwXfSC2OvST834G0JvMg5Q', '2023-02-27'),
(32, 91, 11, 'tok_1MfwYTSC2OvST834cXpARIAT', '2023-02-27'),
(33, 92, 11, 'tok_1MfwZBSC2OvST834qn5XKj0a', '2023-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_category` varchar(30) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image1` varchar(50) NOT NULL,
  `product_image2` varchar(50) NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `search_keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image1`, `product_image2`, `product_price`, `product_quantity`, `search_keyword`) VALUES
(1, 'Skybags Brat Black', 'casual bags', 'Product Dimensions : 10.01 x 19.99 x 11.99 cm; 390 Grams,\r\nManufacturer : VIP Industries Ltd,\r\nASIN  : B08Z1HHHTD,\r\nManufacturer :  VIP Industries Ltd,\r\nItem Weight : 390 g,\r\nCasual Daypacks,School Bags\r\n', 'Skybags Brat Black.jpg', 'Skybags Brat Black2.jpg', '665', 16, 'black bags ,black backpacks ,skybags,Casual Daypacks,School Bags,\r\ncollege bags,Skybags Brat Black'),
(2, 'American Tourister ', 'casual bags', 'Laptop Compatibility: No, Strap Type: Adjustable,\r\nOuter Material: Polyester, Color: Blue\r\nWater Resistance: Yes. With Rain Cover : No\r\nCapacity: 32 liters; Dimensions: 32.5 cms x 18 cms x 50 cms (LxWxH)\r\nNumber of Wheels: 0, Number of compartments: 3\r\nWa', 'American Tourister 32 Ltrs.jpg', 'American Tourister 32 Ltrs 2.jpg', '1299', 18, 'blue,blue bags,blue backpacks,laptop bags,Polyester,\r\nWater Resistance, water proof, 32 liters,school bags,college bags'),
(3, 'Gold Sky Men`s Hand Bag', 'Handbags', 'Structure and capacity: structure: inner space of this shoulder bag: 1 zipper mesh pocket and 1 zipper pocket. 1 zipper pocket in the flap 1 zipper pocket in the back of this bag. Capacity: this bag is large enough for 9? iPad , cell phone, wallet, keys a', 'Gold Sky Brown 1.jpg', 'Gold Sky  Brown2.jpg', '649', 13, 'Brown,brown bags,brown handbags,office bags,office handbags,goldsky, men\'s handbags,men\'s bag,handbags'),
(4, 'Trawoc Travel Backpack', 'Travel bags', 'LARGE, SPACIOUS & MULTI UTILITY: The hiking backpack is 80 litres, which means it is triple times the normal requirement of a backpack. This backpack bag comes with a convenient LAPTOP SLEEVE inside the main compartment. It has got several straps, buckles', 'Trawoc 1.jpg', 'Trawoc 2.jpg', '2337', 26, 'travel bags,travel backpacks, 80 litres travel bags,\r\ntrucking bags,trucking backpacks,Trekking Bag ,Trekking Backpacks'),
(11, 'Nike Hayward 2.0 ', 'casual bags', 'Fits most 15\" laptops.\nNIKE BACKPACK: The Nike backpack for men and women is a new twist on an old favorite with plenty of room for your gear. Durable shell features a new graphic along with additional pockets for extra-small item storage.\nPOLYESTER SHE', 'Nike Hayward.webp', 'Nike Hayward 2.webp', '2000', 0, 'red,red bags, red backpacks,school bags,college bags,\r\nNike bags,polyester'),
(19, '   Laptop Backpack', 'casual bags', ' Northzone Casual Waterproof Laptop Backpack/Office Bag/School Bag/College Bag/Business Bag/Travel Backpack (Dimensions:13x18 inches) (Compatible with 39.62cm(15.6inch laptop) 30 L\r\nSleek, Stylish and Premium: Heavy duty ultra premium bag with exterior di', 'NORTH ZONE1.jpg', 'NORTH ZONE2.jpg', '499', 18, ' Northzone Casual Waterproof Laptop Backpack Office Bag School Bags College Bags Business Bags Travel Backpack (Dimensions:13x18 inches)  39.62cm(15.6inch laptop) 30 L blue bags, blue backpacks, laptop bags'),
(26, 'Fedra Epoch travel ', 'Travel bags', 'Nylon 55 litres Waterproof Strolley Duffle Bag 2 Wheels Luggage Bag Green White \r\nThese bags are made from polyester/nylon mixed material - water repellent - Robust enough to carry all your belongings\r\n40 Wheels for easy carrying, 5 compartments (1 Main a', 'Fedra Epoch.jpg', 'Fedra Epoch2.jpg', '449', 14, 'Nylon 55 litres Waterproof Strolley Duffle Bag 2 Wheels Luggage Bag Green White,travel bags,travel duffels '),
(28, 'POLESTAR Travel Backpack', 'Travel bags', ' Travel Backpack for Hiking,Camping,Luggage, Trekking Bag with Shoe Compartment, Extra Durable Water-Resistant Bag with Rain Cover, 1 Year Warranty\r\n\r\nPADDED SHOULDER STRAP WITH MAXED OUT STORAGE : 55 Ltrs rucksack with Dimension of : 60 Cm x 35 Cm x 22 C', 'POLESTAR1.jpg', 'POLESTAR2.jpg', '849', 11, '  Travel Backpack for Hiking Camping Luggage Trekking Bags,  Shoe Compartment Extra Durable Water Resistant Bag,  Rain Cover BAGS,'),
(29, 'womens handbag', 'Handbags', ' This fashionable lavender women structured handbag is elegant & minimalistic. The smooth grained pattern on the surface of its plain faux leather goes with both formal & casual look. The light gold finished hardware gives it a classy touch. It has a spac', 'Lino Perros1.jpg', 'Lino Perros2.jpg', '898', 10, ' Lino Perros Yellow Faux Leather Handbag\r\nMaterial Type : Faux Leather\r\nSize : 28 Centimeters Height X 39 Centimeters Length X 8 Centimeters Width\r\nDo not expose to extreme heat'),
(30, 'Red Lemon ', 'Handbags', ' ? PREMIUM MATERIAL: This multifunctional sling bag is made of high quality water resistant and scratchproof polyester material. The hardware such as zippers, pullers are wear resistant, smooth, of premium quality and durable.\r\n?CONVENIENT STORAGE: Gracef', 'Red Lemon.jpg', 'Red Lemon2.jpg', '1899', 11, ' Red Lemon BANGE Multifunctional Waterproof Anti-Thief Sling Bag with USB Charging,blue handbags ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'jocker', 'iamjocker5@gmail.com', '0f2e53ed2ebdfc956cd1d3064cf1322b'),
(9, 'Alvin', 'alvin@123.com', 'f8ac8ebc53fd3b020ad526a5dfb1cf3f'),
(11, 'Aswin', 'aswin@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_id`, `user_id`, `name`, `email`, `city`, `phone`, `address`) VALUES
(2, 11, 'Alex', 'alex@gmail.com', 'Los Angeles', 555555555, 'Lose Angeles, CA, USA'),
(3, 11, 'Hari', 'Hari@gmail.com', 'Bangalore', 987654321, 'Bangalore,Karnataka, India'),
(4, 1, 'jocker', 'iamjocker5@gmail.com', 'Paris', 2147483647, 'Paris , France'),
(5, 9, 'Alvin', 'alvin@123.com', 'kochi', 2147483647, 'Kochi,Kerala,India'),
(6, 11, 'Aswin', 'aswindilip5@gmail.com', 'London', 1234567890, '221B Backer Street ,London ,UK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
