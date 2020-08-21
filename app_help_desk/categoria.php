<?php
  $acao = 'listagem';
  require "../back/valida_categoria.php";

  // echo '<pre>';
  //   print_r($categorias);
  //   print_r($qtd);
  // echo '</pre>';
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Cadastrando Categoria - Administrador</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
       .card-consultar-categoria {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
      a:link {
        text-decoration: none;
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
    
    <? if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1){ ?>
      <div class="bg-info pt-2 text-white d-flex justify-content-center">
        <h5>Nova categoria cadastrada com sucesso</h5>
      </div>
    <?}?>

    <div class="container">    
        <div class="row">
            <div class="col-md-4">
                <div class="card-login mb-1">
                    <div class="card">
                        <div class="card-header">
                          Olá, administrador. Cadastre um novo usuário.
                        </div>
                        <div class="card-body">
                            <form action='valida_categoria.php?acao=inserir' method='post' >
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nome da nova categoria" name='categoria'>
                              </div>
                              <button class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card-consultar-categoria">
                    <div class="card">
                        <div class="card-header">
                            Listagem das categorias de defeitos.
                        </div>
                        <div class="card-body">
                            <div class="card mb-3 bg-light">
                                <div class="card-body">
                                  <?foreach($categorias as $indice =>$categoria){?>
                                    <h5 class="card-title pt-3">
                                        <?=$categoria->nome_categoria?>
                                    </h5>
                                    <hr>
                                  <?}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-12">
                <a href="home.php">
                    <button class="btn btn-lg btn-warning btn-block text-white">Voltar</button>
                </a>
            </div>
        </div>
    </div>
  </body>
</html>