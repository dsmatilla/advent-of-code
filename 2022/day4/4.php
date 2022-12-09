<?php
	$lines = explode("\n", trim(file_get_contents("input.txt")));
	$total = 0;
	foreach ($lines as $line) {
                $ranges = explode(",", $line);
                $nums1 = explode("-", $ranges[0]);
                $nums2 = explode("-", $ranges[1]);
                $elf1 = range($nums1[0], $nums1[1]);
                $elf2 = range($nums2[0], $nums2[1]);
                $intersection = array_intersect($elf1, $elf2);
                $diff1 = count(array_diff($elf1, $intersection));
                $diff2 = count(array_diff($elf2, $intersection));
                if ($diff1 == 0 || $diff2 == 0) {
                        $total++;
                }
	}
	echo $total;

