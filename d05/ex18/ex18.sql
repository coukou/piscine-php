SELECT `name`
	FROM `distrib`
	WHERE
		(`id_distrib` IN (42, 71) OR
		(`id_distrib` BETWEEN 62 AND 69) OR
		(`id_distrib` BETWEEN 88 AND 90)) AND
		UPPER(`name`) LIKE UPPER('%y%y%')
	LIMIT 2, 5
