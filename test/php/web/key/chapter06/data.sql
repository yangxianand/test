-- ----------------------------
-- 6.1.3 字符集变量
-- ----------------------------
SHOW VARIABLES LIKE 'character%';

-- ----------------------------
-- 6.2.2 字符集与校对集的设置
-- ----------------------------
--1.数据库
# 创建数据库，指定字符集为utf8，使用默认校对集utf8_general_ci
CREATE DATABASE `mydb` CHARACTER SET utf8;
# 创建数据库，指定字符集为utf8，校对集为utf8_bin
CREATE DATABASE `mydb` CHARACTER SET utf8 COLLATE utf8_bin;
--2.数据表
CREATE TABLE `my_table` (
  `username` VARCHAR(20)
) CHARACTER SET utf8 COLLATE utf8_bin;
--3.字段
CREATE TABLE `my_table` (
  `username` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_bin
);

-- ----------------------------
-- 6.2.3 校对集的应用
-- ----------------------------
# 创建默认校对规则表（不区分大小写）
CREATE TABLE `my_table1` (
   `name` VARCHAR(1)
)CHARSET utf8mb4;
INSERT INTO `my_table1` VALUES('B'),('A'),('b'),('a');
# 创建二进制校对规则表（区分大小写）
CREATE TABLE `my_table2` (
   `name` VARCHAR(1)
)CHARSET utf8mb4 COLLATE utf8mb4_bin;
INSERT INTO `my_table2` VALUES('B'),('A'),('b'),('a');
# 默认校对规则表排序
SELECT * FROM `my_table1` ORDER BY `name`;
# 二进制校对规则表排序
SELECT * FROM `my_table2` ORDER BY `name`;

-- ----------------------------
-- 6.3.1 数字类型
-- ----------------------------
# id是数字类型，插入字符串类型的数据会报错
INSERT INTO `goods`(`id`,`name`) VALUES('hello', 'Mobile phone');
--1.整数类型
# 创建my_int数据表
USE `mydb`;
CREATE TABLE `my_int`(
    `int_1` INT,
    `int_2` INT UNSIGNED,
    `int_3` TINYINT,
    `int_4` TINYINT UNSIGNED
);
# 插入成功测试
INSERT INTO `my_int` VALUES(1000, 1000, 100, 100);
# 插入失败测试
INSERT INTO `my_int` VALUES(1000, -1000, 100, 100);
--2.显示宽度
CREATE TABLE `my_int2`(
    `int_1` INT(3) ZEROFILL,
    `int_2` TINYINT(6) ZEROFILL
);
DESC `my_int2`;
INSERT INTO `my_int2` VALUES(1234, 2);
SELECT * FROM `my_int2`;
--3.浮点数类型
# 创建表，选取FLOAT类型进行测试
CREATE TABLE `my_float` (`f1` FLOAT, `f2` FLOAT);
# 插入未超出精度的数字
INSERT INTO `my_float` VALUES(111111, 1.11111);
# 插入超出精度的数字
INSERT INTO `my_float` VALUES(1111111, 1.111111);
# 插入7位数，第7位四舍五入
INSERT INTO `my_float` VALUES(1111114, 1.111115);
# 插入8位数，第7位四舍五入，第8位忽略
INSERT INTO `my_float` VALUES(11111149, 1.1111159);
# 查询结果
SELECT * FROM `my_float`;
--4.定点数类型
# 创建表，选取DECIMAL类型进行测试
CREATE TABLE `my_decimal` (`d1` DECIMAL(4,2), `d2` DECIMAL(4,2));
# 插入的小数部分超出范围时，会四舍五入并出现警告
INSERT INTO `my_decimal` VALUES(1.234, 1.235);
SHOW WARNINGS;
# 插入的小数部分四舍五入导致整数部分进位时，插入失败
INSERT INTO `my_decimal` VALUES(99.99, 99.999);
# 查询结果
SELECT * FROM `my_decimal`;

