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

      a{
        color: black;
      }
      a:link {
        text-decoration: none;
        color: black;
      }
      .linke:hover{
        color: #16a4b2;
        font-size:60px;
      }
      .letras{
        font-size:0.3em;
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
                <div class="col-4 d-flex justify-content-center fa-4x">
                  <a href="abrir_chamado.php?" class="linke">
                    <p class="text-dark letras">Abrir Pedido</p>
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </a>
                </div>
                <div class="col-4 d-flex justify-content-center fa-4x">                
                  <a href="consultar_chamado.php?" class="linke">
                    <p class="text-dark letras">Listar Todos os Pedidos</p>
                    <i class="fa fa-file" aria-hidden="true"></i>
                  </a>
                </div>
                <div class="col-4 d-flex justify-content-center fa-4x">              
                  <a href="consultar_pendentes.php?" class="linke">
                    <p class="text-dark letras">Listar Pedidos Pendentes</p>
                    <i class="fa fa-repeat" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Funções do Administrador
            </div>
            <div class="card-body">
              <div class="row mt-5">
                <div class="col-4 d-flex justify-content-center fa-4x" >
                  <a href="cadastrar_pessoa.php" class="linke">
                    <p class="text-dark letras">Cadastrar Pessoa</p>
                    <i class="fa fa-address-card-o" aria-hidden="true"></i>
                  </a>
                </div>
                <div class="col-4 d-flex justify-content-center fa-4x">
                  <a href="consultar_pessoa.php" class="linke">
                    <p class="text-dark letras">Listar Pessoas</p>
                    <i class="fa fa-users" aria-hidden="true"></i>
                    </i>
                  </a>
                </div>
                <div class="col-4 d-flex justify-content-center fa-4x" >
                  <a href="categoria.php" class="linke">
                    <p class="text-dark letras">Categorias</p>
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
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