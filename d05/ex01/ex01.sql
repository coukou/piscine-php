CREATE TABLE `ft_table` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`login` varchar(8) NOT NULL,
	`group` enum('staff', 'student', 'other') NOT NULL,
	`creation_date`  date NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
