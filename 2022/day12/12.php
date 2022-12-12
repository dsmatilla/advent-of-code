<?php
    $start=array("S", "a");

    $lines = explode("\n", trim(file_get_contents("input.txt")));
    foreach ($lines as $key => $line) {
        $map[]=str_split($line, 1);
    }

    foreach ($map as $x => $r) {
        foreach ($r as $y => $c) {
            if (in_array($c, $start)) {
                $queue[] = array($x, $y, 0, "a");
            }
        }
    }

    while (!empty($queue)) {
        $aux=array_shift($queue);
        if ($map[$aux[0]][$aux[1]] == 'E') {
            echo "Min steps : ".$aux[2]."\n";
        }

        if (isset($map[$aux[0] + 1][$aux[1]]) && !isset($visited[$aux[0] + 1][$aux[1]])) {
            $new = str_replace('E', 'z', $map[$aux[0] + 1][$aux[1]]);
            if (ord($new) <= ord($aux[3]) + 1) {
                $visited[$aux[0] + 1][$aux[1]] = true;
                array_push($queue, array($aux[0] + 1, $aux[1], $aux[2] + 1, $new));
            }
        }

        if (isset($map[$aux[0] - 1][$aux[1]]) && !isset($visited[$aux[0] - 1][$aux[1]])) {
            $new = str_replace('E', 'z', $map[$aux[0] - 1][$aux[1]]);
            if (ord($new) <= ord($aux[3]) + 1) {
                $visited[$aux[0] - 1][$aux[1]] = true;
                array_push($queue, array($aux[0] - 1, $aux[1], $aux[2] + 1, $new));
            }
        }

        if (isset($map[$aux[0]][$aux[1] + 1]) && !isset($visited[$aux[0]][$aux[1] + 1])) {
            $new = str_replace('E', 'z', $map[$aux[0]][$aux[1] + 1]);
            if (ord($new) <= ord($aux[3]) + 1) {
                $visited[$aux[0]][$aux[1] + 1] = true;
                array_push($queue, array($aux[0], $aux[1] + 1, $aux[2] + 1, $new));
            }
        }

        if (isset($map[$aux[0]][$aux[1] - 1]) && !isset($visited[$aux[0]][$aux[1] - 1])) {
            $new = str_replace('E', 'z', $map[$aux[0]][$aux[1] - 1]);
            if (ord($new) <= ord($aux[3]) + 1) {
                $visited[$aux[0]][$aux[1] - 1] = true;
                array_push($queue, array($aux[0], $aux[1] - 1, $aux[2] + 1, $new));
            }
        }
    }
