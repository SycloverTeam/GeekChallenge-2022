CREATE DATABASE IF NOT EXISTS vanzy_db;

USE vanzy_db;

CREATE TABLE IF NOT EXISTS `vanzy_secret`
(
	`username` varchar(256) NOT NULL,
	`secretpass` varchar(256) NOT NULL
)
;

INSERT INTO vanzy_secret values('vanzy','van2y0secret0qaq');

