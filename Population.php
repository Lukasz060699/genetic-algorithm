<?php

class Population {
    
    private $size;
    private $il;

    public function set_size($size) {
        $this->size = $size; 
    }
    
    public function set_size_il($il) {
    $this->il = $il; 
    }
    
    public function randomA($size){
    $arrayA = array();
    for ($i = 0; $i < $this->size; $i++) {
      $arrayA[$i] =  rand(-1,-1); 
      while($arrayA[$i] == 0){
          $arrayA[$i] =  rand(-1,-1);
      }
      echo $arrayA[$i].", ";
    }
    return $arrayA;
    }
    
    public function randomB($size, $arrayA){
    $arrayB = array();
    for ($i = 0; $i < $this->size; $i++) {
      $arrayB[$i] =  rand(1,1);
      //echo $arrayB[$i];
      while($arrayB[$i] <= $arrayA[$i]){
          $arrayB[$i] =  rand(1,1);
      }
      echo $arrayB[$i].", ";
    }
    return $arrayB;
    }
    
    public function randomD($size){
    $arrayD = array();
    for ($i = 0; $i < $this->size; $i++) {
      $arrayD[$i] = rand(1, 5); 
      echo $arrayD[$i].", ";
    }
    
    return $arrayD;
    }
    
    public function mCondition($arrayA, $arrayB, $arrayD){
        $result = array(); 
        for ($i = 0; $i < $this->size; $i++) {
            $result[$i] = round(($arrayB[$i] - $arrayA[$i])*pow(10, $arrayD[$i]) + 1,0);
            //echo $result[$i];
        }
        return $result;
    }
    
    public function mLength($result){
       $m = array();
       $mSum = 0;
        for($i = 0; $i < $this->size; $i++){
            $licz = 0;
            while($result[$i]<=pow(2,$licz-1)||$result[$i]>=pow(2,$licz))
                {
                    $licz++;
                    $m[$i] = $licz;
                }
                //echo $m[$i]." ";
                $mSum += $m[$i];
        }
        return $m;
    }
    
    public function newPopulation($il, $mSum, $m){
        $new_population = array(array());
        for($i = 0; $i < $this->il; $i++){
            for($j = 0; $j < $mSum; $j++){
                $new_population[$i][$j] = rand(0,1);
                echo $new_population[$i][$j]." ";
            }
            ?></br><?php
        }
        return $new_population;
    }
   
    
    public function binaryToDecimalArray($new_population, $m, $mSum, $size){
    $decimal_array = array();
    $start_index = 0;
    for ($i = 0; $i < $this->il; $i++) {
        $decimal_array[$i] = array();
        for ($j = 0; $j < $size; $j++) {
            $end_index = $start_index + $m[$j];
            $binary_substring = array_slice($new_population[$i], $start_index, $m[$j]);
            $decimal_array[$i][$j] = bindec(implode('', $binary_substring));
            $start_index = $end_index;
            echo $decimal_array[$i][$j];?></br><?php
            
        }
        $start_index = 0;
    }
    return $decimal_array;
}

 public function calculateRastrigin($new_population, $decimal_array, $arrayA, $arrayB, $m) {
    $result2 = array();
    for ($i = 0; $i < count($decimal_array); $i++) {
        $x = array();
        for ($j = 0; $j < count($decimal_array[$i]); $j++) {
            $x[] = $arrayA[$j] + (($arrayB[$j] - $arrayA[$j]) * $decimal_array[$i][$j]) / (pow(2, $m[$j]) - 1);
            //echo $x[$j]."\n";
            
        }
        $sum = 0;
        foreach ($x as $value) {
            $sum += pow($value, 2) - 10 * cos(20 * pi() * $value);
        }
        $result2[$i] = array(
            'rastrigin' => round(10 * count($x) + $sum,2),
            'binary' => $new_population[$i]
        ); 
    }

    return $result2;
}

public function printResult($result2) {
    echo "<table style='color: white'>";
    echo "<tr><th>Index</th><th>Rastrigin</th><th>Binary</th></tr></br>";
    foreach ($result2 as $i => $item) {
        echo "<tr>";
        echo "<td>{$i}</td>";
        echo "<td>{$item['rastrigin']}</td>";
        echo "<td>" . implode(" ", $item['binary']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
    

 }
    

