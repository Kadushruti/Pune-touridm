-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 04:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `emil_verification_temp`
--

CREATE TABLE `emil_verification_temp` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verification_key` varchar(255) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emil_verification_temp`
--

INSERT INTO `emil_verification_temp` (`id`, `email`, `verification_key`, `expDate`) VALUES
(3, '2219vms@gmail.com', 'e143c01e314f7b950daca31188cb5d0f856712f568', '2022-04-13 17:51:00'),
(4, 'borsepiyush412@gmail.com', '768e78024aa8fdb9b8fe87be86f6474507d18ae70d', '2022-04-13 17:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_verification_key` varchar(255) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activities`
--

CREATE TABLE `tbl_activities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `max_children` int(4) NOT NULL,
  `max_adults` int(4) NOT NULL,
  `max_people` int(4) NOT NULL,
  `description` text NOT NULL,
  `hotel_ids` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `coverimage` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_activities`
--

INSERT INTO `tbl_activities` (`id`, `name`, `max_children`, `max_adults`, `max_people`, `description`, `hotel_ids`, `price`, `longitude`, `latitude`, `coverimage`, `created_at`) VALUES
(1, 'Bus City Tour', 10, 3, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rhoncus mi dui, et porttitor mauris vestibulum in. Sed ut nisi faucibus, sodales orci eget, placerat lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed et dui egestas, volutpat nisl eget, vestibulum ipsum. Nullam non sem commodo, hendrerit arcu eu, imperdiet odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla ut metus sit amet enim blandit molestie nec ut sem. Etiam aliquet rutrum est, sit amet euismod quam tempus sit amet. Suspendisse aliquet nec nisl vitae lacinia. Praesent bibendum urna mauris, sit amet porttitor tortor maximus quis. Maecenas maximus augue at urna varius, nec tempor arcu elementum. Curabitur dapibus elit dui, at mollis enim venenatis et.\r\n\r\nEtiam bibendum porttitor odio. In venenatis, urna at ultricies tempus, enim nisl ullamcorper neque, ac venenatis est purus ut diam. Aenean purus leo, dignissim a est eget, pulvinar finibus ante. Phasellus ac fermentum odio. Nullam turpis nibh, congue at elit ut, convallis auctor ex. Ut commodo condimentum arcu, non iaculis magna laoreet pretium. Donec ultrices lacus eget metus varius finibus. Etiam tempus sapien vitae erat fermentum hendrerit. Vivamus convallis lorem et orci posuere imperdiet. Quisque ultrices sollicitudin elit, nec dapibus tortor placerat vel. Vestibulum sit amet justo scelerisque, accumsan nunc vel, scelerisque velit. Integer pulvinar tincidunt odio sed dignissim.', '1,2', 75, '-0.140146', '51.493697', '19838055641-b95cf7c1be-k.jpg', '0000-00-00 00:00:00'),
(2, 'Desert Road Tour', 4, 4, 8, 'Nulla leo tellus, bibendum in dolor non, venenatis euismod nulla. Aliquam consectetur lorem ac imperdiet scelerisque. Integer id elit erat. Maecenas auctor accumsan posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed vestibulum molestie magna vel dignissim. Phasellus viverra laoreet orci eu vehicula. Fusce a velit finibus, commodo augue non, rutrum massa. Phasellus vel cursus mi. Integer tincidunt sapien eleifend ex efficitur efficitur. Cras quis mattis ligula, eget gravida ligula. Aliquam id vulputate tellus, at egestas libero. In et augue id diam fermentum dignissim eu eu enim. Integer feugiat enim sit amet elementum faucibus. Nam ac est vel sapien commodo sodales et ut velit.', '2', 56, '-7.470896', '31.646323', 'unsplash-2c0343f7-2.jpg', '0000-00-00 00:00:00'),
(3, 'Culinary experience', 1, 1, 1, 'Maecenas et hendrerit neque, a vehicula metus. Sed diam lorem, efficitur ut venenatis ac, tristique finibus tellus. Morbi imperdiet dictum tempor. Phasellus iaculis sapien ac elit luctus, at ultricies ex vulputate. Duis sit amet viverra dui, ac lobortis massa. Phasellus sapien ante, congue id neque sit amet, pellentesque fermentum libero. Phasellus sollicitudin quis velit non dapibus. Proin pretium est eu lacus semper, ornare molestie nulla efficitur. Praesent malesuada, nisi sit amet aliquam luctus, quam sapien faucibus libero, eu imperdiet augue velit vitae eros. Etiam ut nisl urna. Fusce hendrerit, enim id volutpat condimentum, ex nisi scelerisque mauris, eget tristique lacus libero quis nisl.', '1', 1110, '2.342387', '48.85348', 'stocksnap-p0b6lapfpc.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activities_gallery`
--

CREATE TABLE `tbl_activities_gallery` (
  `gallery_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `activity_id` int(11) NOT NULL,
  `uploded_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_activities_gallery`
--

INSERT INTO `tbl_activities_gallery` (`gallery_id`, `file_name`, `activity_id`, `uploded_at`) VALUES
(1, '3373132862-faef100a6a-b.jpg', 1, '2022-04-12 10:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `id` int(11) NOT NULL,
  `razorpay_order_id` varchar(255) NOT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `room_number` int(11) NOT NULL,
  `max_adults` int(11) NOT NULL,
  `max_children` int(11) NOT NULL,
  `total_room_price` double NOT NULL,
  `activity_id` int(11) NOT NULL,
  `activitydate` date NOT NULL,
  `max_adults_activity` int(11) NOT NULL,
  `max_children_activity` int(11) NOT NULL,
  `activity_price` double NOT NULL,
  `total_activity_price` double NOT NULL,
  `sub_total_price` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobilenumber` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`id`, `razorpay_order_id`, `razorpay_payment_id`, `hotel_id`, `room_id`, `checkin`, `checkout`, `room_number`, `max_adults`, `max_children`, `total_room_price`, `activity_id`, `activitydate`, `max_adults_activity`, `max_children_activity`, `activity_price`, `total_activity_price`, `sub_total_price`, `user_id`, `name`, `email`, `mobilenumber`, `address`, `created_at`) VALUES
(2, 'order_JJWFnFCkgaxDyD', 'pay_JJWGAaolDHTLsR', 2, 3, '2022-04-15', '2022-04-16', 1, 1, 0, 1620, 2, '2022-04-15', 1, 0, 56, 56, 1676, 4, 'Mahesh lokhande', 'vaibhav.sulake@gmail.com', '9845678909', 'sadguru nagar bhosari', '2022-04-15 11:08:41'),
(3, 'order_JJXxTxivM5ono2', 'pay_JJXxvUV6NcHoHO', 1, 2, '2022-04-15', '2022-04-16', 1, 2, 1, 4000, 0, '0000-00-00', 0, 0, 0, 0, 4000, 4, 'Mahesh lokhande', 'vaibhav.sulake@gmail.com', '9845678909', 'sadguru nagar bhosari', '2022-04-15 12:48:47'),
(4, 'order_JJZknR88RALi6b', 'pay_JJZlAVsf6DDhAm', 0, 0, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 2, '2022-04-22', 1, 1, 56, 112, 112, 4, 'Mahesh lokhande', 'vaibhav.sulake@gmail.com', '9845678909', 'sadguru nagar bhosari', '2022-04-15 14:34:06'),
(5, 'order_JLWAum3hpXtYrF', 'pay_JLWCIJQeJ4fCEb', 2, 3, '2022-04-20', '2022-04-20', 1, 1, 0, 810, 2, '2022-04-20', 1, 1, 56, 112, 922, 4, 'Mahesh lokhande', 'vaibhav.sulake@gmail.com', '9845678909', 'sadguru nagar bhosari', '2022-04-20 12:23:04'),
(6, 'order_JLXw5JywRbhgD2', 'pay_JLXwTa7sHPiGTJ', 2, 3, '2022-04-20', '2022-04-21', 1, 2, 0, 1620, 0, '0000-00-00', 0, 0, 0, 0, 1620, 7, 'vaibhav sulake', 'vaibhav.sulake@gmail.com', '9922545896', 'sadguru nagar bhosari', '2022-04-20 14:05:28'),
(7, 'order_JLXzea1VshPqGK', 'pay_JLXzyqCc1QLmWM', 2, 3, '2022-04-20', '2022-04-21', 1, 1, 0, 1620, 2, '2022-04-20', 3, 3, 56, 336, 1956, 7, 'vaibhav sulake', 'vaibhav.sulake1@gmail.com', '9922545896', 'pune mg road', '2022-04-20 14:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_destinations`
--

CREATE TABLE `tbl_destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `coverimage` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_destinations`
--

INSERT INTO `tbl_destinations` (`id`, `name`, `description`, `latitude`, `longitude`, `coverimage`, `created_at`) VALUES
(2, 'Marrakech, Morocco', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan erat convallis tempus varius. Mauris porta urna porttitor, blandit ipsum in, tincidunt justo. Integer nisl nisl, rhoncus congue viverra nec, porta eu sem.\r\n\r\nEtiam ut diam purus. Mauris et purus ut ante faucibus sodales. Duis elit lacus, dignissim ac pellentesque in, pulvinar sed augue. Fusce quis nulla mauris. Nunc vehicula mollis massa ac egestas. Nullam sed commodo diam, id malesuada dolor.', 31.645666, -7.980406, '17615381906-eff0c47a26-o.jpg', '2022-04-04 20:18:36'),
(3, ' Santorini, Greece', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dignissim orci eu velit aliquam tincidunt. Duis rutrum, mi id bibendum suscipit, tortor nunc placerat orci, eu ultricies ante metus interdum nibh.\r\n\r\nInteger at ipsum malesuada, sodales eros in, malesuada nunc. Aliquam porttitor purus ex. Aliquam sed sem sed lorem dignissim interdum. Sed bibendum augue vel leo venenatis cursus quis in purus.', 36.393073, 25.461696, '9711373324-d9cd1313e1-o.jpg', '2022-04-04 20:19:53'),
(4, 'London, United Kingdom', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur venenatis at quam et dictum. Fusce ultricies nunc id ligula eleifend euismod. Sed efficitur sapien sit amet sapien sollicitudin consequat.\r\n\r\nQuisque interdum, urna eu mattis faucibus, ex felis sagittis lacus, in euismod tellus ligula eu velit. Phasellus posuere mattis erat, a ultricies libero. Nunc eleifend, sem eget vulputate aliquam, purus sem bibendum nisi, ut facilisis tellus mauris ut quam.', 51.507358, -0.127757, 'odrakb0.jpg', '2022-04-04 20:21:33'),
(5, 'Istanbul, Turkey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit ante, tristique et nisl non, blandit maximus diam. In hac habitasse platea dictumst. Praesent id erat vulputate, viverra turpis sit amet, elementum enim.\r\n\r\nFusce eu aliquam quam. Phasellus eu pellentesque arcu, viverra lacinia ipsum. Fusce arcu quam, volutpat eget dictum non, facilisis sed diam. Mauris vulputate dolor nisl, eget aliquet quam accumsan finibus.', 41.007835, 28.978824, '33890684570-736b2cb258-o.jpg', '2022-04-04 20:23:42'),
(6, 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam condimentum enim sed ipsum consectetur suscipit. Nulla vestibulum lorem fringilla tellus vehicula dapibus. Nunc convallis at ligula a viverra. Morbi eget orci vitae nisi ultrices dictum.\r\n\r\nDuis a cursus mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi vitae convallis arcu. Aliquam eros libero, feugiat sodales sapien a, semper condimentum sapien.', 48.856551, 2.352285, '9798739573-eb98cd8f61-b.jpg', '2022-04-04 20:24:54'),
(7, 'pune', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a quam at felis ullamcorper pulvinar nec a massa. Praesent cursus tellus non posuere porta. Quisque sollicitudin enim eu lectus facilisis, et iaculis diam consectetur. Curabitur ac diam ut tortor efficitur eleifend. Nulla congue cursus ante, et scelerisque nibh cursus ac. Nullam eleifend libero ut tempus vehicula. Nulla cursus augue sapien, sed auctor nisi varius vitae. Sed lacinia orci sem, sit amet tincidunt nunc volutpat vitae. Vivamus volutpat iaculis condimentum. Aliquam dictum justo at dui vulputate tincidunt. Suspendisse porta ex sed mi convallis, nec condimentum mi tempus.\r\n\r\nAliquam luctus dignissim ligula, ac elementum erat pharetra non. Duis at lobortis nisi. Ut ac vestibulum nunc. Aliquam ante mi, volutpat venenatis elit quis, condimentum consectetur sapien. Praesent sollicitudin nulla risus, at dictum risus volutpat et. Etiam mauris diam, rhoncus non est ut, aliquam venenatis nunc. Proin quam tellus, finibus quis ligula sit amet, fringilla volutpat turpis. Cras non mauris euismod, cursus magna et, feugiat risus. Proin at nisi finibus, interdum dolor ac, consectetur urna. Suspendisse eu eleifend turpis. Etiam dictum ex quis lorem venenatis imperdiet. Donec id dolor quam.', 19.07609, 72.877426, '5893810393-1ff7c8572d-o.jpg', '2022-04-20 14:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_destinations_gallery`
--

CREATE TABLE `tbl_destinations_gallery` (
  `gallery_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `destination_id` int(11) NOT NULL,
  `uploded_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_destinations_gallery`
--

INSERT INTO `tbl_destinations_gallery` (`gallery_id`, `file_name`, `destination_id`, `uploded_at`) VALUES
(2, '4638595891-2a6fcc2c09-b.jpg', 2, '2022-04-12 09:50:08'),
(4, '37909699756-4819687eb9-o.jpg', 7, '2022-04-20 14:27:15'),
(5, '15383606150-3223006c9d-h.jpg', 7, '2022-04-20 14:27:15'),
(6, '5893810393-1ff7c8572d-o.jpg', 7, '2022-04-20 14:27:15'),
(7, 'slide2.jpg', 7, '2022-04-20 14:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facility`
--

CREATE TABLE `tbl_facility` (
  `facility_id` int(11) NOT NULL,
  `facility_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_facility`
--

INSERT INTO `tbl_facility` (`facility_id`, `facility_name`, `created_at`) VALUES
(1, 'Air conditioning', '2022-04-04 15:57:15'),
(2, '	Baby cot', '2022-04-04 15:57:48'),
(3, 'Balcony', '2022-04-04 15:58:01'),
(4, 'Barbecue', '2022-04-04 15:58:09'),
(5, 'Bathroom', '2022-04-04 15:58:17'),
(6, 'Cloakroom', '2022-04-04 15:58:27'),
(7, 'Coffeemaker', '2022-04-04 15:58:34'),
(8, 'Cooktop', '2022-04-04 15:58:41'),
(9, 'Desk', '2022-04-04 15:58:48'),
(10, 'Dishwasher', '2022-04-04 15:58:55'),
(11, 'DVD player', '2022-04-04 15:59:06'),
(12, '	Elevator', '2022-04-04 15:59:17'),
(13, 'Fan', '2022-04-04 15:59:23'),
(14, 'Free parking', '2022-04-04 15:59:31'),
(15, 'Fridge', '2022-04-04 15:59:38'),
(16, 'Hairdryer', '2022-04-04 15:59:54'),
(17, 'Hi-fi system', '2022-04-04 16:00:02'),
(18, 'Internet', '2022-04-04 16:00:08'),
(19, 'Iron', '2022-04-04 16:00:16'),
(20, 'Lounge', '2022-04-04 16:00:24'),
(21, 'Microwave', '2022-04-04 16:00:36'),
(22, 'Mini-bar', '2022-04-04 16:00:42'),
(23, 'Non-smoking', '2022-04-04 16:00:49'),
(24, 'Paid parking', '2022-04-04 16:00:58'),
(25, 'Pets allowed', '2022-04-04 16:01:05'),
(26, 'Pets not allowed', '2022-04-04 16:01:13'),
(27, 'Radio', '2022-04-04 16:01:19'),
(28, 'Restaurant', '2022-04-04 16:01:27'),
(29, 'Room service', '2022-04-04 16:01:35'),
(30, 'Safe', '2022-04-04 16:01:43'),
(31, 'Satellite chanels', '2022-04-04 16:01:49'),
(32, '	Shower-room', '2022-04-04 16:01:56'),
(33, 'Small lounge', '2022-04-04 16:02:02'),
(34, '	Telephone', '2022-04-04 16:02:09'),
(35, 'Television', '2022-04-04 16:02:15'),
(36, 'Terrasse', '2022-04-04 16:02:22'),
(37, 'Washing machine', '2022-04-04 16:02:32'),
(38, 'Wheelchair accessible', '2022-04-04 16:02:40'),
(40, 'WiFi', '2022-04-04 16:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotels`
--

CREATE TABLE `tbl_hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `facilitiy_ids` text NOT NULL,
  `destination_id` int(11) NOT NULL,
  `stars` int(1) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `coverimage` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hotels`
--

INSERT INTO `tbl_hotels` (`id`, `name`, `description`, `facilitiy_ids`, `destination_id`, `stars`, `phone`, `email`, `web`, `address`, `longitude`, `latitude`, `coverimage`, `created_at`) VALUES
(1, 'St James Hotel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in tincidunt quam. Morbi tristique, nibh nec tempor cursus, nibh velit faucibus orci, feugiat viverra augue dui at metus. Aliquam ornare lobortis erat venenatis venenatis. Ut tellus lacus, convallis vel vehicula vel, hendrerit nec est. Aliquam lacus orci, gravida sit amet arcu vitae, elementum elementum odio. Sed eget auctor arcu. Mauris augue mauris, laoreet ut erat sit amet, luctus blandit magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nSed ultricies ligula in ex varius aliquet. In imperdiet urna quis sem commodo aliquam. Praesent mollis arcu justo, id iaculis sem venenatis vitae. Aenean neque turpis, lobortis vitae felis eget, sagittis lacinia est. Quisque vel sapien vitae mauris auctor imperdiet. Aliquam ac sapien placerat, sagittis sem in, placerat orci. Nam porta lectus vel ante maximus ultrices in sed elit. Nullam congue consectetur neque vel sodales.', '1,2,3,4,7,8,10', 4, 3, '9835465747', 'contact@stjames.com', 'www.stjames.com', 'Brompton Rd Kensington, London SW3 2BB United Kingdom', -0.169607, 51.496418, 'odrakb0 - Copy.jpg', '2022-04-04 21:21:44'),
(2, 'Emerald Hotel', 'The Jianguo Hotel Qianmen is located near Tiantan Park, just a 10-minute walk from the National Center for the Performing Arts and Tian\'anmen Square. Built in 1956 it has old school charm and many rooms still feature high, crown-molded ceilings. A 2012 renovation brought all rooms and services up to modern day scratch and guestrooms come equipped with free Wi-Fi and all the usual amenities required for a comfortable stay.', '1,2,3,4,6,18,30,31,35,37,38', 5, 5, '9935464535', 'contact@emerald.com', 'www.emerald.com', 'Arap Cami 34421 İstanbul, Turkey', 28.970775, 41.023412, '15383606150-3223006c9d-h.jpg', '2022-04-04 21:23:57'),
(12, 'Grand Hotel Regence', 'Sed ultricies ligula in ex varius aliquet. In imperdiet urna quis sem commodo aliquam. Praesent mollis arcu justo, id iaculis sem venenatis vitae. Aenean neque turpis, lobortis vitae felis eget, sagittis lacinia est. Quisque vel sapien vitae mauris auctor imperdiet. Aliquam ac sapien placerat, sagittis sem in, placerat orci. Nam porta lectus vel ante maximus ultrices in sed elit. Nullam congue consectetur neque vel sodales.\r\n\r\nNulla leo tellus, bibendum in dolor non, venenatis euismod nulla. Aliquam consectetur lorem ac imperdiet scelerisque. Integer id elit erat. Maecenas auctor accumsan posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed vestibulum molestie magna vel dignissim. Phasellus viverra laoreet orci eu vehicula. Fusce a velit finibus, commodo augue non, rutrum massa. Phasellus vel cursus mi. Integer tincidunt sapien eleifend ex efficitur efficitur. Cras quis mattis ligula, eget gravida ligula. Aliquam id vulputate tellus, at egestas libero. In et augue id diam fermentum dignissim eu eu enim. Integer feugiat enim sit amet elementum faucibus. Nam ac est vel sapien commodo sodales et ut velit.', '1,2,3,5,6,11,12,18,19,20,23,28,29,34,36,40', 7, 5, '9834567889', 'contact@regence.com', 'www.grandregence.com', 'Rue Saint-Séverin, 75005 Paris', 2.345974, 48.852258, '7756043126-a917a69d6e-o.jpg', '2022-04-12 16:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotels_gallery`
--

CREATE TABLE `tbl_hotels_gallery` (
  `gallery_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `hotel_id` int(4) NOT NULL,
  `uploded_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hotels_gallery`
--

INSERT INTO `tbl_hotels_gallery` (`gallery_id`, `file_name`, `hotel_id`, `uploded_at`) VALUES
(7, '8677474986-c8a69c55ec-k.jpg', 1, '2022-04-11 18:32:02'),
(8, '2412202273-b70512850c-o.jpg', 1, '2022-04-11 18:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `max_children` int(4) NOT NULL,
  `max_adults` int(4) NOT NULL,
  `max_people` int(4) NOT NULL,
  `facility_ids` text NOT NULL,
  `number_of_rooms` int(11) NOT NULL,
  `price` double NOT NULL,
  `coverimage` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`id`, `name`, `description`, `hotel_id`, `max_children`, `max_adults`, `max_people`, `facility_ids`, `number_of_rooms`, `price`, `coverimage`, `created_at`) VALUES
(2, 'Luxury bungalow', 'If you chose to stay with us you will enjoy modern room comforts in a traditional setting. Whether you are looking for a short weekend break or a longer holiday, we offer a range of packages that we think cater for all. Not only will you benefit from beautiful accommodation and stunning immediate surroundings, we are a short walk from a vibrant town centre and only 5 minutes by car from the coast and many other attractions.\r\n\r\nAt the moment we are offering two nights for the price of one on all rooms until the end of March, so you could enjoy a long weekend stay for as little as $40.00.', 1, 1, 3, 3, '3,5,6,8,10,17', 2, 2000, '8677474986-c8a69c55ec-k.jpg', '2022-04-05 12:25:20'),
(3, 'Suite room', 'Sed ultricies ligula in ex varius aliquet. In imperdiet urna quis sem commodo aliquam. Praesent mollis arcu justo, id iaculis sem venenatis vitae. Aenean neque turpis, lobortis vitae felis eget, sagittis lacinia est.\r\n\r\nQuisque vel sapien vitae mauris auctor imperdiet. Aliquam ac sapien placerat, sagittis sem in, placerat orci. Nam porta lectus vel ante maximus ultrices in sed elit. Nullam congue consectetur neque vel sodales.', 2, 0, 2, 2, '4,5,6,7,8,12,13', 1, 810, '2412202273-b70512850c-o.jpg', '2022-04-05 12:26:41'),
(7, 'dilux', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a quam at felis ullamcorper pulvinar nec a massa. Praesent cursus tellus non posuere porta. Quisque sollicitudin enim eu lectus facilisis, et iaculis diam consectetur. Curabitur ac diam ut tortor efficitur eleifend. Nulla congue cursus ante, et scelerisque nibh cursus ac. Nullam eleifend libero ut tempus vehicula. Nulla cursus augue sapien, sed auctor nisi varius vitae. Sed lacinia orci sem, sit amet tincidunt nunc volutpat vitae. Vivamus volutpat iaculis condimentum. Aliquam dictum justo at dui vulputate tincidunt. Suspendisse porta ex sed mi convallis, nec condimentum mi tempus.', 12, 2, 3, 5, '1,2,3,6,8', 6, 500, '', '2022-04-20 14:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms_gallery`
--

CREATE TABLE `tbl_rooms_gallery` (
  `gallery_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `room_id` int(11) NOT NULL,
  `uploded_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rooms_gallery`
--

INSERT INTO `tbl_rooms_gallery` (`gallery_id`, `file_name`, `room_id`, `uploded_at`) VALUES
(2, '110222762-cad136c9cb-o.jpg', 2, '2022-04-12 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `mobile_number`, `email`, `address`, `latitude`, `longitude`) VALUES
(1, '9922545896', 'projectcapstone49@gmail.com', 'MG Rode Pune - 411039', '18.626076', '73.812157');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobilenumber` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_role` int(1) NOT NULL,
  `emailverification` varchar(15) NOT NULL DEFAULT 'Pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email`, `password`, `name`, `mobilenumber`, `address`, `user_role`, `emailverification`, `created_at`) VALUES
(1, 'admin@admin.com', 'admin', '', '', '', 0, 'Verified', '2022-04-04 11:38:34'),
(7, 'vaibhav.sulake@gmail.com', '123456', 'vaibhav sulake', '9922545896', 'sadguru nagar bhosari', 1, 'Verified', '2022-04-20 14:00:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emil_verification_temp`
--
ALTER TABLE `emil_verification_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_activities_gallery`
--
ALTER TABLE `tbl_activities_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_destinations`
--
ALTER TABLE `tbl_destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_destinations_gallery`
--
ALTER TABLE `tbl_destinations_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `tbl_hotels`
--
ALTER TABLE `tbl_hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hotels_gallery`
--
ALTER TABLE `tbl_hotels_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rooms_gallery`
--
ALTER TABLE `tbl_rooms_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emil_verification_temp`
--
ALTER TABLE `emil_verification_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_activities_gallery`
--
ALTER TABLE `tbl_activities_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_destinations`
--
ALTER TABLE `tbl_destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_destinations_gallery`
--
ALTER TABLE `tbl_destinations_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_hotels`
--
ALTER TABLE `tbl_hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_hotels_gallery`
--
ALTER TABLE `tbl_hotels_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_rooms_gallery`
--
ALTER TABLE `tbl_rooms_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
