-- MySQL dump 10.16  Distrib 10.1.31-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: nisrocha_nisroch
-- ------------------------------------------------------
-- Server version	10.1.31-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addcart`
--

DROP TABLE IF EXISTS `addcart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addcart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceId` int(255) NOT NULL,
  `prod_id` int(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `hsn` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `mdate` varchar(255) NOT NULL,
  `edate` varchar(255) NOT NULL,
  `psize` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `quantitytype` varchar(255) NOT NULL,
  `base_price` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1448 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(25) NOT NULL,
  `number` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `doj` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `billing`
--

DROP TABLE IF EXISTS `billing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billing` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `Invoice` varchar(255) NOT NULL,
  `Billtaxtype` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `Distributor_id` int(11) NOT NULL,
  `current_limit` double NOT NULL,
  `credit1` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `ProductType` varchar(25) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_time` time NOT NULL,
  `gst_mode` varchar(255) NOT NULL,
  `payable_amount` varchar(255) NOT NULL,
  `grandtotal` varchar(255) NOT NULL,
  `gst` double NOT NULL,
  `discount` int(20) NOT NULL,
  `transportType` varchar(2000) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL COMMENT '0-Admin,(-1)-HR,StaffIDs',
  `approved_by` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=556 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `designations` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `distributor`
--

