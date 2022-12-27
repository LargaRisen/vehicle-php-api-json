/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50736
 Source Host           : localhost:3306
 Source Schema         : vehicle

 Target Server Type    : MySQL
 Target Server Version : 50736
 File Encoding         : 65001

 Date: 19/12/2022 14:26:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for vehicle
-- ----------------------------
DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE `vehicle`  (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `manuactor` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `typ` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ps` int(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vehicle
-- ----------------------------
INSERT INTO `vehicle` VALUES (1, 'Audi', 'SUV', 101);
INSERT INTO `vehicle` VALUES (2, 'Volkswagen', 'Sport car', 102);
INSERT INTO `vehicle` VALUES (19, 'Audi', 'Sedan', 125);
INSERT INTO `vehicle` VALUES (4, 'Porsche', 'Fastback', 105);
INSERT INTO `vehicle` VALUES (5, 'Smartmini', 'Hatchback', 105);
INSERT INTO `vehicle` VALUES (9, 'Smartmini', 'Sedan', 109);
INSERT INTO `vehicle` VALUES (10, 'MAN', 'City car', 110);
INSERT INTO `vehicle` VALUES (12, 'Porche', 'Sedan', 111);
INSERT INTO `vehicle` VALUES (13, 'Benz', 'City car', 124);
INSERT INTO `vehicle` VALUES (16, 'MAN', 'SUV', 122);
INSERT INTO `vehicle` VALUES (15, 'Audi', 'Hatchback', 123);
INSERT INTO `vehicle` VALUES (22, 'Audi', 'SUV', 126);

SET FOREIGN_KEY_CHECKS = 1;
