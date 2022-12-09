<?php
        $a[1] = array("D", "M", "S", "Z", "R", "F", "W", "N");
        $a[2] = array("W", "P", "Q", "G", "S");
        $a[3] = array("W", "R", "V", "Q", "F", "N", "J", "C");
        $a[4] = array("F", "Z", "P", "C", "G", "D", "L");
        $a[5] = array("T", "P", "S");
        $a[6] = array("H", "D", "F", "W", "R", "L");
        $a[7] = array("Z", "N", "D", "C");
        $a[8] = array("W", "N", "R", "F", "V", "S", "J", "Q");
        $a[9] = array("R", "M", "S", "G", "Z", "W", "V");
        $lines = explode("\n", trim(file_get_contents("input.txt")));
        $delimiters = ['move', 'from', 'to'];
        foreach ($lines as $line) {
                $line = str_replace($delimiters, "|", $line);
                $line = str_replace(" ", "", $line);
                $nums = explode("|", $line);
                for ($i = 0; $i < $nums[1]; $i++) {
                        array_push($a[$nums[3]], array_pop($a[$nums[2]]));
                }
        }
        print_r($a);

