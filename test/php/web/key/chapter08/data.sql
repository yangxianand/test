-- ----------------------------
-- 8.1.3 事务处理
-- ----------------------------
# 创建用户表并插入数据
CREATE TABLE `my_user`(
    `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT '用户id',
    `name` VARCHAR(100) NOT NULL UNIQUE DEFAULT '' COMMENT '用户名',
    `money` DECIMAL(10,2) UNSIGNED NOT NULL DEFAULT 0 COMMENT '金额'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `my_user`(`id`,`name`,`money`)VALUES(1, 'Alex', 1000), (2, 'Bill', 1000);
# 开启事务
START TRANSACTION;
# Alex减少100元
UPDATE `my_user` SET `money`=`money`-100 WHERE `name`='Alex';
# Bill增加100元
UPDATE `my_user` SET `money`=`money`+100 WHERE `name`='Bill';
# 提交事务
COMMIT;
# 查询用户表
SELECT `name`,`money` FROM `my_user`;
--事务回滚
# 开启事务
START TRANSACTION;
# Bill扣除100元
UPDATE `my_user` SET `money`=`money`-100 WHERE `name`='Bill';
# 查询Bill余额
SELECT `name`,`money` FROM `my_user` WHERE `name`='Bill';
# 回滚事务
ROLLBACK;
# 查看Bill的金额
SELECT `name`,`money` FROM `my_user` WHERE `name`='Bill';
--事务保存点
# 开启事务
START TRANSACTION;
# Alex扣除100元
UPDATE `my_user` SET `money`=`money`-100 WHERE `name`='Alex';
# 创建保存点s1
SAVEPOINT S1;
# Alex扣除50元
UPDATE `my_user` SET `money`=`money`-50 WHERE `name`='Alex';
# 回滚到保存点s1
ROLLBACK TO SAVEPOINT S1;
# 查询Alex的金额
SELECT `name`,`money` FROM `my_user` WHERE `name`='Alex';
# 回滚事务
ROLLBACK;
# 查询Alex的金额
SELECT `name`,`money` FROM `my_user` WHERE `name`='Alex';

-- ----------------------------
-- 8.2.1 创建视图
-- ----------------------------
# 创建视图，查询学生的详细信息
CREATE VIEW `view_student` AS SELECT s.`id`,s.`name`,m.`name` AS major FROM `majors` AS m LEFT JOIN `student` AS s ON m.`id`=s.`mid`;
# 查看创建后的结果
SHOW TABLES;
# 查询视图
SELECT * FROM `view_student`;

-- ----------------------------
-- 8.2.2 视图管理
-- ----------------------------
# 修改视图的数据源
ALTER VIEW `view_student` AS SELECT s.`name`,m.`name` AS major FROM `majors` AS m LEFT JOIN `student` AS s ON m.`id`=s.`mid`;
# 查询视图
SELECT * FROM `view_student`;
# 删除视图
DROP VIEW `view_student`;
# 检查视图是否已被删除
SELECT * FROM `view_student`;

-- ----------------------------
-- 8.2.3 视图数据操作
-- ----------------------------
# 创建视图
CREATE VIEW `view_student` AS SELECT `id`,`name`,`mid` FROM `student`;
# 增加数据
INSERT INTO `view_student` VALUES(NULL, 'Sun', 2);
# 查询视图
SELECT * FROM `view_student`;
# 更新数据
UPDATE `view_student` SET `name`='Sun1' WHERE `id`=5;
# 查询视图
SELECT * FROM `view_student`;
# 删除数据
DELETE FROM `view_student` WHERE `id`=5;
# 查询视图
SELECT * FROM `view_student`;

-- ----------------------------
-- 8.3.2 数据还原
-- ----------------------------
--1.输入重定向
# 登录MySQL，创建mydb2数据库后退出
CREATE DATABASE `mydb2`;
exit;
--2.source命令
# 删除student数据表
DROP table `student`;
# 还原数据
source D:/student.sql;
# 查看数据是否还原
SELECT * FROM `student`;

-- ----------------------------
-- 8.4.1 账号管理
-- ----------------------------
# 创建test1账号
CREATE USER 'test1' IDENTIFIED BY '123456';
# 创建test2账号
CREATE USER 'test2@127.0.0.1' IDENTIFIED BY '123456';
# 查询mysql数据库下的user表
SELECT `host`,`user` FROM `mysql.user`;
# 删除mysql.user中test2账号
DROP USER IF EXISTS 'test2@127.0.0.1';

-- ----------------------------
-- 8.4.2 权限管理
-- ----------------------------
# 授权test1用户的mydb2数据库的所有权限
GRANT ALL PRIVILEGES ON `mydb2`.* TO 'test1'@'%';
# 查看test1用户的权限
SELECT user,db,select_priv,insert_priv,update_priv,delete_priv FROM mysql.db WHERE user='test1';
# 删除test1用户对mydb2数据库的权限
REVOKE all ON mydb2.* FROM 'test1'@'%';

-- ----------------------------
-- 8.5.1 索引的使用
-- ----------------------------
# 为student表中的name字段创建普通索引
ALTER TABLE `student` ADD INDEX name_index(`name`);
# 查看创建的索引信息
SHOW CREATE TABLE `student`\G

-- ----------------------------
-- 8.6.2 创建分区
-- ----------------------------
CREATE TABLE `mydb`.`p_list` (
    `id` INT AUTO_INCREMENT COMMENT 'ID编号',
    `name` VARCHAR(50) COMMENT '姓名',
    `dpt` INT COMMENT '部门编号',
    KEY (`id`)
) ENGINE=INNODB
    PARTITION BY LIST(`dpt`)(
    PARTITION p1 VALUES IN (1, 3),
    PARTITION p2 VALUES IN (2, 4)
);

-- ----------------------------
-- 8.7.2 存储过程的使用
-- ----------------------------
# 在mydb数据库中创建存储过程
DELIMITER $$      # 将语句的结束符号从分号;临时改为两个$$(可以是自定义)
CREATE PROCEDURE proc (IN gid INT)
BEGIN
  SELECT `id`,`name` FROM `my_goods` where `id` > `gid`;
END
$$
DELIMITER ;     　# 将语句的结束符号恢复为分号
# 调用存储过程
CALL proc(9);

-- ----------------------------
-- 8.8.2 触发器的使用
-- ----------------------------
# 创建my_shopcart购物车表
CREATE TABLE `my_shopcart` (
   `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT '购物车id',
   `user_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
   `goods_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '商品id',
   `goods_price` DECIMAL(10,2) UNSIGNED NOT NULL DEFAULT 0 COMMENT '单价',
   `goods_num` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '购买件数',
   `is_select` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否选中',
   `create_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
   `update_time` DATETIME DEFAULT NULL COMMENT '更新时间'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
# 创建触发器
DELIMITER $$
CREATE TRIGGER insert_tri BEFORE INSERT
   ON my_shopcart FOR EACH ROW
   BEGIN
     DECLARE stocks INT DEFAULT 0;
     SELECT stock INTO stocks FROM my_goods WHERE id=new.goods_id;
     IF stocks <=new.goods_num THEN
       SET new.goods_num :=stocks;
       UPDATE my_goods SET stock=0 WHERE id=new.goods_id;
     ELSE
       UPDATE my_goods SET stock=stocks-new.goods_num WHERE id=new.goods_id;
     END IF;
  END;
$$
DELIMITER ;
# 查看my_ goods表中商品编号为1的库存量stock
SELECT `id`,`stock` FROM `my_goods` WHERE `id`=1;
# 向购物车表插入数据，触发设置的触发器
INSERT INTO `my_shopcart`(`user_id`,`goods_id`,`goods_num`,`goods_price`) VALUES(3, 1, 1000, 0.50);
# 查看my_goods和my_shopcart表在触发器触发后商品信息的变化
SELECT `id`,`stock` FROM `my_goods` WHERE `id`=1;
SELECT `id`,`user_id`,`goods_id`,`goods_num`,`goods_price` FROM `my_shopcart`;