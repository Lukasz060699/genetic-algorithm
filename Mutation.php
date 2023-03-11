<?php


class Mutation extends Selection {
    
    private $pm;
    
    public function set_pm($pm) {
        $this->pm = $pm; 
    }
    
    public function randomRNumber($result_selection){
        $random_array = array();
        foreach ($result_selection as $pair) {
            $random_pair = array();
            for ($i = 0; $i < count($pair['binary']); $i++) {
                $random_pair[] = round((float) rand() / (float) getrandmax(), 2);
            }
            $random_array[] = $random_pair;
        }
        return $random_array;
    }    
    
    public function extractBinaries($result_selection) {
        $binaries = array();
        foreach ($result_selection as $item) {
            if (isset($item['binary'])) {
                $binaries[] = $item['binary'];
            }
        }
        return $binaries;
    }
    
    public function Mutation($binaries, $random_array, $pm) {
    for ($i=0; $i<count($binaries); $i++) {
        //echo count($binaries[$i]);
      for ($j=0; $j<count($binaries[$i]); $j++) {
        if ($random_array[$i][$j] < $pm) {
          if ($binaries[$i][$j] == 0) {
            $binaries[$i][$j] = 1;
            echo "<font color='red'>";
            echo $binaries[$i][$j]."\n";
            echo "</font>";
          } else {
            $binaries[$i][$j] = 0;
            echo "<font color='red'>";
            echo $binaries[$i][$j]."\n";
            echo "</font>";
          }
        }else{
            echo $binaries[$i][$j]."\n";
        }
      }
      ?></br><?php
    }
    return $binaries;
  }

}
