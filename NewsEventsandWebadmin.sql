DROP TABLE IF EXISTS `web_events`;
CREATE TABLE `web_events` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(16) NOT NULL,
  `date` varchar(32) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `views` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `web_news`;
CREATE TABLE `web_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(16) NOT NULL,
  `date` varchar(32) NOT NULL,
  `type` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `views` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

ALTER TABLE `authme` ADD COLUMN `webadmin` INT(1) UNSIGNED NOT NULL DEFAULT 0;
