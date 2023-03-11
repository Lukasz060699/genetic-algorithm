<?php

include 'Population.php';
include 'Selection.php';
include 'Mutation.php';

 if(isset($_POST['back'])){
       header('Location: index.php');
   }
   
if((isset($_POST['submit'])) && (!empty($_POST['size']) && !empty($_POST['il']))){
    $size = $_POST['size'];
    $il = $_POST['il'];
    $selection_variant = $_POST['options'];
    $mutation_option = $_POST['options2'];
    $pm = $_POST['pm'];

    $population = new Population();
    $population->set_size($size);
    $population->set_size_il($il);
    
    $selection = new Selection();  
    
    $mutation = new Mutation();
    $mutation->set_pm($pm);
   
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <title>Genetic Algorithm</title>
    </head>
    <body>
        <section class="vh-1000 gradient-custom">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-7">
                  <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                      <div class="mb-md-5 mt-md-4 pb-5">
                          <form method="POST">
                            <h2 class="fw-bold mb-2 text-uppercase">Results</h2>

                            <div class="form-outline form-white mb-4">
                                <label class="form-label">Random values of parameter 'A': </label></br>
                                  <?php $arrayA = $population->randomA($size);?></br>             
                                  <label class="form-label">Random values of parameter 'B': </label></br>
                                  <?php $arrayB = $population->randomB($size,$arrayA);?></br>                
                                  <label class="form-label">Random values of parameter 'D': </label></br>
                                  <?php $arrayD = $population->randomD($size);?>                
                            </div>
                            <div class="form-outline form-white mb-4">
                                <label class="form-label">The binary length of the chromosome 'm': </label></br>
                                <?php 
                                    $result = $population->mCondition($arrayA, $arrayB, $arrayD);
                                    $m = $population->mLength($result);
                                    echo $mSum = array_sum($m);
                                ?>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <label class="form-label">New population: </label></br>
                                <?php $new_population = $population->newPopulation($il, $mSum, $m);?>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <label class="form-label">Binary to decimal (each substring): </label></br>
                                <?php $decimal_array = $population->binaryToDecimalArray($new_population, $m,$mSum, $size);?>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <label class="form-label">Rastrigin function values with binary: </label></br>
                                <?php 
                                    $rastrigin = $population->calculateRastrigin($new_population,$decimal_array, $arrayA, $arrayB, $m);
                                    $result = $population->printResult($rastrigin, $m);
                                ?>
                            </div> 
                            <div class="form-outline form-white mb-4">
                                <label class="form-label">Selection result: </label></br>
                                <?php 
                                    if($selection_variant == 'tournament'){
                                    $tournament_selection = $selection->randomPairs($rastrigin); 
                                    $better_pairs = $selection->tournamentSelection($tournament_selection);
                                    $printSelection = $selection->printSelection($better_pairs);
              
                                    
                                    } else if($selection_variant == 'ranking'){
                                    $ranking_selection = $selection->rankingSelection($rastrigin, $il);
                                    $printSelection = $selection->printSelection($ranking_selection);
                                    $random_R = $mutation->randomRNumber($ranking_selection);
                                    }
                                ?>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <label class="form-label">Mutation result: </label></br>
                                <?php 
                                    if(($mutation_option== 'mutation') && ($selection_variant == 'tournament')){
                                        $random_R = $mutation->randomRNumber($better_pairs); 
                                        $extracted = $mutation->extractBinaries($better_pairs);
                                        $mutation_array = $mutation->Mutation($extracted, $random_R, $pm);
                                    } else{
                                        $random_R = $mutation->randomRNumber($ranking_selection); 
                                        $extracted = $mutation->extractBinaries($ranking_selection);
                                        $mutation_array = $mutation->Mutation($extracted, $random_R, $pm);
                                    }
                                ?>
                            </div>
                            <button class="btn btn-outline-light btn-lg px-5" name="back">Back</button>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </body>
</html>
<?php }?>