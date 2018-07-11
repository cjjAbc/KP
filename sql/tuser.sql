/*
Navicat MySQL Data Transfer

Source Server         : good
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : kp

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-07-10 09:01:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tuser
-- ----------------------------
DROP TABLE IF EXISTS `tuser`;
CREATE TABLE `tuser` (
  `uid` int(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `uname` char(20) NOT NULL COMMENT '用户名称',
  `upwd` char(50) NOT NULL COMMENT '用户密码',
  `uemail` char(20) NOT NULL COMMENT '用户EMAIL',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tuser
-- ----------------------------
INSERT INTO `tuser` VALUES ('1', '6', '1679091c5a880faf6fb5e6087eb1b2dc', '6@qq.com');
INSERT INTO `tuser` VALUES ('2', '林本贤', '202cb962ac59075b964b07152d234b70', '123@qq.com');
