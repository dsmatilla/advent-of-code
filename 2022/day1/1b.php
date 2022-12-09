<?php
	$lines = explode("\n", trim(file_get_contents("input.txt")));
	$max = 0;
	$partial = 0;
	$index = 0;
	foreach ($lines as $line) {
		if ($line != "") {
			$partial += $line;
		} else {
			$elves[$index] = $partial;
			$index++;
			$partial = 0;
		}
	}
	rsort($elves);
	echo $elves[0] + $elves[1] + $elves[2];
