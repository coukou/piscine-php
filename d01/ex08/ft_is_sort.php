<?php
function ft_is_sort($tab) {
	$sorted_tab = array_slice($tab, 0);
	sort($sorted_tab);
	return ($tab == $sorted_tab);
}
?>
