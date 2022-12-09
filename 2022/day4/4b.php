<?php
        $lines = explode("\n", trim(file_get_contents("input.txt")));
        $total = 0;
        foreach ($lines as $line) {
                $ranges = explode(",", $line);
                $nums1 = explode("-", $ranges[0]);
                $nums2 = explode("-", $ranges[1]);
                if (count(array_intersect(range($nums1[0], $nums1[1]), range($nums2[0], $nums2[1]))) > 0) {
                        $total++;
                }
        }
        echo $total;

