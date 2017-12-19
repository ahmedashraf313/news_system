-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2017 at 09:20 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.1.12-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `src` varchar(1000) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `src`, `news_id`) VALUES
(3, 'box-press/images/2.jpg', 5),
(16, 'images/1.jpg', 4),
(17, 'images/vodafone maps.png', 4),
(34, 'images/vodafone.png', 33),
(35, 'images/vodafone maps.png', 34),
(36, 'images/vodafone.png', 35);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `author_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `views_number` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `author_id`, `date`, `time`, `views_number`) VALUES
(1, 'ahmed', 'g,sfmng,s glfjglkngklfgks gskgndksfngkfds gljfglkjgkljdlkgjdf lkjglfkjglkjflkgjdlkgjdslkjgkldsjgklds klgdlkjglkjglkdjg lkgjlkdfjglkfjdglkdfsg jlgkjfdlkgjdlkjgd kljgdlkjglkdjgkljfdlkgjds kljgdlksjglkdjgds kljglfkdjglkdjslkgjdsg jlgdlkgjlkdjgldkjg lkgjdlkjglkdjgkldjslkgsdj lkjgdlkjglkjslkjgdkjglkdsjk lgdkjglkdjlgkdsjgsdlkjglkds kljglkjgkjsldkjglskgjlkf kljgdlkjglkjfdklgjldkf kjglkfdjglkdjlkgjdslkgjlkdsf lkjgkldlksdjlkgfdklgjkldfjglkjfdlkg lkjglkfdjfglkdjglkjdlkjgdfkjlkjkgds lkjgdskljgkldjglkjdslkgjlkgjd kljgkjkljgfdkjgjglkgdjklgd gdsfgfdsgfdggdsfffdgffgdg gdsklgdgn,dmgldkgldgf mlgkmdklgmdlkmgd', 2, '2017-12-06', '02:00:00', 1),
(2, 'kjngejsnfes', 'v,nfes,mfv,d', 2, '2017-12-06', '12:00:00', 1),
(3, 'kgkldmgdf', ',mbfmbfdb,mfd', 2, '2017-12-06', '05:00:00', 1),
(4, 'kgdlkmgdkflmbdf', 'gm,nd,nghmdhmngdmd', 2, '2017-12-06', '11:00:00', 2),
(28, '.gmlfdmbl;gdlb', 'lmbldf,b/.lb/;fgl', 2, '2017-12-14', '06:28:56', 1),
(30, 'test', 'test test test test tesst  ;lkdf;lgkl;sdkgfl;kfdl;gkdfl;kglfdg gldfkgl;dkg;lkdsl;gkfl;kg;ldfg;lf lgkdf;lgk;fdlkg;lfd', 2, '2017-12-14', '06:36:28', 0),
(31, 'WODA Coworking Space test', 'lhjkdlgjlkjglkdjlkgjd gdklgjlkdjgkldjlkgd gdlkjglkdjglkdjgd gkldjglkd', 2, '2017-12-15', '08:27:07', 1),
(32, 'test author namexxxx', 'nmbvdfbvn', 4, '2017-12-15', '10:34:41', 1),
(34, 'klnbndkbd', ',mbnd,mb d', 2, '2017-12-15', '11:17:04', 0),
(35, 'lngvs,nvsf', 'bmfmb,mfndvg,', 2, '2017-12-15', '11:17:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'author',
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `type`, `name`, `created_at`, `updated_at`, `remember_token`, `password`) VALUES
(1, 'ahmed@gmail.com', 'admin', 'ahmed', NULL, NULL, 'N4QWv0V1AC3HB7QXIY1E1jbfxMc6lvedy9S8Sdvq2Fd07NetyNd1NvCeyAhx', '$2y$10$WS1GFHxvN2g9TqGGnQ0oeejjZwZKJefIYKxERbGwc7.mwNr0IP0sq'),
(2, 'ahmed.ashraf199635@gmail.com', 'author', 'ahmed ashraf', '2017-12-13 12:28:53', '2017-12-13 12:28:53', 'Nck9U1gnVZmnacVgLR7EcUqDA2o9OZS1Wgz6j7n7PDpkMJQAYQNoO72ppz2v', '$2y$10$wy57kjzPSJxiYRK9hcEGauT2Rya6kxpP1j3jo0TEGnXAQ23G8CByO'),
(3, 'ahmed@vdvdgmail.com', 'author', 'm,ndvvdd', '2017-12-15 07:06:02', NULL, NULL, '$2y$10$tKbiAsgSN5GIxMQJkZNk.u2.E2jmDvzVHMqNhtq8m9l4vh.pV9eHC'),
(4, 'ahmed.ashraf199635@yahoo.com', 'author', 'vfddfbbgfd', '2017-12-15 07:07:19', NULL, 'LpQkcO2xLIagwl166dv0FV3kERxGg7OnjDtsWSpES3dQDJfrAY4Fu0WEWtL0', '$2y$10$l5/KfAo.qtIFbDLYykd3XePPQ28JDVHwMCCuKDbw89VEdwY80/X8K');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `ip`, `news_id`) VALUES
(4, '127.0.0.1', 1),
(5, '127.0.0.1', 2),
(6, '127.0.0.1', 3),
(7, ',mbnfdb ,m ', 4),
(8, '127.0.0.1', 4),
(9, '127.0.0.1', 31),
(10, '127.0.0.1', 32),
(11, '127.0.0.1', 33),
(12, '127.0.0.1', 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`email`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
