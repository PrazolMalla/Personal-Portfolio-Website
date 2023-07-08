-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 01:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `portfoliomain`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(22, 'prazol', 'prazol', '962012d09b8170d912f0669f6d7d9d07');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'logo'),
(2, 'card'),
(3, 'web'),
(4, 'App');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `number`, `message`) VALUES
(1, 'Prazol Malla', 'prajwalmalla@gmail.com', '1234567890', 'hi, how are you?'),
(6, 'Python', 'prazol.stha@hotmail.com', '9849999999', 'Hi i wanna work with you'),
(7, 'Prazol Malla', 'prazol.stha@hotmail.com', '1981921829', 'Hello Audience '),
(8, 'Prajwal Malla', 'prajwalmalla16@gmail.com', '33', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `project_date` date NOT NULL,
  `url` varchar(255) NOT NULL,
  `text` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `category`, `skills`, `client`, `project_date`, `url`, `text`, `image`) VALUES
(1, 'Project 1', '1', '1', 'Sudip', '2022-06-15', '#', 'lksbdvasdv', 'work1.jpg'),
(18, 'Lenovo Nepal', '1', '1', 'abhijeet', '2023-03-16', 'www.lenovonepal.com', 'Lorem', 'Work-1591.png'),
(20, 'Eaton', '3', '5', 'Kalyan', '2023-03-29', '#', 'Lsjsfkmfs', 'Work-5012.png'),
(21, 'Rainbow', '4', '4', 'Bigyan', '2023-03-21', '#', 'skjsf', 'Work-7559.jpg'),
(22, 'Modern Kitchen Concept', '2', '2', 'Birat', '2023-03-01', 'https://www.google.com/maps', 'sffjkfd', 'Work-9024.png'),
(23, 'Raibow Card', '2', '4', 'Bigyan', '2023-03-01', '#', 'fshsikfahjsaf', 'Work-5565.png'),
(25, 'Project ', '1', '1', 'Pratik', '2023-03-30', '#', 'shjdfhsfjhfs', 'Work-2515.png');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(1, 'PhotoShop'),
(2, 'Figma'),
(3, 'JavaScript'),
(4, 'HTML'),
(5, 'CSS'),
(6, 'PHP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;
