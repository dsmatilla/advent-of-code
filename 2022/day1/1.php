<?php
	$max = 0;
	$partial = 0;
	$lines = explode("\n", trim(file_get_contents("input.txt")));
	foreach ($lines as $line) {
		if ($line != "") {
			$partial += $line;
		} else {
			if ($partial > $max) {
				$max = $partial;
			}
			$partial = 0;
		}
	}
	echo $max;
