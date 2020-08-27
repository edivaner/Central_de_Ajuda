<?php
  $acao = 'recuperarPendentes';
  require "valida_registro.php";
  $i=0;

  // echo'<pre>';
  // print_r($registros);
  // echo'</pre>';
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Consultar pedidos de ajuda</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
      a:link {
        text-decoration: none;
      }
    </style>

<script>
			function editar(id, titulo, categoria, pessoa, status, txt_registro){
        //alert(id,titulo, categoria, pessoa, txt_registro);
			
				//Criar um form de edição
				let form = document.createElement('form');
				form.action = 'valida_registro.php?acao=atualizar';
				form.method = 'post';
				form.className = 'row';

				//criar um input para entrada de texto
				let inputRegistro = document.createElement('input');
				inputRegistro.type = 'text';
				inputRegistro.name = 'registro';
				inputRegistro.className = 'col-4 form-control';
				inputRegistro.value = txt_registro;

            //criar um input hidden para guardar o id da tarefa
            let inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'id';
            inputId.value = id;

            //criar um input hidden para guardar o id_pessoa da tarefa
            let inputPessoa = document.createElement('input');
            inputPessoa.type = 'hidden';
            inputPessoa.name = 'id_pessoa';
            inputPessoa.value = pessoa;

            //criar um input hidden para guardear o Titulo da tarefa
            let inputTitulo = document.createElement('input');
            inputTitulo.type = 'hidden';
            inputTitulo.name = 'titulo';
            inputRegistro.className = 'col-4 form-control';
            inputTitulo.value = titulo;

            //criar um input hidden para guardear o status do registro
            let inputStatus = document.createElement('input');
            inputStatus.type = 'hidden';
            inputStatus.name = 'id_status';
            inputStatus.value = status;

            //criar um input hidden para guardear o Categoria da tarefa
            let inputCategoria = document.createElement('input');
            inputCategoria.type = 'hidden';
            inputCategoria.name = 'id_categoria';
            inputCategoria.value = categoria;

				//criar um button para envio do form
				let button = document.createElement('button');
				button.type = 'submit';
				button.className = 'col-4 btn btn-info';
				button.innerHTML = 'Atualizar';

        //alert(txt_registro);

				//Incluir inputTarefa no form
				form.appendChild(inputRegistro);

            //incluir o inputID no form
            form.appendChild(inputId);

            //incluir o inputPessoa no form
				    form.appendChild(inputPessoa);

            //incluir o inputTitulo no form
				    form.appendChild(inputTitulo);

            //incluir o inputStatus no form
				    form.appendChild(inputStatus);

            //incluir o inputCategoria no form
				    form.appendChild(inputCategoria);

				//incluir o button no form
				form.appendChild(button);

				//selecionar a div registro
				let reg = document.getElementById('registro_'+id);

				//limpar o texto da descrição para inclusão do form 
				reg.innerHTML = '';

				//incluir form na página
				reg.insertBefore(form, reg[0]);
			}

			function remover(id){
				//alert(id);
				location.href = 'valida_registro.php?acao=remover&id='+id;
			}

      function marcarRealizada(id){
				location.href = 'valida_registro.php?acao=marcarRealizadaPendentes&id='+id;
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

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>

            
            <div class="card-body">
              <? foreach($registros as $indice => $registro){
                $i++;
                ?>
                <div class="card mb-3 bg-light">
                  <div class="row">
                    <div class="col-sm-9 d-flex align-item-center">
                      <div class="card-body">
                        <div class="titulo">
                          <h5 class="card-title">
                            <?=$i?> - <?=$registro->titulo?>
                          </h5>
                        </div>
                        <h6 class="card-subtitle mb-2 text-muted">
                          <?=$registro->nome_categoria?> / <?= $registro->nome_status?>
                        </h6>
                        <div class="registro">
                          <div class="card-text" id="registro_<?=$registro->id?>">
                            <?= $registro->descricao?>
                          </div>    
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-3 mt-2 d-flex justify-content-end">
                      <!-- remover e editarnão podem aparecer para o ADM -->
                      <i class="fas fa-trash-alt fa-lg text-danger p-1" onclick="remover(<?= $registro->id?>)"></i>

                      <i class="fas fa-edit fa-lg text-info p-1" onclick="editar(<?= $registro->id?>, '<?=$registro->titulo?>', <?=$registro->id_categoria?>, <?=$registro->id_pessoa?>, '<?= $registro->status?>', '<?= $registro->descricao?>', )"> </i>

                      <i class="fas fa-check-square fa-lg text-success p-1" onclick="marcarRealizada(<?= $registro->id?>)"></i>                 
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