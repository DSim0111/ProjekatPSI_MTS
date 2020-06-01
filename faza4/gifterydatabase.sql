-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 01, 2020 at 08:27 PM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gifterydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `addon`
--

DROP TABLE IF EXISTS `addon`;
CREATE TABLE IF NOT EXISTS `addon` (
  `name` varchar(40) NOT NULL,
  `price` float NOT NULL,
  `idA` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) DEFAULT NULL,
  `idShop` int(11) NOT NULL,
  PRIMARY KEY (`idA`),
  KEY `R_48` (`idShop`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addon`
--

INSERT INTO `addon` (`name`, `price`, `idA`, `image`, `idShop`) VALUES
('Wrapping box', 300, 1, '1590756563_f9a4c32cddfc8e181003.jpg', 4),
('Customized notes', 50, 2, '1590756663_2dde6a47f18692979b25.jpg', 4),
('Wrapping Kiss', 200, 3, '1590773296_eeb4a3553558e657b45e.jpg', 9),
('Wrapping Cake', 250, 5, '1590773394_57b83ab23b1e30f6f7c5.jpg', 9),
(' Box', 350, 6, '1590882496_a11db7f3cefc27850764.jpeg', 24),
(' Box with paper flowers', 400, 7, '1590882534_d9fca2b75789e09f1e0f.jpg', 24),
(' Box with wrapping paper', 200, 8, '1590882577_a4f1adf346f943eec257.jpg', 24);

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`) VALUES
(2),
(3),
(25);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `idC` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(18) NOT NULL,
  PRIMARY KEY (`idC`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idC`, `name`) VALUES
(1, 'female'),
(2, 'male'),
(3, 'drinks'),
(4, 'wedding'),
(5, 'jewelry'),
(6, 'sweets'),
(7, 'flowers'),
(8, 'birthday'),
(9, 'photography'),
(10, 'art'),
(11, 'home'),
(12, 'backyard'),
(13, 'furniture'),
(14, 'handmade'),
(15, 'toys'),
(16, 'books'),
(17, 'board games'),
(18, 'PC games'),
(19, 'tech'),
(20, 'decoration'),
(21, 'makeup'),
(22, 'beauty products'),
(23, 'cosmetics'),
(24, 'clothes'),
(25, 'christmas'),
(26, 'New Year'),
(27, 'kids'),
(28, 'sports'),
(29, 'food'),
(32, 'office supplies'),
(33, 'dishes'),
(34, 'summer necessities'),
(35, 'shoes'),
(36, 'gym equipment'),
(37, 'travelling'),
(38, 'travel cupons'),
(39, 'cupons'),
(40, 'service'),
(41, 'massage'),
(42, 'shopping'),
(43, 'back to school'),
(44, 'hair style'),
(45, 'spa'),
(46, 'welness'),
(47, 'health'),
(48, 'homemade'),
(49, 'nails'),
(50, 'piercing'),
(51, 'tattoo'),
(52, 'teeth'),
(53, 'accessories'),
(54, 'bags'),
(55, 'education'),
(56, 'music'),
(57, 'events'),
(58, 'music equipment'),
(59, 'hobbies'),
(60, 'moives'),
(61, 'action figures'),
(63, 'pets'),
(64, 'theater'),
(65, 'plants'),
(66, 'comic books'),
(67, 'fishing'),
(68, 'vacation'),
(69, 'museum'),
(70, 'adventure'),
(71, 'extreme sports'),
(72, 'workout'),
(73, 'gym'),
(74, 'hair products'),
(75, 'baby products'),
(76, 'baby'),
(77, 'travel equipment'),
(78, 'travel books'),
(79, 'ticket');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idUser` int(11) NOT NULL,
  `idShop` int(11) NOT NULL,
  `commentField` varchar(200) NOT NULL,
  `idComment` int(11) NOT NULL AUTO_INCREMENT,
  `submitDate` datetime NOT NULL,
  PRIMARY KEY (`idComment`),
  KEY `R_46` (`idUser`),
  KEY `R_47` (`idShop`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idUser`, `idShop`, `commentField`, `idComment`, `submitDate`) VALUES
(16, 11, 'Coffe here is amazing!', 2, '2020-05-30 11:43:17'),
(18, 9, 'Very comfortable and high quality clothes', 3, '2020-05-30 17:14:03'),
(19, 14, 'Very good choices!Which one was your favourite ?', 4, '2020-05-30 17:22:58'),
(16, 14, 'I enjoy ballet very much now but i was sceptical about it at first :)', 5, '2020-05-30 17:26:56'),
(20, 14, 'I always buy tickets here for our marriage anniversary, it became a traditon', 6, '2020-05-30 17:32:43'),
(28, 11, 'I\'ve visited the shop itself, great service! Also ordered online: they are accurate and fair. Cool :) ', 7, '2020-05-30 19:36:06'),
(28, 9, 'Ordered yellow dress for my girlfriend\'s birthday. One day late :( ', 8, '2020-05-30 19:37:22'),
(28, 8, 'A bit overpriced, but good products. ', 9, '2020-05-30 19:38:21'),
(27, 15, 'OMG, they have all the best concerts! Wonderful gift for loved ones! ', 10, '2020-05-30 19:40:10'),
(26, 5, 'My friend loved the power bank! High quality products.', 11, '2020-05-30 19:53:11'),
(29, 10, 'So funny! Great ideas. I will buy a turtle for my Chandler. ', 12, '2020-05-30 19:56:03'),
(29, 6, 'Not very good quality, but fine price. ', 13, '2020-05-30 20:01:05'),
(29, 4, 'My favorite shop on Giftery so far. Great quality, fine prices and nice and accurate people. Nature! ', 14, '2020-05-30 20:04:26'),
(29, 15, 'I agree, @johnyy! Great shop! For everyone\'s taste. :) ', 15, '2020-05-30 20:08:33'),
(16, 4, 'Like from my mom :) ', 16, '2020-05-31 07:49:07'),
(16, 8, 'Good store!', 17, '2020-06-01 15:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryaddon`
--

DROP TABLE IF EXISTS `deliveryaddon`;
CREATE TABLE IF NOT EXISTS `deliveryaddon` (
  `idA` int(11) NOT NULL,
  `idDelReq` int(11) NOT NULL,
  `idDelAdd` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idDelAdd`),
  KEY `R_53` (`idA`),
  KEY `R_54` (`idDelReq`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deliveryaddon`
--

INSERT INTO `deliveryaddon` (`idA`, `idDelReq`, `idDelAdd`) VALUES
(0, 1, 1),
(0, 2, 2),
(0, 3, 3),
(0, 4, 4),
(0, 5, 5),
(2, 6, 6),
(0, 7, 7),
(0, 8, 8),
(0, 9, 9),
(1, 10, 10),
(0, 11, 11),
(0, 12, 12),
(7, 13, 13),
(0, 14, 14),
(0, 15, 15),
(0, 16, 16),
(0, 17, 17),
(0, 18, 18),
(0, 19, 19),
(0, 20, 20),
(0, 21, 21);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryproduct`
--

DROP TABLE IF EXISTS `deliveryproduct`;
CREATE TABLE IF NOT EXISTS `deliveryproduct` (
  `idProduct` int(11) NOT NULL,
  `idDelReq` int(11) NOT NULL,
  `idDelProduct` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`idDelProduct`),
  KEY `R_51` (`idProduct`),
  KEY `R_52` (`idDelReq`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deliveryproduct`
--

INSERT INTO `deliveryproduct` (`idProduct`, `idDelReq`, `idDelProduct`, `quantity`) VALUES
(160, 1, 1, 2),
(158, 1, 2, 3),
(160, 2, 3, 2),
(158, 2, 4, 5),
(157, 2, 5, 3),
(160, 3, 6, 1),
(157, 3, 7, 1),
(113, 4, 8, 2),
(118, 4, 9, 2),
(158, 5, 10, 3),
(163, 5, 11, 1),
(166, 5, 12, 1),
(175, 5, 13, 1),
(11, 6, 14, 3),
(10, 6, 15, 1),
(38, 7, 16, 1),
(34, 7, 17, 2),
(84, 8, 18, 1),
(181, 9, 19, 1),
(187, 9, 20, 1),
(186, 9, 21, 1),
(14, 10, 22, 1),
(6, 10, 23, 6),
(126, 11, 24, 1),
(66, 12, 25, 1),
(221, 13, 26, 1),
(110, 14, 27, 1),
(17, 15, 28, 1),
(38, 16, 29, 1),
(55, 17, 30, 1),
(60, 18, 31, 1),
(139, 19, 32, 1),
(145, 19, 33, 1),
(141, 20, 34, 1),
(143, 20, 35, 1),
(56, 21, 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryrequest`
--

DROP TABLE IF EXISTS `deliveryrequest`;
CREATE TABLE IF NOT EXISTS `deliveryrequest` (
  `idDelReq` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idShop` int(11) NOT NULL,
  `state` varchar(18) DEFAULT NULL,
  `submitDate` date NOT NULL,
  `payment` varchar(18) NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `address` varchar(30) NOT NULL,
  `submitTime` time NOT NULL,
  `receiverName` varchar(40) NOT NULL,
  `receiverSurname` varchar(40) NOT NULL,
  `deliverDate` date NOT NULL,
  `deliverTime` time NOT NULL,
  PRIMARY KEY (`idDelReq`),
  KEY `R_38` (`idUser`),
  KEY `R_39` (`idProduct`),
  KEY `R_40` (`idShop`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deliveryrequest`
--

INSERT INTO `deliveryrequest` (`idDelReq`, `idUser`, `idProduct`, `idShop`, `state`, `submitDate`, `payment`, `notes`, `address`, `submitTime`, `receiverName`, `receiverSurname`, `deliverDate`, `deliverTime`) VALUES
(3, 16, 0, 11, 'delivered', '2020-04-20', 'pbd', 'Happy holidays!', 'Pozeska 115', '14:00:00', 'Marko', 'Pantelic', '2020-06-05', '12:00:00'),
(4, 16, 0, 13, 'cancelled', '2020-05-30', 'pod', 'Enjoy!', 'Ace Joksimovica 55', '12:23:09', 'Tijana', 'Leontijevic', '2020-06-05', '14:00:00'),
(5, 16, 0, 11, 'A', '2020-05-30', 'pbd', 'Happy holidays!', 'Ace Joksimovica 2', '18:54:13', 'Tijana', 'Pantelic', '2020-06-07', '14:00:00'),
(6, 18, 0, 4, 'A', '2020-05-31', 'pod', 'Dear Stefan,get well soon!', 'Blagoja Parovica 12a', '00:04:43', 'Stefan', 'Petrovic', '2020-05-31', '15:00:00'),
(7, 18, 0, 6, 'A', '2020-05-31', 'creditCard', 'For our long lasting friendship!', 'Ace Joksimovica 112', '00:07:26', 'Bosko', 'Denic', '2020-08-03', '12:30:00'),
(8, 18, 0, 9, 'A', '2020-05-31', 'pbd', 'Seems like something you would wear,take care bro', 'Borcanska 15', '00:12:38', 'Aleksa', 'Papic', '2020-06-06', '17:00:00'),
(9, 19, 0, 14, 'delivered', '2020-05-31', 'pod', 'I know you love them as mush as I do!Enjoy!', 'Radnicka 18', '00:18:22', 'Tijana', 'Rankovic', '2020-06-08', '18:30:00'),
(10, 23, 0, 4, 'delivered', '2020-05-31', 'creditCard', 'Grandpa you have to try these!', 'Radnicka 110', '01:04:43', 'Zoran', 'Pantelic', '2020-06-03', '12:31:00'),
(11, 17, 0, 13, 'A', '2020-05-31', 'creditCard', 'For my love.Happy anniversary!', 'Radnicka 23', '02:26:16', 'Slavica', 'Pantelic', '2020-06-01', '17:00:00'),
(12, 26, 0, 8, 'A', '2020-05-31', 'pbd', 'For my dearest friend, happy birthday. ', 'Dragise Lapcevica 22a', '02:48:11', 'Jelena', 'Djenisic', '2020-06-03', '20:00:00'),
(13, 26, 0, 24, 'A', '2020-05-31', 'pbd', 'Izvoli drugarice! ', 'Pozeska 115', '02:50:12', 'Tijana', 'Rankovic', '2020-05-31', '11:30:00'),
(14, 26, 0, 10, 'A', '2020-05-31', 'pbd', 'Korljaca za korljacu', 'Stublenica bb', '02:51:47', 'Sara', 'Milovanovic', '2020-06-05', '15:00:00'),
(15, 26, 0, 5, 'A', '2020-05-31', 'pod', 'Read', 'Pozeska 115', '02:53:57', 'Ognjen', 'Rankovic', '2020-06-07', '15:00:00'),
(16, 29, 0, 6, 'A', '2020-05-31', 'pod', 'Be fit! Happy birthday!', 'Tesla Street 14b, Pancevo', '02:58:51', 'Mirka', 'Mork', '2020-06-06', '15:00:00'),
(17, 29, 0, 7, 'cancelled', '2020-05-31', 'pod', 'Enjoy :) ', 'Kralja Petra 17, Beograd', '03:00:38', 'Milica', 'Markovic', '2020-07-03', '15:00:00'),
(18, 29, 0, 7, 'A', '2020-05-31', 'pbd', 'Enjoy, friend. ', 'Bore Vukmirovica 14b', '03:03:14', 'Simona', 'Denic', '2020-06-06', '15:00:00'),
(19, 29, 0, 12, 'A', '2020-05-31', 'creditCard', 'Enjoy in cute products. Love, Monica. ', 'NYC, Wallstreet 5', '03:07:00', 'Mark', 'Thompson', '2020-06-06', '15:00:00'),
(20, 22, 0, 12, 'A', '2020-05-31', 'pbd', 'Try these grandma!', 'Nemanjina 20', '10:28:40', 'Zorana', 'Brkic', '2020-08-01', '11:15:00'),
(21, 22, 0, 7, 'delivered', '2020-05-31', 'pod', 'To my dear hubby', 'Sarajevska 112', '10:30:08', 'Darko', 'Popovic', '2020-09-03', '10:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `favshop`
--

DROP TABLE IF EXISTS `favshop`;
CREATE TABLE IF NOT EXISTS `favshop` (
  `idUser` int(11) NOT NULL,
  `idShop` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idShop`),
  KEY `R_35` (`idShop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favshop`
--

INSERT INTO `favshop` (`idUser`, `idShop`) VALUES
(29, 4),
(18, 6),
(16, 8),
(18, 9),
(16, 11),
(16, 12),
(16, 24);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `idProduct` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(12) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(400) NOT NULL,
  `price` float NOT NULL,
  `idShop` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProduct`),
  KEY `R_23` (`idShop`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idProduct`, `code`, `name`, `description`, `price`, `idShop`, `image`) VALUES
(1, 'C_A1', 'Apple compote', 'Marinated, minced apples, sugar free. ', 200, 4, '1590754244_af6153530a5ec8d5d762.jpg'),
(2, 'C_P1', 'Peach compote', 'Marinated peaches, sugar free.', 210, 4, '1590754323_09e4b680826b24a5859a.jpg'),
(3, 'J_S1', 'Strawberry jam', 'Strawberry jam cooked with brown sugar. 500g.  ', 400, 4, '1590754487_5ff6c5e1d9fb3abf3d83.jpg'),
(4, 'C_Pl1', 'Plum compote', 'Marinated whole plums. 400g. ', 350, 4, '1590755087_fc21d85939def06abebd.jpg'),
(5, 'C_Pe1', 'Pear compote', 'Marinated pears, sugar free. 400g per jar. ', 350, 4, '1590755142_1230e02a7d0b513bc728.jpg'),
(6, 'J_Or1', 'Orange jam', 'Jam made from oranges and brown sugar. Spiced with cinnamon. ', 500, 4, '1590755233_78a080d36cd844726272.jpg'),
(7, 'J_Pe1', 'Peach jam', 'Peach jam cooked, no sugar. 500g per jar. ', 530, 4, '1590755349_be70345ecc75b9a0e360.jpg'),
(8, 'J_Pl1', 'Plum jam', 'No sugar plum jam. Sweetened with stevia. 500g per jar. ', 540, 4, '1590755436_6a6dafa60008256f1d1d.jpg'),
(9, 'Ju_P1', 'Pineapple juice', 'Mint pineapple juice sweetened with stevia. 1l bottle. ', 350, 4, '1590755517_a9d6032a0bc112a47b43.jpg'),
(10, 'Ju_O1', 'Orange juice', 'Orange and lemon juice syrup. 1l bottle. ', 320, 4, '1590755563_c026c39bd4dd536838e9.png'),
(11, 'J_Det1', 'Detox juice', 'Lemon, pineapple, mint and watermelon juice. All fruits are taken from grandma\'s garden. 1l bottle. ', 420, 4, '1590755707_cd9f9087820f5762115f.jpg'),
(12, 'B_Pick', 'Pickles', 'Pasteurized pickles. 750g per jar. ', 200, 4, '1590755941_e17fda54aaf3ee6c9c86.png'),
(13, 'B_Mix', 'Mixed salad', 'Mixed pickled salad. It has paprika, cucumbers, tomato, cabbage, carrot. 750g per jar. ', 300, 4, '1590756023_aeedd700cba28911c13e.jpg'),
(14, 'M_Caul01', 'Cauliflower', 'Marinated cauliflower. 700g per jar. ', 300, 4, '1590756237_ba03fba97a594e19bce9.jpg'),
(15, 'B-skdfj', 'Classic backpack', '200l backpack, 14kg of weight resistence. Waterproof.', 3400, 5, '1590761604_19b6597f8ecf055e5a5c.png'),
(16, '1223', 'Traveller backpack', '7 partitions inside. 500l. Waterproof. Great for your spine. ', 17000, 5, '1590761700_075522a1cb18cf282924.png'),
(17, '111A', '50 States, 5000 Ideas', 'Where to go, when to go, what to see and what to to in United States of America.', 3000, 5, '1590762270_4c4bbdcca8a087a54b17.jpg'),
(18, 'Book_123', 'Wanderlust', '700 pages guide for travel. ', 3500, 5, '1590762603_1bcb363dc2251741ebf9.jpg'),
(19, 'Book_NG_3', 'Destinations of a lifetime', 'Another National Geographic edition of travel guides. 225 of the world\'s most amazing places you should visit. ', 4000, 5, '1590762671_f74e9635be5be9e5206a.jpg'),
(20, '111A2', 'The bucket list', 'Travel guide. Places you should see and adventures you should take. ', 1570, 5, '1590762742_1cb9082fbb9a73cecaa0.jpg'),
(21, 'Book_TTB', 'The travel book ', 'Description of the world\'s most amazing places. Imaginary journey through every country. Hope you will visit them all. ', 1800, 5, '1590762846_c18c5c6d170c998fd9b5.jpg'),
(23, 'SC_12', 'Pink suitcase', 'Dimensions:56cm x 45cm x 25cm. \r\nIt can hold up to 25kg. \r\nSimple design. \r\n', 5000, 5, '1590762976_97e872a0c0fa7588e168.jpg'),
(24, 'CP_12', 'Suitcase', 'Dimensions:56cm x 45cm x 25cm. \r\nCan hold up to 23kg. \r\nLeave a note for wanted color ( red, blue or yellow). \r\n', 5000, 5, '1590763048_47a617a4f347ebaf397a.jpg'),
(25, 'SC_k', 'Hand suitcase', 'Dimensions: 60cm x 25cm x 25cm\r\nCan hold up to 20kg. 3 partitions inside. \r\nLeather cover. ', 7500, 5, '1590763143_69e62548368a5cf9a2b2.png'),
(26, '111A211', 'Toiletry bag of cosmetics', 'It contains: 2 shampoos (Pantene), 1 conditioner (Pantene),  2 toothbrushes (Colgate), 1 toothpaste, (Sensodyne), 3 female razors, 2 Dove soaps.\r\n', 3500, 5, '1590763344_96d225d178bd73fbd867.jpg'),
(27, '12aaaBGG', 'Shakepack', 'Backpack with 10 separate packs inside. Can hold up to 13kg. ', 3560, 5, '1590763407_aa43714791a29b7293d5.png'),
(28, 'SH_1122', 'Adidas female shoes', 'Adidas female shoes with memory foam.\r\nMade for comfortable traveling.\r\nLeave a note for your number: \r\n40(26.0cm), 39( 25.5cm),38.5 ( 25cm), 38 (24.5),  37( 23.5cm), 36 ( 23.0 cm) ', 5000, 5, '1590763625_14d94e049e37cad4ff14.png'),
(29, 'Sh_12', 'Adidas male shoes', 'Adidas shoes made for comfortable travelling. \r\nMemory foam inside. \r\nLeave a note for your number: \r\n45(28.5cm), 44 (28.0cm), 43 (27.5cm),42 (27.0cm),41 (26.5cm),40 (26.0cm)', 5000, 5, '1590763733_1ecb40b5141d725341d7.png'),
(30, 'Bag', 'Packing bags', 'Vacuum bags for packing clothes. ', 200, 5, '1590763766_920708b1a19c5655f037.jpg'),
(31, '11121', 'Cosmetics travel pack', 'Acure shampoo, Acure conditioner, Acure shower gel and Acure body milk', 1500, 5, '1590763822_d83091f40c8ac0fb47fb.jpg'),
(32, '2882_pb', 'Power bank', 'Six ports. Can hold up to 6 devices ( up to 300W each) for 5 hours. ', 4000, 5, '1590763881_9b1066c49ea05344b231.jpg'),
(33, 'wb', 'Water bottle', '1l Water bottle from Vapur. ', 700, 5, '1590763930_bbf97342cb2c2619bf49.jpg'),
(34, '111A2', 'Weights 30kg', '30kg weights. ', 6000, 6, '1590764581_f32ab2eef848abd45bf7.jpg'),
(35, 'C_P1', 'Weights  30kg', 'Adjustable barbell can be set. ', 5000, 6, '1590764624_13f8102ad16368391f21.jpg'),
(36, '1212', 'Boxing gloves', 'Professional boxing gloves. Available in pink and red color. ', 3000, 6, '1590764686_cee91357a9dea667f76c.jpg'),
(37, 'Wh-12q3409', 'Whey protein', '2kg of the finest whey protein.  Vanilla flavor. ', 3200, 6, '1590764787_d0f3a5c17793af0d7afd.png'),
(38, 'WH_128', 'Whey protein', 'Strawberry flavor, whey protein.  2,35kg. ', 3600, 6, '1590764834_09511fc9e242e06c7ee5.jpg'),
(39, 'YMB1', 'Yoga mat bag', 'Desigual flowerish yoga bag. ', 1000, 6, '1590764900_1c0fc85627b29d56fde1.jpg'),
(40, '777s', 'Yoga mat bag', 'Yoga mat bag with flowers. ', 800, 6, '1590764929_cf6b37154487a87ccf6e.jpg'),
(41, '1212121yy', 'Yoga mat bag', 'Classic yoga mat bag. ', 600, 6, '1590764956_8437b62bfccbd93f1fe7.jpg'),
(42, 'redYogaMat', 'Yoga mat ', 'Red yoga mat.', 1500, 6, '1590765022_41c545580ee4e7f44a37.png'),
(43, 'YogaMat', 'Yoga mat bag', 'Blue yoga mat. ', 1500, 6, '1590765050_627b892f26a2a157b2c2.jpg'),
(44, 'C_P111', 'Weights 3lb', '3lb weights. Available in pink, purple and blue color. ( Put a note in the order)', 2500, 6, '1590765151_a65fc68523b8dd18d395.png'),
(45, '2123', 'Man shirt', 'Man shirts for workout. Available in black, gray and white color. ', 1700, 6, '1590765197_427956d731dce58be8bb.jpg'),
(46, '555', 'Male shorts', 'Cotton man shorts. Available in black and gray color. Available in S, M, L, XL and XXL standard sizes.(Put a note in order)', 2000, 6, '1590765270_dde827fba4a02e173f9b.jpg'),
(47, 'C_P11111', 'Leggings', 'All colors available in S, M, L and XL size.', 3000, 6, '1590767725_8b4b220dbc70bd4f9d9a.jpg'),
(48, 'PASffodd', 'Male hoodie', 'Gold\'s Gym hoodie for men. Available in  M, L and XL size. ', 3800, 6, '1590767830_61ca726f6f9b86a6e610.jpg'),
(49, '23123', 'Resistance band', 'Resistance bands, maximum stretch 2m. ', 2800, 6, '1590767884_47c2c9121a066dfc6237.jpg'),
(50, '5645456', 'Tracksuit for men', 'Made for running. Available in all standard sizes. ', 8000, 6, '1590767994_11d682622db427d42846.jpg'),
(52, '123_kkd', 'Cosmetics set', 'Give dry, sensitive skin the perfect gift with the creamy and comforting surprises inside our Soothing Almond Milk & Honey Premium Collection.  This luxurious, bow-wrapped gift box is perfect for any occasion.', 3500, 7, '1590768569_d028b6fee6e5e17d8aa9.png'),
(53, '11234', 'Cosmetic set', 'Infused with uplifting notes of mandarin, bergamot, peonies, lily of the valley and cruelty-free musk, our White Musk® Flora Premium Collection gift set is a modern twist on our signature scent.', 2900, 7, '1590768689_d6de6fbd17efbd056620.png'),
(54, '777ss7', 'Mist and shower duo', 'Inspired by flowers that blossom at night, these exotic, floral treats are infused with notes of creamy ylang ylang, heliotrope, sweet pineapple, fruity red berries, smoky patchouli and warm, cruelty-free musk.', 1500, 7, '1590768730_e012d691321c669bf4ce.png'),
(55, '12221', 'Plumping & Purifying Facial Mask Duo', 'Want to feel fresh? The British Rose Fresh Plumping Mask contains Community Trade handpicked rose petals and leaves skin feeling fresher and plumper.', 3900, 7, '1590768794_faaa77060474fa6602dc.png'),
(56, 'ass22', 'Soft Skin Shaving Kit', 'Keep skin soft, smooth and kissable with our gentlemen’s shaving kit. Lather up with the brush and skin-soothing Shaving Cream, enriched with maca root from Peru and Community Trade organic aloe vera from Mexico. Shave. Rinse. Towel dry. ', 1900, 7, '1590768855_8aa216b57a13803cc1df.png'),
(57, '1278', 'Replenishing Conditioner 250 ML', 'Buy Shea Butter Conditioner from The Body Shop®. Keep hair feeling healthier and replenished with our rich hair conditioner for dry and prone to damage hair.', 600, 7, '1590768940_341983dde61fd64aa682.png'),
(58, 'sdasdasd', 'Coconut Premium Collection', 'Take skin to tropical paradise with the refreshing surprises packed inside our Exotically Creamy Coconut Premium Collection. Gently exfoliate with the Body Scrub. Lather up with the cleansing Shower Cream and body buffing Bath Lily. Moisturise dry skin with the richly textured Body Butter and hydrating Hand Cream. Spritz head-to-toe with the subtly creamy Body Mist. ', 4000, 7, '1590769019_f6770f5073bf25cccf3f.png'),
(59, '2131', 'Cool Cucumber Shower Gel 250ml', 'Lather up with our special edition Cool Cucumber Shower Gel. It feels seriously cool, bubbly and squeaky clean on skin. And smells unbelievably refreshing. Made with juice from wonky cucumbers, it’s the perfect treat for keeping cool and cleansed all summer.', 800, 7, '1590769064_4b4a571fa50bea2015db.png'),
(60, 'sdf78', 'Anti-Imperfection Night Mask 75ml', 'Our Tea Tree Anti-Imperfection Night Mask is specifically formulated to care for blemishes and imperfections* while you sleep. Infused with salicylic acid and Community Trade tea tree oil, this leave-on mask helps reduce the size and number of imperfections*. Wake up to clearer looking skin that feels refreshed, purified and soothed. *Tone, texture and oiliness', 1980, 7, '1590769109_4b66af3f46a0061b1f87.png'),
(61, '98787', 'Hawaiian Kukui Cream 350ml', 'Hawaiian women, exposed to the relentless sun for generations, have held the secret of kukui oil to nurture their skin. Bursting with luscious moisture, kukui oil helps restore skin’s natural suppleness, leaving it feeling nourished and soft. Use this skin cherishing cream as part of our blissful ritual when your body is in need of luxury.', 3500, 7, '1590769156_db8afbfcee248c25f29a.png'),
(62, '0tvf', 'Go Bananas Set', 'They’ll go bananas for this fragrantly fruity haircare duo. Our creamy Shampoo and Conditioner leaves normal to dry hair feeling softer and nourished with the addictive aroma of ripe bananas and woody coconut. Complete with a monkey hair wrap, this super-cute gift set is perfect for any occasion.', 2630, 7, '1590769211_9cddb677248f9c262be8.png'),
(63, '13344', 'AKG-15 headphones', 'Wireless headphones, 100 hours of playtime. ', 4000, 8, '1590770421_c55cd23af686d2dbd584.png'),
(64, 'utfhgbbvc', 'AKG-K92 headphones', 'Wireless, bluetooth headphones with 120 hours of play. ', 4800, 8, '1590770458_4efd41dc5c6f209eaafb.png'),
(66, 'C_P112134', 'Gramophone', 'Unique home decor item\r\nTable space filler\r\nBest for both indoor and outdoor use\r\n', 10000, 8, '1590770566_45df3a58d6508adb4d28.png'),
(67, 'sdffewr', 'Crosley Grapmophone', 'Crosley Gramophone blue \r\nUnique home decor item,\r\nTable space filler,\r\nBest for both indoor and outdoor use,\r\n', 10000, 8, '1590770608_54cce321a9f92dc1ffbd.png'),
(68, '5457', 'Ed Sheeran record', 'Album \"X\" of famous singer Ed Sheeran. ', 2000, 8, '1590770687_3157eeff82262317f3ea.png'),
(69, '3254ufgb', 'Arctic Monkeys record', 'Album: AM ', 3000, 8, '1590770722_48e80a8e02ce80fac7bc.png'),
(70, 'fgjibnv', 'Wonder Wipes ', 'Wonder wipes for cleaning your guitar strings. ', 500, 8, '1590770765_6245abe16613b78a0fd8.png'),
(71, '36fgb', 'Electrical Guitar ', 'Gibson-Les-Paul electrical guitar. ', 63000, 8, '1590770808_bbb2123cf576c6b3d21c.png'),
(72, 'vdr543fc', 'Acoustic Guitar', 'Hohner-HC02', 35000, 8, '1590770849_75ad703b2f387f888995.png'),
(73, '346bgf', 'Marshall Amplifier', 'Amplifier, up to 5000W', 10000, 8, '1590770926_2fbf7a5ca08dd7d04c4c.png'),
(74, 'dfgdfg', 'Pink Floyd record', 'Album: Pulse', 2700, 8, '1590770959_0aa8868da25b0f90ffa6.png'),
(75, 'd7fs9', 'Ramones record', 'All songs ', 4000, 8, '1590770984_74b4496e22e22dd0e838.png'),
(76, 'fcve4', 'Microphone', 'Sennheiser E845-S microphone. ', 9000, 8, '1590771028_065422662c634b3b46d0.png'),
(77, 'vre49c', 'Wire wipes', 'Wire wipes: 5 in one pack.', 3000, 8, '1590771058_92a634e775a0c452a93c.png'),
(78, 'sdfsf', 'Yamaha-CG-182-SF Acoustic', '', 40000, 8, '1590771080_e7891a6a9c5a25df1fb2.png'),
(79, '123AAFF', 'Pink poncho', 'Perfect airy poncho for summer days.', 1500, 9, '1590771864_aaa16449ca2fc43f743d.png'),
(80, '089MN', 'Fanta Shirt', 'Be refreshing in hot summer days', 2500, 9, '1590771963_6a021fbbc553d6c4431e.png'),
(81, '145LLA', 'Floral Skirt', 'Comfortable bell shaped skirt.', 3000, 9, '1590772081_662a97237a39bdf08ecc.png'),
(82, '77AAD', 'StarWars Shirt', 'For all of you Star Wars lovers out there!', 3000, 9, '1590772159_d33101a44401f4110a71.png'),
(83, 'ASF12', 'SmallPrinted Shirt', 'Slim fit.Show your figure!', 2000, 9, '1590772318_a6691c96d19ff35e6c22.png'),
(84, '129AAQ', 'Hoddie', 'Hooded top with panels.', 2560, 9, '1590772434_761b159a1b8b02df1a0f.png'),
(85, '447AAS', 'Printed Sweatshirt', '', 3570, 9, '1590772494_32713d42a7b9e645fce1.png'),
(86, '77BVD', 'Pink T-Shirt', 'Short sleeved sports top.', 2050, 9, '1590772574_a66faa8b5112c76ffcf4.png'),
(87, 'U123D', 'Oliv Joggers', 'Cotton cargo joggers.', 3800, 9, '1590772649_fba95bd46275b0497d08.png'),
(88, 'QWA1', 'Cargo Shorts', 'Cotton and twill cargo shorts.', 3200, 9, '1590772743_ea91735065c6009e0b98.png'),
(89, 'EWZ0', 'Denim Shorts', '', 3600, 9, '1590772827_a58ca50ae6f8c9a5fdb7.png'),
(90, '7778AS', 'Olive Sandals', '', 3900, 9, '1590772885_368fdcb4a7125e79262c.png'),
(91, '145QW', 'Platform Sandals', '', 2800, 9, '1590772936_b59a1873da0ebd8bb075.png'),
(92, 'WER123', 'Male Boots', 'Dark green male boots.', 4500, 9, '1590772998_9c8f565a396559d6edbd.png'),
(93, '558P', 'Yellow Dress', '', 2500, 9, '1590773042_7368ab79a3cb6246742b.png'),
(95, 'QXC12', 'Gold Flash', '64GB', 600, 10, '1590774378_f8199fd2fb6f22e5a214.jpg'),
(99, '44LKM1', 'Balisong Knife', '32GB', 450, 10, '1590774628_42bedc15993b1b9435af.jpg'),
(100, '12LFGM', 'Neo Flash', '64GB', 1800, 10, '1590774705_28af058b020d237085f3.jpg'),
(101, 'UI12SX', 'GoldBrick Flash', '32GB', 920, 10, '1590774787_8f23b0ad6b4ab53d2511.jpg'),
(102, 'PPO23', 'Rainbow Pony', '16GB', 450, 10, '1590774872_ef989008d094e0ce1d3e.jpg'),
(103, '11LJKM', 'Camera Flash', '32GB', 950, 10, '1590774921_5f98b8acd7a3f94d9667.jpg'),
(104, '1YH34', 'Tiffany Bag', '16GB', 600, 10, '1590774979_34cd3935146678739851.jpg'),
(105, 'MMG18', 'Golden Robot', '128GB', 1500, 10, '1590775052_b92561407317c6843716.jpg'),
(106, '556AKJ', 'Diamond Flash', '64GB', 1900, 10, '1590775150_b3b65cff496a2872576e.jpg'),
(107, 'NMZ1', 'Gun Flash', '128GB', 2600, 10, '1590775226_e69d47151d4ded168948.jpg'),
(108, '145JKU', 'Super Mario', '64GB', 1200, 10, '1590775286_abe2db043bb7707cebf8.jpg'),
(109, '145FGD', 'Guitar Flash', '32GB', 1000, 10, '1590775345_87c04187280009d7faa5.jpg'),
(110, '423JKV', 'Turtle Flash', '32GB', 2100, 10, '1590775421_a0e210e841d1498a3122.jpg'),
(111, 'YU1243', 'Jar Flash', '8GB', 1400, 10, '1590775473_dae1aaa2a6645633172e.jpg'),
(112, '#123', 'Gift Box', 'Assorted Chocolate Gold Gift Box, Classic Ribbon, 8 pc.', 1800, 13, '1590785153_dbf92ec334e742b035a9.jpg'),
(113, '#124', 'Gift Box', 'Assorted Chocolate Gold Gift Box, Classic Ribbon, 19 pc.', 2999.99, 13, '1590785195_d4ec1b5bf5893d1edcf6.jpg'),
(114, '#125', 'Gift Box', 'Assorted Chocolate Gold Gift Box, Classic Ribbon, 36 pc.', 4999, 13, '1590785229_cc5a5d6e695ace1f9aa9.jpg'),
(115, '#126', 'Gift Box', 'Assorted Chocolate Gold Gift Box, Classic Ribbon, 70 pc.', 10000, 13, '1590785264_4d664b30d618bf24e3d7.jpg'),
(116, '#127', 'Gift Box', 'Assorted Chocolate Gold Gift Box, Classic Ribbon, 105 pc.', 15000, 13, '1590785334_1a13bbd9620bef34112b.jpg'),
(117, '#128', 'Gift Box', 'Assorted Chocolate Gold Gift Box, Congratulations Ribbon, 36 pc.', 4999, 13, '1590785361_d830f68a4cd3c75f36bb.jpg'),
(118, '#129', 'Cube Box', 'Classic Dark Chocolate G Cube Box, Set of 2, 22 pcs.', 1999.99, 13, '1590785417_b7744c25f5f90a2b2521.jpg'),
(119, '#130', 'Cube Box', 'Dark Chocolate Mint G Cube Box, Set of 2, 22 pcs.', 1999.99, 13, '1590785445_d0ce0e7b6591ce1f65cc.jpg'),
(120, '#131', 'Cube Box', 'Dark Chocolate Strawberry G Cube Box, Set of 2, 22 pcs.', 1999.99, 13, '1590785465_ab7a641af87accae02c6.jpg'),
(121, '#132', 'Truffles', 'Dark Chocolate Truffles, 12 pc.', 2999.99, 13, '1590785493_cac4dbc811f7b0ae0c05.jpg'),
(122, '#133', 'Cube Box', 'Dark Chocolate Vanilla G Cube Box, Set of 2, 22 pcs. each', 1999.99, 13, '1590785518_85c8030720d45d7acf96.jpg'),
(123, '#134', 'Truffles ', 'G Cube Truffles Gold Tin, 30 pc.', 2499.99, 13, '1590785546_7400fbc96cb3ff38106f.jpg'),
(124, '#135', 'Gold Collection', 'Gold Collection Appreciation Gift Set', 20000, 13, '1590785585_ded9a74e1deb6956feeb.jpg'),
(125, '#136', 'Truffles', 'Signature Truffles Gift Box, Classic Gold Ribbon, 24 pc.', 4999, 13, '1590785615_2dd7914e5aef9451138a.jpg'),
(126, '#137', 'Truffles', 'Signature Truffle Gift Box, Congratulations Ribbon, 24 pc.', 4999, 13, '1590785659_29a69b25f45e697f03fa.jpg'),
(127, '#138', 'Patisserie', 'Patisserie Dessert Truffles Gift Box, 24 pc.', 4999, 13, '1590785697_9ec3fd14799c190b2194.jpg'),
(128, '#139', 'Lady Noir', 'Lady Noir Chocolate Biscuits, Set of 3, 12 pc each', 2699.99, 13, '1590785723_0fe1e175ab811761c780.jpg'),
(129, '#140', 'Dark Gift Box', 'Dark Chocolate Gift Box, 16 pc.', 2499.99, 13, '1590785761_589d8452c65ae0a8a476.jpg'),
(130, '#141', 'Chocolate Alamonds', 'Dark Chocolate Covered Almonds, Set Of 2, 8.5 oz.', 2999.99, 13, '1590785802_1137ba35a487b8e6676f.jpg'),
(131, '#142', 'Breakfast Gift Set', 'Chocolate Delights Breakfast Gift Set', 3199.99, 13, '1590785840_52702a6d0cb1cb58cb85.jpg'),
(132, '#120', 'AFRICAN AUTUMN', 'AFRICAN AUTUMN, HRP TIN OF 30 SACHETS ', 1400, 12, '1590785943_c718fa6895f7f0ff1417.jpg'),
(133, '#121', 'BANGKOK', 'BANGKOK, LOOSE TEA (3 OZ TIN) ', 1150, 12, '1590785972_b4542265ecceb808ac24.jpg'),
(134, '#122', 'CHAI HARA', 'CHAI HARA (GREEN CHAI), LOOSE TEA (4 OZ TIN)', 1500, 12, '1590785993_bba6b902b4dad2ebf973.jpg'),
(135, '#123', 'CHAI BOX', 'CHAI, BOX OF 20 PREMIUM TEABAGS ', 600, 12, '1590786019_f036141203069e1fcccc.jpg'),
(136, '$124', 'CITRON GREEN', 'CITRON GREEN, CLASSIC TIN OF 20 SACHETS', 950, 12, '1590786048_1ddf828c92858655cfac.jpg'),
(137, '#125', 'CITRON GREEN', 'CITRON GREEN, LOOSE TEA (7 OZ TIN) ', 1600, 12, '1590786068_42a720a64eaf0fa36fd3.jpg'),
(138, '#126', 'DARJEELING', 'DARJEELING, BOX OF 20 INDIVIDUALLY WRAPPED SACHETS', 1100, 12, '1590786090_6017909c67e9b0af6125.jpg'),
(139, '#127', 'DRAGON PEARL', 'DRAGON PEARL JASMINE, CLASSIC TIN OF 20 SACHETS', 1500, 12, '1590786113_a7dd3a98cec1d02b1354.jpg'),
(140, '#128', 'DRAGON PEARL', 'DRAGON PEARL JASMINE, CLASSIC TIN OF 20 SACHETS 14,99$', 1500, 12, '1590786126_a80740c2074b33c844fa.jpg'),
(141, '#129', 'EARL GREY', 'EARL GREY IMPERIAL, HRP TIN OF 30 SACHETS', 1400, 12, '1590786174_3888ddf502d685ba030a.jpg'),
(142, '#130', 'EARL GREY ', 'EARL GREY SUPREME 50 SACHET BAG', 1000, 12, '1590786196_0f9f7911098497d31779.jpg'),
(143, '#131', 'ENGLISH BREAKFAST', 'ENGLISH BREAKFAST, BOX OF 20 PREMIUM TEABAGS', 600, 12, '1590786226_97e350200bb51232595f.jpg'),
(144, '#132', 'ENGLISH BREAKFAST', 'ENGLISH BREAKFAST, LOOSE TEA 4OZ', 900, 12, '1590786250_07b34d8498f196e8f10f.jpg'),
(145, '#133', 'GENMAICHA', 'GENMAICHA, LOOSE TEA (8 OZ TIN)', 1550, 12, '1590786272_8e0a7d1611128433431d.jpg'),
(146, '#134', 'GUNPOWDER', 'GUNPOWDER, LOOSE TEA (8 OZ TIN) ', 1500, 12, '1590786293_f0b3d21dfeb5b7a173d3.jpg'),
(147, '#135', 'HOT CINNAMON', 'HOT CINNAMON SPICE, BOX OF 20 INDIVIDUALLY WRAPPED SACHETS', 1100, 12, '1590786340_47b58f9360e0a0de4996.jpg'),
(148, '#136', 'IRISH BREAKFAST', 'IRISH BREAKFAST, LOOSE TEA 4OZ', 1000, 12, '1590786376_fe5bc10cfef3509824a2.jpg'),
(149, '#137', 'JAPANESE SENCHA', 'JAPANESE SENCHA, LOOSE TEA (8 OZ TIN)', 2350, 12, '1590786402_9496492aa75ff22c4b29.jpg'),
(150, '#138', 'JASMINE,', 'JASMINE, LOOSE TEA (7 OZ TIN) 16,49$', 1650, 12, '1590786422_67fee0cdc92cfdadb777.jpg'),
(151, '#139', 'MANGO', 'MANGO, LOOSE TEA (4 OZ TIN)', 1050, 12, '1590786443_37d042c2d1dc085d2330.jpg'),
(152, '#140', 'ORANGE PASSION', 'ORANGE & PASSION FRUIT, LOOSE TEA (4 OZ TIN) 14,99$', 1500, 12, '1590786475_5b4ef173d60c068b3557.jpg'),
(153, '#141', 'PEACH', 'PEACH, LOOSE TEA (4 OZ TIN) 10,49$', 1050, 12, '1590786494_ae9ada487c869712b4a6.jpg'),
(154, '#142', 'STRAWBERRY & KIWI', 'STRAWBERRY & KIWI, LOOSE TEA (4 OZ TIN)', 1050, 12, '1590786534_0735fba0a6b965829ccb.jpg'),
(155, '#143', 'TROPICAL GREEN', 'TROPICAL GREEN, BOX OF 20 PREMIUM TEABAGS', 600, 12, '1590786554_89e5e9235a7f15464fac.jpg'),
(156, '#144', 'TROPICAL GREEN', 'TROPICAL GREEN, HRP TIN OF 30 SACHETS', 1400, 12, '1590786573_2a263867792ba1e79816.jpg'),
(157, '#120', 'Ethiopian', 'A Plum-Perfect Washed Ethiopian, Ethiopia Guji Siko 12oz', 2025, 11, '1590786645_a82178b84492a0e91d7e.jpg'),
(158, '#121', 'Burundi Kalico', 'Burundi Kalico Mama Buthinda 12oz', 1850, 11, '1590786666_7fd558c862a50efdc5e0.jpg'),
(159, '#122', 'Colombia', 'Colombia El Eucalipto light 12oz', 2150, 11, '1590786690_107dfca6317ed34dd878.jpg'),
(160, '#123', 'Colombia', 'Colombia Jose Paz Gomez 12oz', 1950, 11, '1590786714_1ec987a8c4621edb741a.jpg'),
(161, '#124', 'Colombia Samaneigo', 'Colombia Samaneigo 12 oz whole bean light coffee', 1975, 11, '1590786798_5913193831f29250b429.jpg'),
(162, '#125', 'Crema Blend', 'Crema Blend 12oz whole bean light coffee ', 1775, 11, '1590786824_99a679cf285142c767bb.jpg'),
(163, '#126', 'Double Indigo', 'Double Indigo Blend', 1975, 11, '1590786850_15ef7c8a3936adba9e77.jpg'),
(164, '#127', 'Drip Blend', 'Drip Blend whole bean medium coffee 12oz ', 1750, 11, '1590786874_b8cd3645e3ac459103be.jpg'),
(165, '#128', 'Ethiopia Kolla', 'Ethiopia Kolla Bolcha loght 12 oz', 1975, 11, '1590786905_7f3f6b1dc5f7c89adeec.jpg'),
(166, '#129', 'Ethiopia Suke', 'Ethiopia Suke Quito Honey 12oz', 1850, 11, '1590786928_5746e7d90147b827f1a9.jpg'),
(167, '#130', 'Ethiopian Guji', 'Ethiopian Guji Wolichu Wachu 12 oz whole bean light coffee', 1925, 11, '1590786949_3920b89e0829c778003d.jpg'),
(168, '#131', 'First Bloom Spring', 'First Bloom Spring Blend 12oz', 1875, 11, '1590786978_d79fd51eb8bea2dee5ec.jpg'),
(169, '#133', 'Honduras La Peña', 'Honduras La Peña 12oz whole bean light coffee', 1975, 11, '1590787012_18353861cfbbe0ae7380.jpg'),
(170, '#134', 'Mexico Oaxaca', 'Mexico Oaxaca Mixteca whole bean medium coffee 12oz', 1800, 11, '1590787050_c28221fee672d77fead0.jpg'),
(171, '#135', 'Nicaragua', 'Nicaragua Javanica Limoncello 8oz whole bean light coffee', 2050, 11, '1590787074_a357833175d61cda859c.jpg'),
(172, '#136', 'Kona', 'Paradise in a Mug 100% Kona Pure Estates 8oz whole bean medium coffee', 4000, 11, '1590787107_abc2db405b38debb51d1.jpg'),
(173, '#137', 'Swet Swirl', 'The Caramel and Chocolate Swirl Cream and Sugar 12oz', 1750, 11, '1590787177_783ad7458918c168a14d.jpg'),
(174, '#139', 'Brazil Canaan', 'The Cookie Dough Coffee Brazil Canaan Estate 12oz', 1725, 11, '1590787212_c3a6d51b5d75dd22d3ff.jpg'),
(175, '#140', 'Creme Brûlée', 'The Creme Brûlée Coffee Dark Side of The Moon 12oz', 1800, 11, '1590787235_2085bec4470933dd08be.jpg'),
(176, '#141', 'Gingerbread Cookie', 'The Gingerbread Cookie Ethiopian Ethiopia Gotiti Natural 12oz', 1800, 11, '1590787293_6632d0a1816e79438588.jpg'),
(177, '#144', 'S\'more Coffee', 'The S\'more Coffee Cloud City Blend', 1850, 11, '1590787330_fc36399b3861ae1269db.jpg'),
(178, '#120', 'Giselle', 'American Ballet Theatre - Giselle Feb. 16 2021 two tickets', 31000, 14, '1590787881_7464dbb679b7b41a4624.jpg'),
(179, '#121', 'Romeo et Juliette', 'Charles Gounod Romeo et Juliette in Metropolitan Jan. 22,  2 x Orchestra rear seats.', 20000, 14, '1590787967_5267876df32682b73962.jpg'),
(180, '#122', 'Ballet Workshop', 'Family Dance Workshop by artists from American Ballet Theatre Feb. 16 2021, FREE', 0, 14, '1590788015_496ad73bc9b8665f7db7.jpg'),
(181, '#123', 'Calidore String', 'Fortas Chamber Music Concerts Terrace Thater Calidore String Quartet  28. January Concert Hall, 2 tickets', 12000, 14, '1590788059_fe33bde18ecdd3356a77.jpg'),
(182, '#124', 'The Dover Quartet', 'Fortas Chamber Music Concerts Terrace Thater The Dover Quartet and the Escher Quartet  20. October Concert Hall 2 tickets ', 15000, 14, '1590788093_8ea48155518bfe11d142.jpg'),
(183, '#125', 'CARMEN', 'GEORGES BIZET CARMEN in Metropolitan  Oct. 9, 2 x Orchestra Balance seats', 25000, 14, '1590788142_5bacba7071452a168717.jpg'),
(184, '#126', 'La Bohème', 'GIACOMO PUCCINI La Bohème in Metropolitan Sep. 19, 2 x Orchestra Balance seats ', 15000, 14, '1590788179_07e2e0c4432c3366a9a0.jpg'),
(185, '#127', 'Aida', 'GIUSEPPE VERDI Aida in Metropolitan Sep. 26, 2 x Orchestra premium seats ', 50000, 14, '1590788242_71173a4411025c9309c8.jpg'),
(186, '#128', 'Aida', 'GIUSEPPE VERDI Aida in Metropolitan Sep. 28, 2 x Orchestra rear seats', 20000, 14, '1590788281_9fcb3a4931f137cd7410.png'),
(187, '#129', 'Nabuco', 'GIUSEPPE VERDI Nabuco in Metropolitan Sep. 26, 2 x Orchestra premium seats ', 54000, 14, '1590788315_6028ca0e0d309210b742.jpg'),
(188, '#130', 'Barbiere di Sivigl', 'Il Barbiere di Siviglia in Metropolitan Sep. 19, 2 x Orchestra Balance seats', 20000, 14, '1590788385_4d09fe05194e7a790c45.jpg'),
(189, '#131', 'Barbiere di Sivig', 'Il Barbiere di Siviglia in Metropolitan Dec. 19, 2 x Orchestra premium seats', 45000, 14, '1590788452_946c23c02a3cada9c058.jpg'),
(190, '#132', 'DEAD MAN WALKING', 'JAKE HEGGIE  LIBRETTO BY TERRENCE MCNALLY DEAD MAN WALKING in Metropolitan Oct. 9, 2 x Orchestra Balance seats', 22000, 14, '1590788531_495e1849b90776040af4.jpg'),
(191, '#133', 'National Symphony', 'National Symphony orchestra Beethoven at 250 Noseda conducts Missa Solemnis, Concert Hall Oct. 8, 2 tickets', 15000, 14, '1590788609_6d68a112584296169ea2.jpg'),
(192, '#134', 'National Symphony', 'National Symphony orchestra Beethoven at 250 with Noseda & Ehnes Concert Hall Oct. 1, 2 tickets.', 12000, 14, '1590788687_db341c9d09b3ec101777.jpg'),
(193, '#135', 'Fidelio ', 'Washington National Opera Beethoven Fidelio  Concert Hall, Oct. 24, 2 tickets.', 35000, 14, '1590788729_b75a71b1d93256dcc346.jpg'),
(195, '#140', 'Ballet Rehearsal', 'Working Rehearsal - American Ballet Theatre Opera House, Dance scholars explains the art of ballet, Feb. 11 2021', 2500, 14, '1590788818_22cad96a78747f59157c.jpg'),
(196, '#141', 'DON GIOVANNI', 'WOLFGANG AMADEUS MOZART DON GIOVANNI in Metropolitan, Sep. 19, 2 x Orchestra Premium seats', 48000, 14, '1590788885_1115d407321b81bd6e46.jpg'),
(197, '#100', 'Aerosmith', 'Aerosmith Park Theater at Park MGM · Las Vegas Jul 01 2020 2 tickets', 19000, 15, '1590789218_488df5cb33ad5a3a5f32.jpg'),
(198, '#101', 'Elton John', 'Elton John American Airlines Arena, Miami Sep 29 2020 2 tickets', 25000, 15, '1590789248_011e65971a853739faa0.jpg'),
(199, '#102', 'Billy Joel', 'Billy Joel New Era Field · Orchard Park Aug. 15 2020, 2 tickets', 26000, 15, '1590789278_715c57d004a14ad8a743.jpg'),
(200, '#103', 'Jovi with Adams', 'Bon Jovi with Bryan Adams Tacoma Dome · Tacoma Jun 10 2020, 2 tickets ', 19000, 15, '1590789316_cf1ffb7ef973c05b600a.jpg'),
(201, '#104', 'Bruno Mars', 'Bruno Mars Mercedes-Benz Superdome New Orleans Jul 01 2020, 2 tickets', 17000, 15, '1590789345_81d9f1d14462662cdb6f.jpg'),
(202, '#105', 'Eagles', 'Eagles Wembley stadium Aug 29 2020, 2 tickets', 15000, 15, '1590789382_7dd840e2177bfc2ca9a8.jpg'),
(203, '#106', 'Foo Fighters', 'Foo Fighters Little Caesars Arena · Detroit Oct 03 2020, 2 tickets', 15000, 15, '1590789412_98fc29098dbc193754a0.jpg'),
(204, '#107', 'Guns N\' Roses', 'Guns N\' Roses Citizens Bank Park · Philadelphia Jun 09 2020, 2 tickets', 30000, 15, '1590789441_497c9fe02059d40f455f.jpg'),
(205, '#108', 'Justin Bieber', 'Justin Bieber with Kehlani, Jaden Smith - Pasadenia CA May 29 2020, 2 tickets', 15000, 15, '1590789471_b19476878cf657d43330.jpg'),
(206, '#109', 'KISS', 'KISS Cellairis Amphitheatre at Lakewood · Atlanta Sep 08 2020, 2 tickets', 27000, 15, '1590789554_b23265ee45ca8aee3621.jpg'),
(207, '#110', 'Lady Gaga', 'Lady Gaga Fenway Park · Boston  Aug 05 2020, 2 tickets', 13000, 15, '1590789582_614125cab8abd415803b.jpg'),
(208, '#111', 'Lana Del Rey', 'Lana Del Rey Empire Polo Field · Indio Oct 16 2020, 2 tickets', 23000, 15, '1590789613_304cb99552f2377bc009.jpg'),
(209, '#112', 'Metallica', 'Metallica Louder That Life Kentucky Expo Center Sep 18 2020, 2 tickets', 12000, 15, '1590789639_bde5414915233024c67c.jpg'),
(210, '#113', 'Nickelback', 'Nickelback with stone temple Pilots Veterans United Home Loans Amphitheater · Virginia Beach Jun 20 2020, 2 tickets', 19000, 15, '1590789666_53c4458035ad6090870e.jpg'),
(211, '#114', 'Ozzy Osbourne', 'Ozzy Osbourne Hollywood Bowl · Los Angeles Jul 29 2020, 2 tickets', 32000, 15, '1590789722_a0604e8f3447a8480f35.jpg'),
(212, '#115', 'Pink', 'Pink Alamodome San Antonio, TX Dec 12 2020, 2 tickets', 20000, 15, '1590789750_0787a44c004fa0573de3.jpg'),
(213, '#116', 'Rammstein', 'Rammstein Lincoln Financial Field · Philadelphia Aug 23 2020, 2 tickets', 30000, 15, '1590789775_70d701b58422a76183c4.jpg'),
(214, '#117', 'RHCP', 'RHCP 2021 Music Festival · Gulf Shores  Jun 21 2020, 2 tickets ', 23000, 15, '1590789817_700a0ca15d4bf0ae4281.jpg'),
(215, '#118', 'Slipknot', 'Slipknot Dos Equis Pavilion · Dallas Jun 21 2020, 2 tickets', 27000, 15, '1590789841_73c556933478668d5713.jpg'),
(216, '#119', 'Snoop Dogg', 'Snoop Dogg Toyota Arena · Ontario Nov 07 2020, 2 tickets', 11000, 15, '1590789866_1b2739fafa2befd63889.jpg'),
(217, '#120', 'Sting', 'Sting The Colosseum At Caesars Palace · Las Vegas Jun 05 2020, 2 tickets', 24000, 15, '1590789892_1cbedf8d562434341aef.jpg'),
(218, '#121', 'Styx', 'Styx Sweetwater Pavilion · Fort Wayne Jul 28 2020, 2 tickets', 23000, 15, '1590789915_779d275175eede1f2670.jpg'),
(219, '#122', 'Taylor Swift', 'Taylor Swift SoFi Stadium · Inglewood Jul 09 2020, 2 tickets', 16000, 15, '1590789964_ffd94a64b495ac883f84.jpg'),
(220, '2656', 'Birthday cake - strawberry', '1,5kg of strawberry flavored cake. ', 2500, 24, '1590881386_43b568bcf9a328f4edaa.jpg'),
(221, '3326515', 'Cheesecake', 'Cheese cake with strawberries, blueberries and raspberries. :) ', 3000, 24, '1590881441_d4777f57a6933969f769.jpg'),
(222, 'AAAA', 'Chocolate cake', 'Nugat chocolate cake, with finest Switz chocolate. 1.5kg. ', 2800, 24, '1590881485_1eecbbe274827fea717b.jpg'),
(223, '234254', 'Chocolate milk cake', 'Mild taste cake with nougat, chocolate and nuts. 10 pieces of cake in the box. :) ', 3000, 24, '1590881617_7ee255187b6c8b94cea1.jpg'),
(224, 'jsdfh', 'Fruit cake', 'Cake with mixed fruit. 1kg in the box. ', 2400, 24, '1590881645_68ce14933c140ac7be31.jpg'),
(225, 'sdfsdf', 'Kinder Bueno cake', 'Kinder Bueno cake made with Nutella! ', 3200, 24, '1590881693_b434ab09992a47fcddde.jpg'),
(226, '2165dc', 'Valentine', 'For your loved ones! White chocolate cake, with milky taste! ', 3200, 24, '1590881751_b5215c3e0f929a4f0291.jpg'),
(227, 'sda', 'Macaroon', '4 macaroons per set. Colors in the notes! ', 390, 24, '1590881787_d769404831334ac786c7.jpg'),
(228, 'dsfdsf', 'Cupcake - New Year ', 'New Year cupcake! Happy holidays!', 200, 24, '1590881834_7948c896bad7bc03bacc.jpg'),
(229, '215d', 'Cupcake - New Year ', 'New Year cupcake! Happy holidays!', 200, 24, '1590881855_fd5a19cb779439b4613c.jpg'),
(230, 'dfsdf', 'Cupcake - New Year ', 'New Year cupcake! Happy holidays!', 200, 24, '1590881874_f5f0b3b31ba1759fdd6d.jpg'),
(231, '32sfd', 'New Year cupcake set', '4 New Year cupcake in the set. For every second set ordered, one cupcake for free! Happy holydays! ', 750, 24, '1590881950_106215761b0a92079796.jpg'),
(233, 'dfssdf', 'Macaroon', 'Pick your color in the note! For every 5th macaroon ordered, you get one free! ', 120, 24, '1590882031_d6b3b3b84a2fe313541a.jpg'),
(234, 'dfssdf1', 'Wedding cake ', 'Price is per kilogram of the cake. Call us for more information! ', 1800, 24, '1590882090_d7a75b41909163858366.jpg'),
(235, 'sdfsdffdf', 'Wedding cake', 'Price is per 1kg of cake. Call us for more information or order and we will contact you! ', 1900, 24, '1590882129_cd1e00da184b364e317a.jpg'),
(236, '234ccfc', 'Welcome, baby!', 'Welcome baby cake with chocolate flavor. 2kg. ', 4000, 24, '1590882343_9897ee7f8b3e73e56731.jpg'),
(237, 'AAAAsdas', 'Welcome, baby!', 'Welcome baby with white chocolate, nuts and orange. 2kg', 4100, 24, '1590882392_7b524438081560a1fd37.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `idUser` int(11) NOT NULL,
  `idShop` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idShop`),
  KEY `R_14` (`idShop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`idUser`, `idShop`, `rating`) VALUES
(16, 4, 4),
(16, 8, 4),
(16, 11, 5),
(16, 12, 4),
(16, 14, 5),
(17, 4, 5),
(17, 13, 4),
(18, 9, 5),
(19, 14, 4),
(20, 14, 4),
(21, 14, 3),
(22, 10, 3),
(22, 12, 2),
(23, 4, 5),
(26, 5, 5),
(26, 6, 3),
(26, 24, 5),
(27, 15, 5),
(28, 7, 5),
(28, 8, 4),
(28, 9, 3),
(28, 11, 5),
(28, 14, 3),
(29, 4, 5),
(29, 5, 4),
(29, 6, 4),
(29, 7, 4),
(29, 10, 5),
(29, 11, 4),
(29, 12, 4),
(29, 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL,
  `description` varchar(400) NOT NULL,
  `shopName` char(40) NOT NULL,
  `state` char(18) NOT NULL,
  `address` varchar(60) NOT NULL,
  `submitDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `description`, `shopName`, `state`, `address`, `submitDate`) VALUES
(4, 'Grandma\'s kitchen is a place where you can buy homemade products such as jam, cookies, sweets and many other food. Visit us or order now!                        ', 'Grandma\'s kitchen', 'A', '11102 Briar Forest Dr Ste C, H', '2020-05-20'),
(5, 'All your friend need for travel. Pack him up and send him to his favorite destination or at least surprise him with a book about travel.                               ', '80 days around the world', 'A', 'Geller Street, New York', '2020-05-13'),
(6, 'Several lines of equipment for all different exercise goals. Decades of research and testing keep our products unrivaled in quality.Extensive experience in making purchasing and installation easy.Our home fitness products are just like those you’d see at the club                        ', 'How you doin\'?', 'A', '11102 Briar Forest Dr Ste C, Houston, SAD', '2020-05-28'),
(7, 'Our story started in Brighton, England in 1976. It began with our founder, Anita Roddick, and her belief in something revolutionary: that business could be a force for good. Following her vision, we’ve been rule breaking, never faking and change making for over 40 years.                        ', 'Beauty and the beast', 'I', '123 Neigh\'s Dr Street C, Houston, SAD', '2020-04-29'),
(8, ' Skippy\'s music shop is a company that sells musical instruments and accompanying equipment, sound systems for all types of events as well as for personal use.As part of our business, we also design and equip all types of premises that need sound systems - discos, cafes, clubs, business premises, mega markets, health facilities, schools, swimming pools, indoor and outdoor spaces.', 'Skippy\'s music shop', 'A', '11102 Briar Forest Dr Ste C, Houston, SAD', '2020-05-04'),
(9, 'We are a family of brands, driven by our desire to make great design available to everyone in a sustainable way.', 'HM club', 'I', 'Geller Street, New York', '2020-05-26'),
(10, 'We are a team of enthusiastic developers and entrepreneurs who decided to convert their common experience into this web store. We hope you’ll like it as much as we do and have a great shopping experience here.', 'FunnyFlash', 'A', '123 Neigh\'s Dr Street C, Houston, SAD', '2020-05-18'),
(11, 'Bean Box hand picks coffee from Seattle’s world-renowned roasters.                         ', 'Bean Box', 'A', 'Santa Monica wn', '2020-05-27'),
(12, 'From green tea to Rooibos, you will find over 120 varieties.', 'Harney and Sons Tea House', 'A', 'Malibu beach house', '2020-05-29'),
(13, 'Godiva was appointed an official chocolatier to the Royal Court of Belgium.', 'GODIVA', 'A', 'Malibu beach house', '2020-05-22'),
(14, 'Arts & Theatre Tickets - Buy tickets to an event they\'ll love.', 'Ticket Master', 'A', 'Malibu room', '2020-05-30'),
(15, 'Buy tickets for upcoming concert tours and events, including rock, electronic, pop, festivals and more.', 'Concert Tickets', 'A', 'West Coast', '2020-05-04'),
(24, 'Be fat, but be happy!                                                 ', 'Dreamy', 'A', 'Ace Joksimovica 15', '2020-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `shopcat`
--

DROP TABLE IF EXISTS `shopcat`;
CREATE TABLE IF NOT EXISTS `shopcat` (
  `idC` int(11) NOT NULL,
  `idShop` int(11) NOT NULL,
  PRIMARY KEY (`idC`,`idShop`),
  KEY `R_37` (`idShop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopcat`
--

INSERT INTO `shopcat` (`idC`, `idShop`) VALUES
(1, 4),
(6, 4),
(14, 4),
(29, 4),
(47, 4),
(48, 4),
(37, 5),
(77, 5),
(78, 5),
(1, 6),
(2, 6),
(24, 6),
(28, 6),
(36, 6),
(46, 6),
(47, 6),
(73, 6),
(1, 7),
(2, 7),
(22, 7),
(42, 7),
(47, 7),
(74, 7),
(1, 9),
(2, 9),
(24, 9),
(35, 9),
(14, 10),
(19, 10),
(32, 10),
(3, 11),
(48, 11),
(29, 13),
(48, 13),
(10, 14),
(64, 14),
(39, 15),
(56, 15),
(57, 15),
(58, 15),
(79, 15),
(4, 24),
(6, 24),
(8, 24),
(26, 24),
(29, 24),
(76, 24);

-- --------------------------------------------------------

--
-- Table structure for table `shopreport`
--

DROP TABLE IF EXISTS `shopreport`;
CREATE TABLE IF NOT EXISTS `shopreport` (
  `idUser` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `idShop` int(11) NOT NULL,
  `submitDate` date NOT NULL,
  `status` char(2) NOT NULL,
  PRIMARY KEY (`idUser`,`idShop`),
  KEY `R_19` (`idShop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopreport`
--

INSERT INTO `shopreport` (`idUser`, `description`, `idShop`, `submitDate`, `status`) VALUES
(16, 'They did not deliver ordered gift on time!They were 2 days late!', 12, '2020-05-30', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `systemuser`
--

DROP TABLE IF EXISTS `systemuser`;
CREATE TABLE IF NOT EXISTS `systemuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` char(18) NOT NULL,
  `surname` char(18) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNum` char(18) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `systemuser`
--

INSERT INTO `systemuser` (`id`, `username`, `password`, `name`, `surname`, `email`, `phoneNum`, `image`) VALUES
(2, 'lm170392d', '$2y$10$eqDOMcA2qzqE9aRj3GYYQOorVL/tnLBAbwl43KKcvz7cgudXbd1nK', 'Milan', 'Lazic', 'lazic.milan@gmail.com', '+38164935965', ''),
(3, 'rt170450d', '$2y$10$zsM7S3Qo1EvIFOMBVHEnv.kXYJneQZJHZb/BXp7s1v6DigrhiVdRu', 'Tijana', 'Rankovic', 'rankovic.tijana@gmail.com', '+38164935965', ''),
(4, 'grandma', '$2y$10$yGbvnQquoachMVvXi2EnBOi.dw1DdiQZQa0uB4krixhYD.0Wylihq', 'Jolene', 'Newman', 'jolene.newman@gmail.com', '111555444', '1590751788_025b4d569d7c58bc25eb.png'),
(5, 'muriel', '$2y$10$ye1LzMMb5cF9DMYeoO2qfeDI7n8YVodrplY7DJGEbOt4Jbxaxw51O', 'Chandler', 'Bing', 'chandler.bing@gmail.com', '+255555111', '1590759529_12bafd78add930165146.jpeg'),
(6, 'joeyGym', '$2y$10$wcpS.Xm4tm8ceOvDjYuZVOsSo9kQKF4EKKPdbByRBdfxcz1kx2lSy', 'Joey', 'Tribiani', 'joey.howyoudoin@gmail.com', '+38164935965', '1590764442_ac02fe52e5d3d88c8e1d.jpg'),
(7, 'regina', '$2y$10$Q2yYcm7NaUXs/Wcr4dZ3duguysELZ5BEA4t.QN44iPbFjEspUWDxu', 'Phoebe', 'Buffat', 'pheobs@gmail.com', '062415789', '1590768383_9e1f2645dcb4e7b41bea.jpg'),
(8, 'iknow', '$2y$10$B.bktbfBmeu0LIMu91zrPekXdsH7lH8oamUAfankjtfQbomQkaRJO', 'Monica', 'Geller', 'monica.geller@gmail.com', '1121232', '1590770284_ff6dd76ba91bc732a93d.jpg'),
(9, 'potterHM', '$2y$10$XO250Y8nYDYmozVYBqYqjOQHDuzSqzjjforU7rxTTi46zgAs9Kr1C', 'Sandra', 'Potter', 'potter.mh@gmail.com', '+381650204789', '1590771734_93913d6b478bd1721848.png'),
(10, 'funnyFlash', '$2y$10$o1c.oJfFNwVMEy/Q2UlAtON7k9htmZQ0X610PAFgyXMnXwG.Df3iO', 'Joey', 'Miles', 'miles.jo@gmail.com', '+381630205847', '1590774219_856aa121f7c6499c3f92.jpg'),
(11, 'charlie', '$2y$10$E/UQ6SQEYhgwwta5ejIxmu8dVdkji3g1ENrQY9cwGLOIZAvDSl/Xa', 'Charlie', 'Harpery', 'ch.harper@gmail.com', '0665432345', '1590784160_87783c07c9fe8f753810.jpg'),
(12, 'alanharper', '$2y$10$iRKARh7363XfhvXplSCjb.eft3P8H4b2RjJkIewlkJGaFETnS55X2', 'Alan', 'Harper', 'alan.harper@gmail.com', '0665432345', '1590784519_715f012e112a67c01256.jpg'),
(13, 'jakeharper', '$2y$10$ji8ncZi8ZeDrj465S0zWQOYQamBzkNxyWVYFuPs2GfAAMRyFkUorO', 'Jake', 'Harper', 'jake.H@gmail.com', '0665432345', '1590784889_227ed76ab765d517daae.png'),
(14, 'evelyn', '$2y$10$.8uMW1aJeYDKQnHxrlLNrOzNHH0H9/jD623Bdfem43MawKUoqAit6', 'Evelyn', 'Harper', 'evelyn@gmail.com', '0665432345', '1590787809_aaa4970c3d069c3086f8.jpg'),
(15, 'bertaxD', '$2y$10$LUSNgpHPsWqdqKuuqgNaiuftqrfH1mbKbyZPN.tXUnWxaKTBlEyNe', 'Berta', 'Cleaner', 'berta.xD@gmail.com', '0665432345', '1590789165_b70b288a06d55e984f91.jpg'),
(16, 'petrica89', '$2y$10$lK23PblQB0U6chejNxJO.uIt4fR8cyf1RsAZFG3apoFZHhtrXivYm', 'Petra', 'Hristovski', 'petrica@gmail.com', '065148972', NULL),
(17, 'pavle23', '$2y$10$AdPTMBNwK61LzRFAgWWqsOdmmL0j6PHflsg/3DGFPpctx63NQr292', 'Pavle', 'Mitrovic', 'mitrovicP23@gmail.com', '062418755', NULL),
(18, 'papimare', '$2y$10$DXOZSIHvVYQq4E9ZAfy0UuwLs/K4lyJaG5tTIM4/IelnU6TrJ8Xj.', 'Marko', 'Papic', 'papicMare@gmail.com', '06234562', NULL),
(19, 'savickaS', '$2y$10$vuDW5gQiIx4bN/gfMEgmB.7P9ac4ZCc4k7FzkuWJ.QfikjXdbBhpy', 'Sara', 'Savic', 'savicka21@gmail.com', '0612345717', NULL),
(20, 'jojaMonkey', '$2y$10$Am0jw3NTsAPgErKvsueIIuQj/QV8KkMHkhRlFgYshmBtfJxporvH.', 'Janko', 'Savkovic', 'jankosav@gmail.com', '0612349152', NULL),
(21, 'oliniko11', '$2y$10$L5wQUyL898rhP/zdnT.uUOD9LDeepUzeIA.RkMSLMsi56wElVqzAi', 'Olivera', 'Nikolic', 'oliniko@gmail.com', '0621347297', NULL),
(22, 'zivkaAlek', '$2y$10$lp2pAVUrNTqe/h4jdvn4uuWvMOqVGtypWxiZo8F6JnBIOjxYJTGTK', 'Aleksandra', 'Zivic', 'zivka@gmail.com', '0631214198', NULL),
(23, 'pavkic12', '$2y$10$wRK5wqiN6/oxpmUQeF7UNujslWyLURJZ43nYLGyRzNvEtP2SNJFC2', 'Milan', 'Pavic', 'pavki@gmail.com', '0624118978', NULL),
(24, 'sajmonica', '$2y$10$fSTQ.P.eNxovU2ccfUq6k.2o9i2VCq4e9m3zDyU5hGmIrHzQFy3lK', 'Simona', 'Denic', 'denic.simona1@gmail.com', '06732894234', '1590880653_464bcd4dee270ad7da6e.jpg'),
(25, 'ds170338d', '$2y$10$2wHEDfMcVCLjRXUz9nYhqOq94F87rZzyQlC9JvYjY6K8HS2f.nxQW', 'Simona', 'Denic', 'denic.simona@gmail.com', '23904820394', ''),
(26, 'milanica', '$2y$10$8nf/yODx/6fExW/iuzEDROqFstQTf0aGYoRE15V3eQuDqWzfGTa3u', 'Milana', 'Jankovic', 'j.milana@gmail.com', '325656233', NULL),
(27, 'johnyy', '$2y$10$Fs9GurUYsiiGUbKYA7xas.scTuXvXL4GbaHUH09emZE21UAeCD6Ve', 'John', 'Newman', 'newman.john.a@gmail.com', '932858023', NULL),
(28, 'marky', '$2y$10$WR54jkyBPgtVy6TPvCUmpu4Nxs4eAbpS/NDainiESldrwTnw.OfoC', 'Mark', 'Tompson', 'tom.mark@yahoo.com', '23847392', NULL),
(29, 'monicaa', '$2y$10$Z/B63pqi6wfqkGbdhFcKR.EhjlR.6gA0UU/rmET93rT8G2MXy1ijC', 'Monica', 'Geller', 'monicaa.geller@gmail.com', '38298904382', NULL),
(32, 'simona', '$2y$10$KkAhaaprifJfgZ.h4HueSO9I7ZL27ukoNLjw3615uUF2lS73SNP.S', 'Simona', 'Denic', 'sajmon@gmail.com', '21434321', '1590922437_cf2726054cb7f3876d91.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `address`) VALUES
(16, 'Ratka Mitrovica 112'),
(17, 'Veljka Petrovica 12b'),
(18, 'Bledska 25'),
(19, 'Bore Markovica 22'),
(20, 'Borova 14'),
(21, 'Bitke Na Neretvi 1'),
(22, 'Bore Papica'),
(23, 'Mire Popare 22'),
(26, 'Stublenica bb Ub '),
(27, 'Register Streen NYC USA '),
(28, 'Elton Street 2b,  Los Angeles,'),
(29, 'I know Street, NY, Usa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
