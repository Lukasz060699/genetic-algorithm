<?php

class Selection extends Population {
    public function randomPairs($result2) {
    $pairs = array();
    $keys = array_keys($result2);
    shuffle($keys);

    for ($i = 0; $i < count($keys); $i += 2) {
        $pair = array();
        $pair[] = $result2[$keys[$i]];
        if (isset($keys[$i + 1])) {
            $pair[] = $result2[$keys[$i + 1]];
        }
        $pairs[] = $pair;

        //print_r($pair);
    }

    return $pairs;
}

    public function tournamentSelection($pairs) {
        $result_selection = array();
        foreach ($pairs as $pair) {
            list($a, $b) = $pair;
            if ($a['rastrigin'] > $b['rastrigin']) {
                $result_selection[] = $a;
            } else {
                $result_selection[] = $b;
            }
        }
        //print_r($better_pairs);
        return $result_selection;
    }
    
    public function rankingSelection($result2, $il){
        sort($result2, SORT_DESC);
        //print_r($result2);
        $result_selection[] = array();
        for($i = 0; $i < $il; $i++){
            $temp = rand(0, $il-1);            
            $temp = rand(0, $temp);
            //echo $temp;
            $result_selection[$i] = $result2[$temp]; 
        }
        //print_r($resultTournament);
        return $result_selection;
    }
    
     public function printSelection($result_selection) {
        echo "<table>";
        echo "<tr><th>Index</th><th>Rastrigin</th><th>Binary</th></tr>";
        foreach ($result_selection as $i => $item) {
            echo "<tr>";
            echo "<td>{$i}</td>";
            echo "<td>{$item['rastrigin']}</td>";
            echo "<td>" . implode(" ", $item['binary']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    

}
