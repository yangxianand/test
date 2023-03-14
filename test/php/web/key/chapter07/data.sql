-- ----------------------------
-- 7.3.1 查询选项
-- ----------------------------
# 创建my_goods表
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
  `comment_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `on_sale_time` datetime DEFAULT NULL COMMENT '上架时间',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
# 插入测试数据
INSERT INTO `my_goods` VALUES 
('1', '3', '0', '', '2B铅笔', '文具', '', ' ', '', '考试专用', '0.50', '500', '4.90', '0', '0', '0', '0', '40000', null, '2020-06-10 16:18:12', null),
('2', '3', '0', '', '钢笔', '文具', '', ' ', '', '练字必不可少', '15.00', '300', '3.90', '0', '0', '0', '0', '500', null, '2020-06-10 16:18:12', null),
('3', '3', '0', '', '碳素笔', '文具', '', '', '', '平时使用', '1.00', '500', '5.00', '0', '0', '0', '0', '98000', null, '2020-06-10 16:18:12', null),
('4', '12', '0', '', '液晶显示器', '电子产品', '', ' ', '', '画质清晰', '5999.00', '0', '2.50', '0', '0', '0', '0', '200', null, '2020-06-10 16:18:12', null),
('5', '6', '0', '', '智能手机', '电子产品', '', ' ', '', '人人必备', '1999.00', '0', '5.00', '0', '0', '0', '0', '98000', null, '2020-06-10 16:18:12', null),
('6', '8', '0', '', '桌面音箱', '电子产品', '', ' ', '', '扩音装备', '69.00', '750', '4.50', '0', '0', '0', '0', '1000', null, '2020-06-10 16:18:12',null),
('7', '9', '0', '', '头戴耳机', '电子产品', '', ' ', '', '独享个人世界', '109.00', '0', '3.90', '0', '0', '0', '0', '500', null, '2020-06-10 16:18:12', null),
('8', '10', '0', '', '办公计算机', '电子产品', '', ' ', '', '适合办公', '2000.00', '0', '4.80', '0', '0', '0', '0', '6000', null, '2020-06-10 16:18:12', null),
('9', '15', '0', '', '收腰风衣', '服装', '', ' ', '', '春节潮流单品', '299.00', '0', '4.90', '0', '0', '0', '0', '40000', null, '2020-06-10 16:18:12', null),
('10', '16', '0', '', '薄毛衣', '服装', '', ' ', '', '居家旅行必备', '48.00', '0', '4.80', '0', '0', '0', '0', '98000', null, '2020-06-10 16:18:12', null);
# 查看my_goods表中所有的keyword字段的值
SELECT `keyword` FROM `my_goods`;
# 查看my_goods表中去除重复记录的keyword字段值
SELECT DISTINCT `keyword` FROM `my_goods`;

-- ----------------------------
-- 7.3.2 运算符
-- ----------------------------
--2.逻辑运算符
# 查询my_goods表中价格在2000到6000的商品，商品信息包括id、name和price
SELECT `id`,`name`,`price` FROM `my_goods` WHERE `price` BETWEEN 2000 AND 6000;
# 查询my_goods表中关键词为电子产品的5星商品，商品信息包括id、name和price
SELECT `id`,`name`,`price` FROM `my_goods` WHERE `keyword`='电子产品' && `score`=5;

-- ----------------------------
-- 7.3.3 分组
-- ----------------------------
--1.分组
# 通过聚合函数MAX()获取每个分类下商品的最高价格
SELECT `category_id`,MAX(`price`) FROM `my_goods` GROUP BY `category_id`;
--2.回溯统计
# 查看my_goods中每个分类下的商品数量
SELECT `category_id`,COUNT(*) FROM `my_goods` GROUP BY `category_id` WITH ROLLUP;
# 多分组回溯统计
SELECT `score`,`comment_count`,COUNT(*) FROM `my_goods` GROUP BY `score`, `comment_count` WITH ROLLUP;
--3.排序
SELECT `category_id`,GROUP_CONCAT(`id`),GROUP_CONCAT(`name`) FROM `my_goods` GROUP BY `category_id` DESC;
--4.HAVING子句
SELECT `score`,`comment_count`,GROUP_CONCAT(`id`) FROM `my_goods` GROUP BY `score`,`comment_count` HAVING COUNT(*)=2;

-- ----------------------------
-- 7.3.4 排序
-- ----------------------------
# 单字段排序，按照商品价格从高到低排序
SELECT `id`,`name,`price` FROM `my_goods` ORDER BY `price` DESC;
# 多字段排序，按照商品分类升序、商品价格降序排序
SELECT `category_id`,`id`,`name`,`price` FROM `my_goods` ORDER BY `category_id`,`price` DESC;
# 中文排序
SELECT `id`,`name` FROM `my_goods` ORDER BY CONVERT(`name` USING gbk) ASC;

