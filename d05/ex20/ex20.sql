SELECT
	`film`.`id_genre`,
	`genre`.`name` as 'name_genre',
	`film`.`id_distrib`,
	`distrib`.`name` as 'distrib_name',
	`film`.`title`
	FROM `film`
	LEFT JOIN `genre` ON `film`.`id_genre` = `genre`.`id_genre`
	LEFT JOIN `distrib` ON `film`.`id_distrib` = `distrib`.`id_distrib`
	WHERE `film`.`id_genre` BETWEEN 4 AND 8
