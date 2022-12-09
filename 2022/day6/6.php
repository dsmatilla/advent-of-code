<?php
	$line = explode("\n", trim(file_get_contents("input.txt")));
        for ($i = 3; $i < strlen($line[0]) -1 AND count(array_unique(str_split(substr($line[0], $i - 3, 4), 1))) < 4; $i++) {}
        echo $i+1;
