<?php
    // Read input file and calculate distances
    $lines = explode("\n", trim(file_get_contents("input.txt")));
    foreach ($lines as $line) {
        sscanf($line, "Sensor at x=%d, y=%d: closest beacon is at x=%d, y=%d", $sx, $sy, $bx, $by);
        $sensors[]=[$sx, $sy];
        $beacons[$bx][$by]="B";
        $distances[]=abs($sx-$bx) + abs($sy-$by);
    }

    // Part 1
    $total = 0; $target=2000000;
    for ($x=($target * -1); $x<=($target*3); $x++) {
        if (checkVisibility($x, $target)) {
            $total++;
        }
    }
    echo "Total: $total\n";

    // Part 2
    $target=4000000;
    foreach ($sensors as $key => $coord) {
        unset($borders);
        for ($x=$coord[0] - $distances[$key] - 1; $x<=$coord[0]; $x++) {
            $borders[$x][$coord[1] - ($x - ($coord[0] - $distances[$key] - 1))]=true;
            $borders[($coord[0] + $distances[$key] + 1) - ($x - ($coord[0] - $distances[$key] - 1))][$coord[1] - ($x - ($coord[0] - $distances[$key] - 1))]=true;
            $borders[$x][$coord[1] + ($x - ($coord[0] - $distances[$key] - 1))]=true;
            $borders[($coord[0] + $distances[$key] + 1) - ($x - ($coord[0] - $distances[$key] - 1))][$coord[1] + ($x - ($coord[0] - $distances[$key] - 1))]=true;
        }
        foreach ($borders as $x => $aux) {
            foreach ($aux as $y => $v) {
                if ($x>=0 && $x <= $target && $y>=0 && $y<=$target && !checkVisibility($x, $y)) {
                    $total = $x*4000000 + $y;
                    echo "Found at $x - $y: $total\n";
                    break(3);
                }
            }
        }
    }

function checkVisibility($x, $y) {
    global $sensors, $beacons, $distances;
    foreach ($sensors as $key => $coord) {
        $distance=abs($x - $coord[0]) + abs($y - $coord[1]);
        if ($distance <= $distances[$key]) {
            if (!isset($beacons[$x][$y])) {
                return true;
            }
        }
    }
}