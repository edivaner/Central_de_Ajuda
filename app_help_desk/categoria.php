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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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

<script>
			function editar(id, txt_categoria){
			
				//Criar um form de edição
				let form = document.createElement('form');
				form.action = 'valida_categoria.php?acao=atualizar'//'categoria.php?pag=categoria&acao=atualizar';
				form.method = 'post';
				form.className = 'row';

				//criar um input para entrada de texto
				let inputCategoria = document.createElement('input');
				inputCategoria.type = 'text';
				inputCategoria.name = 'categoria';
				inputCategoria.className = 'col-9 form-control';
				inputCategoria.value = txt_categoria;

				//criar um input hidden para guardear o id da tarefa
				let inputId = document.createElement('input');
				inputId.type = 'hidden';
				inputId.name = 'id';
				inputId.value = id;

				//criar um button para envio do form
				let button = document.createElement('button');
				button.type = 'submit';
				button.className = 'col-3 btn btn-info';
				button.innerHTML = 'Atualizar';

        //alert(txt_categoria);

				//Incluir inputTarefa no form
				form.appendChild(inputCategoria);

				//incluir o inputID no form
				form.appendChild(inputId);

				//incluir o button no form
				form.appendChild(button);

				//selecionar a div categoria
				let cat = document.getElementById('categoria_'+id);

				//limpar o texto da tarefa para inclusão do form 
				cat.innerHTML = '';

				//incluir form na página
				cat.insertBefore(form, cat[0]);
			}

			function remover(id){
				alert(id);
				location.href = 'valida_categoria.php?acao=remover&id='+id;
			}

    </script>

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
                                  <div class="row">
                                    <div class="col-sm-9 d-flex align-items-center categoria">
                                      <div class="card-title pt-3" id="categoria_<?= $categoria->id?>">
                                          <?=$categoria->nome_categoria?>
                                      </div>
                                    </div>

                                    <div class="col-sm-3 mt-2 d-flex justify-content-between">
                                      <i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $categoria->id?>)"></i>
                                      <i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $categoria->id?>, '<?= $categoria->nome_categoria?>')"></i>                         
                                    </div>
                                  
                                  </div>                           
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