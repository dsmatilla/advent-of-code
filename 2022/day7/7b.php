<?php        
        $lines = explode("\n", trim(file_get_contents("input.txt")));
        $pwd="";
        $tree=array();
        $total=0;
        foreach ($lines as $line) {
            $line = str_replace("$ ", "", $line);
            $chunks = explode(" ", $line);
            switch ($chunks[0]) {
                case "cd":
                    if ($chunks[1] == "..") {
                        $pwd = substr($pwd, 0, strrpos($pwd, "/"));
                    } else {
                        $pwd .= "/".$chunks[1];
                    }
                    break;
                default:
                    if (is_numeric($chunks[0])) {
                        $aux_pwd = $pwd;
                        while($aux_pwd != "/") {
                            $tree[$aux_pwd] += $chunks[0];
                            $aux_pwd = substr($pwd, 0, strrpos($aux_pwd, "/"));
                        }
                    }
                    break;
            }
        }
        asort($tree);
        foreach ($tree as $k => $v) {
            $space = 30000000 - (70000000 - $tree["//"]);
            if ($v > $space) {
                echo $v;
                break;
            }
        }
