CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `student` VALUES ('1', 'Tom', '18'),('2', 'Jack', '20'),('3', 'Alex', '16'),('4', 'Andy', '19');
