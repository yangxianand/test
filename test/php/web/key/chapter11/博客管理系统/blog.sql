/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2020-05-08 15:01:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `b_article`
-- ----------------------------
DROP TABLE IF EXISTS `b_article`;
CREATE TABLE `b_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `a_title` varchar(20) NOT NULL COMMENT '文章标题',
  `a_content` text NOT NULL COMMENT '文章内容',
  `c_id` int(10) unsigned NOT NULL COMMENT '分类id',
  `u_id` int(10) unsigned NOT NULL COMMENT '作者id',
  `a_author` varchar(20) NOT NULL COMMENT '作者名字',
  `a_time` int(10) unsigned NOT NULL COMMENT '发表时间',
  `a_status` tinyint(3) unsigned DEFAULT '1' COMMENT '1草稿2公开3隐藏',
  `a_toped` tinyint(3) unsigned DEFAULT '1' COMMENT '1不置顶2置顶',
  `a_img` varchar(50) DEFAULT NULL COMMENT '封面图',
  `a_img_thumb` varchar(50) DEFAULT NULL COMMENT '缩略图',
  `a_is_delete` tinyint(3) unsigned DEFAULT '0' COMMENT '0正常1已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_article
-- ----------------------------
INSERT INTO `b_article` VALUES ('1', 'aaa', 'aaaa', '1', '1', 'admin', '1588214413', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('2', '11', '11', '2', '1', 'admin', '1588216907', '2', '1', null, null, '0');
INSERT INTO `b_article` VALUES ('3', '22', '33222', '4', '1', 'admin', '1588216926', '2', '1', null, null, '0');
INSERT INTO `b_article` VALUES ('4', '3333', '3333', '1', '1', 'admin', '1588216941', '3', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('6', 'aaa', 'aaa', '4', '1', 'admin', '1588226850', '1', '1', null, null, '0');
INSERT INTO `b_article` VALUES ('7', 'T', 'aa', '4', '1', 'admin', '1588226885', '1', '1', null, null, '0');
INSERT INTO `b_article` VALUES ('8', 'sss', 'ssss', '4', '1', 'admin', '1588226916', '1', '1', 'image20200430140836IGRHZD.jpg', null, '0');
INSERT INTO `b_article` VALUES ('9', 'xx', 'xxxx', '2', '1', 'admin', '1588228369', '2', '1', 'image20200430143249MNEXSN.jpg', 'thumb_image20200430143249MNEXSN.jpg', '0');
INSERT INTO `b_article` VALUES ('10', 'aa', 'aa', '1', '1', 'admin', '1588230218', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('11', '11', '11', '1', '1', 'admin', '1588230237', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('12', 'qsds', 'sdsd', '1', '1', 'admin', '1588230302', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('13', 'cxzcx', 'cxc', '1', '1', 'admin', '1588230395', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('14', '的', '错', '1', '1', 'admin', '1588230407', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('15', 'd', 'd', '1', '1', 'admin', '1588230455', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('16', '想咨询z', '想', '1', '1', 'admin', '1588230466', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('17', 'zzz', 'aaaa', '1', '1', 'admin', '1588230483', '1', '2', 'image20200430150803QNCDKZ.jpg', 'thumb_image20200430150803QNCDKZ.jpg', '0');
INSERT INTO `b_article` VALUES ('18', 'ds', 'sds', '1', '1', 'admin', '1588230557', '1', '2', 'image20200430150917FVCNLX.jpg', 'thumb_image20200430150917FVCNLX.jpg', '0');
INSERT INTO `b_article` VALUES ('19', 'xc', 'xc', '1', '1', 'admin', '1588230566', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('20', 'xzxzx', 'zxzx', '1', '1', 'admin', '1588230614', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('21', 'x', 'x', '1', '1', 'admin', '1588230675', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('22', 'a', 'a', '1', '1', 'admin', '1588230686', '1', '2', 'image20200430151126YWMAFQ.jpg', 'thumb_image20200430151126YWMAFQ.jpg', '0');
INSERT INTO `b_article` VALUES ('23', 'sss', 'aaaa', '1', '1', 'admin', '1588230923', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('24', 'dfd', 'dfdf', '1', '1', 'admin', '1588230935', '1', '2', 'image20200430151535GGJEKM.jpg', 'thumb_image20200430151535GGJEKM.jpg', '0');
INSERT INTO `b_article` VALUES ('25', 'sss', 'ssss', '1', '1', 'admin', '1588231092', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('26', 'cxc', 'xcxc', '1', '1', 'admin', '1588231104', '2', '2', 'image20200430151824SMVFQH.jpg', 'thumb_image20200430151824SMVFQH.jpg', '0');
INSERT INTO `b_article` VALUES ('27', 'xcxc', 'xcxcxc', '1', '1', 'admin', '1588231136', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('28', 'ssss', 'sdsd', '1', '1', 'admin', '1588231147', '1', '2', 'image20200430151907WGZYOP.jpg', 'thumb_image20200430151907WGZYOP.jpg', '0');
INSERT INTO `b_article` VALUES ('29', 'dsadas', 'asdasd', '1', '1', 'admin', '1588561549', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('30', 'asddd', 'sdsd', '1', '1', 'admin', '1588561558', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('31', 'asdddd', 'sdsddd', '1', '1', 'admin', '1588561564', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('32', 'asdddddd', 'sdsddddd', '1', '1', 'admin', '1588561567', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('33', 'asddddddd', 'sdsdddddd', '1', '1', 'admin', '1588561570', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('34', 'asdddddddd', 'sdsddddddd', '1', '1', 'admin', '1588561573', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('35', 'asddddddddd', 'sdsdddddddd', '1', '1', 'admin', '1588561577', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('36', 'asdddddddddd', 'sdsddddddddd', '1', '1', 'admin', '1588561581', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('37', 'd', 'd', '1', '1', 'admin', '1588561595', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('38', 'dd', 'dd', '1', '1', 'admin', '1588561598', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('39', 'ddd', 'ddd', '1', '1', 'admin', '1588561601', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('40', 'dddd', 'dddd', '1', '1', 'admin', '1588561604', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('41', 'ddddd', 'ddddd', '1', '1', 'admin', '1588561607', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('42', 'dddddd', 'dddddd', '1', '1', 'admin', '1588561610', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('43', 'ddddddd', 'ddddddd', '1', '1', 'admin', '1588561613', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('44', 's', 's', '1', '1', 'admin', '1588562450', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('45', 'ss', 'ss', '1', '1', 'admin', '1588562453', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('46', 'sss', 'ss', '1', '1', 'admin', '1588562455', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('47', 'ssss', 'ss', '1', '1', 'admin', '1588562458', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('48', 'sssss', 'ss', '1', '1', 'admin', '1588562460', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('49', 'ssssss', 'ss', '1', '1', 'admin', '1588562462', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('50', 'sssssss', 'ss', '1', '1', 'admin', '1588562465', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('51', 'ssssssss', 'ss', '1', '1', 'admin', '1588562469', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('52', 'sssssssss', 'ss', '1', '1', 'admin', '1588562472', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('53', 'ssssssssss', 'ss', '1', '1', 'admin', '1588562474', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('54', 'sssssssssss', 'ss', '1', '1', 'admin', '1588562477', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('55', 'ssssssssssss', 'ss', '1', '1', 'admin', '1588562480', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('56', 'sssssssssssss', 'ss', '1', '1', 'admin', '1588562482', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('57', 'ssssssssssssss', 'ss', '1', '1', 'admin', '1588562485', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('58', 'sssssssssssssss', 'ss', '1', '1', 'admin', '1588562488', '1', '2', null, null, '0');
INSERT INTO `b_article` VALUES ('59', '1', '1', '7', '1', 'admin', '1588667967', '1', '2', null, null, '0');

-- ----------------------------
-- Table structure for `b_category`
-- ----------------------------
DROP TABLE IF EXISTS `b_category`;
CREATE TABLE `b_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_name` varchar(10) NOT NULL COMMENT '分类名称',
  `c_sort` int(10) unsigned DEFAULT '0' COMMENT '排序',
  `c_parent_id` int(10) unsigned DEFAULT '0' COMMENT '父类id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `c_name` (`c_name`,`c_parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_category