DROP TABLE IF EXISTS `distributor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distributor` (
  `dist_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `bcode` varchar(50) NOT NULL,
  `State` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Pincode` varchar(255) NOT NULL,
  `DAddress` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `pos` varchar(255) NOT NULL,
  `Destination` varchar(255) NOT NULL,
  `pnumber` varchar(255) NOT NULL,
  `npp` varchar(255) NOT NULL,
  `nbp` varchar(255) NOT NULL,
  `nppLimit` int(11) NOT NULL,
  `nbpLimit` int(11) NOT NULL,
  `currentNpp` int(11) NOT NULL,
  `currentNbp` int(11) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL COMMENT '0-Admin,(-1)-HR,StaffIDs',
  `approved_by` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `distributor_special_credit`
--

DROP TABLE IF EXISTS `distributor_special_credit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distributor_special_credit` (
  `dsc_id` int(11) NOT NULL AUTO_INCREMENT,
  `distid` int(11) NOT NULL,
  `date` date NOT NULL,
  `npp_spl_credit` int(11) NOT NULL,
  `nbp_spl_credit` int(11) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dsc_id`),
  KEY `FK_DistributorID` (`distid`),
  CONSTRAINT `FK_DistributorID` FOREIGN KEY (`distid`) REFERENCES `distributor` (`dist_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` time(6) NOT NULL,
  `qtyOut` varchar(255) NOT NULL,
  `dateOut` varchar(10) NOT NULL,
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ledger`
--

DROP TABLE IF EXISTS `ledger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ledger` (
  `ledger_id` int(11) NOT NULL AUTO_INCREMENT,
  `billid` int(11) NOT NULL,
  `inv_id` varchar(255) NOT NULL,
  `paymentType` varchar(255) NOT NULL,
  `ledgerdate` text NOT NULL,
  `time` text NOT NULL,
  `dis_id` int(11) NOT NULL,
  `previousLimt` int(11) NOT NULL,
  `debitamount` double NOT NULL,
  `Credit` int(11) NOT NULL,
  `balance` double NOT NULL,
  `user_balance` double NOT NULL,
  `dis` int(11) NOT NULL,
  `totalcredit` int(11) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`ledger_id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `hsn` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `mfg` varchar(255) NOT NULL,
  `exp` varchar(255) NOT NULL,
  `size` varchar(500) NOT NULL,
  `bagtype` varchar(255) NOT NULL,
  `bagprice` varchar(255) NOT NULL,
  `bagqty` int(11) NOT NULL,
  `casetype` varchar(255) NOT NULL,
  `csize` varchar(255) NOT NULL,
  `caseprice` varchar(255) NOT NULL,
  `caseqty` int(11) NOT NULL,
  `drumtype` varchar(255) NOT NULL,
  `dsize` varchar(255) NOT NULL,
  `drumprice` varchar(255) NOT NULL,
  `drumqty` int(11) NOT NULL,
  `customunit` varchar(255) NOT NULL,
  `customprice` varchar(255) NOT NULL,
  `customqty` int(11) NOT NULL,
  `gst` int(11) NOT NULL,
  `igst` int(11) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=327 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `type` varchar(25) NOT NULL,
  `number` text NOT NULL,
  `address` text,
  `designationid` int(100) DEFAULT NULL,
  `doj` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `staff_addcart`
--

DROP TABLE IF EXISTS `staff_addcart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_addcart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceId` int(255) NOT NULL,
  `prod_id` int(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `hsn` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `mdate` varchar(255) NOT NULL,
  `edate` varchar(255) NOT NULL,
  `psize` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `quantitytype` varchar(255) NOT NULL,
  `base_price` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'StaffID',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `staff_distributor`
--

DROP TABLE IF EXISTS `staff_distributor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_distributor` (
  `sd_id` int(11) NOT NULL AUTO_INCREMENT,
  `staffid` int(11) NOT NULL,
  `distid` int(11) NOT NULL,
  `allocated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sd_id`),
  KEY `FK_STAFFID` (`staffid`),
  KEY `FK_DISTID` (`distid`),
  CONSTRAINT `FK_DISTID` FOREIGN KEY (`distid`) REFERENCES `distributor` (`dist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_STAFFID` FOREIGN KEY (`staffid`) REFERENCES `staff` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `staff_enquiry`
--

DROP TABLE IF EXISTS `staff_enquiry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_enquiry` (
  `enquiry_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `remark` text NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`enquiry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `staff_meeting`
--

DROP TABLE IF EXISTS `staff_meeting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_meeting` (
  `meet_id` int(11) NOT NULL AUTO_INCREMENT,
  `meeting_date` date NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `addr_city` varchar(50) NOT NULL,
  `addr_dist` varchar(50) NOT NULL,
  `addr_pin` varchar(50) NOT NULL,
  `concern` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `followup_time` varchar(50) NOT NULL,
  `followup_date` date NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'StaffID',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`meet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `staff_order_request`
--

DROP TABLE IF EXISTS `staff_order_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_order_request` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `Invoice` varchar(255) NOT NULL,
  `Billtaxtype` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `Distributor_id` int(11) NOT NULL,
  `current_limit` double NOT NULL,
  `credit1` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `ProductType` varchar(25) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_time` time NOT NULL,
  `gst_mode` varchar(255) NOT NULL,
  `payable_amount` varchar(255) NOT NULL,
  `grandtotal` varchar(255) NOT NULL,
  `gst` double NOT NULL,
  `discount` int(20) NOT NULL,
  `transportType` varchar(2000) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `staff_visit_dealer`
--

DROP TABLE IF EXISTS `staff_visit_dealer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_visit_dealer` (
  `visit_id` int(11) NOT NULL AUTO_INCREMENT,
  `visit_date` datetime NOT NULL,
  `currentNpp` int(11) NOT NULL,
  `currentNbp` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `followup_time` varchar(50) NOT NULL,
  `followup_date` date NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `DistributorID` int(11) NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'StaffID',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`visit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `staff_visit_farmer`
--

DROP TABLE IF EXISTS `staff_visit_farmer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_visit_farmer` (
  `visit_id` int(11) NOT NULL AUTO_INCREMENT,
  `visit_date` datetime NOT NULL,
  `currentNpp` int(11) NOT NULL,
  `currentNbp` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `followup_time` varchar(50) NOT NULL,
  `followup_date` date NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `DistributorID` int(11) NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'StaffID',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`visit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `transports`
--

DROP TABLE IF EXISTS `transports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transports` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `userregister`
--

DROP TABLE IF EXISTS `userregister`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userregister` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(555) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-18 17:12:18
