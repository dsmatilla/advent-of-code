<?php
    $lines = explode("\n", trim(file_get_contents("input.txt")));
    $max=9; // Tail length configuration
    for ($i=0; $i<=$max; $i++) {$ropex[$i]=0; $ropey[$i]=0; }
    foreach ($lines as $line) {
        $mov = explode(" ", $line);
        // Steps
        for ($s=0; $s<$mov[1]; $s++) {
            // Move head
            switch ($mov[0]) {
                case "D": $ropex[0]++; break; case "U": $ropex[0]--; break; case "L": $ropey[0]--; break; case "R": $ropey[0]++; break;
            }
            // Move tail(s)
            for ($i=0; $i<$max; $i++) {
                if ($ropex[$i] == $ropex[$i+1]) {
                    if ($ropey[$i] - $ropey[$i+1] > 1) { $ropey[$i+1]++; } elseif ($ropey[$i] - $ropey[$i+1] < -1) { $ropey[$i+1]--; }
                } elseif ($ropey[$i] == $ropey[$i+1]) {
                    if ($ropex[$i] - $ropex[$i+1] > 1) { $ropex[$i+1]++; } elseif ($ropex[$i] - $ropex[$i+1] < -1) { $ropex[$i+1]--; }
                } elseif (abs($ropex[$i] - $ropex[$i+1]) + abs($ropey[$i] - $ropey[$i+1]) > 2) {
                    if ($ropex[$i] - $ropex[$i+1] < 0) { $ropex[$i+1]--; } else { $ropex[$i+1]++; }
                    if ($ropey[$i] - $ropey[$i+1] < 0) { $ropey[$i+1]--; } else { $ropey[$i+1]++; }
                }
            }
            // Mark track
            $track[$ropex[$max]."-".$ropey[$max]] = "#";
        }
    }
    echo "Marked spots : ".count($track). "\n";
