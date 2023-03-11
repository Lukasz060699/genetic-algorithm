
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
        <section class="vh-150 gradient-custom">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                      <div class="mb-md-5 mt-md-4 pb-5">
                          <form method="POST" action="call.php">
                            <h2 class="fw-bold mb-2 text-uppercase">Genetic Algorithm</h2>

                            <div class="form-outline form-white mb-4">
                              <label class="form-label">Function dimension</label>
                              <input type="number" name="size" class="form-control form-control-lg" />                  
                            </div>
                            
                            <div class="form-outline form-white mb-4">
                              <label class="form-label">Population size</label>
                              <input type="number" name="il" class="form-control form-control-lg" />                  
                            </div>
                            
                            <div class="form-outline form-white mb-4">
                                <p class="text-white-20 mb-3">Selection:</p>
                                <input type="radio" class="btn-check" name="options" id="option1" value="tournament" autocomplete="off">
                                <label class="btn btn-primary" for="option1">Tournament</label>
                                <input type="radio" class="btn-check" name="options" id="option2" value="ranking" autocomplete="off">
                                <label class="btn btn-primary" for="option2">Ranking</label>
                            </div>
                            
                            <div class="form-outline form-white mb-4">
                                <input type="checkbox" class="btn-check" name="options2" id="option3" value="mutation" autocomplete="off">
                                <label class="btn btn-primary" for="option3">Mutation</label>
                            </div>
                            
                            <div class="form-outline form-white mb-4">
                              <label class="form-label">Mutation probability</label>
                              <input type="number" step="0.01" name="pm" class="form-control form-control-lg" />                  
                            </div>
                            
                            <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Start</button>
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
