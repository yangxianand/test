-- MySQL dump 10.13  Distrib 5.7.24, for Win32 (AMD64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `id` int(11) DEFAULT NULL COMMENT '编号',
  `name` varchar(32) DEFAULT NULL COMMENT '商品名',
  `price` int(11) DEFAULT NULL COMMENT '价格',
  `description` varchar(255) DEFAULT NULL COMMENT '商品描述'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (1,'notebook',4998,'High cost performance');
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `majors`
--

DROP TABLE IF EXISTS `majors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `majors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `majors`
--

LOCK TABLES `majors` WRITE;
/*!40000 ALTER TABLE `majors` DISABLE KEYS */;
INSERT INTO `majors` VALUES (2,'前端');
/*!40000 ALTER TABLE `majors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_auto`
--

DROP TABLE IF EXISTS `my_auto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_auto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_auto`
--

LOCK TABLES `my_auto` WRITE;
/*!40000 ALTER TABLE `my_auto` DISABLE KEYS */;
INSERT INTO `my_auto` VALUES (1,'Tom'),(2,'Jack'),(5,'Alex'),(6,'Andy');
/*!40000 ALTER TABLE `my_auto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_char`
--

DROP TABLE IF EXISTS `my_char`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_char` (
  `c1` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_char`
--

LOCK TABLES `my_char` WRITE;
/*!40000 ALTER TABLE `my_char` DISABLE KEYS */;
INSERT INTO `my_char` VALUES ('12345');
/*!40000 ALTER TABLE `my_char` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_course`
--

DROP TABLE IF EXISTS `my_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_course`
--

LOCK TABLES `my_course` WRITE;
/*!40000 ALTER TABLE `my_course` DISABLE KEYS */;
INSERT INTO `my_course` VALUES (1,'软件工程'),(2,'页面设计');
/*!40000 ALTER TABLE `my_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_date`
--

DROP TABLE IF EXISTS `my_date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_date` (
  `d` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_date`
--

LOCK TABLES `my_date` WRITE;
/*!40000 ALTER TABLE `my_date` DISABLE KEYS */;
INSERT INTO `my_date` VALUES ('2020-01-01'),('2020-06-09'),('2020-06-09');
/*!40000 ALTER TABLE `my_date` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_datetime`
--

DROP TABLE IF EXISTS `my_datetime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_datetime` (
  `st` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_datetime`
--

LOCK TABLES `my_datetime` WRITE;
/*!40000 ALTER TABLE `my_datetime` DISABLE KEYS */;
INSERT INTO `my_datetime` VALUES ('2020-06-09 09:35:06',NULL),('2020-06-09 09:35:41','2020-06-09 17:35:41');
/*!40000 ALTER TABLE `my_datetime` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_decimal`
--

DROP TABLE IF EXISTS `my_decimal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_decimal` (
  `d1` decimal(4,2) DEFAULT NULL,
  `d2` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_decimal`
--

LOCK TABLES `my_decimal` WRITE;
/*!40000 ALTER TABLE `my_decimal` DISABLE KEYS */;
INSERT INTO `my_decimal` VALUES (1.23,1.24);
/*!40000 ALTER TABLE `my_decimal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_default`
--

DROP TABLE IF EXISTS `my_default`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_default` (
  `name` varchar(10) DEFAULT NULL,
  `age` int(10) unsigned DEFAULT '18'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_default`
--

LOCK TABLES `my_default` WRITE;
/*!40000 ALTER TABLE `my_default` DISABLE KEYS */;
INSERT INTO `my_default` VALUES (NULL,18),('a',18),('b',NULL),('c',18);
/*!40000 ALTER TABLE `my_default` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_enum`
--

DROP TABLE IF EXISTS `my_enum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_enum` (
  `gender` enum('male','female') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_enum`
--

LOCK TABLES `my_enum` WRITE;
/*!40000 ALTER TABLE `my_enum` DISABLE KEYS */;
INSERT INTO `my_enum` VALUES ('male'),('female');
/*!40000 ALTER TABLE `my_enum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_float`
--

DROP TABLE IF EXISTS `my_float`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_float` (
  `f1` float DEFAULT NULL,
  `f2` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_float`
--

LOCK TABLES `my_float` WRITE;
/*!40000 ALTER TABLE `my_float` DISABLE KEYS */;
INSERT INTO `my_float` VALUES (111111,1.11111),(1111110,1.11111),(1111110,1.11111),(11111100,1.11112);
/*!40000 ALTER TABLE `my_float` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_goods`
--

DROP TABLE IF EXISTS `my_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `category_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `spu_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'SPU id',
  `sn` varchar(20) NOT NULL DEFAULT '' COMMENT '编号',
  `name` varchar(120) NOT NULL DEFAULT '' COMMENT '名称',
  `keyword` varchar(255) NOT NULL DEFAULT '' COMMENT '关键词',
  `picture` varchar(255) NOT NULL DEFAULT '' COMMENT '图片',
  `tips` varchar(255) NOT NULL DEFAULT ' ' COMMENT '提示',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `content` text NOT NULL COMMENT '详情',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '价格',
  `stock` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `score` decimal(3,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '评分',
  `is_on_sale` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否上架',
  `is_del` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除',
  `is_free_shipping` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT ' 是否包邮',
  `sell_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '销量计数',
  `comment_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论计数',
  `on_sale_time` datetime DEFAULT NULL COMMENT '上架时间',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_goods`
--

LOCK TABLES `my_goods` WRITE;
/*!40000 ALTER TABLE `my_goods` DISABLE KEYS */;
INSERT INTO `my_goods` VALUES (1,3,0,'','2B铅笔','文具','',' ','','考试专用',0.50,500,4.90,0,0,0,0,40000,NULL,'2020-06-10 16:18:12',NULL),(2,3,0,'','钢笔','文具','',' ','','练字必不可少',15.00,300,3.90,0,0,0,0,500,NULL,'2020-06-10 16:18:12',NULL),(3,3,0,'','碳素笔','文具','',' ','','平时使用',1.00,500,5.00,0,0,0,0,98000,NULL,'2020-06-10 16:18:12',NULL),(4,12,0,'','超薄笔记本','电子产品','',' ','','轻小便携',5999.00,0,2.50,0,0,0,0,200,NULL,'2020-06-10 16:18:12',NULL),(5,6,0,'','智能手机','电子产品','',' ','','人人必备',1999.00,0,5.00,0,0,0,0,98000,NULL,'2020-06-10 16:18:12',NULL),(6,8,0,'','桌面音箱','电子产品','',' ','','扩音装备',69.00,750,4.50,0,0,0,0,1000,NULL,'2020-06-10 16:18:12',NULL),(7,9,0,'','头戴耳机','电子产品','',' ','','独享个人世界',109.00,0,3.90,0,0,0,0,500,NULL,'2020-06-10 16:18:12',NULL),(8,10,0,'','办公电脑','电子产品','',' ','','适合办公',2000.00,0,4.80,0,0,0,0,6000,NULL,'2020-06-10 16:18:12',NULL),(9,15,0,'','收腰风衣','服装','',' ','','春节潮流单品',299.00,0,4.90,0,0,0,0,40000,NULL,'2020-06-10 16:18:12',NULL),(10,16,0,'','薄毛衣','服装','',' ','','居家旅行必备',48.00,0,4.80,0,0,0,0,98000,NULL,'2020-06-10 16:18:12',NULL);
/*!40000 ALTER TABLE `my_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_goods_category`
--

DROP TABLE IF EXISTS `my_goods_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_goods_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类id',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `is_show` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT ' 是否显示',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_goods_category`
--

LOCK TABLES `my_goods_category` WRITE;
/*!40000 ALTER TABLE `my_goods_category` DISABLE KEYS */;
INSERT INTO `my_goods_category` VALUES (1,0,'办公',0,0,'2020-06-11 10:56:27',NULL),(2,1,'耗材',0,0,'2020-06-11 10:56:27',NULL),(3,2,'文具',0,0,'2020-06-11 10:56:27',NULL),(4,0,'电子产品',0,0,'2020-06-11 10:56:27',NULL),(5,4,'通讯',0,0,'2020-06-11 10:56:27',NULL),(6,5,'手机',0,0,'2020-06-11 10:56:27',NULL),(7,4,'影音',0,0,'2020-06-11 10:56:27',NULL),(8,7,'音箱',0,0,'2020-06-11 10:56:27',NULL),(9,7,'耳机',0,0,'2020-06-11 10:56:27',NULL),(10,4,'电脑',0,0,'2020-06-11 10:56:27',NULL),(11,10,'台式电脑',0,0,'2020-06-11 10:56:27',NULL),(12,10,'笔记本',0,0,'2020-06-11 10:56:27',NULL),(13,0,'服装',0,0,'2020-06-11 10:56:27',NULL),(14,13,'女装',0,0,'2020-06-11 10:56:27',NULL),(15,14,'风衣',0,0,'2020-06-11 10:56:27',NULL),(16,14,'毛衣',0,0,'2020-06-11 10:56:27',NULL);
/*!40000 ALTER TABLE `my_goods_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_int`
--

DROP TABLE IF EXISTS `my_int`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_int` (
  `int_1` int(11) DEFAULT NULL,
  `int_2` int(10) unsigned DEFAULT NULL,
  `int_3` tinyint(4) DEFAULT NULL,
  `int_4` tinyint(3) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_int`
--

LOCK TABLES `my_int` WRITE;
/*!40000 ALTER TABLE `my_int` DISABLE KEYS */;
INSERT INTO `my_int` VALUES (1000,1000,100,100);
/*!40000 ALTER TABLE `my_int` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_int2`
--

DROP TABLE IF EXISTS `my_int2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_int2` (
  `int_1` int(3) unsigned zerofill DEFAULT NULL,
  `int_2` tinyint(6) unsigned zerofill DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_int2`
--

LOCK TABLES `my_int2` WRITE;
/*!40000 ALTER TABLE `my_int2` DISABLE KEYS */;
INSERT INTO `my_int2` VALUES (1234,000002);
/*!40000 ALTER TABLE `my_int2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_not_null`
--

DROP TABLE IF EXISTS `my_not_null`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_not_null` (
  `n1` int(11) DEFAULT NULL,
  `n2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_not_null`
--

LOCK TABLES `my_not_null` WRITE;
/*!40000 ALTER TABLE `my_not_null` DISABLE KEYS */;
INSERT INTO `my_not_null` VALUES (NULL,20);
/*!40000 ALTER TABLE `my_not_null` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_primary`
--

DROP TABLE IF EXISTS `my_primary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_primary` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_primary`
--

LOCK TABLES `my_primary` WRITE;
/*!40000 ALTER TABLE `my_primary` DISABLE KEYS */;
INSERT INTO `my_primary` VALUES (1,'Tom');
/*!40000 ALTER TABLE `my_primary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_set`
--

DROP TABLE IF EXISTS `my_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_set` (
  `hobby` set('book','game','code') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_set`
--

LOCK TABLES `my_set` WRITE;
/*!40000 ALTER TABLE `my_set` DISABLE KEYS */;
INSERT INTO `my_set` VALUES (''),('book'),('book,code');
/*!40000 ALTER TABLE `my_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_student`
--

DROP TABLE IF EXISTS `my_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `c_id` int(11) DEFAULT NULL COMMENT '课程id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_student`
--

LOCK TABLES `my_student` WRITE;
/*!40000 ALTER TABLE `my_student` DISABLE KEYS */;
INSERT INTO `my_student` VALUES (1,'小明',1),(2,'张三',1),(3,'李四',2);
/*!40000 ALTER TABLE `my_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_table1`
--

DROP TABLE IF EXISTS `my_table1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_table1` (
  `name` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_table1`
--

LOCK TABLES `my_table1` WRITE;
/*!40000 ALTER TABLE `my_table1` DISABLE KEYS */;
INSERT INTO `my_table1` VALUES ('B'),('A'),('b'),('a');
/*!40000 ALTER TABLE `my_table1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_table2`
--

DROP TABLE IF EXISTS `my_table2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_table2` (
  `name` varchar(1) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_table2`
--

LOCK TABLES `my_table2` WRITE;
/*!40000 ALTER TABLE `my_table2` DISABLE KEYS */;
INSERT INTO `my_table2` VALUES ('B'),('A'),('b'),('a');
/*!40000 ALTER TABLE `my_table2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_timestamp`
--

DROP TABLE IF EXISTS `my_timestamp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_timestamp` (
  `t1` int(11) DEFAULT NULL,
  `t2` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `t3` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_timestamp`
--

LOCK TABLES `my_timestamp` WRITE;
/*!40000 ALTER TABLE `my_timestamp` DISABLE KEYS */;
INSERT INTO `my_timestamp` VALUES (3,'2020-06-09 06:49:36','2020-06-09 06:49:36'),(3,'2020-06-09 06:49:36','2020-06-09 06:49:36');
/*!40000 ALTER TABLE `my_timestamp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_unique_1`
--

DROP TABLE IF EXISTS `my_unique_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_unique_1` (
  `id` int(10) unsigned DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_unique_1`
--

LOCK TABLES `my_unique_1` WRITE;
/*!40000 ALTER TABLE `my_unique_1` DISABLE KEYS */;
INSERT INTO `my_unique_1` VALUES (1,NULL),(2,NULL);
/*!40000 ALTER TABLE `my_unique_1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_unique_2`
--

DROP TABLE IF EXISTS `my_unique_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_unique_2` (
  `id` int(10) unsigned DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_unique_2`
--

LOCK TABLES `my_unique_2` WRITE;
/*!40000 ALTER TABLE `my_unique_2` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_unique_2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_unique_3`
--

DROP TABLE IF EXISTS `my_unique_3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_unique_3` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_unique_3`
--

LOCK TABLES `my_unique_3` WRITE;
/*!40000 ALTER TABLE `my_unique_3` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_unique_3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_unique_4`
--

DROP TABLE IF EXISTS `my_unique_4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_unique_4` (
  `id` int(10) unsigned DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  UNIQUE KEY `id` (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_unique_4`
--

LOCK TABLES `my_unique_4` WRITE;
/*!40000 ALTER TABLE `my_unique_4` DISABLE KEYS */;
INSERT INTO `my_unique_4` VALUES (1,'Tom'),(2,'Jack');
/*!40000 ALTER TABLE `my_unique_4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_user`
--

DROP TABLE IF EXISTS `my_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '用户名',
  `money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '金额',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_user`
--

LOCK TABLES `my_user` WRITE;
/*!40000 ALTER TABLE `my_user` DISABLE KEYS */;
INSERT INTO `my_user` VALUES (1,'Alex',900.00),(2,'Bill',1100.00);
/*!40000 ALTER TABLE `my_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_varchar`
--

DROP TABLE IF EXISTS `my_varchar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_varchar` (
  `c2` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_varchar`
--

LOCK TABLES `my_varchar` WRITE;
/*!40000 ALTER TABLE `my_varchar` DISABLE KEYS */;
INSERT INTO `my_varchar` VALUES ('12345');
/*!40000 ALTER TABLE `my_varchar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_year`
--

DROP TABLE IF EXISTS `my_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_year` (
  `y` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_year`
--

LOCK TABLES `my_year` WRITE;
/*!40000 ALTER TABLE `my_year` DISABLE KEYS */;
INSERT INTO `my_year` VALUES (2020);
/*!40000 ALTER TABLE `my_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `mid` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `m_id` (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (3,'Alen',2,16),(4,'Andy',2,19),(6,'Tom',1,18),(7,'Jack',1,20);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `student1`
--

DROP TABLE IF EXISTS `student1`;
/*!50001 DROP VIEW IF EXISTS `student1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `student1` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `mid`,
 1 AS `age`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `student2`
--

DROP TABLE IF EXISTS `student2`;
/*!50001 DROP VIEW IF EXISTS `student2`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `student2` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `mid`,
 1 AS `age`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `student3`
--

DROP TABLE IF EXISTS `student3`;
/*!50001 DROP VIEW IF EXISTS `student3`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `student3` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `mid`,
 1 AS `age`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_student`
--

DROP TABLE IF EXISTS `view_student`;
/*!50001 DROP VIEW IF EXISTS `view_student`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_student` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `mid`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `student1`
--

/*!50001 DROP VIEW IF EXISTS `student1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = gbk */;
/*!50001 SET character_set_results     = gbk */;
/*!50001 SET collation_connection      = gbk_chinese_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `student1` AS select `student`.`id` AS `id`,`student`.`name` AS `name`,`student`.`mid` AS `mid`,`student`.`age` AS `age` from `student` order by `student`.`age` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `student2`
--

/*!50001 DROP VIEW IF EXISTS `student2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = gbk */;
/*!50001 SET character_set_results     = gbk */;
/*!50001 SET collation_connection      = gbk_chinese_ci */;
/*!50001 CREATE ALGORITHM=MERGE */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `student2` AS select `student`.`id` AS `id`,`student`.`name` AS `name`,`student`.`mid` AS `mid`,`student`.`age` AS `age` from `student` order by `student`.`age` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `student3`
--

/*!50001 DROP VIEW IF EXISTS `student3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = gbk */;
/*!50001 SET character_set_results     = gbk */;
/*!50001 SET collation_connection      = gbk_chinese_ci */;
/*!50001 CREATE ALGORITHM=TEMPTABLE */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `student3` AS select `student`.`id` AS `id`,`student`.`name` AS `name`,`student`.`mid` AS `mid`,`student`.`age` AS `age` from `student` order by `student`.`age` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_student`
--

/*!50001 DROP VIEW IF EXISTS `view_student`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = gbk */;
/*!50001 SET character_set_results     = gbk */;
/*!50001 SET collation_connection      = gbk_chinese_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_student` AS select `student`.`id` AS `id`,`student`.`name` AS `name`,`student`.`mid` AS `mid` from `student` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-12 17:58:36
