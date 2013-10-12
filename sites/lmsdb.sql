-- phpMyAdmin SQL Dump
-- version 4.0.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2013 at 12:02 PM
-- Server version: 5.6.11-log
-- PHP Version: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lmsdb`
--
-- --------------------------------------------------------

--
-- Table structure for table `adteacherjournal`
--

CREATE TABLE IF NOT EXISTS `adteacherjournal` (
  `ClsID` int(11) NOT NULL,
  `StdID` int(11) NOT NULL,
  `FldID` int(11) NOT NULL,
  `Val` varchar(50) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`ClsID`,`StdID`,`FldID`),
  KEY `FldID` (`FldID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Зөвлөх багшийн журнал';

-- --------------------------------------------------------

--
-- Table structure for table `adteacherjournalfld`
--

CREATE TABLE IF NOT EXISTS `adteacherjournalfld` (
  `JFldID` int(11) NOT NULL AUTO_INCREMENT,
  `FldNm` varchar(25) NOT NULL,
  `ClsID` int(11) NOT NULL,
  `Prmtr` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`JFldID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Зөвлөх багшийн журналын талбар' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `LsnCntID` int(11) NOT NULL,
  `UsrID` int(11) NOT NULL,
  `AttSta` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `IsnDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`LsnCntID`,`UsrID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ирц';

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `CalID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(25) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `Tag` text NOT NULL,
  `StrtDt` datetime NOT NULL,
  `EndDt` datetime NOT NULL,
  `Status` int(11) NOT NULL,
  `IsDay` tinyint(1) NOT NULL,
  `TpUsrID` int(11) NOT NULL,
  `Desc` text NOT NULL,
  `Rpt` text NOT NULL,
  `RptEndDt` datetime NOT NULL,
  `IsPrsnl` tinyint(1) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`CalID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Цаглабар' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `ClsID` int(11) NOT NULL AUTO_INCREMENT,
  `ClsNm` varchar(50) NOT NULL,
  `TchID` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`ClsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Анги' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `classstudent`
--

CREATE TABLE IF NOT EXISTS `classstudent` (
  `ClsID` int(11) NOT NULL,
  `StdID` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`ClsID`,`StdID`),
  KEY `StdID` (`StdID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ангийн оюутан';

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE IF NOT EXISTS `homework` (
  `LsnCntID` int(11) NOT NULL,
  `StdID` int(11) NOT NULL,
  `HWork` text NOT NULL,
  `Pnt` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Даалгавар';

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `InfID` int(11) NOT NULL AUTO_INCREMENT,
  `Info` text NOT NULL,
  `TpUsrID` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`InfID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Мэдээлэл' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `LsnID` int(11) NOT NULL AUTO_INCREMENT,
  `LsnNm` varchar(50) NOT NULL,
  `LsnCd` varchar(25) NOT NULL,
  `LsnCrd` int(11) NOT NULL,
  `LsnYear` int(11) NOT NULL,
  `AttPnt` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`LsnID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Хичээл' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lessoncontent`
--

CREATE TABLE IF NOT EXISTS `lessoncontent` (
  `LsnCntID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `LsnTpID` int(11) NOT NULL,
  `Desc` varchar(200) NOT NULL,
  `UseMtrl` text NOT NULL,
  `Attachment` text NOT NULL,
  `Week` int(11) NOT NULL,
  `Sort` int(11) NOT NULL,
  `SelfPnt` int(11) NOT NULL,
  `SelfEndDt` datetime NOT NULL,
  `LsnID` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`LsnCntID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Хичээлийн агуулга' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lessoncontenttopic`
--

CREATE TABLE IF NOT EXISTS `lessoncontenttopic` (
  `LsnCntID` int(11) NOT NULL AUTO_INCREMENT,
  `TpcID` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`LsnCntID`,`TpcID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Хичээлийн агуулгын сэдэв' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lessondefinition`
--

CREATE TABLE IF NOT EXISTS `lessondefinition` (
  `LsnID` int(11) NOT NULL,
  `FldID` int(11) NOT NULL,
  `FldVal` varchar(200) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`LsnID`,`FldID`,`FldVal`),
  KEY `FldID` (`FldID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Хичээлийн тодрхойлолт';

-- --------------------------------------------------------

--
-- Table structure for table `lessondefinitionform`
--

CREATE TABLE IF NOT EXISTS `lessondefinitionform` (
  `FldID` int(11) NOT NULL AUTO_INCREMENT,
  `FldNm` varchar(25) NOT NULL,
  `IsMulti` tinyint(1) NOT NULL,
  `Sort` int(11) NOT NULL,
  `Prmtr` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`FldID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Хичээлийн тодорхойлолтын маягт' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lessontype`
--

CREATE TABLE IF NOT EXISTS `lessontype` (
  `LsnID` int(11) NOT NULL AUTO_INCREMENT,
  `LsnNm` varchar(200) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`LsnID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Хичээлийн хэлбэр' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `UsrID` int(11) NOT NULL,
  `FldID` int(11) NOT NULL,
  `FldVal` varchar(200) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`UsrID`,`FldID`,`FldVal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Хувийн хэрэг';

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `QstID` int(11) NOT NULL AUTO_INCREMENT,
  `Question` varchar(200) NOT NULL,
  `Answer` varchar(200) NOT NULL,
  `Type` int(11) NOT NULL,
  `Lvl` int(11) NOT NULL,
  `TpcID` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`QstID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Асуулт' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `registrationform`
--

CREATE TABLE IF NOT EXISTS `registrationform` (
  `FldID` int(11) NOT NULL AUTO_INCREMENT,
  `UsrTpID` int(11) NOT NULL,
  `FldNm` varchar(25) NOT NULL,
  `IsMulti` tinyint(1) NOT NULL,
  `Srt` int(11) NOT NULL,
  `Prmtr` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`FldID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Бүртгэлийн маягт' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `relationtype`
--

CREATE TABLE IF NOT EXISTS `relationtype` (
  `RltnID` int(11) NOT NULL AUTO_INCREMENT,
  `RltnNm` varchar(25) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`RltnID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Хамаарлын төрөл' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stdtest`
--

CREATE TABLE IF NOT EXISTS `stdtest` (
  `UsrID` int(11) NOT NULL,
  `TstPrtID` int(11) NOT NULL,
  `StrDt` datetime NOT NULL,
  `EndDt` datetime NOT NULL,
  `Pnt` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`UsrID`,`TstPrtID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Оюутны шалгалт';

-- --------------------------------------------------------

--
-- Table structure for table `studenttestquestion`
--

CREATE TABLE IF NOT EXISTS `studenttestquestion` (
  `UsrID` int(11) NOT NULL,
  `TstID` int(11) NOT NULL,
  `QueID` int(11) NOT NULL,
  `Ans` text NOT NULL,
  `Pnt` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`UsrID`,`TstID`,`QueID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Оюутны шалгалтын асуулт';

-- --------------------------------------------------------

--
-- Table structure for table `studenttimetable`
--

CREATE TABLE IF NOT EXISTS `studenttimetable` (
  `StdID` int(11) NOT NULL,
  `LsnID` int(11) NOT NULL,
  `TchID` int(11) NOT NULL,
  `LsnTpID` int(11) NOT NULL,
  `LsnTm` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`StdID`,`LsnID`,`TchID`,`LsnTpID`,`LsnTm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Оюутны хичээлийн хуваарь';

-- --------------------------------------------------------

--
-- Table structure for table `taskplanner`
--

CREATE TABLE IF NOT EXISTS `taskplanner` (
  `TskID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `Content` text NOT NULL,
  `StrtDt` datetime NOT NULL,
  `EndDt` datetime NOT NULL,
  `TpUsrID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `PntID` int(11) NOT NULL,
  `WorkPer` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`TskID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ажлын төлөвлөгөө' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teachertimetable`
--

CREATE TABLE IF NOT EXISTS `teachertimetable` (
  `LsnID` int(11) NOT NULL,
  `TchID` int(11) NOT NULL,
  `LsnTpID` int(11) NOT NULL,
  `LsnTm` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`LsnID`,`TchID`,`LsnTpID`,`LsnTm`),
  KEY `LsnTpID` (`LsnTpID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Багшийн хичээлийн хуваарь';

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `TstID` int(11) NOT NULL AUTO_INCREMENT,
  `TstNm` varchar(25) NOT NULL,
  `Duration` int(11) NOT NULL,
  `Pnt` int(11) NOT NULL,
  `Line` int(11) NOT NULL,
  `PerPnt` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `LsnID` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`TstID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Шалгалт' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `testpart`
--

CREATE TABLE IF NOT EXISTS `testpart` (
  `TstPrtID` int(11) NOT NULL AUTO_INCREMENT,
  `TstPrtNm` varchar(50) NOT NULL,
  `TstID` int(11) NOT NULL,
  `OpenPnt` int(11) NOT NULL,
  `ClosePnt` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`TstPrtID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Шалгалтын хэсэг' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `testquestion`
--

CREATE TABLE IF NOT EXISTS `testquestion` (
  `TstID` int(11) NOT NULL,
  `TpcID` int(11) NOT NULL,
  `QstLvl` int(11) NOT NULL,
  `Number` int(11) NOT NULL,
  `Pnt` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`TstID`,`TpcID`,`QstLvl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Шалгалтын асуулт';

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `TpcID` int(11) NOT NULL AUTO_INCREMENT,
  `TpcNm` varchar(50) NOT NULL,
  `LsnID` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`TpcID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Сэдэв' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UsrID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `UsrCd` varchar(25) NOT NULL,
  `UsrPw` varchar(25) NOT NULL,
  `UsrNm` varchar(50) NOT NULL,
  `UsrLnm` varchar(50) NOT NULL,
  `UsrPic` varchar(255) NOT NULL,
  `UsrTpID` int(11) NOT NULL,
  `RegIP` varchar(25) NOT NULL,
  `RegDt` datetime NOT NULL,
  `LstEntIP` varchar(25) NOT NULL,
  `LstEntDt` datetime NOT NULL,
  PRIMARY KEY (`UsrID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Хэрэглэгч' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userlesson`
--

CREATE TABLE IF NOT EXISTS `userlesson` (
  `LsnID` int(11) NOT NULL,
  `UsrID` int(11) NOT NULL,
  `RltnID` int(11) NOT NULL,
  `Grp` int(11) NOT NULL,
  `Point70` int(11) NOT NULL,
  `Point30` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`LsnID`,`UsrID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Хэрэглэгчийн хичээл';

-- --------------------------------------------------------

--
-- Table structure for table `userrelation`
--

CREATE TABLE IF NOT EXISTS `userrelation` (
  `UsrID` int(11) NOT NULL,
  `RltdUsrID` int(11) NOT NULL,
  `RltnID` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` datetime NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` datetime NOT NULL,
  PRIMARY KEY (`UsrID`,`RltdUsrID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Хэрэглэгчийн хамаарал';

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `UsrTpID` int(11) NOT NULL AUTO_INCREMENT,
  `UsrTpNm` text NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`UsrTpID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Хэрэглэгчийн төрөл' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wall`
--

CREATE TABLE IF NOT EXISTS `wall` (
  `TpUsrID` int(11) NOT NULL,
  `InsID` int(11) NOT NULL,
  `InsDt` int(11) NOT NULL,
  `UpdID` int(11) NOT NULL,
  `UpdDt` int(11) NOT NULL,
  PRIMARY KEY (`TpUsrID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Самбар';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adteacherjournal`
--
ALTER TABLE `adteacherjournal`
  ADD CONSTRAINT `adteacherjournal_ibfk_2` FOREIGN KEY (`ClsID`) REFERENCES `classstudent` (`ClsID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `adteacherjournal_ibfk_1` FOREIGN KEY (`FldID`) REFERENCES `adteacherjournalfld` (`JFldID`) ON UPDATE CASCADE;

--
-- Constraints for table `adteacherjournalfld`
--
ALTER TABLE `adteacherjournalfld`
  ADD CONSTRAINT `adteacherjournalfld_ibfk_1` FOREIGN KEY (`JFldID`) REFERENCES `adteacherjournal` (`FldID`) ON UPDATE CASCADE;

--
-- Constraints for table `classstudent`
--
ALTER TABLE `classstudent`
  ADD CONSTRAINT `classstudent_ibfk_2` FOREIGN KEY (`StdID`) REFERENCES `user` (`UsrID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `classstudent_ibfk_1` FOREIGN KEY (`ClsID`) REFERENCES `class` (`ClsID`) ON UPDATE CASCADE;

--
-- Constraints for table `lessondefinition`
--
ALTER TABLE `lessondefinition`
  ADD CONSTRAINT `lessondefinition_ibfk_2` FOREIGN KEY (`LsnID`) REFERENCES `lesson` (`LsnID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lessondefinition_ibfk_1` FOREIGN KEY (`FldID`) REFERENCES `lessondefinitionform` (`FldID`) ON UPDATE CASCADE;

--
-- Constraints for table `teachertimetable`
--
ALTER TABLE `teachertimetable`
  ADD CONSTRAINT `teachertimetable_ibfk_1` FOREIGN KEY (`LsnTpID`) REFERENCES `lessontype` (`LsnID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
