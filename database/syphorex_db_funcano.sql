-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 29, 2018 at 02:43 AM
-- Server version: 5.6.32-78.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syphorex_db_funcano`
--

-- --------------------------------------------------------

--
-- Table structure for table `fc_admin`
--

CREATE TABLE `fc_admin` (
  `adminId` tinyint(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `adminRole` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0:inactive;1:active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_admin`
--

INSERT INTO `fc_admin` (`adminId`, `name`, `emailId`, `password`, `adminRole`, `status`) VALUES
(1, 'Admin', 'admin@funcano.com', 'admin.789', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fc_comments`
--

CREATE TABLE `fc_comments` (
  `commentId` int(11) UNSIGNED NOT NULL,
  `flylerId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `parentId` int(11) NOT NULL,
  `commentTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fc_contact_us`
--

CREATE TABLE `fc_contact_us` (
  `contactId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `contactNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_contact_us`
--

INSERT INTO `fc_contact_us` (`contactId`, `name`, `emailId`, `message`, `subject`, `contactNo`) VALUES
(1, 'anvish', 'vish07@gmail.com', 'i wnat to add my flyer', 'for enquiry', '0123456789'),
(2, 'rahul', 'vish07@gmail.com', 'i want basic info abt funcano', 'for enquiry', '0123456789'),
(3, 'abc', 'bhushan@gmail.com', 'textmsg', 'android', '9405202621'),
(4, 'abc', 'bhushan@gmail.com', 'textmsg', 'android', '9405202621'),
(5, 'abc', 'bhushan@gmail.com', 'textmsg', 'android', '9405202621'),
(51, 'abc', 'bhushan@gmail.com', 'textmsg', 'android', '9405202621');

-- --------------------------------------------------------

--
-- Table structure for table `fc_faq`
--

CREATE TABLE `fc_faq` (
  `faqId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_faq`
--

INSERT INTO `fc_faq` (`faqId`, `title`, `description`) VALUES
(1, 'hotel blvd', 'blvd is best venue to celebrate events..!!'),
(3, 'What is funcano', 'It\'s a web applications ');

-- --------------------------------------------------------

--
-- Table structure for table `fc_flyers`
--

CREATE TABLE `fc_flyers` (
  `flyerId` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `startTime` date NOT NULL,
  `endTime` date NOT NULL,
  `categoryTitle` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `amenities` varchar(500) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `viewCount` int(11) NOT NULL,
  `facebookLink` varchar(255) NOT NULL,
  `twitterLink` varchar(255) NOT NULL,
  `googleLink` varchar(255) NOT NULL,
  `facebookShare` mediumint(8) UNSIGNED NOT NULL,
  `twitterShare` mediumint(8) UNSIGNED NOT NULL,
  `googleShare` mediumint(8) UNSIGNED NOT NULL,
  `whatsupShare` mediumint(8) UNSIGNED NOT NULL,
  `buyLink` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `createdOn` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:Inactive, 1:Active',
  `location` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `eRepeate` varchar(256) NOT NULL,
  `repeate` varchar(255) NOT NULL,
  `repeattype` varchar(256) NOT NULL,
  `nday` varchar(255) NOT NULL,
  `nweek` varchar(256) NOT NULL,
  `eFree` varchar(255) NOT NULL,
  `eMinPrice` varchar(15) NOT NULL,
  `eMaxPrice` varchar(15) NOT NULL,
  `eName` varchar(256) NOT NULL,
  `eCatId` int(11) NOT NULL,
  `ticketTitle` varchar(255) NOT NULL,
  `ticketDesc` varchar(500) NOT NULL,
  `ticketPrice` varchar(20) NOT NULL,
  `ticketQuantity` int(11) NOT NULL,
  `tickerStatus` tinyint(4) NOT NULL,
  `eventStartTime` varchar(10) NOT NULL,
  `eventEndTime` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_flyers`
--

INSERT INTO `fc_flyers` (`flyerId`, `eventId`, `userId`, `title`, `price`, `startTime`, `endTime`, `categoryTitle`, `keywords`, `amenities`, `city`, `state`, `zip`, `address`, `latitude`, `longitude`, `phone`, `website`, `email`, `viewCount`, `facebookLink`, `twitterLink`, `googleLink`, `facebookShare`, `twitterShare`, `googleShare`, `whatsupShare`, `buyLink`, `description`, `image`, `image1`, `image2`, `image3`, `createdOn`, `status`, `location`, `type`, `eRepeate`, `repeate`, `repeattype`, `nday`, `nweek`, `eFree`, `eMinPrice`, `eMaxPrice`, `eName`, `eCatId`, `ticketTitle`, `ticketDesc`, `ticketPrice`, `ticketQuantity`, `tickerStatus`, `eventStartTime`, `eventEndTime`) VALUES
(2, 0, 6, 'Royal Beach Resort', '0.00', '2018-08-11', '2018-08-13', 'Music and Nightlife', 'Alternative Music,Dance Music,Beach ultimate,Football', '', 'Los Angeles', 'US', '123456', '123 main streey', '', '', '', 'www.dummyflyer.com', 'flyers@local.fc', 71, '', '', '', 1, 0, 0, 0, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'xukfArq7.jpg', 'x6y5TCMa.jpg', 'E6JxZBzK.jpg', 'z9ESM2q5.jpg', '2018-07-31', 2, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, '', ''),
(3, 0, 6, 'five elements', '0.00', '2018-08-02', '2018-08-03', 'Food and Drink', 'Embroidery,Tournament Scrabble,Found objects', '', 'Houston', 'newada', '54789', '547 blue street', '', '', '', '', '', 33, '', '', '', 1, 0, 2, 0, '', '', '2jFuYQ56.png', 'mBtXr7Dv.jpg', 'dNDUk9zT.jpg', 'yeyY6BDg.jpg', '2018-07-31', 2, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '40', 0, 0, '', ''),
(4, 0, 5, 'GENTSE FEESTEN IN GHENT, BELGIUM 19 – 28 July 2019', '0.00', '2018-09-09', '2018-09-10', 'Music and Nightlife', 'Drawing,Warm glass,Woodworking', '', 'New York', 'USA', '63345', 'Ghent, Belgium', '', '', '', '', '', 107, '', '', '', 1, 0, 2, 0, '', '', '8gBKvwnP.jpg', 'K7DBZ4te.jpg', 'UwZT9YwZ.jpg', '9HuZsJBw.jpg', '2018-07-31', 2, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '70.2', 0, 0, '', ''),
(5, 0, 5, 'LIVERPOOL FOOD AND DRINK FESTIVAL IN LIVERPOOL, UK 15 – 16 September 2018', '0.00', '2018-08-13', '2018-08-14', 'Food and Drink', 'Tole painting,Go,Casino,Beer Cans,Cake Making', '', 'Chicago', 'UK', '966423', 'Liverpool, UK', '', '', '', '', '', 70, '', '', '', 0, 0, 0, 0, '', '', 'f4jMxqU5.jpg', '67HMnchc.jpg', '5qQKMH9K.jpg', '7n6rZapE.jpg', '2018-07-31', 2, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '30', 0, 0, '', ''),
(6, 0, 5, 'EUROPE’S LOUDEST FESTIVAL, LAS FALLAS IN VALENCIA March 15 – 19', '0.00', '2018-08-03', '2018-08-10', 'Arts and Theatre', 'Designing and building electronic circuits,Model houses,Cliff diving', '', 'Houston', 'UK', '785146', 'Europe Valencia', '', '', '', '', '', 72, '', '', '', 2, 0, 2, 0, '', '', '6D6dMJy4.jpg', 'meH7RHmH.jpg', 'wnmg6MgU.jpg', '7rE8MxVu.jpg', '2018-08-31', 1, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '45.5', 0, 0, '', ''),
(7, 0, 5, 'Korea Grand shopping and Deals', '0.00', '2018-08-14', '2018-08-15', 'Shopping and Deals', 'Drawing,Jacquet,Miniatures,Home Repiars', '', 'Phoenix', 'UK', '7884165', 'Uk Germany', '', '', '', '', '', 104, '', '', '', 0, 0, 0, 0, '', '', 'AswWjJ3K.jpg', '7MvH69jF.jpg', '3tGE4ZY6.jpg', 'cEN885jV.jpg', '2018-07-31', 2, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '80.1', 0, 0, '', ''),
(11, 0, 5, 'Cultural Events and Festivals in Washington DC', '0.00', '2018-08-03', '2018-08-05', 'Culture', 'Embroidery', '', 'San Diego', 'USA', '7846532', 'USA Washigton', '', '', '', '', '', 80, '', '', '', 2, 0, 1, 0, '', '', 'eBaK7YVS.jpg', '8DFHMbFU.jpg', 'zgF9Q3Yq.jpg', 'k9b2nRSe.jpg', '2018-08-02', 2, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '10', 0, 0, '', ''),
(12, 0, 13, 'Amsterdam light festival', '0.00', '2018-08-13', '2018-08-14', 'Culture', 'Casino,Comic books,Eskrima', '', 'San Diego', 'UK', '23245453', 'Amsterdam, The Netherlands', '', '', '', '', '', 71, '', '', '', 10, 2, 8, 0, '', 'There are two festival routes: The Water Colours and The Illuminati. The Water Colours is a boat route. Taking a 75-minute boat ride along the canals is one of the best ways to experience these colorful and unique artworks. There are many operators offering tours, and you can choose from driving your own boat to a private canal cruise (and everything in between!).', 'wAYmmw4R.jpg', 'e6Gf6KKV.jpg', 'jP56pQUe.jpg', 'YQEfcx4v.jpg', '2018-08-11', 1, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '20.10', 8, 0, '', ''),
(14, 0, 24, 'Boccaccesca food and wine festival', '0.00', '2018-08-16', '2018-08-19', 'Food and Drink', 'Casino,Beer Cans', '', 'Phoenix', 'Europe', '123456', 'Certaldo in Tuscany, Italiy', '', '', '', '', '', 52, '', '', '', 3, 0, 3, 0, '', 'Boccaccesca is a yearly food and wine extravaganza, attracting countless visitors to the narrow medieval streets of Certaldo Alto.\r\n\r\nTuscan wines like Chianti Classico or Brunello of Montalcino are legendary and tastings take place during the four days of the festival with renowned sommeliers helping visitors to choose and appreciate.', 'Mwqh5csS.jpg', 'U6HTEb2u.jpg', 'Au9HSghD.jpg', '', '2018-08-14', 1, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '10.5', 4, 0, '9:00 pm', '12:00 am'),
(15, 0, 25, 'Mad cool festival', '0.00', '2018-08-16', '2018-08-20', 'Music and Nightlife', 'Woodworking,Casino', '', 'Houston', 'Uk', '123456', 'Madrid, Spain', '', '', '', '', '', 63, '', '', '', 6, 1, 7, 0, '', 'It went onto the European pop and rock festival scene in 2016.\r\n\r\nMassively successful in its first year, it just keeps getting bigger and better.\r\n\r\nUnlike many other festivals, this is held in the center of a major city, making it truly accessible.', 'fASruHg5.jpg', 'b4VJw8K4.jpg', 'QpXGnP3A.jpg', '', '2018-08-14', 1, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '22.10', 6, 0, '10:00 am', '1:00 pm'),
(16, 0, 25, 'Museumsufer culture festival', '0.00', '2018-08-14', '2018-08-17', 'Culture', 'Posters,Shot glasses', '', 'New York', 'Uk', '123456', 'Frankfurt, Germany', '', '', '', '', '', 104, '', '', '', 23, 2, 12, 0, '', 'The Museum Embankment Festival, or “Museumsufer Fest” in German, is an annually held festival on the banks of the River Main, and it attracts more than 3 million visitors every year.\r\n\r\nIt’s structured as a tribute to the museum landscape of the city, made as a unique combination of art, theater, music, dance and cuisine.', 'CU2g7cBc.jpg', 'dG2C8Hwn.jpg', 'Tj9Hn9Cf.jpg', '', '2018-08-14', 1, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '9.12', 10, 0, '9:00 am', '2:00 pm'),
(18, 0, 24, 'Europe shopping festival', '0.00', '2018-08-17', '2018-08-20', 'Shopping and Deals', 'Shopping lists', '', 'New York', 'UK', '123456', 'Uk new york', '', '', '', '', '', 107, '', '', '', 6, 2, 5, 0, '', 'Calling all shopaholics out there…if exceeding budgets is your biggest worry when you’re holidaying overseas, then you’ve just hit the jackpot.\r\n\r\nWhether it’s a complete wardrobe makeover or just picking up a few gifts for your family back home, there\'s no better place to do this that at some of the largest shopping festivals.', 'a7AAb96Y.jpg', 'Cp4KtfPe.jpg', '5uXptFUS.jpg', 'Q87Th6ek.png', '2018-08-17', 1, '', '', '', '', '', '', '', '', '', '', '', 0, 'Shopping', '', '17.10', 2, 0, '9:00 am', '12:00 pm'),
(19, 0, 24, 'Denver puzzling adventure', '0.00', '2018-08-20', '2018-08-25', 'Family and Kids', 'Hats,Computer games', '', 'Los Angeles', 'UK', '101456', ' Civic Center Park   101 W. 14th Ave., Denver, CO 80202', '', '', '', 'http://puzzlingadventures.com', 'support@puzzlingadventures.com', 100, '', '', '', 6, 0, 3, 0, '', 'Puzzling Adventures™ is a cross between a scavenger hunt, an informative self-guided tour, and The Amazing Race®. Each adventure consists of a series of locations that you are guided to where you are required to answer questions or solve puzzles to receive your next instruction.\r\n\r\nOur adventures do not require that you race as quickly as possible from start to finish. We believe that part of the fun is enjoying the sights, sounds, and tastes of the various locations you will visit. Thus, before being guided to a new location, you will usually have the opportunity to eat, drink, sight-see, or use the bathroom while the game clock is not running. You can even go home and come back another day without penalty. You are only timed on your travel and figuring out the puzzles. Once your adventure is complete you will be ranked based on a combination of your answers to the questions and your game clock time.', 'QGv8BSTz.jpg', '42npNB7T.jpg', 'ByQZd5v8.jpg', '', '2018-08-17', 1, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '40', 13, 0, '9:00 am', '9:00 pm'),
(24, 0, 50, 'Lollapalooza berlin', '0.00', '2018-09-11', '2018-09-13', 'Music and Nightlife', 'Alternative Music', '', 'Phoenix', 'UK', '213054', 'Olympiapark & Stadion, Berlin, Germany', '', '', '', '', '', 23, '', '', '', 5, 1, 4, 0, '', 'No doubt, one of the premiere, most established festival brands ever.\r\n\r\nRegularly sold-out with 70,000+ music fans enjoying some of the best concerts the world has to offer.\r\n\r\nAlso showcasing art installations, a street fair and a children’s zone.', 'aet36xZX.jpg', '', '', '', '2018-09-07', 3, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '15.10', 0, 0, '9:00 pm', '11:00 pm'),
(25, 0, 50, 'Europe’s loudest festival, las fallas in valencia', '0.00', '2018-09-10', '2018-09-13', 'Arts and Theatre', 'Books', '', 'Phoenix', 'UK', '123456', 'Av. del Marqués de Sotelo, 2, 46002 València, Spain', '', '', '', '', '', 24, '', '', '', 1, 0, 1, 0, '', 'Nestled in the heart of the Mediterranean coast, the city of Valencia each year celebrates the arriving of spring with spectacular program.\r\n\r\nIt’s a combination of fiesta, fireworks, quality satire shows – all together placed under the one name – Las Fallas.\r\n\r\nEvery single street in the city center is showcasing colorful giant paper figures, known as ninots, very often several meters tall, placed at the end of the parade in fantasy groups – made to make fun with political figures or soap stars, for example.', 'Per7F5qQ.jpg', '', '', '', '2018-09-10', 1, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '20.12', 6, 0, '6:00 pm', '10:00 pm'),
(26, 0, 50, 'Berline oktoberfest', '0.00', '2018-09-21', '2018-10-07', 'Food and Drink', 'Warm glass,Beer Cans', '', 'Houston', 'UK', '021354', 'Alexander Platz,Berlin Germany', '', '', '', '', '', 9, '', '', '', 0, 0, 1, 0, '', 'Beer and Germany belong together, and Berlin has created a great Oktoberfest held annually at Zentral Festplatz am Kurt-Schumacher-Damm near Tegel Airport.\r\n\r\nIt can not be compared with the one in Munich, but still fun to join if you are in Berlin in early October or late September.\r\n\r\n', '6CxQJjqQ.jpg', '', '', '', '2018-09-10', 1, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '33.10', 10, 0, '10:00 pm', '12:00 am'),
(27, 0, 50, 'Reepherbahn festival', '0.00', '2018-09-19', '2018-09-22', 'Music and Nightlife', 'Dance Music,European Music (Folk / Pop)', '', 'Chicago', 'UK', '023456', 'Hamburg, Germany', '', '', '', '', '', 15, '', '', '', 0, 0, 0, 0, '', 'Reeperbahn Festival is a massive music festival held in Hamburg each year in September.\r\n\r\nIt’s Germany largest club festival with over 600 events events held in 70 venues.\r\n\r\nThere are over 32,000 visitors expected to the festival.\r\n\r\nIn addition to the concerts, there are many events showcasing fine art, film and literature.\r\n\r\nHamburg is a a hip and happening place to be during these four days in September.', '8sxCR7Cs.jpg', '', '', '', '2018-09-10', 4, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '12.7', 10, 1, '1:00 pm', '3:00 pm'),
(28, 0, 46, 'Iceland airwaves', '0.00', '2018-11-07', '2018-11-10', 'Music and Nightlife', 'Classical Music,Indie Pop,Jazz', '', 'Phoenix', 'USA', '123450', 'Reykjavik, Iceland', '', '', '', '', '', 17, '', '', '', 0, 0, 0, 0, '', 'Iceland Airwaves proclaims to be the coolest music festival on earth.\r\n\r\nAnd they won’t get any argument from us about that!\r\n\r\nIt’s a festival that’s cool both in the literal and the metaphorical sense.\r\n\r\nHeld annually, 2018 in it’s 18th year.\r\n\r\nIt’s a five-day party, showcasing new acts, from Iceland and across the world.\r\n\r\nVarious venues across Reykjavik city center host the musical acts performing at the festival.\r\n\r\nThis year the organizers are expecting around 9000 festival attendees, including artists, and people from the music industry and press.\r\n\r\nNote you must be at least 20 years of age to attend and photo ID is required.', '', '', '', '', '2018-09-10', 1, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '10.20', 10, 0, '12:00 am', '3:00 am'),
(29, 0, 46, 'Boccaccesa food and wine festival', '0.00', '2018-10-05', '2018-10-07', 'Food and Drink', 'Bottles,Photographs', '', 'Austin', 'USA', '320145', 'Certaldo in Tuscany, Italiy.', '', '', '', '', '', 30, '', '', '', 1, 0, 0, 0, '', 'Boccaccesca is a yearly food and wine extravaganza, attracting countless visitors to the narrow medieval streets of Certaldo Alto.\r\n\r\nTuscan wines like Chianti Classico or Brunello of Montalcino are legendary and tastings take place during the four days of the festival with renowned sommeliers helping visitors to choose and appreciate.', 'xYxe8eBU.jpg', '', '', '', '2018-09-10', 1, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '15.7', 8, 0, '9:00 pm', '1:00 am'),
(30, 0, 7, 'Brussels comic strip festival', '0.00', '2018-09-14', '2018-09-16', 'Arts and Theatre', 'Embroidery,Woodworking,Teddy bears', '', 'San Diego', 'UK', '032145', 'Parc de Bruxelles and BOZAR (Rue Ravenstein 23) Brussels, Belgium', '', '', '', '', '', 4, '', '', '', 0, 0, 0, 0, '', 'A must-do for all fans of comic strips, this festival in Brussels is for all: experts and amateurs, young and old.\r\n\r\nThis is something for anyone who is curious about the art.\r\n\r\nIt has recently expanded to two locales (just across from each other) in the downtown area.\r\n\r\nThis playground of vivid images and stories promises plenty of activities, autograph-signing opportunities, workshops and exhibits.\r\n\r\n', 'jK4ggs2u.jpg', '', '', '', '2018-09-11', 3, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '22', 10, 0, '12:00 pm', '2:00 pm'),
(31, 0, 51, 'Fiesta del marisco – seafood festival', '0.00', '2018-10-04', '2018-10-14', 'Food and Drink', 'Dominoes,Dominoes,Gatka', '', 'Phoenix', 'UK', '302144', 'O Grove, Galicia, Spain uk', '', '', '', '', '', 64, '', '', '', 1, 0, 2, 0, '', 'This cultural-gastronomic festival has been held annually in October since 1963.\r\n\r\nIt’s a cultural event aimed at promoting the two mainstays of the town’s economy: fishing and tourism.\r\n\r\nSince early days, it’s had the nickname of “Seafood Paradise”.\r\n\r\nPeople come from far and wide to enjoy this festival with over 200,000 festival visitors expected.', 'ETKCzgs8.jpg', '', '', '', '2018-09-11', 1, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '10', 10, 2, '9:00 am', '2:00 pm'),
(32, 0, 62, 'Festival internacional de benicÀssim', '0.00', '2018-09-12', '2018-09-12', 'Music and Nightlife', 'Alternative Music,Matball', '', 'New York', 'UK', '0312323', 'Benicassim, Castellon, Spain', '', '', '', '', '', 0, '', '', '', 0, 0, 0, 0, '', 'Nestled in the heart of the Castellon region, some 250 km south of Barcelona and quite close to Valencia, Benicassim city is hosting this amazing festival since 1995.\r\n\r\nNow with experience of over 20 years of an organisation, Festival Internacional de Benicàssim keeps getting better and better\r\n\r\nThe best showcase of alternative, indie, electronic and rock music and a focus on European music trends.\r\n\r\nA great festival with beautiful surroundings on Spain’s Costa del Azahar.', '', '', '', '', '2018-09-12', 3, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '10', 3, 0, '9:00 am', '9:00 am'),
(33, 0, 44, 'Fun festival', '0.00', '2018-09-12', '2018-09-20', 'Culture', 'Crochet,Checkers,Dancing', '', 'Select City', 'India', '423101', 'Nashik', '', '', '', '', '', 2, '', '', '', 0, 0, 0, 0, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'VgPsm34Q.jpg', '', '', '', '2018-09-12', 3, '', '', '', '', '', '', '', '', '', '', '', 0, 'Ticket Title', 'Ticket Description', '45', 50, 0, '9:00 am', '9:00 am'),
(34, 0, 51, 'Sdkgjshkjgdgn', '0.00', '2018-09-12', '2018-09-12', 'Family and Kids', 'Dollhouses,Embroidery', '', 'Los Angeles', 'UK', '032121', 'Uk los angeles', '', '', '', '', '', 0, '', '', '', 0, 0, 0, 0, '', 'Guhgiughgiug ffighegiughegeiugeg   fhegiejghegehgie  feheughgsiuhsihsgs igrjhrhojhhkhr  jgg', '', '', '', '', '2018-09-12', 3, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 1, '9:00 am', '12:00 pm'),
(35, 0, 51, 'Medieval christmas market ', '0.00', '2018-12-15', '2018-12-16', 'Culture', 'Sudoku,Role-playing games', '', 'Houston', 'USA', '035456', 'Provins, France', '', '', '', '', '', 1, '', '', '', 0, 0, 0, 0, '', 'The magic of Christmas lightens up the medieval city of Provins (Paris region) every year one weekend in December.\r\n\r\nIf you know a little about the lovely town Provins, you can imagine how marvelous a Christmas Market would be in those medieval surroundings.\r\n\r\nThis is what’s unique about this Christmas medieval market; originality of Provins with a mix of medieval animations and traditional Christmas activities.\r\n\r\n', '', '', '', '', '2018-09-12', 3, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '12.10', 5, 1, '5:00 pm', '9:00 pm'),
(36, 0, 71, 'Carnival in cadiz', '0.00', '2018-09-19', '2018-09-19', 'Culture', 'Folk,Museum', '', 'San Diego', 'UK', '214562', 'San Diego', '', '', '', '', '', 7, '', '', '', 0, 0, 1, 0, '', 'Cadiz, the big city on Andalucia´s Atlantic coast, can proudly claim to have the oldest carnival celebrations on mainland Spain.\r\n\r\nDating back to the 16th century and influenced by the carnival in Venice, a trading partner of Cadiz at the time.\r\n\r\nCarnival Cadiz festival rivals Rio in its riot of colors, floats, processions, fireworks and other entertainment.', 'tYZGz4FQ.jpg', '', '', '', '2018-09-19', 3, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '13.07', 4, 2, '9:00 am', '9:00 am'),
(37, 0, 71, 'Fira del vi – wine festival', '0.00', '2018-09-19', '2018-09-20', 'Food and Drink', 'Scrapbooking,Sewing,Woodworking', '', 'Phoenix', 'UK', '246561', 'UK phoenix', '', '', '', '', '', 16, '', '', '', 2, 1, 1, 0, '', 'At this three-day festival, Fira del Vi, you’ll be introduced to the wine culture of this region.\r\n\r\nIt’s an area that has long been associated with the craftsmanship of producing wine by hand.\r\n\r\nWine tasting is the order of the day and you’ll have many chances to talk to the producers.\r\n\r\nIt wouldn’t be a festival without fabulous food and great music to accompany all the tastings.\r\n\r\nSome events take place in interesting and historically rich locations, such as the former lead mine, Bellmunt del Priorat Mines and Museum.\r\n\r\nThe international reputation of the wine attracts an international audience', 'tCQdZ8p9.jpg', '', '', '', '2018-09-19', 4, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '20.00', 3, 2, '9:00 am', '9:00 am'),
(38, 0, 34, 'Amsterdam light festival', '0.00', '2018-09-20', '2018-09-21', 'Family and Kids', 'Doll houses,Embroidery', '', 'Houston', 'Uk', '031433', 'Uk 123 street', '', '', '', '', '', 11, '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '2018-09-20', 1, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 1, '9:00 am', '1:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `fc_flyers_review`
--

CREATE TABLE `fc_flyers_review` (
  `reviewId` int(11) NOT NULL,
  `flyerId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `images` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `rating` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1:approve;2:pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_flyers_review`
--

INSERT INTO `fc_flyers_review` (`reviewId`, `flyerId`, `userId`, `name`, `email`, `description`, `images`, `date`, `rating`, `status`) VALUES
(1, 1, 4, '', '', '', '', '2018-07-31', '3', 0),
(2, 1, 4, '', '', '', '', '2018-07-31', '1', 0),
(3, 2, 0, '', '', 'Awsome Place ....!!!!', '', '2018-07-31', '3', 0),
(4, 2, 0, '', '', 'best.....', '', '2018-07-31', '4', 0),
(5, 2, 0, '', '', '', '', '2018-07-31', '4', 0),
(6, 2, 0, '', '', '', '', '2018-07-31', '4', 0),
(7, 2, 0, '', '', '', '', '2018-07-31', '4', 0),
(8, 4, 0, '', '', '', '', '2018-07-31', '2', 0),
(9, 6, 5, '', '', 'greate', '', '2018-08-01', '1', 0),
(10, 7, 5, '', '', 'superb', '', '2018-08-01', '1', 0),
(11, 4, 5, '', '', 'suepr', '', '2018-08-02', '2', 0),
(12, 5, 5, '', '', 'greate', '', '2018-08-02', '1', 0),
(13, 2, 5, '', '', 'Nice', '', '2018-08-02', '1', 0),
(14, 7, 6, '', '', 'Awesome !!!!!', '', '2018-08-02', '3', 0),
(15, 11, 5, '', '', 'Ossam', '', '2018-08-02', '4', 0),
(16, 15, 24, '', '', 'Ossam', '', '2018-08-17', '5', 0),
(17, 17, 34, '', '', 'Good to attand', '', '2018-09-05', '4', 0),
(18, 17, 22, '', '', 'Super', '', '2018-09-05', '', 0),
(19, 21, 22, '', '', 'Super', '', '2018-09-06', '', 0),
(20, 18, 46, '', '', 'Ossam', '', '2018-09-06', '', 0),
(21, 21, 46, '', '', 'Super\r\n', '', '2018-09-06', '', 0),
(22, 6, 22, '', '', 'It was great event', '', '2018-09-06', '', 0),
(23, 21, 24, '', '', 'Yes I like it.', '', '2018-09-06', '4', 0),
(24, 22, 46, '', '', 'Good', '', '2018-09-06', '', 0),
(25, 22, 34, '', '', 'Cool', '', '2018-09-06', '4', 0),
(26, 21, 44, '', '', 'Superb', '', '2018-09-06', '5', 0),
(27, 20, 46, '', '', 'Great event', '', '2018-09-06', '', 0),
(28, 15, 46, '', '', 'Super event', '', '2018-09-06', '2', 0),
(29, 16, 46, '', '', 'Great', '', '2018-09-06', '1', 0),
(30, 5, 24, '', '', 'Super event', '', '2018-09-06', '1', 0),
(31, 5, 22, '', '', 'Nice ', '', '2018-09-06', '', 0),
(32, 18, 22, '', '', 'Great event', '', '2018-09-07', '1', 0),
(33, 22, 50, '', '', 'Great event', '', '2018-09-07', '2', 0),
(34, 19, 46, '', '', 'Top Rated', '', '2018-09-07', '5', 0),
(35, 23, 51, '', '', 'Done', '', '2018-09-07', '1', 0),
(36, 23, 34, '', '', 'nice flyer', '', '2018-09-07', '4', 0),
(37, 16, 44, '', '', 'Fine', '', '2018-09-07', '3', 0),
(38, 16, 51, '', '', 'great', '', '2018-09-07', '1', 0),
(39, 23, 34, '', '', 'nice flyer', '', '2018-09-07', '4', 0),
(40, 16, 34, '', '', 'Great to know\r\n', '', '2018-09-07', '4', 0),
(41, 25, 51, '', '', 'Great event', '', '2018-09-10', '1', 0),
(42, 19, 50, '', '', 'Good', '', '2018-09-12', '2', 0),
(43, 6, 51, '', '', 'Super', '', '2018-09-17', '2', 0),
(44, 36, 46, '', '', 'Great evet', '', '2018-09-19', '2', 0),
(45, 37, 46, '', '', 'super', '', '2018-09-19', '2', 0),
(46, 29, 72, '', '', 'Wow', '', '2018-09-19', '3', 0),
(47, 18, 51, '', '', 'Super event', '', '2018-09-19', '2', 0),
(48, 38, 51, '', '', 'Super event', '', '2018-09-21', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fc_flyer_category`
--

CREATE TABLE `fc_flyer_category` (
  `categoryId` smallint(6) NOT NULL,
  `categoryTitle` varchar(255) NOT NULL,
  `categoriesImages` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_flyer_category`
--

INSERT INTO `fc_flyer_category` (`categoryId`, `categoryTitle`, `categoriesImages`, `status`) VALUES
(2, 'Music and Nightlife', 'xzx.jpg', 1),
(3, 'Family and Kids', 'profile-bg.jpg', 1),
(5, 'Food and Drink', '', 1),
(6, 'Arts and Theatre', '', 1),
(7, 'Culture', '', 1),
(8, 'Shopping and Deals', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fc_funcies`
--

CREATE TABLE `fc_funcies` (
  `funciesId` int(11) NOT NULL,
  `funciesName` varchar(255) NOT NULL,
  `viewCount` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_funcies`
--

INSERT INTO `fc_funcies` (`funciesId`, `funciesName`, `viewCount`) VALUES
(1, 'Blacksmithing', 1),
(2, 'Crochet', 8),
(3, 'Doll making', 6),
(4, 'Doll houses', 17),
(5, 'Drawing', 136),
(6, 'Embroidery', 132),
(7, 'Enamels', 1),
(8, 'Knitting', 1),
(9, 'Miniature figures', 1),
(10, 'Origami', 1),
(11, 'Painting', 1),
(12, 'Pottery', 1),
(13, 'Quilting', 1),
(14, 'Scrapbooking', 17),
(15, 'Sculpture', 1),
(16, 'Sewing', 18),
(17, 'Stained glass', 1),
(18, 'Stamping', 1),
(19, 'Warm glass', 85),
(20, 'Weaving', 1),
(21, 'Wood carving', 4),
(22, 'Woodworking', 152),
(23, 'Figure painting ', 1),
(24, 'Tole painting', 63),
(25, 'Watercolor', 1),
(26, 'Arimaa', 1),
(27, 'Checkers', 3),
(28, 'Chess', 1),
(29, 'Chinese Checkers', 68),
(30, 'Diplomacy', 1),
(31, 'Domino', 1),
(32, 'Draughts', 1),
(33, 'Go', 63),
(34, 'Go-Moku', 1),
(35, 'Jacquet', 60),
(36, 'Losing chess', 1),
(37, 'Mahjong', 1),
(38, 'Mancala', 1),
(39, 'Monopoly', 1),
(40, 'Pente', 1),
(41, 'Risk', 1),
(42, 'Rummikub', 1),
(43, 'SholGuti', 1),
(44, 'Sogo(Score four)', 1),
(45, 'Stratego', 1),
(46, 'Sudoku', 2),
(47, 'Tournament Scrabble', 49),
(48, 'Xiangqi(Chinese chess)', 1),
(49, 'Miniatures', 55),
(50, 'Bridge', 1),
(51, 'Dominoes', 121),
(52, 'Gin rummy', 1),
(53, 'Poker', 1),
(54, 'Role-playing games', 2),
(55, 'Casino', 271),
(56, 'Blackjack', 1),
(57, 'Wargaming', 1),
(58, 'Antiques', 1),
(59, 'Artwork', 1),
(60, 'Autographs', 1),
(61, 'Beer Cans', 129),
(62, 'Books', 27),
(63, 'Bottle caps', 1),
(64, 'Bottles', 31),
(65, 'Calendars', 1),
(66, 'Candlesticks', 1),
(67, 'Christmas accessories', 1),
(68, 'Classic videogames', 1),
(69, 'Clocks', 1),
(70, 'Coins', 1),
(71, 'Collecting fossils', 1),
(72, 'Collecting Rocks and Minerals', 1),
(73, 'Comic books', 72),
(74, 'Conifer cones', 1),
(75, 'Currency', 1),
(76, 'Dice', 1),
(77, 'Dumpster diving', 1),
(78, 'Enamels', 1),
(79, 'Found objects', 34),
(80, 'Hats', 101),
(81, 'Keychains', 1),
(82, 'Lighters', 1),
(83, 'Lunchboxes', 1),
(84, 'Microchips', 1),
(85, 'Miniature models', 1),
(86, 'Patches', 1),
(87, 'Phillumenism, i.e. collecting matchbooks and matchboxes', 1),
(88, 'Photographs', 31),
(89, 'Poker Chips', 1),
(90, 'Postcards', 1),
(91, 'Posters', 108),
(92, 'Quotes', 1),
(93, 'Records', 1),
(94, 'Scale models', 1),
(95, 'Scissors', 1),
(96, 'Shopping lists', 109),
(97, 'Shot glasses', 105),
(98, 'Souvenirs', 1),
(99, 'Spoons', 1),
(100, 'Stamps', 1),
(101, 'Swords', 1),
(102, 'Teddy bears', 5),
(103, 'Thimbles', 1),
(104, 'Trading cards such as baseball cards', 1),
(105, 'Wine labels', 1),
(106, 'Yardsticks', 1),
(107, '3D computer graphics design', 1),
(108, 'Animation design', 1),
(109, 'Computer games', 102),
(110, 'Computer programming', 1),
(111, 'Video games', 68),
(112, 'Open source and the free software movement', 1),
(113, 'Operating systems', 1),
(114, 'Photoshopping', 67),
(115, 'Retrocomputing', 1),
(116, 'Baking', 1),
(117, 'Cake Making', 63),
(118, 'Cookery', 1),
(119, 'Cooking ', 1),
(120, 'Sweet Making', 1),
(121, 'Electrics', 1),
(122, 'Home Repiars', 55),
(123, 'Plumbing', 1),
(124, 'Combat robot', 1),
(125, 'Contesting', 1),
(126, 'eSports', 1),
(127, 'Gaming(eSports)', 1),
(128, 'Geo caching', 1),
(129, 'Radio-control vehicles', 1),
(130, 'Amateur radiand CB radio', 1),
(131, 'Designing and building electronic circuits', 58),
(132, 'Hardware hacking', 1),
(133, 'Robots', 1),
(134, 'Animation', 1),
(135, 'Cartoons', 1),
(136, 'Documentary making', 1),
(137, 'Blogging', 1),
(138, 'BookCrossing', 1),
(139, 'Currency bill tracking', 1),
(140, 'Geocaching a modern day form of treasure hunting', 1),
(141, 'Google Whacking', 1),
(142, 'GPS drawing', 1),
(143, 'Constructed languages (conlanging)', 1),
(144, 'Learning foreign languages', 1),
(145, 'Reading', 1),
(146, 'Writing', 1),
(147, 'Discounts', 1),
(148, 'Backyard railroads', 1),
(149, 'Live steam models', 1),
(150, 'Matchstick models', 1),
(151, 'Military models', 1),
(152, 'Model aircraft civil and military', 1),
(153, 'Model cars, including radio-controlled cars', 1),
(154, 'Model commercial vehicles', 1),
(155, 'Model engineering', 1),
(156, 'Model figures historical and military', 1),
(157, 'Model houses', 58),
(158, 'Model military vehicles including armored vehicles', 1),
(159, 'Model nations', 1),
(160, 'Model railways/railroads', 1),
(161, 'Model rockets', 1),
(162, 'Model ships civil and military', 1),
(163, 'Antique cars', 1),
(164, 'Car washing', 1),
(165, 'Cars', 1),
(166, 'Kit cars', 1),
(167, 'Motorcycles', 1),
(168, 'Off-roading', 1),
(169, 'Trucks', 1),
(170, 'Alternative Music', 174),
(171, 'Blues', 1),
(172, 'Classical Music', 18),
(173, 'Country Music', 1),
(174, 'Dance Music', 183),
(175, 'Easy Listening', 1),
(176, 'Electronic Music', 47),
(177, 'European Music (Folk / Pop)', 114),
(178, 'Indie Pop', 65),
(179, 'Inspirational ', 1),
(180, 'Jazz', 20),
(181, 'Latin Music', 1),
(182, 'New Age', 1),
(183, 'Opera', 1),
(184, 'Pop ', 1),
(185, 'R&B / Soul', 1),
(186, 'Reggae', 1),
(187, 'Rock', 1),
(188, 'Singer / Songwriter ', 1),
(189, 'World Music / Beats', 1),
(190, 'Band', 1),
(191, 'Blues', 1),
(192, 'Classsical', 1),
(193, 'Country', 1),
(194, 'Folk', 8),
(195, 'Gospel', 1),
(196, 'Guitar', 1),
(197, 'Hip-Hop ', 1),
(198, 'J-Pop', 1),
(199, 'K-Pop', 1),
(200, 'Orchestra', 1),
(201, 'Piano', 1),
(202, 'Pop', 1),
(203, 'Reggaeton', 1),
(204, 'Rock', 1),
(205, 'Spotting', 1),
(206, 'Aircraft spotting', 1),
(207, 'Amateur Astronomy', 1),
(208, 'Bus spotting', 1),
(209, 'Geyser Gazing', 1),
(210, 'Metrophilia', 1),
(211, 'Train spotting', 1),
(212, 'Transport spotting', 1),
(213, 'Airsoft', 1),
(214, 'Backpacking', 1),
(215, 'Birdfeeding', 1),
(216, 'Birding', 1),
(217, 'Birdwatching', 1),
(218, 'Butterfly watching', 1),
(219, 'Camping', 1),
(220, 'Caving', 1),
(221, 'Gardening', 1),
(222, 'Geocaching', 1),
(223, 'Go-karts', 1),
(224, 'Kite flying', 1),
(225, 'Laser tag', 1),
(226, 'Mountain climbing', 1),
(227, 'Paintball', 1),
(228, 'Rafting', 1),
(229, 'Rock climbing', 1),
(230, 'Rockhounding ', 1),
(231, 'Skiing', 1),
(232, 'Stone skipping', 1),
(233, 'Walking', 1),
(234, 'Amateur theater', 1),
(235, 'Circus', 1),
(236, 'Dancing', 16),
(237, 'Drama', 1),
(238, 'Magic tricks', 1),
(239, 'Singing', 1),
(240, 'Drones', 1),
(241, 'Drone Photography', 1),
(242, 'Photography', 1),
(243, 'Car boot sale', 1),
(244, 'Cathedral', 1),
(245, 'Church', 1),
(246, 'Forest', 1),
(247, 'History', 1),
(248, 'Museum', 8),
(249, 'Parks', 1),
(250, 'Rides', 1),
(251, 'Shopping ', 1),
(252, 'Theme parks', 1),
(253, 'Woods', 1),
(254, 'Crossword puzzles', 1),
(255, 'Jigsaw puzzle', 1),
(256, 'Word seek puzzles', 1),
(257, 'Science', 1),
(258, 'Genealogy', 1),
(259, 'Hagiography', 1),
(260, 'Antique machinery', 1),
(261, 'Car refurbishing', 1),
(262, 'Early computers', 1),
(263, 'Early motorized boats', 1),
(264, 'Houses', 1),
(265, 'Sailboats', 1),
(266, '10K run', 1),
(267, '11-a-side', 1),
(268, '16-inch softball', 1),
(269, '43-Man Squamish', 1),
(270, '5K run', 1),
(271, 'Abseiling', 1),
(272, 'Adventure racing', 1),
(273, 'Aerobatics', 1),
(274, 'Aggressive inline skating', 1),
(275, 'Aid climbing', 1),
(276, 'Aikido', 1),
(277, 'Aiki-j?jutsu', 1),
(278, 'Air hockey', 1),
(279, 'Air racing', 1),
(280, 'Air rifle shooting', 1),
(281, 'Alpine skiing', 1),
(282, 'Amateur wrestling', 1),
(283, 'American football', 1),
(284, 'Angling', 1),
(285, 'Archery', 1),
(286, 'Arm wrestling', 1),
(287, 'Artistic cycling', 1),
(288, 'Artistic roller skating', 1),
(289, 'Atheltics', 1),
(290, 'Australian football', 1),
(291, 'Autocross(aka Slalom)', 1),
(292, 'Autograss', 1),
(293, 'AutRace', 1),
(294, 'Axe throwing', 1),
(295, 'Backgammon', 1),
(296, 'Badminton', 1),
(297, 'Bagatelle', 1),
(298, 'Baguazhang', 1),
(299, 'Ball badminton', 1),
(300, 'Ballooning', 1),
(301, 'Bando', 1),
(302, 'Banger racing', 1),
(303, 'Banzai skydiving', 1),
(304, 'Bar billiards', 1),
(305, 'Barrel racing', 1),
(306, 'Bartitsu', 1),
(307, 'BASE jumping', 1),
(308, 'Baseball', 1),
(309, 'Basketball', 1),
(310, 'Basque pelota', 1),
(311, 'Bat and trap', 1),
(312, 'Baton twirling', 1),
(313, 'Batt?jutsu', 1),
(314, 'Beach basketball', 1),
(315, 'Beach tennis', 1),
(316, 'Beach ultimate', 47),
(317, 'Beach volleyball', 1),
(318, 'Beer Pong', 1),
(319, 'Benchrest shooting', 1),
(320, 'Biathlon', 1),
(321, 'Big-game fishing', 1),
(322, 'Billards', 1),
(323, 'Biribol', 1),
(324, 'BMX', 1),
(325, 'Board track racing', 1),
(326, 'Boardercross', 1),
(327, 'Bobsleigh', 1),
(328, 'Bocce', 1),
(329, 'Bocce volo', 1),
(330, 'Boccia', 1),
(331, 'Bodyboarding', 1),
(332, 'Boffer fighting', 1),
(333, 'Bokator', 1),
(334, 'Bolas criollas', 1),
(335, 'Boli Khela', 1),
(336, 'Bossaball', 1),
(337, 'Bouldering', 1),
(338, 'Boules', 1),
(339, 'Bowling', 1),
(340, 'Bowls', 1),
(341, 'Bowlsa.k.a. lawn bowls', 1),
(342, 'Boxing', 1),
(343, 'BrÃ¤nnboll', 1),
(344, 'Brazilian Jiu-Jitsu', 1),
(345, 'British baseball', 1),
(346, 'Broomball', 1),
(347, 'Bujinkan', 1),
(348, 'Bumper pool', 1),
(349, 'Buzkashi', 1),
(350, 'Calva', 1),
(351, 'Calvinball', 1),
(352, 'Campdrafting', 1),
(353, 'Canoeing ', 1),
(354, 'Canyoning(Canyoneering)', 1),
(355, 'Capoeira', 1),
(356, 'Casterboarding', 1),
(357, 'Casting', 1),
(358, 'Catch wrestling', 1),
(359, 'Cestoball', 1),
(360, 'Charreada', 1),
(361, 'Chilean rodeo', 1),
(362, 'Choi Kwang-Do', 1),
(363, 'Cirit', 1),
(364, 'Clay pigeon shooting', 1),
(365, 'Cliff diving', 58),
(366, 'Cluster ballooning', 1),
(367, 'Coasteering', 1),
(368, 'Collar-and-elbow', 1),
(369, 'Connect Four', 1),
(370, 'Corkball', 1),
(371, 'Cornhole', 1),
(372, 'Cornish Wrestling', 1),
(373, 'Cowboy action shooting', 1),
(374, 'Cricket', 1),
(375, 'Croquet', 1),
(376, 'Cross country', 1),
(377, 'Cross-country mountain biking', 1),
(378, 'Cross-country rally', 1),
(379, 'Cross-country running', 1),
(380, 'Cross-country skiing', 1),
(381, 'Cue sports', 1),
(382, 'Curling', 1),
(383, 'Cutting', 1),
(384, 'Cycle polo', 1),
(385, 'Cycle speedway', 1),
(386, 'Cycling', 1),
(387, 'Cyclo-cross', 1),
(388, 'Danish longball', 1),
(389, 'Darts', 1),
(390, 'Deaf basketball', 1),
(391, 'Decathlon', 1),
(392, 'Deep-water soloing', 1),
(393, 'Demolition derby', 1),
(394, 'Desert racing', 1),
(395, 'Dinghy sailing', 1),
(396, 'Dirt jumping', 1),
(397, 'Dirt track racing', 1),
(398, 'Disc dog', 1),
(399, 'Disc golf', 1),
(400, 'Disc golf (urban)', 1),
(401, 'Discus', 1),
(402, 'Diving', 1),
(403, 'Dodge disc', 1),
(404, 'Dominoes', 121),
(405, 'Double disc court', 1),
(406, 'Downhill mountain biking', 1),
(407, 'Drag boat racing', 1),
(408, 'Drag racing', 1),
(409, 'Dragon boat racing', 1),
(410, 'Draughts(aka checkers)', 1),
(411, 'Dressage', 1),
(412, 'Drifting', 1),
(413, 'Drone racing', 1),
(414, 'Duathlon', 1),
(415, 'Dumog', 1),
(416, 'Egyptian stick fencing', 1),
(417, 'Endurance', 1),
(418, 'Endurance racing', 1),
(419, 'Endurance riding', 1),
(420, 'Enduro', 1),
(421, 'English pleasure', 1),
(422, 'Equestrian vaulting', 1),
(423, 'Equitation', 1),
(424, 'Eskrima', 72),
(425, 'Eventing', 1),
(426, 'F1 powerboat racing', 1),
(427, 'Fastnet', 1),
(428, 'Fast-pitch softball', 1),
(429, 'Fencing', 1),
(430, 'Field archery', 1),
(431, 'Field target', 1),
(432, 'Figure skating', 1),
(433, 'Fistball', 1),
(434, 'Fives', 1),
(435, 'Flight archery', 1),
(436, 'Flutterguts', 1),
(437, 'Fly fishing', 1),
(438, 'Folk wrestling', 1),
(439, 'Folkrace', 1),
(440, 'Footbag net', 1),
(441, 'Football', 73),
(442, 'Football tennis', 1),
(443, 'Footvolley', 1),
(444, 'Formula Libre', 1),
(445, 'Formula racing', 1),
(446, 'Formula Student', 1),
(447, 'Free running', 1),
(448, 'Freeboard (skateboard)', 1),
(449, 'Freediving', 1),
(450, 'Freesbie', 1),
(451, 'Freestyle', 1),
(452, 'Freestyle BMX', 1),
(453, 'Freestyle competition', 1),
(454, 'Freestyle footbag', 1),
(455, 'Freestyle football', 1),
(456, 'Free-style moto', 1),
(457, 'Freestyle motocross', 1),
(458, 'Freestyle skiing', 1),
(459, 'Freestyle slalom skating', 1),
(460, 'Freestyle snowboarding', 1),
(461, 'Freestyle wrestling', 1),
(462, 'Frontenis', 1),
(463, 'Fujian White Crane', 1),
(464, 'Fullbore target rifle', 1),
(465, 'Galeic football', 1),
(466, 'Gatka', 68),
(467, 'Gliding', 1),
(468, 'Glima', 1),
(469, 'Goaltimate', 1),
(470, 'Golf', 1),
(471, 'Gouren', 1),
(472, 'Grand Prix motorcycle racing', 1),
(473, 'Grasstrack', 1),
(474, 'Greco-Roman wrestling', 1),
(475, 'Greek wrestling', 1),
(476, 'Gungdo', 1),
(477, 'Guts', 1),
(478, 'Guyball', 1),
(479, 'Gymkhana', 1),
(480, 'Gymnastics', 1),
(481, 'Half marathon', 1),
(482, 'Hammer throw', 1),
(483, 'Handball', 1),
(484, 'Hang gliding', 1),
(485, 'Hapkido', 1),
(486, 'Hardball squash', 1),
(487, 'Hardcourt Bike Polo', 1),
(488, 'Harness racing', 1),
(489, 'Headis', 1),
(490, 'Heptathlon', 1),
(491, 'High jump', 1),
(492, 'High power rifle', 1),
(493, 'Hiking', 1),
(494, 'Hillclimbing', 1),
(495, 'Hockey', 1),
(496, 'Hoj?jutsu', 1),
(497, 'Hooverball', 1),
(498, 'Hopper ballooning', 1),
(499, 'Horse racing', 1),
(500, 'Horseball', 1),
(501, 'Horseshoes(horseshoe throwing)', 1),
(502, 'Hot Air Balloon Racing', 1),
(503, 'Hot box', 1),
(504, 'Human powered aircraft', 1),
(505, 'Hunter', 1),
(506, 'Hunter-jumpers', 1),
(507, 'Hunting', 1),
(508, 'Hurdles', 1),
(509, 'Hwa Rang Do', 1),
(510, 'Hydroplane racing', 1),
(511, 'Iaid?', 1),
(512, 'Iaijutsu', 1),
(513, 'Ice climbing', 1),
(514, 'Ice dancing', 1),
(515, 'Ice fishing', 1),
(516, 'Ice hockey', 1),
(517, 'Ice racing', 1),
(518, 'Ice skating', 1),
(519, 'Ice speedway', 1),
(520, 'Ice yachting', 1),
(521, 'Icosathlon', 1),
(522, 'Indoor archery', 1),
(523, 'Indoor cricket', 1),
(524, 'Indoor enduro', 1),
(525, 'Indoor netball', 1),
(526, 'Inline speed skating', 1),
(527, 'Janggi', 1),
(528, 'Javelin', 1),
(529, 'Jeet Kune Do', 1),
(530, 'Jet sprint boat racing', 1),
(531, 'Jeu provenÃ§al(boule lyonnaise)', 1),
(532, 'J?d?', 1),
(533, 'Jogdpau', 1),
(534, 'Jousting', 1),
(535, 'Judo', 1),
(536, 'Jujutsu', 1),
(537, 'J?kend?', 1),
(538, 'Jumping', 1),
(539, 'Juttejutsu', 1),
(540, 'Kajukenbo', 1),
(541, 'Kalarippayattu', 1),
(542, 'Karate', 1),
(543, 'Kart racing', 1),
(544, 'Kayaking', 1),
(545, 'Kendo', 1),
(546, 'Kenjutsu', 1),
(547, 'Kenp?', 1),
(548, 'Kickball', 1),
(549, 'Kickboxing', 1),
(550, 'Kilikiti', 1),
(551, 'Kite buggy', 1),
(552, 'Kite fighting', 1),
(553, 'Kite flying', 1),
(554, 'Kite landboarding', 1),
(555, 'Kiteboarding', 1),
(556, 'Kitesurfing', 1),
(557, 'Kneeboarding', 1),
(558, 'Korfball', 1),
(559, 'Krabi-krabong', 1),
(560, 'Krav Maga', 1),
(561, 'Kubb', 1),
(562, 'Kuk Sool Won', 1),
(563, 'Kumdo', 1),
(564, 'Kung fu', 1),
(565, 'Kurash', 1),
(566, 'Ky?d?', 1),
(567, 'Ky?jutsu', 1),
(568, 'Lacrosse', 1),
(569, 'Lancashire wrestling', 1),
(570, 'Land sailing', 1),
(571, 'Land speed records', 1),
(572, 'Land windsurfing', 1),
(573, 'Laptaâ€“ twsalos (bases)', 1),
(574, 'Legends car racing', 1),
(575, 'Lethwei', 1),
(576, 'Limited overs cricket', 1),
(577, 'Long jump', 1),
(578, 'Longboarding', 1),
(579, 'Luge', 1),
(580, 'Mahjong(aka Taipei)', 1),
(581, 'Malla-yuddha', 1),
(582, 'Marathon', 1),
(583, 'Matball', 1),
(584, 'Matkot', 1),
(585, 'MCMAP', 1),
(586, 'Metallic silhouette', 1),
(587, 'Metallic silhouette shooting', 1),
(588, 'Midget car racing', 1),
(589, 'Mixed climbing', 1),
(590, 'Mixed martial arts', 1),
(591, 'Model aircraft', 1),
(592, 'Model car racing', 1),
(593, 'Modern Arnis', 1),
(594, 'Modern pentathlon', 1),
(595, 'Mongolian wrestling', 1),
(596, 'Monster truck', 1),
(597, 'Motocross', 1),
(598, 'Motorcycle drag racing', 1),
(599, 'Motorcycle speedway', 1),
(600, 'Mountain biking', 1),
(601, 'Mountain unicycling', 1),
(602, 'Mountainboarding', 1),
(603, 'Mountaineering', 1),
(604, 'Muay Thai', 1),
(605, 'Mud bogging', 1),
(606, 'Naginatajutsu', 1),
(607, 'Netball', 1),
(608, 'Nguni stick-fighting', 1),
(609, 'Ninjutsu', 1),
(610, 'Noodling', 1),
(611, 'Nordic combined', 1),
(612, 'Nordic skiing', 1),
(613, 'Northern Praying Mantis', 1),
(614, 'Novuss', 1),
(615, 'Off-road racing', 1),
(616, 'Off-roading', 1),
(617, 'Offshore powerboat racing', 1),
(618, 'Oina', 1),
(619, 'Okinawan kobud?', 1),
(620, 'Old catâ€“ variable', 1),
(621, 'Olympic weightlifting', 1),
(622, 'One Day International', 1),
(623, 'Orienteering', 1),
(624, 'Over-the-lineâ€“ qv', 1),
(625, 'Padel', 1),
(626, 'Palant', 1),
(627, 'Paleta FrontÃ³n', 1),
(628, 'Pall mall', 1),
(629, 'Pankration', 1),
(630, 'Parachuting', 1),
(631, 'Paragliding', 1),
(632, 'Paralympic volleyball', 1),
(633, 'Paramotoring', 1),
(634, 'Parasailing', 1),
(635, 'Parkour', 1),
(636, 'Pato', 1),
(637, 'Pehlwani', 1),
(638, 'Pelota mixteca', 1),
(639, 'Pencak Silat', 1),
(640, 'Pentathlon', 1),
(641, 'Personal water craft', 1),
(642, 'PesÃ¤palloâ€“ four bases', 1),
(643, 'PÃ©tanque', 1),
(644, 'Peteca', 1),
(645, 'Pickleball', 1),
(646, 'Pickup truck racing', 1),
(647, 'Pilota', 1),
(648, 'Pitch and putt', 1),
(649, 'Platform tennis', 1),
(650, 'Pole climbing', 1),
(651, 'Pole vault', 1),
(652, 'Polo', 1),
(653, 'Polocrosse', 1),
(654, 'Pool', 1),
(655, 'Popinjay', 1),
(656, 'Powerbocking', 1),
(657, 'Powered hang glider', 1),
(658, 'Powered paragliding', 1),
(659, 'Powerlifting', 1),
(660, 'Practical shooting', 1),
(661, 'Pradal serey', 1),
(662, 'Production car racing', 1),
(663, 'Professional wrestling', 1),
(664, 'Punchball', 1),
(665, 'Qianball', 1),
(666, 'Quidditch (Harry Potter)', 1),
(667, 'Race of Champions', 1),
(668, 'Racewalking', 1),
(669, 'Racketlon', 1),
(670, 'Racquetball', 1),
(671, 'Racquets', 1),
(672, 'Rafting', 1),
(673, 'Rally raid', 1),
(674, 'Rallycross', 1),
(675, 'Rallying', 1),
(676, 'Real tennis', 1),
(677, 'Regularity rally', 1),
(678, 'Reining', 1),
(679, 'Reversi(aka Othello)', 1),
(680, 'Ringball', 1),
(681, 'Ringette', 1),
(682, 'Ringo', 1),
(683, 'Rink hockey', 1),
(684, 'Rinkball', 1),
(685, 'Riverboarding', 1),
(686, 'Road bicycle racing', 1),
(687, 'Road racing', 1),
(688, 'Road running', 1),
(689, 'Robot combat', 1),
(690, 'Rock climbing', 1),
(691, 'Rock fishing', 1),
(692, 'Rodeo', 1),
(693, 'Roller derby', 1),
(694, 'Roller Hockey', 1),
(695, 'Roller skating', 1),
(696, 'Rope climbing', 1),
(697, 'Roundersâ€“ four bases or posts', 1),
(698, 'Rowing', 1),
(699, 'Rugby', 1),
(700, 'Rugby 7S', 1),
(701, 'Rugby Union', 1),
(702, 'Sailing', 1),
(703, 'Samb(martial art)', 1),
(704, 'San shou', 1),
(705, 'Sandboarding', 1),
(706, 'Sanshou', 1),
(707, 'Savate', 1),
(708, 'Schwingen', 1),
(709, 'Scootering', 1),
(710, 'Scrabble', 1),
(711, 'Scrub baseballâ€“ four bases (not a team gameper se)', 1),
(712, 'SCUBA diving', 1),
(713, 'Sepak takraw', 1),
(714, 'Shaolin kung fu', 1),
(715, 'Shid?kan Karate', 1),
(716, 'Shogi', 1),
(717, 'Shoot boxing', 1),
(718, 'Shootfighting', 1),
(719, 'Shooting', 1),
(720, 'Shorinji Kempo', 1),
(721, 'Sh?rin-ry? Shid?kan', 1),
(722, 'Short track motor racing', 1),
(723, 'Short track speed skating', 1),
(724, 'Shot put', 1),
(725, 'Show jumping', 1),
(726, 'Shuai Jiao', 1),
(727, 'Shuffleboard', 1),
(728, 'Shurikenjutsu', 1),
(729, 'Sikaran', 1),
(730, 'Silambam', 1),
(731, 'Silat', 1),
(732, 'Sipa', 1),
(733, 'Skateboarding', 1),
(734, 'Skater hockey', 1),
(735, 'Skee ball', 1),
(736, 'Skeet shooting', 1),
(737, 'Skeleton', 1),
(738, 'Ski flying', 1),
(739, 'Ski jumping', 1),
(740, 'Ski touring', 1),
(741, 'Skiboarding', 1),
(742, 'Skibob', 1),
(743, 'Skibobbing', 1),
(744, 'Skiing', 1),
(745, 'Skijoring', 1),
(746, 'Skimboarding', 1),
(747, 'Skittles', 1),
(748, 'Skydiving', 1),
(749, 'Skysurfing', 1),
(750, 'Slamball', 1),
(751, 'Slow pitch', 1),
(752, 'Snooker', 1),
(753, 'Snow kiting', 1),
(754, 'Snowboarding', 1),
(755, 'Snowkiting', 1),
(756, 'Snowmobile racing', 1),
(757, 'Snowshoeing', 1),
(758, 'Soccer', 1),
(759, 'Soft tennis', 1),
(760, 'Softball', 1),
(761, 'SÅjutsu', 1),
(762, 'Spearfishing', 1),
(763, 'Speed skating', 1),
(764, 'Speed skiing', 1),
(765, 'Speed-ball', 1),
(766, 'Speedminton', 1),
(767, 'Sport climbing', 1),
(768, 'Sport fishing', 1),
(769, 'Sport kite(Stunt kite)', 1),
(770, 'Sporting clays', 1),
(771, 'Sports car racing', 1),
(772, 'Sprint', 1),
(773, 'Sprint car racing', 1),
(774, 'Sprinting', 1),
(775, 'Squash', 1),
(776, 'Squash tennis', 1),
(777, 'Ssireum', 1),
(778, 'Stand up paddle boarding', 1),
(779, 'Steeplechase', 1),
(780, 'Stickballâ€“ variable', 1),
(781, 'StickÃ©', 1),
(782, 'Stock car racing', 1),
(783, 'Stool ballâ€“ twstools', 1),
(784, 'Street racing', 1),
(785, 'Street workout', 1),
(786, 'Streetball', 1),
(787, 'Streetboarding', 1),
(788, 'Streetluge', 1),
(789, 'Strongman', 1),
(790, 'Subak', 1),
(791, 'Subbuteo', 1),
(792, 'Sumo', 1),
(793, 'Superbike racing', 1),
(794, 'Supercross', 1),
(795, 'Supermoto', 1),
(796, 'Superside', 1),
(797, 'Supersport racing', 1),
(798, 'Surf fishing', 1),
(799, 'Surfing', 1),
(800, 'Swimming', 1),
(801, 'Sword fighting', 1),
(802, 'Synchronized skating', 1),
(803, 'Systema', 1),
(804, 'Table football', 1),
(805, 'Table hockey', 1),
(806, 'Table tennis', 1),
(807, 'Table tennis(aka ping pong)', 1),
(808, 'Taekkyeon', 1),
(809, 'Taekwondo', 1),
(810, 'Tag games', 1),
(811, 'Taido', 1),
(812, 'Tang SoDo', 1),
(813, 'Target archery', 1),
(814, 'Target shooting', 1),
(815, 'Team penning', 1),
(816, 'Tee-ball', 1),
(817, 'Telemark skiing', 1),
(818, 'Tennis', 1),
(819, 'Tent pegging', 1),
(820, 'Test cricket', 1),
(821, 'Tetrathlon', 1),
(822, 'The Massachusetts Gameâ€“ four bases', 1),
(823, 'Throwball', 1),
(824, 'Throwing', 1),
(825, 'Thumb wrestling', 1),
(826, 'Time attack', 1),
(827, 'Toboggan', 1),
(828, 'Toe wrestling', 1),
(829, 'Touring car racing', 1),
(830, 'Tower running', 1),
(831, 'Town ballâ€“ variable', 1),
(832, 'Track cycling', 1),
(833, 'Track racing', 1),
(834, 'Tractor pulling', 1),
(835, 'Traditional climbing', 1),
(836, 'Trap shooting', 1),
(837, 'Trial', 1),
(838, 'Triathlon', 1),
(839, 'Triple jump', 1),
(840, 'Truck racing', 1),
(841, 'Trugo', 1),
(842, 'TT racing', 1),
(843, 'Tug-o-war', 1),
(844, 'Twenty20', 1),
(845, 'Ultimate', 1),
(846, 'Ultralight aviation', 1),
(847, 'Ultramarathon', 1),
(848, 'Underwater cycling', 1),
(849, 'Unicycle basketball', 1),
(850, 'Unicycle hockey', 1),
(851, 'Unicycle trials', 1),
(852, 'Unicycling', 1),
(853, 'Vajra-mushti', 1),
(854, 'Vale tudo', 1),
(855, 'Varzesh-e Pahlavani', 1),
(856, 'Vigoroâ€“ twwickets', 1),
(857, 'Vintage racing', 1),
(858, 'Volleyball', 1),
(859, 'Vovinam', 1),
(860, 'Wakeboarding', 1),
(861, 'Wakesurfing', 1),
(862, 'Wallking', 1),
(863, 'Wallyball', 1),
(864, 'Water basketball', 1),
(865, 'Water sports', 1),
(866, 'Water volleyball', 1),
(867, 'Weightlifting', 1),
(868, 'Western pleasure', 1),
(869, 'Wheelchair basketball', 1),
(870, 'Wheeling', 1),
(871, 'Wheelstand competition', 1),
(872, 'Wiffleball', 1),
(873, 'Windsurfing', 1),
(874, 'Wing Chun', 1),
(875, 'Wingsuit flying', 1),
(876, 'Wireball', 1),
(877, 'Wood chopping', 1),
(878, 'Wood splitting', 1),
(879, 'Woodball', 1),
(880, 'Woodsman', 1),
(881, 'Wrestling', 1),
(882, 'Wushu', 1),
(883, 'Xare', 1),
(884, 'Xiangqi', 1),
(885, 'Xingyiquan', 1),
(886, 'Ya?l? GÃ¼re?', 1),
(887, 'Zourkhaneh', 1),
(888, 'Zui quan', 1),
(889, 'Sales', 1),
(890, 'Athletics', 1),
(891, 'Fictional sports', 1),
(892, 'Climbing', 1),
(893, 'Air sports', 1),
(894, 'Skating', 1),
(895, 'Martial Arts', 1),
(896, 'Table sports', 1),
(897, 'Fishing', 1),
(898, 'Target sports', 1),
(899, 'Strength sports', 1),
(900, 'Olympics', 1),
(901, 'Car racing', 1),
(902, 'Motorcycle racing', 1),
(903, 'Equine sports', 1),
(904, 'Dancing', 16),
(905, 'Flying disc', 1),
(906, 'Snowsports', 1),
(907, 'Board sports', 1),
(908, 'Outdoors', 1),
(909, 'Cricket', 1),
(910, 'Sport', 1),
(911, 'Racing', 1),
(912, 'Street sports', 1),
(913, 'Field Hockey', 1),
(914, 'Windsports', 1),
(915, 'Kite sports', 1),
(916, 'Orienteering', 1),
(917, 'Shopping', 1),
(918, 'Fairs', 1),
(919, 'Running', 1),
(920, 'Fighting', 1),
(921, 'Bikes', 1),
(922, 'Motor sports', 1),
(923, 'Racquet sports', 1),
(924, 'Horses', 1),
(925, 'Kiting', 1),
(926, 'Combat sports', 1),
(927, 'Nature', 1),
(928, 'Racket sports', 1),
(929, 'Riding', 1),
(930, 'Ice sport', 1),
(931, 'Winter sports', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fc_interested`
--

CREATE TABLE `fc_interested` (
  `interestId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `flyerId` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_interested`
--

INSERT INTO `fc_interested` (`interestId`, `userId`, `flyerId`, `status`) VALUES
(1, 5, 6, 0),
(2, 5, 7, 0),
(3, 5, 11, 0),
(4, 5, 2, 0),
(5, 13, 12, 0),
(6, 24, 15, 0),
(7, 22, 17, 0),
(8, 24, 4, 0),
(9, 24, 12, 0),
(10, 44, 18, 0),
(11, 34, 17, 0),
(12, 22, 19, 0),
(13, 50, 16, 0),
(14, 50, 31, 0),
(15, 44, 30, 0),
(16, 34, 31, 0),
(17, 46, 27, 0),
(18, 51, 29, 0),
(19, 46, 36, 0),
(20, 64, 37, 0),
(21, 46, 37, 0),
(22, 72, 29, 0),
(23, 51, 38, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fc_masterfuncies`
--

CREATE TABLE `fc_masterfuncies` (
  `funcyId` mediumint(8) UNSIGNED NOT NULL,
  `funcyText` varchar(255) NOT NULL,
  `searchCount` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fc_organizer`
--

CREATE TABLE `fc_organizer` (
  `organizerId` int(11) NOT NULL,
  `orgFirstName` varchar(255) NOT NULL,
  `orgLastName` varchar(255) NOT NULL,
  `orgEmail` varchar(255) NOT NULL,
  `orgContact` varchar(15) NOT NULL,
  `orgAltContact` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `city` varchar(50) NOT NULL,
  `orgAddress` varchar(255) NOT NULL,
  `orgZip` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0:Inactive, 1:Active',
  `profileImage` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `aboutMe` varchar(255) NOT NULL,
  `searchDistance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_organizer`
--

INSERT INTO `fc_organizer` (`organizerId`, `orgFirstName`, `orgLastName`, `orgEmail`, `orgContact`, `orgAltContact`, `password`, `city`, `orgAddress`, `orgZip`, `status`, `profileImage`, `gender`, `aboutMe`, `searchDistance`) VALUES
(1, 'Rahul ', 'Jamadar', 'tester@ns.com', '9856231478', '895623147', 'organizer.789', 'nashik', 'abwshdbjhasdabsd', '422007', 0, '48KgattG.jpg', '', '', 0),
(4, 'Organizer', 'Manual', 'organizer@funcano.local', '7588519808', '', 'organizer.789', 'New York', 'America', '411012', 0, 'pPyXMmw4.jpg', '', '', 0),
(5, 'rahul', 'aher', 'rahul1224@fc.local', '', '', '123', '', '', '', 0, 'bigeqw.jpg', 'male', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fc_questions`
--

CREATE TABLE `fc_questions` (
  `questionId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_questions`
--

INSERT INTO `fc_questions` (`questionId`, `userId`, `question`, `answer`) VALUES
(1, 0, 'dfvxcv', 'some Answer ..'),
(2, 46, 'dfvxcv', ''),
(3, 46, 'dfvxcv', ''),
(4, 46, 'Whats Up ????', ''),
(5, 46, 'Whats Up ????', ''),
(6, 46, 'How Are you ??', ''),
(8, 44, 'Tell Me about your self ??', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(9, 46, 'What is funcao', 'It is a small event organization web app'),
(10, 0, 'How does funcano work', 'By adding user and event'),
(13, 50, 'Funcano is really  Helpful ???', 'Yes ... It is really very Helpful.'),
(14, 50, 'Funcano is really  Helpfull ???', ''),
(15, 0, 'Whats Up Friends ??', 'Fi9'),
(16, 51, 'Explain funcano', '');

-- --------------------------------------------------------

--
-- Table structure for table `fc_ticket`
--

CREATE TABLE `fc_ticket` (
  `ticketId` int(11) NOT NULL,
  `ticketTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ticketDesc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ticketPrice` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `flyersId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active,2:inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fc_ticket_booking`
--

CREATE TABLE `fc_ticket_booking` (
  `bookingId` int(11) NOT NULL,
  `flylerId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `bookingTime` datetime NOT NULL,
  `ticketDate` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `ticketNumber` varchar(50) NOT NULL,
  `bookingStatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_ticket_booking`
--

INSERT INTO `fc_ticket_booking` (`bookingId`, `flylerId`, `userId`, `fullName`, `lastName`, `emailId`, `phone`, `bookingTime`, `ticketDate`, `price`, `ticketNumber`, `bookingStatus`) VALUES
(1, 15, 24, 'Vishal', 'Jangam', 'vishaljangamv@gmail.com', '1234567890', '2018-08-17 00:00:00', '0000-00-00', '22.10', '00001', 1),
(2, 17, 22, 'Rahul ', 'Jamadar', 'jamadarr1992@gmail.com', '7588519806', '2018-08-24 00:00:00', '0000-00-00', '22.12', '00002', 1),
(3, 19, 22, 'Vishal', '', 'vishaljangamv@gmail.com', '1234567890', '2018-08-28 00:00:00', '2018-08-28', '40.00', '00003', 1),
(4, 15, 24, 'John', '', 'john@funcano.com', '1234567980', '2018-08-28 00:00:00', '2018-08-28', '22.10', '00004', 1),
(5, 15, 24, 'John', '', 'john@funcano.com', '1234567980', '2018-08-28 00:00:00', '2018-08-28', '22.10', '00005', 1),
(6, 15, 24, 'John', '', 'john@funcano.com', '1234567980', '2018-08-28 00:00:00', '2018-08-28', '22.10', '00006', 1),
(7, 12, 24, 'Vishal Jamagam', '', 'vishaljangamv@gmail.com', '0123456789', '2018-08-28 00:00:00', '2018-08-28', '20.10', '00007', 1),
(8, 17, 24, 'Vishal', '', 'vishaljangamv@gmail.com', '123456789', '2018-08-28 00:00:00', '2018-09-06', '22.12', '00008', 1),
(9, 18, 34, 'Vishal', '', 'vp@ninesolutions.co.in', '9881279020', '2018-08-29 00:00:00', '2018-08-29', '17.10', '00009', 1),
(10, 12, 24, 'Vishal Jangam', '', 'vishaljangamv@gmail.com', '0123456789', '2018-08-29 00:00:00', '2018-08-29', '20.10', '00010', 1),
(11, 17, 22, 'Rahul Jamadar', '', 'jamadarr1992@gmail.com', '1234567890', '2018-08-29 00:00:00', '2018-09-06', '22.12', '00011', 2),
(12, 17, 22, 'Rahul Jamadar', '', 'jamadarr1992@gmail.com', '10120456891', '2018-08-29 00:00:00', '2018-09-06', '22.12', '00012', 2),
(13, 18, 34, 'Gajanan Darvatkar', '', 'darvatkarg@gmail.com', '457846897456', '2018-08-29 00:00:00', '2018-08-29', '17.10', '00013', 2),
(14, 18, 34, 'Gajanan Darvatkar', '', 'darvatkarg@gmail.com', '457846897456', '2018-09-04 00:00:00', '2018-09-04', '17.10', '00014', 1),
(15, 19, 22, 'Rahul Jamadar', '', 'jamadarr1992@gmail.com', '1234567890', '2018-09-05 00:00:00', '2018-09-05', '40.00', '00015', 2),
(16, 21, 22, 'Rahul Jamadar', '', 'jamadarr1992@gmail.com', '1234567890', '2018-09-05 00:00:00', '2018-09-05', '17.00', '00016', 1),
(17, 14, 22, 'Rahul Jamadar', '', 'jamadarr1992@gmail.com', '1234567890', '2018-09-07 00:00:00', '2018-09-07', '10.50', '00017', 1),
(18, 24, 50, 'Manoj Patel', '', 'manoj@funcano.com', '0123564879', '2018-09-07 00:00:00', '2018-09-07', '30.20', '00018', 1),
(19, 24, 50, 'Manoj Patel', '', 'manoj@funcano.com', '0123564879', '2018-09-07 00:00:00', '2018-09-07', '30.20', '00019', 1),
(20, 24, 50, 'Manoj Patel', '', 'manoj@funcano.com', '0123564879', '2018-09-10 00:00:00', '2018-09-10', '15.10', '00020', 1),
(21, 25, 51, 'Rahul Jamadar', '', 'jamadarr1992@gmail.com', '02312648988', '2018-09-10 00:00:00', '2018-09-10', '20.12', '123984', 2),
(22, 25, 44, 'Avinash Aher', '', 'aher.avinash01@gmail.com', '0123456789', '2018-09-10 00:00:00', '2018-09-10', '20.12', '778435', 2),
(23, 25, 44, 'Avinash Aher', '', 'aher.avinash01@gmail.com', '0986600888', '2018-09-10 00:00:00', '2018-09-10', '20.12', '840298', 2),
(24, 25, 51, 'Rahul Jamadar', '', 'jamadarr1992@gmail.com', '02312648988', '2018-09-10 00:00:00', '2018-09-10', '20.12', '785288', 1),
(25, 24, 51, 'Rahul Jamadar', '', 'jamadarr1992@gmail.com', '02312648988', '2018-09-10 00:00:00', '2018-09-10', '15.10', '830426', 2),
(26, 29, 51, 'Rahul Jamadar', '', 'jamadarr1992@gmail.com', '02312648988', '2018-09-17 00:00:00', '2018-09-17', '15.70', '432176', 2),
(27, 29, 51, 'Rahul Jamadar', '', 'jamadarr1992@gmail.com', '02312648988', '2018-09-17 00:00:00', '2018-09-17', '15.70', '999714', 1),
(28, 36, 46, 'Sushma Roy', '', 'sushma@funcano.com', '0123456789', '2018-09-19 00:00:00', '2018-09-19', '13.07', '590843', 2),
(29, 37, 46, 'Sushma Roy', '', 'sushma@funcano.com', '0123456789', '2018-09-19 00:00:00', '2018-09-19', '20.00', '888080', 1),
(30, 37, 64, 'Avinash Aher', '', 'aher.avinash01@gmail.com', '0123456789', '2018-09-19 00:00:00', '2018-09-19', '20.00', '811014', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fc_user`
--

CREATE TABLE `fc_user` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userType` tinyint(4) NOT NULL DEFAULT '1',
  `emailId` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `socialConnectType` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:Google, 2:Facebook',
  `socialLoginId` varchar(255) NOT NULL,
  `funcies` varchar(300) NOT NULL,
  `description` varchar(255) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `altContactNumber` varchar(15) NOT NULL,
  `notifyNewsletter` tinyint(4) NOT NULL COMMENT '0:Off, 1:On',
  `notifyPhone` tinyint(4) NOT NULL COMMENT '0:Off, 1:On',
  `notifyWildcard` tinyint(4) NOT NULL COMMENT '0:Off, 1:On',
  `city` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0:Inactive, 1:Active',
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `facebookLink` varchar(255) NOT NULL,
  `twitterLink` varchar(255) NOT NULL,
  `googleLink` varchar(255) NOT NULL,
  `profileImage` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_user`
--

INSERT INTO `fc_user` (`userId`, `firstName`, `lastName`, `userName`, `userType`, `emailId`, `password`, `socialConnectType`, `socialLoginId`, `funcies`, `description`, `contactNumber`, `altContactNumber`, `notifyNewsletter`, `notifyPhone`, `notifyWildcard`, `city`, `status`, `address`, `zipcode`, `facebookLink`, `twitterLink`, `googleLink`, `profileImage`, `gender`) VALUES
(24, 'Vishal', 'Jangam', '', 1, 'vishaljangamv@gmail.com', '12363d8316e4d035b774340a4a687d43', 0, '', 'Drawing,Embroidery,Warm glass,Woodworking,Tole painting,Go,Jacquet,Tournament Scrabble,Miniatures,Casino,Beer Cans,Found objects,Cake Making,Home Repiars,Designing and building electronic circuits,Model houses,Alternative Music,Dance Music,Beach ultimate,Cliff diving,Football', 'Hi, I am Vishal Jangam born in Chicago', '0123456789', '', 0, 0, 0, 'Nashik', 1, 'nashik', '123456', '', '', '', 'https://funcano.syphor.in/system/static/uploads/userProfile/6kKrS8rc.jpg', 'male'),
(25, 'John', 'Caslie', '', 1, 'john@funcano.com', '624f1b0dad37c77d1c7adf76fc9387d8', 0, '', 'Drawing,Embroidery,Warm glass,Woodworking,Tole painting,Go,Jacquet,Tournament Scrabble,Miniatures,Casino,Beer Cans,Found objects,Cake Making,Home Repiars,Designing and building electronic circuits,Model houses,Alternative Music,Dance Music,Beach ultimate,Cliff diving,Football', '', '123456789', '', 0, 0, 0, 'Los Angelis', 1, 'Los Angelis Uk', '123456', '', '', '', '', ''),
(34, 'Gajanan', 'Darvatkar', '', 1, 'darvatkarg@gmail.com', '06db8d7abd4fe1cc21536a1d1ceb1405', 1, '109664467661729981112', 'Drawing,Embroidery,Warm glass,Woodworking,Tole painting,Go,Jacquet,Tournament Scrabble,Miniatures,Casino,Beer Cans,Found objects,Cake Making,Home Repiars,Designing and building electronic circuits,Model houses,Alternative Music,Dance Music,Beach ultimate,Cliff diving,Football', '', '457846897456', '456456', 0, 0, 0, 'City', 1, 'Some address', '45142', '', '', '', 'https://lh6.googleusercontent.com/-rq-GB1R2wTY/AAAAAAAAAAI/AAAAAAAADX8/OniYnHmdM18/s96-c/photo.jpg', ''),
(36, 'Gajanan', 'Darvatkar', '', 1, 'darvatkarg2@gmail.com', '2add91f6c6756a64c2150fb17ab23c26', 1, '10216611908519772', 'Drawing,Embroidery,Warm glass,Woodworking,Tole painting,Go,Jacquet,Tournament Scrabble,Miniatures,Casino,Beer Cans,Found objects,Cake Making,Home Repiars,Designing and building electronic circuits,Model houses,Alternative Music,Dance Music,Beach ultimate,Cliff diving,Football', '', '7855', '', 0, 0, 0, 'NASHIK', 1, 'Nashik, New Ashish Tyres, 1st floor, Mumbai-Agra Road', '422009', '', '', '', 'https://graph.facebook.com/10216611908519772/picture?type=large', ''),
(38, 'Dave', 'Mvula', '', 1, 'info.funcano@gmail.com', '8f1d717ba2d3c3cf3b4f7b7ed3523efb', 2, '106585786957899', 'Drawing,Embroidery,Warm glass,Woodworking,Tole painting,Go,Jacquet,Tournament Scrabble,Miniatures,Casino,Beer Cans,Found objects,Cake Making,Home Repiars,Designing and building electronic circuits,Model houses,Alternative Music,Dance Music,Beach ultimate,Cliff diving,Football', '', '1234567890', '', 0, 0, 0, 'USA', 1, 'USA Chicago', '201345', '', '', '', 'https://funcano.syphor.in/system/static/uploads/userProfile/n6MfP3wK.jpg', ''),
(43, 'Bhushan', 'Kotkar', '', 1, 'bhushankotkar92@gmail.com', 'Up334vM3', 0, '', '', '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '20180903_153356.jpg', ''),
(46, 'Sushma', 'Roy', '', 1, 'sushma@funcano.com', '27b4197e146a46ef2809dc233d71b239', 0, '', 'Woodworking,Chinese Checkers,Casino,Beer Cans,Comic books,Hats,Posters,Shopping lists,Shot glasses,Computer games,Alternative Music,Dance Music,Electronic Music,European Music (Folk / Pop),Indie Pop,Eskrima', '', '0123456789', '', 0, 0, 0, 'Austin', 1, 'Austin UK ', '102135', '', '', '', 'https://funcano.syphor.in/system/static/uploads/userProfile/a3yH9T6P.jpg', 'female'),
(50, 'Manoj', 'Patel', '', 1, 'manoj@funcano.com', 'add9774667063fbe52ebe6073a340c27', 0, '', 'Woodworking,Chinese Checkers,Casino,Beer Cans,Comic books,Hats,Posters,Shopping lists,Shot glasses,Computer games,Video games,Photoshopping,Electronic Music,Indie Pop,Eskrima', '', '0123564879', '', 0, 0, 0, 'Mumbai', 1, 'Mumbai Kurla', '123456', '', '', '', '', 'male'),
(51, 'Rahul', 'Jamadar', '', 1, 'jamadarr1992@gmail.com', 'fa935b663079100ca645b5fef21feab7', 1, '110618234020466929871', 'Woodworking,Chinese Checkers,Casino,Beer Cans,Comic books,Hats,Posters,Shopping lists,Shot glasses,Computer games,Video games,Photoshopping,Electronic Music,Indie Pop,Eskrima', '', '02312648988', '', 0, 0, 0, 'Pune', 1, 'Sanghvi Katepuram chowk Pune', '411035', '', '', '', 'https://lh4.googleusercontent.com/-P02BjnVmX0Q/AAAAAAAAAAI/AAAAAAAAEzQ/blG5TDD7FFI/s96-c/photo.jpg', 'male'),
(53, 'Vivek', 'Gotraj', '', 1, 'vivek@gmail.com', 'vvvvvggfvfgvvvvvvvvbbbbbbbn', 0, '', '', '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '20180910_180526.jpg', ''),
(57, 'Bhushan', 'kotkar', '', 1, 'kotkar@gmail.com', 'oooooooo', 0, '', '', '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '20180911_161727.jpg', ''),
(58, 'Bhushan', 'Wani', '', 1, 'bhushanwani@gmail.com', 'bbbbbbbb', 0, '', '', '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '20180911_164248.jpg', ''),
(70, 'Hupendra', 'Deore', '', 1, 'hupendra@funcano.com', 'e350da47eb086301673bf30c92dc8b24', 0, '', 'Designing and building electronic circuits,Model houses,Cliff diving,Alternative Music,Books,Warm glass,Beer Cans,Dance Music,European Music (Folk / Pop),Classical Music,Indie Pop,Jazz,Bottles,Photographs,Embroidery,Woodworking,Teddy bears,Dominoes,Dominoes,Gatka,Alternative Music,Matball,Crochet,Ch', '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', ''),
(71, 'Yatin', 'Badgujar', '', 1, 'yatin@funcano.com', '747d8c1424922e2f77d13eef9f4713bd', 0, '', 'Crochet,Embroidery,Warm glass,Woodworking,Dominoes,Beer Cans,Books,Bottles,Photographs,Teddy bears,Designing and building electronic circuits,Model houses,Alternative Music,Classical Music,Dance Music,European Music (Folk / Pop),Indie Pop,Jazz,Cliff diving,Dominoes,Gatka,Matball', '', '0312546816', '', 0, 0, 0, 'Pune', 1, 'Sanghvi katepuram chowk', '231544', '', '', '', 'https://funcano.syphor.in/system/static/uploads/userProfile/b8vuWvw3.jpg', 'male'),
(72, 'Umesh', 'Thakare', '', 1, 'thakareumesh1993@gmail.com', '54c768fa8bba28e7cc4a1209eb100ce7', 1, '104224436587680935915', 'Designing and building electronic circuits,Model houses,Cliff diving,Alternative Music,Books,Warm glass,Beer Cans,Dance Music,European Music (Folk / Pop),Classical Music,Indie Pop,Jazz,Bottles,Photographs,Embroidery,Woodworking,Teddy bears,Dominoes,Dominoes,Gatka,Alternative Music,Matball,Crochet,Ch', '', '', '', 0, 0, 0, '', 1, '', '', '', '', '', 'https://lh6.googleusercontent.com/-xY4A8fjEzag/AAAAAAAAAAI/AAAAAAAAAAA/AAN31DUhpXBiPss4V71QM_qeogLHziGTJg/s96-c/photo.jpg', ''),
(74, 'Vivek', 'Gotraj', '', 1, 'vg@funcano.com', 'af88a0ae641589b908fa8b31f0fcf6e1', 0, '', 'football,dance', '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', ''),
(75, 'Vivek', '', '', 1, 'vg1@funcano.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', 'football,dance', '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', ''),
(76, 'Vivek', 'Gotraj', '', 1, 'vg3@funcano.com', 'af88a0ae641589b908fa8b31f0fcf6e1', 0, '', 'football,dance', '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', ''),
(77, 'vivek', 'sir', '', 1, 'vg4@funcano.com', 'bCVBlaqE', 0, '', 'football,dance,gemes', '', '', '', 0, 0, 0, 'nashik', 0, 'maharastra', '422010', '', '', '', '', ''),
(78, 'vivek', 'sir', '', 1, 'vg5@funcano.com', 'b5b440e45bd1196b42ff2e1713509015', 0, '', 'football,dance,gemes', '', '', '', 0, 0, 0, 'nashik', 0, 'maharastra', '422010', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fc_verification`
--

CREATE TABLE `fc_verification` (
  `verifyId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `verifyType` tinyint(4) NOT NULL COMMENT '1: Registration; 2:Reset Password;',
  `code` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: not confirmed 1: confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_verification`
--

INSERT INTO `fc_verification` (`verifyId`, `userId`, `verifyType`, `code`, `status`) VALUES
(1, 18, 1, 'kdvAJGYHvy2WeW87', 0),
(2, 19, 1, 'PbX29txSJA6Mxrac', 1),
(3, 20, 1, 'F66mNerKqPG2smz3', 0),
(4, 21, 1, 'egrq7XBjsttFTzSq', 1),
(5, 22, 1, 'zmV4ER9rgpf27uyh', 0),
(6, 24, 1, 'KSmaqgGxmfny8y56', 1),
(7, 25, 1, 'y6cNT2ZGdjqWpQZ8', 0),
(8, 26, 1, 'NG2HHbX3M78mQxac', 0),
(9, 30, 1, '5NDZ9Pjrpzb4bx2T', 0),
(10, 31, 1, '9rR8XFJuAQg84JnE', 0),
(11, 32, 1, 'qzertN2gFTkvX5QK', 0),
(12, 39, 1, 'bN7xDKtqaCcd4v96', 0),
(13, 40, 1, 'XTPX2AdJMdCgc2bW', 0),
(14, 41, 1, 'NkYWD6amrPj9fWD4', 0),
(15, 42, 1, 'p3Dmzp85ae3cP768', 0),
(16, 46, 1, '9EDRzZ8yFyXjnDNm', 0),
(17, 47, 1, '3J5xbjpCvJG7h9Yz', 0),
(18, 48, 1, 'stu2nWCSn5xB6zYu', 0),
(19, 49, 1, '46hvvQZXAgAtYxxb', 0),
(20, 50, 1, 'T6BwaMCwGVGShCNg', 0),
(21, 54, 1, '62MyUPh5t9mxdJ4x', 0),
(22, 62, 1, '3qAC36yrKtGmYsSw', 0),
(23, 70, 1, 'JMsV9ntsdaQPSPUX', 0),
(24, 71, 1, '4t3tzu3ZVZ5dztgA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fc_view_count`
--

CREATE TABLE `fc_view_count` (
  `shareId` int(11) NOT NULL,
  `flyerId` int(11) NOT NULL,
  `date` date NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_view_count`
--

INSERT INTO `fc_view_count` (`shareId`, `flyerId`, `date`, `gender`) VALUES
(1, 50, '2018-09-05', 'female'),
(2, 50, '2018-09-05', 'female'),
(3, 51, '2018-09-05', 'female'),
(4, 51, '2018-09-05', 'male'),
(5, 51, '2018-09-05', 'male'),
(6, 51, '2018-09-04', 'male'),
(7, 51, '2018-09-04', 'female'),
(8, 50, '2018-09-03', 'female'),
(9, 50, '2018-09-02', 'female'),
(10, 51, '2018-09-01', 'female'),
(11, 51, '2018-09-02', 'male'),
(12, 51, '2018-09-01', 'male'),
(13, 51, '2018-09-05', 'male'),
(14, 51, '2018-09-05', 'female'),
(15, 51, '2018-09-06', 'male'),
(16, 51, '2018-09-05', 'male'),
(17, 51, '2018-09-05', 'male'),
(18, 50, '2018-09-05', 'male'),
(19, 50, '2018-09-05', 'male'),
(20, 50, '2018-09-05', 'male'),
(21, 50, '2018-09-05', 'male'),
(22, 50, '2018-09-05', 'male'),
(23, 50, '2018-09-05', 'male'),
(24, 50, '2018-09-05', 'male'),
(25, 51, '2018-09-05', 'male'),
(26, 50, '2018-09-05', 'male'),
(27, 50, '2018-09-05', 'male'),
(28, 50, '2018-09-05', 'male'),
(29, 50, '2018-09-05', 'male'),
(30, 50, '2018-09-05', 'male'),
(31, 50, '2018-09-05', 'male'),
(32, 50, '2018-09-05', 'male'),
(33, 50, '2018-09-05', 'male'),
(34, 50, '2018-09-05', 'male'),
(35, 50, '2018-09-05', 'male'),
(36, 50, '2018-09-05', 'male'),
(37, 50, '2018-09-05', 'male'),
(38, 50, '2018-09-05', 'male'),
(39, 50, '2018-09-05', 'male'),
(40, 50, '2018-09-05', 'male'),
(41, 50, '2018-09-05', 'male'),
(42, 50, '2018-09-05', 'male'),
(43, 50, '2018-09-05', 'male'),
(44, 50, '2018-09-05', 'male'),
(45, 50, '2018-09-05', 'male'),
(46, 50, '2018-09-05', 'male'),
(47, 50, '2018-09-05', 'male'),
(48, 50, '2018-09-05', 'male'),
(49, 50, '2018-09-05', 'male'),
(50, 50, '2018-09-05', 'male'),
(51, 12, '2018-09-05', 'male'),
(52, 12, '2018-09-05', 'male'),
(53, 12, '2018-09-05', 'male'),
(54, 12, '2018-09-05', 'male'),
(55, 12, '2018-09-05', 'male'),
(56, 19, '2018-09-05', 'male'),
(57, 19, '2018-09-05', 'male'),
(58, 19, '2018-09-05', 'male'),
(59, 19, '2018-09-05', 'male'),
(60, 19, '2018-09-05', 'male'),
(61, 19, '2018-09-05', 'male'),
(62, 17, '2018-09-05', 'male'),
(63, 21, '2018-09-05', 'male'),
(64, 21, '2018-09-05', 'male'),
(65, 21, '2018-09-05', 'male'),
(66, 19, '2018-09-05', 'male'),
(67, 19, '2018-09-05', 'male'),
(68, 19, '2018-09-05', 'male'),
(69, 16, '2018-09-05', 'male'),
(70, 16, '2018-09-05', 'male'),
(71, 19, '2018-09-05', 'male'),
(72, 16, '2018-09-05', 'male'),
(73, 21, '2018-09-05', 'male'),
(74, 17, '2018-09-05', 'male'),
(75, 21, '2018-09-05', 'male'),
(76, 17, '2018-09-05', 'male'),
(77, 21, '2018-09-05', 'male'),
(78, 21, '2018-09-05', 'male'),
(79, 17, '2018-09-05', 'male'),
(80, 19, '2018-09-05', 'male'),
(81, 16, '2018-09-05', 'male'),
(82, 17, '2018-09-05', 'male'),
(83, 17, '2018-09-05', 'male'),
(84, 17, '2018-09-05', 'male'),
(85, 17, '2018-09-05', 'male'),
(86, 17, '2018-09-05', 'male'),
(87, 17, '2018-09-05', 'male'),
(88, 17, '2018-09-05', 'male'),
(89, 17, '2018-09-05', 'male'),
(90, 21, '2018-09-05', 'male'),
(91, 21, '2018-09-05', 'male'),
(92, 21, '2018-09-05', 'male'),
(93, 19, '2018-09-05', 'male'),
(94, 21, '2018-09-05', 'male'),
(95, 20, '2018-09-05', 'male'),
(96, 19, '2018-09-05', 'male'),
(97, 17, '2018-09-05', 'male'),
(98, 17, '2018-09-05', 'male'),
(99, 17, '2018-09-05', 'male'),
(100, 17, '2018-09-05', 'male'),
(101, 17, '2018-09-05', 'male'),
(102, 17, '2018-09-06', 'male'),
(103, 21, '2018-09-06', 'male'),
(104, 21, '2018-09-06', 'male'),
(105, 21, '2018-09-06', 'male'),
(106, 21, '2018-09-06', 'male'),
(107, 15, '2018-09-06', 'male'),
(108, 15, '2018-09-06', 'male'),
(109, 15, '2018-09-06', 'male'),
(110, 18, '2018-09-06', 'male'),
(111, 18, '2018-09-06', 'male'),
(112, 18, '2018-09-06', 'male'),
(113, 15, '2018-09-06', 'male'),
(114, 12, '2018-09-06', 'male'),
(115, 18, '2018-09-06', 'male'),
(116, 19, '2018-09-06', 'male'),
(117, 21, '2018-09-06', 'male'),
(118, 21, '2018-09-06', 'male'),
(119, 21, '2018-09-06', 'male'),
(120, 21, '2018-09-06', 'male'),
(121, 21, '2018-09-06', 'male'),
(122, 21, '2018-09-06', 'male'),
(123, 21, '2018-09-06', 'male'),
(124, 21, '2018-09-06', 'male'),
(125, 21, '2018-09-06', 'male'),
(126, 21, '2018-09-06', 'male'),
(127, 20, '2018-09-06', 'male'),
(128, 20, '2018-09-06', 'male'),
(129, 16, '2018-09-06', 'male'),
(130, 16, '2018-09-06', 'male'),
(131, 20, '2018-09-06', 'male'),
(132, 14, '2018-09-06', 'male'),
(133, 2, '2018-09-06', 'male'),
(134, 7, '2018-09-06', 'male'),
(135, 11, '2018-09-06', 'male'),
(136, 21, '2018-09-06', 'male'),
(137, 6, '2018-09-06', 'male'),
(138, 6, '2018-09-06', 'male'),
(139, 6, '2018-09-06', 'male'),
(140, 22, '2018-09-06', 'female'),
(141, 22, '2018-09-06', 'female'),
(142, 17, '2018-09-06', 'male'),
(143, 22, '2018-09-06', 'female'),
(144, 22, '2018-09-06', 'female'),
(145, 22, '2018-09-06', 'female'),
(146, 22, '2018-09-06', 'female'),
(147, 22, '2018-09-06', 'female'),
(148, 22, '2018-09-06', 'female'),
(149, 22, '2018-09-06', 'female'),
(150, 22, '2018-09-06', 'female'),
(151, 22, '2018-09-06', 'female'),
(152, 22, '2018-09-06', 'female'),
(153, 22, '2018-09-06', 'female'),
(154, 22, '2018-09-06', 'female'),
(155, 22, '2018-09-06', 'female'),
(156, 22, '2018-09-06', 'female'),
(157, 21, '2018-09-06', 'male'),
(158, 21, '2018-09-06', 'male'),
(159, 21, '2018-09-06', 'male'),
(160, 22, '2018-09-06', 'female'),
(161, 21, '2018-09-06', 'male'),
(162, 18, '2018-09-06', 'male'),
(163, 22, '2018-09-06', 'female'),
(164, 22, '2018-09-06', 'female'),
(165, 22, '2018-09-06', 'female'),
(166, 22, '2018-09-06', 'female'),
(167, 22, '2018-09-06', 'female'),
(168, 22, '2018-09-06', 'female'),
(169, 15, '2018-09-06', 'male'),
(170, 17, '2018-09-06', 'male'),
(171, 22, '2018-09-06', 'female'),
(172, 20, '2018-09-06', 'male'),
(173, 22, '2018-09-06', 'female'),
(174, 22, '2018-09-06', 'female'),
(175, 22, '2018-09-06', 'female'),
(176, 22, '2018-09-06', 'female'),
(177, 22, '2018-09-06', 'female'),
(178, 7, '2018-09-06', 'male'),
(179, 20, '2018-09-06', 'male'),
(180, 22, '2018-09-06', 'female'),
(181, 22, '2018-09-06', 'female'),
(182, 22, '2018-09-06', 'female'),
(183, 22, '2018-09-06', 'female'),
(184, 21, '2018-09-06', 'male'),
(185, 21, '2018-09-06', 'male'),
(186, 21, '2018-09-06', 'male'),
(187, 21, '2018-09-06', 'male'),
(188, 22, '2018-09-06', 'female'),
(189, 11, '2018-09-06', 'male'),
(190, 21, '2018-09-06', 'male'),
(191, 17, '2018-09-06', 'male'),
(192, 21, '2018-09-06', 'male'),
(193, 17, '2018-09-06', 'male'),
(194, 21, '2018-09-06', 'male'),
(195, 21, '2018-09-06', 'male'),
(196, 19, '2018-09-06', 'male'),
(197, 18, '2018-09-06', 'male'),
(198, 17, '2018-09-06', 'male'),
(199, 16, '2018-09-06', 'male'),
(200, 15, '2018-09-06', 'male'),
(201, 14, '2018-09-06', 'male'),
(202, 2, '2018-09-06', 'male'),
(203, 21, '2018-09-06', 'male'),
(204, 5, '2018-09-06', 'male'),
(205, 6, '2018-09-06', 'male'),
(206, 4, '2018-09-06', 'male'),
(207, 3, '2018-09-06', 'male'),
(208, 2, '2018-09-06', 'male'),
(209, 21, '2018-09-06', 'male'),
(210, 2, '2018-09-06', 'male'),
(211, 3, '2018-09-06', 'male'),
(212, 4, '2018-09-06', 'male'),
(213, 6, '2018-09-06', 'male'),
(214, 22, '2018-09-06', 'female'),
(215, 21, '2018-09-06', 'male'),
(216, 22, '2018-09-06', 'female'),
(217, 22, '2018-09-06', 'female'),
(218, 22, '2018-09-06', 'female'),
(219, 20, '2018-09-06', 'male'),
(220, 20, '2018-09-06', 'male'),
(221, 20, '2018-09-06', 'male'),
(222, 20, '2018-09-06', 'male'),
(223, 22, '2018-09-06', 'female'),
(224, 21, '2018-09-06', 'male'),
(225, 15, '2018-09-06', 'male'),
(226, 15, '2018-09-06', 'male'),
(227, 15, '2018-09-06', 'male'),
(228, 15, '2018-09-06', 'male'),
(229, 21, '2018-09-06', 'male'),
(230, 16, '2018-09-06', 'male'),
(231, 16, '2018-09-06', 'male'),
(232, 16, '2018-09-06', 'male'),
(233, 22, '2018-09-06', 'female'),
(234, 21, '2018-09-06', 'male'),
(235, 21, '2018-09-06', 'male'),
(236, 12, '2018-09-06', 'male'),
(237, 11, '2018-09-06', 'male'),
(238, 3, '2018-09-06', 'male'),
(239, 22, '2018-09-06', 'female'),
(240, 22, '2018-09-06', 'female'),
(241, 21, '2018-09-06', 'male'),
(242, 20, '2018-09-06', ''),
(243, 21, '2018-09-06', 'female'),
(244, 20, '2018-09-06', 'female'),
(245, 20, '2018-09-06', 'female'),
(246, 15, '2018-09-06', 'male'),
(247, 4, '2018-09-06', 'male'),
(248, 5, '2018-09-06', 'male'),
(249, 5, '2018-09-06', 'male'),
(250, 5, '2018-09-06', 'male'),
(251, 5, '2018-09-06', 'male'),
(252, 5, '2018-09-06', 'male'),
(253, 5, '2018-09-06', 'male'),
(254, 14, '2018-09-07', 'male'),
(255, 14, '2018-09-07', 'male'),
(256, 21, '2018-09-07', 'male'),
(257, 18, '2018-09-07', 'male'),
(258, 18, '2018-09-07', 'male'),
(259, 18, '2018-09-07', 'male'),
(260, 18, '2018-09-07', 'male'),
(261, 22, '2018-09-07', ''),
(262, 22, '2018-09-07', ''),
(263, 22, '2018-09-07', ''),
(264, 22, '2018-09-07', ''),
(265, 22, '2018-09-07', 'male'),
(266, 22, '2018-09-07', 'male'),
(267, 22, '2018-09-07', 'male'),
(268, 22, '2018-09-07', 'female'),
(269, 20, '2018-09-07', 'female'),
(270, 18, '2018-09-07', 'female'),
(271, 21, '2018-09-07', 'female'),
(272, 19, '2018-09-07', 'female'),
(273, 7, '2018-09-07', 'female'),
(274, 3, '2018-09-07', 'female'),
(275, 2, '2018-09-07', 'female'),
(276, 22, '2018-09-07', ''),
(277, 22, '2018-09-07', ''),
(278, 22, '2018-09-07', ''),
(279, 22, '2018-09-07', ''),
(280, 22, '2018-09-07', 'female'),
(281, 21, '2018-09-07', 'female'),
(282, 15, '2018-09-07', 'female'),
(283, 21, '2018-09-07', 'female'),
(284, 20, '2018-09-07', 'female'),
(285, 19, '2018-09-07', 'female'),
(286, 18, '2018-09-07', 'female'),
(287, 12, '2018-09-07', 'female'),
(288, 11, '2018-09-07', 'female'),
(289, 11, '2018-09-07', 'female'),
(290, 21, '2018-09-07', 'female'),
(291, 15, '2018-09-07', 'female'),
(292, 18, '2018-09-07', 'female'),
(293, 22, '2018-09-07', 'male'),
(294, 18, '2018-09-07', 'female'),
(295, 18, '2018-09-07', 'female'),
(296, 18, '2018-09-07', 'female'),
(297, 15, '2018-09-07', 'male'),
(298, 15, '2018-09-07', 'male'),
(299, 19, '2018-09-07', 'female'),
(300, 15, '2018-09-07', 'male'),
(301, 19, '2018-09-07', 'female'),
(302, 19, '2018-09-07', 'female'),
(303, 15, '2018-09-07', 'male'),
(304, 7, '2018-09-07', 'male'),
(305, 2, '2018-09-07', 'male'),
(306, 5, '2018-09-07', 'male'),
(307, 4, '2018-09-07', 'male'),
(308, 6, '2018-09-07', 'male'),
(309, 7, '2018-09-07', 'male'),
(310, 19, '2018-09-07', 'female'),
(311, 11, '2018-09-07', 'male'),
(312, 14, '2018-09-07', 'male'),
(313, 12, '2018-09-07', 'male'),
(314, 19, '2018-09-07', 'male'),
(315, 18, '2018-09-07', 'male'),
(316, 16, '2018-09-07', 'male'),
(317, 19, '2018-09-07', 'female'),
(318, 19, '2018-09-07', 'male'),
(319, 15, '2018-09-07', 'male'),
(320, 15, '2018-09-07', 'male'),
(321, 12, '2018-09-07', 'male'),
(322, 19, '2018-09-07', 'female'),
(323, 22, '2018-09-07', 'male'),
(324, 20, '2018-09-07', 'female'),
(325, 20, '2018-09-07', 'female'),
(326, 12, '2018-09-07', 'female'),
(327, 22, '2018-09-07', 'female'),
(328, 21, '2018-09-07', 'female'),
(329, 16, '2018-09-07', 'female'),
(330, 20, '2018-09-07', 'female'),
(331, 21, '2018-09-07', 'female'),
(332, 23, '2018-09-07', 'male'),
(333, 21, '2018-09-07', 'female'),
(334, 11, '2018-09-07', 'female'),
(335, 11, '2018-09-07', 'female'),
(336, 11, '2018-09-07', 'female'),
(337, 23, '2018-09-07', 'male'),
(338, 23, '2018-09-07', 'male'),
(339, 11, '2018-09-07', 'female'),
(340, 20, '2018-09-07', 'female'),
(341, 21, '2018-09-07', 'female'),
(342, 21, '2018-09-07', 'female'),
(343, 20, '2018-09-07', 'female'),
(344, 20, '2018-09-07', 'female'),
(345, 23, '2018-09-07', 'female'),
(346, 11, '2018-09-07', 'male'),
(347, 23, '2018-09-07', 'male'),
(348, 23, '2018-09-07', 'male'),
(349, 23, '2018-09-07', 'male'),
(350, 12, '2018-09-07', 'female'),
(351, 12, '2018-09-07', 'female'),
(352, 21, '2018-09-07', ''),
(353, 21, '2018-09-07', 'female'),
(354, 23, '2018-09-07', 'male'),
(355, 21, '2018-09-07', 'female'),
(356, 21, '2018-09-07', ''),
(357, 23, '2018-09-07', ''),
(358, 21, '2018-09-07', 'male'),
(359, 23, '2018-09-07', ''),
(360, 21, '2018-09-07', 'male'),
(361, 16, '2018-09-07', 'female'),
(362, 23, '2018-09-07', 'male'),
(363, 22, '2018-09-07', 'male'),
(364, 16, '2018-09-07', 'female'),
(365, 18, '2018-09-07', 'male'),
(366, 16, '2018-09-07', 'female'),
(367, 16, '2018-09-07', 'female'),
(368, 23, '2018-09-07', 'male'),
(369, 23, '2018-09-07', 'male'),
(370, 14, '2018-09-07', 'female'),
(371, 14, '2018-09-07', 'female'),
(372, 14, '2018-09-07', 'female'),
(373, 3, '2018-09-07', 'male'),
(374, 16, '2018-09-07', 'female'),
(375, 14, '2018-09-07', 'female'),
(376, 14, '2018-09-07', 'female'),
(377, 14, '2018-09-07', 'female'),
(378, 14, '2018-09-07', 'female'),
(379, 14, '2018-09-07', 'female'),
(380, 14, '2018-09-07', 'female'),
(381, 19, '2018-09-07', 'male'),
(382, 16, '2018-09-07', 'female'),
(383, 16, '2018-09-07', 'female'),
(384, 16, '2018-09-07', 'female'),
(385, 22, '2018-09-07', 'male'),
(386, 23, '2018-09-07', ''),
(387, 22, '2018-09-07', 'male'),
(388, 16, '2018-09-07', 'male'),
(389, 16, '2018-09-07', 'female'),
(390, 16, '2018-09-07', 'female'),
(391, 16, '2018-09-07', 'male'),
(392, 16, '2018-09-07', 'male'),
(393, 23, '2018-09-07', ''),
(394, 23, '2018-09-07', ''),
(395, 23, '2018-09-07', 'male'),
(396, 16, '2018-09-07', 'male'),
(397, 20, '2018-09-07', 'female'),
(398, 12, '2018-09-07', 'male'),
(399, 11, '2018-09-07', 'male'),
(400, 16, '2018-09-07', 'female'),
(401, 12, '2018-09-07', 'female'),
(402, 12, '2018-09-07', 'female'),
(403, 12, '2018-09-07', 'female'),
(404, 4, '2018-09-07', 'female'),
(405, 16, '2018-09-07', 'female'),
(406, 22, '2018-09-07', 'female'),
(407, 22, '2018-09-07', 'female'),
(408, 19, '2018-09-07', 'female'),
(409, 20, '2018-09-07', 'female'),
(410, 19, '2018-09-07', 'female'),
(411, 19, '2018-09-07', 'female'),
(412, 19, '2018-09-07', 'female'),
(413, 19, '2018-09-07', 'female'),
(414, 16, '2018-09-07', 'female'),
(415, 12, '2018-09-07', 'male'),
(416, 16, '2018-09-07', 'female'),
(417, 22, '2018-09-07', 'female'),
(418, 16, '2018-09-07', 'female'),
(419, 18, '2018-09-07', 'female'),
(420, 6, '2018-09-07', 'female'),
(421, 11, '2018-09-07', 'female'),
(422, 22, '2018-09-07', 'male'),
(423, 18, '2018-09-07', 'male'),
(424, 6, '2018-09-07', 'male'),
(425, 6, '2018-09-07', 'female'),
(426, 6, '2018-09-07', 'male'),
(427, 15, '2018-09-07', 'male'),
(428, 6, '2018-09-07', 'female'),
(429, 15, '2018-09-07', 'female'),
(430, 15, '2018-09-07', 'male'),
(431, 15, '2018-09-07', 'female'),
(432, 16, '2018-09-07', 'male'),
(433, 15, '2018-09-07', 'female'),
(434, 22, '2018-09-07', 'male'),
(435, 16, '2018-09-07', 'female'),
(436, 16, '2018-09-07', 'female'),
(437, 19, '2018-09-07', 'female'),
(438, 19, '2018-09-07', 'female'),
(439, 6, '2018-09-07', 'female'),
(440, 20, '2018-09-07', 'female'),
(441, 15, '2018-09-07', 'female'),
(442, 15, '2018-09-07', ''),
(443, 15, '2018-09-07', ''),
(444, 7, '2018-09-07', ''),
(445, 14, '2018-09-07', 'female'),
(446, 16, '2018-09-07', ''),
(447, 16, '2018-09-07', ''),
(448, 16, '2018-09-07', ''),
(449, 24, '2018-09-07', 'female'),
(450, 16, '2018-09-07', ''),
(451, 24, '2018-09-07', 'female'),
(452, 16, '2018-09-07', ''),
(453, 16, '2018-09-07', ''),
(454, 24, '2018-09-07', 'female'),
(455, 24, '2018-09-07', 'female'),
(456, 24, '2018-09-07', 'female'),
(457, 24, '2018-09-07', 'female'),
(458, 24, '2018-09-07', 'male'),
(459, 24, '2018-09-07', 'male'),
(460, 24, '2018-09-10', 'male'),
(461, 24, '2018-09-10', 'male'),
(462, 24, '2018-09-10', 'male'),
(463, 24, '2018-09-10', 'male'),
(464, 18, '2018-09-10', 'male'),
(465, 19, '2018-09-10', 'male'),
(466, 15, '2018-09-10', 'male'),
(467, 25, '2018-09-10', 'male'),
(468, 25, '2018-09-10', 'male'),
(469, 24, '2018-09-10', 'male'),
(470, 24, '2018-09-10', 'female'),
(471, 25, '2018-09-10', 'female'),
(472, 24, '2018-09-10', 'female'),
(473, 20, '2018-09-10', 'male'),
(474, 24, '2018-09-10', 'female'),
(475, 16, '2018-09-10', 'female'),
(476, 16, '2018-09-10', 'female'),
(477, 16, '2018-09-10', 'female'),
(478, 16, '2018-09-10', 'female'),
(479, 16, '2018-09-10', 'female'),
(480, 16, '2018-09-10', 'female'),
(481, 16, '2018-09-10', 'female'),
(482, 18, '2018-09-10', 'female'),
(483, 16, '2018-09-10', 'female'),
(484, 12, '2018-09-10', 'female'),
(485, 18, '2018-09-10', 'female'),
(486, 25, '2018-09-10', 'female'),
(487, 16, '2018-09-10', 'male'),
(488, 16, '2018-09-10', 'male'),
(489, 20, '2018-09-10', 'male'),
(490, 25, '2018-09-10', 'male'),
(491, 25, '2018-09-10', 'male'),
(492, 25, '2018-09-10', 'female'),
(493, 25, '2018-09-10', 'female'),
(494, 25, '2018-09-10', 'male'),
(495, 25, '2018-09-10', 'female'),
(496, 25, '2018-09-10', 'female'),
(497, 25, '2018-09-10', 'male'),
(498, 25, '2018-09-10', 'male'),
(499, 24, '2018-09-10', 'male'),
(500, 24, '2018-09-10', 'male'),
(501, 25, '2018-09-10', 'male'),
(502, 25, '2018-09-10', 'male'),
(503, 16, '2018-09-10', 'male'),
(504, 25, '2018-09-10', 'male'),
(505, 25, '2018-09-10', 'male'),
(506, 15, '2018-09-10', 'male'),
(507, 15, '2018-09-10', 'male'),
(508, 15, '2018-09-10', 'male'),
(509, 24, '2018-09-10', 'male'),
(510, 26, '2018-09-10', 'female'),
(511, 29, '2018-09-10', 'female'),
(512, 29, '2018-09-10', 'male'),
(513, 29, '2018-09-11', 'male'),
(514, 28, '2018-09-11', 'male'),
(515, 27, '2018-09-11', 'male'),
(516, 26, '2018-09-11', 'male'),
(517, 25, '2018-09-11', 'male'),
(518, 24, '2018-09-11', 'male'),
(519, 19, '2018-09-11', 'male'),
(520, 18, '2018-09-11', 'male'),
(521, 16, '2018-09-11', 'male'),
(522, 15, '2018-09-11', 'male'),
(523, 14, '2018-09-11', 'male'),
(524, 6, '2018-09-11', 'male'),
(525, 6, '2018-09-11', 'male'),
(526, 16, '2018-09-11', 'male'),
(527, 31, '2018-09-11', 'male'),
(528, 31, '2018-09-11', 'male'),
(529, 6, '2018-09-11', 'female'),
(530, 31, '2018-09-11', 'female'),
(531, 30, '2018-09-11', 'female'),
(532, 29, '2018-09-11', 'female'),
(533, 28, '2018-09-11', 'female'),
(534, 27, '2018-09-11', 'female'),
(535, 26, '2018-09-11', 'female'),
(536, 31, '2018-09-12', 'female'),
(537, 31, '2018-09-12', 'male'),
(538, 30, '2018-09-12', 'male'),
(539, 29, '2018-09-12', 'male'),
(540, 28, '2018-09-12', 'male'),
(541, 27, '2018-09-12', 'male'),
(542, 26, '2018-09-12', 'male'),
(543, 29, '2018-09-12', 'female'),
(544, 30, '2018-09-12', 'female'),
(545, 30, '2018-09-12', 'female'),
(546, 33, '2018-09-12', 'male'),
(547, 31, '2018-09-12', 'male'),
(548, 33, '2018-09-12', 'male'),
(549, 31, '2018-09-12', 'male'),
(550, 31, '2018-09-12', ''),
(551, 31, '2018-09-12', 'male'),
(552, 31, '2018-09-12', ''),
(553, 31, '2018-09-12', 'male'),
(554, 31, '2018-09-12', ''),
(555, 31, '2018-09-12', ''),
(556, 29, '2018-09-12', ''),
(557, 19, '2018-09-12', 'male'),
(558, 19, '2018-09-12', 'male'),
(559, 19, '2018-09-12', 'male'),
(560, 27, '2018-09-12', 'male'),
(561, 27, '2018-09-12', 'male'),
(562, 27, '2018-09-12', 'male'),
(563, 27, '2018-09-12', 'male'),
(564, 27, '2018-09-12', 'male'),
(565, 35, '2018-09-12', 'male'),
(566, 31, '2018-09-17', ''),
(567, 29, '2018-09-17', 'male'),
(568, 31, '2018-09-17', ''),
(569, 31, '2018-09-17', ''),
(570, 31, '2018-09-17', 'male'),
(571, 31, '2018-09-17', ''),
(572, 31, '2018-09-17', 'male'),
(573, 31, '2018-09-17', ''),
(574, 31, '2018-09-17', 'male'),
(575, 31, '2018-09-17', ''),
(576, 31, '2018-09-17', ''),
(577, 31, '2018-09-17', 'male'),
(578, 19, '2018-09-17', 'male'),
(579, 19, '2018-09-17', 'male'),
(580, 31, '2018-09-17', 'male'),
(581, 31, '2018-09-17', 'male'),
(582, 24, '2018-09-17', 'male'),
(583, 25, '2018-09-17', 'male'),
(584, 31, '2018-09-17', 'male'),
(585, 6, '2018-09-17', 'male'),
(586, 24, '2018-09-17', 'male'),
(587, 24, '2018-09-17', 'male'),
(588, 6, '2018-09-17', 'male'),
(589, 26, '2018-09-17', 'male'),
(590, 27, '2018-09-17', 'male'),
(591, 28, '2018-09-17', 'male'),
(592, 25, '2018-09-17', 'male'),
(593, 25, '2018-09-17', 'male'),
(594, 29, '2018-09-17', 'male'),
(595, 31, '2018-09-17', 'male'),
(596, 25, '2018-09-17', 'male'),
(597, 6, '2018-09-17', 'male'),
(598, 25, '2018-09-17', 'male'),
(599, 31, '2018-09-17', 'male'),
(600, 29, '2018-09-17', 'male'),
(601, 6, '2018-09-17', 'male'),
(602, 6, '2018-09-17', 'male'),
(603, 29, '2018-09-17', 'male'),
(604, 29, '2018-09-17', 'male'),
(605, 27, '2018-09-17', 'female'),
(606, 27, '2018-09-17', 'female'),
(607, 27, '2018-09-17', 'female'),
(608, 27, '2018-09-17', 'female'),
(609, 27, '2018-09-17', 'female'),
(610, 31, '2018-09-17', 'female'),
(611, 28, '2018-09-17', 'male'),
(612, 31, '2018-09-17', ''),
(613, 31, '2018-09-17', ''),
(614, 31, '2018-09-17', 'male'),
(615, 15, '2018-09-17', 'male'),
(616, 19, '2018-09-17', 'male'),
(617, 16, '2018-09-17', 'male'),
(618, 29, '2018-09-17', 'male'),
(619, 27, '2018-09-17', 'male'),
(620, 31, '2018-09-17', 'male'),
(621, 29, '2018-09-17', 'male'),
(622, 29, '2018-09-17', 'male'),
(623, 29, '2018-09-17', 'male'),
(624, 29, '2018-09-17', 'male'),
(625, 29, '2018-09-17', 'male'),
(626, 31, '2018-09-17', ''),
(627, 29, '2018-09-17', 'male'),
(628, 28, '2018-09-17', 'male'),
(629, 31, '2018-09-17', 'male'),
(630, 25, '2018-09-17', 'male'),
(631, 16, '2018-09-17', 'male'),
(632, 6, '2018-09-17', 'male'),
(633, 6, '2018-09-17', 'male'),
(634, 6, '2018-09-17', 'male'),
(635, 6, '2018-09-17', 'male'),
(636, 15, '2018-09-17', 'female'),
(637, 15, '2018-09-17', 'female'),
(638, 28, '2018-09-18', 'male'),
(639, 31, '2018-09-18', ''),
(640, 28, '2018-09-18', ''),
(641, 28, '2018-09-18', ''),
(642, 15, '2018-09-18', 'male'),
(643, 19, '2018-09-18', 'male'),
(644, 26, '2018-09-18', 'female'),
(645, 28, '2018-09-18', ''),
(646, 28, '2018-09-18', 'female'),
(647, 28, '2018-09-18', 'female'),
(648, 28, '2018-09-18', 'female'),
(649, 28, '2018-09-18', ''),
(650, 28, '2018-09-18', 'male'),
(651, 28, '2018-09-18', 'male'),
(652, 28, '2018-09-18', 'male'),
(653, 31, '2018-09-18', ''),
(654, 31, '2018-09-19', 'male'),
(655, 31, '2018-09-19', 'male'),
(656, 31, '2018-09-19', 'male'),
(657, 31, '2018-09-19', ''),
(658, 31, '2018-09-19', 'male'),
(659, 36, '2018-09-19', 'female'),
(660, 36, '2018-09-19', 'female'),
(661, 36, '2018-09-19', 'female'),
(662, 36, '2018-09-19', 'female'),
(663, 36, '2018-09-19', 'female'),
(664, 36, '2018-09-19', 'female'),
(665, 36, '2018-09-19', 'female'),
(666, 31, '2018-09-19', 'male'),
(667, 29, '2018-09-19', 'male'),
(668, 31, '2018-09-19', ''),
(669, 29, '2018-09-19', ''),
(670, 29, '2018-09-19', ''),
(671, 37, '2018-09-19', 'male'),
(672, 37, '2018-09-19', 'male'),
(673, 37, '2018-09-19', 'male'),
(674, 37, '2018-09-19', 'male'),
(675, 37, '2018-09-19', 'female'),
(676, 37, '2018-09-19', 'female'),
(677, 37, '2018-09-19', 'female'),
(678, 37, '2018-09-19', ''),
(679, 37, '2018-09-19', 'female'),
(680, 37, '2018-09-19', ''),
(681, 37, '2018-09-19', 'female'),
(682, 37, '2018-09-19', 'female'),
(683, 37, '2018-09-19', ''),
(684, 29, '2018-09-19', ''),
(685, 29, '2018-09-19', ''),
(686, 29, '2018-09-19', ''),
(687, 37, '2018-09-19', 'male'),
(688, 29, '2018-09-19', ''),
(689, 29, '2018-09-19', ''),
(690, 37, '2018-09-19', 'male'),
(691, 37, '2018-09-19', 'male'),
(692, 31, '2018-09-19', 'female'),
(693, 31, '2018-09-19', 'female'),
(694, 18, '2018-09-19', 'male'),
(695, 18, '2018-09-19', 'male'),
(696, 18, '2018-09-19', 'male'),
(697, 31, '2018-09-20', 'male'),
(698, 15, '2018-09-20', 'male'),
(699, 12, '2018-09-20', 'male'),
(700, 16, '2018-09-20', 'male'),
(701, 38, '2018-09-20', ''),
(702, 38, '2018-09-20', ''),
(703, 31, '2018-09-20', 'male'),
(704, 38, '2018-09-20', 'male'),
(705, 31, '2018-09-20', 'male'),
(706, 31, '2018-09-20', 'male'),
(707, 38, '2018-09-20', 'male'),
(708, 38, '2018-09-20', 'male'),
(709, 31, '2018-09-20', ''),
(710, 31, '2018-09-20', ''),
(711, 31, '2018-09-20', ''),
(712, 31, '2018-09-20', ''),
(713, 31, '2018-09-20', ''),
(714, 31, '2018-09-20', ''),
(715, 6, '2018-09-20', ''),
(716, 19, '2018-09-20', ''),
(717, 29, '2018-09-20', 'male'),
(718, 29, '2018-09-20', 'male'),
(719, 26, '2018-09-20', 'male'),
(720, 26, '2018-09-20', 'male'),
(721, 31, '2018-09-20', 'male'),
(722, 31, '2018-09-20', 'male'),
(723, 31, '2018-09-20', 'male'),
(724, 18, '2018-09-20', 'male'),
(725, 26, '2018-09-20', 'male'),
(726, 29, '2018-09-20', 'male'),
(727, 38, '2018-09-21', 'male'),
(728, 38, '2018-09-21', 'male'),
(729, 38, '2018-09-21', 'male'),
(730, 38, '2018-09-21', 'male'),
(731, 38, '2018-09-21', 'male'),
(732, 38, '2018-09-21', 'male'),
(733, 31, '2018-09-21', 'male'),
(734, 31, '2018-09-21', ''),
(735, 31, '2018-09-24', 'male'),
(736, 31, '2018-09-24', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fc_admin`
--
ALTER TABLE `fc_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `fc_comments`
--
ALTER TABLE `fc_comments`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `fc_contact_us`
--
ALTER TABLE `fc_contact_us`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `fc_faq`
--
ALTER TABLE `fc_faq`
  ADD PRIMARY KEY (`faqId`);

--
-- Indexes for table `fc_flyers`
--
ALTER TABLE `fc_flyers`
  ADD PRIMARY KEY (`flyerId`);

--
-- Indexes for table `fc_flyers_review`
--
ALTER TABLE `fc_flyers_review`
  ADD PRIMARY KEY (`reviewId`);

--
-- Indexes for table `fc_flyer_category`
--
ALTER TABLE `fc_flyer_category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `fc_funcies`
--
ALTER TABLE `fc_funcies`
  ADD PRIMARY KEY (`funciesId`);

--
-- Indexes for table `fc_interested`
--
ALTER TABLE `fc_interested`
  ADD PRIMARY KEY (`interestId`);

--
-- Indexes for table `fc_masterfuncies`
--
ALTER TABLE `fc_masterfuncies`
  ADD PRIMARY KEY (`funcyId`);

--
-- Indexes for table `fc_organizer`
--
ALTER TABLE `fc_organizer`
  ADD PRIMARY KEY (`organizerId`);

--
-- Indexes for table `fc_questions`
--
ALTER TABLE `fc_questions`
  ADD PRIMARY KEY (`questionId`);

--
-- Indexes for table `fc_ticket`
--
ALTER TABLE `fc_ticket`
  ADD PRIMARY KEY (`ticketId`);

--
-- Indexes for table `fc_ticket_booking`
--
ALTER TABLE `fc_ticket_booking`
  ADD PRIMARY KEY (`bookingId`);

--
-- Indexes for table `fc_user`
--
ALTER TABLE `fc_user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `fc_verification`
--
ALTER TABLE `fc_verification`
  ADD PRIMARY KEY (`verifyId`);

--
-- Indexes for table `fc_view_count`
--
ALTER TABLE `fc_view_count`
  ADD PRIMARY KEY (`shareId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fc_admin`
--
ALTER TABLE `fc_admin`
  MODIFY `adminId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fc_comments`
--
ALTER TABLE `fc_comments`
  MODIFY `commentId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fc_contact_us`
--
ALTER TABLE `fc_contact_us`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `fc_faq`
--
ALTER TABLE `fc_faq`
  MODIFY `faqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fc_flyers`
--
ALTER TABLE `fc_flyers`
  MODIFY `flyerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `fc_flyers_review`
--
ALTER TABLE `fc_flyers_review`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `fc_flyer_category`
--
ALTER TABLE `fc_flyer_category`
  MODIFY `categoryId` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fc_funcies`
--
ALTER TABLE `fc_funcies`
  MODIFY `funciesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=946;

--
-- AUTO_INCREMENT for table `fc_interested`
--
ALTER TABLE `fc_interested`
  MODIFY `interestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `fc_masterfuncies`
--
ALTER TABLE `fc_masterfuncies`
  MODIFY `funcyId` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fc_organizer`
--
ALTER TABLE `fc_organizer`
  MODIFY `organizerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `fc_questions`
--
ALTER TABLE `fc_questions`
  MODIFY `questionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fc_ticket`
--
ALTER TABLE `fc_ticket`
  MODIFY `ticketId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fc_ticket_booking`
--
ALTER TABLE `fc_ticket_booking`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `fc_user`
--
ALTER TABLE `fc_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `fc_verification`
--
ALTER TABLE `fc_verification`
  MODIFY `verifyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `fc_view_count`
--
ALTER TABLE `fc_view_count`
  MODIFY `shareId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=737;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
