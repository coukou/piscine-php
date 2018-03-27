<?php

function ft_is_sort($tab) {
	$sorted_tab = array_slice($tab, 0);
	sort($sorted_tab);
	return ($tab == $sorted_tab);
}

$tab = array("!/@#;^", "42", "Hello World", "salut", "zZzZzZz");
$tab[] = "Et qu’est-ce qu’on fait maintenant ?";
if (ft_is_sort($tab))
	echo "Le tableau est trie\n";
else
	echo "Le tableau n’est pas trie\n";
?>
