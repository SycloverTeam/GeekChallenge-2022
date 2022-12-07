CREATE USER 'ctfer'@'localhost' IDENTIFIED BY 'geek_2022';
GRANT SELECT ON *.* to ctfer@localhost;
CREATE DATABASE IF NOT EXISTS WelcomeSQL;

USE WelcomeSQL;

CREATE TABLE IF NOT EXISTS `user_info`
(
	`id` int NOT NULL,
	`username` varchar(256) NOT NULL,
	`secret` varchar(256) NOT NULL
);

DROP database test;
DROP database ctftraining;
INSERT INTO user_info values(1,'weelin','vv33l1n');
INSERT INTO user_info values(2,'Myth3me','myTh3mee33e');
INSERT INTO user_info values(3,'an5er','an4erniuniu');
INSERT INTO user_info values(4,'PuPp1T.','P_God');
INSERT INTO user_info values(114514,'admin','SYC{VV31c0me_T0_5QL1_vv01rd_!}');