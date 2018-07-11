/*
Navicat MySQL Data Transfer

Source Server         : good
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : mytour

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-07-11 10:59:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sysuser
-- ----------------------------
DROP TABLE IF EXISTS `sysuser`;
CREATE TABLE `sysuser` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员编号',
  `name` char(20) NOT NULL COMMENT '管理员账号',
  `pwd` char(32) NOT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sysuser
-- ----------------------------
INSERT INTO `sysuser` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');