-- ----------------------------
-- 6.3.2 字符串类型
-- ----------------------------
--1.CHAR类型
# 创建表，选取CHAR类型进行测试
CREATE TABLE `my_char` (`c1` char(5));
# 插入小于指定长度的数据
INSERT INTO `my_char` VALUES('12345');
# 插入大于指定长度的数据时，插入失败
INSERT INTO `my_char` VALUES('123456');
--2.VARCHAR类型
# 创建表,选取VARCHAR类型进行测试
CREATE TABLE `my_varchar` (`c2` varchar(5));
# 插入指定长度的数据
INSERT INTO `my_varchar` VALUES('12345');
--4.ENUM类型
# 创建表,选取ENUM类型进行测试
CREATE TABLE `my_enum` (`gender` ENUM('male', 'female'));
# 插入测试数据
INSERT INTO `my_enum` VALUES('male'), ('female');
# 插入枚举列表中没有的值测试
INSERT INTO `my_enum` VALUES('m');
--5.SET类型
# 创建表,选取SET类型进行测试
CREATE TABLE `my_set` (`hobby` SET('book', 'game', 'code'));
# 插入3条测试数据
INSERT INTO `my_set` VALUES('book'), ('book,code');
# 查询记录
SELECT * FROM `my_set`;

-- ----------------------------
-- 6.3.3 时间日期类型
-- ----------------------------
--1.YEAR类型
CREATE TABLE `my_year`(`y` YEAR);	# 设置y字段的数据类型为YEAR
INSERT INTO `my_year` VALUES(2020);	# 插入年份数据为2020年
--2.TIMESTAMP类型
# 创建表，选取TIMESTAMP类型进行测试
CREATE TABLE `my_timestamp` (
    `t1` INT,
    `t2` TIMESTAMP
);
# 插入测试数据
INSERT INTO `my_timestamp` VALUES(1, '2020-01-01 00:00:00'),(2, '20200101000000');
# 查询记录
SELECT * FROM `my_timestamp`;
# 新增t3字段
ALTER TABLE `my_timestamp` ADD `t3` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP;
# 查询记录
SELECT * FROM `my_timestamp`;
# 更新t1的值，查看t3记录的更新时间
UPDATE `my_timestamp` SET `t1`=3;
SELECT * FROM `my_timestamp`;
--3.DATE类型
# 创建表，选取DATE类型进行测试
CREATE TABLE `my_date` (`d` DATE);
# 插入DATE类型的数据
INSERT INTO `my_date` VALUES('2020-01-01');
INSERT INTO `my_date` VALUES(CURRENT_DATE);
INSERT INTO `my_date` VALUES(NOW());
--4.DATETIME类型
# 创建表
CREATE TABLE `my_datetime` (`st` TIMESTAMP, `dt` DATETIME);
# 插入数据
INSERT INTO `my_datetime` VALUES(NULL, NULL);
INSERT INTO `my_date` VALUES(NOW(), NOW());
# 查询数据
SELECT * FROM `my_datetime`;
# 修改时区
SET time_zone = '+9:00';
# 查看数据
SELECT * FROM `my_datetime`;

-- ----------------------------
-- 6.4.2 非空属性
-- ----------------------------
# 创建my_not_null数据表
CREATE TABLE `my_not_null`(
    `n1` INT,
    `n2` INT NOT NULL
);
# 查看表结构
DESC `my_not_null`;
# 省略n2字段，插入失败，提示n2没有默认值
INSERT INTO `my_not_null` VALUES();
# 将n2字段设为NULL，插入失败，提示n2字段不能为NULL
INSERT INTO `my_not_null` VALUES(NULL, NULL);
# 省略n1字段，插入成功
INSERT INTO `my_not_null`(`n2`) VALUES(20);
# 查询结果
SELECT * FROM `my_not_null`;

-- ----------------------------
-- 6.4.3 默认属性
-- ----------------------------
# 创建my_default数据表
CREATE TABLE `my_default`(
    `name` VARCHAR(10),
    `age` INT UNSIGNED DEFAULT 18
);
# 查看表结构
DESC `my_default`;
# 在插入记录时省略name和age字段
INSERT INTO `my_default` VALUES();
# 在插入记录时省略age字段
INSERT INTO `my_default`(`name`) VALUES('a');
# 在age字段中插入NULL值
INSERT INTO `my_default` VALUES('b', NULL);
# 在age字段中使用默认值
INSERT INTO `my_default` VALUES('c', DEFAULT);
# 查询结果
SELECT * FROM `my_default`;

