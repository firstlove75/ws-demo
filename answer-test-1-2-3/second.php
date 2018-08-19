<?php
$arr = [4, 8, 9, 5, 8, 9, 4, 1, 9, 5];
countElementRepeatOneTime($arr);
function countElementRepeatOneTime($arr) {
	$flg = $arr[0];
	$count = 0;
	$len_arr = count($arr);
	for ($i = 0; $i < $len_arr; $i++) {
		$count = 0;
		for ($j = 0; $j < $len_arr; $j++) {
			if ($arr[$j] == $arr[$i]) {
				$count++;
			}
		}
		if ($count == 1) {
			echo $arr[$i]. ' ';
		}
	}
}
