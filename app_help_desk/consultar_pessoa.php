<?php
  $acao = 'listagem';
  require "valida_pessoa.php";
  
  //echo'<pre>';
    //print_r($pessoas);
  //echo'</pre>';
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Consultar funcionarios - ADMINISTRADOR</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <style>
      .card-consultar-pessoa {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
      a:link {
        text-decoration: none;
      }
    </style>

    <script>
      function remover(id){
				//alert(id);
				location.href = 'valida_pessoa.php?acao=remover&id='+id;
			}
    </script>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-pessoa">
          <div class="card">
            <div class="card-header">
              Consulta de funcionários cadastrados
            </div>

            
            <div class="card-body">
              <?php foreach($pessoas as $indice => $pessoa){?>
                <div class="card mb-3 bg-light">
                  <div class="row">
                    <div class="col-sm-9 d-flex align-item-center">
                      <div class="card-body">
                        <h5 class="card-title">
                          <?= $pessoa->nome?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                        <?= $pessoa->cargo?> - <?=$pessoa->setor?>
                        </h6>
                        <p class="card-text">
                        <?= $pessoa->email?>
                        </p>
                      </div>
                    </div>
                    <div class="col-sm-3 mt-2 d-flex justify-content-end">
                    <i class="fas fa-trash-alt fa-lg text-danger p-1" onclick="remover(<?= $pessoa->id?>)"></i>                 
                    </div>

                  </div>  
                </div>
              <?}?>

              <div class="row mt-5">
                <div class="col-12">
                  
                  <a href="home.php">
                    <button class="btn btn-lg btn-warning btn-block text-white">Voltar</button>
                  </a>
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>