-- ----------------------------
-- 7.3.5 限量
-- ----------------------------
# 限制记录数
SELECT `id`,`name`,`price` FROM `my_goods` ORDER BY `price` DESC LIMIT 1;
# 获取指定区间的记录
SELECT `id`,`name`,`price` FROM `my_goods` LIMIT 0, 5;

-- ----------------------------
-- 7.4.1 什么是联合查询
-- ----------------------------
# 获取my_goods中category_id为9的商品id、name和price，以及category_id为6的商品id、name和keyword
SELECT `id`,`name`,`price` FROM `my_goods` WHERE `category_id`=9 UNION SELECT `id`,`name`,`keyword` FROM `my_goods` WHERE `category_id`=6;

-- ----------------------------
-- 7.4.2 联合查询并排序
-- ----------------------------
# 对my_goods中category_id为3的商品按价格升序排序，其他类型的商品按价格降序排序，查询的商品信息为id、name和price
(SELECT `id`,`name`,`price` FROM `my_goods` WHERE `category_id`<>3 ORDER BY `price` DESC LIMIT 7) UNION (SELECT `id`,`name`,`price` FROM `my_goods` WHERE `category_id`=3 ORDER BY `price` ASC LIMIT 3);

-- ----------------------------
-- 7.5.1 交叉连接
-- ----------------------------
# 创建商品分类表
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
# 插入测试数据
INSERT INTO `my_goods_category` VALUES
('1', '0', '办公', '0', '0', '2020-06-11 10:56:27', null),
('2', '1', '耗材', '0', '0', '2020-06-11 10:56:27', null),
('3', '2', '文具', '0', '0', '2020-06-11 10:56:27', null),
('4', '0', '电子产品', '0', '0', '2020-06-11 10:56:27', null),
('5', '4', '通讯', '0', '0', '2020-06-11 10:56:27', null),
('6', '5', '手机', '0', '0', '2020-06-11 10:56:27', null),
('7', '4', '影音', '0', '0', '2020-06-11 10:56:27', null),
('8', '7', '音箱', '0', '0', '2020-06-11 10:56:27', null),
('9', '7', '耳机', '0', '0', '2020-06-11 10:56:27', null),
('10', '4', '计算机', '0', '0', '2020-06-11 10:56:27', null),
('11', '10', '台式计算机', '0', '0', '2020-06-11 10:56:27', null),
('12', '10', '显示器', '0', '0', '2020-06-11 10:56:27', null),
('13', '0', '服装', '0', '0', '2020-06-11 10:56:27', null),
('14', '13', '女装', '0', '0', '2020-06-11 10:56:27', null),
('15', '14', '风衣', '0', '0', '2020-06-11 10:56:27', null),
('16', '14', '毛衣', '0', '0', '2020-06-11 10:56:27', null);
# 将商品分类表my_goods_category和商品表my_goods交叉连接
SELECT c.`id` cid, c.`name` cname, g.`id` gid, g.`name` gname FROM `my_goods_category` AS c CROSS JOIN `my_goods` AS g;

-- ----------------------------
-- 7.5.2 内连接
-- ----------------------------
SELECT g.`id` gid, g.`name` gname, c.`id` cid, c.`name` cname FROM `my_goods` g JOIN `my_goods_category` c ON g.`category_id`=c.`id`;

-- ----------------------------
-- 7.5.3 外连接
-- ----------------------------
--1.左外连接
SELECT g.`id` gid, g.`name` gname, c.`id` cid, c.`name` cname FROM `my_goods` g LEFT JOIN `my_goods_category` c ON g.`category_id`=c.`id` AND g.`score`=5;
--2.右外连接
SELECT g.`id` gid, g.`name` gname, c.`id` cid, c.`name` cname FROM `my_goods` g RIGHT JOIN `my_goods_category` c ON c.`id`=g.`category_id` AND g.`score`=5;

