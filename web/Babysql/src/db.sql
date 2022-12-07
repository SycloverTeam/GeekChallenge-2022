/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100314
 Source Host           : localhost:3306
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 100314
 File Encoding         : 65001

 Date: 25/08/2022 02:12:33
*/
DROP DATABASE IF EXISTS `ctfchinfo`;
CREATE DATABASE ctfchinfo;
GRANT SELECT,INSERT,UPDATE,DELETE on ctfchinfo.* to ctfchinfo@'127.0.0.1' identified by 'ctfchinfo';
GRANT SELECT,INSERT,UPDATE,DELETE on ctfchinfo.* to ctfchinfo@localhost identified by 'ctfchinfo';
use ctfchinfo;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL UNIQUE KEY,
  `password` varchar(32) DEFAULT NULL,
  `info` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `maybe flag is a flie`;
CREATE TABLE `maybe flag is a flie` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL UNIQUE KEY,
  `password` varchar(32) DEFAULT NULL,
  `info` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;
