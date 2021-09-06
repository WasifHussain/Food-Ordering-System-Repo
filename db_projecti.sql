-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 04:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_projecti`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `email`, `address`, `contact`, `reg_date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'bagaleprizma@gmail.com', 'New Baneshwor', 9815667840, '2021-03-24 15:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `username`, `password`, `email`, `address`, `contact`, `reg_date`) VALUES
(1, 'Smirti Bagale', '202cb962ac59075b964b07152d234b70', 'smirti.bagale@yahoo.com', 'Dhangadi', 9815667840, '2021-03-25 03:21:47'),
(2, 'Wasif Hussain', 'ac9c3b9aafeb3165e642a29e5be59032', 'hussainwasif33@gmail.com', 'Hadigaun', 9866040078, '2021-05-08 13:39:40'),
(3, 'Prizma Bagale', 'd8ab9f35e6eaa30a484846addca5b2eb', 'prizma.bagale@gmail.com', 'New Baneshwor', 9817271234, '2021-05-09 12:50:15'),
(4, 'Sushan Manandhar', '4f5a196bd1ae4f5dc19267e127af76d4', 'sustaybhai@gmail.com', 'Gairidhara', 9817271234, '2021-05-11 05:34:47'),
(5, 'Pushkar Bharati', '541f88075dd65ccae52fd61d7ae89cb5', 'pushkar.bharati10@yahoo.com', 'New Baneshwor', 9826354287, '2021-05-11 05:45:18'),
(6, 'Eden Hazard', 'da897ba0fe30eff270424ac0e768840f', 'edenhazard10@hotmail.com', 'Belgium', 9871467271, '2021-06-21 04:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeID` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `restaurantID` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `username`, `email`, `address`, `contact`, `password`, `restaurantID`, `reg_date`) VALUES
(1, 'Prizma Bagale', 'prizma.bagale@yahoo.com', 'New Baneshwor', 9813602725, 'd8ab9f35e6eaa30a484846addca5b2eb', 2, '2021-03-27 05:53:57'),
(2, 'Wasif Hussain', 'hussainwasif@gmail.com', 'Hadigaun', 9813602725, 'ac9c3b9aafeb3165e642a29e5be59032', 5, '2021-03-26 12:02:18'),
(3, 'Aakash Bharati', 'aakash@gmail.com', 'New Baneshwor', 9812834838, 'a870c4012ce2eaa3b60a4c59cb786f76', 6, '2021-04-21 08:18:20'),
(4, 'Ina Adhikari', 'inaadhikari@yahoo.com', 'Kapan', 9849654333, '81dc9bdb52d04dc20036dbd8313ed055', 5, '2021-03-24 17:39:00'),
(5, 'Sudina Shrestha', 'sudinash@hotmail.com', 'Bhaktapur', 9813602725, 'af7d6a5bc25e977decb6452fedb63a06', 1, '2021-04-21 08:18:03'),
(6, 'Pushkar Bharati', 'pushkarmessi10@gmail.com', 'Patan', 9815667840, '541f88075dd65ccae52fd61d7ae89cb5', 9, '2021-04-21 08:17:51'),
(7, 'Shubham Sangam', 'shubhamsangam@gmail.com', 'Boudha', 9812736482, '3b6beb51e76816e632a40d440eab0097', 3, '2021-04-21 08:17:38'),
(8, 'Smirti Bagale', 'smirti.bagale@yahoo.com', 'Dhangadi', 9813602725, 'd52318ee9fbe638c23dc6bf0aa9570eb', 8, '2021-04-21 03:29:29'),
(9, 'Isha Adhikari', 'ishaadhikari@gmail.com', 'Kapan', 9815667838, '2348fb08ad48acb3c42c558ce90cb46e', 4, '2021-04-21 08:12:40'),
(10, 'Sandesh Gurung', 'sandesh.gurung@yahoo.com', 'Sukedhara', 9849654333, 'dee3ae5926b1768ea18228ee54281df3', 4, '2021-04-21 08:12:27'),
(24, 'Dipesh Adhikari', 'dipesh@hotmail.com', 'Koteshwor', 9813749938, '1c1d15237b2433f18f588d8bf6984751', 7, '2021-04-21 08:16:37'),
(25, 'Sushan Manandhar', 'sustay123@gmail.com', 'Gairidhara', 9812838291, '238860c4ae4cebf506a0715a8f854503', 1, '2021-05-20 11:06:40'),
(32, 'Prakash Pradhan', 'pp@gmail.com', 'Chabahil', 9213408147, '73803249c6667c5af2d51c0dedfae487', 8, '2021-05-11 04:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(6) NOT NULL,
  `itemname` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `restaurantID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `itemname`, `price`, `description`, `restaurantID`) VALUES
(1, 'Chicken Tikka Roll', 700, 'Tandoor cooked chickentith capsicum & onions, wrapped in whole wheat paratha with eggs.', 1),
(2, 'Sea Food Biryani', 1650, 'Basmati rice & sea food cooked on dum.', 1),
(3, 'Grilled Fish', 1050, 'Served with mash potato & steam vegetables.\r\n', 1),
(4, 'Pepperoni Pizza', 740, 'Cheese and pepperoni.', 1),
(5, 'Sprout Salad', 340, 'Fresh sprout light tossed with hard boiled eggs in a honey chilli dressing.', 2),
(6, 'Captain Egg Jumbo Burger', 390, 'Crispy egg patty burger with potato edges and oriental salad by side', 2),
(7, 'Paneer Pepper Pizza', 575, 'Topped with paneer, capsicum, black olives', 2),
(8, 'Classic Egg Paratha', 350, 'Served with Dahi and Gajar Gobi Achar', 2),
(9, 'Anda Pav', 290, 'Classic egg stuffed pav Mumbai Style with fried green chillies and onion', 2),
(10, 'Tibetan Style Chicken Momo', 290, 'Served with achar and tibetan soup.', 3),
(11, 'Mo:Mo Platter', 550, 'Chicken Kothey Momo, Veg Steam Momo, Chicken Fried Momo, Chicken C Momo.', 3),
(12, 'Sea Food Platter', 1150, 'Grilled Tiger Prawn, Golden Fried Prawn, Grilled Basa Fish, Fish Finger, Potato Wedges Served With Lemon Butter Sauce.', 3),
(13, 'Chicken Steak', 550, 'Served With Mashed Potato, Sauteed Vegetable.', 3),
(14, 'Garden Green Salad', 190, 'Capsicum, Carrot And Onion With Vinaigrette Dressing.', 3),
(15, 'Crunchy Chicken Burger', 250, 'Chicken, Lettuce, Mayonnaise.', 4),
(16, 'Ham Burger', 155, 'Ham, Lettuce, Mayonnaise.', 4),
(17, 'Family Combo 3', 1150, 'Fried Chicken (8 pcs) + Coke (1 ltr)', 4),
(18, 'Family Combo 2', 1950, 'Chicken (8 pcs) + 1 Crunchy Burger + Hot Wings + 1 Biryani + Coke (1 ltr)', 4),
(19, 'Family Combo 1', 1050, 'Hot Wings (18 pcs) + Coke (1 ltr)', 4),
(20, 'Pizza Vegetariano', 595, 'Tomato sauce,mozzarella cheese,zucchini,spinach,mushroom and onion.', 5),
(21, 'Neapolitan pizza', 650, 'Tomato sauce, mozzarella cheese, anchovies, olives and capers.', 5),
(22, 'Pizza Con Pollo BBQ', 650, 'Tomato sauce,barbecue chicken pizza with mozzarella cheese.', 5),
(23, 'Pizza Connection', 700, 'Connect your desire of two pizzas half and half.', 5),
(24, 'Pepperoni', 695, 'Tomato sauce,mozzarella cheese and pepperoni.', 5),
(25, 'Buff Burger', 260, 'Grilled Buff Meat Patty, Lettuce, Tomato, Onions, Ketchup, Mayonnaise.', 6),
(26, 'Fish Fillet', 300, 'Deep Fried Breaded Fish Patty, Lettuce, And Tartar Sauce.', 6),
(27, 'Veggie Delite', 230, 'Mayo, Lettuce, tomato, Fried veggie patty, ketchup, onion.', 6),
(28, 'Double Melt', 420, 'Cheddar cheese, grilled double chicken patties, ketchup, jalapenos, onion slices, lettuce, original sauce.', 6),
(29, 'Quarter Pounder', 390, 'Grilled double chicken patties, pickled gherkins, onion slices, ketchup, mustard,mayonnaise.', 6),
(30, 'Chicken Masala', 400, 'Chicken masala is a dish of roasted chunks of chicken in a spicy sauce. The sauce is usually creamy, spiced and orange-coloured.', 7),
(31, 'Mutton Korma', 550, 'Mutton korma originated from Mughlai cuisine.', 7),
(32, 'Tandoori Non Veg Platter', 1350, 'Quarter Tandoor piece,2 pc chicken tikka ,2 pc chicken chicken kebab, 2pc mutton kabab 1 tandoor roti.', 7),
(33, 'Fish Tikka', 455, 'Masala Recipe in an oven is an Indian boneless grilled fish gravy that is very popular around the world.', 7),
(34, 'Mixed Tandoori Platter', 655, 'Paneer Tikka, Tandoori Gobi, Mushroom Tikka, Bharwan Aloo, Kachumber Salad.', 7),
(35, 'Prawn Manchow Soup', 350, 'Thick Soup with Soya Sauce, Ginger & topped with Crispy Noodles.', 8),
(36, 'Sweet Corn Salad', 300, 'Sweet Corn with Carrots, Tomato, Cucumber, Olives and Lime Dressing.', 8),
(37, 'Cheese Balls', 405, 'Potatoes & Cheese, Coated with Battered Flour & Fried, Served with Mayonnaise.', 8),
(38, 'Buff Sukuti Sandheko', 340, 'Shredded Dry Meat, Marinated with House Special & Served.', 8),
(39, 'Mixed American Chopsuey', 515, 'Crispy Noodles topped up with Sweet & Sour Sauce, Vegetables & Sunny Sided Egg.', 8),
(40, 'Paneer 65', 615, 'Cooked in Hyderabadi style with freshly grounded spices & curry leaves in yogurt sauce.', 9),
(41, 'Murg Malai Kebab', 730, 'Boneless Pieces of chicken in a malai cheese marination with a flavor of coriander leaves.', 9),
(42, 'Mutton Sheek Kebab', 835, 'Mixed with spices and herbs and skewer grilled on charcoal.', 9),
(43, 'Plain Biryani Rice', 650, 'Traditional drumpkht biryani made of basmati rice and a secret potpourri of traditional hyderabadi spices.', 9),
(44, 'Non Veg Platter', 1950, 'Mouth watering platter of fish, chicken and mutton.', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(200) NOT NULL,
  `customerID` int(30) NOT NULL,
  `itemname` varchar(220) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `transactionID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `itemname`, `quantity`, `price`, `total`, `status`, `order_date`, `transactionID`) VALUES
(1, 3, 'Sea Food Biryani', '1', '1650.00', '330.00', 'Cancelled', '2021-08-30 14:06:50', ''),
(2, 3, 'Mo:Mo Platter', '1', '550.00', '550.00', 'Pending', '2021-08-30 14:13:13', ''),
(3, 2, 'Tibetan Style Chicken Momo', '5', '290.00', '1450.00', 'Pending', '2021-08-30 14:16:12', ''),
(4, 6, 'Family Combo 1', '1', '1050.00', '1050.00', 'Pending', '2021-08-30 14:24:28', ''),
(5, 6, 'Chicken Tikka Roll', '1', '700.00', '700.00', 'Pending', '2021-08-30 14:45:02', ''),
(6, 6, 'Chicken Tikka Roll', '1', '700.00', '700.00', 'Pending', '2021-08-30 14:46:44', ''),
(7, 6, 'Chicken Tikka Roll', '1', '700.00', '700.00', 'Pending', '2021-08-30 14:47:54', ''),
(8, 3, 'Captain Egg Jumbo Burger', '2', '390.00', '780.00', 'Delivered', '2021-08-30 14:49:33', ''),
(9, 2, 'Grilled Fish', '1', '1050.00', '1050.00', 'Pending', '2021-08-31 01:55:36', ''),
(10, 4, 'Sprout Salad', '1', '340.00', '340.00', 'Pending', '2021-08-31 02:13:13', ''),
(11, 4, 'Chicken Steak', '2', '550.00', '1100.00', 'Pending', '2021-08-31 02:31:11', 'tok_1JUMkiBEnR2Z7uBuDmIdGVyy');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurantID` int(6) NOT NULL,
  `res_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurantID`, `res_name`, `email`, `address`, `phone`, `image`, `reg_date`) VALUES
(1, 'Aloft Kathmandu', 'info@aloftkathmandu.com', 'Chhaya Devi Complex, Thamel', 9813602725, 'rest1.jpg', '2021-03-31 04:13:05'),
(2, 'House Of Eggs', 'info@houseofeggs.com.np', 'Gahana Pokhari', 9827382834, 'rest2.jpg', '2021-04-21 13:45:39'),
(3, 'Dockyard Restaurant', 'info@dockyard.com.np', 'New Baneshwor', 9823457632, 'rest3.jpg', '2021-03-28 10:45:43'),
(4, 'Chicken Station', 'info@chickenstation.com', 'Jhamsikhel, Lalitpur', 9802347639, 'rest4.jpg', '2021-03-28 10:45:28'),
(5, 'Pizza Connection', 'pizzaconnection@gmail.com', 'Basantapur', 9802347839, 'rest5.jpg', '2021-03-28 10:44:01'),
(6, 'Burger Shack-Kamaladi', 'info@burgershack.com', 'Kamaladi', 9866327865, 'rest6.jpg', '2021-03-28 10:43:39'),
(7, 'Mughal Empire', 'info@mughalempire.com', 'Lazimpat', 9802837463, 'rest7.jpg', '2021-03-28 10:42:47'),
(8, 'Trisara-Durbarmarg', 'trisara_durbarmarg@gmail.com', 'Durbarmarg', 9802345678, 'rest8.jpg', '2021-03-28 10:42:27'),
(9, 'Hyderabad House', 'info@hyderabadhouse.com.np', 'Bhatbhateni', 9813723873, 'rest9.jpg', '2021-03-28 10:38:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `restaurantID` (`restaurantID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `restaurantID` (`restaurantID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurantID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`restaurantID`) REFERENCES `restaurants` (`restaurantID`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`restaurantID`) REFERENCES `restaurants` (`restaurantID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
