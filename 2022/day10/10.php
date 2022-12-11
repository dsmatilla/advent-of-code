<?php
    $lines = explode("\n", trim(file_get_contents("input.txt")));
    $cycle=0; $x=1;
    $values=array();
    foreach ($lines as $line) {
        $chunks = explode(" ", $line);
        if ($chunks[0]=="noop") {
            $cycle++;
            if (!isset($values[$cycle])) { $values[$cycle]=$x; }
        } elseif($chunks[0]=="addx") {
            $cycle++;
            if(!isset($values[$cycle])) { $values[$cycle]=$x; }
            $cycle++;
            if(!isset($values[$cycle])) { $values[$cycle]=$x; }
            $x+=$chunks[1];
            $values[$cycle+1]=$x;
        }
    }
    $total = ($values[20] * 20) + ($values[60] * 60) + ($values[100] * 100) + ($values[140] * 140) + ($values[180] * 180) + ($values[220] * 220);

    $crt=array();
    foreach ($values as $cycle => $x) {
        $sprite = $cycle % 40;
        if ($sprite > ($values[$cycle+1] + 1) OR $sprite < ($values[$cycle+1] - 1)) {
            $crt[$cycle] = ". ";
        } else {
            $crt[$cycle] = "##";
        }
    }
    foreach ($crt as $pos => $pixel){
        echo $pixel;
        if ($pos % 40==0) echo "\n";
    }

    echo "Total : ".$total."\n";