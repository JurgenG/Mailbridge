CREATE TABLE IF NOT EXISTS `#__mailbridge_parameters` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`realname` VARCHAR(255)  NOT NULL ,
`unsub` VARCHAR(255)  NOT NULL ,
`mod` VARCHAR(255)  NOT NULL ,
`hide` VARCHAR(255)  NOT NULL ,
`nomail` VARCHAR(255)  NOT NULL ,
`ack` VARCHAR(255)  NOT NULL ,
`notmetoo` VARCHAR(255)  NOT NULL ,
`nodupes` VARCHAR(255)  NOT NULL ,
`digest` VARCHAR(255)  NOT NULL ,
`plain` VARCHAR(255)  NOT NULL ,
`language` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;;

--
-- Dumping data for table `jom_mailbridge_parameters`
--

INSERT INTO `#__mailbridge_parameters` (`id`, `ordering`, `state`, `checked_out`, `checked_out_time`, `created_by`, `realname`, `unsub`, `mod`, `hide`, `nomail`, `ack`, `notmetoo`, `nodupes`, `digest`, `plain`, `language`) VALUES
(1, 0, 1, 0, '0000-00-00 00:00:00', 0, 'nidhi', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'en');


CREATE TABLE IF NOT EXISTS `#__mailbridge_config` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `ordering` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `list_url` varchar(512) NOT NULL,
  `list_name` varchar(128) NOT NULL,
  `list_password` varchar(128) NOT NULL,
  `send_welcome_message` tinyint(1) NOT NULL DEFAULT '0',
  `send_notification` tinyint(1) NOT NULL DEFAULT '0',
  `invitation` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
--

INSERT INTO `#__mailbridge_config` (`id`, `ordering`, `state`, `checked_out`, `checked_out_time`, `created_by`, `list_url`, `list_name`, `list_password`, `send_welcome_message`, `send_notification`, `invitation`) VALUES
(18, 0, 1, 0, '0000-00-00 00:00:00', 0, 'http://url.com/mailman/admin/', 'username', 'password', 0, 0, 0);

