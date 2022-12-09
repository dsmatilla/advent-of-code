<?php
	$lines = explode("\n", trim(file_get_contents("input.txt")));
	$element = 0;
	$win = 0;
	foreach ($lines as $line) {
		switch ($line) {
			case "A X": $win += 3; $element += 1; break;
			case "A Y": $win += 6; $element += 2; break;
			case "A Z":	$win += 0; $element += 3; break;
			case "B X": $win += 0; $element += 1; break;
			case "B Y":	$win += 3; $element += 2; break;
			case "B Z":	$win += 6; $element += 3; break;
			case "C X":	$win += 6; $element += 1; break;
			case "C Y": $win += 0; $element += 2; break;
			case "C Z": $win += 3; $element += 3; break;
		}
	}
	echo $win + $element;
