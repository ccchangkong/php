<?php
function get_categories() {
	$conn = db_connect();
	$query = "select catid,catname,from categories";
	$result = @$conn->query($query);
	if (!$result) {
		return false;
	}
	$num_cats = @$result->num_rows;
	if ($num_cats == 0) {
		return false;
	}
	$result = db_result_to_array($result);
	return $result;
}

function get_category_name($catid) {
	$conn = db_connect();
	$query = "select catname from categories where catid='" . $catid . "'";
	$result = @$conn->query($query);
	if (!$result) {
		return false;
	}
	$num_cats = @$result->num_rows;
	if ($num_cats == 0) {
		return false;
	}
	$row = $result->fetch_object();
	return $row->catname;
}

function calculate_price($cart) {
	$price = 0.0;
	if (is_array($cart)) {
		$conn = db_connect();
		foreach ($cart as $isbn => $qty) {
			$query = "select price from books where isbn='" . $isbn . "'";
			$result = $conn->query($query);
			if ($result) {
				$item = $result->fetch_object();
				$item_price = $item->price;
				$price += $item_price * $qty;
			}
		}
	}
	return $price;
}
function calculate_items($cart) {
	$items = 0.0;
	if (is_array($cart)) {
		foreach ($cart as $isbn => $qty) {
			$items += $qty;
		}
	}
	return $items;
}
?>
