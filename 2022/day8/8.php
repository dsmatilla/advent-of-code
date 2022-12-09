<?php
    $lines = explode("\n", trim(file_get_contents("input.txt")));
    foreach ($lines as $line) { $trees[] = str_split($line, 1); }

    $visible = 0;
    $top_score = 0;
    for ($x=0; $x<count($trees[0]); $x++) {
        for ($y=0; $y<count($trees); $y++) {
            $visible_u = true; $visible_d = true; $visible_r = true; $visible_l = true;
            $scenic_r = 0; for ($i=$y + 1; $i<count($trees); $i++) { $scenic_r++; if ($trees[$x][$i] >= $trees[$x][$y]) { $visible_r=false; break; }}
            $scenic_l = 0; for ($i=$y - 1; $i>=0; $i--) { $scenic_l++; if ($trees[$x][$i] >= $trees[$x][$y]) { $visible_l = false; break; } }
            $scenic_u = 0; for ($i=$x - 1; $i>=0; $i--) { $scenic_u++; if ($trees[$i][$y] >= $trees[$x][$y]) { $visible_u = false; break; } }
            $scenic_d = 0; for ($i=$x + 1; $i<count($trees[0]); $i++) { $scenic_d++; if ($trees[$i][$y] >= $trees[$x][$y]) { $visible_d = false; break;} }
            $scenic_score = $scenic_u * $scenic_d * $scenic_l * $scenic_r;
            if ($scenic_score > $top_score) { $top_score = $scenic_score; }
            if ($visible_l || $visible_r || $visible_u || $visible_d) { $visible++; }
        }
    }
    echo "Visible trees : ".$visible."\n";
    echo "Top scenic score : ".$top_score."\n";
