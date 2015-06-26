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
  `resp` varchar(2550) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chinese` (`chinese`),
  KEY `available` (`available`),
  KEY `domain` (`domain`),
  KEY `http_code` (`http_code`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `whois`;
CREATE TABLE `whois` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(30) NOT NULL DEFAULT '',
  `suffix` char(4) NOT NULL DEFAULT '',
  `creation_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expiration_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `domain_suffix` (`domain`, `suffix`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;