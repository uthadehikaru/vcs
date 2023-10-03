CREATE TABLE voucher.vouchers (
	id BIGINT UNSIGNED auto_increment NOT NULL,
	code varchar(100) NOT NULL,
	partner varchar(100) NOT NULL,
	status varchar(100) DEFAULT 'tersedia' NOT NULL,
	CONSTRAINT voucher_pk PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb3
COLLATE=utf8mb3_unicode_ci;

CREATE TABLE voucher.customers (
	id varchar(100) NOT NULL,
	name varchar(100) NOT NULL,
	phone varchar(100) NOT NULL,
	email varchar(100) NOT NULL,
	package varchar(100) NULL,
	voucher_id BIGINT UNSIGNED NULL,
	CONSTRAINT customers_pk PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb3
COLLATE=utf8mb3_unicode_ci;