-- ----------------------------
-- 6.4.4 主键属性
-- ----------------------------
# 创建my_primary数据表
CREATE TABLE `my_primary`(
    `id` INT UNSIGNED PRIMARY KEY,
    `name` VARCHAR(20)
);
# 查看表结构
DESC `my_primary`;
# 插入测试记录，插入成功
INSERT INTO `my_primary` VALUES(1, 'Tom');
# 为主键插入NULL值，插入失败
INSERT INTO `my_primary` VALUES(NULL, 'Jack');
# 为主键插入重复值，插入失败
INSERT INTO `my_primary` VALUES(1, 'Alex');

-- ----------------------------
-- 6.4.5 主键管理
-- ----------------------------
# 删除主键属性
ALTER TABLE `my_primary` DROP PRIMARY KEY;
# 查看删除结构
DESC `my_primary`;
# 删除id字段的非空属性
ALTER TABLE `my_primary` MODIFY `id` INT UNSIGNED;
# 添加主键属性
ALTER TABLE `my_primary` ADD PRIMARY KEY (`id`);
# 查看添加结构
DESC `my_primary`;

-- ----------------------------
-- 6.4.6 自增属性
-- ----------------------------
# 创建my_auto数据表,为id字段添加自动增长属性
CREATE TABLE `my_auto` (
    `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(20)
);
# 查看表结构
DESC `my_auto`;
# 插入时省略id字段，将会使用自动增长值
INSERT INTO `my_auto` (`name`) VALUES('Tom');
# 为id字段插入NULL，将会使用自动增长值
INSERT INTO `my_auto` VALUES(NULL, 'Jack');
# 为id字段插入具体值
INSERT INTO `my_auto` VALUES(5, 'Alex');
# 为id字段插入0，使用自动增长值
INSERT INTO `my_auto` VALUES(0, 'Andy');
# 查看表中数据
SELECT * FROM `my_auto`;

-- ----------------------------
-- 6.4.7 自增管理
-- ----------------------------
# 修改自动增长值
ALTER TABLE `my_auto` AUTO_INCREMENT=10;
# 删除自动增长
ALTER TABLE `my_auto` MODIFY `id` INT UNSIGNED;
# 重新为id添加自动增长
ALTER TABLE `my_auto` MODIFY `id` INT UNSIGNED AUTO_INCREMENT;

-- ----------------------------
-- 6.4.8 唯一键属性
-- ----------------------------
# 列级约束
CREATE TABLE `my_unique_1` (
    `id` INT UNSIGNED UNIQUE,
    `name` VARCHAR(10) UNIQUE
);
# 表级约束
CREATE TABLE `my_unique_2`(
    `id` INT UNSIGNED,
    `name` VARCHAR(10),
    UNIQUE(`id`),
    UNIQUE(`name`)
);
# 插入不重复记录，插入成功
INSERT INTO `my_unique_1` (`id`) VALUES(1);
INSERT INTO `my_unique_1` (`id`) VALUES(2);
# 插入重复记录，插入失败
INSERT INTO `my_unique_1` (`id`) VALUES(1);
# 查看插入结果
SELECT * FROM `my_unique_1`;

-- ----------------------------
-- 6.4.9 唯一键管理
-- ----------------------------
# 创建测试表
CREATE TABLE `my_unique_3`(`id` INT);
# 添加唯一属性
ALTER TABLE `my_unique_3` ADD UNIQUE(`id`);
# 查看添加结果
SHOW CREATE TABLE `my_unique_3`\G
# 删除唯一约束
ALTER TABLE `my_unique_3` DROP INDEX `id`;
# 查看删除结果
SHOW CREATE TABLE `my_unique_3`\G

--复合唯一键属性
# 创建测试表
CREATE TABLE `my_unique_4` (
    `id` INT UNSIGNED, `name` VARCHAR(10),
    UNIQUE(`id`, `name`)
);
# 插入不重复记录，插入成功
INSERT INTO `my_unique_4` VALUES(1, 'Tom');
INSERT INTO `my_unique_4` VALUES(2, 'Jack');
# 插入重复记录，插入失败
INSERT INTO `my_unique_4` VALUES(1, 'Tom');