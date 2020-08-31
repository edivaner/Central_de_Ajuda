<?
    require "../back/conection.php";
    require "../back/pessoa.php";
    require "../back/registroService.php";
    require "../back/registro.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    //$pag = isset($_GET['pag']) ? $_GET['pag'] : $pag;

    if($acao == 'inserir'){
      $conexao = new Conexao();
      $registro = new Registro();      
      $registroService = new registroService($conexao,$registro);

      $registro->__set('titulo', $_POST['titulo']);

      //Substituindo o nome da categoria pelo ID dela, de forma automatica.
      $categorias = $registroService->recuperarCategoria();
      foreach($categorias as $indice => $categoria){
        if($_POST['categoria'] == $categoria->nome_categoria){
          //Se o valor mandado do form for igual ao da variavel que percoreu o array, o registro recebe o id pelo set.
          $registro->__set('categoria', $categoria->id);
        }
      }
  
      $registro->__set('descricao', $_POST['descricao']);

      $registroService->inserir();
      header('Location: abrir_chamado.php?inclusao=1');

    } else if($acao == 'listagem'){
      $registro = new Registro();
      $conexao = new Conexao();

      $registroService = new registroService($conexao,$registro);

      $registros = $registroService->recuperar();

    } else if ($acao == 'recuperarcategoria'){
      $registro = new Registro();
      $conexao = new Conexao();

      $registroService = new registroService($conexao,$registro);

      $categorias = $registroService->recuperarCategoria();

    } else if($acao == 'atualizar'){
      $registro = new Registro();
      $conexao = new Conexao();
      

      $registro->__set('titulo', $_POST['titulo']);
      $registro->__set('categoria', $_POST['id_categoria']);
      $registro->__set('descricao', $_POST['registro']);
      $registro->__set('idpessoa', $_POST['id_pessoa']);
      $registro->__set('id', $_POST['id']);
      $registro->__set('status', $_POST['id_status']);

      $registroService = new registroService($conexao,$registro);

      //echo $_GET['pag'];

      if($registroService->atualizar() && $_GET['pag'] == 'todos'){
        header('Location: consultar_chamado.php');
      }else if($_GET['pag'] == 'pendentes'){
        header('Location: consultar_pendentes.php');
      }else{
       echo "Problema ao atualizar o Banco de dados";
      }


    } else if($acao == 'remover'){
      $registro = new Registro();
      $registro->__set('id', $_GET['id']);

      $conexao = new Conexao();

      $registroService = new registroService($conexao, $registro);
      $registroService->remover();

      if($_GET['pag'] == 'todos'){
        header('Location: consultar_chamado.php');
      }else if($_GET['pag'] == 'pendentes'){
        header('Location: consultar_pendentes.php');
      }

    } else if($acao == "marcarRealizada"){
      $registro = new Registro();
      $registro->__set('id', $_GET['id']);
      $registro->__set('status',2);

      // echo'<pre>';
      // print_r($registro);
      // echo'</pre>';
      //echo $_GET['pag'];

      $conexao = new Conexao();
  
      $registroService = new RegistroService($conexao, $registro);
  
      if($registroService->marcarRealizada() && $_GET['pag'] == 'todos'){
        header('Location: consultar_chamado.php');
      }else if($registroService->marcarRealizada() && $_GET['pag'] == 'pendentes'){
        header('Location: consultar_pendentes.php');
      }else {
        echo "Erro ao marcar pedido como realizado!";
      }
  
    } else if($acao=="recuperarPendentes"){
      $registro = new Registro();
      $registro->__set('status',1);
      $conexao = new Conexao();
  
      $registroService = new registroService($conexao, $registro);
      $registros = $registroService->recuperarPendentes();
  
    } 
   
?>