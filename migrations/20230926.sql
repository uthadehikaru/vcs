
--
-- Table structure for table `vouchers`
--

DROP TABLE IF EXISTS `vouchers`;

CREATE TABLE `vouchers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `partner` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'tersedia',
  PRIMARY KEY (`id`),
  UNIQUE KEY `vouchers_un` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `package` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `voucher_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customers_FK` (`voucher_id`),
  CONSTRAINT `customers_FK` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);

CREATE TABLE `users` (
  `username` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE voucher.logs (
	id BIGINT UNSIGNED auto_increment NOT NULL,
	created TIMESTAMP DEFAULT now() NOT NULL,
	message TEXT NOT NULL,
	`data` TEXT NULL,
	CONSTRAINT logs_pk PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb3
COLLATE=utf8mb3_unicode_ci;
