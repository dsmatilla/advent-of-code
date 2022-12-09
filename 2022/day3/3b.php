<?php
	$lines = explode("\n", trim(file_get_contents("input.txt")));
	$group = array_chunk($lines, 3);
	$total = 0;
	foreach ($group as $lines) {
		$intersection = array_unique(array_values(array_intersect(str_split($lines[0]), str_split($lines[1]), str_split($lines[2]))));
		$intersection[0] <= "Z" ? $total += (ord($intersection[0]) - 38) : $total += (ord($intersection[0]) - 96);
	}
	echo $total;