-- ----------------------------
-- 7.5.4 自然连接
-- ----------------------------
# 创建my_student数据表并插入数据
CREATE TABLE `my_student` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    `c_id` int(11) DEFAULT NULL COMMENT '课程id',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `my_student` VALUES ('1', '小明', '1');
INSERT INTO `my_student` VALUES ('2', '张三', '1');
INSERT INTO `my_student` VALUES ('3', '李四', '2');
# 创建my_course数据表并插入数据
CREATE TABLE `my_course` (
    `c_id` int(11) NOT NULL,
    `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `my_course` VALUES ('1', '软件工程');
INSERT INTO `my_course` VALUES ('2', '页面设计');
# 自然连接查询
SELECT * FROM `my_student` NATURAL JOIN `my_course`;

-- ----------------------------
-- 7.5.5 USING关键字
-- ----------------------------
SELECT DISTINCT g1.`id`, g1.`name` FROM `my_goods` g1 JOIN `my_goods` g2 USING(`category_id`) WHERE g2.`name`='钢笔';

-- ----------------------------
-- 7.6.2 标量子查询
-- ----------------------------
SELECT name FROM `my_goods_category` WHERE `id`=(SELECT `category_id` FROM `my_goods` WHERE `name`='智能手机');

-- ----------------------------
-- 7.6.3 列子查询
-- ----------------------------
SELECT `name` FROM `my_goods_category` WHERE `id` IN(SELECT DISTINCT `category_id` FROM `my_goods`);

-- ----------------------------
-- 7.6.4 行子查询
-- ----------------------------
SELECT `id`,`name`,`price`,`score`,`content` FROM `my_goods` WHERE (`price`,`score`) = (SELECT MAX(`price`), MIN(`score`) FROM `my_goods`);

-- ----------------------------
-- 7.6.5 表子查询
-- ----------------------------
SELECT a.`id`, a.`name`, a.`price`, a.`category_id`  FROM `my_goods` a,(SELECT `category_id`, MAX(`price`) max_price FROM `my_goods` GROUP BY `category_id`) b WHERE a.`category_id`=b.`category_id` AND a.`price`=b.`max_price`;

-- ----------------------------
-- 7.6.5 子查询关键字
-- ----------------------------
UPDATE `my_goods` SET `name`='电饭煲', `price`='599', `category_id`=(SELECT `id` FROM `my_goods_category` WHERE `name`='厨具') WHERE EXISTS(SELECT `id` FROM `my_goods_category` WHERE `name`='厨具') AND `id`=5;

-- ----------------------------
-- 7.7.1 什么是外键
-- ----------------------------
# 在mydb数据库下创建主表
CREATE TABLE `majors`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL UNIQUE
)DEFAULT CHARSET=utf8;
# 在mydb数据库下创建从表，添加外键约束
CREATE TABLE `student`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL,
    `mid` INT NOT NULL,
     CONSTRAINT `m_id` FOREIGN KEY(`mid`) REFERENCES majors(`id`)
)DEFAULT CHARSET=utf8;

-- ----------------------------
-- 7.7.2 添加外键约束
-- ----------------------------
# 删除student表
DROP TABLE `student`;
# 重新创建student表，添加外键约束
CREATE TABLE `student`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL,
    `mid` INT NOT NULL,
    CONSTRAINT `m_id` FOREIGN KEY(`mid`) REFERENCES majors(`id`)
    ON DELETE RESTRICT ON UPDATE CASCADE
)DEFAULT CHARSET=utf8;
# 为专业表插入数据
INSERT INTO `majors` VALUES(1, '计算机'), (2, '前端');
# 为学生表插入数据
INSERT INTO `student` VALUES(1, 'Tom', 1), (2, 'Jack', 1), (3, 'Alen', 2);
--1.更新数据
UPDATE majors SET id=3 WHERE name='计算机';
SELECT name, mid FROM student;
--2.删除数据
DELETE FROM `majors` WHERE `id`=3;
# 先删除从表中对应的数据，然后再删除主表中的数据
DELETE FROM `student` WHERE `mid`=3;
DELETE FROM `majors` WHERE `id`=3;

-- ----------------------------
-- 7.7.3 外键管理
-- ----------------------------
--2.删除外键
ALTER TABLE `student` DROP FOREIGN KEY `m_id`;