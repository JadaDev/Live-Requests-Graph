SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for visitor_data
-- ----------------------------
DROP TABLE IF EXISTS `visitor_data`;
CREATE TABLE `visitor_data` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
