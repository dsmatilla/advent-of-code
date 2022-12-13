<?php
    $total = 0; $inc=1;
    $p2array = array("[[2]]","[[6]]");
    $lines = explode("\n\n", trim(file_get_contents("input.txt")));
    foreach ($lines as $line) {
        $chunks=explode("\n", $line);
        if (check($chunks[0], $chunks[1]) <= 0) {
            $total+=$inc;
        }
        $inc++;
        array_push($p2array, $chunks[0], $chunks[1]);
    }
    
    echo "Total : ".$total."\n";

    usort($p2array, "check");
    foreach ($p2array as $key => $value) {
        if ($value == "[[2]]") {
            $p1 = $key + 1;
        }
        if ($value == "[[6]]") {
            $p2 = $key + 1;
        }
    }
    echo "Total : ".$p1*$p2."\n";

function check($chunk1, $chunk2) {
    $obj1 = json_decode($chunk1);
    $obj2 = json_decode($chunk2);

    if (is_int($obj1) AND is_int($obj2)) {
        if ($obj1 == $obj2) {
            return 0;
        } elseif ($obj1 < $obj2) {
            return - 1;
        } else {
            return 1;
        }
    } else {
        $aux = array();
        if (is_int($obj1)) {
            array_push($aux, $obj1);
            $obj1 = $aux;
        }
        if (is_int($obj2)) {
            array_push($aux, $obj2);
            $obj2 = $aux;
        }

        while (count($obj1) > 0 AND count($obj2) > 0) {
            $res = check(json_encode(array_shift($obj1)), json_encode(array_shift($obj2)));
            if ($res) {
                return $res;
            }
        }
        if (count($obj1) == count($obj2)) {
            return 0;
        } elseif (count($obj1) < count($obj2)) {
            return -1;
        } else {
            return 1;
        }
    }
}