-- ----------------------------
INSERT INTO `b_category` VALUES ('1', 'IT技术', '0', '0');
INSERT INTO `b_category` VALUES ('2', '电子商务', '0', '0');
INSERT INTO `b_category` VALUES ('3', '影视 ', '0', '0');
INSERT INTO `b_category` VALUES ('4', 'PHP', '0', '1');
INSERT INTO `b_category` VALUES ('5', '面向对象', '0', '4');
INSERT INTO `b_category` VALUES ('6', 'MVC思想', '0', '4');
INSERT INTO `b_category` VALUES ('7', '1', '1', '0');

-- ----------------------------
-- Table structure for `b_comment`
-- ----------------------------
DROP TABLE IF EXISTS `b_comment`;
CREATE TABLE `b_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_comment` varchar(50) NOT NULL COMMENT '评论内容',
  `c_time` int(10) unsigned NOT NULL COMMENT '评论时间',
  `u_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `a_id` int(10) unsigned NOT NULL COMMENT '博文id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_comment
-- ----------------------------
INSERT INTO `b_comment` VALUES ('1', '好', '1588755746', '1', '26');

-- ----------------------------
-- Table structure for `b_like`
-- ----------------------------
DROP TABLE IF EXISTS `b_like`;
CREATE TABLE `b_like` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `a_id` int(10) unsigned NOT NULL COMMENT '博文id',
  `l_time` int(10) unsigned NOT NULL COMMENT '点赞时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_like
-- ----------------------------
INSERT INTO `b_like` VALUES ('1', '1', '26', '1588916492');
INSERT INTO `b_like` VALUES ('2', '1', '26', '1588916546');
INSERT INTO `b_like` VALUES ('3', '1', '26', '1588916579');
INSERT INTO `b_like` VALUES ('4', '1', '26', '1588916719');
INSERT INTO `b_like` VALUES ('5', '1', '26', '1588916935');
INSERT INTO `b_like` VALUES ('6', '1', '26', '1588916991');
INSERT INTO `b_like` VALUES ('7', '1', '26', '1588917007');
INSERT INTO `b_like` VALUES ('8', '1', '26', '1588917033');
INSERT INTO `b_like` VALUES ('9', '1', '26', '1588917047');
INSERT INTO `b_like` VALUES ('10', '1', '26', '1588917133');
INSERT INTO `b_like` VALUES ('11', '1', '26', '1588917173');
INSERT INTO `b_like` VALUES ('12', '1', '26', '1588917528');
INSERT INTO `b_like` VALUES ('13', '1', '26', '1588917556');
INSERT INTO `b_like` VALUES ('14', '1', '26', '1588917575');
INSERT INTO `b_like` VALUES ('15', '1', '26', '1588917627');
INSERT INTO `b_like` VALUES ('16', '1', '26', '1588917691');
INSERT INTO `b_like` VALUES ('17', '1', '26', '1588917697');
INSERT INTO `b_like` VALUES ('18', '1', '26', '1588917698');

-- ----------------------------
-- Table structure for `b_user`
-- ----------------------------
DROP TABLE IF EXISTS `b_user`;
CREATE TABLE `b_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_username` varchar(10) NOT NULL DEFAULT '' COMMENT '用户名',
  `u_password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `u_regtime` int(10) unsigned NOT NULL COMMENT '注册时间',
  `u_is_admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否是管理员',
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_username` (`u_username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_user
-- ----------------------------
INSERT INTO `b_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1587973379', '1');
INSERT INTO `b_user` VALUES ('2', 'user', '21232f297a57a5a743894a0e4a801fc3', '1587981682', '0');
INSERT INTO `b_user` VALUES ('3', '123', '123', '1588751209', '0');
INSERT INTO `b_user` VALUES ('4', '111', '698d51a19d8a121ce581499d7b701668', '1588751313', '0');
