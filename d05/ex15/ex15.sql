SELECT REVERSE(SUBSTR(`phone_number`, 3)) as 'enohpelet'
	FROM `distrib`
	WHERE LEFT(`phone_number`, 2) = '05'
