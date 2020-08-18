<?
    require "../back/conection.php";
    require "../back/pessoa.php";
    require "../back/registroService.php";
    require "../back/registro.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

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

    }


    
        
        
?>