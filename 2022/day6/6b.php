<?php
	$line = explode("\n", trim(file_get_contents("input.txt")));
        for ($i = 13; $i < strlen($line[0]) -1 AND count(array_unique(str_split(substr($line[0], $i - 13, 14), 1))) < 14; $i++) {}
        echo $i+1;
