<?php
function display_tree($expanded, $row = 0, $start = 0) {
	global $table_width;
	echo "<table width='" . $table_width . "'>";
	if ($start > 0) {
		$sublist = true;
	} else {
		$sublist = false;
	}
	$tree = new treenode($start, '', '', '', 1, true, -1, $expanded, $sublist);
	$tree->display($row, $sublist);
	echo "</table>";
}
// 616
?>
