<?php
    $minx = PHP_INT_MAX; $miny = PHP_INT_MAX; $maxx = PHP_INT_MIN; $maxy = PHP_INT_MIN;
    $cave = array();
    $lines = explode("\n", trim(file_get_contents("input.txt")));
    foreach ($lines as $line) {
        $crd = explode(" -> ", $line);

        // Draw stones, calculate limits
        for ($i=0; $i<count($crd) - 1; $i++) {
            $xy=explode(",", $crd[$i]);
            $nxy=explode(",", $crd[$i+1]);

            if ($xy[0] < $minx) { $minx=$xy[0]; }
            if ($xy[0] > $maxx) { $maxx=$xy[0]; }
            if ($xy[1] < $miny) { $miny=$xy[1]; }
            if ($xy[1] > $maxy) { $maxy=$xy[1]; }

            foreach (range($xy[0], $nxy[0]) as $x) {
                foreach (range($xy[1], $nxy[1]) as $y) {
                    $cave[$x][$y]="#";
                }
            }
        }
    }

    $count = 0;
    while (true) {
        $count++;
        $sandx = 500; $sandy=0;
        while (true) {
            if (!isset($cave[$sandx][$sandy+1])) {
                $sandy++;
            } elseif (!isset($cave[$sandx-1][$sandy+1])) {
                $sandy++; $sandx--;
            } elseif (!isset($cave[$sandx+1][$sandy+1])) {
                $sandy++; $sandx++;
            } else {
                $cave[$sandx][$sandy]="o";
                break;
            }
            if ($sandy>$maxy) {
                echo ($count - 1)."\n";
                break(2);
            }
        }
    }
