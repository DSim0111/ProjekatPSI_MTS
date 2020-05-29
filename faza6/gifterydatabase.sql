-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 29, 2020 at 06:22 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

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
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` float NOT NULL,
  `idA` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) DEFAULT NULL,
  `idShop` int(11) NOT NULL,
  PRIMARY KEY (`idA`),
  KEY `R_48` (`idShop`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addon`
--

INSERT INTO `addon` (`name`, `price`, `idA`, `image`, `idShop`) VALUES
('Wrapping box', 300, 1, '1590756563_f9a4c32cddfc8e181003.jpg', 4),
('Customized notes', 50, 2, '1590756663_2dde6a47f18692979b25.jpg', 4),
('Wrapping Kiss', 200, 3, '1590773296_eeb4a3553558e657b45e.jpg', 9),
('Wrapping Cake', 250, 5, '1590773394_57b83ab23b1e30f6f7c5.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `idC` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(18) NOT NULL,
  PRIMARY KEY (`idC`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(78, 'travel books');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`idDelReq`),
  KEY `R_38` (`idUser`),
  KEY `R_39` (`idProduct`),
  KEY `R_40` (`idShop`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `idProduct` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(12) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` float NOT NULL,
  `idShop` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProduct`),
  KEY `R_23` (`idShop`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(69, '3254ufgb', 'Arctic Monkeys record', 'Album: AM ', 3000, 8, '1590770722_48e80a8e02ce80fac7bc.png'),
(66, 'C_P112134', 'Gramophone', 'Unique home decor item\r\nTable space filler\r\nBest for both indoor and outdoor use\r\n', 10000, 8, '1590770566_45df3a58d6508adb4d28.png'),
(67, 'sdffewr', 'Crosley Grapmophone', 'Crosley Gramophone blue \r\nUnique home decor item,\r\nTable space filler,\r\nBest for both indoor and outdoor use,\r\n', 10000, 8, '1590770608_54cce321a9f92dc1ffbd.png'),
(68, '5457', 'Ed Sheeran record', 'Album \"X\" of famous singer Ed Sheeran. ', 2000, 8, '1590770687_3157eeff82262317f3ea.png'),
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
(108, '145JKU', 'Super Mario', '64GB', 1200, 10, '1590775286_abe2db043bb7707cebf8.jpg'),
(95, 'QXC12', 'Gold Flash', '64GB', 600, 10, '1590774378_f8199fd2fb6f22e5a214.jpg'),
(101, 'UI12SX', 'GoldBrick Flash', '32GB', 920, 10, '1590774787_8f23b0ad6b4ab53d2511.jpg'),
(100, '12LFGM', 'Neo Flash', '64GB', 1800, 10, '1590774705_28af058b020d237085f3.jpg'),
(99, '44LKM1', 'Balisong Knife', '32GB', 450, 10, '1590774628_42bedc15993b1b9435af.jpg'),
(102, 'PPO23', 'Rainbow Pony', '16GB', 450, 10, '1590774872_ef989008d094e0ce1d3e.jpg'),
(103, '11LJKM', 'Camera Flash', '32GB', 950, 10, '1590774921_5f98b8acd7a3f94d9667.jpg'),
(104, '1YH34', 'Tiffany Bag', '16GB', 600, 10, '1590774979_34cd3935146678739851.jpg'),
(105, 'MMG18', 'Golden Robot', '128GB', 1500, 10, '1590775052_b92561407317c6843716.jpg'),
(106, '556AKJ', 'Diamond Flash', '64GB', 1900, 10, '1590775150_b3b65cff496a2872576e.jpg'),
(107, 'NMZ1', 'Gun Flash', '128GB', 2600, 10, '1590775226_e69d47151d4ded168948.jpg'),
(109, '145FGD', 'Guitar Flash', '32GB', 1000, 10, '1590775345_87c04187280009d7faa5.jpg'),
(110, '423JKV', 'Turtle Flash', '32GB', 2100, 10, '1590775421_a0e210e841d1498a3122.jpg'),
(111, 'YU1243', 'Jar Flash', '8GB', 1400, 10, '1590775473_dae1aaa2a6645633172e.jpg');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL,
  `description` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `shopName` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `state` char(18) NOT NULL,
  `submitDate` date NOT NULL,
  `address` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `description`, `shopName`, `state`, `submitDate`, `address`) VALUES
(4, 'Grandma\'s kitchen is a place where you can buy homemade products such as jam, cookies, sweets and many other food. Visit us or order now!                        ', 'Grandma\'s kitchen', 'A', '0000-00-00', '11102 Briar Forest Dr Ste C, H'),
(5, 'All your friend need for travel. Pack him up and send him to his favorite destination or at least surprise him with a book about travel.                               ', '80 days around the world', 'I', '0000-00-00', 'Geller Street, New York'),
(6, 'Several lines of equipment for all different exercise goals. Decades of research and testing keep our products unrivaled in quality.Extensive experience in making purchasing and installation easy.Our home fitness products are just like those you’d see at the club                        ', 'How you doin\'?', 'I', '0000-00-00', '11102 Briar Forest Dr Ste C, Houston, SAD'),
(7, 'Our story started in Brighton, England in 1976. It began with our founder, Anita Roddick, and her belief in something revolutionary: that business could be a force for good. Following her vision, we’ve been rule breaking, never faking and change making for over 40 years.', 'Beauty and the beast', 'I', '0000-00-00', '123 Neigh\'s Dr Street C, Houston, SAD'),
(8, ' Skippy\'s music shop is a company that sells musical instruments and accompanying equipment, sound systems for all types of events as well as for personal use.As part of our business, we also design and equip all types of premises that need sound systems - discos, cafes, clubs, business premises, mega markets, health facilities, schools, swimming pools, indoor and outdoor spaces.', 'Skippy\'s music shop', 'I', '0000-00-00', '11102 Briar Forest Dr Ste C, Houston, SAD'),
(9, 'We are a family of brands, driven by our desire to make great design available to everyone in a sustainable way.', 'HM club', 'I', '0000-00-00', 'Geller Street, New York'),
(10, 'We are a team of enthusiastic developers and entrepreneurs who decided to convert their common experience into this web store. We hope you’ll like it as much as we do and have a great shopping experience here.', 'FunnyFlash', 'I', '0000-00-00', '123 Neigh\'s Dr Street C, Houston, SAD');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shopcat`
--

INSERT INTO `shopcat` (`idC`, `idShop`) VALUES
(1, 4),
(1, 6),
(1, 9),
(2, 6),
(2, 9),
(6, 4),
(14, 4),
(14, 10),
(19, 10),
(24, 6),
(24, 9),
(28, 6),
(29, 4),
(32, 10),
(35, 9),
(36, 6),
(37, 5),
(46, 6),
(47, 4),
(47, 6),
(48, 4),
(73, 6),
(77, 5),
(78, 5);

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
  `status` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`idUser`,`idShop`),
  KEY `R_19` (`idShop`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `systemuser`
--

INSERT INTO `systemuser` (`id`, `username`, `password`, `name`, `surname`, `email`, `phoneNum`, `image`) VALUES
(1, 'ds170338d', '$2y$10$ZNDZ9zX2soQ9N8fRgnMBguY6Ce84o/GSMhwRsNN1CcLHYBrmV4SXC', 'Simona', 'Denic', 'denic.simona@gmail.com', '+381649415075', ''),
(2, 'lm170392d', '$2y$10$eqDOMcA2qzqE9aRj3GYYQOorVL/tnLBAbwl43KKcvz7cgudXbd1nK', 'Milan', 'Lazic', 'lazic.milan@gmail.com', '+38164935965', ''),
(3, 'rt170450d', '$2y$10$zsM7S3Qo1EvIFOMBVHEnv.kXYJneQZJHZb/BXp7s1v6DigrhiVdRu', 'Tijana', 'Rankovic', 'rankovic.tijana@gmail.com', '+38164935965', ''),
(4, 'grandma', '$2y$10$yGbvnQquoachMVvXi2EnBOi.dw1DdiQZQa0uB4krixhYD.0Wylihq', 'Jolene', 'Newman', 'jolene.newman@gmail.com', '111555444', '1590751788_025b4d569d7c58bc25eb.png'),
(5, 'muriel', '$2y$10$ye1LzMMb5cF9DMYeoO2qfeDI7n8YVodrplY7DJGEbOt4Jbxaxw51O', 'Chandler', 'Bing', 'chandler.bing@gmail.com', '+255555111', '1590759529_12bafd78add930165146.jpeg'),
(6, 'joeyGym', '$2y$10$wcpS.Xm4tm8ceOvDjYuZVOsSo9kQKF4EKKPdbByRBdfxcz1kx2lSy', 'Joey', 'Tribiani', 'joey.howyoudoin@gmail.com', '+38164935965', '1590764442_ac02fe52e5d3d88c8e1d.jpg'),
(7, 'regina', '$2y$10$Q2yYcm7NaUXs/Wcr4dZ3duguysELZ5BEA4t.QN44iPbFjEspUWDxu', 'Phoebe', 'Buffat', 'pheobs@gmail.com', '12230198932', '1590768383_9e1f2645dcb4e7b41bea.jpg'),
(8, 'iknow', '$2y$10$B.bktbfBmeu0LIMu91zrPekXdsH7lH8oamUAfankjtfQbomQkaRJO', 'Monica', 'Geller', 'monica.geller@gmail.com', '1121232', '1590770284_ff6dd76ba91bc732a93d.jpg'),
(9, 'potterHM', '$2y$10$XO250Y8nYDYmozVYBqYqjOQHDuzSqzjjforU7rxTTi46zgAs9Kr1C', 'Sandra', 'Potter', 'potter.mh@gmail.com', '+381650204789', '1590771734_93913d6b478bd1721848.png'),
(10, 'funnyFlash', '$2y$10$o1c.oJfFNwVMEy/Q2UlAtON7k9htmZQ0X610PAFgyXMnXwG.Df3iO', 'Joey', 'Miles', 'miles.jo@gmail.com', '+381630205847', '1590774219_856aa121f7c6499c3f92.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
