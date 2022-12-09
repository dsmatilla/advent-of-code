<?php
	$lines = explode("\n", trim(file_get_contents("input.txt")));
	$total = 0;
	foreach ($lines as $line) {
			$chunks = str_split($line, (strlen($line) / 2));
			$intersection = array_unique(array_values(array_intersect(str_split($chunks[0]), str_split($chunks[1]))));
			$intersection[0] <= "Z" ? $total += (ord($intersection[0]) - 38) : $total += (ord($intersection[0]) - 96);
	}
	echo $total;
