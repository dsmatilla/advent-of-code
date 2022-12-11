<?php
    $lines = explode("\n\n", trim(file_get_contents("input.txt")));
    $modulo = 1;
    foreach ($lines as $line) {
        $line = explode("\n", $line);
        sscanf(trim($line[0]), "Monkey %d:", $nmonkey);
        sscanf(str_replace(" ", "", trim($line[1])), "Startingitems:%s", $itemstring);
        sscanf(str_replace(" ", "", trim($line[2])), "Operation:new=%s", $operation[$nmonkey]);
        sscanf(str_replace(" ", "", trim($line[3])), "Test:divisibleby%d", $test_divisible[$nmonkey]);
        sscanf(str_replace(" ", "", trim($line[4])), "Iftrue:throwtomonkey%d", $action_true[$nmonkey]);
        sscanf(str_replace(" ", "", trim($line[5])), "Iffalse:throwtomonkey%d", $action_false[$nmonkey]);
        $items[$nmonkey] = explode(",", $itemstring);
        $modulo = $modulo * $test_divisible[$nmonkey];
    }

    for ($i=0; $i<10000; $i++) {
        for ($x=0; $x<count($items); $x++) {
            while (count($items[$x])>0) {
                $worry_level = $items[$x][0];
                $worry_level = matheval(str_replace("old", $worry_level, $operation[$x]));
                $worry_level = $worry_level % $modulo;
                if ($worry_level % $test_divisible[$x] == 0) {
                    array_push($items[$action_true[$x]], $worry_level);
                } else {
                    array_push($items[$action_false[$x]], $worry_level);
                }
                array_shift($items[$x]);
                if (isset($count[$x])) {
                    $count[$x]++;
                } else {
                    $count[$x]=1;
                }
            }
        }
    }

    rsort($count);
    echo "Total : ".(intval(intval($count[0])*intval($count[1])))."\n";

function matheval($text) {
    $chunks=explode("+", $text);
    if (count($chunks)==2) {
        return intval(intval($chunks[0]) + intval($chunks[1]));
    }

    $chunks=explode("*", $text);
    if (count($chunks)==2) {
        return intval(intval($chunks[0]) * intval($chunks[1]));
    }
}