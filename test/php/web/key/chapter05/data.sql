-- ----------------------------
-- 5.3.1 创建数据库
-- ----------------------------
CREATE DATABASE `mydb`;

-- ----------------------------
-- 5.3.2 显示数据库
-- ----------------------------
-- 1.	查看MySQL服务器下所有数据库
SHOW DATABASES;
-- 2.	查看指定数据库的创建信息
SHOW CREATE DATABASE `mydb`;

-- ----------------------------
-- 5.3.3 使用数据库
-- ----------------------------
USE `mydb`;

-- ----------------------------
-- 5.3.4 修改数据库
-- ----------------------------
ALTER DATABASE `mydb` CHARSET gbk;

-- ----------------------------
-- 5.3.5 删除数据库
-- ----------------------------
DROP DATABASE `mydb`;
DROP DATABASE IF EXISTS `mydb`;

-- ----------------------------
-- 5.4.1 创建数据表
-- ----------------------------
-- 创建mydb数据库
CREATE DATABASE `mydb`;
-- 选择mydb数据库
USE `mydb`;
-- 创建goods数据表
CREATE TABLE `goods` (
  `id` INT COMMENT '编号',
  `name` VARCHAR(32) COMMENT '商品名',
  `price` INT COMMENT '价格',
  `description` VARCHAR(255) COMMENT '商品描述'
);

-- ----------------------------
-- 5.4.2 显示数据表
-- ----------------------------
--1.显示所有数据表
--创建new_goods表
CREATE TABLE `new_goods` (
   `id` INT COMMENT '编号',
   `name` VARCHAR(32) COMMENT '商品名',
   `price` INT COMMENT '价格',
   `description` VARCHAR(255) COMMENT '商品描述'
);
--显示所有数据表
SHOW TABLES;
--显示关联数据表
SHOW TABLES LIKE '%new%';
--2.显示数据表的创建指令
SHOW CREATE TABLE `new_goods`\G

-- ----------------------------
-- 5.4.3 查看数据表
-- ----------------------------
--所有字段
DESC `new_goods`;
--name字段
DESC `new_goods` `name`;

-- ----------------------------
-- 5.4.4 修改数据表
-- ----------------------------
--修改数据表名称
RENAME TABLE `new_goods` TO `my_goods`;
SHOW TABLES;
--修改表选项
ALTER TABLE `my_goods` CHARSET=gbk;
SHOW CREATE TABLE `my_goods`\G

-- ----------------------------
-- 5.4.5 更改字段
-- ----------------------------
--新增字段
ALTER TABLE `my_goods` ADD `num` INT AFTER `name`;
--调整字段位置
ALTER TABLE `my_goods` MODIFY `description` VARCHAR(255) AFTER `name`;
--更改字段名
ALTER TABLE `my_goods` CHANGE `description` `des` VARCHAR(255);
--修改字段
ALTER TABLE `my_goods` MODIFY `des` CHAR(255);
--删除字段
ALTER TABLE `my_goods` DROP `num`;

-- ----------------------------
-- 5.4.6 删除数据表
-- ----------------------------
DROP TABLE IF EXISTS `my_goods`;

-- ----------------------------
-- 5.5.1 新增数据
-- ----------------------------
--1.为所有字段添加数据
INSERT INTO `goods` VALUES(1, 'notebook', 4998, 'High cost performance');
--2.为部分字段添加数据
INSERT INTO `goods`(`id`,`name`) VALUES (2, 'Mobile phone');
INSERT INTO `goods` SET `id`=2, `name`='Mobile phone';

-- ----------------------------
-- 5.5.2 查看数据
-- ----------------------------
--1.查询表中全部数据
SELECT * FROM `goods`;
--2.查询表中部分字段
SELECT `id`,`name` FROM `goods`;
--3.根据条件查询数据
SELECT * FROM `goods` WHERE `id`=1;

-- ----------------------------
-- 5.5.3 更新数据
-- ----------------------------
UPDATE `goods` SET `price`=5899 WHERE `id`=2;

-- ----------------------------
-- 5.5.4 删除数据
-- ----------------------------
DELETE FROM `goods` WHERE `id`=2;