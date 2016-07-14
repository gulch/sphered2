CREATE TABLE IF NOT EXISTS `Category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url_segment` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_segment` (`url_segment`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `CodeRequest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `goal` text NOT NULL,
  `workname` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id__Category` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `id__Type` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `url_segment` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `is_commercial` tinyint(1) DEFAULT '0',
  `gallery_image` varchar(255) DEFAULT NULL,
  `big_image` varchar(255) DEFAULT NULL,
  `path_to_files` varchar(255) DEFAULT NULL,
  `path_to_xml` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `secure_key` char(8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_segment_UNIQUE` (`url_segment`),
  KEY `type_id` (`id__Type`),
  KEY `category_id` (`id__Category`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `License` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `license_code` char(32) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `verify_code` char(16) NOT NULL,
  `expire_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_license_gallery_item_idx` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Type` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url_segment` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;