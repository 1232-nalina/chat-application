-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 12:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `community`
--

-- --------------------------------------------------------

--
-- Table structure for table `community_chat`
--

CREATE TABLE `community_chat` (
  `chatid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `chat_date` datetime NOT NULL,
  `message` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community_chat`
--

INSERT INTO `community_chat` (`chatid`, `userid`, `chatroomid`, `chat_date`, `message`) VALUES
(392, 68, 105, '2023-05-22 08:36:56', 'tlSMsK2efUCeiNtbjujzLoPIVH8GzzlWT88WCQbp4pM='),
(393, 69, 105, '2023-05-22 08:38:13', 'IKr4SMNu2s7LQPd7r6SHUDkymXTOL90ED5PNZGb/rwE='),
(394, 68, 105, '2023-05-22 08:56:23', 'nR25ngWbxmOsOtert42QsrJSK+YM2CF9vrNJ6dtB/JM='),
(395, 68, 105, '2023-05-22 09:20:31', 'ENuGeKHBkk6hvSeAE83Q33OpSPouFetG6LxO20mruQ6o8mfkkF2xVKxiBrm8MXk8sdgSrs3H4vGxW0f8PyZ9E5zFU+zrp0Y02UVPtMnxlnLR4C9F2dhA+CIVkHN5jeORsVgQAhMTkl7owVpRr/uELHpIkrmfs6CicFRoG/kP+DaIsEWjOcBYIuiiVjTbp9ZkGa/zoJ3fuQM6tMsx2BE2SlVav5kNuiTXcBmGIOa2kkmxIxnVdi8Pem33y97VaREAzAp7BI2j9QlQmYH+EQMCfKXOSIidZDLTuWTmqLrAqWP7vRSFQsGcCsfvb6m+aKPWlNIr2iaWXQJGc60zTmO6HQT/SZ2NzuDTgJ+sxi0hPQQVRGz03yPQauVITRkKTJrl+W5FDB6qsjLqJPwtItLlD3B8lr4/xv+KwLDVx2w1iS52aAs4WsKga/qLWA0VXuKJrz7IlcVmCjnamMlxVa85SzgyaK+C0SOn3W3mkTI1tdA='),
(396, 69, 104, '2023-05-22 09:22:28', 'Md0gbT2rzNAEetWBmZmkdHbtZ5ouE0+PhiZcJ2ziUdQ='),
(397, 69, 104, '2023-05-22 09:23:43', 'eU8ye/hBLR9tvJheIutQiep6INy1++imLRfPusguFcE='),
(398, 68, 105, '2023-05-22 09:24:55', 'Wak8zVsktGgL4guKTCTi2IP2mrloSno71hgMUEgy+t8='),
(399, 68, 105, '2023-05-22 09:32:56', 'PqauHClGwdcPMh8n6B4A7eTicrWfL7Bye9wnxI4sGBU='),
(400, 68, 105, '2023-05-22 09:34:25', 'ung58Qnjiwayv3pw/PTC//etbjlcha737NlHVgnItpk='),
(401, 68, 105, '2023-05-22 09:36:50', '22KYA27FvmfT10Pd3kpsfV8XbdTKRAtGsRRiqHcortA='),
(402, 68, 105, '2023-05-22 09:36:53', 'eOU6nxg6M/m0XMnYh4KCruv9WEXf0Tx6qG+COhUhgjw='),
(403, 68, 105, '2023-05-22 09:38:51', 'iedH8ut1qwKTVNsiG+fH7RqCStvijft7JNk4R2F7s5Y='),
(404, 68, 105, '2023-05-22 09:39:22', 'eqpF/8rsueNhFqys1R3e1w2vd+frDjNOM1IjPCwCxeQ='),
(405, 68, 105, '2023-05-22 09:39:25', 'TnDRBfvkllzljfwETT+q+awLPCMkzpVjpI2uT7c3C+8='),
(406, 69, 105, '2023-05-24 11:58:27', 'hRFnkiQazHhvBTXNGCP2/DsYIznAfBliT1yptlyvc3M='),
(407, 68, 105, '2023-05-31 09:12:44', 'IPs8czhZALAIV/zVFwjeLlE3SpLbtk9nBDeNsDxN5NQ='),
(408, 68, 105, '2023-05-31 09:37:40', 'p4mDhLAh/5Oux6f1Mqcetr5LNEPw4/gmmv1Yxt0YQZF8mkLNPYNZuFQRXZD1gJNf'),
(409, 68, 105, '2023-05-31 16:20:30', 'rHMTAFYQ1MD0EX/d0UJc3Sqpj9AbaLbqiYMd4W1ouXI='),
(410, 68, 105, '2023-06-02 16:20:48', '3bv8DreRR2t3kqKX6DQHUbR6byx0bWwBWgA7zsOv0Cs='),
(411, 68, 105, '2023-06-02 16:21:25', 'B0dGIJHZLN3GQ7flKJ492Ml2Xz7QZ9ieABNrMSBTnQE='),
(412, 69, 105, '2023-06-02 16:22:00', 'W64/2Sm7N83fWgN5S/vnMvOFIRXNaWGc5EeJ+jjHKLo='),
(413, 68, 104, '2023-06-08 14:21:00', '29BdrwVXQRcjfvCw9h2IyzdA1AQXk4j/VxUzS13KPOw='),
(414, 69, 104, '2023-06-08 14:23:09', 'DjWrqLb/1xvi3gATC4NdmrEH42AjtxzfXlIjg/dL5ms='),
(415, 68, 104, '2023-06-08 14:27:08', '3Y1Kb8T6P8rgRLNK/h0UQPya9bqHYSZOA/5XK0YxUSk='),
(419, 68, 105, '2023-07-05 09:41:07', 'u1XvmvB300SNpys4Lb1+15hCZJivq5XpNbyR7iXNAOc='),
(420, 68, 105, '2023-07-14 09:03:46', '///bauogecxC78qwH7bTMLMdCYG+D7yc2FaShFYFVm4='),
(421, 68, 105, '2023-07-14 09:05:17', '5/YTuTnZj4TL3+kMHgJsfmE9fsgjFgTggAS8vy8Llbc='),
(422, 68, 105, '2023-07-16 11:59:22', 'qlGXoV99/a32d53zlGsMYzJ/qvOJaqLlUsLXwE59wcQ=');

-- --------------------------------------------------------

--
-- Table structure for table `community_chatgroup`
--

CREATE TABLE `community_chatgroup` (
  `chatroomid` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `chat_password` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL,
  `chat_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community_chatgroup`
--

INSERT INTO `community_chatgroup` (`chatroomid`, `date_created`, `chat_password`, `userid`, `chat_name`) VALUES
(98, '2023-05-12 09:12:38', 'e5tGEmLd', 68, 'trial'),
(101, '2023-05-12 09:19:12', 'bKuH4blH', 69, 'first'),
(104, '2023-05-13 15:34:40', 'esHZbDf3', 68, 'SecondRoom'),
(105, '2023-05-14 07:54:15', 'Rvjw5o9k', 68, 'defense');

-- --------------------------------------------------------

--
-- Table structure for table `community_member`
--

CREATE TABLE `community_member` (
  `chat_memberid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community_member`
--

INSERT INTO `community_member` (`chat_memberid`, `chatroomid`, `userid`) VALUES
(205, 104, 68),
(206, 104, 69),
(207, 105, 68),
(208, 105, 69),
(209, 105, 71),
(210, 105, 72);

-- --------------------------------------------------------

--
-- Table structure for table `community_user`
--

CREATE TABLE `community_user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(150) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `access` int(1) NOT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `activation_code` varchar(255) NOT NULL,
  `verification_id` varchar(255) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `activation_expiry` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community_user`
--

INSERT INTO `community_user` (`userid`, `username`, `email`, `password`, `uname`, `photo`, `access`, `verified`, `activation_code`, `verification_id`, `reset_token`, `activation_expiry`, `created_at`, `updated_at`) VALUES
(68, 'nalina01', '', '2a7ab231792c7f224101e024ddab51b1', 'Nalina Shrestha', 'images/girl_1688529823.jpg', 2, 0, '', '', '', '2023-07-09 16:21:22', '2023-07-09 10:36:22', '2023-07-09 16:21:22'),
(69, 'upasana01', '', '71915e8b10db6a372ac0396501594357', 'Upasana Shakya', 'images/redhair_1683967843.jpg', 2, 0, '', '', '', '2023-07-09 16:21:22', '2023-07-09 10:36:22', '2023-07-09 16:21:22'),
(70, 'nalina02', '', '2a7ab231792c7f224101e024ddab51b1', 'Nalina Shresthaa', '', 2, 0, '', '', '', '2023-07-09 16:21:22', '2023-07-09 10:36:22', '2023-07-09 16:21:22'),
(71, 'test01', '', '60474c9c10d7142b7508ce7a50acf414', 'test', 'images/redhair_1684030328.jpg', 2, 0, '', '', '', '2023-07-09 16:21:22', '2023-07-09 10:36:22', '2023-07-09 16:21:22'),
(72, 'tisha01', '', '956aa47836cf8b6d2900aba09da959f1', 'Tisha Manandhar', 'images/girl_1684639259.jpg', 2, 0, '', '', '', '2023-07-09 16:21:22', '2023-07-09 10:36:22', '2023-07-09 16:21:22'),
(81, 'nalisha01', 'nalinashrestha90@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'nalisha shrestha', 'images/girl_1689501794.jpg', 2, 1, '1363e28484d50aff51bb4db86d4c438d', '19c4a76dd2741d0da81968d332cb4307', '63e993328a56ce22709cfd61c7dcbb12', '2023-07-16 14:46:47', '2023-07-16 09:01:47', '2023-07-16 16:02:14'),
(82, 'angel01', 'nalina.shrestha.bca076@kathford.edu.np', 'eda26046b7c80ca9dc5b9849f37a9977', 'angel shrestha', '', 2, 1, '8e3fdaa6d60284cd043fb37d029c7a9d', '41228d5509358e31b764ee4ced042c72', '', '2023-07-16 15:33:34', '2023-07-16 09:48:34', '2023-07-16 15:35:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community_chat`
--
ALTER TABLE `community_chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `community_chatgroup`
--
ALTER TABLE `community_chatgroup`
  ADD PRIMARY KEY (`chatroomid`);

--
-- Indexes for table `community_member`
--
ALTER TABLE `community_member`
  ADD PRIMARY KEY (`chat_memberid`);

--
-- Indexes for table `community_user`
--
ALTER TABLE `community_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community_chat`
--
ALTER TABLE `community_chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=423;

--
-- AUTO_INCREMENT for table `community_chatgroup`
--
ALTER TABLE `community_chatgroup`
  MODIFY `chatroomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `community_member`
--
ALTER TABLE `community_member`
  MODIFY `chat_memberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `community_user`
--
ALTER TABLE `community_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
