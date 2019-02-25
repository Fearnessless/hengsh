-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2019-02-25 01:39:44
-- 服务器版本： 5.6.17
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hengsh`
--

-- --------------------------------------------------------

--
-- 表的结构 `owndata`
--

CREATE TABLE IF NOT EXISTS `owndata` (
  `workid` int(10) NOT NULL DEFAULT '0',
  `loadtime` date DEFAULT NULL,
  `dataid` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`workid`,`dataid`),
  KEY `dataid` (`dataid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pubdata`
--

CREATE TABLE IF NOT EXISTS `pubdata` (
  `id` int(10) NOT NULL DEFAULT '0',
  `company` varchar(50) DEFAULT NULL,
  `legalrep` varchar(10) DEFAULT NULL,
  `regiscap` varchar(10) DEFAULT NULL,
  `builddate` varchar(20) DEFAULT NULL,
  `managestate` varchar(10) DEFAULT NULL,
  `province` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `county` varchar(10) DEFAULT NULL,
  `comtype` varchar(15) DEFAULT NULL,
  `uscc` varchar(40) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `tele` varchar(20) DEFAULT NULL,
  `moretele` varchar(100) DEFAULT NULL,
  `addr` varchar(100) DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `business` varchar(255) DEFAULT NULL,
  `stalker` int(10) DEFAULT NULL,
  `intention` varchar(1) DEFAULT NULL,
  `signed` varchar(10) DEFAULT NULL,
  `intime` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stalker` (`stalker`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `remarks`
--

CREATE TABLE IF NOT EXISTS `remarks` (
  `workid` int(10) NOT NULL DEFAULT '0',
  `dataid` int(10) NOT NULL DEFAULT '0',
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`workid`,`dataid`),
  KEY `dataid` (`dataid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `upfile`
--

CREATE TABLE IF NOT EXISTS `upfile` (
  `fileid` int(10) NOT NULL DEFAULT '0',
  `workid` int(10) DEFAULT NULL,
  `filename` varchar(20) DEFAULT NULL,
  `filepath` varchar(100) DEFAULT NULL,
  `filesize` varchar(10) DEFAULT NULL,
  `uptime` date DEFAULT NULL,
  PRIMARY KEY (`fileid`),
  KEY `workid` (`workid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `worker`
--

CREATE TABLE IF NOT EXISTS `worker` (
  `workid` int(10) NOT NULL DEFAULT '0',
  `password` varchar(10) DEFAULT NULL,
  `workname` varchar(10) DEFAULT NULL,
  `gender` varchar(2) DEFAULT NULL,
  `position` varchar(10) DEFAULT NULL,
  `pid` int(10) NOT NULL DEFAULT '1000',
  `tele` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`workid`),
  UNIQUE KEY `workid` (`workid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `worker`
--

INSERT INTO `worker` (`workid`, `password`, `workname`, `gender`, `position`, `pid`, `tele`) VALUES
(1000, '1000', '金海涛', '男', 'boss', 0, ''),
(1001, '1001', '金晓艳', '女', 'admin', 1000, '1321476952'),
(1002, '1002', '衣斌健', '男', 'stuff', 1000, '1575040035');

--
-- 限制导出的表
--

--
-- 限制表 `owndata`
--
ALTER TABLE `owndata`
  ADD CONSTRAINT `owndata_ibfk_1` FOREIGN KEY (`workid`) REFERENCES `worker` (`workid`),
  ADD CONSTRAINT `owndata_ibfk_2` FOREIGN KEY (`dataid`) REFERENCES `pubdata` (`id`);

--
-- 限制表 `pubdata`
--
ALTER TABLE `pubdata`
  ADD CONSTRAINT `pubdata_ibfk_1` FOREIGN KEY (`stalker`) REFERENCES `worker` (`workid`);

--
-- 限制表 `remarks`
--
ALTER TABLE `remarks`
  ADD CONSTRAINT `remarks_ibfk_1` FOREIGN KEY (`workid`) REFERENCES `worker` (`workid`),
  ADD CONSTRAINT `remarks_ibfk_2` FOREIGN KEY (`dataid`) REFERENCES `pubdata` (`id`);

--
-- 限制表 `upfile`
--
ALTER TABLE `upfile`
  ADD CONSTRAINT `upfile_ibfk_1` FOREIGN KEY (`workid`) REFERENCES `worker` (`workid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
