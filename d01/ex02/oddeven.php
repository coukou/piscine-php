#!/usr/bin/php
<?php
function ask_number() {
	echo "Entrez un nombre: ";
	return (trim(fgets(STDIN)));
}
while ($num = ask_number()) {
	if (!is_numeric($num))
		printf("'%s' n'est pas un chiffre\n", $num);
	else
		printf("Le chiffre %s est %s\n", $num, ($num % 2 == 0) ? "Pair" : "Impair");
}
?>
