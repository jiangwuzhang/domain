CREATE TABLE `domain_list` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `chinese` varchar(50) NOT NULL DEFAULT '',
  `chinese_total` tinyint(3) unsigned DEFAULT '0',
  `domain` varchar(50) NOT NULL DEFAULT '',
  `domain_total` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `expire_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `available` tinyint(4) NOT NULL DEFAULT '0',
  `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `http_code` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `chinese` (`chinese`),
  KEY `available` (`available`),
  KEY `domain` (`domain`),
  KEY `http_code` (`http_code`)
) ENGINE=MyISAM AUTO_INCREMENT=157203 DEFAULT CHARSET=utf8
