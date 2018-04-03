SELECT `title` as 'Title', `summary` as 'Summary', `prod_year`
FROM `film`
WHERE `id_genre` IN (
	SELECT `id_genre` FROM `genre` WHERE `name` = 'erotic'
)
ORDER BY `prod_year` DESC
