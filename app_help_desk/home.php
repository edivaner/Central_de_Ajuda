<?php

  //require "valida_pessoa.php";

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>HELP-ME</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      .card-home {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Assistência a departamentos
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <a href="abrir_chamado.php?">
                    <img src="image/formulario_abrir_chamado.png" width="70" height="70">
                  </a>
                </div>
                <div class="col-6 d-flex justify-content-center">
                  <a href="consultar_chamado.php?">
                    <img src="image/formulario_consultar_chamado.png" width="70" height="70">
                  </a>
                </div>
              </div>

            <!-- Caso login for adm -->
              <div class="row mt-5">
                <div class="col-6 d-flex justify-content-center fa-4x" >
                  <a href="cadastrar_pessoa.php">
                  <i class="fa fa-address-card" aria-hidden="true"></i>
                  </a>
                </div>
                <div class="col-6 d-flex justify-content-center fa-3x">
                  <a href="consultar_pessoa.php">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <i class="fa fa-address-card" aria-hidden="true">
                    </i>
                  </a>
                </div>
              </div>

              <div class="row mt-5 d-flex justify-content-center">
                <div class="col-6 d-flex justify-content-center fa-4x" >
                  <a href="categoria.php">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>
    </div>
  </body>
</html>