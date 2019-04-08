# SQL Dump for tdmcreate module
# PhpMyAdmin Version: 4.2.7.1
# http://www.phpmyadmin.net
#
# Host: localhost
# Generated on: Thu May 05, 2015 to 11:42
# Server version: 5.6.20-log
# PHP Version: 5.4.31

#
# Table structure for table `tdmcreate_settings` 40
#

CREATE TABLE `tdmcreate_settings` (
  `set_id`                  INT(5)     UNSIGNED NOT NULL AUTO_INCREMENT,
  `set_name`                VARCHAR(255)        NOT NULL DEFAULT 'My Module',
  `set_dirname`             VARCHAR(100)        NOT NULL DEFAULT 'mymoduledirname',
  `set_version`             VARCHAR(5)          NOT NULL DEFAULT '1.0',
  `set_since`               VARCHAR(5)          NOT NULL DEFAULT '1.0',
  `set_min_php`             VARCHAR(5)          NOT NULL DEFAULT '5.5',
  `set_min_xoops`           VARCHAR(5)          NOT NULL DEFAULT '2.5.9',
  `set_min_admin`           VARCHAR(5)          NOT NULL DEFAULT '1.2',
  `set_min_mysql`           VARCHAR(5)          NOT NULL DEFAULT '5.5',
  `set_description`         VARCHAR(255)        NOT NULL DEFAULT 'This module is for doing following...',
  `set_author`              VARCHAR(255)        NOT NULL DEFAULT 'TDM XOOPS',
  `set_author_mail`         VARCHAR(255)        NOT NULL DEFAULT 'info@email.com',
  `set_author_website_url`  VARCHAR(255)        NOT NULL DEFAULT 'http://xoops.org',
  `set_author_website_name` VARCHAR(255)        NOT NULL DEFAULT 'XOOPS Project',
  `set_credits`             VARCHAR(255)        NOT NULL DEFAULT 'XOOPS Development Team',
  `set_license`             VARCHAR(255)        NOT NULL DEFAULT 'GPL 2.0 or later',
  `set_release_info`        VARCHAR(255)        NOT NULL DEFAULT 'release_info',
  `set_release_file`        VARCHAR(255)        NOT NULL DEFAULT 'release_info file',
  `set_manual`              VARCHAR(255)        NOT NULL DEFAULT 'link to manual file',
  `set_manual_file`         VARCHAR(255)        NOT NULL DEFAULT 'install.txt',
  `set_image`               VARCHAR(255)        NOT NULL DEFAULT 'empty.png',
  `set_demo_site_url`       VARCHAR(255)        NOT NULL DEFAULT 'https://xoops.org',
  `set_demo_site_name`      VARCHAR(255)        NOT NULL DEFAULT 'XOOPS Demo Site',
  `set_support_url`         VARCHAR(255)        NOT NULL DEFAULT 'http://xoops.org/modules/newbb',
  `set_support_name`        VARCHAR(255)        NOT NULL DEFAULT 'Support Forum',
  `set_website_url`         VARCHAR(255)        NOT NULL DEFAULT 'www.xoops.org',
  `set_website_name`        VARCHAR(255)        NOT NULL DEFAULT 'XOOPS Project',
  `set_release`             VARCHAR(11)         NOT NULL DEFAULT '2015-05-02',
  `set_status`              VARCHAR(150)        NOT NULL DEFAULT 'Beta 1',
  `set_admin`               TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
  `set_user`                TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
  `set_blocks`              TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
  `set_search`              TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `set_comments`            TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `set_notifications`       TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `set_permissions`         TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `set_inroot_copy`         TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `set_donations`           VARCHAR(50)         NOT NULL DEFAULT '6KJ7RW5DR3VTJ',
  `set_subversion`          VARCHAR(10)         NOT NULL DEFAULT '13070',
  `set_type`                TINYINT(3) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`set_id`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8;

INSERT INTO `tdmcreate_settings` (`set_id`, `set_name`, `set_dirname`, `set_version`, `set_since`, `set_min_php`, `set_min_xoops`, `set_min_admin`, `set_min_mysql`, `set_description`, `set_author`, `set_author_mail`, `set_author_website_url`, `set_author_website_name`, `set_credits`, `set_license`, `set_release_info`, `set_release_file`, `set_manual`, `set_manual_file`, `set_image`, `set_demo_site_url`, `set_demo_site_name`, `set_support_url`, `set_support_name`, `set_website_url`, `set_website_name`, `set_release`, `set_status`, `set_admin`, `set_user`, `set_blocks`, `set_search`, `set_comments`, `set_notifications`, `set_permissions`, `set_inroot_copy`, `set_donations`, `set_subversion`, `set_type`)
VALUES
  (1, 'My Module', 'mymoduledirname', '1.0', '1.0', '5.5', '2.5.9', '1.2', '5.5', 'This module is for doing following...', 'TDM XOOPS', 'info@email.com', 'http://xoops.org', 'XOOPS Project', 'XOOPS Development Team', 'GPL 3.0 or later', 'release_info', 'release_info file', 'link to manual file',
                                                                                                                                        'install.txt', 'empty.png', 'https://xoops.org', 'XOOPS Demo Site', 'https://xoops.org/modules/newbb', 'Support Forum', 'www.xoops.org', 'XOOPS Project',
                                                                                                                                                                    '2017-12-02', 'Beta 1', '1', '1', '1', '0', '0', '0', '0', '0', '6KJ7RW5DR3VTJ', '13070', 1);

#
# Table structure for table `tdmcreate_modules` 39
#

CREATE TABLE `tdmcreate_modules` (
	`mod_id`                  INT(5)     UNSIGNED NOT NULL AUTO_INCREMENT,
	`mod_name`                VARCHAR(255)        NOT NULL DEFAULT '',
	`mod_isextension`         TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`mod_dirname`             VARCHAR(100)        NOT NULL DEFAULT '',
	`mod_version`             VARCHAR(5)          NOT NULL DEFAULT '1.0',
	`mod_since`               VARCHAR(5)          NOT NULL DEFAULT '1.0',
	`mod_min_php`             VARCHAR(5)          NOT NULL DEFAULT '5.3',
	`mod_min_xoops`           VARCHAR(5)          NOT NULL DEFAULT '2.5.7',
	`mod_min_admin`           VARCHAR(5)          NOT NULL DEFAULT '1.1',
	`mod_min_mysql`           VARCHAR(5)          NOT NULL DEFAULT '5.0.7',
	`mod_description`         TEXT,
	`mod_author`              VARCHAR(255)        NOT NULL DEFAULT 'TDM XOOPS',
	`mod_author_mail`         VARCHAR(255)        NOT NULL DEFAULT 'info@email.com',
	`mod_author_website_url`  VARCHAR(255)        NOT NULL DEFAULT 'http://',
	`mod_author_website_name` VARCHAR(255)        NOT NULL DEFAULT '',
	`mod_credits`             VARCHAR(255)        NOT NULL DEFAULT 'TDM XOOPS',
	`mod_license`             VARCHAR(255)        NOT NULL DEFAULT 'GNU',
	`mod_release_info`        VARCHAR(255)        NOT NULL DEFAULT '',
	`mod_release_file`        VARCHAR(255)        NOT NULL DEFAULT '',
	`mod_manual`              VARCHAR(255)        NOT NULL DEFAULT '',
	`mod_manual_file`         VARCHAR(255)        NOT NULL DEFAULT '',
	`mod_image`               VARCHAR(255)        NOT NULL DEFAULT '',
	`mod_demo_site_url`       VARCHAR(255)        NOT NULL DEFAULT 'http://',
	`mod_demo_site_name`      VARCHAR(255)        NOT NULL DEFAULT '',
	`mod_support_url`         VARCHAR(255)        NOT NULL DEFAULT 'http://',
	`mod_support_name`        VARCHAR(255)        NOT NULL DEFAULT '',
	`mod_website_url`         VARCHAR(255)        NOT NULL DEFAULT 'http://',
	`mod_website_name`        VARCHAR(255)        NOT NULL DEFAULT '',
	`mod_release`             VARCHAR(11)         NOT NULL DEFAULT '00-00-0000',
	`mod_status`              VARCHAR(150)        NOT NULL DEFAULT 'Beta 1',
	`mod_admin`               TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	`mod_user`                TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	`mod_blocks`              TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	`mod_search`              TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`mod_comments`            TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`mod_notifications`       TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`mod_permissions`         TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`mod_inroot_copy`         TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	`mod_donations`           VARCHAR(50)         NOT NULL DEFAULT '6KJ7RW5DR3VTJ',
	`mod_subversion`          VARCHAR(10)         NOT NULL DEFAULT '12550',
	PRIMARY KEY (`mod_id`),
	KEY `mod_name` (`mod_name`),
	UNIQUE KEY `mod_dirname` (`mod_dirname`)
)ENGINE=InnoDB;


CREATE TABLE `tdmcreate_tables` (
	`table_id`            INT(5) UNSIGNED     NOT NULL AUTO_INCREMENT,
	`table_mid`           INT(5) UNSIGNED     NOT NULL DEFAULT '0',
	`table_category`      TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_name`          VARCHAR(150)        NOT NULL DEFAULT '',
	`table_solename`      VARCHAR(150)        NOT NULL DEFAULT '',
	`table_fieldname`     VARCHAR(150)        NOT NULL DEFAULT '',
	`table_nbfields`      INT(5) UNSIGNED     NOT NULL DEFAULT '0',
	`table_order`         INT(5) UNSIGNED     NOT NULL DEFAULT '0',
	`table_image`         VARCHAR(150)        NOT NULL DEFAULT '',
	`table_autoincrement` TINYINT(1)          NOT NULL DEFAULT '1',
	`table_blocks`        TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_admin`         TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	`table_user`          TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_submenu`       TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_submit`        TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_tag`           TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_broken`        TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_search`        TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_comments`      TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_notifications` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_permissions`   TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_rate`           TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_print`           TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_pdf`           TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_rss`           TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_single`           TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	`table_visit`           TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	PRIMARY KEY (`table_id`),
	KEY `table_mid` (`table_mid`),
	KEY `table_name` (`table_name`)
)ENGINE=InnoDB;

#
# Table structure for table `tdmcreate_fields` 21
#

CREATE TABLE `tdmcreate_fields` (
	`field_id`        INT(8)       UNSIGNED NOT NULL AUTO_INCREMENT,
	`field_mid`       INT(5)       UNSIGNED NOT NULL DEFAULT '0',
	`field_tid`       INT(5)       UNSIGNED NOT NULL DEFAULT '0',  
	`field_order`     INT(5)       UNSIGNED NOT NULL DEFAULT '0',
	`field_name`      VARCHAR(255)          NOT NULL DEFAULT '',
	`field_type`      VARCHAR(100)          NOT NULL DEFAULT '',
	`field_value`     CHAR(4)               NOT NULL DEFAULT '',
	`field_attribute` VARCHAR(50)           NOT NULL DEFAULT '',
	`field_null`      CHAR(10)              NOT NULL DEFAULT '',
	`field_default`   VARCHAR(150)          NOT NULL DEFAULT '',
	`field_key`       CHAR(10)              NOT NULL DEFAULT '',
	`field_element`   VARCHAR(150)          NOT NULL DEFAULT '',
	`field_parent`    TINYINT(1)            NOT NULL DEFAULT '0',
	`field_inlist`    TINYINT(1)            NOT NULL DEFAULT '0',
	`field_inform`    TINYINT(1)            NOT NULL DEFAULT '0',
	`field_admin`     TINYINT(1)            NOT NULL DEFAULT '0',
	`field_user`      TINYINT(1)            NOT NULL DEFAULT '0',
	`field_block`     TINYINT(1)            NOT NULL DEFAULT '0',
	`field_main`      TINYINT(1)            NOT NULL DEFAULT '0',
	`field_search`    TINYINT(1)            NOT NULL DEFAULT '0',
	`field_required`  TINYINT(1)            NOT NULL DEFAULT '0',
	PRIMARY KEY (`field_id`),
	KEY `field_mid` (`field_mid`),
	KEY `field_tid` (`field_tid`)
)ENGINE=InnoDB;

#
# Table structure for table `tdmcreate_import` 7
#
		
CREATE TABLE `tdmcreate_imports` (
	`import_id` 			INT (8) UNSIGNED NOT NULL AUTO_INCREMENT,
	`import_name` 			VARCHAR (255) 	 NOT NULL DEFAULT '',
	`import_mid` 			INT (5) UNSIGNED NOT NULL DEFAULT '0',
	`import_nbtables` 		INT (5) UNSIGNED NOT NULL DEFAULT '0',
	`import_tablename` 		VARCHAR (50) 	 NOT NULL DEFAULT '',
	`import_nbfields` 		INT (5) UNSIGNED NOT NULL DEFAULT '0',
	`import_fieldelements` 	VARCHAR (255) 	 NOT NULL DEFAULT '',
	PRIMARY KEY (`import_id`),
	KEY `import_mid` (`import_mid`),
	KEY `import_name` (`import_name`(40))
) ENGINE=InnoDB;

#
# Table structure for table `tdmcreate_locales` 5
#

CREATE TABLE `tdmcreate_locales` (
	`loc_id`          INT(5)       UNSIGNED NOT NULL AUTO_INCREMENT,
	`loc_mid`         INT(5)       UNSIGNED NOT NULL DEFAULT '0',
	`loc_file`        VARCHAR(255)          NOT NULL DEFAULT '',
	`loc_define`      VARCHAR(255)          NOT NULL DEFAULT '',
	`loc_description` VARCHAR(255)          NOT NULL DEFAULT '',
	PRIMARY KEY (`loc_id`),
	KEY `loc_mid` (`loc_mid`)  
)ENGINE=InnoDB;

#
# Table structure for table `tdmcreate_fieldtype` 2
#

CREATE TABLE `tdmcreate_fieldtype` (
	`fieldtype_id`    INT(5)       UNSIGNED NOT NULL AUTO_INCREMENT,
	`fieldtype_name`  VARCHAR(100)          NOT NULL DEFAULT '',
	`fieldtype_value` VARCHAR(100)          NOT NULL DEFAULT '',
	PRIMARY KEY (`fieldtype_id`),
	KEY `fieldtype_name` (`fieldtype_name`)
)ENGINE=InnoDB;

INSERT INTO `tdmcreate_fieldtype` (`fieldtype_id`, `fieldtype_name`, `fieldtype_value`) VALUES
  (1, '...', ''),
  (2, 'INT', 'INT'),
  (3, 'TINYINT', 'TINYINT'),
  (4, 'MEDIUMINT', 'MEDIUMINT'),
  (5, 'SMALLINT', 'SMALLINT'),
  (6, 'FLOAT', 'FLOAT'),
  (7, 'DOUBLE', 'DOUBLE'),
  (8, 'DECIMAL', 'DECIMAL'),
  (9, 'SET', 'SET'),
  (10, 'ENUM', 'ENUM'),
  (11, 'EMAIL', 'EMAIL'),
  (12, 'URL', 'URL'),
  (13, 'CHAR', 'CHAR'),
  (14, 'VARCHAR', 'VARCHAR'),
  (15, 'TEXT', 'TEXT'),
  (16, 'TINYTEXT', 'TINYTEXT'),
  (17, 'MEDIUMTEXT', 'MEDIUMTEXT'),
  (18, 'LONGTEXT', 'LONGTEXT'),
  (19, 'DATE', 'DATE'),
  (20, 'DATETIME', 'DATETIME'),
  (21, 'TIMESTAMP', 'TIMESTAMP'),
  (22, 'TIME', 'TIME'),
  (23, 'YEAR', 'YEAR');

#
# Table structure for table `tdmcreate_fieldattributes` 3
#

CREATE TABLE `tdmcreate_fieldattributes` (
	`fieldattribute_id`    INT(5)       UNSIGNED NOT NULL AUTO_INCREMENT,
	`fieldattribute_name`  VARCHAR(100)          NOT NULL DEFAULT '',
	`fieldattribute_value` VARCHAR(100)          NOT NULL DEFAULT '',
	PRIMARY KEY (`fieldattribute_id`),
	KEY `fieldattribute_name` (`fieldattribute_name`)
)ENGINE=InnoDB;

INSERT INTO `tdmcreate_fieldattributes` (`fieldattribute_id`, `fieldattribute_name`, `fieldattribute_value`) VALUES
  (1, '...', ''),
  (2, 'BINARY', 'BINARY'),
  (3, 'UNSIGNED', 'UNSIGNED'),
  (4, 'UNSIGNED_ZEROFILL', 'UNSIGNED_ZEROFILL'),
  (5, 'CURRENT_TIMESTAMP', 'CURRENT_TIMESTAMP');

#
# Table structure for table `tdmcreate_fieldnull` 3
#

CREATE TABLE `tdmcreate_fieldnull` (
	`fieldnull_id`    INT(5)       UNSIGNED NOT NULL AUTO_INCREMENT,
	`fieldnull_name`  VARCHAR(100)          NOT NULL DEFAULT '',
	`fieldnull_value` VARCHAR(100)          NOT NULL DEFAULT '',
	PRIMARY KEY (`fieldnull_id`),
	KEY `fieldnull_name` (`fieldnull_name`)
)ENGINE=InnoDB;

INSERT INTO `tdmcreate_fieldnull` (`fieldnull_id`, `fieldnull_name`, `fieldnull_value`) VALUES
  (1, '...', ''),
  (2, 'NOT NULL', 'NOT NULL'),
  (3, 'NULL', 'NULL');

#
# Table structure for table `tdmcreate_fieldkey` 3
#

CREATE TABLE `tdmcreate_fieldkey` (
	`fieldkey_id`    INT(5)       UNSIGNED NOT NULL AUTO_INCREMENT,
	`fieldkey_name`  VARCHAR(100)          NOT NULL DEFAULT '',
	`fieldkey_value` VARCHAR(100)          NOT NULL DEFAULT '',
	PRIMARY KEY (`fieldkey_id`),
	KEY `fieldkey_name` (`fieldkey_name`)
)ENGINE=InnoDB;

INSERT INTO `tdmcreate_fieldkey` (`fieldkey_id`, `fieldkey_name`, `fieldkey_value`) VALUES
  (1, '...', ''),
  (2, 'PRIMARY', 'PRIMARY'),
  (3, 'UNIQUE', 'UNIQUE'),
  (4, 'KEY', 'KEY'),
  (5, 'INDEX', 'INDEX'),
  (6, 'FULLTEXT', 'FULLTEXT');

#
# Table structure for table `tdmcreate_fieldelements` 5
#

CREATE TABLE `tdmcreate_fieldelements` (
	`fieldelement_id`    INT(5)       UNSIGNED NOT NULL AUTO_INCREMENT,
	`fieldelement_mid`   INT(11)      UNSIGNED NOT NULL DEFAULT '0',
	`fieldelement_tid`   INT(11)      UNSIGNED NOT NULL DEFAULT '0',
	`fieldelement_name`  VARCHAR(100)          NOT NULL DEFAULT '',
	`fieldelement_value` VARCHAR(100)          NOT NULL DEFAULT '',
	PRIMARY KEY (`fieldelement_id`),
	KEY `fieldelement_mid` (`fieldelement_mid`),
	KEY `fieldelement_tid` (`fieldelement_tid`)
)ENGINE=InnoDB;

INSERT INTO `tdmcreate_fieldelements` (`fieldelement_id`, `fieldelement_mid`, `fieldelement_tid`, `fieldelement_name`, `fieldelement_value`) VALUES
  (1, 0, 0, '...', ''),
  (2, 0, 0, 'Text', 'XoopsFormText'),
  (3, 0, 0, 'TextArea', 'XoopsFormTextArea'),
  (4, 0, 0, 'DhtmlTextArea', 'XoopsFormDhtmlTextArea'),
  (5, 0, 0, 'CheckBox', 'XoopsFormCheckBox'),
  (6, 0, 0, 'RadioYN', 'XoopsFormRadioYN'),
  (7, 0, 0, 'SelectBox', 'XoopsFormSelect'),
  (8, 0, 0, 'SelectUser', 'XoopsFormSelectUser'),
  (9, 0, 0, 'ColorPicker', 'XoopsFormColorPicker'),
  (10, 0, 0, 'ImageList', 'XoopsFormImageList'),
  (11, 0, 0, 'SelectFile', 'XoopsFormSelectFile'),
  (12, 0, 0, 'UrlFile', 'XoopsFormUrlFile'),
  (13, 0, 0, 'UploadImage', 'XoopsFormUploadImage'),
  (14, 0, 0, 'UploadFile', 'XoopsFormUploadFile'),
  (15, 0, 0, 'TextDateSelect', 'XoopsFormTextDateSelect');

#
# Table structure for table `tdmcreate_morefiles` 5
#

CREATE TABLE `tdmcreate_morefiles` (
  `file_id`        INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_mid`       INT(5) UNSIGNED NOT NULL DEFAULT '0',
  `file_name`      VARCHAR(100)    NOT NULL DEFAULT '',
  `file_extension` VARCHAR(5)      NOT NULL DEFAULT '.php',
  `file_infolder`  VARCHAR(50)     NOT NULL DEFAULT '',
  PRIMARY KEY (`file_id`)
)
  ENGINE = InnoDB;