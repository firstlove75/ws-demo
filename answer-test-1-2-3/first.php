<?php
$arr = [12, 6, 95, 30, 42, 51, 15, 6];
findTopTwoLargestNumArr($arr);
function findTopTwoLargestNumArr($arr) {
	$first_max = $second_max = $arr[0];
	foreach ($arr as $val) {
		if ($val > $first_max) {
			$second_max = $first_max;
			$first_max = $val;
		} elseif ($val > $second_max) {
			$second_max = $val;
		}	
	}
	echo "$first_max $second_max";
}
