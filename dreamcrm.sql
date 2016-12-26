/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50716
Source Host           : localhost:3306
Source Database       : dreamcrm

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2016-12-27 06:17:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `partner_id` int(11) DEFAULT NULL,
  `customer_resource_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_date` date NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_customer_project` (`project_id`),
  KEY `fk_customer_partner` (`partner_id`),
  KEY `fk_customer_customer_resource` (`customer_resource_id`),
  CONSTRAINT `fk_customer_customer_resource` FOREIGN KEY (`customer_resource_id`) REFERENCES `customer_resource` (`id`),
  CONSTRAINT `fk_customer_partner` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`id`),
  CONSTRAINT `fk_customer_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', '1', '3', '1', 'abc', 'abc', 'abc@abc.com', '2016-12-26', '10', '1', '1', '1482689084', '1482689084');
INSERT INTO `customer` VALUES ('2', '1', '3', '1', 'ABC-Cus1', 'cus-999', 'cus1@gmail.com', '2016-12-27', '10', '1', '1', '1482782665', '1482782665');
INSERT INTO `customer` VALUES ('3', '1', '3', '2', 'Cus2', 'cus2-888', 'cus2@gmail.com', '2016-12-30', '10', '1', '1', '1482782700', '1482782700');

-- ----------------------------
-- Table structure for `customer_resource`
-- ----------------------------
DROP TABLE IF EXISTS `customer_resource`;
CREATE TABLE `customer_resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci COMMENT 'Nội dung',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customer_resource
-- ----------------------------
INSERT INTO `customer_resource` VALUES ('1', 'Facebook', 'Nguồn khách hàng tới từ Facebook', '10', '1', '1', '1482645516', '1482645516');
INSERT INTO `customer_resource` VALUES ('2', 'Twitter', '', '10', '1', '1', '1482645779', '1482645779');
INSERT INTO `customer_resource` VALUES ('3', 'Google', '', '10', '1', '1', '1482645786', '1482645786');
INSERT INTO `customer_resource` VALUES ('4', 'Sự kiện bán Vinhome - Tòa nhà B', 'Sự kiện diễn ra ngày 10/01/2017', '10', '1', '1', '1482645818', '1482645818');

-- ----------------------------
-- Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1482240657');
INSERT INTO `migration` VALUES ('m130524_201442_users', '1482243495');
INSERT INTO `migration` VALUES ('m161221_130131_projects', '1482519226');
INSERT INTO `migration` VALUES ('m161221_130619_partners', '1482519227');
INSERT INTO `migration` VALUES ('m161221_131300_customer_resoures', '1482519228');
INSERT INTO `migration` VALUES ('m161221_131301_customers', '1482519229');
INSERT INTO `migration` VALUES ('m161221_132359_notes', '1482519230');
INSERT INTO `migration` VALUES ('m161221_133140_user_partners', '1482519231');

-- ----------------------------
-- Table structure for `note`
-- ----------------------------
DROP TABLE IF EXISTS `note`;
CREATE TABLE `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci COMMENT 'Ghi chú',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_note_customer` (`customer_id`),
  CONSTRAINT `fk_note_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of note
-- ----------------------------

-- ----------------------------
-- Table structure for `partner`
-- ----------------------------
DROP TABLE IF EXISTS `partner`;
CREATE TABLE `partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci COMMENT 'Ghi chú',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_partner_project` (`project_id`),
  CONSTRAINT `fk_partner_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of partner
-- ----------------------------
INSERT INTO `partner` VALUES ('2', '1', 'ABC', 'ABC', 'abc@abc.com', '2016-05-01', '2016-09-30', '', '10', '1', '1', '1482553499', '1482553499');
INSERT INTO `partner` VALUES ('3', '1', 'abc', 'abc', 'abc@c.om', '2016-12-24', '2017-01-23', '', '10', '1', '1', '1482555766', '1482555766');
INSERT INTO `partner` VALUES ('4', '2', 'Sie', '0123654', '0909@09909.com', '2016-11-30', '2016-12-31', '', '10', '1', '1', '1482555798', '1482555798');

-- ----------------------------
-- Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci COMMENT 'Mô tả',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('1', 'Dự Án Vinhomes', '', '10', '1', '1', '1482523690', '1482523690');
INSERT INTO `project` VALUES ('2', 'Dự án Sun Groups', '', '10', '1', '1', '1482523747', '1482523747');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'TGhSmBSfGtR_Yvi8IFePsusGmp7Ww7J-', '$2y$13$ZS80lcu7jWiXBif.b92vw.fZmF9E1O.reWBZVbnq6vxmUNnekajT6', null, 'nguyentuansieu@gmail.com', 'Nguyễn Tuấn Siêu', '09999', '90', '10', '1482244748', '1482244748');
INSERT INTO `user` VALUES ('2', 'tuansieu', 'eQRKBUDHZFjtmRz2VIMLti_eC0UXjpix', '$2y$13$aH9ky/XOonpHgdurdsfYie0CbX5ySxoMmdmzzpL3MNcXr8vcj1PU2', null, 'tuan@sieulog.com', 'Nguyễn Tuấn', '0969352404', '10', '10', '1482779242', '1482779242');

-- ----------------------------
-- Table structure for `user_partner`
-- ----------------------------
DROP TABLE IF EXISTS `user_partner`;
CREATE TABLE `user_partner` (
  `user_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  KEY `fk_user_partner_user` (`user_id`),
  KEY `fk_user_partner_partner` (`partner_id`),
  CONSTRAINT `fk_user_partner_partner` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`id`),
  CONSTRAINT `fk_user_partner_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_partner
-- ----------------------------
INSERT INTO `user_partner` VALUES ('1', '2');
INSERT INTO `user_partner` VALUES ('2', '3');
INSERT INTO `user_partner` VALUES ('2', '4');
INSERT INTO `user_partner` VALUES ('1', '2');
