<?
  $acao = 'recuperarcategoria';
  
  require 'valida_registro.php';

  //echo'<pre>';
  //print_r($categorias);
  //echo'</pre>';
?>

<html><head>
    <meta charset="utf-8">
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
      a:link{
        text-decoration:none;
      }
    </style>

    <script>
      function ids(){
        alert("alert");
      }
    </script>

  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <? if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) {?>
      <div class="bg-info pt-2 text-white d-flex justify-content-center">
        <h5>Ajuda solicitada com sucesso. Em breve alguém resolverá seu problema. Bom trabalho!  :)</h5>
      </div>
    <?}?>

    <div class="container">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
              Abertura de chamado
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form action='valida_registro.php?acao=inserir' method='post'>
                    <div class="form-group">
                      <label>Título do problema</label>
                      <input type="text" class="form-control" placeholder="Título" name='titulo'>
                    </div>
                    
                    <div class="form-group">
                      <label>Categoria</label>
                      <select class="form-control" name='categoria'>
                        <? foreach($categorias as $indice => $categoria){ ?>
                          <option>
                            <?=$categoria->nome_categoria?>
                          </option>

                        <?}?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea class="form-control" rows="3" name='descricao' placeholder="Descrição"></textarea>
                    </div>

                    <div class="row mt-5">
                      <div class="col-12">
                        <button class="btn btn-lg btn-info btn-block" type="submit">Enviar</button>
                      </div>
                    </div>
                  </form>

                      <div class="row">
                        <div class="col-12">
                          <a href="index.php">
                            <button class="btn btn-lg btn-warning btn-block text-white">Voltar</button>
                          </a>
                        </div>
                      </div>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  
</div></body></html>