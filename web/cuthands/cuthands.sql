-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-01 16:57:42
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuthands`
--

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `content` text,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `content`, `name`, `price`, `description`, `state`) VALUES
(1, '------------------------</br>|          防火墙          </br>------------------------', '天融信防火墙', 0.01, '只需0.01元就能抱走一台！！', 0),
(2, '------------------------</br>|          风险探知          </br>------------------------', '天融信风险探知平系统', 50, '50元畅玩一年！！', 0),
(3, '', '管理员密码', 998, '只要998，管理员密码拿回家', 0),
(4, 'flag{Y0u_th1nk_YOU_c4N_Buy_AnYTHINg}', '低价甩卖flag', 30000, '超低价甩卖本题flag', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `money` double NOT NULL DEFAULT '100',
  `state` int(11) NOT NULL DEFAULT '0',
  `adminName` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `shenlong` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
