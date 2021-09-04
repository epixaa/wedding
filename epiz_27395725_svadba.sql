-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql200.epizy.com
-- Generation Time:  4 септ 2021 в 11:28
-- Версия на сървъра: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_27395725_svadba`
--

-- --------------------------------------------------------

--
-- Структура на таблица `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `user` varchar(60) NOT NULL,
  `pass` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(17, 'epixaa', '123456'),
(18, 'epixaaa', '123456'),
(19, 'eredzheb', '12434'),
(21, 'merlin', '123456'),
(22, 'marin', '1234marin');

-- --------------------------------------------------------

--
-- Структура на таблица `photographer`
--

CREATE TABLE `photographer` (
  `id` int(6) NOT NULL,
  `name` varchar(60) NOT NULL,
  `last` varchar(60) NOT NULL,
  `number` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `photographer`
--

INSERT INTO `photographer` (`id`, `name`, `last`, `number`, `email`) VALUES
(1, 'Eredzheb', 'Nurhan', '0896565654', 'eredzheb_nurha@ue-varna.bg'),
(2, 'Petur', 'Petrov', '0888888888', 'probnoemailche@gmail.com'),
(3, 'Aleksandar', 'Aleksandrov', '0999999999', 'tovaeemail@hotmail.com'),
(4, 'Dimitar', 'Ivanov', '0896527555', 'dimitar@abv.bg');

-- --------------------------------------------------------

--
-- Структура на таблица `reserve`
--

CREATE TABLE `reserve` (
  `id` int(6) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `number` varchar(60) NOT NULL,
  `isConfirmed` tinyint(1) NOT NULL COMMENT '0- потвърден, 1- очаква потвърждение',
  `photographer_id` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `reserve`
--

INSERT INTO `reserve` (`id`, `date`, `name`, `email`, `number`, `isConfirmed`, `photographer_id`) VALUES
(7, '2020-12-03', 'Eredzheb Nurhan', 'eredjeb_nurhan@abv.bg', '088888888', 0, 1),
(50, '2021-01-28', 'Melis', 'rooney596@mail.bg', '0888888888', 0, 1),
(33, '2020-12-12', 'Nutfi', 'nutfi911@icloud.com', '0560938381', 0, 1),
(39, '2022-08-13', 'Merlin', 'merlin@abv.bg', '0888888888', 0, 1),
(34, '2020-12-24', 'Deniz Memduev', 'deniz@gmail.com', '08999999999', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photographer`
--
ALTER TABLE `photographer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `photographer`
--
ALTER TABLE `photographer`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
